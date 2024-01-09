<?php

namespace App\Controllers;
use App\Models\StudentModel;

class StudentController extends BaseController
{

    public function __construct(){
        helper(['form','url']);
    }

    public function index()
    {
        $studentmodel= new StudentModel();
        $data['student']=$studentmodel->findAll();
        return view('student/view_student',$data);
    }

    public function create(){
        return view('student/add_student');
    }

    public function add_record(){

        $rules = [
            'name' => 'required|max_length[50]|alpha',
            'email' => 'required|max_length[254]|valid_email|is_unique[student.email,id]',
            'phone' => 'required|max_length[10]|is_unique[student.phone,id]',
            
        ];

        if($this->validate($rules)){
            $studentmodel= new StudentModel();
            $file = $this->request->getfile('image');
            if($file->isvalid() && ! $file->hasMoved())
            {
               $imagename= $file->getRandomName();
               $file->move('public/upload/',$imagename);
            }
    
           
            $data = [
                'name'       => $this->request->getpost('name'),
                'email'        => $this->request->getpost('email'),
                'phone'        => $this->request->getpost('phone'),
                'image'        => $imagename,
               
            
            ];
            $studentmodel->insert($data);
            return redirect('student')->with('status_icon','success')->with('status','Records Add Successfully');
            
    
        }
        else{
            $data['validation']=$this->validator;
            return view('student/add_student',$data);

        }

       
    }

    public function edit($id)
    {
 
        $studentmodel= new StudentModel();
        $data['studentmodel']=$studentmodel->find($id);
        return view('student/update_student',$data);
    
        }
     

        public function update($id)
        {
            
            $studentmodel= new StudentModel();
            $prod_item = $studentmodel->find($id);
            $file = $this->request->getfile('image');
            if($file->isvalid() && ! $file->hasMoved())
            {
               $old_img_name= $prod_item['image'];
               if(file_exists("public/upload/".$old_img_name)){
                unlink("public/upload/".$old_img_name);
               }
               $imagename=$file->getRandomName();
               $file->move('public/upload/',$imagename);
            }
            else{
                $imagename=$old_img_name;
            }
    
          
            $data = [
                'name'       => $this->request->getpost('name'),
                'email'        => $this->request->getpost('email'),
                'phone'        => $this->request->getpost('phone'),
                'image'        => $imagename,
            
            
            ];

            $studentmodel->update($id,$data);
            return redirect('student')->with('status_icon','success')->with('status','Records Updated Successfully');
        
            }
         

    

    public function delete($id){
        $studentmodel= new StudentModel();
        $row=$studentmodel->find($id);
        unlink('public/upload/'.$row['image']);
        $studentmodel->delete($id);
        return redirect('student')->with('status_icon','success')->with('status','Record Delete Successfully');
    }

    public function exportExcel()
    {
        $model = new StudentModel();
        $items = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'email');
        $sheet->setCellValue('D1', 'Phone');
        $sheet->setCellValue('E1', 'image');

        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item['id']);
            $sheet->setCellValue('B' . $row, $item['name']);
            $sheet->setCellValue('C' . $row, $item['email']);
            $sheet->setCellValue('D' . $row, $item['phone']);
            $sheet->setCellValue('E' . $row, $item['image']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'students_' . date('YmdHis') . '.xlsx';
        $writer->save($filename);

        // return redirect()->to('student')->with('success', 'Data exported to Excel successfully!');
        return redirect('student')->with('status_icon','success')->with('status','Data exported to Excel successfully!');
    }
}
