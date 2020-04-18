-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2020 at 10:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `image_filename` text NOT NULL
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
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_type_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`) VALUES
(1, 'ACECLOFENAC (DICLOTOL) 100mg \r\n', '16.50', 1),
(2, 'ACECLOFENAC (DOLOWIN SR) 200mg\r\n', '20.00', 1),
(3, 'ACECLOFENAC + PARA (DOLOWIN) PLUS 100mg', '16.00', 1),
(4, 'ADVIL IMPORTED 200mg\r\n', '6.00', 1),
(5, 'ADVIL 200mg\r\n', '8.50', 1),
(6, 'AGMASET 445mg\r\n', '35.00', 1),
(7, 'AGMASET 445mg; PER BOTTLE\r\n', '1300.00', 1),
(8, 'AGMASET 445mg; SET OF 3\r\n', '100.00', 1),
(9, 'ALENDRONETE SODIUM (ALDREN) 70mg', '300.00', 1),
(10, 'ALENDRONETE SODIUM (ALENDRA) 70mg', '280.00', 1),
(11, 'ALENDRONETE SODIUM (REVENTA) 70mg', '158.00', 1),
(12, 'ALFA - CALCINOL\r\n', '16.00', 1),
(13, 'ALLOPURINOL 100mg\r\n', '1.60', 1),
(14, 'AMLODIPINE (DIADIPINE) 10mg\r\n', '3.25', 1),
(15, 'AMLODIPINE (LODIPEX) 5mg\r\n', '2.75', 1),
(16, 'AMOXICILLIN 250mg\r\n', '2.50', 1),
(17, 'AMOXICILLIN 500mg\r\n', '4.00', 1),
(18, 'ANGIOFLUX 250mg\r\n', '35.50', 1),
(19, 'ATENOLOL (ZENOBLOC) 100mg\r\n', '6.00', 1),
(20, 'ATENOLOL (ZENOBLOC) 50mg\r\n', '4.50', 1),
(21, 'CALCIUMADE\r\n', '9.00', 1),
(22, 'CARISOPRODOL/ PARACETAMOL (LAGAFLEX) 300/250', '24.00', 1),
(23, 'CATAPRES 75mg\r\n', '34.00', 1),
(24, 'CEFALAXIN CAP 500mg\r\n', '7.00', 1),
(25, 'CEFIXINE 200mg\r\n', '25.00', 1),
(26, 'CEFUROXIME 500mg\r\n', '46.00', 1),
(27, 'CELCOXX 200mg\r\n', '30.00', 1),
(28, 'CELCOXX 400mg\r\n', '46.00', 1),
(29, 'CIPRODIN (CIPRO.) 500mg\r\n', '7.00', 1),
(30, 'CLINDAMYCIN CAP 300mg\r\n', '8.00', 1),
(31, 'CLOPIDOGREL 75mg\r\n', '9.00', 1),
(32, 'CLOXACILLIN 500mg\r\n', '5.00', 1),
(33, 'COLCHICINE (GOUTNIL) TAB 500mg\r\n', '5.00', 1),
(34, 'COLCHICINE (RHEA) TAB 500mg\r\n', '3.00', 1),
(35, 'COTRIMOXAZOLE FORTE\r\n', '5.00', 1),
(36, 'DEHYDROSOL POWD.\r\n', '15.00', 1),
(37, 'DIAMICRON 80mg\r\n', '32.50', 1),
(38, 'DICLOFENAC (DICLORAN) GEL 20g\r\n', '250.00', 1),
(39, 'DICLOFENAC 100mg\r\n', '10.00', 1),
(40, 'DICLOFENAC 50mg\r\n', '5.00', 1),
(41, 'DICLOFENAC NA (SUBSYDE CR) 100mg\r\n', '13.50', 1),
(42, 'DILTIAZEM 30mg\r\n', '5.00', 1),
(43, 'DILTIAZEM 60mg\r\n', '10.00', 1),
(44, 'DOLCET 37.5/325mg\r\n', '38.00', 1),
(45, 'ETORICOXIB (ARCOXIA) 120mg\r\n', '80.00', 1),
(46, 'ETORICOXIB (ETOXI-60) 120mg\r\n', '56.00', 1),
(47, 'ETORICOXIB (ETOXI-60) 60mg\r\n', '32.40', 1),
(48, 'ETORICOXIB (TORICO) 90mg\r\n', '26.00', 1),
(49, 'ETORICOXIB (XIBRA) 60mg\r\n', '18.00', 1),
(50, 'FASTUM GEL 30g\r\n', '430.00', 1),
(51, 'FLOXA (OFLOXACIN) 200mg\r\n', '10.00', 1),
(52, 'FLOXA (OFLOXACIN) 400mg\r\n', '13.00', 1),
(53, 'FURIC 40mg\r\n', '17.50', 1),
(54, 'FURIC 80mg\r\n', '24.25', 1),
(55, 'GABAPENTIN (GABIX) 100mg\r\n', '30.00', 1),
(56, 'GABAPENTIN (GABIX) 300mg\r\n', '33.00', 1),
(57, 'GABARON (GABA.) 300mg\r\n', '25.00', 1),
(58, 'GLICLAZIDE (ZEBET-8) 80mg\r\n', '5.80', 1),
(59, 'IBUPROFEN TAB 200mg\r\n', '1.20', 1),
(60, 'IBUPROFEN TAB 400mg\r\n', '1.60', 1),
(61, 'ISOFLAV-CR CAP\r\n', '30.00', 1),
(62, 'KETTESSE TAB 25mg\r\n', '33.00', 1),
(63, 'LORATADINE (LORAOX) 10mg\r\n', '7.00', 1),
(64, 'LORNOXICAN (ZORNICA-4)\r\n', '16.50', 1),
(65, 'LOSARTAN (AMGEL) 50mg\r\n', '11.25', 1),
(66, 'LOSARTAN (LOSAC) 100mg\r\n', '19.25', 1),
(67, 'MEFENAMIC 250mg\r\n', '1.50', 1),
(68, 'MEFENAMIC 500mg\r\n', '2.00', 1),
(69, 'MELOCAM 15mg\r\n', '12.00', 1),
(70, 'METFORMIN (ADIAC) TAB 500mg\r\n', '1.70', 1),
(71, 'METOPROLOL (PROLOL) TAB 100mg\r\n', '4.20', 1),
(72, 'METOPROLOL (PROLOL) TAB 50mg\r\n', '2.60', 1),
(73, 'MUPIROCIN OINTMENT 5g\r\n', '175.00', 1),
(74, 'NAPLEX (NAPROXEN) 500mg\r\n', '7.00', 1),
(75, 'NAPROXEN 550mg\r\n', '7.00', 1),
(76, 'OMEPRAZOLE 20mg\r\n', '7.00', 1),
(77, 'OMEPRAZOLE 40mg\r\n', '10.00', 1),
(78, 'PARA + ORPHANADRINECITRATE (PARADRINFORTE) 50/650mg', '19.00', 1),
(79, 'PARA + ORPHENADRINECITRATE (PROPARFORTE) 650/35mg', '19.00', 1),
(80, 'PARA + TRAMADOL HCI (CETRADOL) 325/37.5', '10.00', 1),
(81, 'PARA + TRAMADOL HCI (DOLOGESIC) 325/37.5', '15.00', 1),
(82, 'PARA + TRAMADOL HCI (TAKOL-CR) 100mg', '60.00', 1),
(83, 'PARA + TRAMADOL HCI (TRAP) 325/37.5\r\n', '15.00', 1),
(84, 'PIASCLEDINE 200/100mg\r\n', '50.00', 1),
(85, 'PREDNISONE TAB 5mg\r\n', '1.30', 1),
(86, 'PREGABALIN (GABICA) CAP 75mg\r\n', '33.00', 1),
(87, 'RAFONEX (CO-AMOXX) 625mg\r\n', '25.00', 1),
(88, 'PREGMAX M-75 (PREGABALIN + METHYLCOBALAMIN)', '30.75', 1),
(89, 'ROSUVASTATIN 10mg\r\n', '10.00', 1),
(90, 'SODIUM ASCORBATE (SOVIT-CEE) 500mg', '5.50', 1),
(91, 'TRAMADOL 50mg\r\n', '5.00', 1),
(92, 'TREVOCA TAB\r\n', '25.00', 1),
(93, 'VIARTRIL-S CAP 500mg\r\n', '20.00', 1),
(94, 'VIARTRIL-S POWDER SACHET\r\n', '60.00', 1),
(95, 'VIGEL CREAM 15g\r\n', '160.00', 1),
(96, 'ZERODOL - P 100/500mg\r\n', '23.00', 1),
(97, 'IBUPROFEN + PARACETAMOL (RESTOLAX FORTE 10/325mg)', '5.70', 1),
(98, 'DICLOGEN 20G\r\n', '185.00', 1),
(99, '* GLUCOSAMINE 1500mg\r\n', '15.00', 1),
(100, '* CALCIUM 600mg + VITAMIN D\r\n', '6.00', 1),
(101, 'Aircast', '8500.00', 2),
(102, 'Abdominal Binder', '300.00', 2),
(103, 'Adduction Pillow', '1500.00', 2),
(104, 'Adjustable Shoulder Support (NS-102) -Large', '850.00', 2),
(105, 'Alina Stockings Knee High 20-30mmHg -Medium', '1600.00', 2),
(106, 'Alina Stockings Thigh High 20-30mmHg -Large', '1600.00', 2),
(107, 'Allen and Irving Aneroid BP with Stethoscope', '1400.00', 2),
(108, 'Aluminum Crutches -Large', '1500.00', 2),
(109, 'Aluminum Crutches -Medium', '1500.00', 2),
(110, 'Aluminum Splint', '150.00', 2),
(111, 'Ankle Brace WH-901 -Large', '850.00', 2),
(112, 'Ankle Foot Orthosis (OH-908) Left -Medium', '300.00', 2),
(113, 'Ankle Lycra (NS-903)', '700.00', 2),
(114, 'Ankle Stirrup Air One Size', '1700.00', 2),
(115, 'Arm Sling Blue -Large', '250.00', 2),
(116, 'Arm Sling Blue -Medium', '250.00', 2),
(117, 'Arm Sling Blue -Small', '250.00', 2),
(118, 'Arm Sling Checkered -Small', '200.00', 2),
(119, 'Arm Sling Kiddie -Extra Large', '200.00', 2),
(120, 'Arm Sling Kiddie -Large', '200.00', 2),
(121, 'Arm Sling Kiddie -Medium', '200.00', 2),
(122, 'Arm Sling Kiddie -Small', '200.00', 2),
(123, 'Block Box (set)', '1900.00', 2),
(124, 'Body Splint', '250.00', 2),
(125, 'Cane with Chair', '1000.00', 2),
(126, 'Clavicle Brace OH-102 -Extra Large', '1600.00', 2),
(127, 'Clavicle Brace OH-102 -Large', '1500.00', 2),
(128, 'Clavicle Brace OH-102 -Medium', '1500.00', 2),
(129, 'Clavicle -Large', '500.00', 2),
(130, 'Clavicle -Medium', '500.00', 2),
(131, 'Clavicle Splint -Large', '500.00', 2),
(132, 'Clavicle Splint -Medium', '500.00', 2),
(133, 'Clavicle Splint -Small Infant', '500.00', 2),
(134, 'Clavicular Padded Splint -Medium', '500.00', 2),
(135, 'Clavicular Padded Splint -Small / Child', '500.00', 2),
(136, 'Commode Chair', '2700.00', 2),
(137, 'Commode Chair US', '3000.00', 2),
(138, 'DM Shoe (Not Pair) Size 10', '350.00', 2),
(139, 'DM Shoe (Not Pair) Size 11', '350.00', 2),
(140, 'DM Shoe (Not Pair) Size 5', '350.00', 2),
(141, 'DM Shoe (Not Pair) Size 6', '350.00', 2),
(142, 'DM Shoe (Not Pair) Size 7', '350.00', 2),
(143, 'DM Shoe (Not Pair) Size 8', '350.00', 2),
(144, 'DM Shoe (Not Pair) Size 9', '350.00', 2),
(145, 'Dr. Care Finger Splint', '250.00', 2),
(146, 'Dr. S Ortho Hinged Knee Brace -Medium', '1500.00', 2),
(147, 'Elastic Ankle -Extra Large', '400.00', 2),
(148, 'Elastic Ankle -Large', '400.00', 2),
(149, 'Elastic Ankle -Medium', '400.00', 2),
(150, 'Elastic Ankle Support (ES-901) -Extra Large', '400.00', 2),
(151, 'Elastic Ankle Support (ES-901) -Large', '400.00', 2),
(152, 'Elastic Ankle Support (ES-901) -Medium', '400.00', 2),
(153, 'Elastic Ankle Support (ES-901) -Small', '400.00', 2),
(154, 'Elastic Band 2\"', '40.00', 2),
(155, 'Elastic Band 3\"', '50.00', 2),
(156, 'Elastic Band 4\"', '60.00', 2),
(157, 'Elastic Band 6\"', '100.00', 2),
(158, 'Elastic Calf ES-801 -Large', '400.00', 2),
(159, 'Elastic Calf ES-801 -Medium', '400.00', 2),
(160, 'Elastic Calf -Large', '375.00', 2),
(161, 'Elastic Knee (ES-701) -Extra Large', '400.00', 2),
(162, 'Elastic Knee (ES-701) -Large', '400.00', 2),
(163, 'Elastic Knee (ES-701) -Medium', '400.00', 2),
(164, 'Elastic Knee -Extra Large', '400.00', 2),
(165, 'Elastic Knee -Large', '400.00', 2),
(166, 'Elastic Knee -Medium', '400.00', 2),
(167, 'Elastic Knee Support (ES-701) -Extra Extra Large', '400.00', 2),
(168, 'Elastic Knee Support (ES-701) -Extra Large', '400.00', 2),
(169, 'Elastic Knee Support (ES-701) -Large', '400.00', 2),
(170, 'Elastic Knee Support (ES-701) -Medium', '400.00', 2),
(171, 'Elastic Knee Support (ES-701) -Small', '400.00', 2),
(172, 'Encore Wrist Splint Right -Large', '600.00', 2),
(173, 'Energizer Battery 9V', '135.00', 2),
(174, 'Energizer Battery AA set of 2', '130.00', 2),
(175, 'Energizer Battery AAA', '130.00', 2),
(176, 'Eveready Battery AA set of 2', '39.00', 2),
(177, 'Eveready Battery AAA set of 2', '59.25', 2),
(178, 'Face Mask 50\'s (SURGITECH)', '50.00', 2),
(179, 'Fiberglass Prime Cast 4\" Blue', '375.00', 2),
(180, 'Fiberglass Splint 2\"', '350.00', 2),
(181, 'Fiberglass Splint 4\"', '600.00', 2),
(182, 'Fiberglass Splint 5\"', '800.00', 2),
(183, 'Finger Splint', '250.00', 2),
(184, 'Forearm Splint', '800.00', 2),
(185, 'Heel Cup -Large', '500.00', 2),
(186, 'Heel Cup -Medium', '500.00', 2),
(187, 'Heel Cup -Small', '500.00', 2),
(188, 'Hinged Knee Brace (NS-704) -Extra Large', '1650.00', 2),
(189, 'Hinged Knee Brace (NS-704) -Large', '1650.00', 2),
(190, 'Hinged Knee Brace (NS-704) -Medium', '1650.00', 2),
(191, 'Hinged Knee Brace (NS-704) -Small', '1650.00', 2),
(192, 'Hinged Knee Brace -Extra Large', '1650.00', 2),
(193, 'Hinged Knee Brace -Large', '1650.00', 2),
(194, 'Hinged Knee Brace -Medium', '1650.00', 2),
(195, 'Hinged Knee Brace -Small', '1650.00', 2),
(196, 'Hot Moist Pack 00-092 Cervical', '930.00', 2),
(197, 'Hot Moist Pack 00-093 Spinal 10\"x18\"', '930.00', 2),
(198, 'Hot Water Bag 1000ML', '150.00', 2),
(199, 'Hot Water Bag 2000ML -Big', '175.00', 2),
(200, 'Hot Water Bag 500ML', '100.00', 2),
(201, 'Ice Cupp 6inch', '100.00', 2),
(202, 'Ice Cupp 8inch', '150.00', 2),
(203, 'Knee Immobilizer 18\" -Medium', '2000.00', 2),
(204, 'Knee Immobilizer 18\" -Small', '2000.00', 2),
(205, 'Knee Immobilizer 21\" -Large', '1500.00', 2),
(206, 'Knee Immobilizer 21\" -Medium', '1500.00', 2),
(207, 'Knee Immobilizer Black Eco 21\" -Large', '1500.00', 2),
(208, 'Knee Immobilizer Black Eco 21\" -Medium', '1500.00', 2),
(209, 'Knee Immobilizer Black Eco 21\" -Small', '1500.00', 2),
(210, 'Knee Immobilizer Blue 18\" -Medium', '2000.00', 2),
(211, 'Knee Immobilizer Blue 21\" -Large', '2000.00', 2),
(212, 'Knee Immobilizer Blue -Large', '2000.00', 2),
(213, 'Knee Immobilizer Blue -Medium', '2000.00', 2),
(214, 'Knee Immobilizer Green Eco -Large', '1500.00', 2),
(215, 'Knee Immobilizer Green Eco -Medium', '1500.00', 2),
(216, 'Knee Patella (NS-703) -Large', '750.00', 2),
(217, 'Knee Patella (NS-703) -Medium', '750.00', 2),
(218, 'Knee Support -Extra Extra Lage', '400.00', 2),
(219, 'Knee Support -Extra Extra Large', '400.00', 2),
(220, 'Knee Support -Extra Large', '400.00', 2),
(221, 'Knee Support Immobilizer Blue -Extra Large', '2000.00', 2),
(222, 'Knee Support -Large', '400.00', 2),
(223, 'Knee Support -Medium', '400.00', 2),
(224, 'Knight Tylor Brace -Medium', '8500.00', 2),
(225, 'Lidocane', '200.00', 2),
(226, 'Ligament Knee Support (NS-706) -Medium', '1500.00', 2),
(227, 'Local Aluminum Walker', '1600.00', 2),
(228, 'Longbone Collar Blue -Large', '650.00', 2),
(229, 'Longbone Collar Blue -Medium', '650.00', 2),
(230, 'Longbone Wrist Splint Left -Medium', '500.00', 2),
(231, 'Longbone Wrist Splint Left -Small', '500.00', 2),
(232, 'Longbone Wrist Splint Right -Large', '500.00', 2),
(233, 'Longbone Wrist Splint Right -Medium', '500.00', 2),
(234, 'Longbone Wrist Splint Right -Small', '500.00', 2),
(235, 'Lumbar (EB-512) -Extra Extra Extra Large (Triple Extra Large)', '2000.00', 2),
(236, 'Lumbar (WB-577) -Large/Extra Large', '2100.00', 2),
(237, 'Lumbar (WB-577) -Small/Extra Small', '2100.00', 2),
(238, 'Lumbar (WB-577) -Small/Medium', '2100.00', 2),
(239, 'Lumbar Eco -Extra Extra Large', '1300.00', 2),
(240, 'Lumbar Eco -Extra Large', '1300.00', 2),
(241, 'Lumbar Eco -Medium', '1300.00', 2),
(242, 'Lumbar Starleaf -Extra Extra Large', '1300.00', 2),
(243, 'Lumbar Starleaf -Extra Large', '1300.00', 2),
(244, 'Lumbar Starleaf -Large', '1300.00', 2),
(245, 'Lumbar Support (NB-504) -Extra Extra Large', '1800.00', 2),
(246, 'Lumbar Support (NB-504) -Extra Large', '1800.00', 2),
(247, 'Lumbar Support (NB-504) -Large', '1800.00', 2),
(248, 'Lumbar Support (NB-504) -Medium', '1800.00', 2),
(249, 'Lumbar Support (WB-577) -Large/Extra Large', '2100.00', 2),
(250, 'Lumbar Support (WB-577) -Small/Medium', '2100.00', 2),
(251, 'Lumbar Support -Extra Large', '1800.00', 2),
(252, 'Lumbar Support -Extra Small', '1800.00', 2),
(253, 'Lumbar Support -Large', '1800.00', 2),
(254, 'Lumbar Support -Medium', '1800.00', 2),
(255, 'Medical Compression Stocking Dr. S Ortho -Large', '1400.00', 2),
(256, 'Medical Compression Stockings Thigh High 20-30mmHg -Extra Large', '1600.00', 2),
(257, 'Medical Compression Stockings Thigh High 20-30mmHg -Large', '1600.00', 2),
(258, 'Medical Compression Stockings Thigh High 20-30mmHg -Medium', '1600.00', 2),
(259, 'Medical Compression Stockings Thigh High 20-30mmHg -Small', '1600.00', 2),
(260, 'Micropore (1/2)\"', '20.00', 2),
(261, 'Micropore 1\"', '20.00', 2),
(262, 'MTI Digital Arm BP Economy', '1900.00', 2),
(263, 'MTI Hot /Cold Gel Pack', '300.00', 2),
(264, 'Neoprene Ankle Support Lycra (NS-903)', '600.00', 2),
(265, 'Neoprene Knee Support Lycra (NS-707)', '800.00', 2),
(266, 'Neoprene Knee Support NS-701 -Extra Large', '600.00', 2),
(267, 'Neoprene Knee Support NS-701 -Large', '600.00', 2),
(268, 'Neoprene Knee Support NS-701 -Medium', '600.00', 2),
(269, 'Non-adhesive Dressing', '50.00', 2),
(270, 'Non-stick', '50.00', 2),
(271, 'NSS', '100.00', 2),
(272, 'Plaster of Paris 2\"', '100.00', 2),
(273, 'Plaster of Paris 4\"', '350.00', 2),
(274, 'Plaster of Paris 6\"', '350.00', 2),
(275, 'Prime Cast 2\" Blue', '235.00', 2),
(276, 'Prime Cast 3\" Blue', '325.00', 2),
(277, 'Prime Cast 4\" Blue', '375.00', 2),
(278, 'Prime Cast 5\" Blue', '425.00', 2),
(279, 'Prime Fiberglass Splint 3\"', '600.00', 2),
(280, 'Prime Fiberglass Splint 4\"', '400.00', 2),
(281, 'Prime Sling', '180.00', 2),
(282, 'Prime Splint 4\"', '600.00', 2),
(283, 'Prime Splint 5\"', '500.00', 2),
(284, 'Prime ThomasCollar Blue Eco -Large', '500.00', 2),
(285, 'Prime ThomasCollar Blue Eco -Large ', '500.00', 2),
(286, 'Prime ThomasCollar Blue -Large', '500.00', 2),
(287, 'Prime ThomasCollar Blue -Medium', '500.00', 2),
(288, 'Prime ThomasCollar Blue -Small', '500.00', 2),
(289, 'Prime Walker', '2200.00', 2),
(290, 'Prime Wrist Splint Left -Large', '500.00', 2),
(291, 'Prime Wrist Splint Left -Medium', '500.00', 2),
(292, 'Prime Wrist Splint Left -Small', '500.00', 2),
(293, 'Prime Wrist Splint Left-Small', '500.00', 2),
(294, 'Prime Wrist Splint Right -Large', '500.00', 2),
(295, 'Prime Wrist Splint Right -Medium', '500.00', 2),
(296, 'Prime Wrist Splint Right -Small', '500.00', 2),
(297, 'Profoot Triad Orthotic (MEN)', '1200.00', 2),
(298, 'Profoot Triad Orthotic (WOMEN)', '1200.00', 2),
(299, 'Quad Cane', '750.00', 2),
(300, 'Restorator', '1900.00', 2),
(301, 'Rib Belt - Small', '800.00', 2),
(302, 'Rib Belt (EB-502)', '800.00', 2),
(303, 'Rib Belt (EB-502) -Large', '800.00', 2),
(304, 'Roll Gauze 2\"', '20.00', 2),
(305, 'Roll Gauze 3\"', '50.00', 2),
(306, 'Roll Gauze 4\"', '40.00', 2),
(307, 'Roll Gauze 5\"', '75.00', 2),
(308, 'Rubber Tip Aluminum Crutch Black', '40.00', 2),
(309, 'Rubber Tip Crutches', '30.00', 2),
(310, 'Rubber Tip Quad Cane', '40.00', 2),
(311, 'Silicon Heel Cup -Large', '500.00', 2),
(312, 'Silicon Heel Cup -Medium', '500.00', 2),
(313, 'Silicone Heel Cup -Large', '500.00', 2),
(314, 'Single Cane', '500.00', 2),
(315, 'Skin Traction -Large', '1300.00', 2),
(316, 'Skin Traction -Medium', '1300.00', 2),
(317, 'Skin Traction -Small', '1300.00', 2),
(318, 'Sling and Swathe Original -Large', '380.00', 2),
(319, 'Sling and Swathe Original -Medium', '380.00', 2),
(320, 'Sling and Swathe Original -Small', '380.00', 2),
(321, 'Splint Green -Large', '200.00', 2),
(322, 'Splint Violet', '200.00', 2),
(323, 'Squeeze Ball', '40.00', 2),
(324, 'Standard Wheelchair Spoke Wheels Black Upholstery', '4600.00', 2),
(325, 'Starleaf Thumb Splint', '800.00', 2),
(326, 'Stockinette 2\"', '30.00', 2),
(327, 'Stockinette 3\"', '180.00', 2),
(328, 'Stockinette 36\" (1 yard)', '180.00', 2),
(329, 'Stockinette 4\"', '180.00', 2),
(330, 'Stockinette 5\"', '75.00', 2),
(331, 'Stockinette for closed reduction', '350.00', 2),
(332, 'Tennis Elbow Support -Large', '450.00', 2),
(333, 'Theraband Black (Foil)', '350.00', 2),
(334, 'Theraband Red (Foil)', '225.00', 2),
(335, 'Theraband Silver (Foil)', '390.00', 2),
(336, 'Theratube Red', '330.00', 2),
(337, 'Thumb Splint', '300.00', 2),
(338, 'Thumb Splint (One Size Only)', '300.00', 2),
(339, 'Thumb Splint IMING', '1000.00', 2),
(340, 'Thumb Splint -Large', '300.00', 2),
(341, 'Thumb Splint -Small', '300.00', 2),
(342, 'Thumb Splint Stabilizer', '1000.00', 2),
(343, 'Thumb Stabilizer (OH-304)', '1200.00', 2),
(344, 'Transfer Belt (00-173)', '1600.00', 2),
(345, 'Tri Star Ankle Support', '1200.00', 2),
(346, 'Umbrella Cane -Big', '450.00', 2),
(347, 'Umbrella Cane -Large', '400.00', 2),
(348, 'Umbrella Cane -Small', '350.00', 2),
(349, 'Vigel', '160.00', 2),
(350, 'Wadding Sheet 2\"x4 Polyester', '50.00', 2),
(351, 'Wadding Sheet 3\"x4 Polyester', '60.00', 2),
(352, 'Wadding Sheet 4\"x4 Polyester', '60.00', 2),
(353, 'Wadding Sheet 5\"x4 Polyester', '60.00', 2),
(354, 'Wooden Crutch', '750.00', 2),
(355, 'Wooden Crutch set -Large', '750.00', 2),
(356, 'Wooden Crutch set -Medium', '750.00', 2),
(357, 'Wrist Brace -Small', '500.00', 2),
(358, 'Wrist Prime Right -Extra Large', '500.00', 2),
(359, 'Wrist Splint IM Right -Medium', '500.00', 2),
(360, 'Wrist Splint Kiddie Left -Large', '500.00', 2),
(361, 'Wrist Splint Kiddie Left -Small', '500.00', 2),
(362, 'Wrist Splint Kiddie Left-Medium', '500.00', 2),
(363, 'Wrist Splint Kiddie Right -Large', '500.00', 2),
(364, 'Wrist Splint Kiddie Right -Medium', '500.00', 2),
(365, 'Wrist Splint Kiddie Right -Small', '500.00', 2),
(366, 'Wrist Splint Left -Medium', '500.00', 2),
(367, 'Wrist Splint Left -Small', '500.00', 2),
(368, 'Wrist Splint Right -Extra Large', '500.00', 2),
(369, 'Wrist Splint Right -Large', '500.00', 2),
(370, 'Wrist Splint Right -Medium', '500.00', 2),
(371, 'Wrist Splint Right -Small', '500.00', 2),
(372, 'Xylocane', '150.00', 2);

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
(1, 'Medicine'),
(2, 'Non-medicine');

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
(3, 'SUMMARY'),
(4, 'REJUSO, CHASTITY AMOR');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`) VALUES
(0, 'None'),
(1, 'MANUAL, MIGUEL'),
(2, 'BERGSTEIN, AKI'),
(3, 'DELA PAZ, MIGUEL'),
(4, 'JOCSON, MICHELLE');

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
(2, 'P.A.S. ORTHOPEDIC SUPPLIES'),
(3, 'MEDICAL DOCTOR NAME');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_type_id` tinyint(4) NOT NULL DEFAULT 2,
  `report_filename` text CHARACTER SET utf8mb4 NOT NULL,
  `report_description` text CHARACTER SET utf8mb4 NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_type_id`, `report_filename`, `report_description`, `added_datetime_stamp`) VALUES
(0, 7, '', '', '2020-04-17 15:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `report_type_id` tinyint(4) NOT NULL,
  `report_type_name` varchar(30) NOT NULL
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
(7, 'Purchase Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL DEFAULT 0,
  `transaction_date` text NOT NULL,
  `fee` decimal(11,2) NOT NULL,
  `fee_quantity` tinyint(4) NOT NULL DEFAULT 0,
  `x_ray_fee` decimal(11,2) NOT NULL,
  `lab_fee` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `transaction_type_name` text NOT NULL,
  `treatment_type_name` text NOT NULL,
  `treatment_diagnosis` text NOT NULL,
  `transaction_old_new` tinyint(2) NOT NULL DEFAULT 0,
  `medical_doctor_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `added_datetime_stamp` timestamp NOT NULL DEFAULT current_timestamp()
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);

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
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `receipt_type_id` (`receipt_type_id`),
  ADD KEY `transaction_id` (`transaction_id`);

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
  ADD KEY `payslip_type_id` (`report_type_id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`report_type_id`);

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
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_doctor`
--
ALTER TABLE `medical_doctor`
  MODIFY `medical_doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_type`
--
ALTER TABLE `receipt_type`
  MODIFY `receipt_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `report_type_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `transaction_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`report_id`) REFERENCES `report` (`report_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
