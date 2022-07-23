<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceDetailsModel;

//https://laratutorials.com/codeigniter-4-jquery-ui-autocomplete-search-from-database/

class PosController extends BaseController
{
    public function __construct()
    {
        helper('form', 'url');
    }

    public function index()
    {
        $acc = new AccountModel();
        $allacc = $acc->where('deleted', null)->select('id,name')->findAll();
        $dropacc = key_value_for_dropdown($allacc);
        // ddd($dropacc);
        // exit;
        $data['accounts'] = $dropacc;

        return view('pos/index', $data);
    }
    public function search()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('products');
        $searchdata = $this->request->getGet("term");
        $builder->like('barcode', $searchdata);
        $builder->orLike('name', $searchdata);
        $query = $builder->get();
        $return_arr = [];
        foreach ($query->getResultArray() as $row) {
            $return_arr[] = array(
                'label' => $row['name'],
                'value' => $row['id'],
                'id' => $row['id']
            );
        }
        echo json_encode($return_arr);
    }

    public function addtocart()
    {
        $id = $this->request->getPost('id');
        $p = new ProductModel();
        $row = $p->find($id);
        $return_arr = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['retail_price'],
            'barcode' => $row['barcode'],
        );
        echo json_encode($return_arr);
    }

    public function customersearch()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('customers');
        $searchdata = $this->request->getGet("term");
        $builder->like('name', $searchdata);
        // $builder->orLike('name', $searchdata);
        $query = $builder->get();
        $return_arr = [];
        foreach ($query->getResultArray() as $row) {
            $return_arr[] = array(
                'label' => $row['name'],
                'value' => $row['id'],
                'id' => $row['id'],
                'name' => $row['name'],
                'mobile' => $row['mobile'],
                'address' => $row['address'],
            );
        }
        echo json_encode($return_arr);
    }
    // public function customerdetails()
    // {
    //     $id = $this->request->getPost('id');
    //     $p = new CustomerModel();
    //     $row = $p->find($id);
    //     $return_arr = array(
    //         'id' => $row['id'],
    //         'name' => $row['name'],
    //         'mobile' => $row['mobile'],
    //         'address' => $row['address'],
    //     );
    //     echo json_encode($return_arr);
    // }

    public function placeorder()
    {
        $inv = new InvoiceModel();
        $details = new InvoiceDetailsModel();
        $data = [
            'customer_id' => $this->request->getPost('cid'),
            'nettotal' => $this->request->getPost('total'),
            'discount' => $this->request->getPost('discount'),
            'grandtotal' => $this->request->getPost('gtotal'),
            'comment' => $this->request->getPost('comment'),
            'payment_type' => $this->request->getPost('pmethod'),
            'trxid' => $this->request->getPost('trxid'),
        ];
        $inv->save($data);
        $invoiceID = $inv->getInsertID();

        $ids = $this->request->getPost('ids');
        $quans = $this->request->getPost('quantity');
        $pprice = $this->request->getPost('pricearr');
        $ptotal = $this->request->getPost('totalarr');
        $pgtotal = $this->request->getPost('gtotal');
        $pmethod =  $this->request->getPost('pmethod');
        foreach ($ids as $key => $value) {
            $det = new InvoiceDetailsModel();
            $pdata = [
                'invoice_id' => $invoiceID,
                'product_id' => $ids[$key],
                'quantity' => $quans[$key],
                'price' => $pprice[$key],
                'total' => $ptotal[$key],
                'gtotal' => $pgtotal,
                'payment_id' => $pmethod[$key],
            ];
            $det->save($pdata);
            //update quantity in product table
            $p = new ProductModel();
            $pd = $p->find($ids[$key]);
            $newquantity = $pd['quantity'] - $quans[$key];


            // $pd->update($ids[$key],$data);
            $db      = \Config\Database::connect();
            $builder = $db->table('products');
            $newdata = ['quantity' => $newquantity];
            $builder->where('id', $ids[$key]);
            $builder->update($newdata);
            //balance addition
            $pa = new AccountModel();
            $pad= $pa->find($pmethod[$key]);
            $balance = $pad['balance'] + $pgtotal;
             // $pd->update($ids[$key],$data);
             
             $acbuilder = $db->table('accounts');
             $newacdata = ['balance' => $balance];
             $acbuilder->where('id', $pmethod[$key]);
             $acbuilder->update($newacdata);
            
            
        }
        echo "Order Saved. Invoice Id: " . $invoiceID;
    }
}
