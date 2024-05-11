<?php

namespace App\Models;

use CodeIgniter\Model;

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
    // public function find_kategori() {
    //     return $this->select('kategori.*')->findAll();
    // }
    // public function find_author() {
    //     return $this->select('author.*')->findAll();
    // }
}
