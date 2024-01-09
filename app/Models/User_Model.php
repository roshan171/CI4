<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'userss';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];
}
