<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmpModel;

class Dashboard extends BaseController
{
	public function index($page = 'index')
	{
	    if ( ! is_file(APPPATH.'/Views/f_dashboard/'.$page.'.php'))
	    {
	        // Whoops, we don't have a page for that!
	        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
	    }

		//	$userModel = new UsersModel();
			$empModel = new EmpModel();
			$loggedUserID = session()->get('loggedUser');

			$userInfo = $empModel->where('emp_id' ,  $loggedUserID)
                  ->first();
			$data = [
				'title' => 'Portfolio',
				'userInfo' => $userInfo
			];
	    return view('f_dashboard/'.$page, $data);
	}

	public function SchoolHeads($page = 'index_school_heads')
	{
			if ( ! is_file(APPPATH.'/Views/f_about/school_heads/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
			}

			return view('f_about/school_heads/'.$page);
	}


	function sign_out()
	{
		if (session()->has('loggedUser')) {
			session()->remove('loggedUser');
			return redirect()->to('/news');
		}
	}
}
