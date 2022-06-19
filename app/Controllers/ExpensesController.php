<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ExpensesController extends BaseController
{
    public function index()
    {
        return view('expenses/index');
    }
}
