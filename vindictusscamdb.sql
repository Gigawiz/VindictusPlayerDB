-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2016 at 11:26 AM
-- Server version: 5.5.44-MariaDB-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tainted2_scamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ip2country`
--

CREATE TABLE IF NOT EXISTS `ip2country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min` bigint(12) NOT NULL,
  `max` bigint(12) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `min` (`min`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31439 ;

-- --------------------------------------------------------

--
-- Table structure for table `scammers`
--

CREATE TABLE IF NOT EXISTS `scammers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `amt_scmd` text NOT NULL,
  `alt_chrs` text NOT NULL,
  `violation` text NOT NULL,
  `screenshots` text NOT NULL,
  `server` text NOT NULL,
  `status` text NOT NULL,
  `reported_by` text NOT NULL,
  `notes` text NOT NULL,
  `skype` text NOT NULL,
  `ip_address` text NOT NULL,
  `phys_address` text NOT NULL,
  `submission_ip` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1767 ;

-- --------------------------------------------------------

--
-- Table structure for table `scammers_beta`
--

CREATE TABLE IF NOT EXISTS `scammers_beta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `amt_scmd` text NOT NULL,
  `alt_chrs` text NOT NULL,
  `violation` text NOT NULL,
  `screenshots` text NOT NULL,
  `server` text NOT NULL,
  `status` text NOT NULL,
  `reported_by` text NOT NULL,
  `notes` text NOT NULL,
  `skype` text NOT NULL,
  `ip_address` text NOT NULL,
  `phys_address` text NOT NULL,
  `submission_ip` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `amt_scmd` text NOT NULL,
  `alt_chrs` text NOT NULL,
  `violation` text NOT NULL,
  `screenshots` text NOT NULL,
  `server` text NOT NULL,
  `status` text NOT NULL,
  `reported_by` text NOT NULL,
  `notes` text NOT NULL,
  `skype` text NOT NULL,
  `ip_address` text NOT NULL,
  `phys_address` text NOT NULL,
  `submission_ip` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1772 ;

-- --------------------------------------------------------

--
-- Table structure for table `submissions_backup`
--

CREATE TABLE IF NOT EXISTS `submissions_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `amt_scmd` text NOT NULL,
  `alt_chrs` text NOT NULL,
  `violation` text NOT NULL,
  `screenshots` text NOT NULL,
  `server` text NOT NULL,
  `status` text NOT NULL,
  `reported_by` text NOT NULL,
  `notes` text NOT NULL,
  `skype` text NOT NULL,
  `ip_address` text NOT NULL,
  `phys_address` text NOT NULL,
  `submission_ip` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `email` text NOT NULL,
  `displayname` text NOT NULL,
  `avatar` text,
  `joined` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `verified_buyers`
--

CREATE TABLE IF NOT EXISTS `verified_buyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `skype` text NOT NULL,
  `amount_bought` text NOT NULL,
  `server` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `verified_sellers`
--

CREATE TABLE IF NOT EXISTS `verified_sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ign` text NOT NULL,
  `skype` text NOT NULL,
  `amount_sold` text NOT NULL,
  `accepts_trades` text NOT NULL,
  `sale_types` text NOT NULL,
  `has_stock` text NOT NULL,
  `will_loan` text NOT NULL,
  `time_selling` text NOT NULL,
  `server` text NOT NULL,
  `conversion_rate` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
