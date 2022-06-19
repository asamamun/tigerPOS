<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        return view('products/index');
    }
}
