<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsSectionModel extends Model
{
  protected $table      = 'shs_section_tbl';
  protected $primaryKey = 'shs_sec_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'shs_sec_title', 
                              'shs_sec_description', 
                              'shs_grade_level',  
                              'strand_id',  
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
