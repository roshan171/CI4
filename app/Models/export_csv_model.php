<?php

namespace App\Models;
use CodeIgniter\Model;

class export_csv_model extends Model{
     function fetch_data(){
        $this->db->select("name","email","phone","image","status");
        $this->db->from("student");
        return $this->db->get();
     }

}





?>