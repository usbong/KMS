-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 02:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Table structure for table `lab_service_item`
--

CREATE TABLE `lab_service_item` (
  `lab_service_item_id` int(11) NOT NULL,
  `lab_service_item_name` text NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_service_item`
--

INSERT INTO `lab_service_item` (`lab_service_item_id`, `lab_service_item_name`, `added_datetime_stamp`) VALUES
(1, 'URINALYSIS', '2021-02-13 01:05:27'),
(2, 'HIV / AIDS', '2021-02-13 01:05:27'),
(3, 'AFB', '2021-02-13 01:05:27'),
(4, 'BUA', '2021-02-13 01:05:27'),
(5, 'SODIUM', '2021-02-13 01:05:27'),
(6, 'FECALYSIS', '2021-02-13 01:05:27'),
(7, 'HEPA B SCREENING', '2021-02-13 01:05:27'),
(8, 'PBS', '2021-02-13 01:05:27'),
(9, 'VLDL', '2021-02-13 01:05:27'),
(10, 'POTASSIUM', '2021-02-13 01:05:27'),
(11, 'CBC/PC', '2021-02-13 01:05:27'),
(12, 'T3 T4', '2021-02-13 01:05:27'),
(13, 'CHOLE', '2021-02-13 01:05:27'),
(14, 'SGOT', '2021-02-13 01:05:27'),
(15, 'CALCIUM', '2021-02-13 01:05:28'),
(16, 'ESR', '2021-02-13 01:05:28'),
(17, 'TSH', '2021-02-13 01:05:28'),
(18, 'TG', '2021-02-13 01:05:28'),
(19, 'SGPT', '2021-02-13 01:05:28'),
(20, 'MAGNESIUM', '2021-02-13 01:05:28'),
(21, 'PT', '2021-02-13 01:05:28'),
(22, 'ASO TITER', '2021-02-13 01:05:28'),
(23, 'HDL', '2021-02-13 01:05:28'),
(24, 'ALKPHOS', '2021-02-13 01:05:28'),
(25, 'PHOSPHOROUS', '2021-02-13 01:05:28'),
(26, 'PTT', '2021-02-13 01:05:28'),
(27, 'RF', '2021-02-13 01:05:28'),
(28, 'LDL', '2021-02-13 01:05:28'),
(29, 'TB', '2021-02-13 01:05:28'),
(30, 'CHLORIDE', '2021-02-13 01:05:28'),
(31, 'RPR (VDRL)', '2021-02-13 01:05:28'),
(32, 'CRP', '2021-02-13 01:05:28'),
(33, 'BUN', '2021-02-13 01:05:28'),
(34, 'DB', '2021-02-13 01:05:28'),
(35, 'OTHERS:', '2021-02-13 01:05:29'),
(36, 'WIDAL TEST', '2021-02-13 01:05:29'),
(37, 'GRAM STAIN', '2021-02-13 01:05:29'),
(38, 'CREA', '2021-02-13 01:05:29'),
(39, 'IB', '2021-02-13 01:05:29'),
(40, 'TYPHIDOT ', '2021-02-13 01:05:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_service_item`
--
ALTER TABLE `lab_service_item`
  ADD PRIMARY KEY (`lab_service_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_service_item`
--
ALTER TABLE `lab_service_item`
  MODIFY `lab_service_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
