<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class
Home extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('user/User_model');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Sub_menu_model', 'sub_menu');

        $this->load->library(['ion_auth']);

        if (!$this->ion_auth->logged_in())
        {
            // Allow some methods?
            $allowed = array(
                'test'
            );
            if ( ! in_array($this->router->fetch_method(), $allowed))
            {
                // redirect them to the login page
                redirect('login', 'refresh');
            }
        }
	}

	/**
	* Dashboard area
	*/
	public function index() {
        $data['menu'] = $this->menu->with_subMenu()->get_all();
		$data['title'] = "Dashboard";
		$data['page'] = "dashboard";
		$data['current'] = "dashboard";
		$this->load->view('template', $data);
	}
	
	/** 
	* Set session with user details if correct credentials submited or load view
	* Login page for application 
	*/
	public function login() {
		$user_profile = $this->session->userdata('user_profile');
        if ($user_profile != "") {
            redirect('/', 'refresh');
        }
		$data = null;
		if (isset($_POST['email'])):
			$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			if ($this->form_validation->run()):
				$where = array(
					'user_email' => $this->input->post('email'),
					'password' => md5($this->input->post('password'))
				);
				$user_profile = $this->User_model->get_user($where);
				if($user_profile):
					$this->session->set_userdata('user_profile', $user_profile);
					redirect('/', 'refresh');
				endif;
			endif;
			$flash = array('type' => 'danger', 'message' => 'Invalid login credentials.');
			$this->session->set_flashdata('flash', $flash);
		endif;
		$this->load->view('login', $data);
	}

	/**
	 * Forgot password functionality
	 */
	public function forgotPassword() {
		$data = null;
		if (isset($_POST['email'])):
			$this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
			if ($this->form_validation->run()):
				$email = $this->input->post('email');
				$where = array(
					'user_email' => $email
				);
				$user_profile = $this->User_model->get_user($where);
				if($user_profile):
					$password = random_string('alnum', 5);

					$this->email->set_newline("\r\n");
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$config['useragent'] = 'l33t Mailer 1.0';
					$this->email->initialize($config);
			
			
					$this->email->from('noreply@ranoinc.com', 'Dashboard Team');
					$this->email->subject('Reset Password');
					$message = 'Your password successfully reset as below:<br />Email address: '.$where['email'].'<br />Password: '.$password;
					$this->email->message($message);
					$this->email->to($email);
					if ($this->email->send()) {
						$update_data = array('password' => md5($password));
						$this->User_model->update_user($where, $update_data);
						$flash = array('type' => 'success', 'message' => 'New Password successfully sent to your email address.');
						$this->session->set_flashdata('flash', $flash);
						redirect('login', 'refresh');
					} else {
						$flash = array('type' => 'danger', 'message' => 'There is some errors in your server. The email is not sent.');
						$this->session->set_flashdata('flash', $flash);
						redirect('forgot-password', 'refresh');
					}
				else:
					$flash = array('type' => 'danger', 'message' => 'Email does not exists on our system.');
					$this->session->set_flashdata('flash', $flash);
					redirect('forgot-password', 'refresh');
				endif;
			endif;
		endif;
		$this->load->view('forgot-password');
	}

	/**
	 * Destroy user session and redirect to login page
	 */
	public function logout() {
		$this->session->unset_userdata('user_profile');
		redirect('login');
	}


    public function menu($param1="",$param2="")
    {

        if ($param1 == 'edit') {
            $data['current_menu'] = $this->menu->where('id', $param2)->get();
        }

        if ($param1=='delete') {
            if ($param2 != "") {
                if ($this->menu->delete($param2)) {
                    $this->session->set_flashdata('message', 'Deleted');
                    redirect(site_url('/menu'), 'refresh');
                    exit;
                }else{
                    $this->session->set_flashdata('message', 'Delete error');
                    redirect(site_url('/menu'), 'refresh');
                    exit;
                }
            }else{
                show_error('Something Went wrong');
            }
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'title', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [];
                $data['title'] = $this->input->post('title');
                $data['link'] = $this->input->post('link');
                $data['icon'] = $this->input->post('icon');
                $data['description'] = $this->input->post('description');

                if ($param1 == 'edit' and $param2 != "") {
                    if ($this->menu->update($data ,$param2)) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect(site_url('/menu'), 'refresh');
                        exit;
                    } else {
                        $this->session->set_flashdata('error', 'Does\'t Updated');
                        redirect(site_url('/menu'), 'refresh');
                        exit;
                    }
                }


                if ($this->menu->insert($data)) {
                    $this->session->set_flashdata('message', 'Added');
                    redirect(site_url('/menu'), 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Added');
                    redirect(site_url('/menu'), 'refresh');
                }
            }
        }
        $data['current'] = "main menu";
        $data['title'] = "Main Menu";
        $data['page'] = "menu";
        $this->load->view('template', $data);
    }

    public function sub_menu($param1="",$param2="")
    {
        if ($param1 == 'edit') {
            $data['current_menu'] = $this->sub_menu->with_menu()->where('id', $param2)->get();
        }
        if ($param1=='delete') {
            if ($param2 != "") {
                if ($this->sub_menu->delete($param2)) {
                    $this->session->set_flashdata('message', 'Deleted');
                    redirect(site_url('/sub-menu'), 'refresh');
                    exit;
                }else{
                    $this->session->set_flashdata('message', 'Delete error');
                    redirect(site_url('/sub-menu'), 'refresh');
                    exit;
                }
            }else{
                show_error('Something Went wrong');
            }
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('menu', 'title', 'required');
            $this->form_validation->set_rules('title', 'title', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [];
                $data['title'] = $this->input->post('title');
                $data['link'] = $this->input->post('link');
                $data['icon'] = $this->input->post('icon');
                $data['description'] = $this->input->post('description');
                $data['menu_id'] = $this->input->post('menu');

                if ($param1 == 'edit' and $param2 != "") {
                    if ($this->sub_menu->update($data ,$param2)) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect(site_url('/sub-menu'), 'refresh');
                        exit;
                    } else {
                        $this->session->set_flashdata('error', 'Does\'t Updated');
                        redirect(site_url('/sub-menu'), 'refresh');
                        exit;
                    }
                }
                if ($this->sub_menu->insert($data)) {
                    $this->session->set_flashdata('message', 'Added');
                    redirect(site_url('/sub-menu'), 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Added');
                    redirect(site_url('/sub-menu'), 'refresh');
                }
            }

        }

        $data['current'] = "sub menu";
        $data['title'] = "Sub Menu";
        $data['page'] = "sub_menu";
        $this->load->view('template', $data);

    }


}
