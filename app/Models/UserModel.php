<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'email', 'password', 'role'];
    protected $validationRules = [
      'username'     => 'required|max_length[16]',
      'email'        => 'required',
      'password'     => 'required'
  ];

    public function register($data){

      return $this->save($data);
    }
    public function verify($data){
      $this->where('username', $data['username']);
      $this->where('password', $data['password']);
      return $this->first();
    }
}
