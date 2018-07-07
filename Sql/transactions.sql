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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Account_number`, `Amount`, `Date_of_transaction`, `Type`, `Details`) VALUES
(1, '555555', 100, '2018-07-06 13:03:27', 'Credit', 'Via Check'),
(2, '555555', 200, '2018-07-06 13:04:40', 'Debit', 'Cash'),
(3, '666555', 500, '2018-07-06 13:05:35', 'Credit', 'nil'),
(4, '666555', 600, '2018-07-06 13:06:16', 'Credit', ''),
(5, '555555', 400, '2018-07-06 13:06:38', 'Credit', 'Check'),
(6, '666555', 300, '2018-07-06 13:07:09', 'Debit', ''),
(7, '555555', 120, '2018-07-06 13:07:31', 'Debit', 'ATM');
