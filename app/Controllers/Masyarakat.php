<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;

class Masyarakat extends BaseController
{
    protected $session;
    protected $pengaduanModel;
    protected $masyarakatModel;
    public function __construct()
    {
        $this->session = session();

        $this->pengaduanModel = new PengaduanModel();

        $this->masyarakatModel = new MasyarakatModel();
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

    public function setting(): string
    {
        $masyarakat = $this->masyarakatModel->findAll();

        $data = [
            'title' => 'Setting',
            'masyarakat' => $masyarakat,
            'validation' => \Config\Services::validation()
        ];

        return view('masyarakat/setting', $data);
    }
}
