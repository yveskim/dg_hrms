<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmployeeCategoryModel extends Model
{
  protected $table      = 'employee_category_tbl';
  protected $primaryKey = 'emp_cat_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'emp_cat_id', 
                              'cat_id',
                              'emp_id',
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
