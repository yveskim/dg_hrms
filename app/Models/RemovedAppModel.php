<?php

 namespace App\Models;

use CodeIgniter\Model;

class RemovedAppModel extends Model
{
  protected $table      = 'removed_application_t';
  protected $primaryKey = 'rem_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'rem_id',
                            'rem_date',
                            'removed_by',
                            'remarks',
                            'app_id'
                          ];

//   protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;
  function getRemAppJhs(){
    return
    $this->db->table('removed_application_t rem')
        ->join('student_application_t app',
                'rem.app_id = app.s_app_id',
                'LEFT' )
        ->join('student_admission_t adm',
                'adm.admission_id = app.s_app_admission_id',
                'LEFT' )
        ->select('adm.admission_id')
        ->select('adm.stud_firstname')
        ->select('adm.stud_mname')
        ->select('adm.stud_lname')
        ->select('adm.per_stud_city')
        ->select('adm.per_stud_province')
        ->select('adm.per_stud_province')
        ->select('adm.stud_phone')
        ->select('app.s_app_id')
        ->select('app.s_app_student_type')
        ->select('app.s_app_is_pwd')
        ->select('app.s_app_program_code')
        ->select('app.s_app_alternative_program_code')
        ->select('app.s_app_date_applied')
        ->select('rem.*')
        ->where('app.is_assigned', false)
        ->where('app.is_removed', true)
        ->where('app.s_app_student_type', 'JHS')
        ->orderBy('rem.rem_id')
        ->get()
        ->getResult();
  }

  function getRemAppShs(){
    return
    $this->db->table('removed_application_t rem')
        ->join('student_application_t app',
                'rem.app_id = app.s_app_id',
                'LEFT' )
        ->join('student_admission_t adm',
                'adm.admission_id = app.s_app_admission_id',
                'LEFT' )
        ->select('adm.admission_id')
        ->select('adm.stud_firstname')
        ->select('adm.stud_mname')
        ->select('adm.stud_lname')
        ->select('adm.per_stud_city')
        ->select('adm.per_stud_province')
        ->select('adm.per_stud_province')
        ->select('adm.stud_phone')
        ->select('app.s_app_id')
        ->select('app.s_app_student_type')
        ->select('app.s_app_is_pwd')
        ->select('app.s_app_program_code')
        ->select('app.s_app_alternative_program_code')
        ->select('app.s_app_date_applied')
        ->select('rem.*')
        ->where('app.is_assigned', false)
        ->where('app.is_removed', true)
        ->where('app.s_app_student_type', 'SHS')
        ->orderBy('rem.rem_id')
        ->get()
        ->getResult();
  }

}

?>
