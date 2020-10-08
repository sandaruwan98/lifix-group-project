-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 12:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, '982171750v', 'Lakshan Sandaruwan', '0702347654'),
(2, '862171670v', 'Mr. Perera', '0714570342');

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
(1, 1, 'Bla bla bla bla XD', 1001, 2, 1),
(2, 0, 'Bla bla bla ', 1000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `lp_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `name`, `phoneno`, `nic`, `lp_id`) VALUES
(4, 'lakshan sandaruwan', '0701549223', '982171750v', '4563'),
(5, 'lakshan sandaruwan', '0716610762', '982171750v', '2632'),
(6, 'jon poal', '0701549225', '982171750v', '5632'),
(7, 'lkkkkkkkk', '0701549225', 'u09807', '808008');

-- --------------------------------------------------------

--
-- Table structure for table `issue_item`
--

CREATE TABLE `issue_item` (
  `lp_id` varchar(4) NOT NULL,
  `date` date NOT NULL,
  `bulb` int(10) NOT NULL,
  `sunbox` int(11) NOT NULL,
  `wire` int(10) NOT NULL,
  `switch` int(10) NOT NULL,
  `Holder` int(11) NOT NULL,
  `Screw_holder` int(11) NOT NULL,
  `3_pin_holder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_item`
--

INSERT INTO `issue_item` (`lp_id`, `date`, `bulb`, `sunbox`, `wire`, `switch`, `Holder`, `Screw_holder`, `3_pin_holder`) VALUES
('', '0000-00-00', 0, 0, 0, 0, 0, 0, 0),
('#123', '2020-10-08', 3, 5, 1, 2, 0, 1, 1),
('#234', '2020-10-08', 6, 0, 0, 1, 0, 2, 0),
('1010', '0000-00-00', 5, 0, 7, 0, 0, 0, 0),
('1022', '0000-00-00', 5, 0, 7, 3, 0, 0, 0),
('1023', '2020-10-03', 4, 0, 6, 1, 1, 0, 0),
('1111', '2020-10-03', 2, 0, 2, 1, 1, 0, 0),
('1124', '2020-10-03', 4, 0, 0, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lamppost`
--

CREATE TABLE `lamppost` (
  `lpid` int(255) NOT NULL,
  `division` varchar(40) NOT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamppost`
--

INSERT INTO `lamppost` (`lpid`, `division`, `lattitude`, `longitude`) VALUES
(1000, 'baddegama', 6.887286, 79.86136),
(1001, 'Gonaduwa, x Rd ', 6.890779, 79.858037),
(1002, 'Milagiriya', 6.891551, 79.85477),
(1003, 'Peterson Rd,Pamankada', 6.881167433870161, 79.864157036964),
(1004, 'Castle Lane,MIlagiriya', 6.881570466305064, 79.85680047538261),
(1005, 'Amarasekara Rd, Havlock Town', 6.883686767848502, 79.86359102010118);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `repair_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` char(1) NOT NULL,
  `lp_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`repair_id`, `date`, `status`, `lp_id`) VALUES
(1, '2020-07-08', 'x', 1000),
(2, '2020-07-07', 'x', 1001),
(3, '2020-07-11', 'x', 1002),
(5, '2020-07-15', 'a', 1003),
(6, '2020-07-18', 'a', 1004),
(7, '2020-07-15', 'x', 1005);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `issue_item`
--
ALTER TABLE `issue_item`
  ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `lamppost`
--
ALTER TABLE `lamppost`
  ADD PRIMARY KEY (`lpid`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
