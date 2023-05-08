<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePositionTable extends Migration
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
            'travelling' => [
                'type' => 'FLOAT',
            ],
            'communication' => [
                'type' => 'FLOAT',
            ],
            'health' => [
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
        $this->forge->createTable('positions');
    }

    public function down()
    {
        //
        $this->forge->dropTable('positions');
    }
}