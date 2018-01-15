<?php
/**
 * Us1_user_model.php
 * User: psybo-03
 * Date: 28/10/17
 * Time: 12:56 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class User_model extends MY_Model
{

    public $table = 'us1_user';
    function __construct()
    {
        $this->has_many['state'] = array('foreign_model' => 'home/State_model', 'foreign_table' => 'sta_states', 'foreign_key' => 'state_id', 'local_key' => 'state_id');
        parent::__construct();
    }

}