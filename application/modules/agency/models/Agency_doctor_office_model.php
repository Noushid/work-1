<?php
/**
 * Agency_doctor_office_model.php
 * User: Noushid P
 * Date: 19/1/18
 * Time: 4:00 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Agency_doctor_office_model extends MY_Model
{

    public $table = 'agency_doctor_office';
    public $primary_key = 'agency_doctor_office_id';
    function __construct()
    {
//        $this->has_one['state'] = array('foreign_model' => 'home/State_model', 'foreign_table' => 'sta_states', 'foreign_key' => 'state_id', 'local_key' => 'state_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}