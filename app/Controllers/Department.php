<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\GradeLevelModel;
use App\Models\EnrollmentMdl;
use App\Models\SchoolYearModel;
use App\Models\AdviseryModel;
use App\Models\DepartmentModel;
use App\Models\DepartmentHeadModel;
use App\Models\CategoryModel;
use App\Models\EmpDepartmentModel;


class Department extends BaseController
{
	public function index($page = 'index')
	{

	}

	function getDepartments(){
		$deptMdl = new DepartmentModel();		
		$data['dept'] = $deptMdl
						->join('department_head_tbl', 'department_head_tbl.dh_dept_id = department_tbl.dept_id', 'left')
						->join('employee_t', 'employee_t.emp_id = department_head_tbl.head_id', 'left')
						->join('category_tbl', 'category_tbl.cat_id = department_tbl.dept_category', 'left')
						->find();
		return $this->response->setJSON($data);
	}

	function deleteDepartment(){
		$enModel = new EnrollmentMdl();
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

	function setDepartment(){
		$deptMdl = new DepartmentModel();	

		$data=[
			'dept_title' => $this->request->getPost('dept_title'),
			'dept_location' => $this->request->getPost('location'),
			'dept_category' => $this->request->getPost('cat_id'),
		];
	
		try{
			$res = $deptMdl->insert($data);
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

	function getDepartmentDetails(){
		$deptMdl = new DepartmentModel();
		$dept_id = $this->request->getGet('dept_id');		
		$data['dept'] = $deptMdl
						->join('category_tbl', 'category_tbl.cat_id = department_tbl.dept_category', 'left')
						->where('dept_id', $dept_id)
						->first();
		return $this->response->setJSON($data);
	}


	function getDept(){
		$deptMdl = new DepartmentModel();
		$dept_id = $this->request->getGet('dept_id');		
		$data['head'] = $deptMdl
						->join('department_head_tbl', 'department_head_tbl.dh_dept_id = department_tbl.dept_id', 'left')
						->join('employee_t', 'employee_t.emp_id = department_head_tbl.head_id', 'left')
						->join('school_year_tbl', 'school_year_tbl.sy_id = department_head_tbl.sy_id', 'left')
						->join('category_tbl', 'category_tbl.cat_id = department_tbl.dept_category', 'left')
						->where('department_tbl.dept_id', $dept_id)
						->first();
		return $this->response->setJSON($data);
	}


	
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	function getGradeLevel(){
		$gradeLvlMdl = new GradeLevelModel();
		$data['gr_lvl'] = $gradeLvlMdl->findAll();
		return $this->response->setJSON($data);
	}

	function getCategory(){
		$catMdl = new CategoryModel();
		$data['cat'] = $catMdl->findAll();
		return $this->response->setJSON($data);
	}
	
	function getDepartmentTeachers(){
		$empDeptMdl = new EmpDepartmentModel();
		$dept_id = $this->request->getGet('dept_id');
		$data['teacher'] = $empDeptMdl->join('department_tbl', 'department_tbl.dept_id = employee_department_tbl.dept_id', 'left')
							->join('employee_t', 'employee_t.emp_id = employee_department_tbl.emp_id', 'left')
							->where('employee_department_tbl.dept_id', $dept_id)
							->find();
		return $this->response->setJSON($data);
	}
	
	function assignDepartmentHead()
	{
		$headMdl = new DepartmentHeadModel();
		$deptMdl = new DepartmentModel();
		$sy_id_ref = $this->request->getPost('sy_id_ref');
		$dept_id = $this->request->getPost('dept_id_ref');

		$data = [
			'title' => $this->request->getPost('dept_head_title'),
			'dh_dept_id' => $dept_id,
			'head_id' => $this->request->getPost('head_id'),
			'sy_id' => $sy_id_ref,
			'memo_no' => $this->request->getPost('memo_no'),
		];

		$check_dh = $deptMdl
					->join('department_head_tbl', 'department_head_tbl.dh_dept_id = department_tbl.dept_id', 'left')
					->where('department_tbl.dept_id', $dept_id)
					->where('department_head_tbl.dh_dept_id !=', null)
					->where('department_head_tbl.sy_id', $sy_id_ref)
					->countAllResults();

		if($check_dh > 0){
			$result['status'] = 2;
			echo json_encode($result);
			die;
		}else{
			try{
				$res = $headMdl->insert($data);
				if ($res) {
					$result['status'] = 1;
					echo json_encode($result);
					die;
				}
			}catch (\Exception $e) {
				$result['status'] = 0;
				$result['message'] = $e->getMessage();
				// $result['message'] = $dept_id ;
				echo json_encode($result);
				die;
			}
		}



	}


	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	
	function getTeacherNoDepartment(){
		$deptMdl = new EmpDepartmentModel();		
		$data['emp'] = $deptMdl
						->join('employee_t', 'employee_t.emp_id = employee_department_tbl.emp_id', 'right')
						->where('employee_department_tbl.emp_dept_id', null)
						->where('employee_t.job_description', 2)
						->find();
		return $this->response->setJSON($data);
	}

	function addTeacherToDepartment(){
		$empMdl = new EmpDepartmentModel();	
		$dept_id = $this->request->getPost('dept_id');
		$data = [
			'emp_id' => $this->request->getPost('emp_id'),
			'dept_id' => $dept_id,
			'sy_id' => $this->request->getPost('sy_id')
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
