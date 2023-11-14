<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmpProgramModel;
use App\Models\GradeLevelModel;
use App\Models\EnrollmentMdl;
use App\Models\EmpModel;
use App\Models\AdviseryModel;
use App\Models\ProgramModel;
use App\Models\SectionDetailsModel;
use App\Models\CategoryModel;
use App\Models\SubjectGroupModel;
use App\Models\StudentProgramModel;
use App\Models\ProgramHeadModel;
use App\Models\FacultySgModel;



class SubjectGroup extends BaseController
{
	public function index($page = 'index')
	{

	}

	function getSg(){
		$sgMdl = new SubjectGroupModel();		
		$data['sg'] = $sgMdl
						->join('subject_group_head_tbl', 'subject_group_head_tbl.sgh_sg_id = subject_group_tbl.sg_id', 'left')
						->join('employee_t', 'employee_t.emp_id = subject_group_head_tbl.sgh_emp_id', 'left')
						->findAll();
		return $this->response->setJSON($data);
	}

	function getSgInfo(){		
		$sgMdl = new SubjectGroupModel();	
		$sg_id = $this->request->getGet('sg_id');	
		$data['sg'] = $sgMdl
						->join('subject_group_head_tbl', 'subject_group_head_tbl.sgh_sg_id = subject_group_tbl.sg_id', 'left')
						->join('employee_t', 'employee_t.emp_id = subject_group_head_tbl.sgh_emp_id', 'left')
						->where('subject_group_tbl.sg_id', $sg_id)
						->first();
		return $this->response->setJSON($data);
	}

	function getFacultySg(){		
		$fsgMdl = new FacultySgModel();	
		$data['fac'] = $fsgMdl
						->join('employee_t', 'employee_t.emp_id = faculty_subject_group_tbl.fsg_emp_id', 'right')
						->where('faculty_subject_group_tbl.fsg_emp_id', null)
						->where('employee_t.job_description', 2)
						->findAll();
		return $this->response->setJSON($data);
	}

	
	function getSgTeachers(){
		$sgMdl = new FacultySgModel();
		$sg_id = $this->request->getGet('sg_id');
		$data['teacher'] = $sgMdl
							->join('employee_t', 'employee_t.emp_id = faculty_subject_group_tbl.fsg_emp_id', 'left')
							->where('faculty_subject_group_tbl.fsg_sg_id', $sg_id)
							->find();
		return $this->response->setJSON($data);
	}



	function addTeacherToSg(){
		$sgMdl = new FacultySgModel();	
		$sg_id = $this->request->getPost('sg_id');
		$data = [
			'fsg_emp_id' => $this->request->getPost('emp_id'),
			'fsg_sg_id' => $sg_id,
			'fsg_sy_id' => $this->request->getPost('sy_id'),
			'fsg_assigned_by' => $this->request->getPost('user_id'),
		];
		try{
			$res = $sgMdl->insert($data);
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
