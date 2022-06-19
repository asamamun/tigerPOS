<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SalesController extends BaseController
{
    public function index()
    {
        return view('sales/index');
    }
}
