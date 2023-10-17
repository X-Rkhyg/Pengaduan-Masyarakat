<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class LoginPetugas extends BaseController
{
    protected $pengaduanModel;
    protected $session;
    public function __construct()
    {
        $this->session = session();
        $this->pengaduanModel = new PengaduanModel();
    }
    
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        //cek role dari session
        if($this->session->get('role') != 2){
            return redirect()->to('/LoginPetugas');
        }

        $pengaduan = $this->pengaduanModel->findAll();
        $data = [
            'pengaduan' => $pengaduan
        ];
        return view('admin/index', $data);
        
    }
    
}