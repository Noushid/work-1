<?php
/**
 * 005_rename_y_control_table.php
 * User: Noushid P
 * Date: 03/01/18
 * Time: 10:21 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Copy_y_control_table_to_x_group extends CI_Migration
{


    public function up()
    {
        // Table structure for table 'x_group'
        $this->dbforge->add_field(array(
            'group_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'group_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '125',
            ),
            'orientation' => array(
                'type' => 'CHAR',
                'constraint' => '2',
            )
        ));
        $this->dbforge->add_key('group_id', TRUE);
        $this->dbforge->create_table('x_group');

    }

    public function down()
    {
        $this->dbforge->drop_table('x_group', TRUE);
    }
}

