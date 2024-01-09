<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Testmail extends BaseController
{
    public function index()
    {
        $to = 'roshandhawde143@outlook.com';
        $subject = 'Account Activation Roshan';
        $message = 'Hello Roshan,<br><br> Thanks Your Account Created Successfully.. Please clock the below link to activate your account <br><br>
        <a herf="'.base_url().'/testmail/verify" target="_blank">Activate Now</a><br><br> Thanks<br> Team';
        
         $email= \Config\Services::email();

         $email->setTo($to);
         $email->setFrom('roshandhawde143@gmail.com','Info');
         $email->setSubject($subject);
         $email->setMessage($message);

         if($email->send()){
            echo "Account Created Successfully. Please Activate Your Account";

         }
         else{
            $data = $email->printDebugger(['header']);
            print_r($data);
         }
      
    }

    public function verify(){
        echo "Account Verified";
    }
}
