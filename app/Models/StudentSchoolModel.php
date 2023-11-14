<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentSchoolModel extends Model
{
  protected $table      = 'student_school_tbl';
  protected $primaryKey = 'sch_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'sch_id', 
                              'stud_id', 
                              'grade_level_completed', 
                              'school_year', 
                              'school_name', 
                              'school_id', 
                              'school_type', 
                              'school_address', 
                              'adviser_name', 
                              'returning_student' 
                            ];

  // protected $useTimestamps = true;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
