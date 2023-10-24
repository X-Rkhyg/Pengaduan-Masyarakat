<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class PengaduanPetugas extends BaseController
{
    protected $pengaduanModel;
    protected $session;
    protected $helper = ['form', 'url'];

    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
    }

    public function download($id)
    {
        $foto = new PengaduanModel();
        $dataFile = $foto->find($id);
        return $this->response->download('foto_storage/' .$dataFile['foto'], null );
    }

    public function validasi($id)
    {
        $tervalidasi = '1';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            "status" => $tervalidasi,
            
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/petugas/validasi');
    }
    
}
