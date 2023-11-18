<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
  protected $table      = 'employee_t';
  protected $primaryKey = 'emp_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'job_description',
                              'emp_image', 'emp_fname',
                              'emp_mname', 'emp_lname',
                              'emp_gender', 'emp_marital_status',
                              'emp_citizenship', 'emp_citizen_by', 'emp_country',
                              'emp_birthdate', 'emp_place_of_birth', 'emp_religion',
                              'emp_blood_type', 'emp_height', 'emp_weight',
                              'emp_tin', 'emp_sss', 'emp_gsis', 'emp_pagibig', 'emp_philhealth',
                              'emp_email', 'emp_p_add_house', 'emp_p_add_subdivision', 'emp_agency_employee_no',
                              'emp_p_add_street', 'emp_p_add_barangay', 'emp_p_add_municipality',
                              'emp_p_add_city', 'emp_p_add_province', 'emp_p_add_zip', 'emp_r_add_house',
                              'emp_r_add_street', 'emp_r_add_subdivision', 'emp_r_add_barangay',
                              'emp_r_add_municipality', 'emp_telephone_no', 'emp_mobile_no',
                              'emp_r_add_city', 'emp_r_add_province', 'emp_r_add_zip',
                              'created_at', 'updated_at', 'deleted_at'
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
