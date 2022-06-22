<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function login()
    {
        if ($this->checkauth()) {
            $data = [];

            if ($this->request->getMethod() == 'post') {

                $rules = [
                    'email' => 'required|min_length[6]|max_length[50]|valid_email',
                    'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
                ];

                $errors = [
                    'password' => [
                        'validateUser' => "Email or Password don't match",
                    ],
                ];

                if (!$this->validate($rules, $errors)) {

                    return view('login', [
                        "validation" => $this->validator,
                    ]);
                } else {
                    $model = new UserModel();

                    $user = $model->where('email', $this->request->getVar('email'))
                        ->first();

                    // Stroing session values
                    $this->setUserSession($user);
                    // Redirecting to dashboard after login
                    return redirect()->to(base_url('dashboard'));
                }
            }
            return view('login');
        } else {
            return redirect("login");
        }
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        if ($this->checkauth()) {
            $data = [];

            if ($this->request->getMethod() == 'post') {
                //let's do the validation here
                $rules = [
                    'name' => 'required|min_length[3]|max_length[20]',
                    'phone_no' => 'required|min_length[9]|max_length[20]',
                    'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
                    'password' => 'required|min_length[8]|max_length[255]',
                    'password_confirm' => 'matches[password]',
                ];

                if (!$this->validate($rules)) {

                    return view('register', [
                        "validation" => $this->validator,
                    ]);
                } else {
                    $model = new UserModel();

                    $newData = [
                        'name' => $this->request->getVar('name'),
                        'phone_no' => $this->request->getVar('phone_no'),
                        'email' => $this->request->getVar('email'),
                        'password' => $this->request->getVar('password'),
                    ];
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Successful Registration');
                    return redirect()->to(base_url('login'));
                }
            }
            return view('register');
        } else {
            return redirect("login");
        }
    }


    public function index()
    {
        if ($this->checkauth()) {
            $users = new UserModel();
            $data['users'] = $users->where('deleted', null)->findAll();
            return view('users/index', $data);
        } else {
            return redirect("login");
        }
    }

    //create
    public function create()
    {
        if ($this->checkauth()) {
            return view('users/create');
        } else {
            return redirect("login");
        }
    }

    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $user = new UserModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'mobile' => $this->request->getPost('mobile'),
                'address' => $this->request->getPost('address'),

            ];
            if ($user->insert($data)) {
                $session->setFlashdata('message', 'User created successfully');
                return redirect()->to(base_url('/users'));
            } else {
                $session->setFlashdata('message', 'User creation failed');
                return redirect()->to(base_url('/users/create'));
            }
        } else {
            return redirect("login");
        }
    }

    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $user = new UserModel();
            $data['user'] = $user->find($id);
            return view('users/edit', $data);
        } else {
            return redirect("login");
        }
    }

    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $user = new UserModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'mobile' => $this->request->getPost('mobile'),
                'address' => $this->request->getPost('address'),

            ];
            if ($user->update($id, $data)) {
                $session->setFlashdata('message', 'User updated successfully');
                return redirect()->to(base_url('/users'));
            } else {
                $session->setFlashdata('message', 'User update failed');
                return redirect()->to(base_url('/users/edit/' . $id));
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
            $user = new UserModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s')
            ];
            if ($user->update($id, $data)) {
                $session->setFlashdata('message', 'User deleted successfully');
                return redirect()->to(base_url('/users'));
            } else {
                $session->setFlashdata('message', 'User delete failed');
                return redirect()->to(base_url('/users'));
            }
        } else {
            return redirect("login");
        }
    }
}
