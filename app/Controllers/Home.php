<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Ebshare | Home';
        return view('home', $data);
    }
}