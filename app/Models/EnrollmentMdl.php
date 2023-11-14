<?php

 namespace App\Models;

use CodeIgniter\Model;

class EnrollmentMdl extends Model
{
  protected $table      = 'enrollment_tbl';
  protected $primaryKey = 'en_id';
  protected $useAutoIncrement = true;
// protected $returnType     = 'array';
  protected $useSoftDeletes = true;
  protected $allowedFields = [
                            // 'en_id',
                            'student_id',
                            'student_lrn',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'sex',
                            'birthdate',
                            'birth_place',
                            'psa_birth_certificate_no',
                            'citizenship',
                            'religion',
                            'mother_tongue',
                            'blood_type',
                            'height',
                            'weight',
                            'phone_no',
                            'tel_no',
                            'email_address',
                            'facebook_name',
                            'student_image',
                            'with_special_need',
                            'special_need',
                            'created_by',
                            'en_sy',
                            'created_at',
                            'updated_at',
                            'deleted_at'
                          ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

//   protected $validationRules    = [];
//   protected $validationMessages = [];
//   protected $skipValidation     = false;


  function getNumberOfEnrollees(){
    
    $sql = '
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 1
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 2
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 3
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 4
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 5
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 6
    AND stat.enrollment_status = "Enroled"
    UNION
    SELECT gl.grade_level, COUNT(*) as total FROM enrollment_status_tbl  as stat
    LEFT JOIN enrollment_tbl as ent ON ent.en_id = stat.en_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE stat.grade_level_id = 0
    AND stat.enrollment_status = "Enroled"
    ';
   
    return $this->db->query($sql)->getResultArray();

  }


  // +++++++++++++++++++++PER STRAND 11+++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++PER STRAND 11+++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++PER STRAND 11+++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++PER STRAND 11+++++++++++++++++++++++++++++++++++++
  // +++++++++++++++++++++PER STRAND 11+++++++++++++++++++++++++++++++++++++


  function getStudentPerStrand_11(){
    
    $sql = '
    SELECT st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 1 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 1 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 1 
    UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 2 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 2 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 2
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 3
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 3
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 3
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 4
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 4 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 4
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 5 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 5 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 5
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 6 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 6 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 6
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 8 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 8 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 8
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 10 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 5 
      AND strand.s_strand_id = 10 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 5 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 10
    ';
    return $this->db->query($sql)->getResultArray();
  }

  // ++++++++ PER STRAND 12 ++++++++++++++++++++++++++++++++++++
  // ++++++++ PER STRAND 12 ++++++++++++++++++++++++++++++++++++
  // ++++++++ PER STRAND 12 ++++++++++++++++++++++++++++++++++++
  // ++++++++ PER STRAND 12 ++++++++++++++++++++++++++++++++++++
  // ++++++++ PER STRAND 12 ++++++++++++++++++++++++++++++++++++
  
  function getStudentPerStrand_12(){
    
    $sql = '
    SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 1 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 1 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 1 
    
    UNION
    
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 2 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 2 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 2
    
      UNION
    
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 3
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 3
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 3
    
      UNION
    
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 4
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 4 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 4
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 5 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 5 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 5
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 6 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 6 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 6
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 8 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 8 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 8
      UNION
  SELECT
    st.strand_title,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 10 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Male" 
    ) AS male,
    (
    SELECT
      COUNT(*) 
    FROM
      enrollment_status_tbl AS stat
      LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
      LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
      LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
      LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
    WHERE
      stat.grade_level_id = 6 
      AND strand.s_strand_id = 10 
      AND stat.enrollment_status = "Enroled" 
      AND ent.sex = "Female" 
    ) AS female 
  FROM
    enrollment_status_tbl AS stat
    LEFT JOIN enrollment_tbl AS ent ON ent.en_id = stat.en_id
    LEFT JOIN student_strands_tbl AS strand ON strand.s_strand_stud_id = ent.en_id
    LEFT JOIN strands_tbl AS st ON st.strand_id = strand.s_strand_id
    LEFT JOIN grade_level_tbl AS gl ON gl.grade_level_id = stat.grade_level_id 
  WHERE
    stat.grade_level_id = 6 
    AND stat.enrollment_status = "Enroled" 
    AND strand.s_strand_id = 10
    ';
    return $this->db->query($sql)->getResultArray();
  }

  // ++++++++++++++++++++++++++++++++++++++++++
  // ++++++++++++++++++++++++++++++++++++++++++
  // ++++++++++++++++++++++++++++++++++++++++++
  // ++++++++++++++++++++++++++++++++++++++++++
  // ++++++++++++++++++++++++++++++++++++++++++

  function countProgramPerGrade(){
    
    $sql = '
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 15
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 15
    AND stat.enrollment_status = "Enroled"

    
    
    UNION
    
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 17
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 17
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
           (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
           (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 18
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 18
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
           (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
               (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
               (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10,
               (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 19
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 19
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
      (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 20
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 20
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
            (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
            (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
            (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 21
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 21
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 22
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 22
    AND stat.enrollment_status = "Enroled"
    
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 23
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 23
    AND stat.enrollment_status = "Enroled"

    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
       (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 24
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 24
    AND stat.enrollment_status = "Enroled"
 
    UNION
    
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 26
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 26
    AND stat.enrollment_status = "Enroled"
    
    ';
    return $this->db->query($sql)->getResultArray();
    
  }



  function countRegular(){
    $sql =  '
  
    SELECT 
    prog.program_title,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
    ) as g7,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Male"
    ) as g7_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 1
      AND en.sex = "Female"
    ) as g7_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
    ) as g8,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Male"
    ) as g8_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 2
      AND en.sex = "Female"
    ) as g8_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
    ) as g9,
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Male"
    ) as g9_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 3
      AND en.sex = "Female"
    ) as g9_female,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
    ) as g10, 
        (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Male"
    ) as g10_male,
    (
      SELECT COUNT(*) FROM enrollment_status_tbl as stat
      LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
      LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
      LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
      LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
      WHERE sprog.prog_id = 25
      AND stat.enrollment_status = "Enroled"
      AND gl.grade_level_id = 4
      AND en.sex = "Female"
    ) as g10_female, COUNT(*) as total
    FROM enrollment_status_tbl as stat
    LEFT JOIN enrollment_tbl as en ON en.en_id = stat.en_id
    LEFT JOIN student_program_tbl as sprog ON sprog.stud_id = en.en_id
    LEFT JOIN program_tbl as prog on prog.prog_id = sprog.prog_id
    LEFT JOIN grade_level_tbl as gl ON gl.grade_level_id = stat.grade_level_id
    WHERE sprog.prog_id = 25
    AND stat.enrollment_status = "Enroled"
    
    ';
    return $this->db->query($sql)->getResultArray();
  }



}//end of class



 

?>
