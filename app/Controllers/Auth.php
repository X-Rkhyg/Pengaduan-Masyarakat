<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login - Aplikasi Pendataan Penduduk'
        ];
        //menampilkan halaman login
        return view('auth/login', $data);
    }

    public function daftar()
    {
        $data = [
            'title' => 'Daftar - Aplikasi Pendataan Penduduk'
        ];
        //menampilkan halaman register
        return view('auth/daftar', $data);
    }
}
