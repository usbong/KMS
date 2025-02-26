-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 06:25 AM
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
(0, 'NONE', '0.00', 1),
(1, 'ACECLOFENAC (DICLOTOL) 100mg \r\n', '16.50', 1),
(2, 'ACECLOFENAC (DOLOWIN SR) 200mg\r\n', '20.00', 1),
(3, 'ACECLOFENAC + PARA (DOLOWIN) PLUS 100mg', '16.00', 1),
(4, 'ADVIL IMPORTED 200mg\r\n', '6.00', 1),
(5, 'ADVIL 200mg\r\n', '8.50', 1),
(6, 'AGMASET 445mg\r\n', '35.00', 1),
(7, 'AGMASET 445mg; PER BOTTLE\r\n', '1300.00', 1),
(8, 'AGMASET 445mg; SET OF 3\r\n', '100.00', 1),
(9, 'ALENDRONETE SODIUM (ALDREN) 70mg', '150.00', 1),
(10, 'ALENDRONETE SODIUM (ALENDRA) 70mg', '300.00', 1),
(11, 'ALENDRONETE SODIUM (REVENTA) 70mg', '158.00', 1),
(12, 'ALFA - CALCINOL\r\n', '16.00', 1),
(13, 'ALLOPURINOL 100mg\r\n', '1.60', 1),
(14, 'AMLODIPINE (DIADIPINE) 10mg\r\n', '3.25', 1),
(15, 'AMLODIPINE (LODIPEX) 5mg\r\n', '2.75', 1),
(16, 'AMOXICILLIN 250mg\r\n', '2.50', 1),
(17, 'AMOXICILLIN 500mg\r\n', '4.00', 1),
(18, 'ANGIOFLUX 250mg\r\n', '38.80', 1),
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
(102, 'Knee Immobilizer Blue', '2000.00', 2),
(103, 'Non-adhesive Dressing', '50.00', 2),
(104, 'Wrist Splint Kiddie Right -Medium', '500.00', 2),
(105, 'Elastic Knee XL', '400.00', 2),
(106, 'Lumbar Support (NB-504) -Extra Small', '1800.00', 2),
(107, 'Thumb Splint IMING', '1000.00', 2),
(108, 'Lumbar Support -XL [DUPLICATE]', '1800.00', 2),
(109, 'Thumb Stabilizer', '1200.00', 2),
(110, 'Profoot Triad Orthotic (MEN)', '1200.00', 2),
(111, 'Wrist Prime Right -XL', '500.00', 2),
(112, 'Lumbar Support -L [DUPLICATE]', '1800.00', 2),
(113, 'Theraband Silver (Foil)', '390.00', 2),
(114, 'Aluminum Crutches -Large', '1500.00', 2),
(115, 'Lumbar (WB-577) -S/XS', '2100.00', 2),
(116, 'Elastic Knee -Medium', '400.00', 2),
(117, 'Tennis Elbow Support -Large', '450.00', 2),
(118, 'Elastic Knee -Large', '400.00', 2),
(119, 'Hinged Knee Brace -Large', '1650.00', 2),
(120, 'Thumb Splint -Large', '300.00', 2),
(121, 'Thumb Stabilizer (OH-304)', '1200.00', 2),
(122, 'Clavicle -Medium', '500.00', 2),
(123, 'Knee Support -Extra Extra Large', '400.00', 2),
(124, 'Elastic Ankle -Extra Large', '400.00', 2),
(125, 'Elastic Calf -Large', '375.00', 2),
(126, 'Sling and Swathe Original -Large', '380.00', 2),
(127, 'Knee Support -Extra Extra Lage', '400.00', 2),
(128, 'Hinged Knee Brace -Extra Large', '1650.00', 2),
(129, 'Knee Support -Extra Large', '400.00', 2),
(130, 'Elastic Ankle -Medium', '400.00', 2),
(131, 'Energizer 9V', '135.00', 2),
(132, 'Transfer Belt', '1600.00', 2),
(133, 'Longbone Collar Blue -Medium', '650.00', 2),
(134, 'Ligament Knee Support (NS-706) -Medium', '1500.00', 2),
(135, 'Lumbar Support -M [DUPLICATE]', '1800.00', 2),
(136, 'Profoot Triad Orthotic (WOMEN)', '1200.00', 2),
(137, 'Splint Green -Large', '200.00', 2),
(138, 'Lumbar Support (WB-577) -Large/Extra Large', '2100.00', 2),
(139, 'Wrist Splint Kiddie Right -Large', '500.00', 2),
(140, 'Knee Support -Large', '400.00', 2),
(141, 'Ankle Foot Orthosis (OH-908) Left -Medium', '300.00', 2),
(142, 'Elastic Knee (ES-701) -Extra Large', '400.00', 2),
(143, 'Transfer Belt (00-173)', '1600.00', 2),
(144, 'Alina Stockings Thigh High 20-30mmHg -Large', '1600.00', 2),
(145, 'Longbone Wrist Splint Left -Small', '500.00', 2),
(146, 'Elastic Knee Support (ES-701) -Extra Extra Large', '400.00', 2),
(147, 'Prime Wrist Splint Right -Medium', '500.00', 2),
(148, 'Wrist Brace -Small', '500.00', 2),
(149, 'Knee Immobilizer Eco -Medium', '1500.00', 2),
(150, 'Body Splint [DUPLICATE]', '150.00', 2),
(151, 'Encore Wrist Splint Right -Large', '600.00', 2),
(152, 'Wrist Splint IM Right -Medium', '500.00', 2),
(153, 'Abdominal Binder', '300.00', 2),
(154, 'Energizer AAA', '130.00', 2),
(155, 'Block Box (set)', '1900.00', 2),
(156, 'Rib Belt -Small', '800.00', 2),
(157, 'Elastic Knee (ES-701) -Medium', '400.00', 2),
(158, 'Knight Tylor Brace -Medium', '8500.00', 2),
(159, 'Ice Cupp 6inch', '100.00', 2),
(160, 'Eveready Battery AAA', '130.00', 2),
(161, 'Hinged Knee Brace (NS-704) -Small', '1650.00', 2),
(162, 'Prime ThomasCollarBlue Eco -Large', '500.00', 2),
(163, 'Neoprene Ankle Support Lycra (NS-903)', '600.00', 2),
(164, 'Hinged Knee Brace (NS-704) -Large', '1650.00', 2),
(165, 'Elastic Ankle -Large', '400.00', 2),
(166, 'Wrist Splint Kiddie Left -Medium', '500.00', 2),
(167, 'Arm Sling Kiddie -Medium', '200.00', 2),
(168, 'Alina Stockings Knee High 20-30mmHg Medium', '1600.00', 2),
(169, 'Clavicle Brace OH-102 -Medium', '1500.00', 2),
(170, 'Hinged Knee Brace (NS-704) -Medium', '1650.00', 2),
(171, 'Knee Support Immobilizer Blue -Extra Large', '2000.00', 2),
(172, 'Theratube Red', '330.00', 2),
(173, 'Lumbar Support (NB-504) -Medium', '1800.00', 2),
(174, 'Hot Moist Pack 00-092 Cervical', '930.00', 2),
(175, 'Thumb Splint -Small', '300.00', 2),
(176, 'Knee Immobilizer Blue -Large', '2000.00', 2),
(177, 'Body Splint', '250.00', 2),
(178, 'Hot Water Bag 500ML', '100.00', 2),
(179, 'Restorator', '1900.00', 2),
(180, 'Prime Sling Loop', '180.00', 2),
(181, 'Cane with Chair', '1000.00', 2),
(182, 'Thumb Splint Stabilizer', '1000.00', 2),
(183, 'Stockinette 36\" (1 yard)', '180.00', 2),
(184, 'Wrist Splint Kiddie Left -Large', '500.00', 2),
(185, 'Ankle Brace WH-901 -Large', '850.00', 2),
(186, 'Longbone Wrist Splint Right -Small', '500.00', 2),
(187, 'MTI Hot /Cold Gel Pack', '300.00', 2),
(188, 'Longbone Wrist Splint Right -Medium', '500.00', 2),
(189, 'Skin Traction -Large', '1300.00', 2),
(190, 'Lumbar Support (WB-577) -Small/Medium', '2100.00', 2),
(191, 'Wrist Splint', '500.00', 2),
(192, 'Theraband Black (Foil)', '350.00', 2),
(193, 'Prime Wrist Splint Left -Small', '500.00', 2),
(194, 'Lumbar (EB-512) -Extra Extra Extra Large (Triple Extra Large)', '2000.00', 2),
(195, 'Knee Immobilizer 18\" -Medium', '2000.00', 2),
(196, 'Vigel', '160.00', 2),
(197, 'Rubber Tip for Quad Cane', '40.00', 2),
(198, 'Skin Traction -Small', '1300.00', 2),
(199, 'Knee Immobilizer 18\" -Small', '2000.00', 2),
(200, 'Thumb Splint (One Size Only)', '300.00', 2),
(201, 'Elastic Knee (ES-701) -Large', '400.00', 2),
(202, 'Heel Cup -Small', '500.00', 2),
(203, 'Knee Immobilizer Blue -Medium', '2000.00', 2),
(204, 'Theraband Red (Foil)', '225.00', 2),
(205, 'Clavicle -Large', '500.00', 2),
(206, 'Wooden Crutch set L ', '750.00', 2),
(207, 'Clavicular Padded Splint -Small / Child', '500.00', 2),
(208, 'Clavicular Padded Splint -Medium', '500.00', 2),
(209, 'NSS', '100.00', 2),
(210, 'Knee Immobilizer Eco (Green) -Large', '1500.00', 2),
(211, 'Hot Water Bag 2000ML -Big', '175.00', 2),
(212, 'Tri Star Ankle Support', '1200.00', 2),
(213, 'Rubber Tip Aluminum Crutch Black', '40.00', 2),
(214, 'Skin Traction -Small', '1300.00', 2),
(215, 'Finger Splint', '250.00', 2),
(216, 'Eveready Battery AAA set of 2', '59.25', 2),
(217, 'Prime Cast 3\" [DUPLICATE]', '325.00', 2),
(218, 'Lumbar Eco -Extra Extra Large', '1300.00', 2),
(219, 'Prime Splint 5\"', '500.00', 2),
(220, 'Thumb Splint', '300.00', 2),
(221, 'Heel Cup -Large', '500.00', 2),
(222, 'Elastic Calf ES-801 -Medium', '400.00', 2),
(223, 'DM Shoe (Not Pair) Size 10', '350.00', 2),
(224, 'Elastic Band 2\"', '40.00', 2),
(225, 'Xylocane', '150.00', 2),
(226, 'Silicon Heel Cup -Medium', '500.00', 2),
(227, 'Roll Gauze 3\"', '50.00', 2),
(228, 'Lidocane', '200.00', 2),
(229, 'Arm Sling Checkered -Small', '200.00', 2),
(230, 'Lumbar (WB-577) -S/M', '2100.00', 2),
(231, 'Wrist Splint Right -Extra Large', '500.00', 2),
(232, 'Lumbar Starleaf -Extra Large', '1300.00', 2),
(233, 'Skin Traction', '1300.00', 2),
(234, 'Prime Splint 4\"', '600.00', 2),
(235, 'Rib Belt (EB-502)', '800.00', 2),
(236, 'Rubber Tip Quad Cane', '40.00', 2),
(237, 'Prime Fiberglass Splint 4\"', '400.00', 2),
(238, 'Lumbar Eco -Medium', '1300.00', 2),
(239, 'Prime ThomasCollarBlue Eco -Large ', '500.00', 2),
(240, 'DM Shoe (Not Pair) Size 8', '350.00', 2),
(241, 'Lumbar Eco -Extra Large', '1300.00', 2),
(242, 'Aluminum Splint', '150.00', 2),
(243, 'Forearm Splint', '800.00', 2),
(244, 'Dr. Care Finger Splint', '250.00', 2),
(245, 'Umbrella Cane -Small', '350.00', 2),
(246, 'Knee Immobilizer 21\" -Medium', '1500.00', 2),
(247, 'Knee Patella (NS-703) -Medium', '750.00', 2),
(248, 'Wrist Splint Kiddie Right -Small', '500.00', 2),
(249, 'Standard Wheelchair Spoke Wheels Black Upholstery', '4600.00', 2),
(250, 'Knee Support -Medium', '400.00', 2),
(251, 'Skin Traction Large', '1300.00', 2),
(252, 'Energizer Battery AA set of 2', '130.00', 2),
(253, 'Hinged Knee Brace Large', '1650.00', 2),
(254, 'Energizer AA', '130.00', 2),
(255, 'Adduction Pillow', '1500.00', 2),
(256, 'Silicone Heel Cup -Large', '500.00', 2),
(257, 'Sling and Swathe Original -Small', '380.00', 2),
(258, 'Face Mask 50\'s (SURGITECH)', '50.00', 2),
(259, 'Wooden Crutch L', '750.00', 2),
(260, 'Wrist Splint Right -Large', '500.00', 2),
(261, 'Longbone Collar Blue -Large', '650.00', 2),
(262, 'Commode Chair', '2700.00', 2),
(263, 'Ankle Stirrup Air One Size', '1700.00', 2),
(264, 'Knee Immobilizer Black Eco 21\" -Small', '1500.00', 2),
(265, 'Hot Water Bag 1000ML', '150.00', 2),
(266, 'Knee Immobilizer Blue 18\" -Medium', '2000.00', 2),
(267, 'Knee Immobilizer Blue 21\" -Large', '2000.00', 2),
(268, 'Knee Immobilizer Eco Medium', '1500.00', 2),
(269, 'Hinged Knee Brace Medium', '1650.00', 2),
(270, 'Adjustable Shoulder Support (NS-102) -Large', '850.00', 2),
(271, 'Elastic Ankle Medium', '400.00', 2),
(272, 'Lumbar Starleaf -Large', '1300.00', 2),
(273, 'Clavicle Brace OH-102 -Large', '1500.00', 2),
(274, 'Neoprene Knee Support NS-701 -Large', '600.00', 2),
(275, 'Thumb Splint Blue -Small', '750.00', 2),
(276, 'Ice Cupp 8inch', '150.00', 2),
(277, 'Thumb Splint Blue -Small [DUPLICATE]', '300.00', 2),
(278, 'Knee Patella (NS-703) -Large', '750.00', 2),
(279, 'Hinged Knee Brace (NS-704) -Extra Large', '1650.00', 2),
(280, 'Micropore (1/2)\"', '20.00', 2),
(281, 'Skin Traction Medium', '1300.00', 2),
(282, 'Dr. S Ortho Hinged Knee Brace Medium', '1500.00', 2),
(283, 'Heel Cup -Medium', '500.00', 2),
(284, 'Elastic Calf ES-801 -Large', '400.00', 2),
(285, 'Wooden Crutch set M', '750.00', 2),
(286, 'Elastic Knee Support (ES-701) -Extra Large', '400.00', 2),
(287, 'Lumbar Support (NB-504) -Extra Extra Large', '1800.00', 2),
(288, 'Lumbar Support (NB-504) -Extra Large', '1800.00', 2),
(289, 'Knee Immobilizer Black Eco 21\" -Medium', '1500.00', 2),
(290, 'Medical Compression Stockings Thigh High 20-30mmHg -Extra Large', '1600.00', 2),
(291, 'Wooden Crutch set L', '750.00', 2),
(292, 'Clavicle Splint -Small Infant', '500.00', 2),
(293, 'Wrist Splint Left -Small', '500.00', 2),
(294, 'MTI Digital Arm BP Economy', '1900.00', 2),
(295, 'Umbrella Cane Large', '400.00', 2),
(296, 'Allen and Irving Aneroid BP with Stethoscope', '1400.00', 2),
(297, 'Aluminum Crutches Medium', '1500.00', 2),
(298, 'Wrist Splint Right -Medium', '500.00', 2),
(299, 'DM Shoe (Not Pair) Size 5', '350.00', 2),
(300, 'Silicon Heel Cup -Large', '500.00', 2),
(301, 'Roll Gauze 4\"', '40.00', 2),
(302, 'Fiberglass Prime Cast 4\" Blue', '375.00', 2),
(303, 'Wrist Splint Right -Small', '500.00', 2),
(304, 'Clavicle Brace OH-102 -Extra Large', '1600.00', 2),
(305, 'Non-stick', '50.00', 2),
(306, 'Micropore 1\"', '20.00', 2),
(307, 'Prime Walker', '2200.00', 2),
(308, 'Longbone Wrist Splint Left -Medium', '500.00', 2),
(309, 'Longbone Wrist Splint Right -Large', '500.00', 2),
(310, 'DM Shoe (Not Pair) Size 11', '350.00', 2),
(311, 'Lumbar Support (NB-504) -Medium', '1800.00', 2),
(312, 'Stockinette for closed reduction', '350.00', 2),
(313, 'Local Aluminum Walker', '1600.00', 2),
(314, 'Rib Belt (EB-502) -Large', '800.00', 2),
(315, 'DM Shoe (Not Pair) Size 6', '350.00', 2),
(316, 'DM Shoe (Not Pair) Size 7', '350.00', 2),
(317, 'Single Cane', '500.00', 2),
(318, 'Neoprene Knee Support Lycra (NS-707)', '800.00', 2),
(319, 'Prime ThomasCollarBlue -Large', '500.00', 2),
(320, 'Hinged Knee Brace -Small', '1650.00', 2),
(321, 'Medical Compression Stockings Thigh High 20-30mmHg Small', '1600.00', 2),
(322, 'Clavicle Splint -Medium', '500.00', 2),
(323, 'Hot Moist Pack 00-093 Spinal 10\"x18\"', '930.00', 2),
(324, 'Elastic Knee Support (ES-701) -Small', '400.00', 2),
(325, 'Knee Immobilizer Eco Large', '1500.00', 2),
(326, 'Prime Wrist Splint Left -Medium', '500.00', 2),
(327, 'Rubber Tip Crutches', '30.00', 2),
(328, 'Plaster of Paris 2\"', '100.00', 2),
(329, 'Prime Wrist Splint Right -Large', '500.00', 2),
(330, 'Neoprene Knee Support NS-701 -Medium', '600.00', 2),
(331, 'Elastic Knee Support (ES-701) -Large', '400.00', 2),
(332, 'Lumbar (WB-577) -L/XL', '2100.00', 2),
(333, 'Prime Fiberglass Splint 3\"', '600.00', 2),
(334, 'Fiberglass Prime Cast 5\" Blue', '425.00', 2),
(335, 'Elastic Ankle Support (ES-901) -Large', '400.00', 2),
(336, 'Stockinette 5\"', '75.00', 2),
(337, 'Roll Gauze 5\"', '75.00', 2),
(338, 'Arm Sling Kiddie -Extra Large', '200.00', 2),
(339, 'AA Battery Eveready', '39.00', 2),
(340, 'Prime ThomasCollarBlue -Small', '500.00', 2),
(341, 'Splint Orange', '200.00', 2),
(342, 'Prime Wrist Splint Left -Small', '500.00', 2),
(343, 'Wooden Crutch', '750.00', 2),
(344, 'Wrist Splint Left -Medium', '500.00', 2),
(345, 'Knee Immobilizer Black Eco 21\" -Large', '1500.00', 2),
(346, 'Wadding Sheet 3\"x4 Polyester', '60.00', 2),
(347, 'Wrist Splint Kiddie Left -Small', '500.00', 2),
(348, 'Plaster of Paris 4\"', '350.00', 2),
(349, 'Medical Compression Stockings Thigh High 20-30mmHg Large', '1600.00', 2),
(350, 'Arm Sling Blue -Small', '250.00', 2),
(351, 'Fiberglass Prime Cast 3\" Blue', '325.00', 2),
(352, 'Stockinette 3\"', '180.00', 2),
(353, 'Prime ThomasCollarBlue -Medium', '500.00', 2),
(354, 'Elastic Ankle Support (ES-901) -Extra Large', '400.00', 2),
(355, 'Sling and Swathe Original -Medium', '380.00', 2),
(356, 'DM Shoe (Not Pair) Size 9', '350.00', 2),
(357, 'Neoprene Knee Support NS-701 -Extra Large', '600.00', 2),
(358, 'Elastic Knee Support (ES-701) -Medium', '400.00', 2),
(359, 'Prime Wrist Splint Left -Large', '500.00', 2),
(360, 'Prime Wrist Splint Right -Small', '500.00', 2),
(361, 'Medical Compression Stockings Thigh High 20-30mmHg Medium', '1600.00', 2),
(362, 'Fiberglass Prime Cast 2\" Blue', '235.00', 2),
(363, 'Arm Sling Blue -Medium', '250.00', 2),
(364, 'Lumbar Support (NB-504) -Large', '1800.00', 2),
(365, 'Clavicle Splint -Large', '500.00', 2),
(366, 'Ankle Lycra (NS-903)', '700.00', 2),
(367, 'Arm Sling Kiddie -Small', '200.00', 2),
(368, 'Lumbar Starleaf -Extra Extra Large', '1300.00', 2),
(369, 'Fiberglass Splint 2\"', '350.00', 2),
(370, 'Gauze', '25.00', 2),
(371, 'Stockinette 2\"', '30.00', 2),
(372, 'Elastic Band 3\"', '50.00', 2),
(373, 'Wheelchair', '4600.00', 2),
(374, 'Commode Chair US', '3000.00', 2),
(375, 'Starleaf Thumb Splint', '800.00', 2),
(376, 'Fiberglass Splint 4\"', '600.00', 2),
(377, 'Elastic Band 4\"', '60.00', 2),
(378, 'Fiberglass Splint 5\"', '800.00', 2),
(379, 'Elastic Band 6\"', '100.00', 2),
(380, 'Wadding Sheet 5\"x4 Polyester', '60.00', 2),
(381, 'Elastic Ankle Support (ES-901) -Medium', '400.00', 2),
(382, 'Elastic Ankle Support (ES-901) -Small', '400.00', 2),
(383, 'Stockinette 4\"', '180.00', 2),
(384, 'Knee Immobilizer 21\" -Large', '1500.00', 2),
(385, 'Fiberglass Prime Cast 4\" Blue [DUPLICATE]', '375.00', 2),
(386, 'Wadding Sheet 4\"x4 Polyester', '60.00', 2),
(387, 'Squeeze Ball', '40.00', 2),
(388, 'Umbrella Cane Big', '450.00', 2),
(389, 'Quad Cane', '750.00', 2),
(390, 'Medical Compression Stocking Dr. S Ortho Large', '1400.00', 2),
(391, 'Arm Sling Kiddie -Large', '200.00', 2),
(392, 'Plaster of Paris 6\"', '350.00', 2),
(393, 'Wadding Sheet 2\"x4 Polyester', '50.00', 2),
(394, 'Arm Sling Blue -Large', '250.00', 2),
(395, 'Aircast Black', '8500.00', 2),
(396, 'Aircast', '7500.00', 2),
(397, 'Splint Violet', '200.00', 2),
(398, 'Roll Gauze 2\"', '20.00', 2),
(399, 'Medical Compression Stockings LYCRA JINNI', '1600.00', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
