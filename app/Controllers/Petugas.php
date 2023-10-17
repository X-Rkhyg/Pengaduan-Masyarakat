<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function index(): string
    {
        return view('petugas/home');
    }

    public function validasi(): string
    {
        return view('masyarakat/validasi');
    }
}
