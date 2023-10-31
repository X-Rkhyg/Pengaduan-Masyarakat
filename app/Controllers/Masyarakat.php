<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;
use App\Models\TanggapanModel;

class Masyarakat extends BaseController
{
    protected $session;
    protected $pengaduanModel;
    protected $masyarakatModel;
    protected $validation;
    protected $tanggapanModel;
    public function __construct()
    {
        $this->session = session();

        $this->pengaduanModel = new PengaduanModel();

        $this->masyarakatModel = new MasyarakatModel();

        $this->tanggapanModel = new TanggapanModel();

    }
    public function index(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $data = [
            'title' => 'Dashboard',
            'jumlah' => $this->pengaduanModel->where('nik', session('nik'))->countAllResults(),
        ];
        return view('masyarakat/home', $data);
    }

    public function tambah(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $data = [
            'title' => 'Tambah Data Pengaduan'
        ];

        return view('masyarakat/tambah', $data);
    }

    public function lihat(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }
        
        $aduan = new PengaduanModel();
        $nik = session('nik'); // Ambil username dari session
        $aduan = $aduan->find('nik', $nik);
        $aduan = array();
        

        $data = [
            'validation' => \Config\Services::validation(),
            'aduan' => $aduan,
        ];

        $data = $this->pengaduanModel->table('pengaduan')
            ->where('nik', $nik)
            ->get()
            ->getResult();
        
        return view('masyarakat/lihat', ['data' => $data]);
    }

    public function setting(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $masyarakat = $this->masyarakatModel->findAll();

        $data = [
            'title' => 'Setting',
            'masyarakat' => $masyarakat,
            'validation' => \Config\Services::validation()
        ];

        return view('masyarakat/setting', $data);
    }
}
