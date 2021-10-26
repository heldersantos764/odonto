<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePhoneNumber extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'phone_number_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'NULL' => false
            ],
            'phone'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 9,
                'NULL' => false
            ],    
            'created_at datetime default current_timestamp', 
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            
        ]);
        $this->forge->addKey('phone_number_id', true);
        $this->forge->addForeignKey('user_id','user','user_id','CASCADE','CASCADE');
        $this->forge->createTable('phone_number');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('phone_number');
        $this->db->enableForeignKeyChecks();
    }
}