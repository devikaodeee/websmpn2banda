<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $siswaModel, $userModel, $adminModel;

    function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
    }
    public function index(): string
    {

        session()->set('active-page', 'dashboard');

        $this->siswaModel->where('siswa_status_form !=', 300);
        $formulir = $this->siswaModel->findAll();
        
        $this->siswaModel->select('siswa_id');
        $this->siswaModel->where(['siswa_status_form' => 200]);
        $diterima = $this->siswaModel->find();

        $this->siswaModel->select('siswa_id');
        $this->siswaModel->where(['siswa_status_form' => 500]);
        $pending = $this->siswaModel->find();

        // $this->userModel->select('user_id');
        $akun = $this->userModel->findAll();
        // var_dump($akun);

        $this->adminModel->where(['admin_id' => session()->get('x-psb-admin')]);
        $admin = $this->adminModel->find();

        // exit;

        $data = [
            'formulir' => $formulir,
            'diterima' => count($diterima),
            'akun' => $akun,
            'pending' => count($pending),
            'admin' => $admin[0]
        ];
        return view('pages/admin/DashboardView', $data);
    }
}
