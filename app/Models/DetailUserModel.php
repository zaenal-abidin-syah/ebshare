<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailUserModel extends Model
{
  protected $table      = 'user_detail';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_user', 'no_telepon', 'alamat', 'kota', 'provinsi', 'negara'];


  public function updateUser($id, $data)
  {
    return $this->update($id, $data);
  }
}
