-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2013 at 03:45 PM
-- Server version: 5.5.31
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
-- Table structure for table `access_control`
--

CREATE TABLE IF NOT EXISTS `access_control` (
  `group_id` mediumint(8) NOT NULL,
  `control_id` tinyint(2) NOT NULL,
  `controller` tinyint(1) NOT NULL DEFAULT '1',
  `listing` tinyint(1) NOT NULL DEFAULT '0',
  `save` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `others` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`,`control_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`group_id`, `control_id`, `controller`, `listing`, `save`, `edit`, `delete`, `view`, `status`, `others`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(1, 2, 1, 0, 0, 0, 0, 0, 0, 0),
(1, 3, 1, 0, 0, 0, 0, 0, 0, 0),
(1, 4, 1, 1, 1, 0, 1, 1, 0, 0),
(1, 5, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0, 0, 0, 1, 1),
(2, 2, 1, 0, 0, 0, 1, 0, 0, 0),
(2, 3, 1, 0, 1, 0, 0, 0, 0, 0),
(3, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 1, 1, 1, 1, 1, 1, 1, 1);

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
  `shape_id` text NOT NULL,
  `meta_tag` text NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_price` decimal(10,2) NOT NULL,
  `end_price` decimal(10,2) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`cake_id`, `category_id`, `flavour_id`, `title`, `description`, `shape_id`, `meta_tag`, `image`, `status`, `create_date`, `start_price`, `end_price`, `ordering`) VALUES
(1, 16, 16, 'ppp xx yy', 'sdfsdfs', '', 'sdfsdf', 'assets/uploads/cakes/182703_499959052911_507262911_6298707_4183197_n_(1).jpg', 1, '2013-06-03 07:04:42', 100.00, 0.00, 1),
(2, 4, 0, 'Ovaltin', 'fgdfg', '', '', '', 1, '2013-06-03 07:04:42', 200.00, 0.00, 3),
(3, 14, 0, 'xcvxcv', 'xcv', '', '', '', 1, '2013-06-03 07:04:42', 44.00, 0.00, 4),
(4, 14, 0, 'xcvxcvxx', 'xcv', '', '', '', 1, '2013-06-03 07:04:34', 44.00, 0.00, 7),
(5, 14, 0, 'xcvxcvxx asa', 'xcv', '', '', '', 1, '2013-06-03 07:04:42', 44.00, 0.00, 5),
(6, 14, 0, 'sss', 'xcv', '', '', '', 1, '2013-06-03 07:04:42', 200.00, 0.00, 8),
(7, 14, 0, 'black ofrest', 'xcv', '', '', '', 1, '2013-06-03 07:01:49', 200.00, 0.00, 6),
(8, 14, 0, 'black ofrest1', 'xcv', '', '', '', 1, '2013-06-03 07:01:49', 200.00, 0.00, 7),
(9, 14, 0, 'black ofrest2', 'xcv', '', '', '', 1, '2013-06-03 07:01:49', 200.00, 0.00, 8),
(10, 14, 0, 'black ofrest3', 'xcv', '', '', '', 1, '2013-06-03 07:01:49', 200.00, 0.00, 9),
(11, 14, 0, 'black ofrest4', 'xcv', '', '', '', 1, '2013-06-03 07:04:42', 200.00, 0.00, 2),
(12, 14, 0, 'black ofrest5', 'xcv', '', '', '', 1, '2013-06-03 07:04:42', 200.00, 0.00, 9),
(13, 14, 0, 'black ofrest6', 'xcv', '', '', 'assets/uploads/cakes/168978_499959572911_507262911_6298725_176522_n.jpg', 1, '2013-06-03 07:04:34', 200.00, 0.00, 8),
(14, 9, 0, 'New Cake', 'New Cake', '', 'test', '', 1, '2013-06-03 07:04:42', 200.00, 0.00, 6),
(15, 4, 0, 'sadas', 'sadasd', '', '', '', 1, '2013-06-03 07:02:12', 200.00, 0.00, 5),
(16, 4, 0, 'fdgf', 'dfgdfg', '', '', '', 1, '2013-06-03 07:02:12', 56.00, 0.00, 6),
(17, 4, 0, 'dfgdfgdf', 'dfgdfg', '', '', '', 1, '2013-06-03 07:02:12', 5.00, 0.00, 7),
(18, 4, 0, 'cvcxx', 'xcvxc', '', '', '', 1, '2013-06-03 07:02:12', 200.00, 0.00, 8),
(19, 4, 0, 'cxvc', 'xcv', '', '', '', 1, '2013-06-03 07:00:44', 3.00, 0.00, 9),
(20, 4, 0, 'cvxcv', 'xcv', '', '', '', 1, '2013-06-03 07:00:44', 3.00, 0.00, 8),
(21, 4, 0, 'New Cake Black', 'dsfsdf', '', '', '', 1, '2013-06-03 07:00:44', 3.00, 0.00, 7),
(22, 4, 0, 'ddsadas tst', '', '', '', '', 1, '2013-06-03 07:00:44', 100.00, 0.00, 6),
(23, 4, 0, 'ddsadas test', '', '', '', '', 1, '2013-06-03 07:00:44', 100.00, 0.00, 5),
(24, 4, 0, 'ddsadas test1', '', '', '', 'web/assets/uploads/cakes/181939_499958062911_507262911_6298674_1752039_n.jpg', 1, '2013-06-03 07:04:34', 100.00, 0.00, 9),
(25, 13, 0, 'newxx', 'dsfsdf', '', '', '', 1, '2013-06-03 07:04:34', 3.00, 0.00, 6),
(26, 15, 1, 'New Cake Black Forest', 'New Cake Black Forest', '', '', '', 1, '2013-06-03 07:04:34', 2000.00, 3000.00, 0),
(27, 15, 16, 'Raspberry Chocolate Mousse', 'Raspberry Chocolate Mousse', '', '', 'assets/uploads/cakes/shafiq-pic.jpg', 1, '2013-06-03 07:02:12', 120.00, 320.00, 9),
(28, 15, 4, 'Cake Title', 'Cake Title', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', '', '', 1, '2013-06-03 07:04:42', 2.00, 4.00, 7),
(29, 20, 8, 'Vanila Sumis Cake', 'Vanila Sumis Cake ', 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', '', '', 1, '2013-06-04 05:55:06', 123.00, 1245.00, 0),
(30, 24, 15, 'dgff hfghfgh fgh', 'fghf hfg', 'N;', '', '', 1, '2013-06-04 08:12:54', 0.00, 0.00, 0);

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
  `ordering` tinyint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `ordering`, `status`) VALUES
(1, 'dsfsdfsdfs', 1, 1),
(3, 'fghfghfgh', 4, 0),
(4, 'wqweqwe', 5, 0),
(8, 'test', 2, 1),
(9, 'test2', 6, 1),
(13, 'xczxczx', 7, 1),
(14, 'test new', 8, 1),
(15, 'New add category', 0, 1),
(16, 'New add category1', 9, 1),
(17, 'tet', 3, 1),
(18, 'New add category 5', 10, 1),
(19, 'New add category 54', 11, 1),
(20, 'ytruiop', 0, 1),
(21, 'sdsdsdsdasdas', 0, 1),
(22, 'fsfsdfsdf', 0, 1),
(23, 'testxx', 0, 0),
(24, 'srgdfgdf dfgdfg dfgdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `email_notification` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `country`, `notes`, `email_notification`, `status`) VALUES
(1, 'dfsd', 'ytyy', '4345354', 'shafiq@emicrograph.com', '', '', 'ddd', 'ddd', '2233', 'dhaka', 'dhaka', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flavours`
--

CREATE TABLE IF NOT EXISTS `flavours` (
  `flavour_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cake_shape` varchar(50) NOT NULL,
  `fondant` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`flavour_id`, `title`, `cake_shape`, `fondant`, `ordering`, `status`) VALUES
(1, 'Banana Chocolate', 'Round', 1, 3, 1),
(13, 'xczxczx', '', 1, 5, 1),
(14, 'test new', '', 1, 6, 1),
(15, 'dfvdsfgg', '', 1, 7, 1),
(16, 'Raspberry Chocolate Mousse', '', 1, 8, 1),
(17, 'rhthdfbghfg', '', 1, 0, 1),
(18, 'new flavour 1', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `ordering` mediumint(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `ordering`, `status`) VALUES
(1, 'admin', 'Administrator', 2, 1),
(2, 'employee', 'Employee', 0, 1),
(3, 'manager', 'Bakery Manager', 1, 1);

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
  `ordering` mediumint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `title`, `address1`, `address2`, `city`, `province`, `postal_code`, `country`, `pos_api`, `surcharge`, `ordering`, `status`) VALUES
(1, 'Test new', 'sdasd', 'asdas', 'sadsa', '0', '3123', 'Canada', 'xyz', 100.00, 1, 0),
(2, 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 100.00, 2, 1),
(3, 'Dhanmondi', 'Dhanmondi', 'Dhanmondi', '', '', '', '', '', 0.00, 0, 1),
(4, 'Framgate', '', '', '', '', '', '', '', 0.00, 3, 1),
(5, 'Gulshan', '', '', '', '', '', '', '', 0.00, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `location_id` mediumint(5) DEFAULT '0',
  `phone` varchar(20) DEFAULT NULL,
  `postal_code` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `location_id`, `phone`, `postal_code`, `address`) VALUES
(1, 1, 'Admin', 'istrator', 0, '0', '', ''),
(2, 2, 'M Shafiq', 'Islam', NULL, NULL, '', ''),
(3, 3, 'M Shafiq', 'Islam', NULL, NULL, '', ''),
(4, 4, 'fhjf', 'gfhfgh', NULL, NULL, '', ''),
(5, 5, 'M Shafiq', 'Islam', 0, NULL, '', ''),
(6, 6, 'Samiul', 'Amin', 4, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) unsigned NOT NULL DEFAULT '0',
  `order_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delivery_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_id` bigint(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL DEFAULT '0',
  `manager_id` mediumint(8) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_status` varchar(100) NOT NULL,
  `hst` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `bread_burn` tinyint(1) NOT NULL DEFAULT '0',
  `inscription` text NOT NULL,
  `sepecial_instruction` text NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `zone_id` mediumint(5) NOT NULL DEFAULT '0',
  `delivery_zone_surcharge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `flavour_id` mediumint(5) NOT NULL,
  `serving_id` mediumint(5) NOT NULL DEFAULT '0',
  `flavour_price` decimal(10,2) NOT NULL,
  `magic_cake_id` mediumint(5) NOT NULL DEFAULT '0',
  `magic_surcharge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_status` (`order_status`),
  KEY `bread_burn` (`bread_burn`),
  KEY `payment_status` (`payment_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cake_id`, `order_date`, `delivery_date`, `customer_id`, `employee_id`, `manager_id`, `discount_price`, `order_status`, `hst`, `payment_status`, `bread_burn`, `inscription`, `sepecial_instruction`, `location_id`, `zone_id`, `delivery_zone_surcharge`, `flavour_id`, `serving_id`, `flavour_price`, `magic_cake_id`, `magic_surcharge`, `total_amount`) VALUES
(2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 2, 2, 0.00, 'Production', '', '', 0, '', '', 0, 0, 0.00, 0, 0, 0.00, 0, 0.00, 0.00);

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
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`title`, `status`) VALUES
('Production', 1),
('Reject', 1);

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
(3, 1, 2, 2.00),
(3, 1, 3, 0.00),
(3, 1, 4, 0.00),
(3, 1, 5, 1.00),
(3, 1, 6, 0.00),
(3, 1, 7, 0.00),
(3, 1, 8, 0.00),
(3, 13, 2, 0.00),
(3, 13, 3, 0.00),
(3, 13, 4, 0.00),
(3, 13, 5, 2.00),
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
(3, 16, 2, 0.00),
(3, 16, 3, 0.00),
(3, 16, 4, 0.00),
(3, 16, 5, 0.00),
(3, 16, 6, 0.00),
(3, 16, 7, 0.00),
(3, 16, 8, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `servings`
--

CREATE TABLE IF NOT EXISTS `servings` (
  `serving_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ordering` mediumint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`serving_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `servings`
--

INSERT INTO `servings` (`serving_id`, `title`, `size`, `ordering`, `status`) VALUES
(2, '6-8', '6 round', 0, 1),
(3, '20-30', '1/4 slab', 3, 1),
(4, '10-12', '8" round', 1, 1),
(5, '12-15', '9" round', 2, 1),
(6, '15-20', '10" round', 4, 1),
(7, '40-50', '1/2 slab', 5, 1),
(8, '60-80', 'Full slab', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE IF NOT EXISTS `shapes` (
  `shape_id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `ordering` mediumint(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shape_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`shape_id`, `title`, `ordering`, `status`) VALUES
(1, 'Round', 1, 0),
(2, 'Square', 0, 1),
(3, 'Rectangle', 0, 1),
(4, 'Square Round', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1371024608, 1),
(2, 2, '127.0.0.1', 'admin', '3e082c38a4f0eacf970adf483f31fc17630ac754', NULL, '0', NULL, NULL, '66e272b8635eee519049ae53b7b0c89612763d9c', 1368551217, 1368591499, 1),
(3, 2, '127.0.0.1', 'sislam', 'a53c3ffeb3daca8e568e424ce3ad5b10ddc916fc', NULL, '0', NULL, NULL, NULL, 1369204334, 1369204348, 1),
(4, 2, '127.0.0.1', 'admin2', 'af71faa19ef5029f247e88803f3d46225002198b', NULL, '', NULL, NULL, NULL, 1369216210, 1369216210, 1),
(5, 3, '127.0.0.1', 'islam', 'f325887144195c402593e48f1750ae052ea981a6', NULL, 'shafiqx@emicrograph.com', NULL, NULL, '6113e35714c8ad5bb9a9d335205b999a733a7280', 1370943111, 1371029645, 1),
(6, 2, '127.0.0.1', 'samiul', 'ac4c9929aff5b8894eec22497dc77f202c68311c', NULL, 'samiul@gmail.com', NULL, NULL, NULL, 1370943464, 1370943464, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE IF NOT EXISTS `user_control` (
  `control_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`control_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_control`
--

INSERT INTO `user_control` (`control_id`, `controller_name`, `status`) VALUES
(1, 'dashboard', 1),
(2, 'users', 1),
(3, 'categories', 1),
(4, 'flavours', 1),
(5, 'cakes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `surcharge` decimal(10,2) NOT NULL,
  `ordering` mediumint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `title`, `description`, `surcharge`, `ordering`, `status`) VALUES
(1, 'Toronto Opera House', 'Toronto Opera House', 12.00, 1, 1),
(2, 'Cappuccino Meringue', 'ggfgghh', 23.00, 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`title`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;