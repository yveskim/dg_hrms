<?php

 namespace App\Models;

use CodeIgniter\Model;

class SalaryScheduleModel extends Model
{
  protected $table      = 'salary_schedule_tbl';
  protected $primaryKey = 'sal_sched_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'nbc_id',
                            'salary_grade',
                            'step',
                            'amount',
                          ];

  // protected $useTimestamps = true;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;





}


?>
