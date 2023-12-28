<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $primaryKey = 'siswa_id';
    protected $table = 'siswa_tb';
    protected $allowedFields = [
        'siswa_id', 'siswa_nisn', 'siswa_nama', 'siswa_tempat_lahir', 'siswa_tanggal_lahir', 'siswa_no_hp', 'siswa_alamat', 'siswa_asal_sekolah', 'siswa_nama_orang_tua', 'siswa_agama', 'siswa_status_form'
    ];
}
