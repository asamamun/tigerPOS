<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function __construct()
    {
        helper("form");
    }
    public function index()
    {
        return view("auth/register");
    }
    //store
    public function store(){
        $session = \Config\Services::session();
        $pass = $this->request->getPost('password');
        
        $repass = $this->request->getPost('repassword');
        if($pass == $repass){
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $data = [
                'name'          	=> $this->request->getPost('name'),
                'email'         	=> $this->request->getPost('email'),
                'password'     		=> $hash,
                ];
                $user = new UserModel();
                if($user->insert($data)){
                    $session->setFlashdata('message', 'Registered successfully');
                    return redirect()->to(base_url('/login'));
                }
                else{
                    $session->setFlashdata('message', 'Something Worng. Please try again');
                    return redirect()->to(base_url('/register'));
                }                
        } 
        else{
            $session->setFlashdata('message', 'Password Mismatch');
                    return redirect()->to(base_url('/register'));
        }       
       

    }
}
