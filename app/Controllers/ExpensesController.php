<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccountModel;
use App\Models\ExpenseModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class ExpensesController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        if ($this->checkauth()) {
            $db      = \Config\Database::connect();
            $builder = $db->table('expenses e')
                ->select('e.*, a.name as accname')
                ->join('accounts a', 'a.id = e.payment_type')
                // ->join('invoicedetails d', 'd.id = p.category_id')
                ->where('e.deleted', null)
                ->get();
            //ddd($builder->getResult());
            $data = ['expenses' => $builder->getResultArray('expenses')];

            return view('expenses/index', $data);
        } else {
            return redirect("login");
        }
    }
    //create
    public function create()
    {
        if ($this->checkauth()) {
            $c = new AccountModel();
            $allacc = $c->select('id,name')->findAll();
            $dropacc = key_value_for_dropdown($allacc);
            // ddd($dropacc);            
            $data['accounts'] = $dropacc;
            return view('expenses/create',$data);
        } else {
            return redirect("login");
        }
    }

    //store
    public function store()
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $expense = new ExpenseModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'amount' => $this->request->getPost('amount'),
                'payment_type' =>intval($this->request->getPost('payment_type'))              
            ];
            //ddd($data);
            if ($expense->insert($data)) {
                $session->setFlashdata('message', 'Expense created successfully');
                return redirect()->to(base_url('/expenses'));
            } else {
                $session->setFlashdata('message', 'Expense creation failed');
                return redirect()->to(base_url('/expenses/create'));
            }
        } else {
            return redirect("login");
        }
    }

    //edit
    public function edit($id)
    {
        if ($this->checkauth()) {
            $c = new AccountModel();
            $allacc = $c->select('id,name')->findAll();
            $dropacc = key_value_for_dropdown($allacc);
            // ddd($dropacc);            
            $data['accounts'] = $dropacc;
            
            $expense = new ExpenseModel();
            $data['expense'] = $expense->find($id);
            // ddd($data);
            return view('expenses/edit', $data);
        } else {
            return redirect("login");
        }
    }

    //update
    public function update($id)
    {
        if ($this->checkauth()) {
            $session = \Config\Services::session();
            $expense = new ExpenseModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'amount' => $this->request->getPost('amount'),
            ];
            if ($expense->update($id, $data)) {
                $session->setFlashdata('message', 'Expense updated successfully');
                return redirect()->to(base_url('/expenses'));
            } else {
                $session->setFlashdata('message', 'Expense update failed');
                return redirect()->to(base_url('/expenses/edit/' . $id));
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
            $expense = new ExpenseModel();
            $data = [
                'deleted' => date('Y-m-d H:i:s'),
            ];
            if ($expense->update($id, $data)) {
                $session->setFlashdata('message', 'Expense deleted successfully');
                return redirect()->to(base_url('/expenses'));
            } else {
                $session->setFlashdata('message', 'Expense delete failed');
                return redirect()->to(base_url('/expenses/edit/' . $id));
            }
        } else {
            return redirect("login");
        }
    }

        //pdf
        public function pdf()
        {
            $view = \Config\Services::renderer();
            $e = new ExpenseModel();
            
            $expenses = $e->findAll();
            $options = new Options();
            $options->set('defaultFont', 'Siyam Rupali ANSI');
            $d = new Dompdf($options);
            $html = view('expenses/table', ['expenses' => $expenses, 'title' => "All expenses"]);
            $d->load_html($html);
            // $d->setPaper('A4', 'landscape');
            $d->setPaper('A4', 'portrait');
            $d->render();
            $d->stream();
        }
        public function csv()
        {
            // file name 
            $filename = 'expenses_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
    
            // get data 
            $expenses = new ExpenseModel();
            $expensesData =  $expenses->select('*')->findAll();
    
            // file creation 
            $file = fopen('php://output', 'w');
    
            $header = array("ID", "Name", "Amount", "Payment Method");
            fputcsv($file, $header);
            foreach ($expensesData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit;
        }
}
