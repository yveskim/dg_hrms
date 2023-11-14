-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 11:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasyo_integrated_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisery_tbl`
--

CREATE TABLE `advisery_tbl` (
  `adv_id` smallint(11) NOT NULL,
  `sec_det_id` smallint(6) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `average_tbl`
--

CREATE TABLE `average_tbl` (
  `ave_id` bigint(20) NOT NULL,
  `ave_stud_id` bigint(20) NOT NULL,
  `ave_grade_level` varchar(30) NOT NULL,
  `ave_semester` varchar(60) NOT NULL,
  `ave_sy` varchar(60) NOT NULL,
  `average` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cat_id` smallint(6) NOT NULL,
  `cat_title` varchar(60) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`cat_id`, `cat_title`, `description`) VALUES
(1, 'JHS', 'Junior High School'),
(2, 'SHS', 'Senior High School');

-- --------------------------------------------------------

--
-- Table structure for table `department_head_tbl`
--

CREATE TABLE `department_head_tbl` (
  `dept_head_id` smallint(6) NOT NULL,
  `title` varchar(20) NOT NULL,
  `dh_dept_id` smallint(6) NOT NULL,
  `head_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `memo_no` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `dept_id` smallint(6) NOT NULL,
  `dept_title` varchar(60) NOT NULL,
  `dept_location` varchar(160) NOT NULL,
  `dept_category` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`dept_id`, `dept_title`, `dept_location`, `dept_category`) VALUES
(10, 'TLE', '', 1),
(11, 'English', '', 1),
(12, 'Math', '', 1),
(13, 'Science', '', 1),
(14, 'Filipino', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educational_bg_t`
--

CREATE TABLE `educational_bg_t` (
  `educ_bg_id` int(11) NOT NULL,
  `educ_bg_level` varchar(100) DEFAULT NULL,
  `educ_bg_school` varchar(100) DEFAULT NULL,
  `educ_bg_degree` varchar(50) DEFAULT NULL,
  `educ_bg_from` date DEFAULT NULL,
  `educ_bg_to` date DEFAULT NULL,
  `educ_bg_units` varchar(30) DEFAULT NULL,
  `educ_bg_year_graduated` varchar(20) DEFAULT NULL,
  `educ_bg_scholarship_honors` varchar(100) DEFAULT NULL,
  `educ_bg_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eligibility_t`
--

CREATE TABLE `eligibility_t` (
  `elig_id` int(11) NOT NULL,
  `elig_emp_id` int(11) NOT NULL,
  `elig_board_bar` varchar(150) NOT NULL,
  `elig_rating` varchar(30) NOT NULL,
  `elig_exam_date` date NOT NULL,
  `elig_exam_place` varchar(200) NOT NULL,
  `elig_license_no` varchar(100) NOT NULL,
  `elig_license_date_valid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_category_tbl`
--

CREATE TABLE `employee_category_tbl` (
  `emp_cat_id` int(11) NOT NULL,
  `cat_id` smallint(6) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_children_t`
--

CREATE TABLE `employee_children_t` (
  `child_id` int(11) NOT NULL,
  `child_name` varchar(120) NOT NULL,
  `child_birthdate` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_tbl`
--

CREATE TABLE `employee_department_tbl` (
  `emp_dept_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `dept_id` smallint(6) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_program_tbl`
--

CREATE TABLE `employee_program_tbl` (
  `emp_prog_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `prog_id` smallint(6) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_program_tbl`
--

INSERT INTO `employee_program_tbl` (`emp_prog_id`, `emp_id`, `prog_id`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 3294, 15, 2, '2023-07-06 15:23:08', '2023-07-06 15:23:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_t`
--

CREATE TABLE `employee_t` (
  `emp_id` int(11) NOT NULL,
  `job_description` int(11) DEFAULT NULL,
  `emp_school_id` varchar(50) NOT NULL,
  `emp_fname` varchar(50) DEFAULT NULL,
  `emp_mname` varchar(50) DEFAULT NULL,
  `emp_lname` varchar(50) DEFAULT NULL,
  `emp_image` varchar(255) DEFAULT NULL,
  `emp_gender` varchar(15) DEFAULT NULL,
  `emp_marital_status` varchar(30) DEFAULT NULL,
  `emp_citizenship` varchar(30) DEFAULT NULL,
  `emp_citizen_by` varchar(20) DEFAULT NULL,
  `emp_country` varchar(120) DEFAULT NULL,
  `emp_birthdate` varchar(30) DEFAULT NULL,
  `emp_place_of_birth` varchar(100) DEFAULT NULL,
  `emp_religion` varchar(30) DEFAULT NULL,
  `emp_blood_type` varchar(10) DEFAULT NULL,
  `emp_height` int(11) DEFAULT NULL,
  `emp_weight` int(11) DEFAULT NULL,
  `emp_tin` varchar(15) DEFAULT NULL,
  `emp_sss` varchar(25) DEFAULT NULL,
  `emp_gsis` varchar(25) DEFAULT NULL,
  `emp_pagibig` varchar(30) DEFAULT NULL,
  `emp_philhealth` varchar(30) DEFAULT NULL,
  `emp_agency_employee_no` varchar(50) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_p_add_house` varchar(10) DEFAULT NULL,
  `emp_p_add_street` varchar(40) DEFAULT NULL,
  `emp_p_add_subdivision` varchar(120) DEFAULT NULL,
  `emp_p_add_barangay` varchar(40) DEFAULT NULL,
  `emp_p_add_municipality` varchar(40) DEFAULT NULL,
  `emp_p_add_city` varchar(40) DEFAULT NULL,
  `emp_p_add_province` varchar(40) DEFAULT NULL,
  `emp_p_add_zip` varchar(20) NOT NULL,
  `emp_r_add_house` varchar(20) DEFAULT NULL,
  `emp_r_add_street` varchar(40) DEFAULT NULL,
  `emp_r_add_subdivision` varchar(120) DEFAULT NULL,
  `emp_r_add_barangay` varchar(40) DEFAULT NULL,
  `emp_r_add_municipality` varchar(40) DEFAULT NULL,
  `emp_r_add_city` varchar(40) DEFAULT NULL,
  `emp_r_add_province` varchar(40) DEFAULT NULL,
  `emp_r_add_zip` varchar(20) NOT NULL,
  `emp_telephone_no` varchar(15) DEFAULT NULL,
  `emp_mobile_no` varchar(15) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_t`
--

INSERT INTO `employee_t` (`emp_id`, `job_description`, `emp_school_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_image`, `emp_gender`, `emp_marital_status`, `emp_citizenship`, `emp_citizen_by`, `emp_country`, `emp_birthdate`, `emp_place_of_birth`, `emp_religion`, `emp_blood_type`, `emp_height`, `emp_weight`, `emp_tin`, `emp_sss`, `emp_gsis`, `emp_pagibig`, `emp_philhealth`, `emp_agency_employee_no`, `emp_email`, `emp_p_add_house`, `emp_p_add_street`, `emp_p_add_subdivision`, `emp_p_add_barangay`, `emp_p_add_municipality`, `emp_p_add_city`, `emp_p_add_province`, `emp_p_add_zip`, `emp_r_add_house`, `emp_r_add_street`, `emp_r_add_subdivision`, `emp_r_add_barangay`, `emp_r_add_municipality`, `emp_r_add_city`, `emp_r_add_province`, `emp_r_add_zip`, `emp_telephone_no`, `emp_mobile_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3294, 2, '032911', 'Yves Kim', 'Casido', 'Cabanting', '1682231119_1ae15d627f095a00188c.jpg', 'Male', 'Married', 'Filipino', '', '', '1990-08-27', 'Leon, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'yveskim.cabanting@iloilonhs.edu.ph', '', 'Earth Street', '', '', '', 'Oton, Iloilo', 'Rehiyon ng Kanlurang Bisaya', '', '', '', '', '', '', '', '', '', '993455345', '', '2023-04-23 14:25:19', '2023-07-01 13:35:45', NULL),
(3311, 2, '03163', 'Johanna Thea', 'Belandres', 'Lupo', '1688959925_a882b5710abb5eba0430.jpg', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'johannathea.lupo@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-10 11:32:05', '2023-07-19 14:02:11', NULL),
(3317, 2, '03060', 'Lory Gene', 'Altamira', 'Umadhay', '', 'Female', 'Single', 'Filipino', '', '', '1977-01-12', '', '', '', 0, 0, '', '', '', '', '', '', 'lorygene.umadhay@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09338684476', '2023-07-19 13:46:10', '2023-07-19 13:46:10', NULL),
(3318, 2, '03132', 'Christine', 'Barlas', 'Marin', '', 'Female', 'Married', 'Filipino', '', '', '1977-12-25', '', '', '', 0, 0, '', '', '', '', '', '', 'christine.marin@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09096828473', '2023-07-19 13:52:18', '2023-07-19 13:52:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_status_tbl`
--

CREATE TABLE `employment_status_tbl` (
  `emp_stat_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_status` varchar(60) NOT NULL,
  `plantilla_id` smallint(6) NOT NULL,
  `step` int(11) NOT NULL,
  `date_assigned` date NOT NULL,
  `is_retired` tinyint(1) NOT NULL,
  `retirement_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_others_t`
--

CREATE TABLE `emp_others_t` (
  `others_id` int(11) NOT NULL,
  `others_emp_id` int(11) NOT NULL,
  `others_special_skills_hobbies` varchar(120) NOT NULL,
  `others_non_academic_distinctions` varchar(200) NOT NULL,
  `others_organization` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_work_experience_t`
--

CREATE TABLE `emp_work_experience_t` (
  `work_exp_id` int(11) NOT NULL,
  `work_exp_emp_id` int(11) NOT NULL,
  `work_exp_date_from` date DEFAULT NULL,
  `work_exp_date_to` date DEFAULT NULL,
  `work_exp_position` varchar(60) DEFAULT NULL,
  `work_exp_company` varchar(120) DEFAULT NULL,
  `work_exp_monthly_sal` varchar(10) DEFAULT NULL,
  `work_exp_salary_grade` varchar(50) DEFAULT NULL,
  `work_exp_appointment_status` varchar(60) DEFAULT NULL,
  `work_exp_gov_service` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_work_involvement_t`
--

CREATE TABLE `emp_work_involvement_t` (
  `work_inv_id` int(11) NOT NULL,
  `work_inv_emp_id` int(11) NOT NULL,
  `work_inv_name_and_address` varchar(255) NOT NULL,
  `work_inv_date_from` date NOT NULL,
  `work_inv_date_to` date NOT NULL,
  `work_inv_hours` varchar(20) NOT NULL,
  `work_inv_position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_status_tbl`
--

CREATE TABLE `enrollment_status_tbl` (
  `en_stat_id` bigint(20) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `submitted_sf9` tinyint(1) NOT NULL,
  `submitted_coc` tinyint(1) NOT NULL,
  `submitted_psa` tinyint(1) NOT NULL,
  `enrollment_status` varchar(60) NOT NULL,
  `is_als` tinyint(1) NOT NULL,
  `is_pssn` tinyint(1) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `grade_level_id` smallint(6) NOT NULL,
  `semester` smallint(6) DEFAULT NULL,
  `enrolled_by` int(11) NOT NULL,
  `enrolled_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_status_tbl`
--

INSERT INTO `enrollment_status_tbl` (`en_stat_id`, `en_id`, `sy_id`, `submitted_sf9`, `submitted_coc`, `submitted_psa`, `enrollment_status`, `is_als`, `is_pssn`, `remarks`, `grade_level_id`, `semester`, `enrolled_by`, `enrolled_at`, `updated_at`) VALUES
(217, 4, 1, 1, 1, 1, 'Enroled', 0, 0, '', 5, 1, 274, '2023-07-21 10:40:06', '2023-07-21 10:40:06'),
(218, 1, 1, 1, 1, 1, 'Enroled', 0, 0, '', 1, NULL, 274, '2023-07-21 10:43:30', '2023-07-21 10:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_tbl`
--

CREATE TABLE `enrollment_tbl` (
  `en_id` bigint(20) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `student_lrn` varchar(15) DEFAULT NULL,
  `first_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `birth_place` varchar(150) NOT NULL,
  `psa_birth_certificate_no` varchar(120) NOT NULL,
  `citizenship` varchar(40) NOT NULL,
  `religion` varchar(60) NOT NULL,
  `mother_tongue` varchar(60) NOT NULL,
  `blood_type` varchar(15) NOT NULL,
  `height` varchar(15) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `tel_no` varchar(25) NOT NULL,
  `email_address` varchar(90) NOT NULL,
  `facebook_name` varchar(90) NOT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `with_special_need` tinyint(1) NOT NULL,
  `special_need` varchar(60) NOT NULL,
  `en_sy` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_tbl`
--

INSERT INTO `enrollment_tbl` (`en_id`, `student_id`, `student_lrn`, `first_name`, `middle_name`, `last_name`, `sex`, `birthdate`, `birth_place`, `psa_birth_certificate_no`, `citizenship`, `religion`, `mother_tongue`, `blood_type`, `height`, `weight`, `phone_no`, `tel_no`, `email_address`, `facebook_name`, `student_image`, `with_special_need`, `special_need`, `en_sy`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '23-00001', '112345367759', 'Juan', 'Bonifacio', 'Delacruz', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', 1, 274, '2023-07-21 10:07:21', '2023-07-21 10:07:21', NULL),
(3, '23-00003', NULL, 'sf', 'sfsdf', 'sdfs', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '1689906912_507363a714e651af14bc.jfif', 0, '', 1, 274, '2023-07-21 10:11:33', '2023-07-21 10:35:12', NULL),
(4, '23-00004', NULL, 'werw', 'ewrwq', 'erwqwr', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', 1, 274, '2023-07-21 10:16:14', '2023-07-21 10:16:14', NULL),
(5, '23-00005', NULL, 'dsfg', 'gdfgdf', 'sdgfdgfsd', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', 1, 274, '2023-07-21 10:53:02', '2023-07-21 10:53:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject_group_tbl`
--

CREATE TABLE `faculty_subject_group_tbl` (
  `fsg_id` int(11) NOT NULL,
  `fsg_sg_id` int(11) NOT NULL,
  `fsg_emp_id` int(11) NOT NULL,
  `fsg_sy_id` int(11) NOT NULL,
  `fsg_assigned_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_bg_t`
--

CREATE TABLE `family_bg_t` (
  `fam_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `spouse_first_name` varchar(60) DEFAULT NULL,
  `spouse_middle_name` varchar(60) DEFAULT NULL,
  `spouse_surname` varchar(60) DEFAULT NULL,
  `spouse_occupation` varchar(120) DEFAULT NULL,
  `spouse_employer_business` varchar(120) DEFAULT NULL,
  `spouse_business_address` varchar(250) DEFAULT NULL,
  `spouse_telephone` varchar(20) DEFAULT NULL,
  `father_surname` varchar(60) DEFAULT NULL,
  `father_middlename` varchar(60) DEFAULT NULL,
  `father_firstname` varchar(60) DEFAULT NULL,
  `mother_surname` varchar(60) DEFAULT NULL,
  `mother_firstname` varchar(60) DEFAULT NULL,
  `mother_middlename` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade_level_tbl`
--

CREATE TABLE `grade_level_tbl` (
  `grade_level_id` smallint(6) NOT NULL,
  `grade_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_level_tbl`
--

INSERT INTO `grade_level_tbl` (`grade_level_id`, `grade_level`) VALUES
(1, '7'),
(2, '8'),
(3, '9'),
(4, '10'),
(5, '11'),
(6, '12');

-- --------------------------------------------------------

--
-- Table structure for table `household_members_tbl`
--

CREATE TABLE `household_members_tbl` (
  `hm_id` bigint(20) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `complete_name` varchar(200) NOT NULL,
  `hm_relationship` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learning_development_t`
--

CREATE TABLE `learning_development_t` (
  `ld_id` int(11) NOT NULL,
  `ld_emp_id` int(11) NOT NULL,
  `ld_training_program` varchar(150) NOT NULL,
  `ld_date_from` date NOT NULL,
  `ld_date_to` date NOT NULL,
  `ld_total_hours` int(11) NOT NULL,
  `ld_type` varchar(60) NOT NULL,
  `ld_conducted_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `headlines` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_file` varchar(255) DEFAULT NULL,
  `news_link` varchar(255) DEFAULT NULL,
  `news_author` varchar(150) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `publish_time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `update_time_stamp` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  `delete_time_stamp` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plantilla_tbl`
--

CREATE TABLE `plantilla_tbl` (
  `plant_id` smallint(6) NOT NULL,
  `plantilla_title` varchar(100) NOT NULL,
  `plantilla_item_no` varchar(150) NOT NULL,
  `salary_grade` varchar(25) NOT NULL,
  `monthly_salary` decimal(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_head_tbl`
--

CREATE TABLE `program_head_tbl` (
  `ph_id` int(11) NOT NULL,
  `p_id` smallint(6) NOT NULL,
  `ph_emp_id` int(11) NOT NULL,
  `memo_no` varchar(60) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_tbl`
--

CREATE TABLE `program_tbl` (
  `prog_id` smallint(6) NOT NULL,
  `program_title` varchar(120) NOT NULL,
  `description` varchar(200) NOT NULL,
  `program_logo` varchar(255) DEFAULT NULL,
  `cat_id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_tbl`
--

INSERT INTO `program_tbl` (`prog_id`, `program_title`, `description`, `program_logo`, `cat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'STVEP', 'Strengthened Technical-Vocational Education Program', '1688441695_01f73d1f025297f16d63.png', 1, '2023-07-04 11:34:55', '2023-07-04 11:34:55', NULL),
(16, 'ALS', 'Alternative Learning System', '1688610988_f04479d79b1e0846b70f.png', 1, '2023-07-06 10:36:28', '2023-07-06 10:36:28', NULL),
(17, 'SPSTE', 'Special Program for Science Technology and Engineering', '1689827801_217b3aee6605adc628a3.png', 1, '2023-07-07 11:00:55', '2023-07-20 12:36:41', NULL),
(18, 'SPBE', 'Special Program for Business and Entrepreneurship', '1688698900_b6a9101b48cfa407de54.jpg', 1, '2023-07-07 11:01:40', '2023-07-07 11:01:40', NULL),
(19, 'EOC', 'Evening Opportunity Class', '1688698920_ad4af5cdc6e375d3cfe2.png', 1, '2023-07-07 11:02:00', '2023-07-07 11:02:00', NULL),
(20, 'PSSN', 'Program for Student with Special Needs', '1689575975_896b6c152195d776ac35.jpg', 1, '2023-07-17 14:39:35', '2023-07-17 14:39:35', NULL),
(21, 'SA', 'School for the Arts', '1689576022_9440c5710bdbcf681332.png', 1, '2023-07-17 14:40:22', '2023-07-17 14:40:22', NULL),
(22, 'SPJ', 'Special Program for Journalism', '1689576070_05bf17162f60c7b2c424.png', 1, '2023-07-17 14:41:10', '2023-07-17 14:41:10', NULL),
(23, 'SPS', 'Special Program for Sports', '1689576090_8ae562269d2e64b583e6.png', 1, '2023-07-17 14:41:30', '2023-07-17 14:41:30', NULL),
(24, 'OHSP', 'Open High School Program', '1689576155_212c0f6d1da04e696367.png', 1, '2023-07-17 14:42:35', '2023-07-17 14:42:35', NULL),
(25, 'Regular', 'Regular Class', '1689576185_ebe61fe2db948a681bda.png', 1, '2023-07-17 14:43:05', '2023-07-17 14:43:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_year_tbl`
--

CREATE TABLE `school_year_tbl` (
  `sy_id` int(11) NOT NULL,
  `school_year` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year_tbl`
--

INSERT INTO `school_year_tbl` (`sy_id`, `school_year`, `is_active`) VALUES
(1, '2023-2024', 1),
(2, '2024-2025', 0),
(3, '2025-2026', 0);

-- --------------------------------------------------------

--
-- Table structure for table `section_details_tbl`
--

CREATE TABLE `section_details_tbl` (
  `sec_det_id` smallint(6) NOT NULL,
  `sec_title` varchar(60) NOT NULL,
  `grade_level_id` smallint(6) NOT NULL,
  `prog_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_details_tbl`
--

INSERT INTO `section_details_tbl` (`sec_det_id`, `sec_title`, `grade_level_id`, `prog_id`) VALUES
(24, 'COOPER', 1, 15),
(25, 'OSBORNE', 1, 15),
(26, 'BERNERS LEE', 2, 15),
(27, 'BYRON', 4, 15),
(28, 'BABBAGE', 4, 15),
(29, 'METCALF', 3, 15),
(30, 'EDISON', 3, 15),
(31, 'CERF', 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `sem_id` smallint(6) NOT NULL,
  `sem_title` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_tbl`
--

INSERT INTO `semester_tbl` (`sem_id`, `sem_title`, `is_active`) VALUES
(1, '1st Semester', 1),
(2, '2nd Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shs_section_adviser_tbl`
--

CREATE TABLE `shs_section_adviser_tbl` (
  `shs_adv_id` int(11) NOT NULL,
  `shs_adv_emp_id` int(11) NOT NULL,
  `shs_co_adviser_id` int(11) DEFAULT NULL,
  `shs_adv_section_id` smallint(6) NOT NULL,
  `shs_adv_sy` int(11) NOT NULL,
  `shs_adv_semester` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shs_section_subject_tbl`
--

CREATE TABLE `shs_section_subject_tbl` (
  `sec_sub_id` int(11) NOT NULL,
  `section_id` smallint(6) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `sub_sy` int(11) NOT NULL,
  `sub_sem` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shs_section_subject_tbl`
--

INSERT INTO `shs_section_subject_tbl` (`sec_sub_id`, `section_id`, `subject_id`, `sub_sy`, `sub_sem`, `created_at`, `updated_at`) VALUES
(17, 29, 20, 1, 1, '2023-07-10 12:03:45', '2023-07-10 12:03:45'),
(18, 29, 21, 1, 1, '2023-07-10 12:03:48', '2023-07-10 12:03:48'),
(19, 29, 22, 1, 1, '2023-07-10 12:03:50', '2023-07-10 12:03:50'),
(20, 29, 24, 1, 1, '2023-07-10 12:03:52', '2023-07-10 12:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `shs_section_tbl`
--

CREATE TABLE `shs_section_tbl` (
  `shs_sec_id` smallint(6) NOT NULL,
  `shs_sec_title` varchar(120) NOT NULL,
  `shs_sec_description` varchar(160) NOT NULL,
  `shs_grade_level` smallint(6) NOT NULL,
  `strand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shs_section_tbl`
--

INSERT INTO `shs_section_tbl` (`shs_sec_id`, `shs_sec_title`, `shs_sec_description`, `shs_grade_level`, `strand_id`) VALUES
(22, 'ABM-A', '', 6, 1),
(23, 'ABM-B', '', 6, 1),
(24, 'ABM-C', '', 6, 1),
(25, 'ABM-D', '', 6, 1),
(26, 'ABM-A', '', 5, 1),
(27, 'ABM-B', '', 5, 1),
(28, 'ABM-C', '', 5, 1),
(29, 'STEM-A', '', 5, 2),
(36, '11 GAS A-1', 'General Academic Strand Section A - 1', 5, 4),
(37, '11 GAS A-2', 'General Academic Strand Section A - 2', 5, 4),
(38, 'ICT-11-IA1', 'Illustration & Animation', 5, 10),
(39, 'ICT-11-IA2', 'Illustration & Animation', 5, 10),
(40, 'STEM-B', '', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shs_student_section_tbl`
--

CREATE TABLE `shs_student_section_tbl` (
  `shs_stud_sec_id` int(11) NOT NULL,
  `shs_stud_id` bigint(20) NOT NULL,
  `shs_sec_id` smallint(6) NOT NULL,
  `shs_stud_sec_sy` int(11) NOT NULL,
  `shs_student_sem` smallint(6) NOT NULL,
  `shs_assigned_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shs_subject_tbl`
--

CREATE TABLE `shs_subject_tbl` (
  `shs_sub_id` int(11) NOT NULL,
  `subject_title` varchar(60) NOT NULL,
  `subject_description` varchar(150) NOT NULL,
  `subject_category` varchar(60) NOT NULL,
  `subject_specialized` varchar(60) NOT NULL,
  `subject_semester` smallint(6) NOT NULL,
  `subject_grade_level` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shs_subject_tbl`
--

INSERT INTO `shs_subject_tbl` (`shs_sub_id`, `subject_title`, `subject_description`, `subject_category`, `subject_specialized`, `subject_semester`, `subject_grade_level`) VALUES
(20, 'OCC', 'Oral Communication in Context', 'core', '', 1, 5),
(21, 'KPWKP', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 'core', '', 1, 5),
(22, 'GM', 'General Mathematics', 'core', '', 1, 5),
(23, 'EALS', 'Earth and Life Science', 'core', '', 1, 5),
(24, 'PEH', 'Physical Education and Health', 'core', '', 1, 5),
(25, 'IPHP', 'Introduction to the Philosophy of the Human Person', 'core', '', 1, 5),
(26, 'EAPP', 'English for Academic and Professional Purposes', 'applied', '', 1, 5),
(27, 'FBS', 'Food and Beverage Services NCII', 'specialized', 'tvl-he', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `strands_tbl`
--

CREATE TABLE `strands_tbl` (
  `strand_id` int(11) NOT NULL,
  `strand_title` varchar(60) NOT NULL,
  `strand_description` text NOT NULL,
  `s_track_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strands_tbl`
--

INSERT INTO `strands_tbl` (`strand_id`, `strand_title`, `strand_description`, `s_track_id`) VALUES
(1, 'ABM', 'Accountancy, Business and Management', 1),
(2, 'STEM', 'Science, Technology, Engineering and Mathematics ', 1),
(3, 'HUMSS', 'Humanities and Social Sciences', 1),
(4, 'GAS', 'General Academic ', 1),
(5, 'AD', 'Arts and Design', 2),
(6, 'Sports', 'Sports', 3),
(7, 'AFA', 'Agri-Fishery Arts', 4),
(8, 'HE', 'Home Economics', 4),
(9, 'IA', 'Industrial Arts', 4),
(10, 'ICT', 'Information and Communications Technology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students_documents_tbl`
--

CREATE TABLE `students_documents_tbl` (
  `doc_id` int(11) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `doc_title` varchar(120) NOT NULL,
  `doc_school_year` varchar(30) NOT NULL,
  `doc_filename` varchar(255) NOT NULL,
  `doc_random_filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_account_t`
--

CREATE TABLE `student_account_t` (
  `s_account_id` bigint(20) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_dissabled` tinyint(1) NOT NULL,
  `type` varchar(60) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account_t`
--

INSERT INTO `student_account_t` (`s_account_id`, `user_name`, `password`, `is_new`, `is_dissabled`, `type`, `en_id`, `created_at`, `updated_at`) VALUES
(1, '23-00001', 'iloilonhs', 1, 1, 'student', 1, '2023-07-21 10:07:21', '2023-07-21 10:43:30'),
(3, '23-00003', 'iloilonhs', 1, 0, 'student', 3, '2023-07-21 10:11:33', '2023-07-21 10:11:33'),
(4, '23-00004', 'iloilonhs', 1, 1, 'student', 4, '2023-07-21 10:16:14', '2023-07-21 10:40:06'),
(5, '23-00005', 'iloilonhs', 1, 0, 'student', 5, '2023-07-21 10:53:02', '2023-07-21 10:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_address_tbl`
--

CREATE TABLE `student_address_tbl` (
  `address_id` bigint(20) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `address_type` varchar(30) NOT NULL,
  `blok_lot_phase_bldg` varchar(60) NOT NULL,
  `street` varchar(60) NOT NULL,
  `subdivision_village` varchar(60) NOT NULL,
  `barangay` varchar(80) NOT NULL,
  `municipality_city` varchar(120) NOT NULL,
  `province` varchar(120) NOT NULL,
  `zip_code` varchar(25) NOT NULL,
  `region` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_devices_tbl`
--

CREATE TABLE `student_devices_tbl` (
  `dev_id` int(11) NOT NULL,
  `dev_name` varchar(60) NOT NULL,
  `dev_type` varchar(60) NOT NULL,
  `is_functioning` tinyint(1) NOT NULL,
  `stud_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_health_tbl`
--

CREATE TABLE `student_health_tbl` (
  `health_id` int(11) NOT NULL,
  `health_condition` varchar(120) NOT NULL,
  `health_type` varchar(60) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `remarks` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_parents_tbl`
--

CREATE TABLE `student_parents_tbl` (
  `parent_id` bigint(20) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `f_is_deceased` tinyint(1) NOT NULL,
  `f_fname` varchar(60) NOT NULL,
  `f_mname` varchar(60) NOT NULL,
  `f_lname` varchar(60) NOT NULL,
  `f_highest_education` varchar(40) NOT NULL,
  `f_contact` varchar(60) NOT NULL,
  `f_email` varchar(120) NOT NULL,
  `f_facebook` varchar(120) NOT NULL,
  `f_is_working` tinyint(1) NOT NULL,
  `f_employer` varchar(120) NOT NULL,
  `f_company` varchar(120) NOT NULL,
  `f_salary` varchar(30) NOT NULL,
  `m_is_deceased` tinyint(1) NOT NULL,
  `m_fname` varchar(60) NOT NULL,
  `m_mname` varchar(60) NOT NULL,
  `m_lname` varchar(60) NOT NULL,
  `m_highest_education` varchar(80) NOT NULL,
  `m_contact` varchar(60) NOT NULL,
  `m_email` varchar(80) NOT NULL,
  `m_facebook` varchar(80) NOT NULL,
  `m_is_working` tinyint(1) NOT NULL,
  `m_employer` varchar(120) NOT NULL,
  `m_company` varchar(120) NOT NULL,
  `m_salary` varchar(60) NOT NULL,
  `g_fname` varchar(60) NOT NULL,
  `g_mname` varchar(60) NOT NULL,
  `g_lname` varchar(60) NOT NULL,
  `g_highest_education` varchar(60) NOT NULL,
  `g_contact` varchar(60) NOT NULL,
  `g_email` varchar(80) NOT NULL,
  `g_facebook` varchar(80) NOT NULL,
  `is_4ps` tinyint(1) NOT NULL,
  `household_no` varchar(80) NOT NULL,
  `is_ip` tinyint(1) NOT NULL,
  `ip_community` varchar(100) NOT NULL,
  `financial_provider` varchar(60) NOT NULL,
  `instructional_provider` varchar(60) NOT NULL,
  `family_business` varchar(120) NOT NULL,
  `home_distance` int(11) NOT NULL,
  `transportation` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_program_tbl`
--

CREATE TABLE `student_program_tbl` (
  `stud_prog_id` bigint(20) NOT NULL,
  `prog_id` smallint(6) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_program_tbl`
--

INSERT INTO `student_program_tbl` (`stud_prog_id`, `prog_id`, `stud_id`, `is_active`, `sy_id`, `created_by`, `created_at`, `updated_at`) VALUES
(67, 15, 1, 1, 1, 274, '2023-07-21 10:55:23', '2023-07-21 10:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_school_tbl`
--

CREATE TABLE `student_school_tbl` (
  `sch_id` smallint(6) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `grade_level_completed` varchar(25) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `school_name` varchar(120) NOT NULL,
  `school_id` varchar(30) NOT NULL,
  `school_type` varchar(60) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `adviser_name` varchar(60) NOT NULL,
  `returning_student` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_section_tbl`
--

CREATE TABLE `student_section_tbl` (
  `stud_sec_id` int(11) NOT NULL,
  `sec_id` smallint(6) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_strands_tbl`
--

CREATE TABLE `student_strands_tbl` (
  `stud_strand_id` bigint(20) NOT NULL,
  `s_strand_id` int(11) NOT NULL,
  `s_strand_stud_id` bigint(20) NOT NULL,
  `s_sy_id` int(11) NOT NULL,
  `strand_sem_id` smallint(6) NOT NULL,
  `s_is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_group_head_tbl`
--

CREATE TABLE `subject_group_head_tbl` (
  `sgh_id` int(11) NOT NULL,
  `sgh_sg_id` int(11) NOT NULL,
  `sgh_emp_id` int(11) NOT NULL,
  `sgh_sy` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_group_tbl`
--

CREATE TABLE `subject_group_tbl` (
  `sg_id` int(11) NOT NULL,
  `sg_subject` varchar(50) NOT NULL,
  `sg_group` varchar(60) NOT NULL,
  `sg_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_group_tbl`
--

INSERT INTO `subject_group_tbl` (`sg_id`, `sg_subject`, `sg_group`, `sg_description`) VALUES
(1, 'HUMSS', 'I-A', 'Oral Communication; Reading and Writing; English for\r\nAcademic and Professional Purposes; Practical Research'),
(2, 'HUMSS', 'I-B', 'Komunikasyon at Pananaliksik sa Wika at Kulturang\r\nPilipino; Pagbasa at Pagsusuri ng Iba’t Ibang Teksto sa\r\nPananaliksik; Pagsulat sa Filipino sa Piling Larangan'),
(3, 'HUMSS', 'I-C', '21st Century Literature from the Philippines and the\r\nWorld; Contemporary Philippine Arts from the Region;\r\nUnderstanding Culture, Society and Politics;\r\nIntroduction to the Philosophy of the Human Person; and\r\nrelated specialized HUMSS subjects'),
(4, 'HUMSS', 'I-D', 'Media and Information Literacy; Empowerment\r\nTechnologies (for the Strands)'),
(5, 'ABM', 'II', 'Entrepreneurship; Research and Work Immersion'),
(6, 'STEM', 'III-A', 'General Mathematics; Statistics and Probability; and\r\nrelated specialized STEM subjects'),
(7, 'STEM', 'III-B', 'Earth Science; Earth and Life Science; Physical Science;\r\nand related specialized STEM subjects'),
(8, 'TVL', 'IV-A', 'Specialized TVL/Agri-Fisheries'),
(9, 'TVL', 'IV-B', 'Specialized TVL/Industrial Arts'),
(10, 'TVL', 'IV-C', 'Specialized TVL/ICT'),
(11, 'TVL', 'IV-D', 'Specialized TVL/Home Economics'),
(12, 'SPORTS', 'V-A', 'Physical Education and Health; Personal Development;\r\nand related specialized Sports Subjects'),
(13, 'Arts and Design', 'VI', 'Arts and Design');

-- --------------------------------------------------------

--
-- Table structure for table `track_tbl`
--

CREATE TABLE `track_tbl` (
  `track_id` int(11) NOT NULL,
  `track_title` varchar(60) NOT NULL,
  `track_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_tbl`
--

INSERT INTO `track_tbl` (`track_id`, `track_title`, `track_description`) VALUES
(1, 'Acad', 'Academic Track'),
(2, 'AD', 'Arts and Design'),
(3, 'ST', 'Sports Track'),
(4, 'TVL', 'Technical-Vocation Livelihood');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `user_restriction` varchar(150) NOT NULL,
  `user_category` int(11) NOT NULL,
  `is_disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_email`, `user_password`, `user_type`, `user_restriction`, `user_category`, `is_disabled`) VALUES
(274, 3294, 'yveskim.cabanting@iloilonhs.edu.ph', '$2y$10$ICUCIvVAvt1YR7RGFqes8O6QKkJVNZKByE71nFGv9tRbh0sLk0bYS', 'Admin', '1', 3, 0),
(276, 3311, 'johannathea.lupo@iloilonhs.edu.ph', '$2y$10$OXpKZMxx5lY300XpSOcIY.F8jy1Mo99dZv8Kb1VPWLxK4dYA9z8NW', 'Admin', '1', 2, 0),
(277, 3317, 'lorygene.umadhay@iloilonhs.edu.ph', '$2y$10$.0KSBLYMyhP137sLLsGOEeblduyBXQbXiz275wFX6k6XixJqNiOrG', 'Admin', '1', 1, 0),
(278, 3318, 'christine.marin@iloilonhs.edu.ph', '$2y$10$PYRRs0ROAB0n/PS58dKW2uuBuRptgNwJcYN7aBashcrXergAvVxda', 'Admin', '1', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisery_tbl`
--
ALTER TABLE `advisery_tbl`
  ADD PRIMARY KEY (`adv_id`),
  ADD KEY `adviser_id` (`adviser_id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `sec_det_id` (`sec_det_id`);

--
-- Indexes for table `average_tbl`
--
ALTER TABLE `average_tbl`
  ADD PRIMARY KEY (`ave_id`),
  ADD KEY `ave_stu_id` (`ave_stud_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `department_head_tbl`
--
ALTER TABLE `department_head_tbl`
  ADD PRIMARY KEY (`dept_head_id`),
  ADD KEY `head_id` (`head_id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `dept_id` (`dh_dept_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `dept_category` (`dept_category`);

--
-- Indexes for table `educational_bg_t`
--
ALTER TABLE `educational_bg_t`
  ADD PRIMARY KEY (`educ_bg_id`),
  ADD KEY `educ_bg_emp_id` (`educ_bg_emp_id`);

--
-- Indexes for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  ADD PRIMARY KEY (`elig_id`),
  ADD KEY `elig_emp_id` (`elig_emp_id`);

--
-- Indexes for table `employee_category_tbl`
--
ALTER TABLE `employee_category_tbl`
  ADD PRIMARY KEY (`emp_cat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  ADD PRIMARY KEY (`emp_dept_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  ADD PRIMARY KEY (`emp_prog_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `prog_id` (`prog_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `employee_t`
--
ALTER TABLE `employee_t`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_school_id` (`emp_school_id`);

--
-- Indexes for table `employment_status_tbl`
--
ALTER TABLE `employment_status_tbl`
  ADD PRIMARY KEY (`emp_stat_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `plantila_id` (`plantilla_id`);

--
-- Indexes for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD PRIMARY KEY (`others_id`),
  ADD KEY `others_emp_id` (`others_emp_id`);

--
-- Indexes for table `emp_work_experience_t`
--
ALTER TABLE `emp_work_experience_t`
  ADD PRIMARY KEY (`work_exp_id`),
  ADD KEY `work_exp_emp_id` (`work_exp_emp_id`);

--
-- Indexes for table `emp_work_involvement_t`
--
ALTER TABLE `emp_work_involvement_t`
  ADD PRIMARY KEY (`work_inv_id`),
  ADD KEY `work_inv_emp_id` (`work_inv_emp_id`);

--
-- Indexes for table `enrollment_status_tbl`
--
ALTER TABLE `enrollment_status_tbl`
  ADD PRIMARY KEY (`en_stat_id`),
  ADD KEY `en_id` (`en_id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `enrolled_by` (`enrolled_by`),
  ADD KEY `grade_level` (`grade_level_id`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD PRIMARY KEY (`en_id`),
  ADD UNIQUE KEY `school_id` (`student_id`),
  ADD UNIQUE KEY `student_lrn` (`student_lrn`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `en_sy` (`en_sy`);

--
-- Indexes for table `faculty_subject_group_tbl`
--
ALTER TABLE `faculty_subject_group_tbl`
  ADD PRIMARY KEY (`fsg_id`),
  ADD KEY `fsg_sg_id` (`fsg_sg_id`),
  ADD KEY `fsg_emp_id` (`fsg_emp_id`),
  ADD KEY `fsg_sy_id` (`fsg_sy_id`),
  ADD KEY `fsg_assigned_by` (`fsg_assigned_by`);

--
-- Indexes for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  ADD PRIMARY KEY (`fam_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `grade_level_tbl`
--
ALTER TABLE `grade_level_tbl`
  ADD PRIMARY KEY (`grade_level_id`);

--
-- Indexes for table `household_members_tbl`
--
ALTER TABLE `household_members_tbl`
  ADD PRIMARY KEY (`hm_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  ADD PRIMARY KEY (`ld_id`),
  ADD KEY `ld_emp_id` (`ld_emp_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `user_id` (`publisher`);

--
-- Indexes for table `plantilla_tbl`
--
ALTER TABLE `plantilla_tbl`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `emp_id` (`ph_emp_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `program_tbl`
--
ALTER TABLE `program_tbl`
  ADD PRIMARY KEY (`prog_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `section_details_tbl`
--
ALTER TABLE `section_details_tbl`
  ADD PRIMARY KEY (`sec_det_id`),
  ADD KEY `grade_level_id` (`grade_level_id`),
  ADD KEY `prog_id` (`prog_id`);

--
-- Indexes for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `shs_section_adviser_tbl`
--
ALTER TABLE `shs_section_adviser_tbl`
  ADD PRIMARY KEY (`shs_adv_id`),
  ADD KEY `shs_adv_emp_id` (`shs_adv_emp_id`),
  ADD KEY `shs_adv_section_id` (`shs_adv_section_id`),
  ADD KEY `shs_adv_sy` (`shs_adv_sy`),
  ADD KEY `shs_co_adviser_id` (`shs_co_adviser_id`),
  ADD KEY `shs_adv_semester` (`shs_adv_semester`);

--
-- Indexes for table `shs_section_subject_tbl`
--
ALTER TABLE `shs_section_subject_tbl`
  ADD PRIMARY KEY (`sec_sub_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sub_sy` (`sub_sy`),
  ADD KEY `sub_sem` (`sub_sem`);

--
-- Indexes for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  ADD PRIMARY KEY (`shs_sec_id`),
  ADD KEY `shs_grade_level` (`shs_grade_level`),
  ADD KEY `strand_id` (`strand_id`);

--
-- Indexes for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  ADD PRIMARY KEY (`shs_stud_sec_id`),
  ADD KEY `shs_stud_id` (`shs_stud_id`),
  ADD KEY `shs_sec_id` (`shs_sec_id`),
  ADD KEY `shs_stud_sec_sy` (`shs_stud_sec_sy`),
  ADD KEY `shs_assigned_by` (`shs_assigned_by`),
  ADD KEY `shs_student_sem` (`shs_student_sem`);

--
-- Indexes for table `shs_subject_tbl`
--
ALTER TABLE `shs_subject_tbl`
  ADD PRIMARY KEY (`shs_sub_id`),
  ADD KEY `subject_semester` (`subject_semester`),
  ADD KEY `subject_grade_level` (`subject_grade_level`);

--
-- Indexes for table `strands_tbl`
--
ALTER TABLE `strands_tbl`
  ADD PRIMARY KEY (`strand_id`),
  ADD KEY `s_track_id` (`s_track_id`);

--
-- Indexes for table `students_documents_tbl`
--
ALTER TABLE `students_documents_tbl`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `student_account_t`
--
ALTER TABLE `student_account_t`
  ADD PRIMARY KEY (`s_account_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `en_id` (`en_id`);

--
-- Indexes for table `student_address_tbl`
--
ALTER TABLE `student_address_tbl`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `en_id` (`en_id`);

--
-- Indexes for table `student_devices_tbl`
--
ALTER TABLE `student_devices_tbl`
  ADD PRIMARY KEY (`dev_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `student_health_tbl`
--
ALTER TABLE `student_health_tbl`
  ADD PRIMARY KEY (`health_id`),
  ADD KEY `en_id` (`en_id`);

--
-- Indexes for table `student_parents_tbl`
--
ALTER TABLE `student_parents_tbl`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `student_program_tbl`
--
ALTER TABLE `student_program_tbl`
  ADD PRIMARY KEY (`stud_prog_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `prog_id` (`prog_id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `student_school_tbl`
--
ALTER TABLE `student_school_tbl`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `grade_level_completed` (`grade_level_completed`),
  ADD KEY `stud_id_2` (`stud_id`);

--
-- Indexes for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  ADD PRIMARY KEY (`stud_sec_id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `en_id` (`en_id`),
  ADD KEY `sy_id` (`sy_id`);

--
-- Indexes for table `student_strands_tbl`
--
ALTER TABLE `student_strands_tbl`
  ADD PRIMARY KEY (`stud_strand_id`),
  ADD KEY `s_strand_id` (`s_strand_id`),
  ADD KEY `s_strand_stud_id` (`s_strand_stud_id`),
  ADD KEY `s_sy_id` (`s_sy_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `strand_sem_id` (`strand_sem_id`);

--
-- Indexes for table `subject_group_head_tbl`
--
ALTER TABLE `subject_group_head_tbl`
  ADD PRIMARY KEY (`sgh_id`),
  ADD KEY `sgh_emp_id` (`sgh_emp_id`),
  ADD KEY `sgh_sy` (`sgh_sy`),
  ADD KEY `sg_id` (`sgh_sg_id`);

--
-- Indexes for table `subject_group_tbl`
--
ALTER TABLE `subject_group_tbl`
  ADD PRIMARY KEY (`sg_id`);

--
-- Indexes for table `track_tbl`
--
ALTER TABLE `track_tbl`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_number` (`user_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisery_tbl`
--
ALTER TABLE `advisery_tbl`
  MODIFY `adv_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `average_tbl`
--
ALTER TABLE `average_tbl`
  MODIFY `ave_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cat_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_head_tbl`
--
ALTER TABLE `department_head_tbl`
  MODIFY `dept_head_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `dept_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `educational_bg_t`
--
ALTER TABLE `educational_bg_t`
  MODIFY `educ_bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  MODIFY `elig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_category_tbl`
--
ALTER TABLE `employee_category_tbl`
  MODIFY `emp_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  MODIFY `emp_dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  MODIFY `emp_prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_t`
--
ALTER TABLE `employee_t`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3319;

--
-- AUTO_INCREMENT for table `employment_status_tbl`
--
ALTER TABLE `employment_status_tbl`
  MODIFY `emp_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  MODIFY `others_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_work_experience_t`
--
ALTER TABLE `emp_work_experience_t`
  MODIFY `work_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `emp_work_involvement_t`
--
ALTER TABLE `emp_work_involvement_t`
  MODIFY `work_inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment_status_tbl`
--
ALTER TABLE `enrollment_status_tbl`
  MODIFY `en_stat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  MODIFY `en_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_subject_group_tbl`
--
ALTER TABLE `faculty_subject_group_tbl`
  MODIFY `fsg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grade_level_tbl`
--
ALTER TABLE `grade_level_tbl`
  MODIFY `grade_level_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `household_members_tbl`
--
ALTER TABLE `household_members_tbl`
  MODIFY `hm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `plantilla_tbl`
--
ALTER TABLE `plantilla_tbl`
  MODIFY `plant_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `prog_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section_details_tbl`
--
ALTER TABLE `section_details_tbl`
  MODIFY `sec_det_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `sem_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shs_section_adviser_tbl`
--
ALTER TABLE `shs_section_adviser_tbl`
  MODIFY `shs_adv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `shs_section_subject_tbl`
--
ALTER TABLE `shs_section_subject_tbl`
  MODIFY `sec_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  MODIFY `shs_sec_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  MODIFY `shs_stud_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shs_subject_tbl`
--
ALTER TABLE `shs_subject_tbl`
  MODIFY `shs_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `strands_tbl`
--
ALTER TABLE `strands_tbl`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students_documents_tbl`
--
ALTER TABLE `students_documents_tbl`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_account_t`
--
ALTER TABLE `student_account_t`
  MODIFY `s_account_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_address_tbl`
--
ALTER TABLE `student_address_tbl`
  MODIFY `address_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_devices_tbl`
--
ALTER TABLE `student_devices_tbl`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_health_tbl`
--
ALTER TABLE `student_health_tbl`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_parents_tbl`
--
ALTER TABLE `student_parents_tbl`
  MODIFY `parent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_program_tbl`
--
ALTER TABLE `student_program_tbl`
  MODIFY `stud_prog_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `student_school_tbl`
--
ALTER TABLE `student_school_tbl`
  MODIFY `sch_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  MODIFY `stud_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_strands_tbl`
--
ALTER TABLE `student_strands_tbl`
  MODIFY `stud_strand_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subject_group_head_tbl`
--
ALTER TABLE `subject_group_head_tbl`
  MODIFY `sgh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_group_tbl`
--
ALTER TABLE `subject_group_tbl`
  MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `track_tbl`
--
ALTER TABLE `track_tbl`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisery_tbl`
--
ALTER TABLE `advisery_tbl`
  ADD CONSTRAINT `advisery_tbl_ibfk_4` FOREIGN KEY (`adviser_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advisery_tbl_ibfk_5` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advisery_tbl_ibfk_6` FOREIGN KEY (`sec_det_id`) REFERENCES `section_details_tbl` (`sec_det_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `average_tbl`
--
ALTER TABLE `average_tbl`
  ADD CONSTRAINT `average_tbl_ibfk_1` FOREIGN KEY (`ave_stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_head_tbl`
--
ALTER TABLE `department_head_tbl`
  ADD CONSTRAINT `department_head_tbl_ibfk_1` FOREIGN KEY (`dh_dept_id`) REFERENCES `department_tbl` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_head_tbl_ibfk_2` FOREIGN KEY (`head_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_head_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD CONSTRAINT `department_tbl_ibfk_2` FOREIGN KEY (`dept_category`) REFERENCES `category_tbl` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `educational_bg_t`
--
ALTER TABLE `educational_bg_t`
  ADD CONSTRAINT `educational_bg_t_ibfk_1` FOREIGN KEY (`educ_bg_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  ADD CONSTRAINT `eligibility_t_ibfk_1` FOREIGN KEY (`elig_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_category_tbl`
--
ALTER TABLE `employee_category_tbl`
  ADD CONSTRAINT `employee_category_tbl_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category_tbl` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_category_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  ADD CONSTRAINT `employee_children_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  ADD CONSTRAINT `employee_department_tbl_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department_tbl` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_department_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_department_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  ADD CONSTRAINT `employee_program_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_program_tbl_ibfk_2` FOREIGN KEY (`prog_id`) REFERENCES `program_tbl` (`prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_program_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employment_status_tbl`
--
ALTER TABLE `employment_status_tbl`
  ADD CONSTRAINT `employment_status_tbl_ibfk_1` FOREIGN KEY (`plantilla_id`) REFERENCES `plantilla_tbl` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employment_status_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD CONSTRAINT `emp_others_t_ibfk_1` FOREIGN KEY (`others_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_work_experience_t`
--
ALTER TABLE `emp_work_experience_t`
  ADD CONSTRAINT `emp_work_experience_t_ibfk_1` FOREIGN KEY (`work_exp_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_work_involvement_t`
--
ALTER TABLE `emp_work_involvement_t`
  ADD CONSTRAINT `emp_work_involvement_t_ibfk_1` FOREIGN KEY (`work_inv_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment_status_tbl`
--
ALTER TABLE `enrollment_status_tbl`
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_1` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_2` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_level_tbl` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_5` FOREIGN KEY (`enrolled_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_6` FOREIGN KEY (`semester`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD CONSTRAINT `enrollment_tbl_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_tbl_ibfk_2` FOREIGN KEY (`en_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_subject_group_tbl`
--
ALTER TABLE `faculty_subject_group_tbl`
  ADD CONSTRAINT `faculty_subject_group_tbl_ibfk_1` FOREIGN KEY (`fsg_sg_id`) REFERENCES `subject_group_tbl` (`sg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_subject_group_tbl_ibfk_2` FOREIGN KEY (`fsg_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_subject_group_tbl_ibfk_3` FOREIGN KEY (`fsg_assigned_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_subject_group_tbl_ibfk_4` FOREIGN KEY (`fsg_sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  ADD CONSTRAINT `family_bg_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `household_members_tbl`
--
ALTER TABLE `household_members_tbl`
  ADD CONSTRAINT `household_members_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `household_members_tbl_ibfk_2` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  ADD CONSTRAINT `learning_development_t_ibfk_1` FOREIGN KEY (`ld_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  ADD CONSTRAINT `program_head_tbl_ibfk_1` FOREIGN KEY (`ph_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_head_tbl_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `program_tbl` (`prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_head_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_tbl`
--
ALTER TABLE `program_tbl`
  ADD CONSTRAINT `program_tbl_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category_tbl` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_details_tbl`
--
ALTER TABLE `section_details_tbl`
  ADD CONSTRAINT `section_details_tbl_ibfk_1` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_level_tbl` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_details_tbl_ibfk_2` FOREIGN KEY (`prog_id`) REFERENCES `program_tbl` (`prog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_section_adviser_tbl`
--
ALTER TABLE `shs_section_adviser_tbl`
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_1` FOREIGN KEY (`shs_adv_section_id`) REFERENCES `shs_section_tbl` (`shs_sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_2` FOREIGN KEY (`shs_adv_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_3` FOREIGN KEY (`shs_adv_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_4` FOREIGN KEY (`shs_co_adviser_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_5` FOREIGN KEY (`shs_adv_semester`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_section_subject_tbl`
--
ALTER TABLE `shs_section_subject_tbl`
  ADD CONSTRAINT `shs_section_subject_tbl_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `shs_section_tbl` (`shs_sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_subject_tbl_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `shs_subject_tbl` (`shs_sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_subject_tbl_ibfk_3` FOREIGN KEY (`sub_sem`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_subject_tbl_ibfk_4` FOREIGN KEY (`sub_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  ADD CONSTRAINT `shs_section_tbl_ibfk_1` FOREIGN KEY (`shs_grade_level`) REFERENCES `grade_level_tbl` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_section_tbl_ibfk_2` FOREIGN KEY (`strand_id`) REFERENCES `strands_tbl` (`strand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_1` FOREIGN KEY (`shs_sec_id`) REFERENCES `shs_section_tbl` (`shs_sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_2` FOREIGN KEY (`shs_stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_3` FOREIGN KEY (`shs_stud_sec_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_4` FOREIGN KEY (`shs_assigned_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_5` FOREIGN KEY (`shs_student_sem`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_subject_tbl`
--
ALTER TABLE `shs_subject_tbl`
  ADD CONSTRAINT `shs_subject_tbl_ibfk_1` FOREIGN KEY (`subject_semester`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_subject_tbl_ibfk_2` FOREIGN KEY (`subject_grade_level`) REFERENCES `grade_level_tbl` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `strands_tbl`
--
ALTER TABLE `strands_tbl`
  ADD CONSTRAINT `strands_tbl_ibfk_1` FOREIGN KEY (`s_track_id`) REFERENCES `track_tbl` (`track_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_documents_tbl`
--
ALTER TABLE `students_documents_tbl`
  ADD CONSTRAINT `students_documents_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_account_t`
--
ALTER TABLE `student_account_t`
  ADD CONSTRAINT `student_account_t_ibfk_1` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_address_tbl`
--
ALTER TABLE `student_address_tbl`
  ADD CONSTRAINT `student_address_tbl_ibfk_1` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_devices_tbl`
--
ALTER TABLE `student_devices_tbl`
  ADD CONSTRAINT `student_devices_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_health_tbl`
--
ALTER TABLE `student_health_tbl`
  ADD CONSTRAINT `student_health_tbl_ibfk_1` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_parents_tbl`
--
ALTER TABLE `student_parents_tbl`
  ADD CONSTRAINT `student_parents_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_program_tbl`
--
ALTER TABLE `student_program_tbl`
  ADD CONSTRAINT `student_program_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_program_tbl_ibfk_2` FOREIGN KEY (`prog_id`) REFERENCES `program_tbl` (`prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_program_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_program_tbl_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_school_tbl`
--
ALTER TABLE `student_school_tbl`
  ADD CONSTRAINT `student_school_tbl_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  ADD CONSTRAINT `student_section_tbl_ibfk_3` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_section_tbl_ibfk_4` FOREIGN KEY (`sec_id`) REFERENCES `section_details_tbl` (`sec_det_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_section_tbl_ibfk_5` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_strands_tbl`
--
ALTER TABLE `student_strands_tbl`
  ADD CONSTRAINT `student_strands_tbl_ibfk_1` FOREIGN KEY (`s_strand_id`) REFERENCES `strands_tbl` (`strand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_strands_tbl_ibfk_2` FOREIGN KEY (`s_strand_stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_strands_tbl_ibfk_3` FOREIGN KEY (`s_sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_strands_tbl_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_strands_tbl_ibfk_5` FOREIGN KEY (`strand_sem_id`) REFERENCES `semester_tbl` (`sem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_group_head_tbl`
--
ALTER TABLE `subject_group_head_tbl`
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_1` FOREIGN KEY (`sgh_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_2` FOREIGN KEY (`sgh_sg_id`) REFERENCES `subject_group_tbl` (`sg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_3` FOREIGN KEY (`sgh_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
