-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2018 at 02:22 PM
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
  `Account_number` varchar(255) NOT NULL,
  `Amount` double NOT NULL,
  `Date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Type` varchar(255) NOT NULL,
  `Details` text NOT NULL,
  PRIMARY KEY (`Transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_id`, `Account_number`, `Amount`, `Date_of_transaction`, `Type`, `Details`) VALUES
('AS20181011531402152', '1234567', 29, '2018-07-12 18:59:12', 'Credit', 'unique id'),
('AS20181011531402170', '1234567', 29, '2018-07-12 18:59:30', 'Debit', 'unique id 2'),
('AS20181011531402849', '1234567', 333, '2018-07-12 19:10:49', 'Debit', 'unique id 3'),
('AS20181021531402849', '2345678', 333, '2018-07-12 19:10:49', 'Credit', 'unique id 3'),
('AS20181011531404042', '1234567', 25, '2018-07-12 19:30:42', 'Debit', 'unique id 4'),
('AS20181021531404042', '2345678', 25, '2018-07-12 19:30:42', 'Credit', 'unique id 4');
