<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpFamBgChildrenModel extends Model
{
  protected $table      = 'employee_children_t';
  protected $primaryKey = 'child_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'child_id', 'child_name', 'child_birthdate', 'emp_id'
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
