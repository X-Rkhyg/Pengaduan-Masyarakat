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
        return view('masyarakat/home');
    }

    public function tambah(): string
    {
        return view('masyarakat/tambah');
    }

    public function lihat(): string
    {
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        $aduan = new PengaduanModel();
        $nik = session('nik'); // Ambil username dari session
        $aduan = $aduan->find('nik', $nik);
        $aduan = array();
        $data = [
            'title' => 'Input Data Aduan Masyarakat',
            'validation' => \Config\Services::validation(),
            'aduan' => $aduan
        ];
        
        $data = $this->pengaduanModel->table('pengaduan')
    ->where('nik', $nik)
    ->get()
    ->getResult();
        
        return view('masyarakat/lihat', ['data' => $data]);
    }

    
}
