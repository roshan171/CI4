<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('Admin/login');
    }

    public function dashboard()
    {
        return view('Admin/dashboard');
    }
}
