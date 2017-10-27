<?php
/**
 * Sub_menu_model.php
 * User: psybo-03
 * Date: 27/10/17
 * Time: 7:55 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Sub_menu_model extends MY_Model
{

    public $table = 'xx_sub_menu';
    function __construct()
    {
        $this->has_one['menu'] = array('foreign_model' => 'Menu_model', 'foreign_table' => 'xx_menu', 'foreign_key' => 'id', 'local_key' => 'menu_id');
        parent::__construct();
        $this->timestamps = TRUE;
    }

}