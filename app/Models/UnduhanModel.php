<?php

namespace App\Models;

use CodeIgniter\Model;

class UnduhanModel extends Model
{
  protected $table      = 'riwayat_unduhan';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'id_user', 'tanggal'];
  public function addUnduhan($data)
  {
    return $this->save($data);
  }

  public function unduhanPerMonth($id = False)
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
