-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2018 at 02:21 PM
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

CREATE TABLE IF NOT EXISTS `payment` (
  `Transaction_id` varchar(32) NOT NULL,
  `Transfer_from` varchar(11) NOT NULL,
  `Transfer_to` varchar(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Remarks` varchar(255) NOT NULL,
  UNIQUE KEY `Transaction_id` (`Transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Transaction_id`, `Transfer_from`, `Transfer_to`, `Amount`, `Date`, `Remarks`) VALUES
('AS20181011531402849', '1234567', '2345678', 333, '2018-07-12 19:10:49', 'unique id 3'),
('AS20181011531404042', '1234567', '2345678', 25, '2018-07-12 19:30:42', 'unique id 4');
