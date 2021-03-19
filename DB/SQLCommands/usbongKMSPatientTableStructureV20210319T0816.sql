-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 01:16 AM
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
-- Table structure for table `patient`
--

-- added by Mike, 20210319
-- note: ALTER TABLE `patient` ADD `halimbawa` INT NOT NULL AFTER `province_city_ph_address`;


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
  `province_city_ph_address` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=26 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
