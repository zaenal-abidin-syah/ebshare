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
}
