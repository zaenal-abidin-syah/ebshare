<?php

namespace App\Models;

use CodeIgniter\Model;

class EbookTagModel extends Model
{
  protected $table      = 'ebook_tag';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['id_ebook', 'id_tag'];
  public function tambah($data){
    return $this->insert($data);
  }

}