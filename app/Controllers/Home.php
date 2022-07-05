<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\InvoiceModel;

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
            //total of grand total
            $invoice = new InvoiceModel();
		$result = $invoice->select('sum(grandtotal) as totalsales')->first();
		$data['totalsales'] = $result['totalsales'];




            $data['totalpurchase'] = 9999;
            $data['totalexpense'] = 9999;
            $data['totalorder'] = 9999;
            $data['totalpacked'] = 9999;
            $data['purchasedue'] = 9999;
            $data['invoicedue'] = 9999;
            return view('dashboard/dashboard', $data);
        } else {
            return redirect("login");
        }
        //
    }
}
