-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 08:29 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
  `acc_fname` varchar(20) NOT NULL,
  `acc_lname` varchar(20) NOT NULL,
  `acc_add` varchar(50) NOT NULL,
  `acc_email` varchar(30) NOT NULL,
  `acc_password` varchar(30) NOT NULL,
  `acc_contact` varchar(11) NOT NULL,
  `user_type` varchar(12) NOT NULL,
  `acc_company` varchar(50) NOT NULL,
  `acc_comp_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_fname`, `acc_lname`, `acc_add`, `acc_email`, `acc_password`, `acc_contact`, `user_type`, `acc_company`, `acc_comp_contact`) VALUES
(1, 'Alvin', 'Talite', 'Bacolod City', 'alvin@tci.com', 'admin', '09123456789', 'admin', '', ''),
(2, 'Jayson', 'Solinap', 'Bacolod City', 'jayson@tci.com', 'customer', '09234567890', 'Single Buyer', '', ''),
(4, 'JJ', 'Belo', 'Bacolod City', 'jjbelo@tci.com', '1234', '09123212341', 'Company', 'Belo Inc.', '09333232231'),
(13, 'Jayson', 'Limbang', 'Bago', 'limbang@tci.com', '123', '09123456789', 'Company', 'Tumandok', '09234353233');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_finish` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `prod_id`, `quantity`, `order_id`, `cart_finish`) VALUES
(32, 2, 28, 1, 10, 'Yes'),
(33, 2, 26, 1, 11, 'Yes'),
(34, 2, 48, 1, 12, 'Yes'),
(35, 2, 39, 1, 12, 'Yes'),
(36, 2, 27, 2, 12, 'Yes'),
(37, 2, 26, 1, 12, 'Yes'),
(38, 2, 27, 1, 13, 'No'),
(39, 13, 27, 1, 19, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `featuredprod`
--

CREATE TABLE `featuredprod` (
  `featured_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featuredprod`
--

INSERT INTO `featuredprod` (`featured_id`, `prod_id`) VALUES
(14, 43),
(15, 44),
(13, 46),
(10, 47),
(12, 48),
(16, 49),
(17, 67);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiryID` int(5) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `acc_email` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiryID`, `acc_name`, `acc_email`, `subject`, `message`, `status`) VALUES
(2, 'Jayson Solinap', 'jayson@tci.com', 'customization', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 0),
(3, 'Jayson Solinap', 'jayson@tci.com', 'Needs', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `storeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `prod_id`, `quantity`, `storeid`) VALUES
(1, 46, 4, 1),
(19, 47, 1, 1),
(20, 48, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `shippingaddress` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `order_amount` decimal(11,2) NOT NULL,
  `order_finish` varchar(7) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_finished` date NOT NULL,
  `isViewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `acc_id`, `shippingaddress`, `country`, `state`, `city`, `zip_code`, `order_amount`, `order_finish`, `date_ordered`, `date_finished`, `isViewed`) VALUES
(10, 2, 'Brgy. 40', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '16500.00', 'Pending', '2018-01-11', '0000-00-00', 1),
(11, 2, 'Brgy. 40', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '20000.00', 'Pending', '2018-01-11', '0000-00-00', 1),
(12, 2, 'Barangay 40', 'Philippines', 'Negros Occidental', 'Bacolod City', 6108, '45000.00', 'Pending', '2018-01-23', '0000-00-00', 0),
(13, 2, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(19, 13, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_code` varchar(20) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `pf_name` int(11) NOT NULL,
  `prod_price` decimal(11,2) NOT NULL,
  `pc_name` int(11) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_image` varchar(50) NOT NULL,
  `prod_length` int(11) NOT NULL,
  `prod_width` int(11) NOT NULL,
  `prod_height` int(11) NOT NULL,
  `prod_diameter` int(11) NOT NULL,
  `prod_height2` int(11) NOT NULL,
  `prod_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_code`, `prod_name`, `pf_name`, `prod_price`, `pc_name`, `prod_desc`, `prod_image`, `prod_length`, `prod_width`, `prod_height`, `prod_diameter`, `prod_height2`, `prod_level`) VALUES
(25, 'OFS201710-WD001', 'Wall Decor - Sun Flower', 3, '22000.00', 3, 'Inlaid with coconut stick and twig', 'OFS201710-WD001.jpg', 0, 0, 0, 1, 1, 1),
(26, 'OFS201710-WD002', 'Wall Decor - Miracle Flower', 1, '20000.00', 3, 'Inlaid with banana bark and wicker vine', 'OFS201710-WD002.jpg', 0, 0, 0, 1, 1, 1),
(27, 'OFS201710-LF003', 'Mirror Frame - Plain', 1, '12500.00', 1, 'Capiz Gold and Banana Bark', 'OFS201710-LF003.jpg', 107, 81, 3, 0, 0, 1),
(28, 'OFS201710-LF004', 'Bar Counter with Iron Leg', 1, '16500.00', 1, 'Hardwood', 'OFS201710-LF004.jpg', 100, 80, 41, 0, 0, 1),
(29, 'OFS201710-LF005', 'Round Bar Stool with Iron Leg', 1, '8800.00', 1, 'Inlaid with Banana Bark Natural', 'OFS201710-LF005.jpg', 90, 40, 81, 0, 0, 1),
(30, 'OFS201710-LF006', 'Console Table', 1, '20000.00', 1, 'Capiz Gold and Banana Bark', 'OFS201710-LF006.jpg', 120, 40, 81, 0, 0, 1),
(31, 'OFS201710-LF007', 'Nesting Table - Small', 1, '5200.00', 1, 'Capiz Gold, Banana Bark', 'OFS201710-LF007.jpg', 43, 37, 48, 0, 0, 1),
(32, 'OFS201710-LF008', 'Nesting Table - Medium', 1, '6600.00', 1, 'Capiz Gold, Banana Bark', 'OFS201710-LF008.jpg', 55, 40, 55, 0, 0, 1),
(33, 'OFS201710-LF009', 'Nesting Table - Large', 1, '8000.00', 1, 'Capiz Gold, Banana Bark', 'OFS201710-LF009.jpg', 66, 42, 63, 0, 0, 1),
(34, 'OFS201710-LF010', 'Round Table - Small', 1, '7000.00', 1, 'Capiz Gold Shell, Sentimento Black', 'OFS201710-LF010.jpg', 0, 0, 0, 51, 52, 1),
(35, 'OFS201710-LF011', 'Round Table - Large', 1, '8500.00', 1, 'Capiz Gold Shell, Sentimento Black', 'OFS201710-LF011.jpg', 0, 0, 0, 61, 62, 1),
(36, 'OFS201710-LF012', 'Round Table with Iron Leg - Large', 1, '11500.00', 1, 'Inlaid with Banana Inverted in Black Stain and Natural Banana Bark', 'OFS201710-LF012.jpg', 0, 0, 0, 71, 71, 1),
(37, 'OFS201710-LF012', 'Round Table with Iron Leg - Small', 1, '5000.00', 1, 'Inlaid Banana Inverted in Black Stain and Natural Banana Bark', 'OFS201710-LF013.jpg', 0, 0, 0, 26, 46, 1),
(38, 'OFS201710-LM014', 'Square Table Lamp - Small', 1, '4100.00', 4, 'Inlaid with Banana Bark with Walnut Stain, Sinamay and Capiz Gold Strips', 'OFS201710-LM014.jpg', 0, 0, 0, 13, 41, 1),
(39, 'OFS201710-LM015', 'Square Table Lamp - Large', 1, '5300.00', 4, 'Inlaid Banana Bark with Walnut Stain, Sinamay and Capiz Gold Strips', 'OFS201710-LM015.jpg', 0, 0, 0, 16, 46, 1),
(40, 'OFS201710-LM016', 'Container Hanging Lamp - Small', 1, '3300.00', 4, 'Inlaid with Banana Bark Natural', 'OFS201710-LM016.jpg', 0, 0, 0, 0, 33, 1),
(41, 'OFS201710-LM017', 'Round Container Hanging Lamp', 1, '7200.00', 4, 'Inlaid Banana Bark Natural ', 'OFS201710-LM017.jpg', 0, 0, 0, 26, 52, 1),
(42, 'OFS201710-LM018', 'Container Hanging Lamp - Large', 1, '7700.00', 4, 'Inlaid with Banana Bark Natural', 'OFS201710-LM018.jpg', 33, 17, 45, 0, 0, 1),
(43, 'OFS201710-HF019', 'Bowl - Small', 3, '3700.00', 5, 'Inlaid with Capiz Gold Shell and Coconut Twig in Black', 'OFS201710-HF019.jpg', 0, 0, 0, 41, 16, 1),
(44, 'OFS201710-HF020', 'Bowl - Medium', 3, '4900.00', 5, 'Inlaid with Capiz Gold Shell and Coconut Twig in Black', 'OFS201710-HF020.jpg', 0, 0, 0, 46, 18, 1),
(45, 'OFS201710-HF021', 'Bowl - Large', 3, '7500.00', 5, 'Inlaid with Capiz Gold Shell and Coconut Twig in Black', 'OFS201710-HF021.jpg', 0, 0, 0, 56, 22, 1),
(46, 'OFS201710-AC042', 'Picture Frame - Small', 1, '700.00', 2, 'Inlaid with Banana Bark and Capiz Gold Shell', 'OFS201710-AC042.jpg', 0, 0, 0, 4, 6, 1),
(47, 'OFS201710-AC043', 'Picture Frame - Large', 1, '800.00', 2, 'Inlaid with Banana Bark and Capiz Gold Shell', 'OFS201710-AC043.jpg', 0, 0, 0, 5, 7, 1),
(48, 'OFS201710-AC044', 'Jewelry Box', 1, '800.00', 2, 'Inlaid with Banana Bark and Capiz Gold Shell', 'OFS201710-AC044.jpg', 0, 0, 0, 4, 6, 1),
(49, 'OFS201710-HF022', 'Gandal Fruit Bowl - Small', 3, '2600.00', 5, 'Hatchet Shell and Capiz Gold Strips', 'OFS201710-HF022.jpg', 33, 15, 9, 0, 0, 1),
(50, 'OFS201710-HF023', 'Gandal Fruit Bowl - Large', 3, '3900.00', 5, 'Hatchet Shell and Capiz Gold Shell', 'OFS201710-HF023.jpg', 52, 16, 10, 0, 0, 1),
(51, 'OFS201710-HF024', 'Sailmoon Bowl -Small', 3, '1000.00', 5, 'Hatchet Shell and Capiz Gold Strips', 'OFS201710-HF024.jpg', 19, 17, 8, 0, 0, 1),
(52, 'OFS201710-HF025', 'Sailmoon Bowl - Medium', 3, '1400.00', 5, 'Hatchet Shell and Capiz Gold Strips', 'OFS201710-HF025.jpg', 25, 22, 11, 0, 0, 1),
(53, 'OFS201710-HF026', 'Sailmoon Bowl - Large', 3, '1800.00', 5, 'Hatchet Shell and Capiz Gold Strips', 'OFS201710-HF026.jpg', 31, 26, 13, 0, 0, 1),
(54, 'OFS201710-HF027', 'Bowl - Medium', 3, '4900.00', 5, 'Hatchet Shell and Capiz Gold Strips', 'OFS201710-HF027.jpg', 0, 0, 0, 46, 7, 1),
(55, 'OFS201710-HF028', 'Rectangular Tray with Stand', 3, '1700.00', 5, 'Capiz Gold Strips', 'OFS201710-HF028.jpg', 35, 20, 4, 0, 0, 1),
(56, 'OFS201710-HF029', 'Rectangular Tray with Stand - Medium', 3, '2100.00', 5, 'Capiz Gold Strips', 'OFS201710-HF029.jpg', 40, 25, 4, 0, 0, 1),
(57, 'OFS201710-HF030', 'Rectangular Tray with Stand - Large', 3, '2700.00', 5, 'Capiz Gold Strips', 'OFS201710-HF030.jpg', 46, 30, 4, 0, 0, 1),
(58, 'OFS201710-HF031', 'Xanna Vase', 3, '4800.00', 5, 'Golden Coco Twig', 'OFS201710-HF031.jpg', 42, 14, 46, 0, 0, 1),
(59, 'OFS201710-HF032', 'Ring Vase - Small', 3, '4800.00', 5, 'Hatchet Black', 'OFS201710-HF032.jpg', 35, 12, 35, 0, 0, 1),
(60, 'OFS201710-HF033', 'Ring Vase - Large', 3, '6200.00', 5, 'Hatchet Black', 'OFS201710-HF033.jpg', 45, 114, 45, 0, 0, 1),
(61, 'OFS201710-HF034', 'Akhabar Vase - Small', 3, '3200.00', 5, 'Hatchet Shell, Wicker Vine and Capiz Gold Shell ', 'OFS201710-HF034.jpg', 20, 9, 57, 0, 0, 1),
(62, 'OFS201710-HF035', 'Akhabar Vase - Medium', 3, '3900.00', 5, 'Hatchet Shell, Wicker Vine and Capiz Gold Shell', 'OFS201710-HF035.jpg', 20, 11, 65, 0, 0, 1),
(63, 'OFS201710-HF036', 'Akhabar Vase - Large', 3, '4600.00', 5, 'Hatchet Shell, Wicker Vine and Capiz Gold Shell', 'OFS201710-HF036.jpg', 0, 0, 0, 26, 13, 1),
(64, 'OFS201710-HF037', 'Inverted Collard Vase', 3, '4200.00', 5, 'Inlaid with Banana Bark and Capiz Gold Shell', 'OFS201710-HF037.jpg', 0, 0, 0, 21, 46, 1),
(65, 'OFS201710-HF038', 'Kalubay Vase - Small', 1, '3000.00', 5, 'Inlaid with Capiz Gold Shell and Banana Bark ', 'OFS201710-HF038.jpg', 0, 0, 0, 11, 61, 1),
(66, 'OFS201710-HF039', 'Kalubay Vase - Large', 1, '4000.00', 5, 'Inlaid with Capiz Gold Shell and Banana Bark', 'OFS201710-HF039.jpg', 0, 0, 0, 13, 77, 1),
(67, 'NTF04-WD-065', 'asd', 1, '100.00', 1, 'asdasd', 'image_demo.jpg', 0, 0, 0, 0, 0, 1);

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
(2, 'Accessories'),
(3, 'Wall Decor'),
(4, 'Luminaries'),
(5, 'Home Furnitures');

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

-- --------------------------------------------------------

--
-- Table structure for table `statbar`
--

CREATE TABLE `statbar` (
  `statbID` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `pc_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statbar`
--

INSERT INTO `statbar` (`statbID`, `prod_id`, `pc_name`) VALUES
(1, 25, 3),
(2, 26, 3),
(3, 27, 1),
(4, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeid` int(11) NOT NULL,
  `storename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeid`, `storename`) VALUES
(1, 'Robinsons');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `featuredprod`
--
ALTER TABLE `featuredprod`
  ADD PRIMARY KEY (`featured_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `storeid` (`storeid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `acc_id` (`acc_id`);

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
-- Indexes for table `statbar`
--
ALTER TABLE `statbar`
  ADD PRIMARY KEY (`statbID`),
  ADD KEY `stat_ibfk_1` (`prod_id`),
  ADD KEY `stat_ibfk_2` (`pc_name`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `featuredprod`
--
ALTER TABLE `featuredprod`
  MODIFY `featured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `statbar`
--
ALTER TABLE `statbar`
  MODIFY `statbID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`acc_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `featuredprod`
--
ALTER TABLE `featuredprod`
  ADD CONSTRAINT `featuredprod_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pf_name`) REFERENCES `productfinish` (`pf_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`pc_name`) REFERENCES `productcategory` (`pc_id`);

--
-- Constraints for table `statbar`
--
ALTER TABLE `statbar`
  ADD CONSTRAINT `stat_ibfk_2` FOREIGN KEY (`pc_name`) REFERENCES `product` (`pc_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
