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
  public function add(){
    $data = [
      'title' => 'Ebshare | Tambah Ebook',
      'kategori' => $this->kategoriModel->get()->getResultArray()
  ];
    return view('addEbook', $data);
  }
  public function addEbook(): string
  {
    $data = [
      'judul' => $_POST['judul'],
      'penulis' => $_POST['penulis'],
      'penerbit' => $_POST['penerbit'],
      'path' => $_POST['path'],
      'ukuran' => $_POST['ukuran'],
      'tahun_terbit' => $_POST['tahun_terbit'],
      'deskripsi' => $_POST['deskripsi'],
      'id_user' => 1,
      'id_kategori' => $_POST['id_kategori'],
    ];

    if ($this->model->create($data) === false) {
      $data['errors'] = $this->model->errors();
      $data['kategori'] = $this->modelKategori->findAll();
      return view('addEbook', $data);
    }else{
      return redirect()->to(base_url('/ebook'));
    }
    // return view('addEbook', $data);
  }
}