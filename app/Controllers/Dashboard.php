<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\ReportModel;
use App\Models\UserModel;
use App\Models\DetailUserModel;
use App\Models\KategoriModel;
use App\Models\StatistikModel;
use App\Models\EbookTagModel;
use App\Models\TagModel;
class Dashboard extends BaseController
{
  // task = pagination
  public function __construct(){
    $this->model = new EbookModel();
    $this->detailUserModel = new DetailUserModel();
    $this->userModel = new UserModel();
    $this->reportModel = new ReportModel();
    $this->kategoriModel = new KategoriModel();
    $this->statistikModel = new StatistikModel();
    $this->ebookTagModel = new EbookTagModel();
    $this->tagModel = new TagModel();
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
    $data['profile'] = $this->userModel->detailUser(session()->get('id'));
    return view('dashboard/profile', $data);
  }
  public function editProfile($id){
    $data['title'] = 'Ebshare | Edit Profile';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/editProfile', $data);
  }
  public function updateProfile(){
    $id_user = $this->request->getPost('id_user');
    
    $dataUser['username'] = $this->request->getPost('username');
    $dataUser['email'] = $this->request->getPost('email');

    $id_detail = $this->request->getPost('id_detail');
    $dataDetailUser['no_telepon'] = $this->request->getPost('no_telepon');
    $dataDetailUser['alamat'] = $this->request->getPost('alamat');
    $dataDetailUser['kota'] = $this->request->getPost('kota');
    $dataDetailUser['provinsi'] = $this->request->getPost('provinsi');
    $dataDetailUser['negara'] = $this->request->getPost('negara');
    $this->userModel->updateUser($id_user, $dataUser);
    $this->detailUserModel->updateUser($id_detail, $dataDetailUser);
    session()->setFlashdata('message', 'Berhasil Update Profile!');
    return redirect()->to(base_url('dashboard/profile'));
  }

  public function table()
  {
    $data['ebook'] = $this->reportModel->findAll();
    $data['statistiks'] = $this->reportModel->allReport()->paginate(10);
    $data['dataByKategori'] = $this->reportModel->ebookGroupByKategoryReport();
    $data['pager'] = $this->reportModel->pager;
    return view('dashboard/tables', $data);
  }

  public function user(){
    $data['title'] = 'Ebshare | User';
    $data['users'] = $this->userModel->allUser()->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->userModel->pager;
    // return view('test', $data);
    return view('dashboard/user', $data);
  }
  public function deleteUser($id){
    foreach($this->model->where('id_user', $id)->get()->getResultArray() as $id_ebook){
      
      $this->ebookTagModel->where('id_ebook', $id_ebook['id'])->delete();
      $this->statistikModel->where('id_ebook', $id_ebook['id'])->delete();
    };  
    $this->model->where('id_user', $id)->delete();
    $this->userModel->where('id', $id)->delete();
    return redirect()->to(base_url('/dashboard/user'));
  }
  public function detailUser($id){
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/detailUser', $data);
  }
  public function editUser($id){
    $data['title'] = 'Ebshare | Edit Ebook';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/editUser', $data);
  }
  public function updateUser(){
    $id_user = $this->request->getPost('id_user');
    
    $dataUser['username'] = $this->request->getPost('username');
    $dataUser['email'] = $this->request->getPost('email');

    $id_detail = $this->request->getPost('id_detail');
    $dataDetailUser['no_telepon'] = $this->request->getPost('no_telepon');
    $dataDetailUser['alamat'] = $this->request->getPost('alamat');
    $dataDetailUser['kota'] = $this->request->getPost('kota');
    $dataDetailUser['provinsi'] = $this->request->getPost('provinsi');
    $dataDetailUser['negara'] = $this->request->getPost('negara');
    $this->userModel->updateUser($id_user, $dataUser);
    $this->detailUserModel->updateUser($id_detail, $dataDetailUser);
    session()->setFlashdata('message', 'Berhasil Update User Detail!');
    return redirect()->to(base_url('dashboard/user/detail/').$id_user);
  }

  public function ebook(){
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->model->pager;
    return view('dashboard/ebook', $data);
  }

  public function addEbook(){
    $data['title'] = 'Ebshare | Tambah Ebook';
    // $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/addEbook', $data);
  }
  public function createEbook(){
    // print_r($this->request->getFile());
    // print_r($this->request->getFile('file'));
    $file = $this->request->getFile('file');
    if ($file !== null && $file->isValid() && !$file->hasMoved()) {

      $newName = $file->getRandomName();
      $file->move(WRITEPATH . 'uploads', $newName);
      $data['path'] = WRITEPATH . 'uploads/' . $newName;
      // print_r($data);
    } else {
      // error
      echo 'file error';
    }
    
    $data['judul'] = $this->request->getPost('judul');
    $data['penulis'] = $this->request->getPost('penulis');
    $data['penerbit'] = $this->request->getPost('penerbit');
    $data['deskripsi'] = $this->request->getPost('deskripsi');
    $data['id_kategori'] = $this->request->getPost('kategori');
    $data['id_user'] = session()->get('id');
    $data['type'] = $this->request->getPost('type');
    $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $data['ukuran'] = $this->request->getPost('size');

    // print_r($data);
    
    $tags = explode(',', $this->request->getPost('tag'));
    // print_r($this->model->tambah($data));
    if (!$this->model->tambah($data)) {
      $data['errors'] = $this->model->errors();
      $data['kategori'] = $this->kategoriModel->allKategori();
      // print($data['error']);
      return view('/dashboard/ebook/add', $data);
    }
    $id_ebook = $this->model->insertID();
    // print_r($id_ebook);
    // return redirect()->to(base_url('/dashboard/ebook'));

    foreach ($tags as $tag) {
      # code...
      if ($this->tagModel->where('nama_tag', $tag)->first() == null){
        $this->tagModel->tambah(['nama_tag' => $tag]);
        $id_tag = $this->tagModel->insertID();
      }else{
        $id_tag = $this->tagModel->select('id')->where('nama_tag', $tag)->get()->getResultArray()['0'];
      }
      $this->ebookTagModel->tambah(['id_ebook' => $id_ebook, 'id_tag' => $id_tag]);
    }
    session()->setFlashdata('message', 'Ebook Berhasil di tambahkan !');
    return redirect()->to(base_url('/dashboard/ebook'));
  }
  public function deleteEbook($id){
    $this->ebookTagModel->where('id_ebook', $id)->delete();
    $this->statistikModel->where('id_ebook', $id)->delete();
    $this->model->where('id', $id)->delete();
    return redirect()->to(base_url('/dashboard/ebook'));
  }
  public function editEbook($id){
    $data['title'] = 'Ebshare | Edit Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('/dashboard/editEbook', $data);
  }
  public function updateEbook(){
    // print_r($this->request->getVar());
    $data['id'] = $this->request->getPost('id_ebook');
    // $data['judul'] = $this->request->getPost('judul');
    // $data['penulis'] = $this->request->getPost('penulis');
    // $data['penerbit'] = $this->request->getPost('penerbit');
    // $data['deskripsi'] = $this->request->getPost('deskripsi');
    // $data['id_kategori'] = $this->request->getPost('kategori');
    // $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $tags = explode(',', $this->request->getPost('tag'));
    // if (!$this->model->update_data($data)) {
    //   $data['errors'] = $this->model->errors();
    //   $data['kategori'] = $this->kategoriModel->allKategori();
    //   // print($data['error']);
    //   return view('/dashboard/ebook/edit', $data);
    // }
    foreach ($this->ebookTagModel->where('id_ebook', $data['id'])->join('tag', 'ebook_tag.id_tag = tag.id')->get()->getResultArray() as $ebookTag) {
      session()->setFlashdata('tagDatabase', $ebookTag['nama_tag']);
      session()->setFlashdata('tagInput', $tags);
      
      if (in_array($ebookTag['nama_tag'], $tags ) == null ){
        echo 'tag di hapus'.$ebookTag['nama_tag'];
        $this->ebookTagModel->where('id_ebook', $data['id'])->where('id_tag', $ebookTag['id_tag'])->delete();
        // echo 'hapus => '.$ebookTag['nama_tag'];
      }
    }
    
    foreach ($tags as $tag) {

      $tag = trim($tag);
      // echo 'Tag  ==>'.$tag;
      
      # code...
      if ($this->tagModel->where('nama_tag', $tag)->first() == null){
        $this->tagModel->tambah(['nama_tag' => $tag]);
        $id_tag = $this->tagModel->insertID();
        echo 'tag di tambah'.$tag;
      }
      else{
        $id_tag = $this->tagModel->select('id')->where('nama_tag', $tag)->get()->getResultArray()['0'];
        echo 'tag sudah ada'.$tag;


      }
      if($this->ebookTagModel->where('id_tag', $id_tag)->where('id_ebook', $data['id'])->first() == null){
        echo 'ebook tag di tambah'.$tag;
        $this->ebookTagModel->tambah(['id_ebook' => $data['id'], 'id_tag' => $id_tag]);
      }else{
        echo 'ebook tag tidak ditambah'.$tag;
      }
      
    }
    
    // session()->setFlashdata('message', 'Ebook Berhasil di Ubah !');
    // return redirect()->to(base_url('/dashboard/ebook'));
  }

  public function upload()
  {
    $file = $this->request->getFile('file');
    if ($file->isValid() && !$file->hasMoved()) {
      $newName = $file->getRandomName();
      $file->move(WRITEPATH . 'uploads', $newName);
      echo "File has been uploaded: " . $newName;
    } else {
      echo "File upload failed.";
    }
  }

  public function download()
  {
    // print_r($this->request->getGet('filename'));
    $filename = $this->request->getGet('filename');

    $filePath = WRITEPATH . 'uploads/' . $filename;
    if (file_exists($filePath)) {
      $mimeType = mime_content_type($filePath);

      // Mengembalikan respon download dengan header yang benar dan menampilkan file secara inline
      return $this->response
          ->setContentType($mimeType)
          ->setHeader('Content-Disposition', 'inline; filename="' . basename($filePath) . '"')
          ->setBody(file_get_contents($filePath));
      // return $this->response->download($filePath, null)->inline();
    } else {
       echo "File not found.";
    }
  }
}