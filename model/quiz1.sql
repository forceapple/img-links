-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2015 at 11:05 PM
-- Server version: 5.6.17-debug-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE IF NOT EXISTS `name` (
`id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`id`, `name`) VALUES
(1, 'Gordon'),
(2, 'Ilya'),
(3, 'Anne');

-- --------------------------------------------------------

--
-- Table structure for table `nouns`
--

CREATE TABLE IF NOT EXISTS `nouns` (
`id` int(255) NOT NULL,
  `nouns` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nouns`
--

INSERT INTO `nouns` (`id`, `nouns`) VALUES
(1, 'school'),
(2, 'mouse'),
(3, 'key');

-- --------------------------------------------------------

--
-- Table structure for table `verbs`
--

CREATE TABLE IF NOT EXISTS `verbs` (
`id` int(255) NOT NULL,
  `verbs` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `verbs`
--

INSERT INTO `verbs` (`id`, `verbs`) VALUES
(1, 'fix'),
(2, 'join'),
(3, 'hop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `name`
--
ALTER TABLE `name`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nouns`
--
ALTER TABLE `nouns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verbs`
--
ALTER TABLE `verbs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nouns`
--
ALTER TABLE `nouns`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `verbs`
--
ALTER TABLE `verbs`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
