<?php

 namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
  protected $table      = 'employee_position_tbl';
  protected $primaryKey = 'emp_pos_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'emp_pos_id', 
                              'emp_id',
                              'plantila_id',
                              'step',
                              'category_id',
                              'date_assigned',
                              'is_current',
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
