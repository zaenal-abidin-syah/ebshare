<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\ReportModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\StatistikModel;
use App\Models\EbookTagModel;
class Dashboard extends BaseController
{
  // task = pagination
  public function __construct(){
    $this->model = new EbookModel();
    $this->userModel = new UserModel();
    $this->reportModel = new ReportModel();
    $this->kategoriModel = new KategoriModel();
    $this->statistikModel = new StatistikModel();
    $this->ebookTagModel = new EbookTagModel();
  }
  public function index(): string
  {
    $data['title'] = 'Ebshare | Ebook';
    $data['statistik'] = $this->model->allStatistik(session()->get('id'));
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
  // public function table(){
  //   $data['title'] = 'Ebshare | Ebook';
  //   $data['ebooks'] = $this->model->allEbook();
  //   $data['kategori'] = $this->kategoriModel->allKategori();
  //   return view('dashboard/tables', $data);
  // }
  public function table()
  {
    $data['ebook'] = $this->reportModel->findAll();
    $data['statistiks'] = $this->reportModel->allReport()->paginate(10);
    $data['dataByKategori'] = $this->reportModel->ebookGroupByKategoryReport();
    $data['pager'] = $this->reportModel->pager;
    return view('dashboard/tables', $data);
  }
  public function ebook(){
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->model->pager;
    return view('dashboard/ebook', $data);
  }
  public function user(){
    $data['title'] = 'Ebshare | User';
    $data['users'] = $this->userModel->allUser()->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->userModel->pager;
    // return view('test', $data);
    return view('dashboard/user', $data);
  }
  public function add(){
    $data['title'] = 'Ebshare | Tambah Ebook';
    // $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/addEbook', $data);
  }
  public function create(){
    print_r($this->request->getVar());
  }
  public function delete($id){
    $this->ebookTagModel->where('id_ebook', $id)->delete();
    $this->model->where('id', $id)->delete();
    $this->statistikModel->where('id_ebook', $id)->delete();
    return redirect()->to(base_url('/dashboard/ebook'));
  }
}