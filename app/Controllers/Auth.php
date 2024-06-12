<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
  // task = pagination

  public function __construct()
  {
    $this->model = new UserModel();
  }

  public function login()
  {
    $data['title'] = 'Ebshare | Login';
    return view('login', $data);
  }
  public function verify()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $this->model->where('username', $username)->first();
    if ($user && hash('sha256', $password) == $user['password']) {
      session()->set([
        'id' => $user['id'],
        'username' => $user['username'],
        'email' => $user['email'],
        'login' => true,
        'role' => $user['role']
      ]);
      return redirect()->to(base_url('/'));
    }
    session()->setFlashdata('message', 'Login Failed, please check username and password');
    return redirect()->to(base_url('/login'));
  }
  public function register()
  {
    $data['title'] = 'Ebshare | Register';
    return view('register', $data);
  }
  public function registerUser()
  {
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $email = $this->request->getPost('email');
    $user = [
      'username' => $username,
      'password' => $password,
      'email' => $email
    ];
    $data['title'] = 'Ebshare | Register';
    if ($this->model->validate($user)) {
      // $this->model->register($user);
      $user['password'] = hash('sha256', $password);
      if ($this->model->register($user) === false) {
        $data['error'] = $this->model->errors();
        session()->setFlashdata('flash', 'Database error');
        return view('/register', $data);
      } else {
        return redirect()->to(base_url(''));
      }
    } else {
      $data['errors'] = $this->model->errors();
      session()->setFlashdata('flash', 'Data error field');
      print_r($data['errors']);
      // return view('/register', $data);
      // return redirect()->to(base_url('/register'))->withInput();
    }
  }
  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('/'));
  }
}
