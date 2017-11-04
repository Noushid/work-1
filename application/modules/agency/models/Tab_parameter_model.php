<?php
/**
 * Tab_parameter_model.php
 * User: Noushid
 * Date: 4/11/17
 * Time: 7:08 PM
 */


defined('BASEPATH') or exit('No direct Script access allowed');
class Tab_parameter_model extends MY_Model
{

    public $table = 'tab_parameters';
    public $primary_key = 'type_type';
    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}