<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;

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


    //pdf
    public function pdf()
    {
        $view = \Config\Services::renderer();
          $db      = \Config\Database::connect();
            $builder = $db->table('invoice i')
                ->select('i.*, c.name as custname, c.mobile as custmob, c.address as custaddress, a.name as accname')
                ->join('customers c', 'c.id = i.customer_id')
                ->join('accounts a', 'a.id = i.payment_type')
                // ->join('invoicedetails d', 'd.id = p.category_id')
                
                ->get();
            //ddd($builder->getResult());
            $data = ['sales' => $builder->getResultArray('sales')];
        $options = new Options();
        $options->set('defaultFont', 'Siyam Rupali ANSI');
        $d = new Dompdf($options);
        $html = view('sales/table',$data);
        $d->load_html($html);
        // $d->setPaper('A4', 'landscape');
        $d->setPaper('A4', 'portrait');
        $d->render();
        $d->stream();
    }
    // public function csv()
    // {
    //     // file name 
    //     $filename = 'customers_' . date('Ymd') . '.csv';
    //     header("Content-Description: File Transfer");
    //     header("Content-Disposition: attachment; filename=$filename");
    //     header("Content-Type: application/csv; ");

    //     // get data 
    //     $customers = new CustomerModel();
    //     $customersData =  $customers->select('*')->findAll();

    //     // file creation 
    //     $file = fopen('php://output', 'w');

    //     $header = array("ID", "Name", "Email", "Phone", "Address", "Expense");
    //     fputcsv($file, $header);
    //     foreach ($customersData as $key => $line) {
    //         fputcsv($file, $line);
    //     }
    //     fclose($file);
    //     exit;
    // }


}
