<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\KategoriModel;
class Dashboard extends BaseController
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
    return view('dashboard/index', $data);
  }
  public function profile(){
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook();
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/profile', $data);
  }
  public function table(){
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook();
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/tables', $data);
  }
  public function ebook(){
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook();
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/ebook', $data);
  }
}