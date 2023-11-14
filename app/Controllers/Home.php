<?php

namespace App\Controllers;

use App\Models\PengaduanModel;

class Home extends BaseController
{
    protected $session;
    protected $pengaduanModel;
    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
    }
    public function index(): string
    {

        $data = [
            'title' => 'Home',
            'jumlah' => $this->pengaduanModel->countAllResults(),
        ];

        return view('home', $data);
    }
}
