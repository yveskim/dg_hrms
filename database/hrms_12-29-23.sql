-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 04:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_tbl`
--

CREATE TABLE `calendar_tbl` (
  `cal_id` smallint(6) NOT NULL,
  `cal_month` varchar(60) NOT NULL,
  `total_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calendar_tbl`
--

INSERT INTO `calendar_tbl` (`cal_id`, `cal_month`, `total_days`) VALUES
(1, 'January', 31),
(2, 'February', 28),
(3, 'March', 31),
(4, 'April', 30),
(5, 'May', 31),
(6, 'June', 30),
(7, 'July', 31),
(8, 'August', 31),
(9, 'September', 30),
(10, 'October', 31),
(11, 'November', 30),
(12, 'December', 31);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `cat_id` smallint(6) NOT NULL,
  `cat_title` varchar(60) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `dept_id` smallint(6) NOT NULL,
  `dept_title` varchar(60) NOT NULL,
  `dept_location` varchar(160) NOT NULL,
  `dept_category` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `educational_bg_t`
--

INSERT INTO `educational_bg_t` (`educ_bg_id`, `educ_bg_level`, `educ_bg_school`, `educ_bg_degree`, `educ_bg_from`, `educ_bg_to`, `educ_bg_units`, `educ_bg_year_graduated`, `educ_bg_scholarship_honors`, `educ_bg_emp_id`) VALUES
(46, 'College', 'INTERFACE COMPUTER COLLEGE ILOILO BRANCH', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '0000-00-00', '0000-00-00', '', '2019', '', 3398),
(47, 'College', 'University of San Agustin', 'Bachelor of Secondary Education Major in MAPEH', '2013-06-10', '2017-04-26', '', '2017', '', 3372),
(48, 'Elementary', 'elementary', 'elementary', '2023-11-03', '2023-10-31', 'elementary', '2019', 'highest honors', 3311);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `eligibility_t`
--

INSERT INTO `eligibility_t` (`elig_id`, `elig_emp_id`, `elig_board_bar`, `elig_rating`, `elig_exam_date`, `elig_exam_place`, `elig_license_no`, `elig_license_date_valid`) VALUES
(14, 3398, 'CSC SUBPROFESSIONAL', '83.127', '2023-03-26', 'ISAT - U', '', '0000-00-00'),
(15, 3294, 'sdfsdgfdsfds', 'fdsfdsdsfsdfds', '2023-12-01', 'sdffds', 'sdf3453dsr', '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_category_tbl`
--

CREATE TABLE `employee_category_tbl` (
  `emp_cat_id` int(11) NOT NULL,
  `cat_id` smallint(6) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_category_tbl`
--

INSERT INTO `employee_category_tbl` (`emp_cat_id`, `cat_id`, `emp_id`) VALUES
(13, 1, 3294),
(14, 2, 3311),
(15, 2, 3324),
(16, 2, 3320),
(17, 2, 3325),
(18, 2, 3321),
(19, 2, 3322),
(20, 2, 3323),
(21, 2, 3327),
(22, 2, 3329),
(23, 2, 3331),
(24, 2, 3332),
(25, 2, 3333),
(26, 2, 3336),
(27, 2, 3394),
(28, 2, 3399),
(29, 2, 3401),
(30, 2, 3402),
(31, 2, 3403),
(32, 2, 3404),
(33, 2, 3413),
(34, 2, 3405),
(35, 2, 3424),
(36, 2, 3407),
(37, 2, 3418),
(38, 2, 3412),
(39, 2, 3419),
(40, 2, 3410),
(41, 2, 3359),
(42, 2, 3421),
(43, 2, 3406),
(44, 2, 3420),
(45, 2, 3423),
(46, 2, 3326),
(47, 2, 3360),
(48, 2, 3422),
(49, 2, 3417),
(50, 1, 3317);

-- --------------------------------------------------------

--
-- Table structure for table `employee_children_t`
--

CREATE TABLE `employee_children_t` (
  `child_id` int(11) NOT NULL,
  `child_name` varchar(120) NOT NULL,
  `child_birthdate` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_children_t`
--

INSERT INTO `employee_children_t` (`child_id`, `child_name`, `child_birthdate`, `emp_id`) VALUES
(145, 'child 1', '2010-05-05', 3311);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_program_tbl`
--

INSERT INTO `employee_program_tbl` (`emp_prog_id`, `emp_id`, `prog_id`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 3294, 15, 2, '2023-07-06 15:23:08', '2023-07-06 15:23:08', NULL),
(33, 3317, 23, 1, '2023-08-29 11:47:51', '2023-08-29 11:50:09', '2023-08-29 11:50:09'),
(34, 3317, 23, 1, '2023-08-29 11:50:17', '2023-08-29 11:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills_tbl`
--

CREATE TABLE `employee_skills_tbl` (
  `skills_id` int(11) NOT NULL,
  `skills_emp_id` int(11) NOT NULL,
  `special_skills_hobbies` varchar(200) NOT NULL,
  `non_academic_distinctions` varchar(200) NOT NULL,
  `skills_organization` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_skills_tbl`
--

INSERT INTO `employee_skills_tbl` (`skills_id`, `skills_emp_id`, `special_skills_hobbies`, `non_academic_distinctions`, `skills_organization`) VALUES
(3, 3294, 'skills 1', 'asdsa', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `employee_t`
--

CREATE TABLE `employee_t` (
  `emp_id` int(11) NOT NULL,
  `job_description` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_t`
--

INSERT INTO `employee_t` (`emp_id`, `job_description`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_image`, `emp_gender`, `emp_marital_status`, `emp_citizenship`, `emp_citizen_by`, `emp_country`, `emp_birthdate`, `emp_place_of_birth`, `emp_religion`, `emp_blood_type`, `emp_height`, `emp_weight`, `emp_tin`, `emp_sss`, `emp_gsis`, `emp_pagibig`, `emp_philhealth`, `emp_agency_employee_no`, `emp_email`, `emp_p_add_house`, `emp_p_add_street`, `emp_p_add_subdivision`, `emp_p_add_barangay`, `emp_p_add_municipality`, `emp_p_add_city`, `emp_p_add_province`, `emp_p_add_zip`, `emp_r_add_house`, `emp_r_add_street`, `emp_r_add_subdivision`, `emp_r_add_barangay`, `emp_r_add_municipality`, `emp_r_add_city`, `emp_r_add_province`, `emp_r_add_zip`, `emp_telephone_no`, `emp_mobile_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3294, 2, 'Yves Kim', 'Casido', 'Cabanting', '1700280456_b08f4c18eee77a7ca103.jpg', 'Male', 'Married', 'Filipino', 'Single', '', '1990-08-27', 'Leon, Iloilo', 'dsf', '', 0, 0, 'sdfds', '', '', '', '', '6391704', 'yveskim.cabanting@iloilonhs.edu.ph', 'sdf', 'Earth Street', 'sdfds', '', '', 'Oton, Iloilo', 'Rehiyon ng Kanlurang Bisaya', '', 'dsf', '', '', '', '', '', '', '', '993455345', '344355345dsf', '2023-04-23 14:25:19', '2023-11-18 12:07:36', NULL),
(3311, 2, 'Johanna Thea ', 'Belandres', 'Lupo', '1700287659_740087022b6d88ff7d97.jpg', 'Female', 'Single', 'Filipino', 'Single', 'sdf', '', 'afsdfdsf', 'sdf', 'sdf', 34, 45, '342', '4656', '324', '4564545', '2354356', '54645', 'johannathea.lupo@iloilonhs.edu.ph', '34sdfsdfds', 'street', 'sybgbsdfs', 'b araragdfg', 'mdgfytdxva', 'cytawsfsdfg', 'usrasfas', '5463456', '43ertreter', 'ertwesg', 'dfgdfgdf', 'sdfgdsg', 'sfgfdh', 'fghgfddf', 'sdfdsfsd', '235253453', '34576575', '3452', '2023-07-10 11:32:05', '2023-11-18 14:14:59', NULL),
(3317, 2, 'Lory Gene', 'Altamira', 'Umadhay', '1703751514_35d6ea13120d962c564e.jpg', 'Female', 'Single', 'Filipino', '', '', '1977-01-12', '', '', '', 0, 0, '', '', '', '', '', '455687', 'lorygene.umadhay@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09338684476', '2023-07-19 13:46:10', '2023-12-28 16:18:34', NULL),
(3318, 2, 'Christine', 'Barlas', 'Marin', '1703751536_91e340dca2bc0ef26f64.jpg', 'Female', 'Married', 'Filipino', '', '', '1977-12-25', '', '', '', 0, 0, '', '', '', '', '', '345764', 'christine.marin@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09096828473', '2023-07-19 13:52:18', '2023-12-28 16:18:56', NULL),
(3319, 2, 'Joy', 'Montaño', 'Arenga', '1703751674_82fbcaf9d9b2f56aa6d5.jpg', 'Female', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '4345659', 'joy.arenga@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09474186141', '2023-07-21 17:47:47', '2023-12-28 16:21:14', NULL),
(3320, 2, 'Jo-An', 'Rosal', 'Pet', '1703752732_d004c48387f5737ef685.jpg', 'Female', 'Married', 'Filipino', '', '', '1981-02-27', '', '', 'O+', 0, 0, '', '', '', '', '', '664483', 'joan.pet@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-22 23:32:05', '2023-12-28 16:39:06', NULL),
(3321, 2, 'Jory Vince', 'Bargo', 'Bebing', '', 'Male', 'Single', 'Filipino', '', '', '1998-11-23', 'Pototan, Iloilo', '', 'B', 0, 0, '', '', '', '', '', '', 'joryvince.bebing@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 08:51:23', '2023-07-23 08:51:23', NULL),
(3322, 2, 'Bernadette ', 'Reymundo', 'Albiso', '1702614913_182806b41f54a5132dce.jpg', 'Female', 'Married', 'Filipino', '', '', '1989-04-16', 'Manila', 'Roman Catholic', 'B+', 0, 0, '', '', '', '', '', '639156', 'bernadette.albiso@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 08:53:24', '2023-12-15 13:48:00', NULL),
(3323, 2, 'Portia', 'Justalero', 'Estorque', '1703751687_05a02e6c8377856cf4d3.jpg', 'Female', 'Married', 'Filipino', '', '', '1975-07-14', 'Iloilo City', '', 'A', 0, 0, '', '', '', '', '', '', 'portia.estorque@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 09:56:06', '2023-12-28 16:21:27', NULL),
(3324, 2, 'JUDISAH MARIE', 'GARCENIEGO', 'CABIOS', '1703751932_eff1bd95e98c3a39bf1d.jpg', 'Female', '', 'Filipino', '', '', '1997-09-19', 'Metro Manila', '', 'AB', 0, 0, '', '', '', '', '', '', 'isahmariecabios@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 09:57:20', '2023-12-28 16:25:32', NULL),
(3325, 2, 'Irene Vee', 'Jaromahom', 'Carmona', '', 'Female', '', 'Filipino', '', '', '1995-01-04', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'irenevee.carmona@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 12:52:09', '2023-07-24 12:52:09', NULL),
(3326, 2, 'Catherine', 'Mercado', 'Jacobe', '', 'Female', '', 'Filipino', '', '', '1991-01-05', 'Leganes, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'catherine.jacobe@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:04:02', '2023-07-24 13:04:02', NULL),
(3327, 2, 'Mary Joy', 'Traifalgar', 'de los Santos', '', 'Female', '', 'Filipino', '', '', '1998-11-06', 'Guimbal, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'maryjoy.delossantos1106@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:06:17', '2023-07-24 13:06:17', NULL),
(3328, 2, 'Junenalyn Grace', 'Cerveza', 'Delfin', '', 'Female', '', 'Filipino', '', '', '1980-06-13', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'jgcerveza@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:11:47', '2023-07-24 13:11:47', NULL),
(3329, 2, 'Lorelee', 'Ganancial', 'Solis', '1703752043_f781d50f7f02bfee4a9c.jpg', 'Female', '', 'Filipino', '', '', '1976-05-30', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'loreleesolis123@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:15:17', '2023-12-28 16:27:23', NULL),
(3330, 2, 'Cynthia', 'Querubin', 'Pardorla', '', 'Female', 'Married', 'Filipino', '', '', '1985-10-24', '', '', '', 0, 0, '', '', '', '', '', '', 'cynthia.pardorla@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09983088390', '2023-07-24 13:40:34', '2023-07-24 13:40:34', NULL),
(3331, 2, 'AL JOHN', 'DE LA CERNA', 'ARTACHO', '', 'Male', 'Single', 'Filipino', '', 'Philippines', '1991-10-27', 'BACOLOD CITY', 'Roman Catholic', '', 0, 0, '', '', '', '', '', '123456', 'aljohnartacho@iloilonhs.edu.ph', '', '', '', 'Tentay', '', 'Iloilo City', 'Iloilo', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:28:05', '2023-11-22 10:21:53', NULL),
(3332, 2, 'NIKKIE', 'BERBEGAL', 'SOROPIA', '', 'Female', '', 'Filipino', '', '', '1989-09-10', 'CABATUAN, ILOILO', '', '', 0, 0, '', '', '', '', '', '', 'nikkie.soropia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:43:06', '2023-07-24 14:43:06', NULL),
(3333, 2, 'Roel ', 'Suaberon', 'Palmaira', '', 'Male', 'Married', 'Filipino', '', '', '1987-08-10', 'Iloilo City', 'Roman Catholic', 'A+', 0, 0, '', '', '', '', '', '', 'roel.palmaira@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:45:36', '2023-07-24 14:45:36', NULL),
(3334, 3, 'Marnel', 'G', 'Gonzales', '1690185575_24e11fe6b4e734161c11.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'marnel.gonzales@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 15:59:35', '2023-07-24 15:59:35', NULL),
(3335, 3, 'ALREY CHONE', '.', 'LAGMAN', '', 'Male', '', 'Filipino', '', '', '1987-07-01', '', '', '', 0, 0, '', '', '', '', '', '', 'alreychone@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 21:17:55', '2023-07-24 21:17:55', NULL),
(3336, 2, 'Neil', 'Camince', 'Bobis', '', 'Male', '', 'Filipino', '', '', '1983-07-26', 'Leon, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'neil.bobis@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-25 11:24:29', '2023-07-25 11:24:29', NULL),
(3359, 2, 'Mark Andrew', 'Pallado', 'Españo', '', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'markandrew.espano@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-26 08:32:28', '2023-07-26 08:32:28', NULL),
(3360, 2, 'Arnil', 'Cerbas', 'Palomar', '', 'Male', '', 'Filipino', '', '', '1984-02-22', '', '', '', 0, 0, '', '', '', '', '', '', 'arnil.palomar@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-26 09:50:05', '2023-07-26 09:50:05', NULL),
(3361, 2, 'Maria Aries', 'Aborde', 'Pastolero', '', 'Female', '', 'Filipino', '', '', '1972-04-18', '', '', '', 0, 0, '', '', '', '', '', '', 'mariaaries.pastolero@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09486895584', '2023-07-26 10:23:08', '2023-07-26 10:23:08', NULL),
(3362, 2, 'Jano', 'Sarcino', 'Tabor', '', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'jano.tabor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09190626402', '2023-07-26 10:48:31', '2023-07-26 10:48:31', NULL),
(3363, 2, 'Lino', 'Calugas', 'Sajonia', '', 'Male', '', 'Filipino', '', '', '1970-09-26', '', '', '', 0, 0, '', '', '', '', '', '', 'lino.sajonia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09615707071', '2023-07-26 10:49:15', '2023-07-26 10:49:15', NULL),
(3364, 2, 'Jose Gilbert', 'Parreñas', 'Aborde', '', 'Male', 'Married', 'Filipino', '', '', '1969-04-02', '', '', '', 0, 0, '', '', '', '', '', '', 'josegilbert.aborde@iloilonhd.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09062252961', '2023-07-26 11:46:28', '2023-07-26 11:46:28', NULL),
(3365, 2, 'Marites', 'Pico', 'Hisancha', '', 'Female', '', 'Filipino', '', '', '1981-09-11', '', '', '', 0, 0, '', '', '', '', '', '', 'marites.hisancha@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09154274577', '2023-07-26 14:38:07', '2023-07-26 14:38:07', NULL),
(3366, 2, 'Gemmalyn', 'Jayme', 'Medroso', '', 'Female', '', 'Filipino', '', '', '1965-06-13', '', '', '', 0, 0, '', '', '', '', '', '', 'gemmalyn.medroso@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09227743380', '2023-07-26 14:40:52', '2023-07-26 14:40:52', NULL),
(3367, 2, 'Abraham Edgar', 'Tacadao', 'Vargas', '', 'Male', '', 'Filipino', '', '', '1991-10-28', '', '', '', 0, 0, '', '', '', '', '', '', 'abrahamedgar.vargas@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09994295476', '2023-07-26 14:50:42', '2023-07-26 14:50:42', NULL),
(3368, 2, 'Daina Faith', 'Endoma', 'Naorbe', '', 'Female', '', 'Filipino', '', '', '1996-11-20', '', '', '', 0, 0, '', '', '', '', '', '', 'dainafaith.naorbe@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09108510142', '2023-07-26 15:37:24', '2023-07-26 15:37:24', NULL),
(3369, 2, 'Elisar Joy', 'Coronado', 'Jovacon', '', 'Female', 'Married', 'Filipino', '', '', '1984-12-22', 'Iloilo City', 'Roman Catholic', 'O', 0, 0, '', '', '', '', '', '', 'elisarjoy.jovacon@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09071667887', '2023-07-26 15:41:43', '2023-07-26 15:41:43', NULL),
(3370, 2, 'Katherine Grace', 'Calauod', 'Simora', '1703752128_572c101698123551bab5.jpg', 'Female', 'Married', 'Filipino', '', '', '1983-08-30', 'Iloilo City', 'Roman Catholic', 'B+', 154, 60, '', '', '', '', '', '', 'katherinegrace.simora@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '(033) 336-74-87', '0966-315-00-21', '2023-07-26 15:41:55', '2023-12-28 16:28:48', NULL),
(3371, 2, 'Emcy Clarens', 'Castillo', 'Amor', '1703752063_87a7f33af5bbe9db0615.jpg', 'Female', 'Single', 'Filipino', '', '', '1997-11-07', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'emcy.amor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09503058483', '2023-07-26 15:41:56', '2023-12-28 16:27:43', NULL),
(3372, 2, 'Cherry Joy', 'Bolivar', 'Castro', '', 'Female', 'Single', 'Filipino', '', '', '1996-02-11', 'Dingle Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'cherryjoy.castro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09287294066', '2023-07-26 15:44:50', '2023-07-28 13:17:53', NULL),
(3373, 2, 'MA. LEONORA', 'JACINTO', 'TINGATINGA', '', 'Female', 'Single', 'Filipino', '', '', '1974-05-15', '', '', '', 0, 0, '', '', '', '', '', '', 'maleonora.tingatinga@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 08:52:50', '2023-07-28 08:52:50', NULL),
(3374, 2, 'JONALYN', 'REGONDON', 'PAUCHANO', '', 'Female', '', 'Filipino', '', '', '1987-06-27', '', '', '', 0, 0, '', '', '', '', '', '', 'jonalyn.pauchano@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 08:54:20', '2023-07-28 08:54:20', NULL),
(3375, 2, 'GLENN DAVE', 'SUN', 'HORBINO', '', 'Male', 'Single', 'Filipino', '', '', '1994-11-14', '', '', '', 0, 0, '', '', '', '', '', '', 'glenndave.horbino@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 10:13:24', '2023-07-28 10:15:24', NULL),
(3376, 2, 'LOVELYN', 'FAVORITO', 'CASTRO', '', 'Female', '', 'Filipino', '', '', '1985-09-22', '', '', '', 0, 0, '', '', '', '', '', '', 'lovelyncastro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-01 08:04:31', '2023-08-01 08:04:31', NULL),
(3377, 2, 'Guilibeth', 'Minguez', 'Española', '1690943443_bfd701dcfe356e2a8d63.jpg', 'Female', 'Married', 'Filipino', '', '', '1976-04-28', 'Laua-an, Antique', 'Roman Catholic', 'A+', 0, 0, '', '', '', '', '', '6374577', 'guilibeth.espanola@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09505543238', '2023-08-02 10:30:43', '2023-08-02 10:30:43', NULL),
(3378, 2, 'Lailane', 'Torcino', 'Valdez', '1690943673_c7050f3c60f98cca7827.jpg', 'Female', 'Married', 'Filipino', '', '', '1995-02-12', '', '', '', 0, 0, '', '', '', '', '', '', 'lailane.valdez@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09289923836', '2023-08-02 10:34:33', '2023-08-02 10:34:33', NULL),
(3379, 2, 'Imy Joy', 'Valencia', 'Maprangala', '1690943856_546037f59e0a6be0a01d.jpg', 'Female', 'Single', 'Filipino', '', '', '1997-12-07', '', '', '', 0, 0, '', '', '', '', '', '', 'imyjoy.maprangala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09502036109', '2023-08-02 10:37:36', '2023-08-02 10:37:36', NULL),
(3380, 2, 'Grace', 'Cantero', 'Cabaya', '1690944181_4f28e69224b91729f7f0.jpg', 'Female', 'Single', 'Filipino', '', '', '1990-11-05', '', '', '', 0, 0, '', '', '', '', '', '', 'grace.cabaya@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09605985666', '2023-08-02 10:43:01', '2023-08-02 10:43:01', NULL),
(3381, 2, 'Melbourne Therese', 'Maniago', 'Araniador', '1690944384_308ccc4fefd33d85c7a4.jpg', 'Female', 'Single', 'Filipino', '', '', '1998-02-11', '', '', '', 0, 0, '', '', '', '', '', '', 'melbournetherese.araniador@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09916144013', '2023-08-02 10:46:24', '2023-08-02 10:46:24', NULL),
(3382, 2, 'Crezyl', 'Seat', 'Tagudando', '1703752238_44c8cd1efb1cc2233025.jpg', 'Female', 'Married', 'Filipino', '', '', '1999-02-05', '', '', '', 0, 0, '', '', '', '', '', '', 'crezyl.tagudando@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09388414932', '2023-08-02 10:48:54', '2023-12-28 16:30:38', NULL),
(3383, 2, 'Ma. Lennie', 'Caololan', 'Cabunagan', '1690944838_ece92a97db547f4e6250.jpg', 'Female', 'Single', 'Filipino', '', '', '1968-10-25', '', '', '', 0, 0, '', '', '', '', '', '', 'malennie.cabunagan@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09705138639', '2023-08-02 10:53:58', '2023-08-02 10:53:58', NULL),
(3384, 2, 'Rhanjit Kim Angelo', 'Bernal', 'Ferriol', '1690945029_164fabe0dc2ec4dc4f78.jpg', 'Male', 'Single', 'Filipino', '', '', '1997-12-14', '', '', '', 0, 0, '', '', '', '', '', '', 'rhanjitkimangelo.ferriol@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09605974508', '2023-08-02 10:57:09', '2023-08-02 10:57:09', NULL),
(3385, 2, 'Rolando', 'Salazar', 'Jose Jr.', '1690945474_d551032e6b41aa683cf0.jpg', 'Male', 'Single', 'Filipino', '', '', '1989-12-05', '', '', '', 0, 0, '', '', '', '', '', '', 'rolando.jose@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09702307512', '2023-08-02 11:04:34', '2023-08-02 11:04:34', NULL),
(3386, 2, 'Virgil', 'Delgado', 'Bajala', '1690945648_12baa3ae93c0c0efd128.jpg', 'Male', 'Single', 'Filipino', '', '', '1991-02-28', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'virgil.bajala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09707973211', '2023-08-02 11:07:28', '2023-08-02 11:07:28', NULL),
(3387, 2, 'Rona Grace', 'Araño', 'Paloma', '', 'Female', '', 'Filipino', '', '', '1996-08-25', '', '', '', 0, 0, '', '', '', '', '', '', 'ronagrace.paloma@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09098742799', '2023-08-03 13:46:08', '2023-08-03 13:46:08', NULL),
(3388, 2, 'Fritzie', 'Alla', 'Meterio', '', 'Female', 'Single', 'Filipino', '', '', '1989-12-19', '', '', '', 0, 0, '', '', '', '', '', '6374597', 'fritziemeterio@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09171281834', '2023-08-07 09:45:44', '2023-08-07 09:45:44', NULL),
(3389, 2, 'Amber', 'Aracena', 'Buyco', '', 'Female', 'Single', 'Filipino', '', '', '1990-12-14', '', '', '', 0, 0, '', '', '', '', '', '6374593', 'amber.buyco@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09120759938', '2023-08-07 09:48:54', '2023-08-07 09:48:54', NULL),
(3390, 2, 'Cristian', 'Maligaya', 'Franco', '', 'Male', 'Married', 'Filipino', '', '', '1979-05-08', '', '', '', 0, 0, '', '', '', '', '', '6374608', 'cristian.franco@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09159376723', '2023-08-07 09:57:08', '2023-08-07 09:57:08', NULL),
(3391, 2, 'Lea Joy', 'Alla', 'Meterio', '', 'Female', 'Single', 'Filipino', '', '', '1994-04-25', '', '', '', 0, 0, '', '', '', '', '', '6374641', 'leajoymeterio@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09177190740', '2023-08-07 10:30:35', '2023-08-07 10:30:35', NULL),
(3392, 2, 'IVY', 'FUNTANILLA', 'CORDERO', '', 'Female', 'Married', 'Filipino', '', '', '1982-11-09', '', '', '', 0, 0, '', '', '', '', '', '', 'ivy.cordero@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09420088501', '2023-08-07 19:27:57', '2023-08-07 19:27:57', NULL),
(3393, 2, 'DIARY', 'SARGADO', 'RODRIGUEZ', '', 'Female', 'Married', 'Filipino', '', '', '1971-04-06', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'diary.rodriguez@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09062772116', '2023-08-08 11:59:50', '2023-08-08 11:59:50', NULL),
(3394, 2, 'Kent Arman', 'S', 'Dema-ala', '1691479307_5ca9c4cda3141148524d.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'kentarman.demaala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09075120846', '2023-08-08 15:21:47', '2023-08-08 15:21:47', NULL),
(3395, 1, 'GAYMARIE', 'GRACIOSA', 'HINGPIT', '', 'Female', 'Single', 'Filipino', '', '', '1992-06-01', '', '', '', 0, 0, '', '', '', '', '', '', 'gaymarie.hingpit@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 00:07:38', '2023-08-10 00:07:38', NULL),
(3396, 2, 'ANGIE ROSE', 'TABIOLO', 'SUPREMO', '', 'Female', '', 'Filipino', '', '', '1985-10-10', '', '', '', 0, 0, '', '', '', '', '', '', 'angierose.supremo@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 09:07:58', '2023-08-10 09:07:58', NULL),
(3397, 2, 'NEIL JOHN', 'MOQUITE', 'JOQUIÑO', '', 'Male', '', 'Filipino', '', '', '1984-06-17', '', '', '', 0, 0, '', '', '', '', '', '', 'john.joquino@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 09:10:52', '2023-08-10 09:10:52', NULL),
(3398, 3, 'REMLE JOHN', 'GRONIFILLO', 'AGURO', '', 'Male', 'Single', 'Filipino', 'PHILIPPINES', 'PHILIPPINES', '1988-10-20', 'QUEZON METRO MANILA', 'SEVENTH DAY ADVENTIST', 'A+', 180, 78, '465734994', '', '', '', '', '', 'iab3cp4@gmail.com', '', '', '', 'ZONE 4 LOPEZ JAENA NORTE', 'LA PAZ', 'ILOILO', 'ILOILO', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 10:27:17', '2023-08-24 13:00:46', NULL),
(3399, 2, 'BERNADETTE', 'BEDIA', 'DUMAGUIT', '', 'Female', 'Married', 'Filipino', '', '', '1966-12-27', '', '', '', 0, 0, '150426897', '0712871239', '66122702066', '158000263128', '110250190476', '', 'bernadette.dumaguit@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:04:13', '2023-08-24 11:52:25', NULL),
(3400, 3, 'SUSETTE', 'ARACENA', 'BUYCO', '', 'Female', '', 'Filipino', '', '', '1963-07-08', '', '', '', 0, 0, '', '', '', '', '', '', 'susetteabuyco@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:07:51', '2023-08-24 11:07:51', NULL),
(3401, 2, 'NESTOR JR.', 'DAIZ', 'MORES', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'nestor.mores@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:50:21', '2023-08-24 11:50:21', NULL),
(3402, 2, 'LEIZL', 'CARMEN', 'LAYAM', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'leizl.layam@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:51:48', '2023-08-24 11:51:48', NULL),
(3403, 2, 'MA. SHARMAIN JANE', 'SUBIBE', 'MAGALLANES', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'masharmainjane.magallanes@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:54:00', '2023-08-24 11:54:00', NULL),
(3404, 2, 'MAENARD GRACE', 'LASAN', 'BILLENA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maenardgrace.lasan@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:57:34', '2023-08-24 11:57:34', NULL),
(3405, 2, 'REG TERENCE ', 'SICAN', 'GENTICA', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'regterence.gentica@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:04:46', '2023-08-24 12:04:46', NULL),
(3406, 2, 'MA. KATHERINE ', 'GALVE', 'PAYOPILIN', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'makatherine.payopilin@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:42:03', '2023-08-24 12:42:03', NULL),
(3407, 2, 'CYRIL', 'MONTALBAN', 'MOMBLAN', '1703752286_d63330b0a111861582b9.jpg', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'cyril.momblan@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:44:21', '2023-12-28 16:31:26', NULL),
(3408, 2, 'LORELEE', 'GANANCIAL', 'SOLIS', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'lorelee.solis@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:45:08', '2023-08-24 12:45:19', '2023-08-24 12:45:19'),
(3409, 2, 'ROSE ', 'ROSALDES', 'UMADHAY', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'rose.umadhay@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:46:29', '2023-08-24 12:46:29', NULL),
(3410, 2, 'RAYSAN JOY', 'N/A', 'LOPEZ', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'raysanjoy.lopez@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:48:01', '2023-08-24 12:48:01', NULL),
(3411, 2, 'HELENA', 'CAMPOSANO', 'CABANTING', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'helena.camposano@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:49:10', '2023-08-24 12:49:10', NULL),
(3412, 2, 'ROGER ', 'ANTONIO', 'ALAVATA', '', 'Male', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'roger.alavata@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:50:05', '2023-08-24 12:50:05', NULL),
(3413, 2, 'MAE SHANE', 'GONZALES', 'LAMANERO', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'lamaneroshane@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:51:12', '2023-08-24 12:51:12', NULL),
(3414, 2, 'JOHN MARTIN', 'PLONDAYA', 'CAPICIO', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'john.capicio@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:52:26', '2023-08-24 12:52:26', NULL),
(3415, 2, 'RUBY', 'DETORE', 'BLANDO', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'ruby.blando@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:53:14', '2023-08-24 12:53:14', NULL),
(3416, 2, 'ANGELIE', 'DADOR', 'MAMON', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'angelie.mamon@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:53:57', '2023-08-24 12:53:57', NULL),
(3417, 2, 'JOSIE MARIE', 'CUBIN', 'HUM', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'josiemariehum@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:54:58', '2023-08-24 12:54:58', NULL),
(3418, 2, 'MARY ANN', 'NAVANES', 'COLONIA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maryann.colonia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:55:49', '2023-09-18 15:38:15', NULL),
(3419, 2, 'MARILYN', 'PALOMADO', 'MIFUEL', '1703752257_129d7a35b3c356355c5e.jpg', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'marilyn.mifuel@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:56:32', '2023-12-28 16:30:57', NULL),
(3420, 2, 'JOCELYN', 'CABRERA', 'ASCURA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'jocelyn.ascura001@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:57:35', '2023-08-24 12:57:35', NULL),
(3421, 2, 'JULIO', 'JAMOLAGUE', 'VILLALON', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'julio.villalon001@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:06:02', '2023-08-24 13:06:02', NULL),
(3422, 2, 'GEMMA', 'HOJILLA', 'JOTEA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'gemma.jotea@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:07:01', '2023-08-24 13:07:01', NULL),
(3423, 2, 'MARY ANN', 'BAYLON', 'DIOCARES', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maryann.diocares@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:08:12', '2023-08-24 13:08:12', NULL),
(3424, 2, 'RENEE ROSE', 'BARRIDO', 'JARDELEZA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'renee.jardeleza@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:09:04', '2023-08-24 13:09:04', NULL),
(3425, 2, 'Joseph', 'Rosete', 'Gareza', '1694670814_2400d2a973f315002fb7.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'joseph.gareza@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09186969119', '2023-09-14 13:53:34', '2023-09-14 13:53:34', NULL),
(3426, 2, 'Arvin', 'Quinones', 'Malayas', '', 'Male', 'Single', 'Filipino', '', '', '1989-05-08', 'Alegria, Buruanga, Aklan', '', '', 0, 0, '', '', '', '', '', '', 'arvin.malayas@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09187519970', '2023-09-15 10:57:13', '2023-09-15 10:57:13', NULL),
(3430, 1, 'Gladys', 'Bereber', 'Harder', '1695094512_bdcebd69e4da64205f9a.jpg', 'Female', '', 'Filipino', '', '', '1965-10-26', '', '', '', 0, 0, '', '', '', '', '', '', 'gladys.harder@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-09-19 11:35:12', '2023-09-19 11:35:12', NULL),
(3431, 2, 'yzabella kim', 'cqmposano', 'cabanting', '1695186246_7ec639b1bfb2240f285e.jpg', 'Female', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'yzabella@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-09-20 13:04:06', '2023-09-20 13:04:21', '2023-09-20 13:04:21'),
(3432, 1, 'George', 'Washington', 'Bush', '', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0923433', 'george@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '098787345534', '2023-11-18 20:43:51', '2023-11-18 20:43:51', NULL),
(3433, 1, 'Arnold', 'poopopo', 'Swarzengeiwsad', '', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0945663', 'arnold@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '083984542332', '2023-11-18 20:51:20', '2023-11-18 20:51:20', NULL),
(3434, 1, 'Yzabella Kim', 'Camposano', 'Cabanting', '', 'Female', NULL, NULL, NULL, NULL, '2019-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0998734', 'yza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '09987345532', '2023-11-18 20:54:37', '2023-11-18 20:54:37', NULL),
(3435, 1, 'Cliven', 'Lozada', 'Martizano', '', 'Male', NULL, NULL, NULL, NULL, '1993-10-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '099835', 'cliven.martizano@deped.gov.ph', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '09443574324543', '2023-11-19 14:49:31', '2023-11-19 14:49:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_position_tbl`
--

CREATE TABLE `employment_position_tbl` (
  `emp_pos_id` int(11) NOT NULL,
  `pos_title` varchar(60) NOT NULL,
  `category` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_position_tbl`
--

INSERT INTO `employment_position_tbl` (`emp_pos_id`, `pos_title`, `category`) VALUES
(1, 'Teacher I', 'Teaching'),
(2, 'Teacher II', 'Teaching'),
(3, 'Teacher III', 'Teaching'),
(4, 'Head Teacher I', 'Administrative'),
(7, 'Heade Teacher IV', 'Administrative'),
(8, 'Heade Teacher V', 'Administrative'),
(9, 'Master Teacher I', 'Teaching'),
(10, 'Master Teacher II', 'Teaching'),
(11, 'Master Teacher III', 'Teaching'),
(12, 'Principal I', 'Administrative'),
(13, 'Principal II', 'Administrative'),
(14, 'Principal III', 'Administrative'),
(15, 'Principal IV', 'Administrative'),
(16, 'Teacher IV', 'Teaching'),
(17, 'Teacher V', 'Teaching'),
(18, 'Teacher VI', 'Teaching'),
(19, 'Teacher VII', 'Teaching'),
(20, 'Head Teacher II', 'Administrative'),
(21, 'Head Teacher III', 'Administrative'),
(22, 'Admin Assistant I', 'Administrative');

-- --------------------------------------------------------

--
-- Table structure for table `emp_others_t`
--

CREATE TABLE `emp_others_t` (
  `others_id` int(11) NOT NULL,
  `others_emp_id` int(11) NOT NULL,
  `consanguinity_3rd_degree` tinyint(1) DEFAULT NULL,
  `consanguinity_3rd_degree_details` varchar(200) DEFAULT NULL,
  `consanguinity_4th_degree` tinyint(1) DEFAULT NULL,
  `consanguinity_4th_degree_details` varchar(200) DEFAULT NULL,
  `admin_offence` tinyint(1) DEFAULT NULL,
  `admin_offence_details` varchar(200) DEFAULT NULL,
  `criminal_charge` tinyint(1) DEFAULT NULL,
  `criminal_charge_date` varchar(50) DEFAULT NULL,
  `criminal_charge_details` varchar(200) DEFAULT NULL,
  `is_convicted` tinyint(1) DEFAULT NULL,
  `convicted_details` varchar(200) DEFAULT NULL,
  `seperated_from_service` tinyint(1) DEFAULT NULL,
  `seperated_from_service_details` varchar(200) DEFAULT NULL,
  `election_candidate` tinyint(1) DEFAULT NULL,
  `election_candidate_details` varchar(200) DEFAULT NULL,
  `resigned_3months_period` tinyint(1) DEFAULT NULL,
  `resigned_3months_period_details` varchar(200) DEFAULT NULL,
  `immigrant_status` tinyint(1) DEFAULT NULL,
  `immigrant_status_details` varchar(200) DEFAULT NULL,
  `is_ip` tinyint(1) DEFAULT NULL,
  `is_ip_details` varchar(100) DEFAULT NULL,
  `is_pwd` tinyint(1) DEFAULT NULL,
  `is_pwd_details` varchar(100) DEFAULT NULL,
  `is_solo_parent` tinyint(1) DEFAULT NULL,
  `solo_parent_details` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_others_t`
--

INSERT INTO `emp_others_t` (`others_id`, `others_emp_id`, `consanguinity_3rd_degree`, `consanguinity_3rd_degree_details`, `consanguinity_4th_degree`, `consanguinity_4th_degree_details`, `admin_offence`, `admin_offence_details`, `criminal_charge`, `criminal_charge_date`, `criminal_charge_details`, `is_convicted`, `convicted_details`, `seperated_from_service`, `seperated_from_service_details`, `election_candidate`, `election_candidate_details`, `resigned_3months_period`, `resigned_3months_period_details`, `immigrant_status`, `immigrant_status_details`, `is_ip`, `is_ip_details`, `is_pwd`, `is_pwd_details`, `is_solo_parent`, `solo_parent_details`) VALUES
(17, 3311, 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, ''),
(18, 3322, 1, 'dafds', 1, 'fsdfsd', 1, 'dfsdfds', 1, 'dsfsd', 'dsfsd', 1, 'sdfdsfds', 1, 'dsfdsf', 1, 'dsfsd', 1, 'dsfdsf', 1, 'sdfds', 1, 'dsfds', 1, 'dsfdsfsd', 1, 'dsasfdsfsd'),
(19, 3294, 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_reference_tbl`
--

CREATE TABLE `emp_reference_tbl` (
  `ref_id` smallint(6) NOT NULL,
  `ref_emp_id` int(11) NOT NULL,
  `ref_name` varchar(60) NOT NULL,
  `ref_address` varchar(150) NOT NULL,
  `ref_contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_reference_tbl`
--

INSERT INTO `emp_reference_tbl` (`ref_id`, `ref_emp_id`, `ref_name`, `ref_address`, `ref_contact`) VALUES
(7, 3311, 'reference 12', 'reference address ', 'reference contact');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_work_experience_t`
--

INSERT INTO `emp_work_experience_t` (`work_exp_id`, `work_exp_emp_id`, `work_exp_date_from`, `work_exp_date_to`, `work_exp_position`, `work_exp_company`, `work_exp_monthly_sal`, `work_exp_salary_grade`, `work_exp_appointment_status`, `work_exp_gov_service`) VALUES
(19, 3294, '0000-00-00', '0000-00-00', 'sdsdf', 'sdfsdfds', '', '', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `family_bg_t`
--

INSERT INTO `family_bg_t` (`fam_id`, `emp_id`, `spouse_first_name`, `spouse_middle_name`, `spouse_surname`, `spouse_occupation`, `spouse_employer_business`, `spouse_business_address`, `spouse_telephone`, `father_surname`, `father_middlename`, `father_firstname`, `mother_surname`, `mother_firstname`, `mother_middlename`) VALUES
(19, 3311, 'dsf', '', 'dsfds22222', 'sdfdsfds', '', '', '', '', '', '', '', '', ''),
(20, 3294, '', '', 'sdfsd', '', '', '', '', 'sdfds', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_year_tbl`
--

CREATE TABLE `fiscal_year_tbl` (
  `year_id` int(11) NOT NULL,
  `fiscal_year` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fiscal_year_tbl`
--

INSERT INTO `fiscal_year_tbl` (`year_id`, `fiscal_year`, `is_active`) VALUES
(1, '2023-2024', 1),
(2, '2024-2025', 0),
(3, '2025-2026', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `learning_development_t`
--

INSERT INTO `learning_development_t` (`ld_id`, `ld_emp_id`, `ld_training_program`, `ld_date_from`, `ld_date_to`, `ld_total_hours`, `ld_type`, `ld_conducted_by`) VALUES
(3, 3322, 'sdfsd', '0000-00-00', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nbc_tbl`
--

CREATE TABLE `nbc_tbl` (
  `nbc_id` int(11) NOT NULL,
  `nbc_no` varchar(60) NOT NULL,
  `nbc_title` varchar(120) NOT NULL,
  `tranche` int(11) NOT NULL,
  `effectivity_date` date NOT NULL,
  `processed_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nbc_tbl`
--

INSERT INTO `nbc_tbl` (`nbc_id`, `nbc_no`, `nbc_title`, `tranche`, `effectivity_date`, `processed_by`, `created_at`, `updated_at`) VALUES
(22, '591', 'SSL Fourth Tranche', 4, '2023-01-01', 2, '2023-11-24', '2023-11-24'),
(26, '579', 'SSL First Tranche', 1, '2020-01-01', 2, '2023-11-24', '2023-11-24');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plantilla_tbl`
--

CREATE TABLE `plantilla_tbl` (
  `plantilla_id` smallint(6) NOT NULL,
  `plantilla_item_no` varchar(150) NOT NULL,
  `position_title` varchar(120) NOT NULL,
  `salary_grade` int(11) NOT NULL,
  `date_recieved` date DEFAULT NULL,
  `is_assigned` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `plantilla_tbl`
--

INSERT INTO `plantilla_tbl` (`plantilla_id`, `plantilla_item_no`, `position_title`, `salary_grade`, `date_recieved`, `is_assigned`, `created_by`, `created_at`, `updated_at`) VALUES
(16, '234545432', 'Teacher III', 13, '2023-11-01', 0, 2, '2023-11-28 12:16:03', '2023-12-29 11:07:09'),
(18, '544543456', 'Teacher II', 12, '2023-12-01', 0, 2, '2023-12-05 10:24:22', '2023-12-29 10:58:12'),
(19, '3434543543', 'Teacher I', 11, '2023-12-01', 0, 2, '2023-12-08 12:20:36', '2023-12-29 10:57:27'),
(20, '436653', 'Master Teacher I', 18, '2023-12-01', 0, 2, '2023-12-12 10:50:58', '2023-12-29 09:35:49'),
(21, '3424234', 'Master Teacher II', 19, '2023-12-01', 0, 2, '2023-12-12 13:39:07', '2023-12-29 09:33:48'),
(22, '423423432', 'Teacher I', 11, '2023-12-01', 0, 2, '2023-12-14 09:32:59', '2023-12-29 10:46:34'),
(23, '4344445433', 'Teacher II', 12, '2023-12-15', 0, 2, '2023-12-14 15:34:22', '2023-12-28 16:48:29'),
(24, '677578998', 'Teacher I', 11, '2023-12-01', 0, 2, '2023-12-15 13:40:18', '2023-12-29 09:37:56'),
(25, '43253465466', 'Admin Assistant I', 9, '2024-01-01', 0, 2, '2023-12-29 10:29:47', '2023-12-29 10:29:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_head_tbl`
--

INSERT INTO `program_head_tbl` (`ph_id`, `p_id`, `ph_emp_id`, `memo_no`, `sy_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 17, 3361, '', 1, '2023-07-26 10:25:43', '2023-07-26 10:25:43', NULL),
(27, 15, 3362, '', 1, '2023-07-28 20:27:58', '2023-07-28 20:27:58', NULL),
(28, 24, 3375, '', 1, '2023-09-18 10:46:57', '2023-09-18 10:46:57', NULL),
(29, 16, 3426, '', 1, '2023-09-18 10:47:13', '2023-09-18 10:47:13', NULL),
(30, 21, 3393, '', 1, '2023-09-18 10:47:46', '2023-09-18 10:47:46', NULL),
(31, 19, 3364, '', 1, '2023-09-18 10:47:59', '2023-09-18 10:47:59', NULL),
(32, 20, 3319, '', 1, '2023-09-18 10:48:16', '2023-09-18 10:48:16', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `program_tbl`
--

INSERT INTO `program_tbl` (`prog_id`, `program_title`, `description`, `program_logo`, `cat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'STVEP', 'Strengthened Technical-Vocational Education Program', '1688441695_01f73d1f025297f16d63.png', 1, '2023-07-04 11:34:55', '2023-07-04 11:34:55', NULL),
(16, 'ALS', 'Alternative Learning System', '1688610988_f04479d79b1e0846b70f.png', 1, '2023-07-06 10:36:28', '2023-07-06 10:36:28', NULL),
(17, 'SPSTE', 'Special Program for Science Technology and Engineering', '1692013369_0f72c97f429b41f162de.png', 1, '2023-07-07 11:00:55', '2023-08-14 19:42:49', NULL),
(18, 'SPBE', 'Special Program for Business and Entrepreneurship', '1690418456_3e60928547a810036cc8.jpg', 1, '2023-07-07 11:01:40', '2023-07-27 08:40:56', NULL),
(19, 'EOC', 'Evening Opportunity Class', '1688698920_ad4af5cdc6e375d3cfe2.png', 1, '2023-07-07 11:02:00', '2023-07-07 11:02:00', NULL),
(20, 'PSSN', 'Program for Student with Special Needs', '1689575975_896b6c152195d776ac35.jpg', 1, '2023-07-17 14:39:35', '2023-07-17 14:39:35', NULL),
(21, 'SA', 'School for the Arts', '1689576022_9440c5710bdbcf681332.png', 1, '2023-07-17 14:40:22', '2023-07-17 14:40:22', NULL),
(22, 'SPJ', 'Special Program for Journalism', '1689576070_05bf17162f60c7b2c424.png', 1, '2023-07-17 14:41:10', '2023-07-17 14:41:10', NULL),
(23, 'SPS', 'Special Program for Sports', '1689576090_8ae562269d2e64b583e6.png', 1, '2023-07-17 14:41:30', '2023-07-17 14:41:30', NULL),
(24, 'OHSP', 'Open High School Program', '1689576155_212c0f6d1da04e696367.png', 1, '2023-07-17 14:42:35', '2023-07-17 14:42:35', NULL),
(25, 'Regular', 'Regular Class', '1689576185_ebe61fe2db948a681bda.png', 1, '2023-07-17 14:43:05', '2023-07-17 14:43:05', NULL),
(26, 'SPFL-K', 'Special Program in Foreign Language - Korean', '1690419719_056bb7d15a1132e91eb0.png', 1, '2023-07-27 08:40:24', '2023-07-27 09:01:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_schedule_tbl`
--

CREATE TABLE `salary_schedule_tbl` (
  `sal_sched_id` bigint(20) NOT NULL,
  `nbc_id` int(11) NOT NULL,
  `salary_grade` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_schedule_tbl`
--

INSERT INTO `salary_schedule_tbl` (`sal_sched_id`, `nbc_id`, `salary_grade`, `step`, `amount`) VALUES
(49, 22, 4, 8, '16443.00'),
(50, 26, 1, 1, '8000.00'),
(51, 26, 1, 2, '8300.00'),
(52, 22, 18, 1, '45000.00'),
(53, 22, 18, 2, '45500.00'),
(54, 22, 19, 1, '51000.00'),
(55, 22, 19, 2, '51500.00'),
(56, 22, 14, 1, '30500.00'),
(57, 22, 11, 1, '22000.00'),
(58, 22, 11, 2, '22400.00'),
(59, 22, 11, 3, '22600.00'),
(62, 22, 12, 3, '26600.00'),
(63, 22, 13, 1, '28000.00'),
(64, 22, 13, 2, '28400.00'),
(65, 26, 11, 1, '25000.00'),
(66, 26, 12, 1, '26000.00'),
(67, 26, 12, 2, '27000.00'),
(68, 22, 12, 1, '26400.00'),
(69, 22, 12, 2, '26500.00'),
(70, 26, 11, 2, '25600.00');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `sem_id` smallint(6) NOT NULL,
  `sem_title` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester_tbl`
--

INSERT INTO `semester_tbl` (`sem_id`, `sem_title`, `is_active`) VALUES
(1, '1st Semester', 1),
(2, '2nd Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_record_tbl`
--

CREATE TABLE `service_record_tbl` (
  `sr_id` bigint(20) NOT NULL,
  `sr_emp_id` int(11) NOT NULL,
  `sr_nbc_id` int(11) NOT NULL,
  `sr_plantilla_id` smallint(6) NOT NULL,
  `sr_step` int(11) NOT NULL,
  `sr_status` varchar(60) NOT NULL,
  `sr_station_id` int(20) NOT NULL,
  `sr_is_seperated` tinyint(1) NOT NULL,
  `sr_seperation_date` date DEFAULT NULL,
  `sr_seperation_cause` varchar(150) DEFAULT NULL,
  `loa_wo_pay_date_from` date DEFAULT NULL,
  `loa_wo_pay_date_to` date DEFAULT NULL,
  `total_deductions` decimal(8,2) DEFAULT NULL,
  `sr_date_started` date NOT NULL,
  `sr_date_end` date DEFAULT NULL,
  `sr_remarks` varchar(120) NOT NULL,
  `sr_processed_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_record_tbl`
--

INSERT INTO `service_record_tbl` (`sr_id`, `sr_emp_id`, `sr_nbc_id`, `sr_plantilla_id`, `sr_step`, `sr_status`, `sr_station_id`, `sr_is_seperated`, `sr_seperation_date`, `sr_seperation_cause`, `loa_wo_pay_date_from`, `loa_wo_pay_date_to`, `total_deductions`, `sr_date_started`, `sr_date_end`, `sr_remarks`, `sr_processed_by`, `is_active`, `created_at`, `updated_at`) VALUES
(97, 3294, 22, 19, 1, 'permanent', 3, 0, NULL, NULL, NULL, NULL, NULL, '2019-01-01', '2022-01-01', 'asda', 2, 0, '2023-12-29', '2023-12-29'),
(98, 3294, 22, 18, 1, 'permanent', 3, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-01', '2022-01-01', 'promoted', 2, 0, '2023-12-29', '2023-12-29'),
(99, 3294, 22, 18, 2, 'permanent', 3, 0, NULL, NULL, NULL, NULL, NULL, '2022-01-01', '0000-00-00', 'step increment', 2, 0, '2023-12-29', '2023-12-29'),
(100, 3294, 22, 16, 1, 'permanent', 3, 0, NULL, NULL, NULL, NULL, NULL, '2023-01-01', '2024-01-01', 'promoted', 2, 0, '2023-12-29', '2023-12-29'),
(101, 3294, 22, 16, 2, 'permanent', 3, 0, NULL, NULL, NULL, NULL, NULL, '2024-01-01', '2024-12-30', 'step increment', 2, 0, '2023-12-29', '2023-12-29'),
(102, 3294, 22, 16, 2, 'permanent', 3, 1, '2025-01-01', 'retirement', NULL, NULL, NULL, '2025-01-01', '2025-01-01', 'Retirement', 2, 1, '2023-12-29', '2023-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `station_tbl`
--

CREATE TABLE `station_tbl` (
  `station_id` int(11) NOT NULL,
  `st_title` varchar(120) NOT NULL,
  `st_office_id` varchar(60) NOT NULL,
  `st_office_address` varchar(160) NOT NULL,
  `st_branch` varchar(150) NOT NULL,
  `st_created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_tbl`
--

INSERT INTO `station_tbl` (`station_id`, `st_title`, `st_office_id`, `st_office_address`, `st_branch`, `st_created_by`, `created_at`, `updated_at`) VALUES
(3, 'TVC. Sta. Teresa National High School', '302438', 'Jordan, Guimaras', 'National', 2, '2023-11-19', '2023-11-19'),
(5, 'SDO', '131', 'Jordan, Guimaras', 'National', 2, '2023-11-21', '2023-11-21'),
(7, 'Sibunag National High School', '099232', 'Sibunag, Guimaras', 'National', 2, '2023-11-21', '2023-11-21'),
(8, 'Iloilo National High School', '302509', 'Luna St., La Paz, Iloilo City', 'National', 2, '2023-12-15', '2023-12-15');

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
  `is_disabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_email`, `user_password`, `user_type`, `user_restriction`, `is_disabled`) VALUES
(2, 3294, 'yveskim.cabanting@iloilonhs.edu.ph', '$2y$10$Fkep9Q2qTj8oE8NMqk2ncupQvSS8ZtBjbimZXXXrjRqxfF2vxraau', 'Admin', '1', 0),
(3, 3311, 'johannathea.lupo@iloilonhs.edu.ph', '$2y$10$OATlrqHmmJe7ktdZgi8rjOp6r/vuMduk2RDD9OZBMtwPq47u3vUn2', 'Admin', '3', 0),
(4, 3435, 'cliven.martizano@deped.gov.ph', '$2y$10$UpOO3oeMsZTWDztwhqT40uTqD9fWX12YEFStaxk1UKNW5DPctKYam', 'Admin', '1', 0),
(5, 3322, 'bernadette.albiso@gmail.com', '$2y$10$0jLhFPFNguepJ7KIBBYXUuNsOkpVDD.KsEYtO2TyLwrOlTDQdfz3e', 'Admin', '3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_tbl`
--
ALTER TABLE `calendar_tbl`
  ADD PRIMARY KEY (`cal_id`);

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
-- Indexes for table `employee_skills_tbl`
--
ALTER TABLE `employee_skills_tbl`
  ADD PRIMARY KEY (`skills_id`),
  ADD KEY `skills_emp_id` (`skills_emp_id`);

--
-- Indexes for table `employee_t`
--
ALTER TABLE `employee_t`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employment_position_tbl`
--
ALTER TABLE `employment_position_tbl`
  ADD PRIMARY KEY (`emp_pos_id`);

--
-- Indexes for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD PRIMARY KEY (`others_id`),
  ADD KEY `others_emp_id` (`others_emp_id`);

--
-- Indexes for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `ref_emp_id` (`ref_emp_id`);

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
-- Indexes for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  ADD PRIMARY KEY (`fam_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `fiscal_year_tbl`
--
ALTER TABLE `fiscal_year_tbl`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  ADD PRIMARY KEY (`ld_id`),
  ADD KEY `ld_emp_id` (`ld_emp_id`);

--
-- Indexes for table `nbc_tbl`
--
ALTER TABLE `nbc_tbl`
  ADD PRIMARY KEY (`nbc_id`),
  ADD KEY `processed_by` (`processed_by`);

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
  ADD PRIMARY KEY (`plantilla_id`),
  ADD UNIQUE KEY `plantilla_item_no` (`plantilla_item_no`),
  ADD KEY `created_by` (`created_by`);

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
-- Indexes for table `salary_schedule_tbl`
--
ALTER TABLE `salary_schedule_tbl`
  ADD PRIMARY KEY (`sal_sched_id`),
  ADD KEY `nbc_id` (`nbc_id`);

--
-- Indexes for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `service_record_tbl`
--
ALTER TABLE `service_record_tbl`
  ADD PRIMARY KEY (`sr_id`),
  ADD KEY `sr_emp_id` (`sr_emp_id`),
  ADD KEY `sr_nbc_id` (`sr_nbc_id`),
  ADD KEY `sr_plantilla_id` (`sr_plantilla_id`),
  ADD KEY `sr_status_id` (`sr_status`),
  ADD KEY `sr_processed_by` (`sr_processed_by`),
  ADD KEY `sr_emp_station_id` (`sr_station_id`);

--
-- Indexes for table `station_tbl`
--
ALTER TABLE `station_tbl`
  ADD PRIMARY KEY (`station_id`),
  ADD KEY `st_created_by` (`st_created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_tbl`
--
ALTER TABLE `calendar_tbl`
  MODIFY `cal_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `educ_bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  MODIFY `elig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_category_tbl`
--
ALTER TABLE `employee_category_tbl`
  MODIFY `emp_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  MODIFY `emp_dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  MODIFY `emp_prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee_skills_tbl`
--
ALTER TABLE `employee_skills_tbl`
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_t`
--
ALTER TABLE `employee_t`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3436;

--
-- AUTO_INCREMENT for table `employment_position_tbl`
--
ALTER TABLE `employment_position_tbl`
  MODIFY `emp_pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  MODIFY `others_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  MODIFY `ref_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_work_experience_t`
--
ALTER TABLE `emp_work_experience_t`
  MODIFY `work_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `emp_work_involvement_t`
--
ALTER TABLE `emp_work_involvement_t`
  MODIFY `work_inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nbc_tbl`
--
ALTER TABLE `nbc_tbl`
  MODIFY `nbc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `plantilla_tbl`
--
ALTER TABLE `plantilla_tbl`
  MODIFY `plantilla_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `program_head_tbl`
--
ALTER TABLE `program_head_tbl`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `prog_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `salary_schedule_tbl`
--
ALTER TABLE `salary_schedule_tbl`
  MODIFY `sal_sched_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `service_record_tbl`
--
ALTER TABLE `service_record_tbl`
  MODIFY `sr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `station_tbl`
--
ALTER TABLE `station_tbl`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `employee_category_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_children_t`
--
ALTER TABLE `employee_children_t`
  ADD CONSTRAINT `employee_children_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_department_tbl`
--
ALTER TABLE `employee_department_tbl`
  ADD CONSTRAINT `employee_department_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_program_tbl`
--
ALTER TABLE `employee_program_tbl`
  ADD CONSTRAINT `employee_program_tbl_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_skills_tbl`
--
ALTER TABLE `employee_skills_tbl`
  ADD CONSTRAINT `employee_skills_tbl_ibfk_1` FOREIGN KEY (`skills_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD CONSTRAINT `emp_others_t_ibfk_1` FOREIGN KEY (`others_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  ADD CONSTRAINT `emp_reference_tbl_ibfk_1` FOREIGN KEY (`ref_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  ADD CONSTRAINT `family_bg_t_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nbc_tbl`
--
ALTER TABLE `nbc_tbl`
  ADD CONSTRAINT `nbc_tbl_ibfk_1` FOREIGN KEY (`processed_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plantilla_tbl`
--
ALTER TABLE `plantilla_tbl`
  ADD CONSTRAINT `plantilla_tbl_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_schedule_tbl`
--
ALTER TABLE `salary_schedule_tbl`
  ADD CONSTRAINT `salary_schedule_tbl_ibfk_1` FOREIGN KEY (`nbc_id`) REFERENCES `nbc_tbl` (`nbc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_record_tbl`
--
ALTER TABLE `service_record_tbl`
  ADD CONSTRAINT `service_record_tbl_ibfk_1` FOREIGN KEY (`sr_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_record_tbl_ibfk_2` FOREIGN KEY (`sr_plantilla_id`) REFERENCES `plantilla_tbl` (`plantilla_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_record_tbl_ibfk_3` FOREIGN KEY (`sr_nbc_id`) REFERENCES `nbc_tbl` (`nbc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_record_tbl_ibfk_4` FOREIGN KEY (`sr_processed_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_record_tbl_ibfk_5` FOREIGN KEY (`sr_station_id`) REFERENCES `station_tbl` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
