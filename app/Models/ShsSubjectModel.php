<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsSubjectModel extends Model
{
  protected $table      = 'shs_subject_tbl';
  protected $primaryKey = 'shs_sub_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'subject_title', 
                              'subject_description', 
                              'subject_category',  
                              'subject_specialized',  
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
