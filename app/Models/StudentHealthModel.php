<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentHealthModel extends Model
{
  protected $table      = 'student_health_tbl';
  protected $primaryKey = 'health_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'health_condition', 
                              'health_type', 
                              'en_id', 
                              'remarks' 
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
