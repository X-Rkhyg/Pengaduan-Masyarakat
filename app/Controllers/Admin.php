<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;
use App\Models\PetugasModel;

class Admin extends BaseController
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

        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin/home', $data);
    }

    public function validasi(): string
    {
        $pengaduan = $this->pengaduanModel->findAll();

        $data = [
            'title' => 'Validasi Pengaduan',
            'aduan' => $pengaduan
        ];
        return view('admin/validasi', $data);
    }

    public function masyarakat(): string
    {
        $masyarakat = $this->masyarakatModel->findAll();

        $data = [
            'title' => 'Management Masyarakat',
            'masyarakat' => $masyarakat
        ];
        return view('admin/masyarakat', $data);
    }

    public function petugas(): string
    {
        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Management Petugas',
            'petugas' => $petugas
        ];
        return view('admin/petugas', $data);
    }

    public function setting(): string
    {

        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Setting',
            'petugas' => $petugas

        ];
        return view('admin/setting', $data);
    }

}
