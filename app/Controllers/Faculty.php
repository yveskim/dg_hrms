<?php

namespace App\Controllers;

use App\Models\AdviseryModel;
use App\Models\EmpEducModel;
use App\Models\EmpEligibilityModel;
use App\Models\EmployeeModel;
use App\Models\EmpFamBgModel;
use App\Models\EmpFamBgChildrenModel;
use App\Models\EmpLearningDevelopmentModel;
use App\Models\EmpOthersModel;
use App\Models\EmpWorkExperienceModel;
use App\Models\EmpWorkInvolvementModel;
use App\Models\EnrollmentMdl;
use App\Models\UsersModel;
use App\Models\SemesterModel;
use App\Models\SchoolYearModel;
use App\Models\StudentFamilyBgModel;
use App\Models\EmpSkillsModel;
use App\Models\ShsSectionAdviserModel;
use App\Models\EmployeeCategoryModel;
use App\Models\EmpReferenceModel;


class Faculty extends BaseController
{
    public function index($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/f_faculty/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $empModel = new EmployeeModel();
        $usersModel = new UsersModel();
        $syMdl = new SchoolYearModel();

        $loggedFaculty = session()->get('loggedAdmin');

        $emp_id = $usersModel->where('user_id', $loggedFaculty)->select('emp_id')->first();

        $faculty_info = $empModel->where('emp_id', $emp_id)->first();

        $sy_id = $syMdl->where('is_active', true)->first();


        $data = [
            'title' => 'Dashboard',
            'faculty' => $faculty_info,
            'user' => $loggedFaculty,
            'sy_id' => $sy_id,
        ];
        return view('f_faculty/' . $page, $data);

    }

    function updateProfile(){
        $empModel = new EmployeeModel();
		$emp_id = $this->request->getPost('emp_id');

		$image = $this->request->getFile('emp_file');
		// $customName = $this->request->getPost('profile_image');
		$imageName = $image->getName();
		$imageSize = $image->getSize();
		$randomFileName = $image->getRandomName();
		$imageExtension = $image->getExtension();

		if (!empty($imageName)) {
			if ($image->isValid() && !$image->hasMoved()) { //check if image is valid and has not moved
				$image->move('upload/user_files/', $randomFileName); // move the image to upload folder
			}


            $data = [
                'emp_image' => $randomFileName
            ];
    
            try{
                $result['pic'] = $empModel->update($emp_id, $data);
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
		}else{
            $result['status'] = 0;
            $result['message'] = "No image selected";
            echo json_encode($result);
            die;
        }
	

		
	
    }

    public function getSchoolYear()
    {
        $syModel = new SchoolYearModel();
        $data['sy'] = $syModel->findAll();
        return $this->response->setJSON($data);
    }

    public function getFaculty()
    {
        $empMdl = new EmployeeModel();
        $data['faculty'] = $empMdl->where('job_description', 2)->findAll();
        return $this->response->setJSON($data);
    }

    public function getFacultyNotPh()
    {
        $empMdl = new EmployeeModel();

        $data['faculty'] = $empMdl
            ->join('program_head_tbl', 'program_head_tbl.ph_emp_id = employee_t.emp_id', 'left')
            ->where('employee_t.job_description', 2)
            ->where('program_head_tbl.ph_id', null)
            ->find();
        return $this->response->setJSON($data);
    }

    public function getFacultyDetails()
    {
        $empMdl = new EmployeeModel();
        $syModel = new SchoolYearModel();
        $studAdvMdl = new AdviseryModel();
        $advMdl = new AdviseryModel();

        $emp_id = $this->request->getGet('emp_id');
        $data['faculty'] = $empMdl->where('emp_id', $emp_id)->first();
        $data['adv'] = $studAdvMdl
            ->join('advisery_tbl', 'advisery_tbl.adv_id = student_advisery_tbl.adv_id', 'left')
            ->join('employee_t', 'employee_t.emp_id = advisery_tbl.emp_id', 'left')
            ->join('section_tbl', 'section_tbl.sec_id = advisery_tbl.sec_id', 'left')
            ->join('program_tbl', 'program_tbl.prog_id = advisery_tbl.program_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = program_tbl.cat_id', 'left')
            ->join('school_year_tbl', 'school_year_tbl.sy_id = advisery_tbl.sy', 'left')
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_tbl.grade_level_id', 'left')
            ->join('enrollment_tbl', 'enrollment_tbl.en_id = student_advisery_tbl.en_id', 'left')
            ->where('advisery_tbl.emp_id', $emp_id)
            ->where('school_year_tbl.is_active', true)->findAll();
        $data['sy'] = $syModel->findAll();
        $data['adv_details'] = $advMdl
            ->join('section_tbl', 'section_tbl.sec_id = advisery_tbl.sec_id', 'left')
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_tbl.grade_level_id', 'left')
            ->join('program_tbl', 'program_tbl.prog_id = advisery_tbl.program_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = program_tbl.cat_id', 'left')
            ->join('school_year_tbl', 'school_year_tbl.sy_id = advisery_tbl.sy', 'left')
            ->where('advisery_tbl.emp_id', $emp_id)
            ->where('school_year_tbl.is_active', true)->first();
        return $this->response->setJSON($data);
    }

    public function getAdvisery()
    {
        $empMdl = new EmployeeModel();
        $data['adv'] = $empMdl->join('school_year_tbl', 'school_year_tbl.sy_id = enrollment_tbl.school_year_id', 'left')
            ->select('enrollment_tbl.*')
            ->select('school_year_tbl.*')
            ->where('school_year_tbl.is_active', true)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function deleteFaculty()
    {
        $enModel = new EnrollmentMdl();
        $en_id = $this->request->getGet('en_id');
        $res = $enModel->where('en_id', $en_id)->delete();
        if ($res) {
            $rslt['status'] = 1;
            $rslt['message'] = "Delete successfull.";
            echo json_encode($rslt);
            die;
        } else {
            $rslt['status'] = 0;
            $rslt['message'] = "Data deletion was unsuccessfull.";
            echo json_encode($rslt);
            die;
        }
    }

    function getAdviseryClass(){
        $advMdl = new AdviseryModel();
        $shsAdvMdl = new ShsSectionAdviserModel();
        $empCatMdl = new EmployeeCategoryModel();

        $adv_id = $this->request->getGet('emp_id');

        $category = $empCatMdl->where('emp_id', $adv_id)->select('cat_id')->first();

        if($category === 1){
            $data['adv'] = $advMdl
            ->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')    
            ->join('student_section_tbl', 'student_section_tbl.sec_id = section_details_tbl.sec_det_id', 'left')    
            ->join('enrollment_tbl', 'enrollment_tbl.en_id = student_section_tbl.en_id', 'left')    
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_details_tbl.grade_level_id', 'left')    
            // ->join('enrollment_status_tbl', 'student_section_tbl.sec_id = section_details_tbl.sec_det_id', 'left')    
            ->join('employee_t', 'employee_t.emp_id = advisery_tbl.adviser_id', 'left')    
            ->where('adviser_id', $adv_id)->find();
    
            $data['section'] = $advMdl
            ->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
            ->select('section_details_tbl.sec_title')
            ->where('advisery_tbl.adviser_id', $adv_id)->first(); 

            $data['program'] = $advMdl
            ->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
            ->join('program_tbl', 'program_tbl.prog_id = section_details_tbl.prog_id', 'left')
            ->select('program_tbl.program_title')
            ->where('advisery_tbl.adviser_id', $adv_id)->first(); 

            $data['grade'] = $advMdl
            ->join('section_details_tbl', 'section_details_tbl.sec_det_id = advisery_tbl.sec_det_id', 'left')
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = section_details_tbl.grade_level_id', 'left')
            ->select('grade_level_tbl.grade_level')
            ->where('advisery_tbl.adviser_id', $adv_id)->first(); 
            
        }else{
            $data['shs_sec'] = $shsAdvMdl
            ->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')
            ->join('strands_tbl', 'strands_tbl.strand_id = shs_section_tbl.strand_id', 'left')
            ->where('shs_section_adviser_tbl.shs_adv_emp_id', $adv_id)->first(); 

            $data['adv'] = $shsAdvMdl
            ->join('shs_section_tbl', 'shs_section_tbl.shs_sec_id = shs_section_adviser_tbl.shs_adv_section_id', 'left')    
            ->join('shs_student_section_tbl', 'shs_student_section_tbl.shs_sec_id = shs_section_tbl.shs_sec_id', 'left')    
            ->join('enrollment_tbl', 'enrollment_tbl.en_id = shs_student_section_tbl.shs_stud_id', 'left')    
            ->join('grade_level_tbl', 'grade_level_tbl.grade_level_id = shs_section_tbl.shs_grade_level', 'left')     
            // ->join('employee_t', 'employee_t.emp_id = advisery_tbl.adviser_id', 'left')    
            ->where('shs_section_adviser_tbl.shs_adv_emp_id', $adv_id)->find();
        }



      
      

      

        return $this->response->setJSON($data);
    }

    function getProfile($page = 'faculty_profile'){
        if (!is_file(APPPATH . '/Views/f_faculty/profile/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $empModel = new EmployeeModel();
        $usersModel = new UsersModel();
        $syMdl = new SchoolYearModel();
        $semMdl = new SemesterModel();

        $loggedFaculty = session()->get('loggedAdmin');

        $emp_id = $usersModel->where('user_id', $loggedFaculty)->select('emp_id')->first();

        $faculty_info = $empModel->where('emp_id', $emp_id)->first();

        $sy_id = $syMdl->where('is_active', true)->first();
        $sem = $semMdl->where('is_active', true)->first();

        $data = [
            'title' => 'Profile',
            'faculty' => $faculty_info,
            'user' => $loggedFaculty,
            'sy_id' => $sy_id,
            'sem' => $sem,
            
        ];
        return view('f_faculty/profile/' . $page, $data);
        

    }
 
    function getEmploymentDetails(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getGet('emp_id');
        $data['category'] = $empMdl->join('employee_category_tbl', 'employee_category_tbl.emp_id = employee_t.emp_id', 'left')
        ->join('category_tbl', 'category_tbl.cat_id = employee_category_tbl.cat_id', 'left')
        ->where('employee_category_tbl.emp_id', $emp_id)->first();

        $data['plantilla'] = $empMdl->join('employment_status_tbl', 'employment_status_tbl.emp_id = employee_t.emp_id', 'left')
        ->join('plantilla_tbl', 'plantilla_tbl.plant_id = employment_status_tbl.plantilla_id', 'left')
        ->where('employment_status_tbl.emp_id', $emp_id)->first();

        $data['department'] = $empMdl->join('employee_department_tbl', 'employee_department_tbl.emp_id = employee_t.emp_id', 'left')
        ->join('department_tbl', 'department_tbl.dept_id = employee_department_tbl.dept_id', 'left')
        ->where('employee_department_tbl.emp_id', $emp_id)->first();

        return $this->response->setJSON($data);
    }

    function getEmploymentPersonalInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getGet('emp_id');
        $data['emp'] = $empMdl->where('emp_id', $emp_id)->first();
        return $this->response->setJSON($data);

    }

    function updateBasicInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'emp_school_id' => $this->request->getPost('inputEmpSchoolId'),
            'emp_fname' => $this->request->getPost('inputFirstName'),
            'emp_mname' => $this->request->getPost('inputMiddleName'),
            'emp_lname' => $this->request->getPost('inputLastName'),
            'emp_gender' => $this->request->getPost('inputGender'),
            'emp_marital_status' => $this->request->getPost('inputMaritalStatus'),
            'emp_citizenship' => $this->request->getPost('inputCitizenship'),
            'emp_citizen_by' => $this->request->getPost('inputCitizenBy'),
            'emp_country' => $this->request->getPost('inputCountry'),
            'emp_birthdate' => $this->request->getPost('inputBirthdate'),
            'emp_place_of_birth' => $this->request->getPost('inputBirthplace'),
            'emp_religion' => $this->request->getPost('inputReligion'),
            'emp_blood_type' => $this->request->getPost('inputBloodType'),
            'emp_height' => $this->request->getPost('inputHeight'),
            'emp_weight' => $this->request->getPost('inputWeight'),
        ];
        
        try {
           	$res = $empMdl->set($data)->where('emp_id', $emp_id)->update();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function updateOtherInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'emp_tin' => $this->request->getPost('inputTin'),
            'emp_sss' => $this->request->getPost('inputSss'),
            'emp_gsis' => $this->request->getPost('inputGsis'),
            'emp_pagibig' => $this->request->getPost('inputPagibig'),
            'emp_philhealth' => $this->request->getPost('inputPhilhealth'),
            'emp_agency_employee_no' => $this->request->getPost('inputAgency'),
        ];
        
        try {
           	$res = $empMdl->set($data)->where('emp_id', $emp_id)->update();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function updateContactInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'emp_email' => $this->request->getPost('inputEmail'),
            'emp_telephone_no' => $this->request->getPost('tel_no'),
            'emp_mobile_no' => $this->request->getPost('phone'),
        ];
        
        try {
           	$res = $empMdl->set($data)->where('emp_id', $emp_id)->update();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function updatePerAddressInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'emp_p_add_house' => $this->request->getPost('inputPerHouse'),
            'emp_p_add_street' => $this->request->getPost('inputPerStreet'),
            'emp_p_add_subdivision' => $this->request->getPost('inputPerSubdivision'),
            'emp_p_add_barangay' => $this->request->getPost('inputPerBarangay'),
            'emp_p_add_municipality' => $this->request->getPost('inputPerMunicipality'),
            'emp_p_add_city' => $this->request->getPost('inputPerCity'),
            'emp_p_add_province' => $this->request->getPost('inputPerProvince'),
            'emp_p_add_zip' => $this->request->getPost('inputPerZip'),
        ];
        
        try {
           	$res = $empMdl->set($data)->where('emp_id', $emp_id)->update();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }



    function updateCurAddressInfo(){
        $empMdl = new EmployeeModel();
        $emp_id = $this->request->getPost('emp_id');

        $data = [
            'emp_r_add_house' => $this->request->getPost('inputCurHouse'),
            'emp_r_add_street' => $this->request->getPost('inputCurStreet'),
            'emp_r_add_subdivision' => $this->request->getPost('inputCurSubdivision'),
            'emp_r_add_barangay' => $this->request->getPost('inputCurBarangay'),
            'emp_r_add_municipality' => $this->request->getPost('inputCurMunicipality'),
            'emp_r_add_city' => $this->request->getPost('inputCurCity'),
            'emp_r_add_province' => $this->request->getPost('inputCurProvince'),
            'emp_r_add_zip' => $this->request->getPost('inputCurZip'),
        ];
        
        try {
           	$res = $empMdl->set($data)->where('emp_id', $emp_id)->update();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function loadFamBg(){
        $famBgMdl = new EmpFamBgModel();
        $chlMdl = new EmpFamBgChildrenModel();
        $emp_id = $this->request->getGet('emp_id'); 

        $data['fam'] = $famBgMdl->where('emp_id', $emp_id)->first();
        $data['child'] = $chlMdl->where('emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
        
    }

    function addChild(){
        $famBgMdl = new EmpFamBgChildrenModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'child_name' => $this->request->getPost('child_name'),
            'child_birthdate' => $this->request->getPost('_birthday'),
            'emp_id' => $emp_id
        ];

        if($is_edit == true){
            $child_id = $this->request->getPost('child_id');
            try {
                $res = $famBgMdl->set($data)->where('child_id', $child_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $famBgMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function getChildDetails(){
        $famBgMdl = new EmpFamBgChildrenModel();
        $child_id = $this->request->getGet('child_id');
   
        $data['child'] = $famBgMdl->where('child_id', $child_id)->first();

        return $this->response->setJSON($data);
 
    }

    function deleteChild(){
        $famBgMdl = new EmpFamBgChildrenModel();
        $child_id = $this->request->getGet('child_id');
        try {
            $res = $famBgMdl->where('child_id', $child_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function updateFamBg(){
        $famBgMdl = new EmpFamBgModel();
        $emp_id = $this->request->getPost('emp_id');

        $checkFamBg = $famBgMdl->where('emp_id', $emp_id)->countAllResults();


        $data = [
            'spouse_first_name' => $this->request->getPost('sp_fname'),
            'spouse_middle_name' => $this->request->getPost('sp_mname'),
            'spouse_surname' => $this->request->getPost('sp_surname'),
            'spouse_occupation' => $this->request->getPost('_occupation'),
            'spouse_employer_business' => $this->request->getPost('employer_business'),
            'spouse_business_address' => $this->request->getPost('business_address'),
            'spouse_telephone' => $this->request->getPost('contact_no'),
            'emp_id' => $emp_id
        ];

        if($checkFamBg > 0){
            try {
                $res = $famBgMdl->set($data)->where('emp_id', $emp_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $famBgMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
        
        
    }

    function updateParentsInfo(){
        $famBgMdl = new EmpFamBgModel();
        $emp_id = $this->request->getPost('emp_id');

        $checkFamBg = $famBgMdl->where('emp_id', $emp_id)->countAllResults();
    
        $data = [
            'father_surname' => $this->request->getPost('father_surname'),
            'father_middlename' => $this->request->getPost('father_middlename'),
            'father_firstname' => $this->request->getPost('father_firstname'),
            'mother_surname' => $this->request->getPost('mother_maiden_name'),
            'mother_firstname' => $this->request->getPost('mother_firstname'),
            'mother_middlename' => $this->request->getPost('mother_middlename'),
            'emp_id' => $emp_id
        ];

        
        if($checkFamBg > 0){
            try {
                $res = $famBgMdl->set($data)->where('emp_id', $emp_id)->update();
                if($res){
                        $result['status'] = 1;
                        echo json_encode($result);
                        die;
                    }
                } catch (\Exception $e) {
                    $result['status'] = 0;
                    $result['message'] = $e->getMessage();
                    echo json_encode($result);
                    die;
                }
            }else{
                try {
                    $res = $famBgMdl->save($data);
                    if($res){
                        $result['status'] = 1;
                        echo json_encode($result);
                        die;
                    }
                } catch (\Exception $e) {
                    $result['status'] = 0;
                    $result['message'] = $e->getMessage();
                    echo json_encode($result);
                    die;
                }
            }
      
        
    }


    // EDUCATIONAL BG ------------------------------------------

    function loadEducBg(){
        $educMdl = new EmpEducModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['educ'] = $educMdl->where('educ_bg_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateEducBg(){
        $educMdl = new EmpEducModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'educ_bg_level' => $this->request->getPost('educ_level'),
            'educ_bg_school' => $this->request->getPost('school_name'),
            'educ_bg_degree' => $this->request->getPost('_degree'),
            'educ_bg_from' => $this->request->getPost('year_from'),
            'educ_bg_to' => $this->request->getPost('year_to'),
            'educ_bg_units' => $this->request->getPost('highest_unit'),
            'educ_bg_year_graduated' => $this->request->getPost('year_graduated'),
            'educ_bg_scholarship_honors' => $this->request->getPost('academic_honors'),
            'educ_bg_emp_id' => $emp_id
        ];
        
        if($is_edit == true){
            $educ_bg_id = $this->request->getPost('educ_bg_id');
            try {
                $res = $educMdl->set($data)->where('educ_bg_id', $educ_bg_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $educMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteEducBg(){
        $educMdl = new EmpEducModel();
        $educ_bg_id = $this->request->getGet('educ_bg_id');
        try {
            $res = $educMdl->where('educ_bg_id', $educ_bg_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getEducBgDetails(){
        $educMdl = new EmpEducModel();
        $educ_bg_id = $this->request->getGet('educ_bg_id');
   
        $data['educ'] = $educMdl->where('educ_bg_id', $educ_bg_id)->first();

        return $this->response->setJSON($data);
    }
    
// ELIGIBILITY ---------------------------------------------------
    
    function loadEligibility(){
        $eligMdl = new EmpEligibilityModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['elig'] = $eligMdl->where('elig_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateEligibility(){
        $eligMdl = new EmpEligibilityModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'elig_board_bar' => $this->request->getPost('board_bar'),
            'elig_rating' => $this->request->getPost('_rating'),
            'elig_exam_date' => $this->request->getPost('date_exam'),
            'elig_exam_place' => $this->request->getPost('place_exam'),
            'elig_license_no' => $this->request->getPost('license_no'),
            'elig_license_date_valid' => $this->request->getPost('date_valid'),
            'elig_emp_id' => $emp_id
        ];
        
        if($is_edit == true){
            $elig_id = $this->request->getPost('elig_id');
            try {
                $res = $eligMdl->set($data)->where('elig_id', $elig_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $eligMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteEligibility(){
        $eligMdl = new EmpEligibilityModel();
        $elig_id = $this->request->getGet('elig_id');
        try {
            $res = $eligMdl->where('elig_id', $elig_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getEligibilityDetails(){
        $eligMdl = new EmpEligibilityModel();
        $elig_id = $this->request->getGet('elig_id');
   
        $data['elig'] = $eligMdl->where('elig_id', $elig_id)->first();

        return $this->response->setJSON($data);
    }
    

    // WORK EXP -------------------------------------------

    function loadWorkXp(){
        $xpMdl = new EmpWorkExperienceModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['exp'] = $xpMdl->where('work_exp_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateWorkXp(){
        $xpMdl = new EmpWorkExperienceModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'work_exp_date_from' => $this->request->getPost('date_from'),
            'work_exp_date_to' => $this->request->getPost('date_to'),
            'work_exp_position' => $this->request->getPost('position_title'),
            'work_exp_company' => $this->request->getPost('agency_company'),
            'work_exp_monthly_sal' => $this->request->getPost('monthly_salary'),
            'work_exp_salary_grade' => $this->request->getPost('salary_grade'),
            'work_exp_appointment_status' => $this->request->getPost('appointment_status'),
            'work_exp_gov_service' => $this->request->getPost('gov_service'),
            'work_exp_emp_id' => $emp_id
        ];
        
        if($is_edit == true){
            $work_exp_id = $this->request->getPost('work_exp_id');
            try {
                $res = $xpMdl->set($data)->where('work_exp_id', $work_exp_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $xpMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteWorkXp(){
        $xpMdl = new EmpWorkExperienceModel();
        $work_exp_id = $this->request->getGet('work_exp_id');
        try {
            $res = $xpMdl->where('work_exp_id', $work_exp_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getWorkXpDetails(){
        $xpMdl = new EmpWorkExperienceModel();
        $work_exp_id = $this->request->getGet('work_exp_id');
   
        $data['exp'] = $xpMdl->where('work_exp_id', $work_exp_id)->first();

        return $this->response->setJSON($data);
    }


    // WORK INVOLVEMENT ----------------------------------

    
    function loadWorkInv(){
        $invMdl = new EmpWorkInvolvementModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['inv'] = $invMdl->where('work_inv_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateWorkInv(){
        $invMdl = new EmpWorkInvolvementModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'work_inv_name_and_address' => $this->request->getPost('name_address'),
            'work_inv_date_from' => $this->request->getPost('date_from'),
            'work_inv_date_to' => $this->request->getPost('date_to'),
            'work_inv_hours' => $this->request->getPost('total_hours'),
            'work_inv_position' => $this->request->getPost('position'),
            'work_inv_emp_id' => $emp_id,
        ];
        
        if($is_edit == true){
            $work_inv_id = $this->request->getPost('work_inv_id');
            try {
                $res = $invMdl->set($data)->where('work_inv_id', $work_inv_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $invMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteWorkInv(){
        $invMdl = new EmpWorkInvolvementModel();
        $work_inv_id = $this->request->getGet('work_inv_id');
        try {
            $res = $invMdl->where('work_inv_id', $work_inv_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getWorkInvDetails(){
        $invMdl = new EmpWorkInvolvementModel();
        $work_inv_id = $this->request->getGet('work_inv_id');
   
        $data['inv'] = $invMdl->where('work_inv_id', $work_inv_id)->first();

        return $this->response->setJSON($data);
    }

    // Learning and Development --------------------------

    function loadLearningDevelopment(){
        $ldMdl = new EmpLearningDevelopmentModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['ld'] = $ldMdl->where('ld_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateLearningDev(){
        $ldMdl = new EmpLearningDevelopmentModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'ld_training_program' => $this->request->getPost('training_program'),
            'ld_date_from' => $this->request->getPost('date_from'),
            'ld_date_to' => $this->request->getPost('date_to'),
            'ld_total_hours' => $this->request->getPost('total_hours'),
            'ld_type' => $this->request->getPost('type'),
            'ld_conducted_by' => $this->request->getPost('conducted_by'),
            'ld_emp_id' => $emp_id,
        ];
        
        if($is_edit == true){
            $ld_id = $this->request->getPost('ld_id');
            try {
                $res = $ldMdl->set($data)->where('ld_id', $ld_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $ldMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteLearningDev(){
        $ldMdl = new EmpLearningDevelopmentModel();
        $ld_id = $this->request->getGet('ld_id');
        try {
            $res = $ldMdl->where('ld_id', $ld_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getLearningDevDetails(){
        $ldMdl = new EmpLearningDevelopmentModel();
        $ld_id = $this->request->getGet('ld_id');
   
        $data['ld'] = $ldMdl->where('ld_id', $ld_id)->first();

        return $this->response->setJSON($data);
    }

    // Skills -----------------------------------------
    function loadSkills(){
        $skillMdl = new EmpSkillsModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['skills'] = $skillMdl->where('skills_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateSkills(){
        $skillMdl = new EmpSkillsModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'special_skills_hobbies' => $this->request->getPost('special_skills'),
            'non_academic_distinctions' => $this->request->getPost('non_acad_distinctions'),
            'skills_organization' => $this->request->getPost('organization'),
            'skills_emp_id' => $emp_id,
        ];
        
        if($is_edit == true){
            $skills_id = $this->request->getPost('skills_id');
            try {
                $res = $skillMdl->set($data)->where('skills_id', $skills_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $skillMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteSkills(){
        $skillMdl = new EmpSkillsModel();
        $skills_id = $this->request->getGet('skills_id');
        try {
            $res = $skillMdl->where('skills_id', $skills_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getSkillsDetails(){
        $skillMdl = new EmpSkillsModel();
        $skills_id = $this->request->getGet('skills_id');
   
        $data['skills'] = $skillMdl->where('skills_id', $skills_id)->first();

        return $this->response->setJSON($data);
    }

    // others =================================================================
    

    function loadOthers(){
        $otherMdl = new EmpOthersModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['others'] = $otherMdl->where('others_emp_id', $emp_id)->first();

        return $this->response->setJSON($data);
    }

    function updateOthers(){
        $otherMdl = new EmpOthersModel();
        $emp_id = $this->request->getPost('emp_id');

        $checkDataExist = $otherMdl->where('others_emp_id', $emp_id)->countAllResults();

        $data = [
            'consanguinity_3rd_degree' => $this->request->getPost('_consanguinity_3rd'),
            'consanguinity_3rd_degree_details' => $this->request->getPost('_consanguinity_3rd_details'),
            'consanguinity_4th_degree' => $this->request->getPost('_consanguinity_4th'),
            'consanguinity_4th_degree_details' => $this->request->getPost('_consanguinity_4th_details'),
            'admin_offence' => $this->request->getPost('admin_offense'),
            'admin_offence_details' => $this->request->getPost('admin_offense_details'),
            'criminal_charge' => $this->request->getPost('criminal_charge'),
            'criminal_charge_date' => $this->request->getPost('criminal_charge_date'),
            'criminal_charge_details' => $this->request->getPost('criminal_charge_details'),
            'is_convicted' => $this->request->getPost('_convicted'),
            'convicted_details' => $this->request->getPost('_convicted_details'),
            'seperated_from_service' => $this->request->getPost('_separated'),
            'seperated_from_service_details' => $this->request->getPost('_separated_details'),
            'election_candidate' => $this->request->getPost('_candidate'),
            'election_candidate_details' => $this->request->getPost('_candidate_details'),
            'resigned_3months_period' => $this->request->getPost('_resigned'),
            'resigned_3months_period_details' => $this->request->getPost('_resigned_details'),
            'immigrant_status' => $this->request->getPost('_immigrant'),
            'immigrant_status_details' => $this->request->getPost('_immigrant_details'),
            'is_ip' => $this->request->getPost('_indigenous'),
            'is_ip_details' => $this->request->getPost('_indigenous_details'),
            'is_pwd' => $this->request->getPost('_disability'),
            'is_pwd_details' => $this->request->getPost('_disability_details'),
            'is_solo_parent' => $this->request->getPost('solo_parent'),
            'solo_parent_details' => $this->request->getPost('solo_parent_details'),
            'others_emp_id' => $emp_id,
        ];

        if($checkDataExist > 0){
            try {
                $res = $otherMdl->set($data)->where('others_emp_id', $emp_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else  {
            try {
                $res = $otherMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
        
    }

    // references =================================================

    function loadReference(){
        $refMdl = new EmpReferenceModel();
        $emp_id = $this->request->getGet('emp_id');
   
        $data['ref'] = $refMdl->where('ref_emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }

    function updateReference(){
        $refMdl = new EmpReferenceModel();
        $emp_id = $this->request->getPost('emp_id');
        $is_edit = $this->request->getPost('is_edit');

        $data = [
            'ref_name' => $this->request->getPost('ref_name'),
            'ref_address' => $this->request->getPost('ref_address'),
            'ref_contact' => $this->request->getPost('ref_contact'),
            'ref_emp_id' => $emp_id,
        ];
        
        if($is_edit == true){
            $ref_id = $this->request->getPost('ref_id');
            try {
                $res = $refMdl->set($data)->where('ref_id', $ref_id)->update();
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }else{
            try {
                $res = $refMdl->save($data);
                if($res){
                    $result['status'] = 1;
                    echo json_encode($result);
                    die;
                }
            } catch (\Exception $e) {
                $result['status'] = 0;
                $result['message'] = $e->getMessage();
                echo json_encode($result);
                die;
            }
        }
       
    }

    function deleteReference(){
        $refMdl = new EmpReferenceModel();
        $ref_id = $this->request->getGet('ref_id');
        try {
            $res = $refMdl->where('ref_id', $ref_id)->delete();
            if($res){
                $result['status'] = 1;
                echo json_encode($result);
                die;
            }
        } catch (\Exception $e) {
            $result['status'] = 0;
            $result['message'] = $e->getMessage();
            echo json_encode($result);
            die;
        }
    }

    function getReferenceDetails(){
        $refMdl = new EmpReferenceModel();
        $ref_id = $this->request->getGet('ref_id');
   
        $data['ref'] = $refMdl->where('ref_id', $ref_id)->first();

        return $this->response->setJSON($data);
    }


}
