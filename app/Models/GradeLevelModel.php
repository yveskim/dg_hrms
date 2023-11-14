<?php

 namespace App\Models;

use CodeIgniter\Model;

class GradeLevelModel extends Model
{
  protected $table      = 'grade_level_tbl';
  protected $primaryKey = 'grade_level_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'grade_level_id', 
                              'grade_level'
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
