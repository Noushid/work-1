<?php
/**
 * X_Profile_Group_model.php
 * User: Noushid
 * Date: 03/01/18
 * Time: 9:59 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class X_profile_group_model extends MY_Model
{

    public $table = 'x_profile_group';
    function __construct()
    {
        $this->timestamps = FALSE;
        $this->has_one['x_group'] = array('foreign_model' => 'profile/X_Group_model', 'foreign_table' => 'x_group', 'foreign_key' => 'group_id', 'local_key' => 'group_id');
        $this->has_many['group'] = array('foreign_model' => 'profile/X_Group_model', 'foreign_table' => 'x_group', 'foreign_key' => 'group_id', 'local_key' => 'group_id');
        parent::__construct();
    }

}