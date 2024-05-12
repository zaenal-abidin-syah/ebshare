<?php

namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
  // task = pagination
  public function __construct(){
    $this->session = \Config\Services::session();
    $this->model = new UserModel();
    $this->session = session();
  }
  public function login(){
    $data['title'] = 'Ebshare | Login';
    return view('login', $data);
  }
  public function verify(){
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    // $user = [
    //   'username'=>$username,
    //   'password'=>$password
    // ];
    // $user = $this->model->where(['username' => $username, 'password'=>$password]);
    $user = $this->model->where('username', $username)
                     ->where('password', $password)
                     ->first();
    return view('test', ['test'=>$user]);

    // if ($user) {
    //     // Jika ditemukan, buat session dan redirect ke halaman dashboard
    //     $session->set('username', $user['username']);
    //     return redirect()->to('/');
    // }

    // // Jika login gagal, kembalikan ke halaman login dengan pesan error
    // return redirect()->to('/login')->with('error', 'Login failed. Please check your username and password.');
    // if($user->first() !== []){
    //   $data = $user->first();
    //   $user = [
    //       'username'=>$data['username'],
    //       'password'=>$data['password']
    //     ];
    //   $this->session->set($user);
    //   return view('test', ['test'=>$user]);
    //   // return redirect()->to(base_url('/'));
    //   // 
      
    // }else{
    //   return redirect()->to(base_url('/login'));
    // }

    // $data['test'] = $this->model->verify($user)->username;
    
    // if ($this->model->verify()){
    //   $this->sesion->set('username', $this->model->verify()->username);
    // }
  }
  public function register(){
    $data['title'] = 'Ebshare | Register';
    return view('register', $data);
  }
  public function registerUser(){
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');
    $email = $this->request->getPost('email');
    $user = [
      'username' => $username,
      'password' => $password,
      'email' => $email
    ];
    $data['title'] = 'Ebshare | Register';
    if ($this->model->register($user) === false) {
      $data['errors'] = $this->model->errors();
      // return view('ebookForm', $data);
      return view('/register', $data);
    }else{
      return redirect()->to(base_url());
    }
  }
}