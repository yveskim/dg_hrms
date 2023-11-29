<?php

 namespace App\Models;

use CodeIgniter\Model;

class ServiceRecordModel extends Model
{
  protected $table      = 'service_record_tbl';
  protected $primaryKey = 'sr_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                              'sr_emp_id',
                              'sr_nbc_id',
                              'sr_plantilla_id',
                              'sr_step',
                              'sr_status',
                              'sr_is_seperated',
                              'sr_seperation_date',
                              'sr_seperation_cause',
                              'leave_absense_wo_pay',
                              'sr_date_started',
                              'sr_date_end',
                              'sr_remarks',
                              'sr_processed_by',
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
