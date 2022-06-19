<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuppliersController extends BaseController
{
    public function index()
    {
        return view('suppliers/index');
    }
}
