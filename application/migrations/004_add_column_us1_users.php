<?php
/**
 * 004_add_column_us1_users.php
 * User: Noushid P
 * Date: 17/11/17
 * Time: 9:05 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_column_us1_users extends CI_Migration
{


    public function up()
    {
        $this->dbforge->add_column('us1_user', [
            'ip_address' => array(
                'type'       => 'VARCHAR',
                'constraint' => '45'
            ),
            'xx_password' => array(
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ),
            'salt' => array(
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null'       => TRUE
            ),
            'activation_code' => array(
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null'       => TRUE
            ),
            'forgotten_password_code' => array(
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null'       => TRUE
            ),
            'forgotten_password_time' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => TRUE,
                'null'       => TRUE
            ),
            'remember_code' => array(
                'type'       => 'VARCHAR',
                'constraint' => '40',
                'null'       => TRUE
            ),
            'last_login' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => TRUE,
                'null'       => TRUE
            ),
            'username' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ),
            'active' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'unsigned'   => TRUE,
                'null'       => TRUE
            )
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_column($this->tables['users_groups'], 'us_agy_id');
    }
}

