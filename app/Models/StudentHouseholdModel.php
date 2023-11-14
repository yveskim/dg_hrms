<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentHouseholdModel extends Model
{
  protected $table      = 'household_members_tbl';
  protected $primaryKey = 'hm_id';
  protected $useAutoIncrement = true;
  // protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'stud_id', 
                              'sy_id', 
                              'grade', 
                              'complete_name',
                              'hm_relationship'
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
