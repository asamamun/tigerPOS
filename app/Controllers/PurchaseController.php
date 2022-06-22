<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PurchaseController extends BaseController
{
    public function index()
    {
        if ($this->checkauth()) {
            return view('purchase/index');
        } else {
            return redirect("login");
        }
    }
}
