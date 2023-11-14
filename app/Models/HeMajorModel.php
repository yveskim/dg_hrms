<?php

 namespace App\Models;

use CodeIgniter\Model;

class HeMajorModel extends Model
{
  protected $table      = 'tvl_he_major_t';
  protected $primaryKey = 'he_code';
  protected $useAutoIncrement = false;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'he_code',
                            'he_title',
                            'he_description',
                            'he_is_disabled'
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
