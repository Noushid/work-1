<?php
/**
 * X_group_model.php
 * User: Noushid
 * Date: 03/01/18
 * Time: 9:59 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class X_group_model extends MY_Model
{

    public $table = 'x_group';
    public $primary_key = 'group_id';
    function __construct()
    {
        $this->timestamps = FALSE;
        parent::__construct();
    }

}