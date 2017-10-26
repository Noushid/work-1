<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class
Home extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('user/User_model');
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
//		logged();
		$data['title'] = "Dashboard";
		$data['page'] = "dashboard";
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
}
