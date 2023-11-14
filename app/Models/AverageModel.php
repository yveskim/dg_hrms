<?php

 namespace App\Models;

use CodeIgniter\Model;

class AverageModel extends Model
{
  protected $table      = 'average_tbl';
  protected $primaryKey = 'ave_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'ave_stud_id', 
                              'ave_grade_level',
                              'ave_semester',
                              'ave_sy',
                              'average',
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
