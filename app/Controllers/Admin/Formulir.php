<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Formulir extends BaseController
{

    protected $siswaModel;

    function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index(): string
    {
        session()->set('active-page', 'formulir');

        $this->siswaModel->where('siswa_status_form !=', 300);
        $data = $this->siswaModel->findAll();
        return view('pages/admin/FormulirView', ['data_siswa' => $data]);
    }
    public function detail($id)
    {
        $this->siswaModel->where(['siswa_id' => $id]);
        $result = $this->siswaModel->find();

        if (count($result) < 1) {
            return redirect()->to(base_url('admin'));
        }

        return view('pages/admin/DetailFormulirView', ['data_siswa' => $result[0]]);
    }
}
