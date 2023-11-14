<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsSectionAdviserModel extends Model
{
  protected $table      = 'shs_section_adviser_tbl';
  protected $primaryKey = 'shs_adv_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'shs_adv_emp_id', 
                              'shs_co_adviser_id', 
                              'shs_adv_section_id',  
                              'shs_adv_sy',  
                              'shs_adv_semester',  
                              'created_at',  
                              'updated_at',  
                              'deleted_at'
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
