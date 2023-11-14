<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpEligibilityModel extends Model
{
  protected $table      = 'eligibility_t';
  protected $primaryKey = 'elig_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'elig_id', 'elig_emp_id', 'elig_board_bar', 'elig_rating',
                            'elig_exam_date', 'elig_exam_place', 'elig_license_no', 'elig_license_date_valid'
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
