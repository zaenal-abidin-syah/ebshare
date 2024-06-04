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
use Imagick;

class Dashboard extends BaseController
{
  // task = pagination
  public function __construct()
  {
    $this->model = new EbookModel();
    $this->detailUserModel = new DetailUserModel();
    $this->userModel = new UserModel();
    $this->reportModel = new ReportModel();
    $this->kategoriModel = new KategoriModel();
    $this->statistikModel = new StatistikModel();
    $this->ebookTagModel = new EbookTagModel();
    $this->tagModel = new TagModel();
    // $this->image = \Config\Services::image('imagick');
  }
  public function index()
  {
    $id = (session()->get('role') == '0') ? session()->get('id') : False;
    $data['title'] = 'Ebshare | Ebook';
    $data['statistik'] = $this->model->allStatistik($id);
    $data['statistikPerMonth'] = $this->model->allStatistik($id);

    $data['ebooks'] = $this->model->allEbook();
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/index', $data);
  }
  public function profile()
  {
    $data['title'] = 'Ebshare | Ebook';
    $data['profile'] = $this->userModel->detailUser(session()->get('id'));
    return view('dashboard/profile', $data);
  }
  public function editProfile($id)
  {
    $data['title'] = 'Ebshare | Edit Profile';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/editProfile', $data);
  }
  public function updateProfile()
  {
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

  public function user()
  {
    $data['title'] = 'Ebshare | User';
    $data['users'] = $this->userModel->allUser()->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->userModel->pager;
    // return view('test', $data);
    return view('dashboard/user', $data);
  }
  public function deleteUser($id)
  {
    foreach ($this->model->where('id_user', $id)->get()->getResultArray() as $id_ebook) {

      $this->ebookTagModel->where('id_ebook', $id_ebook['id'])->delete();
      $this->statistikModel->where('id_ebook', $id_ebook['id'])->delete();
    };
    $this->model->where('id_user', $id)->delete();
    $this->userModel->where('id', $id)->delete();
    return redirect()->to(base_url('/dashboard/user'));
  }
  public function detailUser($id)
  {
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/detailUser', $data);
  }
  public function editUser($id)
  {
    $data['title'] = 'Ebshare | Edit Ebook';
    $data['detail'] = $this->userModel->detailUser($id);
    return view('dashboard/editUser', $data);
  }
  public function updateUser()
  {
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
    return redirect()->to(base_url('dashboard/user/detail/') . $id_user);
  }

  public function ebook()
  {
    $data['title'] = 'Ebshare | Ebook';
    $data['ebooks'] = $this->model->allEbook()->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->model->pager;
    return view('dashboard/ebook', $data);
  }
  public function myEbook()
  {
    $data['title'] = 'Ebshare | My Ebook';
    $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    $data['pager'] = $this->model->pager;
    return view('dashboard/myEbook', $data);
  }

  // public function addEbook()
  // {
  //   $data['title'] = 'Ebshare | Tambah Ebook';
  //   // $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
  //   $data['kategori'] = $this->kategoriModel->allKategori();
  //   return view('dashboard/addEbook', $data);
  // }
  public function addMyEbook()
  {
    $data['title'] = 'Ebshare | Tambah Ebook';
    // $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('dashboard/addMyEbook', $data);
  }

  public function createMyEbook()
  {
    $file = $this->request->getFile('file');
    if ($file !== null && $file->isValid() && !$file->hasMoved()) {

      $newName = $file->getRandomName();
      $file->move(WRITEPATH . 'uploads', $newName);
      $data['path'] = WRITEPATH . 'uploads/' . $newName;
      $image = new Imagick();
      $image->readImage($data['path'] . '[0]');
      $imagePath = WRITEPATH . 'uploads/img/ebook/' . explode('.', $newName)[0] . '.jpg';
      $image->writeImage($imagePath);
      $data['img'] = 'img/ebook/' . explode('.', $newName)[0] . '.jpg';
      // print_r($data);
    } else {
      // error
      echo 'file error';
    }
    $pattern = '/[^a-zA-Z0-9.,\s]/';

    // Hilangkan karakter tersebut dari string
    $data['judul'] = preg_replace($pattern, ' ', $this->request->getPost('judul'));

    $data['penulis'] = $this->request->getPost('penulis');
    $data['penerbit'] = $this->request->getPost('penerbit');
    $data['deskripsi'] = $this->request->getPost('deskripsi');
    $data['id_kategori'] = $this->request->getPost('kategori');
    $data['id_user'] = session()->get('id');
    $data['type'] = $this->request->getPost('type');
    $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $data['ukuran'] = $this->request->getPost('size');

    // print_r($data);

    $tags = explode(',', $this->request->getPost('tag') ?? '');
    // print_r($this->model->tambah($data));
    if (!$this->model->tambah($data)) {
      $data['errors'] = $this->model->errors();
      $data['kategori'] = $this->kategoriModel->allKategori();
      // print($data['error']);
      return view('/dashboard/myebook/add', $data);
    }
    $id_ebook = $this->model->insertID();
    $this->statistikModel->tambah(['id_ebook' => $id_ebook]);
    // print_r($id_ebook);
    // return redirect()->to(base_url('/dashboard/ebook'));

    foreach ($tags as $tag) {
      # code...
      if ($this->tagModel->where('nama_tag', $tag)->first() == null) {
        $this->tagModel->tambah(['nama_tag' => $tag]);
        $id_tag = $this->tagModel->insertID();
      } else {
        $id_tag = $this->tagModel->select('id')->where('nama_tag', $tag)->get()->getResultArray()['0'];
      }
      $this->ebookTagModel->tambah(['id_ebook' => $id_ebook, 'id_tag' => $id_tag]);
    }
    session()->setFlashdata('message', 'Ebook Berhasil di tambahkan !');
    return redirect()->to(base_url('/dashboard/myebook'));
  }
  public function deleteEbook($id)
  {
    $this->ebookTagModel->where('id_ebook', $id)->delete();
    $this->statistikModel->where('id_ebook', $id)->delete();
    $this->model->where('id', $id)->delete();
    return redirect()->to(base_url('/dashboard/ebook'));
  }
  public function deleteMyEbook($id)
  {
    $this->ebookTagModel->where('id_ebook', $id)->delete();
    $this->statistikModel->where('id_ebook', $id)->delete();
    $this->model->where('id', $id)->delete();
    return redirect()->to(base_url('/dashboard/myebook'));
  }
  public function editEbook($id)
  {
    $data['title'] = 'Ebshare | Edit Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('/dashboard/editEbook', $data);
  }
  public function editMyEbook($id)
  {
    $data['title'] = 'Ebshare | Edit Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    $data['kategori'] = $this->kategoriModel->allKategori();
    return view('/dashboard/editMyEbook', $data);
  }
  public function updateEbook()
  {
    // print_r($this->request->getVar());
    $data['id'] = $this->request->getPost('id_ebook');
    $judul = $this->request->getPost('judul');
    $data['penulis'] = $this->request->getPost('penulis');
    $data['penerbit'] = $this->request->getPost('penerbit');
    $data['deskripsi'] = $this->request->getPost('deskripsi');
    $data['id_kategori'] = $this->request->getPost('kategori');
    $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $tags = explode(',', $this->request->getPost('tag') ?? '');

    // $inputString = $this->request->getPost('inputString');

    // Pola reguler untuk karakter yang ingin dihilangkan
    $pattern = '/[^a-zA-Z0-9.,\s]/';

    // Hilangkan karakter tersebut dari string
    $data['judul'] = preg_replace($pattern, ' ', $judul);


    if (!$this->model->update_data($data)) {
      $data['errors'] = $this->model->errors();
      $data['kategori'] = $this->kategoriModel->allKategori();
      return view('/dashboard/ebook/edit', $data);
    }
    foreach ($this->ebookTagModel->where('id_ebook', $data['id'])->join('tag', 'ebook_tag.id_tag = tag.id')->get()->getResultArray() as $ebookTag) {
      if (in_array($ebookTag['nama_tag'], $tags) == null) {
        $this->ebookTagModel->where('id_ebook', $data['id'])->where('id_tag', $ebookTag['id_tag'])->delete();
      }
    }

    foreach ($tags as $tag) {

      $tag = trim($tag);
      // echo 'Tag  ==>'.$tag;

      # code...
      if ($this->tagModel->where('nama_tag', $tag)->first() == null) {
        $this->tagModel->tambah(['nama_tag' => $tag]);
        $id_tag = $this->tagModel->insertID();
      } else {
        $id_tag = $this->tagModel->select('id')->where('nama_tag', $tag)->get()->getResultArray()['0'];
      }
      if ($this->ebookTagModel->where('id_tag', $id_tag)->where('id_ebook', $data['id'])->first() == null) {
        $this->ebookTagModel->tambah(['id_ebook' => $data['id'], 'id_tag' => $id_tag]);
      }
    }

    session()->setFlashdata('message', 'Ebook Berhasil di Ubah !');
    return redirect()->to(base_url('/dashboard/ebook'));
  }
  public function updateMyEbook()
  {
    // print_r($this->request->getVar());
    $data['id'] = $this->request->getPost('id_ebook');
    $judul = $this->request->getPost('judul');
    $data['penulis'] = $this->request->getPost('penulis');
    $data['penerbit'] = $this->request->getPost('penerbit');
    $data['deskripsi'] = $this->request->getPost('deskripsi');
    $data['id_kategori'] = $this->request->getPost('kategori');
    $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $tags = explode(',', $this->request->getPost('tag') ?? '');

    // $inputString = $this->request->getPost('inputString');

    // Pola reguler untuk karakter yang ingin dihilangkan
    $pattern = '/[^a-zA-Z0-9.,\s]/';

    // Hilangkan karakter tersebut dari string
    $data['judul'] = preg_replace($pattern, ' ', $judul);


    if (!$this->model->update_data($data)) {
      $data['errors'] = $this->model->errors();
      $data['kategori'] = $this->kategoriModel->allKategori();
      return view('/dashboard/myebook/edit', $data);
    }
    foreach ($this->ebookTagModel->where('id_ebook', $data['id'])->join('tag', 'ebook_tag.id_tag = tag.id')->get()->getResultArray() as $ebookTag) {
      if (in_array($ebookTag['nama_tag'], $tags) == null) {
        $this->ebookTagModel->where('id_ebook', $data['id'])->where('id_tag', $ebookTag['id_tag'])->delete();
      }
    }

    foreach ($tags as $tag) {

      $tag = trim($tag);
      // echo 'Tag  ==>'.$tag;

      # code...
      if ($this->tagModel->where('nama_tag', $tag)->first() == null) {
        $this->tagModel->tambah(['nama_tag' => $tag]);
        $id_tag = $this->tagModel->insertID();
      } else {
        $id_tag = $this->tagModel->select('id')->where('nama_tag', $tag)->get()->getResultArray()['0'];
      }
      if ($this->ebookTagModel->where('id_tag', $id_tag)->where('id_ebook', $data['id'])->first() == null) {
        $this->ebookTagModel->tambah(['id_ebook' => $data['id'], 'id_tag' => $id_tag]);
      }
    }

    session()->setFlashdata('message', 'Ebook Berhasil di Ubah !');
    return redirect()->to(base_url('/dashboard/myebook'));
  }
  public function detailEbook($id)
  {
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    return view('dashboard/detailEbook', $data);
  }
  public function detailMyEbook($id)
  {
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    return view('dashboard/detailMyEbook', $data);
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
