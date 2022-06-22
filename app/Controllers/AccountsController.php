<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AccountsController extends BaseController
{
    public function index()
    {
        if($this->checkauth()){
            return view('accounts/index');
        }
        else{
            return redirect("login");
        }

    }
}
