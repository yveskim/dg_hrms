<?php

 namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
  protected $table      = 'program_tbl';
  protected $primaryKey = 'prog_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'prog_id',
                            'program_title',
                            'description',
                            'program_logo',
                            'cat_id',
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
