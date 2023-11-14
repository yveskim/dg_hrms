<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpLearningDevelopmentModel extends Model
{
  protected $table      = 'learning_development_t';
  protected $primaryKey = 'ld_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'ld_id', 'ld_emp_id', 'ld_training_program', 'ld_date_from',
                            'ld_date_to', 'ld_total_hours', 'ld_type', 'ld_conducted_by'
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
