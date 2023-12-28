<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;

class Formulir extends BaseController
{

    protected $siswaModel;

    use ResponseTrait;

    function __construct()
    {
        session()->set('active-page', 'formulir');
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $id = session()->get('x-psb-user');

        $this->siswaModel->where(['siswa_id' => $id]);
        $result = $this->siswaModel->find();

        // var_dump($result);
        // exit;

        $dump = [
            'siswa_id' => $id,
            'siswa_nisn' => '',
            'siswa_nama' => '',
            'siswa_tempat_lahir' => '',
            'siswa_tanggal_lahir' => '',
            'siswa_no_hp' => '',
            'siswa_alamat' => '',
            'siswa_asal_sekolah' => '',
            'siswa_nama_orang_tua' => '',
            'siswa_agama' => '',
            'siswa_status_form' => 300
        ];

        if (count($result) > 0) {
            return view('pages/FormulirView', ['data_siswa' => $result[0]]);
        }
        
        return view('pages/FormulirView', ['data_siswa' => $dump]);
    }

    public function add_formulir_api()
    {
        $request = $this->request->getPost();
        // var_dump($request);
        // return true;

        $this->siswaModel->where(["siswa_id" => $request["siswa_id"]]);
        $result = $this->siswaModel->find();

        // var_dump($request);
        // exit;

        if (count($result) > 0) {

            $res = $this->siswaModel->save($request);

            if ($res) {
                return $this->respond([
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Berhasil update formulir'
                ]);
            }

            return $this->respond([
                'code' => 505,
                'status' => 'error',
                'message' => 'Gagal update formulir'
            ]);
        
        }

        if ($this->siswaModel->insert($request)) {
            return $this->respond([
                'code' => 200,
                'status' => 'success',
                'message' => 'Berhasil tambah formulir baru'
            ]);
        }

        return $this->respond([
            'code' => 505,
            'status' => 'error',
            'message' => 'Gagal tambah formulir'
        ]);

    }

    public function submit_formulir_api() 
    {
        $request = $this->request->getPost();

        $this->siswaModel->set('siswa_status_form', $request['siswa_status_form']);
        $this->siswaModel->where(['siswa_id' => $request['siswa_id']]);
        $result = $this->siswaModel->update();

        if (!$result) {
            return $this->respond([
                'code' => 500,
                'status' => 'error',
                'message' => 'Gagal submit formulir'
            ]);
        }

        return $this->respond([
            'code' => 200,
            'status' => 'success',
            'message' => 'Berhasil submit formulir'
        ]);

    }

}
