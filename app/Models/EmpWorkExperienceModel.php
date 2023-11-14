<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpWorkExperienceModel extends Model
{
  protected $table      = 'emp_work_experience_t';
  protected $primaryKey = 'work_exp_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'work_exp_id', 'work_exp_emp_id', 'work_exp_date_from', 'work_exp_date_to',
                            'work_exp_position', 'work_exp_company', 'work_exp_monthly_sal', 'work_exp_salary_grade',
                            'work_exp_appointment_status', 'work_exp_gov_service'
                          ];

// protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
