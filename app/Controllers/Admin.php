<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\MasyarakatModel;
use App\Models\PetugasModel;
use App\Models\TanggapanModel;

class Admin extends BaseController
{

    protected $session;
    protected $pengaduanModel;
    protected $tanggapanModel;
    protected $masyarakatModel;
    protected $petugasModel;

    protected $validation;
    public function __construct()
    {
        $this->session = session();

        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();

        $this->validation = \Config\Services::validation();

        $this->masyarakatModel = new MasyarakatModel();

        $this->petugasModel = new PetugasModel();
    }
    public function index(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];

        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $jumlah = $this->pengaduanModel->countAll();
        $jumlahBelumValidasi = $this->pengaduanModel->where('status', '0')->countAllResults();
        $jumlahSudahTanggapi = $this->pengaduanModel->where('status', '2')->countAllResults();
        $jumlahSudahValidasi = $this->pengaduanModel->where('status', '1')->countAllResults() + $jumlahSudahTanggapi;

        $januari = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '01')->countAllResults();
        $februari = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '02')->countAllResults();
        $maret = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '03')->countAllResults();
        $april = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '04')->countAllResults();
        $mei = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '05')->countAllResults();
        $juni = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '06')->countAllResults();
        $juli = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '07')->countAllResults();
        $agustus = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '08')->countAllResults();
        $september = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '09')->countAllResults();
        $oktober = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '10')->countAllResults();
        $november = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '11')->countAllResults();
        $desember = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '12')->countAllResults();

        $januariF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '01')->where('status', '0')->countAllResults();
        $februariF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '02')->where('status', '0')->countAllResults();
        $maretF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '03')->where('status', '0')->countAllResults();
        $aprilF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '04')->where('status', '0')->countAllResults();
        $meiF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '05')->where('status', '0')->countAllResults();
        $juniF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '06')->where('status', '0')->countAllResults();
        $juliF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '07')->where('status', '0')->countAllResults();
        $agustusF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '08')->where('status', '0')->countAllResults();
        $septemberF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '09')->where('status', '0')->countAllResults();
        $oktoberF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '10')->where('status', '0')->countAllResults();
        $novemberF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '11')->where('status', '0')->countAllResults();
        $desemberF = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '12')->where('status', '0')->countAllResults();

        $januariT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '01')->where('status', '1')->countAllResults();
        $februariT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '02')->where('status', '1')->countAllResults();
        $maretT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '03')->where('status', '1')->countAllResults();
        $aprilT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '04')->where('status', '1')->countAllResults();
        $meiT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '05')->where('status', '1')->countAllResults();
        $juniT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '06')->where('status', '1')->countAllResults();
        $juliT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '07')->where('status', '1')->countAllResults();
        $agustusT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '08')->where('status', '1')->countAllResults();
        $septemberT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '09')->where('status', '1')->countAllResults();
        $oktoberT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '10')->where('status', '1')->countAllResults();
        $novemberT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '11')->where('status', '1')->countAllResults();
        $desemberT = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '12')->where('status', '1')->countAllResults();

        $januariV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '01')->where('status', '2')->countAllResults();
        $februariV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '02')->where('status', '2')->countAllResults();
        $maretV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '03')->where('status', '2')->countAllResults();
        $aprilV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '04')->where('status', '2')->countAllResults();
        $meiV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '05')->where('status', '2')->countAllResults();
        $juniV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '06')->where('status', '2')->countAllResults();
        $juliV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '07')->where('status', '2')->countAllResults();
        $agustusV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '08')->where('status', '2')->countAllResults();
        $septemberV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '09')->where('status', '2')->countAllResults();
        $oktoberV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '10')->where('status', '2')->countAllResults();
        $novemberV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '11')->where('status', '2')->countAllResults();
        $desemberV = $this->pengaduanModel->where('MONTH(tanggal_pengaduan)', '12')->where('status', '2')->countAllResults();

        $januariY = $januariT + $januariV;
        $februariY = $februariT + $februariV;
        $maretY = $maretT + $maretV;
        $aprilY = $aprilT + $aprilV;
        $meiY = $meiT + $meiV;
        $juniY = $juniT + $juniV;
        $juliY = $juliT + $juliV;
        $agustusY = $agustusT + $agustusV;
        $septemberY = $septemberT + $septemberV;
        $oktoberY = $oktoberT + $oktoberV;
        $novemberY = $novemberT + $novemberV;
        $desemberY = $desemberT + $desemberV;

        $tanggal = date('Y-m-d');
        $totaly = $this->pengaduanModel->where('tanggal_pengaduan', $tanggal)->countAllResults();
        $pengaduan = $this->pengaduanModel->where('tanggal_pengaduan', $tanggal)->findAll();


        $data = [
            'title' => 'Data Kelahiran Sleman',
            'jumlah' => $jumlah,
            'jumlahBelumValidasi' => $jumlahBelumValidasi,
            'jumlahSudahTanggapi' => $jumlahSudahTanggapi,
            'jumlahSudahValidasi' => $jumlahSudahValidasi,

            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,

            'januariF' => $januariF,
            'februariF' => $februariF,
            'maretF' => $maretF,
            'aprilF' => $aprilF,
            'meiF' => $meiF,
            'juniF' => $juniF,
            'juliF' => $juliF,
            'agustusF' => $agustusF,
            'septemberF' => $septemberF,
            'oktoberF' => $oktoberF,
            'novemberF' => $novemberF,
            'desemberF' => $desemberF,

            'januariY' => $januariY,
            'februariY' => $februariY,
            'maretY' => $maretY,
            'aprilY' => $aprilY,
            'meiY' => $meiY,
            'juniY' => $juniY,
            'juliY' => $juliY,
            'agustusY' => $agustusY,
            'septemberY' => $septemberY,
            'oktoberY' => $oktoberY,
            'novemberY' => $novemberY,
            'desemberY' => $desemberY,

            'aduan' => $pengaduan,
            'totaly' => $totaly
        ];
        return view('admin/home', $data);
    }

    public function validasi(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $pengaduan = $this->pengaduanModel->findAll();
        $tanggapan = $this->tanggapanModel->findAll();

        $data = [
            'title' => 'Data Kelahiran Sleman',
            'tanggapan' => $tanggapan,
            'aduan' => $pengaduan
        ];

        return view('admin/validasi', $data);
    }

    public function management(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $masyarakat = $this->masyarakatModel->findAll();
        $data = [
            'title' => 'Data Kelahiran Sleman',
            'masyarakat' => $masyarakat
        ];

        return view('admin/masyarakat', $data);
    }

    public function tambahPetugas(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Tambah Petugas',
        ];

        return view('admin/tambah', $data);
    }

    public function savePetugas()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();

        //jalankan validasi
        $this->validation->run($data, 'tambah_petugas');

        //cek errornya
        $errors = $this->validation->getErrors();

        //jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('nama_petugas', $this->validation->getError('nama_petugas'));
            session()->setFlashdata('username', $this->validation->getError('username'));
            session()->setFlashdata('password', $this->validation->getError('password'));
            session()->setFlashdata('confirm', $this->validation->getError('confirm'));
            session()->setFlashdata('telepon', $this->validation->getError('telepon'));
            return redirect()->to('/admin/tambahpetugas');
        }

        //jika tdk ada error 
        //masukan data ke database
        $hashedpass = md5($data['password']);
        $this->petugasModel->save([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => $hashedpass,
            'telepon' => $data['telepon'],
            'level' => $data['level'],


        ]);

        //arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to('/admin/managementpetugas');
    }
    public function managementpetugas(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $petugas = $this->petugasModel->findAll();
        $data = [
            'title' => 'Data Kelahiran Sleman',
            'petugas' => $petugas
        ];

        return view('admin/petugas', $data);
    }

    public function setting(): string
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $petugas = $this->petugasModel->findAll();

        $data = [
            'title' => 'Setting',
            'petugas' => $petugas,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/setting', $data);
    }

    public function editMasyarakat($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'masyarakat' => $this->masyarakatModel->getMasyarakat($id)
        ];

        return view('admin/edit-masyarakat', $data);
    }

    public function updateMasyarakat($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
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

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "nik" => $this->request->getVar('nik'),
            "username" => $this->request->getVar('username'),
            "password" => $this->request->getVar('password'),
            "telepon" => $this->request->getVar('telepon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/admin/management');
    }

    public function deleteMasyarakat($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $this->masyarakatModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/management');
    }

    public function editPetugas($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->petugasModel->getPetugas($id)
        ];

        return view('admin/edit-petugas', $data);
    }

    public function updatePetugas($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas harus diisi'
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
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $password = session('password');
        $this->petugasModel->save([
            "id_petugas" => $id,
            "nama_petugas" => $this->request->getVar('nama_petugas'),
            "username" => $this->request->getVar('username'),
            "password" => $password,
            "telepon" => $this->request->getVar('telepon'),
            "level" => $this->request->getVar('level'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/admin/managementpetugas');
    }

    public function deletePetugas($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $this->petugasModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin/managementpetugas');
    }

    public function defaultpassMasyarakat($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $default = 'defaultpassword';
        $this->masyarakatModel->save([
            "id_masyarakat" => $id,
            "password" => md5($default),
        ]);
        session()->setFlashdata('pesan', 'Password berhasil diubah ke default.');
        return redirect()->to('/admin/management');
    }

    public function defaultpassPetugas($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLoginAdmin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-petugas', $nologin);
        }

        $default = 'defaultpassword';
        $this->petugasModel->save([
            "id_petugas" => $id,
            "password" => md5($default),
        ]);
        session()->setFlashdata('pesan', 'Password berhasil diubah ke default.');
        return redirect()->to('/admin/managementpetugas');
    }

    public function donglot()
    {
        $data = [
            'title' => 'Download Laporan Pengaduan',
        ];

        return view('admin/donglot', $data);
    }
}
