<?php
/**
 * Menu_model.php
 * User: Noushid
 * Date: 27/10/17
 * Time: 6:00 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Menu_model extends MY_Model
{

    public $table = 'xx_menu';
    function __construct()
    {
        $this->has_many['subMenu'] = array('foreign_model' => 'home/Sub_menu_model', 'foreign_table' => 'xx_sub_menu', 'foreign_key' => 'menu_id', 'local_key' => 'id');
        parent::__construct();
        $this->timestamps = TRUE;
    }

}