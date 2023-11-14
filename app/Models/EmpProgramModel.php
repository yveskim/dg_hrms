<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpProgramModel extends Model
{
  protected $table      = 'employee_program_tbl';
  protected $primaryKey = 'emp_prog_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'emp_id',
                            'prog_id',
                            'sy_id',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
