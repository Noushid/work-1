<?php
/**
 * X_Profile.php
 * User: Noushid P
 * Date: 28/11/17
 * Time: 8:57 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('agency/Profile_model', 'profile');
        $this->load->model('X_Profile_Group_model', 'profile_group');
        $this->load->model('X_profile_group_applic_model', 'profile_group_applica');
        $this->load->model('application/X_application_model', 'x_application');
        $this->load->model('X_group_model', 'x_group');

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
    }

    public function index($param1="",$param2="") {
        $data['profiles'] = $this->profile->get_all();

        if ($param1 == 'edit') {
            $data['modal_opened'] = true;
            $data['current_profile'] = $this->profile->where('profile_id', $param2)->get();
        }

        if ($param1=='delete') {
            if ($param2 != "") {
                if ($this->profile->delete($param2)) {
                    $this->session->set_flashdata('message', 'One record Deleted');
                    redirect(site_url('/x-profile'), 'refresh');
                    exit;
                }else{
                    $this->session->set_flashdata('message', 'Delete failed');
                    redirect(site_url('/x-profile'), 'refresh');
                    exit;
                }
            }else{
                show_error('Something Went wrong');
            }
        }

        if ($this->input->post()) {
            if ($param1 == 'edit' and $param2 != "") {
                /*when  edit data first check posted data and db data on current row if changed check unique*/
                $profile_name = $this->profile->where('profile_id', $param2)->get()->profile_name;
                if($this->input->post('profile_name') != $profile_name) {
                    $is_unique = '|is_unique['.$this->profile->table.'.profile_name]';
                } else {
                    $is_unique =  '';
                }
                $this->form_validation->set_rules('profile_name', 'Profile Name', 'required' . $is_unique);
            }else{
                $this->form_validation->set_rules('profile_name', 'Profile Name', 'required|is_unique[' . $this->profile->table . '.profile_name]');
            }
            $this->form_validation->set_rules('profile_desc', 'Profile Desc', 'required');
            $this->form_validation->set_rules('show_manager', 'Show Manager', 'required');
            $this->form_validation->set_rules('show_independ', 'Show Independ', 'required');
            $this->form_validation->set_rules('show_independ', 'Show Independ', 'required');
            $this->form_validation->set_rules('profile_agency', 'Profile Agency', 'required');
            $this->form_validation->set_rules('profile_contractor', 'Profile Contractor', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [];
                $data['profile_name'] = $this->input->post('profile_name');
                $data['profile_desc'] = $this->input->post('profile_desc');
                $data['show_manager'] = $this->input->post('show_manager');
                $data['show_independ'] = $this->input->post('show_independ');
                $data['profile_agency'] = $this->input->post('profile_agency');
                $data['profile_contractor'] = $this->input->post('profile_contractor');

                /*
                 * If Edit
                 * */

                if ($param1 == 'edit' and $param2 != "") {
                    if ($this->profile->update($data ,$param2)) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect(site_url('/x-profile'), 'refresh');
                        exit;
                    } else {
                        $this->session->set_flashdata('error', 'Does\'t Updated');
                        redirect(site_url('/x-profile'), 'refresh');
                        exit;
                    }
                }

                /*data insert to DB*/
                if ($this->profile->insert($data)) {
                    $this->session->set_flashdata('message', 'profile added');
                    redirect(site_url('/x-profile'), 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Failed');
                    redirect(site_url('/x-profile'), 'refresh');
                }
            }else{
                $data['modal_opened'] = true;
            }

        }
        $data['title'] = "x-profile";
        $data['page'] = "profile";
        $data['current'] = "x-profile";
        $this->load->view('home/template', $data);
    }


    public function menu($profile_id,$param="")
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('group', 'Group Name', 'required');
            if ($this->form_validation->run() == TRUE) {
//                /*Insert to X_group table*/
//                $group_data['group_name'] = $this->input->post('group_name');
//                $group_data['orientation'] = $this->input->post('orientation');
//                $group_id = $this->x_group->insert($group_data);

                /*Insert to X_profile_group table*/
                $profile_group_data['group_id'] = $this->input->post('group');
                $profile_group_data['profile_id'] = $profile_id;
                $this->profile_group->insert($profile_group_data);
                redirect($this->agent->referrer(), 'refresh');
            }else{
                $data['modal_opened'] = true;
            }
            exit;
        }
        $profile_group = $this->profile_group->with_x_group()->where('profile_id', $profile_id)->get_all();
        if ($profile_group) {
            $data['profile_group'] = $profile_group;
        }
        $groups=$this->x_group->get_all();
        foreach ($groups as $group) {
            foreach ($profile_group as $key => $value) {
                if ($group->group_id == $value->group_id) {
                    unset($groups[$key]);
                }
            }
        }

        $data['groups'] = $groups;
        $data['title'] = "profile group";
        $data['page'] = "profile_group";
        $data['profile_id'] = $profile_id;
        $data['current'] = "profile group";

        $this->load->view('home/template', $data);
    }

    public function profile_action($param="",$param1 = "", $param2="")
    {
        if ($param1 == 'edit') {
            $data['modal_opened'] = true;
            $data['current_profile_group'] = $this->profile_group->where('profile_group_id', $param2)->with_x_group()->get();
            if ($this->input->post()) {
                $this->form_validation->set_rules('group_name', 'Group Name', 'required');
                if ($this->form_validation->run() == TRUE) {
                    $group_id = $data['current_profile_group']->group_id;
                    $group_data['group_name'] = $this->input->post('group_name');
                    $group_data['orientation'] = $this->input->post('orientation');
                    if ($this->x_group->update($group_data, $group_id)) {
                        redirect(site_url('x-profile/' . $param), 'refresh');
                    }
                }
            }
        }

        $data['title'] = "Profile group";
        $data['page'] = "profile_group";
        $data['profile_id'] = $param;
        $data['current'] = "Profile group";
        $this->load->view('home/template', $data);
    }

    public function application($param="",$profile_group_id)
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('application', 'Application', 'required');
            if ($this->form_validation->run() == TRUE) {

                /*Insert to x_profile_group_applica*/
                $x_prfl_application_data['profile_group_id'] = $profile_group_id;
                $x_prfl_application_data['application_id'] = $this->input->post('application');
                $this->profile_group_applica->insert($x_prfl_application_data);

                redirect($this->agent->referrer(), 'refresh');
                exit;
            }else{
                $data['modal_opened'] = true;
            }
        }
        $applications = $this->profile_group_applica->with_x_application()->where('profile_group_id', $profile_group_id)->get_all();
        if ($applications) {
            $data['applications'] = $applications;
        }

        $applications_all = $this->x_application->get_all();

        foreach ($applications_all as $application) {
            foreach ($applications as $key => $value) {
                if ($application->application_id == $value->application_id) {
                    unset($applications_all[$key]);
                }
            }
        }

        $data['applications_all'] = $applications_all;
        $data['title'] = "application";
        $data['profile_id'] = $param;
        $data['profile_group_id'] = $profile_group_id;
        $data['page'] = "applications";
        $data['current'] = "application";

        $this->load->view('home/template', $data);
    }



    /*
     * To delete profile_group_application (from profile_group_applica)
     * */
    public function delete_application($x_application_id)
    {
        if ($this->profile_group_applica->delete($x_application_id)) {
            redirect($this->agent->referrer(), 'refresh');
        }
    }

    /*
     * To delete profile group data (from x_profile_group)
     * */
    public function delete_profile_group ($profile_group_id)
    {
        if ($this->profile_group->where('profile_group_id', $profile_group_id)->delete()) {
            redirect($this->agent->referrer(), 'refresh');
        }
    }


    public function test()
    {
        var_dump($this->user_agency->where('user_id' , 22)->get_all());
    }

}

