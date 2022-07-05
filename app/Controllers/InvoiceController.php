<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;

class InvoiceController extends BaseController
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
            $builder = $db->table('invoice i')
                ->select('i.*, c.name as custname, a.name as accname')
                ->join('customers c', 'c.id = i.customer_id')
                ->join('accounts a', 'a.id = i.payment_type')
                // ->join('invoicedetails d', 'd.id = p.category_id')
                ->where('i.updated', null)
                ->get();
            //ddd($builder->getResult());
            $data = ['invoice' => $builder->getResultArray('invoice')];

        return view('invoice/index', $data);
    }
    public function details($id){
            $db      = \Config\Database::connect();
            $builder = $db->table('invoice i')
            ->select('i.*, id.*, p.name as product_name, c.name as customer_name, c.address as customer_address, c.email as customer_email')
            ->join('invoicedetails id', 'i.id = id.invoice_id')
            ->join('products p', 'p.id = id.product_id')
            ->join('customers c', 'c.id = i.customer_id')
            ->where('i.id',$id)
            ->get();
            $data = ['invoice' => $builder->getResultArray()];
            // ddd($data);
            return view('invoice/details', $data);
    }
    //pdf
    // public function pdf()
    // {
    //     $view = \Config\Services::renderer();
    //     $c = new CustomerModel();
    //     $customers = $c->findAll();
    //     $options = new Options();
    //     $options->set('defaultFont', 'Siyam Rupali ANSI');
    //     $d = new Dompdf($options);
    //     $html = view('customers/table', ['customers' => $customers, 'title' => "All Customers"]);
    //     $d->load_html($html);
    //     // $d->setPaper('A4', 'landscape');
    //     $d->setPaper('A4', 'portrait');
    //     $d->render();
    //     $d->stream();
    // }
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
