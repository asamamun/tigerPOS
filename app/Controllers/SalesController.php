<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SalesController extends BaseController
{
    public function index()
    {
        if ($this->checkauth()) {
            $db      = \Config\Database::connect();
            $builder = $db->table('invoice i')
                ->select('i.*, c.name as custname, c.mobile as custmob, c.address as custaddress, a.name as accname')
                ->join('customers c', 'c.id = i.customer_id')
                ->join('accounts a', 'a.id = i.payment_type')
                // ->join('invoicedetails d', 'd.id = p.category_id')
                ->where('i.updated', null)
                ->get();
            //ddd($builder->getResult());
            $data = ['sales' => $builder->getResultArray('sales')];

            return view('sales/index', $data);
        } else {
            return redirect("login");
        }
    }
    public function create()
    {
        if ($this->checkauth()) {
            return view('sales/create');
        } else {
            return redirect("login");
        }
    }
}
