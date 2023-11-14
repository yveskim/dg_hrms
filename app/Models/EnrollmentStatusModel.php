<?php

 namespace App\Models;

use CodeIgniter\Model;

class EnrollmentStatusModel extends Model
{
  protected $table      = 'enrollment_status_tbl';
  protected $primaryKey = 'en_stat_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                              'en_id', 
                              'sy_id',  
                              'submitted_sf9',  
                              'submitted_coc',  
                              'submitted_psa',    
                              'enrollment_status',  
                              'is_als',  
                              'is_pssn',  
                              'remarks', 
                              'grade_level_id',  
                              'semester',  
                              'enrolled_by', 
                              'enrolled_at', 
                              'updated_at', 
                              // 'deleted_at', 
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'enrolled_at';
  protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
