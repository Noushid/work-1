<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 * @package Model
 * Date created:October 09,2017
 * @author Krishna Bhatta <krishna_bhatta@outlook.com>
 */
class User_model extends CI_Model {
    
    /**
     * Getting user name and email address with correct condition
     * @param array $where
     * @return boolean or object
     */
    public function get_user($where) {
        $this->db->select('user_id,first_name, last_name,user_email');
        $this->db->where($where);
        $query = $this->db->get('us1_user');

        if($query->num_rows() == 0) {
            return false;
        } else {
            return $query->row();
        }
    }
    
    /**
     * Updating user based on condition
     * @param array $where
     * @param array $data
     * @return boolean or object
     */
    public function update_user($where, $data) {
        if($this->get_user($where)) {
            $this->db->where($where);
            $this->db->update('us1_user', $data);
        } else {
            return false;
        }
    }
}

/* End of file user_model.php
 * Location: ./application/modules/user/models/home_model.php */