<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {

    protected $primaryKey = 'admin_id';
    protected $table = 'admin_tb';
    protected $allowedFields = [
        'admin_id', 'admin_name', 'admin_email', 'admin_password'
    ];

}