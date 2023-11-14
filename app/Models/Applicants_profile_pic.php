<?php

namespace App\Models;

use CodeIgniter\Model;

class Applicants_profile_pic extends Model
{
  protected $table      = 'applicants_profile_pic';
  protected $primaryKey = 'profile_pic_id';
  protected $useAutoIncrement = true;
  protected $returnType           = 'array';
  protected $useSoftDelete        = false;
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];
  // protected $returnType     = 'array';
  //   protected $useSoftDeletes = true;
  protected $allowedFields = [
    'applicant_id',
    'filename',
    'random_filename',
    'file_size',
    'file_extension',
    'created_at',
    'deleted_at',
    'updated_at',
    'deleted_by',
    'is_main_profile'
  ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  //   protected $validationRules    = [];
  //   protected $validationMessages = [];
  //   protected $skipValidation     = false;




}
