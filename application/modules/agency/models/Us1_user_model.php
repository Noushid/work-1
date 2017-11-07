<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/3/17
 * Time: 9:31 AM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Us1_user_model extends MY_Model
{

    public $table = 'us1_user';
    public $primary_key = 'user_id';
    function __construct()
    {
        $this->timestamps = FALSE;
        parent::__construct();
    }

}