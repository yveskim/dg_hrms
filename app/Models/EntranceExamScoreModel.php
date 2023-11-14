<?php

 namespace App\Models;

use CodeIgniter\Model;

class EntranceExamScoreModel extends Model
{
  protected $table      = 'entrance_exam_tbl';
  protected $primaryKey = 'exam_score_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'exam_score_id',
                            'score_application_id',
                            'score',
                            'created_at',
                            'updated_at',
                            'encoded_by'
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

                      
}

?>
