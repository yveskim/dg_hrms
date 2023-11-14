<?php

 namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
  protected $table      = 'department_tbl';
  protected $primaryKey = 'dept_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'dept_title',
                              'dept_head',
                              'dept_location',
                              'dept_category'
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
