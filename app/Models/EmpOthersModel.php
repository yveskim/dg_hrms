<?php

 namespace App\Models;

use CodeIgniter\Model;

class EmpOthersModel extends Model
{
  protected $table      = 'emp_others_t';
  protected $primaryKey = 'others_id';
  protected $useAutoIncrement = true;
//protected $returnType     = 'array';
//protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                            'others_emp_id',
                            'consanguinity_3rd_degree', 
                            'consanguinity_3rd_degree_details', 
                            'consanguinity_4th_degree', 
                            'consanguinity_4th_degree_details', 
                            'admin_offence', 
                            'admin_offence_details', 
                            'criminal_charge', 
                            'criminal_charge_date', 
                            'criminal_charge_details', 
                            'is_convicted', 
                            'convicted_details', 
                            'seperated_from_service', 
                            'seperated_from_service_details', 
                            'election_candidate', 
                            'election_candidate_details', 
                            'resigned_3months_period', 
                            'resigned_3months_period_details', 
                            'immigrant_status', 
                            'immigrant_status_details', 
                            'is_ip', 
                            'is_ip_details', 
                            'is_pwd', 
                            'is_pwd_details', 
                            'is_solo_parent', 
                            'solo_parent_details'
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
