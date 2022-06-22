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
        if ($this->checkauth()) {
            $supplier = new SupplierModel();
            $data['suppliers'] = $supplier->where('deleted', null)->findAll();
            return view('suppliers/index', $data);
        } else {
            return redirect("login");
        }
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            return view('suppliers/create');
        } else {
            return redirect("login");
        }
    }
    //store
    public function store()
    {
        if ($this->checkauth()) {
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
        } else {
            return redirect("login");
        }
    }
    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $supplier = new SupplierModel();
            $data['supplier'] = $supplier->find($id);
            return view('suppliers/edit', $data);
        } else {
            return redirect("login");
        }
    }
    //update
    public function update($id)
    {
        if ($this->checkauth()) {
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
        } else {
            return redirect("login");
        }
    }
    //delete
    public function delete($id)
    {
        if ($this->checkauth()) {
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
        } else {
            return redirect("login");
        }
    }
}
