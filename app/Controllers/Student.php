<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\SchoolYearModel;
use App\Models\EnrollmentMdl;
use App\Models\StudentAddressModel;
use App\Models\StudentAccountModel;
use App\Models\StudentFamilyBgModel;
use App\Models\StudentDeviceModel;
use App\Models\StudentHealthModel;
use App\Models\StudentSchoolModel;
use App\Models\StudentHouseholdModel;
use App\Models\GradeLevelModel;
use App\Models\SemesterModel;
use App\Models\EnrollmentStatusModel;


class Student extends BaseController
{
	public function index($page = 'student_layout')
	{
		if (!is_file(APPPATH . '/Views/f_layout/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
		$enMdl = new EnrollmentMdl();
		$accMdl = new StudentAccountModel();
		$syMdl = new SchoolYearModel();
		
		// $is_dissabled = session()->get('is_dissabled');
		$logedStudent = session()->get('user_id');

		$en_id = $accMdl->where('s_account_id',  $logedStudent)->select('en_id')->first();
		
		$is_new = $accMdl->where('s_account_id',  $logedStudent)->select('is_new')->first();

		$studentInfo = $enMdl->where('en_id',  $en_id)->first();

		// $en_id = $studentInfo['en_id'];
		$sy_id = $syMdl->where('is_active',  true)->first();

		$data = [
			'title' => 'Student',
			'student' => $studentInfo,
			'user_id' => $logedStudent,
			'is_student' => true,
			'is_enrolled' => 0,
			'sy_id' => $sy_id,
		];

		if($is_new['is_new'] == 0){
			return view('f_layout/' . $page, $data);
		}else{
			echo view('f_student/change_password/changePass_header.php');
			echo view('f_student/change_password/change_pass_view.php', $data);
			echo view('f_student/change_password/changePass_footer.php');
		}

	}

	
	function updateStudImage(){
		$studMdl = new EnrollmentMdl();
		$en_id = $this->request->getPost('en_id');

		$image = $this->request->getFile('stud_image');
		// $customName = $this->request->getPost('profile_image');
		$imageName = $image->getName();
		$imageSize = $image->getSize();
		$randomFileName = $image->getRandomName();
		$imageExtension = $image->getExtension();

		if (!empty($imageName)) {
			if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
				$image->move('upload/student_files/student_images/', $randomFileName); // move the image to upload folder
			}
		}
	

		$data = [
			'student_image' => $randomFileName
		];

		try{
			$result['pic'] = $studMdl->update($en_id, $data);
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

	// student address--------------------------------
	// student address--------------------------------
	// student address--------------------------------
	// student address--------------------------------

	function setStudentAddress(){
		$addMdl = new StudentAddressModel();
		$update_status = $this->request->getPost('update_status');
		$update_id = $this->request->getPost('update_id');

		$data = [
			'en_id' => $this->request->getPost('en_id'),
			'address_type' => $this->request->getPost('address_type'),
			'blok_lot_phase_bldg' => $this->request->getPost('blok_lot'),
			'street' => $this->request->getPost('street'),
			'subdivision_village' => $this->request->getPost('subdivision'),
			'barangay' => $this->request->getPost('barangay'),
			'municipality_city' => $this->request->getPost('municipality'),
			'province' => $this->request->getPost('province'),
			'zip_code' => $this->request->getPost('zip_code'),
			'region' => $this->request->getPost('region'),
		];

		if($update_status == false){
			try{
				$res = $addMdl->insert($data);
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
		}else{
			try{
				$res = $addMdl->update($update_id, $data);
				if($res){
					$result['status'] = 2;
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

	function getStudentAddress(){
		$addMdl = new StudentAddressModel();
		$en_id = $this->request->getGet('en_id');
		$data['add'] = $addMdl->where('en_id', $en_id)->find();
		return $this->response->setJSON($data);
	}

	function getAddress(){
		$addMdl = new StudentAddressModel();
		$add_id = $this->request->getGet('add_id');
		$data['add'] = $addMdl->where('address_id', $add_id)->first();
		return $this->response->setJSON($data);
	}

	function deleteAddress(){
		$addMdl = new StudentAddressModel();
		$add_id = $this->request->getGet('add_id');
		try{
			$res = $addMdl->where('address_id', $add_id)->delete();
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



	// student info -----------------------------------
	// student info -----------------------------------
	// student info -----------------------------------
	// student info -----------------------------------
	function updateStudentInfo(){
		$studMdl = new EnrollmentMdl();
		$en_id = $this->request->getPost('en_id');
		$lrn = $this->request->getPost('student_lrn');
		if($lrn === ""){
			$lrn = null;
		}

		$data = [
			'student_id' => $this->request->getPost('student_id'),
			'student_lrn' => $lrn,
			'first_name' => $this->request->getPost('firstName'),
			'middle_name' => $this->request->getPost('middleName'),
			'last_name' => $this->request->getPost('lastName'), 
			'sex' => $this->request->getPost('sex'),
			'birthdate' => $this->request->getPost('birthDate'),
			'birth_place' => $this->request->getPost('birthPlace'),
			'psa_birth_certificate_no' => $this->request->getPost('psaBirthNo'),
			'citizenship' => $this->request->getPost('citizenship'),
			'religion' => $this->request->getPost('religion'),
			'mother_tongue' => $this->request->getPost('mother_tongue'),
			'blood_type' => $this->request->getPost('bloodType'),
			'height' => $this->request->getPost('height'),
			'weight' => $this->request->getPost('weight'),
			'phone_no' => $this->request->getPost('phoneNo'),
			'tel_no' => $this->request->getPost('telNo'),
			'email_address' => $this->request->getPost('emailAdd'),
			'facebook_name' => $this->request->getPost('fbName'),
			'with_special_need' => $this->request->getPost('lwd'),
			'special_need' => $this->request->getPost('specialNeeds')
		];

		try{
			$res = $studMdl->update($en_id, $data);
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

	function getGradeLevelJhs(){
		$gradeLvlMdl = new GradeLevelModel();
		$data['gr_lvl'] = $gradeLvlMdl->where('grade_level <=',  10)->find();
		return $this->response->setJSON($data);
	}

	function getGradeLevelShs(){
		$gradeLvlMdl = new GradeLevelModel();
		$data['gr_lvl'] = $gradeLvlMdl->where('grade_level >=',  11)->find();
		return $this->response->setJSON($data);
	}



	

	// familyBG-------------------------------------------------
	// familyBG-------------------------------------------------
	// familyBG-------------------------------------------------
	// familyBG-------------------------------------------------

	function loadFamilyBg(){
		$famMdl = new StudentFamilyBgModel();	
		$en_id = $this->request->getGet('en_id');
		$data['bg'] = $famMdl
					->join('enrollment_tbl', 'enrollment_tbl.en_id = student_parents_tbl.stud_id', 'left')
					->where('enrollment_tbl.en_id', $en_id)
					->first();
		return $this->response->setJSON($data);
	}

	function updateFamilyBg(){
		$famMdl = new StudentFamilyBgModel();
		$parent_id = $this->request->getPost('parent_id');
		$new_entry = $this->request->getPost('new_entry');

		$data = [
			'stud_id' => $this->request->getPost('en_id'),
			'f_is_deceased' => $this->request->getPost('f_is_deceased'),
			'f_fname' => $this->request->getPost('f_first_name'),
			'f_mname' => $this->request->getPost('f_middle_name'),
			'f_lname' => $this->request->getPost('f_last_name'),
			'f_highest_education' => $this->request->getPost('f_education'),
			'f_contact' => $this->request->getPost('f_phone'),
			'f_email' => $this->request->getPost('f_email'),
			'f_facebook' => $this->request->getPost('f_facebook'),
			'f_is_working' => $this->request->getPost('f_is_working'),
			'f_employer' => $this->request->getPost('f_employer'),
			'f_company' => $this->request->getPost('f_company'),
			'f_salary' => $this->request->getPost('f_salary'),

			'm_is_deceased' => $this->request->getPost('m_is_deceased'),
			'm_fname' => $this->request->getPost('m_first_name'),
			'm_mname' => $this->request->getPost('m_middle_name'),
			'm_lname' => $this->request->getPost('m_last_name'),
			'm_highest_education' => $this->request->getPost('m_education'),
			'm_contact' => $this->request->getPost('m_phone'),
			'm_email' => $this->request->getPost('m_email'),
			'm_facebook' => $this->request->getPost('m_facebook'),
			'm_is_working' => $this->request->getPost('m_is_working'),
			'm_employer' => $this->request->getPost('m_employer'),
			'm_company' => $this->request->getPost('m_company'),
			'm_salary' => $this->request->getPost('m_salary'),

			'g_fname' => $this->request->getPost('g_first_name'),
			'g_mname' => $this->request->getPost('g_middle_name'),
			'g_lname' => $this->request->getPost('g_last_name'),
			'g_highest_education' => $this->request->getPost('g_education'),
			'g_contact' => $this->request->getPost('g_phone'),
			'g_email' => $this->request->getPost('g_email'),
			'g_facebook' => $this->request->getPost('g_facebook'),

			'is_4ps' => $this->request->getPost('is_4ps'),
			'household_no' => $this->request->getPost('household_no'),
			'is_ip' => $this->request->getPost('is_ip'),
			'ip_community' => $this->request->getPost('ip_community'),
			'financial_provider' => $this->request->getPost('financial_provider'),
			'instructional_provider' => $this->request->getPost('instructional_provider'),
			
			'family_business' => $this->request->getPost('family_business'),
			'home_distance' => $this->request->getPost('home_distance'),
			'transportation' => $this->request->getPost('transportation'),
		];

		if($new_entry == true){
			try{
				$res = $famMdl->insert($data);
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
		}else if($new_entry == false){
			try{
				$res = $famMdl->update($parent_id, $data);
				if($res){
					$result['status'] = 2;
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

	function getSemester(){
		$semMdl = new SemesterModel();
		$data['sem'] = $semMdl->findAll();
		return $this->response->setJSON($data);
	}
// Devices ----------------------------
// Devices ----------------------------
// Devices ----------------------------

	function getStudentDevices(){
		$devMdl = new StudentDeviceModel();
		$en_id = $this->request->getGet('en_id');
		$data['dev'] = $devMdl->where('stud_id', $en_id)->find();
		return $this->response->setJSON($data);
	}
	
	
	function setStudentDevice(){
		$devMdl = new StudentDeviceModel();
		$update_status = $this->request->getPost('update_status');
		$update_id = $this->request->getPost('update_id');

		$data = [
			'dev_name' => $this->request->getPost('device_name'),
			'dev_type' => $this->request->getPost('device_type'),
			'is_functioning' => $this->request->getPost('is_functioning'),
			'stud_id' => $this->request->getPost('en_id'),
		];

		if($update_status == false){
			try{
				$res = $devMdl->insert($data);
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
		}else{
			try{
				$res = $devMdl->update($update_id, $data);
				if($res){
					$result['status'] = 2;
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
	function getDevices(){
		$devMdl = new StudentDeviceModel();
		$dev_id = $this->request->getGet('dev_id');
		$data['dev'] = $devMdl->where('dev_id', $dev_id)->first();
		return $this->response->setJSON($data);
	}

	
	function deleteDevice(){
		$devMdl = new StudentDeviceModel();
		$dev_id = $this->request->getGet('dev_id');
		try{
			$res = $devMdl->where('dev_id', $dev_id)->delete();
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
// healt status ----------------------------
// healt status ----------------------------
// healt status ----------------------------
// healt status ----------------------------
	function getStudentHealth(){
		$healthMdl = new StudentHealthModel();
		$en_id = $this->request->getGet('en_id');
		$data['health'] = $healthMdl->where('en_id', $en_id)->find();
		return $this->response->setJSON($data);
	}


	function setStudentHealth(){
		$healthMdl = new StudentHealthModel();
		$update_status = $this->request->getPost('update_status');
		$update_id = $this->request->getPost('update_id');

		$data = [
			'health_condition' => $this->request->getPost('health_condition'),
			'health_type' => $this->request->getPost('health_type'),
			'en_id' => $this->request->getPost('en_id'),
			'remarks' => $this->request->getPost('remarks'),
		];

		if($update_status == false){
			try{
				$res = $healthMdl->insert($data);
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
		}else{
			try{
				$res = $healthMdl->update($update_id, $data);
				if($res){
					$result['status'] = 2;
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
	function getHealth(){
		$healthMdl = new StudentHealthModel();
		$health_id = $this->request->getGet('health_id');
		$data['health'] = $healthMdl->where('health_id', $health_id)->first();
		return $this->response->setJSON($data);
	}


	function deleteHealth(){
		$healthMdl = new StudentHealthModel();
		$health_id = $this->request->getGet('health_id');
		try{
			$res = $healthMdl->where('health_id', $health_id)->delete();
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

	// school records =++++++++++++++++++++++++++++++++++++++
	// school records =++++++++++++++++++++++++++++++++++++++
	// school records =++++++++++++++++++++++++++++++++++++++
	// school records =++++++++++++++++++++++++++++++++++++++
	function getStudentSchool(){
		$schMdl = new StudentSchoolModel();
		$en_id = $this->request->getGet('en_id');
		$data['sch'] = $schMdl->where('stud_id', $en_id)->find();
		return $this->response->setJSON($data);
	}


	function setStudentSchool(){
		$schMdl = new StudentSchoolModel();
		$update_status = $this->request->getPost('update_status');
		$update_id = $this->request->getPost('update_id');

		$data = [
			'stud_id' => $this->request->getPost('en_id'),
			'grade_level_completed' => $this->request->getPost('grade_level'),
			'school_year' => $this->request->getPost('school_year'),
			'school_name' => $this->request->getPost('school_name'),
			'school_id' => $this->request->getPost('school_id'),
			'school_type' => $this->request->getPost('school_type'),
			'school_address' => $this->request->getPost('school_address'),
			'adviser_name' => $this->request->getPost('adviser'),
			'returning_student' => $this->request->getPost('is_returning'),
		];

		if($update_status == false){
			try{
				$res = $schMdl->insert($data);
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
		}else{
			try{
				$res = $schMdl->update($update_id, $data);
				if($res){
					$result['status'] = 2;
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
	function getSchool(){
		$schMdl = new StudentSchoolModel();
		$sch_id = $this->request->getGet('sch_id');
		$data['sch'] = $schMdl->where('sch_id', $sch_id)->first();
		return $this->response->setJSON($data);
	}


	function deleteSchool(){
		$schMdl = new StudentSchoolModel();
		$sch_id = $this->request->getGet('sch_id');
		try{
			$res = $schMdl->where('sch_id', $sch_id)->delete();
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
	// household members ++++++++++++++++++++++++++++++++++
	// household members ++++++++++++++++++++++++++++++++++
	// household members ++++++++++++++++++++++++++++++++++
	// household members ++++++++++++++++++++++++++++++++++
	function getStudentHm(){
		$houseMdl = new StudentHouseholdModel();
		$en_id = $this->request->getGet('en_id');
		$data['hm'] = $houseMdl
					->join('school_year_tbl', 'school_year_tbl.sy_id = household_members_tbl.sy_id', 'left')
					->where('household_members_tbl.stud_id', $en_id)
					->find();
		return $this->response->setJSON($data);
	}


	function setStudentHm(){
		$hmMdl = new StudentHouseholdModel();
		$update_status = $this->request->getPost('update_status');
		$update_id = $this->request->getPost('update_id');

		$data = [
			'sy_id' => $this->request->getPost('sy_id'),
			'stud_id' => $this->request->getPost('en_id'),
			'grade' => $this->request->getPost('grade_level'),
			'hm_relationship' => $this->request->getPost('relationship'),
			'complete_name' => $this->request->getPost('complete_name'),
		];

		if($update_status == false){
			try{
				$res = $hmMdl->insert($data);
				if($res){
					$result['status'] = 1;
					$result['message'] = $this->request->getPost('relationship');
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
				$res = $hmMdl->update($update_id, $data);
				if($res){
					$result['status'] = 2;
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
	function getHm(){
		$houseMdl = new StudentHouseholdModel();
		$hm_id = $this->request->getGet('hm_id');
		$data['hm'] = $houseMdl
					->join('school_year_tbl', 'school_year_tbl.sy_id = household_members_tbl.sy_id', 'left')
					->where('hm_id', $hm_id)->first();
		return $this->response->setJSON($data);
	}


	function deleteHm(){
		$houseMdl = new StudentHouseholdModel();
		$hm_id = $this->request->getGet('hm_id');
		try{
			$res = $houseMdl->where('hm_id', $hm_id)->delete();
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

	function editEnStatus(){
		$enStatMdl = new EnrollmentStatusModel();
		$en_id = $this->request->getGet('en_id');
		$data['en'] = $enStatMdl
					->where('en_id', $en_id)->first();
		return $this->response->setJSON($data);
	}

	function updateEnStat(){
		$enStatMdl = new EnrollmentStatusModel();
		$en_id = $this->request->getPost('en_id');
		$data = [
			'enrollment_status' => $this->request->getPost('en_status'),
			'submitted_sf9' => $this->request->getPost('sf9'),
			'submitted_sf10' => $this->request->getPost('sf10'),
			'submitted_good_moral' => $this->request->getPost('good_moral'),
			'submitted_psa' => $this->request->getPost('psa'),
		];
					
		try{
			$res = $enStatMdl->set($data)->where('en_id', $en_id)->update();
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
