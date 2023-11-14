<?php

 namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
  protected $table      = 'category_tbl';
  protected $primaryKey = 'cat_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'cat_title',
                              'description'
                            ];

  // protected $useTimestamps = true;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;

}


?>
