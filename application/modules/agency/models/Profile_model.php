<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/3/17
 * Time: 12:11 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Profile_model extends MY_Model
{

    public $table = 'x_profile';
    public $primary_key = 'profile_id';
    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}