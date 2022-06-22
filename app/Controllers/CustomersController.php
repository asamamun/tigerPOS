<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomersController extends BaseController
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
        $customers = new CustomerModel();
        $data['customers'] = $customers->where('deleted', null)->findAll();
        return view('customers/index', $data);
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            return view('customers/create');
        } else {
            return redirect("login");
        }
    }
    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $customer = new CustomerModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'mobile' => $this->request->getPost('mobile'),
                'address' => $this->request->getPost('address'),
                'expense' => $this->request->getPost('expense'),
            ];
            if ($customer->insert($data)) {
                $session->setFlashdata('message', 'Customer created successfully');
                return redirect()->to(base_url('/customers'));
            } else {
                $session->setFlashdata('message', 'Customer creation failed');
                return redirect()->to(base_url('/customers/create'));
            }
        } else {
            return redirect("login");
        }
    }
    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $customer = new CustomerModel();
            $data['customer'] = $customer->find($id);
            return view('customers/edit', $data);
        } else {
            return redirect("login");
        }
    }
    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $customer = new CustomerModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'mobile' => $this->request->getPost('mobile'),
                'address' => $this->request->getPost('address'),
                'expense' => $this->request->getPost('expense'),
            ];
            if ($customer->update($id, $data)) {
                $session->setFlashdata('message', 'Customer updated successfully');
                return redirect()->to(base_url('/customers'));
            } else {
                $session->setFlashdata('message', 'Customer update failed');
                return redirect()->to(base_url('/customers/edit/' . $id));
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
            $customer = new CustomerModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s')
            ];
            if ($customer->update($id, $data)) {
                $session->setFlashdata('message', 'Customer deleted successfully');
                return redirect()->to(base_url('/customers'));
            } else {
                $session->setFlashdata('message', 'Customer delete failed');
                return redirect()->to(base_url('/customers'));
            }
        } else {
            return redirect("login");
        }
    }
}
