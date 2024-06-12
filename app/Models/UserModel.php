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
    'username'     => 'required|max_length[16]|is_unique[user.username]',
    'email'        => 'required|valid_email|is_unique[user.email]',
    'password'     => 'required|min_length[8]|max_length[255]'
  ];
  public function allUser()
  {
    return $this;
  }
  public function detailUser($id)
  {
    return $this->select('user.username, user.id, user.email, user.role, user.tanggal_bergabung, ud.id id_detail, ud.no_telepon, ud.alamat, ud.kota, ud.provinsi, ud.negara')->join('user_detail ud', 'ud.id_user = user.id', 'left')->where('user.id', $id)->get()->getResultArray()[0];
  }
  public function updateUser($id, $data)
  {
    return $this->update($id, $data);
  }

  public function register($data)
  {
    return $this->save($data);
  }
  public function verify($data)
  {
    $this->where('username', $data['username']);
    $this->where('password', $data['password']);
    return $this->first();
  }
  public function changePass()
  {
    $user = $this->select('id, password')->get()->getResultArray();

    foreach ($user as $u) {
      // $data[id]
      print('======pass');
      print($u['password']);
      print('======id');
      print($u['id']);
      // $this->where('id', $u["id"])->update(['password' => hash('sha256', $u['password'])]);
      $this->save(['id' => $u['id'], 'password' => hash('sha256', $u['password'])]);
      // print_r($u['id']);
    }
    return $user;
  }
}
