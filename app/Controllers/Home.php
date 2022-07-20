<?php

namespace App\Controllers;

use App\Models\ExpenseModel;
use App\Models\UserModel;
use App\Models\InvoiceModel;
use App\Models\OrderModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if ($this->checkauth()) {
            $u = new UserModel();
            $data['totalusers'] = $u->countAll();

            //total sales
            $invoice = new InvoiceModel();
            $invresult = $invoice->select('sum(grandtotal) as totalsales')->first();
            $data['totalsales'] = $invresult['totalsales'];

            //total purchase
            $purchase = new OrderModel();
            $purchaseresult = $purchase->select('sum(grandtotal) as totalpurchase')->first();
            $data['totalpurchase'] = $purchaseresult['totalpurchase'];

            //total expense
            $expense = new ExpenseModel();
            $expresult = $expense->select('sum(amount) as totalexpense')->first();
            $data['totalexpense'] = $expresult['totalexpense'];

            //total order
            $o = new OrderModel();
            $data['totalorder'] = $o->countAll();

            $data['totalpacked'] = 9999;
            $data['purchasedue'] = 9999;
            $data['invoicedue'] = 9999;

            //total daily sales
            // $invoice = new InvoiceModel();
            // $invresult = $invoice->select('sum(grandtotal) as totalsales')->first();
            // $data['totalsales'] = $invresult['totalsales'];
            return view('dashboard/dashboard', $data);
        } else {
            return redirect("login");
        }
        //
    }
}
