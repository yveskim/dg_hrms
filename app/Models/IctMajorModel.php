<?php

 namespace App\Models;

use CodeIgniter\Model;

class IctMajorModel extends Model
{
  protected $table      = 'tvl_ict_major_t';
  protected $primaryKey = 'ict_code';
  protected $useAutoIncrement = false;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'ict_code',
                            'ict_title',
                            'ict_description',
                            'ict_is_disabled'
                          ];

//   protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
