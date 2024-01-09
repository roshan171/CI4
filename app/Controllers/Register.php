<?php

namespace App\Controllers;

use App\Models\User_Model;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function save()
    {
        $model = new User_Model();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model->insert($data);

        return redirect()->to('/login');
    }
}
