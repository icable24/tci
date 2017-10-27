-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 11:05 AM
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
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `work_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `user_name`, `user_pass`, `user_type`, `fname`, `mname`, `lname`, `work_type`) VALUES
(1, 'admin', 'admin', 'admin', 'Alvin', 'Apellido', 'Talite', 'Sales Representative'),
(3, 'customer', 'customer', 'customer', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_password` varchar(15) NOT NULL,
  `cust_conpassword` varchar(15) NOT NULL,
  `cust_contactnumber` varchar(13) NOT NULL,
  `buy_agent` varchar(50) NOT NULL,
  `cust_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_address`, `cust_password`, `cust_conpassword`, `cust_contactnumber`, `buy_agent`, `cust_gender`) VALUES
(1, 'sdfsdfsdfsf', '', 'dasdasdsad', '12312312312312', '132312312312', 'adasdsadasd', 'adasdsadad', ''),
(2, 'dddd', '', 'dadsadsad', 'ddd', '3123123', '12312312', 'dasdadada', ''),
(3, 'dsfsdfsfsdf', 'asdasdasd', 'fsdfsdfsd', '3123123123', 'sdasdasd', 'adasdsad', '312312312312', 'male'),
(4, 'asdadsadadasd', 'ssadsdadasd', 'asdasdasdas', 'asddsad', 'adadas', 'dasdasda', 'asdasda', 'male'),
(5, 'bintot', '@gmail.com', 'binbin', 'asdasdasdas', 'asdasdsadsad', 'dasdadasd', 'adasda', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_position` varchar(25) NOT NULL,
  `emp_password` varchar(12) NOT NULL,
  `emp_conpassword` varchar(12) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_address`, `emp_position`, `emp_password`, `emp_conpassword`, `emp_email`, `emp_gender`) VALUES
(1, 'binbin', 'dddddddddd', 'dd', 'ddd', 'ddd', 'ddd', 'male'),
(2, 'adasda', 'dasdasd', 'dasa', 'adad', 'asdad', 'asdas', 'female'),
(3, 'adasda', 'dasdasd', 'dasa', 'dasd', 'dasd', 'asdas', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(20) NOT NULL,
  `prod_desc` varchar(20) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_size` varchar(6) NOT NULL,
  `prod_length` float NOT NULL,
  `prod_height` float NOT NULL,
  `prod_width` float NOT NULL,
  `prod_stock` varchar(4) NOT NULL,
  `prod_color` varchar(50) NOT NULL,
  `pf_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `prod_image` longblob NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_size`, `prod_length`, `prod_height`, `prod_width`, `prod_stock`, `prod_color`, `pf_id`, `pc_id`, `pg_id`, `prod_image`, `name`) VALUES
(1, 'Uneven Bowl', 'This is a bowl.', 1500, '', 8.5, 3.4, 0.82, '', '', 1, 1, 1, '', ''),
(2, 'Even Bowl', '', 1000, '', 8.5, 3, 1, '', '', 0, 0, 0, '', ''),
(3, 'producttest', 'fsdfsfdsfsfdsfsdfsdf', 500, '', 0.03, 0.03, 0.02, '', '', 0, 0, 0, '', ''),
(4, 'asdadasda', 'ddddd', 1, '', 0.02, 0.02, 0.02, '2', '', 1, 2, 1, '', ''),
(5, 'dasdadasd', '2', 300, '', 0.05, 0.03, 0.04, '5', '', 1, 1, 1, '', ''),
(6, 'ddddd', 'dddd', 400, '', 0.04, 0.06, 0.03, '4', '', 1, 2, 1, '', ''),
(7, 'dsdadasdas', '3', 400, '', 0.01, 0.01, 0.01, '2', '', 2, 1, 1, '', ''),
(8, 'sdadas', '22131321', 200, '', 0.04, 0.02, 0.03, '2', '', 2, 1, 1, '', ''),
(9, 'adssadadsa', 'asdasdadasd', 300, '', 0.05, 0.04, 0.03, '3', '', 1, 1, 1, '', ''),
(10, 'sdadadsad', 'sdadas', 400, '', 0.02, 0.02, 0.02, '3', '', 1, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`pc_id`, `pc_name`) VALUES
(1, 'Houseware'),
(2, 'Wall Decors');

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
(1, 'Glossy'),
(2, 'Matte');

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `pg_id` int(11) NOT NULL,
  `pg_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productgroup`
--

INSERT INTO `productgroup` (`pg_id`, `pg_name`) VALUES
(1, 'Bowl'),
(2, 'Furnitures');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `sample_A` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productfinish`
--
ALTER TABLE `productfinish`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
