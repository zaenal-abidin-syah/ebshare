<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;

class EbookModel extends Model
{
  protected $table      = 'ebook';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['judul', 'penulis', 'penerbit', 'ukuran', 'tahun_terbit', 'type', 'deskripsi', 'path', 'id_user', 'id_kategori', 'img', 'tanggal', 'pages'];
  // protected $allowedFields = ['username', 'email', 'password', 'role'];
  protected $validationRules = [
    'judul'     => 'required',
    'penulis'        => 'required',
    'penerbit'     => 'required',
    'ukuran'  => 'required',
    'tahun_terbit' => 'required',
    'type' => 'required'
  ];
  // all ebook
  // ebook by kategori
  // ebook by keyword
  // ebook by size
  // ebook by type

  // ebook per user (must login)
  // update, delete, add

  // public function allEbook(){
  //   return $this->get()->getResultArray();
  // }
  public function ebookByKategori($kategori)
  {
    return $this->where('id_kategori', $kategori)->get()->getResultArray();
  }
  public function countEbookByKategori()
  {
    return $this->selectCount('ebook.id', 'jumlah_buku')
      ->select('k.nama_kategori kategori')
      ->join('kategori k', 'k.id = ebook.id_kategori')
      ->groupBy('k.id')
      ->get()->getResultArray();
  }
  public function ebookByUser($user)
  {
    return $this->where('id_user', $user)->get()->getResultArray();
  }
  public function ebookByYear($year)
  {
    return $this->where('tahun_terbit', $year)->get()->getResultArray();
  }
  public function isUsersEbook($data)
  {
    return $this->where($data)->first();
  }
  public function ebookById($id = false)
  {

    return $this->select('ebook.judul, ebook.penulis, ebook.penerbit, ebook.id, ebook.id_user, ebook.ukuran, ebook.tahun_terbit, ebook.deskripsi, ebook.tanggal, ebook.type, ebook.id_kategori, u.username, k.nama_kategori, GROUP_CONCAT(t.nama_tag SEPARATOR ",") tag')
      ->join('ebook_tag et', 'et.id_ebook = ebook.id')
      ->join('kategori k', 'k.id = ebook.id_kategori')
      ->join('tag t', 't.id = et.id_tag')
      ->join('user u', 'ebook.id_user = u.id')
      ->where('ebook.id', $id)
      ->groupBy('ebook.id')
      ->get()
      ->getResultArray()[0];
  }
  public function allEbook($id = false)
  {
    if ($id) {
      return $this->select('ebook.*, k.nama_kategori, GROUP_CONCAT(t.nama_tag SEPARATOR ",") tag')
        ->join('ebook_tag et', 'et.id_ebook = ebook.id')
        ->join('kategori k', 'k.id = ebook.id_kategori')
        ->join('tag t', 't.id = et.id_tag', 'left')
        ->where('ebook.id_user', $id)
        ->groupBy('ebook.id');
    } else {
      return $this->select('ebook.*, k.nama_kategori, GROUP_CONCAT(t.nama_tag SEPARATOR ",") tag')
        ->join('ebook_tag et', 'et.id_ebook = ebook.id')
        ->join('kategori k', 'k.id = ebook.id_kategori')
        ->join('tag t', 't.id = et.id_tag', 'left')
        ->groupBy('ebook.id');
    }
  }
  public function allStatistik($id = false)
  {
    // $this->userModel = new UserModel();
    // $builder = $this->userModel->selectCount('id');

    if ($id) {
      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->where('ebook.id_user', $id)
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    } else {
      $db      = \Config\Database::connect();
      $user = $db->table('user')->selectCount('id');

      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->selectSubquery($user, 'user')
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    }
  }
  public function allStatistikPerMonth($id = false)
  {
    // $this->userModel = new UserModel();
    // $builder = $this->userModel->selectCount('id');

    if ($id) {
      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->where('ebook.id_user', $id)
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    } else {
      $db      = \Config\Database::connect();
      $user = $db->table('user')->selectCount('id');

      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->selectSubquery($user, 'user')
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    }
  }

  public function userActivity($id = false)
  {
    // $this->userModel = new UserModel();
    // $builder = $this->userModel->selectCount('id');

    if ($id) {
      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->where('ebook.id_user', $id)
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    } else {
      $db      = \Config\Database::connect();
      $user = $db->table('user')->selectCount('id');

      return $this->selectCount('ebook.id', 'ebooks')
        ->selectSum('es.jumlah_unduhan')
        ->selectSum('es.jumlah_komentar')
        ->selectSum('es.jumlah_favorite')
        ->selectSubquery($user, 'user')
        ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
        ->get()->getResultArray()[0];
    }
  }

  public function tambah($data)
  {
    return $this->insert($data, false);
  }
  public function update_data($data)
  {
    return $this->save($data);
  }
  public function delete_data($id)
  {
    return $this->delete($id);
  }
}
