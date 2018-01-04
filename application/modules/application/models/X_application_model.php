<?php
/**
 * X_Application_model.php
 * User: Noushid
 * Date: 03/01/18
 * Time: 9:59 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class X_application_model extends MY_Model
{

    public $table = 'x_application';

    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}