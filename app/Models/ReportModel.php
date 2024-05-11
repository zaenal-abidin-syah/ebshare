<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table      = 'ebook';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'path', 'id_author', 'id_kategori'];

    public function allReport(){
      $report = $this->select()
                ->join('ebook_statistik', 'ebook.id = ebook_statistik.id_ebook')
                ->join('kategori', 'kategori.id = ebook.id_kategori')
                ->get();

      return $report->getResultArray();
    }
    public function ebookGroupByKategoryReport(){
      $report = $this->selectSum('ebook_statistik.jumlah_unduhan')
                ->selectSum('ebook_statistik.jumlah_favorite')
                ->selectSum('ebook_statistik.jumlah_komentar')
                ->select('kategori.nama_kategori')
                ->join('ebook_statistik', 'ebook.id = ebook_statistik.id_ebook')
                ->join('kategori', 'kategori.id = ebook.id_kategori')
                ->groupBy('nama_kategori')
                ->get();

      return $report->getResultArray();
    }

    // public function getEbook($id=false){
    //     if($id){
    //         return $this->find_all()->findAll();
    //     }
    //     return $this->find_all()->where('id_buku', $id)->first();
    // }

    public function create($judul, $path, $author, $kategori){
        $data = [
            'title' => $judul,
            'path' => $path,
            'id_author'    => $author,
            'id_kategori'    => $kategori,
        ];
        
        // Inserts data and returns inserted row's primary key
        return $this->insert($data);
    }
    public function find_all() {
        // Lakukan join antara tabel ebook, author, dan kategori
        return $this->select('ebook.*, author.nama_author, kategori.nama_kategori')
                    ->join('author', 'author.id_author = ebook.id_author')
                    ->join('kategori', 'kategori.id_kategori = ebook.id_kategori')->findAll();
    }

    public function update_data($data){
        return $this->save($data);
    }
    public function delete_data($id){
        return $this->delete(['id', $id]);
    }
    public function find_kategori() {
        return $this->select('kategori.*')->findAll();
    }
    public function find_author() {
        return $this->select('author.*')->findAll();
    }
}
