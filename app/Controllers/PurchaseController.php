<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\InvoiceDetailsModel;
use App\Models\InvoiceModel;
use App\Models\OrderDetailsModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class PurchaseController extends BaseController
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

        return view('purchase/index', $data);
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

    public function suppliersearch()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('suppliers');
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

    public function placeorder()
    {
        $order = new OrderModel();
        $details = new OrderDetailsModel();
        $data = [
            'supplier_id' => $this->request->getPost('sid'),
            'nettotal' => $this->request->getPost('total'),
            'discount' => $this->request->getPost('discount'),
            'grandtotal' => $this->request->getPost('gtotal'),
            'comment' => $this->request->getPost('comment'),
            'payment_type' => $this->request->getPost('pmethod'),
            'trxid' => $this->request->getPost('trxid'),
        ];
        $order->save($data);
        $orderID = $order->getInsertID();

        $ids = $this->request->getPost('ids');
        $quans = $this->request->getPost('quantity');
        $pprice = $this->request->getPost('pricearr');
        $ptotal = $this->request->getPost('totalarr');
        foreach ($ids as $key => $value) {
            $det = new OrderDetailsModel();
            $pdata = [
                'order_id' => $orderID,
                'product_id' => $ids[$key],
                'quantity' => $quans[$key],
                'price' => $pprice[$key],
                'total' => $ptotal[$key],
            ];
            $det->save($pdata);
            //update quantity in product table
            $p = new ProductModel();
            $pd = $p->find($ids[$key]);
            $newquantity = $pd['quantity'] + $quans[$key];


            // $pd->update($ids[$key],$data);
            $db      = \Config\Database::connect();
            $builder = $db->table('products');
            $newdata = ['quantity' => $newquantity];
            $builder->where('id', $ids[$key]);
            $builder->update($newdata);
        }
        echo "Order Saved. Order Id: " . $orderID;
    }
}
