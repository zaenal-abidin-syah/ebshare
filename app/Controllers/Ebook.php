<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\KategoriModel;
use App\Models\TagModel;

class Ebook extends BaseController
{
  // task = pagination
  public function __construct()
  {
    $this->model = new EbookModel();
    $this->kategoriModel = new KategoriModel();
    $this->tagModel = new TagModel;
  }

  public function index(): string
  {
    $ebooks = $this->model->allEbook();
    if ($this->request->getGet('search')) {
      $query = explode(' ', $this->request->getGet('search'));
      session()->setFlashdata('search', $query);
      foreach ($query as $q) {
        $havingClauses[] = "judul LIKE '%" . $q . "%'";
        $havingClauses[] = "deskripsi LIKE '%" . $q . "%'";
        $havingClauses[] = "tag LIKE '%" . $q . "%'";
      }
      if (!empty($havingClauses)) {
        $ebooks->having(implode(' OR ', $havingClauses));
      }
    }
    if ($this->request->getGet('kategori') != '') {
      $ebooks->where('id_kategori', $this->request->getGet('kategori'));
    }
    $data = [
      'title' => 'Ebshare | Ebook',
      'ebooks' => $ebooks->paginate(12),
      'kategori' => $this->kategoriModel->allKategori(),
      'tag' => $this->tagModel->allTag(),
      'search' => $this->request->getGet('search'),
      'pager' => $this->model->pager
    ];
    return view('ebook', $data);
  }
  public function detailEbook($id)
  {
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    $data['kategori'] = $this->kategoriModel->allKategori();

    return view('detailEbook', $data);
  }
  public function download($id)
  {
    $ebook = $this->model->where('id', $id)->select('judul, path')->first();
    $judul = $ebook['judul'];
    $path = $ebook['path'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $namaFile = $judul . '.' . $extension;
    // print_r($namaFile);

    // return $this->response->download($path, null)->inline()->setFileName($namaFile);


    // print_r($ebook);
    // $mimeType = mime_content_type($path);
    // return $this->response
    //   // ->setContentType($mimeType)
    //   ->setHeader('Content-Disposition', 'inline; filename="' . basename($judul) . '"')
    //   ->setBody(file_get_contents($path));
    return $this->response->download($path, null)->inline()->setHeader('Content-Disposition', 'inline; filename="' . basename($namaFile) . '"');
  }
  public function add()
  {
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
    } else {
      return redirect()->to(base_url('/ebook'));
    }
    // return view('addEbook', $data);
  }
}
