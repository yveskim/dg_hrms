<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpWorkInvolvementModel extends Model
{
  protected $table      = 'emp_work_involvement_t';
  protected $primaryKey = 'work_inv_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'work_inv_emp_id', 'work_inv_name_and_address', 'work_inv_date_from', 'work_inv_date_to',
                            'work_inv_hours', 
                            'work_inv_position'
                          ];

// protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
