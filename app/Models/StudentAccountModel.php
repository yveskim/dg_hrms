<?php

 namespace App\Models;

use CodeIgniter\Model;

class StudentAccountModel extends Model
{
  protected $table      = 'student_account_t';
  protected $primaryKey = 's_account_id';

  protected $useAutoIncrement = true;

// protected $returnType     = 'array';
//   protected $useSoftDeletes = true;

  protected $allowedFields = ['s_account_id',
                              'user_name',
                              'password',
                              'is_new',
                              'is_dissabled',
                              'type',
                              'en_id',
                              'created_at',
                              'updated_at'
                            ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
//   protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;


  public function check_code($key){
    $findCode =  $this->asArray()
                  ->where(['user_name' => $key])
                  ->first();
    if ($findCode > 0) {
      return true;
    }else {
      return false;
    }
  }
}


?>
