-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 05:10 PM
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
(5, 'Jessel May', 'Solinap', 'Bacolod City', 'jessel@gmail.com', 'customer', '09194543123', 'Single Buyer', '', ''),
(6, 'Joseph', 'Solinap', 'Bacolod City', 'joseph@gmail.com', 'customer', '09298787987', 'Single Buyer', '', ''),
(7, 'John', 'Solinap', 'Cavite', 'john@gmail.com', 'customer', '09192312765', 'Single Buyer', '', ''),
(8, 'Bryan', 'Mills', 'Brgy Masilingan, Bacolod City', 'bryan@gmail.com', 'customer', '09995644111', 'Company', 'Coca-Cola Complany', '434-6745'),
(9, 'Cinthia', 'Ramos', 'Taguig', 'ramos@gmail.com', 'customer', '09215576324', 'Company', '7Eleven', '434-5553'),
(10, 'Mike', 'Smith', 'Tarlac', 'mike@gmail.com', 'customer', '09199888456', 'Company', 'Jollibee', '434-9855'),
(11, 'Michael', 'Mayers', 'Jakarta, Indonesia', 'meyers@gmail.com', 'customer', '09323356787', 'Company', 'EverGreen Company', '434-1324'),
(12, 'Samuel', 'Tano', 'Marikina', 'samuel@gmail.com', 'customer', '09336543234', 'Single Buyer', '', ''),
(13, 'Jayson', 'Limbang', 'Bago', 'limbang@tci.com', '123', '09123456789', 'Company', 'Tumandok', '09234353233'),
(14, 'Johnny', 'Cruz', 'Myanmar', 'johnny@gmail.com', 'customer', '09999812435', 'Single Buyer', '', ''),
(15, 'Hannah ', 'Montana', 'United States of America', 'hannah@gmail.com', 'customer', '09993456123', 'Single Buyer', '', ''),
(16, 'Eric', 'Lagdameno', 'Bacolod City', 'eric@gmail.com', 'customer', '09335433888', 'Single Buyer', '', ''),
(17, 'James', 'Bond', 'United States of America', 'james@gmail.com', 'customer', '09166665345', 'Single Buyer', '', ''),
(18, 'Penuel', 'Tano', 'Gardenville, Bacolod City', 'penuel@gmail.com', 'customer', '09997654114', 'Single Buyer', '', ''),
(22, 'Alvin', 'Talite', '', 'alvin@tci.com', 'admin', '', 'admin', '', ''),
(23, 'Jayson', 'Limbang', 'Alijis, Bacolod City', 'limbang@tci.com', 'customer', '09997677876', 'Single Buyer', '', ''),
(24, 'Jessel', 'Solinap', 'Brgy. Sum-ag, Bacolod City', 'jessel@gmail.com', 'customer', '09123456435', 'Single Buyer', '', ''),
(25, 'John', 'Solinap', 'Brgy. Sum-ag, Bacolod City', 'john@gmail.com', 'customer', '09991211276', 'Single Buyer', '', ''),
(26, 'Joseph', 'Solinap', 'Brgy. Sum-ag, Bacolod City', 'joseph@gmail.com', 'customer', '09125465789', 'Single Buyer', '', ''),
(27, 'Hannah ', 'Montana', 'Brgy. Sum-ag, Bacolod City', 'hannah@gmail.com', 'customer', '09109823456', 'Single Buyer', '', ''),
(28, 'James', 'Bond', 'United States of America', 'james@gmail.com', 'customer', '09995433255', 'Single Buyer', '', ''),
(29, 'Jayson', 'Solinap', 'Brgy. Sum-ag, Bacolod City', 'jayson@tci.com', 'customer', '09274215725', 'Single Buyer', '', ''),
(30, 'jm', 'Solinap', 'Brgy. Sum-ag, Bacolod City', 'jm@gmail.com', 'customer', '091234567', 'Single Buyer', '', ''),
(31, 'Bryan', 'Mills', 'Brgy Masilingan, Bacolod City', 'bryan@gmail.com', 'customer', '09276787888', 'Company', 'Coca Cola Company', '434-6777'),
(32, 'Cinthia', 'Ramos', 'Makati', 'ramos@gmail.com', 'customer', '09996511436', 'Company', '7Eleven Merchandise', '434-5553'),
(33, 'Mike', 'Smith', 'Jakarta, Indonesia', 'mike@gmail.com', 'customer', '09126578999', 'Company', 'EverGreen Company', '434-1324'),
(34, 'Genevive', 'Montano', 'Alijis, Bacolod City', 'genevive@gmail.com', 'customer', '09123453231', 'Company', 'Munsterific', '434-9855'),
(35, 'Nelson', 'Espadera', 'Kawit, Cavite', 'nelson@gmail.com', 'customer', '09104467512', 'Company', 'iMart Enterprise', '434-5231'),
(36, 'Angel', 'Kim', 'Brgy Bata, Bacolod City', 'angel@gmail.com', 'customer', '09157855399', 'Company', 'Pepsi Company', '434-1055'),
(37, 'Jenny', 'Lobordo', 'Araneta St. Bacolod City', 'jenny@gmail.com', 'customer', '09157745336', 'Company', 'Teresa Development Corporation', '434-7756');

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
(39, 13, 27, 1, 19, 'No'),
(59, 28, 69, 6, 33, 'Yes'),
(60, 28, 100, 4, 33, 'Yes'),
(61, 28, 95, 3, 33, 'Yes'),
(62, 28, 71, 2, 33, 'Yes'),
(63, 28, 90, 4, 33, 'Yes'),
(64, 24, 81, 3, 29, 'Yes'),
(65, 24, 84, 3, 29, 'Yes'),
(66, 24, 68, 5, 29, 'Yes'),
(67, 29, 69, 7, 36, 'Yes'),
(68, 29, 81, 3, 36, 'Yes'),
(69, 29, 95, 2, 36, 'Yes'),
(70, 29, 97, 2, 36, 'Yes'),
(71, 29, 96, 2, 36, 'Yes'),
(72, 29, 93, 4, 36, 'Yes'),
(73, 25, 78, 3, 30, 'Yes'),
(74, 25, 41, 3, 30, 'Yes'),
(75, 25, 86, 3, 30, 'Yes'),
(76, 25, 91, 3, 30, 'Yes'),
(77, 30, 93, 1, 39, 'Yes'),
(78, 30, 69, 1, 39, 'Yes'),
(79, 26, 26, 2, 31, 'Yes'),
(80, 26, 91, 3, 31, 'Yes'),
(81, 26, 88, 3, 31, 'Yes'),
(82, 26, 86, 4, 31, 'Yes'),
(83, 31, 69, 10, 42, 'Yes'),
(84, 31, 29, 15, 42, 'Yes'),
(85, 31, 34, 15, 42, 'Yes'),
(86, 31, 98, 5, 42, 'Yes'),
(87, 32, 100, 10, 44, 'Yes'),
(88, 32, 69, 10, 44, 'Yes'),
(89, 32, 34, 10, 44, 'Yes'),
(90, 32, 29, 8, 44, 'Yes'),
(91, 33, 71, 5, 46, 'Yes'),
(92, 33, 68, 5, 46, 'Yes'),
(93, 33, 74, 5, 46, 'Yes'),
(94, 33, 93, 10, 46, 'Yes');

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
  `date` date NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'Unread',
  `statusView` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiryID`, `acc_name`, `acc_email`, `subject`, `message`, `date`, `status`, `statusView`) VALUES
(2, 'Jayson Solinap', 'jayson@tci.com', 'customization', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '0000-00-00', 'Unread', 0),
(3, 'Jayson Solinap', 'jayson@tci.com', 'Needs', 'hese parameters for for displaying attribution information below the quote; this should not be confused with a citing a source (see § Reference citations, below). These parameters are entirely optional, and are usually used with famous quotations, not routine block quotations, which are usually sourced at the end of the introductory line immediately before the quotation, with a normal <ref>...</ref> tag.\r\n\r\n|author= a.k.a. |2=—Optional Author/speaker attribution information that will appear below the quotation, and preceded with an attribution dash.\r\n\r\n|title= a.k.a. |3=—Optional title of the work the quote appears in, to display below the quotation. This parameter immediately follows the output of |author= (and an auto-generated comma), if one is provided. It does not auto-italicize. Major works (books, plays, albums, feature films, etc.) should be italicized; minor works (articles, chapters, poems, songs, TV episodes, etc.) go in quotation marks (see MOS:TITLES). Additional citation information can be provided in a fourth parameter, |source=, below, which will appear after the title.\r\n\r\n|source= a.k.a. |4=—Optionally used for additional source information to display, after |title=, like so: |title=\"The Aerodynamics of Shaved Weasels\"|source=\'\'Perspectives on Mammal Barbering\'\', 2016; a comma will be auto-generated between the two parameters. If |source= is used without |title=, it simply acts as |title=. (This parameter was added primarily to ease conversion from misuse of the pull quote template {{Quote frame}} for block quotation, but it may aid in cleaner meta-data implementation later.)\r\n\r\n|character= a.k.a. |char=—to attribute fictional speech to a fictional character, with other citation information. Can also be used to attribute real speech to a specific speaker among many, e.g. in a roundtable/panel transcript, a band interview, etc. This parameter outputs \"[Character\'s name], in\" after the attribution dash and before the output of the parameters above, thus one or more of those parameters must also be supplied. If you need to cite a fictional speaker in an article about a single work of fiction, where repeating the author and title information would be redundant, you can just use the |author= parameter instead of |character=.', '0000-00-00', 'read', 1);

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
(20, 48, 3, 1),
(21, 86, 5, 1);

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
(12, 2, 'Barangay 40', 'Philippines', 'Negros Occidental', 'Bacolod City', 6108, '45000.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(13, 2, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(19, 13, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(28, 23, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 1),
(29, 24, 'Prk. Fatima Sum-ag', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '19000.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(30, 25, 'Prk. Fatima Sum-ag', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '28800.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(31, 26, 'Prk Mahigugmaon', 'Philippines', 'Negros Occidental', 'Bago City', 6101, '47900.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(32, 27, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(33, 28, 'Prk Mahigugmaon', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '33400.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(34, 28, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(35, 24, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(36, 29, 'Prk. Fatima Sum-ag', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '41300.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(37, 29, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(38, 25, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(39, 30, 'Prk. Fatima Sum-ag', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '4000.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(40, 30, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(41, 26, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(42, 31, 'Brgy Mansilingan', 'Philippines', 'Negros Occidental', 'Bacolod City', 6100, '256000.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(43, 31, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(44, 32, 'Makati', 'Brunei', 'NCR', 'Makati City', 6121, '174400.00', 'Pending', '2018-01-23', '0000-00-00', 0),
(45, 32, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(46, 33, 'jakarta,Indonesia', 'Brunei', 'Indonesia', 'Depok City', 7600, '47000.00', 'Pending', '2018-01-23', '0000-00-00', 1),
(47, 33, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(48, 34, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(49, 35, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(50, 36, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0),
(51, 37, '', '', '', '', 0, '0.00', 'No', '0000-00-00', '0000-00-00', 0);

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
(67, 'NTF04-WD-065', 'asd', 1, '100.00', 1, 'asdasd', 'image_demo.jpg', 0, 0, 0, 0, 0, 1),
(68, 'NTF2017-HFB040', 'Bowl Coco Twig', 1, '2300.00', 5, 'BOWL 12\" DIA. - GOLDEN COCOTWIG POTTERY; DIMAOND/ SEMI GLOSS\r\n', 'Bowlcocotwig.jpg', 0, 0, 0, 12, 2, 0),
(69, 'NTF2017-LF057', 'Folding Table Stripe- Small', 3, '1500.00', 1, 'FOLDING TABLE (SET OF 2) - BANANA CAPIZ SQUARE; DIAMOND\r\n\r\n', 'FoldingTableStripe.jpg', 50, 35, 47, 0, 0, 0),
(71, 'NTF2017-HFB042', 'Golden Green Bowl', 1, '1300.00', 5, 'BOWL - GOLDEN GREEN DESIGN; DIAMOND / SEMI GLOSS\r\n', 'BowlGreen.jpg', 0, 0, 0, 14, 3, 0),
(74, 'NTF2017-HFB039', 'Hatchet Bowl', 3, '800.00', 5, 'BOWL 12\" DIA. -FRESH WATER SHELL CLEAR; DIAMOND\r\n', 'BowlHatchet.jpg', 0, 0, 0, 12, 2, 0),
(75, 'NTF2017-HFB035', 'Bowl Senti- Small', 1, '800.00', 5, 'WARP BOWL (S/M) - SENTIMENTO BLACK & CAPIZ GOLD SHELL; SEMI GLOSS/ HGH GLOSS\r\n\r\n', 'BowlSenti.jpg', 30, 28, 8, 0, 0, 0),
(76, 'NTF2017-HFV020', 'Buday Batad Vase - Small', 1, '900.00', 5, 'BUDAY VASE (S/2) - BATAD REVISE; CAPIZ GOLD SHELL; COCONUT SHELL & COCOTWIG; SEMI GLOSS\r\n\r\n', 'BudayVaseBatadRevise.jpg', 0, 0, 0, 19, 21, 0),
(77, 'NTF2017-HFV022', 'Carolina Vase - Small', 1, '800.00', 5, 'CAROLINA VASE VASE SMALL - BATAD REVISE; CAPIZ GOLD SHELL; COCONUT SHELL & COCOTWIG; SEMI GLOSS\r\n', 'carolinavasebatadrevise1copy.jpg', 17, 12, 31, 0, 0, 0),
(78, 'NTF2017-LF061', 'Folding Table Red&Black - Small', 3, '1100.00', 1, 'FOLDING TABLE (SET OF 2) - RICEHULL RED & BLACK; DIAMOND\r\n\r\n', 'FoldingTableCheckeredBlack.jpg', 50, 35, 47, 0, 0, 0),
(79, 'NTF2017-HFV007', 'Glory Vase - Small', 3, '1200.00', 5, 'GLORY VASE (SET OF 2) - GOLDEN BANANA DESIGN; DIAMOND FINISH\r\n\r\n', 'GloryVase.jpg', 0, 0, 0, 18, 46, 0),
(80, 'NTF2017-HFT044', 'Hashtag Tray - Small', 3, '700.00', 5, 'RECTANGULAR TRAY WITH STAND - CAPIZ GOLD STRIPS; DIAMOND\r\n\r\n\r\n', 'HasgtagTray.jpg', 35, 20, 3, 0, 0, 0),
(81, 'NTF17-JBX001', 'Golden Jewelry Box - Small', 1, '800.00', 2, 'JEWELRY BOX  (P) - GOLDEN BATAD DESIGN; SEMI GLOSS\r\n\r\n', 'JboxGoldenBananaStrips.jpg', 0, 0, 0, 3, 5, 0),
(82, 'NTF17-JBX007', 'Scattered Red JBox - Small', 3, '900.00', 2, 'JEWELRY BOX  (P) - SCATTERED CAPIZ GOLD SHELL IN RED; DIAMOND FINISH\r\n\r\n', 'JboxScatteredred.jpg', 0, 0, 0, 3, 5, 0),
(83, 'NTF2017-HFV011', 'Kulintang Teardrop Vase - Small', 1, '1400.00', 5, 'KULINTANG VASE ( REVISE)-  SEEDPOD IN  BLACK; CAPIZ PULLED GOLD & BANANA BAR; SEMI GLOSS\r\n\r\n', 'KulintangTeardropVaseRevised.jpg', 29, 59, 66, 0, 0, 0),
(84, 'NTF2017-LM073', 'Musco Table Lamp', 1, '1700.00', 4, 'MUSCO TABLE LAMP - HATCHET BLACK & SINAMAY FIBER; SEMI GLOSS\r\n', 'Lamp.jpg', 0, 0, 0, 50, 15, 0),
(85, 'NTF2017-HFT053', 'Makiba Leaf Tray - Small', 3, '800.00', 5, 'MAKIBA LEAF TRAY - CAPIZ GOLD IN BLACK; DIAMOND/ SEMI GLOSS\r\n\r\n', 'LeafTrayMakiba.jpg', 43, 27, 6, 0, 0, 0),
(86, 'NTF2017-HFB037', 'Mango Bowl - Small', 1, '1000.00', 5, 'MANGO BOWL - SEMION CLEAR DESIGN; SEMI GLOSS\r\n\r\n', 'MangoBowl.jpg', 36, 20, 5, 0, 0, 0),
(87, 'NTF2017-LF064', 'Mini Console Table', 1, '2000.00', 1, 'MINI CONSOLE TABLE - BANANA & CAPIZ GOLD STRIPES; SEMI GLOSS\r\n', 'MiniConsoleTableStripe.jpg', 101, 35, 51, 0, 0, 0),
(88, 'NTF2017-HFB030', 'Nautilus Bowl - Small', 3, '1000.00', 5, 'NAUTILUS BOWL (SET OF 2) - MAKIBA DESIGN; DIAMOND\r\n\r\n', 'Nautilusbowl.jpg', 28, 25, 6, 0, 0, 0),
(89, 'NTF2017-LF063', 'Side Strip Table', 1, '2300.00', 1, 'SIDE TABLE - BANANA & CAPIZ GOLD STRIPES; SEMI GLOSS\r\n', 'SideTableStripe.jpg', 44, 35, 46, 0, 0, 0),
(90, 'NTF2017-HFV004', 'Sisa Vase - Small', 3, '1300.00', 5, 'SISA VASE (SET OF 2) - SENTIMENTO BROWN; DIAMOND FINISH\r\n\r\n', 'SisaVaseLarge.jpg', 32, 11, 43, 0, 0, 0),
(91, 'NTF2017-BA075', 'Soap Dish', 1, '300.00', 2, 'Soap Dish - GOLDEN BATAD DESIGN; SEMI GLOSS\r\n\r\n', 'soapdish-BI.jpg', 0, 0, 0, 3, 5, 0),
(92, 'NTF2017-HFT211', 'Sophia Tray - Small', 3, '800.00', 5, 'RECTANGULAR TRAY WITH STAND - CAPIZ GOLD STRIPS; DIAMOND\r\n\r\n\r\n', 'SOPHIATRAY.jpg', 35, 20, 5, 0, 0, 0),
(93, 'NTF2017-LM099', 'Square Table Lamp - Small', 1, '2500.00', 4, 'SQAURE TABLE LAMP - SADDLE OYSTER SHELL & SEMI GLOSS\r\n', 'SQUARETABALELAMP.jpg', 45, 34, 55, 0, 0, 0),
(94, 'NTF2017-HFV045', 'Stella Vase - Small', 3, '1000.00', 5, 'STELLA VASE (REVISE SIZE) - SENTIMENTO BROWN & CAPIZ GOLD SHELL; DIAMOND FINISH\r\n', 'STELLAVASE.jpg', 23, 23, 30, 0, 0, 0),
(95, 'NTF2017-LF068', 'Daydream Wall Decor', 1, '3000.00', 3, 'WALL DÃ‰COR - DAY DREAM                                                  INLAY WITH BANANA BARK & CAPIZ GOLD SHELL; DIAMOND/ SEMI GLOSS\r\n', 'WallDecorDaydream.jpg', 100, 100, 5, 0, 0, 0),
(96, 'NTF2017-LF088', 'Eclipse Wall Decor', 3, '3500.00', 3, 'WALL DÃ‰COR - ECLIPSE                                                 INLAY WITH BANANA BARK & CAPIZ GOLD SHELL; DIAMOND/ SEMI GLOSS\r\n', 'WallDecor-Eclipse.PNG', 100, 100, 5, 0, 0, 0),
(97, 'NTF2017-LF070', 'Black and White Wall Decor', 1, '2700.00', 3, 'WALL DÃ‰COR - Black & White                                                  INLAY WITH CAPIZ GOLD SHELL, SINAMAY IBER & COCOTWIG; DIAMOND/ SEMI GLOSS\r\n', 'WALLDECOR.jpg', 100, 100, 4, 0, 0, 0),
(98, 'NTF2017-LF089', 'Waste Basket', 1, '800.00', 1, 'Waste Basket - BANANA & CAPIZ GOLD STRIPES; SEMI GLOSS\r\n', 'wast basket-invertedbanana.jpg', 35, 40, 47, 0, 0, 0),
(99, 'NTF2017-HFV097', 'Warp Vase - Large', 3, '1400.00', 5, 'WARP VASE (REVISE SIZE) - SENTIMENTO BROWN & CAPIZ GOLD SHELL; DIAMOND FINISH\r\n', 'WARPVASELARGE.jpg', 30, 23, 28, 0, 0, 0),
(100, 'NTF2017-LF055', 'Folding Table', 1, '1900.00', 1, 'FOLDING TABLE (SET OF 2) - KAPOK BLACK IN SQUARE; SEMI GLOSS \r\n\r\n', 'FoldingTableCheckeredBlack.jpg', 50, 35, 47, 0, 0, 0),
(101, 'NTF2017-HFV025', 'Fan Vase', 1, '1700.00', 5, 'FAN VASE (SET OF 2) - KAPOK IN BLACK; SEMI GLOSS\r\n\r\n', 'FanVase.jpg', 23, 9, 27, 0, 0, 0),
(102, 'NTF2017-HFV018', 'Mini Jonathan Vase - Small', 3, '1300.00', 5, 'MINI JONATHAN VASE (S/2) - SIMEON CLEAR DESIGN; DIAMOND FINISH\r\n\r\n', 'MiniJoathan Vase.jpg', 26, 9, 15, 0, 0, 0),
(103, 'NTF2017-LF066', 'Bar Stool with Iron Legs', 1, '1300.00', 1, 'BAR STOOL WITH IRON LEGS - HARDWOOD\r\nSemi-Gloss', 'stool.jpg', 30, 30, 25, 0, 0, 0),
(104, 'NTF2017-LF069', 'Banana Tree Wall Decor', 3, '2200.00', 3, 'WALL DÃ‰COR - INFINITY                                                  INLAY WITH BANANA BARK & CAPIZ GOLD SHELL; DIAMOND\r\n', 'WallDecorBananaTree.jpg', 100, 100, 4, 0, 0, 0),
(105, 'NTF2017-LM096', 'Ceramic Lamp', 1, '1600.00', 4, 'CERAMIC LAMP - HATCHET BLACK & SINAMAY FIBER; SEMI GLOSS\r\n', 'ceramiclamp.jpg', 0, 0, 0, 50, 50, 0),
(106, 'NTF2017-LM091', 'Mica Small Table Lamp', 1, '1300.00', 4, 'MICA SMALL TABLE LAMP - SADDLE OYSTER SHELL & SEMI GLOSS\r\n', 'micasmalltablelamp.jpg', 0, 0, 0, 30, 25, 0),
(107, 'NTF2017-LM092', 'Tea Root Lamp', 1, '1400.00', 4, 'TEA ROOT LAMP - HATCHET WHITE & SINAMAY FIBER; SEMI GLOSS\r\n', 'teakrootlamp.jpg', 0, 0, 0, 38, 25, 0),
(108, 'NTF2017-LM093', 'Floor Corner Lamp', 1, '1800.00', 4, 'FLOOR CORNER LAMP - BLACK & CAPIZ GOLD SHELL; SEMI GLOSS\r\n\r\n', 'floorcornerlamp.jpg', 0, 0, 0, 35, 50, 0);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `featuredprod`
--
ALTER TABLE `featuredprod`
  MODIFY `featured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
