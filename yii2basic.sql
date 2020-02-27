-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 10:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id` int(3) NOT NULL,
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `population`) VALUES
(1, 'NP', 'Nepal', 250000007),
(2, 'BR', 'Brazil', 205722000),
(3, 'CA', 'Canada', 35985751),
(4, 'CN', 'China', 1375210000),
(5, 'DE', 'Germany', 81459000),
(6, 'FR', 'France', 64513242),
(7, 'GB', 'United Kingdom', 65097000),
(13, 'Ne', 'Nepal', 25000000),
(18, 'UN', 'United National', 25000007),
(19, 'hh', 'hhh', 3131313),
(20, 'yy', 'kjhakjdh', 98375983);

-- --------------------------------------------------------

--
-- Table structure for table `country_search`
--

CREATE TABLE IF NOT EXISTS `country_search` (
`id` int(3) NOT NULL,
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE IF NOT EXISTS `new_user` (
`id` int(2) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`) VALUES
(1, 'kiran121', 'kiranduwal@gmail.com', '$2y$10$8RY3MbXb/YWbRWRUtznnxOtgvdqTHNIpWa96z4O1IszOwzGRsrfGK', '', ''),
(2, 'karan121', 'krnduwal@gmail.com', '$2y$10$8RY3MbXb/YWbRWRUtznnxOtgvdqTHNIpWa96z4O1IszOwzGRsrfGK', '', ''),
(3, 'hey', 'hey@gmail.com', '$2y$10$WAvQku2GVGh8eiVaqXXhEOY0LSbLuAKxZsps2k3YW.kt1r4NlJUmW', 'ea7fe912d5c09bd9597f4b03217e8fff', ''),
(4, 'test', 'test@gmail.com', '$2y$10$4I5z4onGJUv8Ie8Y6RkPg.y6Mer/0K9EbI4YbOpW6DH6LEF5mFW5a', '12bcd658ef0a540cabc36cdf2b1046fd', '$2y$10$23qgak4gmVS5/uGhxwCCFejMwEMpQhduiYoVXDmxbI/I8sv6psNLm'),
(5, 'kiranduwal', 'kiranduwal@hotmail.com', '$2y$10$cov41sVbV/BGKlI8XWmcFuFAjOahwGrWra7d/r2jp12xjtwyRmqRC', '7873b66ca1d39eb8603c467fa05cfe86', '$2y$10$p73txZ3q7/nDQKK0qZOuDurfxQqGlLMloJClYpcSccIZtNzy6WjdO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_search`
--
ALTER TABLE `country_search`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_user`
--
ALTER TABLE `new_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `country_search`
--
ALTER TABLE `country_search`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `new_user`
--
ALTER TABLE `new_user`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
