<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmploymentStatusModel extends Model
{
  protected $table      = 'employment_status_tbl';
  protected $primaryKey = 'emp_stat_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'emp_stat_id', 
                              'emp_id', 
                              'emp_status', 
                              'plantilla_id', 
                              'step', 
                              'date_assigned', 
                              'is_retired', 
                              'retirement_date', 
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
