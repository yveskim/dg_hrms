-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 05:00 PM
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
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `dept_id` smallint(6) NOT NULL,
  `dept_title` varchar(60) NOT NULL,
  `dept_head` int(11) NOT NULL,
  `dept_location` varchar(160) NOT NULL,
  `dept_category` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`dept_id`, `dept_title`, `dept_head`, `dept_location`, `dept_category`) VALUES
(1, 'ICT', 3295, 'Meriam Defensor Building', 1);

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
(43, 'Elementary', 'Jaro National High School', 'Primary', '2023-04-07', '2023-04-17', 'highest honors', '2001', 'academic excellence award', 3295);

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
  `date_assigned` date NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_department_tbl`
--

INSERT INTO `employee_department_tbl` (`emp_dept_id`, `emp_id`, `dept_id`, `date_assigned`, `is_current`, `created_at`, `updated_at`) VALUES
(2, 3294, 1, '2023-04-19', 1, '2023-04-26 15:48:44', '2023-05-02 10:13:40'),
(4, 3295, 1, '2023-04-26', 1, '2023-04-26 22:23:28', '2023-05-02 16:18:05'),
(5, 3297, 1, '2023-04-23', 0, '2023-04-29 13:57:10', '2023-05-02 10:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `employee_position_tbl`
--

CREATE TABLE `employee_position_tbl` (
  `emp_pos_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `plantila_id` smallint(6) NOT NULL,
  `step` int(11) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `date_assigned` date NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_position_tbl`
--

INSERT INTO `employee_position_tbl` (`emp_pos_id`, `emp_id`, `plantila_id`, `step`, `category_id`, `date_assigned`, `is_current`, `created_at`, `updated_at`) VALUES
(11, 3294, 3, 1, 1, '2023-04-19', 1, '2023-04-26 22:01:23', '2023-05-02 10:13:33'),
(12, 3295, 8, 1, 1, '2023-04-20', 1, '2023-04-26 22:24:08', '2023-05-02 16:17:33'),
(13, 3297, 2, 1, 1, '2023-04-21', 1, '2023-04-29 13:56:49', '2023-05-02 16:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee_program_tbl`
--

CREATE TABLE `employee_program_tbl` (
  `emp_prog_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `prog_id` smallint(6) NOT NULL,
  `date_assigned` date NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_program_tbl`
--

INSERT INTO `employee_program_tbl` (`emp_prog_id`, `emp_id`, `prog_id`, `date_assigned`, `is_current`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 3295, 6, '2023-04-07', 1, 1, '2023-04-29 21:59:55', '2023-05-02 13:23:28', NULL),
(12, 3294, 6, '2023-05-01', 0, 1, '2023-05-02 10:14:14', '2023-05-02 13:28:08', NULL),
(13, 3296, 7, '2023-05-01', 0, 1, '2023-05-02 13:20:35', '2023-05-02 13:31:20', NULL),
(14, 3297, 9, '2023-05-01', 0, 1, '2023-05-02 13:24:02', '2023-05-02 16:16:23', NULL),
(15, 3296, 10, '2023-05-12', 1, 1, '2023-05-02 13:24:47', '2023-05-02 13:31:20', NULL),
(16, 3294, 7, '2023-05-12', 1, 1, '2023-05-02 13:28:04', '2023-05-02 13:28:08', NULL),
(17, 3298, 10, '2023-05-17', 0, 1, '2023-05-02 14:14:58', '2023-05-02 14:14:58', NULL),
(18, 3297, 6, '2023-05-01', 1, 1, '2023-05-02 16:15:40', '2023-05-02 16:16:23', NULL);

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
(3298, 3, '767354', 'Al john', 'Delaserna', 'Artacho', '1682993790_3cca1e5951fb4fce0c48.jpg', 'Male', '', 'Filipino', '', '', '2023-05-05', '', '', '', 0, 0, '', '', '', '', '', '', 'aj@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-05-02 10:16:30', '2023-05-02 10:16:30', NULL);

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
-- Table structure for table `enrollment_tbl`
--

CREATE TABLE `enrollment_tbl` (
  `en_id` bigint(20) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `student_lrn` varchar(25) NOT NULL,
  `school_year_id` int(25) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `citizenship` varchar(40) NOT NULL,
  `religion` varchar(60) NOT NULL,
  `phone_no` varchar(40) NOT NULL,
  `tel_no` varchar(25) NOT NULL,
  `email_address` varchar(90) NOT NULL,
  `facebook_name` varchar(90) NOT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `with_special_need` tinyint(1) NOT NULL,
  `special_need` varchar(60) NOT NULL,
  `is_4ps_beneficiary` tinyint(1) NOT NULL,
  `household_no` varchar(45) NOT NULL,
  `p_blk_lot_street_subd` varchar(80) NOT NULL,
  `p_barangay` varchar(80) NOT NULL,
  `p_municipality` varchar(80) NOT NULL,
  `p_province` varchar(80) NOT NULL,
  `p_zip_code` varchar(25) NOT NULL,
  `c_blk_lot_street_subd` varchar(80) NOT NULL,
  `c_barangay` varchar(80) NOT NULL,
  `c_municipality` varchar(80) NOT NULL,
  `c_province` varchar(80) NOT NULL,
  `c_zip_code` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment_tbl`
--

INSERT INTO `enrollment_tbl` (`en_id`, `student_id`, `student_lrn`, `school_year_id`, `first_name`, `middle_name`, `last_name`, `ext`, `gender`, `birthdate`, `citizenship`, `religion`, `phone_no`, `tel_no`, `email_address`, `facebook_name`, `student_image`, `with_special_need`, `special_need`, `is_4ps_beneficiary`, `household_no`, `p_blk_lot_street_subd`, `p_barangay`, `p_municipality`, `p_province`, `p_zip_code`, `c_blk_lot_street_subd`, `c_barangay`, `c_municipality`, `c_province`, `c_zip_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(130, '23-00001', '346545756756', 1, 'Yves Kim', 'Casido', 'Cabanting', '', 'Male', '2023-04-05', '', '', '', '', 'yveskimcabanting90@gmail.com', '', '1681461252_8118f4c2ad2286b31e4d.jpg', 0, '', 0, '', 'Earth Street', 'sadsa', 'Balete', 'Aklan', '5445', 'Earth Street', 'sadsa', 'Balete', 'Aklan', '5445', '2023-04-14 16:34:12', '2023-04-19 14:19:49', NULL),
(131, '23-00002', '3254767', 1, 'Maria', 'Josefa', 'Makiling', '', '', '0000-00-00', '', '', '', '', '', '', '1681461294_7f968c811fdfb63ae597.jpg', 0, '', 0, '', 'fdsf', 'dsfsdf', 'Bugasong', 'Antique', '76', 'fdsf', 'dsfsdf', 'Bugasong', 'Antique', '76', '2023-04-14 16:34:54', '2023-04-22 16:04:07', NULL),
(132, '23-00003', '46547755464', 1, 'John', 'Artacho', 'cccc', '', 'Male', '1999-04-13', 'Japanese', 'Baptist', '43546457564', '3646463', 'john@gmail.com', 'john', NULL, 1, 'Emotional-Behaviour Disorder', 1, '54767865865', 'ertrryeyrtyf', 'sfsfetet', 'Bontoc', 'Mountain Province', '56765', 'ertrryeyrtyf', 'sfsfetet', 'Bontoc', 'Mountain Province', '56765', '2023-04-18 15:39:59', '2023-04-18 15:39:59', NULL);

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
-- Table structure for table `plantila_tbl`
--

CREATE TABLE `plantila_tbl` (
  `plant_id` smallint(6) NOT NULL,
  `plantila_title` varchar(100) NOT NULL,
  `plantila_description` varchar(150) NOT NULL,
  `salary_grade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plantila_tbl`
--

INSERT INTO `plantila_tbl` (`plant_id`, `plantila_title`, `plantila_description`, `salary_grade`) VALUES
(1, 'Teacher I', 'Teacher I', '11'),
(2, 'Teacher II', 'Teacher II', '12'),
(3, 'Teacher III', 'Teacher III', '13'),
(4, 'Head Teacher I', 'Head Teacher I', '14'),
(5, 'Head Teacher II', 'Head Teacher II', '15'),
(6, 'Head Teacher III', 'Head Teacher III', '16'),
(7, 'Master Teacher I', 'Master Teacher I', '17'),
(8, 'Master Teacher II', 'Master Teacher II', '18'),
(9, 'Master Teacher III', 'Master Teacher III', '19');

-- --------------------------------------------------------

--
-- Table structure for table `program_head_tbl`
--

CREATE TABLE `program_head_tbl` (
  `ph_id` int(11) NOT NULL,
  `p_id` smallint(6) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date_assigned` date NOT NULL,
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
(6, 'STVEP', 'Strengthened Technical-Vocational Education Program', '1682768401_209a6becbd9638cf576a.png', 1, '2023-04-29 19:40:01', '2023-04-29 19:40:01', NULL),
(7, 'SPSTE', 'Special Program in Science Technology and Engineering', '1683002285_03759dd21a357332eb53.png', 1, '2023-05-02 12:38:05', '2023-05-02 12:38:05', NULL),
(8, 'EOC', 'evening Opportunity Class', '1683002401_3521ca5ea63f2dec8587.png', 1, '2023-05-02 12:40:01', '2023-05-02 12:40:01', NULL),
(9, 'SPJ', 'Special Program in Journalism', '1683002529_e81799f3b94684db8a58.png', 1, '2023-05-02 12:42:09', '2023-05-02 12:42:09', NULL),
(10, 'SPBE', 'Special Program in Business and Intrepreneurship', '1683002803_f42052566a84d274305b.png', 1, '2023-05-02 12:46:43', '2023-05-02 12:46:43', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sec_id` smallint(11) NOT NULL,
  `sec_det_id` smallint(6) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
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
(55, '23-00001', 'iloilonhs', 1, 0, 'student', 130, '2023-04-14 16:34:12', '2023-04-14 16:34:12'),
(56, '23-00002', 'iloilonhs', 1, 0, 'student', 131, '2023-04-14 16:34:54', '2023-04-14 16:34:54'),
(57, '23-00003', 'iloilonhs', 1, 0, 'student', 132, '2023-04-18 15:39:59', '2023-04-18 15:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_section_tbl`
--

CREATE TABLE `student_section_tbl` (
  `stud_sec_id` int(11) NOT NULL,
  `sec_id` smallint(6) NOT NULL,
  `en_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `dept_head` (`dept_head`),
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
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `employee_position_tbl`
--
ALTER TABLE `employee_position_tbl`
  ADD PRIMARY KEY (`emp_pos_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `plantila_id` (`plantila_id`),
  ADD KEY `category_id` (`category_id`);

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
-- Indexes for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD PRIMARY KEY (`en_id`),
  ADD UNIQUE KEY `school_id` (`student_id`),
  ADD UNIQUE KEY `student_lrn` (`student_lrn`),
  ADD KEY `school_year` (`school_year_id`);

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
-- Indexes for table `plantila_tbl`
--
ALTER TABLE `plantila_tbl`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `emp_id` (`emp_id`),
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
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `adviser_id` (`adviser_id`),
  ADD KEY `sy_id` (`sy_id`),
  ADD KEY `sec_det_id` (`sec_det_id`);

--
-- Indexes for table `student_account_t`
--
ALTER TABLE `student_account_t`
  ADD PRIMARY KEY (`s_account_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `en_id` (`en_id`);

--
-- Indexes for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  ADD PRIMARY KEY (`stud_sec_id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `en_id` (`en_id`);

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
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `cat_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `dept_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educational_bg_t`
--
ALTER TABLE `educational_bg_t`
  MODIFY `educ_bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  MODIFY `elig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  MODIFY `emp_dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_position_tbl`
--
ALTER TABLE `employee_position_tbl`
  MODIFY `emp_pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  MODIFY `emp_prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee_t`
--
ALTER TABLE `employee_t`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3299;

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
-- AUTO_INCREMENT for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  MODIFY `en_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `grade_level_tbl`
--
ALTER TABLE `grade_level_tbl`
  MODIFY `grade_level_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `plantila_tbl`
--
ALTER TABLE `plantila_tbl`
  MODIFY `plant_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `prog_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_details_tbl`
--
ALTER TABLE `section_details_tbl`
  MODIFY `sec_det_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sec_id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_account_t`
--
ALTER TABLE `student_account_t`
  MODIFY `s_account_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  MODIFY `stud_sec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD CONSTRAINT `department_tbl_ibfk_1` FOREIGN KEY (`dept_head`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  ADD CONSTRAINT `employee_children_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  ADD CONSTRAINT `employee_department_tbl_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department_tbl` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_department_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_position_tbl`
--
ALTER TABLE `employee_position_tbl`
  ADD CONSTRAINT `employee_position_tbl_ibfk_1` FOREIGN KEY (`plantila_id`) REFERENCES `plantila_tbl` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_position_tbl_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_position_tbl_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  ADD CONSTRAINT `employee_program_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_program_tbl_ibfk_2` FOREIGN KEY (`prog_id`) REFERENCES `program_tbl` (`prog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_program_tbl_ibfk_3` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `enrollment_tbl`
--
ALTER TABLE `enrollment_tbl`
  ADD CONSTRAINT `enrollment_tbl_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  ADD CONSTRAINT `family_bg_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  ADD CONSTRAINT `learning_development_t_ibfk_1` FOREIGN KEY (`ld_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  ADD CONSTRAINT `program_head_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD CONSTRAINT `section_tbl_ibfk_4` FOREIGN KEY (`adviser_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_tbl_ibfk_5` FOREIGN KEY (`sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_tbl_ibfk_6` FOREIGN KEY (`sec_det_id`) REFERENCES `section_details_tbl` (`sec_det_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_account_t`
--
ALTER TABLE `student_account_t`
  ADD CONSTRAINT `student_account_t_ibfk_1` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_section_tbl`
--
ALTER TABLE `student_section_tbl`
  ADD CONSTRAINT `student_section_tbl_ibfk_1` FOREIGN KEY (`sec_id`) REFERENCES `section_tbl` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_section_tbl_ibfk_3` FOREIGN KEY (`en_id`) REFERENCES `enrollment_tbl` (`en_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
