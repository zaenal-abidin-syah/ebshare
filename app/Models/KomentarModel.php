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
}
