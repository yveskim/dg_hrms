<?php

namespace App\Controllers;
use App\Libraries\Hash;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmpModel;
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
		$empModel = new EmpModel();

		$data['emp'] = $empModel->findAll();
		return $this->response->setJSON($data);
	}

	function getAllActiveEmpNoPlantilla(){
		$plantMdl = new PlantillaModel();

		$data['emp'] = $plantMdl
						->join('employment_status_tbl', 'employment_status_tbl.plantilla_id = plantilla_tbl.plant_id', 'left')
						->join('employee_t', 'employee_t.emp_id = employment_status_tbl.emp_id', 'right')
						->where('employment_status_tbl.emp_stat_id', null)
						->find();
		return $this->response->setJSON($data);
	}

	function setEmpStatus(){
		$empMdl = new EmploymentStatusModel();

		$data = [
			'emp_id' => $this->request->getPost('emp_id_ref'),
			'emp_status' => $this->request->getPost('e_status'),
			'plantilla_id' => $this->request->getPost('plant_id'),
			'step' => $this->request->getPost('step'),
			'category_id' => $this->request->getPost('cat_id'),
			'date_assigned' => $this->request->getPost('date_assigned'),
			'is_retired' => 0,
			'retirement_date' => null,
		];
		
		
		try{
			$res = $empMdl->insert($data);
			if($res){
				$result['status'] = 1;
				echo json_encode($result);
				die;
			}
		}catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			echo json_encode($result);
			die;
		}
	}

	



}
