<?php
/**
 * Created by PhpStorm.
 * User: noushid
 * Date: 11/2/17
 * Time: 11:18 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Vis_visit_log_model extends MY_Model
{

    public $table = 'vis_visit_log';
    public $primary_key = 'visit_log_id';
    public $delete_cache_on_save = TRUE;
    function __construct()
    {
        $this->has_one['visit_type'] = array('foreign_model' => 'home/VIt_visit_type_model', 'foreign_table' => 'vit_visit_type', 'foreign_key' => 'visit_type_id', 'local_key' => 'visit_type_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}