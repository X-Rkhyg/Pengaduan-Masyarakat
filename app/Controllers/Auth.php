<?php

namespace App\Controllers;
use App\Models\MasyarakatModel;

class Auth extends BaseController
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
        
        //jika ada error kembalikan ke halaman register
        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('/auth/register');
        }
        
        //jika tdk ada error 
        //masukan data ke database
        $this->masyarakatModel->save([
            'username' => $data['username'],
            'nik' => $data['nik'],
            'password' => $data['password'],
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
        
        //cek apakah username ditemukan
        if($masyarakat){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if($masyarakat['password'] != md5($data['password'])){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/login');
            }
            else{
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $masyarakat['username'],
                    ];
                $this->session->set($sessLogin);
                return redirect()->to('/LoginAdmin');
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
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

}
