<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PosController extends BaseController
{
    public function index()
    {
        return view('pos/index');
    }
}
