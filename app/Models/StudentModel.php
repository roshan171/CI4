<?php

namespace App\Models;
use CodeIgniter\Model;

class StudentModel extends Model{
     protected $table='Student';
     protected $primaryKey='id';
     protected $allowedFields=['name','email','phone','image','created_at'];

}





?>