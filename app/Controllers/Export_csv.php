<?php

namespace App\Controllers;
use App\Models\export_csv_model;

class Export_csv extends BaseController
{

    public function __construct(){
        helper(['form','url']);

        $this->load->model('export_csv_model');
    }

   
 function index()
 {
  $data['student'] = $this->export_csv_model->fetch_data();
  $this->load->view('student/view_student', $data);
 }

 function export()
 {
  $file_name = 'student_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $student_data = $this->export_csv_model->fetch_data();

     // file creation 
     $file = fopen('php://output', 'w');
 
     $header = array("Name ","Email","Phone","Image","Status"); 
     fputcsv($file, $header);
     foreach ($student_data->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }
}