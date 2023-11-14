<?php

 namespace App\Models;

use CodeIgniter\Model;

class Applicants_profile extends Model
{
  protected $table      = 'applicants_profile';
  protected $primaryKey = 'applicant_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'applicant_lrn',
                            'firstname',
                            'middle_name',
                            'last_name',
                            'birthdate',
                            'gender',
                            'phone',
                            'email',
                            'per_street',
                            'per_subdivision',
                            'per_barangay',
                            'per_city',
                            'per_province',
                            'cur_street',
                            'cur_subdivision',
                            'cur_barangay',
                            'cur_city',
                            'cur_province',
                            'created_at',
                            'updated_at',
                            'reference_id'
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;


  function getAdmissionData(){
    return
    $this->db->table('student_admission_t')
      ->join('admission_status_t ', 'admission_status_t.admission_id = student_admission_t.admission_id', 'LEFT' )
      ->select('admission_status_t.*')
      ->select('student_admission_t.*')
      ->orderBy('student_admission_t.admission_id')
      ->get()
      ->getResult();
  }

  
  function getProfileApplication($app_id){

    return
    $this->db->table('applicants_profile')
      ->join('application_pre_registration_tbl', 'applicants_profile.applicant_id = application_pre_registration_tbl.applicant_id', 'LEFT' )
      ->select('applicants_profile.*')
      ->select('application_pre_registration_tbl.*')
      ->where('application_pre_registration_tbl.application_id', $app_id)
      ->get()
      ->getResult();
  }

  function getProfileApplicationTransferee($transferee_id){

    return
    $this->db->table('applicants_profile')
      ->join('application_transferee_tbl', 'applicants_profile.applicant_id = application_transferee_tbl.applicant_id', 'LEFT' )
      ->select('applicants_profile.*')
      ->select('application_transferee_tbl.*')
      ->where('application_transferee_tbl.transferee_id', $transferee_id)
      ->get()
      ->getResult();
  }



}


?>
