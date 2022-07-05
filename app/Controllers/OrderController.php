<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderController extends BaseController
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
        $builder = $db->table('orders o')
            ->select('o.*, s.name as supplier_name, a.name as accname')
            ->join('suppliers s', 's.id = o.supplier_id')
            ->join('accounts a', 'a.id = o.payment_type')
            ->where('o.updated', null)
            ->get();
        // ddd($builder->getResult());
        $data = ['orders' => $builder->getResultArray('orders')];

        return view('order/index', $data);
    }
    public function details($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('orders o')
            ->select('o.*, od.*, p.name as product_name, s.name as supplier_name')
            ->join('orderdetails od', 'o.id = od.order_id')
            ->join('products p', 'p.id = od.product_id')
            ->join('suppliers s', 's.id = o.supplier_id')
            ->where('o.id', $id)
            ->get();
        $data = ['order' => $builder->getResultArray()];
        // ddd($data);
        return view('order/details', $data);
    }
}
