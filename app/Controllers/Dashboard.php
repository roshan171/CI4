<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        // Display the dashboard view
        return view('Dashboard');
    }
}
