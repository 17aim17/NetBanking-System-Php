-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 12:40 PM
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
  `Address` varchar(255) DEFAULT NULL,
  `Photo` varchar(50) NOT NULL,
  `Staus` varchar(50) NOT NULL DEFAULT 'Pending',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Customer_id`),
  UNIQUE KEY `Account_number` (`Account_number`,`Aadhar_number`,`Address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Customer_id`, `Account_number`, `Password`, `Name`, `Fathers_name`, `Balance`, `Gender`, `Date_of_birth`, `Email`, `Phone`, `Aadhar_number`, `Address`, `Photo`, `Staus`, `Date`) VALUES
('101', '1234567', 'user', 'User1', 'FUser', 0, 'male', '1990-09-07', 'user1@gmail.com', '+187638292', '', 'Mountain view , California', '101.jpg', 'Pending', '2018-07-09 00:00:00'),
('102', '2345678', 'user2', 'User2', 'FUser2', 0, 'female', '1998-05-11', 'user2@gmail.com', '+1568939203', '987097890', '91 ,Bradford Street, Ny', '102.jpg', 'Pending', '2018-07-09 00:00:00');
