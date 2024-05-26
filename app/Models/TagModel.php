<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
  protected $table      = 'tag';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  protected $allowedFields = ['nama_tag'];
  public function allTag(){
    return $this->get()->getResultArray();
  }
  public function tambah($tag){
    return $this->insert($tag);
  }
}