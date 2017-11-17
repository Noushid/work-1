<?php
/**
 * 003_add_column_users_group.php
 * User: Noushid P
 * Date: 17/11/17
 * Time: 8:48 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_column_users_group extends CI_Migration
{

    public function __construct() {
        parent::__construct();

        $this->load->config('ion_auth', TRUE);
        $this->tables = $this->config->item('tables', 'ion_auth');
    }


    public function up()
    {
        $this->dbforge->add_column($this->tables['users_groups'], [
            'us_agy_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'   => TRUE
            )
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_column($this->tables['users_groups'], 'us_agy_id');
    }
}

