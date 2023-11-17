<?php

 namespace App\Models;

use CodeIgniter\Model;

class FiscalYearModel extends Model
{
  protected $table      = 'fiscal_year_tbl';
  protected $primaryKey = 'year_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'fiscal_year',
                            'is_active',
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
