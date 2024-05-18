<?php

namespace App\Controllers;
use App\Models\EbookModel;
// use App\Models\KategoriModel;
use App\Models\UserModel;
class Home extends BaseController
{
  public function __construct(){
    $this->model = new EbookModel();
    $this->userModel = new UserModel();
    // $this->kategoriModel = new KategoriModel();
  }
  public function index(): string

  {
    $data['title'] = 'Ebshare | Home';
    $data['statistik'] = $this->model->allStatistik();
    $data['ebook_kategori'] = $this->model->countEbookByKategori();
    $data['password'] = $this->userModel->get()->getResultArray();

    return view('home', $data);
  }
  // public function pass(){
  //   $data['title'] = 'Ebshare | Home';
  //   $data['statistik'] = $this->model->allStatistik();
  //   $data['ebook_kategori'] = $this->model->countEbookByKategori();

  //   $data['test'] = $this->userModel->changePass();
  //   return view('test', $data);
  // }
}