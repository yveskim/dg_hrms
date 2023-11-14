<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\ProgramHeadModel;
use App\Models\DepartmentModel;
use App\Models\ProgramModel;
use App\Models\SchoolYearModel;
use App\Models\SemesterModel;

class Settings extends BaseController
{
	public function index($page = 'index')
	{
		if (!is_file(APPPATH . '/Views/settings/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		return view('settings/' . $page);
	}

	function getDepartment(){
		$depMdl = new DepartmentModel();	
		$data['dept'] = $depMdl->findAll();
		return $this->response->setJSON($data);
	}

	function getPrograms(){	
		$progMdl = new ProgramModel();	
		$data['prog'] = $progMdl
						->join('program_head_tbl', 'program_head_tbl.p_id = program_tbl.prog_id', 'left')
						->join('employee_t', 'employee_t.emp_id = program_head_tbl.ph_emp_id', 'left')
						->join('category_tbl', 'category_tbl.cat_id = program_tbl.cat_id', 'left')->find();
		return $this->response->setJSON($data);
	}

	function setProgram()
	{
		$progMdl = new ProgramModel();
		// $logo = $this->request->getPost('prog_logo');
		$image = $this->request->getFile('prog_logo');
		// $customName = $this->request->getPost('profile_image');
		$imageName = $image->getName();
		$imageSize = $image->getSize();
		$randomFileName = $image->getRandomName();
		$imageExtension = $image->getExtension();

		if (!empty($imageName)) {
			if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
				$image->move('upload/program logo/program_profile/', $randomFileName); // move the image to upload folder
			}
		}

		$data = [
			'program_title' => $this->request->getPost('prog_title'),
			'description' => $this->request->getPost('description'),
			'cat_id' => $this->request->getPost('cat_id'),
			'program_logo' => $randomFileName,
		];

		$res = $progMdl->insert($data);
		if ($res) {
			$result['status'] = 1;
			echo json_encode($result);
			die;
		} else {
			$result['status'] = 0;
			echo json_encode($result);
			die;
		}

	}


	function setActiveSy(){
		$syMdl = new SchoolYearModel();	
		$sy_id = $this->request->getPost('sy_id');

		try {
			$res = $syMdl->set('is_active', false)->update();
			if ($res) {
				$res2 = $syMdl->set('is_active', true)->where('sy_id', $sy_id)->update();
				if($res2){
					$rslt['status'] = 1;
					echo json_encode($rslt);
					die;
				}
			}
		} catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			echo json_encode($result);
			die;
		}

	}


	function getSemester(){
		$semMdl = new SemesterModel();	
		$data['sem'] = $semMdl->findAll();
		return $this->response->setJSON($data);
	}

	
	function setActiveSemester(){
		$semMdl = new SemesterModel();	
		$sem_id = $this->request->getPost('sem_id');

		try {
			$res = $semMdl->set('is_active', false)->update();
			if ($res) {
				$res2 = $semMdl->set('is_active', true)->where('sem_id', $sem_id)->update();
				if($res2){
					$rslt['status'] = 1;
					echo json_encode($rslt);
					die;
				}
			}
		} catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			echo json_encode($result);
			die;
		}

	}






}
