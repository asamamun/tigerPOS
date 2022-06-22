<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SalesController extends BaseController
{
    public function index()
    {
        if ($this->checkauth()) {
            return view('sales/index');
        } else {
            return redirect("login");
        }
    }
}
