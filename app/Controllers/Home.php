<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if($this->checkauth()){
           $u = new UserModel();
           $data['totalusers'] = $u->countAll();
           //TODO: collect data from databae
           $data['totalsales'] = 9999;
           $data['totalpurchase'] = 9999;
           $data['totalexpense'] = 9999;
           $data['totalorder'] = 9999;
           $data['totalpacked'] = 9999;
           $data['purchasedue'] = 9999;
           $data['invoicedue'] = 9999;           
            return view('dashboard/dashboard',$data);
        }
        else{
            return redirect("login");
        }
        //
    }


}
