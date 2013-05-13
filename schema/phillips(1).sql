-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2013 at 10:56 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phillips`
--

-- --------------------------------------------------------

--
-- Table structure for table `blackouts`
--

CREATE TABLE IF NOT EXISTS `blackouts` (
  `blackout_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servings_id` mediumint(5) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`blackout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE IF NOT EXISTS `cakes` (
  `cake_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `meta_tag` text NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_price` decimal(10,2) NOT NULL,
  `end_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`cake_id`, `category_id`, `flavour_id`, `title`, `description`, `meta_tag`, `image`, `status`, `create_date`, `start_price`, `end_price`) VALUES
(1, 16, 16, 'ppp xx yy', 'sdfsdfs', 'sdfsdf', 'assets/uploads/cakes/182703_499959052911_507262911_6298707_4183197_n_(1).jpg', 1, '2013-05-12 06:56:35', 100.00, 0.00),
(2, 4, 0, 'Ovaltin', 'fgdfg', '', '', 1, '2013-04-30 09:57:58', 200.00, 0.00),
(3, 14, 0, 'xcvxcv', 'xcv', '', '', 1, '2013-04-30 09:59:39', 44.00, 0.00),
(4, 14, 0, 'xcvxcvxx', 'xcv', '', '', 1, '2013-04-30 10:04:09', 44.00, 0.00),
(5, 14, 0, 'xcvxcvxx asa', 'xcv', '', '', 1, '2013-04-30 10:06:06', 44.00, 0.00),
(6, 14, 0, 'sss', 'xcv', '', '', 1, '2013-04-30 10:08:02', 200.00, 0.00),
(7, 14, 0, 'black ofrest', 'xcv', '', '', 1, '2013-04-30 10:09:41', 200.00, 0.00),
(8, 14, 0, 'black ofrest1', 'xcv', '', '', 1, '2013-04-30 10:17:21', 200.00, 0.00),
(9, 14, 0, 'black ofrest2', 'xcv', '', '', 1, '2013-04-30 10:17:58', 200.00, 0.00),
(10, 14, 0, 'black ofrest3', 'xcv', '', '', 1, '2013-04-30 10:41:37', 200.00, 0.00),
(11, 14, 0, 'black ofrest4', 'xcv', '', '', 1, '2013-04-30 10:43:35', 200.00, 0.00),
(12, 14, 0, 'black ofrest5', 'xcv', '', '', 1, '2013-04-30 10:44:16', 200.00, 0.00),
(13, 14, 0, 'black ofrest6', 'xcv', '', 'assets/uploads/cakes/168978_499959572911_507262911_6298725_176522_n.jpg', 1, '2013-04-30 12:43:21', 200.00, 0.00),
(14, 9, 0, 'New Cake', 'New Cake', 'test', '', 1, '2013-04-30 11:18:19', 200.00, 0.00),
(15, 4, 0, 'sadas', 'sadasd', '', '', 1, '2013-04-30 11:18:46', 200.00, 0.00),
(16, 4, 0, 'fdgf', 'dfgdfg', '', '', 1, '2013-04-30 11:19:17', 56.00, 0.00),
(17, 4, 0, 'dfgdfgdf', 'dfgdfg', '', '', 1, '2013-04-30 11:20:45', 5.00, 0.00),
(18, 4, 0, 'cvcxx', 'xcvxc', '', '', 1, '2013-04-30 11:22:13', 200.00, 0.00),
(19, 4, 0, 'cxvc', 'xcv', '', '', 1, '2013-04-30 11:22:59', 3.00, 0.00),
(20, 4, 0, 'cvxcv', 'xcv', '', '', 1, '2013-04-30 11:23:24', 3.00, 0.00),
(21, 4, 0, 'New Cake Black', 'dsfsdf', '', '', 1, '2013-04-30 11:29:10', 3.00, 0.00),
(22, 4, 0, 'ddsadas tst', '', '', '', 1, '2013-04-30 11:30:56', 100.00, 0.00),
(23, 4, 0, 'ddsadas test', '', '', '', 1, '2013-04-30 11:33:18', 100.00, 0.00),
(24, 4, 0, 'ddsadas test1', '', '', 'web/assets/uploads/cakes/181939_499958062911_507262911_6298674_1752039_n.jpg', 1, '2013-04-30 11:39:37', 100.00, 0.00),
(25, 13, 0, 'newxx', 'dsfsdf', '', '', 1, '2013-04-30 11:58:34', 3.00, 0.00),
(26, 15, 1, 'New Cake Black Forest', 'New Cake Black Forest', '', '', 1, '2013-05-08 15:34:39', 2000.00, 3000.00),
(27, 15, 16, 'Raspberry Chocolate Mousse', 'Raspberry Chocolate Mousse', '', 'assets/uploads/cakes/shafiq-pic.jpg', 1, '2013-05-12 06:36:14', 120.00, 320.00);

-- --------------------------------------------------------

--
-- Table structure for table `cake_gallery`
--

CREATE TABLE IF NOT EXISTS `cake_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cake_gallery`
--

INSERT INTO `cake_gallery` (`gallery_id`, `cake_id`, `image`, `status`) VALUES
(1, 1, 'assets/uploads/gallery/p17ps6r6kb19l2iqa1718esk15r44.jpg', 1),
(3, 27, 'assets/uploads/gallery/p17qbn96e1v4u1v1tigjqvi1u295.jpg', 1),
(4, 27, 'assets/uploads/gallery/p17qbn96e112cbd01n31rvj130j6.jpg', 1),
(5, 27, 'assets/uploads/gallery/p17qbn96e1hai12tp1dsn168416hf7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `status`) VALUES
(1, 'dsfsdfsdfs', 0),
(3, 'fghfghfgh', 0),
(4, 'wqweqwe', 1),
(8, 'test', 1),
(9, 'test2', 1),
(13, 'xczxczx', 1),
(14, 'test new', 1),
(15, 'New add category', 1),
(16, 'New add category1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `countery` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `email_notification` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flavours`
--

CREATE TABLE IF NOT EXISTS `flavours` (
  `flavour_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cake_shape` varchar(50) NOT NULL,
  `fondant` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`flavour_id`, `title`, `cake_shape`, `fondant`, `status`) VALUES
(1, 'Banana Chocolate', 'Round', 1, 1),
(3, 'Black Forest', '', 1, 0),
(4, 'Cappuccino Meringue', '', 1, 1),
(8, 'test', '', 1, 1),
(9, 'test2', '', 1, 1),
(13, 'xczxczx', '', 1, 1),
(14, 'test new', '', 1, 1),
(15, 'dfvdsfgg', '', 1, 1),
(16, 'Raspberry Chocolate Mousse', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fondants`
--

CREATE TABLE IF NOT EXISTS `fondants` (
  `fondant_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fondant` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`fondant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `address1` text CHARACTER SET utf8 NOT NULL,
  `address2` text CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `country` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pos_api` text CHARACTER SET utf8 NOT NULL,
  `surcharge` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `title`, `address1`, `address2`, `city`, `province`, `postal_code`, `country`, `pos_api`, `surcharge`, `status`) VALUES
(1, 'Test new', 'sdasd', 'asdas', 'sadsa', '0', '3123', 'Canada', 'xyz', 100.00, 0),
(2, 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 100.00, 1),
(3, 'Dhanmondi', 'Dhanmondi', 'Dhanmondi', '', '', '', '', '', 0.00, 1),
(4, 'Framgate', '', '', '', '', '', '', '', 0.00, 1),
(5, 'Gulshan', '', '', '', '', '', '', '', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `magic_cake`
--

CREATE TABLE IF NOT EXISTS `magic_cake` (
  `magic_cake_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `magic_cake_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `surcharge` decimal(10,2) NOT NULL,
  `magic_cake_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`magic_cake_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `magic_cake_orders`
--

CREATE TABLE IF NOT EXISTS `magic_cake_orders` (
  `magic_cake_order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `magic_cake_id` int(10) NOT NULL,
  PRIMARY KEY (`magic_cake_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `postal_code` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`, `postal_code`, `address`) VALUES
(1, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cake_id` bigint(20) NOT NULL,
  `order_date` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `baker_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `hst` varchar(100) NOT NULL,
  `payment_status` varchar(150) NOT NULL,
  `bread_burn` tinyint(1) NOT NULL,
  `inscription` text NOT NULL,
  `sepecial_instruction` text NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `zone_id` mediumint(9) NOT NULL,
  `delivery_zone_surcharge` decimal(10,2) NOT NULL,
  `serving_id` mediumint(5) NOT NULL,
  `serving_price` decimal(10,0) NOT NULL,
  `fondant_id` mediumint(5) NOT NULL,
  `fondant_price` decimal(10,2) NOT NULL,
  `flavor_id` mediumint(5) NOT NULL,
  `flavor_price` decimal(10,2) NOT NULL,
  `size_id` mediumint(5) NOT NULL,
  `size_price` decimal(10,2) NOT NULL,
  `tier_id` mediumint(5) NOT NULL,
  `tier_price` decimal(10,2) NOT NULL,
  `magic_cake_id` mediumint(5) NOT NULL,
  `magic_surcharge` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE IF NOT EXISTS `order_notes` (
  `order_note_id` int(10) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `order_status_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`order_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_amount`
--

CREATE TABLE IF NOT EXISTS `payment_amount` (
  `payment_amount_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_matrix`
--

CREATE TABLE IF NOT EXISTS `price_matrix` (
  `location_id` mediumint(5) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `serving_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`location_id`,`flavour_id`,`serving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_matrix`
--

INSERT INTO `price_matrix` (`location_id`, `flavour_id`, `serving_id`, `price`) VALUES
(2, 1, 2, 1.00),
(2, 1, 3, 2.00),
(2, 1, 4, 3.00),
(2, 1, 5, 4.00),
(2, 1, 6, 5.00),
(2, 1, 7, 6.00),
(2, 1, 8, 7.00),
(2, 4, 2, 2.00),
(2, 4, 3, 0.00),
(2, 4, 4, 0.00),
(2, 4, 5, 0.00),
(2, 4, 6, 0.00),
(2, 4, 7, 0.00),
(2, 4, 8, 0.00),
(2, 8, 2, 3.00),
(2, 8, 3, 0.00),
(2, 8, 4, 0.00),
(2, 8, 5, 0.00),
(2, 8, 6, 0.00),
(2, 8, 7, 0.00),
(2, 8, 8, 0.00),
(2, 9, 2, 4.00),
(2, 9, 3, 0.00),
(2, 9, 4, 0.00),
(2, 9, 5, 0.00),
(2, 9, 6, 0.00),
(2, 9, 7, 0.00),
(2, 9, 8, 0.00),
(2, 13, 2, 5.00),
(2, 13, 3, 0.00),
(2, 13, 4, 0.00),
(2, 13, 5, 0.00),
(2, 13, 6, 0.00),
(2, 13, 7, 0.00),
(2, 13, 8, 0.00),
(2, 14, 2, 6.00),
(2, 14, 3, 0.00),
(2, 14, 4, 0.00),
(2, 14, 5, 0.00),
(2, 14, 6, 0.00),
(2, 14, 7, 0.00),
(2, 14, 8, 0.00),
(2, 15, 2, 7.00),
(2, 15, 3, 0.00),
(2, 15, 4, 0.00),
(2, 15, 5, 0.00),
(2, 15, 6, 0.00),
(2, 15, 7, 0.00),
(2, 15, 8, 0.00),
(2, 16, 2, 8.00),
(2, 16, 3, 0.00),
(2, 16, 4, 0.00),
(2, 16, 5, 0.00),
(2, 16, 6, 0.00),
(2, 16, 7, 0.00),
(2, 16, 8, 0.00),
(3, 1, 2, 1.00),
(3, 1, 3, 2.00),
(3, 1, 4, 3.00),
(3, 1, 5, 4.00),
(3, 1, 6, 5.00),
(3, 1, 7, 6.00),
(3, 1, 8, 7.00),
(3, 4, 2, 0.00),
(3, 4, 3, 0.00),
(3, 4, 4, 0.00),
(3, 4, 5, 0.00),
(3, 4, 6, 0.00),
(3, 4, 7, 0.00),
(3, 4, 8, 0.00),
(3, 8, 2, 0.00),
(3, 8, 3, 0.00),
(3, 8, 4, 0.00),
(3, 8, 5, 0.00),
(3, 8, 6, 0.00),
(3, 8, 7, 0.00),
(3, 8, 8, 0.00),
(3, 9, 2, 0.00),
(3, 9, 3, 0.00),
(3, 9, 4, 0.00),
(3, 9, 5, 0.00),
(3, 9, 6, 0.00),
(3, 9, 7, 0.00),
(3, 9, 8, 0.00),
(3, 13, 2, 0.00),
(3, 13, 3, 0.00),
(3, 13, 4, 0.00),
(3, 13, 5, 0.00),
(3, 13, 6, 0.00),
(3, 13, 7, 0.00),
(3, 13, 8, 0.00),
(3, 14, 2, 0.00),
(3, 14, 3, 0.00),
(3, 14, 4, 0.00),
(3, 14, 5, 0.00),
(3, 14, 6, 0.00),
(3, 14, 7, 0.00),
(3, 14, 8, 0.00),
(3, 15, 2, 0.00),
(3, 15, 3, 0.00),
(3, 15, 4, 0.00),
(3, 15, 5, 0.00),
(3, 15, 6, 0.00),
(3, 15, 7, 0.00),
(3, 15, 8, 0.00),
(3, 16, 2, 9.00),
(3, 16, 3, 8.00),
(3, 16, 4, 7.00),
(3, 16, 5, 6.00),
(3, 16, 6, 5.00),
(3, 16, 7, 4.00),
(3, 16, 8, 3.00),
(4, 1, 2, 1.00),
(4, 1, 3, 2.00),
(4, 1, 4, 0.00),
(4, 1, 5, 0.00),
(4, 1, 6, 0.00),
(4, 1, 7, 0.00),
(4, 1, 8, 0.00),
(4, 4, 2, 2.00),
(4, 4, 3, 0.00),
(4, 4, 4, 0.00),
(4, 4, 5, 0.00),
(4, 4, 6, 0.00),
(4, 4, 7, 0.00),
(4, 4, 8, 0.00),
(4, 8, 2, 0.00),
(4, 8, 3, 0.00),
(4, 8, 4, 0.00),
(4, 8, 5, 0.00),
(4, 8, 6, 0.00),
(4, 8, 7, 0.00),
(4, 8, 8, 0.00),
(4, 9, 2, 0.00),
(4, 9, 3, 0.00),
(4, 9, 4, 0.00),
(4, 9, 5, 0.00),
(4, 9, 6, 0.00),
(4, 9, 7, 0.00),
(4, 9, 8, 0.00),
(4, 13, 2, 0.00),
(4, 13, 3, 0.00),
(4, 13, 4, 0.00),
(4, 13, 5, 0.00),
(4, 13, 6, 0.00),
(4, 13, 7, 0.00),
(4, 13, 8, 0.00),
(4, 14, 2, 0.00),
(4, 14, 3, 0.00),
(4, 14, 4, 0.00),
(4, 14, 5, 0.00),
(4, 14, 6, 0.00),
(4, 14, 7, 0.00),
(4, 14, 8, 0.00),
(4, 15, 2, 0.00),
(4, 15, 3, 0.00),
(4, 15, 4, 0.00),
(4, 15, 5, 0.00),
(4, 15, 6, 0.00),
(4, 15, 7, 0.00),
(4, 15, 8, 0.00),
(4, 16, 2, 0.00),
(4, 16, 3, 0.00),
(4, 16, 4, 0.00),
(4, 16, 5, 0.00),
(4, 16, 6, 0.00),
(4, 16, 7, 0.00),
(4, 16, 8, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `servings`
--

CREATE TABLE IF NOT EXISTS `servings` (
  `serving_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`serving_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `servings`
--

INSERT INTO `servings` (`serving_id`, `title`, `size`, `status`) VALUES
(2, '6-8', '6 round', 1),
(3, '20-30', '1/4 slab', 1),
(4, '10-12', '8" round', 1),
(5, '12-15', '9" round', 1),
(6, '15-20', '10" round', 1),
(7, '40-50', '1/2 slab', 1),
(8, '60-80', 'Full slab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE IF NOT EXISTS `shapes` (
  `shape_id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shape_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`shape_id`, `title`, `status`) VALUES
(1, 'wqdasdd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1368349414, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `surcharge` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `title`, `description`, `surcharge`, `status`) VALUES
(1, 'Toronto Opera House', 'Toronto Opera House', 12.00, 1),
(2, 'Cappuccino Meringue', 'ggfgghh', 23.00, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
