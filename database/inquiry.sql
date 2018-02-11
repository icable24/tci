-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 08:25 AM
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
(2, 'Jayson Solinap', 'jayson@tci.com', 'customization', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', '2018-01-09', 'read', 1),
(3, 'Jayson Solinap', 'jayson@tci.com', 'Needs', 'hese parameters for for displaying attribution information below the quote; this should not be confused with a citing a source (see § Reference citations, below). These parameters are entirely optional, and are usually used with famous quotations, not routine block quotations, which are usually sourced at the end of the introductory line immediately before the quotation, with a normal <ref>...</ref> tag.\r\n\r\n|author= a.k.a. |2=—Optional Author/speaker attribution information that will appear below the quotation, and preceded with an attribution dash.\r\n\r\n|title= a.k.a. |3=—Optional title of the work the quote appears in, to display below the quotation. This parameter immediately follows the output of |author= (and an auto-generated comma), if one is provided. It does not auto-italicize. Major works (books, plays, albums, feature films, etc.) should be italicized; minor works (articles, chapters, poems, songs, TV episodes, etc.) go in quotation marks (see MOS:TITLES). Additional citation information can be provided in a fourth parameter, |source=, below, which will appear after the title.\r\n\r\n|source= a.k.a. |4=—Optionally used for additional source information to display, after |title=, like so: |title=\"The Aerodynamics of Shaved Weasels\"|source=\'\'Perspectives on Mammal Barbering\'\', 2016; a comma will be auto-generated between the two parameters. If |source= is used without |title=, it simply acts as |title=. (This parameter was added primarily to ease conversion from misuse of the pull quote template {{Quote frame}} for block quotation, but it may aid in cleaner meta-data implementation later.)\r\n\r\n|character= a.k.a. |char=—to attribute fictional speech to a fictional character, with other citation information. Can also be used to attribute real speech to a specific speaker among many, e.g. in a roundtable/panel transcript, a band interview, etc. This parameter outputs \"[Character\'s name], in\" after the attribution dash and before the output of the parameters above, thus one or more of those parameters must also be supplied. If you need to cite a fictional speaker in an article about a single work of fiction, where repeating the author and title information would be redundant, you can just use the |author= parameter instead of |character=.', '2018-01-17', 'read', 1),
(6, 'Jenny Labordo', 'jenny@gmail.com', 'Product Inquiry', 'Lorem Ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\n', '2018-01-31', 'read', 1),
(7, 'Jessel Solinap', 'jessel@gmail.com', 'Product Inquiry', 'Good Afternoon! How can I get discounts?\r\n', '2018-01-25', 'read', 1),
(8, 'Jessel Solinap', 'jessel@gmail.com', 'Product Inquiry', 'Hello! Is there any discounts depending on the number of items I buy?\r\n', '2018-02-02', 'read', 1),
(9, 'Ana  Smith', 'ana@gmail.com', 'Product Inquiry', 'Hello! ', '2018-02-07', 'read', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
