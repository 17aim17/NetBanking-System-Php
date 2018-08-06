-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 01, 2018 at 08:08 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `netbanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE IF NOT EXISTS `cheque` (
  `Request_id` int(11) NOT NULL,
  `Account_number` varchar(12) NOT NULL,
  `Num_of_cheques` int(11) NOT NULL,
  `Request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`Request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`Request_id`, `Account_number`, `Num_of_cheques`, `Request_date`, `Status`) VALUES
(1, '2345678', 20, '2018-08-01 11:20:44', 'Delievered');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Transaction_id` varchar(32) NOT NULL,
  `Transfer_from` char(12) NOT NULL,
  `Transfer_to` char(12) NOT NULL,
  `Amount` double NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Remarks` varchar(255) NOT NULL,
  UNIQUE KEY `Transaction_id` (`Transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Transaction_id`, `Transfer_from`, `Transfer_to`, `Amount`, `Date`, `Remarks`) VALUES
('AS20181041531557119', '444444', '1234567', 20, '2018-07-14 14:01:59', 'd'),
('AS20181021531911019', '2345678', '1234567', 15, '2018-07-18 16:20:19', 'new'),
('AS20181021532065072', '2345678', '1234567', 120, '2018-07-20 11:07:52', 'kbjk');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `Transaction_id` varchar(32) NOT NULL,
  `Account_number` char(12) NOT NULL,
  `Amount` double NOT NULL,
  `Date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` varchar(30) NOT NULL,
  `Details` varchar(255) NOT NULL,
  PRIMARY KEY (`Transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Account_number`, `Amount`, `Date_of_transaction`, `Type`, `Details`) VALUES
('AS20181011531555787', '1234567', 20, '2018-07-14 13:39:47', 'Credit', ''),
('AS20181021531555801', '2345678', 90, '2018-07-14 13:40:01', 'Credit', ''),
('AS20181021531555822', '2345678', 40, '2018-07-14 13:40:22', 'Debit', ''),
('AS20181011531556809', '1234567', 30, '2018-07-14 13:56:49', 'Credit', ''),
('AS20181041531557007', '444444', 100, '2018-07-14 14:00:07', 'Credit', ''),
('AS20181041531557119', '444444', 20, '2018-07-14 14:01:59', 'Debit', 'd'),
('AS20181011531557119', '1234567', 20, '2018-07-14 14:01:59', 'Credit', 'd'),
('AS20181041531557279', '444444', 10, '2018-07-14 14:04:39', 'Debit', 'd'),
('AS20181021531911019', '2345678', 15, '2018-07-18 16:20:19', 'Debit', 'new'),
('AS20181011531911019', '1234567', 15, '2018-07-18 16:20:19', 'Credit', 'new'),
('AS20181011532064945', '1234567', 120, '2018-07-20 11:05:45', 'Credit', 'qwwe'),
('AS20181021532065072', '2345678', 120, '2018-07-20 11:07:52', 'Debit', 'kbjk'),
('AS20181011532065072', '1234567', 120, '2018-07-20 11:07:52', 'Credit', 'kbjk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Customer_id` char(12) NOT NULL,
  `Account_number` char(12) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Fathers_name` varchar(30) NOT NULL,
  `Balance` double NOT NULL DEFAULT '0',
  `Gender` char(10) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Phone` varchar(15) NOT NULL,
  `Aadhar_number` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Photo` varchar(30) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Customer_id`),
  UNIQUE KEY `Account_number` (`Account_number`,`Aadhar_number`,`Address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Customer_id`, `Account_number`, `Password`, `Name`, `Fathers_name`, `Balance`, `Gender`, `Date_of_birth`, `Email`, `Phone`, `Aadhar_number`, `Address`, `Photo`, `Status`, `Date`) VALUES
('101', '1234567', 'hello', 'Ashu', 'Ashu', 6325, 'male', '2001-02-14', 'example@gmail.com', '98498234', '398456923', 'new delhi', '101.png', 'Pending', '2018-07-20 11:07:52'),
('102', '2345678', 'hello', 'Amit', 'Sumit', 15, 'male', '1999-07-21', 'amit29@gmail.com', '987238336', '243734783409', 'hisar', '102.jpg', 'Activated', '2018-07-20 11:07:52'),
('103', '987654321', 'hello', 'Parvesh', 'Mr Wasuja', 8968, 'male', '1999-10-02', 'pw@gmail.com', '75837984', '38776238264', 'nil', '103.jpg', 'Activated', '2018-07-14 12:55:43'),
('104', '444444', 'user', 'ashish', 'ashish', 70, 'male', '2018-07-09', 'as@gmail.com', '34567', '45678', 'ygfygy', '104.png', 'Activated', '2018-07-14 14:04:39');
