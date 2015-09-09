-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 12:31 AM
-- Server version: 5.5.16
-- PHP Version: 5.4.43

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `picmonic`
--

-- --------------------------------------------------------

--
-- Table structure for table `commit`
--

CREATE TABLE IF NOT EXISTS `commit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sha` varchar(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `committer` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sha_unique` (`sha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_by` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_role` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `display_name`, `image`, `user_role`, `create_time`, `create_by`, `update_time`, `update_by`, `status`) VALUES
(1, 'admin', '393d41a2035a3599bfba7d96d6459b9d03af2855af8dc037a5bf903b72fdab81', 'scott11@scottsdesigns.com', 'ScottyG', '', 1, '2015-01-04 03:54:02', 1, '2015-04-24 02:30:29', 1, 1),
(2, 'picmonic', '5ed50e18046f1bab4e01e0b68429ca462ca0f5ef30f80423d8cc1824d54f4b74', 'picmonic@picmonic.com', 'PicMonic', '', 2, '2015-01-04 03:54:02', 1, '2015-05-17 03:54:40', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_metadata`
--

CREATE TABLE IF NOT EXISTS `user_metadata` (
  `user_id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `user_id_2` (`user_id`,`key`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cell` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biography` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `first_name`, `last_name`, `title`, `phone`, `cell`, `country`, `state`, `city`, `address`, `address2`, `zipcode`, `image`, `biography`, `website`, `facebook`, `twitter`, `youtube`, `googleplus`, `linkedin`, `pinterest`, `instagram`, `update_time`) VALUES
(1, 'Scott', 'Geithman', 'Web Developer / Web Designer', '(602) 541-0555', '(602) 320-5134', 'US', 'AZ', 'Scottsdale', '9487 E Hillery Way, Scottsdale, AZ', '', '85260', '', 'I am the web master known as Scotty G.', 'http://scottsdesigns.com', 'https://www.facebook.com/scott.geithman', 'https://twitter.com/ScottGeithman', 'https://www.youtube.com/channel/UCwMXwEXOdgx3vLpAA0fObOQ', 'https://plus.google.com/u/0/102641868199427329349/posts', 'http://www.linkedin.com/pub/scott-geithman/23/235/869', '', '', '2015-09-09 07:20:25'),
(2, 'Pic', 'Monic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-09-09 07:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL DEFAULT '1',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `create_time`, `create_by`, `update_time`, `update_by`) VALUES
(1, 'Super', '2014-10-16 22:27:16', 1, '0000-00-00 00:00:00', 0),
(2, 'Admin', '2014-10-16 22:27:16', 1, '0000-00-00 00:00:00', 0),
(3, 'Moderator', '2014-10-16 22:27:16', 1, '0000-00-00 00:00:00', 0),
(4, 'Author', '2014-10-29 19:34:29', 1, '0000-00-00 00:00:00', 0),
(5, 'Registered', '2014-10-16 22:27:16', 1, '0000-00-00 00:00:00', 0),
(6, 'Pending', '2015-08-19 00:56:52', 1, '0000-00-00 00:00:00', 0),
(7, 'Suspended', '2015-08-19 00:56:52', 1, '0000-00-00 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`user_role`) REFERENCES `user_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_metadata`
--
ALTER TABLE `user_metadata`
  ADD CONSTRAINT `user_metadata` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
