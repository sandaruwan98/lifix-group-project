-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 06:27 PM
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
(1002, 'Milagiriya', 6.891551, 79.85477);

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
(3, '2020-07-11', 'x', 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

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
  MODIFY `repair_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
