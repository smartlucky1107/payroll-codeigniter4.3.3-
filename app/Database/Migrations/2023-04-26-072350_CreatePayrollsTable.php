<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePayrollsTable extends Migration
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
            'PWID' => [
                'type' => 'INT',
            ],
            'EOID' => [
                'type' => 'INT',
            ],
            'activity' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'position' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'taxID' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'allowance' => [
                'type' => 'TEXT',
            ],
            'tax' => [
                'type' => 'TEXT',
            ],
            'total' => [
                'type' => 'FLOAT',
            ],
            'incomeTax' => [
                'type' => 'FLOAT',
            ],
            'amountDue' => [
                'type' => 'FLOAT',
            ],
            'sign1' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'supervisor' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'sign2' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'sign3' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'date1' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'date2' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'date3' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
            ],
            'date4' => [
                'type' => 'DATETIME',
                // 'default'        => 'current_timestamp()',
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
        $this->forge->createTable('payrolls');
    }

    public function down()
    {
        //
        $this->forge->dropTable('payrolls');
    }
}