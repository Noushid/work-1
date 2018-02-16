<?php
/**
 * agency_contractor_model.php
 * User: Noushid P
 * Date: 19/1/18
 * Time: 3:47 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class agency_contractor_model extends MY_Model
{

    public $table = 'agency_contractor';
    public $primary_key = 'agency_contractor_id';
    function __construct()
    {
//        $this->has_one['state'] = array('foreign_model' => 'home/State_model', 'foreign_table' => 'sta_states', 'foreign_key' => 'state_id', 'local_key' => 'state_id');
        $this->has_one['agency'] = array('foreign_model' => 'home/Agency_model', 'foreign_table' => 'agy_agency', 'foreign_key' => 'agency_id', 'local_key' => 'contractor_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}