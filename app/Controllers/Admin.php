<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\EmpDepartmentModel;
use App\Models\EmpEducModel;
use App\Models\EmpEligibilityModel;
use App\Models\EmpFamBgChildrenModel;
use App\Models\EmpFamBgModel;
use App\Models\EmpLearningDevelopmentModel;
use App\Models\EmployeeCategoryModel;
use App\Models\EmployeeModel;
use App\Models\EmpOthersModel;
use App\Models\EmpProgramModel;
use App\Models\EmpWorkExperienceModel;
use App\Models\EmpWorkInvolvementModel;
use App\Models\ProgramModel;
use App\Models\SchoolYearModel;
use App\Models\AdviseryModel;
use App\Models\UsersModel;

class Admin extends BaseController
{
    public function index($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/f_admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        $empModel = new EmployeeModel();
        $usersModel = new UsersModel();
        $syMdl = new SchoolYearModel();

        $loggedAdminID = session()->get('loggedAdmin');
        // $userRestriction = session()->get('userRestriction');

        $emp_id = $usersModel->where('user_id', $loggedAdminID)->select('emp_id')->first();

        $adminInfo = $empModel->where('emp_id', $emp_id)->first();

        $sy_id = $syMdl->where('is_active', true)->first();

        $data = [
            'title' => 'Admin',
            'admin' => $adminInfo,
            'user' => $loggedAdminID,
            'sy_id' => $sy_id,

            // 'user_restriction' => $userRestriction,
        ];
        return view('f_admin/' . $page, $data);

    }

    public function getChildren()
    {
        $childModel = new EmpFamBgChildrenModel();

        $empId = $this->request->getGet('empId');
        $data['child'] = $childModel
            ->where('emp_id', $empId)
            ->findAll();
        //    $data['child'] = $childModel->getWhere('emp_id' ,  $empId);
        return $this->response->setJSON($data);
    }

    public function getFamBg()
    {
        $famModel = new EmpFamBgModel();

        $empId = $this->request->getGet('empId');
        $data['fam'] = $famModel
            ->where('emp_id', $empId)
            ->findAll();
        //    $data['child'] = $childModel->getWhere('emp_id' ,  $empId);
        return $this->response->setJSON($data);
    }

    public function sign_out()
    {
        if (session()->has('loggedAdmin')) {
            session()->remove('loggedAdmin');
        }
    }

    public function signOutStudent()
    {
        if (session()->has('user_id')) {
            session()->remove('user_id');
        }
    }

    public function insertEmpPersonalInfo()
    {
        $empModel = new EmployeeModel();

        $empImage = $this->request->getFile('empImage');

        $imageName = "";
        $randomFileName = "";
        if ($empImage != "") {
            $imageName = $empImage->getName(); // get the original name of the image
            $randomFileName = $empImage->getRandomName();
            $empImage->move('upload/user_files/', $randomFileName); // move the image to upload folder
        }

        $citizen_by = "";

        if (!empty($this->request->getPost('citizen_by'))) {
            $citizen_by = $this->request->getPost('citizen_by');
            foreach ($citizen_by as $cit) { //get the id of checkbox selected in citizen_by
                $citizen_by = $cit;
            }
        }

        $citizen = $this->request->getPost('citizenship_fil');
        if (!empty($citizen)) {
            $citizen = "Filipino";
        } else {
            $citizen = "Dual Citizen";
        }

        $data = [
            'job_description' => $this->request->getPost('job_description'),
            'emp_school_id' => $this->request->getPost('emp_school_id'),
            'emp_image' => $randomFileName,
            'emp_fname' => $this->request->getPost('firstName'),
            'emp_mname' => $this->request->getPost('middleName'),
            'emp_lname' => $this->request->getPost('lastName'),
            'emp_gender' => $this->request->getPost('gender'),
            'emp_marital_status' => $this->request->getPost('maritalStatus'),
            'emp_citizenship' => $citizen,
            'emp_citizen_by' => $citizen_by,
            'emp_country' => $this->request->getPost('country'),
            'emp_age' => $this->request->getPost('age'),
            'emp_birthdate' => $this->request->getPost('birthDate'),
            'emp_place_of_birth' => $this->request->getPost('placeOfBirth'),
            'emp_religion' => $this->request->getPost('religion'),
            'emp_blood_type' => $this->request->getPost('bloodType'),
            'emp_height' => $this->request->getPost('height'),
            'emp_weight' => $this->request->getPost('weight'),
            'emp_tin' => $this->request->getPost('tin'),
            'emp_sss' => $this->request->getPost('sss'),
            'emp_gsis' => $this->request->getPost('gsis'),
            'emp_pagibig' => $this->request->getPost('pagibig'),
            'emp_email' => $this->request->getPost('emailAddress'),
            'emp_philhealth' => $this->request->getPost('philhealth'),
            'emp_agency_employee_no' => $this->request->getPost('agency_employee_no'),
            'emp_telephone_no' => $this->request->getPost('telephone_no'),
            'emp_mobile_no' => $this->request->getPost('mobile_no'),
            'emp_p_add_house' => $this->request->getPost('perAddressHouse'),
            'emp_p_add_street' => $this->request->getPost('perAddressStreet'),
            'emp_p_add_subdivision' => $this->request->getPost('perAddressSubdivision'),
            'emp_p_add_barangay' => $this->request->getPost('perAddressBarangay'),
            'emp_p_add_municipality' => $this->request->getPost('perAddressMunicipality'),
            'emp_p_add_city' => $this->request->getPost('perAddressCity'),
            'emp_p_add_province' => $this->request->getPost('perAddressProvince'),
            'emp_p_add_zip' => $this->request->getPost('perAddressZip'),
            'emp_r_add_house' => $this->request->getPost('resAddressHouse'),
            'emp_r_add_street' => $this->request->getPost('resAddressStreet'),
            'emp_r_add_subdivision' => $this->request->getPost('resAddressSubdivision'),
            'emp_r_add_barangay' => $this->request->getPost('resAddressBarangay'),
            'emp_r_add_municipality' => $this->request->getPost('resAddressMunicipality'),
            'emp_r_add_city' => $this->request->getPost('resAddressCity'),
            'emp_r_add_province' => $this->request->getPost('resAddressProvince'),
            'emp_r_add_zip' => $this->request->getPost('resAddressZip'),
        ];

        try {
            $res = $empModel->insert($data);

            if ($res) {
                $result['status'] = 1;
                $result['message'] = "Success";
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

    public function insertEmpFamilyBg()
    {
        $famModel = new EmpFamBgModel();

        $emp_id = $this->request->getPost('empId');
        $fam_id = $this->request->getPost('famId');

        $checkData = $famModel->where('emp_id', $emp_id) //check if there is data in the emp id in database.
            ->countAllResults();

        if ($checkData > 0) {
            $data = [
                //'emp_id' => $emp_id,
                'spouse_first_name' => $this->request->getPost('spouseFirstname'),
                'spouse_middle_name' => $this->request->getPost('spouseMiddlename'),
                'spouse_surname' => $this->request->getPost('spouseSurname'),
                'spouse_occupation' => $this->request->getPost('spouseOccupation'),
                'spouse_employer_business' => $this->request->getPost('spouseEmployerBusiness'),
                'spouse_business_address' => $this->request->getPost('spouseBusinessAddress'),
                'spouse_telephone' => $this->request->getPost('spouseTelephone'),
                'father_surname' => $this->request->getPost('fatherSurname'),
                'father_middlename' => $this->request->getPost('fatherMiddlename'),
                'father_firstname' => $this->request->getPost('fatherFirstname'),
                'mother_surname' => $this->request->getPost('motherSurname'),
                'mother_firstname' => $this->request->getPost('motherFirstname'),
                'mother_middlename' => $this->request->getPost('motherMiddlename'),
            ];

            $res = $famModel->update($fam_id, $data);

            if ($res) {
                $result['status'] = 1;
                $result['message'] = "Data updated successfully";
                echo json_encode($result);
                die;
            } else {
                $result['status'] = 0;
                $result['message'] = "Update Failed";
                echo json_encode($result);
                die;
            }
        } else {
            $data = [
                'emp_id' => $emp_id,
                'spouse_first_name' => $this->request->getPost('spouseFirstname'),
                'spouse_middle_name' => $this->request->getPost('spouseMiddlename'),
                'spouse_surname' => $this->request->getPost('spouseSurname'),
                'spouse_occupation' => $this->request->getPost('spouseOccupation'),
                'spouse_employer_business' => $this->request->getPost('spouseEmployerBusiness'),
                'spouse_business_address' => $this->request->getPost('spouseBusinessAddress'),
                'spouse_telephone' => $this->request->getPost('spouseTelephone'),
                'father_surname' => $this->request->getPost('fatherSurname'),
                'father_middlename' => $this->request->getPost('fatherMiddlename'),
                'father_firstname' => $this->request->getPost('fatherFirstname'),
                'mother_surname' => $this->request->getPost('motherSurname'),
                'mother_firstname' => $this->request->getPost('motherFirstname'),
                'mother_middlename' => $this->request->getPost('motherMiddlename'),
            ];

            $res = $famModel->insert($data);

            if ($res) {
                $result['status'] = 1;
                $result['message'] = "Save Success";
                echo json_encode($result);
                die;
            } else {
                $result['status'] = 0;
                $result['message'] = "Save Failed";
                echo json_encode($result);
                die;
            }
        }
    }

    public function insertEmpFamilyBgChildren()
    {
        $childrenModel = new EmpFamBgChildrenModel();
        $data = [
            'child_name' => $this->request->getPost('childName'),
            'child_birthdate' => $this->request->getPost('childBirthdate'),
            'emp_id' => $this->request->getPost('empId'),
        ];

        $res = $childrenModel->insert($data);
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

    public function insertEligibility()
    {
        $eligModel = new EmpEligibilityModel();
        $data = [
            'elig_emp_id' => $this->request->getPost('empId'),
            'elig_board_bar' => $this->request->getPost('board'),
            'elig_rating' => $this->request->getPost('rating'),
            'elig_exam_date' => $this->request->getPost('exam_date'),
            'elig_exam_place' => $this->request->getPost('exam_place'),
            'elig_license_no' => $this->request->getPost('license_no'),
            'elig_license_date_valid' => $this->request->getPost('date_valid'),
        ];

        /*
        >>>>>>>>>>> declare variable edit in ajax.. if edit is false
        then run the save query if true run the edit query
         */
        if ($this->request->getPost('edit-elig') == "false") {
            $res = $eligModel->insert($data);
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
        } else if ($this->request->getPost('edit-elig') == "true") {
            $elig_id = $this->request->getPost('elig_id');
            $res = $eligModel->update($elig_id, $data);
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

    public function insertWorkExperience()
    {
        $workExpModel = new EmpWorkExperienceModel();

        $data = [
            'work_exp_emp_id' => $this->request->getPost('empId'),
            'work_exp_date_from' => $this->request->getPost('date_from'),
            'work_exp_date_to' => $this->request->getPost('date_to'),
            'work_exp_position' => $this->request->getPost('position'),
            'work_exp_company' => $this->request->getPost('company'),
            'work_exp_monthly_sal' => $this->request->getPost('salary'),
            'work_exp_salary_grade' => $this->request->getPost('salaryGrade'),
            'work_exp_appointment_status' => $this->request->getPost('appointmentStatus'),
            'work_exp_gov_service' => $this->request->getPost('govService'),
        ];

        if ($this->request->getPost('edit-workExp') == "false") {
            $res = $workExpModel->insert($data);
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
        } else if ($this->request->getPost('edit-workExp') == "true") {
            $workId = $this->request->getPost('work_exp_id');
            $res = $workExpModel->update($workId, $data);
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

    public function insertWorkInvolvement()
    {
        $workInvolvementModel = new EmpWorkInvolvementModel();
        $data = [
            'work_inv_emp_id' => $this->request->getPost('empId'),
            'work_inv_name_and_address' => $this->request->getPost('organization'),
            'work_inv_date_from' => $this->request->getPost('date_from'),
            'work_inv_date_to' => $this->request->getPost('date_to'),
            'work_inv_hours' => $this->request->getPost('total_hours'),
            'work_inv_position' => $this->request->getPost('position'),
        ];

        $res = $workInvolvementModel->insert($data);
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

    public function insertLearningAndDevelopment()
    {
        $ldModel = new EmpLearningDevelopmentModel();
        $data = [
            'ld_emp_id' => $this->request->getPost('empId'),
            'ld_training_program' => $this->request->getPost('title'),
            'ld_date_from' => $this->request->getPost('date_from'),
            'ld_date_to' => $this->request->getPost('date_to'),
            'ld_total_hours' => $this->request->getPost('total_hours'),
            'ld_type' => $this->request->getPost('type'),
            'ld_conducted_by' => $this->request->getPost('conducted'),
        ];

        $res = $ldModel->insert($data);
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

    public function insertOthers()
    {
        $othersModel = new EmpOthersModel();
        $data = [
            'others_emp_id' => $this->request->getPost('empId'),
            'others_special_skills_hobbies' => $this->request->getPost('special_skills'),
            'others_non_academic_distinctions' => $this->request->getPost('recognition'),
            'others_organization' => $this->request->getPost('organization'),
        ];

        $res = $othersModel->insert($data);
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

    public function loadEmp()
    {
        $empModel = new EmployeeModel();
        $data['emp'] = $empModel->findAll();
        return $this->response->setJSON($data);
    }

    public function loadUser()
    {
        $userModel = new UsersModel();
        $data['user'] = $userModel->findAll();
        return $this->response->setJSON($data);
    }

    public function loadWorkExperience()
    {
        $workExpModel = new EmpWorkExperienceModel();

        $empId = $this->request->getGet('empId');
        $data['work'] = $workExpModel
            ->where('work_exp_emp_id', $empId)
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function viewEachEmp()
    {
        $empModel = new EmployeeModel();
        $deptMdl = new EmpDepartmentModel();
        $empCatMdl = new EmployeeCategoryModel();
        $progMdl = new EmpProgramModel();

        $empId = $this->request->getGet('emp_id');

        $data['emp'] = $empModel->where('emp_id', $empId)->first();

        $data['cat'] = $empCatMdl
            ->join('employee_t', 'employee_t.emp_id = employee_category_tbl.emp_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = employee_category_tbl.cat_id', 'left')
            ->where('employee_category_tbl.emp_id', $empId)
            // ->where('employee_category_tbl.is_current', true)
            ->first();

        $data['dept'] = $deptMdl
            ->join('department_tbl', 'department_tbl.dept_id = employee_department_tbl.dept_id', 'left')
            ->where('employee_department_tbl.emp_id', $empId)
            // ->where('employee_department_tbl.is_current', true)
            ->first();

        $data['prog'] = $progMdl
            ->join('program_tbl', 'program_tbl.prog_id = employee_program_tbl.prog_id', 'left')
            ->where('employee_program_tbl.emp_id', $empId)
            // ->where('employee_program_tbl.is_current', true)
            ->first();
        return $this->response->setJSON($data);
    }

    public function refreshProgram()
    {
        $progMdl = new EmpProgramModel();
        $empId = $this->request->getGet('emp_id');
        $data['prog'] = $progMdl
            ->join('program_tbl', 'program_tbl.prog_id = employee_program_tbl.prog_id', 'left')
            ->where('employee_program_tbl.emp_id', $empId)
            // ->where('employee_program_tbl.is_current', true)
            ->first();
        return $this->response->setJSON($data);
    }

    public function refreshCategory()
    {
        $catMdl = new EmployeeCategoryModel();
        $empId = $this->request->getGet('emp_id');

        $data['cat'] = $catMdl
            ->join('employee_t', 'employee_t.emp_id = employee_category_tbl.emp_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = employee_category_tbl.cat_id', 'left')
            ->where('employee_category_tbl.emp_id', $empId)
            ->first();
        return $this->response->setJSON($data);
    }



    public function setCategory()
    {
        $catMdl = new EmployeeCategoryModel();
        $update_ref = $this->request->getPost('update_ref');
        $emp_cat_id = $this->request->getPost('emp_cat_id');
        $emp_id = $this->request->getPost('emp_id');

        if ($update_ref == 0) {
            $data = [
                'cat_id' => $this->request->getPost('cat_id'),
                'emp_id' => $emp_id,
            ];
            $res = $catMdl->insert($data);
            if ($res) {
                $result['status'] = 1;
                echo json_encode($result);
                die;
            } else {
                $result['status'] = 0;
                echo json_encode($result);
                die;
            }
        } else {
            $data = [
                'cat_id' => $this->request->getPost('cat_id'),
            ];
            $res = $catMdl->set($data)->where('emp_cat_id', $emp_cat_id)->update();
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

    }

    public function loadEmpCategory()
    {
        $catMdl = new EmployeeCategoryModel();
        $emp_id = $this->request->getGet('emp_id');
        $data['cat'] = $catMdl
            ->join('category_tbl', 'category_tbl.cat_id = employee_category_tbl.cat_id', 'left')
            ->where('employee_category_tbl.emp_id', $emp_id)->first();
        return $this->response->setJSON($data);
    }

    public function deleteEmp()
    {
        $empModel = new EmployeeModel();
        $empId = $this->request->getPost('emp_id');
        // $empImage = $this->request->getPost('emp_image');
        //    $empModel->delete($empId);

        $res = $empModel->delete($empId);
        // unlink('upload/' . $empImage);
        if ($res) {
            $result['status'] = 1;
            $result['message'] = "data deleted succesfully";
            echo json_encode($result);
            die;
        } else {
            $result['status'] = 0;
            $result['message'] = "data failed to delete";
            echo json_encode($result);
            die;
        }
    }

    public function deleteChild()
    {
        $childModel = new EmpFamBgChildrenModel();
        $child_id = $this->request->getPost('c_id');
        //    $childModel->delete($child_id);

        $res = $childModel->delete($child_id);
        //    unlink('upload/'.$empImage);
        if ($res) {
            $result['status'] = 1;
            $result['message'] = "data deleted succesfully";
            echo json_encode($result);
            die;
        } else {
            $result['status'] = 0;
            $result['message'] = "data failed to delete";
            echo json_encode($result);
            die;
        }
    }

    public function deleteEducation()
    {
        $educModel = new EmpEducModel();
        $educId = $this->request->getPost('educ_id');

        //$educModel->delete($educId);
        $res = $educModel->delete($educId);

        if ($res) {
            $result['status'] = 1;
            $result['message'] = "data deleted succesfully";
            echo json_encode($result);
            die;
        } else {
            $result['status'] = 0;
            $result['message'] = "data failed to delete";
            echo json_encode($result);
            die;
        }
    }

    public function deleteEligibility()
    {
        $eligModel = new EmpEligibilityModel();
        $eligId = $this->request->getPost('elig_id');

        //$educModel->delete($educId);
        $res = $eligModel->delete($eligId);

        if ($res) {
            $result['status'] = 1;
            $result['message'] = "data deleted succesfully";
            echo json_encode($result);
            die;
        } else {
            $result['status'] = 0;
            $result['message'] = "data failed to delete";
            echo json_encode($result);
            die;
        }
    }

    public function deleteWorkExperience()
    {
        $workExpModel = new EmpWorkExperienceModel();
        $workId = $this->request->getPost('workId');

        //$educModel->delete($educId);
        $res = $workExpModel->delete($workId);

        if ($res) {
            $result['status'] = 1;
            $result['message'] = "data deleted succesfully";
            echo json_encode($result);
            die;
        } else {
            $result['status'] = 0;
            $result['message'] = "data failed to delete";
            echo json_encode($result);
            die;
        }
    }

    public function loadEducation()
    {
        $educModel = new EmpEducModel();

        $empId = $this->request->getGet('empId');

        $data['educ'] = $educModel
            ->where('educ_bg_emp_id', $empId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function editEducation()
    {

        $educModel = new EmpEducModel();

        $educ_id = $this->request->getGet('educId');

        $data['educ'] = $educModel
            ->where('educ_bg_id', $educ_id)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function insertEducation()
    {
        $educModel = new EmpEducModel();
        $data = [
            'educ_bg_level' => $this->request->getPost('educ_level'),
            'educ_bg_school' => $this->request->getPost('educ_school'),
            'educ_bg_degree' => $this->request->getPost('educ_degree'),
            'educ_bg_from' => $this->request->getPost('educ_date_from'),
            'educ_bg_to' => $this->request->getPost('educ_date_to'),
            'educ_bg_units' => $this->request->getPost('educ_units'),
            'educ_bg_year_graduated' => $this->request->getPost('educ_year_graduated'),
            'educ_bg_scholarship_honors' => $this->request->getPost('educ_scholarship'),
            'educ_bg_emp_id' => $this->request->getPost('empId'),
        ];
        /*
        >>>>>>>>>>> declare variable edit in ajax.. if edit is false
        then run the save query if true run the edit query
         */
        if ($this->request->getPost('edit-educ') == "false") {

            $res = $educModel->insert($data);
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
        } else if ($this->request->getPost('edit-educ') == "true") {
            $educId = $this->request->getPost('educ_id');
            $res = $educModel->update($educId, $data);
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

    public function updateEmp()
    {
        $empModel = new EmployeeModel();

        $data = [
            'job_description' => $this->request->getPost('job_description'),
            'emp_school_id' => $this->request->getPost('inputEmpSchoolId'),
            'emp_fname' => $this->request->getPost('inputFirstName'),
            'emp_mname' => $this->request->getPost('inputMiddleName'),
            'emp_lname' => $this->request->getPost('inputLastName'),
            'emp_gender' => $this->request->getPost('inputGender'),
            'emp_marital_status' => $this->request->getPost('inputMaritalStatus'),
            'emp_citizenship' => $this->request->getPost('inputCitizenship'),
            'emp_citizen_by' => $this->request->getPost('inputCitizenBy'),
            'emp_country' => $this->request->getPost('inputCountry'),
            'emp_age' => $this->request->getPost('inputAge'),
            'emp_birthdate' => $this->request->getPost('inputBirthdate'),
            'emp_place_of_birth' => $this->request->getPost('inputBirthplace'),
            'emp_religion' => $this->request->getPost('inputReligion'),
            'emp_blood_type' => $this->request->getPost('inputBloodType'),
            'emp_height' => $this->request->getPost('inputHeight'),
            'emp_weight' => $this->request->getPost('inputWeight'),
            'emp_tin' => $this->request->getPost('inputTin'),
            'emp_sss' => $this->request->getPost('inputSss'),
            'emp_gsis' => $this->request->getPost('inputGsis'),
            'emp_pagibig' => $this->request->getPost('inputPagibig'),
            'emp_email' => $this->request->getPost('inputEmail'),
            'emp_prc_id' => $this->request->getPost('inputPrc'),
            'emp_prc_issuance_date' => $this->request->getPost('inputIssuanceDate'),
            'emp_p_add_street' => $this->request->getPost('inputPerStreet'),
            'emp_p_add_barangay' => $this->request->getPost('inputPerBarangay'),
            'emp_p_add_municipality' => $this->request->getPost('inputPerMunicipality'),
            'emp_p_add_city' => $this->request->getPost('inputPerCity'),
            'emp_p_add_province' => $this->request->getPost('inputPerProvince'),
            'emp_c_add_street' => $this->request->getPost('inputCurStreet'),
            'emp_c_add_barangay' => $this->request->getPost('inputCurBarangay'),
            'emp_c_add_municipality' => $this->request->getPost('inputCurMunicipality'),
            'emp_c_add_city' => $this->request->getPost('inputCurCity'),
            'emp_c_add_province' => $this->request->getPost('inputCurProvince'),
        ];

        $emp_id = $this->request->getPost('inputEmpId');

        $res = $empModel->update($emp_id, $data);

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

    public function loadEligibility()
    {
        $eligModel = new EmpEligibilityModel();

        $empId = $this->request->getGet('empId');

        $data['elig'] = $eligModel
            ->where('elig_emp_id', $empId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function editEligibility()
    {

        $eligModel = new EmpEligibilityModel();

        $elig_id = $this->request->getGet('eligId');

        $data['elig'] = $eligModel
            ->where('elig_id', $elig_id)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function editWorkExperience()
    {

        $workExpModel = new EmpWorkExperienceModel();

        $workId = $this->request->getGet('workId');

        $data['work'] = $workExpModel
            ->where('work_exp_id', $workId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function loadWorkInvolvement()
    {
        $workInv = new EmpWorkInvolvementModel();

        $empId = $this->request->getGet('empId');

        $data['involvement'] = $workInv
            ->where('work_inv_emp_id', $empId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function loadLearningAndDevelopment()
    {
        $ldModel = new EmpLearningDevelopmentModel();

        $empId = $this->request->getGet('empId');

        $data['ld'] = $ldModel
            ->where('ld_emp_id', $empId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function loadOthers()
    {
        $othersModel = new EmpOthersModel();

        $empId = $this->request->getGet('empId');
        $data['others'] = $othersModel
            ->where('others_emp_id', $empId)
            ->findAll();
        return $this->response->setJSON($data);
    }

    public function addEmpDepartment()
    {
        $empDeptMdl = new EmpDepartmentModel();
        $data = [
            'emp_id' => $this->request->getPost('emp_id'),
            'dept_id' => $this->request->getPost('department'),
            'date_assigned' => $this->request->getPost('date_assigned'),
            'is_current' => false,
        ];

        $res = $empDeptMdl->insert($data);
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

    public function getDepartment()
    {
        $depMdl = new DepartmentModel();
        $empDeptMdl = new EmpDepartmentModel();
        $emp_id = $this->request->getGet('emp_id');
        $data['dept'] = $depMdl->findAll();
        $data['emp_dept'] = $empDeptMdl
            ->join('department_tbl', 'department_tbl.dept_id = employee_department_tbl.dept_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = department_tbl.dept_category', 'left')
            ->join('employee_t', 'employee_t.emp_id = employee_department_tbl.emp_id', 'left')
            ->select('department_tbl.*')
            ->select('employee_department_tbl.*')
            ->select('category_tbl.*')
            ->select('employee_t.emp_fname')
            ->select('employee_t.emp_mname')
            ->select('employee_t.emp_lname')
            ->where('employee_department_tbl.emp_id', $emp_id)->find();
        return $this->response->setJSON($data);
    }

    public function addEmpProgram()
    {

        $empProgMdl = new EmpProgramModel();

        $emp_id = $this->request->getPost('emp_id');

        $checkIfExist = $empProgMdl->where('emp_id', $emp_id)->countAllResults();

        if ($checkIfExist > 0) {
            $result['status'] = 2;
            echo json_encode($result);
            die;
        } else {
            $data = [
                'emp_id' => $emp_id,
                'prog_id' => $this->request->getPost('program'),
                'sy_id' => $this->request->getPost('sy_id'),
            ];

            $res = $empProgMdl->insert($data);
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

    }

    public function updateEmpProg()
    {
        $empProgMdl = new EmpProgramModel();

        $empemp_prog_id_id = $this->request->getGet('emp_prog_id');

        $data = [
            'prog_id' => $this->request->getGet('prog_id'),
        ];

        try {
            $result['pic'] = $progMdl->update($prog_id, $data);
            if ($result) {
                $result['status'] = 1;
                $result['randomFileName'] = $randomFileName;
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

    public function deleteEmpProg()
    {
        $empProgMdl = new EmpProgramModel();

        $emp_prog_id = $this->request->getGet('emp_prog_id');
        try {
            $result['pic'] = $empProgMdl->where('emp_prog_id', $emp_prog_id)->delete();
            if ($result) {
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

    public function getProgram()
    {
        $empProgMdl = new EmpProgramModel();
        $progMdl = new ProgramModel();
        $syMdl = new SchoolYearModel();
        $data['sy'] = $syMdl->where('is_active', true)->find();
        $emp_id = $this->request->getGet('emp_id');
        $data['prog'] = $progMdl->findAll();
        $data['emp_prog'] = $empProgMdl
            ->join('program_tbl', 'program_tbl.prog_id = employee_program_tbl.prog_id', 'left')
            ->join('category_tbl', 'category_tbl.cat_id = program_tbl.cat_id', 'left')
            ->join('employee_t', 'employee_t.emp_id = employee_program_tbl.emp_id', 'left')
            ->select('program_tbl.*')
            ->select('employee_program_tbl.*')
            ->select('category_tbl.cat_title')
            ->where('employee_program_tbl.emp_id', $emp_id)->find();

        return $this->response->setJSON($data);
    }


    public function updateCurrentDept()
    {
        $empDeptMdl = new EmpDepartmentModel();
        $emp_dept_id = $this->request->getGet('dept_id');
        $emp_id = $this->request->getGet('emp_id');

        $res = $empDeptMdl->set('is_current', false)->where('emp_id', $emp_id)->update();
        $res = $empDeptMdl->set('is_current', true)
            ->where('emp_dept_id', $emp_dept_id)->update();
        if ($res) {
            $rslt['status'] = 1;
            echo json_encode($rslt);
            die;
        }
    }

    public function updateCurrentCategory()
    {
        $catMdl = new EmployeeCategoryModel();
        $emp_cat_id = $this->request->getGet('cat_id');
        $emp_id = $this->request->getGet('emp_id');

        try {
            $res = $catMdl->set('is_current', false)->where('emp_id', $emp_id)->update();
            $res = $catMdl->set('is_current', true)->where('emp_cat_id', $emp_cat_id)->update();
            if ($res) {
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

    public function updateCurrentProg()
    {
        $empProgMdl = new EmpProgramModel();
        $secMdl = new AdviseryModel();
        $emp_prog_id = $this->request->getGet('emp_prog_id');
        $emp_id = $this->request->getGet('emp_id');
        $sy_id = $this->request->getGet('sy_id');

        $check_advisery = $secMdl
            ->where('adviser_id', $emp_id)
            ->where('sy_id', $sy_id)
            ->countAllResults();
        if ($check_advisery > 0) {
            $rslt['status'] = 2;
            echo json_encode($rslt);
            die;
        } else {
            $res = $empProgMdl->set('is_current', false)->where('emp_id', $emp_id)->update();
            $res = $empProgMdl->set('is_current', true)
                ->where('emp_prog_id', $emp_prog_id)->update();
            if ($res) {
                $rslt['status'] = 1;
                echo json_encode($rslt);
                die;
            } else {
                $rslt['status'] = 0;
                echo json_encode($rslt);
                die;
            }

        }

    }

    public function updateProgramHead()
    {
        $empProgMdl = new EmpProgramModel();
        $emp_prog_id = $this->request->getGet('emp_prog_id');
        $prog_id = $this->request->getGet('prog_id');

        $has_ph = $empProgMdl
            ->where('prog_id', $prog_id)
            ->where('is_ph', true)->countAllResults();
        if ($has_ph > 0) {
            $result['status'] = 2;
            $result['message'] = "PH already exist";
            echo json_encode($result);
            die;
        } else {
            $res = $empProgMdl->set('is_ph', true)
                ->where('emp_prog_id', $emp_prog_id)->update();
            if ($res) {
                $rslt['status'] = 1;
                echo json_encode($rslt);
                die;
            } else {
                $rslt['status'] = 0;
                echo json_encode($rslt);
                die;
            }
        }

    }

    public function addPlantilla()
    {

    }

}
