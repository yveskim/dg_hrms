<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpSkillsModel extends Model
{
  protected $table      = 'employee_skills_tbl';
  protected $primaryKey = 'skills_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                             'skills_emp_id', 'special_skills_hobbies','non_academic_distinctions',
                             'skills_organization'
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
