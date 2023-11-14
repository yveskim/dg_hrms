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
use App\Models\EmployeeCategoryModel;
use App\Models\EmpModel;
use App\Models\StrandModel;
use App\Models\ProgramHeadModel;
use App\Models\EnrollmentStatusModel;
use App\Models\StudentStrandModel;
use App\Models\ShsSectionModel;
use App\Models\ShsAdviseryModel;
use App\Models\ShsStudentSectionModel;
use App\Models\ShsSectionAdviserModel;
use App\Models\ShsSectionSubjectModel;
use App\Models\ShsSubjectModel;


class Strand extends BaseController
{
	public function index($page = 'index')
	{

	}

	function getStrandDetails(){
		$trackMdl = new StrandModel();		
		$strand_id = $this->request->getGet('strand_id');
		$data['strand'] = $trackMdl
						->where('strand_id', $strand_id)
						->first();
		return $this->response->setJSON($data);
	}

	function getEnrolledDataNoStrand(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem_id');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->join('student_strands_tbl', 'student_strands_tbl.s_strand_stud_id = enrollment_tbl.en_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('student_strands_tbl.s_strand_id =', null)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('grade_level_tbl.grade_level >', 10)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('enrollment_status_tbl.semester', $sem_id)
							  ->find();
		return $this->response->setJSON($data);
	}

	function addStudentToStrand(){
		$strMdl = new StudentStrandModel();	
		$strand_id = $this->request->getPost('strand_id');
		$sem_id = $this->request->getPost('sem_id');
		$data = [
			's_strand_id' => $strand_id,
			's_strand_stud_id' => $this->request->getPost('en_id'),
			's_is_active' => true,
			's_sy_id' => $this->request->getPost('sy_id'),
			'strand_sem_id' => $sem_id,
			'created_by' => $this->request->getPost('user_id')
		];
		try{
			$res = $strMdl->insert($data);
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

	function getStudentInStrand(){
		$strMdl = new StudentStrandModel();	
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem_id');
		$strand_id = $this->request->getGet('strand_id');
		$data['stud'] = $strMdl->join('enrollment_tbl', 'enrollment_tbl.en_id = student_strands_tbl.s_strand_stud_id', 'left')
								->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
								->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
								->where('student_strands_tbl.s_strand_id', $strand_id)
								->where('enrollment_status_tbl.sy_id', $sy_id)
								->where('student_strands_tbl.strand_sem_id', $sem_id)
								->find();
		return $this->response->setJSON($data);
	}

	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	function getAdviseryDetails(){		
		$secDetMdl = new SectionDetailsModel();	
		$syMdl = new SchoolYearModel();
		$empProgMdl = new EmpProgramModel();
			
			
		$prog_id = $this->request->getGet('prog_id');
		$data['sec'] = $secDetMdl->where('prog_id', $prog_id)->findAll();
		$data['sy'] = $syMdl->where('is_active', true)->findAll();
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

	function setAdviseryShs()
	{
		$advMdl = new ShsSectionAdviserModel();
		$strand_id = $this->request->getPost('strand_id');
		$adv_id = $this->request->getPost('adv_id_tag');
		$co_adv = $this->request->getPost('co_adv');
		if($co_adv == "" || empty($co_adv)){
			$co_adv = null;
		}
		$sy_id = $this->request->getPost('sy_ref');
		$sem_id = $this->request->getPost('sem_id');
		$shs_sec_id = $this->request->getPost('shs_section');

		$section_exist = $advMdl
				->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')
				->select('shs_section_adviser_tbl.shs_adv_section_id')
				->where('shs_section_adviser_tbl.shs_adv_section_id', $shs_sec_id)
				->where('shs_section_tbl.strand_id', $strand_id)
				->where('shs_section_adviser_tbl.shs_adv_sy', $sy_id)
				->where('shs_section_adviser_tbl.shs_adv_semester', $sem_id)
				->countAllResults();

		$adv_exist = $advMdl
						->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')
						->select('shs_section_adviser_tbl.shs_adv_emp_id')
						->where('shs_section_adviser_tbl.shs_adv_emp_id', $adv_id)
						->where('shs_section_tbl.strand_id', $strand_id)
						->where('shs_section_adviser_tbl.shs_adv_sy', $sy_id)
						->where('shs_section_adviser_tbl.shs_adv_semester', $sem_id)
						->where('shs_section_adviser_tbl.shs_adv_section_id !=', null)
						->orWhere('shs_section_adviser_tbl.shs_co_adviser_id', $adv_id)
						->countAllResults();

		$co_adv_exist = $advMdl
						->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')
						->select('shs_section_adviser_tbl.shs_co_adviser_id')
						->where('shs_section_adviser_tbl.shs_co_adviser_id', $co_adv)
						->where('shs_section_tbl.strand_id', $strand_id)
						->where('shs_section_adviser_tbl.shs_adv_sy', $sy_id)
						->where('shs_section_adviser_tbl.shs_adv_semester', $sem_id)
						->where('shs_section_adviser_tbl.shs_co_adviser_id !=', null)
						->orWhere('shs_section_adviser_tbl.shs_adv_emp_id', $co_adv)
						->countAllResults();
	
		if($section_exist > 0){
			$result['status'] = 3;
			$result['message'] = "Section Already Exist.";
			echo json_encode($result);
			die;
		}else if($adv_exist > 0 || $co_adv_exist > 0){
			$result['status'] = 2;
			$result['message'] = "Adviser or Co-adviser Already Exist.";
			echo json_encode($result);
			die;
		}else{
			$data = [
				'shs_adv_emp_id' => $adv_id,
				'shs_co_adviser_id' => $co_adv,
				'shs_adv_section_id' => $shs_sec_id,
				'shs_adv_sy' => $sy_id,
				'shs_adv_semester' => $sem_id,
			];

			try{
				$res = $advMdl->insert($data);
				if ($res) {
					$result['status'] = 1;
					$result['message'] = "Success";
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

	function addSectionStrand()
	{
		$secMdl = new ShsSectionModel();
		$strand_id = $this->request->getPost('strand_id');
		
		$data = [
			'shs_sec_title' => $this->request->getPost('sec_title'),
			'shs_sec_description' => $this->request->getPost('sec_description'),
			'shs_grade_level' => $this->request->getPost('grade_level'),
			'strand_id' => $strand_id
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
	

	function getStrandSections(){
		$secMdl = new ShsSectionModel();
		$strand_id = $this->request->getGet('strand_id');
		$data['sec'] = $secMdl
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')
						->where('strand_id', $strand_id)
						->find();
		return $this->response->setJSON($data);
	}


	function removeStudentFromStrand(){
		$strandMdl = new StudentStrandModel();	
		$en_id = $this->request->getGet('en_id');
		
		try{
			$res = $strandMdl->where('s_strand_stud_id',$en_id)->delete();
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



	function getShsSectionModels(){
		$secMdl = new ShsSectionModel();		
		$strand_id = $this->request->getGet('strand_id');
		$data['sec'] = $secMdl
						// ->join('strands_tbl', 'strands_tbl.strand_id = strand_section_tbl.strand_id', 'left')
						// ->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = strand_section_tbl.section_id', 'left')
						// ->where('strand_section_tbl.strand_id', $strand_id)
						->find();
		return $this->response->setJSON($data);
	}

	

	function getStrandAdvisery(){
		$advMdl = new ShsSectionAdviserModel();		
		$strand_id = $this->request->getGet('strand_id');
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem_id');

		$data['adv'] = $advMdl
						->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')
						->join('semester_tbl', 'semester_tbl.sem_id = shs_section_adviser_tbl.shs_adv_semester', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')
						->join('school_year_tbl', 'school_year_tbl.sy_id = shs_section_adviser_tbl.shs_adv_sy', 'left')
						->join('employee_t e_adv', 'e_adv.emp_id = shs_section_adviser_tbl.shs_adv_emp_id', 'left')
						->join('employee_t e_co_adv', 'e_co_adv.emp_id = shs_section_adviser_tbl.shs_co_adviser_id', 'left')
						->select('semester_tbl.*')
						->select('e_adv.emp_fname ad_fname, e_adv.emp_mname ad_mname, e_adv.emp_lname ad_lname')
						->select('e_co_adv.emp_fname co_ad_fname, e_co_adv.emp_mname co_ad_mname, e_co_adv.emp_lname co_ad_lname')
						->select('shs_section_tbl.*, grade_level_tbl.*, school_year_tbl.*, shs_section_adviser_tbl.*')
						->where('shs_section_tbl.strand_id', $strand_id)
						->where('shs_section_adviser_tbl.shs_adv_sy', $sy_id)
						->where('shs_section_adviser_tbl.shs_adv_semester', $sem_id)
						->find();
		return $this->response->setJSON($data);

	}

	function getStudentInStrandNoSection(){
		$strandMdl = new StudentStrandModel();	
		$strand_id = $this->request->getGet('strand_id');
		$grade_level = $this->request->getGet('grade_level');
		$sy_id = $this->request->getGet('sy_id');
		$sem_id = $this->request->getGet('sem_id');
		$data['stud'] = $strandMdl
						->join('enrollment_tbl', 'enrollment_tbl.en_id = student_strands_tbl.s_strand_stud_id', 'left')
						->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
						->join('shs_student_section_tbl', 'shs_student_section_tbl.shs_stud_id = enrollment_tbl.en_id', 'left')
						->where('student_strands_tbl.s_strand_id', $strand_id)
						->where('grade_level_tbl.grade_level', $grade_level)
						->where('shs_student_section_tbl.shs_stud_sec_id', null)
						->where('student_strands_tbl.s_sy_id', $sy_id)
						->where('student_strands_tbl.strand_sem_id', $sem_id)
						->find();
		return $this->response->setJSON($data);
	}


	

	function addStudentToStrandSection(){
		$secMdl = new ShsStudentSectionModel();	
		$sec_id = $this->request->getPost('sec_id_ref');
		$sem_id = $this->request->getPost('sem_id');
		$data = [
			'shs_stud_id' => $this->request->getPost('en_id'),
			'shs_sec_id' => $sec_id,
			'shs_stud_sec_sy' => $this->request->getPost('sy_id'),
			'shs_student_sem' => $sem_id,
			'shs_assigned_by' => $this->request->getPost('user')
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


	function getStrandAdviseryDetails(){		
		$secMdl = new ShsSectionModel();	
		$catMdl = new EmployeeCategoryModel();

		$strand_id = $this->request->getGet('strand_id');
		$sy_id = $this->request->getGet('sy_id');
		$sem_id = $this->request->getGet('sem_id');

		$data['sec'] = $secMdl
					->join('shs_section_adviser_tbl', 'shs_section_adviser_tbl.shs_adv_section_id = shs_section_tbl.shs_sec_id', 'left')
					->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')
					// ->where('shs_section_adviser_tbl.shs_adv_section_id', null)
					->where('strand_id', $strand_id)
					->orderBy('grade_level_tbl.grade_level', 'ASC')
					->find();

		$data['fac'] = $catMdl
					->join('employee_t', 'employee_t.emp_id = employee_category_tbl.emp_id', 'left')
					->join('shs_section_adviser_tbl', 'shs_section_adviser_tbl.shs_adv_emp_id = employee_t.emp_id', 'left')
					->join('shs_section_adviser_tbl co_adv_tbl', 'co_adv_tbl.shs_co_adviser_id = employee_t.emp_id', 'left')
					// ->where('shs_section_adviser_tbl.shs_adv_emp_id', null)
					// ->where('co_adv_tbl.shs_co_adviser_id', null)
					->where('employee_category_tbl.cat_id', 2)
					->where('employee_t.job_description', 2)
					// ->where('shs_section_adviser_tbl.shs_adv_sy', $sy_id)
					// ->where('shs_section_adviser_tbl.shs_adv_semester', $sem_id)
					->find();
		return $this->response->setJSON($data);
	}


	function getSectionSubjects(){
		$subMdl = new ShsSectionSubjectModel();
		$sec_id = $this->request->getGet('sec_id');
		$sy_id = $this->request->getGet('sy_id');
		$sem_id = $this->request->getGet('sem_id');
		$data['sub'] = $subMdl
						->join('shs_subject_tbl', 'shs_subject_tbl.shs_sub_id = shs_section_subject_tbl.subject_id', 'left')
						->join('school_year_tbl', 'school_year_tbl.sy_id = shs_section_subject_tbl.sub_sy', 'left')
						->join('semester_tbl', 'semester_tbl.sem_id = shs_section_subject_tbl.sub_sem', 'left')
						->where('shs_section_subject_tbl.section_id', $sec_id)
						->where('shs_section_subject_tbl.sub_sy', $sy_id)
						->where('shs_section_subject_tbl.sub_sem', $sem_id)
						->find();
		return $this->response->setJSON($data);
	}

	function getShsSubjects(){
		$subMdl = new ShsSubjectModel();
		$category = $this->request->getGet('category');
		$specialized = $this->request->getGet('specialized');
		$semester = $this->request->getGet('semester');
		$grade_level = $this->request->getGet('grade_level');

		$data['sub'] = $subMdl
						->where('subject_category', $category)
						->where('subject_specialized', $specialized)
						->where('subject_semester', $semester)
						->where('subject_grade_level', $grade_level)
						->find();
		return $this->response->setJSON($data);

		
	}

	function addSubjectToSection(){
		$subMdl = new ShsSectionSubjectModel();	
		$sec_id = $this->request->getPost('sec_id_ref');
		$sem_id = $this->request->getPost('sem_id');
		$sy_id = $this->request->getPost('sy_id');
		$subject_id = $this->request->getPost('subject_id');

		$checkSub = $subMdl
					->where("subject_id", $subject_id)
					->where("section_id", $sec_id)
					->countAllResults();

		if($checkSub > 0){
			$result['status'] = 0;
			$result['message'] = 'subject already exist.';
			echo json_encode($result);
			die;
		}else{
			$data = [
				'section_id' => $sec_id,
				'subject_id' => $subject_id,
				'sub_sy' => $sy_id,
				'sub_sem' => $sem_id,
			];
			try{
				$res = $subMdl->insert($data);
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


}
