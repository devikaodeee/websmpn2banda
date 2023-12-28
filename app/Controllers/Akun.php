<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Akun extends BaseController
{
    protected $userModel;

    use ResponseTrait;
    function __construct()
    {
        session()->set('active-page', 'akun');
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
    
        $this->userModel->where('user_id', session()->get('x-psb-user'));
        $result = $this->userModel->find();

        return view('pages/AkunView', ['data' => $result[0]]);
    }

    public function save_api()
    {
        $request = $this->request->getPost();

        // var_dump($request);
        // exit;

        if (!$this->userModel->save($request)) {
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
