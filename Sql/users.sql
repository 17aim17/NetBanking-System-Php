-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2018 at 07:30 AM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `Users` (
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

INSERT INTO `Users` (`Customer_id`, `Account_number`, `Password`, `Name`, `Fathers_name`, `Balance`, `Gender`, `Date_of_birth`, `Email`, `Phone`, `Aadhar_number`, `Address`, `Photo`, `Status`, `Date`) VALUES
('101', '1234567', 'hello', 'Ashu', 'Ashu', 6000, 'male', '2001-02-14', 'example@gmail.com', '98498234', '398456923', 'new delhi', '101.png', 'Pending', '2018-07-14 12:58:06'),
('102', '2345678', 'hello', 'Amit', 'Sumit', 100, 'male', '1999-07-21', 'amit29@gmail.com', '987238336', '243734783409', 'hisar', '102.jpg', 'Activated', '2018-07-14 12:55:18'),
('103', '987654321', 'hello', 'Parvesh', 'Mr Wasuja', 8968, 'male', '1999-10-02', 'pw@gmail.com', '75837984', '38776238264', 'nil', '103.jpg', 'Activated', '2018-07-14 12:55:43');
