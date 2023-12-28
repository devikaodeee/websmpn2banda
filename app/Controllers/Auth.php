<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{

    protected $userModel;

    use ResponseTrait;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string
    {
        return view('pages/LoginView');
    }

    public function registrasi(): string
    {
        return view('pages/RegistrasiView');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }

    public function login_api()
    {
        
        $request = $this->request->getPost();

        //var_dump($request);
        //exit;

        $this->userModel->where(['user_email' => $request['email']]);
        $result = $this->userModel->find();
        
        // exit;

        if (count($result) <= 0) {
            return $this->respond([
                'code' => 404,
                'status' => 'error',
                'message' => 'Email tidak ditemukan'
            ]);
        }

        if ($result[0]['user_password'] != $request['password']) {
            return $this->respond([
                'code' => 404,
                'status' => 'error',
                'message' => 'Password salah'
            ]);
        }

        /* Membuat sesi login */
        session()->set([
            'x-psb-user' => $result[0]['user_id'] 
        ]);

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Login berhasil'
        ]);

        // var_dump($result);
    }

    public function registrasi_api()
    {

        $request = $this->request->getPost();

        $this->userModel->where(['user_email' => $request['user_email']]);
        $result = $this->userModel->find();

        if (count($result) > 0) {
            return $this->respond([
                'code' => 505,
                'status' => 'error',
                'message' => 'Email sudah digunakan'
            ]);
        }

        if (!$this->userModel->insert($request)) {
            
            return $this->respond([
                'code' => 500,
                'status' => 'error',
                'message' => 'Registrasi gagal! Hubungi pihak admin.'
            ]);
        }

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Registrasi berhasil'
        ]);

    }

}
