<?php

namespace App\Controllers;

use App\Models\UserModel;

class Test extends BaseController
{
  // task = pagination
  public function test()
  {
    if (session()->get('role')) {
      print_r('you are admin');
    } else {
      print_r('you are user');
    }
  }
}
