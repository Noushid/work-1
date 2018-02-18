<?php
/**
 * 006_create_comments_table.php
 * User: Noushid
 * Date: 18/2/18
 * Time: 1:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_comments_table extends CI_Migration {

    public function up() {

        // Table structure for table 'agy_agency_comments'
        $this->dbforge->add_field(array(
            'agy_agency_comments_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'agency_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned'   => TRUE
            ),
            'comment' => array(
                'type' => 'LONGTEXT',
                'NULL' => TRUE,
            ),
            'review_date' => array(
                'type' => 'DATE',
                'NULL' => TRUE,
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
        $this->dbforge->add_key('agy_agency_comments_id', TRUE);
        $this->dbforge->create_table('agy_agency_comments');

    }

    public function down() {
        $this->dbforge->drop_table('agy_agency_comments', TRUE);
    }
}
