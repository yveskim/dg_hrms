<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsStudentSectionModel extends Model
{
  protected $table      = 'shs_student_section_tbl';
  protected $primaryKey = 'shs_stud_sec_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'shs_stud_id', 
                              'shs_sec_id',  
                              'shs_stud_sec_sy',  
                              'shs_student_sem',  
                              'shs_assigned_by',  
                              'created_at', 
                              'updated_at', 
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
