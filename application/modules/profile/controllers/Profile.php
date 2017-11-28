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

    public function test()
    {
        var_dump($this->user_agency->where('user_id' , 22)->get_all());
    }

}

