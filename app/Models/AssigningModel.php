<?php

 namespace App\Models;

use CodeIgniter\Model;

class AssigningModel extends Model
{
  protected $table      = 'assigned_admission_t';
  protected $primaryKey = 'assigned_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'assigned_date',
                            'assigned_admission_id',
                            'assigned_user_id',
                            'assigned_program_id',
                            'reserved_program',
                            'assigned_status',
                          ];

//   protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;


  function getAssignedDataJhs(){
    return
      $this->db->table('assigned_admission_t')
        ->join('student_admission_t',
                'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
                'LEFT' )
        ->join('student_application_t',
                'student_application_t.s_app_admission_id = student_admission_t.admission_id',
                'LEFT' )
        // ->join('student_application_status_t',
        //         'student_application_status_t.app_status_id = student_application_t.s_app_id',
        //         'LEFT' )
        ->select('assigned_admission_t.*')
        ->select('student_admission_t.stud_firstname')
        ->select('student_admission_t.stud_mname')
        ->select('student_admission_t.stud_lname')
        ->select('student_admission_t.stud_phone')
        ->select('student_admission_t.per_stud_city')
        ->select('student_admission_t.per_stud_province')
        ->select('student_application_t.s_app_id')
        ->where('student_application_t.s_app_student_type', 'JHS')
        ->where('student_application_t.is_assigned', true)
        // ->where('student_application_status_t.app_status', 'Validated')
        ->orderBy('assigned_admission_t.assigned_id')
        ->get()
        ->getResult();
  }

  function getAssignedDataShs(){
    return
      $this->db->table('assigned_admission_t')
        ->join('student_admission_t',
                'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
                'LEFT' )
        ->join('student_application_t',
                'student_application_t.s_app_admission_id = student_admission_t.admission_id',
                'LEFT' )
        // ->join('student_application_status_t',
        //         'student_application_status_t.app_status_id = student_application_t.s_app_id',
        //         'LEFT' )
        ->select('assigned_admission_t.*')
        ->select('student_admission_t.stud_firstname')
        ->select('student_admission_t.stud_mname')
        ->select('student_admission_t.stud_lname')
        ->select('student_admission_t.stud_phone')
        ->select('student_admission_t.per_stud_city')
        ->select('student_admission_t.per_stud_province')
        ->select('student_application_t.s_app_id')
        ->where('student_application_t.s_app_student_type', 'SHS')
        ->where('student_application_t.is_assigned', true)
        // ->where('student_application_status_t.app_status', 'Validated')
        ->orderBy('assigned_admission_t.assigned_id')
        ->get()
        ->getResult();
  }

  function getProg($prog){
     return
       $this->db->table('assigned_admission_t')
         ->join('student_admission_t',
                 'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
                 'LEFT' )
         ->join('student_application_t',
                 'student_application_t.s_app_admission_id = student_admission_t.admission_id',
                 'LEFT' )
         ->join('student_application_status_t',
                 'student_application_status_t.application_id = student_application_t.s_app_id',
                 'LEFT' )
         ->select('student_admission_t.stud_firstname')
         ->select('student_admission_t.stud_mname')
         ->select('student_admission_t.stud_lname')
         ->select('student_admission_t.stud_gender')
         ->select('student_application_t.s_app_last_school_attended')
         ->where('student_application_t.s_app_student_type', 'JHS')
         ->where('assigned_admission_t.assigned_program_id', $prog)
         ->where('student_application_t.is_assigned', true)
         ->orderBy('student_admission_t.stud_lname')
         ->get()
         ->getResultArray();
   }

   function getProgramArts(){
  return
    $this->db->table('assigned_admission_t')
      ->join('student_admission_t',
              'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
              'LEFT' )
      ->join('student_application_t',
              'student_application_t.s_app_admission_id = student_admission_t.admission_id',
              'LEFT' )
      ->select('student_admission_t.stud_firstname')
      ->select('student_admission_t.stud_mname')
      ->select('student_admission_t.stud_lname')
      ->select('student_admission_t.stud_gender')
      ->select('student_application_t.s_app_last_school_attended')
      ->select('student_application_t.s_app_arts_prog')
      ->select('student_application_t.s_app_arts_prog_alternative')
      ->where('student_application_t.s_app_student_type', 'JHS')
      ->where('assigned_admission_t.assigned_program_id', 'SA')
      ->where('student_application_t.is_assigned', true)
      ->orderBy('student_admission_t.stud_lname')
      ->get()
      ->getResultArray();
}

function getProgShs($prog){
   return
     $this->db->table('assigned_admission_t')
       ->join('student_admission_t',
               'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
               'LEFT' )
       ->join('student_application_t',
               'student_application_t.s_app_admission_id = student_admission_t.admission_id',
               'LEFT' )
       ->join('student_application_status_t',
               'student_application_status_t.application_id = student_application_t.s_app_id',
               'LEFT' )
       ->select('student_admission_t.stud_firstname')
       ->select('student_admission_t.stud_mname')
       ->select('student_admission_t.stud_lname')
       ->select('student_admission_t.stud_gender')
       ->select('student_application_t.s_app_last_school_attended')
       ->where('student_application_t.s_app_student_type', 'SHS')
       ->where('assigned_admission_t.assigned_program_id', $prog)
       ->where('student_application_t.is_assigned', true)
       ->orderBy('student_admission_t.stud_lname')
       ->get()
       ->getResultArray();
 }


  // function getCustomFilter($prog){
  //   return
  //     $this->db->table('assigned_admission_t')
  //       ->join('student_admission_t',
  //               'assigned_admission_t.assigned_admission_id = student_admission_t.admission_id',
  //               'LEFT' )
  //       ->select('assigned_admission_t.*')
  //       ->select('student_admission_t.*')
  //       ->where('assigned_admission_t.assigned_program_id', $prog)
  //       ->orderBy('assigned_admission_t.assigned_id')
  //       ->get()
  //       ->getResult();
  // }


}

?>
