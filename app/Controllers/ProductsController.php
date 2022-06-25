<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class ProductsController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if ($this->checkauth()) {

            // var_dump($allcat);
            // exit;
            $products = new ProductModel();
            $data['products'] = $products->where('deleted', null)->findAll();
            
            return view('products/index', $data);
        } else {
            return redirect("login");
        }
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            $c = new CategoryModel();
            $allcat = $c->select('id,name')->findAll();
            $dropcat = key_value_for_dropdown($allcat);
            // ddd($dropcat);            
            $data['categories'] = $dropcat;
            return view('products/create', $data);
        } else {
            return redirect("login");
        }
    }
    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $product = new ProductModel();
            $data = [
                'barcode' => $this->request->getPost('barcode'),
                'name' => $this->request->getPost('name'),
                'company_name' => $this->request->getPost('company_name'),
                'category_id' => $this->request->getPost('category_id'),
                'supplier_id' => $this->request->getPost('supplier_id'),
                'wholesale_price' => $this->request->getPost('wholesale_price'),
                'retail_price' => $this->request->getPost('retail_price'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'quantity' => $this->request->getPost('quantity'),
                'description' => $this->request->getPost('description'),
                'tax' => $this->request->getPost('tax'),
            ];
            if ($product->insert($data)) {
                $session->setFlashdata('message', 'Product created successfully');
                return redirect()->to(base_url('/products'));
            } else {
                $session->setFlashdata('message', 'Product creation failed');
                return redirect()->to(base_url('/products/create'));
            }
        } else {
            return redirect("login");
        }
    }
    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $product = new ProductModel();
            $data['product'] = $product->find($id);
            return view('products/edit', $data);
        } else {
            return redirect("login");
        }
    }
    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $product = new ProductModel();
            $data = [
                'barcode' => $this->request->getPost('barcode'),
                'name' => $this->request->getPost('name'),
                'company_name' => $this->request->getPost('company_name'),
                'category_id' => $this->request->getPost('category_id'),
                'supplier_id' => $this->request->getPost('supplier_id'),
                'wholesale_price' => $this->request->getPost('wholesale_price'),
                'retail_price' => $this->request->getPost('retail_price'),
                'purchase_price' => $this->request->getPost('purchase_price'),
                'quantity' => $this->request->getPost('quantity'),
                'description' => $this->request->getPost('description'),
                'tax' => $this->request->getPost('tax'),
            ];
            if ($product->update($id, $data)) {
                $session->setFlashdata('message', 'Product updated successfully');
                return redirect()->to(base_url('/products'));
            } else {
                $session->setFlashdata('message', 'Product update failed');
                return redirect()->to(base_url('/products/edit/' . $id));
            }
        } else {
            return redirect("login");
        }
    }
    //delete
    public function delete($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $product = new ProductModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s')
            ];
            if ($product->update($id, $data)) {
                $session->setFlashdata('message', 'Product deleted successfully');
                return redirect()->to(base_url('/products'));
            } else {
                $session->setFlashdata('message', 'Product delete failed');
                return redirect()->to(base_url('/products'));
            }
        } else {
            return redirect("login");
        }
    }
}
