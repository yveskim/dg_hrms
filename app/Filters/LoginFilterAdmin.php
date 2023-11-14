<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if( !session()->has('loggedAdmin') ){
          return redirect()->to('/login_admin')->with('fail', 'You must login first!...');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
