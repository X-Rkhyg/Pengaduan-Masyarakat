<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;
use App\Models\PetugasModel;

class Petugas extends BaseController
{

    protected $session;
    protected $pengaduanModel;
    protected $masyarakatModel;
    protected $petugasModel;
    public function __construct()
    {
        $this->session = session();

        $this->pengaduanModel = new PengaduanModel();

        $this->masyarakatModel = new MasyarakatModel();

        $this->petugasModel = new PetugasModel();
    }
    public function index(): string
    {
        return view('petugas/home');
    }

    public function validasi(): string
    {
        $pengaduan = $this->pengaduanModel->findAll();

        $data = [
            'title' => 'Data Kelahiran Sleman',
            'aduan' => $pengaduan
        ];

        return view('petugas/validasi', $data);
    }

    public function management(): string
    {
        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Kelahiran Sleman',
            'masyarakat' => $masyarakat
        ];

        return view('petugas/masyarakat', $data);
    }

    public function setting(): string
    {
        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Setting',
            'petugas' => $petugas
        ];

        return view('petugas/setting', $data);
    }


}
