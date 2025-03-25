-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 08:37 AM
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
  `added_datetime_stamp` datetime NOT NULL DEFAULT current_timestamp(),
  `is_to_be_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_to_be_deleted_added_datetime_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `sex_id`, `age`, `age_unit`, `medical_doctor_id`, `civil_status_id`, `pwd_senior_id`, `occupation`, `birthday`, `contact_number`, `location_address`, `barangay_address`, `postal_address`, `province_city_ph_address`, `last_visited_date`, `added_datetime_stamp`, `is_to_be_deleted`, `is_to_be_deleted_added_datetime_stamp`) VALUES
(-1, 'CANCELLED', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03/15/2025DEL', '2023-04-10 12:26:43', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `medical_doctor_id` (`medical_doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29466;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`medical_doctor_id`) REFERENCES `medical_doctor` (`medical_doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
