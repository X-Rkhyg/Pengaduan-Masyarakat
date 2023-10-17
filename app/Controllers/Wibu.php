<?php

namespace App\Controllers;

class Wibu extends BaseController
{
    public function index(): string
    {
        return view('wibusoft/home');
    }
}
