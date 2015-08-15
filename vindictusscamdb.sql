-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2015 at 12:00 PM
-- Server version: 5.5.45
-- PHP Version: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vindictusscamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `scammers`
--

CREATE TABLE IF NOT EXISTS `scammers` (
  `id` int(11) NOT NULL,
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
  `submission_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int(11) NOT NULL,
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
  `submission_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verified_sellers`
--

CREATE TABLE IF NOT EXISTS `verified_sellers` (
  `id` int(11) NOT NULL,
  `ign` text NOT NULL,
  `skype` text NOT NULL,
  `amount_sold` text NOT NULL,
  `accepts_trades` text NOT NULL,
  `sale_types` text NOT NULL,
  `has_stock` text NOT NULL,
  `will_loan` text NOT NULL,
  `time_selling` text NOT NULL,
  `server` text NOT NULL,
  `conversion_rate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scammers`
--
ALTER TABLE `scammers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verified_sellers`
--
ALTER TABLE `verified_sellers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scammers`
--
ALTER TABLE `scammers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `verified_sellers`
--
ALTER TABLE `verified_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
