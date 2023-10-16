<?php

namespace App\Controllers;

class Masyarakat extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
}
