<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
  protected $table      = 'komentar';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'id_user', 'content', 'tanggal'];
  public function addKomentar($data)
  {
    return $this->save($data);
  }
  public function getKomentarByEbook($id_ebook)
  {
    return $this->select('user.username user, komentar.content komentar, komentar.tanggal tanggal')->where('id_ebook', $id_ebook)->join('user', 'user.id = komentar.id_user')->get()->getResultArray();
  }

  public function komentarPerMonth($id)
  {

    if ($id == False) {
      $sixMonthsAgo = date('Y-m-01', strtotime('-5 months'));

      $query = $this->selectCount('id', 'total')
        ->select("DATE_FORMAT(tanggal, '%M') bulan")
        ->where("tanggal >= '$sixMonthsAgo'")
        ->groupBy('bulan')
        ->orderBy("DATE_FORMAT(tanggal, '%Y-%m')")
        ->get();

      return $query->getResultArray();
    } else {
      $sixMonthsAgo = date('Y-m-01', strtotime('-5 months'));
      $query = $this->selectCount('id', 'total')
        ->select("DATE_FORMAT(tanggal, '%M') bulan")
        ->where("tanggal >= '$sixMonthsAgo'")
        ->groupBy('bulan')
        ->orderBy("DATE_FORMAT(tanggal, '%Y-%m')")
        ->where('id_user', $id)
        ->get();

      return $query->getResultArray();
    }
  }
}
