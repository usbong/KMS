-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 09:08 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `medical_doctor`
--

CREATE TABLE `medical_doctor` (
  `medical_doctor_id` int(11) NOT NULL,
  `medical_doctor_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medical_technologist`
--

CREATE TABLE `medical_technologist` (
  `medical_technologist_id` int(11) NOT NULL,
  `medical_technologist_name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `report_type_id` tinyint(4) NOT NULL,
  `report_type_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `security_id` int(11) NOT NULL,
  `security_inbound` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL,
  `therapist_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_body_location`
--

CREATE TABLE `x_ray_body_location` (
  `x_ray_body_location_id` int(11) NOT NULL,
  `x_ray_body_location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_type`
--

CREATE TABLE `x_ray_type` (
  `x_ray_type_id` int(11) NOT NULL,
  `x_ray_type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `lab_service_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
  MODIFY `medical_doctor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_technologist`
--
ALTER TABLE `medical_technologist`
  MODIFY `medical_technologist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` tinyint(4) NOT NULL AUTO_INCREMENT;

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
  MODIFY `report_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `security_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `x_ray_service_id` int(11) NOT NULL AUTO_INCREMENT;

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
