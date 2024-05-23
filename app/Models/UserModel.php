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
  public function allUser(){
    return $this;
  }

  public function register($data){

    return $this->save($data);
  }
  public function verify($data){
    $this->where('username', $data['username']);
    $this->where('password', $data['password']);
    return $this->first();
  }
  public function changePass(){
    $user = $this->select('id, password')->get()->getResultArray();
    
    foreach ($user as $u) {
      // $data[id]
      print('======pass');
      print($u['password']);
      print('======id');
      print($u['id']);
      // $this->where('id', $u["id"])->update(['password' => hash('sha256', $u['password'])]);
      $this->save(['id' => $u['id'], 'password' => hash('sha256', $u['password']) ]);
      // print_r($u['id']);
    }
    return $user;
    // $this->updateBatch($user, 'id');
    // foreach ($data as $row) {
    //   $builder->where('id', $row['id'])->update($row);
  // }
    // $this->save();
  }

}
