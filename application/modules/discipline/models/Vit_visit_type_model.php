<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Vit_visit_type_model extends MY_Model
{

    public $table = 'vit_visit_type';
    public $primary_key = 'visit_type_id_id';

    function __construct()
    {
        parent::__construct();
        $this->timestamps = FALSE;
    }

}