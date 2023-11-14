<?php

 namespace App\Models;

use CodeIgniter\Model;

class ProgramHeadModel extends Model
{
  protected $table      = 'program_head_tbl';
  protected $primaryKey = 'ph_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'ph_id',
                            'p_id',
                            'ph_emp_id',
                            'memo_no',
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
