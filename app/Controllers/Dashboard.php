<?php

namespace App\Controllers;

use App\Models\EbookModel;
use App\Models\ReportModel;
use App\Models\UserModel;
use App\Models\DetailUserModel;
use App\Models\KategoriModel;
use App\Models\StatistikModel;
use App\Models\EbookTagModel;
use App\Models\RatingModel;
use App\Models\TagModel;
use Kiwilan\Ebook\Ebook;
use Imagick;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


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
    $this->ratingModel = new RatingModel();
    $this->tagModel = new TagModel();
    helper('form');
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
  public function getPages($path)
  {
    if (file_exists($path)) {
      //open the path for reading
      if ($handle = @fopen($path, "rb")) {
        $count = 0;
        $i = 0;
        while (!feof($handle)) {
          if ($i > 0) {
            $contents .= fread($handle, 8152);
          } else {
            $contents = fread($handle, 1000);
            if (preg_match("/\/N\s+([0-9]+)/", $contents, $found)) {
              return $found[1];
            }
          }
          $i++;
        }
        fclose($handle);
        if (preg_match_all("/\/Type\s*\/Pages\s*.*\s*\/Count\s+([0-9]+)/", $contents, $capture, PREG_SET_ORDER)) {
          foreach ($capture as $c) {
            if ($c[1] > $count)
              $count = $c[1];
          }
          return $count;
        }
      }
    }
    return 0;
  }

  public function addMyEbook()
  {
    $data['title'] = 'Ebshare | Tambah Ebook';
    // $data['ebooks'] = $this->model->allEbook(session()->get('id'))->paginate(10);
    $file = $this->request->getFile('file');
    $ebook_extension = ['pdf', 'epub'];
    $doc_extension = ['docx', 'doc', 'odt'];
    $data['kategori'] = $this->kategoriModel->allKategori();
    // return view('dashboard/addMyEbook', $data);

    if ($file !== null && $file->isValid() && !$file->hasMoved()) {

      if (in_array($file->getExtension(), $ebook_extension)) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);
        $data['path'] = WRITEPATH . 'uploads/' . $newName;
        $ebook = Ebook::read($data['path']);
        $pattern = '/[^a-zA-Z0-9.,\-\s]/';
        $data['judul'] = preg_replace($pattern, ' ', $ebook->getTitle());

        $data['penulis'] = [];
        foreach ($ebook->getAuthors() as $author) {
          $data['penulis'][] = $author->getName() ? $author->getName()  : '';
        }
        $data['penulis'] = implode(',', $data['penulis']);
        $data['penerbit'] = $ebook->getPublisher();
        $data['deskripsi'] = $ebook->getDescription();
        $data['type'] = $ebook->getExtension();
        $data['tahun_terbit'] = $ebook->getPublishDate() ? $ebook->getPublishDate()->format('Y') : '';
        $data['ukuran'] = $ebook->getSize();
        $data['pages'] = $ebook->getPagesCount();
        session()->set('file_upload', $data['path']);

        // return response()->setJSON($data);
        $data['img'] = '/img/ebook/default-' . $ebook->getExtension() . '.png';
        if ($ebook->hasCover()) {
          $cover = $ebook->getCover();
          // $coverPath = $cover->getPath(); // ?string => path to cover
          $coverContents = $cover->getContents($toBase64 = false);
          $img = WRITEPATH . 'uploads/img/ebook/' . explode('.', $newName)[0] . '.jpg';
          file_put_contents($img, $coverContents);
          $data['img'] = 'img/ebook/' . explode('.', $newName)[0] . '.jpg';
          session()->set('cover_upload', $data['img']);
        }
      } else if (in_array($file->getExtension(), $doc_extension)) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);
        $data['path'] = WRITEPATH . 'uploads/' . $newName;
        $docFile = IOFactory::load($data['path']);
        $docFile->getDocInfo();
        $pattern = '/[^a-zA-Z0-9.,\-\s]/';
        $data['judul'] = preg_replace($pattern, ' ', $docFile->getDocInfo()->getTitle() ?? '');
        $data['penulis'] = $docFile->getDocInfo()->getCreator() ?? '';
        $data['penerbit'] = $docFile->getDocInfo()->getCompany() ?? '';
        $data['deskripsi'] = $docFile->getDocInfo()->getDescription() ?? '';
        $data['type'] = $file->getClientExtension();
        $data['tahun_terbit'] = $docFile->getDocInfo()->getCreated() ? date('Y', $docFile->getDocInfo()->getCreated()) : '';
        $data['ukuran'] = $file->getSize();
        $data['pages'] = $this->getPages($data['path']);
        $data['img'] = '/img/ebook/default-' . $file->getClientExtension() . '.png';

        session()->set('file_upload', $data['path']);
        return view('dashboard/addMyEbook', $data);
      }
    } else {
      // error
      echo 'file error';
    }

    return view('dashboard/addMyEbook', $data);


    // return view('test', $data);
  }
  public function test()
  {

    $file = $this->request->getFile('file');
    // print_r($file->getExtension());
    // print_r();
    $ebook_extension = ['pdf', 'epub'];
    $doc_extension = ['docx', 'doc', 'odt'];

    if ($file !== null && $file->isValid() && !$file->hasMoved()) {

      if (in_array($file->getExtension(), $ebook_extension)) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);
        $data['path'] = WRITEPATH . 'uploads/' . $newName;
        $ebook = Ebook::read($data['path']);
        return response()->setJSON([
          'filename' => $ebook->getFilename(),
          'ext' => $ebook->getExtension(),
          'pages' => $ebook->getPagesCount(),
          'publisher' => $ebook->getPublisher(),
          'title' => $ebook->getTitle(),
          'author' => $ebook->getAuthors(),
          'bautho' => $ebook->getAuthorMain(),
          'desc' => $ebook->getDescription(),
          'cover' => $ebook->hasCover(),
          'extra' => $ebook->getExtras()

        ]);
      } else if (in_array($file->getExtension(), $doc_extension)) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);
        $data['path'] = WRITEPATH . 'uploads/' . $newName;
        // print_r('hello');
        // $docFile = PhpWord::r;
        $docFile = IOFactory::load($data['path']);


        // Get document properties
        print_r($docFile->getDocumentProperties());
        // foreach ($docFile->getTitles() as $title) {
        //   print_r($title);
        // }
        // echo "Title: " .  . "\n";
        // echo "Creator: " . $docFile->getCreator() . "\n";
        // echo "Description: " . $docFile->getDescription() . "\n";
        // echo "Last Modified By: " . $docFile->getLastModifiedBy() . "\n";
        // echo "Created: " . $docFile->getCreated() . "\n";
        // echo "Modified: " . $docFile->getModified() . "\n";
      }
      // $ebook->getPath(); // string => path to ebook
      // print_r($ebook->getMetadata());
      // return response()->setJSON(
      //   $ebook->getMetadata()
      // );
      // foreach ($ebook->getAuthors() as $author) {
      //   print_r("author =" . $author);
      // }

      // print_r(); // BookAuthor[] (`name`: string, `role`: string)
      // print_r(); // ?BookAuthor => First BookAuthor (`name`: string, `role`: string)
      // print_r(); // ?string
      // print_r($ebook->getDescriptionHtml());
      // if ($ebook->hasCover()) {
      //   $cover = $ebook->getCover();
      //   $coverPath = $cover->getPath(); // ?string => path to cover
      //   $coverContents = $cover->getContents($toBase64 = false);
      //   // print_r($coverPath);
      //   // print_r($coverContent);
      //   $coverSavePath = WRITEPATH . 'uploads/img/ebook/' . basename($coverPath);
      //   file_put_contents($coverSavePath, $coverContents);
      // } else {
      //   print_r('tidak ada cover');
      // }

      // $image = new Imagick();
      // $image->readImage($data['path'] . '[0]');
      // $imagePath = WRITEPATH . 'uploads/img/ebook/' . explode('.', $newName)[0] . '.jpg';
      // $image->writeImage($imagePath);
      // $data['img'] = 'img/ebook/' . explode('.', $newName)[0] . '.jpg';
      // print_r($data);
    } else {
      // error
      echo 'file error';
    }
  }

  public function createMyEbook()
  {
    $pattern = '/[^a-zA-Z0-9.,\s]/';

    // Hilangkan karakter tersebut dari string
    $data['judul'] = preg_replace($pattern, ' ', $this->request->getPost('judul'));

    $data['penulis'] = $this->request->getPost('penulis');
    $data['penerbit'] = $this->request->getPost('penerbit');
    $data['deskripsi'] = $this->request->getPost('deskripsi');
    $data['id_kategori'] = $this->request->getPost('kategori');
    $data['id_user'] = session()->get('id');
    $data['type'] = $this->request->getPost('type');
    $data['path'] = $this->request->getPost('path');
    $data['tahun_terbit'] = $this->request->getPost('tahun_terbit');
    $data['ukuran'] = $this->request->getPost('ukuran');
    $data['img'] = $this->request->getPost('img');
    $data['pages'] = $this->request->getPost('pages');
    // return $this->response->setJSON($data);

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
  public function cleanUp()
  {
    if (session()->get('file_upload') and file_exists(session()->get('file_upload'))) {
      unlink(session()->get('file_upload'));
      session()->remove('file_upload');
    }
    if (session()->get('cover_upload') and file_exists(session()->get('cover_upload'))) {
      unlink(session()->get('cover_upload'));
      session()->remove('cover_upload');
    }
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
    $data['rating'] =  $this->statistikModel->getRating(['id_ebook' => $id]);
    return view('dashboard/detailEbook', $data);
  }
  public function detailMyEbook($id)
  {
    $data['title'] = 'Ebshare | Detail Ebook';
    $data['ebook'] = $this->model->ebookById($id);
    $data['rating'] =  $this->statistikModel->getRating(['id_ebook' => $id]);
    return view('dashboard/detailMyEbook', $data);
  }
}
