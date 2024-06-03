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
}
