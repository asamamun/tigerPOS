<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;

//https://laratutorials.com/codeigniter-4-jquery-ui-autocomplete-search-from-database/

class PosController extends BaseController
{
    public function __construct()
    {
        helper('form', 'url');
    }

    public function index()
    {
        $acc = new AccountModel();
        $allacc = $acc->where('deleted', null)->select('id,name')->findAll();
        $dropacc = key_value_for_dropdown($allacc);
        // ddd($dropacc);
        // exit;
        $data['accounts'] = $dropacc;

        return view('pos/index');
    }
    public function search()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('products');
        $searchdata = $this->request->getGet("term");
        $builder->like('barcode', $searchdata);
        $builder->orLike('name', $searchdata);
        $query = $builder->get();
        $return_arr = [];
        foreach ($query->getResultArray() as $row) {
            $return_arr[] = array(
                'label' => $row['name'],
                'value' => $row['id'],
                'id' => $row['id']
            );
        }
        echo json_encode($return_arr);
    }

    public function addtocart()
    {
        $id = $this->request->getPost('id');
        $p = new ProductModel();
        $row = $p->find($id);
        $return_arr = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['retail_price'],
            'barcode' => $row['barcode'],
        );
        echo json_encode($return_arr);
    }

    public function customersearch()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('customers');
        $searchdata = $this->request->getGet("term");
        $builder->like('name', $searchdata);
        // $builder->orLike('name', $searchdata);
        $query = $builder->get();
        $return_arr = [];
        foreach ($query->getResultArray() as $row) {
            $return_arr[] = array(
                'label' => $row['name'],
                'value' => $row['id'],
                'id' => $row['id']
            );
        }
        echo json_encode($return_arr);
    }
    public function addcustomer()
    {
        $id = $this->request->getPost('id');
        $p = new ProductModel();
        $row = $p->find($id);
        $return_arr = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'mobile' => $row['mobile'],
            'address' => $row['address'],
        );
        echo json_encode($return_arr);
    }
}
