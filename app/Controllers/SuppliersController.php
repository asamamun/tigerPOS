<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class SuppliersController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $supplier = new SupplierModel();
        $data['suppliers'] = $supplier->where('deleted',null)->findAll();
        return view('suppliers/index', $data);
    }
    //create
    public function create()
    {
        return view('suppliers/create');
    }
    //store
    public function store()
    {
        $session = \Config\Services::session();
        $supplier = new SupplierModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'address' => $this->request->getPost('address'),
        ];
        if ($supplier->insert($data)) {
            $session->setFlashdata('message', 'Supplier created successfully');
            return redirect()->to(base_url('/suppliers'));
        } else {
            $session->setFlashdata('message', 'Supplier creation failed');
            return redirect()->to(base_url('/suppliers/create'));
        }
    }
    //edit
    public function edit($id)
    {
        $supplier = new SupplierModel();
        $data['supplier'] = $supplier->find($id);
        return view('suppliers/edit', $data);
    }
    //update
    public function update($id)
    {

        $session = \Config\Services::session();
        $supplier = new SupplierModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'address' => $this->request->getPost('address'),
        ];
        if ($supplier->update($id, $data)) {
            $session->setFlashdata('message', 'Supplier updated successfully');
            return redirect()->to(base_url('/suppliers'));
        } else {
            $session->setFlashdata('message', 'Supplier update failed');
            return redirect()->to(base_url('/suppliers/edit/' . $id));
        }
    }
    //delete
    public function delete($id)
    {
        $session = \Config\Services::session();
        $supplier = new SupplierModel();
        $data = [
            'deleted' => date('Y-m-d H:i:s')
        ];
        if ($supplier->update($id, $data)) {
            $session->setFlashdata('message', 'Supplier deleted successfully');
            return redirect()->to(base_url('/suppliers'));
        } else {
            $session->setFlashdata('message', 'Supplier delete failed');
            return redirect()->to(base_url('/suppliers'));
        }
    }
}
