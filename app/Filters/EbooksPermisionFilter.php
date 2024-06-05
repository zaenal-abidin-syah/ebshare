<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EbookModel;

class EbooksPermisionFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('role')) {
      // session()->setFlashdata('test',  $request->getUri()->getSegment(4));
      $this->model = new EbookModel();
      $isUsersEbook = $this->model->isUsersEbook(['id' => $request->getUri()->getSegment(4), 'id_user' => session()->get('id')]);
      if (!$isUsersEbook) {
        return redirect()->to(base_url('/dashboard/myebook'));
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
