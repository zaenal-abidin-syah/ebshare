<?php

namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model
{
  protected $table      = 'ebook_statistik';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'jumlah_unduhan', 'jumlah_favorite', 'jumlah_komentar', 'rating_rata_rata'];

  public function tambah($data)
  {
    return $this->insert($data, false);
  }
  public function updateFavorite($data)
  {
    return $this->set("jumlah_favorite", "jumlah_favorite+" . $data['num'], false)
      ->where('id_ebook', $data['id_ebook'])
      ->update();
  }
  public function updateUnduhan($data)
  {
    return $this->set("jumlah_unduhan", "jumlah_unduhan+1", false)
      ->where('id_ebook', $data)
      ->update();
  }
  public function updateRating($data)
  {
    return $this->set("rating_rata_rata", $data['rata-rata'])
      ->where('id_ebook', $data['id_ebook'])
      ->update();
  }
  public function updateKomentar($id_ebook)
  {
    return $this->set("jumlah_komentar", "jumlah_komentar+1", false)
      ->where('id_ebook', $id_ebook)
      ->update();
  }
}
