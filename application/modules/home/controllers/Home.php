<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('user/User_model');
        $this->load->model('agency/Agency_model', 'agency');
        $this->load->model('home/Menu_model', 'menu');
        $this->load->model('home/Sub_menu_model', 'sub_menu');
        $this->load->model('home/Group_menu_model', 'group_menu');
        $this->load->model('home/Group_model', 'group');
        $this->load->model('agency/User_agency_model', 'user_agency');
        $this->load->model('home/User_group_model', 'user_group');
        $this->load->model('profile/X_profile_group_model', 'profile_group');
        $this->load->model('Home/Tic_ticket_model', 'tic_ticket');

        $this->load->model('profile/X_profile_group_applic_model', 'profile_group_applica');

        $this->load->library(['ion_auth', 'upload']);

        if (!$this->ion_auth->logged_in())
        {
            // Allow some methods?
            $allowed = array(
                'test',
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
	public function index($param1="",$param2="",$param3="") {
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
            $data['modal_opened'] = true;
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
            if ($param1 == 'edit' and $param2 != "") {
                $this->form_validation->set_rules('title', 'title', 'required');
            }else{
                $this->form_validation->set_rules('title', 'title', 'required|is_unique[xx_menu.title]');
            }
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
            }else{
                $data['modal_opened'] = true;
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
            $data['modal_opened'] = true;
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
            }else{
                $data['modal_opened'] = true;
            }

        }

        $data['current'] = "sub menu";
        $data['title'] = "Sub Menu";
        $data['page'] = "sub_menu";
        $this->load->view('template', $data);

    }


    public function user_menu($param="")
    {
        if ($param != "") {
            $current_menu=$this->group_menu->where('group_id', $param)->get_all();
            $current_pre = [];
            if ($current_menu) {
                foreach ($current_menu as $value) {
                    $current_pre[] = (int)$value->menu_id;
                }
            }
            $data['current_perm'] = $current_pre;
            $data['menu'] = $this->menu->get_all();
        }
        if ($this->input->post()) {
            $menu = $this->input->post('menu');
            $this->group_menu->where('group_id', $param)->delete();
            if ($menu != null) {
                foreach ($menu as $value) {
                    $menu_data = [];
                    $menu_data['menu_id'] = $value;
                    $menu_data['group_id'] = $param;
                    $this->group_menu->insert($menu_data);
                }
            }
            $this->session->set_flashdata('message', 'updated');
            redirect(site_url('/user-menu'), 'refresh');
        }
        $data['current'] = "user menu";
        $data['title'] = "User Menu";
        $data['page'] = "user_menu";

        /*$data['users'] = $this->ion_auth->users()->result();
        foreach ($data['users'] as $k => $user) {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }*/
        $data['groups'] = $this->ion_auth->groups()->result();
        $this->load->view('template', $data);
    }


    public function group($param1="",$param2="")
    {
        if ($param1 == 'edit') {
            $this->data['current_group'] = $this->ion_auth->group($param2)->row();
        }
        if ($param1=='delete') {
            if ($param2 != "") {
                if ($this->ion_auth->delete_group($param2)) {
                    $this->session->set_flashdata('message', 'Deleted');
                    redirect(site_url('/group'), 'refresh');
                    exit;
                }else{
                    $this->session->set_flashdata('message', 'Delete error');
                    redirect(site_url('/group'), 'refresh');
                    exit;
                }
            }else{
                show_error('Something Went wrong');
            }
        }

        if ($this->input->post()) {
            if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
            {
                redirect('/', 'refresh');
            }

            // validate form input
            $this->form_validation->set_rules('name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|is_unique[xx_groups.name]');

            if ($this->form_validation->run() == TRUE)
            {
                if ($param1 == 'edit' and $param2 != "") {
                    if ( $this->ion_auth->update_group($param2, $this->input->post('name'), $this->input->post('description'))) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect(site_url('/group'), 'refresh');
                        exit;
                    } else {
                        $this->session->set_flashdata('error', 'Update error');
                        redirect(site_url('/group'), 'refresh');
                        exit;
                    }
                }

                $new_group_id = $this->ion_auth->create_group($this->input->post('name'), $this->input->post('description'));
                if($new_group_id)
                {
                    // check to see if we are creating the group
                    // redirect them back to the admin page
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect("group", 'refresh');
                }
            }else{
                // display the create group form
                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            }
        }
        $this->data['groups'] = $this->ion_auth->groups()->result();
        $this->data['current'] = "groups";
        $this->data['title'] = "Group";
        $this->data['page'] = "group";
        $this->data['groups'] = $groups = $this->ion_auth->groups()->result();
//        $this->_render_page('home/template', $this->data);
    }


    public function user_group()
    {
        $user_agy = $this->user_agency->get_all();
        foreach ($user_agy as $user) {
            $data = [];
            $data['user_id'] = $user->user_id;
            $data['group_id'] = $user->profile_id;
            $data['us_agy_id'] = $user->us_agy_id;
            if ($this->user_group->where('us_agy_id', $user->us_agy_id)->count_rows() == 0) {
                $this->user_group->insert($data);
            }
        }

    }


    /**
     *
     * login with each users in admin dashboard
     * @param $user_id
     * */
    public function user_login($user_id)
    {
        $user_agency = $this->user_agency->where('user_id', $user_id)->with_profile()->get_all();
        if ($user_agency != false) {
            if (count($user_agency) == 1) {
                $profile = $this->profile->where('profile_id', $user_agency[0]->profile_id)->get();
                $profile_group = $this->profile_group->where('profile_id', $profile->profile_id)->with_group()->get_all();
                $data['profile_name'] = $profile->profile_name;
                $data['profile_group'] = $profile_group;
            }else{
                //multiple agency here
            }
        }else{
//            No more agency here
        }
        $data['user_id'] = $user_id;
        $data['user'] = $user_agency[0];
        $data['page'] = 'user-dash';
        $data['title'] = 'dashboard';
        $this->load->view('user_login', $data);

    }


    public function add_credential($user_id="")
    {

        if ($this->input->post()) {
            $this->form_validation->set_rules('tab_086_credential_type', 'Credential Type', 'required');
            $this->form_validation->set_rules('credential_id', 'Credential_id', 'required');
            $this->form_validation->set_rules('expiration_date', 'Expiration Date', 'required');
            $this->form_validation->set_rules('alert_days', 'Alert Days', 'required|numeric');
            $this->form_validation->set_rules('notes', 'Notes', 'required');

            if (empty($_FILES['attachment']['name']))
            {
                $this->form_validation->set_rules('attachment', 'Document', 'required');
            }

            if ($this->form_validation->run() == TRUE) {

                $config['upload_path'] = getcwd() . '/uploads/credential/';
                $config['allowed_types'] = 'jpg|pdf|png';
                $config['file_name'] = time() . '_' . $_FILES["attachment"]['name'];
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('attachment'))
                {
//                    $this->user_credential->delete($user_credential_id);
                    $data['upload_error'] = array('error' => $this->upload->display_errors());
                }else{
                    $upload_data = $this->upload->data();

                    $attachment['attachment'] = $upload_data['file_name'];
                    $attachment_id = $this->user_credential_attachment->insert($attachment);
                    if ($attachment_id) {
//
                        $user_credential['tab_086_credential_type'] = $this->input->post('tab_086_credential_type');
                        $user_credential['credential_id'] = $this->input->post('credential_id');
                        $user_credential['expiration_date'] = date("Y-m-d", strtotime($this->input->post('expiration_date')));
                        $user_credential['alert_days'] = $this->input->post('alert_days');
                        $user_credential['notes'] = $this->input->post('notes');
                        if ($user_id != "") {
                            $user_credential['user_id'] = $user_id;
                        }else{
                            $user_credential['user_id'] = $this->ion_auth->user()->row()->id;
                        }
                        $user_credential['attachment_id'] = $attachment_id;
                        $user_credential['create_date_time'] = date('Y-m-d H:i:s a', time());

                        $user_credential_id = $this->user_credential->insert($user_credential);
                        if ($user_credential_id) {
                            $attachment = [];
                            $attachment['us1_user_credential_id'] = $user_credential_id;
                            $this->user_credential_attachment->update($attachment, $attachment_id);
                            if ($user_id != "") {
                                redirect(site_url('user-dash/' . $user_id . '/my-profile?tab=tab-credential'));
                            }else{
                                redirect(site_url('my-profile?tab=tab-credential'));
                            }
                        }else{
                            $this->attachment->delete($attachment_id);
                            if (file_exists(getcwd() . '/uploads/credential/' . $upload_data['file_name'])) {
                                unlink(getcwd() . '/uploads/credential/' . $upload_data['file_name']);
                            }
                        }
                    }else{
                        if (file_exists(getcwd() . '/uploads/credential/' . $upload_data['file_name'])) {
                            unlink(getcwd() . '/uploads/credential/' . $upload_data['file_name']);
                        }
                    }
                }




            }
        }

        $data['credential_types'] = $this->tab_parameter->where('tab_type', 86)->get_all();
        $data['current'] = "dashboard";
        $data['title'] = "Add Credential";
        $data['page'] = "add_credential";
        $this->load->view('template', $data);
    }

    public function edit_credential($id,$user_id="")
    {
        $data['credential'] = $this->user_credential->with_attachment()->where('user_credential_id', $id)->get();
        if ($this->input->post()) {
            $this->form_validation->set_rules('tab_086_credential_type', 'Credential Type', 'required');
            $this->form_validation->set_rules('credential_id', 'Credential_id', 'required');
            $this->form_validation->set_rules('expiration_date', 'Expiration Date', 'required');
            $this->form_validation->set_rules('alert_days', 'Alert Days', 'required|numeric');
            $this->form_validation->set_rules('notes', 'Notes', 'required');


            if ($this->form_validation->run() == TRUE) {
                if (!empty($_FILES['attachment']['name'])) {
                    $config['upload_path'] = getcwd() . '/uploads/credential/';
                    $config['allowed_types'] = 'jpg|pdf|png';
                    $config['file_name'] = time() . '_' . $_FILES["attachment"]['name'];
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload('attachment'))
                    {
//                    $this->user_credential->delete($user_credential_id);
                        $data['upload_error'] = array('error' => $this->upload->display_errors());
                    } else {
                        $upload_data = $this->upload->data();
                        $attachment['attachment'] = $upload_data['file_name'];
                        if (!$this->user_credential_attachment->update($attachment, $data['credential']->attachment_id)) {
                            $this->session->set_flashdata('error', 'Update Failed');
                            if ($user_id != '') {
                                redirect(site_url('user-dash/' . $user_id . '/my-profile?tab=tab-credential'));
                            }else{
                                redirect(site_url('my-profile?tab=tab-credential'));
                            }
                        }
                        if (file_exists(getcwd() . '/uploads/credential/' . $data['credential']->attachment->attachment)) {
                            unlink(getcwd() . '/uploads/credential/' . $data['credential']->attachment->attachment);
                        }
                    }
                }

                $user_credential['tab_086_credential_type'] = $this->input->post('tab_086_credential_type');
                $user_credential['credential_id'] = $this->input->post('credential_id');
                $user_credential['expiration_date'] = date("Y-m-d", strtotime($this->input->post('expiration_date')));
                $user_credential['alert_days'] = $this->input->post('alert_days');
                $user_credential['notes'] = $this->input->post('notes');
                $this->user_credential->update($user_credential, $id);
                $this->session->set_flashdata('message', 'Success');

                if ($user_id != '') {
                    redirect(site_url('user-dash/' . $user_id . '/my-profile?tab=tab-credential'));
                }else{
                    redirect(site_url('my-profile?tab=tab-credential'));
                }

//                if ($this->user_credential->update($user_credential,$id)) {
//                    $this->session->set_flashdata('message', 'Success');
//                    redirect(site_url('my-profile?tab=tab-credential'));
//                }
            }
        }

        $data['credential_types'] = $this->tab_parameter->where('tab_type', 86)->get_all();
        $data['current'] = "dashboard";
        $data['title'] = "Edit Credential";
        $data['page'] = "edit_credential";
        $data['user_id'] = $user_id;
        $this->load->view('template', $data);
    }


    public function edit_user_profile($user_id)
    {
        if ($this->input->get('tab')) {
            $data['active_tab'] = $this->input->get('tab');
        }

        if ($this->input->post()) {
            if ($this->input->post('tab') == 'myaccount') {
                $this->data['active_tab'] = 'tab-profile';
                $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
                $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_phone_label'), 'required');


                if ($this->form_validation->run() === TRUE) {
                    $data = [];
                    if ($this->input->post('user_email') != NULL) {
                        $data['user_email'] = $this->input->post('user_email');
                    }

                    $data['user_nick'] = $this->input->post('user_nick');
                    $data['first_name'] = $this->input->post('first_name');
                    $data['last_name'] = $this->input->post('last_name');
                    $data['address'] = $this->input->post('address');
                    $data['city'] = $this->input->post('city');
                    $data['state_id'] = $this->input->post('state_id');
                    $data['zip_code'] = $this->input->post('zip_code');
                    $data['phone_home'] = $this->input->post('phone_home');
                    $data['phone_cell'] = $this->input->post('phone_cell');

                    // check to see if we are updating the user
                    if ($this->ion_auth->update($user_id, $data)) {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    } else {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    }

                }
            } elseif ($this->input->post('tab') == 'change_password') {
                $this->data['active_tab'] = 'tab-change-password';
                if ($this->input->post('password')) {
                    $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm_password]');
                    $this->form_validation->set_rules('confirm_password', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
                }
                if ($this->form_validation->run() === TRUE) {
                    // update the password if it was posted
                    $data = [];
                    $data['password'] = $this->input->post('password');

                    // check to see if we are updating the user
                    if ($this->ion_auth->update($user_id, $data)) {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    } else {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    }

                }
            } elseif ($this->input->post('tab') == 'electronic_signature') {
                $this->data['active_tab'] = 'tab-electronic-signature';
                $this->form_validation->set_rules('electronic_signature', 'Electronic Password', 'required|matches[confirm_electronic_signature]');
                $this->form_validation->set_rules('confirm_electronic_signature', 'Confirm Electronic Password', 'required');
                if ($this->form_validation->run() == TRUE) {
                    $data = [];
                    $data['electronic_signature'] = $this->input->post('electronic_signature');

                    // check to see if we are updating the user
                    if ($this->ion_auth->update($user_id, $data)) {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    } else {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect(current_url() . '?tab=' . $this->data['active_tab'], 'refresh');

                    }
                }
            }

        }


        $data['user'] = $this->user->where('user_id', $user_id)->with_state()->get();
        $data['user_id'] = $user_id;
        $data['state'] = $this->state->get_all();
        $data['credentials'] = $this->user_credential->with('attachment')->get_all();
        $data['title'] = "Dashboard";
        $data['current'] = "dashboard";
        $data['page'] = "auth/edit_profile";
//        $data['page'] = 'user-dash';

        $data['min_length'] = $this->config->item('min_password_length', 'ion_auth');
        $data['max_length'] = $this->config->item('max_password_length', 'ion_auth');
        $data['type'] = 'ad_user';

        $user_agency = $this->user_agency->where('user_id', $user_id)->with_profile()->get_all();
        if ($user_agency != false) {
            if (count($user_agency) == 1) {
                $profile = $this->profile->where('profile_id', $user_agency[0]->profile_id)->get();
                $profile_group = $this->profile_group->where('profile_id', $profile->profile_id)->with_group()->get_all();
                $data['profile_name'] = $profile->profile_name;
                $data['profile_group'] = $profile_group;
            }else{
                //multiple agency here
            }
        }else{
//            No more agency here
        }

        $this->load->view('user_login', $data);
    }

    public function heatTicket()
    {
        $data['current'] = "heat-ticket";
        $data['title'] = "Heat Ticket";
        $data['page'] = "heat_ticket";
        $data['hot_tickets'] = $this->tic_ticket->with_user()->get_all();

        $this->load->view('template', $data);
    }


}
