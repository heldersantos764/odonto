<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableState extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'state_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state_name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 30,
                'NULL' => false
            ],        
            'initials'       => [
                'type'       => 'VARCHAR',
                'constraint' => 2,
                'NULL' => false
            ],
            'created_at datetime default current_timestamp', 
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            
        ]);
        $this->forge->addKey('state_id', true);
        $this->forge->createTable('state');
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('state');
        $this->db->enableForeignKeyChecks();
    }
}
