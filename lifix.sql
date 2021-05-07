-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 03:51 AM
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
(1, '982171750v', 'W.G.Y. AYESHMANTHA', '+94701549225'),
(2, '862171670v', 'Mr. Perera', '0714570342'),
(3, '22222222222', 'A.H.DODAMPE', '0701549225'),
(4, '982175745v', 'G.K.RAVISHANKA', '+94701549225'),
(5, '652175745v', 'Kumara perera', '+94701549225'),
(6, '982171777v', 'H.C. WALPITA', '+94701549225');

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
  `complainer_id` int(255) NOT NULL,
  `recorded_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `is_bulb_there`, `Notes`, `lp_id`, `repair_id`, `complainer_id`, `recorded_on`) VALUES
(29, 0, 'Not working', 1000, 40, 4, '2021-03-03'),
(30, 0, '', 1002, 41, 4, '2021-03-27'),
(31, 0, 'Not working since yersterday', 1004, 42, 4, '2021-03-01'),
(32, 1, '', 1005, 44, 5, '2021-03-09'),
(33, 0, 'sunbox not working', 1002, 48, 4, '2021-03-27'),
(34, 1, '', 1003, 49, 4, '2021-03-27'),
(40, 0, 'I think it\'s fuse problem', 1002, 56, 6, '2021-03-23'),
(41, 0, 'I think it\'s fuse problem', 1002, 57, 6, '2021-03-19'),
(51, 0, 'bulb is broken', 1002, 58, 6, '0000-00-00'),
(52, 0, '', 1004, 46, 6, '2021-03-02'),
(54, 1, '', 1000, 59, 1, '0000-00-00'),
(55, 1, 'bulb is not lighting', 1002, 60, 6, '0000-00-00'),
(56, 1, 'bulb is not lighting', 1000, 61, 1, '0000-00-00'),
(57, 0, 'bulb is not lighting', 1001, 62, 6, '2021-03-30'),
(58, 1, 'fuse is not there', 1002, 63, 1, '2021-03-30'),
(59, 0, 'bulb is not there', 1003, 64, 6, '2021-03-30'),
(60, 0, '', 1004, 65, 6, '2021-03-30'),
(61, 0, 'sunbox is not there', 1005, 66, 1, '2021-03-30'),
(62, 0, 'sunbox is not there', 1012, 67, 6, '2021-03-30'),
(63, 1, '', 3444, 68, 1, '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `fraud`
--

CREATE TABLE `fraud` (
  `Fraud_id` int(255) NOT NULL,
  `doneBy` int(255) NOT NULL,
  `added_by` int(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fraud`
--

INSERT INTO `fraud` (`Fraud_id`, `doneBy`, `added_by`, `description`, `date`, `type`) VALUES
(3, 33, 32, 'There is a mismatch in damaged repair items of Maldeniya(technician) on 2121-03-21. Added by - Storekeeper (Storekeeper)', '2021-03-21', 'a'),
(4, 35, 32, 'There is a mismatch in damaged repair items of Isuru(technician) on 2121-03-21. Added by - Storekeeper (Storekeeper)', '2021-03-21', 'a'),
(5, 36, 32, 'There is a mismatch in damaged repair items of Lakshan Sandaruwan Jayasinghe(technician) on 2121-03-21. Added by - Storekeeper (Storekeeper)', '2021-03-21', 'a'),
(16, 33, 0, 'There is a suspicious activity from Maldeniya(technician). Complainer claims that damaged bulb is on the lamppost but technician did not return the damaged bulb', '2021-03-22', 'b'),
(17, 33, 32, 'There is a mismatch in damaged repair items of Maldeniya(technician) on 2021-03-29. Added by - Storekeeper (Storekeeper)', '2021-03-29', 'a'),
(19, 35, 32, 'There is a mismatch in damaged repair items of Isuru(technician) on 2021-03-30. Added by - Storekeeper (Storekeeper)', '2021-03-30', 'a'),
(20, 33, 0, 'There is a suspicious activity from Tech (technician). Complainer claims that damaged bulb is on the lamppost but technician did not return the damaged bulb', '2021-03-30', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `fraud_item`
--

CREATE TABLE `fraud_item` (
  `Fraud_item_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `difference` int(255) NOT NULL,
  `fraud_id` int(255) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fraud_item`
--

INSERT INTO `fraud_item` (`Fraud_item_id`, `item_id`, `difference`, `fraud_id`, `notes`) VALUES
(4, 1, 45, 3, 'there is no bulb'),
(5, 2, 3, 3, 'lost it'),
(6, 1, 1, 4, 'sorry'),
(7, 1, 0, 5, ''),
(8, 1, 1, 17, ''),
(10, 1, 2, 19, '');

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
(1, 'Bulb', 173),
(2, 'Sunbox', 75),
(3, 'Wire(m)', 170),
(4, 'Switch', 46),
(5, 'Holder', 68),
(6, 'Screw Holder', 40),
(7, '3 Pin Holder', 29),
(8, 'Lamp Shade', 54),
(9, 'Chalk box', 10),
(10, 'CFL', 65);

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
(56, 'd', 32, 33, '2020-12-26', '2021-03-21'),
(57, 'a', 0, 36, '2020-12-26', '0000-00-00'),
(58, 'c', 32, 33, '2020-12-26', '2021-03-21'),
(59, 'b', 0, 32, '2020-12-31', '0000-00-00'),
(60, 'c', 0, 33, '2020-12-31', '0000-00-00'),
(61, 'c', 32, 33, '2020-12-31', '2021-03-21'),
(62, 'd', 32, 33, '2021-01-07', '2021-03-21'),
(63, 'c', 32, 36, '2021-01-08', '0000-00-00'),
(64, 'c', 32, 33, '2021-01-24', '2021-03-21'),
(65, 'b', 32, 36, '2021-02-08', '0000-00-00'),
(66, 'a', 32, 33, '2021-02-17', '0000-00-00'),
(67, 'd', 32, 33, '2021-03-16', '2021-03-21'),
(68, 'd', 32, 33, '2021-03-16', '2021-03-21'),
(70, 'd', 32, 33, '2021-03-21', '2021-03-21'),
(71, 'a', 0, 33, '2021-03-21', '0000-00-00'),
(72, 'd', 32, 44, '2021-03-30', '2021-03-30'),
(73, 'd', 32, 45, '2021-03-30', '2021-03-30'),
(74, 'b', 32, 45, '2021-03-30', '2021-03-30'),
(75, 'a', 0, 46, '2021-03-30', '0000-00-00'),
(76, 'd', 32, 46, '2021-03-30', '2021-03-30'),
(77, 'd', 32, 33, '2021-03-30', '2021-03-30'),
(78, 'd', 32, 47, '2021-03-30', '2021-03-30'),
(79, 'a', 0, 47, '2021-03-30', '0000-00-00');

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
(64, 5, 3),
(65, 1, 23),
(66, 1, 10000),
(66, 3, 7),
(67, 1, 10),
(67, 2, 9),
(67, 3, 8),
(67, 4, 7),
(67, 5, 6),
(68, 1, 10),
(68, 2, 9),
(68, 3, 8),
(68, 4, 7),
(68, 5, 6),
(70, 1, 10),
(70, 2, 3),
(71, 2, 34),
(71, 4, 3),
(71, 6, 2),
(72, 1, 10),
(72, 2, 5),
(72, 4, 4),
(73, 1, 100),
(73, 2, 10),
(74, 1, 100),
(74, 2, 10),
(75, 1, 100),
(75, 2, 50),
(76, 1, 50),
(76, 2, 20),
(77, 1, 50),
(77, 2, 5),
(78, 1, 50),
(78, 2, 5),
(79, 1, 50),
(79, 2, 5);

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
  `date` date NOT NULL,
  `added_by` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamppost`
--

INSERT INTO `lamppost` (`lp_id`, `division`, `lattitude`, `longitude`, `date`, `added_by`) VALUES
(1000, 'Udugama Road,Baddegama', 6.887286, 79.86136, '0000-00-00', 33),
(1001, ' NM Perera Rd ,Gonaduwa', 6.890779, 79.858037, '0000-00-00', 33),
(1002, 'Gilagiriya avenue,colombo 4', 6.891551, 79.85477, '0000-00-00', 33),
(1003, 'Peterson Rd,Pamankada', 6.881167433870161, 79.864157036964, '0000-00-00', 33),
(1004, 'Castle Lane,MIlagiriya', 6.881570466305064, 79.85680047538261, '0000-00-00', 33),
(1005, 'Amarasekara Rd, Havlock Town', 6.883686767848502, 79.86359102010118, '0000-00-00', 33),
(1012, '400 Ven Baddegama Wimalawansa Mawatha, Colombo 01000, Sri Lanka', 6.92, 79.865, '0000-00-00', 33),
(1223, 'Sunethradevi Rd, Nugegoda, Sri Lanka', 6.8602, 79.8924, '0000-00-00', 33),
(1236, 'Sunethradevi Rd, Nugegoda, Sri Lanka', 6.8602, 79.8924, '0000-00-00', 33),
(1400, 'Hospital Bus Stop, Waskaduwa - Bandaragama Rd, Maha Gonaduwa, Sri Lanka', 6.6709491532289045, 79.97143849211528, '0000-00-00', 33),
(3444, 'Sunethradevi Rd, K, Sri Lanka', 6.8602, 79.8924, '0000-00-00', 33);

-- --------------------------------------------------------

--
-- Table structure for table `newlamppostrecord`
--

CREATE TABLE `newlamppostrecord` (
  `Lp_record_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `auth_by` varchar(30) NOT NULL,
  `requested_by` varchar(30) NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `lp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newlamppostrecord`
--

INSERT INTO `newlamppostrecord` (`Lp_record_id`, `date`, `auth_by`, `requested_by`, `notes`, `lp_id`) VALUES
(1, '2021-03-10', 'Divitional sec', 'Mr . Perera', 'Bla Bla', 1000),
(5, '2021-03-15', 'Divitional sec', 'Mr . Somarathna', 'Bla Bla Bla', 1004),
(6, '2021-03-01', 'vsdv', 'bala', 'thdfdfhfh', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `status` int(1) NOT NULL,
  `from_user` int(255) NOT NULL,
  `to_user` int(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ref_id` varchar(20) NOT NULL DEFAULT '''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subject`, `body`, `status`, `from_user`, `to_user`, `type`, `ref_id`) VALUES
(2, 'Confirmation', 'confirm lamp post', 1, 0, 31, 'c-lp', '1009-33'),
(3, 'Confirmation', 'confirm this items', 1, 0, 33, 'c-supply', '64'),
(4, 'Confirmation', 'confirm lamp post', 1, 0, 31, 'c-lp', '1002-33'),
(5, '12', '453534', 1, 0, 31, 'norm', '0'),
(8, 'Stock Addition Rejection', 'Storekeeper declined stock addition.  ID - 41   Date - 2121-02-14', 0, 32, 31, 'norm', '41'),
(9, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 63', 1, 32, 33, 'c-supply', '63'),
(10, 'LampPost Denied - #1002', 'Lakshan Jayasinghe(Clerck) denied your lamppost adding - LPID : #1002', 0, 31, 33, 'norm', ''),
(12, 'LampPost Denied - #1009', 'Lakshan Jayasinghe(Clerck) denied your lamppost adding - LPID : #1009', 1, 31, 33, 'norm', ''),
(13, 'Item Supply Cancelled', 'Maldeniya cancelled your Item Supply - ID : 63', 0, 33, 32, 'norm', ''),
(14, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 67', 1, 32, 33, 'c-supply', '67'),
(16, 'New Lamppost cofirmation', 'Maldeniya has added new lamp post. - LPID : #1223', 0, 33, 2, 'c-lp', '1223-33'),
(17, 'Stock Addition Rejection', 'Storekeeper declined stock addition.  ID - 43   Date - 2121-03-18', 1, 32, 31, 'norm', '43'),
(18, 'New Lamppost cofirmation', 'Maldeniya has added new lamp post. - LPID : #3444', 0, 33, 2, 'c-lp', '3444-33'),
(19, 'Item Supply Confirmation', 'Storekeeper(32) issued these items,Confirm them - itemrequest id : 70', 1, 32, 33, 'c-supply', '70'),
(20, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 68', 1, 32, 33, 'c-supply', '68'),
(21, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 62', 1, 32, 33, 'c-supply', '62'),
(22, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 58', 1, 32, 33, 'c-supply', '58'),
(23, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 61', 1, 32, 33, 'c-supply', '61'),
(24, 'Item Supply Cancelled', 'Maldeniya cancelled your Item Supply - ID : 61', 1, 33, 32, 'norm', ''),
(25, 'Item Supply Cancelled', 'Maldeniya cancelled your Item Supply - ID : 58', 0, 33, 32, 'norm', ''),
(26, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 64', 1, 32, 33, 'c-supply', '64'),
(27, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 56', 1, 32, 33, 'c-supply', '56'),
(31, 'New accont activation', 'newtech (new Sandaruwan)have created a new account.Activate or reject it', 1, 44, 5, 'c-acc', '44'),
(32, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 72', 1, 32, 44, 'c-supply', '72'),
(33, 'New accont activation', 'newtech1 (bala)have created a new account.Activate or reject it', 1, 45, 5, 'c-acc', '45'),
(34, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 73', 1, 32, 45, 'c-supply', '73'),
(35, 'New accont activation', 'newtech2 (Lakshan Sandaruwan Jayasinghe)have created a new account.Activate or reject it', 1, 46, 5, 'c-acc', '46'),
(36, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 74', 0, 32, 45, 'c-supply', '74'),
(37, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 76', 1, 32, 46, 'c-supply', '76'),
(38, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 77', 1, 32, 33, 'c-supply', '77'),
(39, 'Item Supply Cancelled', 'Maldeniya cancelled your Item Supply - ID : 64', 0, 33, 32, 'norm', ''),
(40, 'Item Supply Cancelled', 'Maldeniya cancelled your Item Supply - ID : 64', 0, 33, 32, 'norm', ''),
(41, 'New accont activation', 'nimal123 (namal perera)have created a new account.Activate or reject it', 1, 47, 5, 'c-acc', '47'),
(42, 'Item Supply Confirmation', 'Storekeeper(32) supplied items,confirm it - itemrequest id : 78', 1, 32, 47, 'c-supply', '78'),
(43, 'New Lamppost cofirmation', 'Maldeniya has added new lamp post. - LPID : #1012', 1, 33, 2, 'c-lp', '1012-33');

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
  `clerk_id` int(255) NOT NULL,
  `complainer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`repair_id`, `date`, `status`, `lp_id`, `technician_id`, `clerk_id`, `complainer_id`) VALUES
(40, '2021-03-30', 'c', 1000, 45, 0, 0),
(41, '2020-11-29', 'c', 1002, 0, 0, 0),
(42, '2021-03-09', 'c', 1004, 0, 0, 0),
(43, '2020-11-30', 'c', 1001, 0, 0, 0),
(44, '2020-12-27', 'c', 1005, 0, 0, 0),
(46, '2021-03-30', 'c', 1004, 45, 0, 0),
(47, '2020-11-17', 'c', 1005, 0, 0, 0),
(48, '2021-03-30', 'c', 1002, 33, 0, 0),
(49, '2020-12-01', 'c', 1003, 33, 0, 0),
(50, '2021-03-18', 'c', 1005, 0, 0, 0),
(56, '2021-03-19', 'c', 1002, 33, 0, 0),
(57, '2021-03-19', 'c', 1002, 33, 0, 0),
(58, '2021-03-30', 'c', 1002, 45, 0, 6),
(59, '2021-03-30', 'c', 1000, 33, 0, 1),
(60, '2021-03-30', 'c', 1002, 46, 0, 6),
(61, '2021-03-30', 'c', 1000, 47, 0, 1),
(62, '2021-03-30', 'a', 1001, 33, 0, 6),
(63, '2021-03-30', 'a', 1002, 33, 0, 1),
(64, '2021-03-30', 'a', 1003, 35, 0, 6),
(65, '2021-03-30', 'a', 1004, 33, 0, 6),
(66, '2021-03-30', 'a', 1005, 33, 0, 1),
(67, '2021-03-30', 'a', 1012, 0, 0, 6),
(68, '2021-03-30', 'a', 3444, 0, 0, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `repair_history`
-- (See below for the actual view)
--
CREATE TABLE `repair_history` (
`repair_id` int(255)
,`lp_id` int(255)
,`division` varchar(100)
,`date` date
);

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
(121, 50, 1, 1, '1'),
(123, 56, 1, 2, '0'),
(124, 56, 2, 3, '0'),
(125, 56, 1, 2, '1'),
(126, 56, 2, 2, '1'),
(127, 57, 1, 4, '0'),
(128, 57, 2, 1, '0'),
(129, 57, 1, 3, '1'),
(130, 57, 2, 1, '1'),
(144, 49, 1, 1, '0'),
(145, 49, 2, 2, '0'),
(146, 49, 2, 2, '1'),
(147, 58, 1, 1, '0'),
(148, 58, 2, 1, '0'),
(149, 40, 1, 1, '0'),
(150, 40, 1, 1, '1'),
(151, 46, 1, 1, '0'),
(152, 46, 1, 1, '1'),
(153, 60, 1, 1, '0'),
(154, 60, 2, 1, '0'),
(155, 60, 1, 1, '1'),
(156, 60, 2, 1, '1'),
(157, 48, 1, 1, '0'),
(158, 48, 2, 1, '0'),
(159, 48, 1, 1, '1'),
(160, 48, 2, 1, '1'),
(161, 59, 1, 1, '0'),
(162, 61, 1, 1, '0'),
(163, 61, 1, 1, '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reqhistory_view`
-- (See below for the actual view)
--
CREATE TABLE `reqhistory_view` (
`Itemrequest_id` int(255)
,`Name` varchar(255)
,`supplied_date` date
,`added_date` date
,`status` char(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `returnitemcheck`
--

CREATE TABLE `returnitemcheck` (
  `tech_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnitemcheck`
--

INSERT INTO `returnitemcheck` (`tech_id`, `date`) VALUES
(33, '2121-03-21'),
(33, '2121-03-29'),
(35, '2021-03-30'),
(35, '2121-03-21'),
(36, '2121-03-21'),
(46, '2021-03-30'),
(47, '2021-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role` tinyint(4) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role`, `startdate`, `enddate`, `is_active`, `user_id`) VALUES
(1, '2121-03-23', '2021-03-23', 1, 0),
(1, '2020-12-26', '2020-12-26', 1, 30),
(2, '2020-12-26', '2020-12-26', 1, 30),
(2, '2020-12-26', '2020-12-26', 1, 31),
(2, '2121-01-27', '2021-01-27', 1, 38),
(2, '2021-03-31', '2021-03-31', 0, 40),
(2, '2121-03-24', '2021-03-24', 1, 41),
(3, '2121-03-23', '2021-03-23', 1, 0),
(3, '2020-12-26', '2020-12-26', 1, 32),
(3, '2121-03-23', '2121-03-23', 0, 36),
(4, '2020-12-26', '2020-12-26', 1, 33),
(4, '2121-03-23', '2121-03-23', 1, 36),
(4, '2121-01-23', '2021-01-23', 1, 37),
(4, '2021-03-30', '0000-00-00', 1, 44),
(4, '2021-03-30', '0000-00-00', 1, 45),
(4, '2021-03-30', '0000-00-00', 1, 46),
(4, '2021-03-30', '0000-00-00', 1, 47),
(5, '2121-03-23', '2021-03-23', 1, 0),
(5, '2020-12-26', '2121-03-27', 0, 30),
(5, '2121-03-23', '2021-03-23', 1, 40);

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
(320, 66, 79.85708035719188, 6.878864788072164),
(321, 66, 79.86223926307554, 6.880572041658638),
(322, 66, 79.87040753072336, 6.884911283557983),
(323, 66, 79.87671286013762, 6.888325741091876),
(324, 66, 79.87714276896122, 6.8859783041772005),
(325, 66, 79.87678451160775, 6.8782245663949055),
(326, 66, 79.87943561601975, 6.877655479734742),
(327, 66, 79.88280323513868, 6.872533669124621),
(328, 66, 79.8888936101398, 6.86983046905074),
(329, 66, 79.85930155278027, 6.861507361837383),
(330, 66, 79.85636384248494, 6.878864788072164),
(331, 66, 79.85708035719188, 6.878864788072164),
(332, 67, 79.85614888807311, 6.878793652373275),
(333, 67, 79.86227806971044, 6.880540565966328),
(334, 67, 79.86869943876167, 6.883961351301664),
(335, 67, 79.87656170038093, 6.888315042428346),
(336, 67, 79.87740811919747, 6.9100993719439),
(337, 67, 79.8476840174045, 6.912215988456168),
(338, 67, 79.85614888807311, 6.878793652373275),
(339, 68, 79.87728445364621, 6.90996520212326),
(340, 68, 79.87641584112782, 6.88840712881732),
(341, 68, 79.87708400460338, 6.885687425279983),
(342, 68, 79.87688355556065, 6.8781915763191535),
(343, 68, 79.87948939311713, 6.8775945567123244),
(344, 68, 79.8830974758875, 6.872486691632716),
(345, 68, 79.88911094717162, 6.869899570196694),
(346, 68, 79.89198405011808, 6.878788595175621),
(347, 68, 79.89559213288851, 6.892188154161815),
(348, 68, 79.90100425704424, 6.897362139966475),
(349, 68, 79.90220695130103, 6.903265721396664),
(350, 68, 79.88697282404797, 6.910960166414071),
(351, 68, 79.87728445364621, 6.90996520212326),
(352, 69, 79.87740827822597, 6.910036660651912),
(353, 69, 79.88721302334505, 6.910990147972797),
(354, 69, 79.9018200926044, 6.903560841730524),
(355, 69, 79.90590194284783, 6.909281798496977),
(356, 69, 79.90113963807443, 6.923266108688708),
(357, 69, 79.87768828852404, 6.922829105263858),
(358, 69, 79.87740827822597, 6.910036660651912);

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
(29, '2020-12-31', '1', 38),
(30, '2020-12-31', '1', 31),
(31, '2020-12-31', '1', 31),
(32, '2020-12-31', '1', 31),
(44, '2021-03-30', '1', 31);

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
(32, 1, 5),
(44, 1, 100),
(44, 2, 30);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock_addition_view`
-- (See below for the actual view)
--
CREATE TABLE `stock_addition_view` (
`sa_id` int(255)
,`date` date
,`status` char(1)
,`Name` varchar(255)
);

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
(66, 35, '#ff0000'),
(67, 33, '#3238ec'),
(68, 36, '#32ec9b'),
(69, 47, '#e4ff14');

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
(8, 77, 33, 1),
(9, 19, 33, 2),
(10, 21, 33, 3),
(11, 14, 33, 4),
(12, 15, 33, 5),
(13, 0, 33, 6),
(14, 5, 33, 7),
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
(28, 6, 36, 1),
(29, 0, 36, 2),
(30, 13, 36, 3),
(31, 0, 36, 4),
(32, 0, 36, 5),
(33, 0, 36, 6),
(34, 0, 36, 7),
(35, 4, 36, 8),
(36, 0, 36, 9),
(37, 5, 36, 10),
(38, 0, 37, 1),
(39, 0, 37, 2),
(40, 0, 37, 3),
(41, 0, 37, 4),
(42, 0, 37, 5),
(43, 0, 37, 6),
(44, 0, 37, 7),
(45, 0, 37, 8),
(46, 0, 37, 9),
(47, 0, 37, 10),
(48, 97, 45, 1),
(49, 9, 45, 2),
(50, 0, 45, 3),
(51, 0, 45, 4),
(52, 0, 45, 5),
(53, 0, 45, 6),
(54, 0, 45, 7),
(55, 0, 45, 8),
(56, 0, 45, 9),
(57, 0, 45, 10),
(58, 49, 46, 1),
(59, 19, 46, 2),
(60, 0, 46, 3),
(61, 0, 46, 4),
(62, 0, 46, 5),
(63, 0, 46, 6),
(64, 0, 46, 7),
(65, 0, 46, 8),
(66, 0, 46, 9),
(67, 0, 46, 10),
(68, 49, 47, 1),
(69, 5, 47, 2),
(70, 0, 47, 3),
(71, 0, 47, 4),
(72, 0, 47, 5),
(73, 0, 47, 6),
(74, 0, 47, 7),
(75, 0, 47, 8),
(76, 0, 47, 9),
(77, 0, 47, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `occuFlag` int(11) NOT NULL,
  `statusFlag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `Name`, `phone`, `occuFlag`, `statusFlag`) VALUES
(0, 'default', 'default', 'default', '', 1, 0),
(2, 'defaultck', 'default', 'default', '', 2, 0),
(5, 'defaultadmin', 'default', 'default', '', 5, 0),
(30, 'DS', '81dc9bdb52d04dc20036dbd8313ed055', 'Vimalasena Perera', '+947015492', 1, 1),
(31, 'Clerck', '81dc9bdb52d04dc20036dbd8313ed055', 'Lakshan Jayasinghe', '+947015492', 2, 1),
(32, 'Storekeeper', '81dc9bdb52d04dc20036dbd8313ed055', 'B.K. MADHUSHANKA', '+947015492', 3, 1),
(33, 'Tech', '81dc9bdb52d04dc20036dbd8313ed055', 'Isuru Maldeniya', '+947015492', 4, 1),
(35, 'Pasindu', '81dc9bdb52d04dc20036dbd8313ed055', 'Pasindu Jayarathne', '+947015492', 4, 1),
(36, 'Sahan', '81dc9bdb52d04dc20036dbd8313ed055', 'Sahan Sandaruwan', '+947015492', 4, 1),
(37, 'NANAYAKKARA', '81dc9bdb52d04dc20036dbd8313ed055', 'S.T.I.H. NANAYAKKARA', '+947015492', 4, 0),
(38, 'ckck', '81dc9bdb52d04dc20036dbd8313ed055', 'Salitha Diwankara', '+947015492', 2, 0),
(40, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Pasan Perera', '+947015492', 5, 1),
(41, 'techewqr', '81dc9bdb52d04dc20036dbd8313ed055', 'test user', '+947015492', 2, 0),
(44, 'newtech', 'e10adc3949ba59abbe56e057f20f883e', 'new Sandaruwan', '+94701549225', 4, 0),
(45, 'ABEYWICKRAMA', 'e10adc3949ba59abbe56e057f20f883e', 'L.D. ABEYWICKRAMA', '+94701549225', 4, 0),
(46, 'Laksan', 'e10adc3949ba59abbe56e057f20f883e', 'Lakshan Jayasinghe', '0701549225', 4, 0),
(47, 'nimal', 'e10adc3949ba59abbe56e057f20f883e', 'NAMAL EDIRISOORIYA', '+94701549225', 4, 1);

-- --------------------------------------------------------

--
-- Structure for view `repair_history`
--
DROP TABLE IF EXISTS `repair_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `repair_history`  AS  select `repair`.`repair_id` AS `repair_id`,`repair`.`lp_id` AS `lp_id`,`lamppost`.`division` AS `division`,`repair`.`date` AS `date` from (`lamppost` join `repair` on(`lamppost`.`lp_id` = `repair`.`lp_id`)) where `repair`.`status` in ('c','e') order by `repair`.`date` desc ;

-- --------------------------------------------------------

--
-- Structure for view `reqhistory_view`
--
DROP TABLE IF EXISTS `reqhistory_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reqhistory_view`  AS  select `itemrequest`.`Itemrequest_id` AS `Itemrequest_id`,`user`.`Name` AS `Name`,`itemrequest`.`supplied_date` AS `supplied_date`,`itemrequest`.`added_date` AS `added_date`,`itemrequest`.`status` AS `status` from (`itemrequest` join `user` on(`itemrequest`.`created_by` = `user`.`userId`)) where `itemrequest`.`status` in ('d','c') order by `itemrequest`.`added_date` desc ;

-- --------------------------------------------------------

--
-- Structure for view `stock_addition_view`
--
DROP TABLE IF EXISTS `stock_addition_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_addition_view`  AS  select `stock_addition`.`sa_id` AS `sa_id`,`stock_addition`.`date` AS `date`,`stock_addition`.`status` AS `status`,`user`.`Name` AS `Name` from (`stock_addition` join `user` on(`user`.`userId` = `stock_addition`.`clerk_id`)) ;

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
  ADD KEY `doneBy` (`doneBy`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `fraud_item`
--
ALTER TABLE `fraud_item`
  ADD PRIMARY KEY (`Fraud_item_id`),
  ADD KEY `item_ibfk_1` (`item_id`) USING BTREE,
  ADD KEY `fraud_item_ibfk_2` (`fraud_id`);

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
  ADD PRIMARY KEY (`lp_id`),
  ADD KEY `lptech` (`added_by`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_ibfk_1` (`from_user`),
  ADD KEY `notification_ibfk_2` (`to_user`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `lp_id` (`lp_id`),
  ADD KEY `repair_clk` (`clerk_id`),
  ADD KEY `repair_tech` (`technician_id`);

--
-- Indexes for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `repair_inventory_asc_ibfk_2` (`repair_id`);

--
-- Indexes for table `returnitemcheck`
--
ALTER TABLE `returnitemcheck`
  ADD PRIMARY KEY (`tech_id`,`date`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role`,`user_id`),
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
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `fraud`
--
ALTER TABLE `fraud`
  MODIFY `Fraud_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fraud_item`
--
ALTER TABLE `fraud_item`
  MODIFY `Fraud_item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `Itemrequest_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  MODIFY `Lp_record_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `section_points`
--
ALTER TABLE `section_points`
  MODIFY `point_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `stock_addition`
--
ALTER TABLE `stock_addition`
  MODIFY `sa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tech_sections`
--
ALTER TABLE `tech_sections`
  MODIFY `section_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  MODIFY `tmp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  ADD CONSTRAINT `fraud_ibfk_1` FOREIGN KEY (`doneBy`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `fraud_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `user` (`userId`);

--
-- Constraints for table `fraud_item`
--
ALTER TABLE `fraud_item`
  ADD CONSTRAINT `fraud_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `fraud_item_ibfk_2` FOREIGN KEY (`fraud_id`) REFERENCES `fraud` (`Fraud_id`) ON DELETE CASCADE;

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
-- Constraints for table `lamppost`
--
ALTER TABLE `lamppost`
  ADD CONSTRAINT `lptech` FOREIGN KEY (`added_by`) REFERENCES `user` (`userId`) ON DELETE NO ACTION;

--
-- Constraints for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  ADD CONSTRAINT `newlamppostrecord_ibfk_1` FOREIGN KEY (`lp_id`) REFERENCES `lamppost` (`lp_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `user` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `user` (`userId`) ON DELETE CASCADE;

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
