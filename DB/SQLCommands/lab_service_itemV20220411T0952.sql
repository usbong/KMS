-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 03:52 AM
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
  `lab_service_price` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_service_item`
--

INSERT INTO `lab_service_item` (`lab_service_item_id`, `lab_service_item_name`, `lab_service_price`, `added_datetime_stamp`) VALUES
(1, 'URINALYSIS', 70, '2022-04-11 01:35:20'),
(2, 'HIV / AIDS', 0, '2021-02-13 01:05:27'),
(3, 'AFB', 0, '2021-02-13 01:05:27'),
(4, 'BUA', 120, '2022-04-11 01:35:27'),
(5, 'SODIUM', 0, '2021-02-13 01:05:27'),
(6, 'FECALYSIS', 0, '2021-02-13 01:05:27'),
(7, 'HEPA B SCREENING', 0, '2021-02-13 01:05:27'),
(8, 'PBS', 0, '2021-02-13 01:05:27'),
(9, 'VLDL', 0, '2021-02-13 01:05:27'),
(10, 'POTASSIUM', 0, '2021-02-13 01:05:27'),
(11, 'CBC/PC', 0, '2021-02-13 01:05:27'),
(12, 'T3 T4', 0, '2021-02-13 01:05:27'),
(13, 'CHOLE', 0, '2021-02-13 01:05:27'),
(14, 'SGOT', 0, '2021-02-13 01:05:27'),
(15, 'CALCIUM', 0, '2021-02-13 01:05:28'),
(16, 'ESR', 0, '2021-02-13 01:05:28'),
(17, 'TSH', 0, '2021-02-13 01:05:28'),
(18, 'TG', 0, '2021-02-13 01:05:28'),
(19, 'SGPT', 0, '2021-02-13 01:05:28'),
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
(33, 'BUN', 0, '2021-02-13 01:05:28'),
(34, 'DB', 0, '2021-02-13 01:05:28'),
(35, 'OTHERS:', 0, '2021-02-13 01:05:29'),
(36, 'WIDAL TEST', 0, '2021-02-13 01:05:29'),
(37, 'GRAM STAIN', 0, '2021-02-13 01:05:29'),
(38, 'CREA', 0, '2021-02-13 01:05:29'),
(39, 'IB', 0, '2021-02-13 01:05:29'),
(40, 'TYPHIDOT ', 0, '2021-02-13 01:05:29');

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
