<?php

namespace App\Controllers;

use App\Models\MasyarakatModel;

class AuthMasyarakat extends BaseController
{
    protected $masyarakatModel;
    protected $validation;
    protected $session;

    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->masyarakatModel = new MasyarakatModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $data = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        //menampilkan halaman login
        return view('auth/login-masyarakat', $data);
    }

    public function daftar()
    {
        $data = [
            'title' => 'Daftar - Aplikasi Pengaduan Masyarakat'
        ];
        //menampilkan halaman register
        return view('auth/daftar', $data);
    }

    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();

        //jalankan validasi
        $this->validation->run($data, 'register');

        //cek errornya
        $errors = $this->validation->getErrors();

        //hash password
        

        //jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('username', $this->validation->getError('username'));
            session()->setFlashdata('nik', $this->validation->getError('nik'));
            session()->setFlashdata('password', $this->validation->getError('password'));
            session()->setFlashdata('confirm', $this->validation->getError('confirm'));
            session()->setFlashdata('telepon', $this->validation->getError('telepon'));
            return redirect()->to('/auth/daftar');
        }

        $hashedpass = md5($data['password']);
        //jika tdk ada error 
        //masukan data ke database
        $this->masyarakatModel->save([
            'username' => $data['username'],
            'nik' => $data['nik'],
            'password' => $hashedpass,
            'telepon' => $data['telepon'],


        ]);

        //arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/auth/login');
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama 
        $masyarakat = $this->masyarakatModel->where('username', $data['username'])->first();
        $defaultpass = "defaultpassword";

        //cek apakah username ditemukan
        if ($masyarakat) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($masyarakat['password'] != md5($data['password'])) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/login');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'id_masyarakat' => $masyarakat['id_masyarakat'], //tambahkan id_masyarakat ke session
                    'username' => $masyarakat['username'],
                    'password' => $masyarakat['password'],
                    'nik' => $masyarakat['nik'],
                ];
                $this->session->set($sessLogin);
                if ($sessLogin['password'] == md5($defaultpass)) {
                    session()->setFlashdata('password', 'Ganti Password terlebih dahulu');
                    return redirect()->to('/masyarakat/defaultchange');
                } else {
                    session()->setFlashdata('login', 'Selamat Datang ');
                    return redirect()->to('/masyarakat');
                }
            }
        } else {
            
            // mengirimkan pesan
            return redirect()->to('/auth/login');
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }

    public function defaultchange()
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $data = [
            'title' => 'Ganti Password',
            'validation' => \Config\Services::validation(),
        ];

        return view('masyarakat/defaultchange', $data);
    }

    public function defaultchangesave()
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
            return redirect()->to('/masyarakat/defaultchange' . $this->request->getVar('id_masyarakat'))->withInput()->with('validation', $validation);
        }
        if ($data['passwordBaru'] == $currentpassword) {
            session()->setFlashdata('pesan', 'Password Baru tidak boleh default');
            return redirect()->to('/masyarakat/defaultchange');
        } else {
            $hashedpass = md5($newpassword['passwordBaru']);
            //jika benar, arahkan user masuk ke aplikasi 
            $this->masyarakatModel->save([
                'id_masyarakat' => session('id_masyarakat'),
                'password' => $hashedpass,
            ]);

            $this->session->set([
                'id_masyarakat' => session('id_masyarakat'), //tambahkan id_petugas ke session
                'username' => session('username'),
                'password' => $hashedpass, //tambahkan password ke session
                'nik' => session('nik'),
                'isLogin' => true,
            ]);
    
            session()->setFlashdata('pesan', 'Password Baru Anda Berhasil Disimpan');
            return redirect()->to('/masyarakat');
        }        
    }
}
