<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableDistrict extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'district_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'city_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'NULL' => false
            ],
            'district_name'      => [
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
        $this->forge->addKey('district_id', true);
        $this->forge->addForeignKey('city_id', 'city', 'city_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('district');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('district');
        $this->db->enableForeignKeyChecks();
    }
}
