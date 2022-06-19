<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestCOntroller extends BaseController
{
    public function index()
    {
        return view("test");
    }
}
