<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpEducModel extends Model
{
  protected $table      = 'educational_bg_t';
  protected $primaryKey = 'educ_bg_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'educ_bg_level', 
                            'educ_bg_school', 
                            'educ_bg_degree',
                            'educ_bg_from', 
                            'educ_bg_to', 
                            'educ_bg_units',
                            'educ_bg_year_graduated', 
                            'educ_bg_scholarship_honors', 
                            'educ_bg_emp_id'
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
