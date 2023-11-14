<?php

 namespace App\Models;

use CodeIgniter\Model;

class SubjectGroupModel extends Model
{
  protected $table      = 'subject_group_tbl';
  protected $primaryKey = 'sg_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'sg_subject', 
                              'sg_group',  
                              'sg_description'
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
