<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\API\ResponseTrait;

class Akun extends BaseController
{

    protected $adminModel;

    use ResponseTrait;

    function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index(): string
    {
        session()->set('active-page', 'akun');

        $this->adminModel->where('admin_id', session()->get('x-psb-admin'));
        $result = $this->adminModel->find();

        // var_dump($result);

        return view('pages/admin/AkunView', ['data' => $result[0]]);
    }
    
    public function login()
    {
        return view('pages/admin/LoginView');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }
    
    public function login_api()
    {
        $request = $this->request->getPost();

        // var_dump($request);

        $this->adminModel->where(['admin_email' => $request['email']]);
        $result = $this->adminModel->find();

        if (count($result) <= 0) {
            return $this->respond([
                'code' => 404,
                'status' => 'error',
                'message' => 'Email tidak ditemukan'
            ]);
        }

        if ($result[0]['admin_password'] != $request['password']) {
            return $this->respond([
                'code' => 404,
                'status' => 'error',
                'message' => 'Password salah'
            ]);
        }

        /* Membuat sesi login */
        session()->set([
            'x-psb-admin' => $result[0]['admin_id']
        ]);

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Login berhasil'
        ]);

        // var_dump($result);
    }

    public function save_api()
    {
        $request = $this->request->getPost();

        if (!$this->adminModel->save($request)) {
            return $this->respond([
                'code' => 500,
                'status' => 'error',
                'message' => 'Data gagal disimpan'
            ]);
        };

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }

}
