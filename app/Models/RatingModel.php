<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
  protected $table      = 'rating';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'id_user', 'rating', 'tanggal'];
  public function isRating($data)
  {
    return $this->where($data)->first();
  }
  public function updateRating($data)
  {
    return $this->save($data);
  }
  public function getMean($id_ebook)
  {
    return $this->selectAvg('rating')
      ->where('id_ebook', $id_ebook)
      ->groupBy('id_ebook')
      ->first();
  }
}
