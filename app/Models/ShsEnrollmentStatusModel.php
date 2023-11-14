<?php

 namespace App\Models;

use CodeIgniter\Model;

class ShsEnrollmentStatusModel extends Model
{
  protected $table      = 'shs_enrollment_status_t';
  protected $primaryKey = 'en_status_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;
  protected $allowedFields = [
                            'en_status_id',
                            'stat_from_nasyo',
                            'stat_title',
                            'stat_sf9',
                            'stat_coc',
                            'stat_psa',
                            'stat_good_moral',
                            'stat_remarks',
                            'stat_date_enrolled',
                            'stat_assesor',
                            'enrollment_id'
                          ];

//   protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

  // function getShsEnrollmentStatus($enrollmentId){
  // return
  //   $this->db->table('shs_enrollment_status_t')
  //     ->join('shs_enrollment_application_t',
  //             'shs_enrollment_application_t.en_id = shs_enrollment_status_t.enrollment_id',
  //             'LEFT' )
  //     ->select('shs_enrollment_status_t.*')
  //     ->where('shs_enrollment_status_t.enrollment_id', $enrollmentId)
  //     ->get()
  //     ->getResult();
  // }


}

?>
