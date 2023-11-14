<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\TanggapanModel;

class Pengaduan extends BaseController
{
    protected $pengaduanModel;
    protected $tanggapanModel;
    protected $session;
    protected $helper = ['form', 'url'];

    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();
    }

    public function save()
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }


        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul laporan harus diisi'
                ]
            ],
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi laporan harus diisi'
                ]
            ],

            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi laporan harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,10240]',
                'errors' => [
                    'uploaded' => 'File harus ditambahkan',
                    'max_size' => 'Ukuran file harus kurang dari 10MB',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        // ambil nama file sampul
        $idmasyarakat = session('id_masyarakat');

        $this->pengaduanModel->save([
            "isi_laporan" => $this->request->getVar('isi_laporan'),
            'id_masyarakat' => $idmasyarakat,
            'judul' => $this->request->getVar('judul'),
            'tanggal_pengaduan' => date('Y-m-d'),
            'lokasi' => $this->request->getVar('lokasi'),
            'foto' => $newName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/masyarakat/lihat');
    }

    public function download($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $foto = new PengaduanModel();
        $dataFile = $foto->find($id);
        return $this->response->download('foto_storage/' . $dataFile['foto'], null);
    }

    public function delete($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $deleted = 'deleted';
        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            "status" => $deleted,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/masyarakat/lihat');
    }

    public function edit($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'aduan' => $this->pengaduanModel->getPengaduan($id),
        ];

        return view('masyarakat/edit', $data);
    }

    public function update($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $idmasyarakat = session('id_masyarakat'); // Ambil nik dari session
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul laporan harus diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi laporan harus diisi'
                ]
            ],
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi laporan harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,10240]',
                'errors' => [
                    'max_size' => 'Ukuran file harus kurang dari 10MB',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->to('/pengaduan/edit/' . $this->request->getVar('id_pengaduan'))->withInput()->with('validation', $validation);
        }

        // ambil gambar
        if ('' == $this->request->getFile('foto')->getName()) {
            $fileDokumen = $this->pengaduanModel->getFileData($id);
            $newName = $fileDokumen['foto'];
        } else {
            $fileDokumen = $this->request->getFile('foto');
            $newName = $fileDokumen->getRandomName();
            $fileDokumen->move('foto_storage', $newName);
        }
        // ambil nama file sampul


        $this->pengaduanModel->save([
            'id_pengaduan' => $id,
            'judul' => $this->request->getVar('judul'),
            "isi_laporan" => $this->request->getVar('isi_laporan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'id_masyarakat' => $idmasyarakat,
            'foto' => $newName,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/masyarakat/lihat');
    }

    public function lihattanggapan($id)
    {
        $nologin = [
            'title' => 'Login - Aplikasi Pengaduan Masyarakat'
        ];
        if (!session()->get('isLogin')) {
            // Jika belum login, arahkan pengguna ke halaman login
            return view('/auth/login-masyarakat', $nologin);
        }

        $data = [
            'title' => 'Edit Data Kelahiran',
            'validation' => \Config\Services::validation(),
            'tanggapan' => $this->tanggapanModel->getTanggapan($id)
        ];

        $data = $this->tanggapanModel->table('tanggapan')
            ->where('id_pengaduan', $id)
            ->get()
            ->getResult();


        return view('masyarakat/tanggapan', ['data' => $data]);
    }
}
