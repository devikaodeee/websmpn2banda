<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengguna extends BaseController
{

    protected $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        session()->set('active-page', 'pengguna');
        $users = $this->userModel->findAll();
        return view('pages/admin/PenggunaView', ['users' => $users]);
    }
}
