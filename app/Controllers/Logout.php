<?php

namespace App\Controllers;
use App\Models\UserModel;
class Logout extends BaseController
{
  public function index(){
    session()->destroy();
    return redirect()->to(base_url('/'));
  }

}