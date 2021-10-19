<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function enter(){
        if($this->request->getMethod() != 'post'){
            return redirect()->to(site_url('login'));
        }

        dd($this->request->getPost());
    }
}
