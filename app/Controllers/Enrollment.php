<?php

namespace App\Controllers;

use App\Models\AdviseryModel;
use App\Models\EmpModel;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\EnrollmentStatusModel;
use App\Models\StudentAccountModel;
use App\Models\EnrollmentMdl;
use App\Models\SchoolYearModel;
use App\Models\AverageModel;
use App\Models\GradeLevelModel;
use App\Models\ShsStudentSectionModel;
use App\Models\StudentProgramModel;
use App\Models\StudentSectionModel;
use App\Models\StudentStrandModel;

class Enrollment extends BaseController
{
	public function index($page = 'index')
	{
		if (!is_file(APPPATH . '/Views/f_application/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

	}

	function getSchoolYear(){
		$syModel = new SchoolYearModel();	
		$data['sy'] = $syModel->findAll();
		return $this->response->setJSON($data);
	}

	function encodeStudent(){
		$enModel = new EnrollmentMdl();	
		$sAccountModel = new StudentAccountModel();	

		$sy_id = $this->request->getPost('sy_id');
		$student_id = $this->request->getPost('student_id'); 
		$lrn = $this->request->getPost('lrn'); 
		$firstname = $this->request->getPost('first_name'); 
		$middlename = $this->request->getPost('middle_name'); 
		$lastname = $this->request->getPost('last_name'); 
		// $ext = $this->request->getPost('ext'); 
		$sex = $this->request->getPost('sex'); 
		$birthdate = $this->request->getPost('birthdate'); 
		$birth_place = $this->request->getPost('birth_place'); 
		$psa_birth_no = $this->request->getPost('psa_birth_no'); 
		$citizenship = $this->request->getPost('citizenship'); 
		$religion = $this->request->getPost('religion'); 
		$mother_tongue = $this->request->getPost('mother_tongue'); 
		$blood_type = $this->request->getPost('blood_type'); 
		$height = $this->request->getPost('height'); 
		$weight = $this->request->getPost('weight'); 
		$cell_no = $this->request->getPost('cell_no'); 
		$telephone = $this->request->getPost('tel_no'); 
		$email = $this->request->getPost('email'); 
		$facebook = $this->request->getPost('facebook');
		$with_special_need = $this->request->getPost('with_special_need');
		$special_need = $this->request->getPost('special_need');
		$created_by = $this->request->getPost('user_id');
		
		
		$student_pic = null;
		$year = date("Y");
		$year = substr( $year, -2);
		$count = 1;
		$count = str_pad($count,5,"0",STR_PAD_LEFT); // 00001
		$student_id = $year."-".$count;
		$get_id = $enModel->orderBy('student_id', 'DESC')->select('student_id')->limit(1)->first();
		if($get_id > 0){
			foreach($get_id as $id){
				$student_id = $id;
			}
			$id_year = substr( $student_id, 0, 2);
			$get_number = str_replace($id_year.'-', "", $student_id);
			$id_plus_one = $get_number + 1;
			$id_plus_one = str_pad($id_plus_one,5,"0",STR_PAD_LEFT); // 0001
			$student_id = $id_year."-".$id_plus_one;
			

			$image = $this->request->getFile('student_pic');
			// $customName = $this->request->getPost('profile_image');
			$imageName = $image->getName();
			$imageSize = $image->getSize();
			$randomFileName = $image->getRandomName();
			$imageExtension = $image->getExtension();

			if (!empty($imageName)) {
				if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
					$image->move('upload/student_files/student_images/', $randomFileName); // move the image to upload folder
				}

				$student_pic = $randomFileName;
			}
			
			if($lrn === ""){
				$lrn = null;
			}
	
			$data = [
				'student_id' => $student_id,
				'student_lrn' => $lrn,
				'first_name' => $firstname,
				'middle_name' => $middlename,
				'last_name' => $lastname,
				'sex' => $sex,
				'birthdate' => $birthdate,
				'birth_place' => $birth_place,
				'psa_birth_certificate_no' => $psa_birth_no,
				'citizenship' => $citizenship,
				'religion' => $religion,
				'mother_tongue' => $mother_tongue,
				'blood_type' => $blood_type,
				'height' => $height,
				'weight' => $weight,
				'phone_no' => $cell_no,
				'tel_no' => $telephone,
				'email_address' => $email,
				'facebook_name' => $facebook,
				'student_image' => $student_pic,
				'with_special_need' => $with_special_need,
				'special_need' => $special_need,
				'created_by' => $created_by,
				'en_sy' => $sy_id,
			];
			try {
				$res = $enModel->insert($data);
				// $res;
				if($res){
					$en_id = $enModel->getInsertID(); //default function to get the id of last inserted data
					$account_data = [
						'user_name' => $student_id, 
						'password' => 'iloilonhs',
						'is_new' => 1,
						'type' => 'student',
						'is_dissabled' => false,
						'en_id' => $en_id
					];
					try{
						$account = $sAccountModel->save($account_data);
						if($account){
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
			} catch (\Exception $e) {
				$result['status'] = 0;
				$result['message'] = $e->getMessage();
				echo json_encode($result);
				die;
			}
	
		}else{


			$image = $this->request->getFile('student_pic');
			// $customName = $this->request->getPost('profile_image');
			$imageName = $image->getName();
			$imageSize = $image->getSize();
			$randomFileName = $image->getRandomName();
			$imageExtension = $image->getExtension();

			if (!empty($imageName)) {
				if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
					$image->move('upload/student_files/student_images/', $randomFileName); // move the image to upload folder
				}

				$student_pic = $randomFileName;
			}
			if($lrn === ""){
				$lrn = null;
			}

			$data = [
				'student_id' => $student_id,
				'student_lrn' => $lrn,
				'first_name' => $firstname,
				'middle_name' => $middlename,
				'last_name' => $lastname,
				'sex' => $sex,
				'birthdate' => $birthdate,
				'birth_place' => $birth_place,
				'psa_birth_certificate_no' => $psa_birth_no,
				'citizenship' => $citizenship,
				'religion' => $religion,
				'mother_tongue' => $mother_tongue,
				'blood_type' => $blood_type,
				'height' => $height,
				'weight' => $weight,
				'phone_no' => $cell_no,
				'tel_no' => $telephone,
				'email_address' => $email,
				'facebook_name' => $facebook,
				'student_image' => $student_pic,
				'with_special_need' => $with_special_need,
				'special_need' => $special_need,
				'created_by' => $created_by,
				'en_sy' => $sy_id,
			];
			try {
				$res = $enModel->insert($data); 
				if($res){
					$en_id = $enModel->getInsertID(); //default function to get the id of last inserted data
					$account_data = [
						'user_name' => $student_id, 
						'password' => 'iloilonhs',
						'is_new' => 1,
						'type' => 'student',
						'en_id' => $en_id

					];
					try{
						$account = $sAccountModel->save($account_data);
						if($account){
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
			} catch (\Exception $e) {
				$result['status'] = 0;
				echo json_encode($result);
				die;
			}
		}
	}

	function getEnrolledData(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('semester_tbl', 'semester_tbl.sem_id = enrollment_status_tbl.semester', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('semester_tbl.sem_id', $sem_id)
							  ->orWhere('semester_tbl.sem_id', null)
							  ->orderBy('enrollment_status_tbl.en_stat_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}
	
	function getEnrolledJhsData(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('grade_level_tbl.grade_level_id <', 5)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->orderBy('enrollment_status_tbl.en_stat_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}

	function getEnrolledShsData(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('semester_tbl', 'semester_tbl.sem_id = enrollment_status_tbl.semester', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('grade_level_tbl.grade_level_id >', 4)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('semester_tbl.sem_id', $sem_id)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->orderBy('enrollment_status_tbl.en_stat_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}

	function getEnrolledByUser(){
		$enModel = new EnrollmentStatusModel();
		$sy_id = $this->request->getGet('sy');
		$sem_id = $this->request->getGet('sem');	
		$user = $this->request->getGet('user');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('semester_tbl', 'semester_tbl.sem_id = enrollment_status_tbl.semester', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('enrollment_status_tbl.enrolled_by', $user)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('enrollment_status_tbl.semester', $sem_id)
							  ->orWhere('semester_tbl.sem_id', null)
							  ->orderBy('enrollment_status_tbl.en_stat_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}

	function getEnrolledDataNoProgram(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy_id');
		$data['en'] = $enModel->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'left')
							  ->join('semester_tbl', 'semester_tbl.sem_id = enrollment_status_tbl.semester', 'left')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
							  ->join('users', 'users.user_id = enrollment_status_tbl.enrolled_by', 'left')
							  ->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
							  ->join('student_program_tbl', 'student_program_tbl.stud_id = enrollment_tbl.en_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id !=', null)
							  ->where('student_program_tbl.stud_prog_id =', null)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_status_tbl.sy_id', $sy_id)
							  ->where('grade_level_tbl.grade_level_id <', 5)
							  ->find();
		return $this->response->setJSON($data);
	}



	function enrollStudent(){
		$enModel = new EnrollmentStatusModel();	
		$studAccModel = new StudentAccountModel();	
		$sf9 = $this->request->getPost('sf9');
		$coc = $this->request->getPost('coc');
		$psa = $this->request->getPost('psa');
		$en_id = $this->request->getPost('en_id');

		$sem = $this->request->getPost('sem_id');
		$grade_level = $this->request->getPost('grade_level');

		if($grade_level <= 4){
			$sem = null;
		}

		// -------------------------
		if(is_null($sf9)){
			$sf9 = 0;
		}
		if(is_null($coc)){
			$coc = 0;
		}
		if(is_null($psa)){
			$psa = 0;
		}

		$data = [
			'en_id' => $en_id,
			'sy_id' => $this->request->getPost('sy_id'),
			'submitted_sf9' => $sf9,
			'submitted_coc' => $coc,
			'submitted_psa' => $psa,
			'enrollment_status' => $this->request->getPost('en_status'),
			'is_als' => $this->request->getPost('is_als'),
			'is_pssn' => $this->request->getPost('is_pssn'),
			'remarks' => $this->request->getPost('remarks'),
			'grade_level_id' => $this->request->getPost('grade_level'),
			'semester' => $sem,
			'enrolled_by' => $this->request->getPost('user_id'),
		];
		
		try{
			$res = $enModel->save($data);
			if($res){
				$studAccModel->set('is_dissabled', true)->where('en_id', $en_id)->update();
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
	
	function getStudentData(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$data['en'] = $enModel
							  ->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'right')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id =', null)
							  ->where('enrollment_tbl.en_sy', $sy_id)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->orderBy('enrollment_tbl.student_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}

		
	function getStudentDataByUser(){
		$enModel = new EnrollmentStatusModel();	
		$sy_id = $this->request->getGet('sy');
		$user_id = $this->request->getGet('user_id');
		$data['en'] = $enModel
							  ->join('enrollment_tbl', 'enrollment_tbl.en_id = enrollment_status_tbl.en_id', 'right')
							  ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
							  ->where('enrollment_status_tbl.en_stat_id =', null)
							  ->where('enrollment_tbl.deleted_at', null)
							  ->where('enrollment_tbl.en_sy', $sy_id)
							  ->where('enrollment_tbl.created_by', $user_id)
							  ->orderBy('enrollment_tbl.student_id','DESC')
							  ->find();
		return $this->response->setJSON($data);
	}
	

	
	function getSearchData(){
		$enModel = new EnrollmentMdl();	
		$en_id = $this->request->getGet('en_id');
		$data['stud'] = $enModel->where('en_id', $en_id)->first();
		return $this->response->setJSON($data);
	}

	function deleteEnrollee(){
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
	

	function searchStudentId(){
		$enModel = new EnrollmentMdl();	
		$search = $this->request->getGet('search');
		$data['res'] = $enModel->like('student_id', $search)->limit(5)->find();
		return $this->response->setJSON($data);
	}

	function searchStudentName(){
		$enModel = new EnrollmentMdl();	
		$search = $this->request->getGet('search');
		$data['res'] = $enModel->like('last_name', $search)
					  ->orLike('first_name', $search)->limit(5)->find();
		return $this->response->setJSON($data);
	}


	function loadEnrolleeInfo(){
		$progMdl = new StudentProgramModel();	
		$statMdl = new EnrollmentStatusModel();	
		$secMdl = new StudentSectionModel();	
		$shsSecModel = new ShsStudentSectionModel();	
		$strandMdl = new StudentStrandModel();	

		$en_id = $this->request->getGet('en_id');
		$data['prog'] = $progMdl
						->join('program_tbl', 'program_tbl.prog_id = student_program_tbl.prog_id', 'left')
						->where('student_program_tbl.stud_id', $en_id)
						->first();

		$data['strand'] = $strandMdl
						->join('strands_tbl', 'strands_tbl.strand_id = student_strands_tbl.s_strand_id', 'left')
						->join('track_tbl', 'track_tbl.track_id = strands_tbl.s_track_id', 'left')
						->where('student_strands_tbl.s_strand_stud_id', $en_id)
						->first();

		$data['sec'] = $secMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = student_section_tbl.sec_id', 'left')
						->where('student_section_tbl.en_id', $en_id)
						->first();

		$data['adviser'] = $secMdl
						->join('section_details_tbl', 'section_details_tbl.sec_det_id = student_section_tbl.sec_id', 'left')
						->join('advisery_tbl', 'advisery_tbl.sec_det_id = section_details_tbl.sec_det_id', 'left')
						->join('employee_t', 'employee_t.emp_id = advisery_tbl.adviser_id', 'left')
						->select('employee_t.*')
						->where('student_section_tbl.en_id', $en_id)
						->first();
						
		$data['shsSec'] = $shsSecModel
						->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_student_section_tbl.shs_sec_id', 'left')
						->where('shs_student_section_tbl.shs_stud_id', $en_id)
						->first();
		
		$data['stat'] = $statMdl
						->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
						->where('enrollment_status_tbl.en_id', $en_id)
						->first();


		return $this->response->setJSON($data);
	}
	
	
	function loadEnrolleeProfile(){
		$enModel = new EnrollmentMdl();	
		$en_id = $this->request->getGet('en_id');
		$data['stud'] = $enModel->where('en_id', $en_id)->first();
		return $this->response->setJSON($data);
	}
	

	function unenrollStudent(){
		$statMdl = new EnrollmentStatusModel();
		$en_stat_id = $this->request->getGet('en_stat_id');
		try{
			$res = $statMdl->where('en_stat_id', $en_stat_id)->delete();
			if($res){
				$result['status'] = 1;
				// $result['message'] = $en_id;
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


	function getAverageRecord(){
		$aveMdl = new AverageModel();	
		$en_id = $this->request->getGet('en_id');
		$data['ave'] = $aveMdl->where('ave_stud_id', $en_id)->find();
		return $this->response->setJSON($data);
	}




	function setAverageRecord(){
		$aveMdl = new AverageModel();	
		$stud_id = $this->request->getPost('en_id');
		$update_status = $this->request->getPost('update_status');
		$grade_update_id = $this->request->getPost('grade_update_id');


		$data = [
			'ave_stud_id' => $stud_id,
			'ave_grade_level' => $this->request->getPost('grade_level'),
			'ave_semester' => $this->request->getPost('semester'),
			'ave_sy' => $this->request->getPost('school_year'),
			'average' => $this->request->getPost('stud_average'),
		];


		if($update_status == 0){
		
			try{
				$res = $aveMdl->save($data);
				if($res){
					$result['status'] = 1;
					$result['message'] = "Save Successfull";
					echo json_encode($result);
					die;
				}
			}catch (\Exception $e) {
				$result['status'] = 0;
				$result['message'] = $e->getMessage();
				echo json_encode($result);
				die;
			}
	
		}else{
			try{
				$res = $aveMdl->set($data)->where('ave_id', $grade_update_id)->update();
				if($res){
					$result['status'] = 1;
					$result['message'] = "Update Successfull";
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


	function getStudentGrade(){
		$aveMdl = new AverageModel();	
		$ave_id = $this->request->getGet('ave_id');
		$data['ave'] = $aveMdl->where('ave_id', $ave_id)->first();
		return $this->response->setJSON($data);
	}

	
	function deleteGrade(){
		$aveMdl = new AverageModel();
		$ave_id = $this->request->getGet('ave_id');
		$res = $aveMdl->where('ave_id', $ave_id)->delete();
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















	// PDF GENERATE RF

	function generateEF(){
		$mpdf = new \Mpdf\Mpdf();
		$enModel = new EnrollmentMdl();
		$usrMdl = new UsersModel();
		// $statModel = new EnrollmentStatusModel();

		// date_default_timezone_set('Asia/Manila');
		$print_date = date("F j, Y");  

		$en_id =  $this->request->getGet('en_id');

		$res = $enModel
				->join('enrollment_status_tbl', 'enrollment_status_tbl.en_id = enrollment_tbl.en_id', 'left')
				->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_status_tbl.sy_id', 'left')
				->join('semester_tbl', 'semester_tbl.sem_id = enrollment_status_tbl.semester', 'left')
				->join('employee_t', 'employee_t.emp_id = enrollment_status_tbl.enrolled_by', 'left')
				->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = enrollment_status_tbl.grade_level_id', 'left')
				->join('student_program_tbl', 'student_program_tbl.stud_id = enrollment_tbl.en_id', 'left')
				->join('program_tbl', 'program_tbl.prog_id = student_program_tbl.prog_id', 'left')
				->join('student_strands_tbl', 'student_strands_tbl.s_strand_stud_id = enrollment_tbl.en_id', 'left')
				->join('strands_tbl', 'strands_tbl.strand_id = student_strands_tbl.s_strand_id', 'left')
				->join('track_tbl', 'track_tbl.track_id = strands_tbl.s_track_id', 'left')
				->where('enrollment_tbl.en_id', $en_id)->first();

		$address = $enModel->join('student_address_tbl', 'student_address_tbl.en_id = enrollment_tbl.en_id', 'left')->where('enrollment_tbl.en_id', $en_id)
					->where('address_type', 'Permanent/Current')->first();

		$parents = $enModel->join('student_parents_tbl', 'student_parents_tbl.stud_id = enrollment_tbl.en_id', 'left')
					->where('enrollment_tbl.en_id', $en_id)	
					->first();

		$user_id = $res['enrolled_by'];

		$enrolledBy = $usrMdl
						->join('employee_t', 'employee_t.emp_id = users.emp_id', 'left')
						->where('users.user_id', $user_id)
						->select('employee_t.*')
						->first();			

		$mpdfConfig = array(
					'mode' => 'utf-8', 
					'format' => 'A5',
					'default_font_size' => 9,
					'default_font' => 'system-ui',
					'margin_header' => 6,     // 30mm not pixel
					'margin_footer' => 6,     // 10mm
					'margin_left' => 5,     // 10mm
					'margin_right' => 5,     // 10mm
					'margin_top' => 10,     // 10mm
					'margin_bottom' => 5,     // 10mm
					'orientation' => 'L'    
				);
		$mpdf = new \Mpdf\Mpdf($mpdfConfig);

		$mpdf->SetHeader('Print Date: '.$print_date.'|<p style="font-size: 1.3rem;">Iloilo National High School</p>|{PAGENO}');

		 $inhslogo = 'upload/system_file/logo.png';
		 if($res['student_image'] == null){
			 $student_image = 'upload/system_file/noimage.png';
		 }else{

			 $student_image = 'upload/student_files/student_images/'.$res['student_image'];
		 }
		 $date = new \DateTime($res['birthdate']);
		 $birthdate = $date->format("m/d/Y");
		$css = '<style>
			.span-content{ text-decoration: underline; font-weight:bold;}
			.important-text{ font-size: .9rem; }
			.img-container{ position: absolute; width: 11rem; height: 10rem; border: .2rem solid black; left: 50rem;}
			.stud_image{ width: 11rem; height: 10rem; object-fit: cover; }
			.col6 {width:50%;float:left;}
			.col12 {width:100%;float:left;}
			.en_status{ text-align: center;}
			.footer{ text-align: right; }
			.stud_copy{ text-align: center; }

			.col4 {width:33.3%;float:left;}
			.admin_name {width:30%;float:left; font-size: .9rem;}
			.chair {width:32%;float:left; font-size: .9rem;}
			
			.student_name{
				width:33%;float:left;
				font-size: .9rem;
			}
		</style>';

		// $qrcode = '<barcode code="'.$lrn.'" type="QR" class="barcode" size="0.8" error="M" disableborder="1">';
		// $mpdf->WriteFixedPosHTML($qrcode , 175, 45, 50, 90, 'auto');
		$mpdf->WriteHTML($css);
		
		$mpdf->WriteHTML('<div style="padding: 1%; text-align: center; font-size: 2rem;"><strong>ENROLLMENT FORM</strong></div>');

		$stud_image = '
			<div class="img-container">
				<img src="'.$student_image.'" alt="" class="stud_image">
			</div>
			';
		$mpdf->WriteHTML($stud_image);

		// $mpdf->WriteHTML('School Year: '.str_repeat('&nbsp;', 8).'<u>'.$res['school_year'].'</u>'.str_repeat('&nbsp;', 25).'Sem: '.'<u>'. $res['sem_title'].'</u>');

		$sySem = '
				<div class="col12">
					<div class="col6">  
					School Year: '.str_repeat('&nbsp;', 8).'<u>'.$res['school_year'].'</u>
					</div>
					<div class="col6">
						Semester: <u>'.$res['sem_title'].'</u>
					</div>
				</div>
			';
		$mpdf->WriteHTML($sySem);


		$mpdf->WriteHTML('LRN: '.str_repeat('&nbsp;', 20).'<u>'.$res['student_lrn'].'</u>');
		$mpdf->WriteHTML('Student Name: '.str_repeat('&nbsp;', 4).'<u>'.strtoupper($res['last_name']).'</u>'.', '.'<u>'.strtoupper($res['first_name']).'</u>'.' '.'<u>'.strtoupper($res['middle_name'].'</u>'));
		// $mpdf->WriteHTML('<br>');
		$mpdf->WriteHTML('Level: '.str_repeat('&nbsp;', 18).'<u>'.'Grade '.$res['grade_level'].'</u>');
		if($res['grade_level'] > 10){
			$mpdf->WriteHTML('Track: '.str_repeat('&nbsp;', 18).'<u>'.$res['track_title'].'</u>');
			$mpdf->WriteHTML('Strand: '.str_repeat('&nbsp;', 16).'<u>'.$res['strand_title'].'</u>');
		}else{
			$mpdf->WriteHTML('Program: '.str_repeat('&nbsp;', 13).'<u>'.$res['program_title'].'</u>');
		}
		
		$date = $birthdate;
		$date = date('F d Y', strtotime($date));

		// $mpdf->WriteHTML('Date of Birth: '.str_repeat('&nbsp;', 6).'<u>'.$date.'</u>'.str_repeat('&nbsp;', 25).'Gender: '.'<u>'.$res['sex'].'</u>');

		$birthdayGender = '
								<div class="col12">
									<div class="col6">  
									 Date of Birth: '.str_repeat('&nbsp;', 6).'<u>'.$date.'</u>
									</div>
									<div class="col6">
										Gender: <u>'.$res['sex'].'</u>
									</div>
								</div>
							';
		$mpdf->WriteHTML($birthdayGender);
		if($address == null){
			$mpdf->WriteHTML('Address: '.str_repeat('&nbsp;', 13).'<u>'.'Not Available' .'</u>');
		}else{
			
			$blokLot = $address['blok_lot_phase_bldg'].', ';
			$street = $address['street'].', ';
			$subdivision = $address['subdivision_village'].', ';
			$barangay = $address['barangay'].', ';
			$municipality = $address['municipality_city'].', ';
			$province = $address['province'].', '; 
			$region = $address['region'].', ';
			$zipcode = $address['zip_code'];

			if($address['blok_lot_phase_bldg'] == null || $address['blok_lot_phase_bldg'] == ""){
				$blokLot = "";
			}

			if($address['street'] == null || $address['street'] == ""){
				$street = "";
			}

			if($address['subdivision_village'] == null || $address['subdivision_village'] == ""){
				$subdivision = "";
			}

			if($address['barangay'] == null || $address['barangay'] == ""){
				$barangay = "";
			}

			if($address['municipality_city'] == null || $address['municipality_city'] == ""){
				$municipality = "";
			}

			if($address['province'] == null || $address['province'] == ""){
				$province = "";
			}

			if($address['region'] == null || $address['region'] == ""){
				$region = "";
			}

			if($address['zip_code'] == null || $address['zip_code'] == ""){
				$zipcode = "";
			}
			$mpdf->WriteHTML('Address: '.str_repeat('&nbsp;', 14).'<u>'.$blokLot.$street.$subdivision.$barangay.$municipality.$province.$region.$zipcode.'</u>');
		}
		
		$father = '<u>'.strtoupper($parents['f_lname']).', '.strtoupper($parents['f_fname']).' '.strtoupper($parents['f_mname']).'</u>';
		$mother = '<u>'.strtoupper($parents['m_lname']).', '.strtoupper($parents['m_fname']).' '.strtoupper($parents['m_mname']).'</u>';
		$guardian = '<u>'.strtoupper($parents['g_lname']).', '.strtoupper($parents['g_fname']).' '.strtoupper($parents['g_mname']).'</u>';

		if($parents['f_lname'] == null){
			$father = "<u>not available</u>";
		}
		if($parents['m_lname'] == null){
			$mother = "<u>not available</u>";
		}
		if($parents['g_lname'] == null){
			$guardian = "<u>not available</u>";
		}

	$parents_data = '
		<br>
		Parents/Guardian: <br>
		<div class="col12">
			<div class="col6">  
				Father: '.$father.'
			</div>
			<div class="col6">
				Contact #: '.$parents['f_contact'].'
			</div>
		</div>

		<div class="col12">
			<div class="col6">  
				Mother: '.$mother.'
			</div>
			<div class="col6">
				Contact #: '.$parents['m_contact'].'
			</div>
		</div>

		<div class="col12">
			<div class="col6">  
				Guardian: '.$guardian.'
			</div>
			<div class="col6">
				Contact #: '.$parents['g_contact'].'
			</div>
		</div>
		';

		$mpdf->WriteHTML($parents_data);
	
		$stat = "";
		if($res['enrollment_status'] == "Enroled"){
			$stat = "OFFICIALLY ENROLLED";
		}else{
			$stat = "NOT Enroled";
		}

		$enrolledDate = $res['enrolled_at'];

		$createDate = new \DateTime($enrolledDate);

		$enrolledDate = $createDate->format('m/d/Y');
		

		$mpdf->WriteHTML('<h1 class="en_status">'.$stat.'</h1>');
		$mpdf->WriteHTML('<div style="border: 1px solid black;"></div>');
		

		$signatories = '
		<br>
		<div class="col12">
			<div class="admin_name">  
				Assessed/Enrolled By:
			</div>
			<div class="chair">  
				Approved By:
			</div>
			<div class="student_name">  
				Student Signature:
			</div>
		</div>
		<br/><br/>

		<div class="col12">
			<div class="admin_name">  
				<u>'.strtoupper($enrolledBy['emp_lname']).', '.strtoupper($enrolledBy['emp_fname']).','.strtoupper($enrolledBy['emp_mname']).'</u>
			</div>
			<div class="chair">
				<u>(SGD) DELORAH CECILIA L. FANTILLO</u>
			</div>
			<div class="student_name">
				<u>'.strtoupper($res['last_name']).', '.strtoupper($res['first_name']).' '.strtoupper($res['middle_name']).'</u>
			</div>
		</div>

		<div class="col12">
			<div class="admin_name">  
				Date Enrolled: '.$enrolledDate.'
			</div>
			<div class="chair">
				Principal IV
			</div>
			<div class="student_name">
				Student
			</div>
		</div>
		';

		
		$mpdf->WriteHTML($signatories);
	

		$mpdf->WriteHTML('<br>');

		$important = '
		<span class="important-text"><strong>IMPORTANT:</strong> (1) Check all above entries carefully (2) This ERF should be kept for the entire school year. In case of loss,
			the student should present an Affidavit of Loss (NOTARIZED) upon requesting a replacement Enrollment Registration Form (ERF).</span>
		';
		$mpdf->WriteHTML($important);
		
		$footer = '<hr><div class="footer"><i>Iloilo National High School - Luna St., La Paz, Iloilo City 302509</i></div>';
		$mpdf->WriteHTML($footer);
		
		// $mpdf->Image($inhsqr,170,15,25,25,'png','',true, false);
		$mpdf->Image($inhslogo,180,4,18,17,'png','',true, false);
		// $mpdf->Image($student_image,150,25,35,30,'png','',true, true, false);
		
		$mpdf->SetWatermarkText('ILOILO NATIONAL HIGH SCHOOL');
		$mpdf->showWatermarkText = false;
		// $mpdf->SetWatermarkImage('upload/system_file/logo.png');
		$mpdf->SetWatermarkImage(
			'upload/system_file/logo.png',
			.08,
			'',
			array(65, 20)
		);

		$mpdf->showWatermarkImage = true;
		
		
		// $mpdf->WriteHTML('Applicant ID: '.$applicant_id);
		// $mpdf->WriteHTML($app_id);
		// return view('f_application/print_application/index.php', $data);
		return redirect()->to($mpdf->Output('enrollment_form.pdf', 'I'));

	}


	
}
