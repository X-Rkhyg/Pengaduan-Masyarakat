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
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $data = [
            'title' => 'Home - Aplikasi Pengaduan Masyarakat',
            'jumlah' => $this->pengaduanModel->countAll(),
            'pengaduan' => $this->pengaduanModel->findAll()
        ];

        return view('petugas/home', $data);
    }

    public function validasi(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $pengaduan = $this->pengaduanModel->findAll();

        $data = [
            'title' => 'Validasi - Aplikasi Pengaduan Masyarakat',
            'aduan' => $pengaduan
        ];

        return view('petugas/validasi', $data);
    }

    public function management(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Kelahiran Sleman',
            'masyarakat' => $masyarakat
        ];

        return view('petugas/masyarakat', $data);
    }

    public function setting(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Setting',
            'petugas' => $petugas,
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/setting', $data);
    }

    public function delete($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $this->masyarakatModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/petugas/management');
    }

    public function edit($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $data = [
            'title' => 'Edit Data Masyarakat',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $this->masyarakatModel->getMasyarakat($id)
        ];

        return view('petugas/edit', $data);
    }

    public function update($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput()-> with('validation', $validation);
        }

        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "nik" => $this->request->getVar('nik'),
            "username" => $this->request->getVar('username'),
            "telepon" => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/petugas/management');
    }

    public function defaultpass($id)
    { 
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }
        
        $default = 'defaultpassword';
        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "password" => $default,
        ]);
        session()->setFlashdata('pesan', 'Password berhasil diubah ke default.');
        return redirect()->to('/petugas/management');
    }


}
