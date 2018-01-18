<?php
/**
 * Us1_user_credential_model.php
 * User: Noushid P
 * Date: 18/1/18
 * Time: 4:56 PM
 */

defined('BASEPATH') or exit('No direct Script access allowed');
class Us1_user_credential_model extends MY_Model
{

    public $table = 'us1_user_credentials';
    public $primary_key = 'user_credential_id';
    function __construct()
    {
        $this->has_one['attachment'] = array('foreign_model' => 'home/Us1_user_credential_attachment_model', 'foreign_table' => 'us1_user_credential_attachments', 'foreign_key' => 'attachment_id', 'local_key' => 'attachment_id');

        parent::__construct();
        $this->timestamps = FALSE;
    }

}