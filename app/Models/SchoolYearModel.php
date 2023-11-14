<?php

 namespace App\Models;

use CodeIgniter\Model;

class SchoolYearModel extends Model
{
  protected $table      = 'school_year_tbl';
  protected $primaryKey = 'sy_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'sy_id',
                            'school_year',
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
