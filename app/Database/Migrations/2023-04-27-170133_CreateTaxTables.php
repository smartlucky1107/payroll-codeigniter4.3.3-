<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaxTables extends Migration
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
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'value' => [
                'type' => 'FLOAT',
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
        $this->forge->createTable('taxes');
    }

    public function down()
    {
        //
        $this->forge->dropTable('taxes');
    }
}