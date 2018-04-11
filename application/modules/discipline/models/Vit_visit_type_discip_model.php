<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Vit_visit_type_discip_model extends MY_Model
{

    public $table = 'vit_visit_type_discip';
    public $primary_key = 'visit_type_disc_id';
    function __construct()
    {
        $this->has_one['visitType'] = array('foreign_model' => 'Vit_visit_type_model', 'foreign_table' => 'vit_visit_type', 'foreign_key' => 'visit_type_id', 'local_key' => 'visit_type_id');
        parent::__construct();
        $this->timestamps = FALSE;
    }

}