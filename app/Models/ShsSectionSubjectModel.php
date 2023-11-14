<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsSectionSubjectModel extends Model
{
  protected $table      = 'shs_section_subject_tbl';
  protected $primaryKey = 'sec_sub_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'section_id', 
                              'subject_id', 
                              'sub_sy',  
                              'sub_sem',  
                              'created_at',  
                              'updated_at',  
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
