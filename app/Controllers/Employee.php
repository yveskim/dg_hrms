<?php

namespace App\Controllers;
use App\Libraries\Hash;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmployeeModel;
use App\Models\PlantillaModel;
use App\Models\EmploymentStatusModel;


class Employee extends BaseController
{
	public function index($page = 'index')
	{
	    if ( ! is_file(APPPATH.'/Views/f_dashboard/information/'.$page.'.php'))
	    {
	        // Whoops, we don't have a page for that!
	        throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
	    }

	    $data['title'] = ucfirst($page); // Capitalize the first letter

	    return view('f_templates/metro_header', $data);
		return view('f_dashboard/'.$page, $data);
	    return view('f_templates/metro_footer', $data);
	}

	function getEmpData(){
		$eMdl = new EmployeeModel();

		$data['emp'] = $eMdl->findAll();
		return $this->response->setJSON($data);
	}

	



}
