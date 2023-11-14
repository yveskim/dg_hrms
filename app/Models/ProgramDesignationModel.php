<?php

 namespace App\Models;

use CodeIgniter\Model;

class ProgramDesignationModel extends Model
{
  protected $table      = 'program_designation_tbl';
  protected $primaryKey = 'des_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'des_id',
                            'program_head',
                            'program_id',
                            'date_assigned',
                            'memo_no',
                            'created_at',
                            'updated_at',
                            'deleted_at',
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
