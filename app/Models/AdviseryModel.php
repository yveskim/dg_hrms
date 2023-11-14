<?php

 namespace App\Models;

use CodeIgniter\Model;

class AdviseryModel extends Model
{
  protected $table      = 'advisery_tbl';
  protected $primaryKey = 'adv_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'sec_det_id', 
                              'adviser_id',  
                              'sy_id',  
                              'created_at', 
                              'updated_at', 
                              'deleted_at', 
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
