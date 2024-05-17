<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;

class EbookModel extends Model
{
  protected $table      = 'ebook';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['title', 'path', 'id_author', 'id_kategori'];
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
  public function ebookByKategori($kategori){
    return $this->where('id_kategori', $kategori)->get()->getResultArray();
  }
  public function countEbookByKategori(){
    return $this->selectCount('ebook.id', 'jumlah_buku')
            ->select('k.nama_kategori kategori')
            ->join('kategori k', 'k.id = ebook.id_kategori')
            ->groupBy('k.id')
            ->get()->getResultArray();
  }
  public function ebookByUser($user){
    return $this->where('id_user', $user)->get()->getResultArray();
  }
  public function ebookByYear($year){
    return $this->where('tahun_terbit', $year)->get()->getResultArray();
  }
  public function allEbook(){
    return $this->select('ebook.*, k.nama_kategori, GROUP_CONCAT(t.nama_tag SEPARATOR ", ") tag')
            ->join('ebook_tag et', 'et.id_ebook = ebook.id')
            ->join('kategori k', 'k.id = ebook.id_kategori')
            ->join('tag t', 't.id = et.id_tag')
            ->groupBy('ebook.id');
  }
  public function allStatistik(){
    // $this->userModel = new UserModel();
    // $builder = $this->userModel->selectCount('id');
    $db      = \Config\Database::connect();
    $user = $db->table('user')->selectCount('id');

    return $this->selectCount('ebook.id', 'ebooks')
                ->selectSum('es.jumlah_unduhan')
                ->selectSum('es.jumlah_komentar')
                ->selectSubquery($user, 'user')
                ->join('ebook_statistik es', 'ebook.id = es.id_ebook')
                ->get()->getResultArray();
    // return $builder->get();
  }

  public function tambah($data){
    return $this->insert($data);
  }
  public function update_data($data){
    return $this->save($data);
  }
  public function delete_data($id){
    return $this->delete($id);
}


// public function create($judul, $path, $author, $kategori){
//     $data = [
//         'title' => $judul,
//         'path' => $path,
//         'id_author'    => $author,
//         'id_kategori'    => $kategori,
//     ];
    
//     // Inserts data and returns inserted row's primary key
//     return $this->insert($data);
// }
// public function find_all() {
//     // Lakukan join antara tabel ebook, author, dan kategori
//     return $this->select('ebook.*, author.nama_author, kategori.nama_kategori')
//                 ->join('author', 'author.id_author = ebook.id_author')
//                 ->join('kategori', 'kategori.id_kategori = ebook.id_kategori')->findAll();
// }

// public function update_data($data){
//     return $this->save($data);
// }
// public function delete_data($id){
//     return $this->delete(['id', $id]);
// }
}
