-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 07:38 AM
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
(14, 3398, 'CSC SUBPROFESSIONAL', '83.127', '2023-03-26', 'ISAT - U', '', '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employee_t`
--

INSERT INTO `employee_t` (`emp_id`, `job_description`, `emp_school_id`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_image`, `emp_gender`, `emp_marital_status`, `emp_citizenship`, `emp_citizen_by`, `emp_country`, `emp_birthdate`, `emp_place_of_birth`, `emp_religion`, `emp_blood_type`, `emp_height`, `emp_weight`, `emp_tin`, `emp_sss`, `emp_gsis`, `emp_pagibig`, `emp_philhealth`, `emp_agency_employee_no`, `emp_email`, `emp_p_add_house`, `emp_p_add_street`, `emp_p_add_subdivision`, `emp_p_add_barangay`, `emp_p_add_municipality`, `emp_p_add_city`, `emp_p_add_province`, `emp_p_add_zip`, `emp_r_add_house`, `emp_r_add_street`, `emp_r_add_subdivision`, `emp_r_add_barangay`, `emp_r_add_municipality`, `emp_r_add_city`, `emp_r_add_province`, `emp_r_add_zip`, `emp_telephone_no`, `emp_mobile_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3294, 2, '032911', 'Yves Kim', 'Casido', 'Cabanting', '1699951757_cf949727ab7f5c97f5e2.jpg', 'Male', 'Married', 'Filipino', 'Single', '', '1990-08-27', 'Leon, Iloilo', 'dsf', '', 0, 0, 'sdfds', '', '', '', '', '', 'yveskim.cabanting@iloilonhs.edu.ph', 'sdf', 'Earth Street', 'sdfds', '', '', 'Oton, Iloilo', 'Rehiyon ng Kanlurang Bisaya', '', 'dsf', '', '', '', '', '', '', '', '993455345', '344355345dsf', '2023-04-23 14:25:19', '2023-11-14 16:49:17', NULL),
(3311, 2, '03163', 'Johanna Thea', 'Belandres', 'Lupo', '1699951740_e46646667cd7cccf6d9c.jpg', 'Female', 'Single', 'Filipino', 'Single', 'sdf', '', 'afsdfdsf', 'sdf', 'sdf', 34, 45, '342', '4656', '324', '4564545', '2354356', '54645', 'johannathea.lupo@iloilonhs.edu.ph', '34sdfsdfds', 'street', 'sybgbsdfs', 'b araragdfg', 'mdgfytdxva', 'cytawsfsdfg', 'usrasfas', '5463456', '43ertreter', 'ertwesg', 'dfgdfgdf', 'sdfgdsg', 'sfgfdh', 'fghgfddf', 'sdfdsfsd', '235253453', '34576575', '3452', '2023-07-10 11:32:05', '2023-11-14 16:49:00', NULL),
(3317, 2, '03060', 'Lory Gene', 'Altamira', 'Umadhay', '', 'Female', 'Single', 'Filipino', '', '', '1977-01-12', '', '', '', 0, 0, '', '', '', '', '', '', 'lorygene.umadhay@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09338684476', '2023-07-19 13:46:10', '2023-07-19 13:46:10', NULL),
(3318, 2, '03132', 'Christine', 'Barlas', 'Marin', '', 'Female', 'Married', 'Filipino', '', '', '1977-12-25', '', '', '', 0, 0, '', '', '', '', '', '', 'christine.marin@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09096828473', '2023-07-19 13:52:18', '2023-07-19 13:52:18', NULL),
(3319, 2, '00264', 'Joy', 'Montaño', 'Arenga', '', 'Female', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'joy.arenga@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09474186141', '2023-07-21 17:47:47', '2023-07-22 19:18:56', NULL),
(3320, 2, '03184', 'Jo-An', 'Rosal', 'Pet', '', 'Female', 'Married', 'Filipino', '', '', '1981-02-27', '', '', 'O+', 0, 0, '', '', '', '', '', '', 'joan.pet@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-22 23:32:05', '2023-08-29 11:14:07', NULL),
(3321, 2, '03272', 'Jory Vince', 'Bargo', 'Bebing', '', 'Male', 'Single', 'Filipino', '', '', '1998-11-23', 'Pototan, Iloilo', '', 'B', 0, 0, '', '', '', '', '', '', 'joryvince.bebing@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 08:51:23', '2023-07-23 08:51:23', NULL),
(3322, 2, '03174', 'Bernadette ', 'Reymundo', 'Albiso', '', 'Female', 'Married', 'Filipino', '', '', '1989-04-16', 'Manila', 'Roman Catholic', 'B+', 0, 0, '', '', '', '', '', '', 'bernadette.albiso@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 08:53:24', '2023-11-08 11:28:56', NULL),
(3323, 2, '00237', 'Portia', 'Justalero', 'Estorque', '', 'Female', 'Married', 'Filipino', '', '', '1975-07-14', 'Iloilo City', '', 'A', 0, 0, '', '', '', '', '', '', 'portia.estorque@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 09:56:06', '2023-07-23 09:56:06', NULL),
(3324, 2, '4003', 'JUDISAH MARIE', 'GARCENIEGO', 'CABIOS', '', 'Female', '', 'Filipino', '', '', '1997-09-19', 'Metro Manila', '', 'AB', 0, 0, '', '', '', '', '', '', 'isahmariecabios@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-23 09:57:20', '2023-07-23 09:57:20', NULL),
(3325, 2, '03171', 'Irene Vee', 'Jaromahom', 'Carmona', '', 'Female', '', 'Filipino', '', '', '1995-01-04', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'irenevee.carmona@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 12:52:09', '2023-07-24 12:52:09', NULL),
(3326, 2, '03353', 'Catherine', 'Mercado', 'Jacobe', '', 'Female', '', 'Filipino', '', '', '1991-01-05', 'Leganes, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'catherine.jacobe@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:04:02', '2023-07-24 13:04:02', NULL),
(3327, 2, '04004', 'Mary Joy', 'Traifalgar', 'de los Santos', '', 'Female', '', 'Filipino', '', '', '1998-11-06', 'Guimbal, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'maryjoy.delossantos1106@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:06:17', '2023-07-24 13:06:17', NULL),
(3328, 2, '03103', 'Junenalyn Grace', 'Cerveza', 'Delfin', '', 'Female', '', 'Filipino', '', '', '1980-06-13', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'jgcerveza@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:11:47', '2023-07-24 13:11:47', NULL),
(3329, 2, '00402', 'Lorelee', 'Ganancial', 'Solis', '', 'Female', '', 'Filipino', '', '', '1976-05-30', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'loreleesolis123@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 13:15:17', '2023-07-24 13:15:17', NULL),
(3330, 2, '03093', 'Cynthia', 'Querubin', 'Pardorla', '', 'Female', 'Married', 'Filipino', '', '', '1985-10-24', '', '', '', 0, 0, '', '', '', '', '', '', 'cynthia.pardorla@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09983088390', '2023-07-24 13:40:34', '2023-07-24 13:40:34', NULL),
(3331, 2, '03131', 'AL JOHN', 'DE LA CERNA', 'ARTACHO', '', 'Male', 'Single', 'Filipino', '', 'Philippines', '1991-10-27', 'BACOLOD CITY', 'Roman Catholic', '', 0, 0, '', '', '', '', '', '', 'aljohnartacho@iloilonhs.edu.ph', '', '', '', 'Tentay', '', 'Iloilo City', 'Iloilo', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:28:05', '2023-08-10 11:55:55', NULL),
(3332, 2, '03125', 'NIKKIE', 'BERBEGAL', 'SOROPIA', '', 'Female', '', 'Filipino', '', '', '1989-09-10', 'CABATUAN, ILOILO', '', '', 0, 0, '', '', '', '', '', '', 'nikkie.soropia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:43:06', '2023-07-24 14:43:06', NULL),
(3333, 2, '03185', 'Roel ', 'Suaberon', 'Palmaira', '', 'Male', 'Married', 'Filipino', '', '', '1987-08-10', 'Iloilo City', 'Roman Catholic', 'A+', 0, 0, '', '', '', '', '', '', 'roel.palmaira@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 14:45:36', '2023-07-24 14:45:36', NULL),
(3334, 3, '00199', 'Marnel', 'G', 'Gonzales', '1690185575_24e11fe6b4e734161c11.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'marnel.gonzales@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 15:59:35', '2023-07-24 15:59:35', NULL),
(3335, 3, '03238', 'ALREY CHONE', '.', 'LAGMAN', '', 'Male', '', 'Filipino', '', '', '1987-07-01', '', '', '', 0, 0, '', '', '', '', '', '', 'alreychone@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-24 21:17:55', '2023-07-24 21:17:55', NULL),
(3336, 2, '03235', 'Neil', 'Camince', 'Bobis', '', 'Male', '', 'Filipino', '', '', '1983-07-26', 'Leon, Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'neil.bobis@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-25 11:24:29', '2023-07-25 11:24:29', NULL),
(3359, 2, '03214', 'Mark Andrew', 'Pallado', 'Españo', '', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'markandrew.espano@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-26 08:32:28', '2023-07-26 08:32:28', NULL),
(3360, 2, '03236', 'Arnil', 'Cerbas', 'Palomar', '', 'Male', '', 'Filipino', '', '', '1984-02-22', '', '', '', 0, 0, '', '', '', '', '', '', 'arnil.palomar@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-26 09:50:05', '2023-07-26 09:50:05', NULL),
(3361, 2, '00003', 'Maria Aries', 'Aborde', 'Pastolero', '', 'Female', '', 'Filipino', '', '', '1972-04-18', '', '', '', 0, 0, '', '', '', '', '', '', 'mariaaries.pastolero@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09486895584', '2023-07-26 10:23:08', '2023-07-26 10:23:08', NULL),
(3362, 2, '03036', 'Jano', 'Sarcino', 'Tabor', '', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'jano.tabor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09190626402', '2023-07-26 10:48:31', '2023-07-26 10:48:31', NULL),
(3363, 2, '00143', 'Lino', 'Calugas', 'Sajonia', '', 'Male', '', 'Filipino', '', '', '1970-09-26', '', '', '', 0, 0, '', '', '', '', '', '', 'lino.sajonia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09615707071', '2023-07-26 10:49:15', '2023-07-26 10:49:15', NULL),
(3364, 2, '00002', 'Jose Gilbert', 'Parreñas', 'Aborde', '', 'Male', 'Married', 'Filipino', '', '', '1969-04-02', '', '', '', 0, 0, '', '', '', '', '', '', 'josegilbert.aborde@iloilonhd.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09062252961', '2023-07-26 11:46:28', '2023-07-26 11:46:28', NULL),
(3365, 2, '00204', 'Marites', 'Pico', 'Hisancha', '', 'Female', '', 'Filipino', '', '', '1981-09-11', '', '', '', 0, 0, '', '', '', '', '', '', 'marites.hisancha@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09154274577', '2023-07-26 14:38:07', '2023-07-26 14:38:07', NULL),
(3366, 2, '00999', 'Gemmalyn', 'Jayme', 'Medroso', '', 'Female', '', 'Filipino', '', '', '1965-06-13', '', '', '', 0, 0, '', '', '', '', '', '', 'gemmalyn.medroso@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09227743380', '2023-07-26 14:40:52', '2023-07-26 14:40:52', NULL),
(3367, 2, '03245', 'Abraham Edgar', 'Tacadao', 'Vargas', '', 'Male', '', 'Filipino', '', '', '1991-10-28', '', '', '', 0, 0, '', '', '', '', '', '', 'abrahamedgar.vargas@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09994295476', '2023-07-26 14:50:42', '2023-07-26 14:50:42', NULL),
(3368, 2, '03225', 'Daina Faith', 'Endoma', 'Naorbe', '', 'Female', '', 'Filipino', '', '', '1996-11-20', '', '', '', 0, 0, '', '', '', '', '', '', 'dainafaith.naorbe@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09108510142', '2023-07-26 15:37:24', '2023-07-26 15:37:24', NULL),
(3369, 2, '03113', 'Elisar Joy', 'Coronado', 'Jovacon', '', 'Female', 'Married', 'Filipino', '', '', '1984-12-22', 'Iloilo City', 'Roman Catholic', 'O', 0, 0, '', '', '', '', '', '', 'elisarjoy.jovacon@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09071667887', '2023-07-26 15:41:43', '2023-07-26 15:41:43', NULL),
(3370, 2, '03283', 'Katherine Grace', 'Calauod', 'Simora', '', 'Female', 'Married', 'Filipino', '', '', '1983-08-30', 'Iloilo City', 'Roman Catholic', 'B+', 154, 60, '', '', '', '', '', '', 'katherinegrace.simora@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '(033) 336-74-87', '0966-315-00-21', '2023-07-26 15:41:55', '2023-07-26 15:41:55', NULL),
(3371, 2, '3247', 'Emcy Clarens', 'Castillo', 'Amor', '', 'Female', 'Single', 'Filipino', '', '', '1997-11-07', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'emcy.amor@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09503058483', '2023-07-26 15:41:56', '2023-07-26 15:41:56', NULL),
(3372, 2, '03234', 'Cherry Joy', 'Bolivar', 'Castro', '', 'Female', 'Single', 'Filipino', '', '', '1996-02-11', 'Dingle Iloilo', '', '', 0, 0, '', '', '', '', '', '', 'cherryjoy.castro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09287294066', '2023-07-26 15:44:50', '2023-07-28 13:17:53', NULL),
(3373, 2, '00154', 'MA. LEONORA', 'JACINTO', 'TINGATINGA', '', 'Female', 'Single', 'Filipino', '', '', '1974-05-15', '', '', '', 0, 0, '', '', '', '', '', '', 'maleonora.tingatinga@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 08:52:50', '2023-07-28 08:52:50', NULL),
(3374, 2, '03134', 'JONALYN', 'REGONDON', 'PAUCHANO', '', 'Female', '', 'Filipino', '', '', '1987-06-27', '', '', '', 0, 0, '', '', '', '', '', '', 'jonalyn.pauchano@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 08:54:20', '2023-07-28 08:54:20', NULL),
(3375, 2, '03165', 'GLENN DAVE', 'SUN', 'HORBINO', '', 'Male', 'Single', 'Filipino', '', '', '1994-11-14', '', '', '', 0, 0, '', '', '', '', '', '', 'glenndave.horbino@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-07-28 10:13:24', '2023-07-28 10:15:24', NULL),
(3376, 2, '03177', 'LOVELYN', 'FAVORITO', 'CASTRO', '', 'Female', '', 'Filipino', '', '', '1985-09-22', '', '', '', 0, 0, '', '', '', '', '', '', 'lovelyncastro@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-01 08:04:31', '2023-08-01 08:04:31', NULL),
(3377, 2, '03051', 'Guilibeth', 'Minguez', 'Española', '1690943443_bfd701dcfe356e2a8d63.jpg', 'Female', 'Married', 'Filipino', '', '', '1976-04-28', 'Laua-an, Antique', 'Roman Catholic', 'A+', 0, 0, '', '', '', '', '', '6374577', 'guilibeth.espanola@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09505543238', '2023-08-02 10:30:43', '2023-08-02 10:30:43', NULL),
(3378, 2, '03338', 'Lailane', 'Torcino', 'Valdez', '1690943673_c7050f3c60f98cca7827.jpg', 'Female', 'Married', 'Filipino', '', '', '1995-02-12', '', '', '', 0, 0, '', '', '', '', '', '', 'lailane.valdez@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09289923836', '2023-08-02 10:34:33', '2023-08-02 10:34:33', NULL),
(3379, 2, '03322', 'Imy Joy', 'Valencia', 'Maprangala', '1690943856_546037f59e0a6be0a01d.jpg', 'Female', 'Single', 'Filipino', '', '', '1997-12-07', '', '', '', 0, 0, '', '', '', '', '', '', 'imyjoy.maprangala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09502036109', '2023-08-02 10:37:36', '2023-08-02 10:37:36', NULL),
(3380, 2, '03357', 'Grace', 'Cantero', 'Cabaya', '1690944181_4f28e69224b91729f7f0.jpg', 'Female', 'Single', 'Filipino', '', '', '1990-11-05', '', '', '', 0, 0, '', '', '', '', '', '', 'grace.cabaya@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09605985666', '2023-08-02 10:43:01', '2023-08-02 10:43:01', NULL),
(3381, 2, '03352', 'Melbourne Therese', 'Maniago', 'Araniador', '1690944384_308ccc4fefd33d85c7a4.jpg', 'Female', 'Single', 'Filipino', '', '', '1998-02-11', '', '', '', 0, 0, '', '', '', '', '', '', 'melbournetherese.araniador@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09916144013', '2023-08-02 10:46:24', '2023-08-02 10:46:24', NULL),
(3382, 2, '03341', 'Crezyl', 'Seat', 'Tagudando', '1690944534_5a4f74b9ddef62cc7399.jpg', 'Female', 'Married', 'Filipino', '', '', '1999-02-05', '', '', '', 0, 0, '', '', '', '', '', '', 'crezyl.tagudando@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09388414932', '2023-08-02 10:48:54', '2023-08-02 10:48:54', NULL),
(3383, 2, '00025', 'Ma. Lennie', 'Caololan', 'Cabunagan', '1690944838_ece92a97db547f4e6250.jpg', 'Female', 'Single', 'Filipino', '', '', '1968-10-25', '', '', '', 0, 0, '', '', '', '', '', '', 'malennie.cabunagan@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09705138639', '2023-08-02 10:53:58', '2023-08-02 10:53:58', NULL),
(3384, 2, '03325', 'Rhanjit Kim Angelo', 'Bernal', 'Ferriol', '1690945029_164fabe0dc2ec4dc4f78.jpg', 'Male', 'Single', 'Filipino', '', '', '1997-12-14', '', '', '', 0, 0, '', '', '', '', '', '', 'rhanjitkimangelo.ferriol@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09605974508', '2023-08-02 10:57:09', '2023-08-02 10:57:09', NULL),
(3385, 2, '03287', 'Rolando', 'Salazar', 'Jose Jr.', '1690945474_d551032e6b41aa683cf0.jpg', 'Male', 'Single', 'Filipino', '', '', '1989-12-05', '', '', '', 0, 0, '', '', '', '', '', '', 'rolando.jose@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09702307512', '2023-08-02 11:04:34', '2023-08-02 11:04:34', NULL),
(3386, 2, '03223', 'Virgil', 'Delgado', 'Bajala', '1690945648_12baa3ae93c0c0efd128.jpg', 'Male', 'Single', 'Filipino', '', '', '1991-02-28', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'virgil.bajala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09707973211', '2023-08-02 11:07:28', '2023-08-02 11:07:28', NULL),
(3387, 2, '03199', 'Rona Grace', 'Araño', 'Paloma', '', 'Female', '', 'Filipino', '', '', '1996-08-25', '', '', '', 0, 0, '', '', '', '', '', '', 'ronagrace.paloma@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09098742799', '2023-08-03 13:46:08', '2023-08-03 13:46:08', NULL),
(3388, 2, '03080', 'Fritzie', 'Alla', 'Meterio', '', 'Female', 'Single', 'Filipino', '', '', '1989-12-19', '', '', '', 0, 0, '', '', '', '', '', '6374597', 'fritziemeterio@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09171281834', '2023-08-07 09:45:44', '2023-08-07 09:45:44', NULL),
(3389, 2, '03089', 'Amber', 'Aracena', 'Buyco', '', 'Female', 'Single', 'Filipino', '', '', '1990-12-14', '', '', '', 0, 0, '', '', '', '', '', '6374593', 'amber.buyco@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09120759938', '2023-08-07 09:48:54', '2023-08-07 09:48:54', NULL),
(3390, 2, '03067', 'Cristian', 'Maligaya', 'Franco', '', 'Male', 'Married', 'Filipino', '', '', '1979-05-08', '', '', '', 0, 0, '', '', '', '', '', '6374608', 'cristian.franco@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09159376723', '2023-08-07 09:57:08', '2023-08-07 09:57:08', NULL),
(3391, 2, '03157', 'Lea Joy', 'Alla', 'Meterio', '', 'Female', 'Single', 'Filipino', '', '', '1994-04-25', '', '', '', 0, 0, '', '', '', '', '', '6374641', 'leajoymeterio@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09177190740', '2023-08-07 10:30:35', '2023-08-07 10:30:35', NULL),
(3392, 2, '00269', 'IVY', 'FUNTANILLA', 'CORDERO', '', 'Female', 'Married', 'Filipino', '', '', '1982-11-09', '', '', '', 0, 0, '', '', '', '', '', '', 'ivy.cordero@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09420088501', '2023-08-07 19:27:57', '2023-08-07 19:27:57', NULL),
(3393, 2, '00147', 'DIARY', 'SARGADO', 'RODRIGUEZ', '', 'Female', 'Married', 'Filipino', '', '', '1971-04-06', 'Iloilo City', '', '', 0, 0, '', '', '', '', '', '', 'diary.rodriguez@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09062772116', '2023-08-08 11:59:50', '2023-08-08 11:59:50', NULL),
(3394, 2, '03254', 'Kent Arman', 'S', 'Dema-ala', '1691479307_5ca9c4cda3141148524d.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'kentarman.demaala@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09075120846', '2023-08-08 15:21:47', '2023-08-08 15:21:47', NULL),
(3395, 1, '03116', 'GAYMARIE', 'GRACIOSA', 'HINGPIT', '', 'Female', 'Single', 'Filipino', '', '', '1992-06-01', '', '', '', 0, 0, '', '', '', '', '', '', 'gaymarie.hingpit@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 00:07:38', '2023-08-10 00:07:38', NULL),
(3396, 2, '03326', 'ANGIE ROSE', 'TABIOLO', 'SUPREMO', '', 'Female', '', 'Filipino', '', '', '1985-10-10', '', '', '', 0, 0, '', '', '', '', '', '', 'angierose.supremo@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 09:07:58', '2023-08-10 09:07:58', NULL),
(3397, 2, '02021', 'NEIL JOHN', 'MOQUITE', 'JOQUIÑO', '', 'Male', '', 'Filipino', '', '', '1984-06-17', '', '', '', 0, 0, '', '', '', '', '', '', 'john.joquino@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-10 09:10:52', '2023-08-10 09:10:52', NULL),
(3398, 3, '03264', 'REMLE JOHN', 'GRONIFILLO', 'AGURO', '', 'Male', 'Single', 'Filipino', 'PHILIPPINES', 'PHILIPPINES', '1988-10-20', 'QUEZON METRO MANILA', 'SEVENTH DAY ADVENTIST', 'A+', 180, 78, '465734994', '', '', '', '', '', 'iab3cp4@gmail.com', '', '', '', 'ZONE 4 LOPEZ JAENA NORTE', 'LA PAZ', 'ILOILO', 'ILOILO', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 10:27:17', '2023-08-24 13:00:46', NULL),
(3399, 2, '00236', 'BERNADETTE', 'BEDIA', 'DUMAGUIT', '', 'Female', 'Married', 'Filipino', '', '', '1966-12-27', '', '', '', 0, 0, '150426897', '0712871239', '66122702066', '158000263128', '110250190476', '', 'bernadette.dumaguit@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:04:13', '2023-08-24 11:52:25', NULL),
(3400, 3, '00196', 'SUSETTE', 'ARACENA', 'BUYCO', '', 'Female', '', 'Filipino', '', '', '1963-07-08', '', '', '', 0, 0, '', '', '', '', '', '', 'susetteabuyco@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:07:51', '2023-08-24 11:07:51', NULL),
(3401, 2, '03239', 'NESTOR JR.', 'DAIZ', 'MORES', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'nestor.mores@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:50:21', '2023-08-24 11:50:21', NULL),
(3402, 2, '03179', 'LEIZL', 'CARMEN', 'LAYAM', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'leizl.layam@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:51:48', '2023-08-24 11:51:48', NULL),
(3403, 2, '03114', 'MA. SHARMAIN JANE', 'SUBIBE', 'MAGALLANES', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'masharmainjane.magallanes@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:54:00', '2023-08-24 11:54:00', NULL),
(3404, 2, '03233', 'MAENARD GRACE', 'LASAN', 'BILLENA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maenardgrace.lasan@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 11:57:34', '2023-08-24 11:57:34', NULL),
(3405, 2, '03176', 'REG TERENCE ', 'SICAN', 'GENTICA', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'regterence.gentica@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:04:46', '2023-08-24 12:04:46', NULL),
(3406, 2, '03200', 'MA. KATHERINE ', 'GALVE', 'PAYOPILIN', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'makatherine.payopilin@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:42:03', '2023-08-24 12:42:03', NULL),
(3407, 2, '03162', 'CYRIL', 'MONTALBAN', 'MOMBLAN', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'cyril.momblan@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:44:21', '2023-08-24 12:44:21', NULL),
(3408, 2, '04002', 'LORELEE', 'GANANCIAL', 'SOLIS', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'lorelee.solis@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:45:08', '2023-08-24 12:45:19', '2023-08-24 12:45:19'),
(3409, 2, '00157', 'ROSE ', 'ROSALDES', 'UMADHAY', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'rose.umadhay@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:46:29', '2023-08-24 12:46:29', NULL),
(3410, 2, '03202', 'RAYSAN JOY', 'N/A', 'LOPEZ', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'raysanjoy.lopez@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:48:01', '2023-08-24 12:48:01', NULL),
(3411, 2, '03127', 'HELENA', 'CAMPOSANO', 'CABANTING', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'helena.camposano@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:49:10', '2023-08-24 12:49:10', NULL),
(3412, 2, '03173', 'ROGER ', 'ANTONIO', 'ALAVATA', '', 'Male', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'roger.alavata@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:50:05', '2023-08-24 12:50:05', NULL),
(3413, 2, '03219', 'MAE SHANE', 'GONZALES', 'LAMANERO', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'lamaneroshane@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:51:12', '2023-08-24 12:51:12', NULL),
(3414, 2, '00213', 'JOHN MARTIN', 'PLONDAYA', 'CAPICIO', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'john.capicio@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:52:26', '2023-08-24 12:52:26', NULL),
(3415, 2, '00224', 'RUBY', 'DETORE', 'BLANDO', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'ruby.blando@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:53:14', '2023-08-24 12:53:14', NULL),
(3416, 2, '00094', 'ANGELIE', 'DADOR', 'MAMON', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'angelie.mamon@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:53:57', '2023-08-24 12:53:57', NULL),
(3417, 2, '03085', 'JOSIE MARIE', 'CUBIN', 'HUM', '', 'Female', 'Single', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'josiemariehum@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:54:58', '2023-08-24 12:54:58', NULL),
(3418, 2, '03198', 'MARY ANN', 'NAVANES', 'COLONIA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maryann.colonia@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:55:49', '2023-09-18 15:38:15', NULL),
(3419, 2, '03266', 'MARILYN', 'PALOMADO', 'MIFUEL', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'marilyn.mifuel@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:56:32', '2023-08-24 12:56:32', NULL),
(3420, 2, '00210', 'JOCELYN', 'CABRERA', 'ASCURA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'jocelyn.ascura001@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 12:57:35', '2023-08-24 12:57:35', NULL),
(3421, 2, '00300', 'JULIO', 'JAMOLAGUE', 'VILLALON', '', 'Male', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'julio.villalon001@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:06:02', '2023-08-24 13:06:02', NULL),
(3422, 2, '03192', 'GEMMA', 'HOJILLA', 'JOTEA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'gemma.jotea@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:07:01', '2023-08-24 13:07:01', NULL),
(3423, 2, '00297', 'MARY ANN', 'BAYLON', 'DIOCARES', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'maryann.diocares@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:08:12', '2023-08-24 13:08:12', NULL),
(3424, 2, '00229', 'RENEE ROSE', 'BARRIDO', 'JARDELEZA', '', 'Female', 'Married', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'renee.jardeleza@deped.gov.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-08-24 13:09:04', '2023-08-24 13:09:04', NULL),
(3425, 2, '03048', 'Joseph', 'Rosete', 'Gareza', '1694670814_2400d2a973f315002fb7.jpg', 'Male', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'joseph.gareza@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09186969119', '2023-09-14 13:53:34', '2023-09-14 13:53:34', NULL),
(3426, 2, '03112', 'Arvin', 'Quinones', 'Malayas', '', 'Male', 'Single', 'Filipino', '', '', '1989-05-08', 'Alegria, Buruanga, Aklan', '', '', 0, 0, '', '', '', '', '', '', 'arvin.malayas@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '09187519970', '2023-09-15 10:57:13', '2023-09-15 10:57:13', NULL),
(3430, 1, '00174', 'Gladys', 'Bereber', 'Harder', '1695094512_bdcebd69e4da64205f9a.jpg', 'Female', '', 'Filipino', '', '', '1965-10-26', '', '', '', 0, 0, '', '', '', '', '', '', 'gladys.harder@iloilonhs.edu.ph', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-09-19 11:35:12', '2023-09-19 11:35:12', NULL),
(3431, 2, '32323', 'yzabella kim', 'cqmposano', 'cabanting', '1695186246_7ec639b1bfb2240f285e.jpg', 'Female', '', 'Filipino', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', 'yzabella@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-09-20 13:04:06', '2023-09-20 13:04:21', '2023-09-20 13:04:21');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_monthly_deduction_tbl`
--

CREATE TABLE `emp_monthly_deduction_tbl` (
  `ded_id` bigint(20) NOT NULL,
  `ded_emp_id` int(11) NOT NULL,
  `ded_month_of` varchar(100) NOT NULL,
  `ded_sy_id` int(11) NOT NULL,
  `ded_deduction` decimal(8,2) NOT NULL,
  `processed_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(18, 3322, 1, 'dafds', 1, 'fsdfsd', 1, 'dfsdfds', 1, 'dsfsd', 'dsfsd', 1, 'sdfdsfds', 1, 'dsfdsf', 1, 'dsfsd', 1, 'dsfdsf', 1, 'sdfds', 1, 'dsfds', 1, 'dsfdsfsd', 1, 'dsasfdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `emp_plantilla_tbl`
--

CREATE TABLE `emp_plantilla_tbl` (
  `emp_plant_id` int(11) NOT NULL,
  `plant_id` smallint(6) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `nbc_id` int(11) NOT NULL,
  `step` smallint(6) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `assigned_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `emp_seperation_tbl`
--

CREATE TABLE `emp_seperation_tbl` (
  `es_id` int(11) NOT NULL,
  `es_emp_id` int(11) NOT NULL,
  `es_cause` varchar(255) NOT NULL,
  `es_date` date NOT NULL,
  `es_processed_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_station_tbl`
--

CREATE TABLE `emp_station_tbl` (
  `emp_st_id` bigint(20) NOT NULL,
  `st_id` int(11) NOT NULL,
  `st_emp_id` int(11) NOT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `emp_st_assigned_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `grade_level_tbl`
--

CREATE TABLE `grade_level_tbl` (
  `grade_level_id` smallint(6) NOT NULL,
  `grade_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `grade_level_tbl`
--

INSERT INTO `grade_level_tbl` (`grade_level_id`, `grade_level`) VALUES
(0, 'ALS JHS'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `household_members_tbl`
--

INSERT INTO `household_members_tbl` (`hm_id`, `stud_id`, `sy_id`, `grade`, `complete_name`, `hm_relationship`) VALUES
(48, 148, 1, 9, 'XIAN VINZL T MANIPOL', 'Sibling'),
(49, 162, 1, 0, 'N/A', ''),
(52, 183, 1, 9, 'Ziph David Labramonte Sumagaysay', 'Sibling'),
(54, 11, 1, 9, 'Carlos Jose T. Catalan', 'Sibling'),
(55, 30, 1, 11, 'PAUL JULIAN MYKAELLE JR. CAÑETE MACALALAG', 'Sibling'),
(56, 30, 1, 10, 'EVE FLORENCE CAMILLA CAÑETE MACALALAG', 'Sibling'),
(57, 231, 1, 0, 'NONE', ''),
(61, 234, 1, 8, 'ETHAN JOHN M. LOGRONIO', 'Sibling'),
(65, 76, 1, 0, 'N/A', ''),
(66, 149, 1, 0, 'N/A', ''),
(71, 71, 1, 12, 'Ellah Joy S. Bañes', 'Sibling'),
(74, 172, 1, 0, '', ''),
(83, 76, 1, 0, 'N/A ', ''),
(84, 52, 1, 11, 'Bridgethone Smert D. Cosip', 'Sibling'),
(86, 107, 1, 0, 'Na', ''),
(87, 1191, 1, 8, 'Sheina Mae P Arbigoso ', 'Sibling'),
(88, 327, 1, 12, 'Krishamae Kaye N. Molina', 'Relative'),
(89, 323, 1, 11, 'VINCE JOSEPH I. MASICAMPO', 'Sibling'),
(90, 63, 1, 9, 'Nicole P. Andrin', 'Sibling'),
(91, 1706, 1, 8, 'Cyrish Joy Jotajero Lecaniel', 'Sibling'),
(92, 1223, 1, 12, 'John Michael Guyos Gelogo', 'Relative'),
(93, 1223, 1, 9, 'Angelo Ephrem Alvarado Enojado ', 'Relative'),
(94, 322, 1, 7, 'Eliah Kim A. Martinez ', 'Sibling'),
(95, 802, 1, 9, 'Calephebs Jandi G. Ibieza ', 'Sibling'),
(98, 2, 1, 8, 'Janessa Christianne Aragorat Marpuri', 'Relative'),
(99, 185, 1, 0, 'N/A', ''),
(100, 61, 1, 9, 'Franzer Hej J. Alonday', 'Sibling'),
(101, 278, 1, 12, 'LOVELY FAYE D. ARDEÑA', 'Sibling'),
(102, 971, 1, 10, 'Timothy Carl Paul J. Feliciano', 'Relative'),
(103, 69, 1, 0, 'N.A.', ''),
(107, 971, 1, 11, 'Vassili Xaivier J. Jabanag ', 'Relative'),
(109, 971, 1, 11, 'Timothy Carl Peter J. Feliciano', 'Relative'),
(115, 929, 1, 10, 'Benjamin III D. Santos', 'Sibling'),
(123, 119, 1, 11, 'Zarin Aleksa D. Golveo', 'Sibling'),
(124, 584, 1, 9, 'Novie Anne M. Hormillosa', 'Sibling'),
(125, 981, 1, 9, 'Jonathan Gustilo Pasaporte ', 'Sibling'),
(126, 318, 1, 8, 'Ysha Angelyn soberano lopez', 'Sibling'),
(127, 612, 1, 8, 'Lance C. Alipat', 'Sibling'),
(128, 1645, 1, 12, 'Lindey Rose Descalsota Alintana', 'Sibling'),
(129, 98, 1, 0, 'NA', ''),
(130, 626, 1, 7, 'Romilla Dale T. Flores', 'Sibling'),
(131, 626, 1, 9, 'Ruthdielle Mae T. Flores', 'Sibling'),
(132, 975, 1, 0, '', ''),
(133, 102, 1, 0, '', ''),
(136, 1659, 1, 10, 'Tobey Singson Pido', 'Sibling'),
(139, 15, 1, 8, 'Chrissia Sorilla Danay', 'Sibling'),
(140, 590, 1, 12, 'Althesa Janelle V. Alimahan', 'Relative'),
(141, 590, 1, 10, 'Yzalea Rizette V. Hifarva', 'Relative'),
(142, 598, 1, 9, 'Gabriel Emil R. Ta-asan', 'Sibling'),
(143, 635, 1, 8, 'Rain Marc Palomo', 'Sibling'),
(144, 1644, 1, 10, 'Virjunea brisel Pestaño Abelarde', 'Sibling'),
(145, 894, 1, 8, 'Raycy Gedalanga Defante', 'Sibling'),
(148, 643, 1, 11, 'Rogie Ed A. Ticot ', 'Sibling'),
(149, 1325, 1, 7, 'JAZMINE PATRIZ A. GALINO', 'Sibling'),
(150, 1170, 1, 11, 'Frances Jenella Facon Pacheco', 'Sibling'),
(152, 752, 1, 9, 'Dacudao, Fritzie Joy G.', 'Sibling'),
(153, 1671, 1, 10, 'Leonissa Griño Caoyonan', 'Sibling'),
(154, 642, 1, 10, 'Shanaia D. Tabion', 'Sibling'),
(155, 1060, 1, 7, 'Nick Darren D. Aurecencia ', 'Sibling'),
(157, 1, 1, 10, 'Brianna Franzine A. Andola', 'Sibling'),
(159, 164, 1, 0, 'N/A', ''),
(161, 219, 1, 0, 'RAFAEL B. FUENTES', 'Parent'),
(162, 219, 1, 0, 'JOYLIE G. FUENTES', 'Parent'),
(163, 764, 1, 9, 'Joellenn Pearl T. Pedrosa', 'Sibling'),
(164, 570, 1, 12, 'John Leandro D. Alintana', 'Sibling'),
(167, 219, 1, 0, 'HYACINTH G. FUENTES', 'Sibling'),
(168, 219, 1, 0, 'JOHN M. GARDOSE', 'Relative'),
(170, 80, 1, 0, 'NA', ''),
(172, 740, 1, 9, 'Jolie Ann B. Alonzaga ', 'Sibling'),
(173, 147, 1, 11, 'Tracy Claudette B. Mande', 'Sibling'),
(174, 735, 1, 8, 'Andreu Elre I. Denamarquez', 'Sibling'),
(175, 645, 1, 0, 'Lemuel Perucho Cruzat', 'Sibling'),
(176, 348, 1, 9, 'Rohan Baguio Sumalapao', 'Sibling'),
(180, 331, 1, 12, 'AEHR AMSEDEL L. VILLANUEVA', 'Relative'),
(182, 550, 1, 7, 'Feby Arnette L. Morata', 'Sibling'),
(183, 621, 1, 12, 'Jasmine Alfornon Manaois', 'Relative'),
(186, 1525, 1, 8, 'Phev Ann Mari c escorial', 'Sibling'),
(188, 1093, 1, 9, 'Iel D Canag', 'Relative'),
(189, 1339, 1, 9, 'Jeih Zeus F. Zausa', 'Sibling'),
(190, 1134, 1, 11, 'Princess Ria B. Narandan', 'Relative'),
(192, 559, 1, 8, 'Anella May Bolido Bueno', 'Sibling'),
(193, 1539, 1, 11, 'Red Lester C. Pagaddu ', 'Sibling'),
(196, 829, 1, 9, 'John Carlo D. Maglantay', 'Sibling'),
(197, 476, 1, 8, 'Doreen Nicole N.  Porras', 'Relative'),
(198, 117, 1, 0, 'NA', ''),
(199, 476, 1, 10, 'Jheo Martin P. Peñafiel', 'Relative'),
(200, 286, 1, 0, 'None', ''),
(201, 1088, 1, 9, 'Zaryl Jan L. Vilchez', 'Sibling'),
(202, 130, 1, 12, 'VINCE REID T. LANARIA', 'Sibling'),
(203, 369, 1, 9, 'Esther Gail C. Ocup', 'Sibling'),
(204, 371, 1, 12, 'Kyla Altomia Pendon', 'Sibling'),
(205, 769, 1, 11, 'WILAIZA MAE P. BUYCO', 'Relative'),
(208, 836, 1, 8, 'Keisha An G. Sevelleno', 'Sibling'),
(212, 1497, 1, 9, 'Janiel Christian V. Hernandez', 'Sibling'),
(213, 1485, 1, 10, 'Mayelle C. Quimpo ', 'Sibling'),
(215, 131, 1, 12, 'Xaraih Vlir M. Laranja', 'Sibling'),
(216, 169, 1, 0, 'N/A', ''),
(217, 2792, 1, 11, 'MA.ELENA E. SAQUIAN', 'Parent'),
(219, 177, 1, 0, 'N/A', ''),
(220, 1276, 1, 8, 'Rolando L. Ordonio III', 'Sibling'),
(221, 1493, 1, 10, 'Angel Faith V. Balincuacas ', 'Sibling'),
(222, 847, 1, 11, 'JADE PEDROSO CARTAGENA', 'Sibling'),
(223, 847, 1, 8, 'CRISTEL JOY PEDROSO CARTAGENA', 'Sibling'),
(224, 316, 1, 9, 'PRINCE ARIEL S. LONGARES', 'Sibling'),
(225, 969, 1, 8, 'Reem Mahmood M. Hasan', 'Sibling'),
(226, 180, 1, 9, 'Helna Danielle F. Soldevilla', 'Sibling'),
(227, 43, 1, 8, 'Jun Adrian M. Peronce ', 'Sibling'),
(228, 1700, 1, 11, 'Ma. Sofia Nelly O. Hogar', 'Sibling'),
(229, 641, 1, 7, 'Cyrah Belle Ilustre Suyo', 'Sibling'),
(233, 276, 1, 7, 'HARVEY FRITZ M. ANTIPALA ', 'Sibling'),
(234, 1131, 1, 7, 'Jillian Gabo Lopez', 'Relative'),
(235, 140, 1, 10, 'Angel T.Malagom', 'Sibling'),
(236, 1124, 1, 9, 'MJ A. Española ', 'Sibling'),
(237, 1124, 1, 7, 'XZ A. Española ', 'Sibling'),
(238, 261, 1, 10, 'Gojecs Cequeña Sambas ', 'Sibling'),
(239, 36, 1, 9, 'CRISEL JOY A. MATIS ', 'Sibling'),
(240, 1201, 1, 7, 'JILIAN ABIGAIL MORIT', 'Sibling'),
(241, 1404, 1, 12, 'Hassan F. Lodhi', 'Sibling'),
(246, 1315, 1, 8, 'Johnica A. Tamaño', 'Sibling'),
(249, 856, 1, 0, '', ''),
(250, 1398, 1, 9, 'Trish Cybil S. Grande', 'Sibling'),
(251, 1398, 1, 10, 'Febie Lyza S. Grande ', 'Sibling'),
(252, 788, 1, 9, 'LARIZ RACHEL D. TORREFIEL', 'Sibling'),
(253, 841, 1, 10, 'Jov Floyd Pardilla', 'Relative'),
(255, 988, 1, 7, 'Anya Therese L. Rubiato', 'Sibling'),
(257, 1524, 1, 8, 'Qynji Thea Marie Arcenal', 'Relative'),
(258, 953, 1, 7, 'LEMUEL FRANC D. ARDEÑA', 'Sibling'),
(259, 1434, 1, 9, 'Dominic P. Esteta', 'Sibling'),
(260, 1127, 1, 8, 'Cyrene B. Gabon', 'Sibling'),
(263, 1057, 1, 11, 'Angel Ann B. Abolucion ', 'Sibling'),
(270, 110, 1, 0, '', ''),
(271, 679, 1, 11, 'Sean Seraf K. Menguillo ', 'Sibling'),
(272, 1481, 1, 8, 'Mry Aciencia Ricci G. Murcia', 'Sibling'),
(273, 382, 1, 12, 'RAUL E. MOSQUERA JR.', 'Sibling'),
(274, 1445, 1, 7, 'Joyce Lhouise Do Murugathas ', 'Sibling'),
(275, 755, 1, 10, 'Jezreel Anne P. Roma', 'Relative'),
(277, 345, 1, 0, '', ''),
(278, 1067, 1, 8, 'TERRENCE MARIE S. DEQUILLA', 'Sibling'),
(279, 782, 1, 7, 'DAVE THEO T. LANARIA', 'Sibling'),
(280, 665, 1, 8, 'Jullienne L. Vargas', 'Sibling'),
(281, 31, 1, 11, 'PRINCESS ANNE D. MAGBANUA', 'Sibling'),
(282, 1086, 1, 8, 'Carmela D. Romero', 'Sibling'),
(283, 666, 1, 11, 'EUNICE MARGARETTE PRECHING ABANGAN', 'Sibling'),
(285, 535, 1, 8, 'Mirriam Grace B. Oro', 'Sibling'),
(286, 239, 1, 0, '', ''),
(288, 191, 1, 10, 'Racsen Zeth Montalban Triumfante', 'Sibling'),
(289, 304, 1, 11, 'Christian James sudayon flores', 'Sibling'),
(290, 794, 1, 10, 'Kim Aerich D. Cardiel', 'Sibling'),
(291, 1701, 1, 7, 'Ava Ysabelle H.  Husmillo ', 'Sibling'),
(294, 224, 1, 0, '', ''),
(296, 1208, 1, 9, 'Penny Lane Elizabeth D. Cardenas', 'Sibling'),
(297, 1544, 1, 10, 'Abram Jacob C. Cadiz', 'Sibling'),
(298, 759, 1, 9, 'ADRIENNE JULIENNE R. LAGMAY', 'Sibling'),
(302, 1285, 1, 11, 'Errol Jay Pamplona Arnibal', 'Sibling'),
(303, 592, 1, 10, 'Freahlyn H. Ortez', 'Sibling'),
(308, 218, 1, 11, 'LOREN GIL FRIAS', 'Sibling'),
(309, 1584, 1, 0, '', ''),
(311, 122, 1, 10, 'JOVEN E. JACULINA JR', 'Sibling'),
(312, 1345, 1, 9, 'Enrique Tomas Cervantes', 'Sibling'),
(313, 1083, 1, 8, 'Lilia Cherzen Mae Borbon', 'Relative'),
(314, 100, 1, 12, 'KUNDUN MAHA BRAHMA A. DUEÑAS', 'Sibling'),
(318, 1268, 1, 12, 'Ember Joie P. Arnibal ', 'Sibling'),
(319, 1113, 1, 11, 'Elaiza Danielle Ramos Sola ', 'Sibling'),
(320, 244, 1, 12, 'Joellianne Lhouisze Do Murugathas ', 'Sibling'),
(321, 1486, 1, 9, 'Zakia Mae T. Santiago ', 'Sibling'),
(323, 1486, 1, 10, 'Kaizen S. Clamor', 'Relative'),
(324, 708, 1, 12, 'Shane Marie C. Calisang', 'Sibling'),
(330, 976, 1, 9, 'SHANA CHRISTI M. MILAN', 'Sibling'),
(331, 305, 1, 12, 'JESUNALD DUMANIL GALINDO', 'Sibling'),
(332, 958, 1, 12, 'Janz Priel Engana', 'Relative'),
(333, 699, 1, 10, 'Grace Hope Nuevo', 'Sibling'),
(334, 1585, 1, 12, 'John Patrick Taja-on Miraflores ', ''),
(335, 1284, 1, 11, 'Warme G. Araneta Jr. ', 'Sibling'),
(336, 1566, 1, 12, 'Sofia Laurice C. Calisang ', 'Sibling'),
(337, 466, 1, 8, 'Ethan Caleb T. Binayas ', 'Sibling'),
(338, 1273, 1, 7, 'KUMAR MAHA KHALID A.DUEÑAS', 'Sibling'),
(342, 778, 1, 10, 'Andrie D. Cordova', 'Sibling'),
(350, 326, 1, 8, 'Thalia B. Miranda', 'Sibling'),
(351, 943, 1, 8, 'John Gabrielle R. Mendez', 'Sibling'),
(353, 1691, 1, 8, 'Kaylie Angeline K. Cordero', 'Sibling'),
(355, 989, 1, 8, 'Lloyd Neri P. Rabut', 'Relative'),
(356, 479, 1, 11, 'Dinah Rae Teresa B. Tupas', 'Relative'),
(360, 538, 1, 8, 'John Valens B. Jlabuena', 'Sibling'),
(361, 891, 1, 8, 'SHIEKHA PALOMA AVENIR ', 'Sibling'),
(362, 891, 1, 10, 'CAULIN PALOMA AVENIR ', 'Sibling'),
(364, 840, 1, 9, 'Jeff Patrick P. Tenasas', 'Sibling'),
(365, 1022, 1, 12, 'Reygie Mae G. Aguirre', 'Relative'),
(367, 961, 1, 11, 'John Kyiete V. Divinagracia', 'Sibling'),
(368, 961, 1, 11, 'John Tylher V. Divinagracia', 'Sibling'),
(369, 1059, 1, 0, '', ''),
(370, 1020, 1, 12, 'Aldous Lance Abido ', 'Relative'),
(371, 1020, 1, 11, 'Allen Nor Abido ', 'Relative'),
(373, 694, 1, 9, 'EMMANUEL JAMES BEANIZA GEDORIO', 'Sibling'),
(378, 1480, 1, 8, 'SHAYNA P. MERCADO', 'Sibling'),
(379, 707, 1, 10, 'John Nathaniel D. Borrel', 'Sibling'),
(380, 767, 1, 7, 'Carl Louis Salvado', 'Sibling'),
(381, 6, 1, 9, 'Hyacinth Obsequio Abolucion', 'Relative'),
(382, 1565, 1, 7, 'REIGN SAMRYL PUERTOLLANO ', 'Relative'),
(383, 606, 1, 11, 'Shayne Marie A. Cordero', 'Relative'),
(384, 713, 1, 8, 'Kristina Samantha G. Espino', 'Relative'),
(386, 722, 1, 0, '', ''),
(389, 503, 1, 10, 'Jeselle Aira B. Braga', 'Sibling'),
(390, 281, 1, 10, 'Chriz Mherl Marie Arnaiz', 'Sibling'),
(392, 1348, 1, 11, 'James Sean P. Gabriel', 'Sibling'),
(393, 1420, 1, 10, 'CHAD JERICK P. PEN', 'Sibling'),
(394, 1420, 1, 0, 'JERINCE MEERA P. PEN', 'Sibling'),
(396, 133, 1, 9, 'Jera McKenzie F. Libo-on', 'Sibling'),
(398, 696, 1, 0, '', ''),
(404, 950, 1, 11, 'Kristin A. Sulpico', 'Sibling'),
(405, 435, 1, 8, 'Krizel Japitana Dela Rosa ', 'Sibling'),
(406, 555, 1, 11, 'Athaliah Praise Zerrudo', 'Relative'),
(407, 544, 1, 0, '', ''),
(408, 33, 1, 10, 'Rachelle C. Maghari ', 'Sibling'),
(409, 949, 1, 10, 'Timothy Carl Paul J. Feliciano', 'Sibling'),
(410, 949, 1, 11, 'Alexia Roma J. Jaranilla', 'Relative'),
(411, 949, 1, 11, 'Vasilli Xavier Jabanag', 'Relative'),
(412, 1288, 1, 8, 'Jaycee A. Catedrilla', 'Sibling'),
(414, 842, 1, 11, 'Peter John S. Alcantara', 'Sibling'),
(415, 1556, 1, 10, 'ARIANE J. SUMAGPAO', 'Sibling'),
(418, 1467, 1, 10, 'Clark Vincent S. Casipe', 'Sibling'),
(419, 211, 1, 9, 'Kenneth Gabriel V. Capacio', 'Relative'),
(420, 799, 1, 0, '', ''),
(421, 931, 1, 7, 'Vincent Paul Saunar', 'Sibling'),
(422, 35, 1, 10, 'Gian Carlo I. Mariano', 'Sibling'),
(423, 35, 1, 7, 'Jonalyn I. Mariano', 'Sibling'),
(426, 817, 1, 0, 'BERNARDO A. ARGEL', 'Parent'),
(427, 817, 1, 0, 'HICEL PESTAÑO ARGEL', 'Parent'),
(428, 84, 1, 8, 'Robert G. Castellano', 'Sibling'),
(431, 197, 1, 12, 'ROYCE GERARD M. AGUILAR', 'Sibling'),
(432, 23, 1, 0, 'NA', ''),
(433, 615, 1, 9, 'Rechiel Joy P. Canja', 'Sibling'),
(434, 268, 1, 10, 'Mharck Jhunson D. Tendan ', 'Sibling'),
(435, 1722, 1, 10, 'Jay Mhe Ticar', 'Sibling'),
(436, 1036, 1, 11, 'JUSTINE MARK M. PAGO', 'Sibling'),
(437, 1184, 1, 10, 'Julian Albert Guillergan Sagge', 'Sibling'),
(438, 1184, 1, 8, 'Jaira Kaylee Sagge', 'Relative'),
(439, 1015, 1, 11, 'Alexandra Kirstein P. Catequista', 'Sibling'),
(440, 1033, 1, 9, 'ZIEN STAR S. NICODEMUS ', 'Sibling'),
(441, 1275, 1, 12, 'Hannah F. Lodhi ', 'Sibling'),
(442, 182, 1, 0, 'NA', ''),
(445, 600, 1, 7, 'Nicole F. Toledo', 'Sibling'),
(446, 1374, 1, 10, 'Amiel Andrei Tambasen', 'Sibling'),
(447, 379, 1, 12, 'Kaira Teffany  C Jereza', 'Sibling'),
(448, 208, 1, 11, 'Ma. Theresa B. Casumpang', 'Sibling'),
(450, 308, 1, 8, 'Ryan B. Gito', 'Sibling'),
(451, 720, 1, 7, 'Kelly Shane Jereza', 'Sibling'),
(453, 809, 1, 7, 'Princess Xyrelle Nicole Namol ', 'Relative'),
(458, 1367, 1, 10, 'Charice P. Jimenez', 'Sibling'),
(462, 1443, 1, 10, 'John Benedict D. Jorque', 'Sibling'),
(465, 1376, 1, 10, 'Audrey Kyle R. Villanueva ', 'Sibling'),
(466, 1376, 1, 7, 'Mica R. Villanueva ', 'Sibling'),
(467, 247, 1, 11, 'Carl Ian M. Paches', 'Sibling'),
(468, 1576, 1, 9, 'Devince S. Rando', 'Sibling'),
(469, 1576, 1, 12, 'Vethany S. Rando', 'Sibling'),
(471, 1578, 1, 10, 'Jay Orly Mil, L. Santiago', 'Sibling'),
(472, 680, 1, 9, 'Lance Rafael N Aujero', 'Relative'),
(473, 902, 1, 9, 'Frances Angela Segovia', 'Sibling'),
(474, 151, 1, 0, 'NA', ''),
(475, 157, 1, 0, 'NA', ''),
(476, 999, 1, 9, 'Nicole Mae Doronila Gonzaga', 'Sibling'),
(483, 168, 1, 0, 'N/A', ''),
(484, 1328, 1, 10, 'John Alexander H. Lasanas', 'Sibling'),
(485, 1387, 1, 10, 'Azalea Krisshia H. Quisoy', 'Sibling'),
(487, 936, 1, 10, 'Rolly Bawan Biñas Jr ', 'Sibling'),
(488, 463, 1, 9, 'Nashye Jean B. Villaruel', 'Sibling'),
(489, 253, 1, 11, 'Quellei Meah Q. Villaflor', 'Relative'),
(490, 1046, 1, 12, 'Fatima Joelle V. Ealdama', 'Sibling'),
(491, 1412, 1, 10, 'Keihl Gaia Cate Q. Defante', 'Sibling'),
(492, 377, 1, 10, 'GIL CLARYNCE C. CASPILLO', 'Sibling'),
(495, 438, 1, 8, 'Nina Ysabelle S. Esposo', 'Sibling'),
(496, 1528, 1, 11, 'Jnrick Goriona Galon', 'Relative'),
(497, 438, 1, 9, 'Earl Joseph S. Sabido', 'Relative'),
(498, 368, 1, 10, 'Andrea Mae Drilon Leonor ', 'Sibling'),
(499, 448, 1, 10, 'Xypher Alexis E. Nallas', 'Sibling'),
(500, 753, 1, 12, 'Jelo Godwin V. Ealdama', 'Sibling'),
(502, 814, 1, 7, 'John Michael Ledesma', 'Relative'),
(503, 704, 1, 0, '', ''),
(504, 1308, 1, 10, 'Paolo Miguel Bornales', 'Sibling'),
(505, 432, 1, 0, 'NO', ''),
(508, 458, 1, 9, 'Cedie june calle', 'Relative'),
(509, 1362, 1, 11, 'Trisha Eloisa G. Galleron', 'Sibling'),
(510, 184, 1, 11, 'Trexie S. Gullo', 'Relative'),
(511, 1910, 1, 12, 'Allen Nor S. Abido', 'Sibling'),
(515, 1076, 1, 8, 'JUSTIN PHILIP D. LATUMBO ', 'Sibling'),
(516, 657, 1, 11, 'Lady lhe J. Ordinal', 'Sibling'),
(517, 1510, 1, 8, 'Purple Ush Moira Timosa Silvestre', 'Sibling'),
(518, 65, 1, 11, 'Fitzgerald J. Celeste', 'Relative'),
(519, 65, 1, 8, 'Gerli J. Celeste', 'Relative'),
(520, 591, 1, 10, 'Ma. Megan Joy Noquez', 'Sibling'),
(523, 1748, 1, 12, 'REANE ZEANTH MONICA T. BELINARIO', 'Sibling'),
(525, 980, 1, 11, 'Jujith Donald C. Paredes', 'Sibling'),
(526, 711, 1, 0, 'Samuel Josh M. Castro', 'Sibling'),
(527, 711, 1, 0, 'Charin M. Castro', 'Parent'),
(528, 711, 1, 0, 'Leo c. Castro', 'Parent'),
(529, 805, 1, 8, 'Maria Ellenia J. Legada', 'Sibling'),
(532, 2444, 1, 10, 'Niel Jed Frayne P. Gulanes', 'Sibling'),
(534, 820, 1, 11, 'Ronnie John Artieda', 'Relative'),
(535, 813, 1, 11, 'Ulzen Brad V. Songalia', 'Sibling'),
(536, 442, 1, 8, 'Mary Andrea Hermano', 'Relative'),
(537, 998, 1, 11, 'Chimera Lean L. Fabia ', 'Sibling'),
(541, 2392, 1, 9, 'Carlos Jose Catalan', 'Sibling'),
(542, 951, 1, 11, 'Kheyren C. Allosa', 'Sibling'),
(543, 951, 1, 8, 'Girolyn C. Allosa', 'Sibling'),
(544, 351, 1, 9, 'abighail sigua eula', 'Relative'),
(546, 779, 1, 10, 'Rosmel Rhoi C. de Leon', 'Sibling'),
(549, 2405, 1, 8, 'Wynn Rayven Licardo Datorin', 'Sibling'),
(550, 2482, 1, 7, 'DAEZLYN ANNE G. MECUANDO', 'Sibling'),
(554, 795, 1, 11, 'Bobby Andro D. Agilles', 'Relative'),
(555, 1282, 1, 12, 'ANGEL JOY G. GABIBETE', 'Relative'),
(563, 1354, 1, 9, 'Bernard Jaye Nikkolai L. Quanico', 'Sibling'),
(568, 461, 1, 0, '', ''),
(571, 705, 1, 12, 'Alexa Jovel Gonzales Billones', 'Sibling'),
(574, 2774, 1, 12, ' Mary Anne Margarette C. Pagaddu ', 'Sibling'),
(575, 567, 1, 10, 'Ma. Bejis P. Magbanua', 'Sibling'),
(578, 1739, 1, 12, 'Paul Miguel Piccio Austria', 'Sibling'),
(579, 1000, 1, 10, 'Noel Jr. L. Gellangarn', 'Relative'),
(582, 58, 1, 11, 'Syrah Nicole S. Sapio', 'Relative'),
(584, 1884, 1, 8, 'Marish Giergos Saul', 'Sibling'),
(585, 1884, 1, 12, 'John Christian, Giergos, Saul', 'Sibling'),
(586, 1571, 1, 10, 'Kristoffer Lloyd R. Montano', 'Sibling'),
(588, 457, 1, 0, '', ''),
(590, 2033, 1, 9, 'Ayesia Yleen Jacildo Supresencia', 'Sibling'),
(591, 817, 1, 9, 'YSABELLE PESTAÑO ARGEL', 'Sibling'),
(592, 548, 1, 12, 'AL WYNNDEL BORRO HEMILLA', 'Sibling'),
(593, 638, 1, 0, 'Niño Rafael H. Sanchez', 'Sibling'),
(594, 1901, 1, 10, 'Anika Julia Gicanal Uy', 'Sibling'),
(595, 638, 1, 0, 'Nhoelyn Joy Sanchez ', 'Sibling'),
(596, 638, 1, 0, 'Nj Sanchez', 'Sibling'),
(597, 719, 1, 8, 'Mickyle Angelo G. Jainga', 'Sibling'),
(602, 430, 1, 0, '', ''),
(603, 2422, 1, 8, 'Zandria Eureca Forrosuelo', 'Sibling'),
(604, 1271, 1, 11, 'DINAH RAE BAYLON TUPAS', 'Relative'),
(607, 1341, 1, 11, 'Francis Gabriel Piccio Austria ', 'Sibling'),
(608, 2576, 1, 7, 'Kurt Cj Alanan Calopez', 'Relative'),
(609, 1055, 1, 10, 'Juliene A. Vigil', 'Sibling'),
(611, 1902, 1, 7, 'JOHN ROVIC C. QUIACHON', 'Relative'),
(612, 1013, 1, 8, 'KHARYL HOPE CABRIETO ', 'Sibling'),
(613, 1746, 1, 10, 'ZACK DAVID L. BELARMINO ', 'Sibling'),
(614, 1746, 1, 9, 'RAMON EDILBERT L. BELARMINO ', 'Sibling'),
(615, 1383, 1, 10, 'Paul Tristan D. Gobres', 'Sibling'),
(616, 1383, 1, 8, 'Audrey Lucienne D. Gobres', 'Sibling'),
(617, 1893, 1, 8, 'Michael T. Tabuada', 'Sibling'),
(621, 1762, 1, 12, 'Camela Amor Condez Cape', 'Relative'),
(622, 1834, 1, 8, 'Jsil Gwyneth Rayne C. Lorea', 'Sibling'),
(623, 2074, 1, 8, 'MARK JANSE COMPLIZA,ARROYO ', 'Sibling'),
(624, 1064, 1, 9, 'Izzalen Marice S. Malones ', 'Relative'),
(627, 1827, 1, 12, 'Rouel Von M. Juson', 'Sibling'),
(628, 995, 1, 7, 'Justine Louise A. Aguilar', 'Sibling'),
(629, 1952, 1, 9, 'Trishia Faye G. Drilon', 'Sibling'),
(630, 90, 1, 0, '', ''),
(632, 357, 1, 7, 'Lonicah Thea gito laguardia', 'Sibling'),
(636, 1095, 1, 9, 'Nathan Niel T. Espartero', 'Sibling'),
(637, 869, 1, 7, 'Kyll Rolen Celestre', 'Relative'),
(638, 2132, 1, 10, 'RICHARD ALLEN E. DEPOL', 'Sibling'),
(639, 456, 1, 10, 'DENCY GRACE CAALEM SOLANIB', 'Sibling'),
(640, 2059, 1, 8, 'Naimah Bader S. Allahow', 'Sibling'),
(642, 2080, 1, 11, 'Ma. Dorwin Therese Hulleza Bantad', 'Relative'),
(645, 173, 1, 0, 'NA', ''),
(646, 1049, 1, 12, 'Kris Anthony M. Gurung', 'Sibling'),
(647, 1049, 1, 11, 'Diene Anton R. Magno', 'Relative'),
(648, 2378, 1, 9, 'Yashee Marie Selmite Buendia', 'Sibling'),
(651, 195, 1, 0, '', ''),
(653, 899, 1, 8, 'GLADYS A. NIELES', 'Sibling'),
(655, 1883, 1, 8, 'Rownan Gabriel T. Sancio', 'Sibling'),
(657, 1847, 1, 9, 'Angel C. Misajon', 'Sibling'),
(661, 370, 1, 9, 'Princess Jennel S. Parreño', 'Sibling'),
(662, 464, 1, 0, 'none', ''),
(663, 863, 1, 10, 'Luz Anne Fracine G. Baya', 'Sibling'),
(664, 391, 1, 11, 'Danielle Ingrid A. Deaño', 'Sibling'),
(665, 391, 1, 9, 'Aaron Gabriel A. Deaño', 'Sibling'),
(666, 2344, 1, 12, 'John Kester R. Ame', 'Relative'),
(667, 193, 1, 9, 'Gen Amier N. Va-ay', 'Sibling'),
(668, 433, 1, 8, 'Jhandrea Melody Loot De Pedro', 'Sibling'),
(670, 408, 1, 7, 'Vinz Michael P. Monsale ', 'Sibling'),
(671, 1926, 1, 11, 'Yesha Cassidee M. Porras', 'Relative'),
(672, 310, 1, 10, 'EL REY GABRIEL NIELES GUILLANO', 'Sibling'),
(673, 1109, 1, 10, 'Renzo Miguel Justalero Nava', 'Sibling'),
(675, 862, 1, 11, 'SYRAH NICOLE SAPIO', 'Relative'),
(676, 2775, 1, 12, 'BEA ANGELA M. PAGO', 'Sibling'),
(678, 2177, 1, 12, 'Jessica Louise A Gonzalds', 'Sibling'),
(679, 967, 1, 10, 'Light Christian R. Ginon', 'Sibling'),
(680, 248, 1, 9, 'Mohini Kate G. Paris', 'Sibling'),
(681, 1854, 1, 10, 'Theo Ange Salvador Ngu', 'Sibling'),
(682, 1204, 1, 10, 'Noan Archy A. Sa-onoy', 'Sibling'),
(684, 1024, 1, 11, 'Krisha Marie D. Granzo', 'Sibling'),
(685, 381, 1, 8, 'GEBIE BERONG ', 'Relative'),
(686, 238, 1, 8, 'Aldred Dryx H. Luto', 'Sibling'),
(689, 610, 1, 10, 'Justin Ryan S. Jover', 'Relative'),
(690, 1810, 1, 7, 'Paulo Oscar D. Golveo', 'Sibling'),
(691, 1438, 1, 11, 'Keisha Marie D. Granzo', 'Sibling'),
(692, 1119, 1, 12, 'Maven Abegail Billones', 'Sibling'),
(693, 803, 1, 11, 'Reign Elexir P. Jover', 'Sibling'),
(699, 1490, 1, 8, 'Corleone Angelo C. Amada', 'Sibling'),
(700, 1040, 1, 12, 'Mark Justine Peñaflor Baldeviso', 'Relative'),
(701, 1476, 1, 10, 'Antonia L. Laniog', 'Sibling'),
(702, 1476, 1, 12, 'John Michael L. Tamudtamud', 'Relative'),
(703, 691, 1, 0, 'Nicole Gwen Guillergan', 'Sibling'),
(704, 1476, 1, 8, 'Julie Rose B. Trambulo', 'Relative'),
(705, 2264, 1, 11, 'ANIZA ANGELA P. BELARMINO', 'Relative'),
(706, 1034, 1, 0, 'NA', ''),
(709, 2579, 1, 9, 'Aeira Safira Alolod', 'Sibling'),
(710, 1336, 1, 11, 'Hannah R. Talabucon', 'Sibling'),
(711, 1450, 1, 8, 'Scarlett Gabrielle G. Ramos', 'Sibling'),
(712, 1450, 1, 9, 'Tristan Draven G. Ramos', 'Sibling'),
(713, 1988, 1, 8, 'Neon Jan C. Labordo ', 'Relative'),
(714, 917, 1, 12, 'Kris Ashwony M. Gurung', 'Sibling'),
(715, 703, 1, 0, '', ''),
(716, 2607, 1, 8, 'Jobelle Gregorios Enicola', 'Sibling'),
(717, 1841, 1, 7, 'Tyeisha Cayden B. Mande', 'Sibling'),
(718, 970, 1, 11, 'Antonio Fernando B. Jacoba', 'Sibling'),
(722, 714, 1, 9, 'Julliana J. Duetes', 'Sibling'),
(723, 1833, 1, 10, 'Lakshmi Premal Limpin', 'Sibling'),
(724, 751, 1, 0, 'Christine May T. Cruz', 'Parent'),
(726, 592, 1, 10, 'Florielyn H. Ortez', 'Sibling'),
(727, 700, 1, 7, 'Jea Maxenne Panizales ', 'Sibling'),
(728, 565, 1, 9, 'Niel Rose Jimena', 'Sibling'),
(729, 702, 1, 12, 'Carmille Lorraine Villanueva Apil', 'Sibling'),
(730, 583, 1, 10, 'EMMANUEL HERNANDEZ ', 'Sibling'),
(733, 583, 1, 7, 'John Christian Hernandez', 'Sibling'),
(735, 843, 1, 12, 'Brix Cezar. Ballesteros ', 'Sibling'),
(736, 2197, 1, 12, 'Jerylle H. Jinon', 'Sibling'),
(737, 434, 1, 7, 'Luther James Dela Cruz ', 'Sibling'),
(738, 712, 1, 7, 'Jay Carl F. Cepe', 'Sibling'),
(739, 2594, 1, 12, 'Nicole P. Catequista', 'Sibling'),
(742, 161, 1, 12, 'Daniel Jan C. Papa', 'Sibling'),
(743, 819, 1, 10, 'REYJUN ASUERO TADEA', 'Relative'),
(744, 425, 1, 10, 'PET CHARMAINE B. AZARCON', 'Sibling'),
(746, 2155, 1, 7, 'April Joy Peñalver', 'Relative'),
(747, 2036, 1, 12, 'Jenny Grace Amoto Ticot', 'Sibling'),
(748, 2268, 1, 7, 'Gian Carlo L. Quiambao', 'Sibling'),
(749, 2723, 1, 12, 'Marc Jericho Agravante Sulpico', 'Sibling'),
(752, 746, 1, 9, 'Randzy B. Barlas', 'Sibling'),
(754, 1995, 1, 11, 'RAHAILYN BAGUL CAMPONG ', 'Relative'),
(755, 768, 1, 9, 'Harold Jan C. Sanchez', 'Sibling'),
(758, 1896, 1, 9, 'Joseph Miguel F. Terem', 'Sibling'),
(759, 2556, 1, 11, 'Jolit Paulo Jayme Quinsat', 'Relative'),
(760, 2601, 1, 0, 'None', ''),
(762, 1041, 1, 0, '', ''),
(763, 789, 1, 9, 'jazmine marce arsulo', 'Sibling'),
(766, 2601, 1, 0, 'None', ''),
(768, 354, 1, 9, 'Eunice R. Macatuay', 'Sibling'),
(769, 2219, 1, 9, 'Rachelle C. Maghari', 'Relative'),
(770, 2007, 1, 9, 'Mark Brent H. Mongao', 'Sibling'),
(771, 2007, 1, 8, 'Carl Jason H. Mongao', 'Sibling'),
(772, 734, 1, 10, 'Louie John Demonteverde', 'Sibling'),
(773, 855, 1, 11, 'Irene Joanne B. Nardo', 'Sibling'),
(774, 733, 1, 7, 'HANZ GABRIEL PIAD BEDIA', 'Sibling'),
(775, 2203, 1, 11, 'Elton Gabriel B. Landero', 'Sibling'),
(776, 2327, 1, 12, 'Apple J. Yabut', 'Sibling'),
(777, 2514, 1, 12, 'MAC LAURENCE PUERTO PEN', 'Sibling'),
(778, 870, 1, 8, 'MA. ARNI J. GELVERO', 'Sibling'),
(779, 2364, 1, 12, 'Kathlyn May Bales Occiano', 'Relative'),
(780, 2050, 1, 12, 'Reddick Richmond Pestano Abelarde', 'Sibling'),
(781, 1670, 1, 7, 'Dominiq Louryn, Sumilhig, Calanza', 'Sibling'),
(783, 1644, 1, 7, 'Luke Emmanuel pestaño Abelarde', 'Sibling'),
(784, 955, 1, 7, 'PENOSCAS, RHIAN PALLER', 'Relative'),
(787, 272, 1, 10, 'Alquin Kim G. Valguna', 'Sibling'),
(788, 822, 1, 9, 'Kristoffer De los Reyes', 'Sibling'),
(789, 854, 1, 11, 'AG HOPE MONGCAL', 'Sibling'),
(790, 2154, 1, 12, 'Timothy Carl Peter J. Feliciano', 'Sibling'),
(791, 2154, 1, 12, 'Alexia Roma J. Jaranilla', 'Relative'),
(793, 868, 1, 11, 'Jolence G. Gamino', 'Sibling'),
(795, 2667, 1, 8, 'James Daniel O. Alimo-ot', 'Sibling'),
(796, 890, 1, 11, 'EULYSSES IVAN AMBITO', 'Sibling'),
(797, 226, 1, 9, 'Meagan Lieselotte A. Hobar', 'Sibling'),
(798, 865, 1, 9, 'FELYSHIA NELROS MONICA J. PO', 'Sibling'),
(800, 781, 1, 9, 'Kasey Lynn P. Durana', 'Sibling'),
(801, 2376, 1, 7, 'Sheena Hope Jomillo Buala', 'Sibling'),
(804, 2151, 1, 12, 'Chaldean Fabia', 'Sibling'),
(805, 647, 1, 8, 'donovan aguilos', 'Sibling'),
(806, 647, 1, 9, 'yancy donn aguilos', 'Sibling'),
(807, 1369, 1, 8, 'DENISE E. MARANON', 'Sibling'),
(808, 1188, 1, 11, 'Alayssa Janine Ruiz Yepes', 'Sibling'),
(810, 115, 1, 0, 'NA', ''),
(812, 2701, 1, 10, 'Divine John Juros', 'Sibling'),
(814, 1532, 1, 12, 'GHEZHA ANN J. RECATE', 'Relative'),
(817, 2321, 1, 8, 'Akeisha Jayne U. Hautea', 'Relative'),
(818, 307, 1, 8, 'Celeine C. Gendrala', 'Sibling'),
(822, 2249, 1, 9, 'Hyacinth Joy H. Palmaira ', 'Sibling'),
(823, 2249, 1, 10, 'Hanie Mae H. Palmaira ', 'Sibling'),
(824, 2084, 1, 9, 'GWYNETH MYLE BELAS', 'Sibling'),
(825, 882, 1, 7, 'Marish Giergos Saul', 'Sibling'),
(829, 882, 1, 11, 'Mercy Giergos Saul', 'Sibling'),
(831, 2756, 1, 12, 'Renz Dominic R. Sola', 'Sibling'),
(833, 2333, 1, 10, 'George Jr. Acidre', 'Sibling'),
(837, 418, 1, 0, 'None', ''),
(838, 905, 1, 11, 'Allysa Nicole S. Abido', 'Sibling'),
(839, 2245, 1, 7, 'Kevin Dave Paches', 'Sibling'),
(840, 2069, 1, 12, 'Cedrick Josh B. Araña', 'Sibling'),
(841, 2110, 1, 9, 'FRANCIS DAVE T. CASTOR', 'Sibling'),
(842, 1337, 1, 8, 'Kurt Evan S. Tono', 'Sibling'),
(843, 418, 1, 0, 'None', ''),
(844, 1914, 1, 12, 'Rhoda C. Allosa', 'Sibling'),
(845, 1914, 1, 8, 'Girolyn C. Allosa', 'Sibling'),
(849, 1102, 1, 9, 'YRINNA LYAJOY T. JUANICO ', 'Sibling'),
(850, 1653, 1, 8, 'Shyn N.\\ Duran', 'Sibling'),
(851, 1340, 1, 11, 'Daniella Marie B. Araña', 'Sibling'),
(853, 916, 1, 9, 'Chantelle S Gumia', 'Sibling'),
(854, 2126, 1, 7, 'Julienne Denise A. Deaño', 'Sibling'),
(855, 2126, 1, 9, 'Aaron Gabriel A. Deaño', 'Sibling'),
(858, 926, 1, 11, 'ALEXA D. PANES', 'Sibling'),
(859, 924, 1, 7, 'Rhiane', 'Sibling'),
(860, 2395, 1, 7, 'Glenn Rashid D. Cezar ', 'Sibling'),
(861, 1319, 1, 12, 'Renz Ronan S. Alto', 'Relative'),
(862, 400, 1, 12, 'Trisha Noreen H. Saavedra', 'Sibling'),
(863, 2640, 1, 11, 'Christan C. Recaña', 'Relative'),
(864, 2647, 1, 12, 'Joshua D. Panes', 'Sibling'),
(865, 2229, 1, 8, 'Jhon Dale Subong Mercado', 'Sibling'),
(866, 2648, 1, 12, 'Cristina Gail C. Paredes', 'Sibling'),
(867, 439, 1, 8, 'Daniel G. Exito', 'Sibling'),
(868, 439, 1, 9, 'Justine James G. Exito', 'Sibling'),
(869, 2372, 1, 8, 'Blaza Renz John S. ', 'Sibling'),
(872, 1809, 1, 8, 'Praize Pearl P. Godilano ', 'Sibling'),
(873, 1809, 1, 9, 'Marc Lenard A. Borbon', 'Relative'),
(874, 1809, 1, 8, 'Rhian Rose P. Godilano ', 'Relative'),
(876, 932, 1, 11, 'carl angelo suatin', 'Sibling'),
(877, 932, 1, 10, 'cyril necole suatin', 'Sibling'),
(879, 2807, 1, 12, 'Aia Joyce Ballesteros', 'Sibling'),
(882, 2757, 1, 12, 'Julia J. Daliva', 'Relative'),
(892, 2698, 1, 8, 'Chyna Janyl A. Jemina', 'Sibling'),
(893, 1021, 1, 9, 'Ella Marie Estomo', 'Sibling'),
(894, 1021, 1, 10, 'Austin Gabriel Estomo', 'Sibling'),
(895, 1055, 1, 8, 'Adrian A. Vigil', 'Sibling'),
(896, 1044, 1, 9, 'MARK EMMAN AZUCENA', 'Sibling'),
(897, 1628, 1, 8, 'Wence Maryelle Auro', 'Relative'),
(898, 1044, 1, 9, 'JOHN CHRISTIAN AZUCENA', 'Sibling'),
(899, 1044, 1, 7, 'RAFAEL RIGOR AZUCENA', 'Sibling'),
(900, 386, 1, 11, 'ROCHELLE CLAIRE DATO-ON AGOT', 'Sibling'),
(901, 431, 1, 11, 'Alejandro Andrie T. Caelian', 'Sibling'),
(902, 1633, 1, 11, 'Jersey Lei Kyle Occiano Bastiero', 'Relative'),
(903, 2549, 1, 8, 'PRINCESS LE K. QUIATCHON', 'Sibling'),
(904, 1542, 1, 11, 'Gracee Eve G. Aguilos', 'Sibling'),
(905, 2146, 1, 9, 'John Hannah G. Esmael', 'Sibling'),
(909, 1176, 1, 11, 'Via fye Mlimit ,lanado ', 'Sibling'),
(910, 1652, 1, 7, 'Yjohan Ronell H Domingo ', 'Sibling'),
(911, 1790, 1, 8, 'ALEXA LOUISE A. ERFE', 'Sibling'),
(912, 1790, 1, 10, 'SAMANTHA VENNICE A. ERFE', 'Sibling'),
(913, 1790, 1, 9, 'ZAHR AUSTIN NICOLI A. PAMPLONA', 'Relative'),
(914, 1790, 1, 10, 'ZIANNE YZZABELLE A. PAMPLONA', 'Relative'),
(927, 994, 1, 11, 'Athaliah Praise Ansino Zerrudo', 'Sibling'),
(930, 1167, 1, 9, 'ARLYN G. DORONILA', 'Sibling'),
(931, 1158, 1, 8, 'Samantha Territorio', 'Sibling'),
(933, 1106, 1, 3, 'Carlos Joe M. Magcumot', 'Sibling'),
(935, 1158, 1, 10, 'Gian Miguel Territorio', 'Sibling'),
(938, 383, 1, 8, 'Ron Daniel Quirante ', 'Sibling'),
(939, 383, 1, 9, 'Ron Arniel Quirante ', 'Sibling'),
(943, 482, 1, 9, 'Frankie Grace Nolla', 'Sibling'),
(944, 2306, 1, 12, 'Honey R. Talabucon', 'Sibling'),
(945, 282, 1, 7, 'Jadah dawn B. Taguas', 'Relative'),
(946, 450, 1, 10, 'Ramaah Ular G. Parman', 'Sibling'),
(947, 1475, 1, 11, 'Regina Nicole Afu Gonzales', 'Sibling'),
(949, 2850, 1, 8, 'Christian Dave A. Dagandara', 'Relative'),
(951, 1567, 1, 8, 'Princess Jennel S. Parreño', 'Relative'),
(952, 2517, 1, 9, 'FHIONA JANE PILLO ', 'Relative'),
(953, 411, 1, 0, '', ''),
(954, 1629, 1, 10, 'Andiane Gallardo ', 'Sibling'),
(955, 2215, 1, 10, 'Eve Florence Camilla C. Macalalag', 'Sibling'),
(956, 362, 1, 10, 'Jen Mark Alolod ', 'Sibling'),
(957, 2215, 1, 7, 'Paulo Joaquin Marion C. Macalalag ', 'Sibling'),
(960, 2855, 1, 0, 'None', ''),
(961, 2575, 1, 12, 'Ethan Jhev Garingo Aguilos', 'Sibling'),
(962, 290, 1, 11, 'Angel Faith Jomillo Buala', 'Sibling'),
(963, 1630, 1, 11, 'STEVEN VON PENUELA HOMICILLADA ', 'Sibling'),
(965, 1624, 1, 8, 'Emayriel D. Cayanan', ''),
(966, 1624, 1, 9, 'Dyma C. Norbe', 'Relative'),
(967, 2299, 1, 12, 'Paula Emmanuel S. Gamlanga ', 'Relative'),
(968, 1624, 1, 9, 'Annegrace D. Cayanan', 'Relative'),
(969, 1624, 1, 10, 'Francis D. Cayanan', 'Relative'),
(970, 1624, 1, 12, 'Kart Justine Tingson', 'Relative'),
(971, 1625, 1, 9, 'Jemima Magdalene Claret ', 'Sibling'),
(972, 428, 1, 9, 'Lilia cherzen Mae borbon', 'Sibling'),
(973, 1615, 1, 7, 'Ralph Martin M. Tano', 'Sibling'),
(976, 2618, 1, 12, 'Francene Nadine Gamarcha Galleron', 'Sibling'),
(977, 2842, 1, 12, 'Charles Joseph Jakosalem', 'Relative'),
(981, 1371, 1, 10, 'Andrei Curt E. Parita', 'Sibling'),
(982, 422, 1, 10, 'Jessie Emmanuel Zarah', 'Sibling'),
(983, 422, 1, 8, 'Jerome Ansbert Zarah', 'Sibling'),
(984, 422, 1, 0, 'John Paula Zarah', 'Sibling'),
(985, 422, 1, 0, 'Jeliel Franze Zarah', 'Sibling'),
(986, 422, 1, 0, 'Nemia Villareal', 'Relative'),
(987, 422, 1, 0, 'Marydith Zarah', 'Parent'),
(988, 2410, 1, 10, 'Renzel John Dongon', 'Sibling'),
(991, 2820, 1, 10, 'Karen D. CAjuyong ', 'Relative'),
(992, 2439, 1, 10, 'KIRK RIZEN T. BACABAC', 'Relative'),
(993, 2845, 1, 11, 'Marc Daniel P.Mucho', 'Sibling'),
(994, 309, 1, 8, 'miguel c. go', 'Sibling'),
(995, 309, 1, 10, 'gabriel c. go', 'Sibling'),
(997, 2851, 1, 12, 'Mark Louise Husmillo ', 'Sibling'),
(1031, 380, 1, 9, 'John Carlo Maglantay', 'Sibling'),
(1032, 380, 1, 12, 'Diego Patrick Maglantay ', 'Sibling'),
(1034, 1263, 1, 11, 'LUIZ HERNANDO T. SALPIN', 'Relative'),
(1035, 1607, 1, 7, 'John D. Molina ll', 'Sibling'),
(1037, 1261, 1, 12, 'Marygold O. Sitchon', 'Sibling'),
(1042, 428, 1, 9, 'Lilia cherzen Mae borbon', 'Sibling'),
(1043, 1262, 1, 12, 'Jewelmary Odon Sitchon', 'Sibling'),
(1044, 2827, 1, 9, 'Adriel Elexus L. Balberona', 'Sibling'),
(1045, 2311, 1, 9, 'Keith Clarence G. Terrenal', 'Sibling'),
(1046, 1669, 1, 9, 'Kenshi C. Acebuche', 'Sibling'),
(1047, 1754, 1, 8, 'Ellisha S. Cabanda', 'Sibling'),
(1048, 1669, 1, 8, 'Sheene C. Acebuche', 'Sibling'),
(1049, 1736, 1, 9, 'KRISTOFF FRANZ ARCEÑA', 'Sibling'),
(1050, 2239, 1, 8, 'Jessa Mae Baguna Obillo ', 'Sibling'),
(1051, 2081, 1, 8, 'Dorwin Clyde Bantad', 'Sibling'),
(1056, 1203, 1, 12, 'Kris Andrew Rivera', 'Sibling'),
(1057, 2569, 1, 8, 'KIAH GRACE D. VILLARAN', 'Sibling'),
(1058, 1253, 1, 9, 'CJ Vince S. Mendoza', 'Sibling'),
(1060, 1728, 1, 7, 'Renz Adrian D. Agot', 'Sibling'),
(1061, 1639, 1, 11, 'Kian Fernandez Villa', 'Relative'),
(1062, 1636, 1, 7, 'Charles Enojo Pentojo', 'Sibling'),
(1063, 1776, 1, 12, 'Mignon Bien Q. Defante', 'Sibling'),
(1064, 312, 1, 7, 'Josie Ann M. Hojilla', 'Sibling'),
(1067, 2288, 1, 10, 'Earl John J. Casa', 'Relative'),
(1068, 1608, 1, 9, 'MARY MAE PEARL E. MOSQUERA ', 'Sibling'),
(1073, 2171, 1, 9, 'Jasmin Gravela Garmay', 'Sibling'),
(1075, 2458, 1, 9, 'BEATRIZ ANGELICA P. JUDERIAL', 'Sibling'),
(1078, 2379, 1, 10, 'FLORENCE DOMINIC A. BUSIL', 'Sibling'),
(1084, 2823, 1, 8, 'Ashley Nicole Jovero Adorable ', 'Sibling'),
(1085, 1685, 1, 11, 'MARY THERESA SOLIVEL ALCANTARA', 'Sibling'),
(1086, 1637, 1, 8, 'Tristan Genesis D. Romero', 'Sibling'),
(1088, 1492, 1, 9, 'Lili Kristyn D. Balbiran', 'Sibling'),
(1090, 1796, 1, 10, 'Joriz Arvie Delgado Firmeza ', 'Sibling'),
(1092, 2705, 1, 7, 'Princes Angel M. Mampo', 'Sibling'),
(1093, 2026, 1, 8, 'Princess Yzabelle P. Ruiz', 'Sibling'),
(1094, 1773, 1, 9, 'Peter Angelo L. Dagon', 'Sibling'),
(1096, 2189, 1, 7, 'Marish Mey S. Indoc', 'Sibling'),
(1097, 1426, 1, 11, 'RENEE ANTONETTE ZEN T. BELINARIO', 'Sibling'),
(1100, 2525, 1, 11, 'Rouver B. Regacho', 'Sibling'),
(1101, 1207, 1, 12, 'ANGELO L. BAYOT', 'Sibling'),
(1103, 1643, 1, 10, 'Jillien T. Abcede', 'Sibling'),
(1105, 2251, 1, 7, 'J\'ANNE KEILA I. PAMPLONA ', 'Sibling'),
(1107, 2833, 1, 9, 'Princess Julianne Overio Hilado', 'Relative'),
(1108, 1407, 1, 10, 'Zyrhyn Klyrz Rapiz', 'Sibling'),
(1109, 1407, 1, 8, 'Zywhyn Klymz B. Rapiz', 'Sibling'),
(1113, 1215, 1, 8, 'RIANNA KAYE G. GONCE', 'Relative'),
(1114, 1252, 1, 11, 'Mariah Anika P. Amar', 'Relative'),
(1115, 270, 1, 7, 'MARY MIA P. TUBIDA', 'Sibling'),
(1117, 1409, 1, 7, 'Elexie Jhan B. Regalado', 'Sibling'),
(1118, 1414, 1, 8, 'Nicole Therese S. Fabros', 'Sibling'),
(1119, 1393, 1, 8, 'Joreyns B. Bilbao', 'Sibling'),
(1120, 353, 1, 9, 'antoine louisse yngson', 'Sibling'),
(1121, 2347, 1, 8, 'Alyssa Shane Germino Anating', 'Sibling'),
(1122, 2217, 1, 7, 'Dan Rhey De la Torre Magbanua ', 'Sibling'),
(1124, 2433, 1, 9, 'Khazandra Ysabelle Bandada Gindap', 'Sibling'),
(1127, 485, 1, 0, 'Maria Jeny Allanic Caluste ', 'Sibling'),
(1128, 2430, 1, 10, 'Xandy Adriel Andrade', 'Relative'),
(1129, 2204, 1, 11, 'Crissal Jiemy B. Landero', 'Sibling'),
(1131, 2660, 1, 10, 'Allen Paul P. Sombrea', 'Sibling'),
(1132, 2182, 1, 9, 'Kelly Aine Cuales Guion', 'Sibling'),
(1133, 2450, 1, 12, 'Riza Marie Penuela Homicillada ', 'Sibling'),
(1134, 1724, 1, 12, 'MA. ERICA JADE B. ABOLUCION', 'Sibling'),
(1136, 2718, 1, 8, 'Felyn Faith Goro Sanchez', 'Sibling'),
(1137, 2079, 1, 7, 'Mary Renee Fatima D. Balgoma', 'Sibling'),
(1138, 2079, 1, 11, 'Rheta Roae Balgoma', 'Sibling'),
(1139, 1945, 1, 8, 'Arabela Therese M. Cercado', 'Sibling'),
(1140, 2108, 1, 9, 'Aya J. Casandra', 'Sibling'),
(1142, 2666, 1, 12, 'Jannele Faith Zerrudo', 'Sibling'),
(1143, 2330, 1, 7, 'Willrose Garcia Ysulan', 'Sibling'),
(1145, 2451, 1, 9, 'Diana Ferje Hormigoso', 'Sibling'),
(1146, 2109, 1, 11, 'Al lorenz Embang ', 'Relative'),
(1148, 1838, 1, 12, 'Althea Jamolo Magsipoc', 'Relative'),
(1151, 1937, 1, 8, 'Krystian Kyle Delima', 'Sibling'),
(1152, 2118, 1, 7, 'Gloannah Vel Cosip', 'Sibling'),
(1154, 1917, 1, 12, 'Ces Akira P. Labordo', 'Relative'),
(1156, 2350, 1, 9, 'Wayne Andrei Dillera Anuevo', 'Sibling'),
(1159, 2309, 1, 12, 'Arshan Luise Sabitero Caragayan', 'Relative'),
(1160, 266, 1, 8, 'Tyreel Zoe Bautista Suplico', 'Sibling'),
(1161, 459, 1, 12, 'Akiesha krizyl  E Parita', 'Relative'),
(1162, 2380, 1, 11, 'Ern Claurence A. Busil', 'Sibling'),
(1164, 2502, 1, 8, 'Winlea Enoy Paguntalan', 'Sibling'),
(1167, 1686, 1, 7, 'Jael Andrea Sarringo Arroyo', 'Sibling'),
(1171, 1920, 1, 9, 'Dyann Jayne D. Arroyo', 'Sibling'),
(1173, 2440, 1, 9, 'Nyah Raine A Guevarra', 'Sibling'),
(1174, 441, 1, 8, 'Tristan Dyz Caleb A. Generato', 'Sibling'),
(1175, 1764, 1, 7, 'Klyde Norman E. Capre ', 'Sibling'),
(1176, 2207, 1, 0, 'Mary Mae M. Lavado', 'Sibling'),
(1177, 2207, 1, 0, 'Mary Margaret M. Lavado', 'Sibling'),
(1178, 2207, 1, 0, 'Mica Mae M. Lavado', 'Sibling'),
(1179, 1846, 1, 8, 'Akesha Olga Mercadero', 'Relative'),
(1182, 2466, 1, 11, 'Mary Therese C. Magcanam', 'Relative'),
(1183, 1963, 1, 7, 'Angel Sudayon Flores', 'Sibling'),
(1185, 279, 1, 7, 'Akyrah R. Arim', ''),
(1190, 2230, 1, 10, 'Pinky T. Mirasol ', 'Sibling'),
(1200, 2815, 1, 0, 'None', ''),
(1201, 273, 1, 7, 'James Gabriel Ventura', 'Sibling'),
(1202, 2834, 1, 10, 'Wylie Roy Eola ', 'Sibling'),
(1203, 2834, 1, 11, 'Jesecca Marcella Eola', 'Sibling'),
(1204, 337, 1, 10, 'Herminia Jones Y. Ponce', 'Sibling'),
(1205, 427, 1, 9, 'Peter John D. Bayasca', 'Sibling'),
(1206, 401, 1, 11, 'Joshua David Montinola', 'Relative'),
(1207, 443, 1, 10, 'JAMES BENJAMIN LENCIOCO GRECIA', 'Relative'),
(1208, 2154, 1, 12, 'Vassili Xavier J. Jabanag', 'Relative'),
(1209, 2835, 1, 11, 'Marjorie Evan', 'Sibling'),
(1210, 2835, 1, 0, 'Myline V. Inson', 'Parent'),
(1211, 2835, 1, 0, 'Joemarie C. Evan', 'Parent'),
(1212, 2835, 1, 0, 'Lara i. evan', 'Sibling'),
(1213, 206, 1, 11, 'KRISHYL DYNE ESPINO CAPRE', 'Sibling'),
(1220, 375, 1, 11, 'Dionne Mae Bagaforo', 'Sibling'),
(1221, 375, 1, 9, 'Jeamille Anne Bagaforo', 'Sibling'),
(1222, 375, 1, 9, 'Janrence Theo Bagaforo', 'Sibling'),
(1225, 2604, 1, 11, 'Altea Mae Diaz', 'Sibling'),
(1226, 313, 1, 8, 'Kevin Eduard A. Jagonio', 'Sibling'),
(1227, 2583, 1, 9, 'Marian Banila', 'Sibling'),
(1229, 25, 1, 11, 'ARNIE RIAN GUILLERGAN JAMINDANG', 'Sibling'),
(1231, 325, 1, 8, 'Raychelle N. Mesias', 'Sibling'),
(1232, 435, 1, 8, 'Krizel Japitana Dela Rosa ', 'Sibling'),
(1233, 321, 1, 7, 'KATHLEENE KAYE D. MARTIN ', ''),
(1234, 374, 1, 10, 'John Paul Roi S. Toque', 'Sibling'),
(1235, 1589, 1, 0, '', ''),
(1236, 1589, 1, 0, '', ''),
(1237, 1947, 1, 9, 'John Angelo L. Dajay', 'Sibling'),
(1238, 2478, 1, 8, 'Laureese Alliyah Belle A. Mande ', 'Sibling'),
(1240, 2063, 1, 10, 'LORENZ ADRIAN GANANCIAL', 'Relative'),
(1241, 2247, 1, 12, 'Avril L. Padilla', 'Sibling'),
(1242, 2720, 1, 8, 'Sairah Brion Sarino', 'Sibling'),
(1243, 2377, 1, 9, 'JESSA MAY Y. BUARON', 'Sibling'),
(1244, 2377, 1, 8, 'KRIZZA MAE B. BALQUIN', 'Relative'),
(1249, 2365, 1, 10, 'Mary Jun F. Batilo', 'Relative'),
(1253, 271, 1, 7, 'JOANNA MARTHA P. TUBIDA', 'Sibling'),
(1255, 1708, 1, 8, 'SPJ D. PUNAY ', 'Sibling'),
(1259, 2103, 1, 11, 'Norjanisa Bagul Macasawang ', 'Relative'),
(1263, 2520, 1, 8, 'Mira Courtney O. Pungot', 'Sibling'),
(1267, 1944, 1, 8, 'Shantylle Deigh Lopez Celeste', 'Sibling'),
(1268, 2552, 1, 9, 'Hannah Laureen P. Tabor', 'Sibling'),
(1269, 2685, 1, 10, 'SCARLET HAILEY QUERO DEOCARES', 'Sibling'),
(1276, 2143, 1, 9, 'Alexis Nicole E. Facelo', 'Relative'),
(1277, 2388, 1, 8, 'Princess Nicole Quintila Ludas', 'Relative'),
(1278, 2387, 1, 12, 'JUDELYN PEDROSO CARTAGENA', 'Sibling'),
(1279, 2387, 1, 8, 'CRISTEL JOY PEDROSO CARTAGENA', 'Sibling'),
(1280, 2142, 1, 0, 'N/A', ''),
(1281, 1781, 1, 9, 'J-Lord Ianne C. Delfin', 'Sibling'),
(1283, 2746, 1, 9, 'Kirk Daniel L. Gaceres', 'Sibling'),
(1285, 1930, 1, 8, 'Joreyns B. Bilbao ', 'Sibling'),
(1286, 1930, 1, 12, 'Jhaysabel B. Bilbao', 'Sibling'),
(1288, 2644, 1, 12, 'CRISHA JANE BAWISAN NARDO', 'Sibling'),
(1289, 1906, 1, 9, 'Paulene Rose Yap', 'Sibling'),
(1293, 2590, 1, 9, 'KELLY HEART ACERBO CAPATID', 'Sibling'),
(1295, 2664, 1, 12, 'Bianca Allyson Valladolid', 'Sibling'),
(1298, 1990, 1, 10, 'King Jones D. Lavapie ', 'Sibling'),
(1301, 1824, 1, 9, 'Althea Beatrice B. Jandonero', 'Sibling'),
(1302, 1837, 1, 10, 'SOFIA JULLIANA C. LAYOG', 'Relative'),
(1304, 2766, 1, 12, 'Whelz Danylle Aplasca', 'Sibling'),
(1305, 1737, 1, 9, 'Kim Xian Jude C. Arcena', 'Sibling'),
(1306, 1678, 1, 9, 'Gavin Mark L. Jaudian', 'Sibling'),
(1314, 2429, 1, 12, 'Art john Gabales Gamino', 'Sibling'),
(1315, 1948, 1, 8, 'Aziel Frank F. De La Mar', 'Sibling'),
(1322, 2163, 1, 7, 'Kyle F. Jacildo', 'Relative'),
(1323, 2267, 1, 8, 'Angel Mae Z. Putong ', 'Sibling'),
(1325, 2393, 1, 8, 'Gerli J. Celeste', 'Sibling'),
(1327, 2406, 1, 8, 'Marc Jacob De Asis', 'Sibling'),
(1328, 2354, 1, 10, 'Rhianne Abrazado', 'Relative'),
(1332, 2357, 1, 9, 'Mary Jasmine S. Baes', 'Sibling'),
(1336, 2779, 1, 9, 'Wella Angelique Hale Langi', 'Sibling'),
(1337, 2459, 1, 12, 'Lester M. Labrador', 'Relative'),
(1338, 2585, 1, 12, 'Zandrew Binas', 'Sibling'),
(1339, 2368, 1, 7, 'LANCE B. BELMONTE', 'Sibling'),
(1341, 2435, 1, 9, 'Clarice Joy L. Go', 'Sibling'),
(1342, 2415, 1, 10, 'Anja Beatrix Espulgar', 'Sibling'),
(1344, 2474, 1, 12, 'Kris Ashwony Magno Gurung', 'Relative'),
(1346, 2474, 1, 12, 'Kris Anthony Magno Gurung', 'Relative'),
(1347, 2457, 1, 12, 'Allana Issyl Gaelle Jover', 'Sibling'),
(1348, 2448, 1, 9, 'Jann Nomar P. Hidalgo', 'Sibling'),
(1349, 2363, 1, 8, 'Vhennice Andrea Gimulgada Bastareche', 'Sibling'),
(1357, 2172, 1, 11, 'FLORENCE MARGARETTE JALBUENA PEÑALOSA', 'Relative'),
(1360, 2434, 1, 10, 'Gian Yosef M Girao ', 'Sibling'),
(1363, 2550, 1, 7, 'Izra Ashieko Sulpico', 'Sibling'),
(1364, 2567, 1, 9, 'MECA LEONESA VALLEJERA ', 'Sibling'),
(1366, 2401, 1, 8, 'MARIA JOLEN B. DAJOTOY', 'Sibling'),
(1370, 2534, 1, 9, 'Denise Pauleen C. Salanio', 'Sibling'),
(1371, 2529, 1, 9, 'Kristoff Don C. Robles', 'Sibling'),
(1373, 2869, 1, 9, 'Mary Franjhen Delfin Sonido', 'Sibling'),
(1374, 2015, 1, 11, 'Therese Frances Marie Catalan', 'Relative'),
(1375, 2050, 1, 8, 'Luke Emmanuel Abelarde', 'Sibling'),
(1376, 2086, 1, 8, 'Clyde Jeremy S. Belo', 'Sibling'),
(1377, 2060, 1, 7, 'Rohan Angelo Amador', 'Sibling'),
(1378, 2095, 1, 3, 'ZYRA CATHRINE CAJAYON', 'Sibling'),
(1380, 2102, 1, 10, 'Ulrich John Saude', 'Relative'),
(1381, 1985, 1, 7, 'Arnold Eldeo Jamindang ', 'Sibling'),
(1382, 2328, 1, 9, 'Zyron Nash M. Yap', 'Relative'),
(1384, 2190, 1, 9, 'Shewn Roniel T. Jacela', 'Sibling'),
(1385, 2222, 1, 8, 'Titus Grae O. Malaga', 'Sibling'),
(1386, 2162, 1, 7, 'Andrea Gail P. Frias', 'Sibling'),
(1387, 2038, 1, 9, 'KIIP JOAQUIN D. TOLENTINO', 'Sibling'),
(1388, 2164, 1, 12, 'Dianna Mae Bandola Gabayeron', 'Sibling'),
(1390, 1904, 1, 10, 'Julienne Dominique Arañador Villanueva', 'Sibling'),
(1391, 2187, 1, 12, 'Lanch Cosipie Hilay', 'Sibling'),
(1392, 1904, 1, 8, 'Jillian Lorraine Arañador Villanueva ', 'Sibling'),
(1393, 2318, 1, 8, 'Jun Ysmael Tuala', 'Sibling'),
(1394, 2053, 1, 12, 'Rommel Carl Agre', 'Sibling'),
(1395, 2186, 1, 0, 'jane dayap hibionada', 'Parent'),
(1396, 2124, 1, 7, 'Rhainne de los Santos', 'Sibling'),
(1397, 2207, 1, 0, 'Lavado, Ronald Sr. G.', 'Parent'),
(1398, 2207, 1, 0, 'Lavado, Linda M.', 'Parent'),
(1399, 2173, 1, 9, 'HYACINTH B. GEROCHE', 'Relative'),
(1400, 2292, 1, 8, 'Jhonmar Velasco Severo', 'Sibling'),
(1401, 1828, 1, 10, 'Eugene G. Labordo', 'Sibling'),
(1403, 2138, 1, 11, 'Rolen Paul P. Dongon', 'Sibling'),
(1404, 2159, 1, 7, 'Jacynth Mischa B Francisco', 'Sibling'),
(1405, 2133, 1, 9, 'Johanna Kamille Villialva', 'Relative'),
(1406, 2244, 1, 12, 'FRANCINE JENN FACON', 'Sibling'),
(1407, 2165, 1, 9, 'Jamilla Ira Locsin Gabor', 'Sibling'),
(1408, 2025, 1, 8, 'Angel Lynne C. Juarez ', 'Relative'),
(1409, 2233, 1, 8, 'Maria Ysabella T. Moscoso', 'Sibling'),
(1412, 2241, 1, 8, 'Daniela Charis Ong', 'Sibling'),
(1420, 1964, 1, 12, 'Rommel P. Gabriel Jr.', 'Sibling'),
(1421, 2141, 1, 10, 'Rae Cedric Ellaga', 'Sibling'),
(1422, 2200, 1, 7, 'MARCO LURICH C. JUSAYAN', 'Sibling'),
(1424, 2158, 1, 9, 'CHRIST IAN', 'Sibling'),
(1426, 1717, 1, 11, 'Ian Christian Cañonero Valencia', 'Sibling'),
(1427, 2296, 1, 8, 'ZYRIEL LOIE C. SIVA', ''),
(1428, 2250, 1, 9, 'KENT ADRIAN S. PAMA', 'Sibling'),
(1431, 2210, 1, 9, 'Jomel Kent Lignig', 'Sibling'),
(1437, 2678, 1, 9, 'ESHEIKHEL B. CARNATE', 'Sibling'),
(1439, 1735, 1, 12, 'WRECHEL FLORIZZE G. ARANETA', 'Sibling'),
(1440, 1733, 1, 7, 'MARIA BEATRIZ ROSARIO TARROSA AMOR', 'Sibling'),
(1441, 1818, 1, 8, 'Ashley Grace P. Hilaga', 'Sibling'),
(1442, 2868, 1, 12, 'Vince Kirby Vito', 'Sibling'),
(1443, 2686, 1, 12, 'Alanah Grace V. Divinagracia', 'Sibling'),
(1444, 1975, 1, 12, 'Luzalie Ann S. Gonzales', 'Sibling'),
(1445, 2735, 1, 9, 'Janrence Theo Bagaforo ', 'Sibling'),
(1446, 2735, 1, 9, 'Jeamille Anne Bagaforo ', 'Sibling'),
(1447, 2682, 1, 10, 'MEGAN ZOI M. DALISAY', 'Sibling'),
(1448, 2289, 1, 10, 'Ishana A. Sarasola', 'Relative'),
(1449, 2574, 1, 12, 'Enna Marie Abangan ', 'Sibling'),
(1452, 2665, 1, 12, 'ARIANNE JADE RUIZ YEPES', 'Sibling'),
(1453, 2684, 1, 9, 'Joseph A. Deasio III', 'Sibling'),
(1454, 1859, 1, 8, 'Luis Manuel L. Paglinawan', 'Sibling'),
(1456, 1949, 1, 8, 'Azrieylle Jourdain G. de la Peña', 'Sibling'),
(1458, 1994, 1, 11, 'Joril G. Llamado', 'Sibling'),
(1459, 1809, 1, 7, 'Renzen Jude P. Godilano', 'Sibling'),
(1461, 1962, 1, 8, 'James Fernandez', 'Sibling'),
(1462, 1932, 1, 8, 'Yanna Marie A. Buen', 'Sibling'),
(1463, 1980, 1, 9, 'Ethan James C. Hallares', 'Sibling'),
(1468, 2023, 1, 8, 'KURT F. QUINONES', 'Sibling'),
(1469, 2014, 1, 12, 'Jaylord Jamela Ordinal', 'Sibling'),
(1472, 2034, 1, 8, 'Chelsea Tan', 'Relative'),
(1473, 2654, 1, 9, 'Michael Vhonn Salpin', 'Sibling'),
(1474, 2646, 1, 12, 'PATRICIA R. OLPENDA', 'Sibling'),
(1475, 2224, 1, 12, 'Ernie Jojo Bendol', 'Relative'),
(1476, 2408, 1, 11, 'Andrea Mae Diaz', 'Sibling'),
(1477, 2593, 1, 10, 'Zuelyka Castro', 'Sibling'),
(1478, 2652, 1, 9, 'Alexa Sabia', 'Sibling'),
(1479, 2000, 1, 12, 'JC Harry Manera', 'Sibling'),
(1481, 2614, 1, 11, 'JELOU JUDE ELGARIO', 'Relative'),
(1482, 2587, 1, 12, 'Ayeisha Marielle Patricia B. Sansolis', 'Relative'),
(1487, 2605, 1, 8, 'Zybs Ryvm Cabangal Donesa', 'Sibling'),
(1488, 2622, 1, 7, 'Leian Delagente', 'Relative'),
(1489, 2636, 1, 11, 'Jerimee Llamado', 'Sibling'),
(1490, 2707, 1, 12, 'Shaira Joy Menguillo', 'Sibling'),
(1492, 2676, 1, 1, 'Ma. Alexa Caelian', 'Sibling'),
(1493, 2030, 1, 8, 'Jasreal  S. Tugado', 'Sibling'),
(1496, 1967, 1, 10, 'GIAN MARTIN GALLINERO', 'Relative'),
(1497, 2099, 1, 8, 'Johann Meckial G. Calibo', 'Sibling'),
(1503, 2519, 1, 8, 'Precious Archenal Poral', 'Relative'),
(1504, 2687, 1, 11, 'John Kyiete V. Divinagracia', 'Sibling'),
(1505, 2687, 1, 12, 'Alanah V. Divinagracia', 'Sibling'),
(1506, 2727, 1, 10, 'KYLE VILLA', 'Sibling'),
(1507, 2708, 1, 12, 'Hera Carole Mongcal', 'Sibling'),
(1508, 2708, 1, 9, 'Kursty Mongcal', 'Sibling'),
(1511, 2693, 1, 10, 'Kher Edward E. Hinojales', 'Sibling'),
(1513, 2878, 1, 10, 'Esarmae Yrrani F. Regotea ', 'Sibling'),
(1514, 2638, 1, 10, 'Krystal Heart P. Manzon', 'Sibling'),
(1516, 2533, 1, 12, 'francine claire saladar', 'Sibling'),
(1517, 1878, 1, 8, 'Christian Dave Salontoy', 'Sibling'),
(1519, 1798, 1, 10, 'Jealyn Alijah O. Sonza', 'Relative'),
(1520, 1876, 1, 10, 'Shanieka Ciel Salinas', 'Sibling'),
(1521, 2764, 1, 9, 'MAERSK OEM ORIARTE VILLANUEVA', 'Sibling'),
(1522, 1730, 1, 10, 'krislyn Joy N. Alamo', 'Sibling'),
(1523, 1882, 1, 9, 'Erica Kaitlin Arancillo Sarabia', 'Sibling'),
(1524, 1898, 1, 10, 'Abigail Dawn G. Tongson', 'Sibling'),
(1528, 2770, 1, 8, 'Jie Reck Brillantes', 'Relative'),
(1529, 488, 1, 8, 'Gavin Josh F. Jaranilla', 'Sibling'),
(1532, 2768, 1, 11, 'Chayan Carl Sadia', 'Relative'),
(1533, 2748, 1, 12, 'Rolan Luis Lagutan', 'Sibling'),
(1534, 2753, 1, 8, 'Elielle Ann Jeco Nicor', 'Sibling'),
(1545, 1472, 1, 12, 'Jestine Espulgar Duclay', 'Relative'),
(1583, 1393, 1, 11, 'Joshua B. Bilbao', 'Sibling'),
(1585, 2896, 1, 11, 'Hannah May J. Amador', 'Sibling'),
(1588, 3192, 1, 11, 'Christy Jessa M. Olandesca', 'Relative'),
(1590, 3131, 1, 8, 'Ianmarl Vincent Macariza', 'Sibling'),
(1591, 3012, 1, 0, '', ''),
(1592, 3072, 1, 0, '', ''),
(1594, 3072, 1, 0, '', ''),
(1595, 3050, 1, 10, 'Lorenzo Tingson Garcia', 'Sibling'),
(1596, 3020, 1, 10, 'Razel Ann Marcial Escullar', 'Sibling'),
(1598, 1189, 1, 11, 'Reniel Agre', 'Sibling'),
(1599, 3243, 1, 9, 'Von Jibril M. Superable', 'Sibling'),
(1602, 3027, 1, 0, '', ''),
(1607, 3236, 1, 7, 'John Michael Brillantes', 'Relative'),
(1610, 3041, 1, 10, 'Rayne Fervie Z. Vargas', 'Relative'),
(1614, 3023, 1, 7, 'DAVE ALBERT B. ESPINOSA', 'Parent'),
(1615, 3156, 1, 0, 'None', ''),
(1618, 3169, 1, 11, 'Ernhel John J. Orense', 'Sibling'),
(1620, 2970, 1, 0, '', ''),
(1621, 1256, 1, 12, 'Precious Margarette B. Peñaranda', 'Relative'),
(1623, 3073, 1, 0, 'NONE', ''),
(1624, 1244, 1, 9, 'Francine Beatrix G. Talaban', 'Relative'),
(1626, 3237, 1, 0, 'None', ''),
(1627, 2949, 1, 11, 'Dioscere Gabriel Alanan', 'Relative'),
(1628, 1205, 1, 7, 'Phi Sun', 'Sibling'),
(1630, 2989, 1, 11, 'REY CARL B DE LOS SANTOS', 'Sibling'),
(1631, 3108, 1, 10, 'Davie Ann J. Joquiño ', 'Sibling'),
(1632, 3152, 1, 0, 'None', ''),
(1633, 3068, 1, 9, 'Angel Hycinth C. Gonzales', 'Sibling'),
(1634, 1195, 1, 10, 'Guilo Cesari Gajo', 'Sibling'),
(1637, 3107, 1, 8, 'Christel joy jinon', 'Sibling'),
(1638, 1228, 1, 9, 'JOHN ROHANNE BASALE', 'Relative'),
(1639, 1228, 1, 9, 'RALPH JOHANNE BASALE', 'Relative'),
(1640, 3214, 1, 8, 'BRENT JOHN A. PALENCIA', 'Relative'),
(1641, 2887, 1, 12, 'James Laurence A. Aguilar', 'Sibling'),
(1642, 2924, 1, 10, 'Kristina Angela D. Barabona', 'Sibling'),
(1645, 3107, 1, 8, 'Christel joy jinon', 'Sibling'),
(1646, 3147, 1, 11, 'DAVE HENRI GARGANERA MECUANDO', 'Sibling'),
(1647, 1249, 1, 9, 'Sabrina Alexa B. Harder', 'Sibling'),
(1649, 3209, 1, 12, 'Ann Ysabel L. Rubiato', 'Sibling'),
(1651, 3057, 1, 10, 'Khendee Cassandra O. Gebucion', 'Sibling'),
(1653, 3300, 1, 12, 'Danielle Gail S. Selera', 'Sibling'),
(1655, 3279, 1, 11, 'Rylet Twinkle Garcia Ysulan ', 'Sibling'),
(1656, 1320, 1, 10, 'Antonette Rose N. Baltazar', 'Sibling'),
(1657, 1192, 1, 10, 'Honey Claire Basco', 'Sibling'),
(1658, 3098, 1, 12, 'Aljan Alcedo Janas', 'Sibling'),
(1661, 3266, 1, 9, 'Alfred James D. de Mesa', 'Relative'),
(1666, 2927, 1, 8, 'RAJ VIJAY BARREL', 'Relative'),
(1667, 3197, 1, 11, 'Saleh Cier A. Barrios', 'Relative'),
(1668, 1391, 1, 12, 'Rene Areño', 'Relative'),
(1669, 3197, 1, 0, 'Aprilyn B. Alvarado', 'Relative'),
(1672, 2881, 1, 7, 'Josh Armer M. Abanto', 'Sibling'),
(1673, 3045, 1, 0, '', ''),
(1674, 2905, 1, 10, 'Teejay Gehan Flores ', 'Sibling'),
(1675, 2987, 1, 9, 'JOHN RC MIGUEL DE LA CRUZ', 'Sibling'),
(1676, 2898, 1, 0, 'N/A', ''),
(1677, 3045, 1, 8, 'Junella Mana-ay', 'Relative'),
(1679, 2911, 1, 8, 'Chesca Joy Penar', 'Relative'),
(1680, 2911, 1, 11, 'Mary Angela Dialo', 'Relative'),
(1682, 2914, 1, 12, 'Angelyn derla aurecencia', 'Sibling'),
(1685, 2911, 1, 0, 'JULIANA CALEIGH SORONGON ASONG', 'Sibling'),
(1686, 1400, 1, 7, 'Xeraiah Elijah M. Laranja', 'Sibling'),
(1689, 3165, 1, 9, 'Trevor Alexis M. Obe', 'Relative'),
(1692, 3180, 1, 0, 'Kieth Panes', 'Relative'),
(1694, 2810, 1, 11, 'John Rey Yabut', 'Sibling'),
(1695, 3250, 1, 11, 'Adam Martin L. Tejwani', 'Sibling'),
(1697, 3217, 1, 0, '', ''),
(1698, 2883, 1, 0, '', ''),
(1699, 3242, 1, 12, 'Psi C. Sun', 'Sibling'),
(1700, 1444, 1, 8, 'Oen Isaac G. Lamis', 'Sibling'),
(1701, 3224, 1, 0, '', ''),
(1702, 2998, 1, 9, 'AYANNA DEPAKAKIBO ', 'Sibling'),
(1703, 3060, 1, 8, 'JAMIE CARMEL G. GENCIANEO', 'Sibling'),
(1705, 3065, 1, 11, 'Reizel Jade P. Godilano ', 'Sibling'),
(1706, 3065, 1, 8, 'Praize Pearl P. Godilano ', 'Sibling'),
(1707, 3243, 1, 0, 'Timothy adrien M. Superable', 'Sibling'),
(1708, 3243, 1, 0, 'Zev Ryan M. Superable', 'Sibling');
INSERT INTO `household_members_tbl` (`hm_id`, `stud_id`, `sy_id`, `grade`, `complete_name`, `hm_relationship`) VALUES
(1709, 3243, 1, 0, 'Rylle RV M. Superable', 'Sibling'),
(1712, 2928, 1, 9, 'Ainsley Lenaming Baruc', 'Sibling'),
(1714, 3087, 1, 0, '', ''),
(1715, 3014, 1, 8, 'Viczenun C. Echona', 'Sibling'),
(1719, 3201, 1, 12, 'ELEKTRA JHAME B. REGALADO', 'Sibling'),
(1722, 3032, 1, 9, 'PATRICIA ABIGAIL N. FEBRADA', 'Sibling'),
(1723, 2909, 1, 12, 'Cedric Klein Arroyo', 'Sibling'),
(1727, 3151, 1, 10, 'Iphan Paul B. Montelijao', 'Sibling'),
(1728, 3019, 1, 0, '', ''),
(1730, 2970, 1, 0, '', ''),
(1734, 3005, 1, 0, '', ''),
(1738, 3215, 1, 0, '', ''),
(1739, 2937, 1, 0, '', ''),
(1741, 1713, 1, 8, 'Venz Paul A. Tibudan', 'Sibling'),
(1745, 3091, 1, 11, 'Marl Pabryll S. Indoc', 'Sibling'),
(1746, 2945, 1, 0, 'None', ''),
(1747, 3136, 1, 0, 'Ma. Lucia Solivio', 'Parent'),
(1749, 2939, 1, 7, 'CYD CLARICE HAUTEA', 'Relative'),
(1751, 3210, 1, 0, '', ''),
(1752, 3202, 1, 12, 'ALIEJOY PANO REGULA', 'Sibling'),
(1753, 2953, 1, 9, 'Tobe James Cantara', 'Sibling'),
(1755, 1478, 1, 9, 'JOSIAH JAN LIBANTE', 'Sibling'),
(1756, 3093, 1, 0, 'Ma.Khatelin R. Isiderio', 'Sibling'),
(1757, 3149, 1, 12, 'Shearesse Paula A. Miranda', 'Sibling'),
(1758, 1719, 1, 7, 'Sheasly Pauline A. Miranda', 'Sibling'),
(1759, 3256, 1, 9, 'Evanesence S. Tolentino', 'Sibling'),
(1760, 3071, 1, 12, 'Meljid Saimel Bayogos Guerrero', 'Sibling'),
(1761, 3167, 1, 10, 'Daniel D. Olvido ', 'Sibling'),
(1762, 1455, 1, 10, 'Realyn Medina', 'Sibling'),
(1764, 3084, 1, 9, 'Jann Nomar P. Hidalgo', 'Sibling'),
(1765, 3084, 1, 11, 'Ramer P. Hidalgo', 'Sibling'),
(1766, 3047, 1, 0, '', ''),
(1767, 3302, 1, 10, 'Devince S. Rando', 'Sibling'),
(1768, 3302, 1, 12, 'Aquia Kryz S. Rando', 'Sibling'),
(1769, 3110, 1, 11, 'LIANNA MANUELLE CASTAÑARES JUSAYAN', 'Sibling'),
(1771, 3152, 1, 0, 'None', ''),
(1772, 1495, 1, 12, 'Angelberth Espulgar', 'Relative'),
(1773, 1540, 1, 7, 'ALJADE REGULA', 'Sibling'),
(1774, 3074, 1, 9, 'Alexia Noreen T. Guijarno', 'Sibling'),
(1775, 3198, 1, 9, 'Jino T. Raganas', 'Sibling'),
(1776, 3153, 1, 8, 'Shem Ryle Pedrola', 'Relative'),
(1777, 3240, 1, 11, 'Roumel jr. ,sulpico L.', 'Sibling'),
(1778, 3223, 1, 8, 'FELIX CARL, ELVAS, SEGUIBAN III', 'Sibling'),
(1781, 3088, 1, 12, 'Jarend Stephen J. Huyaban', 'Sibling'),
(1783, 2967, 1, 12, 'Janiel F. Cepe', 'Sibling'),
(1785, 3128, 1, 0, '', ''),
(1788, 3246, 1, 9, 'Rhylyn Marie Compliza Talapi-an ', 'Sibling'),
(1791, 2963, 1, 0, '', ''),
(1792, 1463, 1, 11, 'Kenshin Señado', 'Relative'),
(1794, 1504, 1, 10, 'Ashley Mae Gelacio Centino', 'Sibling'),
(1795, 1515, 1, 10, 'Miegen Reyes', 'Sibling'),
(1796, 1517, 1, 7, 'MIKAELA KAIYER ESPURA', 'Relative'),
(1797, 1605, 1, 11, 'Lara Katrice Lagutan', 'Sibling'),
(1798, 3268, 1, 9, 'MARY JOAN S. VICTORIANO', 'Sibling'),
(1801, 1631, 1, 8, 'JENNY FIONA', 'Relative'),
(1802, 1635, 1, 7, 'Michael John Pendon', 'Sibling'),
(1803, 1638, 1, 8, 'Micah James Sugino', 'Sibling'),
(1806, 1526, 1, 8, 'Fermay Dawn Faigones', 'Sibling'),
(1808, 3150, 1, 9, 'Aziel Frank de la Mar', 'Relative'),
(1809, 3150, 1, 11, 'Frank Ezekiel de la Mar', 'Relative'),
(1810, 3208, 1, 11, 'Ezekiel martin S.Rosento', 'Relative'),
(1812, 3162, 1, 0, 'None', ''),
(1815, 2946, 1, 0, '', ''),
(1816, 1555, 1, 9, 'John Sean Novilla', 'Relative'),
(1818, 2890, 1, 9, 'Miskee Louise R. Agupalo', 'Sibling'),
(1821, 1560, 1, 11, 'John Michael Lavalle', 'Relative'),
(1822, 1603, 1, 11, 'Jerald Jinon', 'Sibling'),
(1823, 1562, 1, 10, 'Frenche Marie Balgoma', 'Sibling'),
(1824, 1570, 1, 11, 'Kenneth Gellado', 'Sibling'),
(1825, 1562, 1, 8, 'Mary Renee Fatima Balgoma', 'Sibling'),
(1826, 1649, 1, 11, 'Angelica Nicole S. Biñas', 'Sibling'),
(1827, 1662, 1, 11, 'Revster B. Regacho ', 'Sibling'),
(1828, 3226, 1, 9, 'JOHN CARLO H. SEVILLA', 'Sibling'),
(1833, 1602, 1, 10, 'Lenard Jayme', 'Relative'),
(1834, 1704, 1, 11, 'Chrysel Ann Juson', 'Sibling'),
(1839, 3264, 1, 10, 'Krisha D. Usalla', 'Sibling'),
(1842, 1721, 1, 11, 'Rockie James R. Saladar', 'Sibling'),
(1843, 1682, 1, 8, 'Sybel Cassandra Tse Wing', 'Sibling'),
(1844, 1682, 1, 10, 'Kurt Leovince Tse Wing', 'Sibling'),
(1845, 2954, 1, 11, 'Ma Alexandra Rupenta Cantollino ', 'Sibling'),
(1846, 1702, 1, 7, 'Miah Gracel Huyaban', 'Sibling'),
(1847, 1699, 1, 11, 'Princess Zarich Hilay', 'Sibling'),
(1852, 3287, 1, 11, 'Meljid Saimel B. Guerrero', 'Sibling'),
(1854, 3011, 1, 0, 'None', ''),
(1855, 3157, 1, 7, 'Shantal May P. Carboledo', 'Relative'),
(1856, 3003, 1, 9, 'MA. ANGELICA ROSEDEL A. DIDELES ', 'Sibling'),
(1857, 3148, 1, 8, 'John Wildon G. Yiu', 'Relative'),
(1858, 3277, 1, 0, '', ''),
(1861, 3249, 1, 12, 'Ren Mark M. Tano', 'Sibling'),
(1862, 2947, 1, 12, 'Maria Consuelo S. Calanza', 'Sibling'),
(1864, 3044, 1, 12, 'JULIA CRISTINE ACAS GALINO', 'Sibling'),
(1865, 3076, 1, 0, 'N/A', ''),
(1866, 2993, 1, 8, 'Ianne J G. Delallarte', 'Sibling'),
(1868, 3187, 1, 9, 'Fhiona jane P. Pillo', 'Sibling'),
(1871, 3272, 1, 12, 'Chloe Marie R. Villanueva ', 'Sibling'),
(1872, 3272, 1, 10, 'Audrey Kyle R. Villanueva ', 'Sibling'),
(1875, 3154, 1, 10, 'Donie Rey F. Morit', 'Sibling'),
(1876, 3154, 1, 12, 'Daniel F. Morit', 'Sibling'),
(1879, 3139, 1, 11, 'Einmar M. Mampo', 'Sibling'),
(1880, 3006, 1, 7, 'Luke Edriel Lamsin Dizo', 'Sibling'),
(1881, 3213, 1, 8, 'Jaylla Bernadez Salavante', 'Sibling'),
(1882, 3001, 1, 10, 'Lescharmine Deslate', 'Sibling'),
(1883, 3001, 1, 12, 'Shugar Robles Ebro', 'Relative'),
(1884, 3297, 1, 0, 'Andrea Dale Fufunan', 'Sibling'),
(1885, 3297, 1, 0, 'Adrian Dale Fufunan', 'Sibling'),
(1890, 3132, 1, 0, '', ''),
(1895, 3183, 1, 0, '', ''),
(1896, 3257, 1, 9, 'ANGELO GAMPAY TONDO ', 'Sibling'),
(1897, 3072, 1, 0, '', ''),
(1898, 3138, 1, 9, 'Fritz John P. Mamar', 'Sibling'),
(1901, 1029, 1, 11, 'Christine Louise Jamolo Magsipoc', 'Relative'),
(1902, 3024, 1, 8, 'TRIZHA KIM B. ESPINOSA ', 'Sibling'),
(1905, 3024, 1, 0, 'EMMA B. ESPINOSA ', 'Parent'),
(1906, 3024, 1, 0, 'ROBERTO F. ESPINOSA JR.', 'Parent'),
(1910, 3301, 1, 8, 'Jhaustine Xyfelle Langrio De Pedro', 'Sibling'),
(1911, 3263, 1, 0, '', ''),
(1912, 3281, 1, 8, 'Clark Parreño Minglanilla', 'Relative'),
(1913, 2962, 1, 7, 'Rovel Zane castor', 'Sibling'),
(1914, 3293, 1, 11, 'Janelle Sandy L. Salazar', 'Relative'),
(1915, 2929, 1, 8, 'Fhritz Daniel T. Basal', 'Sibling'),
(1916, 2972, 1, 0, 'N/A', ''),
(1919, 3179, 1, 11, 'Nathalee Keith I. Pamplona', 'Sibling'),
(1924, 3018, 1, 9, 'Bea Delos Santos', 'Relative'),
(1925, 3174, 1, 0, 'N/A', ''),
(1928, 3262, 1, 8, 'Thia Masurca Umadhay', 'Sibling'),
(1933, 3276, 1, 8, 'FABIOLA CASSANDRA GARCIA', 'Relative'),
(1934, 3034, 1, 10, 'Maxin S. Flora', 'Sibling'),
(1940, 3293, 1, 11, 'Alfonzo P. Garcia', 'Relative'),
(1941, 2657, 1, 12, 'Sherwin Sid Sañol', 'Relative'),
(1943, 3055, 1, 0, '', ''),
(1944, 2904, 1, 10, 'Clarence Edrick B. Antiquiera', 'Sibling'),
(1946, 3227, 1, 0, '', ''),
(1947, 1683, 1, 8, 'Khate Keren M. Abellon', 'Sibling'),
(1949, 1483, 1, 0, 'Lorelyn Joy Parreno', 'Sibling'),
(1950, 1154, 1, 12, 'Michael Andrei C. Rivera', 'Sibling'),
(1953, 504, 1, 7, 'RENHEART CANTOLLINO', 'Sibling'),
(1954, 3290, 1, 12, 'Princess Jamela Loreno Claret', 'Sibling'),
(1955, 3290, 1, 9, 'Jamema Magdalen Claret', 'Sibling'),
(1956, 3196, 1, 9, 'Trisha Litz G. Quiling ', 'Sibling'),
(1957, 1692, 1, 10, 'Jesean James Cuenca', 'Sibling'),
(1958, 3184, 1, 10, 'Elijah B. Penas', 'Sibling'),
(1959, 2922, 1, 0, '', ''),
(1960, 3026, 1, 10, 'Dane Joaqui Estaya', 'Sibling'),
(1961, 2281, 1, 10, 'Rasheede Jimm Ruiz', 'Sibling'),
(1962, 908, 1, 7, 'Sheryl May Doyo', 'Relative'),
(1963, 1137, 1, 12, 'MARK JULIUS SALVADOR PROVIDO', 'Sibling'),
(1964, 3306, 1, 12, 'JOWANNE UR PAVILLON', 'Sibling'),
(1965, 2220, 1, 7, 'NATHALIA LORRAINE MAGNISER', 'Relative'),
(1966, 2220, 1, 12, 'TRACY JAMES MAGNISER ', 'Relative'),
(1970, 3298, 1, 12, 'Marivel Abaring', 'Parent'),
(1972, 3113, 1, 10, 'Hana Mae Emas', 'Sibling'),
(1976, 3180, 1, 9, 'KIT LAWRENCE S.  PANES ', 'Relative'),
(1977, 3114, 1, 0, '', ''),
(1978, 2970, 1, 7, '', ''),
(1979, 3048, 1, 10, 'KIERRA G. GAMPAY', 'Sibling'),
(1980, 2964, 1, 0, '', ''),
(1981, 2964, 1, 0, '', ''),
(1982, 311, 1, 0, '', ''),
(1984, 903, 1, 9, 'Brynce Andrie Villanueva', 'Relative'),
(1985, 3311, 1, 11, 'Virjunea Brisel P. Abelarde', 'Sibling'),
(1986, 3311, 1, 12, 'Reddick richmond P. Abelarde', 'Sibling'),
(1987, 3319, 1, 9, 'Ma. Angela C. Cordero', 'Sibling'),
(1988, 3321, 1, 10, 'Ruthdielle Mae T Flores', 'Relative'),
(1989, 3410, 1, 12, 'Stephen John Pamotillo Arbigoso', 'Sibling'),
(1990, 3315, 1, 12, 'Trishamariefaye S romero', 'Sibling'),
(1991, 3361, 1, 9, 'Zairah Kayene A. Cabrera', 'Sibling'),
(1992, 3323, 1, 10, 'Justin M. Macalipay', 'Sibling'),
(1993, 3322, 1, 12, 'Sarah Mahmoud G.  Hassan', 'Sibling'),
(1994, 3327, 1, 11, 'Jasmine Edangga ', 'Relative'),
(1995, 3325, 1, 9, 'Eleazar E. Paguntalan ', 'Sibling'),
(1997, 3487, 1, 9, 'Liyana A. Sarasola', 'Sibling'),
(1999, 3436, 1, 9, 'Mark Brent H. Mongao', 'Sibling'),
(2000, 3483, 1, 8, 'Jaleia T. Espinosa', 'Sibling'),
(2001, 3436, 1, 11, 'Anne Therese H. Mongao', 'Sibling'),
(2003, 3393, 1, 7, 'Jhon Carl I. Mariano', 'Sibling'),
(2004, 3393, 1, 7, 'Jonalyn Joy I. Mariano', 'Sibling'),
(2005, 3466, 1, 12, 'Vernie romvir c escorial', 'Sibling'),
(2006, 3622, 1, 12, 'JUDELYN PEDROSO CARTAGENA', 'Sibling'),
(2007, 3622, 1, 11, 'JADE PEDROSO CARTAGENA', 'Sibling'),
(2009, 4193, 1, 10, 'Jhewellle Rose T. Jacela', 'Sibling'),
(2010, 3371, 1, 12, 'LUIS MIGUEL V. CANJA', 'Sibling'),
(2011, 4190, 1, 12, 'Louise Ann P.Esteta', 'Sibling'),
(2012, 4159, 1, 0, '', ''),
(2013, 4201, 1, 10, 'ARYHA ELIJAH SAPHIRA FUSIN ABROT', 'Sibling'),
(2014, 4159, 1, 0, '', ''),
(2015, 4159, 1, 0, '', ''),
(2021, 4197, 1, 8, 'Akisha padesterio ', 'Sibling'),
(2022, 4188, 1, 9, 'Ahaziah Angel V. Brillantes', 'Sibling'),
(2023, 3434, 1, 10, 'Kelly Deniel M.De Vicente ', 'Sibling'),
(2025, 4173, 1, 11, 'John Kadie Stoff Bolido Bueno', 'Sibling'),
(2027, 4151, 1, 10, 'Khristain Vaughn Guaro Añes', 'Sibling'),
(2028, 3409, 1, 7, 'Mary Joy Francine Delfin Sonido', 'Sibling'),
(2031, 4212, 1, 11, 'Lance Reymar Poral Juderial', 'Sibling'),
(2034, 3424, 1, 0, '', ''),
(2036, 4227, 1, 12, 'ZUIGSAR V. BUGAYONG', 'Sibling'),
(2037, 3959, 1, 10, 'Dannyca Mae Paclibar ', 'Sibling'),
(2041, 4236, 1, 7, 'Roland Neil B. Samson', 'Sibling'),
(2042, 3920, 1, 12, 'John D. Molina Jr.', 'Sibling'),
(2043, 4187, 1, 7, 'Thiron Masurca Umadhay', 'Sibling'),
(2044, 4175, 1, 7, 'Jhazlene Belle De Pedro', 'Sibling'),
(2046, 4168, 1, 0, 'Not applicable ', ''),
(2047, 4278, 1, 8, 'Carl Jason H. Mongao', 'Sibling'),
(2048, 4278, 1, 11, 'Anne Therese H. Mongao', 'Sibling'),
(2049, 3336, 1, 9, 'Angeanah Viktoria R. Pagunaling', 'Sibling'),
(2051, 4209, 1, 10, 'Justin Ryan Jover', 'Relative'),
(2054, 3421, 1, 8, 'Vince Kesler Añes', 'Sibling'),
(2055, 3334, 1, 0, 'Oemor Ross Joerwin Geca Villanueva', 'Sibling'),
(2057, 4237, 1, 12, 'Joaquin Miguel T. Abcede', 'Sibling'),
(2058, 3860, 1, 12, 'Cyrill Jan Lecaniel ', 'Sibling'),
(2061, 3522, 1, 11, 'Mharita Villacote Alvarez', 'Relative'),
(2063, 4208, 1, 0, '', ''),
(2064, 3855, 1, 10, 'Gabriel L.Lapating', 'Sibling'),
(2065, 3542, 1, 11, 'KHARMELA COMPLIZA ARROYO ', 'Sibling'),
(2068, 3480, 1, 9, 'Samantha Nicole Mercurio Colon', 'Sibling'),
(2069, 4224, 1, 11, 'Jorge Maverick Acidre', 'Sibling'),
(2071, 4153, 1, 11, 'Micheal rey R. Arellano', 'Sibling'),
(2073, 3712, 1, 10, 'Jaleca T. Espinosa', 'Sibling'),
(2074, 3512, 1, 10, 'Cyra Kieth Y Alingalan', 'Sibling'),
(2076, 4002, 1, 8, 'Princess Jean L. Portosa', ''),
(2077, 3961, 1, 10, 'ZUEDER ZEE B. PADIOS', 'Sibling'),
(2079, 3673, 1, 9, 'Ahyeeza Lyn Deypalubos De La Cruz', 'Sibling'),
(2080, 4251, 1, 0, 'NA', ''),
(2081, 3984, 1, 12, 'ALLYSA PALLER BAGAYAN', 'Relative'),
(2082, 3351, 1, 8, 'Ken Arlou Sumalatar Arban', 'Sibling'),
(2087, 3802, 1, 9, 'John Patrick A. Villar', 'Sibling'),
(2088, 4244, 1, 8, 'Kaylie Angeline Cordero', 'Sibling'),
(2090, 4244, 1, 12, 'Kier Gabriel Cordero', 'Sibling'),
(2092, 4022, 1, 0, '', ''),
(2094, 4178, 1, 0, 'N/A', ''),
(2095, 3556, 1, 12, 'Jules Terence C. Azucena ', 'Sibling'),
(2096, 3897, 1, 0, '', ''),
(2097, 3556, 1, 10, 'Mark Emman C. Azucena ', 'Sibling'),
(2098, 3556, 1, 10, 'John Christian C. Azucena ', 'Sibling'),
(2100, 3879, 1, 0, 'Madeline Kyle Menisis Lozada', 'Sibling'),
(2101, 3841, 1, 0, '', ''),
(2104, 3759, 1, 7, 'JB Charles G. Gencianeo', 'Sibling'),
(2108, 4039, 1, 10, 'James Zhian S. Rubio', 'Sibling'),
(2109, 4039, 1, 10, 'Jetherlynn Joseph S. Erecre', 'Relative'),
(2112, 3701, 1, 11, 'Jo Mayla Gregorios Enicola', 'Sibling'),
(2113, 3380, 1, 9, 'Lorence Asoy Solmerano', 'Parent'),
(2115, 3642, 1, 11, 'Liam Rance D. Cezar', 'Sibling'),
(2119, 4066, 1, 9, 'Ulrich John B. saude', 'Sibling'),
(2123, 3601, 1, 10, 'Gayatri C. Broce', 'Sibling'),
(2124, 4268, 1, 10, 'Luis Maxim Montel', 'Sibling'),
(2125, 3406, 1, 7, 'KHRIZLEE A.MATIS', 'Sibling'),
(2127, 3808, 1, 0, '', ''),
(2128, 4202, 1, 10, 'Samantha Lynn Alvarez ', 'Relative'),
(2131, 3625, 1, 7, 'Reed Andrei Gelano Castellano', 'Sibling'),
(2133, 3931, 1, 12, 'MRY ANTOINETTE RAVEN G. MURCIA', 'Sibling'),
(2136, 3591, 1, 0, '', ''),
(2137, 3865, 1, 10, 'Ashley Ysabelle Leonares', 'Sibling'),
(2138, 3490, 1, 7, 'Jaliyah Aeril M. Abanto', 'Sibling'),
(2139, 3812, 1, 0, '', ''),
(2142, 3465, 1, 12, 'Vicente Noel P. Magbanua ', 'Sibling'),
(2143, 3552, 1, 8, 'Feli Xynia Dream Q. Assin', 'Sibling'),
(2144, 4051, 1, 9, 'Kyle Gerald T. Salon', 'Sibling'),
(2146, 3541, 1, 9, 'Saicy Beyonce Arrollado', 'Sibling'),
(2149, 3858, 1, 9, 'Charliemagne G. Laurea', 'Sibling'),
(2151, 3553, 1, 7, 'Ranzel Kim baron  Emboltorio ', 'Relative'),
(2152, 3784, 1, 10, 'Laica Glazel B.Guilab', 'Sibling'),
(2153, 3444, 1, 11, 'Roxanne P Labordo', 'Relative'),
(2155, 3495, 1, 10, 'Honey Belle Acejas', 'Sibling'),
(2156, 3882, 1, 0, '', ''),
(2157, 3835, 1, 10, 'Misty E. Jordan', 'Sibling'),
(2159, 3835, 1, 12, 'Snow Faith M. Escala', 'Relative'),
(2160, 4059, 1, 11, 'Andrea Junifer Tabaldo Sancio', 'Sibling'),
(2162, 3993, 1, 0, '', ''),
(2163, 3516, 1, 12, 'Jea Calinawagan Alipat ', 'Sibling'),
(2164, 3507, 1, 8, 'Rashin Alavi', 'Sibling'),
(2165, 4132, 1, 10, 'Juliene A. Vigil', 'Sibling'),
(2166, 4132, 1, 12, 'Richard A. Vigil', 'Sibling'),
(2170, 3443, 1, 8, 'Jonazel R. Condalor', 'Sibling'),
(2180, 4052, 1, 12, 'Yva Lousselle Salvado', 'Sibling'),
(2182, 3679, 1, 11, 'Krystel Kate Caniedo', 'Sibling'),
(2185, 3498, 1, 7, 'Faith Jovero Adorable ', 'Sibling'),
(2188, 3888, 1, 10, 'Daphnie Gaile Jucaban ', 'Relative'),
(2192, 3912, 1, 7, 'Jhon Dale Mercado ', 'Sibling'),
(2193, 3830, 1, 11, 'Charles Janryl A. Jemina', 'Sibling'),
(2196, 4001, 1, 8, 'Ma.Rosabelle Abainza Portacion', 'Sibling'),
(2198, 3458, 1, 7, 'Rhonel Jordan Jr', 'Sibling'),
(2199, 3698, 1, 0, '', ''),
(2201, 3771, 1, 7, 'Renzen Jude P. Godilano ', 'Sibling'),
(2203, 3771, 1, 11, 'Reizel Jade P. Godilano ', 'Sibling'),
(2204, 4010, 1, 9, 'Mariel A. Pumarin', 'Sibling'),
(2206, 3508, 1, 8, 'Kourosh Alavi ', 'Sibling'),
(2207, 3678, 1, 9, 'Rae leander D. Delgado', 'Sibling'),
(2212, 3809, 1, 0, '', ''),
(2213, 4108, 1, 8, 'Wayne Jhared C. Teruel, Methusela Reyn C. Teruel', 'Sibling'),
(2216, 4259, 1, 0, '', ''),
(2217, 3513, 1, 8, 'TERENCE JAN E. ALINGASA', 'Sibling'),
(2219, 4044, 1, 9, 'Jhuren Phillip D. Saladio', 'Sibling'),
(2223, 3911, 1, 11, 'Princess Mikaela Mercadero', 'Relative'),
(2224, 4029, 1, 9, 'Vince A.Robles', 'Sibling'),
(2226, 4053, 1, 10, 'LAICA ANGELA T. SALVADO', 'Sibling'),
(2227, 3752, 1, 10, 'ROBERT MIGUEL L. GARILVA', 'Sibling'),
(2228, 4080, 1, 10, 'ARIELLE ANTOINETTE SOLIANO', 'Sibling'),
(2229, 3890, 1, 11, 'Yeisha Faith O. Malaga', 'Sibling'),
(2230, 3375, 1, 10, 'Charles Justin B. De Amboy', 'Sibling'),
(2232, 4109, 1, 8, 'Asherina C. Teruel', 'Sibling'),
(2235, 3514, 1, 8, 'KIRK ZION E. ALINGASA', 'Sibling'),
(2237, 3971, 1, 12, 'Adrian B. Pancho', 'Sibling'),
(2238, 4040, 1, 11, 'Mary Angella P. Ruiz', 'Sibling'),
(2239, 3612, 1, 0, '', ''),
(2241, 3572, 1, 11, 'JUEM Y. BUARON', 'Relative'),
(2242, 3572, 1, 9, 'JESSA MAY Y. BUARON', 'Relative'),
(2244, 3572, 1, 7, 'KRYSTAL GAYLE B. BALQUIN', 'Sibling'),
(2245, 4138, 1, 11, 'Lishah Margaux Decrito Villaran', 'Sibling'),
(2247, 3570, 1, 0, '', ''),
(2249, 3612, 1, 0, '', ''),
(2253, 3746, 1, 10, 'MARY Angela Dela Rosa GAMARCHA', 'Sibling'),
(2257, 3781, 1, 0, '', ''),
(2261, 4067, 1, 11, 'Mercy Joy G. Saul', 'Sibling'),
(2262, 4067, 1, 12, 'John Christian G. Saul', 'Sibling'),
(2263, 3982, 1, 0, '', ''),
(2264, 3654, 1, 8, 'Shanel Jade J. Cordova', 'Sibling'),
(2265, 4256, 1, 9, 'MICAH ELLYSA B.VILLARINA', 'Relative'),
(2266, 4023, 1, 10, 'ZYRHYN KLYRZ B. RAPIZ', 'Sibling'),
(2268, 4017, 1, 11, 'BRIAN FERNANDEZ QUIÑONED', 'Sibling'),
(2269, 4114, 1, 9, 'Mary Fransheen B.Tolentino', 'Sibling'),
(2273, 3938, 1, 10, 'Ashlynn P. Noble', 'Sibling'),
(2274, 3803, 1, 10, 'Matt Christian S. Hojilla', 'Sibling'),
(2276, 4166, 1, 9, 'Leal Shane  p. Salcedo', 'Relative'),
(2277, 4012, 1, 10, 'Cremon Mir O. Pungot', 'Sibling'),
(2278, 4238, 1, 9, 'Samantha Ashley Original Argañoza', 'Relative'),
(2279, 3653, 1, 8, 'Shanel Vein J. Cordova', 'Sibling'),
(2281, 3364, 1, 12, 'Harold Ishmael Pe Benito Pacardo', 'Sibling'),
(2282, 3485, 1, 11, 'Gian Lester A. Nulla', 'Sibling'),
(2287, 4263, 1, 10, 'Althea Grace Mercurio Colon', 'Sibling'),
(2288, 4067, 1, 0, '', 'Parent'),
(2289, 4092, 1, 12, 'Cassandra Bernadyth I. Suyo', 'Sibling'),
(2290, 4033, 1, 12, 'Kirsten Clyde D. Romero', 'Sibling'),
(2293, 3799, 1, 11, 'Chuck Jules Hilasgue Sotillo', 'Relative'),
(2295, 3892, 1, 11, 'Edcin Collins Suatin', 'Sibling'),
(2301, 3683, 1, 12, 'MARIANNE AMOR S. DEQUILLA', 'Sibling'),
(2304, 3941, 1, 11, 'Jesirie Obillo ', 'Sibling'),
(2309, 3549, 1, 10, 'Precious Rubijane G. Aspera', 'Sibling'),
(2310, 3341, 1, 0, '', ''),
(2311, 3324, 1, 9, 'Kent Harold C. Ojeda', 'Sibling'),
(2316, 3454, 1, 7, 'Earl James Nolla Febrada', 'Sibling'),
(2317, 3662, 1, 11, 'KRIZEA ANNE SEVILLA DE ASIS', 'Sibling'),
(2321, 3711, 1, 0, '', ''),
(2324, 3751, 1, 11, 'Kyle Janzhen,G,Garcia', 'Sibling'),
(2326, 3630, 1, 0, '', ''),
(2327, 3926, 1, 11, 'Jan Antonia L. Morata', 'Sibling'),
(2329, 3762, 1, 10, 'Vanz Aicille Genit', 'Sibling'),
(2332, 3403, 1, 11, 'Jhaira Ace L. Ilisan', 'Sibling'),
(2333, 3606, 1, 12, 'KHRYZLE FAITH C. CABRIETO', 'Sibling'),
(2336, 3737, 1, 10, 'Selwyn T. Fuentespina ', 'Sibling'),
(2337, 3979, 1, 10, 'Angelique L. Peñaflorida', 'Sibling'),
(2341, 3726, 1, 12, 'Jerom Kyl Elicanal Faigones ', 'Sibling'),
(2343, 3471, 1, 9, 'Zahr Austin Nicoli Pamplona', 'Sibling'),
(2344, 3512, 1, 10, 'Cyra Kieth Y Alingalan', 'Sibling'),
(2348, 3463, 1, 11, 'Kezia Claire Pasilan Manzon', 'Sibling'),
(2349, 3770, 1, 12, 'Nathaniel Joseph D. Gobres', 'Sibling'),
(2350, 3770, 1, 10, 'Paul Tristan D. Gobres', 'Sibling'),
(2351, 3790, 1, 0, '', ''),
(2352, 3790, 1, 0, '', ''),
(2353, 3790, 1, 0, '', ''),
(2354, 4279, 1, 7, 'Chris Paul Panes', 'Relative'),
(2356, 4078, 1, 10, 'Heart Simpas ', 'Sibling'),
(2359, 3902, 1, 10, 'SHAN OLIVER BACONOWA MATILING', 'Sibling'),
(2363, 4283, 1, 11, 'Arnie Rain Jamindang ', 'Relative'),
(2364, 3594, 1, 12, 'Jhaysabel B. Bilbao', 'Sibling'),
(2365, 3594, 1, 11, 'Joshua B. Bilbao', 'Sibling'),
(2367, 4073, 1, 8, 'Vhon Zedrick A.Senibalo', 'Parent'),
(2368, 4073, 1, 8, 'Vhon Zedrick A.Senibalo', 'Parent'),
(2373, 3677, 1, 7, 'Jayne May Delallarte', 'Sibling'),
(2379, 4128, 1, 12, 'John Wynn L. Vargas', 'Sibling'),
(2380, 4291, 1, 9, 'Gian Lourenz Villarina daza', 'Relative'),
(2383, 3585, 1, 10, 'Tasha Marela  P.  Bela-ong', 'Sibling'),
(2386, 4229, 1, 12, 'Mikhael Jeff Gedorio', 'Sibling'),
(2387, 4011, 1, 12, 'Herson Matthew', 'Sibling'),
(2388, 3453, 1, 8, 'Alexa Louise Erfe', 'Sibling'),
(2390, 3733, 1, 11, 'Zendrix Morante Forrosuelo', 'Sibling'),
(2391, 3453, 1, 11, 'Brent Xian Gabriel Erfe', 'Sibling'),
(2398, 3894, 1, 0, '', ''),
(2399, 3894, 1, 0, '', ''),
(2400, 3894, 1, 0, '', ''),
(2401, 4013, 1, 11, 'Pia Beatriz Z. Putong', 'Sibling'),
(2403, 4005, 1, 0, '', ''),
(2405, 3967, 1, 10, 'JOHN ALDRIECH J. PALMA', 'Sibling'),
(2406, 3540, 1, 12, 'Lanz Peter Goodrich Arlos', 'Sibling'),
(2408, 3493, 1, 9, 'Jay Marie Pearl S. Gerona', 'Relative'),
(2410, 3955, 1, 7, 'Matthew Kyle pablo', 'Parent'),
(2411, 3792, 1, 11, 'Shekyna Angelie V. Uy', 'Relative'),
(2413, 3792, 1, 9, 'Julienne H. Mojana', 'Relative'),
(2414, 3792, 1, 10, 'Jovanna H. Mojana', 'Relative'),
(2415, 4018, 1, 9, 'Ron Arniel D. Quirante ', 'Sibling'),
(2416, 4110, 1, 12, 'Josh Andrei C. Tingson', 'Sibling'),
(2418, 3588, 1, 11, 'Chloe Dominique S Belo', 'Sibling'),
(2419, 3629, 1, 12, 'Sven P. Catalan', 'Sibling'),
(2420, 4089, 1, 9, 'Mace Rhianna A. Sumayo', 'Sibling'),
(2422, 4018, 1, 7, 'Chritz Joyce D. Quirante ', 'Sibling'),
(2423, 3781, 1, 0, '', ''),
(2424, 3684, 1, 9, 'Joeshiel  S. Descaya', 'Sibling'),
(2431, 3675, 1, 7, 'Samantha J. Dela Rosa ', 'Sibling'),
(2432, 3864, 1, 12, 'Louise Ann J. Legada', 'Sibling'),
(2433, 4155, 1, 10, 'Nathaly Jane Sabando', 'Relative'),
(2434, 3367, 1, 11, 'John Francis Basbaño Jalbuena', 'Sibling'),
(2436, 3857, 1, 12, 'Princess D. Latumbo ', 'Sibling'),
(2437, 3756, 1, 8, 'Christian Gedor Gomon', 'Sibling'),
(2438, 4219, 1, 9, 'KRIZZEL KIM AVENIDO RENDON', 'Parent'),
(2439, 3937, 1, 11, 'Elysha Carmel Jeco Nicor ', 'Sibling'),
(2440, 3592, 1, 7, 'Lyka mae maquirang', 'Relative'),
(2441, 3519, 1, 11, 'Kheyren C. Allosa', 'Sibling'),
(2442, 3519, 1, 12, 'Rhoda C. Allosa', 'Sibling'),
(2448, 4069, 1, 7, 'CANDICE VIEL E. SEGUIBAN', 'Sibling'),
(2449, 3696, 1, 7, 'Roter Baron Auditor ', 'Relative'),
(2450, 3788, 1, 10, 'Heindrix Philip Gullo ', 'Sibling'),
(2454, 3383, 1, 8, 'SABRINA MYLES B. BARNIZO', 'Sibling'),
(2457, 3342, 1, 9, 'JOSEPH RAYVIN B.  BARNIZO', 'Sibling'),
(2458, 3847, 1, 10, 'Marc Leojen Lacsi', 'Sibling'),
(2461, 3832, 1, 7, 'Jessa Nomelyn C.Jinon', 'Sibling'),
(2466, 3518, 1, 11, 'Ali Bader S. Allahow', 'Sibling'),
(2468, 3738, 1, 9, 'Christian Tumilba', 'Relative'),
(2473, 3768, 1, 7, 'Raphael Go', 'Sibling'),
(2474, 3768, 1, 10, 'Gabriel Go', 'Sibling'),
(2477, 3739, 1, 0, '', ''),
(2479, 3581, 1, 10, 'ALISTER JOHN M. BATISLA-ONG', 'Sibling'),
(2480, 4115, 1, 9, 'Gilo demi Tolledo ', 'Sibling'),
(2483, 3693, 1, 9, 'Ashley Cloriell G. Duma-up', 'Sibling'),
(2487, 3927, 1, 11, 'Leugin Jored Tan Moscoso', 'Sibling'),
(2496, 4230, 1, 10, 'Gabriel Go', 'Sibling'),
(2497, 4230, 1, 7, 'Raphael Go', 'Sibling'),
(2498, 4230, 1, 8, 'Miguel Go', 'Sibling'),
(2499, 3645, 1, 0, '', ''),
(2500, 3723, 1, 12, 'Cedrick Neil S. Fabros', 'Sibling'),
(2502, 3477, 1, 8, 'Rhianne Solidum', 'Sibling'),
(2503, 3488, 1, 9, 'christle a. vesagas', 'Relative'),
(2505, 3580, 1, 7, 'Ma. Alexandriah Aerian T. Basal', 'Sibling'),
(2507, 3457, 1, 9, 'TRISH CYBIL S. GRANDE', 'Sibling'),
(2508, 3457, 1, 12, 'KEISHA NICOLE S. GRANDE', 'Sibling'),
(2511, 6240, 1, 8, 'Izumi Nakagawa', 'Sibling'),
(2512, 6222, 1, 11, 'Queen Heart Lavapie', 'Sibling'),
(2514, 5965, 1, 8, 'Mary Carmille B. Tolentino', 'Sibling'),
(2515, 5836, 1, 7, 'Keion Enzo C. Gendrala', 'Sibling'),
(2516, 5940, 1, 7, 'JULLIENE PEARL S. LONGARES', 'Sibling'),
(2518, 5976, 1, 0, 'None', ''),
(2519, 5822, 1, 11, 'Gabrielle T. Tabuada', 'Sibling'),
(2521, 3479, 1, 9, 'John Eron M. Señerez', 'Sibling'),
(2522, 5755, 1, 7, 'Daven John M. Logronio', 'Sibling'),
(2525, 3461, 1, 9, 'Christian Floyd Arco', 'Relative'),
(2526, 4537, 1, 8, 'ANDRIE CHANNEL GALABO DUMA-UP', 'Sibling'),
(2527, 6221, 1, 12, 'Samantha Rae Jaena', 'Relative'),
(2528, 5955, 1, 12, 'Paul Ralph Doronila Gonzaga', 'Sibling'),
(2529, 5829, 1, 10, 'Josh Miguel H. Cornago', 'Sibling'),
(2531, 4855, 1, 0, '', ''),
(2532, 4729, 1, 7, 'Eubelle R. Macatuay', 'Sibling'),
(2534, 4543, 1, 0, '', ''),
(2535, 4641, 1, 11, 'Athena Ferje Hormigoso', 'Sibling'),
(2539, 4783, 1, 11, 'Anne Marie V. Berlin', 'Sibling'),
(2540, 4262, 1, 11, 'Aroen Angeliem Villanueva', 'Sibling'),
(2542, 3569, 1, 11, 'FRENCHE MARIE DE LA CRUZ BALGOMA', 'Sibling'),
(2543, 4859, 1, 7, 'Chritz Joyce D. Quirante ', 'Sibling'),
(2544, 3569, 1, 12, 'RHETA ROSE DE LA CRUZ BALGOMA', 'Sibling'),
(2545, 4859, 1, 8, 'Ron Daniel D. Quirante ', 'Sibling'),
(2546, 4618, 1, 10, 'Febie Lyza S. Grande', 'Sibling'),
(2547, 4943, 1, 11, 'Jessa Mae F. Terem', 'Sibling'),
(2548, 4618, 1, 12, 'Keisha Nicole S. Grande ', 'Sibling'),
(2549, 4636, 1, 9, 'Janiel Christian V. Hernandez ', 'Sibling'),
(2550, 6238, 1, 12, 'Remil Jhon Decrito Medina', 'Sibling'),
(2551, 6247, 1, 12, 'Rudolph Luke D. Torrefiel', 'Sibling'),
(2552, 3125, 1, 9, 'VHENICE GIFT LIBERO', 'Sibling'),
(2553, 5790, 1, 7, 'Rain B. Gito', 'Sibling'),
(2555, 3719, 1, 9, 'Jhayzer John Laureano Evangelista', 'Sibling'),
(2562, 4987, 1, 7, 'Novie Gen B. Villaruel', 'Sibling'),
(2563, 5998, 1, 8, 'Jhamylle H. Cornago', 'Sibling'),
(2564, 3641, 1, 0, 'None', ''),
(2565, 3429, 1, 10, 'Princess Jhevnacia S. Jallorina', 'Sibling'),
(2566, 5943, 1, 12, 'Franz Kristian Quanico', 'Sibling'),
(2567, 4538, 1, 0, '', ''),
(2569, 5886, 1, 7, 'Vince Phillip T. Manipol', 'Sibling'),
(2570, 4564, 1, 8, 'Arian Jean L. Evangelista', 'Sibling'),
(2571, 4545, 1, 7, 'Vic Zlother Echona', 'Sibling'),
(2572, 4315, 1, 9, 'Aeira Safira A. Alolod', 'Relative'),
(2573, 6244, 1, 9, 'Ianne Nicoale Fandagani Singlador ', 'Sibling'),
(2574, 5761, 1, 9, 'Yannis Kailey R. Tampo', 'Sibling'),
(2575, 5995, 1, 8, 'Carl Francis Ruiz Tampo', 'Sibling'),
(2577, 4524, 1, 7, 'SAMUEL A. DIDELES ', 'Sibling'),
(2578, 4981, 1, 8, 'Kyle Joseph V. Hiponia', 'Sibling'),
(2580, 4830, 1, 12, 'Janiah Pearl T. Pedrosa', 'Sibling'),
(2584, 3442, 1, 8, 'Pauline C. Alterado ', 'Sibling'),
(2585, 4392, 1, 10, 'Arielle Sierrah C. Biñas ', 'Sibling'),
(2592, 4975, 1, 8, 'Paul Cedric P. Villacasten', 'Sibling'),
(2595, 6477, 1, 8, 'Ma. Casandra C. Cordero', 'Sibling'),
(2602, 4437, 1, 7, 'Jersel Jace O. Cantara', 'Sibling'),
(2603, 6468, 1, 8, 'Frizza Marie C. Ojeda', 'Sibling'),
(2604, 6457, 1, 10, 'Shiara Antonette P. Barrera', 'Sibling'),
(2605, 6177, 1, 11, 'Chloe Jazciel Go', 'Sibling'),
(2607, 4381, 1, 11, 'ALIAH JETT NICOLE L. BELARMINO ', 'Sibling'),
(2608, 4381, 1, 10, 'ZACK DAVID L. BELARMINO ', 'Sibling'),
(2609, 4004, 1, 10, 'CHYNE PRAGADOS', 'Sibling'),
(2610, 6369, 1, 7, 'Sheene Acebuche ', 'Sibling'),
(2611, 6348, 1, 7, 'Jane Rose Abagatnan Jagonio', 'Sibling'),
(2615, 6400, 1, 12, 'Alena Victoria Lasanas', 'Sibling'),
(2616, 6180, 1, 7, 'Ethan Lucas Austria Hobar', 'Sibling'),
(2618, 6418, 1, 11, 'Om Shanti Limpin', 'Sibling'),
(2620, 6204, 1, 8, 'Fredah Neshel Flores', 'Sibling'),
(2621, 4665, 1, 10, 'Jayeshelle Emerald P. Jarcia', 'Sibling'),
(2622, 6465, 1, 10, 'Brian Kristofer Barabona', 'Relative'),
(2623, 6473, 1, 9, 'Janrence Theo Bagaforo ', 'Sibling'),
(2624, 6473, 1, 11, 'Dionne Mae Bagaforo ', 'Sibling'),
(2625, 6473, 1, 7, 'Florael Jade Bagaforo ', 'Sibling'),
(2628, 4899, 1, 10, 'Ishana A. Sarasola', 'Sibling'),
(2631, 6474, 1, 9, 'Ioan Gronopillio', 'Relative'),
(2633, 4577, 1, 10, 'Rexie Venice C Gabawa', 'Sibling'),
(2634, 5848, 1, 9, 'Maia Anyshka B. Espina', 'Sibling'),
(2635, 6270, 1, 9, 'neomi jercel jaleco', 'Relative'),
(2636, 6324, 1, 11, 'Carlos Louis L. Paglinawan', 'Sibling'),
(2638, 4550, 1, 0, 'None', ''),
(2639, 6296, 1, 11, 'Kharl Vincent G. Bastareche', 'Sibling'),
(2640, 4804, 1, 8, 'Anrold Benjamin R. Pagunaling', 'Sibling'),
(2641, 4228, 1, 12, 'Sam Ryan D. Cordova', 'Sibling'),
(2642, 6486, 1, 12, 'Yan Louiejay T. Juanico ', 'Sibling'),
(2644, 4951, 1, 0, '', ''),
(2645, 3384, 1, 12, 'Gabrielle Frances Therese D. Jorque', 'Sibling'),
(2646, 4753, 1, 12, 'Jcelle Seria Mendoza', 'Sibling'),
(2648, 5846, 1, 11, 'Kate Gabrielle A. Bano', 'Relative'),
(2649, 6269, 1, 8, 'Andree Mark L. Guevara', 'Sibling'),
(2650, 3365, 1, 10, 'John Paul K. Pasaporte', 'Sibling'),
(2651, 5808, 1, 12, 'Lorie Mae E. Marañon', 'Sibling'),
(2652, 5808, 1, 9, 'Adrian E. Marañon', 'Sibling'),
(2654, 6455, 1, 7, 'Florael Jade Bagaforo ', 'Sibling'),
(2655, 6455, 1, 9, 'Jeamille Anne Bagaforo ', 'Sibling'),
(2656, 6455, 1, 11, 'Dionne Mae Bagaforo ', 'Sibling'),
(2657, 4893, 1, 12, 'Lady Liamae T. Santiago', 'Sibling'),
(2658, 6310, 1, 12, 'Mary Rosary Katherine Batir Lao', 'Relative'),
(2659, 4893, 1, 10, 'Kaizen S. Clamor', 'Relative'),
(2662, 6456, 1, 11, 'Shan Rainneille Banila', 'Sibling'),
(2665, 3645, 1, 0, '', ''),
(2667, 5895, 1, 10, 'Hyacinth Gail Lelis Camarino', 'Sibling'),
(2669, 6411, 1, 8, 'Elim Francis Palacios Bela-ong', 'Sibling'),
(2670, 6378, 1, 11, 'Marianne Lythe G. Terrenal', 'Sibling'),
(2672, 6307, 1, 12, 'Zyra Lynne A. Nieles', 'Sibling'),
(2675, 6100, 1, 11, 'Brynt ZS C. Donesa', 'Sibling'),
(2676, 6459, 1, 9, 'Adrienne Gwen Hondonero Crucero', 'Relative'),
(2677, 6397, 1, 12, 'Ahron Joshua C. Cadiz', 'Sibling'),
(2678, 6102, 1, 10, 'Allyssa Nicole L. Guevara', 'Sibling'),
(2680, 5899, 1, 8, 'Zahir John B. Espina', 'Sibling'),
(2681, 3811, 1, 9, 'Lara A. Jabonillo', 'Sibling'),
(2683, 6478, 1, 8, 'Josh Xavier Crucero Biaca', 'Relative'),
(2684, 6115, 1, 0, '', ''),
(2685, 3849, 1, 10, 'Dominic Josh L. Regalario', 'Relative'),
(2686, 6170, 1, 11, 'Timothy Joseph S Belcena', 'Relative'),
(2687, 4731, 1, 0, '', ''),
(2688, 6161, 1, 12, 'Aellea P. Mercado ', 'Sibling'),
(2689, 4673, 1, 12, 'Mark Robert G. Jimena', 'Sibling'),
(2690, 3874, 1, 12, 'Katrina Magno Lopez', 'Sibling'),
(2693, 6135, 1, 11, 'Ruby Joy S. Blaza', 'Sibling'),
(2694, 6189, 1, 10, 'Yaneza Rian Fandagani Singlador ', 'Sibling'),
(2696, 3990, 1, 12, 'RYAN ANDREI PINTO', 'Sibling'),
(2697, 4371, 1, 7, 'Lhex Matthew Baruc', 'Sibling'),
(2698, 4192, 1, 10, 'Eirrean Princess B. Gumban', 'Relative'),
(2699, 6127, 1, 12, 'Leigh Ush Violet T. Silvestre', 'Sibling'),
(2701, 4663, 1, 7, 'Hillary Dexie Bein Silverio', 'Relative'),
(2702, 5217, 1, 8, 'Rafael Rigor Azucena ', 'Sibling'),
(2703, 5217, 1, 12, 'Jules Terence C. Azucena ', 'Sibling'),
(2704, 4109, 1, 10, 'Methusela Reyn C. Teruel', 'Sibling'),
(2705, 5217, 1, 10, 'Mark Emman C. Azucena ', 'Sibling'),
(2706, 6469, 1, 8, 'Winlea E Paguntalan ', 'Sibling'),
(2709, 4858, 1, 7, 'Mer Malien G. Quiling ', 'Sibling'),
(2710, 4663, 1, 7, 'Hillary Dexie Bein Silverio ', 'Relative'),
(2711, 6148, 1, 0, 'N/A', ''),
(2712, 5218, 1, 11, 'JULES TERENCE C. AZUCENA', 'Sibling'),
(2713, 5218, 1, 9, 'JOHN CHRISTIAN C. AZUCENA', 'Sibling'),
(2714, 4950, 1, 10, 'Carmel Marie Q. Torreblanca', 'Sibling'),
(2716, 5576, 1, 12, 'Shekinah Parle Jimenez', 'Sibling'),
(2719, 3636, 1, 11, 'Fitzgerald J. Celeste', 'Sibling'),
(2720, 4730, 1, 10, 'Cariza Kaye E. Macatuhay', 'Sibling'),
(2721, 5270, 1, 10, 'Matthew Vazzeli Alegrado Pareño', 'Relative'),
(2723, 4703, 1, 0, '', ''),
(2725, 4625, 1, 12, 'Jither S. Gumia', 'Sibling'),
(2726, 5345, 1, 12, 'Prisalle Hope Tambasen', 'Sibling'),
(2728, 5893, 1, 0, '', ''),
(2729, 5651, 1, 8, 'Queenie joy D. Delgado', 'Sibling'),
(2732, 4881, 1, 8, 'Nica Loraine T. Salon', 'Sibling'),
(2737, 5803, 1, 0, 'n/a', ''),
(2738, 5190, 1, 9, 'Jared Reinhold C. Biñas', 'Sibling'),
(2740, 6105, 1, 10, 'Daneil Cyle Besa Nebrija', 'Sibling'),
(2741, 5721, 1, 11, 'HAJULLELAH E. BATILO', 'Relative'),
(2742, 4612, 1, 7, 'Jersey Claudette Gonzales', 'Sibling'),
(2743, 4976, 1, 8, 'Nazren P. Villacasten', 'Sibling'),
(2744, 4897, 1, 11, 'Francesca Leanne A. Sarabia', 'Sibling'),
(2746, 4906, 1, 12, 'Mikaela Marie Abayata Segovia ', 'Sibling'),
(2747, 5160, 1, 12, 'Richard A. Vigil', 'Sibling'),
(2748, 5160, 1, 8, 'Adrian A. Vigil', 'Sibling'),
(2749, 5010, 1, 8, 'Matt Daniel L. Lacsi', ''),
(2750, 4837, 1, 7, 'Jhan Alvin M. Peronce ', 'Sibling'),
(2754, 4821, 1, 7, 'Jeremy Songano Parreño ', 'Sibling'),
(2756, 4740, 1, 7, 'Irish Jane P. Mamar', 'Sibling'),
(2757, 5991, 1, 7, 'EMIL MARTIN F. SOLDEVILLA', 'Sibling'),
(2759, 5001, 1, 8, 'Cassandra mae Baldugo', 'Relative'),
(2760, 6228, 1, 8, 'Jan Adrian G. Aspera', 'Sibling'),
(2761, 6112, 1, 7, 'Aries S. Danay', 'Sibling'),
(2765, 4763, 1, 11, 'Jessa C. Misajon', 'Sibling'),
(2767, 4854, 1, 8, 'JULIENE A.PUMARIN', 'Sibling'),
(2768, 4904, 1, 0, 'None', ''),
(2770, 5689, 1, 8, 'Daphne Marie Paclibar', 'Sibling'),
(2771, 5311, 1, 7, 'CZARIO LUIS LADUA NACION', 'Sibling'),
(2773, 4671, 1, 8, 'Nove kiel Sanogal', 'Relative'),
(2774, 4809, 1, 10, 'Hanie Mae Palmaira', 'Sibling'),
(2775, 4809, 1, 11, 'Hannah Grace Palmaira', 'Sibling'),
(2776, 4880, 1, 10, 'Deane Gaebrielle M. Salita', 'Sibling'),
(2780, 6432, 1, 8, 'NEIL PHILIP BESA NEBRIJA JR.', 'Sibling'),
(2781, 4571, 1, 9, 'Angel Ann Girao', 'Relative'),
(2783, 4972, 1, 7, 'Ryza Regina Seguiban Victoriano ', 'Sibling'),
(2785, 6406, 1, 8, 'KRISTEL DAWN E. TORALDE', 'Sibling'),
(2786, 5956, 1, 12, 'LYDIPHEBS G. IBIEZA', 'Sibling'),
(2787, 5744, 1, 9, 'Dayzhe Claire M. Salita', 'Sibling'),
(2788, 4766, 1, 0, 'None', ''),
(2790, 4946, 1, 7, 'Jamaica Tolentino', 'Sibling'),
(2791, 6098, 1, 7, 'Jazelle Marisse L. De Pedro', 'Sibling'),
(2792, 5024, 1, 8, 'Marianie Grace S. Acejas', 'Sibling'),
(2793, 6096, 1, 9, 'Shen Say Mari S. Albancia', 'Sibling'),
(2796, 5502, 1, 7, 'Imanuel paul B. Montelijao', 'Sibling'),
(2800, 6301, 1, 7, 'Elijah Beatrice S. Esposo', 'Sibling'),
(2801, 6301, 1, 9, 'Earl Joseph S. Sabido', 'Relative'),
(2802, 4481, 1, 11, 'Inella Faith L. Dagon', 'Sibling'),
(2803, 5856, 1, 0, 'None', ''),
(2804, 4748, 1, 0, '', ''),
(2806, 3885, 1, 7, 'Dandy Lorianne Macariza', 'Sibling'),
(2807, 4831, 1, 11, 'Angel Faith Buala', 'Relative'),
(2809, 6346, 1, 11, 'Julianna V. C. Delfin', 'Sibling'),
(2813, 5777, 1, 12, 'Renz Kristoffer T. Tabsing', 'Sibling'),
(2814, 6197, 1, 8, 'Noel Rayne S. Albancia', 'Sibling'),
(2815, 4949, 1, 8, 'Gillian Gwynette Tolledo ', 'Sibling'),
(2816, 5798, 1, 11, 'Jan Nikkolo S. Cabanda ', 'Sibling'),
(2817, 4604, 1, 0, '', ''),
(2819, 6173, 1, 12, 'Ray Luis D. Balbiran', 'Sibling'),
(2820, 4555, 1, 12, 'Nolan Dave T. Espartero ', 'Sibling'),
(2821, 5662, 1, 8, 'Khia Caitlin Macalipay', 'Sibling'),
(2822, 5959, 1, 0, '', ''),
(2823, 5959, 1, 0, '', ''),
(2824, 5157, 1, 8, 'Wayne Jhared C. Teruel, Asherina C. Teruel', 'Sibling'),
(2826, 5355, 1, 12, 'Jonna Mae Cardenas ', 'Sibling'),
(2827, 6167, 1, 7, 'Thaniel Bautista Suplico', 'Sibling'),
(2833, 4999, 1, 0, 'Ritche B. Zaldivar', 'Parent'),
(2835, 4704, 1, 0, '', ''),
(2836, 6299, 1, 10, 'Kinnah Angela K. Cordero', 'Sibling'),
(2837, 6299, 1, 12, 'Kier Gabriel K. Cordero', 'Sibling'),
(2838, 4999, 1, 0, 'Marie Grace B. Zaldivar', 'Parent'),
(2839, 4999, 1, 0, 'Trisha Marie B. Zaldivar', 'Sibling'),
(2840, 4999, 1, 0, 'Trixa Marie B. Zaldivar', 'Sibling'),
(2848, 6289, 1, 12, 'Kaela Shaun Lauron', 'Sibling'),
(2849, 5212, 1, 9, 'Hyacinth Joy Hingco Palmaira', 'Sibling'),
(2850, 5212, 1, 11, 'Hannah Grace Hingco Palmaira ', 'Sibling'),
(2851, 4087, 1, 12, 'Meljoy Franchessca F. Sugino', 'Sibling'),
(2852, 5667, 1, 8, 'Kurtney Love saude', 'Sibling'),
(2856, 6387, 1, 7, 'Gabriel Miranda ', 'Sibling'),
(2859, 5005, 1, 11, 'ALIAH JETT NICOLE L. BELARMINO ', 'Sibling'),
(2860, 5005, 1, 9, 'RAMON EDILBERT L. BELARMINO ', 'Sibling'),
(2861, 5707, 1, 8, 'Audrey Lucienne D. Gobres', 'Sibling'),
(2862, 5707, 1, 12, 'Nathaniel Joseph D. Gobres', 'Sibling'),
(2863, 4410, 1, 11, 'Yeshee Selmite Buendia ', 'Sibling'),
(2865, 6327, 1, 11, 'Vince Ivan G. Anating', 'Sibling'),
(2867, 4910, 1, 7, 'Florenz Hipolito Sevilla ', 'Sibling'),
(2870, 5121, 1, 8, 'Azeer Zykeem B. Padios', 'Sibling'),
(2872, 6414, 1, 11, 'Sebastian Andrei L. Espulgar ', 'Sibling'),
(2873, 5301, 1, 12, 'Kharmela Cercado', 'Sibling'),
(2874, 3704, 1, 9, 'James Emmanuel Vilonero Escario ', 'Sibling'),
(2877, 6011, 1, 8, 'Precious Mhae L. Peñaflorida', 'Sibling'),
(2883, 6330, 1, 11, 'Ambiel Elizabeth A. Buen', 'Sibling'),
(2884, 5208, 1, 9, 'Marchella Jamiel H. Mendoza', 'Relative'),
(2885, 5152, 1, 0, 'None', ''),
(2886, 5832, 1, 10, 'Samantha Vennice A. Erfe', 'Sibling'),
(2887, 5832, 1, 11, 'Brent Xian Gabriel Erfe', 'Sibling'),
(2890, 5857, 1, 0, 'n/a', ''),
(2892, 4528, 1, 0, '', ''),
(2893, 3948, 1, 11, 'Jhames Ryan Labiyo Ong', 'Sibling'),
(2894, 5265, 1, 8, 'Jamie Angelie A. Salarda', 'Sibling'),
(2895, 4631, 1, 0, '', ''),
(2896, 5847, 1, 12, 'Andrei Eisler I. Denamarquez', 'Sibling'),
(2897, 6306, 1, 11, 'Gabriel Fridrick A. Mande', 'Sibling'),
(2898, 5559, 1, 7, 'Tinah Jane D. Tendan ', 'Sibling'),
(2899, 4570, 1, 0, '', ''),
(2900, 5244, 1, 9, 'Zakia Mae Tonogbanua Santiago', 'Relative'),
(2901, 5668, 1, 7, 'Jhon Kenneth Valguna', 'Sibling'),
(2902, 5244, 1, 12, 'Lady Liamae Tonogbanua Santiago', 'Relative'),
(2904, 5302, 1, 0, '', ''),
(2906, 4846, 1, 0, 'N/a', ''),
(2907, 5153, 1, 8, 'LANCE JAYVER T. SALVADO', 'Sibling'),
(2908, 6151, 1, 9, 'Freiah Candice Flores', 'Sibling'),
(2909, 4648, 1, 7, 'Jessa Mae Indico', 'Sibling'),
(2911, 4480, 1, 12, 'Blesssy Faye G. Dacudao', 'Sibling'),
(2912, 5251, 1, 8, 'Sybil Kaye Ylisse P. Leonares', 'Sibling'),
(2913, 6326, 1, 12, 'Hannah Keziah S. Tono', 'Sibling'),
(2914, 4521, 1, 11, 'Ryan D Diaz', 'Sibling'),
(2915, 4823, 1, 12, 'Ma.Thea.Yvonne.Gustilo.Pasaporte', 'Sibling'),
(2917, 4883, 1, 0, 'none', ''),
(2919, 5843, 1, 11, 'Jasmine Lois Margaret A. Villanueva', 'Sibling'),
(2920, 5843, 1, 10, 'Julienne Dominique A. Villanueva', 'Sibling'),
(2922, 6259, 1, 8, 'Aaron Joshua R.J. V. Brillantes', 'Sibling'),
(2923, 4438, 1, 11, 'Kzee Lee Cpatid', 'Sibling'),
(2925, 4377, 1, 7, 'Pee Jay Dela Serna Bayasca', 'Sibling'),
(2927, 4305, 1, 0, 'Elsie aligaga', 'Parent'),
(2928, 4305, 1, 0, 'Ignacio Aligaga', 'Parent'),
(2929, 4398, 1, 12, 'Donna Alexa B. Pasaporte', 'Relative'),
(2930, 4398, 1, 7, 'Jheant Antonette P. Borbon', 'Sibling'),
(2931, 5166, 1, 0, 'N/A', ''),
(2932, 6249, 1, 8, 'Zachary John A. Artajo', 'Sibling'),
(2936, 5284, 1, 10, 'Kenn Melbert C Jadulos ', 'Sibling'),
(2938, 6097, 1, 10, 'Jacob Immanuel A. Artajo', 'Sibling'),
(2941, 6371, 1, 11, 'Frank Ezekiel F De La Mar', 'Sibling'),
(2942, 3970, 1, 12, 'riane margarette palomo', 'Sibling'),
(2943, 6070, 1, 7, 'John Valens B. Jalbuena ', 'Relative'),
(2944, 6070, 1, 12, 'John Francis B. Jalbuena ', 'Relative'),
(2945, 4860, 1, 7, 'Jasmin T. Raganas', 'Sibling'),
(2946, 5344, 1, 12, 'ckent eduard suatin', 'Sibling'),
(2947, 6281, 1, 12, 'Mathew Irdy P. Bedia', 'Sibling'),
(2948, 4803, 1, 10, 'Hans Travis Xhazphyr Ferrer Padillo', 'Sibling'),
(2949, 4341, 1, 0, 'JAYLURD S. ARROYO', 'Sibling'),
(2950, 4828, 1, 10, 'Jeff Andrae S. Pedrajas', 'Sibling'),
(2951, 5726, 1, 9, 'Lhara Alaine Tumalay Dalisay', 'Sibling'),
(2952, 5307, 1, 9, 'Renee Nicolai C. Gabawa', 'Sibling'),
(2955, 5911, 1, 10, 'Zianne Yzzabelle Ardiente Pamplona', 'Sibling'),
(2956, 5239, 1, 9, 'KEZIA HONEY AGOSTI AQUIÑO ', 'Sibling'),
(2958, 3379, 1, 7, 'Jemiah M. Estaya', 'Sibling'),
(2962, 3761, 1, 7, 'Tria Leigh A. Generato', 'Sibling'),
(2963, 3607, 1, 0, 'None', ''),
(2965, 4324, 1, 10, 'Khenly Heart A. Aquiño ', 'Sibling'),
(2966, 4349, 1, 0, '', ''),
(2969, 6106, 1, 12, 'Raldie Leivskeet L. Ordonio', 'Sibling'),
(2970, 5542, 1, 12, 'Barry Cesar Alog Barabona', 'Relative'),
(2971, 6156, 1, 0, '', ''),
(2972, 5307, 1, 10, 'Alexa Marie G. Ordaniel ', 'Relative'),
(2973, 6130, 1, 10, 'Kyle Angelo E. Toralde', 'Sibling'),
(2974, 4845, 1, 9, 'Benjamin Roarke Ponce De Leon', 'Sibling'),
(2975, 6128, 1, 0, '', ''),
(2976, 6152, 1, 12, 'Celine Bucane Gabon', 'Sibling'),
(2981, 4184, 1, 0, '', ''),
(2982, 6407, 1, 8, 'Llyana Melleret T. Villaruel', 'Sibling'),
(2983, 4113, 1, 11, 'Ma. Nadine F. Toledo', 'Sibling'),
(2984, 5350, 1, 10, 'Luella Grace C. Aragon', 'Sibling'),
(2985, 5876, 1, 10, 'Vinz Eugene Paul T. Villaruel', 'Sibling'),
(2988, 6202, 1, 8, 'Owen Revine Jhai Villanueva Masculino', 'Relative'),
(2989, 5963, 1, 11, 'Dyonne Ryss Deadio', 'Relative'),
(2993, 5351, 1, 9, 'Leanne Gale C. Aragon', 'Sibling'),
(2994, 5706, 1, 7, 'Jan Jacob T. Garcia', 'Sibling'),
(2997, 5814, 1, 10, 'Deoven B. Agustin', 'Sibling'),
(2998, 4460, 1, 11, 'Angel Ann B. Valladolid', 'Relative'),
(2999, 5367, 1, 8, 'Althea Ayessa P. Liba', 'Sibling'),
(3000, 4826, 1, 0, 'N/A', ''),
(3001, 6160, 1, 10, 'Trisha Anne Marielle P. Liba', 'Sibling'),
(3003, 5066, 1, 9, 'Mayvem Tuble Guides', 'Sibling'),
(3006, 6155, 1, 10, 'Mikyla Grace C. Genon ', 'Sibling'),
(3008, 6317, 1, 9, 'Johannes Gabriel Camposagrado  Aligaen', 'Relative'),
(3010, 4014, 1, 11, 'Ma. Angela L Quiambao ', 'Sibling'),
(3013, 6121, 1, 10, 'Leshi Julia Meri S. Pasiderio', 'Sibling'),
(3014, 4014, 1, 11, 'Ma. Angela L Quiambao ', 'Sibling'),
(3015, 4014, 1, 11, 'Ma. Angela L Quiambao ', 'Sibling'),
(3016, 6402, 1, 0, '', ''),
(3017, 6287, 1, 11, 'Jan Carlo A. Fernandez', 'Sibling'),
(3018, 4419, 1, 10, 'John Paul A. Cabrera ', 'Sibling'),
(3020, 5749, 1, 9, 'Michaela Q. Torreblanca', 'Sibling'),
(3021, 4407, 1, 0, 'N/A', ''),
(3022, 5522, 1, 9, 'Jashlene Ruby P. Jarcia', 'Sibling'),
(3026, 4354, 1, 7, 'Kate Erika Badoy', 'Sibling'),
(3028, 3815, 1, 12, 'Mikka Ella Joy G. Jainga', 'Sibling'),
(3029, 3378, 1, 10, 'Roark Simon Jusayan', 'Sibling'),
(3030, 4366, 1, 0, '', ''),
(3032, 3755, 1, 0, '', ''),
(3033, 4819, 1, 10, 'Neil Clarence Sabarillo Paredes ', 'Sibling'),
(3034, 4864, 1, 10, 'Darren Chester C. Robles', 'Sibling'),
(3035, 4567, 1, 9, 'Sophia Venice T. FANTILAGA', 'Sibling'),
(3036, 5889, 1, 7, 'Mia Gene N. Va-ay', 'Sibling'),
(3037, 3866, 1, 0, '', ''),
(3038, 4637, 1, 11, 'Ramer P. Hidalgo', 'Sibling'),
(3039, 5037, 1, 7, 'DESERIE JIMENEZ JOQUIÑO ', 'Sibling'),
(3045, 6149, 1, 12, 'Trizsha Ann G. Defante', 'Sibling'),
(3046, 4879, 1, 0, 'N/A', ''),
(3047, 5449, 1, 7, 'Sabastian dichupa olvido', 'Sibling'),
(3048, 4569, 1, 9, 'Marianna Mihai Fantilaga', 'Sibling'),
(3049, 4389, 1, 9, 'Leonyl Vincent B. Bernadas', 'Sibling'),
(3051, 5259, 1, 12, 'Ma. Lyn Amparo A. Noquez', 'Sibling'),
(3052, 3842, 1, 9, 'ANDREA SCENT JUNSAN', 'Sibling'),
(3061, 5124, 1, 0, 'None', ''),
(3063, 5588, 1, 0, 'none', ''),
(3064, 3486, 1, 0, '', ''),
(3065, 5427, 1, 11, 'Jeyser Jerrome Regotea ', 'Sibling'),
(3067, 6166, 1, 11, 'Izabelle Louise C. Siva', 'Sibling'),
(3068, 6428, 1, 11, 'Richelaine E. Depol', 'Sibling'),
(3069, 4856, 1, 0, 'N/A', ''),
(3073, 4339, 1, 8, 'Jose M. Arrollado ll', 'Sibling'),
(3077, 6271, 1, 7, 'Pierre jasmine S. Jallorina', 'Sibling'),
(3078, 6139, 1, 7, 'Diya Cryl H. Luto', 'Sibling'),
(3080, 5346, 1, 8, 'Samantha Territorio', 'Sibling'),
(3081, 5346, 1, 12, 'Nimrod Territorio', 'Sibling'),
(3082, 5621, 1, 12, 'Jolyn Grace Alonzaga', 'Sibling'),
(3083, 5521, 1, 7, 'Kurt Axl O. Gebucion', 'Sibling'),
(3084, 6426, 1, 9, 'Ma.Valeryne Y. Albolote', 'Sibling'),
(3085, 4258, 1, 9, 'Shekinah Gail V. Fernandez', 'Relative'),
(3087, 4642, 1, 12, 'Rian Joy M. Hormillosa', 'Sibling'),
(3088, 5361, 1, 9, 'Samantha Lei L. Gaje', 'Sibling'),
(3089, 6370, 1, 9, 'Nony Vincent B. Bernadas', 'Sibling'),
(3092, 6129, 1, 10, 'Gian Miguel Territorio', 'Sibling'),
(3093, 6129, 1, 12, 'Nimrod Territorio', 'Sibling'),
(3098, 5457, 1, 11, 'Kian Fernandez Villa', 'Sibling'),
(3102, 4282, 1, 7, 'Thea Ellzlyn B. Matulac', 'Relative'),
(3103, 5592, 1, 12, 'Jill Ann Nicole Ticar', 'Sibling'),
(3105, 4075, 1, 12, 'Olrien Luke Sevelleno', 'Sibling'),
(3106, 4849, 1, 9, 'Generose camarig puda', 'Parent'),
(3107, 4849, 1, 9, 'Generose camarig puda', 'Parent'),
(3110, 4849, 1, 9, 'Generose camarig puda', 'Parent'),
(3113, 4435, 1, 0, '', ''),
(3118, 4994, 1, 11, 'Russhienne Fei Yap', 'Relative'),
(3119, 3934, 1, 10, 'NAKAGAWA MIZUKI', 'Sibling'),
(3121, 5577, 1, 10, 'Alquina Jean S. Janas', 'Relative'),
(3122, 4443, 1, 9, 'Lealyn hope ordaniel Cartagena ', 'Sibling'),
(3127, 4312, 1, 11, 'Ishi raquiza Alolod', 'Sibling'),
(3128, 4581, 1, 9, 'John Eugene J. Sagala', 'Relative'),
(3131, 4779, 1, 8, 'Nelzie Hart Macairan ', 'Relative'),
(3134, 5215, 1, 12, 'Shaenra Julienne D. Tabion', 'Sibling'),
(3137, 5046, 1, 0, '', ''),
(3138, 5142, 1, 8, 'Mary Grace D. Gamarcha ', 'Sibling'),
(3141, 5778, 1, 12, 'Vincent John A. Tamano', 'Sibling'),
(3142, 3618, 1, 0, '', ''),
(3143, 3903, 1, 10, 'Jehad U. Mayo', 'Sibling'),
(3144, 5877, 1, 7, 'Hejia Francine Jarana Alonday', 'Sibling'),
(3145, 3634, 1, 9, 'Annegrace D. Cayanan', 'Sibling'),
(3146, 4281, 1, 10, 'Joedyl Bernadette Señerez', 'Sibling'),
(3147, 5878, 1, 11, 'Jay Lester Dillera Anuevo', 'Sibling'),
(3150, 4575, 1, 11, 'Chrysel Ann M. Juson', 'Relative'),
(3152, 4269, 1, 8, 'Shae D. Divinagracia', 'Relative'),
(3154, 4776, 1, 9, 'Andrix Zean J. Mudal', 'Sibling'),
(3158, 3511, 1, 11, 'DAVID JOSHUA ALIMO-OT', 'Sibling'),
(3160, 3840, 1, 9, 'Riz Leann Julagting', 'Sibling'),
(3161, 4600, 1, 0, 'N/A', ''),
(3162, 5221, 1, 12, 'Iona Joelan Casipe', 'Sibling'),
(3165, 4974, 1, 12, 'Ayeza Marie L. Vilchez', 'Sibling'),
(3167, 4264, 1, 12, 'Aaron Dustin Boque', 'Relative'),
(3168, 3501, 1, 9, 'Yancy  Donn Dotimas Aguilos', 'Sibling'),
(3170, 4264, 1, 7, 'Dwhayne Derla', 'Relative'),
(3172, 5027, 1, 0, '', ''),
(3173, 4264, 1, 7, 'Sheryl Mae Doyo', 'Relative'),
(3174, 4764, 1, 9, 'Jovanna H. Mojana', 'Sibling'),
(3175, 5028, 1, 8, 'Juhari Celiz Broce', 'Sibling'),
(3179, 4468, 1, 10, 'Angeline Ramos Condalor', 'Sibling'),
(3182, 5613, 1, 12, 'ENRICO JEB D. SANTOS', 'Sibling'),
(3183, 4436, 1, 12, 'Ruby P. Canja', 'Sibling'),
(3185, 5795, 1, 0, '', ''),
(3186, 5795, 1, 0, '', ''),
(3188, 5828, 1, 11, 'Krisha M. Calapardo', 'Sibling'),
(3189, 4775, 1, 9, 'Zeeanah Resse J. Mudal ', 'Sibling'),
(3190, 5534, 1, 8, 'Kevin kim M.De Vicente ', 'Sibling'),
(3191, 6065, 1, 9, 'Athena Rayne L. Camarino', 'Sibling'),
(3192, 5732, 1, 10, 'Jeo C. Gancero', 'Relative'),
(3193, 5023, 1, 12, 'Kian Kristopher', 'Sibling'),
(3194, 6198, 1, 12, 'Luis Raphael  P. Argel', 'Sibling'),
(3195, 5050, 1, 8, 'YHANNA PAULINE S. Enong', 'Relative'),
(3196, 4891, 1, 0, '', ''),
(3199, 5269, 1, 7, 'Edmond Dañas Usalla', 'Sibling'),
(3200, 5672, 1, 8, 'Leajane Ordaniel Cartagena', 'Sibling'),
(3201, 6285, 1, 11, 'Kyryll Sheelyn Licardo Datorin', 'Sibling'),
(3203, 4621, 1, 10, 'Tricia Angela E. Grino', 'Sibling'),
(3205, 4475, 1, 0, '', ''),
(3209, 5985, 1, 12, 'Mikhaela Sophia Bereber Harder', 'Sibling'),
(3210, 4056, 1, 10, 'Princess Ehvelyn Sampani', 'Sibling'),
(3213, 5937, 1, 7, 'Simon Rey T. Chica', 'Sibling'),
(3214, 5971, 1, 8, 'Denise E. Maranon', 'Sibling'),
(3215, 5971, 1, 12, 'Lorie Mae E. Maranon', 'Sibling'),
(3217, 5714, 1, 8, 'Jaliyah Rich S. Rubio', 'Sibling'),
(3219, 5714, 1, 10, 'Jetherlynn Joseph S. Erecre', 'Relative'),
(3220, 3702, 1, 10, 'JAZSTER ZANE ENRIQUEZ', 'Sibling'),
(3221, 5374, 1, 0, 'N/A', ''),
(3223, 4049, 1, 0, '', ''),
(3224, 3804, 1, 10, 'FRANCIS JAN C. HORBINO', 'Sibling'),
(3226, 4888, 1, 11, ' Kevin Goro Sanchez', 'Sibling'),
(3231, 5030, 1, 0, 'DenzRey Palma Calvario ', 'Sibling'),
(3232, 4293, 1, 0, '', ''),
(3233, 6153, 1, 10, 'Czar Louis R. Gaitan', 'Sibling'),
(3234, 4454, 1, 11, 'Therese Frances Marie T. Catalan', 'Sibling'),
(3235, 4454, 1, 7, 'Nc Rose T. Catalan', 'Sibling'),
(3237, 4471, 1, 8, 'Vivienne Shiloh Constantino ', 'Relative'),
(3239, 3826, 1, 10, 'DEBELEN JESTIA', 'Sibling'),
(3240, 6353, 1, 7, 'Anne Wynne B. Sumalapao', 'Sibling'),
(3242, 6304, 1, 10, 'Lorise Eden L. Laurente', 'Sibling'),
(3243, 4444, 1, 11, 'Kc J. Casandra', 'Sibling'),
(3244, 4329, 1, 0, '', ''),
(3245, 6010, 1, 8, 'Amelia Avril S. Pasiderio', 'Sibling'),
(3246, 4451, 1, 11, 'Francine Grace T. Castor ', 'Sibling'),
(3247, 3624, 1, 0, '', ''),
(3248, 3624, 1, 0, '', ''),
(3249, 3624, 1, 0, '', ''),
(3250, 3624, 1, 0, '', ''),
(3251, 3624, 1, 0, '', ''),
(3252, 6012, 1, 10, 'Angela Ryza D. Petinglay', 'Sibling'),
(3253, 3575, 1, 11, 'Ma. Dorwin Therese Bantad', 'Sibling'),
(3254, 6013, 1, 10, 'Angela Ryka D. Petinglay', 'Sibling'),
(3255, 5896, 1, 10, 'Angel Christie Lily S. Chin', 'Sibling'),
(3256, 4313, 1, 0, '', ''),
(3257, 6464, 1, 9, 'Elezar Paguntalan', 'Relative'),
(3258, 6464, 1, 9, 'Elezar Paguntalan', 'Relative'),
(3260, 4441, 1, 11, 'FITZWILLIAM B. CARNATE', 'Sibling'),
(3266, 5002, 1, 9, 'Marvin Y. Agriam', 'Sibling'),
(3269, 4299, 1, 10, 'Mark joseph Y. Agriam', 'Sibling'),
(3272, 4457, 1, 9, 'Francis Danuya Cayanan', 'Sibling'),
(3273, 5004, 1, 0, '', ''),
(3274, 5223, 1, 8, 'jaliyah Rich Rubio', 'Relative'),
(3275, 5223, 1, 10, 'James Zhian Rubio', 'Relative'),
(3276, 4793, 1, 10, 'Jarmyth Rye Oriel', 'Sibling'),
(3277, 5450, 1, 9, 'Janna Maryeth T. Oriel ', 'Sibling'),
(3282, 4622, 1, 10, 'Franco Miguel T. Guides', 'Sibling'),
(3283, 4342, 1, 12, 'Jannah Kaye Castete Arsulo', 'Sibling'),
(3287, 6022, 1, 11, 'Jasmine Lois Margaret A. Villanueva', 'Sibling'),
(3288, 4918, 1, 0, '', ''),
(3289, 6022, 1, 8, 'Jillian Lorraine A. Villanueva', 'Sibling'),
(3290, 3530, 1, 7, 'Hyacinth Faye M. Antipala ', 'Sibling'),
(3291, 6165, 1, 9, 'Tristan Draven G Ramos', 'Sibling'),
(3292, 6165, 1, 12, 'David Zachary G Delgado', 'Sibling'),
(3293, 5032, 1, 0, '', ''),
(3297, 4756, 1, 11, 'Richie Paul  Tabasundra Tamonan', 'Sibling'),
(3298, 5455, 1, 7, 'Zhanlloyd C. Sumogat', 'Sibling'),
(3299, 4938, 1, 9, 'Prince James fenequito tamesis ', 'Parent'),
(3300, 4293, 1, 0, '', ''),
(3301, 4939, 1, 9, 'Prince james fenequito tamesis', 'Sibling'),
(3302, 4938, 1, 9, 'Prix john fenequito tamesis ', 'Sibling'),
(3305, 6062, 1, 9, 'Lucille Mae A. Alcazaren', 'Sibling'),
(3306, 4870, 1, 0, '', ''),
(3307, 3985, 1, 9, 'KRISHA MARIZ PERANIA', 'Sibling'),
(3309, 3523, 1, 12, 'Nelmar Angelo Amada', 'Sibling'),
(3310, 4811, 1, 11, 'Frances Amielle S. Pama', 'Sibling'),
(3312, 5171, 1, 11, 'Vincent Patrick P. Gulanes', 'Sibling'),
(3313, 5019, 1, 9, 'Noriel Kyle S Paredes', 'Sibling'),
(3314, 5676, 1, 0, 'Glory Deloso', 'Parent'),
(3315, 5676, 1, 0, 'Noland Deloso', 'Parent'),
(3316, 5039, 1, 8, 'Emma Lorein Laurente', 'Sibling'),
(3318, 4332, 1, 8, 'Princess Nicah Arco', 'Relative'),
(3319, 4566, 1, 10, 'Arya Laire Pasomanero', 'Relative'),
(3321, 6035, 1, 9, 'Christelle Noelle Angela S. Chin', 'Sibling'),
(3325, 4196, 1, 10, 'Jovimae Azur Lauro', 'Sibling'),
(3326, 4582, 1, 10, 'Ma Leziel L. Gaje', 'Sibling'),
(3328, 4825, 1, 10, 'Jeremy Ken B. Pasco', 'Sibling'),
(3329, 4877, 1, 8, 'Ryobi Kirsten D. Saladio', 'Sibling'),
(3330, 5312, 1, 9, 'LYKA GABAWA ORDANIEL ', 'Sibling'),
(3332, 4334, 1, 0, 'Mayjean J. Ariete', 'Parent'),
(3334, 4334, 1, 0, 'Christofer P. Ariete', 'Parent'),
(3335, 4334, 1, 0, 'Ronan J. Ariete', 'Sibling'),
(3336, 4334, 1, 0, 'Stephen J. Ariete', 'Sibling'),
(3338, 4334, 1, 0, 'Lean Kate J. Ariete', 'Sibling'),
(3339, 5980, 1, 10, 'Lucy Mikaela A. Alcazaren', 'Sibling'),
(3340, 5182, 1, 9, 'Julianne Marie Pasco', 'Sibling'),
(3341, 4891, 1, 0, '', ''),
(3344, 4712, 1, 11, 'Jake Laurence B.Lignig', 'Sibling'),
(3345, 4170, 1, 12, 'Kheo Abellon', 'Sibling'),
(3346, 5939, 1, 9, 'Krisha Faithe L. Britanico', 'Relative'),
(3347, 4792, 1, 10, 'ALEXA MARIE GABAWA ORDANIEL ', 'Sibling'),
(3348, 6042, 1, 7, 'Christ Daryn Malagom', 'Sibling'),
(3350, 5901, 1, 10, 'Gwynneth Ann F. Lagrito ', 'Sibling'),
(3351, 6040, 1, 9, 'Danielle Rich Flores Lagrito', 'Sibling'),
(3352, 4884, 1, 0, '', ''),
(3353, 5000, 1, 12, 'Jomaia Christcia Zausa', 'Sibling'),
(3355, 6164, 1, 8, 'Dan Michael Oton', 'Relative'),
(3357, 5162, 1, 7, 'Bien Patrick B. Antiquiera', 'Sibling'),
(3358, 4640, 1, 0, 'N/A', ''),
(3360, 5065, 1, 12, 'Lyresh Christine R. Ginon', 'Sibling'),
(3362, 4328, 1, 11, 'Elijah Zandro Arcena', 'Sibling'),
(3363, 5947, 1, 8, 'Leonard A Monsale', 'Sibling'),
(3364, 4620, 1, 0, 'NONE', ''),
(3365, 5525, 1, 9, 'Alver Karl Lauro', 'Sibling'),
(3366, 4840, 1, 7, 'Johny P. Pillo', 'Sibling'),
(3367, 6211, 1, 7, 'Gian David C. Ocup', 'Sibling'),
(3368, 4797, 1, 12, 'Jamila Andrie F. Paca', 'Sibling'),
(3369, 5673, 1, 8, 'SEAN JOHN D. PEÑASALES ', 'Relative'),
(3370, 4607, 1, 11, 'Khazopheia Clouie B. Gindap', 'Sibling'),
(3371, 6255, 1, 7, 'Amelius Jerem V. Suarez', 'Sibling'),
(3372, 4820, 1, 7, 'Mizty Paris', 'Sibling'),
(3373, 4487, 1, 10, 'Lheanne Andrea T. Dalisay', 'Sibling'),
(3374, 5042, 1, 10, 'Freahlyn Ortez', 'Sibling'),
(3375, 5042, 1, 12, 'Froilen Ortez', 'Sibling');
INSERT INTO `household_members_tbl` (`hm_id`, `stud_id`, `sy_id`, `grade`, `complete_name`, `hm_relationship`) VALUES
(3376, 5411, 1, 9, 'Veerue Ariego Dela Cruz ', 'Sibling'),
(3377, 6355, 1, 12, 'Katrina Ysabelle R. Ta-asan', 'Sibling'),
(3378, 5313, 1, 10, 'Florielyn H. Ortez', 'Sibling'),
(3379, 5313, 1, 12, 'Froilen H. Ortez', 'Sibling'),
(3380, 5187, 1, 10, 'Noemi Kate G. Alojado', 'Relative'),
(3382, 5830, 1, 0, '', ''),
(3383, 5144, 1, 0, '', ''),
(3384, 5144, 1, 0, '', ''),
(3386, 4701, 1, 0, 'None', ''),
(3387, 4764, 1, 7, 'Akeisha Jayne U. Hautea', 'Relative'),
(3388, 6034, 1, 7, 'Matt Brayden Arcepe Andola', 'Sibling'),
(3389, 5144, 1, 0, '', ''),
(3390, 5144, 1, 0, '', ''),
(3391, 5144, 1, 0, '', ''),
(3392, 5240, 1, 0, '', ''),
(3393, 4691, 1, 0, 'N/A', ''),
(3395, 6002, 1, 7, 'Nathan B. Azarcon', 'Sibling'),
(3396, 4865, 1, 7, 'John Alfon A. Robles', 'Sibling'),
(3397, 5741, 1, 8, 'Julienne H. Mojana', 'Sibling'),
(3398, 5741, 1, 7, 'Akeisha Jayne U. Hautea', 'Relative'),
(3399, 4947, 1, 11, 'Kiian Huey D. Tolentino', 'Sibling'),
(3403, 6009, 1, 0, 'N/A', ''),
(3407, 4882, 1, 11, 'Marielle Salontoy', 'Sibling'),
(3409, 4885, 1, 0, '', ''),
(3411, 4967, 1, 11, 'MATT SWERALD D VALLEJERA', 'Sibling'),
(3412, 4724, 1, 0, '', ''),
(3413, 4697, 1, 8, 'Chrysander G. Laurea', 'Sibling'),
(3414, 4382, 1, 11, 'Kheisha Rowe P. Belas', 'Sibling'),
(3416, 6315, 1, 11, 'Chrisciel A. Catedrilla', 'Sibling'),
(3422, 4320, 1, 0, '', ''),
(3424, 5499, 1, 11, 'Eurikka Therese G. Labordo', 'Sibling'),
(3425, 4760, 1, 12, 'LAUREN M. MILAN', 'Sibling'),
(3427, 5495, 1, 8, 'Aliyah Denise L. Garilva', 'Sibling'),
(3428, 5590, 1, 8, 'Aaliyah Arabella I. Soliano', 'Sibling'),
(3430, 5336, 1, 0, '', ''),
(3431, 5336, 1, 0, '', ''),
(3434, 4617, 1, 0, '', ''),
(3435, 4379, 1, 7, 'Sienna Laire G. Tan', 'Relative'),
(3436, 4492, 1, 10, 'Rare Hartha de Anas', 'Sibling'),
(3437, 5409, 1, 11, 'Jc Kyle V. Castro', 'Sibling'),
(3439, 5334, 1, 0, '', ''),
(3440, 6472, 1, 7, 'MERY ANGELYN  GAMPAY TONDO ', 'Sibling'),
(3442, 5754, 1, 12, 'Aia Francheska G. Lamis', 'Sibling'),
(3443, 5591, 1, 12, 'Hector Sumagpao Jr.', 'Sibling'),
(3446, 5348, 1, 12, 'John Moises Alojado ', 'Sibling'),
(3447, 4504, 1, 7, 'Julienne Denise Ang Deaño', 'Sibling'),
(3448, 4504, 1, 11, 'Danielle Ingrid Ang Deaño', 'Sibling'),
(3449, 4926, 1, 7, 'Beatrice Anne L. Sumagaysay ', 'Sibling'),
(3451, 4563, 1, 0, '', ''),
(3452, 4765, 1, 11, 'Ag Hope Betonio Mongcal', 'Sibling'),
(3453, 5712, 1, 12, 'Tristan S. Pido', 'Sibling'),
(3454, 5303, 1, 9, 'Renhxer Halley de Anas', 'Sibling'),
(3455, 5317, 1, 8, 'John Christian A. Sampani', 'Sibling'),
(3460, 4681, 1, 7, 'Rob Emman Consolacion Julagting ', 'Sibling'),
(3461, 5608, 1, 8, 'Mariae S. Hojilla ', 'Sibling'),
(3462, 4989, 1, 8, 'Vincent jose viloria', 'Sibling'),
(3463, 4662, 1, 11, 'Al Jasper B. Jandonero', 'Sibling'),
(3464, 5073, 1, 8, 'Mary Meldy K. Pasaporte', 'Sibling'),
(3465, 5915, 1, 10, 'Jan Matthew R. Villagracia', 'Sibling'),
(3466, 4934, 1, 11, 'Kelly Angelie Tabor', 'Sibling'),
(3467, 6294, 1, 9, 'Kenshi C. Acebuche', 'Sibling'),
(3468, 6294, 1, 12, 'Nherie C. Accebuche', 'Sibling'),
(3469, 6059, 1, 7, 'Raj Cresna M. Triumfante', 'Sibling'),
(3471, 4351, 1, 11, 'Jam Deinel T. Guardiano', 'Relative'),
(3472, 4351, 1, 10, 'Kirk Rizen T. Bacabac', 'Sibling'),
(3473, 4300, 1, 8, 'Donovan Klein D.Aguilos', 'Sibling'),
(3474, 4841, 1, 11, 'Jabriel D. Pineda', 'Sibling'),
(3476, 6033, 1, 9, 'Jian Miguel R. Villagracia', 'Sibling'),
(3477, 4725, 1, 10, 'John Adrian J. Lumhod', 'Sibling'),
(3478, 4725, 1, 11, 'John Ryan J. Lumhod', 'Sibling'),
(3479, 5198, 1, 12, 'Rutdelle Anne T. Flores', 'Sibling'),
(3480, 5198, 1, 8, 'Romilla Dale T. Flores', 'Sibling'),
(3481, 6425, 1, 8, 'Gavin Blue B. Agustin', 'Sibling'),
(3482, 4990, 1, 8, 'Villy James Viloria ', 'Sibling'),
(3484, 6363, 1, 12, 'Alnisha Johanne R. Lagmay', 'Sibling'),
(3485, 5884, 1, 12, 'Aileish Kate L. Jaudian', 'Sibling'),
(3488, 6433, 1, 0, '', ''),
(3489, 5185, 1, 11, 'Arvi John P. Sombrea', 'Sibling'),
(3492, 6094, 1, 8, 'Jade Carlisle P. Samontanes', 'Sibling'),
(3494, 5261, 1, 8, 'Chrislyn Laureta Pasomanero', 'Relative'),
(3495, 4942, 1, 12, 'Pierre Andrei P. Tenasas', 'Sibling'),
(3496, 5447, 1, 9, 'Lalaine Grace Montel', 'Sibling'),
(3497, 6305, 1, 11, 'MARY KHRYSSA LOCEL C. LOREA', 'Sibling'),
(3498, 5114, 1, 0, '', ''),
(3499, 5070, 1, 8, 'Carl Dave B. Matiling', 'Sibling'),
(3500, 4394, 1, 10, 'Princess Megan Blanco', 'Sibling'),
(3501, 4355, 1, 11, 'JAMIE RHIANE S.BAES', 'Sibling'),
(3503, 5594, 1, 9, 'Fiona Ayeshia T. Bacabac', 'Sibling'),
(3504, 4737, 1, 12, 'Diego Patrick D. Maglantay ', 'Sibling'),
(3506, 4737, 1, 7, 'Yshara Belle Maglantay ', 'Sibling'),
(3507, 5372, 1, 12, 'Cristine Joy P. Fajutar', 'Relative'),
(3509, 5631, 1, 10, 'Andiane Santocildes Gallardo', 'Sibling'),
(3510, 4466, 1, 10, 'Jupiter Claret Jr.', 'Sibling'),
(3511, 4466, 1, 12, 'Princess Jamella May Claret', 'Sibling'),
(3513, 5567, 1, 9, 'Barbie Jean Blanco', 'Sibling'),
(3515, 4616, 1, 7, 'May Ann Tabano Grafia', 'Relative'),
(3516, 4616, 1, 7, 'May Ann Tabano Grafia', 'Relative'),
(3517, 4616, 1, 8, 'Qugust Faith Tabano Grafia', 'Relative'),
(3518, 4780, 1, 11, 'Noi-yette Nicodemus ', 'Sibling'),
(3519, 4687, 1, 0, 'Ernesto F. Lacao JR.', 'Parent'),
(3520, 4687, 1, 0, 'Robelyn L. Labang', 'Parent'),
(3522, 4484, 1, 11, 'Owen Bertrand Dajotoy', 'Sibling'),
(3525, 5036, 1, 0, 'None', ''),
(3526, 5874, 1, 10, 'Cassandra Jill P. Samontanes', 'Sibling'),
(3528, 4752, 1, 12, 'Isabella Marie R Mendez', 'Sibling'),
(3530, 4639, 1, 11, 'Khrisha Espinosa Hinojales', 'Sibling'),
(3531, 4795, 1, 9, 'Jonathan Gabriel L Oscares', 'Sibling'),
(3532, 5426, 1, 8, 'ZYWHYN KLYMZ B. RAPIZ', 'Sibling'),
(3533, 5426, 1, 12, 'ZYLHYN KLYNZ B. RAPIZ', 'Sibling'),
(3536, 5225, 1, 0, '', ''),
(3537, 4742, 1, 0, 'None', ''),
(3538, 4422, 1, 11, 'Rob vyron cajayon', 'Sibling'),
(3539, 4439, 1, 12, 'Louis Lane Victoria D. Cardenas', 'Sibling'),
(3541, 6252, 1, 8, 'John Jacob Murcillo ', 'Sibling'),
(3543, 5242, 1, 12, 'Ainah Ricci Deocares Cardiel', 'Sibling'),
(3544, 6361, 1, 11, 'SAMANTHA D\'MHAREZ LOPEZ CELESTE', 'Sibling'),
(3545, 5087, 1, 11, 'Basti Deocares ', 'Sibling'),
(3547, 6066, 1, 8, 'Ylaraine Yazon Causing', 'Sibling'),
(3549, 4835, 1, 10, 'Prince Don S. Perez', 'Sibling'),
(3550, 5419, 1, 0, '', ''),
(3551, 6441, 1, 9, 'Tiffany Bryce E. Grino', 'Sibling'),
(3553, 5338, 1, 9, 'Arfel King S. Perez', 'Sibling'),
(3557, 4928, 1, 8, 'Randell Myer A. Sumayo', 'Sibling'),
(3558, 4562, 1, 0, 'NA', ''),
(3559, 4446, 1, 8, 'Jhon Lexan J.Casiple', 'Sibling'),
(3560, 4562, 1, 0, 'NA', ''),
(3561, 4932, 1, 7, 'Rhianna Jey M. Superable ', 'Sibling'),
(3565, 4844, 1, 0, 'Shaleah Nicole Donasco Poñate', 'Sibling'),
(3567, 5275, 1, 0, '', ''),
(3568, 3593, 1, 10, 'Leif Alvin E Bibit ', 'Sibling'),
(3569, 6316, 1, 11, 'ARVIEYLLE JURRIEN G. DE LA PENA', 'Sibling'),
(3570, 3944, 1, 10, 'Ronie Dave Ogoy', 'Sibling'),
(3573, 6328, 1, 8, 'Matthew Jay Xavier S. Balnig ', 'Sibling'),
(3575, 5783, 1, 11, 'Dennis Matthew M. Albania', 'Sibling'),
(3579, 5532, 1, 12, 'Tristan Kent H. Quisoy', 'Sibling'),
(3580, 5387, 1, 0, '', ''),
(3581, 6145, 1, 10, 'Francesca Alterado', 'Sibling'),
(3582, 6300, 1, 12, 'Ghyb Natan Duran', 'Sibling'),
(3583, 6027, 1, 7, 'Jother John Escalada Jaculina', 'Sibling'),
(3584, 3634, 1, 10, 'FRANCIS CAYANAN', 'Sibling'),
(3585, 4931, 1, 0, '', ''),
(3586, 4578, 1, 11, 'John Richard L. Gabor', 'Sibling'),
(3589, 4428, 1, 12, 'Trix Daniel Camba', 'Sibling'),
(3590, 5476, 1, 7, 'Maireine Mae E. Mosquera ', 'Sibling'),
(3591, 5476, 1, 12, 'Raul E. Mosquera ', 'Sibling'),
(3592, 4948, 1, 9, 'Gilmarie Supanhari. Tolledo ', 'Sibling'),
(3593, 5512, 1, 7, 'Jasmin Mae Bacia', 'Sibling'),
(3597, 6338, 1, 7, 'Mayrelle N. Mesias ', 'Sibling'),
(3598, 6498, 1, 7, 'Gale Clarese Cariaga Caspillo', 'Sibling'),
(3600, 6496, 1, 12, 'Hanna Jean Bawan Biñas', 'Sibling'),
(3601, 4457, 1, 10, 'Francis Dave Cayanan', 'Sibling'),
(3602, 4457, 1, 8, 'Emeriel Cayanan', 'Sibling'),
(3606, 5172, 1, 0, '', ''),
(3607, 6514, 1, 7, 'Junniel James S. Toque', 'Sibling'),
(3609, 6510, 1, 11, 'Stel Noli Pabilona Sondia', 'Sibling'),
(3610, 4890, 1, 0, '', ''),
(3611, 4834, 1, 0, '', ''),
(3612, 5211, 1, 10, 'Trisha Anne Marielle P. Liba', 'Relative'),
(3613, 4708, 1, 7, 'Vinmar Libero', 'Sibling'),
(3614, 4517, 1, 7, 'CHESKA JEAN DEPAKAKIBO', 'Sibling'),
(3615, 4359, 1, 7, 'Christinia Aileen Jay S. Balnig ', 'Sibling'),
(3618, 5079, 1, 7, 'Tumi Yadhir Agupalo', 'Sibling'),
(3623, 6492, 1, 7, 'John Joseph Alolod ', 'Sibling'),
(3624, 5513, 1, 7, 'Krystal Ann Dayaday Barabona ', 'Sibling'),
(3630, 5750, 1, 11, 'Paul Gabriel T. Yap', 'Relative'),
(3631, 5750, 1, 9, 'Pauline Rose T. Yap', 'Relative'),
(3632, 4297, 1, 0, 'N/A', ''),
(3634, 6377, 1, 8, 'Scarlett Gabrielle G Ramos', 'Sibling'),
(3635, 6377, 1, 12, 'David Zachary G Delgado', 'Sibling'),
(3636, 5604, 1, 8, 'Crest Angel R.Gaitan', 'Sibling'),
(3638, 4998, 1, 0, 'None', ''),
(3641, 4534, 1, 11, 'James Carl G. Drilom', 'Sibling'),
(3642, 4668, 1, 7, 'Gabrielle Victoria G. Jaudian', 'Sibling'),
(3643, 4588, 1, 0, '', ''),
(3644, 5474, 1, 11, 'Paul Julian Mykaelle C. Macalalag jr.', 'Sibling'),
(3646, 4497, 1, 7, 'arkin gabriel jacome de la cruz', 'Sibling'),
(3648, 5551, 1, 10, 'Ariel J. Mirador', 'Parent'),
(3649, 4889, 1, 12, 'Trixie Sanchez', 'Sibling'),
(3650, 5460, 1, 9, 'Shean Anthony P. Barrera', 'Sibling'),
(3651, 4402, 1, 0, 'None', ''),
(3652, 4878, 1, 11, 'JUSTIN ROZZ SALANIO', 'Sibling'),
(3654, 5022, 1, 11, 'Rasha\'ad Jay Garingo Ruiz', 'Sibling'),
(3655, 4482, 1, 0, 'N/A', ''),
(3656, 4511, 1, 11, 'Kyle Vincent Delos Reyes', 'Sibling'),
(3659, 4433, 1, 0, 'No', ''),
(3661, 4361, 1, 8, 'Emmanuel B. Bagcal', 'Relative'),
(3662, 4886, 1, 8, 'Seajean callos', 'Relative'),
(3663, 5364, 1, 8, 'Jaryl Raven Bandada Guilab', 'Sibling'),
(3665, 4509, 1, 10, 'Rueve Dela Cruz ', 'Sibling'),
(3666, 6506, 1, 8, 'Charice Joyce Ogoy', 'Sibling'),
(3667, 5155, 1, 0, '', ''),
(3668, 4331, 1, 0, '', ''),
(3670, 6344, 1, 11, 'Kim Conny Margaret', 'Sibling'),
(3672, 4601, 1, 9, 'Junejie P. Geromiano ', 'Sibling'),
(3674, 6140, 1, 10, 'Prince Justine P. Murcillo', 'Sibling'),
(3675, 6110, 1, 11, 'Joenard Lester M. Cercado', 'Sibling'),
(3677, 4346, 1, 12, 'Trish Leiann Nacis', 'Relative'),
(3678, 4993, 1, 11, 'Apple Gabriel Yap', 'Sibling'),
(3679, 4588, 1, 9, 'Krezyl G. Galleto', ''),
(3680, 5102, 1, 0, '', ''),
(3682, 6518, 1, 11, 'Dwayne Rey Juntado Biliran', 'Sibling'),
(3683, 6091, 1, 9, 'Christea Erica Macatuhay', 'Sibling'),
(3688, 5489, 1, 8, 'ARLAN JOSE M. BATISLA-ONG ', 'Sibling'),
(3691, 6531, 1, 8, 'Chayl Gabayeran Pragados', 'Sibling'),
(3693, 6515, 1, 12, 'Hans Andrei A. Basco', 'Sibling'),
(3694, 5229, 1, 8, 'KURT PATRICK PALMA', 'Sibling'),
(3700, 4548, 1, 12, 'Mary Katherine G. Salingatag ', 'Relative'),
(3702, 4548, 1, 12, 'John Michael G. Gelogo', 'Relative'),
(3703, 4802, 1, 11, 'Alyssa Marie A. Padesterio', 'Sibling'),
(3704, 6019, 1, 11, 'Theodore Adrian G. Tongson', 'Sibling'),
(3705, 6525, 1, 12, 'Saimond P. Lee', 'Sibling'),
(3707, 6522, 1, 11, 'Chane Zia Abregana Guevarra', 'Sibling'),
(3709, 5008, 1, 8, 'Frenz Rhovic Horbino', 'Sibling'),
(3710, 5496, 1, 12, 'Catherine Mae S. Hernandez', 'Sibling'),
(3711, 5496, 1, 7, 'John christian Hernandez', 'Sibling'),
(3712, 6079, 1, 11, 'Ashleigh Nicole Delgado Firmeza', 'Sibling'),
(3713, 4373, 1, 9, 'John Rohanne M. Basale ', 'Sibling'),
(3716, 5526, 1, 0, '', ''),
(3717, 6410, 1, 11, 'Alfonzo Garcia', 'Relative'),
(3720, 5612, 1, 0, '', ''),
(3721, 4372, 1, 9, 'Ralph Johanne M. Basale', 'Sibling'),
(3726, 5656, 1, 10, 'Gerald jay loterono gargaciran', ''),
(3727, 5602, 1, 0, '', ''),
(3729, 5533, 1, 8, 'Kimbryan Franz Molinos Rojo', 'Sibling'),
(3730, 6395, 1, 10, 'Gelliane Karla Bariguez Coronado', 'Relative'),
(3733, 4429, 1, 0, '', ''),
(3734, 4313, 1, 0, '', ''),
(3735, 4535, 1, 12, 'Jillian J. Duetes', 'Sibling'),
(3737, 5589, 1, 8, 'Jhon Clarence Simpas ', 'Sibling'),
(3738, 5474, 1, 7, 'Paulo Joaquim Marion C. Macalalag ', 'Sibling'),
(3739, 4319, 1, 7, 'Francheska P. Andrin', 'Sibling'),
(3740, 5370, 1, 10, 'Angel A. Padre-e', 'Parent'),
(3741, 5479, 1, 12, 'JOLENN AMATORIO PEÑAFLORIDA ', 'Sibling'),
(3742, 5539, 1, 0, '', ''),
(3743, 4833, 1, 8, 'Myrr Julienne G. Perania', 'Sibling'),
(3744, 6409, 1, 10, 'Francis H. Palomar', 'Relative'),
(3745, 4608, 1, 11, 'Step Jackie F. Girao', 'Sibling'),
(3746, 4608, 1, 9, 'Danielle Jethro F. Girao', 'Sibling'),
(3747, 4608, 1, 0, 'Erra Flores Girao', 'Sibling'),
(3748, 5300, 1, 12, 'Leanie G. Caoyonan', 'Sibling'),
(3749, 6090, 1, 7, 'Jose Benrey F. Libo-on Jr.', 'Sibling'),
(3750, 6405, 1, 12, 'Jay Emma Marie L. Santiago', 'Sibling'),
(3751, 5072, 1, 9, 'FRANCIS PAUL PADILLO', 'Sibling'),
(3752, 6024, 1, 0, 'Alberto Rene C. Cabrias', 'Sibling'),
(3754, 4408, 1, 11, 'Juem Buaron', 'Sibling'),
(3759, 4678, 1, 0, 'None', ''),
(3761, 4433, 1, 0, '', ''),
(3763, 4323, 1, 0, 'None', ''),
(3764, 4818, 1, 9, 'Clint james andrade paredes', 'Parent'),
(3766, 4682, 1, 8, 'ELLYZA MARIE JUNSAN', 'Sibling'),
(3769, 4790, 1, 9, 'MATHEW LANCE V. OQUENDO', 'Parent'),
(3771, 4483, 1, 0, 'None', ''),
(3772, 4502, 1, 0, 'N/a', 'Sibling'),
(3776, 4953, 1, 12, 'Adrianne Kyle Tuayang ', 'Sibling'),
(3777, 4963, 1, 0, '', ''),
(3778, 4340, 1, 11, 'Jack dionne arroyo', 'Sibling'),
(3779, 4650, 1, 0, 'none', ''),
(3782, 4898, 1, 12, 'Jackie M. Aguilar', 'Relative'),
(3785, 4433, 1, 0, '', ''),
(3786, 5628, 1, 7, 'Roscyl Joy, Marcial, Escullar ', 'Sibling'),
(3787, 5075, 1, 7, 'Angel Cequena Sambas', 'Sibling'),
(3790, 4307, 1, 11, 'Sean Espinas Casten', 'Relative'),
(3791, 4531, 1, 10, 'Chloe Ashley Villacarlos', 'Relative'),
(3793, 4832, 1, 0, '', ''),
(3798, 4596, 1, 12, 'Joshua Angelo J. Gelvero', 'Sibling'),
(3799, 6523, 1, 8, 'Hannah Jabonillo', 'Sibling'),
(3801, 5581, 1, 11, 'Romella B. Buyco', 'Relative'),
(3802, 4465, 1, 12, 'Isaiah Thomas Cervantes', 'Sibling'),
(3803, 4655, 1, 10, 'Jancey benidect jaleco ', 'Sibling'),
(3806, 4335, 1, 0, '', ''),
(3807, 4335, 1, 0, '', ''),
(3809, 5504, 1, 12, 'William Yukio P. Ueda', 'Relative'),
(3810, 5109, 1, 0, 'Jhulliah Faye Bencalo Asma', 'Sibling'),
(3811, 5109, 1, 0, 'Sofia Asma', 'Parent'),
(3812, 5109, 1, 0, 'Jurie Umadhay Asma', 'Parent'),
(3813, 4630, 1, 8, 'Rayca Janna Hautea ', ''),
(3814, 4736, 1, 12, 'Rudnes Joe Magcumot', 'Sibling'),
(3815, 4364, 1, 0, 'None', ''),
(3816, 4560, 1, 10, 'Austin Gabriel Estomo', 'Sibling'),
(3817, 4560, 1, 12, 'Therese Frances Marie Estomo', 'Sibling'),
(3823, 5371, 1, 9, 'Lou Gerald Palomo Luciano', 'Relative'),
(3827, 6519, 1, 7, 'Leocris Egoc', 'Relative'),
(3828, 4996, 1, 7, 'Jelou Caryle Yngson', 'Sibling'),
(3829, 5585, 1, 12, 'Rhyzel C. Quimpo', 'Sibling'),
(3831, 4599, 1, 9, 'Carl Joseph D. Genilo ', 'Parent'),
(3832, 4765, 1, 12, 'HERA CAROLE MONGCAL', 'Sibling'),
(3834, 5481, 1, 7, 'Matthew Yap Ponce', 'Sibling'),
(3835, 5448, 1, 7, 'Xyrheece Alexa E. Nallas', 'Sibling'),
(3836, 5462, 1, 7, 'Vixen Jahzel Cabañero', 'Sibling'),
(3837, 5462, 1, 0, 'Rhodora Cabañero', 'Parent'),
(3843, 5511, 1, 7, 'Chriz Herold T. Arnaiz', 'Sibling'),
(3844, 5230, 1, 7, 'Ashlei Raye Anne G. Parman', 'Sibling'),
(3845, 5179, 1, 12, 'Katelene R. Montano', 'Sibling'),
(3848, 5545, 1, 12, 'Therese Frances Marie Estomo ', 'Sibling'),
(3849, 5545, 1, 9, 'Ella Marie Estomo ', 'Sibling'),
(3850, 5282, 1, 8, 'Jeff Constantine B. Gullo', 'Sibling'),
(3851, 5664, 1, 8, 'Jehan U. mayo', 'Sibling'),
(3854, 5443, 1, 7, 'Carl Andrei A. Jore', 'Sibling'),
(3855, 5011, 1, 8, 'Ray Gerome L. Lapating', 'Sibling'),
(3856, 5106, 1, 9, 'Gilmar S. Tolledo Jr.', 'Sibling'),
(3857, 5535, 1, 7, 'DAPHNE C. SOLANIB', 'Sibling'),
(3862, 5169, 1, 11, 'Gervin Nathan Girao ', 'Sibling'),
(3866, 5051, 1, 9, 'Pierre Joseph Fuerte Sarabia', 'Relative'),
(3867, 5222, 1, 9, 'Annegrace Danuya Cayanan', 'Sibling'),
(3868, 5257, 1, 8, 'Alejaih Frel P. Noble ', 'Sibling'),
(3870, 5071, 1, 12, 'Rian Karlo J. Nava', 'Sibling'),
(3871, 5442, 1, 7, 'Reylen Angela Nieles Guillano', 'Sibling'),
(3872, 5716, 1, 9, 'YAELLA MITSUI F.ABROT', 'Sibling'),
(3873, 5680, 1, 0, '', ''),
(3875, 5697, 1, 11, 'Jeasyl Mae S. Gabayeron', 'Relative'),
(3876, 5285, 1, 12, 'Leigh Ann R. Jayme', 'Sibling'),
(3877, 5194, 1, 11, 'Jan Wayne N. Dequilla ', 'Relative'),
(3879, 5648, 1, 9, 'Wilmar Theodore B. Borongan', 'Sibling'),
(3880, 5727, 1, 11, 'Francis Rhye M. Dalisay', 'Sibling'),
(3887, 5145, 1, 8, 'Merchelle Grace Genon', 'Sibling'),
(3889, 5183, 1, 0, '', ''),
(3890, 5389, 1, 12, 'Joefre Josh Gajo', 'Sibling'),
(3891, 5695, 1, 10, 'Collene aragorat regalado', 'Parent'),
(3892, 5595, 1, 7, 'Alexa Ysabelle E. Bibit', 'Sibling'),
(3893, 5412, 1, 8, 'Shanelle loraine descaya', 'Sibling'),
(3897, 5304, 1, 7, 'Chuck Planilla Deslate', 'Sibling'),
(3898, 5304, 1, 12, 'Shugar Robles Ebro', 'Relative'),
(3899, 5717, 1, 10, 'Angelo Y. Albolote', 'Sibling'),
(3900, 6527, 1, 7, 'John Andrei', 'Sibling'),
(3901, 5368, 1, 7, 'KIRT ARCA ', 'Relative'),
(3904, 5698, 1, 0, 'Arnel P. Tolentino ', 'Parent'),
(3911, 5405, 1, 11, 'Shan Banila', 'Sibling'),
(3912, 5407, 1, 0, '', ''),
(3913, 5407, 1, 0, '', ''),
(3915, 5405, 1, 9, 'Ryce Daniel Banila', 'Sibling'),
(3917, 5578, 1, 11, 'Blessie Jane L. Juros', 'Sibling'),
(3921, 5368, 1, 7, 'KIRT ARCA ', 'Relative'),
(3923, 4036, 1, 10, 'ZOE RHEYCE B. ROSALES', 'Sibling'),
(3928, 3923, 1, 9, 'Jelena Zoie Ascura', 'Sibling'),
(3929, 3500, 1, 0, 'Jazzy Keith A. Aguihap', 'Sibling'),
(3930, 4047, 1, 10, 'Kaye Alexa A. Salarda', 'Sibling'),
(3932, 5645, 1, 12, 'Chloe Marie R. Villanueva ', 'Sibling'),
(3933, 5645, 1, 7, 'Mica Villanueva ', 'Sibling'),
(3934, 3823, 1, 10, 'HAZEL ANNE L. JAROPILLO', 'Sibling'),
(3935, 5472, 1, 8, 'NEAL GABRIEL B. JAROPILLO', 'Sibling'),
(3938, 5398, 1, 8, 'rosabelle abainza portacion', 'Sibling'),
(3939, 5523, 1, 8, 'Hernan Jr G.Jastia', 'Sibling'),
(3940, 5720, 1, 12, 'Aleiyah Raika N. Baltazar', 'Sibling'),
(3941, 5234, 1, 0, '', ''),
(3944, 5580, 1, 12, 'Martha Emthonie L. Laniog', 'Sibling'),
(3946, 5386, 1, 8, 'Ma. Benette Therese Vilonero Escario', 'Sibling'),
(3947, 3946, 1, 12, 'Michael B. Oliveros Jr.', 'Sibling'),
(3948, 5224, 1, 8, 'Tristan Jake L. Grecia', 'Sibling'),
(3949, 5224, 1, 7, 'Krisha Nicole L. Jamantoc', 'Relative'),
(3950, 5224, 1, 7, 'Angel Ablao', 'Relative'),
(3952, 5180, 1, 7, 'Jilian Abigail Morit', 'Sibling'),
(3953, 5180, 1, 12, 'Daniel Morit', 'Sibling'),
(3955, 5441, 1, 9, 'Christian John Puga Geromiano', 'Sibling'),
(3957, 5378, 1, 0, '', ''),
(3959, 5652, 1, 12, 'Leo Donesa demonteverde ', 'Sibling'),
(3960, 3614, 1, 0, '', ''),
(3961, 5325, 1, 0, '', ''),
(3963, 3614, 1, 0, '', ''),
(3964, 5436, 1, 0, '', ''),
(3965, 5436, 1, 0, 'N/A', ''),
(3966, 5309, 1, 8, 'Velasco, Hannah Liezel B.', 'Relative'),
(3967, 5536, 1, 11, 'Mikhaela Grace G. Uy', 'Sibling'),
(3968, 4130, 1, 10, 'Janvirs Kate Bluza Guijarno', 'Relative'),
(3975, 5575, 1, 0, '', ''),
(3976, 5575, 1, 0, '', ''),
(3977, 5327, 1, 12, 'Jessie James Felongco Cuenca', 'Sibling'),
(3978, 5491, 1, 8, 'Cris Yuri C. Deocampo', 'Sibling'),
(3981, 5480, 1, 12, 'Venz Alfort P. Cabalar', 'Sibling'),
(3982, 5267, 1, 0, 'N/A', ''),
(3984, 5722, 1, 8, 'Israel B. Libuna', 'Relative'),
(3985, 6550, 1, 10, 'Zaharra Jane Almasan ', 'Sibling'),
(3987, 5509, 1, 7, 'rhian almasan ', 'Sibling'),
(3988, 6577, 1, 10, 'Princess Marymon M. Gerao', 'Relative'),
(3989, 6610, 1, 11, 'Jan Angeli M. Gadot', 'Sibling'),
(3990, 6620, 1, 10, 'EMMANUEL HERNANDEZ ', 'Sibling'),
(3991, 6620, 1, 12, 'CATHERINE MAE HERNANDEZ ', 'Sibling'),
(3994, 6649, 1, 0, 'N/A', ''),
(3996, 6621, 1, 11, 'Brix Andrew H. Lane', 'Relative'),
(3997, 6625, 1, 7, 'Alvin James comprendio janay', 'Sibling'),
(3998, 6641, 1, 0, '', ''),
(3999, 6543, 1, 8, 'Jr P. Naces', 'Relative'),
(4001, 6561, 1, 12, 'Geberlie Bales Loyola', 'Relative'),
(4003, 6643, 1, 0, '', ''),
(4004, 6634, 1, 0, '', ''),
(4007, 6641, 1, 0, '', ''),
(4008, 6642, 1, 9, 'SAMANTHA NICOLE MAQUIRANG', 'Sibling'),
(4009, 6580, 1, 0, 'Earl Mathew D. Caro', 'Sibling'),
(4010, 6690, 1, 0, '', ''),
(4011, 5597, 1, 7, 'REEZE MATTHEW  L. CAPEROCHO', 'Sibling'),
(4012, 6548, 1, 9, 'Pauleen S. Alejandro ', 'Relative'),
(4019, 6547, 1, 0, '', ''),
(4020, 6638, 1, 10, 'Paul Kenneth J. Luneta', 'Sibling'),
(4021, 6657, 1, 9, 'John Zeun Novilla', 'Sibling'),
(4022, 6545, 1, 0, '', ''),
(4027, 6572, 1, 0, '', ''),
(4028, 6573, 1, 0, '', ''),
(4031, 5412, 1, 0, '', ''),
(4033, 6650, 1, 10, 'Mariella Kate S. Morguia', 'Relative'),
(4034, 5687, 1, 0, '', ''),
(4035, 5379, 1, 10, 'Ala-an Shane John Bindoy', 'Sibling'),
(4037, 6654, 1, 9, 'Frinces Kate Nicolas', 'Sibling'),
(4040, 5379, 1, 10, 'Ala-an Shane John Bindoy', 'Relative'),
(4041, 5379, 1, 10, 'Ala-an Shane John Bindoy', 'Relative'),
(4042, 6669, 1, 9, 'Generose C. Puda', 'Sibling'),
(4044, 5340, 1, 0, 'None', ''),
(4045, 5329, 1, 7, 'Edzel Dave R. Favila', 'Sibling'),
(4056, 6685, 1, 10, 'Hanz James B. Samson', 'Sibling'),
(4057, 6663, 1, 0, '', ''),
(4058, 5569, 1, 0, '', ''),
(4059, 5633, 1, 12, 'Ian Mark Macasa Jucaban', 'Relative'),
(4060, 6575, 1, 11, 'Liane Rose T. Calama-an ', 'Sibling'),
(4065, 6722, 1, 10, 'Gian Carlo Ilagan Mariano', 'Sibling'),
(4066, 6722, 1, 7, 'Jhon Carl Ilagan Mariano', 'Sibling'),
(4069, 6564, 1, 8, 'Dorwin Clyde Hulleza Bantad', 'Sibling'),
(4070, 5464, 1, 7, 'Rhialyn Lacuesta', 'Sibling'),
(4072, 6569, 1, 11, 'Marie Andrea Denise B. Torres', 'Sibling'),
(4075, 5150, 1, 11, 'Christian Mirasol', 'Sibling'),
(4076, 6549, 1, 0, 'N/A', ''),
(4077, 3963, 1, 0, 'None', ''),
(4078, 5654, 1, 8, 'Sean Grizlee C. Enriquez ', 'Sibling'),
(4083, 6555, 1, 11, 'John Michael Lavalle', 'Relative'),
(4085, 5408, 1, 0, 'Simon Alvin Faja Capalla', 'Sibling'),
(4087, 5281, 1, 8, 'ANESSA GENIT', 'Sibling'),
(4088, 5061, 1, 0, '', ''),
(4095, 5163, 1, 10, 'Xedraic Job B. Aspera ', 'Parent'),
(4097, 6606, 1, 8, 'JOHN CHRIS G. FORTALEZA ', 'Sibling'),
(4098, 6683, 1, 0, 'N/a', ''),
(4102, 5601, 1, 10, 'Jenver Magbanua Dela cruz', 'Sibling'),
(4103, 5601, 1, 10, 'Jenver Magbanua Dela cruz', 'Sibling'),
(4104, 5601, 1, 10, 'Jenver Magbanua Dela cruz', 'Sibling'),
(4105, 5683, 1, 10, 'John angelo delos reyes', 'Relative'),
(4107, 6633, 1, 0, '', ''),
(4108, 5598, 1, 10, 'Mary Grace gramaje capillo', 'Parent'),
(4109, 6626, 1, 12, 'Kharl Vincent G. Bastareche', 'Relative'),
(4112, 6655, 1, 11, 'Franzene Jae L. Nobleza', 'Sibling'),
(4113, 6695, 1, 0, 'None', ''),
(4114, 6573, 1, 0, '', ''),
(4115, 6712, 1, 0, '', ''),
(4121, 6648, 1, 12, 'Lhiana Kate S. Molarte', 'Sibling'),
(4122, 6726, 1, 10, 'MCSVIVOR V. SUAREZ', 'Sibling'),
(4124, 5657, 1, 9, 'Rhalp Emmanuelle Naral Golez', ''),
(4125, 5674, 1, 0, '', ''),
(4126, 5611, 1, 12, 'AKIESHA CHRIZYL PARITA', 'Sibling'),
(4128, 5736, 1, 9, 'KAHLIL GERRO A. GUMBAN', 'Relative'),
(4131, 5659, 1, 8, 'Rafael Kylee orleans Jusayan', 'Sibling'),
(4132, 5390, 1, 8, 'Divine joy L. Gicole ', 'Sibling'),
(4133, 6632, 1, 9, 'Rhianne Lei G. Huertas', 'Relative'),
(4134, 5381, 1, 8, 'Justin f bayot', 'Sibling'),
(4135, 6632, 1, 9, 'Drew Alexander L. Alfaras', 'Relative'),
(4137, 6696, 1, 0, '', ''),
(4140, 6719, 1, 9, 'Nelsar John D. Lerdon', 'Relative'),
(4141, 6614, 1, 10, 'Neil John Jegonia', 'Sibling'),
(4144, 5603, 1, 8, 'Shakierah T. Fuentespina ', 'Sibling'),
(4145, 6557, 1, 10, 'NICHOLLE ARSENAL MARQUILLERO ', 'Relative'),
(4146, 5056, 1, 0, 'NA', ''),
(4149, 5125, 1, 12, 'RAPHAEL RIVERA JOMILLO', 'Relative'),
(4150, 6659, 1, 0, 'N/A', ''),
(4153, 5623, 1, 12, 'Sage P. Avenir', 'Sibling'),
(4154, 5623, 1, 8, 'Shiekha P. Avenir', 'Sibling'),
(4155, 5625, 1, 12, 'Gino Paul Bolivar', 'Sibling'),
(4159, 5701, 1, 12, 'Rosauro De Leon', 'Sibling'),
(4162, 5123, 1, 9, 'Ricco Phoenix Ponce De Leon', 'Sibling'),
(4164, 6677, 1, 12, 'Xyzamicah a rizardo', 'Relative'),
(4165, 5113, 1, 7, 'jericho borre galopo', 'Relative'),
(4166, 5551, 1, 10, 'Frank Louie C. mirador', ''),
(4167, 5551, 1, 10, 'Frank Louie C. Mirador', ''),
(4169, 6611, 1, 11, 'Michaela J. Biñas', 'Relative'),
(4170, 5417, 1, 9, 'Jermaine Paris N. Laguda', 'Sibling'),
(4171, 4689, 1, 10, 'Jeriell Jaidyn nobleza laguda', 'Sibling'),
(4172, 5544, 1, 8, 'Kevin kim M.De Vicente ', 'Sibling'),
(4174, 6609, 1, 9, 'Viatrece F. Beñico', 'Sibling'),
(4177, 5417, 1, 9, 'Jermaine paris nobleza laguda', 'Sibling'),
(4179, 5148, 1, 10, 'Charrese J. Legaste', 'Sibling'),
(4181, 5276, 1, 11, 'Giuseppe Agustine M. Erada', 'Sibling'),
(4187, 6565, 1, 0, '', ''),
(4190, 5399, 1, 12, 'Madelene Sario Rando', 'Parent'),
(4191, 3972, 1, 12, 'Jude Clyde Basco Panizales', 'Sibling'),
(4193, 6665, 1, 0, '', ''),
(4195, 5470, 1, 10, 'Jove alexis Ibojos', 'Sibling'),
(4196, 5118, 1, 10, 'Joevel anne Ibojos', 'Sibling'),
(4199, 5400, 1, 12, 'Khian Vincent Palomera Simbre', 'Sibling'),
(4200, 6665, 1, 12, 'Steven Rey Basal', 'Relative'),
(4201, 4068, 1, 12, 'Mark Andrew Saunar', 'Sibling'),
(4202, 6574, 1, 7, 'Japeth Aram Somblingo Cabug', 'Parent'),
(4204, 5637, 1, 7, 'Kim Rhian C. Maghari ', 'Sibling'),
(4205, 6714, 1, 9, 'Wencess Kim Badoy', 'Sibling'),
(4206, 6717, 1, 0, '', ''),
(4207, 6717, 1, 0, '', ''),
(4209, 1958, 1, 0, 'None ', ''),
(4210, 364, 1, 8, 'Camiel Ross Campos', 'Sibling'),
(4212, 6732, 1, 9, 'RAIN MATTHEW ESPINAL', 'Relative'),
(4213, 6738, 1, 10, 'RICK ELMER MORANTE', 'Relative'),
(4214, 6733, 1, 9, 'BRYAN IRINGAN', 'Sibling'),
(4215, 6735, 1, 8, 'ANDREY IRINGAN', 'Sibling'),
(4216, 6681, 1, 9, 'Denice Pauleen Salanio', 'Sibling'),
(4217, 6681, 1, 11, 'Justin Rozz Salanio', 'Sibling'),
(4218, 5315, 1, 12, 'Colliene Mae G. Ripalda', 'Sibling'),
(4219, 6740, 1, 10, 'John Carlo R. Favila', 'Sibling'),
(4220, 6746, 1, 8, 'Princess Kylla B Daymon', 'Sibling'),
(4221, 6741, 1, 12, 'Mars Rolen B. Hermano', 'Sibling'),
(4222, 6623, 1, 9, 'Liezelmae Labor Inting', 'Sibling'),
(4223, 6742, 1, 0, '', ''),
(4224, 6591, 1, 8, 'Princess Kylla B Daymon', 'Sibling'),
(4225, 6666, 1, 0, '', ''),
(4227, 6604, 1, 11, 'Cris Lawrence S. Fernandez', 'Sibling'),
(4230, 6591, 1, 8, 'Princess Kylla B Daymon', 'Sibling'),
(4232, 6749, 1, 0, '', ''),
(4233, 6591, 1, 8, 'Princess Kylla B Daymon', 'Sibling'),
(4234, 6591, 1, 8, 'Princess Kylla B Daymon', 'Sibling'),
(4236, 6747, 1, 0, '', ''),
(4240, 2448, 1, 7, 'Jerome Prince P. Hidalgo ', 'Sibling'),
(4241, 2754, 1, 9, 'Ethan Ziggy Defensor Pineda', 'Sibling'),
(4242, 506, 1, 10, 'Maezzelle Grace C. Delmo', 'Relative'),
(4243, 506, 1, 9, 'Ivy Jane E. Cordero', 'Relative'),
(4244, 6769, 1, 12, 'Rohaimah Umbar Barodi', 'Relative'),
(4245, 6770, 1, 0, '', ''),
(4246, 6776, 1, 11, 'Vhian Gabriel Peña', 'Sibling'),
(4247, 6777, 1, 0, '', ''),
(4248, 6777, 1, 0, '', ''),
(4249, 6624, 1, 7, 'Alcen G. Jama', 'Parent'),
(4250, 6773, 1, 10, 'James Charles Xavier D.Abad', 'Sibling'),
(4251, 6773, 1, 10, 'James Charles Xavier D.Abad', 'Sibling'),
(4252, 6767, 1, 0, '', ''),
(4255, 6765, 1, 8, 'Michael jan R.Sta Maria', 'Parent'),
(4256, 6768, 1, 10, 'Jhulian A. Magno', 'Sibling'),
(4257, 6790, 1, 10, 'Sean Benedict A. Jore', 'Sibling'),
(4258, 2702, 1, 9, 'John Vincent Gabor Lara ', 'Sibling'),
(4259, 6797, 1, 11, 'Chaitanya Louise M. Pia', 'Sibling'),
(4260, 6798, 1, 7, 'Lakeisha Adriel M. Calanza ', 'Sibling'),
(4261, 6799, 1, 10, 'Princess Marymon Gerao', 'Sibling'),
(4262, 6800, 1, 12, 'Jan Xavier Casco', 'Relative'),
(4263, 6808, 1, 12, 'Micaela Kashmir Batacandi', 'Relative');

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
  `sal_grade` int(11) NOT NULL,
  `step_1` decimal(8,2) NOT NULL,
  `step_2` decimal(8,2) NOT NULL,
  `step_3` decimal(8,2) NOT NULL,
  `step_4` decimal(8,2) NOT NULL,
  `step_5` decimal(8,2) NOT NULL,
  `step_6` decimal(8,2) NOT NULL,
  `step_7` decimal(8,2) NOT NULL,
  `step_8` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `plant_id` smallint(6) NOT NULL,
  `plantilla_item_no` varchar(150) NOT NULL,
  `position_title` varchar(120) NOT NULL,
  `salary_grade` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `school_year_tbl`
--

CREATE TABLE `school_year_tbl` (
  `sy_id` int(11) NOT NULL,
  `school_year` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_year_tbl`
--

INSERT INTO `school_year_tbl` (`sy_id`, `school_year`, `is_active`) VALUES
(1, '2023-2024', 1),
(2, '2024-2025', 0),
(3, '2025-2026', 0);

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
-- Table structure for table `station_tbl`
--

CREATE TABLE `station_tbl` (
  `st_id` int(11) NOT NULL,
  `st_assignment` varchar(200) NOT NULL,
  `st_office_id` varchar(30) NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `st_branch` varchar(150) NOT NULL,
  `st_created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_email`, `user_password`, `user_type`, `user_restriction`, `user_category`, `is_disabled`) VALUES
(274, 3294, 'yveskim.cabanting@iloilonhs.edu.ph', '$2y$10$ICUCIvVAvt1YR7RGFqes8O6QKkJVNZKByE71nFGv9tRbh0sLk0bYS', 'Admin', '1', 3, 0),
(276, 3311, 'johannathea.lupo@iloilonhs.edu.ph', '$2y$10$r5crkhDV7GBw.D3Ka6/hqOdjpMqLdDImIHrd5RJDPQtcGE6WvE/mq', 'Admin', '3', 2, 0),
(277, 3317, 'lorygene.umadhay@iloilonhs.edu.ph', '$2y$10$i4tDyVY4F0F/n374z.SrvuSPgfYhLt5kIJOsrRLsqWRaipDTBtbjG', 'Admin', '2', 1, 1),
(278, 3318, 'christine.marin@iloilonhs.edu.ph', '$2y$10$PYRRs0ROAB0n/PS58dKW2uuBuRptgNwJcYN7aBashcrXergAvVxda', 'Admin', '2', 1, 1),
(279, 3319, 'joy.arenga@iloilonhs.edu.ph', '$2y$10$/Ivr121HkgH3G/g3dhWlieyaeduwpQmNxV/DAp08Yz33dlhVhOyEC', 'Admin', '2', 3, 1),
(280, 3320, 'joan.pet@iloilonhs.edu.ph', '$2y$10$q7f5j35B.4oZJ7rkL27YE.amFgKAhzSsZOhp4cbAurPu2kZiaA2di', 'Admin', '2', 2, 1),
(281, 3321, 'joryvince.bebing@iloilonhs.edu.ph', '$2y$10$5MPk8zUtsOMWbLBc1AuJY.TutneuJ6FjvldrlWkIIUBW/mZPsS5Uu', 'Admin', '2', 2, 1),
(282, 3323, 'portia.estorque@iloilonhs.edu.ph', '$2y$10$EnowVM2lQyH/j67XFhy1CuIGnbdY40WkleLNV2RPUvGPnxL/wZ/1a', 'Admin', '2', 2, 1),
(283, 3324, 'isahmariecabios@gmail.com', '$2y$10$eKSx02U7w5Tn9rtjLAi7MOhQu/zjxLkwyVjPcXhBstTgQO9P8G66W', 'Admin', '2', 2, 1),
(284, 3325, 'irenevee.carmona@iloilonhs.edu.ph', '$2y$10$obUVmPl0h1t1P.xv4uPUROfkn/D1ExkDu/wTOQA70EhDpcv7rb9fC', 'Admin', '2', 2, 1),
(285, 3326, 'catherine.jacobe@iloilonhs.edu.ph', '$2y$10$16xTAN23l3c3GNggFhkqRuMsvVAqB3S0PaWr9zvQZVm5CmUZj3sMW', 'Admin', '2', 2, 1),
(286, 3327, 'maryjoy.delossantos1106@gmail.com', '$2y$10$oJ/emAjIrAg56ndeb/hAPu5UWMm/t5xqQ4LhzVKrZcXDPW0lgzpgK', 'Admin', '2', 2, 1),
(287, 3330, 'cynthia.pardorla@iloilonhs.edu.ph', '$2y$10$HhFtAj1Y3ijBnOuT4yBm2uGAIeJq0SHzfWIeU3UyiYT7dlTbPIXeS', 'Admin', '2', 1, 1),
(288, 3331, 'aljohnartacho@iloilonhs.edu.ph', '$2y$10$r7yh2CzHDq30Ttg25PDgMu7FQYhU6SYDjOon6UVVTId6CicKyHLaa', 'Admin', '2', 2, 0),
(289, 3329, 'loreleesolis123@gmail.com', '$2y$10$uN1t09f3hgf7jWoTa.U6UOboSPzPPeIcdpNplR4Ewv3qq9zIvMkRe', 'Admin', '2', 2, 1),
(290, 3333, 'roel.palmaira@deped.gov.ph', '$2y$10$Rxpq/CPsBRzcYqStdLY/be89/30KDSlBQTdTNrhNvb7SagYGeL34q', 'Admin', '2', 2, 1),
(291, 3332, 'nikkie.soropia@iloilonhs.edu.ph', '$2y$10$2h4U3Ujw/rDoOSVT/WEDbecgqbF5RZXzInBwcOX9KhvZQ0HdwMY7.', 'Admin', '2', 2, 1),
(292, 3334, 'marnel.gonzales@iloilonhs.edu.ph', '$2y$10$M1FgeDKM0.8wsgmj7V6vuu64KmAEYB.w4P56l1OIv7iA7oayha2KW', 'Admin', '2', 3, 0),
(293, 3335, 'alreychone@gmail.com', '$2y$10$Sigyxt06pyYPo.WDIF3NFerDUtONbBpZJAQLa9FUW97.XTuXOft.C', 'Admin', '2', 2, 1),
(294, 3336, 'neil.bobis@iloilonhs.edu.ph', '$2y$10$GXm0E1lmVO2sYPYLwD3BZeQfdO93Upaa0spe/5uzDRxQe8hPyRuOK', 'Admin', '2', 2, 1),
(295, 3359, 'markandrew.espano@iloilonhs.edu.ph', '$2y$10$YGGtFSy4aB8MM1J9Sp8/B.hMDccu4Cru5lSf.G4hGiNOnuX8Nzr5e', 'Admin', '2', 2, 1),
(296, 3360, 'arnil.palomar@iloilonhs.edu.ph', '$2y$10$06FqG4E/Z/RX2JY0dOt7a.1cpsaFAw6iefN0IO2D19i0I.Jig.rTm', 'Admin', '2', 2, 1),
(297, 3361, 'mariaaries.pastolero@iloilonhs.edu.ph', '$2y$10$bdci6DvBdTqpMtdzf1nOAO9VrjhzHXTXXp3cMEVgIB.Y2XH.WlKH2', 'Admin', '1', 1, 0),
(298, 3362, 'jano.tabor@iloilonhs.edu.ph', '$2y$10$mxw8HLKtMsoAeb27QbScGuT6rglvIRC42/mUnb1ltDsUDfx4uv69O', 'Admin', '1', 3, 0),
(299, 3363, 'lino.sajonia@iloilonhs.edu.ph', '$2y$10$eRuUC8HNsdEn2l4IeEGqp.kQ36Hp5ETsAdQzCLl/TcpBay.N7nSlC', 'Admin', '2', 1, 1),
(300, 3364, 'josegilbert.aborde@iloilonhd.edu.ph', '$2y$10$0/B81S3Ol3U3LfLPBm6m/.ISeXktVaqF3BSEDMBH5objrz9SKfHRe', 'Admin', '2', 1, 0),
(301, 3365, 'marites.hisancha@iloilonhs.edu.ph', '$2y$10$8yyIQEm63ylKtzmWtLcx3OjV5XjN7LHSMG7GZ0St.HTn3aCHmuh56', 'Admin', '2', 1, 1),
(302, 3366, 'gemmalyn.medroso@iloilonhs.edu.ph', '$2y$10$UCNjRw3AbYVL/UMcVTbh.uoNQkI/WsZbywsypXa5m9JVZzJ2POaXq', 'Admin', '2', 1, 0),
(303, 3367, 'abrahamedgar.vargas@iloilonhs.edu.ph', '$2y$10$BBeZGVZ8RcL8N3U.O03gfecsKe.JY7Y4bHf1mZNG2QGIoiXtOSTWK', 'Admin', '2', 1, 1),
(304, 3368, 'dainafaith.naorbe@iloilonhs.edu.ph', '$2y$10$/kxt4j5E9PgywFwXm6yZKefybAgsh2T76Z0wwOayZVf/yQSIxOaJS', 'Admin', '2', 1, 1),
(305, 3371, 'emcy.amor@iloilonhs.edu.ph', '$2y$10$dh2UcBpJU0mOJ.uRIuV7UeECoBDb0nt.QX3Bk9UAmuyTbtGNr5PHu', 'Admin', '2', 1, 0),
(306, 3369, 'elisarjoy.jovacon@iloilonhs.edu.ph', '$2y$10$1w9QfKZUumxPyZIKT9usQ.dGS5UYJ5RxdyqWIfinRdBQOnHLb4jaC', 'Admin', '2', 1, 0),
(307, 3370, 'katherinegrace.simora@iloilonhs.edu.ph', '$2y$10$zbqU9QOV6Ue2v1y5EkxFnuiYXd3iYiRTnpufMj4M8asyVIm1ixDNy', 'Admin', '2', 1, 0),
(308, 3372, 'cherryjoy.castro@iloilonhs.edu.ph', '$2y$10$IgapR.Gj9I2S7C4vngJIkugFAAKe86FQeMhfhCUfzTSKl1fTF4SFi', 'Admin', '2', 1, 0),
(309, 3373, 'maleonora.tingatinga@iloilonhs.edu.ph', '$2y$10$VZiN.CHymtEp8LQlrvFRZ.iOVrhNT1JgP/RxdLjLbrtVpyuLd/73G', 'Admin', '2', 3, 0),
(310, 3374, 'jonalyn.pauchano@iloilonhs.edu.ph', '$2y$10$JW7UyAXke2dp1sizvSx0cuU3UfUZxViztaHrOYCmbMlrdR8hlIqne', 'Admin', '2', 3, 0),
(311, 3375, 'glenndave.horbino@iloilonhs.edu.ph', '$2y$10$imz4dbiHZTysVnww7iMM3.IVNNNt3QA3EQ/Ru38O4IRI9OVuGdeNG', 'Admin', '2', 3, 0),
(312, 3376, 'lovelyncastro@iloilonhs.edu.ph', '$2y$10$.T21kamj6jElxfH9ce/qTeBTU3uC1.7TaUp.PhU1/H2VdSaGM/fPS', 'Admin', '2', 2, 0),
(313, 3377, 'guilibeth.espanola@iloilonhs.edu.ph', '$2y$10$A8pqVVFIYtcsXe/vXYzUjuYgxPdHfgnPkMuzgSaVj9HgpQm6iGclm', 'Admin', '2', 1, 0),
(314, 3378, 'lailane.valdez@iloilonhs.edu.ph', '$2y$10$xr4nljShG4y8dnZ0MMKCCuzQU.NQe8MgDzWaUfwgYELNEFvnSi5/6', 'Admin', '2', 1, 0),
(315, 3379, 'imyjoy.maprangala@iloilonhs.edu.ph', '$2y$10$.Dbswv8Aak0PcllHpemklOMV8UCWJ2KslsQaAtKUqN5H.dyin1klG', 'Admin', '2', 1, 0),
(316, 3380, 'grace.cabaya@iloilonhs.edu.ph', '$2y$10$Yo7r1f3.eSA/IM0GZTuYKezM04AAcMpGNT2D5dy2sYN6VG999XUmi', 'Admin', '2', 1, 0),
(317, 3381, 'melbournetherese.araniador@iloilonhs.edu.ph', '$2y$10$5UAN6E0azRuCyFE.bVNZgeJKIAWOgxC0rs3DXfVad3TKKMEl.QXkW', 'Admin', '2', 1, 0),
(318, 3382, 'crezyl.tagudando@iloilonhs.edu.ph', '$2y$10$dXwpJlLWlFFxnZdbwlZVu.MM/DTXECOqYWQRusGYfpLDbtvsNvUtm', 'Admin', '2', 1, 0),
(319, 3383, 'malennie.cabunagan@iloilonhs.edu.ph', '$2y$10$kFPWHDnGCmp7ZagWrV9CsOkomu4R9l1muhfjNYxCVWM3oVfXY7hUS', 'Admin', '2', 1, 0),
(320, 3384, 'rhanjitkimangelo.ferriol@iloilonhs.edu.ph', '$2y$10$cjWjd1.1dgPGpSCn/J0cmeBoLDlliwIIpX.MJnfRh9CS8jSTpmVea', 'Admin', '2', 1, 0),
(321, 3385, 'rolando.jose@iloilonhs.edu.ph', '$2y$10$W3hseMceXIzD5GXFdxdPWuCWSqxImDOOR//W0jRhwUFLrnsAOL/pG', 'Admin', '2', 1, 0),
(322, 3386, 'virgil.bajala@iloilonhs.edu.ph', '$2y$10$GF2YRpdda50P4zmIJ2KIYu4NTh.K3W3UROsd/xrQPM9BzrTWa9joe', 'Admin', '2', 1, 0),
(323, 3387, 'ronagrace.paloma@iloilonhs.edu.ph', '$2y$10$TA0fRTKtj1RPYgwGJtWa.ue10XtsYlS9Tfn64R/WculqVR40extXe', 'Admin', '2', 1, 0),
(324, 3388, 'fritziemeterio@iloilonhs.edu.ph', '$2y$10$pvGzH.wdQPylP6bUqGL.gu2z78EBVthju/wMwqKC.Osgwbx1NLwWq', 'Admin', '2', 1, 0),
(325, 3389, 'amber.buyco@iloilonhs.edu.ph', '$2y$10$BFTWWINSwTeQ0m9/q4CDjuuJYuiRE1E7U0.L/.34e3PpwkEVcxQg2', 'Admin', '2', 1, 0),
(326, 3390, 'cristian.franco@iloilonhs.edu.ph', '$2y$10$zSyEEegxFdwHmkeS4JSyWu/0DDhsibSfRkdNkKGc.gkFcXb2a.jsS', 'Admin', '2', 1, 0),
(327, 3391, 'leajoymeterio@iloilonhs.edu.ph', '$2y$10$KtDzA.7cSQ1eXjZY494pEuf7mMagzJ2s1yGTM1GMI4UT3bNwgWtVy', 'Admin', '2', 1, 0),
(328, 3392, 'ivy.cordero@iloilonhs.edu.ph', '$2y$10$ML7j8jONOAGTKiNNSIcU5.kLxPqnODicHiGUFb8TTwsmukNbRzwoe', 'Admin', '2', 1, 0),
(329, 3393, 'diary.rodriguez@iloilonhs.edu.ph', '$2y$10$0c6R2iKkJdWtXmQGEqOl/u9kqECeXA8tEqYPriuOOToNOgtacBUGu', 'Admin', '2', 1, 0),
(330, 3394, 'kentarman.demaala@iloilonhs.edu.ph', '$2y$10$tWMNWo0pGBQ4OOQNLoYUy.rtOZiZzbDO904Uxaen/5schJvxvu42e', 'Admin', '2', 3, 0),
(331, 3396, 'angierose.supremo@iloilonhs.edu.ph', '$2y$10$b2YjgKeoVCvSQM0a9OR4i..qEaTk/02vPTeWC/mYsdL6AyEZoUgDe', 'Admin', '2', 1, 0),
(332, 3397, 'john.joquino@iloilonhs.edu.ph', '$2y$10$voiP.LezGLY.aguUrLOZK.AuXzqHG0tmrQwOh4wwjEkJdMGpQLwMK', 'Admin', '2', 1, 0),
(333, 3398, 'iab3cp4@gmail.com', '$2y$10$rMgKkkaoob3o.C51xug/h.YdNQ2ISWVc.HM7m1XAAabuVjsmVFwNe', 'Admin', '1', 3, 0),
(334, 3400, 'susetteabuyco@gmail.com', '$2y$10$fRcX21bWEp5MO1tuMMCbKep/mW9MvSNZi.pwKljYUP10XaHG8ztxy', 'HR', '1', 3, 0),
(335, 3425, 'joseph.gareza@iloilonhs.edu.ph', '$2y$10$2e5ULlZOl41uQdDlLiS4iO.mYNrhatUNqtfYEHeh15oPRCmerP00q', 'Admin', '1', 3, 0),
(336, 3426, 'arvin.malayas@iloilonhs.edu.ph', '$2y$10$hVT8AJVOolrRgTJ5BKgLm.Q4qSI5HyZCHoqFSoXn7oZ9V9FXd48Pu', 'Admin', '1', 3, 0),
(337, 3418, 'maryann.colonia@iloilonhs.edu.ph', '$2y$10$DZhGDmzomk9AevuzsztqBeLAG418jL/fCKDw5vMa39LN1Am52YMa2', 'Admin', '2', 2, 0),
(338, 3430, 'gladys.harder@iloilonhs.edu.ph', '$2y$10$CQvy4cRMBryLp8hhvS52G.iFBwObt6gGKzdPXdLsiUEx01eJuutXe', 'Admin', '2', 3, 0),
(339, 3322, 'bernadette.albiso@gmail.com', '$2y$10$.FZ8nBfrwkaPugPj1rn5EOvam4LvdfuWOQke6.PgHf.fQgY64lRMa', 'Admin', '3', 2, 0);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `emp_monthly_deduction_tbl`
--
ALTER TABLE `emp_monthly_deduction_tbl`
  ADD PRIMARY KEY (`ded_id`),
  ADD KEY `ded_emp_id` (`ded_emp_id`),
  ADD KEY `ded_sy_id` (`ded_sy_id`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD PRIMARY KEY (`others_id`),
  ADD KEY `others_emp_id` (`others_emp_id`);

--
-- Indexes for table `emp_plantilla_tbl`
--
ALTER TABLE `emp_plantilla_tbl`
  ADD PRIMARY KEY (`emp_plant_id`),
  ADD KEY `plant_id` (`plant_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `nbc_id` (`nbc_id`),
  ADD KEY `assigned_by` (`assigned_by`);

--
-- Indexes for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `ref_emp_id` (`ref_emp_id`);

--
-- Indexes for table `emp_seperation_tbl`
--
ALTER TABLE `emp_seperation_tbl`
  ADD PRIMARY KEY (`es_id`),
  ADD KEY `es_emp_id` (`es_emp_id`),
  ADD KEY `es_processed_by` (`es_processed_by`);

--
-- Indexes for table `emp_station_tbl`
--
ALTER TABLE `emp_station_tbl`
  ADD PRIMARY KEY (`emp_st_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `st_emp_id` (`st_emp_id`),
  ADD KEY `emp_st_assigned_by` (`emp_st_assigned_by`);

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
-- Indexes for table `nbc_tbl`
--
ALTER TABLE `nbc_tbl`
  ADD PRIMARY KEY (`nbc_id`);

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
  ADD PRIMARY KEY (`plant_id`),
  ADD UNIQUE KEY `plantilla_item_no` (`plantilla_item_no`);

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
-- Indexes for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `station_tbl`
--
ALTER TABLE `station_tbl`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `st_created_by` (`st_created_by`);

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
  MODIFY `educ_bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `eligibility_t`
--
ALTER TABLE `eligibility_t`
  MODIFY `elig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `skills_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_t`
--
ALTER TABLE `employee_t`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3432;

--
-- AUTO_INCREMENT for table `employment_status_tbl`
--
ALTER TABLE `employment_status_tbl`
  MODIFY `emp_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emp_monthly_deduction_tbl`
--
ALTER TABLE `emp_monthly_deduction_tbl`
  MODIFY `ded_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  MODIFY `others_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `emp_plantilla_tbl`
--
ALTER TABLE `emp_plantilla_tbl`
  MODIFY `emp_plant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  MODIFY `ref_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_seperation_tbl`
--
ALTER TABLE `emp_seperation_tbl`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_station_tbl`
--
ALTER TABLE `emp_station_tbl`
  MODIFY `emp_st_id` bigint(20) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `family_bg_t`
--
ALTER TABLE `family_bg_t`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grade_level_tbl`
--
ALTER TABLE `grade_level_tbl`
  MODIFY `grade_level_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `household_members_tbl`
--
ALTER TABLE `household_members_tbl`
  MODIFY `hm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4264;

--
-- AUTO_INCREMENT for table `learning_development_t`
--
ALTER TABLE `learning_development_t`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nbc_tbl`
--
ALTER TABLE `nbc_tbl`
  MODIFY `nbc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `program_tbl`
--
ALTER TABLE `program_tbl`
  MODIFY `prog_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `station_tbl`
--
ALTER TABLE `station_tbl`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `emp_monthly_deduction_tbl`
--
ALTER TABLE `emp_monthly_deduction_tbl`
  ADD CONSTRAINT `emp_monthly_deduction_tbl_ibfk_1` FOREIGN KEY (`ded_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_monthly_deduction_tbl_ibfk_2` FOREIGN KEY (`ded_sy_id`) REFERENCES `school_year_tbl` (`sy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_others_t`
--
ALTER TABLE `emp_others_t`
  ADD CONSTRAINT `emp_others_t_ibfk_1` FOREIGN KEY (`others_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_plantilla_tbl`
--
ALTER TABLE `emp_plantilla_tbl`
  ADD CONSTRAINT `emp_plantilla_tbl_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plantilla_tbl` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_plantilla_tbl_ibfk_3` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_plantilla_tbl_ibfk_4` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_plantilla_tbl_ibfk_5` FOREIGN KEY (`nbc_id`) REFERENCES `nbc_tbl` (`nbc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_reference_tbl`
--
ALTER TABLE `emp_reference_tbl`
  ADD CONSTRAINT `emp_reference_tbl_ibfk_1` FOREIGN KEY (`ref_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_seperation_tbl`
--
ALTER TABLE `emp_seperation_tbl`
  ADD CONSTRAINT `emp_seperation_tbl_ibfk_1` FOREIGN KEY (`es_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_station_tbl`
--
ALTER TABLE `emp_station_tbl`
  ADD CONSTRAINT `emp_station_tbl_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `station_tbl` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_station_tbl_ibfk_2` FOREIGN KEY (`st_emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_station_tbl_ibfk_3` FOREIGN KEY (`emp_st_assigned_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `station_tbl`
--
ALTER TABLE `station_tbl`
  ADD CONSTRAINT `station_tbl_ibfk_1` FOREIGN KEY (`st_created_by`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_t` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
