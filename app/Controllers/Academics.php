<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Academics extends BaseController
{
	function jhsProgram($page = 'jhs_program')
	{
			if ( ! is_file(APPPATH.'/Views/f_academics/jhs_program/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			$data['title'] = 'Junior High School Program'; // Capitalize the first letter

			return view('f_academics/jhs_program/'.$page);

	}

}
