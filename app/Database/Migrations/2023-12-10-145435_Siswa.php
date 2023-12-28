<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'siswa_id' => [
                'type'           => 'INT',
                'constraint'     => 12,
                'auto_increment' => true,
            ],
            'siswa_nisn' => [
                'type'           => 'INT',
                'constraint'     => 255
            ],
            'siswa_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'siswa_tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'siswa_tanggal_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'siswa_no_hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'siswa_alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'siswa_asal_sekolah' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'siswa_nama_orang_tua' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'siswa_agama' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'siswa_status_form' => [
                'type' => 'INT',
                'constraint' => '5'
            ]
            
        ]);
        $this->forge->addKey('siswa_id', true);
        $this->forge->createTable('siswa_tb');
    }

    public function down()
    {
        $this->forge->dropTable('siswa_tb');
    }
}
