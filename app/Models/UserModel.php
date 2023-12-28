<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $primaryKey = 'user_id';
    protected $table = 'users_tb';
    protected $allowedFields = [
        'user_id', 'user_name', 'user_email', 'user_password'
    ];

}