<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpStationModel extends Model
{
  protected $table      = 'emp_station_tbl';
  protected $primaryKey = 'emp_station_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'emp_id',
                            'station_id',
                            'date_started',
                            'date_end',
                            'assigned_by', 
                            'is_current', 
                            'created_at',
                            'updated_at',
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;





}


?>
