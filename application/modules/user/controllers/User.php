<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Us1_user_model', 'us1_user');
        $this->load->model('agency/Agency_model', 'agency');
//        $this->load->model('User_agency_model', 'user_agency');
//        $this->load->model('Profile_model', 'profile');
//        $this->load->model('Tab_parameter_model', 'tab_parameter');
//        $this->load->model('Dis_discipline_model', 'discipline');
//        $this->load->model('home/User_group_model', 'user_group');
//        $this->load->model('agency/Agency_contractor_model', 'agency_contractor');
//        $this->load->model('agency/Agency_doctor_office_model', 'agency_doctor_ofc');
//        $this->load->model('agency/Agy_agency_comments_model', 'agency_comment');
        $this->load->model('agency/Pat_patient_model', 'pat_patient');
//        $this->load->model('agency/Soc_start_of_care_model', 'soc_start_of_care');
//        $this->load->model('agency/Cms_485_model', 'cms485');
//        $this->load->model('agency/Vis_visit_log_model', 'vis_visit');
//        $this->load->model('agency/Vit_visit_type_model', 'visit_type');


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

    /**
     * Get Patient list associate current agency
     * @return view
     */
    public function patient()
    {
        $agency_id = $this->session->userdata('agency')->agency_id;
        $patients = $this->pat_patient->where('agency_id', $agency_id)->get_all();

        $data['current'] = "Patients List";
        $data['title'] = "Patients List";
        $data['page'] = "patient_list";
        $data['patients'] = $patients;
        $this->load->view('home/template', $data);
    }

}
