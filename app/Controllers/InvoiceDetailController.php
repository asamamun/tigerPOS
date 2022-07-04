<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InvoiceDetailController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if (!$this->checkauth()) {
            return redirect('login');
        }
        $db      = \Config\Database::connect();
        $builder = $db->table('invoicedetails i')
            ->select('i.*, p.name as product_name')
            ->join('products p', 'p.id = i.product_id')
            // ->where('i.updated', null)
            ->get();
        //ddd($builder->getResult());
        $data = ['invoicedetails' => $builder->getResultArray('invoicedetails')];

        return view('invoicedetails/index', $data);
    }
}
