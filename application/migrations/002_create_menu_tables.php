<?php
/**
 * 002_create_menu_tables.php
 * User: Noushid
 * Date: 27/10/17
 * Time: 1:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_menu_tables extends CI_Migration {

    public function up() {
        // Drop table 'groups' if it exists
        $this->dbforge->drop_table('xx_menu', TRUE);

        // Table structure for table 'groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('xx_menu');




        // Drop table 'users_groups' if it exists
        $this->dbforge->drop_table('xx_sub_menu', TRUE);

        // Table structure for table 'users_groups'
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ),
            'link' => array(
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ),
            'icon' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ),
            'description' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ),
            'menu_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned'   => TRUE
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('xx_sub_menu');



        // Drop table 'users' if it exists
        $this->dbforge->drop_table('xx_group_menu', TRUE);

        // Table structure for table 'users'
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'group_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned'   => TRUE
            ),
            'menu_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned'   => TRUE
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'NULL' => TRUE,
            )

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('xx_group_menu');


    }

    public function down() {
        $this->dbforge->drop_table('xx_menu', TRUE);
        $this->dbforge->drop_table('xx_group_menu', TRUE);
        $this->dbforge->drop_table('xx_sub_menu', TRUE);
    }
}
