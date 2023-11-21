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
        $newpassword = $this->request->getPost();
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
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/masyarakat/setting' . $this->request->getVar('id-masyarakat'))->withInput()->with('validation', $validation);
        }
        // get error validation
        if (md5($data['passwordLama']) != $currentpassword) {
            // ambil pesan error dari $validation
            $pesanLama = $this->validation->getError('passwordLama');
            session()->setFlashdata('a', 'Password Lama Tidak Cocok');
            return redirect()->to('/masyarakat/setting');
        }
        if (md5($data['passwordBaru']) == $currentpassword) {
            session()->setFlashdata('b', 'Password Baru Tidak Boleh Sama Dengan Password Lama');
            return redirect()->to('/masyarakat/setting');
        }
        // confirm password tidak sesuai dengan password baru
        if ($data['confirm'] != $newpassword['passwordBaru']) {
            session()->setFlashdata('c', 'Konfirmasi Password Tidak Sesuai');
            return redirect()->to('/masyarakat/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi 
            $this->masyarakatModel->save([
                'id_masyarakat' => $id,
                'password' => $this->request->getVar('passwordBaru'),
            ]);

            $this->session->set([
                'id_masyarakat' => session('id_masyarakat'), //tambahkan id_masyarakat ke session
                'username' => session('username'),
                'password' => $newpassword['passwordBaru'], //tambahkan password ke session
                'nik' => session('nik'),
                'nama' => session('nama'),
                'telp' => session('telp'),
                'isLogin' => true,
            ]);

            session()->setFlashdata('pesan', 'Password Anda Berhasil Diubah');
            return redirect()->to('/masyarakat/setting');
        }
    }

    public function ganti_password_petugas($id)
    {
        $newpassword = $this->request->getPost();
        $currentpassword = session('password');
        $data = $this->request->getPost();

        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi'
                ]
            ],
            'username' => [
                "rules" => "required|alpha_numeric",
                "errors" => [
                    "required" => "Username harus diisi",
                    "alpha_numeric" => "Username harus berupa huruf kecil semua"
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
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/setting' . $this->request->getVar('id_petugas'))->withInput()->with('validation', $validation);
        }

        if (md5($data['passwordLama']) != $currentpassword) {
            session()->setFlashdata('a', 'Password Lama Tidak Cocok');
            return redirect()->to('/petugas/setting');
        }
        if (md5($data['passwordBaru']) == $currentpassword) {
            session()->setFlashdata('b', 'Password Baru Tidak Boleh Sama Dengan Password Lama');
            return redirect()->to('/petugas/setting');
        }
        if ($data['confirm'] != $newpassword['passwordBaru']) {
            session()->setFlashdata('c', 'Konfirmasi Password Tidak Sesuai');
            return redirect()->to('/petugas/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi
            $hashedpass = md5($newpassword['passwordBaru']);
            $this->masyarakatModel->save([
                'id_masyarakat' => $id,
                'password' => $this->request->getVar('passwordBaru'),
            ]);

            $this->session->set([
                'id_petugas' => session('id_petugas'), //tambahkan id_petugas ke session
                'username' => session('username'),
                'password' => $hashedpass, //tambahkan password ke session
                'nama_petugas' => session('nama_petugas'),
                'level' => session('level'),
                'isLoginPetugas' => true,
            ]);

            session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
            return redirect()->to('/petugas/setting');
        }
    }

    public function ganti_password_admin($id)
    {
        $newpassword = $this->request->getPost();
        $currentpassword = session('password');
        $data = $this->request->getPost();

        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi'
                ]
            ],
            'username' => [
                "rules" => "required|alpha_numeric",
                "errors" => [
                    "required" => "Username harus diisi",
                    "alpha_numeric" => "Username harus berupa huruf kecil semua"
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

        if (md5($data['passwordLama']) != $currentpassword) {
            session()->setFlashdata('pesan', 'Password Lama Tidak Cocok');
            return redirect()->to('/admin/setting');
        } else {
            //jika benar, arahkan user masuk ke aplikasi 
            $hashedpass = md5($newpassword['passwordBaru']);
            $this->petugasModel->save([
                'id_petugas' => $id,
                'nama_petugas' => $this->request->getVar('nama_petugas'),
                'username' => $this->request->getVar('username'),
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

            session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
            return redirect()->to('/admin/setting');
        }
    }
}
