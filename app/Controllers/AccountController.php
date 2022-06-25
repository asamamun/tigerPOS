<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class AccountController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if ($this->checkauth()) {
            $accounts = new AccountModel();
            $data['accounts'] = $accounts->where('deleted', null)->findAll();
            return view('accounts/index', $data);
        } else {
            return redirect("login");
        }
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            return view('accounts/create');
        } else {
            return redirect("login");
        }
    }

    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $account = new AccountModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'account_number' => $this->request->getPost('account_number'),
                'balance' => $this->request->getPost('balance'),
                'deleted' => null,
            ];
            if ($account->insert($data)) {
                $session->setFlashdata('message', 'Account created successfully');
                return redirect()->to(base_url('/accounts'));
            } else {
                $session->setFlashdata('message', 'Category creation failed');
                return redirect()->to(base_url('/accounts/create'));
            }
        } else {
            return redirect("login");
        }
    }

    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $account = new AccountModel();
            $data['account'] = $account->find($id);
            return view('accounts/edit', $data);
        } else {
            return redirect("login");
        }
    }

    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $account = new AccountModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'account_number' => $this->request->getPost('account_number'),
                'balance' => $this->request->getPost('balance'),
            ];
            if ($account->update($id, $data)) {
                $session->setFlashdata('message', 'account updated successfully');
                return redirect()->to(base_url('/accounts'));
            } else {
                $session->setFlashdata('message', 'account update failed');
                return redirect()->to(base_url('/accounts/edit/' . $id));
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
            $account = new AccountModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s'),
            ];
            if ($account->update($id, $data)) {
                $session->setFlashdata('message', 'account deleted successfully');
                return redirect()->to(base_url('/accounts'));
            } else {
                $session->setFlashdata('message', 'account delete failed');
                return redirect()->to(base_url('/accounts/edit/' . $id));
            }
        } else {
            return redirect("login");
        }
    }
}
