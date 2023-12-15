<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmployeePositionsModel extends Model
{
  protected $table      = 'employment_position_tbl';
  protected $primaryKey = 'emp_pos_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'pos_title',
                              'category'
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
