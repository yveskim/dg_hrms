<?php

 namespace App\Models;

use CodeIgniter\Model;

class ApplicationPreRegistrationModel extends Model
{
  protected $table      = 'application_pre_registration_tbl';
  protected $primaryKey = 'application_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'applicant_id',
                            'academic_year',
                            'last_school_year',
                            'last_school_attended',
                            'last_school_address',
                            'is_lwd',
                            'computer',
                            'smart_phone',
                            'internet',
                            'accessories',
                            'program_first_choice',
                            'program_second_choice',
                            'program_third_choice',
                            'first_quarter_average',
                            'second_quarter_average',
                            'third_quarter_average',
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
      $this->db->table('application_pre_registration_tbl')
        ->where('academic_year', $academic_year)
        ->countAllResults();
  }

  function getAllApp(){
    $academic_year = '2023-2024';
    return
      $this->db->table('application_pre_registration_tbl')
        ->where('academic_year', $academic_year)
        ->get()
        ->getResult();
  }


  function getPreregApp(){
    $academic_year = '2023-2024';
    return
      $this->db->table('application_pre_registration_tbl')
        ->join('applicants_profile', 'applicants_profile.applicant_id = application_pre_registration_tbl.applicant_id', 'LEFT' )
        ->join('application_status', 'application_status.application_id = application_pre_registration_tbl.application_id', 'LEFT' )
        ->select('application_pre_registration_tbl.*')
        ->select('application_status.status_info')
        ->select('applicants_profile.firstname')
        ->select('applicants_profile.middle_name')
        ->select('applicants_profile.last_name')
        ->select('applicants_profile.gender')
        ->where('application_pre_registration_tbl.academic_year', $academic_year)
        ->get()
        ->getResult();
  }

  function getValidatedApp(){
    $academic_year = '2023-2024';
    return
      $this->db->table('application_pre_registration_tbl')
        ->join('applicants_profile', 'applicants_profile.applicant_id = application_pre_registration_tbl.applicant_id', 'LEFT' )
        ->join('application_status', 'application_status.application_id = application_pre_registration_tbl.application_id', 'LEFT' )
        ->join('entrance_exam_tbl', 'entrance_exam_tbl.score_application_id = application_pre_registration_tbl.application_id', 'left')
        ->select('entrance_exam_tbl.score')
        ->select('application_pre_registration_tbl.*')
        ->select('application_status.status_info')
        ->select('applicants_profile.firstname')
        ->select('applicants_profile.middle_name')
        ->select('applicants_profile.last_name')
        ->select('applicants_profile.gender')
        // ->where('application_status.academic_year', "Validated")
        ->where('application_pre_registration_tbl.academic_year', $academic_year)
        ->get()
        ->getResult();
  }

                      
}

?>
