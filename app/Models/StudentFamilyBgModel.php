<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentFamilyBgModel extends Model
{
  protected $table      = 'student_parents_tbl';
  protected $primaryKey = 'parent_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'parent_id', 
                              'stud_id', 
                              'f_is_deceased',  
                              'f_fname',  
                              'f_mname',  
                              'f_lname', 
                              'f_highest_education', 
                              'f_contact', 
                              'f_email', 
                              'f_facebook',  

                              'm_is_deceased',  
                              'm_fname',  
                              'm_mname',  
                              'm_lname', 
                              'm_highest_education', 
                              'm_contact', 
                              'm_email', 
                              'm_facebook',  

                              'g_fname',  
                              'g_mname',  
                              'g_lname', 
                              'g_highest_education', 
                              'g_contact', 
                              'g_email', 
                              'g_facebook',  

                              'is_4ps',  
                              'household_no',  
                              'is_ip',  
                              'ip_community',  
                              'financial_provider',  
                              'instructional_provider',
                              
                              'f_is_working',
                              'f_employer',
                              'f_company',
                              'f_salary',
                              'm_is_working',
                              'm_employer',
                              'm_company',
                              'm_salary',
                              'family_business',
                              'home_distance',
                              'transportation',
                              
                              'created_at',
                              'updated_at'

                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
