<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStreet extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'street_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'district_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'NULL' => false
            ],
            'street_name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'NULL' => false
            ],
            'created_at datetime default current_timestamp', 
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

        ]);
        $this->forge->addKey('street_id', true);
        $this->forge->addForeignKey('district_id', 'district', 'district_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('street');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('street');
        $this->db->enableForeignKeyChecks();
    }
}
