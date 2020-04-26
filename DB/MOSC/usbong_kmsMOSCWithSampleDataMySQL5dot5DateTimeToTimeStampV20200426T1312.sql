-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 04:51 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usbong_kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`image_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `image_filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`inventory_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL DEFAULT '0',
  `expiration_date` date NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `item_id`, `quantity_in_stock`, `expiration_date`, `added_datetime_stamp`) VALUES
(1, 1, 884, '2021-09-01', '2020-04-05 16:34:13'),
(2, 2, 716, '2021-03-01', '2020-04-05 16:34:13'),
(3, 3, 404, '2020-12-01', '2020-04-05 16:34:13'),
(4, 4, 0, '0000-00-00', '2020-04-05 16:34:13'),
(5, 5, 0, '0000-00-00', '2020-04-05 16:34:13'),
(6, 6, 3200, '2022-10-01', '2020-04-05 16:34:13'),
(7, 7, 0, '0000-00-00', '2020-04-05 16:34:13'),
(8, 8, 0, '0000-00-00', '2020-04-05 16:34:13'),
(9, 9, 48, '2021-06-01', '2020-04-05 16:34:13'),
(10, 10, 12, '2021-04-01', '2020-04-05 16:34:13'),
(11, 11, 0, '0000-00-00', '2020-04-05 16:34:13'),
(12, 12, 3842, '2021-05-01', '2020-04-05 16:34:13'),
(13, 13, 308, '2020-11-01', '2020-04-05 16:34:13'),
(14, 14, 149, '2021-07-01', '2020-04-05 16:34:13'),
(15, 15, 152, '2021-03-01', '2020-04-05 16:34:13'),
(16, 15, 365, '2021-04-01', '2020-04-05 16:34:13'),
(17, 15, 100, '2021-10-01', '2020-04-05 16:34:13'),
(18, 16, 0, '0000-00-00', '2020-04-05 16:34:13'),
(19, 17, 108, '2022-09-01', '2020-04-05 16:34:13'),
(20, 18, 139, '2022-01-01', '2020-04-05 16:34:13'),
(21, 19, 0, '0000-00-00', '2020-04-05 16:34:13'),
(22, 20, 200, '2020-12-01', '2020-04-05 16:34:14'),
(23, 21, 393, '2021-07-01', '2020-04-05 16:34:14'),
(24, 22, 415, '2022-06-01', '2020-04-05 16:34:14'),
(25, 23, 0, '0000-00-00', '2020-04-05 16:34:14'),
(26, 24, 130, '2022-01-01', '2020-04-05 16:34:14'),
(27, 25, 70, '2020-05-01', '2020-04-05 16:34:14'),
(28, 26, 26, '2021-09-01', '2020-04-05 16:34:14'),
(29, 27, 213, '2022-08-01', '2020-04-05 16:34:14'),
(30, 28, 176, '2021-04-01', '2020-04-05 16:34:14'),
(31, 29, 264, '2022-02-01', '2020-04-05 16:34:14'),
(32, 30, 73, '2021-02-01', '2020-04-05 16:34:14'),
(33, 30, 100, '2021-08-01', '2020-04-05 16:34:14'),
(34, 31, 36, '2022-07-01', '2020-04-05 16:34:14'),
(35, 32, 0, '0000-00-00', '2020-04-05 16:34:14'),
(36, 33, 140, '2020-05-01', '2020-04-05 16:34:14'),
(37, 34, 100, '2020-05-01', '2020-04-05 16:34:14'),
(38, 35, 48, '2020-06-01', '2020-04-05 16:34:14'),
(39, 36, 25, '2021-04-01', '2020-04-05 16:34:14'),
(40, 37, 0, '0000-00-00', '2020-04-05 16:34:14'),
(41, 38, 25, '2022-04-01', '2020-04-05 16:34:14'),
(42, 39, 893, '2020-05-01', '2020-04-05 16:34:14'),
(43, 40, 511, '2022-04-01', '2020-04-05 16:34:14'),
(44, 41, 7252, '2020-10-01', '2020-04-05 16:34:15'),
(45, 42, 230, '2022-02-01', '2020-04-05 16:34:15'),
(46, 43, 0, '0000-00-00', '2020-04-05 16:34:15'),
(47, 44, 0, '0000-00-00', '2020-04-05 16:34:15'),
(48, 45, 0, '0000-00-00', '2020-04-05 16:34:15'),
(49, 46, 106, '2021-10-01', '2020-04-05 16:34:15'),
(50, 46, 450, '2022-02-01', '2020-04-05 16:34:15'),
(51, 47, 104, '2021-01-01', '2020-04-05 16:34:15'),
(52, 48, 371, '2022-01-01', '2020-04-05 16:34:15'),
(53, 48, 263, '2022-05-01', '2020-04-05 16:34:15'),
(54, 49, 0, '0000-00-00', '2020-04-05 16:34:15'),
(55, 50, 1, '2024-03-01', '2020-04-05 16:34:15'),
(56, 51, 236, '2022-04-01', '2020-04-05 16:34:15'),
(57, 52, 100, '2021-02-01', '2020-04-05 16:34:15'),
(58, 53, 581, '2021-03-01', '2020-04-05 16:34:15'),
(59, 54, 240, '2020-10-01', '2020-04-05 16:34:15'),
(60, 55, 247, '2022-09-01', '2020-04-05 16:34:15'),
(61, 56, 217, '2022-08-01', '2020-04-05 16:34:15'),
(62, 57, 0, '0000-00-00', '2020-04-05 16:34:15'),
(63, 58, 34, '2021-05-01', '2020-04-05 16:34:15'),
(64, 59, 213, '2021-11-01', '2020-04-05 16:34:15'),
(65, 60, 0, '0000-00-00', '2020-04-05 16:34:15'),
(66, 61, 1846, '2020-11-01', '2020-04-05 16:34:15'),
(67, 62, 404, '2021-02-01', '2020-04-05 16:34:16'),
(68, 63, 31, '2020-07-01', '2020-04-05 16:34:16'),
(69, 64, 0, '0000-00-00', '2020-04-05 16:34:16'),
(70, 65, 61, '2021-12-01', '2020-04-05 16:34:16'),
(71, 66, 5, '2020-09-01', '2020-04-05 16:34:16'),
(72, 66, 100, '2020-12-01', '2020-04-05 16:34:16'),
(73, 66, 100, '2021-06-01', '2020-04-05 16:34:16'),
(74, 67, 15, '2020-12-01', '2020-04-05 16:34:16'),
(75, 67, 100, '2021-10-01', '2020-04-05 16:34:16'),
(76, 68, 244, '2022-03-01', '2020-04-05 16:34:16'),
(77, 69, 362, '2021-09-01', '2020-04-05 16:34:16'),
(78, 70, 246, '2021-04-01', '2020-04-05 16:34:16'),
(79, 71, 0, '0000-00-00', '2020-04-05 16:34:16'),
(80, 72, 90, '2020-11-01', '2020-04-05 16:34:16'),
(81, 73, 5, '2021-09-01', '2020-04-05 16:34:16'),
(82, 73, 20, '2021-10-01', '2020-04-05 16:34:16'),
(83, 74, 110, '2020-10-01', '2020-04-05 16:34:16'),
(84, 74, 75, '2021-05-01', '2020-04-05 16:34:16'),
(85, 75, 0, '0000-00-00', '2020-04-05 16:34:16'),
(86, 76, 33, '2020-05-01', '2020-04-05 16:34:16'),
(87, 76, 100, '2021-11-01', '2020-04-05 16:34:16'),
(88, 77, 111, '2021-09-01', '2020-04-05 16:34:17'),
(89, 78, 402, '2021-08-01', '2020-04-05 16:34:17'),
(90, 79, 88, '2020-08-01', '2020-04-05 16:34:17'),
(91, 80, 737, '2022-12-01', '2020-04-05 16:34:17'),
(92, 81, 0, '0000-00-00', '2020-04-05 16:34:17'),
(93, 82, 261, '2021-04-01', '2020-04-05 16:34:17'),
(94, 83, 103, '2020-06-01', '2020-04-05 16:34:17'),
(95, 84, 346, '2022-01-01', '2020-04-05 16:34:17'),
(96, 84, 1125, '2022-10-01', '2020-04-05 16:34:17'),
(97, 85, 209, '2021-08-01', '2020-04-05 16:34:17'),
(98, 85, 200, '2021-10-01', '2020-04-05 16:34:17'),
(99, 86, 117, '2022-03-01', '2020-04-05 16:34:17'),
(100, 87, 600, '2022-07-01', '2020-04-05 16:34:17'),
(101, 88, 400, '2022-08-01', '2020-04-05 16:34:17'),
(102, 89, 60, '2021-10-01', '2020-04-05 16:34:17'),
(103, 90, 0, '0000-00-00', '2020-04-05 16:34:17'),
(104, 91, 212, '2021-07-01', '2020-04-05 16:34:17'),
(105, 92, 201, '2021-07-01', '2020-04-05 16:34:17'),
(106, 93, 0, '0000-00-00', '2020-04-05 16:34:17'),
(107, 94, 0, '0000-00-00', '2020-04-05 16:34:17'),
(108, 95, 206, '2022-11-01', '2020-04-05 16:34:17'),
(109, 96, 858, '2021-05-01', '2020-04-05 16:34:17'),
(110, 97, 440, '2021-11-01', '2020-04-05 16:34:17'),
(111, 98, 1, '2022-05-01', '2020-04-05 16:34:17'),
(112, 99, -1, '0000-00-00', '2020-04-05 16:34:17'),
(113, 100, -1, '0000-00-00', '2020-04-05 16:34:17'),
(114, 101, 5, '2022-03-01', '2020-04-05 16:34:17'),
(115, 102, 5, '2022-08-01', '2020-04-05 16:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_type_id` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`) VALUES
(0, 'NONE', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`item_type_id` tinyint(4) NOT NULL,
  `item_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_name`) VALUES
(1, 'Medicine'),
(2, 'Non-medicine');

-- --------------------------------------------------------

--
-- Table structure for table `medical_doctor`
--

CREATE TABLE IF NOT EXISTS `medical_doctor` (
`medical_doctor_id` int(11) NOT NULL,
  `medical_doctor_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `medical_doctor`
--

INSERT INTO `medical_doctor` (`medical_doctor_id`, `medical_doctor_name`) VALUES
(0, 'ANY'),
(1, 'SYSON, PEDRO'),
(2, 'SYSON, PETER'),
(3, 'SUMMARY'),
(4, 'REJUSO, CHASTITY AMOR');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`patient_id` int(11) NOT NULL,
  `patient_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`) VALUES
(-1, 'CANCELLED'),
(0, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
`receipt_id` int(11) NOT NULL,
  `receipt_type_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `receipt_type_id`, `transaction_id`, `receipt_number`) VALUES
(1, 1, 1, 12345),
(2, 2, 1, 0),
(3, 3, 2, 987),
(4, 1, 2, 654),
(5, 2, 2, 321),
(6, 1, 3, 12345),
(7, 2, 3, 0),
(8, 3, 4, 987),
(9, 1, 4, 654),
(10, 2, 4, 321),
(11, 1, 5, 0),
(12, 2, 5, 0),
(13, 1, 6, 0),
(14, 2, 6, 0),
(15, 1, 7, 0),
(16, 2, 7, 0),
(17, 1, 8, 0),
(18, 2, 8, 0),
(19, 1, 9, 0),
(20, 2, 9, 0),
(21, 1, 10, 0),
(22, 2, 10, 0),
(23, 3, 11, 0),
(24, 1, 11, 0),
(25, 2, 11, 0),
(26, 3, 12, 0),
(27, 1, 12, 0),
(28, 2, 12, 0),
(29, 3, 13, 0),
(30, 1, 13, 0),
(31, 2, 13, 0),
(32, 1, 14, 0),
(33, 2, 14, 0),
(34, 1, 15, 0),
(35, 2, 15, 0),
(36, 1, 16, 0),
(37, 2, 16, 0),
(38, 1, 17, 0),
(39, 2, 17, 0),
(40, 1, 18, 0),
(41, 2, 18, 0),
(42, 1, 19, 0),
(43, 2, 19, 0),
(44, 3, 20, 0),
(45, 1, 20, 0),
(46, 2, 20, 0),
(47, 3, 21, 0),
(48, 1, 21, 0),
(49, 2, 21, 0),
(50, 3, 22, 0),
(51, 1, 22, 0),
(52, 2, 22, 0),
(53, 1, 23, 0),
(54, 2, 23, 0),
(55, 1, 24, 0),
(56, 2, 24, 0),
(57, 1, 25, 0),
(58, 2, 25, 0),
(59, 1, 26, 0),
(60, 2, 26, 0),
(61, 1, 27, 0),
(62, 2, 27, 0),
(63, 1, 28, 0),
(64, 2, 28, 0),
(65, 3, 29, 0),
(66, 1, 29, 0),
(67, 2, 29, 0),
(68, 3, 30, 0),
(69, 1, 30, 0),
(70, 2, 30, 0),
(71, 3, 31, 2617),
(72, 1, 31, 3967),
(73, 2, 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_type`
--

CREATE TABLE IF NOT EXISTS `receipt_type` (
`receipt_type_id` int(11) NOT NULL,
  `receipt_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `report` (
`report_id` int(11) NOT NULL,
  `report_type_id` tinyint(4) NOT NULL DEFAULT '2',
  `report_filename` text CHARACTER SET utf8mb4 NOT NULL,
  `report_description` text CHARACTER SET utf8mb4 NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_type_id`, `report_filename`, `report_description`, `added_datetime_stamp`) VALUES
(1, 7, '', 'NONE', '2020-04-26 02:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
`report_type_id` tinyint(4) NOT NULL,
  `report_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'Purchase Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`transaction_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `transaction_date` text NOT NULL,
  `fee` decimal(11,2) NOT NULL,
  `fee_quantity` tinyint(4) NOT NULL DEFAULT '0',
  `x_ray_fee` decimal(11,2) NOT NULL,
  `lab_fee` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `med_fee` decimal(11,2) NOT NULL,
  `pas_fee` decimal(11,2) NOT NULL,
  `transaction_type_id` int(11) NOT NULL DEFAULT '1',
  `transaction_type_name` text NOT NULL,
  `treatment_type_name` text NOT NULL,
  `treatment_diagnosis` text NOT NULL,
  `transaction_old_new` tinyint(2) NOT NULL DEFAULT '0',
  `medical_doctor_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
`transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`image_id`), ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`), ADD KEY `item_type_id` (`item_type_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
 ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
 ADD PRIMARY KEY (`medical_doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
 ADD PRIMARY KEY (`receipt_id`), ADD KEY `receipt_type_id` (`receipt_type_id`), ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `receipt_type`
--
ALTER TABLE `receipt_type`
 ADD PRIMARY KEY (`receipt_type_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`report_id`), ADD KEY `payslip_type_id` (`report_type_id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
 ADD PRIMARY KEY (`report_type_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`transaction_id`), ADD KEY `medical_doctor_id` (`medical_doctor_id`), ADD KEY `report_id` (`report_id`), ADD KEY `patient_id` (`patient_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
 ADD PRIMARY KEY (`transaction_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `item_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
MODIFY `medical_doctor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `receipt_type`
--
ALTER TABLE `receipt_type`
MODIFY `receipt_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
MODIFY `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`receipt_type_id`) REFERENCES `receipt_type` (`receipt_type_id`),
ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`report_type_id`) REFERENCES `report_type` (`report_type_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`medical_doctor_id`) REFERENCES `medical_doctor` (`medical_doctor_id`),
ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
ADD CONSTRAINT `transaction_ibfk_5` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`),
ADD CONSTRAINT `transaction_ibfk_6` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
