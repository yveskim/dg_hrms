<?php

namespace App\Models;

use CodeIgniter\Model;

class Applicants_files extends Model
{
  protected $table      = 'applicants_files';
  protected $primaryKey = 'applicants_file_id';
  protected $useAutoIncrement = true;
  protected $returnType           = 'array';
  protected $useSoftDelete        = false;
  // protected $validationRules      = [];
  // protected $validationMessages   = [];
  // protected $skipValidation       = false;
  // protected $cleanValidationRules = true;
  // protected $allowCallbacks       = true;
  // protected $beforeInsert         = [];
  // protected $afterInsert          = [];
  // protected $beforeUpdate         = [];
  // protected $afterUpdate          = [];
  // protected $beforeFind           = [];
  // protected $afterFind            = [];
  // protected $beforeDelete         = [];
  // protected $afterDelete          = [];
  // protected $returnType     = 'array';
  //   protected $useSoftDeletes = true;
  protected $allowedFields = [
    'applicant_id',
    'filename',
    'random_filename',
    'file_size',
    'file_extension',
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
