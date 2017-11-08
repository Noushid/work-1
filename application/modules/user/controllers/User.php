<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Us1_user_model', 'us1_user');
        $this->load->library(['ion_auth']);
    }
	/**
	* User list
     * @return view
	*/
	public function index() {
        $data['current'] = "user-list";
        $data['title'] = "User List";
        $data['page'] = "user_list";
        $data['users'] = $this->us1_user->get_all();
        $this->load->view('home/template', $data);
	}

}
