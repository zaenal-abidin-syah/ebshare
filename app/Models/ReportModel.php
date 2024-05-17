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
}
