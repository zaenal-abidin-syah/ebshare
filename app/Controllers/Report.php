<?php

namespace App\Controllers;
use \App\Models\ReportModel;

class Report extends BaseController
{
  public function __construct(){
    $this->model = new ReportModel();
  }
  public function index(): string
  {
    $data['ebook'] = $this->model->findAll();
    $data['coba'] = $this->model->allReport();
    $data['dataByKategori'] = $this->model->ebookGroupByKategoryReport();
    return view('report', $data);
  }
}
