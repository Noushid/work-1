<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 9:52 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Agency_model', 'agency');
        $this->load->model('User_agency_model', 'user_agency');
        $this->load->model('user/Us1_user_model', 'us1_user');
        $this->load->model('Profile_model', 'profile');
        $this->load->model('Tab_parameter_model', 'tab_parameter');
        $this->load->model('Dis_discipline_model', 'discipline');
        $this->load->model('home/User_group_model', 'user_group');
        $this->load->model('agency/Agency_contractor_model', 'agency_contractor');
        $this->load->model('agency/Agency_doctor_office_model', 'agency_doctor_ofc');
        $this->load->model('agency/Agy_agency_comments_model', 'agency_comment');
        $this->load->model('agency/Pat_patient_model', 'pat_patient');
        $this->load->model('agency/Soc_start_of_care_model', 'soc_start_of_care');
        $this->load->model('agency/Cms_485_model', 'cms485');
        $this->load->model('agency/Vis_visit_log_model', 'vis_visit');
        $this->load->model('agency/Vit_visit_type_model', 'visit_type');

        $this->load->library(['ion_auth']);
        /*
         * Check login
         * */
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
        if (!$this->ion_auth->is_admin()) {
            show_404();
        }
    }

    /**
     * Dashboard area
     *
     */
    public function index($param1="",$param2="",$param3="") {

        $data['agencies'] = $this->agency->with_state()->get_all();
        $data['states'] = $this->state->get_all();
        $data['title'] = "Agency";
        $data['page'] = "agency";
        /*
         * edit agency
         *  */
        if ($param1 == 'edit') {
            $data['modal_opened'] = true;
            $data['current_agency'] = $this->agency->where('agency_id', $param2)->get();
        }

        /*delete agency*/
        if ($param1=='delete') {
            if ($param2 != "") {
                if ($this->agency->delete($param2)) {
                    $this->session->set_flashdata('message', 'Deleted');
                    redirect(site_url('/agency'), 'refresh');
                    exit;
                }else{
                    $this->session->set_flashdata('message', 'Delete error');
                    redirect(site_url('/agency'), 'refresh');
                    exit;
                }
            }else{
                show_error('Something Went wrong');
            }
        }


        if ($this->input->post()) {
            if ($param1 == 'edit' and $param2 != "") {
                $agency_name = $this->agency->where('agency_id', $param2)->get()->agency_name;
                if($this->input->post('agency_name') != $agency_name) {
                    $is_unique = '|is_unique[agy_agency.agency_name]';
                } else {
                    $is_unique =  '';
                }
                $this->form_validation->set_rules('agency_name', 'Agency name', 'required' . $is_unique);
                $this->form_validation->set_rules('agency_type', 'agency type', 'required');
                $this->form_validation->set_rules('agency_status', 'agency status', 'required');
                $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
                $this->form_validation->set_rules('contact_phone', 'Contact phone', 'required');
            }else{
                $this->form_validation->set_rules('agency_name', 'agency_name', 'required|is_unique[agy_agency.agency_name]');
                $this->form_validation->set_rules('agency_type', 'agency type', 'required');
                $this->form_validation->set_rules('agency_status', 'agency status', 'required');
                $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
                $this->form_validation->set_rules('contact_phone', 'Contact phone', 'required');
            }
            if ($this->form_validation->run() == TRUE) {
                $form_data = [];
                $form_data['agency_name'] = $this->input->post('agency_name');
                $form_data['agency_type'] = $this->input->post('agency_type');
                $form_data['agency_status'] = $this->input->post('agency_status');
                $form_data['contact_name'] = $this->input->post('contact_name');
                $form_data['state_id'] = $this->input->post('state');

                $form_data['address'] = $this->input->post('address');
                $form_data['city'] = $this->input->post('city');
                $form_data['zip'] = $this->input->post('zip');
                $form_data['tab_066_time_zone'] = $this->input->post('timezone');
                $form_data['fax'] = $this->input->post('fax');
                $form_data['agency_email'] = $this->input->post('agency_email');
                $form_data['web_address'] = $this->input->post('web_address');
                $form_data['po_box_address'] = $this->input->post('po_box_address');
                $form_data['po_box_city'] = $this->input->post('po_box_city');
                $form_data['po_box_state_id'] = $this->input->post('po_box_state_id');
                $form_data['po_zip1'] = $this->input->post('po_zip1');

                $phone = str_replace([' ', '(', ')','--'], '-', $this->input->post('contact_phone'));
                $phone = ltrim($phone, '-');
                $form_data['contact_phone'] = $phone;

                if ($param1 == 'edit' and $param2 != "") {
                    $form_data['modify_datetime'] = now();
                    if ($this->agency->update($form_data ,$param2)) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect($this->agent->referrer(), 'refresh');
                    } else {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect($this->agent->referrer(), 'refresh');
                    }
                }

                $form_data['create_datetime'] =  date("Y-m-d H:i:s");
                if ($this->agency->insert($form_data)) {
                    $this->session->set_flashdata('message', 'Added');
                    redirect(site_url('/agency'), 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Added');
                    redirect(site_url('/agency'), 'refresh');
                }
            }else{
                if ($param1 == 'edit' and $param2 != "") {
                    $data['agency'] = $this->user_agency->select_where(['agency_id' => $param2]);
                    $data['page'] = "agency_single";
                    $data['modal_opened'] = false;
                }else{
                    $data['modal_opened'] = true;
                }
            }
        }


        $data['current'] = "agency";
        $this->load->view('home/template', $data);
    }

    public function create()
    {
        $data['agencies'] = $this->agency->with_state()->get_all();
        $data['timezone'] = $this->tab_parameter->where('tab_type', 66)->get_all();
        $data['states'] = $this->state->get_all();
        $data['title'] = "Agency";
        $data['page'] = "add_agency";

        if ($this->input->post()) {
        }

        $data['current'] = "agency";
        $this->load->view('home/template', $data);
    }


    public function agency_single($param1,$param2="",$param3="")
    {
        $data['agency_id'] = $param1;
        $data['agency'] = $this->user_agency->select_where(['agency_id' => $param1]);
        $data['contractors'] = $this->agency_contractor->where('agency_id', $param1)->with('agency')->set_cache('get_contractors')->get_all();
        $data['doctors'] = $this->agency_doctor_ofc->where('agency_id', $param1)->with('agency')->set_cache('get_doctors')->get_all();
        $data['comments'] = $this->agency_comment->where('agency_id', $param1)->set_cache('get_comments')->get_all();

        $patients =
        $data['patients'] = $this->pat_patient->where('agency_id', $param1)->set_cache('get_patients')->get_all();

        /**
         * Get Visit log
        */

        /*STEP 1*/
        /*Get All patients id related to agency*/
        $patient_ids = $this->pat_patient->where('agency_id', $param1)->fields('patient_id')->get_all();

        /*STEP 2*/
        /*Get all admissions(soc_start_of_care) related to their patients*/
        $soc = [];
        if ($patient_ids != false) {
            foreach ($patient_ids as $pat_id) {
                $temp = $this->soc_start_of_care->where('patient_id', $pat_id->patient_id)->get_all();
                $soc[] = $temp;
            }
            $admissions = array_flatten($soc);
        }

        /*STEP 3*/
        /*Get all episode(cms_485) related to their admissions*/
        $cms485 = [];
        if (isset($admissions) and $admissions != false) {
            foreach ($admissions as $adm) {
                if ($adm != false) {
                    $temp = $this->cms485->where('soc_id', $adm->soc_id)->get_all();
                    $cms485[] = $temp;
                }
            }
            $episodes = array_flatten($cms485);
        }

        /*STEP 4*/
        /*Get all visit logs(vis_visit_log) related to their episode*/
        $visit_logs = [];
        if (isset($episodes) and $episodes != false) {
            foreach ($episodes as $epsd) {
                if ($epsd != false) {
                    $temp = $this->vis_visit->where('cms485_id', $epsd->cms485_id)->with_visit_type()->get_all();
                    $visit_logs[] = $temp;
                }
            }
            $data['visit_logs'] = array_flatten($visit_logs);
        }else{
            $data['visit_logs'] = false;
        }
        /*End*/

        $exist_agency = [];
        if ($data['contractors']) {
            foreach ($data['contractors'] as $value) {
                $exist_agency[] = $value->agency->agency_id;
            }
        }

        /*get new contractor*/
        $this->db->from('agy_agency');
        $this->db->where('state_id', $data['agency']->state_id);
        $this->db->where('agency_type', 'C');
        if (!empty($exist_agency)) {
            $this->db->where_not_in('agency_id', $exist_agency);
        }
        $query = $this->db->get();
        $data['new_contractors'] = ($query->num_rows() > 0 ? $query->result() : FALSE);
        /*End*/

        /*get new doctors*/

        $exist_doctor = [];
        if ($data['doctors']) {
            foreach ($data['doctors'] as $value1) {
                $exist_doctor[] = $value1->agency->agency_id;
            }
        }

        $this->db->from('agy_agency');
        $this->db->where('state_id', $data['agency']->state_id);
        $this->db->where('agency_type', 'D');
        if (!empty($exist_doctor)) {
            $this->db->where_not_in('agency_id', $exist_doctor);
        }
        $query = $this->db->get();
        $data['new_doctors'] = ($query->num_rows() > 0 ? $query->result() : FALSE);


        $data['states'] = $this->state->get_all();
        $data['users'] = $this->us1_user->get_all();
        $data['user_status'] = $this->tab_parameter->where('tab_type', 21)->get_all();
        $data['profile'] = $this->profile->get_all();
        $data['discipline'] = $this->discipline->get_all();
        $data['employee_type'] = $this->tab_parameter->where('tab_type', 6)->get_all();
        $data['active_tab'] = 'tab-1';
        if ($this->input->get('tab')) {
            $data['active_tab'] = $this->input->get('tab');
        }

        /*
         * If edit get appropriate date form DB
        */
        if ($param2 == 'edit') {
            $data['crnt_agy_usr'] = $this->user_agency->with_user()->where('us_agy_id', $param3)->get();
            $data['modal_opened'] = true;
            $data['active_tab'] = 'tab-3';
            $data['action'] = 'edit';
        }

        /*
         * If edit get appropriate date form DB
        */
        if ($param2 == 'delete') {
            if ($this->user_agency->delete($param3)) {
                $this->session->set_flashdata('message', 'Data deleted.');
                redirect(site_url('agency/' . $param1), 'refresh');
                exit;
            }else{
                $this->session->set_flashdata('error', 'Delete Failed.');
                redirect(site_url('agency/' . $param1), 'refresh');
                exit;
            }
        }

        /*
         * If data posted form view
        */
        if ($this->input->post()) {
            /**
             *
             * validation Post data
             **/
            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('profile', 'Profile', 'required');
            $this->form_validation->set_rules('discipline', 'Discipline', 'required');
            $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');
            if ($this->input->post('email') != NULL) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            }
            if ($param2 != 'edit') {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            }

            /*
             * validation success
             * */
            if ($this->form_validation->run() == TRUE) {
                /*
                 *delete masks from phone number
                 *  */
                $phone = str_replace([' ', '(', ')','--'], '-', $this->input->post('phone'));
                $phone = ltrim($phone, '-');
                if ($param2 == 'edit') {
                    $form_data['first_name'] = $this->input->post('first_name');
                    $form_data['last_name'] = $this->input->post('last_name');
                    $form_data['middle_initial'] = $this->input->post('middle_name');
                    $form_data['user_email'] = $this->input->post('email');
                    $form_data['phone_home'] = $phone;
                    $form_data['date_birth'] = date('Y-m-d', strtotime($this->input->post('dob')));
                    $form_data['profile_id'] = $this->input->post('profile');
                    $form_data['discipline_id'] = $this->input->post('discipline');
                    $form_data['tab_021_user_status'] = $this->input->post('status');
                    $form_data['tab_006_employee_type'] = $this->input->post('employee_type');
                    $us_agy_update = $this->user_agency->update($form_data, $param3);
                    if ( $us_agy_update >= 0 ) {
                        $this->session->set_flashdata('message', 'Data Updated.');
                        $this->session->set_flashdata('active_tab', 'tab-3');
                        redirect(site_url('agency/' . $param1), 'refresh');
                        exit;
                    }else{
                        $this->session->set_flashdata('error', 'Update Failed.');
                        $this->session->set_flashdata('active_tab', 'tab-3');
                        redirect(site_url('agency/' . $param1), 'refresh');
                        exit;
                    }
                }
                /**
                 *insert data
                 **/
                $user = $this->us1_user->where('user_email', $this->input->post('email'))->get();

                /*
                 * If user not exist in us1_user table
                 * create new record both table us1_user and us_agy
                 *  */
                if ($user == FALSE) {
                    $form_data = [];
                    $form_data['first_name'] = $this->input->post('first_name');
                    $form_data['last_name'] = $this->input->post('last_name');
                    $form_data['middle_initial'] = $this->input->post('middle_name');
                    $form_data['user_email'] = $this->input->post('email');
                    $form_data['phone_home'] = $phone;
                    $form_data['creation_datetime'] = date('Y-m-d h:i:s', time());
                    $form_data['password'] = '21232f297a57a5a743894a0e4a801fc3';
                    $form_data['active'] = 1;
                    $user_id = $this->us1_user->insert($form_data);
                    unset($form_data['creation_datetime']);
                    if ($user_id) {
                        unset($form_data['first_name']);
                        unset($form_data['password']);
                        unset($form_data['active']);
                        $form_data['first_name'] = $this->input->post('first_name');
                        $form_data['user_id'] = $user_id;
                        $form_data['date_birth'] = $this->input->post('dob');
                        $form_data['profile_id'] = $this->input->post('profile');
                        $form_data['discipline_id'] = $this->input->post('discipline');
                        $form_data['tab_021_user_status'] = $this->input->post('status');
                        $form_data['tab_006_employee_type'] = $this->input->post('employee_type');
                        $form_data['agency_id'] = $param1;

                        /*insert record to us_agy table*/
                        $us_agy_id = $this->user_agency->insert($form_data);

                        if ($us_agy_id) {
                            /*
                             * Add data to xx_users_group
                             * */
                            $users_group_data['user_id'] = $user_id;
                            $users_group_data['group_id'] = $form_data['profile_id'];
                            $users_group_data['us_agy_id'] = $us_agy_id;
                            $this->user_group->insert($users_group_data);

                            $this->session->set_flashdata('message', 'New User added.');
                            $this->session->set_flashdata('active_tab', 'tab-3');
                            redirect(site_url('agency/' . $param1), 'refresh');
                        } else {
                            $this->session->set_flashdata('error', 'Something Went wrong! try again later');
                            $this->session->set_flashdata('active_tab', 'tab-3');
                            log_message('debug', 'insert error to us_agy table');
                            redirect(site_url('agency/' . $param1), 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Something Went wrong! try again later');
                        $this->session->set_flashdata('active_tab', 'tab-3');
                        log_message('debug', 'insert error to us1_user table');
                        redirect(site_url('agency/' . $param1), 'refresh');
                    }
                }else{
                    /*
                     * If user exist in us1_user table
                     * create new record in us_agy
                    **/
                    $form_data = [];
                    $form_data['first_name'] = $this->input->post('first_name');
                    $form_data['last_name'] = $this->input->post('last_name');
                    $form_data['middle_initial'] = $this->input->post('middle_name');
                    $form_data['user_email'] = $this->input->post('email');
                    $form_data['phone_home'] = $phone;

//                    $this->us1_user->update($form_data, $user->user_id);
                    unset($form_data['first_name']);
                    $form_data['first_name'] = $this->input->post('first_name');
                    $form_data['user_id'] = $user->user_id;
                    $form_data['date_birth'] = $this->input->post('dob');
                    $form_data['profile_id'] = $this->input->post('profile');
                    $form_data['discipline_id'] = $this->input->post('discipline');
                    $form_data['tab_021_user_status'] = $this->input->post('status');
                    $form_data['tab_006_employee_type'] = $this->input->post('employee_type');
                    $form_data['agency_id'] = $param1;

                    if ($this->user_agency->where('user_id',$user->user_id)->where('agency_id',$param1)->get() == FALSE) {
                        $us_agy_id = $this->user_agency->insert($form_data);
                        if ($us_agy_id) {
                            /*
                             * Add data to xx_users_group
                             * */
                            $users_group_data['user_id'] = $user->user_id;
                            $users_group_data['group_id'] = $form_data['profile_id'];
                            $users_group_data['us_agy_id'] = $us_agy_id;
                            $this->user_group->insert($users_group_data);

                            $this->session->set_flashdata('message', 'New User added.');
                            $this->session->set_flashdata('active_tab', 'tab-3');
                            redirect(site_url('agency/' . $param1), 'refresh');
                        }else{
                            $this->session->set_flashdata('error', 'Something Went wrong! try again later');
                            $this->session->set_flashdata('active_tab', 'tab-3');
                            log_message('debug', 'update error to us_agy table');
                            redirect(site_url('agency/' . $param1), 'refresh');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'User already exist');
                    }
                }
            }else{
                $data['modal_opened'] = true;
            }
        }

        $data['title'] = "Agency";
        $data['page'] = "agency_single";

        $data['current'] = "Agency";
        $this->load->view('home/template', $data);
    }

    public function get_user($param)
    {
        $user = $this->us1_user->where('user_id', $param)->get();
        $this->output->set_content_type('application/json')->set_output(json_encode($user));
    }


    public function add_contractor($agency_id)
    {
        $data['contractor_id'] = $this->input->post('contractor');
        $data['agency_id'] = $agency_id;
        $contractor = $this->agency_contractor->insert($data);
        if ($contractor) {
            $response = $this->agency_contractor->where('agency_contractor_id', $contractor)->with('agency')->get();
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }else{
            $this->output->set_status_header(400, 'Server Down');
            $this->output->set_output('error');
        }
    }

    public function add_comment($agency_id)
    {

        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header(400, 'Validation Error');
            $this->output->set_content_type('application/json')->set_output(json_encode($this->form_validation->get_errors()));
        }else{
            $data['comment'] = $this->input->post('comment');
            $data['review_date'] = date('Y-m-d', strtotime($this->input->post('reviewDate')));
            $data['agency_id'] = $agency_id;
            $comment = $this->agency_comment->insert($data);
            if ($comment) {
                $response = $this->agency_comment->where($comment)->get();
                $response->created_at = date('m-d-Y', strtotime($response->created_at));
                $response->review_date = date('m-d-Y', strtotime($response->review_date));
                $this->output->set_content_type('application/json')->set_output(json_encode($response));
            }else{
                $this->output->set_status_header(400, 'Server Down');
                $this->output->set_output('error');
            }
        }
    }


    public function get_comment($id)
    {
        $comment = $this->agency_comment->where($id)->get();
        $this->output->set_content_type('application/json')->set_output(json_encode($comment));
    }

    public function edit_comment($id)
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header(400, 'Validation Error');
            $this->output->set_content_type('application/json')->set_output(json_encode($this->form_validation->get_errors()));
        }else{
            $data['comment'] = $this->input->post('comment');
            $data['review_date'] = date('Y-m-d', strtotime($this->input->post('reviewDate')));
            $comment = $this->agency_comment->update($data, $id);
            if ($comment) {
                $response = $this->agency_comment->where($id)->get();
                $response->created_at = date('m-d-Y', strtotime($response->created_at));
                $response->review_date = date('m-d-Y', strtotime($response->review_date));
                $this->output->set_content_type('application/json')->set_output(json_encode($response));
            }else{
                $this->output->set_status_header(400, 'Server Down');
                $this->output->set_output('error');
            }
        }
    }

    public function delete_comment($id)
    {
        if ($this->agency_comment->delete($id)) {
            $this->output->set_output('success');
        }else{
            $this->output->set_status_header(400, 'Server Down');
            $this->output->set_output('error');
        }
    }


    public function add_doctor($agency_id)
    {
        $insert_id = [];
        foreach ($this->input->post('doctor') as $doctor) {
            $data = [];
            $data['doctor_office_id'] = $doctor;
            $data['agency_id'] = $agency_id;

            $doctor = $this->agency_doctor_ofc->insert($data);
            $insert_id[] = $doctor;
        }

        redirect(site_url('agency/' . $agency_id . '#doctors'));

//        if (!empty($insert_id)) {
//            $response = $this->agency_doctor_ofc->where('agency_doctor_office_id', $insert_id)->with('agency')->get_all();
//            $this->output->set_content_type('application/json')->set_output(json_encode($response));
//        }else{
//            $this->output->set_status_header(400, 'Server Down');
//            $this->output->set_output('error');
//        }
    }

    public function test()
    {
        var_dump($this->user_agency->where('user_id' , 22)->get_all());
    }

}

