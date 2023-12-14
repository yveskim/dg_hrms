<?php

 namespace App\Models;

use CodeIgniter\Model;

class ServiceRecordModel extends Model
{
  protected $table      = 'service_record_tbl';
  protected $primaryKey = 'sr_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                              'sr_emp_id',
                              'sr_nbc_id',
                              'sr_plantilla_id',
                              'sr_step',
                              'sr_status',
                              'sr_emp_station_id',
                              'sr_is_seperated',
                              'sr_seperation_date',
                              'sr_seperation_cause',
                              'leave_absense_wo_pay',
                              'sr_date_started',
                              'sr_date_end',
                              'sr_remarks',
                              'sr_processed_by',
                              'is_active',
                              'created_at',
                              'updated_at',
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;


    public function getServiceRecord($emp_id){    
      $sql = '
        SELECT *, (SELECT amount * 12 FROM salary_schedule_tbl WHERE nbc_id = sr.sr_nbc_id AND salary_grade = plant.salary_grade
        AND step = sr.sr_step
        GROUP BY sal_sched_id) as salary FROM service_record_tbl as sr 
        LEFT JOIN employee_t as emp ON emp.emp_id = sr.sr_emp_id
        LEFT JOIN plantilla_tbl as plant ON plant.plantilla_id = sr.sr_plantilla_id
        LEFT JOIN nbc_tbl as nbc ON nbc.nbc_id = sr.sr_nbc_id
        LEFT JOIN emp_station_tbl as emp_st ON emp_st.emp_station_id = sr.sr_emp_station_id
        LEFT JOIN station_tbl as st ON st.station_id = emp_st.station_id
        WHERE sr.sr_emp_id = '.$emp_id.'
        GROUP BY sr.sr_id;
      ';

      return $this->db->query($sql)->getResultArray();

    }

    function getLastSr($emp_id){
        $sql = '
        SELECT * FROM service_record_tbl
        WHERE sr_emp_id = '.$emp_id.'
        ORDER BY sr_id DESC LIMIT 1;
      ';

      return $this->db->query($sql)->getResultArray();
    }

    function getActiveSr($emp_id){
      $sql = '
      SELECT * FROM service_record_tbl
      WHERE sr_emp_id = '.$emp_id.'
      AND is_active = true;
    ';

    return $this->db->query($sql)->getResultArray();
  }


 




}


?>
