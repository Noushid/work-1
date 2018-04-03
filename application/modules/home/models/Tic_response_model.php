<?php
/**
 * Tic_response_model.php
 * User: Noushid P
 * Date: 24/3/18
 * Time: 6:22 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Tic_response_model extends MY_Model
{

    public $table = 'tic_response';
    public $primary_key = 'response_id';

    function __construct()
    {
        $this->has_one['user'] = array('foreign_model' => 'home/User_model', 'foreign_table' => 'us1_user', 'foreign_key' => 'user_id', 'local_key' => 'response_user_id');
        parent::__construct();
        $this->timestamps = FALSE;
    }

}
