<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'street_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'NULL' => false
            ],
            'user_type'      => [
                'type'           => 'ENUM',
                'constraint'     => ['administrador', 'dentista', 'atendente', 'paciente'],
                'default'        => 'administrador',
            ],
            'active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => true,
            ],
            'user_name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'NULL' => false
            ],    
            'cpf'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 14,
                'NULL' => false
            ],         
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'NULL' => false
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'NULL' => false
            ],
            'address_number' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'NULL' => true
            ],
            'address_complement' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'NULL' => true
            ],
            'created_at datetime default current_timestamp', 
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('street_id','street','street_id','CASCADE','CASCADE');
        $this->forge->createTable('user');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->dropTable('user');
        $this->db->enableForeignKeyChecks();
    }
}
