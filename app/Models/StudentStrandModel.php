<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentStrandModel extends Model
{
  protected $table      = 'student_strands_tbl';
  protected $primaryKey = 'stud_strand_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = false;
  protected $allowedFields = [
                              's_strand_id', 
                              's_strand_stud_id', 
                              's_sy_id',   
                              'strand_sem_id',   
                              's_is_active',    
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
