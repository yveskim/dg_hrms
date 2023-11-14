-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 03:03 PM
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

--
-- Dumping data for table `advisery_tbl`
--

INSERT INTO `advisery_tbl` (`adv_id`, `sec_det_id`, `adviser_id`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 24, 3294, 2, '2023-07-06 15:23:36', '2023-07-06 15:23:36', NULL),
(22, 24, 3294, 1, '2023-07-06 15:35:24', '2023-07-06 15:35:24', NULL);

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

--
-- Dumping data for table `average_tbl`
--

INSERT INTO `average_tbl` (`ave_id`, `ave_stud_id`, `ave_grade_level`, `ave_semester`, `ave_sy`, `average`) VALUES
(1, 213, 'Grade 6', '', '2022-2023', '89.00'),
(3, 217, 'Grade 11', '2nd Semester', '2022-2023', '85.00'),
(4, 214, 'Grade 6', '', '2022-2023', '88.00'),
(5, 220, 'Grade 11', '1st Semester', '2022-2023', '90.00'),
(6, 220, 'Grade 11', '2nd Semester', '2022-2023', '92.00');

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

--
-- Dumping data for table `educational_bg_t`
--

INSERT INTO `educational_bg_t` (`educ_bg_id`, `educ_bg_level`, `educ_bg_school`, `educ_bg_degree`, `educ_bg_from`, `educ_bg_to`, `educ_bg_units`, `educ_bg_year_graduated`, `educ_bg_scholarship_honors`, `educ_bg_emp_id`) VALUES
(41, 'Graduate Studies', 'Northern Negros State College of Science and Technology', 'Phd TM', '2020-01-01', '2023-12-12', '50', '2010', 'none', 3295),
(42, 'Secondary', 'Iloilo National High School', 'Secondary', '2010-04-15', '2016-12-15', 'none', '2016', 'none', 3295),
(43, 'Elementary', 'Jaro National High School', 'Primary', '2023-04-07', '2023-04-17', 'highest honors', '2001', 'academic excellence award', 3295),
(44, 'Graduate Studies', 'Nonescost', 'MIT', '2019-12-20', '2023-05-05', '50', '2023', 'none', 3299),
(45, 'College', 'Central Philippines University', 'BS Information Technology', '2008-06-02', '2013-03-08', 'Graduated', '2013', 'none', 3297);

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

--
-- Dumping data for table `employee_category_tbl`
--

INSERT INTO `employee_category_tbl` (`emp_cat_id`, `cat_id`, `emp_id`) VALUES
(4, 2, 3294),
(7, 1, 3295),
(8, 2, 3296),
(9, 2, 3297),
(10, 2, 3299),
(12, 2, 3310);

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

--
-- Dumping data for table `employee_children_t`
--

INSERT INTO `employee_children_t` (`child_id`, `child_name`, `child_birthdate`, `emp_id`) VALUES
(144, 'tin tin', '2019-05-02', 3299);

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
(31, 3294, 15, 2, '2023-07-06 15:23:08', '2023-07-06 15:23:08', NULL),
(32, 3295, 15, 2, '2023-07-06 15:23:10', '2023-07-06 15:23:10', NULL);

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
(3295, 2, '0001', 'Jano', 'Sarcino', 'Tabor', '1682518886_9bef8373c5ddff70d21e.jpg', 'Male', 'Single', 'Filipino', '', '', '1985-05-05', 'Jaro, Iloilo City', 'Roman Catholic', '', 145, 67, '', '', '', '', '', '', 'jano.tabor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-04-26 22:21:26', '2023-04-26 22:21:26', NULL),
(3296, 2, '0002', 'Lovelyn', 'Paborito', 'Castro', '1682602597_58b77108472670e87cd6.jpg', 'Female', 'Married', 'Filipino', '', '', '1982-02-02', 'Capiz', 'Roman Catholic', '', 145, 45, '', '', '', '', '', '', 'lovelyn.castro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0965663654', '2023-04-27 21:36:37', '2023-04-27 21:36:37', NULL),
(3297, 2, '0003', 'Bernadette', 'berns', 'albiso', '1682747762_b933867c3b0201536994.jpg', 'Female', 'Married', 'Filipino', '', '', '1992-04-14', 'iloilo city', 'roman catholic', '', 0, 0, '', '', '', '', '', '', 'bernadette.albiso@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-04-29 13:56:02', '2023-04-29 13:56:02', NULL),
(3299, 2, '00003', 'Roel', 'Suaveron', 'Palmaira', '1683090375_59c0cc7a3bf9b9880ca5.jpg', 'Male', 'Married', 'Filipino', '', '', '1987-05-02', 'passsi', 'Roman Catholic', '', 0, 0, '', '', '', '', '', '', 'roel.palmaira@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-05-03 13:06:15', '2023-05-03 13:10:36', NULL),
(3304, 2, '75646', 'Kent Arman', 'Doe', 'Dema ala', '1687851716_8fd668ad255625f212c9.png', '', '', 'Filipino', '', '', '2023-06-20', '', '', '', 0, 0, '', '', '', '', '', '', 'kent.demaala@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-27 15:41:56', '2023-06-27 15:41:56', NULL),
(3305, 2, '543534', 'Sarah', 'Micthel', 'Smith', '1687851941_57522e3979fa4f5e4535.png', '', '', 'Filipino', '', '', '2023-06-07', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-27 15:45:41', '2023-06-27 15:54:58', NULL),
(3306, 2, '435878', 'George', 'Michaels', 'Detroit', '1687852569_cbe1342ff5beee66f99d.png', '', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-27 15:56:09', '2023-06-27 15:56:09', NULL),
(3307, 2, '45346999', 'John', 'Melon', 'Lenon', '1687852633_a7f621eaed2e1b94a3bf.png', '', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-27 15:57:13', '2023-06-27 15:59:42', NULL),
(3310, 2, '6564545', 'Bon', 'Jovi', 'Jackson', '1687852766_6feb698886199e056165.png', '', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-06-27 15:59:26', '2023-06-27 15:59:26', NULL),
(3311, 2, '03163', 'Johanna Thea', 'Belandres', 'Lupo', '1688959925_a882b5710abb5eba0430.jpg', '', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'johannathea.lupo@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-10 11:32:05', '2023-07-10 11:32:05', NULL);

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

--
-- Dumping data for table `employment_status_tbl`
--

INSERT INTO `employment_status_tbl` (`emp_stat_id`, `emp_id`, `emp_status`, `plantilla_id`, `step`, `date_assigned`, `is_retired`, `retirement_date`, `created_at`, `updated_at`) VALUES
(16, 3295, 'Permanent', 1, 1, '2023-05-02', 0, NULL, '2023-05-08 14:32:42', '2023-05-08 14:32:42'),
(17, 3296, 'regular', 6, 1, '2023-05-01', 0, NULL, '2023-05-08 16:55:04', '2023-05-08 16:55:04'),
(28, 3294, 'Permanent', 2, 1, '2023-05-01', 0, NULL, '2023-05-09 11:45:14', '2023-05-09 11:45:14'),
(29, 3299, 'Permanent', 3, 1, '2023-05-02', 0, NULL, '2023-05-09 13:14:26', '2023-05-09 13:14:26');

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
  `submitted_sf10` tinyint(1) NOT NULL,
  `submitted_good_moral` tinyint(1) NOT NULL,
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

INSERT INTO `enrollment_status_tbl` (`en_stat_id`, `en_id`, `sy_id`, `submitted_sf9`, `submitted_sf10`, `submitted_good_moral`, `submitted_psa`, `enrollment_status`, `is_als`, `is_pssn`, `remarks`, `grade_level_id`, `semester`, `enrolled_by`, `enrolled_at`, `updated_at`) VALUES
(197, 220, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 1, NULL, 274, '2023-07-06 10:09:57', '2023-07-06 10:09:57'),
(199, 221, 2, 1, 1, 1, 1, 'OE', 0, 0, '', 1, NULL, 274, '2023-07-06 10:33:18', '2023-07-06 10:33:18'),
(200, 218, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 1, NULL, 274, '2023-07-06 11:19:38', '2023-07-06 11:19:38'),
(201, 217, 1, 1, 1, 1, 1, 'OE', 1, 1, '', 1, NULL, 274, '2023-07-06 11:21:41', '2023-07-06 11:21:41'),
(203, 226, 2, 1, 1, 1, 1, 'OE', 0, 0, '', 5, 1, 274, '2023-07-07 11:13:12', '2023-07-07 11:13:12'),
(204, 216, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 5, 2, 274, '2023-07-07 11:45:06', '2023-07-07 11:45:06'),
(207, 225, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 5, 1, 274, '2023-07-07 12:20:19', '2023-07-07 12:20:19'),
(208, 219, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 5, 1, 274, '2023-07-07 12:20:28', '2023-07-07 12:20:28'),
(209, 215, 1, 1, 1, 1, 1, 'OE', 0, 0, '', 5, 1, 274, '2023-07-07 12:24:45', '2023-07-07 12:24:45'),
(210, 227, 1, 1, 0, 1, 1, 'OE', 0, 1, '', 5, 1, 276, '2023-07-10 11:38:03', '2023-07-10 11:38:03'),
(211, 228, 1, 1, 1, 1, 0, 'CE', 0, 0, '', 5, 1, 276, '2023-07-10 12:06:51', '2023-07-10 12:06:51');

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
  `gender` varchar(25) NOT NULL,
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

INSERT INTO `enrollment_tbl` (`en_id`, `student_id`, `student_lrn`, `first_name`, `middle_name`, `last_name`, `gender`, `birthdate`, `birth_place`, `psa_birth_certificate_no`, `citizenship`, `religion`, `mother_tongue`, `blood_type`, `height`, `weight`, `phone_no`, `tel_no`, `email_address`, `facebook_name`, `student_image`, `with_special_need`, `special_need`, `en_sy`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(213, '23-00001', '117619140154', 'Albiel Hannah', 'Tamaneo', 'Abaygar', 'Female', '2008-12-09', 'Iloilo', '', 'Filipino', 'Christianity', 'Hiligaynon', '', '', '', '0987554688', '', 'albielhannahabaygar@gmail.com', '', '1688608511_74faceb4c909944407cb.jpg', 0, '', 1, 274, '2023-07-06 09:08:55', '2023-07-06 09:55:11', NULL),
(214, '23-00002', '117584150086', 'Jaden', 'Pastolero', 'Abellar', 'Female', '2009-01-23', 'Iloilo', '', 'Filipino', 'Christianity', 'Hiligaynon', '', '', '', '0966743366', '', 'deniaabellar51976@gmail.com', '', '1688608501_b4ad3f5b19ba05f2b479.jpg', 0, '', 1, 274, '2023-07-06 09:10:35', '2023-07-06 09:55:01', NULL),
(215, '23-00003', '117601140053', 'Rhian Gicel', 'Figueroa', 'Abulencia', 'Female', '0000-00-00', '', '', 'Filipino', 'Christianity', 'Hiligaynon', '', '', '', '0967574645', '', 'Rhiangicelabulencia@gmail.com', '', '1688608487_a47343cb3125745b5f22.jpg', 0, '', 1, 274, '2023-07-06 09:11:16', '2023-07-06 09:54:47', NULL),
(216, '23-00004', '116638140010', 'Marvin', 'Yuson', 'Agriam', 'Male', '2009-06-11', '', '07607-BO9LB07-8', '', '', '', '', '', '', '096546436', '', 'marvinagriam71@gmail.com', '', '1688608477_047e0adf640f0690b620.jpg', 0, '', 1, 274, '2023-07-06 09:12:10', '2023-07-06 09:54:37', NULL),
(217, '23-00005', '111111111111', 'Yancy Donn', 'Dotimas', 'Aguilos', 'Male', '2009-08-28', '', '', '', '', '', '', '', '', '09676586765', '', 'Catherineaguilos1@gmail.com', '', '1688608467_6386229a54e9780e188c.jpg', 0, '', 1, 274, '2023-07-06 09:13:12', '2023-07-16 18:05:38', NULL),
(218, '23-00006', '404175150032', 'Kaye Antonette', 'Jaranilla', 'Alleta', 'Female', '2009-06-23', '', '2009-7743', '', '', '', '', '', '', '09654336465', '', 'kayeantonettealleta@gmail.com', '', '1688608460_7157676b849795dfdd39.jpg', 0, '', 1, 274, '2023-07-06 09:14:08', '2023-07-16 18:05:55', NULL),
(219, '23-00007', '117588150136', 'ANDREI JEREMIAH', 'SANTIAGO', 'ALVARIÑO', 'Male', '2008-12-24', '', '03022-B08YQ06-8', 'Filipino', '', '', '', '', '', '09733566655', '', 'roselle.s.alvarino@gmail.com', '', '1688608449_161859aee73ea8bcc525.jpg', 0, '', 1, 274, '2023-07-06 09:17:48', '2023-07-07 12:08:21', NULL),
(220, '23-00008', '117597150048', 'Jerelene', 'Espora', 'Angelitud', 'Female', '2008-12-12', '', '03022-B08ZA0D-9', 'Filipino', '', '', '', '', '', '0986567776', '', 'jangelitud12@gmail.com', '', '1688608440_f1003c763bdf02948909.jpg', 0, '', 1, 274, '2023-07-06 09:19:53', '2023-07-06 09:54:00', NULL),
(221, '23-00009', '117588140303', 'ROEL', 'GARGANZA', 'ARCELON', 'Male', '0000-00-00', '', '2008-15456', 'Filipino', '', '', '', '', '', '09543466755', '', 'roelarcelon5@gmail.com', '', NULL, 0, '', 2, 274, '2023-07-06 09:28:26', '2023-07-06 09:28:26', NULL),
(222, '23-00010', '117613150027', 'LLIANA ERICH', 'JALECO', 'BALSOMO', 'Female', '0000-00-00', '', '03022-B08X102-7', '', '', '', '', '', '', '0975664477', '', '', '', NULL, 0, '', 2, 274, '2023-07-06 13:45:27', '2023-07-06 13:45:27', NULL),
(225, '23-00011', '404179150064.00', 'Herwin ', 'Pidelo', 'Katalbas ', 'Male', '2002-10-04', 'iloilo', '2008-13770', '', '', '', '', '', '', '0965345665', '', 'pidelodanica11@gmail.com', '', '1688699256_cec3446c669c6338c23b.jpg', 0, '', 1, 274, '2023-07-07 11:07:17', '2023-07-07 11:07:36', NULL),
(226, '23-00012', '117624140075.00', 'Jamilah Jane', 'Voluntarioso', 'Lapeña', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '096546453', '', 'jennifervoluntarioso@gmail.com', '', '1688699583_c513f58724ad129b1cc2.jpg', 0, '', 2, 274, '2023-07-07 11:12:34', '2023-07-07 11:13:03', NULL),
(227, '23-00013', '1234567890', 'Thea', 'Berandres', 'Lupo', 'Female', '2023-06-28', 'iloilo', '12-2334', 'Filipino', 'Roman Catholic', 'Hiligaynon', '', '', '', '09287015043', '', 'johannathea@gmail.com', '', '1688960396_b54c2143a59b39b6fa85.jpg', 0, '', 1, 274, '2023-07-10 11:16:54', '2023-07-10 12:26:55', NULL),
(228, '23-00014', '6547688686765', 'Benz', 'ray', 'Osilab', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '097675634645645', '', '', '', NULL, 0, '', 1, 276, '2023-07-10 12:04:55', '2023-07-11 14:45:22', NULL),
(229, '23-00015', NULL, 'sdfg', 'gdfgdf', 'gdfd', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', 1, 274, '2023-07-16 18:07:27', '2023-07-16 18:07:27', NULL),
(230, '23-00016', NULL, 'sdfsd', 'fsdfgsdg', 'hfghfgh', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', 1, 274, '2023-07-16 18:07:43', '2023-07-16 18:07:43', NULL);

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

--
-- Dumping data for table `faculty_subject_group_tbl`
--

INSERT INTO `faculty_subject_group_tbl` (`fsg_id`, `fsg_sg_id`, `fsg_emp_id`, `fsg_sy_id`, `fsg_assigned_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3294, 1, 274, '2023-06-08 09:05:21', '2023-06-08 09:05:21'),
(2, 1, 3295, 1, 274, '2023-06-08 09:13:12', '2023-06-08 09:13:12'),
(3, 1, 3297, 1, 274, '2023-06-08 09:18:10', '2023-06-08 09:18:10'),
(4, 2, 3296, 1, 274, '2023-06-08 09:18:21', '2023-06-08 09:18:21'),
(5, 7, 3304, 1, 274, '2023-07-05 17:58:02', '2023-07-05 17:58:02');

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

--
-- Dumping data for table `family_bg_t`
--

INSERT INTO `family_bg_t` (`fam_id`, `emp_id`, `spouse_first_name`, `spouse_middle_name`, `spouse_surname`, `spouse_occupation`, `spouse_employer_business`, `spouse_business_address`, `spouse_telephone`, `father_surname`, `father_middlename`, `father_firstname`, `mother_surname`, `mother_firstname`, `mother_middlename`) VALUES
(16, 3299, '', '', '', '', '', '', '', '', '', '', '', '', '');

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `headlines`, `slug`, `body`, `news_image`, `news_file`, `news_link`, `news_author`, `publisher`, `publish_time_stamp`, `updated_by`, `update_time_stamp`, `deleted_by`, `delete_time_stamp`, `is_deleted`) VALUES
(48, 'ILOILO NATIONAL HIGH SCHOOL', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'iloilo-national-high-school', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchangedLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'CASTRO.JPG', NULL, NULL, 'yves', '15', '2022-12-11 17:47:47', NULL, NULL, NULL, NULL, 0),
(49, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'no_image', NULL, NULL, 'bab', '15', '2022-12-11 18:51:07', NULL, NULL, NULL, NULL, 0),
(50, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolore', 'section-11032-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc', '1914 translation by H. Rackham\r\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\r\n\r\nSection 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"', 'no_image', NULL, NULL, 'jano', '15', '2022-12-12 16:17:07', NULL, NULL, NULL, NULL, 0),
(51, '1914 translation by H. Rackham', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '1914-translation-by-h-rackham', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', 'no_image', NULL, NULL, 'joseph', '15', '2022-12-12 16:24:36', NULL, NULL, NULL, NULL, 0),
(52, 'Sed in mollis erat. Quisque vitae justo bibendum, interdum mauris ac, ullamcorper eros.', 'Sed in mollis erat. Quisque vitae justo bibendum, interdum mauris ac, ullamcorper eros. Sed aliquam convallis dui. Maecenas placerat eleifend magna tincidunt tincidunt. Sed pulvinar eros ac tortor congue consectetur. Nulla augue quam, tincidunt ut est id, ultricies rutrum ante. Nam interdum volutpat enim, quis pellentesque felis tempor at. ', 'sed-in-mollis-erat-quisque-vitae-justo-bibendum-interdum-mauris-ac-ullamcorper-eros', 'Sed in mollis erat. Quisque vitae justo bibendum, interdum mauris ac, ullamcorper eros. Sed aliquam convallis dui. Maecenas placerat eleifend magna tincidunt tincidunt. Sed pulvinar eros ac tortor congue consectetur. Nulla augue quam, tincidunt ut est id, ultricies rutrum ante. Nam interdum volutpat enim, quis pellentesque felis tempor at. Cras vulputate auctor arcu, quis malesuada enim aliquam vitae. Pellentesque quis justo accumsan, venenatis augue eu, mattis metus. Quisque blandit scelerisque nulla non congue. Etiam finibus iaculis dolor, id congue urna fermentum et. Maecenas turpis nisi, porttitor id pulvinar nec, luctus eget purus.\r\n\r\nFusce ornare nibh et nisl eleifend facilisis. Cras efficitur volutpat congue. Vestibulum pellentesque pharetra justo, vitae efficitur arcu pretium at. Nulla id sagittis ex. Fusce non vehicula ex. Suspendisse potenti. Donec et sagittis quam. Nunc imperdiet justo imperdiet purus congue ultrices. In finibus mi ut semper tempus. Donec sit amet tellus eu enim rhoncus tristique. Morbi magna ipsum, blandit quis sapien non, consequat euismod libero. Aliquam tincidunt eros non nulla venenatis, ac ornare justo tincidunt.', 'no_image', NULL, NULL, 'pet', '15', '2022-12-12 16:25:37', NULL, NULL, NULL, NULL, 0),
(53, 'Aenean lacinia suscipit mollis.', 'Aenean lacinia suscipit mollis. Aliquam suscipit tortor orci, ac pellentesque enim cursus sit amet. Nulla rutrum vel nisi a efficitur. Fusce erat massa, scelerisque quis orci nec, lacinia rhoncus elit. Duis sed nisl volutpat, auctor enim nec, semper ligula.  nascetur ridiculus mus.', 'aenean-lacinia-suscipit-mollis', 'Aenean lacinia suscipit mollis. Aliquam suscipit tortor orci, ac pellentesque enim cursus sit amet. Nulla rutrum vel nisi a efficitur. Fusce erat massa, scelerisque quis orci nec, lacinia rhoncus elit. Duis sed nisl volutpat, auctor enim nec, semper ligula. Praesent quis mauris feugiat, viverra sem vel, pellentesque mauris. Maecenas a justo et sem mollis viverra. In dictum eros lobortis turpis cursus, a hendrerit turpis venenatis. Nunc auctor laoreet nunc non lacinia. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nMaecenas hendrerit eget augue eu euismod. Proin ultricies metus ut eleifend pellentesque. Morbi in leo id leo pretium bibendum. Maecenas tortor odio, rhoncus et neque ac, fringilla cursus massa. Nunc fringilla iaculis arcu, eu lobortis est facilisis vitae. Cras cursus faucibus porta. Donec ut porttitor sem. Ut interdum, mi quis sodales sagittis, sapien mi convallis neque, id laoreet nunc diam efficitur dui. Aliquam quis nisl nec mi dapibus semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed tincidunt convallis lacus, in porttitor dolor efficitur eget. Aliquam risus risus, commodo at vulputate ut, sollicitudin vitae felis. Suspendisse laoreet mauris vestibulum lectus sollicitudin elementum. Cras cursus vel sem sed euismod. Nulla suscipit dolor eget urna dignissim aliquam.', 'no_image', NULL, NULL, 'love', '15', '2022-12-12 16:26:13', NULL, NULL, NULL, NULL, 0),
(54, 'Nulla quam lectus, malesuada tempor consectetur at, maximus sit amet sapien.', 'Suspendisse imperdiet tempus dui, vel consequat nunc accumsan sed. Nunc neque magna, condimentum in tortor eget, rutrum eleifend nibh. Etiam vehicula nunc nisl, sit amet congue metus fermentum vitae. Phasellus dui velit, varius at lobortis ut, interdum vitae velit. In hac habitasse platea dictumst.', 'nulla-quam-lectus-malesuada-tempor-consectetur-at-maximus-sit-amet-sapien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque mauris id augue pulvinar lobortis. Sed sollicitudin est in massa condimentum, sit amet maximus urna sollicitudin. Etiam viverra ipsum vitae sodales ornare. Pellentesque imperdiet fermentum ante ac ullamcorper. Maecenas aliquam lorem a consectetur fringilla. Nulla quam lectus, malesuada tempor consectetur at, maximus sit amet sapien. Nunc sodales, odio eget tempor iaculis, lacus ipsum convallis massa, vel convallis eros sapien id enim.\r\n\r\nSuspendisse imperdiet tempus dui, vel consequat nunc accumsan sed. Nunc neque magna, condimentum in tortor eget, rutrum eleifend nibh. Etiam vehicula nunc nisl, sit amet congue metus fermentum vitae. Phasellus dui velit, varius at lobortis ut, interdum vitae velit. In hac habitasse platea dictumst. Donec sed magna ut felis volutpat cursus. Duis nisi magna, cursus sed porta a, viverra fringilla lorem. Nulla sagittis, purus a porttitor rhoncus, ante justo aliquet ante, eu scelerisque odio risus et augue. Praesent at lectus ligula. Phasellus sit amet rhoncus nibh. Ut vitae tellus nisl. Aliquam varius malesuada quam egestas ullamcorper. Vestibulum mattis malesuada sagittis.\r\n\r\nPhasellus elementum justo sapien, vel auctor risus egestas vitae. Nullam id sapien vitae augue sagittis suscipit sed sed dui. Aliquam gravida ornare nunc, in interdum quam dignissim nec. Praesent quis malesuada eros, id dictum tellus. Vivamus nec metus in lorem venenatis porttitor sit amet id eros. Vivamus quis dapibus ex. Morbi convallis metus aliquam vulputate fringilla. Vivamus sed bibendum sem. Nullam vulputate tincidunt sem non gravida. Integer dapibus erat a varius vulputate.', 'no_image', NULL, NULL, 'bobis', '15', '2022-12-13 15:51:37', NULL, NULL, NULL, NULL, 0),
(55, 'Elit ut aliquam purus sit amet', 'Elit ut aliquam purus sit amet. Fermentum iaculis eu non diam. Ut sem viverra aliquet eget sit. Id leo in vitae turpis massa. Faucibus a pellentesque sit amet porttitor eget dolor', 'elit-ut-aliquam-purus-sit-amet', 'Elit ut aliquam purus sit amet. Fermentum iaculis eu non diam. Ut sem viverra aliquet eget sit. Id leo in vitae turpis massa. Faucibus a pellentesque sit amet porttitor eget dolor. Aliquet lectus proin nibh nisl condimentum id. Viverra nibh cras pulvinar mattis. Vestibulum mattis ullamcorper velit sed ullamcorper morbi. Duis at tellus at urna. Tortor at auctor urna nunc id cursus metus aliquam eleifend. Eu consequat ac felis donec et odio pellentesque diam volutpat.', 'no_image', NULL, NULL, 'dear', '15', '2022-12-13 15:58:29', NULL, NULL, NULL, NULL, 0),
(64, 'Et velit quasi qui facere maxime aut galisum perferendis? ', 'Et velit quasi qui facere maxime aut galisum perferendis? Rem totam modi et quas corrupti hic suscipit similique aut ipsum quia quo veniam accusamus aut itaque consequatur. Et consequatur veritatis aut expedita repellat cum assumenda nostrum ut libero explicabo qui quasi perspiciatis.', 'et-velit-quasi-qui-facere-maxime-aut-galisum-perferendis', 'Aut iste possimus quo minus nihil nam nemo repellat. Et voluptatem sapiente et harum unde nam voluptas vero et esse obcaecati ad dolore iure est doloribus earum et perferendis possimus! Non asperiores quibusdam ut accusamus quibusdam ea fugit nihil.\r\n\r\nEt doloremque vitae id eius illo non iure dolores est nobis ipsa quo sunt totam. Ut doloremque asperiores rem perferendis veritatis aut ducimus quibusdam et omnis illo! Sed eveniet minima ut enim nostrum qui cupiditate omnis vel Quis deserunt eum vitae eligendi est quaerat sapiente qui internos aliquid.\r\n\r\nEt aliquid porro non culpa consequuntur ut suscipit unde sed numquam distinctio. Sit voluptatem dolor eum earum perferendis rem exercitationem repudiandae.\r\n\r\nUt enim quod ab delectus nemo aut natus veritatis qui quasi modi. Sit repellat commodi ad voluptas incidunt non minima reiciendis et aperiam consequatur hic architecto cupiditate non esse illo est dolore tenetur. Est velit voluptates in dolorem atque et laborum nesciunt et reprehenderit quisquam. Est voluptas beatae et autem itaque est nisi vero.\r\n\r\nAt officiis suscipit et impedit galisum in modi dicta et pariatur error est galisum sunt. A repudiandae iure aut nisi molestiae qui harum dolorum et nemo tempore qui tenetur minus et dolorem nihil et maxime odit. In quasi saepe qui voluptatem ipsa vel quas esse et fuga minus.\r\n\r\nAb nihil amet id enim repellat sed voluptatibus voluptas sed facere alias quo officia voluptates vel facere magnam rem animi voluptatem! Eum voluptas provident eum aliquid harum ea dicta ipsa et assumenda dolores non quibusdam repellendus. Ab distinctio facere ut omnis commodi in voluptate quas id debitis omnis et voluptatem tempora et impedit iste eos nobis deleniti! Qui quod deleniti id consequatur magni et adipisci dolorem sit perferendis sint qui quam assumenda.', '1.png', 'ada.txt', 'www.google.com', 'alex', '15', '2022-12-15 16:07:37', NULL, NULL, NULL, NULL, 0),
(76, 'Designation of the new Principal IV', 'Designation of the new Principal IV of the Iloilo National High School', 'designation-of-the-new-principal-iv', 'Office memorandum No. 056, s. 2022\r\nSeptember 19, 2022', '305861230_1431390984038564_2546967028147539898_n.jpg', '305861230_1431390984038564_2546967028147539898_n.jpg', 'na', 'na', '15', '2022-12-17 00:09:09', NULL, NULL, NULL, NULL, 0),
(77, 'sample random file', 'sample random file', 'sample-random-file', 'asdsafs', 'this_is_sample.jpg', 'Admin (18).xlsx', 'dsfsf', 'fdsfdsf', NULL, '2022-12-17 18:22:40', NULL, NULL, NULL, NULL, 0),
(78, 'sample rnadom 2', 'sample rnadom 2', 'sample-rnadom-2', 'sample rnadom 2', '1671351994_efa6913ed23f157006d5.jpg', '1671351994_039cfe298892c2df1c20.docx', 'sample rnadom 2', 'sample rnadom 2', '15', '2022-12-17 18:26:34', NULL, NULL, NULL, NULL, 0);

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

--
-- Dumping data for table `plantilla_tbl`
--

INSERT INTO `plantilla_tbl` (`plant_id`, `plantilla_title`, `plantilla_item_no`, `salary_grade`, `monthly_salary`, `created_at`, `updated_at`) VALUES
(1, 'Teacher I', 'Teacher I', '11', '24000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Teacher II', 'Teacher II', '12', '26000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Teacher III', 'Teacher III', '13', '28000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Head Teacher I', 'Head Teacher I', '14', '30000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Head Teacher II', 'Head Teacher II', '15', '32000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Head Teacher III', 'Head Teacher III', '16', '34000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Master Teacher I', 'Master Teacher I', '17', '36000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Master Teacher II', 'Master Teacher II', '18', '38000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Master Teacher III', 'Master Teacher III', '19', '40000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Principal I', 'P01', '22', '65000.00', '2023-05-09 09:01:11', '2023-05-09 09:01:11');

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
(17, 'SPSTE', 'Special Program for Science Technology and Engineering', '1688698855_5d773d86440227ea2ab1.png', 1, '2023-07-07 11:00:55', '2023-07-07 11:00:55', NULL),
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
(25, 'OSBORNE', 1, 15);

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

--
-- Dumping data for table `shs_section_adviser_tbl`
--

INSERT INTO `shs_section_adviser_tbl` (`shs_adv_id`, `shs_adv_emp_id`, `shs_co_adviser_id`, `shs_adv_section_id`, `shs_adv_sy`, `shs_adv_semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(88, 3294, NULL, 38, 1, 1, '2023-07-11 11:30:26', '2023-07-11 11:30:26', NULL),
(89, 3294, NULL, 38, 1, 2, '2023-07-11 11:30:55', '2023-07-11 11:30:55', NULL);

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
(39, 'ICT-11-IA2', 'Illustration & Animation', 5, 10);

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

--
-- Dumping data for table `shs_student_section_tbl`
--

INSERT INTO `shs_student_section_tbl` (`shs_stud_sec_id`, `shs_stud_id`, `shs_sec_id`, `shs_stud_sec_sy`, `shs_student_sem`, `shs_assigned_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 225, 38, 1, 1, 274, '2023-07-09 18:52:54', '2023-07-09 18:52:54', NULL),
(10, 215, 38, 1, 1, 274, '2023-07-09 21:27:27', '2023-07-09 21:27:27', NULL),
(11, 227, 29, 1, 1, 274, '2023-07-10 12:00:27', '2023-07-10 12:00:27', NULL);

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
(120, '23-00001', 'iloilonhs', 1, 0, 'student', 213, '2023-07-06 09:08:55', '2023-07-06 09:08:55'),
(121, '23-00002', 'iloilonhs', 1, 0, 'student', 214, '2023-07-06 09:10:35', '2023-07-06 09:10:35'),
(122, '23-00003', 'iloilonhs', 1, 1, 'student', 215, '2023-07-06 09:11:16', '2023-07-07 12:24:45'),
(123, '23-00004', 'iloilonhs', 1, 1, 'student', 216, '2023-07-06 09:12:10', '2023-07-07 11:45:06'),
(124, '23-00005', 'iloilonhs', 1, 1, 'student', 217, '2023-07-06 09:13:12', '2023-07-06 11:21:41'),
(125, '23-00006', 'iloilonhs', 1, 1, 'student', 218, '2023-07-06 09:14:08', '2023-07-06 11:19:38'),
(126, '23-00007', 'iloilonhs', 1, 1, 'student', 219, '2023-07-06 09:17:48', '2023-07-07 12:20:28'),
(127, '23-00008', 'iloilonhs', 1, 1, 'student', 220, '2023-07-06 09:19:53', '2023-07-06 10:09:57'),
(128, '23-00009', 'iloilonhs', 1, 1, 'student', 221, '2023-07-06 09:28:26', '2023-07-06 10:33:18'),
(129, '23-00010', 'iloilonhs', 1, 0, 'student', 222, '2023-07-06 13:45:27', '2023-07-06 13:45:27'),
(132, '23-00011', 'iloilonhs', 1, 1, 'student', 225, '2023-07-07 11:07:17', '2023-07-07 12:20:19'),
(133, '23-00012', 'iloilonhs', 1, 1, 'student', 226, '2023-07-07 11:12:34', '2023-07-07 11:13:12'),
(134, '23-00013', 'iloilonhs', 1, 1, 'student', 227, '2023-07-10 11:16:54', '2023-07-10 11:38:03'),
(135, '23-00014', 'iloilonhs', 1, 1, 'student', 228, '2023-07-10 12:04:55', '2023-07-10 12:06:51'),
(136, '23-00015', 'iloilonhs', 1, 0, 'student', 229, '2023-07-16 18:07:27', '2023-07-16 18:07:27'),
(137, '23-00016', 'iloilonhs', 1, 0, 'student', 230, '2023-07-16 18:07:43', '2023-07-16 18:07:43');

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

--
-- Dumping data for table `student_address_tbl`
--

INSERT INTO `student_address_tbl` (`address_id`, `en_id`, `address_type`, `blok_lot_phase_bldg`, `street`, `subdivision_village`, `barangay`, `municipality_city`, `province`, `zip_code`, `region`, `created_at`, `updated_at`) VALUES
(32, 227, 'Permanent', '', '', '', 'Arguilles', 'Iloilo City', 'Iloilo', '', 'VI', '2023-07-10 11:25:54', '2023-07-10 11:25:54'),
(33, 225, 'Permanent', 'blok lot phase', 'street', 'subdivision', 'Jaro', 'Iloilo City', 'Iloilo', '5000', 'VI', '2023-07-10 16:53:33', '2023-07-10 16:53:33'),
(34, 219, 'Permanent', 'ffgfdgfdgfgsa', 'dgfgsdg', 'fdgfd', 'dsfds', 'Banaue', 'Ifugao', '46564', 'VI', '2023-07-10 21:54:19', '2023-07-10 21:54:19');

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

--
-- Dumping data for table `student_health_tbl`
--

INSERT INTO `student_health_tbl` (`health_id`, `health_condition`, `health_type`, `en_id`, `remarks`) VALUES
(17, 'High Blood', 'Physical', 213, 'Sudden vomiting');

-- --------------------------------------------------------

--
-- Table structure for table `student_parents_tbl`
--

CREATE TABLE `student_parents_tbl` (
  `parent_id` bigint(20) NOT NULL,
  `stud_id` bigint(20) NOT NULL,
  `f_fname` varchar(60) NOT NULL,
  `f_mname` varchar(60) NOT NULL,
  `f_lname` varchar(60) NOT NULL,
  `f_highest_education` varchar(40) NOT NULL,
  `f_contact` varchar(60) NOT NULL,
  `f_email` varchar(120) NOT NULL,
  `f_facebook` varchar(120) NOT NULL,
  `m_fname` varchar(60) NOT NULL,
  `m_mname` varchar(60) NOT NULL,
  `m_lname` varchar(60) NOT NULL,
  `m_highest_education` varchar(80) NOT NULL,
  `m_contact` varchar(60) NOT NULL,
  `m_email` varchar(80) NOT NULL,
  `m_facebook` varchar(80) NOT NULL,
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
  `f_is_working` tinyint(1) NOT NULL,
  `f_work` varchar(120) NOT NULL,
  `f_salary` varchar(30) NOT NULL,
  `m_is_working` tinyint(1) NOT NULL,
  `m_work` varchar(120) NOT NULL,
  `m_salary` varchar(60) NOT NULL,
  `family_business` varchar(120) NOT NULL,
  `home_distance` int(11) NOT NULL,
  `transportation` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_parents_tbl`
--

INSERT INTO `student_parents_tbl` (`parent_id`, `stud_id`, `f_fname`, `f_mname`, `f_lname`, `f_highest_education`, `f_contact`, `f_email`, `f_facebook`, `m_fname`, `m_mname`, `m_lname`, `m_highest_education`, `m_contact`, `m_email`, `m_facebook`, `g_fname`, `g_mname`, `g_lname`, `g_highest_education`, `g_contact`, `g_email`, `g_facebook`, `is_4ps`, `household_no`, `is_ip`, `ip_community`, `financial_provider`, `instructional_provider`, `f_is_working`, `f_work`, `f_salary`, `m_is_working`, `m_work`, `m_salary`, `family_business`, `home_distance`, `transportation`, `created_at`, `updated_at`) VALUES
(17, 213, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', '', 0, '', '2023-07-07 09:20:22', '2023-07-07 09:20:22'),
(18, 217, 'George', 'Dotimas', 'Aguilos', 'College', '09854632453', 'george@gmail.com', 'george facebook', 'mother', 'mother', 'mother', 'Secondary', '0967645654', 'mother@gmasil.com', 'mother fb', 'guardian', 'guardian', 'guardian', 'Masters', '09786575564', 'guardian', 'guardian', 0, '', 0, '', '', '', 1, 'asdad', '30000-40000', 1, 'fdgdf', '50000-60000', 'fam business', 100, 'PUV', '2023-07-10 21:16:34', '2023-07-16 23:01:17'),
(19, 219, 'sdfdsfdsf', 'dsfdsfds', 'gfgdfg', 'Elementary', '099754446565', 'asdfsdfsd', 'dsfdsfsdf', 'dscvzvv', 'xvxcvxvx', 'qqrewrewrw', 'Elementary', '096867565', 'dsfsdvvsdv', 'svsdvavvdfvs', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', '', 0, '', '2023-07-10 21:51:36', '2023-07-10 21:51:36'),
(20, 215, 'sdfsfdg', 'fhhfh', 'fsgfdg', 'College', '98767577', 'fdgdgf', 'ertfsfaetrwfd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', '', 0, '', '2023-07-10 22:07:16', '2023-07-10 22:07:16'),
(21, 225, '', '', '', '', '', '', '', 'sgdg', 'dfgg', 'dgdf', 'Secondary', '76876875345', 'asdfdgwfgqfa', 'erewrsdfrtht', '', '', '', '', '', '', '', 0, '', 0, '', '', '', 0, '', '', 0, '', '', '', 0, '', '2023-07-10 22:11:34', '2023-07-10 22:11:34');

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
(62, 15, 220, 1, 1, 274, '2023-07-06 10:34:45', '2023-07-06 10:34:45'),
(63, 15, 218, 1, 1, 274, '2023-07-06 14:23:26', '2023-07-06 14:23:26'),
(64, 15, 221, 1, 2, 274, '2023-07-06 15:09:05', '2023-07-06 15:09:05');

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

--
-- Dumping data for table `student_school_tbl`
--

INSERT INTO `student_school_tbl` (`sch_id`, `stud_id`, `grade_level_completed`, `school_year`, `school_name`, `school_id`, `school_type`, `school_address`, `adviser_name`, `returning_student`) VALUES
(16, 227, 'Junior High School', '2010-2011', 'INHS', '302509', 'Public', 'La Paz Iloilo', '', 0);

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

--
-- Dumping data for table `student_section_tbl`
--

INSERT INTO `student_section_tbl` (`stud_sec_id`, `sec_id`, `en_id`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 24, 221, 2, '2023-07-06 15:21:57', '2023-07-06 15:21:57', NULL),
(26, 24, 220, 1, '2023-07-06 15:28:29', '2023-07-06 15:28:29', NULL),
(27, 25, 218, 1, '2023-07-07 10:59:39', '2023-07-07 10:59:39', NULL);

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

--
-- Dumping data for table `student_strands_tbl`
--

INSERT INTO `student_strands_tbl` (`stud_strand_id`, `s_strand_id`, `s_strand_stud_id`, `s_sy_id`, `strand_sem_id`, `s_is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(25, 10, 225, 1, 1, 1, 274, '2023-07-07 12:24:02', '2023-07-07 12:24:02'),
(26, 8, 219, 1, 1, 1, 274, '2023-07-07 12:24:19', '2023-07-07 12:24:19'),
(27, 10, 215, 1, 1, 1, 274, '2023-07-07 12:25:02', '2023-07-07 12:25:02'),
(28, 2, 227, 1, 1, 1, 274, '2023-07-10 11:59:52', '2023-07-10 11:59:52'),
(29, 2, 228, 1, 1, 1, 276, '2023-07-10 12:08:49', '2023-07-10 12:08:49');

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
(275, 3295, 'jano.tabor@iloilonhs.edu.ph', '$2y$10$1h5igH76tdPJBEcj1CWrYuO83d8KQVZcib3thbFFcIfQDq4bSO7ja', 'Admin', '1', 1, 0),
(276, 3311, 'johannathea.lupo@iloilonhs.edu.ph', '$2y$10$OXpKZMxx5lY300XpSOcIY.F8jy1Mo99dZv8Kb1VPWLxK4dYA9z8NW', 'Admin', '1', 2, 0);

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
  MODIFY `ave_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3317;

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
  MODIFY `en_stat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  MODIFY `en_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

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
  MODIFY `hm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `sec_det_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `shs_sec_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  MODIFY `shs_stud_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `s_account_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `student_address_tbl`
--
ALTER TABLE `student_address_tbl`
  MODIFY `address_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `parent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_program_tbl`
--
ALTER TABLE `student_program_tbl`
  MODIFY `stud_prog_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `stud_strand_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

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
