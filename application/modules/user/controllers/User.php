<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Us1_user_model', 'us1_user');
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
	* User list
     * @return view
	*/
	public function index() {
        $data['current'] = "user list";
        $data['title'] = "User List";
        $data['page'] = "user_list";
        $data['users'] = $this->us1_user->get_all();
        $this->load->view('home/template', $data);
	}

}
