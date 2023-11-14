<?php

 namespace App\Models;

use CodeIgniter\Model;

class TrackModel extends Model
{
  protected $table      = 'track_tbl';
  protected $primaryKey = 'track_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  // protected $useSoftDeletes = true;
  protected $allowedFields = [
                              'track_title', 
                              'track_description'
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
