-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2016 at 09:49 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booldfinder`
--
CREATE DATABASE IF NOT EXISTS `booldfinder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `booldfinder`;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `permissions` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `permissions`) VALUES
(1, 'Standard', '{"admin": 0}'),
(2, 'Administrator', '{"admin": 1,\r\n"manager": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `location` varchar(30) NOT NULL,
  `haematologist` varchar(45) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital` varchar(35) NOT NULL,
  `region` varchar(45) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `A` int(11) DEFAULT NULL,
  `B` int(11) DEFAULT NULL,
  `AB` int(11) DEFAULT NULL,
  `O` int(11) DEFAULT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hospital`, `region`, `username`, `password`, `A`, `B`, `AB`, `O`, `group`) VALUES
(1, 'Mbarara Regional Refaral', 'Western', 'pecode', 'BMg9uilo', 81, 50, 400, 68, 1),
(2, 'Nakasero blood bank', 'central', 'admin', 'password', 500, 6897, 5674, 467, 2),
(3, 'Itojo', 'Western', 'itojo', 'itojo', 43, 68, 897, 543, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
