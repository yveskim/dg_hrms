<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentProgramModel extends Model
{
  protected $table      = 'student_program_tbl';
  protected $primaryKey = 'stud_prog_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = false;
  protected $allowedFields = [
                              'stud_prog_id', 
                              'prog_id', 
                              'stud_id',   
                              'is_active',  
                              'sy_id',  
                              'created_by', 
                              'created_at', 
                              'updated_at', 
                              // 'deleted_at', 
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
