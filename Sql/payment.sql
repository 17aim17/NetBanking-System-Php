-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2018 at 07:29 AM
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
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `Payment` (
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

INSERT INTO `Payment` (`Transaction_id`, `Transfer_from`, `Transfer_to`, `Amount`, `Date`, `Remarks`) VALUES
('AS20181011531404042', '1234567', '2345678', 25, '2018-07-12 19:30:42', 'unique id 4'),
('AS20181061531552718', '987654321', '1234567', 56, '2018-07-14 12:48:38', 'my first transaction');
