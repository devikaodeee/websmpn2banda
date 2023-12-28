<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    public function index(): string
    {
        return view('pages/admin/Pengguna');
    }
}
