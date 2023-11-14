<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpReferenceModel extends Model
{
  protected $table    = 'emp_reference_tbl';
  protected $primaryKey = 'ref_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                            'ref_emp_id',
                            'ref_name',
                            'ref_address',
                            'ref_contact',
                          ];

// protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
