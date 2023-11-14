<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpDepartmentModel extends Model
{
  protected $table      = 'employee_department_tbl';
  protected $primaryKey = 'emp_dept_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'emp_id',
                              'dept_id',
                              'sy_id',
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
