<?php

 namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table      = 'users';
  protected $primaryKey = 'user_id';

  protected $useAutoIncrement = true;

// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;

  protected $allowedFields = [
    'emp_id', 
    'user_email', 
    'user_password', 
    'user_type', 
    'user_restriction', 
    'user_category', 
    'is_disabled'
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
                  ->where(['user_email' => $key])
                  ->first();

    if ($findEmail > 0) {
      return true;
    }else {
      return false;
    }

  }


}


?>
