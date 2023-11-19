<?php

 namespace App\Models;

use CodeIgniter\Model;

class StationModel extends Model
{
  protected $table      = 'station_tbl';
  protected $primaryKey = 'station_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'st_title',
                            'st_office_id',
                            'st_office_address',
                            'st_branch',
                            'st_created_by',
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
