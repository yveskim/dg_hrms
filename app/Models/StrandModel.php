<?php

 namespace App\Models;

use CodeIgniter\Model;

class StrandModel extends Model
{
  protected $table      = 'strands_tbl';
  protected $primaryKey = 'strand_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'strand_title', 
                              'strand_description',
                              's_track_id'
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
