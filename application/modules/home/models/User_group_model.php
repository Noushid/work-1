<?php
/**
 * User_group_model.php
 * User: psybo-03
 * Date: 28/10/17
 * Time: 12:55 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class User_group_model extends MY_Model
{

    public $table = 'xx_users_groups';
    function __construct()
    {
        $this->has_one['group'] = array('foreign_model' => 'home/Group_model', 'foreign_table' => 'xx_group', 'foreign_key' => 'id', 'local_key' => 'group_id');
        $this->timestamps = FALSE;
        parent::__construct();
    }

}