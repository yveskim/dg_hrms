<?php

 namespace App\Models;

use CodeIgniter\Model;

class ApplicationStatus extends Model
{
  protected $table      = 'application_status';
  protected $primaryKey = 'application_status_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'status_info',
                            'application_id',
                            'created_at',
                            'updated_at',
                            'validated_by'
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
