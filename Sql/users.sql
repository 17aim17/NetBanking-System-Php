-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2018 at 11:30 AM
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

CREATE TABLE IF NOT EXISTS `users` (
  `Customer_id` varchar(50) NOT NULL,
  `Account_number` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Fathers_name` varchar(50) NOT NULL,
  `Balance` double NOT NULL DEFAULT '0',
  `Gender` varchar(50) NOT NULL,
  `Date_of_birth` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) NOT NULL,
  `Aadhar_number` varchar(50) DEFAULT NULL,
  `Pancard_number` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Staus` varchar(50) NOT NULL DEFAULT 'Pending',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Customer_id`),
  UNIQUE KEY `Account_number` (`Account_number`,`Aadhar_number`,`Pancard_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Customer_id`, `Account_number`, `Password`, `Name`, `Fathers_name`, `Balance`, `Gender`, `Date_of_birth`, `Email`, `Phone`, `Aadhar_number`, `Pancard_number`, `Photo`, `Staus`, `Date`) VALUES
('104', '777777', 'hello', 'Amit', 'Summit', 0, 'male', '1978-01-08', 'xyz@abc.com', '551531', '5654897', '987979', '104.jpg', 'ACTIVATED', '2018-07-07 14:32:15'),
('101', '555555', 'hello', 'Ajay', 'Mr. Pratap', 0, 'male', '1999-02-03', '99aps99@gmail.com', '65463', '9878986532', '32468', '101.jpg', 'Pending', '2018-07-07 00:00:00');
