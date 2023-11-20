<?php

namespace App\Controllers;

use App\Models\PetugasModel;

class AuthPetugas extends BaseController
{
    protected $petugasModel;
    protected $validation;
    protected $session;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->petugasModel = new PetugasModel();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }

    public function login()
    {
        $data = [
            'title' => 'Login - Aplikasi Pengaduan Petugas'
        ];
        //menampilkan halaman login
        return view('auth/login-petugas', $data);
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang usernamenya sama 
        $petugas = $this->petugasModel->where('username', $data['username'])->first();

        $defaultpass = "defaultpassword";
        
        //cek apakah username ditemukan
        if($petugas){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if($petugas['password'] != md5($data['password'])){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/loginpetugas');
            }
            else{
                if ($petugas['level'] == 'admin') {
                    //jika benar, buat session
                    $hashedpass = md5($data['password']);
                    $this->session->set([
                        'id_petugas' => $petugas['id_petugas'], //tambahkan id_petugas ke session
                        'username' => $petugas['username'],
                        'nama_petugas' => $petugas['nama_petugas'],
                        'password' => $hashedpass,
                        'level' => $petugas['level'],
                        'isLoginAdmin' => true,
                    ]);
                    if (md5($data['password']) == md5($defaultpass)) {
                        session()->setFlashdata('password', 'Ganti Password terlebih dahulu');
                        return redirect()->to('/admin/defaultchange');
                    } else {
                        session()->setFlashdata('login', 'Selamat Datang ');
                        return redirect()->to('/admin');
                    }
                } else {
                    //jika benar, buat session
                    $hashedpass = md5($petugas['password']);
                    $this->session->set([
                        'id_petugas' => $petugas['id_petugas'], //tambahkan id_petugas ke session
                        'username' => $petugas['username'],
                        'password' => $hashedpass, //tambahkan password ke session
                        'nama_petugas' => $petugas['nama_petugas'],
                        'level' => $petugas['level'],
                        'isLoginPetugas' => true,
                    ]);
                    if (md5($data['password']) == md5($defaultpass)) {
                        session()->setFlashdata('password', 'Ganti Password terlebih dahulu');
                        return redirect()->to('/petugas/defaultchange');
                    } else {
                        session()->setFlashdata('login', 'Selamat Datang ');
                        return redirect()->to('/petugas');
                    }
                }
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('errors', 'Username tidak ditemukan');
            // mengirimkan pesan
            return redirect()->to('/auth/loginpetugas');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/auth/loginpetugas');
    }

    public function defaultchangePetugas()
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginPetugas')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $this->session->set([
            'id_petugas' => session('id_petugas'), //tambahkan id_petugas ke session
            'username' => session('username'),
            'password' => session('password'), //tambahkan password ke session
            'nama_petugas' => session('nama_petugas'),
            'level' => session('level'),
            'isLoginPetugas' => false,
        ]);

        $data = [
            'title' => 'Ganti Password',
            'validation' => \Config\Services::validation(),
        ];

        return view('petugas/defaultchange', $data);
    }

    public function defaultchangesavePetugas()
    {
        $newpassword = $this->request->getPost();
        $currentpassword = session('password');
        $data = $this->request->getPost();
        if (!$this->validate([
            'passwordBaru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru minimal 8 karakter'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/defaultchange' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }
        if (md5($data['passwordBaru']) == $currentpassword) {
            session()->setFlashdata('pesan', 'Password Baru tidak boleh default');
            return redirect()->to('/petugas/defaultchange');
        } else {
            $hashedpass = md5($newpassword['passwordBaru']);
            //jika benar, arahkan user masuk ke aplikasi 
            $this->petugasModel->save([
                'id_petugas' => session('id_petugas'),
                'password' => $hashedpass,
            ]);

            $this->session->set([
                'id_petugas' => session('id_petugas'), //tambahkan id_petugas ke session
                'username' => session('username'),
                'password' => $hashedpass, //tambahkan password ke session
                'nama_petugas' => session('nama_petugas'),
                'level' => session('level'),
                'isLoginPetugas' => true,
            ]);
    
            session()->setFlashdata('pesan', 'Password Baru Anda Berhasil Disimpan');
            return redirect()->to('/petugas');
        }        
    }

    public function defaultchangeAdmin()
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $this->session->set([
            'id_petugas' => session('id_petugas'), //tambahkan id_petugas ke session
            'username' => session('username'),
            'password' => session('password'), //tambahkan password ke session
            'nama_petugas' => session('nama_petugas'),
            'level' => session('level'),
            'isLoginAdmin' => false,
        ]);

        $data = [
            'title' => 'Ganti Password',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/defaultchange', $data);
    }

    public function defaultchangesaveAdmin()
    {
        $newpassword = $this->request->getPost();
        $currentpassword = session('password');
        $data = $this->request->getPost();
        if (!$this->validate([
            'passwordBaru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru minimal 8 karakter'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/defaultchange' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }
        if (md5($data['passwordBaru']) == $currentpassword) {
            session()->setFlashdata('pesan', 'Password Baru tidak boleh default');
            return redirect()->to('/masyarakat/defaultchange');
        } else {
            $hashedpass = md5($newpassword['passwordBaru']);
            //jika benar, arahkan user masuk ke aplikasi 
            $this->petugasModel->save([
                'id_petugas' => session('id_petugas'),
                'password' => $hashedpass,
            ]);

            $this->session->set([
                'id_petugas' => session('id_petugas'), //tambahkan id_petugas ke session
                'username' => session('username'),
                'password' => $hashedpass, //tambahkan password ke session
                'nama_petugas' => session('nama_petugas'),
                'level' => session('level'),
                'isLoginAdmin' => true,
            ]);
    
            session()->setFlashdata('pesan', 'Password Baru Anda Berhasil Disimpan');
            return redirect()->to('/admin');
        }        
    }

}
