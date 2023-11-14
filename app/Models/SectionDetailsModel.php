<?php

 namespace App\Models;

use CodeIgniter\Model;

class SectionDetailsModel extends Model
{
  protected $table      = 'section_details_tbl';
  protected $primaryKey = 'sec_det_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'sec_det_id', 
                              'sec_title', 
                              'grade_level_id',  
                              'prog_id',  
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
