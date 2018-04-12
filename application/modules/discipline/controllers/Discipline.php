<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/4/18
 * Time: 9:52 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Discipline extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dis_discipline_model', 'dis_discipline');
        $this->load->model('Vit_visit_type_discip_model', 'vit_visit_type_discip');
        $this->load->model('Vit_visit_type_model', 'vit_visit_type');

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
     *
     */
    public function index()
    {
        $data['title'] = 'Discipline';
        $data['current'] = "discipline";
        $data['page'] = "discipline";
        $data['disciplines'] = $this->dis_discipline->get_all();
        $this->load->view('home/template', $data);
    }

    public function visit_type($discipline_id)
    {
        $data['title'] = 'Discipline';
        $data['current'] = "discipline";
        $data['page'] = "visit_type";
        $data['visit_types'] = $this->vit_visit_type_discip->where('discipline_id', $discipline_id)->with_visitType('fields:visit_description')->get_all();
        $data['discipline_name'] = $this->dis_discipline->where('discipline_id', $discipline_id)->get();

        $exist_visit_type = [];
        if ($data['visit_types']) {
            foreach ($data['visit_types'] as $value) {
                $exist_visit_type[] = $value->visit_type_id;
            }
        }
        /*get new visit type*/
        $this->db->from('vit_visit_type');
        if (!empty($exist_visit_type)) {
            $this->db->where_not_in('visit_type_id', $exist_visit_type);
        }
        $query = $this->db->get();
        $data['new_visit_types'] = ($query->num_rows() > 0 ? $query->result() : FALSE);
        /*End*/

        $this->load->view('home/template', $data);
    }

    public function visit_type_delete($discipline_id, $visit_id)
    {
        $visit = $this->vit_visit_type_discip->where('visit_type_disc_id', $visit_id)->get();
        if ($this->vit_visit_type_discip->delete($visit_id)) {
            $response['data'] = $this->vit_visit_type->where('visit_type_id', $visit->visit_type_id)->get();
            $response['message'] = 'Record Successfully Deleted';
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }else{
            $response['message'] = 'Try Again Later';
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
    }

    /**
     * Add Visit type
     *
     **/

    public function visit_type_add($discipline_id)
    {
        $this->form_validation->set_rules('visit_type', 'Visit Type', 'required|numeric');
        if ($this->form_validation->run() === true) {
            $data['visit_type_id'] = $this->input->post('visit_type');
            $data['discipline_id'] = $discipline_id;
            $query = $this->vit_visit_type_discip->insert($data);
            if ($query) {
                $response = $this->vit_visit_type_discip->where('visit_type_disc_id', $query)->with_visitType('fields:visit_description')->get();
                $this->output->set_content_type('application/json')->set_output(json_encode($response));
            }else{
                $this->output->set_status_header(400, 'Server Down');
                $this->output->set_output('error');
            }
        }else{
            $this->output->set_status_header(400, 'Validation error');
            $this->output->set_content_type('application/json')->set_output(json_encode($this->form_validation->get_errors()));
        }
    }

}

