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
        $this->load->model('Us1_user_model', 'us1_user');
        $this->load->model('Profile_model', 'profile');

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
    public function index($param1="",$param2="",$param3="") {

        $data['agencies'] = $this->agency->get_all();
        $data['title'] = "Agency";
        $data['page'] = "agency";

        if ($param1 == 'edit') {
            $data['modal_opened'] = true;
            $data['current_agency'] = $this->agency->where('agency_id', $param2)->get();
        }

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

        if ($param1 == 'show') {
            if ($param1 != "") {
                $data['agency'] = $this->user_agency->select_where(['agency_id' => $param2]);
                $data['title'] = "Agency";
                $data['title'] = "Agency";
                $data['page'] = "agency_single";
            }
        }

        if ($this->input->post()) {
            if ($param1 == 'edit' and $param2 != "") {
                $this->form_validation->set_rules('agency_name', 'agency_name', 'required');
            }else{
                $this->form_validation->set_rules('agency_name', 'agency_name', 'required|is_unique[agy_agency.agency_name]');
            }
            if ($this->form_validation->run() == TRUE) {
                $form_data = [];
                $form_data['agency_name'] = $this->input->post('agency_name');
                $form_data['agency_type'] = $this->input->post('agency_type');
                $form_data['agency_status'] = $this->input->post('agency_status');
                $form_data['contact_name'] = $this->input->post('contact_name');
                $form_data['contact_phone'] = $this->input->post('contact_phone');
                $form_data['create_datetime'] = now();

                if ($param1 == 'edit' and $param2 != "") {
                    $form_data['modify_datetime'] = now();
                    if ($this->agency->update($form_data ,$param2)) {
                        $this->session->set_flashdata('message', 'Updated');
                        redirect(site_url('/agency'), 'refresh');
                        exit;
                    } else {
                        $this->session->set_flashdata('error', 'Does\'t Updated');
                        redirect(site_url('/agency'), 'refresh');
                        exit;
                    }
                }

                if ($this->agency->insert($form_data)) {
                    $this->session->set_flashdata('message', 'Added');
                    redirect(site_url('/agency'), 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Added');
                    redirect(site_url('/agency'), 'refresh');
                }
            }else{
                $data['modal_opened'] = true;
            }
        }


        $data['current'] = "Agency";
        $this->load->view('home/template', $data);
    }

}
