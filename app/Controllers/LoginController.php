<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper("form");
    }
    public function index()
    {
        return view("auth/login");
    }
    public function check(){
//
$session = \Config\Services::session();
        $email = $this->request->getPost('email');
        
        $pass = $this->request->getPost('password');
        $user = new UserModel();
        $info = $user->where("email",$email)->first();
        // var_dump($info);
        // exit;
        if($info){
            if(password_verify($pass,$info['password'])){
                return redirect()->to(base_url("/dashboard"));
            }
            else{
                $session->setFlashdata('message', 'Auth Failed!!');
                return redirect()->to(base_url('/login')); 
            }              
        } 
        else{
            $session->setFlashdata('message', 'No user Found');
                    return redirect()->to(base_url('/login'));
        }      
//
    }
}
