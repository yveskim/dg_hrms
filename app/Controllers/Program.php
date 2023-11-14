<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmpProgramModel;
use App\Models\GradeLevelModel;
use App\Models\EnrollmentMdl;
use App\Models\SchoolYearModel;
use App\Models\AdviseryModel;
use App\Models\ProgramModel;
use App\Models\SectionDetailsModel;
use App\Models\CategoryModel;
use App\Models\EmpModel;
use App\Models\StudentProgramModel;
use App\Models\ProgramHeadModel;


class Program extends BaseController
{

	public function index($page = 'index')
	{

	}

	function getProgramDetails(){
		$progMdl = new ProgramModel();		
		$prog_id = $this->request->getGet('prog_id');
		$data['prog'] = $progMdl
						->join('category_tbl', 'category_tbl.cat_id = program_tbl.cat_id', 'left')
						->join('program_head_tbl', 'program_head_tbl.p_id = program_tbl.prog_id', 'left')
						->join('employee_t', 'employee_t.emp_id = program_head_tbl.ph_emp_id', 'left')
						->where('program_tbl.prog_id', $prog_id)
						->first();
		return $this->response->setJSON($data);
	}

	function deleteProgram(){
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

	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	
	function getProgramAdvisery(){
		$advMdl = new AdviseryModel();		
		$prog_id = $this->request->getGet('prog_id');
		$sy_id = $this->request->getGet('sy');
		$data['adv'] = $advMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_details_tbl.grade_level_id', 'left')
						->join('school_year_tbl', 'school_year_tbl.sy_id = advisery_tbl.sy_id', 'left')
						->join('program_tbl', 'program_tbl.prog_id = section_details_tbl.prog_id', 'left')
						->join('employee_t', 'employee_t.emp_id = advisery_tbl.adviser_id', 'left')
						->where('program_tbl.prog_id', $prog_id)
						->where('advisery_tbl.sy_id', $sy_id)
						->find();
		return $this->response->setJSON($data);
	}

	function getAdviseryDetails(){		
		$secDetMdl = new SectionDetailsModel();	
		$syMdl = new SchoolYearModel();
		$empProgMdl = new EmpProgramModel();
			
			
		$prog_id = $this->request->getGet('prog_id');
		$data['sec'] = $secDetMdl->where('prog_id', $prog_id)->find();
		$data['sy'] = $syMdl->findAll();
		$data['fac'] = $empProgMdl
						->join('employee_t', 'employee_t.emp_id = employee_program_tbl.emp_id', 'left')
						->where('employee_program_tbl.prog_id', $prog_id)
						->find();
		return $this->response->setJSON($data);
	}

	function deleteSection(){
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

	function addAdvisery()
	{
		$secMdl = new AdviseryModel();
		$prog_id = $this->request->getPost('prog_id');
		$adv_id = $this->request->getPost('adv_id_tag');
		$sy_id = $this->request->getPost('sy');
		$sec_det_id = $this->request->getPost('sec_det_id');
		

		$sec_det_id_exist = $secMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
						->select('advisery_tbl.sec_det_id')
						->where('advisery_tbl.sec_det_id', $sec_det_id)
						->where('section_details_tbl.prog_id', $prog_id)
						->where('advisery_tbl.sy_id', $sy_id)
						->countAllResults();
		$adv_exist = $secMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
						->select('advisery_tbl.adviser_id')
						->where('advisery_tbl.adviser_id', $adv_id)
						->where('section_details_tbl.prog_id', $prog_id)
						->where('advisery_tbl.sy_id', $sy_id)
						->countAllResults();


		if($sec_det_id_exist >	0){
			$result['status'] = 2;
			$result['message'] = "Failed";
			echo json_encode($result);
			die;
		}else if($adv_exist >	0){
			$result['status'] = 3;
			$result['message'] = "Failed";
			echo json_encode($result);
			die;
		}else{
			$data = [
				'sec_det_id' => $sec_det_id,
				'adviser_id' => $adv_id,
				'sy_id' => $sy_id
			];

			$res = $secMdl->insert($data);
			if ($res) {
				$result['status'] = 1;
				$result['message'] = "Success";
				echo json_encode($result);
				die;
			} else {
				$result['status'] = 0;
				$result['message'] = "Failed";
				echo json_encode($result);
				die;
			}
	
		}
	

	}

	function addSection()
	{
		$secDetMdl = new SectionDetailsModel();
		$prog_id = $this->request->getPost('prog_id');
		
		$data = [
			'sec_title' => $this->request->getPost('sec_title'),
			'grade_level_id' => $this->request->getPost('grade_level'),
			'prog_id' => $prog_id
		];

		
		try{
			$res = $secDetMdl->insert($data);
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
	

	function getSections(){
		$secMdl = new SectionDetailsModel();
		$prog_id = $this->request->getGet('prog_id');
		$data['sec'] = $secMdl
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_details_tbl.grade_level_id', 'left')
						->where('section_details_tbl.prog_id', $prog_id)
						->find();
		return $this->response->setJSON($data);
	}

	function getProgramTeachers(){
		$empProgMdl = new EmpProgramModel();
		$prog_id = $this->request->getGet('prog_id');
		$data['teacher'] = $empProgMdl->join('program_tbl', 'program_tbl.prog_id = employee_program_tbl.prog_id', 'left')
							->join('employee_t', 'employee_t.emp_id = employee_program_tbl.emp_id', 'left')
							->where('employee_program_tbl.prog_id', $prog_id)
							->find();
		return $this->response->setJSON($data);
	}
	

	function getStudentInProgram(){
		$progMdl = new StudentProgramModel();	
		$prog_id = $this->request->getGet('prog_id');
		$sy_id = $this->request->getGet('sy');
		$data['stud'] = $progMdl->join('enrollment_tbl', 'enrollment_tbl.en_id = student_program_tbl.stud_id', 'left')
								->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
								->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
								->where('student_program_tbl.prog_id', $prog_id)
								->where('student_program_tbl.sy_id', $sy_id)
								->find();
		return $this->response->setJSON($data);
	}

	function addStudentToProgram(){
		$progMdl = new StudentProgramModel();	
		$prog_id = $this->request->getPost('prog_id');
		$data = [
			'stud_id' => $this->request->getPost('en_id'),
			'prog_id' => $prog_id,
			'is_active' => true,
			'sy_id' => $this->request->getPost('sy_id'),
			'created_by' => $this->request->getPost('user_id')
		];
		try{
			$res = $progMdl->insert($data);
			if($res){
				$result['status'] = 1;
				echo json_encode($result);
				die;
			}
		}catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			// $result['message'] = $prog_id ;
			echo json_encode($result);
			die;
		}

	}

	function removeStudentFromProgram(){
		$progMdl = new StudentProgramModel();	
		$en_id = $this->request->getGet('en_id');
		
		try{
			$res = $progMdl->where('stud_id',$en_id)->delete();
			if($res){
				$result['status'] = 1;
				echo json_encode($result);
				die;
			}
		}catch (\Exception $e) {
			$result['status'] = 0;
			$result['message'] = $e->getMessage();
			// $result['message'] = $prog_id ;
			echo json_encode($result);
			die;
		}

	}

	
	function assignProgramHead()
	{
		$headMdl = new ProgramHeadModel();
		$progMdl = new ProgramModel();
		$sy_id_ref = $this->request->getPost('sy_id_ref');
		$prog_id = $this->request->getPost('prog_id');

		$data = [
			'p_id' => $this->request->getPost('prog_id'),
			'ph_emp_id' => $this->request->getPost('ph_emp_id'),
			'memo_no' => $this->request->getPost('memo_no'),
			'sy_id' => $this->request->getPost('sy_id')
		];

		$check_ph = $progMdl
					->join('program_head_tbl', 'program_head_tbl.p_id = program_tbl.prog_id', 'left')
					->where('program_tbl.prog_id', $prog_id)
					->where('program_head_tbl.ph_id !=', null)
					->where('program_head_tbl.sy_id', $sy_id_ref)
					->countAllResults();

		if($check_ph > 0){
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
				// $result['message'] = $prog_id ;
				echo json_encode($result);
				die;
			}
		}



	}


	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	// ADD TEACHER TO PROGRAM +++++++++++++++++++++++++++++++++++
	
	function getTeacherNoProgram(){
		$empMdl = new EmpProgramModel();		
		$data['emp'] = $empMdl
						->join('employee_t', 'employee_t.emp_id = employee_program_tbl.emp_id', 'right')
						->where('employee_program_tbl.emp_prog_id', null)
						->where('employee_t.job_description', 2)
						->find();
		return $this->response->setJSON($data);
	}

	function addTeacherToProgram(){
		$empMdl = new EmpProgramModel();	
		$prog_id = $this->request->getPost('prog_id');
		$data = [
			'emp_id' => $this->request->getPost('emp_id'),
			'prog_id' => $prog_id,
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


	
	function changeProgramLogo(){
		$progMdl = new ProgramModel();
		$prog_id = $this->request->getPost('prog_id');

		$image = $this->request->getFile('prog_logo_file');
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
			'program_logo' => $randomFileName
		];

		try{
			$result['pic'] = $progMdl->update($prog_id, $data);
			if($result){
				$result['status'] = 1;
				$result['randomFileName'] = $randomFileName;
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
