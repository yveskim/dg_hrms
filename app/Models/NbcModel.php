<?php

 namespace App\Models;

use CodeIgniter\Model;

class NbcModel extends Model
{
  protected $table      = 'nbc_tbl';
  protected $primaryKey = 'nbc_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'nbc_no',
                            'nbc_title',
                            'tranche',
                            'effectivity_date',
                            'processed_by',
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
