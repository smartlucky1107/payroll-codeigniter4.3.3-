<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrecinctTables extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'contactNum' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'region' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'district' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangay' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'EO_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('precincts');
    }

    public function down()
    {
        //
        $this->forge->dropTable('precincts');
    }
}