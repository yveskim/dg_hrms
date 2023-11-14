<?php

 namespace App\Models;

use CodeIgniter\Model;

class testModel extends Model
{
  protected $table      = 'admission_test_t';
  protected $primaryKey = 'at_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'at_id', 'at_testname',
                            'at_testdata'
                            /*'stud_birthdate', 'stud_gender',
                            'stud_phone', 'stud_email',
                            'stud_street', 'stud_subdivision',
                            'stud_barangay', 'stud_municipality',
                            'stud_city', 'stud_province',
                            'stud_academic_year', 'stud_academic_type',
                            'stud_program', 'stud_last_school_name',
                            'stud_last_school_attended',
                            'stud_last_school_address', 'stud_form138',
                            'stud_psa'*/
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
