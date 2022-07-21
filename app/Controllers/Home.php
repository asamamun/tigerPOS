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
        //$db = db_connect();
        $db      = \Config\Database::connect();
        $filter = $this->request->getGet('filter');
        // echo $filter . " <br>";
        // ddd($filter); exit;
        if ($this->checkauth()) {

            //users
            $userbuilder = $db->table('users');

            if ($filter == null) {
                //user
                $userbuilder->select("id");
                $query   = $userbuilder->get()->getResultArray();
                $data['totalusers'] = count($query);
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
            } else {

                if ($filter == "today") {
                    //user
                    $today = date("Y-m-d");
                    $userbuilder->select("id");
                    $userbuilder->where('created_at >', $today . " 00:00:00");
                    $userbuilder->where('created_at <', $today . " 23:59:59");
                    $r = $userbuilder->get()->getResultArray();
                    $data['totalusers'] = count($r);
                    //totalsale
                    $currentdate = date("Y-m-d");
                  
                    //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");

                    $query = $db->query('SELECT sum(`grandtotal`) as totalsales, DATE_FORMAT(created, "%m-%y-%d") as cdate FROM `invoice` WHERE (created between "' . $today . ' 00:00:00" and "' . $currentdate . ' 23:59:59")GROUP BY DATE_FORMAT(created, "%m-%y-%d")');
                    // echo date("Y-m-d",$last30date);
                    $data['totalsales'] = $query;

                    //totalpurchase


                }
                if ($filter == "yesterday") {
                    //user
                    $time = date("Y-m-d");
                    $today = date("Y-m-d", strtotime("$time-1 day"));
                    $yesterday = date("Y-m-d", strtotime("$time -2 days"));
                    $userbuilder->select("id");
                    $userbuilder->where('created_at >', $yesterday . " 00:00:00");
                    $userbuilder->where('created_at <', $today . " 23:59:59");
                    $r = $userbuilder->get()->getResultArray();
                    $data['totalusers'] = count($r);
                }
                if ($filter == "last7") {
                    //user
                    $today = date("Y-m-d");
                    $last7date = date("Y-m-d", strtotime("$today -7 days"));
                    $userbuilder->select("id");
                    $userbuilder->where('created_at >', $last7date . " 00:00:00");
                    $userbuilder->where('created_at <', $today . " 23:59:59");
                    $r = $userbuilder->get()->getResultArray();
                    $data['totalusers'] = count($r);
                }
                if ($filter == "lastmonth") {
                    //user
                    $today = date("Y-m-d");
                    $last30date = date("Y-m-d", strtotime("$today -30 days"));
                    $userbuilder->select("id");
                    $userbuilder->where('created_at >', $last30date . " 00:00:00");
                    $userbuilder->where('created_at <', $today . " 23:59:59");
                    $r = $userbuilder->get()->getResultArray();
                    $data['totalusers'] = count($r);
                }
            }



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

            //past 30 days sale
            $currentdate = date("Y-m-d");
            $last30date = date("Y-m-d", strtotime("$currentdate -30 days"));
            //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");

            $query = $db->query('SELECT sum(`grandtotal`) as totalsales, DATE_FORMAT(created, "%m-%y-%d") as cdate FROM `invoice` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $currentdate . ' 23:59:59")GROUP BY DATE_FORMAT(created, "%m-%y-%d")');
            // echo date("Y-m-d",$last30date);
            $data['sales30'] = $query;

            /*             foreach ($query->getResult() as $row) {
                echo $row->totalsales;
                echo " | ";
                echo $row->cdate;
                echo "<hr>";
            }
                      exit; */
            return view('dashboard/dashboard', $data);
        } else {
            return redirect("login");
        }
        //
    }
}
