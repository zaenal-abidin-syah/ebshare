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
    public function index(): string
    {
      $data['title'] = 'Ebshare | Ebook';
      $data['ebooks'] = $this->model->allEbook();
      $data['kategori'] = $this->kategoriModel->allKategori();
      return view('ebook', $data);
    }
    public function test(){
      $data['title'] = 'Ebshare | Ebook';
      $data['ebooks'] = $this->model->allEbook();
      $data['kategori'] = $this->kategoriModel->allKategori();
      return view('ebook', $data);
    }
}