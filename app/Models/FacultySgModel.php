<?php

 namespace App\Models;

use CodeIgniter\Model;

class FacultySgModel extends Model
{
  protected $table      = 'faculty_subject_group_tbl';
  protected $primaryKey = 'fsg_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'fsg_sg_id', 
                              'fsg_emp_id',  
                              'fsg_sy_id',
                              'fsg_assigned_by',
                              'created_at',
                              'updated_at'
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
