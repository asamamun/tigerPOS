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

        $data['calender'] = array(
            1 => 'January', 
            2 => 'February', 
            3 => 'March', 
            4 => 'April', 
            5 => 'May', 
            6 => 'June', 
            7 => 'July', 
            8 => 'August', 
            9 => 'September',
            10 => 'October', 
            11 => 'November', 
            12 => 'December'
        );
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

            $query = $db->query('SELECT sum(`grandtotal`) as totalsales, DATE_FORMAT(created, "%d-%m-%Y") as cdate FROM `invoice` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $currentdate . ' 23:59:59") GROUP BY DATE_FORMAT(created, "%d-%m-%Y") order by created desc');
            $data['sales30'] = $query;
            // ddd($data['sales30']->getResultArray());
            $labels = [];
            $chartdata = [];
            foreach ($data['sales30']->getResultArray() as $value) {
                array_push($labels, $value['cdate']);
                array_push($chartdata, $value['totalsales']);
            }
            $data['labels'] = $labels;
            $data['chartdata'] = $chartdata;

            //past 12 months sale
            $currentdate = date("Y-m-d");
            $last30date = date("Y-m-d", strtotime("$currentdate -365 days"));
            //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");
            $y = date("Y");
            $query = $db->query('SELECT sum(grandtotal) as totalsales, Month(created) as month FROM `invoice` where year(created)=' . $y . ' GROUP BY Month(created)');
            // echo date("Y-m-d",$last30date);
            $data['sales365'] = $query;

            $labels2 = [];
            $chartdata2 = [];
            foreach ($data['sales365']->getResultArray() as $value) {
                array_push($labels2,$data['calender'][$value['month']]);
                array_push($chartdata2, $value['totalsales']);
            }
            $data['labels2'] = $labels2;
            $data['chartdata2'] = $chartdata2;
            // ddd($data['chartdata2']);
            // exit;




            /*             foreach ($query->getResult() as $row) {
                echo $row->totalsales;
                echo " | ";
                echo $row->cdate;
                echo "<hr>";
            }
                      exit; */

            //past 30 days purchase
            $currentdate = date("Y-m-d");
            $last30date = date("Y-m-d", strtotime("$currentdate -30 days"));
            //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");

            $query = $db->query('SELECT sum(`grandtotal`) as totalpurchase, DATE_FORMAT(created, "%d-%m-%Y") as cdate FROM `orders` WHERE (created between "' . $last30date . ' 00:00:00" and "' . $currentdate . ' 23:59:59") GROUP BY DATE_FORMAT(created, "%d-%m-%Y") order by created desc');
            $data['purchase30'] = $query;
            $labels3 = [];
            $chartdata3 = [];
            foreach ($data['purchase30']->getResultArray() as $value) {
                array_push($labels3, $value['cdate']);
                array_push($chartdata3, $value['totalpurchase']);
            }
            $data['labels3'] = $labels3;
            $data['chartdata3'] = $chartdata3;
            //past 12 months purchase
            $currentdate = date("Y-m-d");
            $last30date = date("Y-m-d", strtotime("$currentdate -365 days"));
            //SELECT sum(`grandtotal`), DATE_FORMAT(created, "%m-%y-%d") FROM `invoice` WHERE 1 GROUP BY DATE_FORMAT(created, "%m-%y-%d");
            $y = date("Y");
            $query = $db->query('SELECT sum(grandtotal) as totalpurchase, Month(created) as month FROM `orders` where year(created)=' . $y . ' GROUP BY Month(created)');
            // echo date("Y-m-d",$last30date);
            $data['purchase365'] = $query;
            $labels4 = [];
            $chartdata4 = [];
            foreach ($data['purchase365']->getResultArray() as $value) {
                array_push($labels4,$data['calender'][$value['month']]);
                array_push($chartdata4, $value['totalpurchase']);
            }
            $data['labels4'] = $labels4;
            $data['chartdata4'] = $chartdata4;


            return view('dashboard/dashboard', $data);
        } else {
            return redirect("login");
        }
        //
    }
}
