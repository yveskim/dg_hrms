<?php

 namespace App\Models;

use CodeIgniter\Model;

class Applicants_account extends Model
{
  protected $table      = 'applicants_account';
  protected $primaryKey = 'applicant_account_id';

  protected $useAutoIncrement = true;

// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;

  protected $allowedFields = [
                              'applicant_username',
                              'applicant_password',
                              'date_created',
                              'is_new_account',
                              'account_type',
                              'applicant_id'
                            ];

  // protected $useTimestamps = false;
//   protected $createdField  = 'created_at';
//   protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

  public function check_email($key){
    $findEmail =  $this->asArray()
                  ->where(['applicant_username' => $key])
                  ->first();

    if ($findEmail > 0) {
      return true;
    }else {
      return false;
    }


  }
}


?>
