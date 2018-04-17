<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Dis_discipline_model extends MY_Model
{

    public $table = 'dis_discipline';
    public $primary_key = 'discipline_id';
    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}