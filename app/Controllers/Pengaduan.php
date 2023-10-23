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
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        // ambil nama file sampul
        

        $this->pengaduanModel->save([
            "isi_laporan" => $this->request->getVar('isi_laporan'),
            'nik' => $nik,
            'foto' => $newName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/masyarakat/lihat');
    }
}
