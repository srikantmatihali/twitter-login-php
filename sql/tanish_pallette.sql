-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 04:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tanish_pallette`
--

-- --------------------------------------------------------

--
-- Table structure for table `ringlist`
--

CREATE TABLE IF NOT EXISTS `ringlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ringlist`
--

INSERT INTO `ringlist` (`id`, `name`, `status`) VALUES
(1, 'blue', 1),
(2, 'red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `usid` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `profile_image_url` varchar(500) NOT NULL,
  `screen_name` varchar(500) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2569 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `tid` varchar(200) NOT NULL,
  `screen_name` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `oauth_token` varchar(100) NOT NULL,
  `oauth_token_secret` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=406 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
