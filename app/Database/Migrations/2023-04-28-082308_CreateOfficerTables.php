<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOfficerTables extends Migration
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
            'PrecinctID' => [
                'type' => 'INT',
            ],
            'userID' => [
                'type' => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'landline' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'startDate' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('officers');
    }

    public function down()
    {
        //
        $this->forge->dropTable('officers');
    }
}