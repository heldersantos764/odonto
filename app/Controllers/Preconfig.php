<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;

class Preconfig extends BaseController
{
    public function index()
    {
        return view('preconfig');
    }

    public function store(){
        if($this->request->getMethod() != 'post'){
            return redirect()->to(site_url('preconfig'));
        }

        $data = $this->request->getPost();
        $user = new User();
        $userModel = new UserModel();

        $user->fill($data);

        $userModel->insert($user);
        dd($userModel);
    }
}
