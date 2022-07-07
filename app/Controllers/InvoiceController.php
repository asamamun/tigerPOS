<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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
    public function details($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('invoice i')
            ->select('i.*, id.*, p.name as product_name, c.name as customer_name, c.address as customer_address, c.email as customer_email')
            ->join('invoicedetails id', 'i.id = id.invoice_id')
            ->join('products p', 'p.id = id.product_id')
            ->join('customers c', 'c.id = i.customer_id')
            ->where('i.id', $id)
            ->get();
        $data = ['invoice' => $builder->getResultArray()];
        // ddd($data);
        return view('invoice/details', $data);
    }
    //pdf
    public function pdf($id)
    {
        $view = \Config\Services::renderer();


        $dompdf = new \Dompdf\Dompdf();
        $this->db = \Config\Database::connect();

        $builder = $this->db->table('invoice i')
            ->select('i.*, id.*, p.name as product_name, c.name as customer_name, c.address as customer_address, c.email as customer_email')
            ->join('invoicedetails id', 'i.id = id.invoice_id')
            ->join('products p', 'p.id = id.product_id')
            ->join('customers c', 'c.id = i.customer_id')
            ->where('i.id',$id)           
            ->get();
        $data = ['invoice' => $builder->getResultArray()];
        // ddd($builder->getResultArray());

        // Sending data to view file
        $dompdf->loadHtml(view('invoice/pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("myfile");

    }
    //All pdf
    public function download()
    {
        $view = \Config\Services::renderer();

        $db      = \Config\Database::connect();
        $builder = $db->table('invoice i')
            ->select('i.*, c.name as custname, a.name as accname')
            ->join('customers c', 'c.id = i.customer_id')
            ->join('accounts a', 'a.id = i.payment_type')
         
            ->get();
        //ddd($builder->getResult());
        $data = ['invoice' => $builder->getResultArray('invoice')];
        
        $options = new Options();
        $options->set('defaultFont', 'Siyam Rupali ANSI');
        $d = new Dompdf();
        $html = view('invoice/table', $data);
        $d->load_html($html);
        // $d->setPaper('A4', 'landscape');
        $d->setPaper('A4', 'portrait');
        $d->render();
        $d->stream();
    }
   //csv
   public function csv()
    {
        // file name 
        $filename = 'invoice_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $db      = \Config\Database::connect();
        $builder = $db->table('invoice i')
            ->select('i.id,c.name as custname,i.nettotal,i.discount,i.comment,i.grandtotal,  a.name as accname')
            ->join('customers c', 'c.id = i.customer_id')
            ->join('accounts a', 'a.id = i.payment_type')
            ->get();
        //ddd($builder->getResult());
        $data = $builder->getResultArray();
        // $invoice = new InvoiceModel();
        // $invoiceData =  $invoice->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("ID", "Name", "Net Total", "Discount", "Comment", "Grant Total","Payment Method");
        fputcsv($file, $header);
        foreach ($data as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
}
