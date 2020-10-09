-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 02:27 PM
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
  `created_by` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest_inventory_asc`
--

CREATE TABLE `itemrequest_inventory_asc` (
  `Itemrequest_id` int(255) NOT NULL,
  `Item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `division` varchar(40) NOT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamppost`
--

INSERT INTO `lamppost` (`lp_id`, `division`, `lattitude`, `longitude`) VALUES
(1000, 'baddegama', 6.887286, 79.86136),
(1001, 'Gonaduwa, x Rd ', 6.890779, 79.858037),
(1002, 'Milagiriya', 6.891551, 79.85477),
(1003, 'Peterson Rd,Pamankada', 6.881167433870161, 79.864157036964),
(1004, 'Castle Lane,MIlagiriya', 6.881570466305064, 79.85680047538261),
(1005, 'Amarasekara Rd, Havlock Town', 6.883686767848502, 79.86359102010118);

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
(1, '2020-07-08', 'x', 1000, 0, 0),
(2, '2020-07-07', 'x', 1001, 0, 0),
(3, '2020-07-11', 'x', 1002, 0, 0),
(5, '2020-07-15', 'a', 1003, 0, 0),
(6, '2020-07-18', 'a', 1004, 0, 0),
(7, '2020-07-15', 'x', 1005, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `stock_addition_inventory_asc`
--

CREATE TABLE `stock_addition_inventory_asc` (
  `sa_id` int(255) NOT NULL,
  `item_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmpinventory`
--

CREATE TABLE `tmpinventory` (
  `tmp_id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` int(255) NOT NULL,
  `tecnician_id` int(255) NOT NULL,
  `Item_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occuFlag` int(11) NOT NULL,
  `statusFlag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `email`, `occuFlag`, `statusFlag`) VALUES
(0, 'Isuru', '1234', 'riniranja@gmail.com', 1, 0);

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
  ADD KEY `complainer_id` (`complainer_id`);

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
  ADD KEY `lamppost_id` (`lamppost_id`);

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
  ADD KEY `Itemrequest_id` (`Itemrequest_id`);

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
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`repair_id`),
  ADD KEY `clerk_id` (`clerk_id`),
  ADD KEY `repair_ibfk_1` (`technician_id`),
  ADD KEY `lp_id` (`lp_id`);

--
-- Indexes for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `stock_addition`
--
ALTER TABLE `stock_addition`
  ADD PRIMARY KEY (`sa_id`),
  ADD KEY `clerk_id` (`clerk_id`);

--
-- Indexes for table `stock_addition_inventory_asc`
--
ALTER TABLE `stock_addition_inventory_asc`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `sa_id` (`sa_id`);

--
-- Indexes for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  ADD PRIMARY KEY (`tmp_id`),
  ADD KEY `tecnician_id` (`tecnician_id`),
  ADD KEY `item_id` (`Item_id`);

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
  MODIFY `complainer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `Item_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `Itemrequest_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newlamppostrecord`
--
ALTER TABLE `newlamppostrecord`
  MODIFY `Lp_record_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `repair_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_addition`
--
ALTER TABLE `stock_addition`
  MODIFY `sa_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  MODIFY `tmp_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`complainer_id`) REFERENCES `complainer` (`complainer_id`);

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
  ADD CONSTRAINT `inventory_lamppost_asc_ibfk_2` FOREIGN KEY (`lamppost_id`) REFERENCES `lamppost` (`lp_id`);

--
-- Constraints for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD CONSTRAINT `itemrequest_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`userId`);

--
-- Constraints for table `itemrequest_inventory_asc`
--
ALTER TABLE `itemrequest_inventory_asc`
  ADD CONSTRAINT `itemrequest_inventory_asc_ibfk_1` FOREIGN KEY (`Itemrequest_id`) REFERENCES `itemrequest` (`Itemrequest_id`),
  ADD CONSTRAINT `itemrequest_inventory_asc_ibfk_2` FOREIGN KEY (`Item_id`) REFERENCES `inventory` (`Item_id`);

--
-- Constraints for table `itemrequest_tmpinventory_asc`
--
ALTER TABLE `itemrequest_tmpinventory_asc`
  ADD CONSTRAINT `itemrequest_tmpinventory_asc_ibfk_1` FOREIGN KEY (`Itemrequest_id`) REFERENCES `itemrequest` (`Itemrequest_id`),
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
  ADD CONSTRAINT `repair_ibfk_1` FOREIGN KEY (`lp_id`) REFERENCES `lamppost` (`lp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repair_inventory_asc`
--
ALTER TABLE `repair_inventory_asc`
  ADD CONSTRAINT `repair_inventory_asc_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `repair_inventory_asc_ibfk_2` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`repair_id`);

--
-- Constraints for table `stock_addition`
--
ALTER TABLE `stock_addition`
  ADD CONSTRAINT `stock_addition_ibfk_1` FOREIGN KEY (`clerk_id`) REFERENCES `user` (`userId`);

--
-- Constraints for table `stock_addition_inventory_asc`
--
ALTER TABLE `stock_addition_inventory_asc`
  ADD CONSTRAINT `stock_addition_inventory_asc_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`Item_id`),
  ADD CONSTRAINT `stock_addition_inventory_asc_ibfk_2` FOREIGN KEY (`sa_id`) REFERENCES `stock_addition` (`sa_id`);

--
-- Constraints for table `tmpinventory`
--
ALTER TABLE `tmpinventory`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`Item_id`) REFERENCES `inventory` (`Item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
