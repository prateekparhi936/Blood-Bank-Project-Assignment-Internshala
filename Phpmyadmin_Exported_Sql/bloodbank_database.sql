-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 10:50 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank_database`
--
CREATE DATABASE IF NOT EXISTS `bloodbank_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bloodbank_database`;

-- --------------------------------------------------------

--
-- Table structure for table `available_sample`
--

DROP TABLE IF EXISTS `available_sample`;
CREATE TABLE IF NOT EXISTS `available_sample` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_sample`
--

INSERT INTO `available_sample` (`id`, `blood_group`, `hospital_name`) VALUES
(1, 'O+', 'Aiims'),
(2, 'B+', 'Chandrika'),
(3, 'B+', 'Aiims'),
(4, 'O+', 'Chandrika'),
(6, 'AB+', 'Aiims'),
(8, 'O-', 'Aiims'),
(10, 'A-', 'Aiims');

-- --------------------------------------------------------

--
-- Table structure for table `bb_user_info`
--

DROP TABLE IF EXISTS `bb_user_info`;
CREATE TABLE IF NOT EXISTS `bb_user_info` (
  `User_Email` text NOT NULL,
  `User_Password` text NOT NULL,
  `User_Role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bb_user_info`
--

INSERT INTO `bb_user_info` (`User_Email`, `User_Password`, `User_Role`) VALUES
('ashish@gmail.com', '3214', 'RECEIVER'),
('cc@chandrika.com', '112233445', 'HOSPITAL'),
('doc@aiims.com', '1221', 'HOSPITAL'),
('manish44@gmail.com', '1234', 'RECEIVER'),
('med@leelavati.com', '11224451', 'HOSPITAL'),
('new_doc@max.com', '112233', 'HOSPITAL');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_table`
--

DROP TABLE IF EXISTS `hospital_table`;
CREATE TABLE IF NOT EXISTS `hospital_table` (
  `Hospital_Id` int(11) NOT NULL,
  `User_Email` text NOT NULL,
  `Hospital_Name` text NOT NULL,
  `Contact` int(200) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_table`
--

INSERT INTO `hospital_table` (`Hospital_Id`, `User_Email`, `Hospital_Name`, `Contact`, `Address`) VALUES
(1, 'cc@chandrika.com', 'Chandrika', 2147483647, 'Dwarka,New delhi'),
(2, 'doc@aiims.com', 'Aiims', 991212312, 'Aiims,New Delhi'),
(3, 'med@leelavati.com', 'Leelavati ', 2147483647, 'Goregaon,Mumbai'),
(4, 'new_doc@max.com', 'MAX', 334567219, 'Chandigarh,India');

-- --------------------------------------------------------

--
-- Table structure for table `receiver_table`
--

DROP TABLE IF EXISTS `receiver_table`;
CREATE TABLE IF NOT EXISTS `receiver_table` (
  `User_Email` text NOT NULL,
  `Full_Name` text NOT NULL,
  `Age` int(200) NOT NULL,
  `Contact` int(200) NOT NULL,
  `Address` text NOT NULL,
  `BG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver_table`
--

INSERT INTO `receiver_table` (`User_Email`, `Full_Name`, `Age`, `Contact`, `Address`, `BG`) VALUES
('ashish@gmail.com', 'Ashish Sharma', 50, 999999999, 'Janakpuri,Delhi', 'A-'),
('manish44@gmail.com', 'Manish Sanghwi', 44, 2147483647, 'South Delhi,62-A,India', 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `view_requests`
--

DROP TABLE IF EXISTS `view_requests`;
CREATE TABLE IF NOT EXISTS `view_requests` (
  `request_id` int(11) NOT NULL,
  `user_email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_requests`
--

INSERT INTO `view_requests` (`request_id`, `user_email`) VALUES
(4, 'manish44@gmail.com'),
(1, 'manish44@gmail.com'),
(10, 'ashish@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_sample`
--
ALTER TABLE `available_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bb_user_info`
--
ALTER TABLE `bb_user_info`
  ADD PRIMARY KEY (`User_Email`(200));

--
-- Indexes for table `hospital_table`
--
ALTER TABLE `hospital_table`
  ADD PRIMARY KEY (`User_Email`(200)), ADD UNIQUE KEY `Hospital_Id` (`Hospital_Id`);

--
-- Indexes for table `receiver_table`
--
ALTER TABLE `receiver_table`
  ADD PRIMARY KEY (`User_Email`(200));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_sample`
--
ALTER TABLE `available_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hospital_table`
--
ALTER TABLE `hospital_table`
  MODIFY `Hospital_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
