<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $pengaduanModel;
    protected $session;
    protected $helper = ['form', 'url'];

    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
    }
    
    public function save()
    {
        $nik = session('nik'); // Ambil nik dari session
        if (!$this->validate([
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi laporan harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10240]',
                'errors' => [
                    'uploaded' => 'File harus ditambahkan',
                    'max_size' => 'Ukuran file harus kurang dari 10MB',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        // pindahkan file ke folder img
        $fileDokumen->move('docs');
        // ambil nama file sampul
        $namaFile = $fileDokumen->getName();

        $this->pengaduanModel->save([
            "isi_laporan" => $this->request->getVar('isi_laporan'),
            "foto" => $namaFile,
            'nik' => $nik,

        ]);
        return redirect()->to('/masyarakat/tambah');
    }

    public function download($id)
    {
        $filez = new PengaduanModel();
        $dataFile = $filez->find($id);
        return $this->response->download('docs/' .$dataFile['filez'], null );
    }
}