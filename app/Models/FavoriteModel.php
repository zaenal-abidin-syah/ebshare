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
}
