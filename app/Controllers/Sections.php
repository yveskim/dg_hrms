<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EmpProgramModel;
use App\Models\GradeLevelModel;
use App\Models\EnrollmentMdl;
use App\Models\SchoolYearModel;
use App\Models\SectionModel;
use App\Models\ProgramModel;
use App\Models\SectionDetailsModel;
use App\Models\StudentProgramModel;
use App\Models\StudentSectionModel;
use App\Models\ShsSectionModel;
use App\Models\ShsStudentSectionModel;



class Sections extends BaseController
{
	public function index($page = 'index')
	{

	}

	function getEachSection(){
		$secMdl = new SectionDetailsModel();		
		$sec_det_id = $this->request->getGet('sec_det_ref');
		$data['sec'] = $secMdl
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_details_tbl.grade_level_id', 'left')
						->where('section_details_tbl.sec_det_id', $sec_det_id)
						->first();
		return $this->response->setJSON($data);
	}

	function getEachSectionStrand(){
		$secMdl = new ShsSectionModel();		
		$section_id = $this->request->getGet('section_id');
		$data['sec'] = $secMdl
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')
						->where('shs_section_tbl.shs_sec_id', $section_id)
						->first();
		return $this->response->setJSON($data);
	}
	

	function getSectionStudents(){
		$secMdl = new StudentSectionModel();		
		$sec_det_id = $this->request->getGet('sec_det_id');
		$sy_id = $this->request->getGet('sy');
		$data['stud'] = $secMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = student_section_tbl.sec_id', 'left')
						->join('enrollment_tbl', 'enrollment_tbl.en_id = student_section_tbl.en_id', 'left')
						->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
						->where('student_section_tbl.sec_id', $sec_det_id)
						->where('enrollment_status_tbl.sy_id', $sy_id)
						->orderBy('enrollment_tbl.student_id')
						->find();
		return $this->response->setJSON($data);
	}

	function getSectionStudentStrand(){
		$secMdl = new ShsStudentSectionModel();		
		$section_id = $this->request->getGet('section_id');
		$sy_id = $this->request->getGet('sy_id');
		$sem_id = $this->request->getGet('sem_id');
		$data['stud'] = $secMdl
						->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_student_section_tbl.shs_sec_id', 'left')
						->join('enrollment_tbl', 'enrollment_tbl.en_id = shs_student_section_tbl.shs_stud_id', 'left')
						->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
						->where('shs_student_section_tbl.shs_sec_id', $section_id)
						->where('shs_student_section_tbl.shs_stud_sec_sy', $sy_id)
						->where('shs_student_section_tbl.shs_student_sem', $sem_id)
						->orderBy('enrollment_tbl.student_id')
						->find();
		return $this->response->setJSON($data);
	}


	function getStudentNotAssignedInSection(){
		// $enMdl = new EnrollmentMdl();	
		// $prog_id = $this->request->getGet('prog_id');
		// $grade_level = $this->request->getGet('grade_level');
		// $data['stud'] = $enMdl
		// 				->join('student_section_tbl', 'student_section_tbl.en_id = enrollment_tbl.en_id', 'left')
		// 				->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
		// 				->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
		// 				->join('student_program_tbl', 'student_program_tbl.stud_id = enrollment_tbl.en_id', 'left')
		// 				->join('program_tbl', 'program_tbl.prog_id = student_program_tbl.prog_id', 'left')
		// 				->where('student_program_tbl.prog_id', $prog_id)
		// 				->where('grade_level_tbl.grade_level', $grade_level)
		// 				->where('student_section_tbl.stud_sec_id', null)
		// 				->find();
		// return $this->response->setJSON($data);

		$progMdl = new StudentProgramModel();
		$prog_id = $this->request->getGet('prog_id');
		$grade_level = $this->request->getGet('grade_level');
		$sy_id = $this->request->getGet('sy');
		$data['stud'] = $progMdl
						->join('enrollment_tbl', 'enrollment_tbl.en_id = student_program_tbl.stud_id', 'left')
						->join('student_section_tbl', 'student_section_tbl.en_id = enrollment_tbl.en_id', 'left')
						->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
						// ->join('student_program_tbl', 'student_program_tbl.stud_id = enrollment_tbl.en_id', 'left')
						->join('program_tbl', 'program_tbl.prog_id = student_program_tbl.prog_id', 'left')
						->where('student_program_tbl.prog_id', $prog_id)
						->where('grade_level_tbl.grade_level', $grade_level)
						->where('enrollment_status_tbl.sy_id', $sy_id)
						->where('student_section_tbl.stud_sec_id', null)
						->find();
		return $this->response->setJSON($data);

	}



	
	function addStudentToSection(){
		$secMdl = new StudentSectionModel();	
		$data = [
			'en_id' => $this->request->getPost('en_id'),
			'sec_id' => $this->request->getPost('sec_det_ref'),
			'sy_id' => $this->request->getPost('sy_id'),
		];
		try{
			$res = $secMdl->insert($data);
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


	function removeFromSection(){
		$secMdl = new StudentSectionModel();
		$stud_sec_id = $this->request->getGet('stud_sec_id');
		$res = $secMdl->where('stud_sec_id', $stud_sec_id)->delete();
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

	function removeFromSectionShs(){
		$secMdl = new ShsStudentSectionModel();
		$shs_stud_sec_id = $this->request->getGet('shs_stud_sec_id');
		$res = $secMdl->where('shs_stud_sec_id', $shs_stud_sec_id)->delete();
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


	


}