<?php
/**
 * State_model.php
 * User: Noushid P
 * Date: 15/1/18
 * Time: 7:02 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class State_model extends MY_Model
{

    public $table = 'sta_states';
    function __construct()
    {
        parent::__construct();
    }

}
