-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 01:05 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_logged_in_datetime_stamp` datetime DEFAULT NULL,
  `last_logged_out_datetime_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_first_name`, `member_last_name`, `member_email_address`, `member_password`, `member_contact_number`, `member_shipping_address`, `member_city`, `member_country`, `member_postal_code`, `member_type`, `is_admin`, `last_logged_in_datetime_stamp`, `last_logged_out_datetime_stamp`) VALUES
(1, 'Miguel', 'Dela Paz', 'm.delapaz@usbong.ph', '10^6', '1234567', 'Sto. Niño', 'Marikina City', 'Philippines', 1820, 4, 1, NULL, NULL);

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
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_type_id` tinyint(4) NOT NULL,
  `report_item_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `report_answer` text,
  `added_datetime_stamp` datetime NOT NULL
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
(1, 'Lessons-learned Report');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`member_type`) REFERENCES `member_type` (`member_type_id`);

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
