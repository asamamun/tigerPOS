<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

//https://laratutorials.com/codeigniter-4-jquery-ui-autocomplete-search-from-database/

class PosController extends BaseController
{
    public function __construct()
    {
        helper('form','url');
    }

    public function index()
    {
       
        return view('pos/index');
    }

    public function getTerm()
    {

        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('products');
        $query = $builder->like('name', $this->request->getVar('term'))
            ->select('id, name')
            ->limit(10)->get();
        $data = $query->getResult();

        echo json_encode($data);
    }

}
