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
    public $delete_cache_on_save = TRUE;
    function __construct()
    {
        $this->has_one['agency'] = array('foreign_model' => 'home/Agency_model', 'foreign_table' => 'agy_agency', 'foreign_key' => 'agency_id', 'local_key' => 'doctor_office_id');
        $this->has_one['agencies'] = array('foreign_model' => 'home/Agency_model', 'foreign_table' => 'agy_agency', 'foreign_key' => 'agency_id', 'local_key' => 'agency_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}