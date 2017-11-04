<?php
/**
 * Dis_discipline_model.php
 * User: Noushid
 * Date: 4/11/17
 * Time: 7:17 PM
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