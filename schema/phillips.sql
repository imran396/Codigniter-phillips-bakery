-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 12:28 PM
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
-- Table structure for table `access_control`
--

CREATE TABLE IF NOT EXISTS `access_control` (
  `group_id` mediumint(8) NOT NULL,
  `control_id` tinyint(2) NOT NULL,
  `controller` tinyint(1) NOT NULL DEFAULT '1',
  `create` tinyint(1) NOT NULL DEFAULT '0',
  `update` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `others` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`,`control_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`group_id`, `control_id`, `controller`, `create`, `update`, `delete`, `status`, `others`) VALUES
(1, 1, 0, 0, 1, 0, 1, 0),
(1, 2, 0, 0, 0, 0, 0, 0),
(1, 3, 1, 1, 1, 1, 1, 1);

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
  PRIMARY KEY (`cake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `cake_gallery`
--

CREATE TABLE IF NOT EXISTS `cake_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`flavour_id`, `title`, `cake_shape`, `fondant`, `status`) VALUES
(1, 'Banana Chocolate', 'Round', 1, 1),
(2, 'Black Forest', '', 1, 0),
(3, 'Cappuccino Meringue', '', 1, 1);

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `status`) VALUES
(1, 'admin', 'Administrator', 1),
(2, 'members', 'General User', 1),
(4, 'adminx', 'adminx', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `title`, `address1`, `address2`, `city`, `province`, `postal_code`, `country`, `pos_api`, `surcharge`, `status`) VALUES
(1, 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 'Toronto Opera House', 100.00, 1),
(2, 'Dhanmondi', 'Dhanmondi', 'Dhanmondi', '', '', '', '', '', 0.00, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`, `postal_code`, `address`) VALUES
(1, 1, 'Super', 'Administrator', 'ADMIN', '0', '', ''),
(2, 2, 'M Shafiq', 'Islam', NULL, NULL, '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`shape_id`, `title`, `status`) VALUES
(1, 'Round', 1),
(2, 'Square', 1),
(3, 'Rectangle', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1369201001, 1),
(2, 2, '127.0.0.1', 'admin', '3e082c38a4f0eacf970adf483f31fc17630ac754', NULL, '0', NULL, NULL, '66e272b8635eee519049ae53b7b0c89612763d9c', 1368551217, 1368591499, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE IF NOT EXISTS `user_control` (
  `control_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`control_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_control`
--

INSERT INTO `user_control` (`control_id`, `controller_name`, `status`) VALUES
(1, 'zxczxc', 1),
(2, 'users', 1),
(3, 'categories', 1);

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
