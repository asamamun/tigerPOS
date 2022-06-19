<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomersController extends BaseController
{
    public function index()
    {
        $customers = new CustomerModel();
        $data['customers'] = $customers->findAll();
        return view('customers/index', $data);
    }
}
