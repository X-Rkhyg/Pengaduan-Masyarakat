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
                'errors'=> [
                    'required'=> 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/masyarakat/setting' . $this->request->getVar('id-masyarakat'))->withInput()-> with('validation', $validation);
        }

        $this -> masyarakatModel -> save([
            'id_masyarakat' => $id,
            'password' => $this->request->getVar('passwordBaru'),
        ]);

        session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
        return redirect()->to('/masyarakat');
    }

    public function ganti_password_petugas($id)
    {

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
                'errors'=> [
                    'required'=> 'Konfirmasi Password harus diisi',
                    'matches' => 'Konfirmasi Password tidak sesuai'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/setting' . $this->request->getVar('id_petugas'))->withInput()-> with('validation', $validation);
        }

        $this -> petugasModel -> save([
            'id_petugas' => $id,
            'password' => $this->request->getVar('passwordBaru'),
        ]);

        session()->setFlashdata('pesan', 'Password anda Berhasil diubah');
        return redirect()->to('/petugas');

    }
}