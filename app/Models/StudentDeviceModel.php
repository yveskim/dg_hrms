<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentDeviceModel extends Model
{
  protected $table      = 'student_devices_tbl';
  protected $primaryKey = 'dev_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'dev_id', 
                              'dev_name', 
                              'dev_type', 
                              'is_functioning', 
                              'stud_id' 
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
