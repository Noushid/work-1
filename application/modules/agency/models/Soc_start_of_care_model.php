<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Soc_start_of_care_model extends MY_Model
{

    public $table = 'soc_start_of_care';
    public $primary_key = 'soc_id';
    function __construct()
    {
        $this->has_one['patient'] = array('foreign_model' => 'home/Pat_patient_model', 'foreign_table' => 'pat_patient', 'foreign_key' => 'patient_id', 'local_key' => 'patient_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}