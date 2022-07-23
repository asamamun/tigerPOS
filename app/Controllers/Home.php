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
            $orderbuilder = $db->table('orders');

            if ($filter == null) {
                //user
                $userbuilder->select("id");
                $query   = $userbuilder->get()->getResultArray();
                $data['totalusers'] = count($query);
                //sales
                $query = $db->query('SELECT sum(`grandtotal`) as totalsales FROM `invoice` where 1');
                $data['totalsales'] = $query->getFirstRow();
                //purchase
                $query = $db->query('SELECT sum(`grandtotal`) as totalpurchase FROM `orders` where 1');
                $data['totalpurchase'] = $query->getFirstRow();
                //expense
                $query = $db->query('SELECT sum(`amount`) as totalexpense FROM `expenses` where 1');
                $data['totalexpense'] = $query->getFirstRow();

                //order
                $orderbuilder->select("id");
                $query   = $orderbuilder->get()->getResultArray();
                $data['totalorders'] = count($query);
                //packed
                // $userbuilder->select("id");
                // $query   = $userbuilder->get()->getResultArray();
                // $data['totalusers'] = count($query);
                //purchasedue
                // $query = $db->query('SELECT sum(`grandtotal`) as totalsales FROM `invoice` where 1');
                // $data['totalsales'] = $query->getFirstRow();
                //invoicedue
                // $query = $db->query('SELECT sum(`grandtotal`) as totalsales FROM `invoice` where 1');
                // $data['totalsales'] = $query->getFirstRow();






            } else {

                if ($filter == "today") {
                    //user
                    $today = date("Y-m-d");
                    $userbuilder->select("id");
                    $userbuilder->where('created_at >', $today . " 00:00:00");
                    $userbuilder->where('created_at <', $today . " 23:59:59");
                    $r = $userbuilder->get()->getResultArray();
                    $data['totalusers'] = count($r);
                    //sales
                    $today = date("Y-m-d");

                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->where('created',$today)->select('sum(grandtotal) as totalsales')->first();  
                    // $data['totalsales'] = $invresult['totalsales'];

                    $sql = 'SELECT sum(`grandtotal`) as totalsales FROM `invoice` WHERE (created between "' . $today . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalsales'] = $query->getFirstRow();
                    //totalpurchase
                    $today = date("Y-m-d");
                    $sql = 'SELECT sum(`grandtotal`) as totalpurchase FROM `orders` WHERE (created between "' . $today . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalpurchase'] = $query->getFirstRow();
                    //totalexpense
                    $today = date("Y-m-d");
                    $sql = 'SELECT sum(`amount`) as totalexpense FROM `expenses` WHERE (created between "' . $today . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalexpense'] = $query->getFirstRow();
                    //totalorders
                    $today = date("Y-m-d");
                    $orderbuilder->select("id");
                    $orderbuilder->where('created >', $today . " 00:00:00");
                    $orderbuilder->where('created <', $today . " 23:59:59");
                    $r = $orderbuilder->get()->getResultArray();
                    $data['totalorders'] = count($r);
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
                    //sales
                    $time = date("Y-m-d");
                    $today = date("Y-m-d", strtotime("$time-1 day"));
                    $yesterday = date("Y-m-d", strtotime("$time -2 days"));
                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->select('sum(grandtotal) as totalsales')->where('created>', $yesterday . " 00:00:00")
                    //     ->where('created<', $today . " 23:59:59")->first();
                    // $data['totalsales'] = $invresult['totalsales'];
                    $sql = 'SELECT sum(`grandtotal`) as totalsales FROM `invoice` WHERE (created between "' . $yesterday . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalsales'] = $query->getFirstRow();
                    //totalpurchase
                    $time = date("Y-m-d");
                    $today = date("Y-m-d", strtotime("$time-1 day"));
                    $yesterday = date("Y-m-d", strtotime("$time -2 days"));
                    $sql = 'SELECT sum(`grandtotal`) as totalpurchase FROM `orders` WHERE (created between "' . $yesterday . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalpurchase'] = $query->getFirstRow();
                    //totalexpenses
                    $sql = 'SELECT sum(`amount`) as totalexpense FROM `expenses` WHERE (created between "' . $yesterday . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalexpense'] = $query->getFirstRow();
                    //totalorders
                    $orderbuilder->select("id");
                    $orderbuilder->where('created >', $yesterday . " 00:00:00");
                    $orderbuilder->where('created <', $today . " 23:59:59");
                    $r = $orderbuilder->get()->getResultArray();
                    $data['totalorders'] = count($r);
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
                    //sales
                    $today = date("Y-m-d");
                    $last7date = date("Y-m-d", strtotime("$today -7 days"));
                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->select('sum(grandtotal) as totalsales')->where('created >', $last7date . " 00:00:00")
                    //     ->where('created <', $today . " 23:59:59")->first();
                    // $data['totalsales'] = $invresult['totalsales'];
                    $query = $db->query('SELECT sum(`grandtotal`) as totalsales FROM `invoice` WHERE (created between "' . $last7date . ' 00:00:00" and "' . $today . ' 23:59:59")');
                    $data['totalsales'] = $query->getFirstRow();
                    //totalpurchase
                    $today = date("Y-m-d");
                    $last7date = date("Y-m-d", strtotime("$today -7 days"));
                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->select('sum(grandtotal) as totalsales')->where('created >', $last7date . " 00:00:00")
                    //     ->where('created <', $today . " 23:59:59")->first();
                    // $data['totalsales'] = $invresult['totalsales'];
                    $query = $db->query('SELECT sum(`grandtotal`) as totalpurchase FROM `orders` WHERE (created between "' . $last7date . ' 00:00:00" and "' . $today . ' 23:59:59")');
                    $data['totalpurchase'] = $query->getFirstRow();
                    //totalexpense
                    $today = date("Y-m-d");
                    $last7date = date("Y-m-d", strtotime("$today -7 days"));
                    $sql = 'SELECT sum(`amount`) as totalexpense FROM `expenses` WHERE (created between "' . $last7date . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalexpense'] = $query->getFirstRow();
                    //totalorders
                    $orderbuilder->select("id");
                    $orderbuilder->where('created >', $last7date . " 00:00:00");
                    $orderbuilder->where('created <', $today . " 23:59:59");
                    $r = $orderbuilder->get()->getResultArray();
                    $data['totalorders'] = count($r);
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
                    //totalsales
                    //sales
                    $today = date("Y-m-d");
                    $last30date = date("Y-m-d", strtotime("$today -30 days"));
                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->where('created',$today)->select('sum(grandtotal) as totalsales')->first();  
                    // $data['totalsales'] = $invresult['totalsales'];
                    $sql = 'SELECT sum(`grandtotal`) as totalsales FROM `invoice` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalsales'] = $query->getFirstRow();
                    // ddd($data);
                    // exit();
                    //totalpurchase
                    $today = date("Y-m-d");
                    $last30date = date("Y-m-d", strtotime("$today -30 days"));
                    // $invoice = new InvoiceModel();
                    // $invresult = $invoice->where('created',$today)->select('sum(grandtotal) as totalsales')->first();  
                    // $data['totalsales'] = $invresult['totalsales'];
                    $sql = 'SELECT sum(`grandtotal`) as totalpurchase FROM `orders` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalpurchase'] = $query->getFirstRow();

                    //totalexpense
                    $today = date("Y-m-d");
                    $last30date = date("Y-m-d", strtotime("$today -30 days"));
                    $sql = 'SELECT sum(`amount`) as totalexpense FROM `expenses` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $today . ' 23:59:59")';
                    // ddd($sql);
                    $query = $db->query($sql);
                    $data['totalexpense'] = $query->getFirstRow();
                    //totalorders
                    $orderbuilder->select("id");
                    $orderbuilder->where('created >', $today . " 00:00:00");
                    $orderbuilder->where('created <', $last30date . " 23:59:59");
                    $r = $orderbuilder->get()->getResultArray();
                    $data['totalorders'] = count($r);
                }
            }






            // $invoice = new InvoiceModel();
            // $invresult = $invoice->select('sum(grandtotal) as totalsales')->where('created>', null)->first();
            // $data['totalsales'] = $invresult['totalsales'];

            //total purchase
            // $purchase = new OrderModel();
            // $purchaseresult = $purchase->select('sum(grandtotal) as totalpurchase')->first();
            // $data['totalpurchase'] = $purchaseresult['totalpurchase'];

            //total expense
            // $expense = new ExpenseModel();
            // $expresult = $expense->select('sum(amount) as totalexpense')->first();
            // $data['totalexpense'] = $expresult['totalexpense'];

            //total order
            // $o = new OrderModel();
            // $data['totalorder'] = $o->countAll();

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
            //past 12 months sale

            $currentdate = date("Y-m-d");
            $last30date = date("Y-m-d", strtotime("$currentdate -365 days"));
            //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");

            $query = $db->query('SELECT sum(grandtotal) as totalsales, Month(created) as month FROM `invoice` GROUP BY Month(created)');
            // echo date("Y-m-d",$last30date);
            $data['sales365'] = $query;


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
