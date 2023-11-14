<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\PlantillaModel;


class Plantilla extends BaseController
{
	public function index($page = 'index')
	{

	}

	function getVacantPlantilla(){
		$plantMdl = new PlantillaModel();		
		$data['plant'] = $plantMdl
		->join('employment_status_tbl', 'employment_status_tbl.plantilla_id = plantilla_tbl.plant_id')
		->where('employment_status_tbl.emp_stat_id', null)->find();
		return $this->response->setJSON($data);
	}

	function getAllPlantilla(){
		$plantMdl = new PlantillaModel();		
		$data['plant'] = $plantMdl
						->join('employment_status_tbl', 'employment_status_tbl.plantilla_id = plantilla_tbl.plant_id', 'left')
						->join('employee_t', 'employee_t.emp_id = employment_status_tbl.emp_id', 'left')
						->where('employment_status_tbl.emp_stat_id', null)
						->find();
		return $this->response->setJSON($data);
	}


	function addPlantilla(){
		$plantMdl = new PlantillaModel();		

		$data = [
			'plantilla_title' => $this->request->getPost('plantilla_title'),
			'plantilla_item_no' => $this->request->getPost('plantill_item_no'),
			'salary_grade' => $this->request->getPost('salary_grade'),
			'monthly_salary' => $this->request->getPost('monthly_salary'),
		];
		

		try{
			$res = $plantMdl->insert($data);
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

	function deletePlantilla(){
		$enModel = new PlantillaModel();
		$en_id = $this->request->getGet('en_id');
		$res = $enModel->where('en_id', $en_id)->delete();
		if($res){
			$rslt['status'] = 1;
			$rslt['message'] = "Delete successfull.";
			echo json_encode($rslt);
			die;
		}else{
			$rslt['status'] = 0;
			$rslt['message'] = "Data deletion was unsuccessfull.";
			echo json_encode($rslt);
			die;
		}
	}

	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	


}
