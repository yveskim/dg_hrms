<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpFamBgModel extends Model
{
  protected $table      = 'family_bg_t';
  protected $primaryKey = 'fam_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'emp_id', 'spouse_first_name', 'spouse_middle_name',
                            'spouse_surname', 'spouse_occupation', 'spouse_employer_business',
                            'spouse_business_address', 'spouse_telephone',
                            'father_surname', 'father_middlename',
                            'father_firstname',  'mother_surname',
                            'mother_firstname', 'mother_middlename'
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
