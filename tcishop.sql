-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 05:12 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `acc_email` varchar(30) NOT NULL,
  `acc_password` varchar(30) NOT NULL,
  `acc_sex` varchar(6) NOT NULL,
  `acc_contact` varchar(11) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_name`, `acc_email`, `acc_password`, `acc_sex`, `acc_contact`, `user_type`) VALUES
(1, 'Alvin A. Talite', 'alvin@tci.com', 'admin', 'Male', '09123456789', 'admin'),
(2, 'John S. D', 'jdoe@tci.com', 'customer', 'Male', '09234567890', 'customer'),
(3, 'Jayson', 'jayson@tci.com', 'customer', 'male', '09341234567', 'customer'),
(4, 'Jayson', 'jayson@tci.com', 'admin', 'male', '09341234567', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(20) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `pf_name` int(11) NOT NULL,
  `prod_price` decimal(10,0) NOT NULL,
  `pc_name` int(11) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_image` varchar(50) NOT NULL,
  `prod_length` int(11) NOT NULL,
  `prod_width` int(11) NOT NULL,
  `prod_height` int(11) NOT NULL,
  `prod_diameter` int(11) NOT NULL,
  `prod_height2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `pf_name`, `prod_price`, `pc_name`, `prod_desc`, `prod_image`, `prod_length`, `prod_width`, `prod_height`, `prod_diameter`, `prod_height2`) VALUES
(2, 'NTF04-WD-001', 'Wall Decor - Antharium', 1, '500', 8, 'Wicker Vine', 'Wall Decor - Antharium.PNG', 100, 100, 8, 0, 0),
(3, 'NTF04-HF-085', 'Milky Vase - White and Grey Pottery', 3, '200', 1, 'Charcoal(Grey), Ricehull(White)', '', 0, 0, 0, 21, 25),
(4, 'NTF04-WD-002', 'Wall Decor - Zebra', 3, '500', 1, 'Capiz Gold White, Charcoal', '', 100, 100, 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`pc_id`, `pc_name`) VALUES
(1, 'Light Furnitures'),
(2, 'Office Accessories'),
(3, 'Light Furnitures'),
(4, 'Office Accesssories'),
(5, 'Bathroom Accessories'),
(6, 'Furniture Compliments'),
(7, 'Dining Room Accessories'),
(8, 'Furniture and Home Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `productfinish`
--

CREATE TABLE `productfinish` (
  `pf_id` int(11) NOT NULL,
  `pf_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productfinish`
--

INSERT INTO `productfinish` (`pf_id`, `pf_name`) VALUES
(1, 'Semi Gloss'),
(2, 'High Gloss'),
(3, 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `pg_id` int(11) NOT NULL,
  `pg_name` varchar(30) NOT NULL,
  `prod_1` int(11) NOT NULL,
  `prod_2` int(11) NOT NULL,
  `prod_3` int(11) NOT NULL,
  `prod_4` int(11) NOT NULL,
  `prod_5` int(11) NOT NULL,
  `prod_6` int(11) NOT NULL,
  `prod_7` int(11) NOT NULL,
  `prod_8` int(11) NOT NULL,
  `prod_9` int(11) NOT NULL,
  `prod_10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `pf_name` (`pf_name`),
  ADD KEY `pc_name` (`pc_name`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `productfinish`
--
ALTER TABLE `productfinish`
  ADD PRIMARY KEY (`pf_id`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`pg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `productfinish`
--
ALTER TABLE `productfinish`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pf_name`) REFERENCES `productfinish` (`pf_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`pc_name`) REFERENCES `productcategory` (`pc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
