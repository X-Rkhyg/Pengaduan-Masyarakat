<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;
use App\Models\PetugasModel;

class Setting extends BaseController
{

    protected $session;
    protected $pengaduanModel;
    protected $masyarakatModel;
    protected $petugasModel;
    protected $validation;
    public function __construct()
    {
        $this->session = session();

        $this->validation = \Config\Services::validation();

        $this->pengaduanModel = new PengaduanModel();

        $this->masyarakatModel = new MasyarakatModel();

        $this->petugasModel = new PetugasModel();
    }

    // ganti password masyarakat
    public function ganti_password_masyarakat($id)
    {
        $currentpassword = session('password');
        $data = $this->request->getPost();

        if (!$this->validate([
            'passwordLama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama harus diisi'
                ]
            ],
            'passwordBaru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru minimal 8 karakter'
                ]
            ],
            'confirm' => [
                'rules' => 'required|matches[passwordBaru]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/masyarakat/setting' . $this->request->getVar('id-masyarakat'))->withInput()->with('validation', $validation);
        }
        if ($data['passwordLama'] != $currentpassword) {
            session()->setFlashdata('pesan', 'Password Lama Tidak Cocok');
            return redirect()->to('/masyarakat/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi 
            $this->masyarakatModel->save([
                'id_masyarakat' => $id,
                'password' => $this->request->getVar('passwordBaru'),
            ]);
    
            session()->setFlashdata('pesan', 'Password Anda Berhasil Diubah');
            return redirect()->to('/masyarakat');
        }        
    }

    public function ganti_password_petugas($id)
    {
        $currentpassword = session('password');
        $data = $this->request->getPost();

        if (!$this->validate([
            'nama_petugas'=> [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi'
                ]
            ],
            'username'=> [
                "rules" => "required|alpha_numeric",
                "errors"=> [
                    "required"=> "Username harus diisi",
                    "alpha_numeric"=> "Username harus berupa huruf kecil semua"
                ]
            ],
            'passwordLama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama harus diisi'
                ]
            ],
            'passwordBaru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru minimal 8 karakter'
                ]
            ],
            'confirm' => [
                'rules' => 'required|matches[passwordBaru]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/setting' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }

        if ($data['passwordLama'] != $currentpassword) {
            session()->setFlashdata('pesan', 'Password Lama Tidak Cocok');
            return redirect()->to('/admin/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi 
            $this->petugasModel->save([
                'id_petugas' => $id,
                'nama_petugas'=> $this->request->getVar('nama_petugas'),
                'username'=> $this->request->getVar('username'),
                'password' => $this->request->getVar('passwordBaru'),
            ]);
    
            session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
            return redirect()->to('/petugas/setting');
        }        
    }

    public function ganti_password_admin($id)
    {
        $currentpassword = session('password');
        $data = $this->request->getPost();

        if (!$this->validate([
            'nama_petugas'=> [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi'
                ]
            ],
            'username'=> [
                "rules" => "required|alpha_numeric",
                "errors"=> [
                    "required"=> "Username harus diisi",
                    "alpha_numeric"=> "Username harus berupa huruf kecil semua"
                ]
            ],
            'passwordLama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Lama harus diisi'
                ]
            ],
            'passwordBaru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Baru harus diisi',
                    'min_length' => 'Password Baru minimal 8 karakter'
                ]
            ],
            'confirm' => [
                'rules' => 'required|matches[passwordBaru]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/setting' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }

        if ($data['passwordLama'] != $currentpassword) {
            session()->setFlashdata('pesan', 'Password Lama Tidak Cocok');
            return redirect()->to('/admin/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi 
            $this->petugasModel->save([
                'id_petugas' => $id,
                'nama_petugas'=> $this->request->getVar('nama_petugas'),
                'username'=> $this->request->getVar('username'),
                'password' => $this->request->getVar('passwordBaru'),
            ]);
    
            session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
            return redirect()->to('/admin/setting');
        }        
    }
}
