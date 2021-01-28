-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 05:04 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifix`
--

-- --------------------------------------------------------

--
-- Table structure for table `complainer`
--

CREATE TABLE `complainer` (
  `complainer_id` int(255) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainer`
--

INSERT INTO `complainer` (`complainer_id`, `NIC`, `Name`, `phone_no`) VALUES
(1, '982171750v', 'Lakshan Sandaruwan Jayasinghe', '0701549225'),
(2, '862171670v', 'Mr. Perera', '0714570342'),
(3, '22222222222', 'Lakshan Sandaruwan Jayasinghe', '0701549225'),
(4, '982175745v', 'Lakshan Sandaruwan Jayasinghe', '+94701549225'),
(5, '652175745v', 'Kumara perera', '+94701549225'),
(6, '982171777v', 'Lakshan Sandaruwan Jayasinghe', '+94701549225');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(255) NOT NULL,
  `is_bulb_there` tinyint(1) NOT NULL,
  `Notes` varchar(500) NOT NULL,
  `lp_id` int(255) NOT NULL,
  `repair_id` int(255) NOT NULL,
  `complainer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `is_bulb_there`, `Notes`, `lp_id`, `repair_id`, `complainer_id`) VALUES
(29, 0, 'bla bla', 1000, 40, 4),
(30, 0, '', 1002, 41, 4),
(31, 0, 'bla bla', 1004, 42, 4),
(32, 1, '', 1005, 44, 5),
(33, 0, '', 1002, 48, 4),
(34, 1, '', 1003, 49, 4),
(40, 0, 'sdvvx', 1002, 56, 6);

-- --------------------------------------------------------

--
-- Table structure for table `fraud`
--

CREATE TABLE `fraud` (
  `Fraud_id` int(255) NOT NULL,
  `doneBy` int(255) NOT NULL,
  `description` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fraud_item`
--

CREATE TABLE `fraud_item` (
  `Fraud_item_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `difference` int(255) NOT NULL,
  `type` char(1) NOT NULL,
  `fraud_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fraud_repair_asc`
--

CREATE TABLE `fraud_repair_asc` (
  `fraud_id` int(255) NOT NULL,
  `repair_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_id`, `name`, `total`) VALUES
(1, 'Bulb', 100),
(2, 'Sunbox', 50),
(3, 'Wire(m)', 100),
(4, 'Switch', 30),
(5, 'Holder', 50),
(6, 'Screw Holder', 30),
(7, '3 Pin Holder', 30),
(8, 'Lamp Shade', 50),
(9, 'Chalk box', 10),
(10, 'CFL', 50);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_lamppost_asc`
--

CREATE TABLE `inventory_lamppost_asc` (
  `Item_id` int(255) NOT NULL,
  `lamppost_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest`
--

CREATE TABLE `itemrequest` (
  `Itemrequest_id` int(255) NOT NULL,
  `status` char(1) NOT NULL,
  `completed_by` int(255) NOT NULL,
  `created_by` int(255) NOT NULL,
  `added_date` date NOT NULL,
  `supplied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemrequest`
--

INSERT INTO `itemrequest` (`Itemrequest_id`, `status`, `completed_by`, `created_by`, `added_date`, `supplied_date`) VALUES
(56, 'a', 0, 32, '2020-12-26', '0000-00-00'),
(57, 'b', 0, 32, '2020-12-26', '0000-00-00'),
(58, 'a', 0, 33, '2020-12-26', '0000-00-00'),
(59, 'b', 0, 32, '2020-12-31', '0000-00-00'),
(60, 'a', 0, 32, '2020-12-31', '0000-00-00'),
(61, 'a', 0, 32, '2020-12-31', '0000-00-00'),
(62, 'a', 0, 32, '2121-01-07', '0000-00-00'),
(63, 'a', 0, 32, '2121-01-08', '0000-00-00'),
(64, 'a', 0, 33, '2121-01-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest_inventory_asc`
--

CREATE TABLE `itemrequest_inventory_asc` (
  `Itemrequest_id` int(255) NOT NULL,
  `Item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemrequest_inventory_asc`
--

INSERT INTO `itemrequest_inventory_asc` (`Itemrequest_id`, `Item_id`, `quantity`) VALUES
(56, 1, 1),
(56, 3, 5),
(57, 3, 34),
(57, 5, 3),
(58, 1, 44),
(59, 3, 23),
(59, 5, 33),
(60, 8, 56),
(60, 10, 5),
(61, 3, 3),
(61, 5, 45),
(62, 1, 10),
(62, 5, 3),
(62, 7, 5),
(63, 1, 6),
(63, 3, 13),
(63, 8, 4),
(63, 10, 5),
(64, 1, 30),
(64, 2, 10),
(64, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest_tmpinventory_asc`
--

CREATE TABLE `itemrequest_tmpinventory_asc` (
  `tmp_inventory_id` int(255) NOT NULL,
  `Itemrequest_id` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lamppost`
--

CREATE TABLE `lamppost` (
  `lp_id` int(255) NOT NULL,
  `division` varchar(100) NOT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamppost`
--

INSERT INTO `lamppost` (`lp_id`, `division`, `lattitude`, `longitude`, `date`) VALUES
(1000, 'Udugama Road,Baddegama', 6.887286, 79.86136, '0000-00-00'),
(1001, ' NM Perera Rd ,Gonaduwa', 6.890779, 79.858037, '0000-00-00'),
(1002, 'Gilagiriya avenue,colombo 4', 6.891551, 79.85477, '0000-00-00'),
(1003, 'Peterson Rd,Pamankada', 6.881167433870161, 79.864157036964, '0000-00-00'),
(1004, 'Castle Lane,MIlagiriya', 6.881570466305064, 79.85680047538261, '0000-00-00'),
(1005, 'Amarasekara Rd, Havlock Town', 6.883686767848502, 79.86359102010118, '0000-00-00'),
(1236, 'Hospital Bus Stop, Waskaduwa - Bandaragama Rd, Maha Gonaduwa, Sri Lanka', 6.6709491532289045, 79.97143849211528, '0000-00-00'),
(1400, 'Hospital Bus Stop, Waskaduwa - Bandaragama Rd, Maha Gonaduwa, Sri Lanka', 6.6709491532289045, 79.97143849211528, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `newlamppostrecord`
--

CREATE TABLE `newlamppostrecord` (
  `Lp_record_id` int(255) NOT NULL,
  `date` int(11) NOT NULL,
  `auth_by` varchar(30) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `lp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subject`, `body`, `status`) VALUES
(1, 'test 1', 'this is body', 1),
(2, 'wq', 'z', 1),
(3, 'wq', 'l', 1),
(4, 'qqqqqqqqq', 'o', 1),
(5, '12', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `repair_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` char(1) NOT NULL,
  `lp_id` int(255) NOT NULL,
  `technician_id` int(255) NOT NULL,
  `clerk_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`repair_id`, `date`, `status`, `lp_id`, `technician_id`, `clerk_id`) VALUES
(40, '2020-11-29', 'a', 1000, 35, 0),
(41, '2020-11-29', 'c', 1002, 0, 0),
(42, '2020-11-30', 'c', 1004, 0, 0),
(43, '2020-11-30', 'c', 1001, 0, 0),
(44, '2020-12-27', 'c', 1005, 0, 0),
(45, '2020-11-29', 'a', 1004, 0, 0),
(46, '2020-11-30', 'a', 1004, 0, 0),
(47, '2020-11-17', 'c', 1005, 0, 0),
(48, '2020-11-29', 'a', 1002, 0, 0),
(49, '2020-12-01', 'a', 1003, 0, 0),
(50, '2020-12-01', 'e', 1005, 0, 0),
(56, '2121-01-23', 'a', 1002, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `repair_inventory_asc`
--

CREATE TABLE `repair_inventory_asc` (
  `id` int(255) NOT NULL,
  `repair_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `damage_used_flag` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair_inventory_asc`
--

INSERT INTO `repair_inventory_asc` (`id`, `repair_id`, `item_id`, `quantity`, `damage_used_flag`) VALUES
(87, 41, 1, 1, '0'),
(88, 41, 4, 2, '0'),
(89, 41, 1, 1, '1'),
(90, 41, 4, 1, '1'),
(91, 43, 1, 10, '0'),
(92, 43, 4, 4, '0'),
(93, 43, 1, 5, '1'),
(94, 43, 4, 3, '1'),
(95, 43, 1, 3, '0'),
(96, 43, 2, 5, '0'),
(97, 43, 3, 5, '0'),
(98, 43, 4, 1, '0'),
(99, 43, 5, 2, '0'),
(100, 43, 7, 3, '0'),
(101, 43, 1, 2, '1'),
(102, 43, 2, 2, '1'),
(103, 43, 3, 5, '1'),
(104, 47, 1, 1, '0'),
(105, 47, 2, 3, '0'),
(106, 47, 7, 1, '0'),
(107, 47, 9, 2, '0'),
(108, 47, 10, 1, '0'),
(109, 47, 1, 1, '1'),
(110, 47, 2, 2, '1'),
(111, 47, 7, 1, '1'),
(112, 47, 9, 2, '1'),
(113, 47, 10, 1, '1'),
(114, 44, 1, 1, '0'),
(115, 44, 2, 3, '0'),
(116, 44, 4, 5, '0'),
(117, 44, 1, 1, '1'),
(118, 44, 4, 2, '1'),
(119, 50, 1, 3, '0'),
(120, 50, 4, 3, '0'),
(121, 50, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(255) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `startdate`, `enddate`, `is_active`, `user_id`) VALUES
(3, 1, '2020-12-26', '2020-12-26', 1, 30),
(4, 2, '2020-12-26', '2020-12-26', 1, 31),
(5, 3, '2020-12-26', '2020-12-26', 1, 32),
(6, 4, '2020-12-26', '2020-12-26', 1, 33),
(7, 2, '2020-12-26', '2020-12-26', 1, 30),
(8, 5, '2020-12-26', '2020-12-26', 1, 30),
(9, 4, '2121-01-23', '2021-01-23', 1, 36),
(10, 4, '2121-01-23', '2021-01-23', 1, 37),
(11, 2, '2121-01-27', '2021-01-27', 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `section_points`
--

CREATE TABLE `section_points` (
  `point_id` int(255) NOT NULL,
  `section_id` int(255) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_points`
--

INSERT INTO `section_points` (`point_id`, `section_id`, `lng`, `lat`) VALUES
(253, 55, 79.87600423851075, 6.8975350210569815),
(254, 55, 79.85334493675231, 6.893061501727445),
(255, 55, 79.85780813255269, 6.874229652918288),
(256, 55, 79.87669088401759, 6.878532924038836),
(257, 55, 79.87600423851075, 6.8975350210569815),
(258, 56, 79.87603137715644, 6.89767032030521),
(259, 56, 79.87642446460643, 6.878157800114906),
(260, 56, 79.85787073692143, 6.874255199812083),
(261, 56, 79.85975755668608, 6.860283628128101),
(262, 56, 79.89065423033117, 6.867854865948402),
(263, 56, 79.88758814821358, 6.906099480519174),
(264, 56, 79.87453764484172, 6.906489715782158),
(265, 56, 79.87603137715644, 6.89767032030521),
(266, 57, 79.84627944927757, 6.917902351918542),
(267, 57, 79.88734280340316, 6.92185237443573),
(268, 57, 79.88710406297213, 6.905578069391879),
(269, 57, 79.8762811634353, 6.897045685679899),
(270, 57, 79.85336208206354, 6.8925424211874855),
(271, 57, 79.84627944927757, 6.917902351918542),
(272, 58, 79.8867769448537, 6.921961588669603),
(273, 58, 79.89044059307582, 6.86834294681627),
(274, 58, 79.85912230989084, 6.860598834903527),
(275, 58, 79.88145874582216, 6.847105005763439),
(276, 58, 79.91502249082072, 6.857900099639863),
(277, 58, 79.9069861011734, 6.933341568669576),
(278, 58, 79.86897070444496, 6.937445169559211),
(279, 58, 79.86914839944973, 6.919893636513947),
(280, 58, 79.8867769448537, 6.921961588669603);

-- --------------------------------------------------------

--
-- Table structure for table `stock_addition`
--

CREATE TABLE `stock_addition` (
  `sa_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` char(1) NOT NULL,
  `clerk_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_addition`
--

INSERT INTO `stock_addition` (`sa_id`, `date`, `status`, `clerk_id`) VALUES
(26, '2020-12-30', '1', 31),
(27, '2020-12-30', '1', 31),
(28, '2020-12-31', '1', 31),
(29, '2020-12-31', '1', 31),
(30, '2020-12-31', '1', 31),
(31, '2020-12-31', '1', 31),
(32, '2020-12-31', '1', 31);

-- --------------------------------------------------------

--
-- Table structure for table `stock_addition_inventory_asc`
--

CREATE TABLE `stock_addition_inventory_asc` (
  `sa_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_addition_inventory_asc`
--

INSERT INTO `stock_addition_inventory_asc` (`sa_id`, `item_id`, `quantity`) VALUES
(26, 1, 3),
(26, 7, 2),
(26, 3, 10),
(27, 5, 34),
(27, 7, 3),
(27, 9, 5),
(27, 2, 4),
(27, 10, 20),
(28, 1, 45),
(28, 7, 3),
(28, 10, 20),
(29, 4, 45),
(30, 3, 100),
(31, 8, 5),
(31, 10, 10),
(32, 2, 50),
(32, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tech_sections`
--

CREATE TABLE `tech_sections` (
  `section_id` int(255) NOT NULL,
  `tech_id` int(255) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_sections`
--

INSERT INTO `tech_sections` (`section_id`, `tech_id`, `color`) VALUES
(55, 33, '#fa0000'),
(56, 35, '#2bff00'),
(57, 36, '#000000'),
(58, 37, '#3f3da9');

-- --------------------------------------------------------

--
-- Table structure for table `tmpinventory`
--

CREATE TABLE `tmpinventory` (
  `tmp_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL DEFAULT 0,
  `tecnician_id` int(255) NOT NULL,
  `Item_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpinventory`
--

INSERT INTO `tmpinventory` (`tmp_id`, `quantity`, `tecnician_id`, `Item_id`) VALUES
(8, 30, 33, 1),
(9, 0, 33, 2),
(10, 0, 33, 3),
(11, 0, 33, 4),
(12, 0, 33, 5),
(13, 0, 33, 6),
(14, 0, 33, 7),
(15, 0, 33, 8),
(16, 0, 33, 9),
(17, 0, 33, 10),
(18, 0, 35, 1),
(19, 0, 35, 2),
(20, 0, 35, 3),
(21, 0, 35, 4),
(22, 0, 35, 5),
(23, 0, 35, 6),
(24, 0, 35, 7),
(25, 0, 35, 8),
(26, 0, 35, 9),
(27, 0, 35, 10),
(28, 0, 36, 1),
(29, 0, 36, 2),
(30, 0, 36, 3),
(31, 0, 36, 4),
(32, 0, 36, 5),
(33, 0, 36, 6),
(34, 0, 36, 7),
(35, 0, 36, 8),
(36, 0, 36, 9),
(37, 0, 36, 10),
(38, 0, 37, 1),
(39, 0, 37, 2),
(40, 0, 37, 3),
(41, 0, 37, 4),
(42, 0, 37, 5),
(43, 0, 37, 6),
(44, 0, 37, 7),
(45, 0, 37, 8),
(46, 0, 37, 9),
(47, 0, 37, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `occuFlag` int(11) NOT NULL,
  `statusFlag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `Name`, `phone`, `occuFlag`, `statusFlag`) VALUES
(0, 'default', 'default', 'default', '', 1, 0),
(30, 'DS', '81dc9bdb52d04dc20036dbd8313ed055', 'Bappa', '+947015492', 1, 1),
(31, 'Clerck', '81dc9bdb52d04dc20036dbd8313ed055', 'Lakshan Jayasinghe', '+947015492', 2, 1),
(32, 'Storekeeper', '81dc9bdb52d04dc20036dbd8313ed055', 'xxxxx', '+947015492', 3, 1),
(33, 'Tech', '81dc9bdb52d04dc20036dbd8313ed055', 'Maldeniya', '+947015492', 4, 1),
(35, 'Isuru', '81dc9bdb52d04dc20036dbd8313ed055', 'Isuru', '+947015492', 4, 1),
(36, 'Tech3', '81dc9bdb52d04dc20036dbd8313ed055', 'Lakshan Sandaruwan Jayasinghe', '+947015492', 4, 1),
(37, 'Tech4', '81dc9bdb52d04dc20036dbd8313ed055', 'ayasinghe', '+947015492', 4, 1),
(38, 'ckck', '81dc9bdb52d04dc20036dbd8313ed055', 'an Jayasinghe', '+947015492', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complainer`
--
ALTER TABLE `complainer`
  ADD PRIMARY KEY (`complainer_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD UNIQUE KEY `repair_id` (`repair_id`),
  ADD KEY `complaint_ibfk_2` (`complainer_id`);

--
-- Indexes for table `fraud`
--
ALTER TABLE `fraud`
  ADD PRIMARY KEY (`Fraud_id`),
  ADD KEY `doneBy` (`doneBy`);

--
-- Indexes for table `fraud_item`
--
ALTER TABLE `fraud_item`
  ADD PRIMARY KEY (`Fraud_item_id`),
  ADD KEY `fraud_id` (`fraud_id`),
  ADD KEY `item_ibfk_1` (`item_id`) USING BTREE;

--
-- Indexes for table `fraud_repair_asc`
--
ALTER TABLE `fraud_repair_asc`
  ADD PRIMARY KEY (`fraud_id`,`repair_id`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `inventory_lamppost_asc`
--
ALTER TABLE `inventory_lamppost_asc`
  ADD PRIMARY KEY (`Item_id`,`lamppost_id`),
  ADD KEY `inventory_lamppost_asc_ibfk_2` (`lamppost_id`);

--
-- Indexes for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD PRIMARY KEY (`Itemrequest_id`),
  ADD KEY `completed_by` (`completed_by`),
  ADD KEY `created_by` (`created_by`) USING BTREE;

--
-- Indexes for table `itemrequest_inventory_asc`
--
ALTER TABLE `itemrequest_inventory_asc`
  ADD PRIMARY KEY (`Itemrequest_id`,`Item_id`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `itemrequest_tmpinventory_asc`
--
ALTER TABLE `itemrequest_tmpinventory_asc`
  ADD PRIMARY KEY (`tmp_inventory_id`,`Itemrequest_id`),
  ADD KEY `itemrequest_tmpinventory_asc_ibfk_1` (`Itemrequest_id`);

--
-- Indexes for table `lamppost`
--
ALTER TABLE `lamppost`
  ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  ADD PRIMARY KEY (`Lp_record_id`),
  ADD KEY `lp_id` (`lp_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `lp_id` (`lp_id`),
  ADD KEY `repair_tech` (`technician_id`),
  ADD KEY `repair_clk` (`clerk_id`);

--
-- Indexes for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `repair_inventory_asc_ibfk_2` (`repair_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `userrole` (`user_id`);

--
-- Indexes for table `section_points`
--
ALTER TABLE `section_points`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `section` (`section_id`);

--
-- Indexes for table `stock_addition`
--
ALTER TABLE `stock_addition`
  ADD PRIMARY KEY (`sa_id`),
  ADD KEY `stock_addition_ibfk_1` (`clerk_id`);

--
-- Indexes for table `stock_addition_inventory_asc`
--
ALTER TABLE `stock_addition_inventory_asc`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `stock_addition_inventory_asc_ibfk_2` (`sa_id`);

--
-- Indexes for table `tech_sections`
--
ALTER TABLE `tech_sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `tech` (`tech_id`);

--
-- Indexes for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  ADD PRIMARY KEY (`tmp_id`),
  ADD KEY `item_id` (`Item_id`),
  ADD KEY `techcdcdc` (`tecnician_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complainer`
--
ALTER TABLE `complainer`
  MODIFY `complainer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fraud`
--
ALTER TABLE `fraud`
  MODIFY `Fraud_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fraud_item`
--
ALTER TABLE `fraud_item`
  MODIFY `Fraud_item_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `Itemrequest_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  MODIFY `Lp_record_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `section_points`
--
ALTER TABLE `section_points`
  MODIFY `point_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `stock_addition`
--
ALTER TABLE `stock_addition`
  MODIFY `sa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tech_sections`
--
ALTER TABLE `tech_sections`
  MODIFY `section_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  MODIFY `tmp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`complainer_id`) REFERENCES `complainer` (`complainer_id`) ON DELETE CASCADE;

--
-- Constraints for table `fraud`
--
ALTER TABLE `fraud`
  ADD CONSTRAINT `fraud_ibfk_1` FOREIGN KEY (`doneBy`) REFERENCES `user` (`userId`);

--
-- Constraints for table `fraud_item`
--
ALTER TABLE `fraud_item`
  ADD CONSTRAINT `fraud_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`);

--
-- Constraints for table `fraud_repair_asc`
--
ALTER TABLE `fraud_repair_asc`
  ADD CONSTRAINT `fraud_repair_asc_ibfk_1` FOREIGN KEY (`fraud_id`) REFERENCES `fraud` (`Fraud_id`),
  ADD CONSTRAINT `fraud_repair_asc_ibfk_2` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`);

--
-- Constraints for table `inventory_lamppost_asc`
--
ALTER TABLE `inventory_lamppost_asc`
  ADD CONSTRAINT `inventory_lamppost_asc_ibfk_1` FOREIGN KEY (`Item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `inventory_lamppost_asc_ibfk_2` FOREIGN KEY (`lamppost_id`) REFERENCES `lamppost` (`lp_id`) ON DELETE CASCADE;

--
-- Constraints for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD CONSTRAINT `itemrequest_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `itemrequest_inventory_asc`
--
ALTER TABLE `itemrequest_inventory_asc`
  ADD CONSTRAINT `itemrequest_inventory_asc_ibfk_1` FOREIGN KEY (`Itemrequest_id`) REFERENCES `itemrequest` (`Itemrequest_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemrequest_inventory_asc_ibfk_2` FOREIGN KEY (`Item_id`) REFERENCES `inventory` (`Item_id`);

--
-- Constraints for table `itemrequest_tmpinventory_asc`
--
ALTER TABLE `itemrequest_tmpinventory_asc`
  ADD CONSTRAINT `itemrequest_tmpinventory_asc_ibfk_1` FOREIGN KEY (`Itemrequest_id`) REFERENCES `itemrequest` (`Itemrequest_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `itemrequest_tmpinventory_asc_ibfk_2` FOREIGN KEY (`tmp_inventory_id`) REFERENCES `tmpinventory` (`tmp_id`);

--
-- Constraints for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  ADD CONSTRAINT `newlamppostrecord_ibfk_1` FOREIGN KEY (`lp_id`) REFERENCES `lamppost` (`lp_id`);

--
-- Constraints for table `repair`
--
ALTER TABLE `repair`
  ADD CONSTRAINT `repair_clk` FOREIGN KEY (`clerk_id`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `repair_ibfk_1` FOREIGN KEY (`lp_id`) REFERENCES `lamppost` (`lp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `repair_tech` FOREIGN KEY (`technician_id`) REFERENCES `user` (`userId`);

--
-- Constraints for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  ADD CONSTRAINT `repair_inventory_asc_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `repair_inventory_asc_ibfk_2` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `userrole` FOREIGN KEY (`user_id`) REFERENCES `user` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `section_points`
--
ALTER TABLE `section_points`
  ADD CONSTRAINT `section` FOREIGN KEY (`section_id`) REFERENCES `tech_sections` (`section_id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_addition`
--
ALTER TABLE `stock_addition`
  ADD CONSTRAINT `stock_addition_ibfk_1` FOREIGN KEY (`clerk_id`) REFERENCES `user` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `stock_addition_inventory_asc`
--
ALTER TABLE `stock_addition_inventory_asc`
  ADD CONSTRAINT `stock_addition_inventory_asc_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `stock_addition_inventory_asc_ibfk_2` FOREIGN KEY (`sa_id`) REFERENCES `stock_addition` (`sa_id`) ON DELETE CASCADE;

--
-- Constraints for table `tech_sections`
--
ALTER TABLE `tech_sections`
  ADD CONSTRAINT `tech` FOREIGN KEY (`tech_id`) REFERENCES `user` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`Item_id`) REFERENCES `inventory` (`Item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `techcdcdc` FOREIGN KEY (`tecnician_id`) REFERENCES `user` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
