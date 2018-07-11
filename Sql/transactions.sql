-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2018 at 08:20 AM
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
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `Transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `Account_number` varchar(255) NOT NULL,
  `Amount` double NOT NULL,
  `Date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` varchar(255) NOT NULL,
  `Details` text NOT NULL,
  PRIMARY KEY (`Transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Account_number`, `Amount`, `Date_of_transaction`, `Type`, `Details`) VALUES
(1, '1234567', 26, '2018-07-11 12:44:47', 'Debit', 'First Payment'),
(2, '2345678', 26, '2018-07-11 12:44:47', 'Credit', 'First Payment'),
(3, '1234567', 28, '2018-07-11 13:18:52', 'Debit', 'First Payment'),
(4, '2345678', 28, '2018-07-11 13:18:52', 'Credit', 'First Payment'),
(5, '1234567', 30, '2018-07-11 13:20:05', 'Debit', ''),
(6, '2345678', 30, '2018-07-11 13:20:05', 'Credit', '');
