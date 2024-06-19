<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
  protected $table      = 'favorite';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'id_user', 'tanggal'];
  public function isFavorite($data)
  {
    return $this->where($data)->first();
  }
  public function addFavorite($data)
  {
    return $this->insert($data);
  }
  public function removeFavorite($id)
  {
    return $this->delete($id);
  }
  public function favoritePerMonth()
  {
    $sixMonthsAgo = date('Y-m-01', strtotime('-5 months'));

    $query = $this->selectCount('id', 'total')
      ->select("DATE_FORMAT(tanggal, '%M') bulan")
      ->where("tanggal >= '$sixMonthsAgo'")
      ->groupBy('bulan')
      ->orderBy("DATE_FORMAT(tanggal, '%Y-%m')")
      ->get();

    return $query->getResultArray();
  }
}
