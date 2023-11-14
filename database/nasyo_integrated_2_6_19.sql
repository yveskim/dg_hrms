-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 05:28 PM
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
(10, 7, 3295, 1, '2023-05-07 11:59:52', '2023-05-07 11:59:52', NULL),
(11, 13, 3296, 1, '2023-05-08 16:36:54', '2023-05-08 16:36:54', NULL),
(12, 19, 3297, 1, '2023-05-12 15:25:11', '2023-05-12 15:25:11', NULL),
(13, 20, 3294, 1, '2023-05-30 13:50:46', '2023-05-30 13:50:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cat_id` smallint(6) NOT NULL,
  `cat_title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`cat_id`, `cat_title`) VALUES
(1, 'JHS'),
(2, 'SHS');

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

--
-- Dumping data for table `department_head_tbl`
--

INSERT INTO `department_head_tbl` (`dept_head_id`, `title`, `dh_dept_id`, `head_id`, `sy_id`, `memo_no`, `created_at`, `updated_at`) VALUES
(6, 'Official', 9, 3296, 1, '645645', '2023-06-05 12:19:16', '2023-06-05 12:19:16'),
(7, 'Official', 1, 3296, 1, '645645', '2023-06-05 12:19:23', '2023-06-05 12:19:23');

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
(1, 'ICT', 'Meriam Defensor Building', 1),
(9, 'Mathematics', 'BL', 1);

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
  `emp_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `is_current` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_category_tbl`
--

INSERT INTO `employee_category_tbl` (`emp_cat_id`, `cat_id`, `emp_id`, `sy_id`, `is_current`) VALUES
(4, 1, 3294, 1, 1),
(5, 2, 3294, 1, 0);

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

--
-- Dumping data for table `employee_department_tbl`
--

INSERT INTO `employee_department_tbl` (`emp_dept_id`, `emp_id`, `dept_id`, `sy_id`, `created_at`, `updated_at`) VALUES
(8, 3295, 1, 1, '2023-06-04 09:22:19', '2023-06-04 09:22:19'),
(9, 3294, 1, 1, '2023-06-04 09:24:17', '2023-06-04 09:24:17'),
(10, 3297, 1, 1, '2023-06-05 09:33:20', '2023-06-05 09:33:20');

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
(25, 3294, 8, 1, '2023-05-30 13:48:36', '2023-05-30 13:48:36', NULL),
(26, 3295, 6, 1, '2023-05-30 13:48:46', '2023-05-30 13:48:46', NULL),
(27, 3297, 6, 1, '2023-05-30 13:48:49', '2023-05-30 13:48:49', NULL);

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
(3294, 2, '032911', 'Yves Kim', 'Casido', 'Cabanting', '1682231119_1ae15d627f095a00188c.jpg', 'Male', 'Married', 'Filipino', '', '', '1990-08-27', 'Leon, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'yveskim.cabanting@iloilonhs.edu.ph', '', 'Earth Street', '', '', '', 'Oton, Iloilo', 'Rehiyon ng Kanlurang Bisaya', '', '', '', '', '', '', '', '', '', '993455345', '', '2023-04-23 14:25:19', '2023-04-26 22:13:38', NULL),
(3295, 2, '0001', 'Jano', 'Sarcino', 'Tabor', '1682518886_9bef8373c5ddff70d21e.jpg', 'Male', 'Single', 'Filipino', '', '', '1985-05-05', 'Jaro, Iloilo City', 'Roman Catholic', '', 145, 67, '', '', '', '', '', '', 'jano.tabor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-04-26 22:21:26', '2023-04-26 22:21:26', NULL),
(3296, 2, '0002', 'Lovelyn', 'Paborito', 'Castro', '1682602597_58b77108472670e87cd6.jpg', 'Female', 'Married', 'Filipino', '', '', '1982-02-02', 'Capiz', 'Roman Catholic', '', 145, 45, '', '', '', '', '', '', 'lovelyn.castro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0965663654', '2023-04-27 21:36:37', '2023-04-27 21:36:37', NULL),
(3297, 2, '0003', 'Bernadette', 'berns', 'albiso', '1682747762_b933867c3b0201536994.jpg', 'Female', 'Married', 'Filipino', '', '', '1992-04-14', 'iloilo city', 'roman catholic', '', 0, 0, '', '', '', '', '', '', 'bernadette.albiso@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-04-29 13:56:02', '2023-04-29 13:56:02', NULL),
(3299, 2, '00003', 'Roel', 'Suaveron', 'Palmaira', '1683090375_59c0cc7a3bf9b9880ca5.jpg', 'Male', 'Married', 'Filipino', '', '', '1987-05-02', 'passsi', 'Roman Catholic', '', 0, 0, '', '', '', '', '', '', 'roel.palmaira@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-05-03 13:06:15', '2023-05-03 13:10:36', NULL);

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
  `remarks` varchar(255) NOT NULL,
  `grade_level_id` smallint(6) NOT NULL,
  `semester` smallint(6) DEFAULT NULL,
  `enrolled_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_status_tbl`
--

INSERT INTO `enrollment_status_tbl` (`en_stat_id`, `en_id`, `sy_id`, `submitted_sf9`, `submitted_sf10`, `submitted_good_moral`, `submitted_psa`, `enrollment_status`, `remarks`, `grade_level_id`, `semester`, `enrolled_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(56, 153, 1, 1, 1, 1, 1, 'OE', 'shs', 5, 2, 274, '2023-06-19 08:48:19', '2023-06-19 08:48:19', NULL),
(57, 171, 1, 1, 1, 1, 1, 'CE', 'shs', 5, 1, 274, '2023-06-19 08:53:35', '2023-06-19 08:53:35', NULL),
(58, 172, 1, 1, 1, 1, 1, 'OE', 'jhs', 1, 0, 274, '2023-06-19 09:28:05', '2023-06-19 16:37:46', NULL),
(59, 149, 1, 1, 1, 0, 0, 'OE', 'jhs', 1, 0, 274, '2023-06-19 11:44:36', '2023-06-19 11:44:36', NULL);

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_tbl`
--

INSERT INTO `enrollment_tbl` (`en_id`, `student_id`, `student_lrn`, `first_name`, `middle_name`, `last_name`, `gender`, `birthdate`, `birth_place`, `psa_birth_certificate_no`, `citizenship`, `religion`, `mother_tongue`, `blood_type`, `height`, `weight`, `phone_no`, `tel_no`, `email_address`, `facebook_name`, `student_image`, `with_special_need`, `special_need`, `created_at`, `updated_at`, `deleted_at`) VALUES
(138, '23-00001', '23432332', 'Al John', 'Dela Cruz', 'Artacho', 'Male', '1990-05-02', 'fsdfsd', '', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'b-', '45', '54', '09123456789', '033-320-4361', 'aljon.artacho@gmail.com', 'al john artacho', '1685072862_af221fb4145ec24fe386.jpg', 0, '', '2023-05-13 16:19:01', '2023-05-30 12:07:01', NULL),
(140, '23-00003', '3464554334', 'Bernadette', 'Quincy', 'Albiso', 'Female', '1991-12-09', 'carles, iloilo', '34553234353', 'Filipino', 'Roman Catholic', 'English', 'o', '43', '44', '094533552353', '', 'berns.albiso@gmail.com', 'brenz albiso', '1684996399_c034701bb057d1036f2a.jpg', 0, '', '2023-05-13 16:28:18', '2023-05-25 14:33:19', NULL),
(141, '23-00004', '23435656433', 'Lovelyn', 'Paborito', 'Castro', 'Female', '1985-03-07', 'sdfxcvazxc', '43547673656', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'o', '65', '45', '09454433654', '', 'lovelyn.castro@gmail.com', 'lynlove castro', '1684996410_d4dda17805d95b2b64e3.jpg', 0, '', '2023-05-13 16:33:26', '2023-05-25 16:29:14', NULL),
(142, '23-00005', '234264353', 'Judge', 'Spencer', 'Amon', 'Male', '1990-05-09', 'gfbhfgh', '34356644434', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'b', '76', '65', '093453455', '5464265646', 'judge.amon@gmail.com', 'judge amon', '1684996429_b4f3efc1838ff2f9fb66.jpg', 0, '', '2023-05-16 14:45:45', '2023-05-25 14:33:49', NULL),
(144, '23-00007', '1234567890', 'Jano', 'Sarino', 'Tabor', 'Male', '1982-09-09', 'ouiououi', '23535223', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'b+', '', '', '095746354454', '0339583533', 'jano.tabor@gmail.com', 'jano tabor', '1684996448_a625d7dbb96cfdb4b742.jpg', 0, '', '2023-05-18 14:29:39', '2023-05-26 13:27:08', NULL),
(146, '23-00008', NULL, 'John', 'Moris', 'Doe', 'Male', '2023-05-10', 'aaaaa', '345345345', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'a+', '76', '45', '23565474574645', '6465456', 'john@gmail.com', 'sdfsd', '1685063676_12cab29bc233528a4357.jpg', 1, 'asddas', '2023-05-23 11:27:36', '2023-05-26 09:14:36', NULL),
(149, '23-00009', '34645755462234', 'Yves Kim', 'Casido', 'Cabanting', 'Male', '1990-08-27', 'Leon, Iloilo', '0435935265', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'B+', '163', '75', '095256546346', '0339348332', 'yveskimcabanting@gmail.com', 'yveskim', '1685080142_9ad1e3b193d5c1d1882a.jpg', 0, 'Multiple Dissability', '2023-05-26 13:35:56', '2023-06-15 16:55:10', NULL),
(150, '23-00010', NULL, 'Michael Angelo', 'Esteban', 'Sucaldito', 'Male', '2009-12-12', 'iloilo city', '97755676', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'b+', '120', '76', '0996657675 / 0978664546', '032455546', 'michael@gmail.com', 'michael angelo', NULL, 1, 'Visual Impairment', '2023-06-01 08:38:00', '2023-06-01 09:17:58', NULL),
(151, '23-00011', NULL, 'judge', 'smith', 'tagnon', 'Male', '2004-06-15', 'iloilo', '55433366554', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'a+', '65', '60', '0956623568 / 09366454785', '0956654', 'judge@mail.com', 'sdfsfsd', '1685941485_839704d459086747dd25.jpg', 0, '', '2023-06-05 13:04:45', '2023-06-05 13:46:34', NULL),
(152, '23-00012', NULL, 'Mike', 'Suares', 'Enriquez', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '1686204467_0e977de46657c45bdda6.jpg', 0, '', '2023-06-06 08:35:34', '2023-06-08 14:12:03', NULL),
(153, '23-00013', NULL, 'Apple', 'Demo', 'Funtanilla', 'Female', '1995-02-21', 'iloilo', '083554', 'Filipino', 'Roman Catholic', 'Hiligaynon', 'a+', '147', '65', '0954637565 / 0984544343', '02393445', 'apple@gmail.com', 'apple funtanilla', '1686206767_b322bfb5382f87d41a0e.jpg', 0, '', '2023-06-08 14:34:40', '2023-06-08 14:46:07', NULL),
(164, '23-00015', NULL, 'george', 'wash', 'bush', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', '2023-06-09 22:07:59', '2023-06-09 22:07:59', NULL),
(167, '23-00016', NULL, 'mary', 'had', 'alittle lamb', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', '2023-06-09 22:20:21', '2023-06-09 22:20:21', NULL),
(169, '23-00017', '', 'dsf', 'fdsf', 'fdsf', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', '2023-06-09 22:24:33', '2023-06-09 22:24:33', NULL),
(170, '23-00018', NULL, 'sdggfcbcva', 'fdgfdgdgdg', 'cbcbncv', 'Female', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', '2023-06-09 22:26:01', '2023-06-09 22:26:01', NULL),
(171, '23-00019', NULL, 'dfd', 'g', 'fdgf', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, '', '2023-06-09 22:26:26', '2023-06-09 22:26:26', NULL),
(172, '23-00020', '33535346643', 'oeirewrwe', 'rewrwrr', 'eerw', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '1686815787_9b072319fe6568e938a7.png', 0, '', '2023-06-09 22:26:50', '2023-06-15 15:56:27', NULL);

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
(4, 2, 3296, 1, 274, '2023-06-08 09:18:21', '2023-06-08 09:18:21');

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

--
-- Dumping data for table `household_members_tbl`
--

INSERT INTO `household_members_tbl` (`hm_id`, `stud_id`, `sy_id`, `grade`, `complete_name`, `hm_relationship`) VALUES
(30, 172, 1, 3, 'dsfsd', ''),
(31, 153, 1, 2, 'sdfdfa', ''),
(32, 153, 1, 2, 'sdf', ''),
(33, 172, 1, 2, 'dsf', ''),
(34, 172, 1, 2, 'dfdafas', 'Sibling'),
(35, 172, 1, 3, 'sdfs', ''),
(36, 172, 1, 1, 'dsfsd', ''),
(37, 172, 1, 4, 'sdf', 'Sibling'),
(38, 153, 1, 1, 'sdfds', 'Sibling'),
(39, 172, 1, 3, 'sdfs', 'Sibling');

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

--
-- Dumping data for table `program_head_tbl`
--

INSERT INTO `program_head_tbl` (`ph_id`, `p_id`, `ph_emp_id`, `memo_no`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 6, 3294, '64645', 1, '2023-05-07 15:05:21', '2023-05-07 15:05:21', NULL),
(24, 8, 3295, '7867', 1, '2023-05-09 13:16:51', '2023-05-09 13:16:51', NULL),
(25, 9, 3297, '77856856', 1, '2023-06-01 11:57:33', '2023-06-01 11:57:33', NULL);

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
(6, 'STVEP', 'Strengthened Technical-Vocational Education Program', '1686020715_3fd0cea1b27448b21b8c.png', 1, '2023-04-29 19:40:01', '2023-06-06 11:05:15', NULL),
(8, 'EOC', 'evening Opportunity Class', '1683002401_3521ca5ea63f2dec8587.png', 1, '2023-05-02 12:40:01', '2023-05-02 12:40:01', NULL),
(9, 'SPJ', 'Special Program in Journalism', '1683002529_e81799f3b94684db8a58.png', 1, '2023-05-02 12:42:09', '2023-05-02 12:42:09', NULL),
(10, 'SPBE', 'Special Program in Business and Intrepreneurship', '1683002803_f42052566a84d274305b.png', 1, '2023-05-02 12:46:43', '2023-05-02 12:46:43', NULL),
(11, 'ARTS', 'School for the Arts', '1683078503_0e0331331fccd729e046.png', 1, '2023-05-03 09:48:23', '2023-05-03 09:48:23', NULL),
(12, 'PSSN', 'Program for Students with Special Needs', '1683096781_9dad163ce3048140db0f.jpg', 1, '2023-05-03 14:53:01', '2023-05-03 14:53:01', NULL),
(13, 'SPSTE', 'Special Program in Science Technology and Engineering', '1684219799_332d20f8c879822faf7c.png', 1, '2023-05-16 14:49:59', '2023-05-16 14:49:59', NULL);

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
(1, '2023-2024', 1);

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
(7, 'BABBAGE', 4, 6),
(8, 'Davinci', 3, 11),
(11, 'EOC-1A', 1, 9),
(12, 'EOC-2A', 2, 9),
(13, 'METCALF', 3, 6),
(19, 'COOPER', 1, 6),
(20, 'EOC 1A', 1, 8),
(21, 'EOC 1B', 2, 8),
(22, 'EOC 1C', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `shs_section_adviser_tbl`
--

CREATE TABLE `shs_section_adviser_tbl` (
  `shs_adv_id` int(11) NOT NULL,
  `shs_adv_emp_id` int(11) NOT NULL,
  `shs_adv_section_id` smallint(6) NOT NULL,
  `shs_adv_sy` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shs_section_tbl`
--

CREATE TABLE `shs_section_tbl` (
  `shs_sec_id` smallint(6) NOT NULL,
  `shs_sec_title` varchar(120) NOT NULL,
  `shs_grade_level` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shs_student_section_tbl`
--

CREATE TABLE `shs_student_section_tbl` (
  `shs_stud_sec_id` int(11) NOT NULL,
  `shs_stud_id` bigint(20) NOT NULL,
  `shs_sec_id` smallint(6) NOT NULL,
  `shs_stud_sec_sy` int(11) NOT NULL,
  `shs_assigned_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'ABM', 'The ABM Strand is for those who plan to take up business-related courses in higher education or engage in business, entrepreneur ship, and other business-related careers.', 1),
(2, 'STEM', 'SHS students who are inclined toward, or have the aptitude for, Math, Science and Engineering studies can enroll in the Science, Technology, Engineering and Mathematics (STEM) Strand.', 1),
(3, 'HUMSS', 'Strand for learners who want to pursue these fields of study at the university level.', 1),
(4, 'GAS', 'This strand is ideal for SHS students who have not yet decided on a particular specialization. This strand, which is also a viable offering in secondary schools with a low student population, allows for electives that may be a combination of related subjects from the other tracks or strands in the SHS curriculum.', 1),
(5, 'Arts and Design', 'The Arts and Design Track covers a wide range of art forms: Theater, Music, Dance, Creative Writing, Visual Arts, and Media Arts. Prior to enrollment, there is art/creative talent assessment and guidance to gauge a student’s art inclination and aptitude. The track has six general or common subjects that focus on acquiring competencies required for further specialization in the different artistic areas.', 2),
(6, 'Sports', 'The Sports Track is for students who are interested in sports-related careers, i.e. athlete development, fitness training, coaching, etc.', 3),
(7, 'TVL-AFA', 'Students with agri-fishery arts specializations will be able to demonstrate the necessary skills/competencies and values on the cultivation of plants and animal production to harvest food and other products using available technologies on farming and on raising, harvesting, and capturing fish and other aquatic resources. Schools that offer these specializations must have adequate facilities for students’ laboratory classes.', 4),
(8, 'TVL-HE', 'This TVL component consists of specializations equivalent to qualifications under garments, tourism, health, processed food and beverages, and social and other community development service sectors. Students with home economics specializations will be able to demonstrate the necessary skills, competencies, and values in taking care of oneself and one’s family, and in providing efficient services to others and to the community.', 4),
(9, 'TVL-IA', 'This TVL component consists of specializations equivalent to qualifications under automotive and land transport, construction, electronics, furniture and fixture, metal and engineering, and utilities sectors. Students with industrial arts specializations will be able to demonstrate the skills, competencies, and values in providing repair and maintenance services, installation, manual craftsmanship, and machine safety using available industrial and engineering technologies.', 4),
(10, 'TVL-ICT', 'This TVL component consists of specializations equivalent to qualifications under the information and communication technologies sector. Students with ICT specializations will be able to demonstrate the skills, competencies, and values in effective application, use, and management of technology in the context of system designing and customer service.', 4);

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
(63, '23-00001', 'iloilonhs', 1, 1, 'student', 138, '2023-05-13 16:19:01', '2023-05-30 16:51:57'),
(65, '23-00003', 'iloilonhs', 1, 1, 'student', 140, '2023-05-13 16:28:18', '2023-06-06 09:13:46'),
(66, '23-00004', 'iloilonhs', 1, 1, 'student', 141, '2023-05-13 16:33:26', '2023-06-18 12:35:02'),
(67, '23-00005', 'iloilonhs', 1, 1, 'student', 142, '2023-05-16 14:45:45', '2023-06-18 12:33:21'),
(69, '23-00007', 'iloilonhs', 1, 1, 'student', 144, '2023-05-18 14:29:39', '2023-06-18 12:32:54'),
(71, '23-00008', 'iloilonhs', 1, 0, 'student', 146, '2023-05-23 11:27:37', '2023-05-23 11:27:37'),
(74, '23-00009', 'iloilonhs', 1, 1, 'student', 149, '2023-05-26 13:35:56', '2023-06-19 11:44:36'),
(75, '23-00010', 'iloilonhs', 1, 1, 'student', 150, '2023-06-01 08:38:00', '2023-06-18 12:31:22'),
(76, '23-00011', 'iloilonhs', 1, 1, 'student', 151, '2023-06-05 13:04:45', '2023-06-05 13:50:35'),
(77, '23-00012', 'iloilonhs', 1, 1, 'student', 152, '2023-06-06 08:35:34', '2023-06-06 08:36:23'),
(78, '23-00013', 'iloilonhs', 1, 1, 'student', 153, '2023-06-08 14:34:40', '2023-06-19 08:48:19'),
(80, '23-00015', 'iloilonhs', 1, 1, 'student', 164, '2023-06-09 22:07:59', '2023-06-18 12:29:05'),
(81, '23-00016', 'iloilonhs', 1, 1, 'student', 167, '2023-06-09 22:20:21', '2023-06-18 12:34:22'),
(82, '23-00017', 'iloilonhs', 1, 0, 'student', 169, '2023-06-09 22:24:34', '2023-06-09 22:24:34'),
(83, '23-00018', 'iloilonhs', 1, 0, 'student', 170, '2023-06-09 22:26:01', '2023-06-09 22:26:01'),
(84, '23-00019', 'iloilonhs', 1, 1, 'student', 171, '2023-06-09 22:26:26', '2023-06-19 08:53:35'),
(85, '23-00020', 'iloilonhs', 1, 1, 'student', 172, '2023-06-09 22:26:50', '2023-06-19 09:28:05');

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
(9, 140, 'Permanent', 'dfdf', 'fsd', 'dfdsfsd', 'sdfsd', 'Narvacan', 'Ilocos Sur', 'dsfsd', 'I', '2023-05-23 10:48:48', '2023-05-23 10:48:54'),
(10, 146, 'Permanent', 'na', 'na', 'na', 'abc', 'Iloilo City', 'Iloilo', '5673', 'VI', '2023-05-26 09:00:23', '2023-05-26 09:00:23'),
(13, 149, 'Permanent', 'na', 'na', 'na', 'Samlague', 'Leon', 'Iloilo', '5024', 'VI', '2023-05-26 13:40:45', '2023-05-26 13:40:45'),
(14, 149, 'Rented', 'na', 'na', 'na', 'Jereos, La Paz', 'Iloilo City', 'Iloilo', '5000', 'VI', '2023-05-26 13:41:45', '2023-05-26 13:41:45'),
(15, 150, 'Permanent', '', '', '', 'poblacion', 'Leon', 'Iloilo', '', 'VI', '2023-06-01 09:56:41', '2023-06-01 09:56:41'),
(16, 150, 'Rented', '', '', '', 'desamparados', 'Iloilo City', 'Iloilo', '5000', 'VI', '2023-06-01 10:19:31', '2023-06-01 10:19:31'),
(17, 151, 'Permanent', '', '', '', 'dsafsdfsd', 'Flora', 'Apayao', '', 'VIII', '2023-06-05 13:37:34', '2023-06-05 13:37:34'),
(18, 153, 'Permanent', 'bdg. 123', 'earth', 'megahomes', 'Tabuc Suba', 'Iloilo City', 'Iloilo', '05255', 'VI', '2023-06-08 14:38:49', '2023-06-08 14:38:49'),
(19, 153, 'Rented', '', '', '', 'Divenagrasya Jaro', 'Iloilo City', 'Iloilo', '5000', 'VI', '2023-06-08 14:39:18', '2023-06-08 14:39:18'),
(20, 167, 'Permanent', 'fsdf', 'fdsf', 'ffsdf', 'dsfdsfFSD', 'Laoag', 'Ilocos Norte', 'fdgfdg', 'XI', '2023-06-12 14:44:10', '2023-06-12 14:44:10');

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

--
-- Dumping data for table `student_devices_tbl`
--

INSERT INTO `student_devices_tbl` (`dev_id`, `dev_name`, `dev_type`, `is_functioning`, `stud_id`) VALUES
(1, 'Realme XT', 'Smart Phone', 1, 140),
(4, 'iphone 12', 'Smart Phone', 1, 138),
(6, 'iphone14', 'Smart Phone', 1, 146),
(7, 'asus rog', 'Computer', 1, 146),
(8, 'PLDT ', 'Internet Related', 1, 146),
(11, 'iphone 14', 'Smart Phone', 1, 149),
(12, 'lenovo laptop', 'Computer', 1, 149),
(13, 'pldt', 'Internet Related', 1, 149),
(14, 'laptop', 'Computer', 1, 150),
(15, 'sfsdfds', 'Smart Phone', 1, 151),
(16, 'gfgdfsdf', 'Computer', 1, 151),
(17, 'gfbfghutyrhr', 'Internet Related', 1, 151),
(18, 'iphone 14 pro max fully paid', 'Smart Phone', 1, 153);

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
(4, 'siseaure', 'Undetermined', 146, 'having attack time to time'),
(6, 'hearth problem', 'Physical', 149, 'cannot be stressed'),
(7, 'nearsighted', 'Physical', 149, 'needs to be in front row'),
(8, 'hearth problem', 'Physical', 150, 'sensitive'),
(9, 'fsdfsd', 'Physical', 150, 'afsdfgdfg'),
(10, 'w3esdfsdf', 'Undetermined', 151, 'sdfgfsdg'),
(11, 'gfhrtfgbe', 'Physical', 151, 'gfgwwfd'),
(12, 'Heart Failure', 'Physical', 153, 'Do not stress');

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_parents_tbl`
--

INSERT INTO `student_parents_tbl` (`parent_id`, `stud_id`, `f_fname`, `f_mname`, `f_lname`, `f_highest_education`, `f_contact`, `f_email`, `f_facebook`, `m_fname`, `m_mname`, `m_lname`, `m_highest_education`, `m_contact`, `m_email`, `m_facebook`, `g_fname`, `g_mname`, `g_lname`, `g_highest_education`, `g_contact`, `g_email`, `g_facebook`, `is_4ps`, `household_no`, `is_ip`, `ip_community`, `financial_provider`, `instructional_provider`, `created_at`, `updated_at`) VALUES
(7, 146, 'father', 'middle', 'last', 'Doctoral', '56453667', 'father@mail.com', 'father fb', 'mother', 'mother middle', 'mother last', 'Elementary', '547654756', 'mother@mail.com', 'mother facebook', 'guardian', 'guardian middle', 'guardian last', 'Masters', '785675676', 'guardian@mail.com', 'guardian fb', 1, '7u56443565443', 0, '', 'Father', 'Mother', '2023-05-26 09:02:04', '2023-05-26 09:02:04'),
(9, 149, 'Nelson', '', 'Cabanting', 'College', '', '', '', 'Jesielyn', '', 'Cabanting', 'College', '', '', '', '', '', '', '', '', '', '', 1, '564868745764', 1, 'rtrertreter', 'Both', 'Mother', '2023-05-26 13:43:06', '2023-06-15 16:59:17'),
(10, 150, 'George', 'asdad', 'sadfsdf', 'College', '0765745745', 'george@gmail.com', 'george', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '56745634534', 1, 'Cebuanon', 'Tito', 'Tita', '2023-06-01 10:21:12', '2023-06-01 10:21:12'),
(11, 151, 'father', 'sdf', 'aG', 'Masters', '67678567', 'father@gmail.com', 'father fb', 'mother', 'sfdsfds', 'DFGSDFG', 'Masters', '65987868568', 'mother@mail.com', 'mother fb', 'guardian', 'sdfdsfsdf', 'SDGSAF', 'Elementary', '6786967967', 'guardian@mail.com', 'guardian fb', 1, '554756856', 1, 'Kinaray-a', 'Both', 'Both', '2023-06-05 13:42:23', '2023-06-05 13:42:23'),
(12, 153, 'father 1', 'father middle', 'father last', 'College', '00995464', '', '', 'mother name', 'mother middle', 'mother last', 'College', '096745553', '', '', '', '', '', '', '', '', '', 0, '', 1, 'Aita', 'Tita', 'Both', '2023-06-08 14:41:00', '2023-06-08 14:41:00');

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
(48, 6, 149, 1, 1, 274, '2023-06-19 16:41:50', '2023-06-19 16:41:50');

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
(2, 146, '7', '2022-2023', 'Lapaz Elementary School', '564332', 'Public', 'La Paz, Iloilo City', 'Gina', 0),
(3, 146, '8', '2023-2024', 'Iloilo National High School', '302509', 'Public', 'La Paz, Iloilo City', 'Jano Tabor', 0),
(5, 149, '7', '2021-2022', 'INHS', '302509', 'Public', 'lapaz', 'cherry', 0),
(6, 150, '5', '2018-2019', 'Masbate Elementary school', '4355635', 'Public', 'masbate manila', 'leo', 0),
(7, 150, '6', '2019-2020', 'Zaraga Elementary School', '66554', 'Public', 'Zaraga Iloilo', 'john', 0),
(8, 151, '6', '2019-2020', 'wdsdfgsdfsdfds', '457564745', 'Public', 'wsdfgdfgdf', 'wereqwgdfghd', 0),
(9, 153, '6', '2018-2019', 'Jaro Elementary school', '09453355', 'Public', 'Jaro Iloilo', 'Roel', 0),
(10, 167, '', '', '', '', 'Public', '', '', 0);

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
(13, 19, 149, 1, '2023-06-19 17:04:10', '2023-06-19 17:04:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_strands_tbl`
--

CREATE TABLE `student_strands_tbl` (
  `stud_strand_id` bigint(20) NOT NULL,
  `s_strand_id` int(11) NOT NULL,
  `s_strand_stud_id` bigint(20) NOT NULL,
  `s_sy_id` int(11) NOT NULL,
  `s_is_active` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_strands_tbl`
--

INSERT INTO `student_strands_tbl` (`stud_strand_id`, `s_strand_id`, `s_strand_stud_id`, `s_sy_id`, `s_is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 152, 1, 1, 274, '2023-06-08 13:45:52', '2023-06-08 13:45:52');

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

--
-- Dumping data for table `subject_group_head_tbl`
--

INSERT INTO `subject_group_head_tbl` (`sgh_id`, `sgh_sg_id`, `sgh_emp_id`, `sgh_sy`, `created_at`, `updated_at`) VALUES
(1, 1, 3294, 1, '2023-06-07 10:47:10', '2023-06-07 10:47:10');

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
-- Table structure for table `track_section_tbl`
--

CREATE TABLE `track_section_tbl` (
  `track_sec_id` smallint(6) NOT NULL,
  `track_id` int(11) NOT NULL,
  `section_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Academic Track', 'Academic Track'),
(2, 'Arts and Design Track', 'The Arts and Design Track covers a wide range of art forms: Theater, Music, Dance, Creative Writing, Visual Arts, and Media Arts. Prior to enrollment, there is art/creative talent assessment and guidance to gauge a student’s art inclination and aptitude. The track has six general or common subjects that focus on acquiring competencies required for further specialization in the different artistic areas.'),
(3, 'Sports Track', 'The Sports Track is for students who are interested in sports-related careers, i.e. athlete development, fitness training, coaching, etc. Table 2.15 shows the subjects in this track.'),
(4, 'Technical-Vocational-Livelihood (TVL) Track', 'The SHS program has a Technical-Vocational-Livelihood (TVL) Track, which has four strands: Agri-Fishery Arts, Home Economics (HE), Information and Communication Technology (ICT), and Industrial Arts. These are aligned with Technology and Livelihood Education (TLE) in Grades 7-10. Each TVL strand offers various specializations that may or may not have a National Certificate (NC) equivalent from TESDA');

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
  `user_restriction` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_email`, `user_password`, `user_type`, `user_restriction`) VALUES
(274, 3294, 'yveskim.cabanting@iloilonhs.edu.ph', '$2y$10$ICUCIvVAvt1YR7RGFqes8O6QKkJVNZKByE71nFGv9tRbh0sLk0bYS', 'Admin', '1');

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
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `sy_id` (`sy_id`);

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
  ADD KEY `grade_level` (`grade_level_id`);

--
-- Indexes for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD PRIMARY KEY (`en_id`),
  ADD UNIQUE KEY `school_id` (`student_id`),
  ADD UNIQUE KEY `student_lrn` (`student_lrn`);

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
-- Indexes for table `shs_section_adviser_tbl`
--
ALTER TABLE `shs_section_adviser_tbl`
  ADD PRIMARY KEY (`shs_adv_id`),
  ADD KEY `shs_adv_emp_id` (`shs_adv_emp_id`),
  ADD KEY `shs_adv_section_id` (`shs_adv_section_id`),
  ADD KEY `shs_adv_sy` (`shs_adv_sy`);

--
-- Indexes for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  ADD PRIMARY KEY (`shs_sec_id`),
  ADD KEY `shs_grade_level` (`shs_grade_level`);

--
-- Indexes for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  ADD PRIMARY KEY (`shs_stud_sec_id`),
  ADD KEY `shs_stud_id` (`shs_stud_id`),
  ADD KEY `shs_sec_id` (`shs_sec_id`),
  ADD KEY `shs_stud_sec_sy` (`shs_stud_sec_sy`),
  ADD KEY `shs_assigned_by` (`shs_assigned_by`);

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
  ADD KEY `created_by` (`created_by`);

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
-- Indexes for table `track_section_tbl`
--
ALTER TABLE `track_section_tbl`
  ADD PRIMARY KEY (`track_sec_id`),
  ADD KEY `track_id` (`track_id`),
  ADD KEY `section_id` (`section_id`);

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
  MODIFY `adv_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `dept_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `emp_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `emp_prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee_t`
--
ALTER TABLE `employee_t`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3304;

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
  MODIFY `en_stat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  MODIFY `en_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `faculty_subject_group_tbl`
--
ALTER TABLE `faculty_subject_group_tbl`
  MODIFY `fsg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `hm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `prog_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_details_tbl`
--
ALTER TABLE `section_details_tbl`
  MODIFY `sec_det_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `shs_section_adviser_tbl`
--
ALTER TABLE `shs_section_adviser_tbl`
  MODIFY `shs_adv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  MODIFY `shs_sec_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  MODIFY `shs_stud_sec_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `s_account_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `student_address_tbl`
--
ALTER TABLE `student_address_tbl`
  MODIFY `address_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_devices_tbl`
--
ALTER TABLE `student_devices_tbl`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_health_tbl`
--
ALTER TABLE `student_health_tbl`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_parents_tbl`
--
ALTER TABLE `student_parents_tbl`
  MODIFY `parent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_program_tbl`
--
ALTER TABLE `student_program_tbl`
  MODIFY `stud_prog_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_school_tbl`
--
ALTER TABLE `student_school_tbl`
  MODIFY `sch_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  MODIFY `stud_sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_strands_tbl`
--
ALTER TABLE `student_strands_tbl`
  MODIFY `stud_strand_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `track_section_tbl`
--
ALTER TABLE `track_section_tbl`
  MODIFY `track_sec_id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_tbl`
--
ALTER TABLE `track_tbl`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

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
  ADD CONSTRAINT `employee_category_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_category_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `enrollment_status_tbl_ibfk_5` FOREIGN KEY (`enrolled_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `shs_section_adviser_tbl_ibfk_3` FOREIGN KEY (`shs_adv_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_section_tbl`
--
ALTER TABLE `shs_section_tbl`
  ADD CONSTRAINT `shs_section_tbl_ibfk_1` FOREIGN KEY (`shs_grade_level`) REFERENCES `grade_level_tbl` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shs_student_section_tbl`
--
ALTER TABLE `shs_student_section_tbl`
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_1` FOREIGN KEY (`shs_sec_id`) REFERENCES `shs_section_tbl` (`shs_sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_2` FOREIGN KEY (`shs_stud_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_3` FOREIGN KEY (`shs_stud_sec_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shs_student_section_tbl_ibfk_4` FOREIGN KEY (`shs_assigned_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `student_strands_tbl_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_group_head_tbl`
--
ALTER TABLE `subject_group_head_tbl`
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_1` FOREIGN KEY (`sgh_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_2` FOREIGN KEY (`sgh_sg_id`) REFERENCES `subject_group_tbl` (`sg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_group_head_tbl_ibfk_3` FOREIGN KEY (`sgh_sy`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `track_section_tbl`
--
ALTER TABLE `track_section_tbl`
  ADD CONSTRAINT `track_section_tbl_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `shs_section_tbl` (`shs_sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `track_section_tbl_ibfk_2` FOREIGN KEY (`track_id`) REFERENCES `track_tbl` (`track_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
