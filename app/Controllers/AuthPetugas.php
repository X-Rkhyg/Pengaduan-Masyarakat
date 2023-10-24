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
        
        //cek apakah username ditemukan
        if($petugas){
            //cek password
            //jika salah arahkan lagi ke halaman login
            if($petugas['password'] != $data['password']){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to('/auth/loginpetugas');
            }
            else{
                if ($petugas['level'] == 'admin') {
                    //jika benar, buat session
                    $this->session->set([
                        'id_petugas' => $petugas['id_petugas'], //tambahkan id_petugas ke session
                        'username' => $petugas['username'],
                        'nama_petugas' => $petugas['nama_petugas'],
                        'level' => $petugas['level'],
                        'logged_in' => TRUE
                    ]);
                    //kembalikan ke halaman admin
                    return redirect()->to('/admin');
                } else {
                    //jika benar, buat session
                    $this->session->set([
                        'id_petugas' => $petugas['id_petugas'], //tambahkan id_petugas ke session
                        'username' => $petugas['username'],
                        'nama_petugas' => $petugas['nama_petugas'],
                        'level' => $petugas['level'],
                        'logged_in' => TRUE
                    ]);
                    //kembalikan ke halaman petugas
                    return redirect()->to('/petugas');
                }
            }
        }
        else{
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            // mengirimkan pesan
            session()->setFlashdata('pesan', 'Selamat Datang, Anda Berhasil Login');
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

}
