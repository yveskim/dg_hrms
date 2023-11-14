<?php

 namespace App\Models;

use CodeIgniter\Model;

class ApplicationTransfereeModel extends Model
{
  protected $table      = 'application_transferee_tbl';
  protected $primaryKey = 'transferee_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'applicant_id',
                            'grade_level',
                            'academic_year',
                            'last_school_year',
                            'last_school_attended',
                            'last_school_address',
                            'is_lwd',
                            'computer',
                            'smart_phone',
                            'internet',
                            'accessories',
                            'program',
                            'general_average_1st',
                            'general_average_2nd',
                            'remarks',
                            'is_validated',
                            'created_at',
                            'updated_at'
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

                        
  function getExistingApp(){
    $academic_year = '2023-2024';
    return
      $this->db->table('application_transferee_tbl')
        ->where('academic_year', $academic_year)
        ->countAllResults();
  }


                      
}

?>
