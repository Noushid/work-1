<?php
/**
 * Us1_user_credential_attachment_model.php
 * User: Noushid P
 * Date: 18/1/18
 * Time: 4:57 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Us1_user_credential_attachment_model extends MY_Model
{

    public $table = 'us1_user_credential_attachments';
    public $primary_key = 'attachment_id';
    function __construct()
    {
//        $this->has_one['menu'] = array('foreign_model' => 'Menu_model', 'foreign_table' => 'xx_menu', 'foreign_key' => 'id', 'local_key' => 'menu_id');
        parent::__construct();
        $this->timestamps = FALSE;
    }

}