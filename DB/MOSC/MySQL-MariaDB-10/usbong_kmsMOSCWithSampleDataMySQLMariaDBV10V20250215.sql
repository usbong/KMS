-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 07:55 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usbong_kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(11) NOT NULL,
  `cashier_name` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_name`) VALUES
(1, 'SYSON, MICHAEL B.'),
(2, 'SURNAME, NAME C');

-- --------------------------------------------------------

--
-- Table structure for table `imagev2`
--

CREATE TABLE `imagev2` (
  `image_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT 0,
  `image_filename` text NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL DEFAULT 0,
  `expiration_date` date NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  `is_item_returned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_type_id` tinyint(4) NOT NULL,
  `item_quantity_per_box` tinyint(4) NOT NULL DEFAULT 0,
  `item_cost_discounted` decimal(10,2) NOT NULL DEFAULT -1.00,
  `item_cost` decimal(10,2) NOT NULL DEFAULT -1.00,
  `item_total_sold` int(11) NOT NULL DEFAULT 0,
  `is_hidden` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` tinyint(4) NOT NULL,
  `item_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_name`) VALUES
(0, 'Non-medicine'),
(1, 'Medicine'),
(2, 'Non-Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `lab_service`
--

CREATE TABLE `lab_service` (
  `lab_service_id` int(11) NOT NULL,
  `lab_service_item_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `lab_service_date` date NOT NULL,
  `lab_service_notes` text CHARACTER SET utf8mb4 NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_service_item`
--

CREATE TABLE `lab_service_item` (
  `lab_service_item_id` int(11) NOT NULL,
  `lab_service_item_name` text NOT NULL,
  `lab_service_price` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_service_item`
--

INSERT INTO `lab_service_item` (`lab_service_item_id`, `lab_service_item_name`, `lab_service_price`, `added_datetime_stamp`) VALUES
(1, 'URINALYSIS (URIC ACID)', 70, '2022-08-29 06:59:40'),
(2, 'HIV / AIDS', 0, '2021-02-13 01:05:27'),
(3, 'AFB', 0, '2021-02-13 01:05:27'),
(4, 'BUA', 120, '2022-04-11 01:35:27'),
(5, 'SODIUM', 200, '2022-08-29 07:03:04'),
(6, 'FECALYSIS', 0, '2021-02-13 01:05:27'),
(7, 'HEPA B SCREENING', 0, '2021-02-13 01:05:27'),
(8, 'PBS', 0, '2021-02-13 01:05:27'),
(9, 'VLDL', 0, '2021-02-13 01:05:27'),
(10, 'POTASSIUM', 200, '2022-08-29 07:03:08'),
(11, 'CBC/PC', 300, '2022-08-29 06:59:48'),
(12, 'T3 T4', 0, '2021-02-13 01:05:27'),
(13, 'CHOLESTEROL', 150, '2022-08-29 07:00:09'),
(14, 'SGOT', 0, '2021-02-13 01:05:27'),
(15, 'CALCIUM', 250, '2022-08-29 07:02:57'),
(16, 'ESR', 300, '2022-08-29 07:01:24'),
(17, 'TSH', 0, '2021-02-13 01:05:28'),
(18, 'TG', 0, '2021-02-13 01:05:28'),
(19, 'SGPT', 150, '2022-08-29 07:02:32'),
(20, 'MAGNESIUM', 0, '2021-02-13 01:05:28'),
(21, 'PT', 0, '2021-02-13 01:05:28'),
(22, 'ASO TITER', 0, '2021-02-13 01:05:28'),
(23, 'HDL', 0, '2021-02-13 01:05:28'),
(24, 'ALKPHOS', 0, '2021-02-13 01:05:28'),
(25, 'PHOSPHOROUS', 0, '2021-02-13 01:05:28'),
(26, 'PTT', 0, '2021-02-13 01:05:28'),
(27, 'RF', 0, '2021-02-13 01:05:28'),
(28, 'LDL', 0, '2021-02-13 01:05:28'),
(29, 'TB', 0, '2021-02-13 01:05:28'),
(30, 'CHLORIDE', 0, '2021-02-13 01:05:28'),
(31, 'RPR (VDRL)', 0, '2021-02-13 01:05:28'),
(32, 'CRP', 0, '2021-02-13 01:05:28'),
(33, 'BUN', 120, '2022-08-29 07:02:20'),
(34, 'DB', 0, '2021-02-13 01:05:28'),
(35, 'OTHERS:', 0, '2021-02-13 01:05:29'),
(36, 'WIDAL TEST', 0, '2021-02-13 01:05:29'),
(37, 'GRAM STAIN', 0, '2021-02-13 01:05:29'),
(38, 'CREATININE', 120, '2022-08-29 07:02:11'),
(39, 'IB', 0, '2021-02-13 01:05:29'),
(40, 'TYPHIDOT ', 0, '2021-02-13 01:05:29'),
(41, 'HGT/FBS', 120, '2022-08-29 07:00:51'),
(42, 'CULTURE AND SENSITIVITY', 650, '2022-08-29 07:01:06'),
(43, 'HBA1C', 650, '2022-08-29 07:01:41'),
(44, 'PSA', 1200, '2022-08-29 07:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `medical_doctor`
--

CREATE TABLE `medical_doctor` (
  `medical_doctor_id` int(11) NOT NULL,
  `medical_doctor_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_doctor`
--

INSERT INTO `medical_doctor` (`medical_doctor_id`, `medical_doctor_name`) VALUES
(0, 'ANY'),
(1, 'SYSON, PEDRO'),
(2, 'SYSON, PETER'),
(3, 'ESPINOSA, JHONSEL'),
(4, 'REJUSO-MORALES, CHASTITY AMOR'),
(5, 'DELA PAZ, RODIL'),
(6, 'LASAM, HONESTO'),
(7, 'BALCE, GRACIA CIELO'),
(8, 'SUMMARY');

-- --------------------------------------------------------

--
-- Table structure for table `medical_technologist`
--

CREATE TABLE `medical_technologist` (
  `medical_technologist_id` int(11) NOT NULL,
  `medical_technologist_name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_technologist`
--

INSERT INTO `medical_technologist` (`medical_technologist_id`, `medical_technologist_name`) VALUES
(1, 'SURNAME, NAME MT');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_first_name` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_last_name` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_email_address` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_contact_number` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_shipping_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_country` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_postal_code` int(11) NOT NULL,
  `member_type` tinyint(4) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `last_logged_in_datetime_stamp` datetime DEFAULT NULL,
  `last_logged_out_datetime_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_type`
--

CREATE TABLE `member_type` (
  `member_type_id` tinyint(4) NOT NULL,
  `member_type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_type`
--

INSERT INTO `member_type` (`member_type_id`, `member_type_name`) VALUES
(1, 'medical doctor'),
(2, 'physical therapist'),
(3, 'secretary'),
(4, 'systems engineer'),
(5, 'programmer'),
(6, 'network administrator'),
(7, 'illustrator'),
(8, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(16) NOT NULL,
  `patient_name` varchar(60) NOT NULL,
  `sex_id` tinyint(4) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `age_unit` tinyint(4) DEFAULT NULL,
  `medical_doctor_id` int(11) DEFAULT NULL,
  `civil_status_id` tinyint(4) DEFAULT NULL,
  `pwd_senior_id` text DEFAULT NULL,
  `occupation` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `location_address` text DEFAULT NULL,
  `barangay_address` text DEFAULT NULL,
  `postal_address` text DEFAULT NULL,
  `province_city_ph_address` text DEFAULT NULL,
  `last_visited_date` text NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_type_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_type`
--

CREATE TABLE `receipt_type` (
  `receipt_type_id` int(11) NOT NULL,
  `receipt_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_type`
--

INSERT INTO `receipt_type` (`receipt_type_id`, `receipt_type_name`) VALUES
(1, 'MARIKINA ORTHOPEDIC SPECIALTY CLINIC'),
(2, 'P.A.S. ORTHOPEDIC AND MEDICAL SUPPLIES'),
(3, 'MEDICAL DOCTOR NAME');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_type_id` tinyint(4) NOT NULL DEFAULT 2,
  `report_filename` text CHARACTER SET utf8mb4 NOT NULL,
  `report_item_id` int(11) NOT NULL DEFAULT 1,
  `member_id` int(11) NOT NULL DEFAULT 3,
  `report_answer` text DEFAULT NULL,
  `report_description` text CHARACTER SET utf8mb4 NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_item`
--

CREATE TABLE `report_item` (
  `report_item_id` int(11) NOT NULL,
  `report_type_id` tinyint(4) NOT NULL,
  `report_item_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `report_item_priority` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_item`
--

INSERT INTO `report_item` (`report_item_id`, `report_type_id`, `report_item_name`, `report_item_priority`) VALUES
(1, 1, '1) Were the project goals met?*', 1),
(2, 1, '2) Was the project successful?*', 2),
(3, 1, '3) Your reflections on #1 & #2?*', 3),
(4, 1, '4) Give comments on the use of different project management tools and techniques.*', 4),
(5, 1, '5) What are the causes of variances (i.e. difference between what is expected and what is actually accomplished) on the project?*', 5),
(6, 1, '6) What is your reasoning behind the corrective actions that your team chose?*', 6),
(7, 1, '7) Describe one example of what went right on this project.*', 7),
(8, 1, '8) Describe one example of what went wrong on this project.*', 8),
(9, 1, '9) What will you do differently on the next project based on your experience working on this project?*', 9),
(10, 1, '10) Give your personal words of wisdom based on your team\'s experiences.*', 10);

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `report_type_id` tinyint(4) NOT NULL,
  `report_type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`report_type_id`, `report_type_name`) VALUES
(1, 'Lessons-learned Report'),
(2, 'OT and PT Treatment'),
(3, 'Incident Report'),
(4, 'Reports from All Locations'),
(5, 'Report Image'),
(6, 'Consultation'),
(7, 'Medicine Purchase'),
(8, 'Information Desk Queue Report'),
(9, 'Report File');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `security_id` int(11) NOT NULL,
  `security_inbound` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`security_id`, `security_inbound`, `note`) VALUES
(1, '127.0.0.1', 'localhost'),
(2, 'localhost', 'localhost'),
(3, '::1', 'localhost'),
(4, '192.168.1', 'from same network');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL,
  `therapist_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`therapist_id`, `therapist_name`) VALUES
(1, 'SURNAME, NAME T');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(16) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT 0,
  `transaction_date` text NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `fee` decimal(11,2) NOT NULL,
  `fee_quantity` int(11) NOT NULL DEFAULT 0,
  `x_ray_fee` decimal(11,2) NOT NULL,
  `lab_fee` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `med_fee` decimal(11,2) NOT NULL,
  `pas_fee` decimal(11,2) NOT NULL,
  `snack_fee` decimal(11,2) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL,
  `treatment_type_name` varchar(30) NOT NULL DEFAULT '''CONSULT''',
  `treatment_diagnosis` text NOT NULL,
  `transaction_old_new` tinyint(2) NOT NULL DEFAULT 0,
  `medical_doctor_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `ip_address_id` tinytext NOT NULL,
  `machine_address_id` tinytext NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction2020`
--

CREATE TABLE `transaction2020` (
  `transaction_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT 0,
  `transaction_date` text NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `fee` decimal(11,2) NOT NULL,
  `fee_quantity` int(11) NOT NULL DEFAULT 0,
  `x_ray_fee` decimal(11,2) NOT NULL,
  `lab_fee` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `med_fee` decimal(11,2) NOT NULL,
  `pas_fee` decimal(11,2) NOT NULL,
  `snack_fee` decimal(11,2) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL,
  `treatment_type_name` varchar(30) NOT NULL DEFAULT '''CONSULT''',
  `treatment_diagnosis` text NOT NULL,
  `transaction_old_new` tinyint(2) NOT NULL DEFAULT 0,
  `medical_doctor_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `ip_address_id` tinytext NOT NULL,
  `machine_address_id` tinytext NOT NULL,
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`transaction_type_id`, `transaction_type_name`) VALUES
(1, 'CASH'),
(2, 'SC'),
(3, 'PWD'),
(4, 'HMO/ETIQA'),
(5, 'HMO/AVEGA'),
(6, 'HMO/BLUECROSS'),
(7, 'HMO/CAREHEALTHPLUS'),
(8, 'HMO/COCOLIFE'),
(9, 'HMO/EASTWEST'),
(10, 'HMO/GENERALIPHIL'),
(11, 'HMO/GETWELL'),
(12, 'HMO/HMI'),
(13, 'HMO/INTELLICARE'),
(14, 'HMO/LACSON-LACSON'),
(15, 'HMO/MAXICARE'),
(16, 'HMO/MEDASIA'),
(17, 'HMO/MEDICARD'),
(18, 'HMO/MEDOCARE'),
(19, 'HMO/PHILCARE'),
(20, 'HMO/VALUCARE');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_body_location`
--

CREATE TABLE `x_ray_body_location` (
  `x_ray_body_location_id` int(11) NOT NULL,
  `x_ray_body_location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `x_ray_body_location`
--

INSERT INTO `x_ray_body_location` (`x_ray_body_location_id`, `x_ray_body_location_name`) VALUES
(0, 'NONE'),
(1, 'Chest (pedia)'),
(2, 'Chest (adult)'),
(3, 'Shoulder'),
(4, 'Wrist'),
(5, 'Hand'),
(6, 'Elbow'),
(7, 'Forearm'),
(8, 'Humerus'),
(9, 'Foot'),
(10, 'Ankle Mortise'),
(11, 'Ankle/Foot'),
(12, 'Both Os calsis'),
(13, 'Leg (adult)'),
(14, 'Leg (pedia)'),
(15, 'knee'),
(16, 'Knee / Patella'),
(17, 'Femur (adult)'),
(18, 'Femur (pedia)'),
(19, 'Skull'),
(20, 'Cervical'),
(21, 'T-cage'),
(22, 'Pelvis'),
(23, 'Pelvis / Hip Joints'),
(24, 'Thoraco-lumbar'),
(25, 'Lumbo-sacral'),
(26, 'Lumbo-sacral to lower thoracic'),
(27, 'Coccyx'),
(28, 'Both Lower Extremities (pedia)'),
(29, 'Knee Standing'),
(30, 'Cervico-thoracic'),
(31, 'Babygram'),
(32, 'Ankle'),
(33, 'Both Os calsis - Tongue'),
(34, 'Knee Standing / Patella'),
(35, 'Both Lower Extremities');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_service`
--

CREATE TABLE `x_ray_service` (
  `x_ray_service_id` int(11) NOT NULL,
  `x_ray_body_location_id` int(11) NOT NULL,
  `x_ray_type_id` int(11) NOT NULL,
  `x_ray_price` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `x_ray_service`
--

INSERT INTO `x_ray_service` (`x_ray_service_id`, `x_ray_body_location_id`, `x_ray_type_id`, `x_ray_price`, `added_datetime_stamp`) VALUES
(1, 1, 6, 600, '0000-00-00 00:00:00'),
(2, 2, 14, 400, '0000-00-00 00:00:00'),
(3, 3, 2, 350, '0000-00-00 00:00:00'),
(4, 3, 6, 600, '0000-00-00 00:00:00'),
(5, 4, 6, 400, '0000-00-00 00:00:00'),
(6, 5, 10, 400, '0000-00-00 00:00:00'),
(7, 5, 8, 550, '0000-00-00 00:00:00'),
(8, 6, 6, 400, '0000-00-00 00:00:00'),
(9, 7, 6, 500, '0000-00-00 00:00:00'),
(10, 8, 2, 350, '0000-00-00 00:00:00'),
(11, 8, 6, 500, '0000-00-00 00:00:00'),
(12, 9, 10, 400, '0000-00-00 00:00:00'),
(13, 10, 6, 400, '0000-00-00 00:00:00'),
(14, 9, 8, 550, '0000-00-00 00:00:00'),
(15, 12, 13, 400, '0000-00-00 00:00:00'),
(16, 13, 6, 650, '0000-00-00 00:00:00'),
(17, 14, 6, 500, '0000-00-00 00:00:00'),
(18, 15, 6, 600, '0000-00-00 00:00:00'),
(19, 16, 9, 750, '0000-00-00 00:00:00'),
(20, 17, 6, 650, '0000-00-00 00:00:00'),
(21, 18, 6, 500, '0000-00-00 00:00:00'),
(22, 19, 6, 700, '0000-00-00 00:00:00'),
(23, 20, 6, 700, '0000-00-00 00:00:00'),
(24, 20, 7, 1400, '0000-00-00 00:00:00'),
(25, 20, 12, 1050, '0000-00-00 00:00:00'),
(26, 20, 13, 350, '0000-00-00 00:00:00'),
(27, 21, 2, 500, '0000-00-00 00:00:00'),
(28, 22, 2, 500, '0000-00-00 00:00:00'),
(29, 23, 5, 900, '0000-00-00 00:00:00'),
(30, 24, 3, 500, '0000-00-00 00:00:00'),
(31, 24, 6, 900, '0000-00-00 00:00:00'),
(32, 24, 4, 1350, '0000-00-00 00:00:00'),
(33, 24, 15, 450, '0000-00-00 00:00:00'),
(34, 25, 6, 800, '0000-00-00 00:00:00'),
(35, 25, 11, 900, '0000-00-00 00:00:00'),
(36, 25, 13, 400, '0000-00-00 00:00:00'),
(37, 26, 6, 900, '0000-00-00 00:00:00'),
(38, 27, 6, 800, '0000-00-00 00:00:00'),
(39, 27, 13, 400, '0000-00-00 00:00:00'),
(40, 28, 2, 500, '0000-00-00 00:00:00'),
(41, 1, 6, 600, '2020-08-22 19:56:11'),
(42, 2, 14, 400, '2020-08-22 19:57:08'),
(43, 3, 2, 400, '2020-08-22 19:57:08'),
(44, 3, 6, 800, '2020-08-22 19:57:08'),
(45, 4, 6, 400, '2020-08-22 19:57:08'),
(46, 5, 10, 400, '2020-08-22 19:57:08'),
(47, 5, 8, 600, '2020-08-22 19:57:08'),
(48, 6, 6, 400, '2020-08-22 19:57:08'),
(49, 7, 6, 600, '2020-08-22 19:57:08'),
(50, 8, 2, 400, '2020-08-22 19:57:08'),
(51, 8, 6, 600, '2020-08-22 19:57:08'),
(52, 9, 10, 400, '2020-08-22 19:57:08'),
(53, 9, 8, 600, '2020-08-22 19:57:08'),
(54, 10, 6, 400, '2020-08-22 19:57:08'),
(55, 12, 13, 400, '2020-08-22 19:57:08'),
(56, 13, 6, 650, '2020-08-22 19:57:08'),
(57, 14, 6, 600, '2020-08-22 19:57:09'),
(58, 15, 6, 600, '2020-08-22 19:57:09'),
(59, 16, 9, 750, '2020-08-22 19:57:09'),
(60, 17, 6, 650, '2020-08-22 19:57:09'),
(61, 18, 6, 600, '2020-08-22 19:57:09'),
(62, 19, 6, 800, '2020-08-22 19:57:09'),
(63, 20, 6, 800, '2020-08-22 19:57:09'),
(64, 20, 7, 1400, '2020-08-22 19:57:09'),
(65, 20, 12, 1050, '2020-08-22 19:57:09'),
(66, 20, 13, 400, '2020-08-22 19:57:09'),
(67, 21, 2, 500, '2020-08-22 19:57:09'),
(68, 22, 2, 500, '2020-08-22 19:57:09'),
(69, 23, 5, 1000, '2020-08-22 19:57:09'),
(70, 24, 3, 500, '2020-08-22 19:57:09'),
(71, 24, 6, 1000, '2020-08-22 19:57:09'),
(72, 24, 4, 1800, '2020-08-22 19:57:09'),
(73, 24, 15, 450, '2020-08-22 19:57:09'),
(74, 25, 6, 900, '2020-08-22 19:57:09'),
(75, 25, 11, 1000, '2020-08-22 19:57:09'),
(76, 25, 13, 450, '2020-08-22 19:57:09'),
(77, 26, 6, 1000, '2020-08-22 19:57:09'),
(78, 27, 6, 900, '2020-08-22 19:57:09'),
(79, 27, 13, 450, '2020-08-22 19:57:09'),
(80, 28, 2, 500, '2020-08-22 19:57:09'),
(81, 29, 6, 600, '2020-09-10 04:28:01'),
(82, 1, 6, 600, '2020-09-10 09:00:30'),
(83, 2, 14, 400, '2020-09-10 09:00:30'),
(84, 3, 2, 400, '2020-09-10 09:00:30'),
(85, 3, 6, 800, '2020-09-10 09:00:30'),
(86, 4, 6, 400, '2020-09-10 09:00:30'),
(87, 5, 10, 400, '2020-09-10 09:00:30'),
(88, 5, 8, 600, '2020-09-10 09:00:30'),
(89, 6, 6, 400, '2020-09-10 09:00:30'),
(90, 7, 6, 600, '2020-09-10 09:00:30'),
(91, 8, 2, 400, '2020-09-10 09:00:30'),
(92, 8, 6, 600, '2020-09-10 09:00:30'),
(93, 9, 10, 400, '2020-09-10 09:00:30'),
(94, 9, 8, 600, '2020-09-10 09:00:30'),
(95, 10, 6, 400, '2020-09-10 09:00:31'),
(96, 12, 13, 400, '2020-09-10 09:00:31'),
(97, 13, 6, 650, '2020-09-10 09:00:31'),
(98, 14, 6, 600, '2020-09-10 09:00:31'),
(99, 15, 6, 600, '2020-09-10 09:00:31'),
(100, 29, 6, 600, '2020-09-10 09:00:31'),
(101, 16, 9, 900, '2020-09-10 09:00:31'),
(102, 17, 6, 650, '2020-09-10 09:00:31'),
(103, 18, 6, 600, '2020-09-10 09:00:31'),
(104, 19, 6, 800, '2020-09-10 09:00:31'),
(105, 20, 6, 800, '2020-09-10 09:00:31'),
(106, 20, 7, 1600, '2020-09-10 09:00:31'),
(107, 20, 12, 1200, '2020-09-10 09:00:31'),
(108, 20, 13, 400, '2020-09-10 09:00:31'),
(109, 21, 2, 500, '2020-09-10 09:00:31'),
(110, 22, 2, 500, '2020-09-10 09:00:31'),
(111, 23, 5, 1000, '2020-09-10 09:00:31'),
(112, 24, 3, 500, '2020-09-10 09:00:31'),
(113, 24, 6, 1000, '2020-09-10 09:00:31'),
(114, 24, 4, 1800, '2020-09-10 09:00:31'),
(115, 24, 15, 450, '2020-09-10 09:00:31'),
(116, 25, 6, 900, '2020-09-10 09:00:31'),
(117, 25, 11, 1000, '2020-09-10 09:00:31'),
(118, 25, 13, 450, '2020-09-10 09:00:31'),
(119, 26, 6, 1000, '2020-09-10 09:00:31'),
(120, 27, 6, 900, '2020-09-10 09:00:31'),
(121, 27, 13, 450, '2020-09-10 09:00:31'),
(122, 28, 2, 500, '2020-09-10 09:00:31'),
(125, 1, 6, 600, '2023-03-01 07:25:39'),
(126, 2, 14, 400, '2023-03-01 07:25:39'),
(127, 3, 2, 400, '2023-03-01 07:25:39'),
(128, 3, 6, 800, '2023-03-01 07:25:39'),
(129, 4, 6, 500, '2023-03-01 07:25:39'),
(130, 5, 10, 500, '2023-03-01 07:25:39'),
(131, 5, 8, 650, '2023-03-01 07:25:39'),
(132, 6, 6, 500, '2023-03-01 07:25:39'),
(133, 7, 6, 600, '2023-03-01 07:25:39'),
(134, 8, 2, 500, '2023-03-01 07:25:39'),
(135, 8, 6, 600, '2023-03-01 07:25:39'),
(136, 9, 10, 500, '2023-03-01 07:25:40'),
(137, 9, 8, 650, '2023-03-01 07:25:40'),
(138, 32, 6, 500, '2023-03-01 07:30:56'),
(139, 12, 13, 400, '2023-03-01 07:30:56'),
(140, 33, 13, 500, '2023-03-01 07:31:45'),
(141, 13, 6, 650, '2023-03-01 07:31:46'),
(142, 14, 6, 500, '2023-03-01 07:31:46'),
(143, 15, 6, 600, '2023-03-01 07:31:46'),
(144, 17, 6, 700, '2023-03-01 07:36:06'),
(145, 18, 6, 650, '2023-03-01 07:36:07'),
(146, 19, 6, 800, '2023-03-01 07:36:07'),
(147, 20, 6, 800, '2023-03-01 07:36:07'),
(148, 30, 6, 1200, '2023-03-01 07:36:07'),
(149, 21, 2, 600, '2023-03-01 07:36:07'),
(150, 22, 2, 600, '2023-03-01 07:36:07'),
(151, 23, 5, 1200, '2023-03-01 07:36:07'),
(152, 24, 3, 600, '2023-03-01 07:37:26'),
(153, 24, 6, 1200, '2023-03-01 07:37:26'),
(154, 24, 3, 600, '2023-03-01 07:38:47'),
(155, 24, 6, 1200, '2023-03-01 07:38:47'),
(156, 24, 17, 2200, '2023-03-01 07:38:47'),
(157, 25, 6, 1000, '2023-03-01 07:38:47'),
(158, 25, 11, 1200, '2023-03-01 07:38:47'),
(159, 27, 6, 900, '2023-03-01 07:38:47'),
(160, 27, 13, 500, '2023-03-01 07:38:48'),
(161, 31, 2, 600, '2023-03-01 07:42:51'),
(162, 1, 6, 600, '2023-03-01 07:45:01'),
(163, 2, 14, 400, '2023-03-01 07:45:01'),
(164, 3, 2, 400, '2023-03-01 07:45:01'),
(165, 3, 6, 800, '2023-03-01 07:45:01'),
(166, 4, 6, 500, '2023-03-01 07:45:01'),
(167, 5, 10, 500, '2023-03-01 07:45:02'),
(168, 5, 8, 650, '2023-03-01 07:45:02'),
(169, 6, 6, 500, '2023-03-01 07:45:02'),
(170, 7, 6, 600, '2023-03-01 07:45:02'),
(171, 8, 2, 500, '2023-03-01 07:45:02'),
(172, 8, 6, 600, '2023-03-01 07:45:02'),
(173, 9, 10, 500, '2023-03-01 07:45:02'),
(174, 9, 8, 650, '2023-03-01 07:45:02'),
(175, 32, 6, 500, '2023-03-01 07:45:02'),
(176, 12, 13, 400, '2023-03-01 07:45:02'),
(177, 1, 6, 600, '2023-03-01 07:45:38'),
(178, 2, 14, 400, '2023-03-01 07:45:38'),
(179, 3, 2, 400, '2023-03-01 07:45:38'),
(180, 3, 6, 800, '2023-03-01 07:45:38'),
(181, 4, 6, 500, '2023-03-01 07:45:38'),
(182, 5, 10, 500, '2023-03-01 07:45:38'),
(183, 5, 8, 650, '2023-03-01 07:45:38'),
(184, 6, 6, 500, '2023-03-01 07:45:38'),
(185, 7, 6, 600, '2023-03-01 07:45:39'),
(186, 8, 2, 500, '2023-03-01 07:45:39'),
(187, 8, 6, 600, '2023-03-01 07:45:39'),
(188, 9, 10, 500, '2023-03-01 07:45:39'),
(189, 9, 8, 650, '2023-03-01 07:45:39'),
(190, 32, 6, 500, '2023-03-01 07:45:39'),
(191, 12, 13, 400, '2023-03-01 07:45:39'),
(192, 33, 13, 500, '2023-03-01 07:45:39'),
(193, 13, 6, 650, '2023-03-01 07:45:39'),
(194, 14, 6, 500, '2023-03-01 07:45:39'),
(195, 15, 6, 600, '2023-03-01 07:45:39'),
(196, 16, 9, 900, '2023-03-01 07:50:53'),
(197, 1, 6, 600, '2023-03-01 07:51:01'),
(198, 2, 14, 400, '2023-03-01 07:51:01'),
(199, 3, 2, 400, '2023-03-01 07:51:01'),
(200, 3, 6, 800, '2023-03-01 07:51:01'),
(201, 4, 6, 500, '2023-03-01 07:51:02'),
(202, 5, 10, 500, '2023-03-01 07:51:02'),
(203, 5, 8, 650, '2023-03-01 07:51:02'),
(204, 6, 6, 500, '2023-03-01 07:51:02'),
(205, 7, 6, 600, '2023-03-01 07:51:02'),
(206, 8, 2, 500, '2023-03-01 07:51:02'),
(207, 8, 6, 600, '2023-03-01 07:51:02'),
(208, 9, 10, 500, '2023-03-01 07:51:02'),
(209, 9, 8, 650, '2023-03-01 07:51:02'),
(210, 32, 6, 500, '2023-03-01 07:51:02'),
(211, 12, 13, 400, '2023-03-01 07:51:02'),
(212, 33, 13, 500, '2023-03-01 07:51:02'),
(213, 13, 6, 650, '2023-03-01 07:51:02'),
(214, 14, 6, 500, '2023-03-01 07:51:02'),
(215, 15, 6, 600, '2023-03-01 07:51:02'),
(216, 16, 9, 900, '2023-03-01 07:51:02'),
(217, 17, 6, 700, '2023-03-01 07:51:02'),
(218, 18, 6, 650, '2023-03-01 07:51:02'),
(219, 19, 6, 800, '2023-03-01 07:51:03'),
(220, 20, 6, 800, '2023-03-01 07:51:03'),
(221, 30, 6, 1200, '2023-03-01 07:51:03'),
(222, 21, 2, 600, '2023-03-01 07:51:03'),
(223, 22, 2, 600, '2023-03-01 07:51:03'),
(224, 23, 5, 1200, '2023-03-01 07:51:03'),
(225, 1, 6, 600, '2023-03-01 07:51:46'),
(226, 2, 14, 400, '2023-03-01 07:51:46'),
(227, 3, 2, 400, '2023-03-01 07:51:46'),
(228, 3, 6, 800, '2023-03-01 07:51:46'),
(229, 4, 6, 500, '2023-03-01 07:51:46'),
(230, 5, 10, 500, '2023-03-01 07:51:46'),
(231, 5, 8, 650, '2023-03-01 07:51:46'),
(232, 6, 6, 500, '2023-03-01 07:51:46'),
(233, 7, 6, 600, '2023-03-01 07:51:46'),
(234, 8, 2, 500, '2023-03-01 07:51:46'),
(235, 8, 6, 600, '2023-03-01 07:51:46'),
(236, 9, 10, 500, '2023-03-01 07:51:46'),
(237, 9, 8, 650, '2023-03-01 07:51:46'),
(238, 32, 6, 500, '2023-03-01 07:51:46'),
(239, 12, 13, 400, '2023-03-01 07:51:46'),
(240, 33, 13, 500, '2023-03-01 07:51:46'),
(241, 13, 6, 650, '2023-03-01 07:51:46'),
(242, 14, 6, 500, '2023-03-01 07:51:46'),
(243, 15, 6, 600, '2023-03-01 07:51:46'),
(244, 16, 9, 900, '2023-03-01 07:51:46'),
(245, 17, 6, 700, '2023-03-01 07:51:46'),
(246, 18, 6, 650, '2023-03-01 07:51:46'),
(247, 19, 6, 800, '2023-03-01 07:51:47'),
(248, 20, 6, 800, '2023-03-01 07:51:47'),
(249, 30, 6, 1200, '2023-03-01 07:51:47'),
(250, 21, 2, 600, '2023-03-01 07:51:47'),
(251, 22, 2, 600, '2023-03-01 07:51:47'),
(252, 23, 5, 1200, '2023-03-01 07:51:47'),
(253, 23, 0, 1200, '2023-03-01 07:51:47'),
(254, 24, 3, 600, '2023-03-01 07:51:47'),
(255, 24, 6, 1200, '2023-03-01 07:51:47'),
(256, 24, 17, 2200, '2023-03-01 07:51:47'),
(257, 25, 6, 1000, '2023-03-01 07:51:47'),
(258, 25, 11, 1200, '2023-03-01 07:51:47'),
(259, 27, 6, 900, '2023-03-01 07:51:47'),
(260, 27, 13, 500, '2023-03-01 07:51:47'),
(261, 35, 1, 600, '2023-03-01 07:51:47'),
(262, 31, 2, 600, '2023-03-01 07:51:47'),
(263, 1, 6, 600, '2023-03-09 06:15:44'),
(264, 2, 14, 400, '2023-03-09 06:15:44'),
(265, 3, 2, 400, '2023-03-09 06:15:45'),
(266, 3, 6, 800, '2023-03-09 06:15:45'),
(267, 4, 6, 500, '2023-03-09 06:15:45'),
(268, 5, 10, 500, '2023-03-09 06:15:45'),
(269, 5, 8, 650, '2023-03-09 06:15:45'),
(270, 6, 6, 500, '2023-03-09 06:15:45'),
(271, 7, 6, 600, '2023-03-09 06:15:45'),
(272, 8, 2, 500, '2023-03-09 06:15:45'),
(273, 8, 6, 600, '2023-03-09 06:15:45'),
(274, 9, 10, 500, '2023-03-09 06:15:45'),
(275, 9, 8, 650, '2023-03-09 06:15:45'),
(276, 32, 6, 500, '2023-03-09 06:15:45'),
(277, 12, 13, 400, '2023-03-09 06:15:45'),
(278, 33, 13, 500, '2023-03-09 06:15:45'),
(279, 13, 6, 650, '2023-03-09 06:15:45'),
(280, 14, 6, 500, '2023-03-09 06:15:45'),
(281, 29, 6, 600, '2023-03-09 06:15:45'),
(282, 34, 9, 900, '2023-03-09 06:15:45'),
(283, 17, 6, 700, '2023-03-09 06:15:46'),
(284, 18, 6, 650, '2023-03-09 06:15:46'),
(285, 19, 6, 800, '2023-03-09 06:15:46'),
(286, 20, 6, 800, '2023-03-09 06:15:46'),
(287, 30, 6, 1200, '2023-03-09 06:15:46'),
(288, 21, 2, 600, '2023-03-09 06:15:46'),
(289, 22, 2, 600, '2023-03-09 06:15:46'),
(290, 23, 5, 1200, '2023-03-09 06:15:46'),
(291, 23, 0, 1200, '2023-03-09 06:15:46'),
(292, 24, 3, 600, '2023-03-09 06:15:46'),
(293, 24, 6, 1200, '2023-03-09 06:15:46'),
(294, 24, 17, 2200, '2023-03-09 06:15:46'),
(295, 25, 6, 1000, '2023-03-09 06:15:46'),
(296, 25, 11, 1200, '2023-03-09 06:15:46'),
(297, 27, 6, 900, '2023-03-09 06:15:46'),
(298, 27, 13, 500, '2023-03-09 06:15:46'),
(299, 35, 1, 600, '2023-03-09 06:15:46'),
(300, 31, 2, 600, '2023-03-09 06:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_type`
--

CREATE TABLE `x_ray_type` (
  `x_ray_type_id` int(11) NOT NULL,
  `x_ray_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `x_ray_type`
--

INSERT INTO `x_ray_type` (`x_ray_type_id`, `x_ray_type_name`) VALUES
(0, 'AP/X-Table/L'),
(1, '( Pedia ) AP'),
(2, 'AP only'),
(3, 'AP-upright'),
(4, 'AP, R/L Bending'),
(5, 'AP/Frog leg'),
(6, 'AP/Lateral'),
(7, 'AP/Lateral, R/L Oblique'),
(8, 'AP/Lateral/Oblique ( 3:1 )'),
(9, 'AP/Lateral/Skyline ( 3:1 )'),
(10, 'AP/Oblique'),
(11, 'Hips AP, L-S Lateral'),
(12, 'Lateral, R/L Oblique'),
(13, 'Lateral only'),
(14, 'PA'),
(15, 'Scoliosis Series'),
(16, 'AP/X-Table/L [duplicate]'),
(17, 'AP, R/L Bending, Scoliosis Series');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `imagev2`
--
ALTER TABLE `imagev2`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `lab_service`
--
ALTER TABLE `lab_service`
  ADD PRIMARY KEY (`lab_service_id`);

--
-- Indexes for table `lab_service_item`
--
ALTER TABLE `lab_service_item`
  ADD PRIMARY KEY (`lab_service_item_id`);

--
-- Indexes for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
  ADD PRIMARY KEY (`medical_doctor_id`);

--
-- Indexes for table `medical_technologist`
--
ALTER TABLE `medical_technologist`
  ADD PRIMARY KEY (`medical_technologist_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_type` (`member_type`);

--
-- Indexes for table `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `medical_doctor_id` (`medical_doctor_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `receipt_type`
--
ALTER TABLE `receipt_type`
  ADD PRIMARY KEY (`receipt_type_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `report_type_id` (`report_type_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `report_item_id` (`report_item_id`);

--
-- Indexes for table `report_item`
--
ALTER TABLE `report_item`
  ADD PRIMARY KEY (`report_item_id`),
  ADD KEY `report_type_id` (`report_type_id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`report_type_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`security_id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`therapist_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `medical_doctor_id` (`medical_doctor_id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `transaction2020`
--
ALTER TABLE `transaction2020`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `medical_doctor_id` (`medical_doctor_id`),
  ADD KEY `report_id` (`report_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `x_ray_body_location`
--
ALTER TABLE `x_ray_body_location`
  ADD UNIQUE KEY `x_ray_body_location_id` (`x_ray_body_location_id`);

--
-- Indexes for table `x_ray_service`
--
ALTER TABLE `x_ray_service`
  ADD PRIMARY KEY (`x_ray_service_id`);

--
-- Indexes for table `x_ray_type`
--
ALTER TABLE `x_ray_type`
  ADD PRIMARY KEY (`x_ray_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imagev2`
--
ALTER TABLE `imagev2`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_service`
--
ALTER TABLE `lab_service`
  MODIFY `lab_service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_service_item`
--
ALTER TABLE `lab_service_item`
  MODIFY `lab_service_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
  MODIFY `medical_doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_technologist`
--
ALTER TABLE `medical_technologist`
  MODIFY `medical_technologist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_item`
--
ALTER TABLE `report_item`
  MODIFY `report_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `security_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction2020`
--
ALTER TABLE `transaction2020`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `x_ray_service`
--
ALTER TABLE `x_ray_service`
  MODIFY `x_ray_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`member_type`) REFERENCES `member_type` (`member_type_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`medical_doctor_id`) REFERENCES `medical_doctor` (`medical_doctor_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`report_type_id`) REFERENCES `report_type` (`report_type_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`report_item_id`) REFERENCES `report_item` (`report_item_id`);

--
-- Constraints for table `report_item`
--
ALTER TABLE `report_item`
  ADD CONSTRAINT `report_item_ibfk_1` FOREIGN KEY (`report_type_id`) REFERENCES `report_type` (`report_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
