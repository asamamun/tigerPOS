<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceDetailController extends BaseController
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
        $builder = $db->table('invoicedetails i')
            ->select('i.*, p.name as product_name')
            ->join('products p', 'p.id = i.product_id')
            // ->where('i.updated', null)
            ->get();
        //ddd($builder->getResult());
        $data = ['invoicedetails' => $builder->getResultArray('invoicedetails')];

        return view('invoicedetails/index', $data);
    }

    //pdf
    public function pdf($id)
    {
        $view = \Config\Services::renderer();


        $dompdf = new \Dompdf\Dompdf();
        $db = \Config\Database::connect();

        $builder = $db->table('invoicedetails i')
            ->select('i.*, p.name as product_name')
            ->join('products p', 'p.id = i.product_id')
            ->where('i.id', $id)
            ->get();
        $data = ['invoicedetails' => $builder->getResultArray()];
        // ddd($builder->getResultArray());

        // Sending data to view file
        $dompdf->loadHtml(view('invoicedetails/pdf', $data));
        // setting paper to portrait, also we have landscape
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Download pdf
        $dompdf->stream();
        // to give pdf file name
        // $dompdf->stream("myfile");

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

        $db = \Config\Database::connect();

        $builder = $db->table('invoicedetails i')
            ->select('i.id,p.name as product_name,i.quantity,i.price,i.total,i.created')
            ->join('products p', 'p.id = i.product_id')
            
            ->get();
        $data = $builder->getResultArray();

        
        //ddd($builder->getResultArray());
       
      

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Invoice No.", "Product Name", "Quantity", "Price", "Total", "Ordered Time");
        fputcsv($file, $header);
        foreach ($data as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    //All pdf
    public function download()
    {
        $view = \Config\Services::renderer();

        $db      = \Config\Database::connect();
        $builder = $db->table('invoicedetails i')
            ->select('i.*, p.name as product_name')
            ->join('products p', 'p.id = i.product_id')
            // ->where('i.updated', null)
            ->get();
        //ddd($builder->getResult());
        $data = ['invoicedetails' => $builder->getResultArray('invoicedetails')];
        
        $options = new Options();
        $options->set('defaultFont', 'Siyam Rupali ANSI');
        $d = new Dompdf();
        $html = view('invoicedetails/table', $data);
        $d->load_html($html);
        // $d->setPaper('A4', 'landscape');
        $d->setPaper('A4', 'portrait');
        $d->render();
        $d->stream();
    }
}
