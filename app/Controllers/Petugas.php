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
        return view('petugas/home');
    }

    public function validasi(): string
    {
        $pengaduan = $this->pengaduanModel->findAll();

        $data = [
            'title' => 'Data Kelahiran Sleman',
            'aduan' => $pengaduan
        ];

        return view('petugas/validasi', $data);
    }

    public function management(): string
    {
        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Kelahiran Sleman',
            'masyarakat' => $masyarakat
        ];

        return view('petugas/masyarakat', $data);
    }

    public function setting(): string
    {
        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Setting',
            'petugas' => $petugas,
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/setting', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $this->masyarakatModel->getMasyarakat($id)
        ];

        return view('petugas/edit', $data);
    }

    public function update($id)
    {

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
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
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

            return redirect()->to('/masyarakatp/edit' . $this->request->getVar('id_masyarakat'))->withInput()-> with('validation', $validation);
        }

        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "nik" => $this->request->getVar('nik'),
            "username" => $this->request->getVar('username'),
            "password" => $this->request->getVar('password'),
            "telepon" => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/petugas/management');
    }


}
