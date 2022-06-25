<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if ($this->checkauth()) {
            $categories = new CategoryModel();
            $data['categories'] = $categories->where('deleted', null)->findAll();
            return view('categories/index', $data);
        } else {
            return redirect("login");
        }
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            return view('categories/create');
        } else {
            return redirect("login");
        }
    }

    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $category = new CategoryModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'deleted' => null,
            ];
            if ($category->insert($data)) {
                $session->setFlashdata('message', 'Category created successfully');
                return redirect()->to(base_url('/categories'));
            } else {
                $session->setFlashdata('message', 'Category creation failed');
                return redirect()->to(base_url('/categories/create'));
            }
        } else {
            return redirect("login");
        }
    }

    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $category = new CategoryModel();
            $data['category'] = $category->find($id);
            return view('categories/edit', $data);
        } else {
            return redirect("login");
        }
    }

    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $category = new CategoryModel();
            $data = [
                'name' => $this->request->getPost('name'),
            ];
            if ($category->update($id, $data)) {
                $session->setFlashdata('message', 'Category updated successfully');
                return redirect()->to(base_url('/categories'));
            } else {
                $session->setFlashdata('message', 'Category update failed');
                return redirect()->to(base_url('/categories/edit/' . $id));
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
            $category = new CategoryModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s'),
            ];
            if ($category->update($id, $data)) {
                $session->setFlashdata('message', 'Category deleted successfully');
                return redirect()->to(base_url('/categories'));
            } else {
                $session->setFlashdata('message', 'Category delete failed');
                return redirect()->to(base_url('/categories/edit/' . $id));
            }
        } else {
            return redirect("login");
        }
    }
}
