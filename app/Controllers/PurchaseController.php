<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PurchaseController extends BaseController
{
    public function index()
    {
        return view('purchase/index');
    }
}
