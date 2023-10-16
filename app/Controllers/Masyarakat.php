<?php

namespace App\Controllers;

class Masyarakat extends BaseController
{
    public function index(): string
    {
        return view('masyarakat/home');
    }

    public function tambah(): string
    {
        return view('masyarakat/tambah');
    }

    public function lihat(): string
    {
        return view('masyarakat/lihat');
    }
}
