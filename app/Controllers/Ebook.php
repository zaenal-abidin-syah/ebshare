<?php

namespace App\Controllers;

use App\Models\EbookModel;
class Ebook extends BaseController
{
  public function __construct(){
    $this->model = new EbookModel();
  }
    public function index(): string
    {
        $data['title'] = 'Ebshare | Ebook';
        return view('home', $data);
    }
    public function test(){
      $data['title'] = 'Ebshare | Test';
      return view('test', $data);
    }
}