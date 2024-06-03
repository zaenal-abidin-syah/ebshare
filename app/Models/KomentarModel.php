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
}
