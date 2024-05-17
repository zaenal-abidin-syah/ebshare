<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
  protected $table      = 'tag';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;
  public function allTag(){
    return $this->get()->getResultArray();
  }
}