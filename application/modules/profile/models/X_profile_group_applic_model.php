<?php
/**
 * X_profile_group_applic_model.php
 * User: Noushid
 * Date: 03/01/18
 * Time: 9:59 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class X_profile_group_applic_model extends MY_Model
{

    public $table = 'x_profile_group_applica';
    public $primary_key = 'profile_group_applica_id';
    function __construct()
    {
        $this->has_one['x_application'] = array('foreign_model' => 'application/X_application_model', 'foreign_table' => 'x_application', 'foreign_key' => 'application_id', 'local_key' => 'application_id');
        parent::__construct();
        $this->timestamps = TRUE;
    }

}