<?php

 namespace App\Models;

use CodeIgniter\Model;

class PlantillaModel extends Model
{
  protected $table      = 'plantilla_tbl';
  protected $primaryKey = 'plant_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'plant_id', 
                              'plantilla_title',
                              'plantilla_item_no',
                              'salary_grade',
                              'monthly_salary',
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
