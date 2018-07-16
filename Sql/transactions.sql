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
('AS20181061531552756', '987654321', 90, '2018-07-14 12:49:16', 'Credit', 'first deposit'),
('AS20181061531552779', '987654321', 66, '2018-07-14 12:49:39', 'Debit', 'first deposit');
