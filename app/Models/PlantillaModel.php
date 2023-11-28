<?php

 namespace App\Models;

use CodeIgniter\Model;

class PlantillaModel extends Model
{
  protected $table      = 'plantilla_tbl';
  protected $primaryKey = 'plantilla_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [ 
                              'plantilla_item_no',
                              'position_title',
                              'salary_grade',
                              'date_recieved',
                              'created_by',
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
