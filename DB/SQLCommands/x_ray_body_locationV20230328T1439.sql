-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 08:39 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `x_ray_body_location`
--
ALTER TABLE `x_ray_body_location`
  ADD UNIQUE KEY `x_ray_body_location_id` (`x_ray_body_location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
