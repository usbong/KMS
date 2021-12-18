-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 11:02 PM
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
-- Table structure for table `cashier`
--

CREATE TABLE IF NOT EXISTS `cashier` (
`cashier_id` int(11) NOT NULL,
  `cashier_name` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`image_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT '0',
  `image_filename` text NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=455 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_type_id` tinyint(4) NOT NULL,
  `item_total_sold` int(11) NOT NULL DEFAULT '0',
  `is_hidden` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=442 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE IF NOT EXISTS `item_type` (
`item_type_id` tinyint(4) NOT NULL,
  `item_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab_service`
--

CREATE TABLE IF NOT EXISTS `lab_service` (
`lab_service_id` int(11) NOT NULL,
  `lab_service_date` date NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient_id` int(11) NOT NULL,
  `lab_service_item_id` int(11) NOT NULL,
  `lab_service_notes` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `lab_service_item`
--

CREATE TABLE IF NOT EXISTS `lab_service_item` (
`lab_service_item_id` int(11) NOT NULL,
  `lab_service_item_name` text NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `medical_doctor`
--

CREATE TABLE IF NOT EXISTS `medical_doctor` (
`medical_doctor_id` int(11) NOT NULL,
  `medical_doctor_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `medical_technologist`
--

CREATE TABLE IF NOT EXISTS `medical_technologist` (
`medical_technologist_id` int(11) NOT NULL,
  `medical_technologist_name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
`patient_id` int(11) NOT NULL,
  `patient_name` varchar(60) NOT NULL,
  `sex_id` tinyint(4) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `age_unit` tinyint(4) DEFAULT NULL,
  `medical_doctor_id` int(11) DEFAULT NULL,
  `civil_status_id` tinyint(4) DEFAULT NULL,
  `pwd_senior_id` text,
  `occupation` text,
  `birthday` date DEFAULT NULL,
  `contact_number` text,
  `location_address` text,
  `barangay_address` text,
  `postal_address` text,
  `province_city_ph_address` text,
  `halimbawa` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3547 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
`receipt_id` int(11) NOT NULL,
  `receipt_type_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=392 ;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_type`
--

CREATE TABLE IF NOT EXISTS `receipt_type` (
`receipt_type_id` int(11) NOT NULL,
  `receipt_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
`report_type_id` tinyint(4) NOT NULL,
  `report_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE IF NOT EXISTS `therapist` (
`therapist_id` int(11) NOT NULL,
  `therapist_name` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`transaction_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `transaction_date` text NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `fee` decimal(11,2) NOT NULL,
  `fee_quantity` int(11) NOT NULL DEFAULT '0',
  `x_ray_fee` decimal(11,2) NOT NULL,
  `lab_fee` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `med_fee` decimal(11,2) NOT NULL,
  `pas_fee` decimal(11,2) NOT NULL,
  `snack_fee` decimal(11,2) NOT NULL,
  `transaction_type_id` int(11) NOT NULL DEFAULT '1',
  `transaction_type_name` text NOT NULL,
  `treatment_id` int(11) NOT NULL DEFAULT '0',
  `treatment_type_name` text NOT NULL,
  `treatment_diagnosis` text NOT NULL,
  `transaction_old_new` tinyint(2) NOT NULL DEFAULT '0',
  `medical_doctor_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `ip_address_id` tinytext NOT NULL,
  `machine_address_id` tinytext NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1935 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
`transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
`treatment_id` int(11) NOT NULL,
  `treatment_type_id` int(11) NOT NULL,
  `treatment_datetime_stamp` datetime NOT NULL,
  `treatment_diagnosis` text CHARACTER SET utf8mb4 NOT NULL,
  `treatment_temperature` decimal(10,2) NOT NULL,
  `treatment_bp` text CHARACTER SET utf8mb4 NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_type`
--

CREATE TABLE IF NOT EXISTS `treatment_type` (
`treatment_type_id` int(11) NOT NULL,
  `treatment_type_name` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_body_location`
--

CREATE TABLE IF NOT EXISTS `x_ray_body_location` (
`x_ray_body_location_id` int(11) NOT NULL,
  `x_ray_body_location_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_service`
--

CREATE TABLE IF NOT EXISTS `x_ray_service` (
`x_ray_service_id` int(11) NOT NULL,
  `x_ray_body_location_id` int(11) NOT NULL,
  `x_ray_type_id` int(11) NOT NULL,
  `x_ray_price` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_type`
--

CREATE TABLE IF NOT EXISTS `x_ray_type` (
`x_ray_type_id` int(11) NOT NULL,
  `x_ray_type_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
 ADD PRIMARY KEY (`cashier_id`);

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
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
 ADD PRIMARY KEY (`therapist_id`);

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
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
 ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `treatment_type`
--
ALTER TABLE `treatment_type`
 ADD PRIMARY KEY (`treatment_type_id`), ADD UNIQUE KEY `treatment_type_id` (`treatment_type_id`);

--
-- Indexes for table `x_ray_body_location`
--
ALTER TABLE `x_ray_body_location`
 ADD PRIMARY KEY (`x_ray_body_location_id`);

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
MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=455;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=442;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
MODIFY `item_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lab_service`
--
ALTER TABLE `lab_service`
MODIFY `lab_service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lab_service_item`
--
ALTER TABLE `lab_service_item`
MODIFY `lab_service_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
MODIFY `medical_doctor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `medical_technologist`
--
ALTER TABLE `medical_technologist`
MODIFY `medical_technologist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3547;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=392;
--
-- AUTO_INCREMENT for table `receipt_type`
--
ALTER TABLE `receipt_type`
MODIFY `receipt_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1935;
--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
MODIFY `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treatment_type`
--
ALTER TABLE `treatment_type`
MODIFY `treatment_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `x_ray_body_location`
--
ALTER TABLE `x_ray_body_location`
MODIFY `x_ray_body_location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `x_ray_service`
--
ALTER TABLE `x_ray_service`
MODIFY `x_ray_service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `x_ray_type`
--
ALTER TABLE `x_ray_type`
MODIFY `x_ray_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
