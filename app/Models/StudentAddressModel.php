<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentAddressModel extends Model
{
  protected $table      = 'student_address_tbl';
  protected $primaryKey = 'address_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'address_id', 
                              'en_id', 
                              'address_type',  
                              'blok_lot_phase_bldg',  
                              'street', 
                              'subdivision_village', 
                              'barangay', 
                              'municipality_city', 
                              'province', 
                              'zip_code', 
                              'region', 
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

}


?>
