<?php
namespace App\Database\Migrations;

class AddUsers extends \CodeIgniter\Database\Migration
{

        public function up()
        {
                $this->forge->addField([
                        'id' => [
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'firstname' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'lastname' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'middlename' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'address' => [
                                'type' => 'TEXT',
                        ],
                        'birthYear' => [
                                'type' => 'INT',
                        ],
                        'birthMonth' => [
                                'type' => 'INT',
                        ],
                        'birthDate' => [
                                'type' => 'INT',
                        ],
                        'email' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'password' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'taxID' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'province' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'municipality' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'barangay' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'street' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'number' => [
                                'type' => 'INT',
                        ],
                        'mobile1' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'mobile2' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'sex' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],


                        'governmentPosition' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'governmentSalaryGrade' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'governmentSalaryStep' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'nonGovernmentPosition' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'nonGovernmentSalary' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'nonGovernmentTax' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'teaching' => [
                                'type' => 'BOOLEAN',
                        ],
                        'school' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'IDNumber' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'IDType' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'role' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'img_name' => [
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'file_type' => [
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
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}