<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\KategoriModel;
class Ebook extends BaseController
{
  // task = pagination
  public function __construct(){
    $this->model = new EbookModel();
    $this->kategoriModel = new KategoriModel();
  }
  // public function index(): string
  // {
  //   $data['title'] = 'Ebshare | Ebook';
  //   $data['ebooks'] = $this->model->allEbook();
  //   $data['kategori'] = $this->kategoriModel->allKategori();
  //   return view('ebook', $data);
  // }
  public function index(): string
  {
    // $data['ebooks'] = $this->model->allEbook()->paginate(10);
    // $data['pager'] = $this->model->pager;
    $data = [
      'title' => 'Ebshare | Ebook',
      'ebooks' => $this->model->paginate(12),
      'pager' => $this->model->pager
  ];
    return view('ebook', $data);
  }
}