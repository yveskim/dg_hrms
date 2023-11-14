<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LogoutFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if( session()->has('user_id') || session()->has('loggedAdmin')){
          return redirect()->back();
        }

      /*  if( session()->has('loggedAdmin')){
          return redirect()->back();
        }*/
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
