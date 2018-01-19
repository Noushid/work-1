<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Agency_model extends MY_Model
{

    public $table = 'agy_agency';
    public $primary_key = 'agency_id';
    function __construct()
    {
//        $this->has_many['subMenu'] = array('foreign_model' => 'home/Sub_menu_model', 'foreign_table' => 'xx_sub_menu', 'foreign_key' => 'menu_id', 'local_key' => 'id');
        $this->has_one['state'] = array('foreign_model' => 'home/State_model', 'foreign_table' => 'sta_states', 'foreign_key' => 'state_id', 'local_key' => 'state_id');

        $this->has_many_pivot['posts'] = [
            'foreign_model' => 'User_model',
            'pivot_table' => 'us_agy',
            'local_key' => 'agency_id',
            'pivot_local_key' => 'agency_id',
            'pivot_foreign_key' => 'user_id',
            'foreign_key' => 'agency_id',
            'get_relate' => true
        ];

        parent::__construct();
        $this->timestamps = FALSE;
    }

}