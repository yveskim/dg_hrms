<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Registrar extends BaseController
{
	public function index($page = 'index')
	{
			if ( ! is_file(APPPATH.'/Views/f_registrar/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Registrar & Admission'; // Capitalize the first letter

			return view('f_registrar/'.$page, $data);

	}




}
