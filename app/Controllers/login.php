<?php

namespace App\Controllers;

use App\Models\User_Model;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $model = new User_Model();

        $user = $model->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Authentication successful, set user session
            $session = session();
            $session->set(['user_id' => $user['id'], 'username' => $user['username']]);

            return redirect()->to('/dashboard'); // Redirect to dashboard or any protected page
        } else {
            // Authentication failed, redirect back to login
            return redirect()->to('/login')->with('error', 'Invalid email or password');
        }
    }
}
