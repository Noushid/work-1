<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Agy_agency_comments_model extends MY_Model
{

    public $table = 'agy_agency_comments';
    public $primary_key = 'agy_agency_comments_id';
    function __construct()
    {
        $this->has_one['agency'] = array('foreign_model' => 'home/Agency_model', 'foreign_table' => 'agy_agency', 'foreign_key' => 'agency_id', 'local_key' => 'agy_agency_comments_id');

        parent::__construct();
        $this->timestamps = TRUE;
    }

}