<?php

namespace App\Controllers;

class User extends BaseController
{
  public function index(): string
  {
    $data['title'] = 'Ebshare | Users';
    return view('home', $data);
  }

}