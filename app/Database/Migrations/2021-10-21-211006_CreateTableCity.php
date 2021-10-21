<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCity extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'city_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'NULL' => false
            ],
            'city_name'      => [
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
        $this->forge->addKey('city_id', true);
        $this->forge->addForeignKey('state_id','state','state_id','CASCADE','CASCADE');
        $this->forge->createTable('city');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('city');
        $this->db->enableForeignKeyChecks();
    }
}
