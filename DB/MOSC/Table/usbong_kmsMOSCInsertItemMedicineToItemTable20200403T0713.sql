-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 12:09 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
-- Table structure for table `item`
--
/*
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_type_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
*/
--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`) VALUES
(0, 'None', '0.00', 1),
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
(27, 'CELCOXX 200mg\r\n', '33.00', 1),
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
(100, '* CALCIUM 600mg + VITAMIN D\r\n', '6.00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
