<?php

 namespace App\Models;

use CodeIgniter\Model;

class DepartmentHeadModel extends Model
{
  protected $table      = 'department_head_tbl';
  protected $primaryKey = 'dept_head_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'title',
                              'dh_dept_id',
                              'head_id',
                              'sy_id',
                              'memo_no',
                              'created_at',
                              'updated_at'
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
