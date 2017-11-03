<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/3/17
 * Time: 9:31 AM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class User_model extends MY_Model
{

    public $table = 'us1_user';
    function __construct()
    {
        parent::__construct();
    }

}