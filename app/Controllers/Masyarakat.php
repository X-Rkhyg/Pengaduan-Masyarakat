<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Masyarakat extends BaseController
{
    protected $session;
    protected $pengaduanModel;
    public function __construct()
    {
        $this->session = session();

        $this->pengaduanModel = new PengaduanModel();
    }
    public function index(): string
    {

        $data = [
            'title' => 'Dashboard'
        ];

        return view('masyarakat/home', $data);
    }

    public function tambah(): string
    {

        $data = [
            'title' => 'Tambah Data Pengaduan'
        ];

        return view('masyarakat/tambah', $data);
    }

    public function lihat(): string
    {

        $aduan = new PengaduanModel();
        $nik = session('nik'); // Ambil username dari session
        $aduan = $aduan->find('nik', $nik);
        $aduan = array();
        $data = [
            'validation' => \Config\Services::validation(),
            'aduan' => $aduan
        ];
        $oke = [
            'title' => 'testtt'
        ];

        $data = $this->pengaduanModel->table('pengaduan')
            ->where('nik', $nik)
            ->get()
            ->getResult();

        return view('masyarakat/lihat', ['data' => $data]);
    }

    public function download($id)
    {
        $foto = new PengaduanModel();
        $dataFile = $foto->find($id);
        return $this->response->download('foto_storage/' . $dataFile['foto'], null);
    }
}
