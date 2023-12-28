<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'auto_increment' => true,
            ],
            'user_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]

        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users_tb');
    }

    public function down()
    {
        $this->forge->dropTable('users_tb');
    }
}
