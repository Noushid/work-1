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
        $this->has_many_pivot['posts'] = array(
            'foreign_model'=>'Home/User_model',
            'pivot_table'=>'us_agy',
            'local_key'=>'agency_id',
            'pivot_local_key'=>'user_id', /* this is the related key in the pivot table to the local key
		        this is an optional key, but if your column name inside the pivot table
		        doesn't respect the format of "singularlocaltable_primarykey", then you must set it. In the next title
		        you will see how a pivot table should be set, if you want to  skip these keys */
            'pivot_foreign_key'=>'agency_id', /* this is also optional, the same as above, but for foreign table's keys */
            'foreign_key'=>'agency_id',
            'get_relate'=>FALSE /* another optional setting, which is explained below */
        );
        parent::__construct();
        $this->timestamps = FALSE;
    }

}