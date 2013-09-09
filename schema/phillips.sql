-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2013 at 07:26 AM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.7

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
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 2, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 4, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 6, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 8, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 9, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 10, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 11, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 12, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 13, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 14, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 15, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 16, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 17, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 18, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 0, 0, 0, 0, 1, 1),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 5, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 6, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 7, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 8, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 10, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 11, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 12, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 13, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 14, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 15, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 16, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 17, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 18, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(3, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 6, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 7, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 8, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 9, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 10, 1, 1, 1, 1, 0, 0, 0, 0),
(3, 11, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 12, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 13, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 14, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 15, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 16, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 17, 1, 1, 0, 0, 0, 0, 0, 0),
(3, 18, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `auditlog`
--

CREATE TABLE IF NOT EXISTS `auditlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `audit_name` tinytext,
  `description` text,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=616 ;

--
-- Dumping data for table `auditlog`
--

INSERT INTO `auditlog` (`id`, `employee_id`, `audit_name`, `description`, `created_time`) VALUES
(1, '0', 'order created', 'order_id = 1, customer_id=2,totalprice =30,overrideprice=', '2013-08-27 13:25:51'),
(2, 'SP-10000', 'login', '0', '2013-08-27 13:35:29'),
(3, 'SP-10012', 'login', 'des_lo', '2013-08-27 15:30:30'),
(4, 'SP-10011', 'customer created', 'customer_id=3', '2013-08-27 16:01:17'),
(5, 'SP-10011', 'order created', 'order_id = 3, customer_id=3,totalprice =55,overrideprice=', '2013-08-27 16:04:58'),
(6, 'SP-10011', 'order created', 'order_id = 4, customer_id=3,totalprice =55,overrideprice=', '2013-08-27 16:05:23'),
(7, 'SP-10011', 'order created', 'order_id = 5, customer_id=3,totalprice =55,overrideprice=', '2013-08-27 16:06:06'),
(8, 'SP-10011', 'order created', 'order_id = 6, customer_id=3,totalprice =65,overrideprice=', '2013-08-27 16:16:35'),
(9, 'SP-10011', 'order created', 'order_id = 7, customer_id=3,totalprice =65,overrideprice=', '2013-08-27 16:17:42'),
(10, 'SP-10011', 'order created', 'order_id = 8, customer_id=3,totalprice =65,overrideprice=', '2013-08-27 16:19:39'),
(11, 'SP-10011', 'order created', 'order_id = 9, customer_id=3,totalprice =22,overrideprice=', '2013-08-27 16:42:47'),
(12, 'SP-10011', 'login', '0', '2013-08-27 16:52:17'),
(13, 'SP-10011', 'order created', 'order_id = 10, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:01:58'),
(14, 'SP-10011', 'order created', 'order_id = 11, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:02:19'),
(15, 'SP-10011', 'order created', 'order_id = 12, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:02:45'),
(16, 'SP-10011', 'order created', 'order_id = 13, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:03:05'),
(17, 'SP-10011', 'order created', 'order_id = 14, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:05:53'),
(18, 'SP-10011', 'login', '0', '2013-08-27 17:12:04'),
(19, 'SP-10011', 'order created', 'order_id = 15, customer_id=3,totalprice =22,overrideprice=', '2013-08-27 17:15:07'),
(20, 'SP-10011', 'order created', 'order_id = 16, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:15:43'),
(21, 'SP-10011', 'order created', 'order_id = 17, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:15:56'),
(22, 'SP-10011', 'order created', 'order_id = 18, customer_id=3,totalprice =37,overrideprice=', '2013-08-27 17:18:02'),
(23, 'SP-10011', 'order created', 'order_id = 19, customer_id=3,totalprice =37,overrideprice=', '2013-08-27 17:18:22'),
(24, 'SP-10011', 'order created', 'order_id = 20, customer_id=3,totalprice =12,overrideprice=', '2013-08-27 17:19:14'),
(25, 'SP-10011', 'order created', 'order_id = 21, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:25:40'),
(26, 'SP-10011', 'order created', 'order_id = 22, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:26:04'),
(27, 'SP-10011', 'order created', 'order_id = 23, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:26:36'),
(28, 'SP-10011', 'order created', 'order_id = 24, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:26:47'),
(29, 'SP-10011', 'order created', 'order_id = 25, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:27:49'),
(30, 'SP-10011', 'order created', 'order_id = 26, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:28:05'),
(31, 'SP-10011', 'order created', 'order_id = 27, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:28:52'),
(32, 'SP-10011', 'order created', 'order_id = 28, customer_id=3,totalprice =42,overrideprice=', '2013-08-27 17:29:28'),
(33, 'SP-10011', 'order created', 'order_id = 29, customer_id=4,totalprice =0.00,overrideprice=0.00', '2013-08-27 17:31:23'),
(34, 'SP-10011', 'order created', 'order_id = 30, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:31:59'),
(35, 'SP-10011', 'order created', 'order_id = 31, customer_id=3,totalprice =72,overrideprice=', '2013-08-27 17:32:28'),
(36, 'SP-10011', 'order created', 'order_id = 32, customer_id=3,totalprice =22,overrideprice=', '2013-08-27 17:33:30'),
(37, 'SP-10011', 'order created', 'order_id = 33, customer_id=3,totalprice =22,overrideprice=', '2013-08-27 17:34:13'),
(38, 'SP-10011', 'order created', 'order_id = 34, customer_id=3,totalprice =27,overrideprice=', '2013-08-27 17:35:20'),
(39, 'SP-10011', 'order created', 'order_id = 35, customer_id=3,totalprice =27,overrideprice=', '2013-08-27 17:35:49'),
(40, 'SP-10011', 'order created', 'order_id = 36, customer_id=4,totalprice =106,overrideprice=0.00', '2013-08-27 17:36:09'),
(41, 'SP-10011', 'order created', 'order_id = 37, customer_id=4,totalprice =260,overrideprice=0.00', '2013-08-27 17:40:01'),
(42, 'SP-10011', 'order created', 'order_id = 38, customer_id=3,totalprice =52,overrideprice=', '2013-08-27 17:40:04'),
(43, 'SP-10011', 'order created', 'order_id = 39, customer_id=3,totalprice =52,overrideprice=', '2013-08-27 17:41:39'),
(44, 'SP-10011', 'order created', 'order_id = 40, customer_id=4,totalprice =0.00,overrideprice=0.00', '2013-08-27 17:45:00'),
(45, 'SP-10011', 'login', '0', '2013-08-27 17:46:52'),
(46, 'SP-10011', 'order created', 'order_id = 41, customer_id=4,totalprice =0.00,overrideprice=0.00', '2013-08-27 17:51:48'),
(47, 'SP-10011', 'order created', 'order_id = 42, customer_id=4,totalprice =35,overrideprice=0.00', '2013-08-27 17:53:32'),
(48, 'SP-10011', 'order created', 'order_id = 43, customer_id=4,totalprice =30,overrideprice=50.00', '2013-08-27 17:55:23'),
(49, 'SP-10011', 'logout', 'spencer_s', '2013-08-27 18:03:01'),
(50, 'SP-10011', 'order created', 'order_id = 44, customer_id=4,totalprice =101,overrideprice=120', '2013-08-27 18:03:14'),
(51, 'SP-10011', 'order created', 'order_id = 45, customer_id=3,totalprice =95,overrideprice=', '2013-08-27 18:12:11'),
(52, 'SP-10011', 'order created', 'order_id = 46, customer_id=3,totalprice =95,overrideprice=', '2013-08-27 18:18:21'),
(53, 'SP-10011', 'login', '0', '2013-08-27 18:37:14'),
(54, 'SP-10011', 'login', 'spencer_s', '2013-08-27 18:45:38'),
(55, 'SP-10011', 'order created', 'order_id = 47, customer_id=3,totalprice =27,overrideprice=', '2013-08-27 20:21:51'),
(56, 'SP-10011', 'order created', 'order_id = 48, customer_id=3,totalprice =27,overrideprice=', '2013-08-27 20:22:12'),
(57, 'SP-10011', 'order created', 'order_id = 49, customer_id=3,totalprice =22,overrideprice=', '2013-08-27 20:23:45'),
(58, 'SP-10000', 'login', '0', '2013-08-27 20:30:52'),
(59, 'SP-10011', 'order created', 'order_id = 50, customer_id=3,totalprice =95,overrideprice=0.00', '2013-08-27 20:39:56'),
(60, 'SP-10011', 'order created', 'order_id = 51, customer_id=3,totalprice =86,overrideprice=0.00', '2013-08-27 20:46:55'),
(61, 'SP-10011', 'order created', 'order_id = 52, customer_id=3,totalprice =95,overrideprice=0.00', '2013-08-27 20:51:12'),
(62, 'SP-10000', 'login', 'administrator', '2013-08-28 05:03:20'),
(63, 'SP-10000', 'login', '0', '2013-08-28 05:03:37'),
(64, 'SP-10000', 'login', '0', '2013-08-28 05:30:53'),
(65, 'SP-10001', 'order created', 'order_id = 53, customer_id=6,totalprice =55,overrideprice=', '2013-08-28 05:32:58'),
(66, 'SP-10001', 'order created', 'order_id = 54, customer_id=6,totalprice =46,overrideprice=', '2013-08-28 05:34:09'),
(67, 'SP-10001', 'order created', 'order_id = 55, customer_id=6,totalprice =86,overrideprice=', '2013-08-28 05:35:43'),
(68, 'SP-10001', 'order created', 'order_id = 56, customer_id=6,totalprice =86,overrideprice=', '2013-08-28 05:35:50'),
(69, 'SP-10011', 'order created', 'order_id = 57, customer_id=1,totalprice =27,overrideprice=0.00', '2013-08-28 05:36:31'),
(70, 'SP-10001', 'order created', 'order_id = 58, customer_id=6,totalprice =80,overrideprice=', '2013-08-28 05:37:52'),
(71, 'SP-10001', 'order created', 'order_id = 59, customer_id=6,totalprice =80,overrideprice=', '2013-08-28 05:37:58'),
(72, 'SP-10001', 'order created', 'order_id = 60, customer_id=6,totalprice =40,overrideprice=', '2013-08-28 05:38:51'),
(73, 'SP-10001', 'order created', 'order_id = 61, customer_id=6,totalprice =46,overrideprice=', '2013-08-28 05:41:14'),
(74, 'SP-10001', 'order created', 'order_id = 62, customer_id=7,totalprice =60,overrideprice=', '2013-08-28 05:43:15'),
(75, 'SP-10001', 'order created', 'order_id = 63, customer_id=7,totalprice =46,overrideprice=', '2013-08-28 05:45:18'),
(76, 'SP-10001', 'order created', 'order_id = 64, customer_id=6,totalprice =27,overrideprice=', '2013-08-28 05:47:28'),
(77, 'SP-10000', 'customer created', 'customer_id=11', '2013-08-28 05:55:24'),
(78, 'SP-10000', 'order created', 'order_id = 65, customer_id=11,totalprice =95,overrideprice=', '2013-08-28 05:55:48'),
(79, 'SP-10000', 'order created', 'order_id = 66, customer_id=11,totalprice =95,overrideprice=', '2013-08-28 05:56:27'),
(80, 'SP-10000', 'customer created', 'customer_id=12', '2013-08-28 06:02:58'),
(81, 'SP-10000', 'order created', 'order_id = 67, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 06:03:26'),
(82, 'SP-10000', 'order created', 'order_id = 68, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 06:04:24'),
(83, 'SP-10000', 'order created', 'order_id = 69, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 06:05:19'),
(84, 'SP-10012', 'order created', 'order_id = 70, customer_id=11,totalprice =50,overrideprice=0.00', '2013-08-28 06:11:16'),
(85, '0', 'order created', 'order_id = 71, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-08-28 06:16:53'),
(86, 'SP-10000', 'customer created', 'customer_id=13', '2013-08-28 06:17:24'),
(87, 'SP-10000', 'order created', 'order_id = 72, customer_id=13,totalprice =103,overrideprice=', '2013-08-28 06:18:01'),
(88, '0', 'order created', 'order_id = 73, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-08-28 06:18:24'),
(89, 'SP-10000', 'order created', 'order_id = 74, customer_id=13,totalprice =103,overrideprice=', '2013-08-28 06:19:13'),
(90, 'SP-10000', 'customer created', 'customer_id=14', '2013-08-28 06:30:37'),
(91, 'SP-10000', 'order created', 'order_id = 75, customer_id=14,totalprice =33,overrideprice=33', '2013-08-28 06:30:42'),
(92, 'SP-10000', 'customer created', 'customer_id=15', '2013-08-28 06:52:57'),
(93, 'SP-10000', 'order created', 'order_id = 76, customer_id=15,totalprice =65,overrideprice=', '2013-08-28 06:53:54'),
(94, 'SP-10000', 'customer created', 'customer_id=16', '2013-08-28 07:02:01'),
(95, 'SP-10000', 'order created', 'order_id = 77, customer_id=16,totalprice =78,overrideprice=', '2013-08-28 07:03:35'),
(96, 'SP-10000', 'order created', 'order_id = 78, customer_id=16,totalprice =78,overrideprice=', '2013-08-28 07:07:29'),
(97, 'SP-10000', 'customer created', 'customer_id=17', '2013-08-28 07:15:40'),
(98, 'SP-10000', 'order created', 'order_id = 79, customer_id=17,totalprice =65,overrideprice=', '2013-08-28 07:16:52'),
(99, 'SP-10000', 'order created', 'order_id = 80, customer_id=17,totalprice =65,overrideprice=', '2013-08-28 07:17:39'),
(100, 'SP-10000', 'login', '0', '2013-08-28 10:20:18'),
(101, '0', 'order created', 'order_id = 71, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-08-28 10:38:23'),
(102, '0', 'order updated', 'order_id = 71, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-08-28 10:39:18'),
(103, '0', 'order updated', 'order_id = 71, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-08-28 10:40:33'),
(104, 'SP-10000', 'order created', 'order_id = 82, customer_id=6,totalprice =66,overrideprice=', '2013-08-28 11:45:44'),
(105, 'SP-10000', 'login', 'administrator', '2013-08-28 11:58:22'),
(106, 'SP-10000', 'customer created', 'customer_id=18', '2013-08-28 11:58:24'),
(107, 'SP-10000', 'order created', 'order_id = 83, customer_id=18,totalprice =56,overrideprice=', '2013-08-28 11:58:25'),
(108, 'SP-10000', 'order created', 'order_id = 84, customer_id=11,totalprice =95,overrideprice=', '2013-08-28 11:59:25'),
(109, 'SP-10000', 'order created', 'order_id = 85, customer_id=13,totalprice =103,overrideprice=', '2013-08-28 11:59:34'),
(110, 'SP-10000', 'order created', 'order_id = 86, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 12:00:01'),
(111, 'SP-10000', 'order created', 'order_id = 87, customer_id=16,totalprice =78,overrideprice=', '2013-08-28 12:00:10'),
(112, 'SP-10000', 'order created', 'order_id = 88, customer_id=17,totalprice =65,overrideprice=', '2013-08-28 12:00:16'),
(113, 'SP-10000', 'order created', 'order_id = 89, customer_id=11,totalprice =95,overrideprice=', '2013-08-28 12:02:52'),
(114, 'SP-10000', 'order created', 'order_id = 90, customer_id=13,totalprice =103,overrideprice=', '2013-08-28 12:02:52'),
(115, 'SP-10000', 'order created', 'order_id = 91, customer_id=17,totalprice =65,overrideprice=', '2013-08-28 12:02:59'),
(116, 'SP-10000', 'order created', 'order_id = 92, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 12:03:10'),
(117, 'SP-10000', 'order created', 'order_id = 93, customer_id=16,totalprice =78,overrideprice=', '2013-08-28 12:03:51'),
(118, 'SP-10000', 'order created', 'order_id = 94, customer_id=11,totalprice =95,overrideprice=', '2013-08-28 12:06:53'),
(119, 'SP-10000', 'order created', 'order_id = 95, customer_id=17,totalprice =65,overrideprice=', '2013-08-28 12:07:02'),
(120, 'SP-10000', 'order created', 'order_id = 96, customer_id=13,totalprice =103,overrideprice=', '2013-08-28 12:07:11'),
(121, 'SP-10000', 'order created', 'order_id = 97, customer_id=12,totalprice =95,overrideprice=', '2013-08-28 12:07:17'),
(122, 'SP-10000', 'order created', 'order_id = 98, customer_id=16,totalprice =78,overrideprice=', '2013-08-28 12:07:32'),
(123, 'SP-10000', 'order created', 'order_id = 99, customer_id=15,totalprice =32,overrideprice=32', '2013-08-28 12:08:47'),
(124, 'SP-10000', 'customer created', 'customer_id=19', '2013-08-28 12:08:47'),
(125, 'SP-10000', 'order created', 'order_id = 100, customer_id=19,totalprice =21,overrideprice=21', '2013-08-28 12:08:47'),
(126, 'SP-10000', 'order created', 'order_id = 101, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:09:43'),
(127, 'SP-10000', 'order created', 'order_id = 102, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:09:53'),
(128, 'SP-10000', 'order created', 'order_id = 103, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:11:34'),
(129, 'SP-10000', 'order created', 'order_id = 104, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:11:44'),
(130, 'SP-10000', 'order created', 'order_id = 105, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:12:38'),
(131, 'SP-10000', 'order created', 'order_id = 106, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:12:45'),
(132, 'SP-10000', 'customer created', 'customer_id=20', '2013-08-28 12:16:09'),
(133, 'SP-10000', 'order created', 'order_id = 107, customer_id=20,totalprice =50,overrideprice=', '2013-08-28 12:16:10'),
(134, 'SP-10000', 'order created', 'order_id = 108, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:16:56'),
(135, 'SP-10000', 'order created', 'order_id = 109, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:17:09'),
(136, 'SP-10000', 'order created', 'order_id = 110, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:20:50'),
(137, 'SP-10000', 'order created', 'order_id = 111, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:21:13'),
(138, 'SP-10000', 'order created', 'order_id = 112, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:22:53'),
(139, 'SP-10000', 'order created', 'order_id = 113, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:23:11'),
(140, 'SP-10000', 'login', '0', '2013-08-28 12:34:08'),
(141, 'SP-10000', 'order created', 'order_id = 114, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:34:18'),
(142, 'SP-10000', 'order created', 'order_id = 115, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:34:24'),
(143, 'SP-10000', 'order created', 'order_id = 116, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 12:47:29'),
(144, 'SP-10000', 'order created', 'order_id = 117, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 12:47:42'),
(145, 'SP-10000', 'login', 'administrator', '2013-08-28 12:48:15'),
(146, 'SP-10000', 'login', '0', '2013-08-28 13:12:34'),
(147, 'SP-10000', 'login', '0', '2013-08-28 13:12:41'),
(148, 'SP-10000', 'order created', 'order_id = 119, customer_id=67,totalprice =320,overrideprice=320', '2013-08-28 14:20:10'),
(149, 'SP-10000', 'order created', 'order_id = 120, customer_id=67,totalprice =200,overrideprice=200', '2013-08-28 14:20:15'),
(150, 'SP-10000', 'order created', 'order_id = 121, customer_id=6,totalprice =46,overrideprice=', '2013-08-28 14:21:29'),
(151, 'SP-10000', 'customer created', 'customer_id=21', '2013-08-28 14:24:19'),
(152, 'SP-10000', 'order created', 'order_id = 122, customer_id=21,totalprice =40,overrideprice=', '2013-08-28 14:24:20'),
(153, 'SP-10011', 'order created', 'order_id = 123, customer_id=3,totalprice =30,overrideprice=', '2013-08-28 14:26:28'),
(154, 'SP-10000', 'customer created', 'customer_id=22', '2013-08-28 14:27:13'),
(155, 'SP-10000', 'order created', 'order_id = 124, customer_id=22,totalprice =90,overrideprice=', '2013-08-28 14:27:14'),
(156, 'SP-10000', 'order created', 'order_id = 125, customer_id=22,totalprice =90,overrideprice=', '2013-08-28 14:27:54'),
(157, 'SP-10000', 'customer created', 'customer_id=23', '2013-08-28 14:31:31'),
(158, 'SP-10000', 'order created', 'order_id = 126, customer_id=23,totalprice =135,overrideprice=', '2013-08-28 14:32:20'),
(159, 'SP-10000', 'order created', 'order_id = 127, customer_id=23,totalprice =135,overrideprice=', '2013-08-28 14:32:59'),
(160, 'SP-10011', 'order created', 'order_id = 128, customer_id=3,totalprice =40,overrideprice=', '2013-08-28 14:33:33'),
(161, 'SP-10011', 'order created', 'order_id = 129, customer_id=3,totalprice =40,overrideprice=', '2013-08-28 14:33:54'),
(162, 'SP-10011', 'order created', 'order_id = 130, customer_id=3,totalprice =40,overrideprice=', '2013-08-28 14:34:54'),
(163, 'SP-10011', 'customer created', 'customer_id=24', '2013-08-28 14:36:05'),
(164, 'SP-10011', 'order created', 'order_id = 131, customer_id=24,totalprice =40,overrideprice=', '2013-08-28 14:36:06'),
(165, 'SP-10000', 'customer created', 'customer_id=23', '2013-08-28 14:36:44'),
(166, 'SP-10011', 'order created', 'order_id = 132, customer_id=3,totalprice =40,overrideprice=', '2013-08-28 14:36:47'),
(167, 'SP-10011', 'customer created', 'customer_id=25', '2013-08-28 14:42:29'),
(168, 'SP-10011', 'order created', 'order_id = 133, customer_id=25,totalprice =155,overrideprice=', '2013-08-28 14:42:36'),
(169, 'SP-10011', 'customer created', 'customer_id=25', '2013-08-28 14:43:36'),
(170, 'SP-10011', 'order created', 'order_id = 134, customer_id=25,totalprice =155,overrideprice=', '2013-08-28 14:43:46'),
(171, 'SP-10011', 'order created', 'order_id = 135, customer_id=25,totalprice =155,overrideprice=', '2013-08-28 14:44:11'),
(172, 'SP-10011', 'order created', 'order_id = 136, customer_id=25,totalprice =155,overrideprice=', '2013-08-28 14:44:36'),
(173, 'SP-10011', 'customer created', 'customer_id=26', '2013-08-28 14:51:57'),
(174, 'SP-10011', 'order created', 'order_id = 137, customer_id=26,totalprice =60,overrideprice=', '2013-08-28 14:51:58'),
(175, 'SP-10011', 'customer created', 'customer_id=26', '2013-08-28 14:52:19'),
(176, 'SP-10011', 'order created', 'order_id = 138, customer_id=26,totalprice =60,overrideprice=', '2013-08-28 14:52:30'),
(177, 'SP-10011', 'order created', 'order_id = 139, customer_id=26,totalprice =27,overrideprice=', '2013-08-28 14:53:24'),
(178, 'SP-10000', 'logout', 'administrator', '2013-08-28 15:09:11'),
(179, 'SP-10011', 'customer created', 'customer_id=27', '2013-08-28 16:34:32'),
(180, 'SP-10011', 'order created', 'order_id = 140, customer_id=27,totalprice =80,overrideprice=80', '2013-08-28 16:34:34'),
(181, 'SP-10011', 'customer created', 'customer_id=27', '2013-08-28 16:40:36'),
(182, 'SP-10011', 'order created', 'order_id = 141, customer_id=27,totalprice =80,overrideprice=80', '2013-08-28 16:41:02'),
(183, 'SP-10011', 'order created', 'order_id = 142, customer_id=27,totalprice =100,overrideprice=100', '2013-08-28 16:42:57'),
(184, 'SP-10000', 'login', '0', '2013-08-28 16:47:06'),
(185, 'SP-10000', 'logout', 'administrator', '2013-08-28 16:53:12'),
(186, 'SP-10000', 'login', '0', '2013-08-28 16:53:18'),
(187, 'SP-10011', 'order created', 'order_id = 143, customer_id=25,totalprice =155,overrideprice=', '2013-08-28 17:02:29'),
(188, 'SP-10011', 'order created', 'order_id = 144, customer_id=3,totalprice =40,overrideprice=', '2013-08-28 17:02:31'),
(189, 'SP-10000', 'login', '0', '2013-08-28 19:38:15'),
(190, 'SP-10000', 'login', 'administrator', '2013-08-29 04:51:20'),
(191, 'SP-10000', 'customer created', 'customer_id=28', '2013-08-29 06:20:15'),
(192, 'SP-10000', 'order created', 'order_id = 145, customer_id=28,totalprice =101,overrideprice=', '2013-08-29 06:22:27'),
(193, 'SP-10000', 'order created', 'order_id = 146, customer_id=23,totalprice =135,overrideprice=', '2013-08-29 06:23:30'),
(194, 'SP-10000', 'order created', 'order_id = 147, customer_id=23,totalprice =135,overrideprice=', '2013-08-29 06:34:50'),
(195, 'SP-10000', 'order created', 'order_id = 148, customer_id=23,totalprice =135,overrideprice=', '2013-08-29 06:51:54'),
(196, 'SP-10000', 'login', '0', '2013-08-29 08:18:02'),
(197, 'SP-10000', 'customer created', 'customer_id=29', '2013-08-29 08:52:04'),
(198, 'SP-10000', 'order created', 'order_id = 149, customer_id=29,totalprice =58,overrideprice=', '2013-08-29 08:52:05'),
(199, 'SP-10000', 'order created', 'order_id = 150, customer_id=29,totalprice =58,overrideprice=', '2013-08-29 08:55:05'),
(200, 'SP-10000', 'order created', 'order_id = 151, customer_id=29,totalprice =70,overrideprice=70', '2013-08-29 08:55:21'),
(201, 'SP-10000', 'login', '0', '2013-08-29 09:56:12'),
(202, 'SP-10000', 'customer created', 'customer_id=30', '2013-08-29 10:08:16'),
(203, 'SP-10000', 'order created', 'order_id = 152, customer_id=30,totalprice =22,overrideprice=', '2013-08-29 10:08:18'),
(204, 'SP-10000', 'customer created', 'customer_id=31', '2013-08-29 10:08:24'),
(205, 'SP-10000', 'order created', 'order_id = 153, customer_id=31,totalprice =22,overrideprice=', '2013-08-29 10:08:26'),
(206, 'SP-10000', 'customer created', 'customer_id=30', '2013-08-29 11:05:28'),
(207, 'SP-10000', 'order created', 'order_id = 154, customer_id=30,totalprice =22,overrideprice=', '2013-08-29 11:05:31'),
(208, 'SP-10000', 'customer created', 'customer_id=30', '2013-08-29 11:10:21'),
(209, 'SP-10000', 'order created', 'order_id = 155, customer_id=30,totalprice =60,overrideprice=60', '2013-08-29 11:10:22'),
(210, 'SP-10000', 'customer created', 'customer_id=30', '2013-08-29 11:12:11'),
(211, 'SP-10000', 'order created', 'order_id = 156, customer_id=30,totalprice =30,overrideprice=', '2013-08-29 11:12:12'),
(212, 'SP-10000', 'customer created', 'customer_id=30', '2013-08-29 11:19:22'),
(213, 'SP-10000', 'order created', 'order_id = 157, customer_id=30,totalprice =22,overrideprice=', '2013-08-29 11:19:23'),
(214, 'SP-10000', 'login', '0', '2013-08-29 12:16:36'),
(215, 'SP-10011', 'login', '0', '2013-08-29 14:00:40'),
(216, 'SP-10000', 'login', '0', '2013-08-30 03:01:21'),
(217, 'SP-10001', 'customer created', 'customer_id=32', '2013-09-02 05:55:59'),
(218, 'SP-10001', 'order created', 'order_id = 158, customer_id=32,totalprice =96,overrideprice=', '2013-09-02 05:57:28'),
(219, 'SP-10001', 'order created', 'order_id = 159, customer_id=32,totalprice =96,overrideprice=', '2013-09-02 05:59:11'),
(220, 'SP-10000', 'login', 'administrator', '2013-09-02 05:59:52'),
(221, 'SP-10000', 'order created', 'order_id = 160, customer_id=23,totalprice =135,overrideprice=', '2013-09-02 06:02:31'),
(222, 'SP-10001', 'customer created', 'customer_id=33', '2013-09-02 06:23:44'),
(223, 'SP-10001', 'order created', 'order_id = 161, customer_id=33,totalprice =105,overrideprice=', '2013-09-02 06:25:10'),
(224, 'SP-10001', 'order created', 'order_id = 162, customer_id=33,totalprice =105,overrideprice=', '2013-09-02 06:26:08'),
(225, 'SP-10001', 'customer created', 'customer_id=34', '2013-09-02 06:43:29'),
(226, 'SP-10001', 'order created', 'order_id = 163, customer_id=34,totalprice =105,overrideprice=', '2013-09-02 06:47:01'),
(227, 'SP-10001', 'customer created', 'customer_id=35', '2013-09-02 07:05:21'),
(228, 'SP-10001', 'order created', 'order_id = 164, customer_id=35,totalprice =120,overrideprice=', '2013-09-02 07:06:08'),
(229, 'SP-10001', 'order created', 'order_id = 165, customer_id=35,totalprice =120,overrideprice=', '2013-09-02 07:07:37'),
(230, 'SP-10000', 'login', '0', '2013-09-02 07:31:02'),
(231, 'SP-10000', 'login', '0', '2013-09-02 08:26:32'),
(232, 'SP-10000', 'order created', 'order_id = 166, customer_id=1,totalprice =12,overrideprice=12', '2013-09-03 08:15:45'),
(233, 'SP-10000', 'order created', 'order_id = 167, customer_id=14,totalprice =40,overrideprice=', '2013-09-03 08:26:03'),
(234, 'SP-10000', 'login', '0', '2013-09-03 08:51:12'),
(235, 'SP-10001', 'order created', 'order_id = 168, customer_id=23,totalprice =86,overrideprice=', '2013-09-03 08:51:59'),
(236, 'SP-10001', 'order created', 'order_id = 169, customer_id=23,totalprice =86,overrideprice=', '2013-09-03 08:52:16'),
(237, 'SP-10001', 'order created', 'order_id = 170, customer_id=33,totalprice =60,overrideprice=', '2013-09-03 08:54:10'),
(238, 'SP-10001', 'order created', 'order_id = 171, customer_id=2,totalprice =80,overrideprice=', '2013-09-03 08:55:46'),
(239, 'SP-10001', 'order created', 'order_id = 172, customer_id=2,totalprice =80,overrideprice=', '2013-09-03 08:55:56'),
(240, 'SP-10000', 'login', 'administrator', '2013-09-03 08:56:30'),
(241, 'SP-10000', 'order created', 'order_id = 173, customer_id=1,totalprice =20,overrideprice=0.00', '2013-09-03 08:57:46'),
(242, 'SP-10001', 'order created', 'order_id = 174, customer_id=2,totalprice =100,overrideprice=100', '2013-09-03 08:58:17'),
(243, 'SP-10001', 'order created', 'order_id = 175, customer_id=2,totalprice =100,overrideprice=100', '2013-09-03 08:58:24'),
(244, 'SP-10001', 'order created', 'order_id = 176, customer_id=33,totalprice =40,overrideprice=', '2013-09-03 08:59:51'),
(245, 'SP-10001', 'order created', 'order_id = 177, customer_id=28,totalprice =100,overrideprice=100', '2013-09-03 09:02:12'),
(246, 'SP-10001', 'order created', 'order_id = 178, customer_id=28,totalprice =100,overrideprice=100', '2013-09-03 09:02:32'),
(247, 'SP-10001', 'order created', 'order_id = 179, customer_id=33,totalprice =90,overrideprice=', '2013-09-03 09:08:32'),
(248, 'SP-10001', 'order created', 'order_id = 180, customer_id=33,totalprice =90,overrideprice=', '2013-09-03 09:08:53'),
(249, 'SP-10001', 'customer created', 'customer_id=36', '2013-09-03 09:13:56'),
(250, 'SP-10001', 'order created', 'order_id = 181, customer_id=36,totalprice =86,overrideprice=', '2013-09-03 09:13:56'),
(251, 'SP-10001', 'order created', 'order_id = 182, customer_id=36,totalprice =86,overrideprice=', '2013-09-03 09:14:13'),
(252, 'SP-10001', 'order created', 'order_id = 183, customer_id=10,totalprice =100,overrideprice=', '2013-09-03 09:16:13'),
(253, 'SP-10001', 'order created', 'order_id = 184, customer_id=10,totalprice =100,overrideprice=', '2013-09-03 09:16:24'),
(254, 'SP-10001', 'order created', 'order_id = 185, customer_id=36,totalprice =105,overrideprice=', '2013-09-03 10:26:35'),
(255, 'SP-10001', 'order created', 'order_id = 186, customer_id=36,totalprice =105,overrideprice=', '2013-09-03 10:27:05'),
(256, 'SP-10001', 'customer created', 'customer_id=37', '2013-09-03 10:32:45'),
(257, 'SP-10001', 'order created', 'order_id = 187, customer_id=37,totalprice =86,overrideprice=', '2013-09-03 10:33:14'),
(258, 'SP-10001', 'order created', 'order_id = 188, customer_id=37,totalprice =86,overrideprice=', '2013-09-03 10:33:54'),
(259, 'SP-10000', 'order created', 'order_id = 189, customer_id=1,totalprice =23,overrideprice=23', '2013-09-03 10:38:50'),
(260, 'SP-10001', 'order created', 'order_id = 190, customer_id=17,totalprice =106,overrideprice=', '2013-09-03 10:55:38'),
(261, 'SP-10001', 'order created', 'order_id = 191, customer_id=17,totalprice =106,overrideprice=', '2013-09-03 10:56:35'),
(262, 'SP-10000', 'order created', 'order_id = 192, customer_id=1,totalprice =33,overrideprice=33', '2013-09-03 12:18:29'),
(263, 'SP-10011', 'order created', 'order_id = 193, customer_id=3,totalprice =22,overrideprice=', '2013-09-03 13:51:21'),
(264, 'SP-10011', 'login', '0', '2013-09-03 13:54:23'),
(265, 'SP-10011', 'login', '0', '2013-09-03 13:58:01'),
(266, 'SP-10011', 'order created', 'order_id = 194, customer_id=3,totalprice =22,overrideprice=', '2013-09-03 14:15:45'),
(267, 'SP-10011', 'order created', 'order_id = 195, customer_id=3,totalprice =27,overrideprice=', '2013-09-03 14:17:06'),
(268, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 14:35:48'),
(269, 'SP-10011', 'order created', 'order_id = 196, customer_id=38,totalprice =22,overrideprice=', '2013-09-03 14:35:48'),
(270, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 14:39:02'),
(271, 'SP-10011', 'order created', 'order_id = 197, customer_id=38,totalprice =42,overrideprice=', '2013-09-03 14:39:02'),
(272, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 14:42:09'),
(273, 'SP-10011', 'order created', 'order_id = 198, customer_id=38,totalprice =100,overrideprice=100', '2013-09-03 14:42:09'),
(274, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 14:45:41'),
(275, 'SP-10011', 'order created', 'order_id = 199, customer_id=38,totalprice =27,overrideprice=', '2013-09-03 14:45:49'),
(276, 'SP-10011', 'order created', 'order_id = 200, customer_id=38,totalprice =27,overrideprice=', '2013-09-03 15:03:30'),
(277, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 15:04:33'),
(278, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 15:29:45'),
(279, 'SP-10011', 'order created', 'order_id = 201, customer_id=38,totalprice =100,overrideprice=100', '2013-09-03 15:31:07'),
(280, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 17:44:43'),
(281, 'SP-10011', 'order created', 'order_id = 202, customer_id=38,totalprice =30,overrideprice=', '2013-09-03 17:44:43'),
(282, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-03 19:45:43'),
(283, 'SP-10011', 'order created', 'order_id = 203, customer_id=38,totalprice =30,overrideprice=', '2013-09-03 19:45:43'),
(284, 'SP-10000', 'login', '0', '2013-09-03 19:47:45'),
(285, 'SP-10000', 'login', '0', '2013-09-04 06:31:45'),
(286, 'SP-10000', 'login', '0', '2013-09-04 08:31:47'),
(287, 'SP-10000', 'login', 'administrator', '2013-09-04 08:54:59'),
(288, 'SP-10001', 'order created', 'order_id = 204, customer_id=1,totalprice =66,overrideprice=', '2013-09-04 09:00:27'),
(289, 'SP-10000', 'login', '0', '2013-09-05 05:33:48'),
(290, '0', 'order created', 'order_id = 205, customer_id=32,totalprice =20.00,overrideprice=20.00', '2013-09-05 05:38:11'),
(291, 'SP-10000', 'login', 'administrator', '2013-09-05 06:05:09'),
(292, '0', 'order created', 'order_id = 206, customer_id=32,totalprice =20.00,overrideprice=', '2013-09-05 06:08:25'),
(293, 'SP-10001', 'order created', 'order_id = 207, customer_id=11,totalprice =66,overrideprice=', '2013-09-05 07:03:36'),
(294, 'SP-10001', 'order created', 'order_id = 208, customer_id=23,totalprice =66,overrideprice=', '2013-09-05 07:04:40'),
(295, 'SP-10001', 'order created', 'order_id = 209, customer_id=1,totalprice =27,overrideprice=', '2013-09-05 07:05:36'),
(296, 'SP-10001', 'order created', 'order_id = 210, customer_id=21,totalprice =46,overrideprice=', '2013-09-05 07:06:14'),
(297, 'SP-10000', 'login', 'administrator', '2013-09-05 09:12:51'),
(298, 'SP-10001', 'order created', 'order_id = 211, customer_id=11,totalprice =46,overrideprice=', '2013-09-05 09:35:02'),
(299, 'SP-10001', 'order created', 'order_id = 212, customer_id=33,totalprice =96,overrideprice=', '2013-09-05 09:53:42'),
(300, 'SP-10001', 'order created', 'order_id = 213, customer_id=33,totalprice =96,overrideprice=', '2013-09-05 09:53:58'),
(301, 'SP-10001', 'order created', 'order_id = 214, customer_id=33,totalprice =46,overrideprice=', '2013-09-05 09:54:55'),
(302, 'SP-10000', 'logout', 'administrator', '2013-09-05 10:11:10'),
(303, 'SP-10000', 'login', '0', '2013-09-05 10:11:18'),
(304, 'SP-10001', 'order created', 'order_id = 215, customer_id=23,totalprice =46,overrideprice=', '2013-09-05 10:19:07'),
(305, 'SP-10001', 'order created', 'order_id = 216, customer_id=23,totalprice =46,overrideprice=', '2013-09-05 10:26:10'),
(306, 'SP-10001', 'order created', 'order_id = 217, customer_id=23,totalprice =50,overrideprice=', '2013-09-05 10:27:47'),
(307, 'SP-10001', 'order created', 'order_id = 218, customer_id=23,totalprice =40,overrideprice=', '2013-09-05 10:29:12'),
(308, 'SP-10001', 'order created', 'order_id = 219, customer_id=11,totalprice =46,overrideprice=', '2013-09-05 10:34:21'),
(309, 'SP-10001', 'order created', 'order_id = 220, customer_id=28,totalprice =60,overrideprice=', '2013-09-05 10:51:31'),
(310, 'SP-10001', 'order created', 'order_id = 221, customer_id=28,totalprice =46,overrideprice=', '2013-09-05 10:52:42'),
(311, 'SP-10001', 'order created', 'order_id = 222, customer_id=23,totalprice =46,overrideprice=', '2013-09-05 11:43:08'),
(312, 'SP-10001', 'order created', 'order_id = 223, customer_id=23,totalprice =40,overrideprice=', '2013-09-05 11:44:01'),
(313, 'SP-10000', 'login', '0', '2013-09-06 14:48:17'),
(314, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-06 14:52:04'),
(315, 'SP-10011', 'order created', 'order_id = 224, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 14:52:04'),
(316, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-06 14:55:02'),
(317, 'SP-10011', 'order created', 'order_id = 225, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 14:55:02'),
(318, 'SP-10011', 'order created', 'order_id = 226, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 14:57:52'),
(319, 'SP-10011', 'order created', 'order_id = 227, customer_id=38,totalprice =40,overrideprice=', '2013-09-06 14:59:49'),
(320, 'SP-10011', 'order created', 'order_id = 228, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 15:00:28'),
(321, 'SP-10011', 'order created', 'order_id = 229, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 15:07:32'),
(322, 'SP-10011', 'order created', 'order_id = 230, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 15:11:52'),
(323, 'SP-10011', 'order created', 'order_id = 231, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 15:12:44'),
(324, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-06 19:00:07'),
(325, 'SP-10011', 'order created', 'order_id = 232, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 19:00:07'),
(326, 'SP-10011', 'customer created', 'customer_id=38', '2013-09-06 19:03:16'),
(327, 'SP-10011', 'order created', 'order_id = 233, customer_id=38,totalprice =30,overrideprice=', '2013-09-06 19:03:16'),
(328, 'SP-10011', 'order created', 'order_id = 234, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 19:05:02'),
(329, 'SP-10011', 'order created', 'order_id = 235, customer_id=3,totalprice =22,overrideprice=', '2013-09-06 19:07:06'),
(330, 'SP-10000', 'login', '0', '2013-09-06 19:08:58'),
(331, 'SP-10011', 'order created', 'order_id = 236, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 19:10:40'),
(332, 'SP-10011', 'order created', 'order_id = 237, customer_id=38,totalprice =22,overrideprice=', '2013-09-06 19:11:09'),
(333, 'SP-10011', 'order created', 'order_id = 238, customer_id=3,totalprice =22,overrideprice=', '2013-09-06 19:13:13'),
(334, 'SP-10011', 'order created', 'order_id = 239, customer_id=3,totalprice =22,overrideprice=', '2013-09-06 19:13:46'),
(335, 'SP-10011', 'customer created', 'customer_id=2', '2013-09-06 19:17:11'),
(336, 'SP-10011', 'order created', 'order_id = 240, customer_id=2,totalprice =100,overrideprice=100', '2013-09-06 19:17:12'),
(337, 'SP-10011', 'order created', 'order_id = 241, customer_id=2,totalprice =22,overrideprice=', '2013-09-06 19:18:19'),
(338, 'SP-10000', 'login', 'administrator', '2013-09-08 06:53:17'),
(339, 'SP-10001', 'order created', 'order_id = 242, customer_id=28,totalprice =40,overrideprice=', '2013-09-08 07:20:39'),
(340, 'SP-10001', 'order created', 'order_id = 243, customer_id=33,totalprice =40,overrideprice=', '2013-09-08 07:24:40'),
(341, 'SP-10001', 'order created', 'order_id = 244, customer_id=21,totalprice =46,overrideprice=', '2013-09-08 07:32:12'),
(342, 'SP-10001', 'order created', 'order_id = 245, customer_id=21,totalprice =46,overrideprice=', '2013-09-08 07:44:36'),
(343, 'SP-10001', 'order created', 'order_id = 246, customer_id=21,totalprice =46,overrideprice=', '2013-09-08 07:51:21'),
(344, 'SP-10001', 'order created', 'order_id = 247, customer_id=21,totalprice =22,overrideprice=', '2013-09-08 07:52:43'),
(345, 'SP-10000', 'login', '0', '2013-09-08 11:42:43'),
(346, 'SP-10000', 'customer created', 'customer_id=3', '2013-09-08 14:07:11'),
(347, 'SP-10000', 'customer created', 'customer_id=3', '2013-09-08 14:07:45'),
(348, 'SP-10000', 'customer created', 'customer_id=39', '2013-09-08 15:45:34'),
(349, 'SP-10000', 'order created', 'order_id = 248, customer_id=39,totalprice =12,overrideprice=12', '2013-09-08 15:45:50'),
(350, 'SP-10000', 'order created', 'order_id = 249, customer_id=39,totalprice =30,overrideprice=', '2013-09-08 18:51:43'),
(351, 'SP-10000', 'order created', 'order_id = 250, customer_id=39,totalprice =30,overrideprice=', '2013-09-08 18:51:49'),
(352, 'SP-10000', 'login', 'administrator', '2013-09-09 06:16:38'),
(353, 'SP-10001', 'order created', 'order_id = 251, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:16:43'),
(354, 'SP-10001', 'order created', 'order_id = 252, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:17:54'),
(355, 'SP-10001', 'order created', 'order_id = 253, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:17:56'),
(356, 'SP-10001', 'order created', 'order_id = 254, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:17:59'),
(357, 'SP-10001', 'order created', 'order_id = 255, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:02'),
(358, 'SP-10001', 'order created', 'order_id = 256, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:05'),
(359, 'SP-10001', 'order created', 'order_id = 257, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:07'),
(360, 'SP-10001', 'order created', 'order_id = 258, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:10'),
(361, 'SP-10001', 'order created', 'order_id = 259, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:13'),
(362, 'SP-10001', 'order created', 'order_id = 260, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:16'),
(363, 'SP-10001', 'order created', 'order_id = 261, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:19'),
(364, 'SP-10001', 'order created', 'order_id = 262, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:35'),
(365, 'SP-10001', 'order created', 'order_id = 263, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:38'),
(366, 'SP-10001', 'order created', 'order_id = 264, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:41'),
(367, 'SP-10001', 'order created', 'order_id = 265, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:44'),
(368, 'SP-10001', 'order created', 'order_id = 266, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:47'),
(369, 'SP-10001', 'order created', 'order_id = 267, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:50'),
(370, 'SP-10001', 'order created', 'order_id = 268, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:52'),
(371, 'SP-10001', 'order created', 'order_id = 269, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:55'),
(372, 'SP-10001', 'order created', 'order_id = 270, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:18:58'),
(373, 'SP-10001', 'order created', 'order_id = 271, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:00'),
(374, 'SP-10001', 'order created', 'order_id = 272, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:03'),
(375, 'SP-10001', 'order created', 'order_id = 273, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:06'),
(376, 'SP-10001', 'order created', 'order_id = 274, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:09'),
(377, 'SP-10001', 'order created', 'order_id = 275, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:11'),
(378, 'SP-10001', 'order created', 'order_id = 276, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:14'),
(379, 'SP-10001', 'order created', 'order_id = 277, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:17'),
(380, 'SP-10001', 'order created', 'order_id = 278, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:20'),
(381, 'SP-10001', 'order created', 'order_id = 279, customer_id=28,totalprice =46,overrideprice=', '2013-09-09 06:19:23'),
(382, 'SP-10001', 'order created', 'order_id = 280, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:25'),
(383, 'SP-10001', 'order created', 'order_id = 281, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:28'),
(384, 'SP-10001', 'order created', 'order_id = 282, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:30'),
(385, 'SP-10001', 'order created', 'order_id = 283, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:31'),
(386, 'SP-10001', 'order created', 'order_id = 284, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:35'),
(387, 'SP-10001', 'order created', 'order_id = 285, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:36'),
(388, 'SP-10001', 'order created', 'order_id = 286, customer_id=28,totalprice =60,overrideprice=', '2013-09-09 06:19:38'),
(389, 'SP-10001', 'order created', 'order_id = 287, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:33:38'),
(390, 'SP-10001', 'order created', 'order_id = 288, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:33:50'),
(391, 'SP-10001', 'order created', 'order_id = 289, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:33:52'),
(392, 'SP-10001', 'order created', 'order_id = 290, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:33:55'),
(393, 'SP-10001', 'order created', 'order_id = 291, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:33:58'),
(394, 'SP-10001', 'order created', 'order_id = 292, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:01'),
(395, 'SP-10001', 'order created', 'order_id = 293, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:03'),
(396, 'SP-10001', 'order created', 'order_id = 294, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:06'),
(397, 'SP-10001', 'order created', 'order_id = 295, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:09'),
(398, 'SP-10001', 'order created', 'order_id = 296, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:12'),
(399, 'SP-10001', 'order created', 'order_id = 297, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:14'),
(400, 'SP-10001', 'order created', 'order_id = 298, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:17'),
(401, 'SP-10001', 'order created', 'order_id = 299, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:20'),
(402, 'SP-10001', 'order created', 'order_id = 300, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:23'),
(403, 'SP-10001', 'order created', 'order_id = 301, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:26'),
(404, 'SP-10001', 'order created', 'order_id = 302, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:29'),
(405, 'SP-10001', 'order created', 'order_id = 303, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:31'),
(406, 'SP-10001', 'order created', 'order_id = 304, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:34'),
(407, 'SP-10001', 'order created', 'order_id = 305, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:37'),
(408, 'SP-10001', 'order created', 'order_id = 306, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:39'),
(409, 'SP-10001', 'order created', 'order_id = 307, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:42'),
(410, 'SP-10001', 'order created', 'order_id = 308, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:45'),
(411, 'SP-10001', 'order created', 'order_id = 309, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:48'),
(412, 'SP-10001', 'order created', 'order_id = 310, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:51'),
(413, 'SP-10001', 'order created', 'order_id = 311, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:53'),
(414, 'SP-10001', 'order created', 'order_id = 312, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:56'),
(415, 'SP-10001', 'order created', 'order_id = 313, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:34:59'),
(416, 'SP-10001', 'order created', 'order_id = 314, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:02'),
(417, 'SP-10001', 'order created', 'order_id = 315, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:05'),
(418, 'SP-10001', 'order created', 'order_id = 316, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:07'),
(419, 'SP-10001', 'order created', 'order_id = 317, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:11'),
(420, 'SP-10001', 'order created', 'order_id = 318, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:13'),
(421, 'SP-10001', 'order created', 'order_id = 319, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:17'),
(422, 'SP-10001', 'order created', 'order_id = 320, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:20'),
(423, 'SP-10001', 'order created', 'order_id = 321, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:23'),
(424, 'SP-10001', 'order created', 'order_id = 322, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:25'),
(425, 'SP-10001', 'order created', 'order_id = 323, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:28'),
(426, 'SP-10001', 'order created', 'order_id = 324, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:31'),
(427, 'SP-10001', 'order created', 'order_id = 325, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:34'),
(428, 'SP-10001', 'order created', 'order_id = 326, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:36'),
(429, 'SP-10001', 'order created', 'order_id = 327, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:39'),
(430, 'SP-10001', 'order created', 'order_id = 328, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:42'),
(431, 'SP-10001', 'order created', 'order_id = 329, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:45'),
(432, 'SP-10001', 'order created', 'order_id = 330, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 06:35:47'),
(433, 'SP-10001', 'order created', 'order_id = 331, customer_id=21,totalprice =46,overrideprice=', '2013-09-09 07:00:05'),
(434, 'SP-10001', 'order created', 'order_id = 332, customer_id=21,totalprice =46,overrideprice=', '2013-09-09 07:00:10'),
(435, 'SP-10000', 'login', 'administrator', '2013-09-09 07:07:11'),
(436, 'SP-10001', 'order created', 'order_id = 333, customer_id=21,totalprice =185,overrideprice=', '2013-09-09 07:28:32'),
(437, 'SP-10001', 'order created', 'order_id = 334, customer_id=21,totalprice =185,overrideprice=', '2013-09-09 07:29:09'),
(438, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:02:19'),
(439, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:02:32'),
(440, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:02:37'),
(441, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:03:08'),
(442, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:03:22'),
(443, 'SP-10001', 'order created', 'order_id = 336, customer_id=21,totalprice =40,overrideprice=', '2013-09-09 08:13:17'),
(444, 'SP-10001', 'order created', 'order_id = 337, customer_id=21,totalprice =40,overrideprice=', '2013-09-09 08:13:22'),
(445, 'SP-10001', 'order created', 'order_id = 338, customer_id=35,totalprice =66,overrideprice=', '2013-09-09 08:18:19'),
(446, 'SP-10001', 'order created', 'order_id = 339, customer_id=35,totalprice =66,overrideprice=', '2013-09-09 08:18:26'),
(447, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:32:18'),
(448, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:32:24'),
(449, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:32:30'),
(450, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:32:35'),
(451, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:32:52'),
(452, '0', 'order created', 'order_id = 335, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 08:33:01'),
(453, 'SP-10001', 'customer created', 'customer_id=40', '2013-09-09 08:36:03'),
(454, 'SP-10001', 'order created', 'order_id = 340, customer_id=40,totalprice =100,overrideprice=100', '2013-09-09 08:36:03'),
(455, 'SP-10001', 'order created', 'order_id = 341, customer_id=40,totalprice =100,overrideprice=100', '2013-09-09 08:36:09'),
(456, 'SP-10001', 'order created', 'order_id = 342, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:43:58'),
(457, 'SP-10001', 'order created', 'order_id = 343, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:04'),
(458, 'SP-10001', 'order created', 'order_id = 344, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:07');
INSERT INTO `auditlog` (`id`, `employee_id`, `audit_name`, `description`, `created_time`) VALUES
(459, 'SP-10001', 'order created', 'order_id = 345, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:10'),
(460, 'SP-10001', 'order created', 'order_id = 346, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:12'),
(461, 'SP-10001', 'order created', 'order_id = 347, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:15'),
(462, 'SP-10001', 'order created', 'order_id = 348, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:18'),
(463, 'SP-10001', 'order created', 'order_id = 349, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:21'),
(464, 'SP-10001', 'order created', 'order_id = 350, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:24'),
(465, 'SP-10001', 'order created', 'order_id = 351, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:27'),
(466, 'SP-10001', 'order created', 'order_id = 352, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:29'),
(467, 'SP-10001', 'order created', 'order_id = 353, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:32'),
(468, 'SP-10001', 'order created', 'order_id = 354, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:35'),
(469, 'SP-10001', 'order created', 'order_id = 355, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:38'),
(470, 'SP-10001', 'order created', 'order_id = 356, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:40'),
(471, 'SP-10001', 'order created', 'order_id = 357, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:43'),
(472, 'SP-10001', 'order created', 'order_id = 358, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:46'),
(473, 'SP-10001', 'order created', 'order_id = 359, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:49'),
(474, 'SP-10001', 'order created', 'order_id = 360, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:52'),
(475, 'SP-10001', 'order created', 'order_id = 361, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:54'),
(476, 'SP-10001', 'order created', 'order_id = 362, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:44:57'),
(477, 'SP-10001', 'order created', 'order_id = 363, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:00'),
(478, 'SP-10001', 'order created', 'order_id = 364, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:02'),
(479, 'SP-10001', 'order created', 'order_id = 365, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:05'),
(480, 'SP-10001', 'order created', 'order_id = 366, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:08'),
(481, 'SP-10001', 'order created', 'order_id = 367, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:10'),
(482, 'SP-10001', 'order created', 'order_id = 368, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:13'),
(483, 'SP-10001', 'order created', 'order_id = 369, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:16'),
(484, 'SP-10001', 'order created', 'order_id = 370, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:19'),
(485, 'SP-10001', 'order created', 'order_id = 371, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:21'),
(486, 'SP-10001', 'order created', 'order_id = 372, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:24'),
(487, 'SP-10001', 'order created', 'order_id = 373, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:27'),
(488, 'SP-10001', 'order created', 'order_id = 374, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:29'),
(489, 'SP-10001', 'order created', 'order_id = 375, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:32'),
(490, 'SP-10001', 'order created', 'order_id = 376, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:34'),
(491, 'SP-10001', 'order created', 'order_id = 377, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:37'),
(492, 'SP-10001', 'order created', 'order_id = 378, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:40'),
(493, 'SP-10001', 'order created', 'order_id = 379, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:42'),
(494, 'SP-10001', 'order created', 'order_id = 380, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:45'),
(495, 'SP-10001', 'order created', 'order_id = 381, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:48'),
(496, 'SP-10001', 'order created', 'order_id = 382, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:50'),
(497, 'SP-10001', 'order created', 'order_id = 383, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:53'),
(498, 'SP-10001', 'order created', 'order_id = 384, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:56'),
(499, 'SP-10001', 'order created', 'order_id = 385, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:45:59'),
(500, 'SP-10001', 'order created', 'order_id = 386, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:01'),
(501, 'SP-10001', 'order created', 'order_id = 387, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:04'),
(502, 'SP-10001', 'order created', 'order_id = 388, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:07'),
(503, 'SP-10001', 'order created', 'order_id = 389, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:10'),
(504, 'SP-10001', 'order created', 'order_id = 390, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:13'),
(505, 'SP-10001', 'order created', 'order_id = 391, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:15'),
(506, 'SP-10001', 'order created', 'order_id = 392, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:18'),
(507, 'SP-10001', 'order created', 'order_id = 393, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:21'),
(508, 'SP-10001', 'order created', 'order_id = 394, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:24'),
(509, 'SP-10001', 'order created', 'order_id = 395, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:27'),
(510, 'SP-10001', 'order created', 'order_id = 396, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:30'),
(511, 'SP-10001', 'order created', 'order_id = 397, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:32'),
(512, 'SP-10001', 'order created', 'order_id = 398, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:35'),
(513, 'SP-10001', 'order created', 'order_id = 399, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:38'),
(514, 'SP-10001', 'order created', 'order_id = 400, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:41'),
(515, 'SP-10001', 'order created', 'order_id = 401, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:43'),
(516, 'SP-10001', 'order created', 'order_id = 402, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:46'),
(517, 'SP-10001', 'order created', 'order_id = 403, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:49'),
(518, 'SP-10001', 'order created', 'order_id = 404, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:51'),
(519, 'SP-10001', 'order created', 'order_id = 405, customer_id=40,totalprice =50,overrideprice=', '2013-09-09 08:46:54'),
(520, 'SP-10000', 'order created', 'order_id = 406, customer_id=15,totalprice =50,overrideprice=0.00', '2013-09-09 09:08:30'),
(521, '0', 'order created', 'order_id = 407, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 09:12:56'),
(522, '0', 'order created', 'order_id = 407, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 09:13:11'),
(523, '0', 'order created', 'order_id = 408, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 09:14:21'),
(524, '0', 'order created', 'order_id = 408, customer_id=1,totalprice =120.00,overrideprice=80.00', '2013-09-09 09:14:28'),
(525, 'SP-10000', 'login', '0', '2013-09-09 09:15:39'),
(526, 'SP-10000', 'order created', 'order_id = 409, customer_id=39,totalprice =22,overrideprice=22', '2013-09-09 09:20:50'),
(527, 'SP-10001', 'order created', 'order_id = 410, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:33:48'),
(528, 'SP-10001', 'order created', 'order_id = 411, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:33:54'),
(529, 'SP-10001', 'order created', 'order_id = 412, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:33:57'),
(530, 'SP-10001', 'order created', 'order_id = 413, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:33:59'),
(531, 'SP-10001', 'order created', 'order_id = 414, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:02'),
(532, 'SP-10001', 'order created', 'order_id = 415, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:05'),
(533, 'SP-10001', 'order created', 'order_id = 416, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:08'),
(534, 'SP-10001', 'order created', 'order_id = 417, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:11'),
(535, 'SP-10001', 'order created', 'order_id = 418, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:14'),
(536, 'SP-10001', 'order created', 'order_id = 419, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:16'),
(537, 'SP-10001', 'order created', 'order_id = 420, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:19'),
(538, 'SP-10001', 'order created', 'order_id = 421, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:22'),
(539, 'SP-10001', 'order created', 'order_id = 422, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:25'),
(540, 'SP-10001', 'order created', 'order_id = 423, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:28'),
(541, 'SP-10001', 'order created', 'order_id = 424, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:31'),
(542, 'SP-10001', 'order created', 'order_id = 425, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:33'),
(543, 'SP-10001', 'order created', 'order_id = 426, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:36'),
(544, 'SP-10001', 'order created', 'order_id = 427, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:39'),
(545, 'SP-10001', 'order created', 'order_id = 428, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:42'),
(546, 'SP-10001', 'order created', 'order_id = 429, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:45'),
(547, 'SP-10001', 'order created', 'order_id = 430, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:48'),
(548, 'SP-10001', 'order created', 'order_id = 431, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:51'),
(549, 'SP-10001', 'order created', 'order_id = 432, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:54'),
(550, 'SP-10001', 'order created', 'order_id = 433, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:56'),
(551, 'SP-10001', 'order created', 'order_id = 434, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:34:59'),
(552, 'SP-10001', 'order created', 'order_id = 435, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:02'),
(553, 'SP-10001', 'order created', 'order_id = 436, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:05'),
(554, 'SP-10001', 'order created', 'order_id = 437, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:08'),
(555, 'SP-10001', 'order created', 'order_id = 438, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:11'),
(556, 'SP-10001', 'order created', 'order_id = 439, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:14'),
(557, 'SP-10001', 'order created', 'order_id = 440, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:17'),
(558, 'SP-10001', 'order created', 'order_id = 441, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:20'),
(559, 'SP-10001', 'order created', 'order_id = 442, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:23'),
(560, 'SP-10001', 'order created', 'order_id = 443, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:26'),
(561, 'SP-10001', 'order created', 'order_id = 444, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:29'),
(562, 'SP-10001', 'order created', 'order_id = 445, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:32'),
(563, 'SP-10001', 'order created', 'order_id = 446, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:35:35'),
(564, 'SP-10001', 'order created', 'order_id = 447, customer_id=1,totalprice =22,overrideprice=', '2013-09-09 09:46:41'),
(565, 'SP-10000', 'login', '0', '2013-09-09 09:49:47'),
(566, 'SP-10001', 'order created', 'order_id = 448, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:18'),
(567, 'SP-10001', 'order created', 'order_id = 449, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:30'),
(568, 'SP-10001', 'order created', 'order_id = 450, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:33'),
(569, 'SP-10001', 'order created', 'order_id = 451, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:36'),
(570, 'SP-10001', 'order created', 'order_id = 452, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:39'),
(571, 'SP-10001', 'order created', 'order_id = 453, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:42'),
(572, 'SP-10001', 'order created', 'order_id = 454, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:44'),
(573, 'SP-10001', 'order created', 'order_id = 455, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 09:52:47'),
(574, 'SP-10001', 'login', '0', '2013-09-09 10:05:28'),
(575, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:12:59'),
(576, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:13'),
(577, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:16'),
(578, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:19'),
(579, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:22'),
(580, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:24'),
(581, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:27'),
(582, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:30'),
(583, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:33'),
(584, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:35'),
(585, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:38'),
(586, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:41'),
(587, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:44'),
(588, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:47'),
(589, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:50'),
(590, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:52'),
(591, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:55'),
(592, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:13:58'),
(593, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:00'),
(594, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:03'),
(595, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:06'),
(596, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:08'),
(597, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:11'),
(598, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:14'),
(599, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:17'),
(600, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:19'),
(601, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:22'),
(602, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:25'),
(603, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:27'),
(604, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:44'),
(605, 'SP-10001', 'order created', 'order_id = 456, customer_id=22,totalprice =46,overrideprice=', '2013-09-09 10:14:46'),
(606, 'SP-10000', 'customer created', 'customer_id=3', '2013-09-09 10:21:58'),
(607, 'SP-10001', 'order created', 'order_id = 457, customer_id=35,totalprice =46,overrideprice=', '2013-09-09 10:32:20'),
(608, 'SP-10001', 'order created', 'order_id = 457, customer_id=35,totalprice =46,overrideprice=', '2013-09-09 10:36:17'),
(609, 'SP-10001', 'order created', 'order_id = 458, customer_id=1,totalprice =46,overrideprice=', '2013-09-09 10:41:25'),
(610, 'SP-10001', 'order created', 'order_id = 458, customer_id=1,totalprice =46,overrideprice=', '2013-09-09 10:41:30'),
(611, 'SP-10001', 'order created', 'order_id = 459, customer_id=1,totalprice =80,overrideprice=', '2013-09-09 10:44:22'),
(612, 'SP-10001', 'order created', 'order_id = 459, customer_id=1,totalprice =80,overrideprice=', '2013-09-09 10:44:35'),
(613, 'SP-10001', 'order created', 'order_id = 460, customer_id=21,totalprice =50,overrideprice=', '2013-09-09 11:00:29'),
(614, 'SP-10001', 'order created', 'order_id = 461, customer_id=33,totalprice =46,overrideprice=', '2013-09-09 11:02:40'),
(615, 'SP-10001', 'order created', 'order_id = 462, customer_id=27,totalprice =50,overrideprice=', '2013-09-09 11:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `blackouts`
--

CREATE TABLE IF NOT EXISTS `blackouts` (
  `blackout_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flavour_id` mediumint(5) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `blackout_date` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`blackout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `blackouts`
--

INSERT INTO `blackouts` (`blackout_id`, `flavour_id`, `location_id`, `blackout_date`, `start_date`, `end_date`) VALUES
(20, 1, 2, '09/04/2013,09/05/2013,09/06/2013,09/07/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, 2, '09/04/2013,09/05/2013,09/06/2013,09/07/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 2, '09/04/2013,09/05/2013,09/06/2013,09/07/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 4, 2, '09/04/2013,09/05/2013,09/06/2013,09/07/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 5, 2, '09/04/2013,09/05/2013,09/06/2013,09/07/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE IF NOT EXISTS `cakes` (
  `revel_product_id` int(11) NOT NULL,
  `cake_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `flavour_id` text NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text NOT NULL,
  `shape_id` text NOT NULL,
  `meta_tag` text NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `insert_date` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `tiers` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`revel_product_id`, `cake_id`, `category_id`, `flavour_id`, `title`, `description`, `shape_id`, `meta_tag`, `image`, `status`, `create_date`, `insert_date`, `update_date`, `is_deleted`, `tiers`, `ordering`) VALUES
(30, 15, 1, '', 'Custom Cake', '', '', '', '', 0, '2013-08-27 09:47:29', 0, 0, 0, '', 0),
(36, 20, 2, 'a:9:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:2:"18";i:4;s:1:"8";i:5;s:1:"9";i:6;s:2:"21";i:7;s:2:"23";i:8;s:2:"24";}', 'Wedding Bells', 'This cake comes in a variety of flavours Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \n\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'anniversary, wedding, flower, 3 tier, three tier', '', 1, '2013-08-27 15:05:09', 0, 0, 0, '', 0),
(37, 21, 2, 'a:6:{i:0;s:2:"28";i:1;s:1:"6";i:2;s:1:"7";i:3;s:2:"20";i:4;s:2:"21";i:5;s:2:"24";}', 'Happy Anniversary', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Chocolate, vanilla, wedding, anniversary, wedding anniversary', '', 1, '2013-08-27 15:08:09', 0, 0, 0, '', 0),
(38, 22, 22, 'a:10:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:2:"20";i:8;s:2:"21";i:9;s:2:"23";}', 'Soldier Theme', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'bar mitzvah, soldier, celebration, young, man, boy, ', '', 1, '2013-08-27 15:09:55', 0, 0, 0, '', 0),
(39, 23, 22, 'a:14:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"4";i:3;s:1:"5";i:4;s:2:"28";i:5;s:1:"6";i:6;s:1:"7";i:7;s:2:"22";i:8;s:2:"18";i:9;s:1:"8";i:10;s:1:"9";i:11;s:2:"10";i:12;s:2:"11";i:13;s:2:"12";}', 'Waling Wall', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.`', '', 'bar mitzvah, soldier, celebration, young, man, boy,', '', 1, '2013-08-27 15:10:28', 0, 0, 0, '', 0),
(40, 24, 4, 'a:18:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";i:9;s:2:"18";i:10;s:1:"8";i:11;s:1:"9";i:12;s:2:"10";i:13;s:2:"11";i:14;s:2:"12";i:15;s:2:"13";i:16;s:2:"14";i:17;s:2:"26";}', 'Boys Birthday 9 - 14 yrs', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, young, boy, gift,', '', 1, '2013-08-28 11:23:11', 0, 1377688991, 0, '', 0),
(41, 25, 4, 'a:22:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";i:9;s:2:"18";i:10;s:1:"8";i:11;s:1:"9";i:12;s:2:"10";i:13;s:2:"11";i:14;s:2:"12";i:15;s:2:"13";i:16;s:2:"14";i:17;s:2:"26";i:18;s:2:"15";i:19;s:2:"16";i:20;s:2:"25";i:21;s:2:"17";}', 'Girls Birthday 9 -14 yrs', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, young, girl, gift,', '', 1, '2013-08-27 15:12:49', 0, 0, 0, '', 0),
(42, 26, 4, 'a:18:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";i:9;s:2:"18";i:10;s:1:"8";i:11;s:1:"9";i:12;s:2:"10";i:13;s:2:"11";i:14;s:2:"12";i:15;s:2:"13";i:16;s:2:"14";i:17;s:2:"26";}', 'Seniors Birthday', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, young, boy, gift,', '', 1, '2013-08-27 15:13:34', 0, 0, 0, '', 0),
(43, 27, 4, 'a:18:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";i:9;s:2:"18";i:10;s:1:"8";i:11;s:1:"9";i:12;s:2:"10";i:13;s:2:"11";i:14;s:2:"12";i:15;s:2:"13";i:16;s:2:"14";i:17;s:2:"26";}', 'Mothers Birthday', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, mother, female, gift,', '', 1, '2013-08-27 15:14:36', 0, 0, 0, '', 0),
(44, 28, 4, 'a:12:{i:0;s:2:"14";i:1;s:2:"26";i:2;s:2:"15";i:3;s:2:"16";i:4;s:2:"25";i:5;s:2:"17";i:6;s:2:"27";i:7;s:2:"19";i:8;s:2:"20";i:9;s:2:"21";i:10;s:2:"23";i:11;s:2:"24";}', 'Father Birthday', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, father, male, guy, gift,', '', 1, '2013-08-27 15:15:27', 0, 0, 0, '', 0),
(45, 29, 4, 'a:9:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";}', 'Happy Birthday', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'Birthday, celebration, young, boy, gift, mother, father', '', 1, '2013-08-27 15:16:16', 0, 0, 0, '', 0),
(46, 30, 6, 'a:11:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:2:"28";i:6;s:1:"6";i:7;s:1:"7";i:8;s:2:"22";i:9;s:2:"18";i:10;s:1:"8";}', 'Christening Cakes', 'This cake comes in a variety of flavors lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\n\nIt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 'christening, baby, growing up, religious, mother, father, ', '', 1, '2013-08-27 15:17:12', 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cake_gallery`
--

CREATE TABLE IF NOT EXISTS `cake_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ordering` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `cake_gallery`
--

INSERT INTO `cake_gallery` (`gallery_id`, `cake_id`, `image`, `ordering`, `status`) VALUES
(1, 20, 'assets/uploads/gallery/p18304sm451g5hg2umq51u3016dj4.jpg', 0, 1),
(2, 20, 'assets/uploads/gallery/p18304sm5a12j9o9vllm1i1dncm5.jpg', 0, 1),
(3, 20, 'assets/uploads/gallery/p18304sm5uprc1mjsgrd1p2der06.JPG', 0, 1),
(4, 20, 'assets/uploads/gallery/p18304sm761qp857pjr912h71td57.JPG', 0, 1),
(5, 21, 'assets/uploads/gallery/p183051co8v2c531e93ghjrn34.JPG', 2, 1),
(6, 21, 'assets/uploads/gallery/p183051co815io12fvrhp254gmt5.JPG', 3, 1),
(7, 21, 'assets/uploads/gallery/p183051co81h3qfo7eci1ev6ns56.JPG', 4, 1),
(8, 21, 'assets/uploads/gallery/p183051co81pfgaduuqmsom1khh7.jpg', 1, 1),
(9, 21, 'assets/uploads/gallery/p183051co814mt1oek6pp1c7t1rds8.JPG', 5, 1),
(10, 21, 'assets/uploads/gallery/p183051co8li4s35eah1pgv1jhg9.JPG', 6, 1),
(11, 21, 'assets/uploads/gallery/p183051co81jvu1s8mufq1t041fha.JPG', 7, 1),
(12, 21, 'assets/uploads/gallery/p183051co9ubs8orgushl763qb.JPG', 8, 1),
(13, 22, 'assets/uploads/gallery/p183056ci61d6511p5hfn1u741os4.JPG', 0, 1),
(14, 23, 'assets/uploads/gallery/p183057du71v60r3811ir1kei17dq4.jpg', 0, 1),
(15, 24, 'assets/uploads/gallery/p183059hmo1c70slm1q431kmlc8b4.JPG', 8, 1),
(16, 24, 'assets/uploads/gallery/p183059hmo9nn1f961226a7q1b6k5.jpg', 2, 1),
(17, 24, 'assets/uploads/gallery/p183059hmo1n3nif01meo91cq4a6.jpg', 3, 1),
(18, 24, 'assets/uploads/gallery/p183059hmog9u1ng019ji1u8e1dd57.jpg', 1, 1),
(19, 24, 'assets/uploads/gallery/p183059hmolu21iob19i11k7fgvi8.JPG', 4, 1),
(20, 24, 'assets/uploads/gallery/p183059hmo75lrl31q6a5ni1udp9.JPG', 5, 1),
(21, 24, 'assets/uploads/gallery/p183059hmo123f139489me531af0a.jpg', 6, 1),
(22, 24, 'assets/uploads/gallery/p183059hmog4e5k714s51ldn1avab.jpg', 7, 1),
(23, 26, 'assets/uploads/gallery/p18305coi317o32uk114dncmnh64.jpg', 2, 1),
(24, 26, 'assets/uploads/gallery/p18305coi3ac3r2m38f13qd1dh5.JPG', 3, 1),
(25, 26, 'assets/uploads/gallery/p18305coi3rqg18jl6dr271je26.jpg', 4, 1),
(26, 26, 'assets/uploads/gallery/p18305coi3gnl1igv1i84nfv6pp7.JPG', 5, 1),
(27, 26, 'assets/uploads/gallery/p18305coi37jhfuv1930naku038.JPG', 1, 1),
(28, 26, 'assets/uploads/gallery/p18305coi3r972vlebm1hi01gjv9.JPG', 6, 1),
(29, 26, 'assets/uploads/gallery/p18305coi4lia185k1pl412uf1ppha.JPG', 7, 1),
(30, 26, 'assets/uploads/gallery/p18305coi4uboa7118ku19rc13b4b.jpg', 8, 1),
(31, 27, 'assets/uploads/gallery/p18305epqbadeclu9sbd04rhh4.JPG', 2, 1),
(32, 27, 'assets/uploads/gallery/p18305epqb1nf5ji5b91lqv4l5.jpg', 3, 1),
(33, 27, 'assets/uploads/gallery/p18305epqb1eftnev1ofti4ufsh6.JPG', 4, 1),
(34, 27, 'assets/uploads/gallery/p18305epqb1mn01vs6hhs15cu5tc7.jpg', 5, 1),
(35, 27, 'assets/uploads/gallery/p18305epqbfjamgh1el9p0nkre8.jpg', 1, 1),
(36, 27, 'assets/uploads/gallery/p18305epqb4921735de6qsdrsf9.jpg', 6, 1),
(37, 28, 'assets/uploads/gallery/p18305gd3gvt9bh0193r8cm1khf4.JPG', 0, 1),
(38, 28, 'assets/uploads/gallery/p18305gd3h67c5vq15sh1b5l1jbn5.JPG', 0, 1),
(39, 28, 'assets/uploads/gallery/p18305gd3hhng148afvrkj9ond6.JPG', 0, 1),
(40, 28, 'assets/uploads/gallery/p18305gd3h4f1ttk1u1e1h4f10nb7.JPG', 0, 1),
(41, 28, 'assets/uploads/gallery/p18305gd3h1bt37vt39e1fff1jp08.JPG', 0, 1),
(42, 29, 'assets/uploads/gallery/p18305hr3r1u6d189lhl2v5919hd4.JPG', 0, 1),
(43, 29, 'assets/uploads/gallery/p18305hr3s1kpvmk610or5dp18kk5.JPG', 0, 1),
(44, 29, 'assets/uploads/gallery/p18305hr3s5mebfjvmo1kqsu3c6.JPG', 0, 1),
(45, 29, 'assets/uploads/gallery/p18305hr3s1i9t1kcjjpc12r71cfa7.JPG', 0, 1),
(46, 29, 'assets/uploads/gallery/p18305hr3s1ocns5pihn1g8f1c7l8.jpg', 0, 1),
(47, 29, 'assets/uploads/gallery/p18305hr3s1th718n21lvv13pskbt9.JPG', 0, 1),
(48, 29, 'assets/uploads/gallery/p18305hr3s18661qvg1m0h1bo91t14a.JPG', 0, 1),
(49, 30, 'assets/uploads/gallery/p18305jjjs1vsigd61d5mr611mmf4.JPG', 2, 1),
(50, 30, 'assets/uploads/gallery/p18305jjjs12fo1gp71r439jg6p25.JPG', 1, 1),
(51, 30, 'assets/uploads/gallery/p18305jjjsuo1sc318h91hls1s3q6.JPG', 3, 1),
(52, 30, 'assets/uploads/gallery/p18305jjjs1abqach27r1kldl1f7.jpg', 4, 1),
(53, 30, 'assets/uploads/gallery/p18305jjjs13h61uuf1gh3184hpld8.JPG', 5, 1),
(54, 25, 'assets/uploads/gallery/p18306hn75gvl10av1ltc1iqfdl14.jpg', 2, 1),
(55, 25, 'assets/uploads/gallery/p18306hn751os21ime1h7i1nvq128u5.JPG', 3, 1),
(56, 25, 'assets/uploads/gallery/p18306hn75q9s9311j9tvb0183k6.jpg', 4, 1),
(57, 25, 'assets/uploads/gallery/p18306hn751pv31heuim9q08ifp7.jpg', 5, 1),
(58, 25, 'assets/uploads/gallery/p18306hn7516ec19ij1c191g4j1kbj8.jpg', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `ordering`, `status`) VALUES
(1, 'Adult Cakes', 0, 1),
(2, 'Anniversary Cakes', 0, 1),
(3, 'Baby Shower Cakes', 0, 1),
(4, 'Birthday Cakes', 0, 1),
(5, 'Bridal Shower Cakes', 0, 1),
(6, 'Christening Cakes', 0, 1),
(7, 'Confirmation Cakes', 0, 1),
(8, 'Wedding Cakes', 0, 1),
(9, 'Retirement Cakes', 0, 1),
(10, 'New Born', 0, 1),
(11, 'Graduation Cakes', 0, 1),
(12, 'Holiday Cakes', 0, 1),
(13, 'First Communion', 0, 1),
(14, 'Engagement Cakes', 0, 1),
(15, 'Corporate Cakes', 0, 1),
(16, 'Valentine''s Day', 0, 1),
(17, 'St. Patrick''s Day', 0, 1),
(18, 'Easter', 0, 1),
(19, 'Halloween', 0, 1),
(20, 'Christmas', 0, 1),
(21, 'New Year''s Eve', 0, 1),
(22, 'Bar Mitzvah', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `revel_customer_id` int(11) NOT NULL,
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
  `insert_date` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `revel_customer_id`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `country`, `notes`, `email_notification`, `insert_date`, `update_date`, `is_deleted`, `status`) VALUES
(1, 121, 'shafiq', 'Islam', '1234455678889', 'shafiq@emicrograph.com', 'Dhakaa, Lalmati1', 'Arapara,Savar 21', 'Dhaka1', 'Ontario', 'D4G H5D1', 'Canada', '', 0, 0, 0, 0, 1),
(2, 187, 'dan', 'branco', '2892216124', 'spencer@gsisolutions.ca', 'address 1', 'address 2', 'aurora', '', 'l4g7p3', '', '', 0, 0, 1378495031, 0, 1),
(3, 123, 'spencer', 'spear', '416-420-3523', 'spencer@gsisolutions.ca', '15 laidlaw st', 'unit 613', 'toronto', '', 'm5k1x6', '', '', 0, 0, 1378722117, 0, 1),
(4, 124, 'Sample', 'Customer', '4161234567', 'spencer@gsisolutions.ca', '171 East Liberty Street', 'Suite 281', 'Toronto', 'Ontario', 'M1M 1M1', 'Canada', '', 0, 0, 0, 0, 1),
(5, 125, 'Jennifer', 'Wright', '6471234567', 'jennifer@gsisolutions.ca', '123 Main Street', 'Suite 1234', 'Mississauga', 'Ontario', 'L1L 2L2', 'Canada', '', 0, 0, 0, 0, 1),
(6, 126, 'John', 'Smith', '9050980987', 'jennifer@gsisolutions.ca', '321 Line Street', '', 'Oakville', 'Ontario', 'J1J 2J2', 'Canada', '', 0, 0, 0, 0, 1),
(7, 127, 'Jane', 'Doe', '9055675678', 'jennifer@gsisolutions.ca', '98765 Best Street', '', 'Vaughn', 'Ontario', 'M8Y 1W1', 'Canada', '', 0, 0, 0, 0, 1),
(8, 128, 'Mark', 'Clark', '9879879876', 'jennifer@gsisolutions.ca', '101 Hundred Street', 'Apt. 123', 'Milton', 'Manitoba', 'H8H 8H8', 'Canada', '', 0, 0, 0, 0, 1),
(9, 129, 'Anna', 'Klein', '3453453456', 'jennifer@gsisolutions.ca', '', '', '', '', '', 'Canada', '', 0, 0, 1377684781, 0, 1),
(10, 130, 'Theresa', 'Flower', '7057057055', '', '', '', '', '', '', 'Canada', '', 0, 0, 0, 0, 1),
(11, 131, 'Maksudur', 'Rahman', '12344566778', 'maksud@emicrograph.com', 'Lalmaita', 'Dhaka', 'Dhaka', '', 'e15 3et', '', '', 0, 0, 1377681313, 1, 0),
(12, 132, 'Noor', 'khan', '12345566777', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e15 3et', '', '', 0, 0, 1377681692, 1, 0),
(13, 133, 'Ashik', 'ahmed', '3852794467', 'maksud@emicrograph.com', 'Uttara', 'Uttara', 'Dhaka', '', 'e15 3et', '', '', 0, 0, 1377681290, 1, 1),
(14, 134, 'Hasan', 'Mahmud', '3332221111', 'ashikcu@gmail.com', 'Address 1', 'Address 2', 'City Name', '', '1234', '', '', 0, 0, 1377681950, 1, 1),
(15, 135, 'maksud', 'test', '12234445566', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e11 1dt', '', '', 0, 0, 1377681302, 1, 1),
(16, 136, 'test', 'maksud', '12335355534', 'maksud@emicrograph.com', 'lalmatia', '', 'Dhaka', '', 'e11 1dt', '', '', 0, 0, 1377681774, 1, 0),
(17, 137, 'test', 'drive', '12283939392', 'maksud@emicrogrqph.com', 'lalmatia', 'Dhaka', 'Dhaka', '', 'e11 1dt', '', '', 0, 0, 1377681874, 1, 0),
(18, 139, 'test', 'order', '12345566667', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e11 1dt', '', '', 0, 1377691104, 0, 0, 1),
(19, 140, 'Shafiq', 'Offline', '3213214322', '', '', '', '', '', '', '', '', 0, 1377691727, 0, 0, 1),
(20, 141, 'I abaya', 'khan', '12345678956', 'nm@nm.com', '', '', '', '', '', '', '', 0, 1377692169, 0, 0, 1),
(21, 142, 'Jony', 'Depp', '12344567778', 'maksud@emicrograph.com', 'Lalmaita', '', 'Dhaka', '', 'e11 1dt', '', '', 0, 1377699859, 1377757701, 0, 1),
(22, 143, 'ishita', 'Islam', '12374846384', 'maksud@emicrograph.com', 'Lalmaita', '', 'Dhaka', '', 'se11qsdd', '', '', 0, 1377700033, 0, 0, 1),
(23, 144, 'Devid', 'Beckham', '683-649-0000', 'maksud@emicrograph.com', 'lalmatia', '', 'Dhaka', '', 'e11 1dt', '', '', 0, 1377700291, 1377700603, 0, 1),
(24, 0, 'shane', 'spear', '4164203522', '', '', '', '', '', '', '', '', 0, 1377700565, 0, 0, 1),
(25, 146, 'desmond', 'lo', '4164445555', 'spencer@gsisolutions.ca', '123 fake ste', 'unit 10', 'Urora', '', 'l4g7p3', '', '', 0, 1377700949, 1377701016, 0, 1),
(26, 0, 'dan', 'branco', '4164203522', 'spencer@gsisolutions.ca', '', '', '', '', '', '', '', 0, 1377701517, 1377701538, 0, 1),
(27, 148, 'joseph', 'bozzo', '4161231234', 'spencer@gsisolutions.ca', '', '', '', '', '', '', '', 0, 1377707672, 1377708035, 0, 1),
(28, 149, 'Andy', 'Murry', '3245567899', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e15 3et', '', '', 0, 1377757215, 0, 0, 1),
(29, 151, 'dilshad', 'ferdousi', '5435546549', 'dilshad@emicrograph.com', 'errrrr', 'referrer', 'tftfgygyg', '', 'ytrytdytd', '', '', 0, 1377766323, 0, 1, 1),
(30, 170, 'test new', 'Mia', '12345678901', 'shafiq@emicrograph.com', '', '', '', '', '', '', '', 0, 1377770896, 1377775162, 1, 1),
(31, 0, 'ferdousi', 'dilshad', '12345678901', 'dilshad@emicrograph.com', '', '', '', '', '', '', '', 0, 1377770904, 0, 1, 1),
(32, 171, 'Arrow', 'Smith', '4456677888', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'w12 3dt', '', '', 0, 1378101359, 0, 0, 1),
(33, 172, 'Freedy', 'Mercury', '3445667889', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e12 5dt', '', '', 0, 1378103024, 0, 0, 1),
(34, 173, 'Roger', 'Federer', '3456778899', 'maksud@emiicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e12 2dt', '', '', 0, 1378104209, 0, 0, 1),
(35, 174, 'Tom', 'Jerry', '2345434455', 'maksud@emicrograph.com', 'lalmatia', '', 'Dhaka', '', 'e11 1dt', '', '', 0, 1378105521, 0, 0, 1),
(36, 175, 'Tiger', 'wood', '3746289373', 'maksud@emicrograph.com', 'dhandmondi', 'dhandmondi', 'Dhaka', '', 'e11 1dt', '', '', 0, 1378199636, 0, 0, 1),
(37, 176, 'test', 'order', '2423423442', 'maksud@emicrograph.com', 'lalmatia', '', 'Dhaka', '', 'e11 3dt', '', '', 0, 1378204365, 0, 0, 1),
(38, 0, 'sandra', 'lorini', '6472342996', 'spencer@gsisolutions.ca', '40 watkins glen cres', 'unit 456', 'aurora', 'Ontario', 'l4g 7p3', '', '', 0, 1378218948, 1378494196, 0, 1),
(39, 188, 'ashik', 'ahmad', '3211234321', '', '', '', '', '', '', '', '', 0, 1378655134, 1378655134, 0, 1),
(40, 189, 'Deployment', 'test', '12344555667', 'maksud@emicrograph.com', 'lalmatia', 'lalmatia', 'Dhaka', '', 'e11 1dt', '', '', 0, 1378715763, 1378715763, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_notes`
--

CREATE TABLE IF NOT EXISTS `customer_notes` (
  `order_notes_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL,
  `create_date` int(10) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`order_notes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flavours`
--

CREATE TABLE IF NOT EXISTS `flavours` (
  `flavour_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fondant` tinyint(1) NOT NULL DEFAULT '1',
  `tire_id` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`flavour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `flavours`
--

INSERT INTO `flavours` (`flavour_id`, `title`, `fondant`, `tire_id`, `ordering`, `status`) VALUES
(1, 'Banana Chocolate', 0, '', 0, 1),
(2, 'Black Forest', 1, '', 0, 1),
(3, 'Cappuccino Meringue', 0, '', 0, 1),
(4, 'Caramel Crunch', 0, '', 0, 1),
(5, 'Carrot Cake', 0, '', 0, 1),
(6, 'Chocolate Hazelnut/Bacio', 1, '', 0, 1),
(7, 'Chocolate Truffle', 1, '', 0, 1),
(8, 'Fruit Torte', 0, '', 0, 1),
(9, 'Frutta Di Bosco', 0, '', 0, 1),
(10, 'Grand Marnier', 1, '', 0, 1),
(11, 'Lemon Chiffon', 1, '', 0, 1),
(12, 'Lemon Yogurt', 1, '', 0, 1),
(13, 'Mocha', 1, '', 0, 1),
(14, 'Mocha Mousse', 0, '', 0, 1),
(15, 'Rasberry Chocolate Truffle', 1, '', 0, 1),
(16, 'Raspberry Chocolate Mousse', 0, '', 0, 1),
(17, 'Red Velvet', 1, '', 0, 1),
(18, 'Classic Italian', 1, '', 0, 1),
(19, 'Strawberry Shortcake', 0, '', 0, 1),
(20, 'Tiramisu', 0, '', 0, 1),
(21, 'Tiramisu Mousse', 0, '', 0, 1),
(22, 'Chocoloate', 1, '', 0, 1),
(23, 'Vanilla', 1, '', 0, 1),
(24, 'White Chocolate Mousse', 0, '', 0, 1),
(25, 'Raspberry Lemon Curd', 0, '', 0, 1),
(26, 'Opera Cake', 0, '', 0, 1),
(27, 'Strawberry Cheesecake', 0, '', 0, 1),
(28, 'Chocolate Cheesecake', 0, '', 0, 1);

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
-- Table structure for table `instructional_photo`
--

CREATE TABLE IF NOT EXISTS `instructional_photo` (
  `instructional_photo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `instructional_order_id` bigint(20) NOT NULL,
  `instructional_photo` text NOT NULL,
  `ordering` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`instructional_photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `revel_location_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `vaughan_location` tinyint(1) NOT NULL DEFAULT '0',
  `address1` text CHARACTER SET utf8 NOT NULL,
  `address2` text CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `country` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pos_api` text CHARACTER SET utf8 NOT NULL,
  `store_print_ip` varchar(200) NOT NULL,
  `kitchen_print_ip` varchar(200) NOT NULL,
  `ordering` mediumint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `revel_location_id`, `title`, `vaughan_location`, `address1`, `address2`, `city`, `province`, `postal_code`, `country`, `email`, `phone`, `pos_api`, `store_print_ip`, `kitchen_print_ip`, `ordering`, `status`) VALUES
(1, 21, 'Vaughan', 1, '5100 Rutherford Road', '', 'Woodbridge ', 'ON', ' L4H 2J2', 'Canada', 'info@phillipsbakery.com', '9058325688', '174.119.8.153|TM-T70', '192.168.1.250|TM-T70', '192.168.1.250|TM-T70', 0, 1),
(2, 22, 'Woodbridge', 0, '2563 Major Mackenzie Drive', '(West of Keele Street)', 'Maple', 'ON', 'L6A 2E8', 'Canada', 'mapple@phillipsbakery.com', '4552334321', '192.168.1.250|TM-T70', '192.168.1.250|TM-T70', '192.168.1.250|TM-T70', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `employee_id` varchar(20) NOT NULL DEFAULT '0',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `location_id` mediumint(5) DEFAULT '0',
  `phone` varchar(20) DEFAULT NULL,
  `postal_code` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `employee_id`, `first_name`, `last_name`, `location_id`, `phone`, `postal_code`, `address`) VALUES
(1, 1, 'SP-10000', 'Admin', 'istrator', 0, NULL, '', ''),
(11, 11, 'SP-10001', 'Joseph', 'Bozzo', 0, NULL, '', ''),
(12, 12, 'SP-10011', 'Spencer', 'Spear', 0, NULL, '', ''),
(13, 13, 'SP-10012', 'Desmond', 'Lo', 0, NULL, '', ''),
(14, 14, 'SP-10013', 'Dan', 'Branco', 0, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `revel_order_id` int(11) NOT NULL,
  `order_code` bigint(20) NOT NULL DEFAULT '0',
  `cake_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `manager_id` mediumint(8) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `kitchen_location_id` mediumint(5) NOT NULL,
  `order_date` int(12) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `pickup_location_id` mediumint(5) NOT NULL,
  `delivery_zone_id` mediumint(5) NOT NULL,
  `delivery_zone_surcharge` decimal(10,2) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `delivery_time` varchar(20) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `fondant` tinyint(1) NOT NULL DEFAULT '0',
  `price_matrix_id` mediumint(8) NOT NULL,
  `tiers` tinyint(2) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `matrix_price` decimal(10,2) NOT NULL,
  `cake_email_photo` tinyint(1) NOT NULL DEFAULT '0',
  `magic_cake_id` varchar(50) NOT NULL,
  `magic_surcharge` decimal(10,2) NOT NULL,
  `on_cake_image_needed` tinyint(1) NOT NULL DEFAULT '0',
  `on_cake_image` text NOT NULL,
  `printed_image_surcharge` decimal(10,2) NOT NULL,
  `inscription` text NOT NULL,
  `special_instruction` text NOT NULL,
  `instructional_email_photo` tinyint(1) NOT NULL DEFAULT '0',
  `vaughan_location` tinyint(1) NOT NULL DEFAULT '0',
  `order_status` mediumint(5) NOT NULL DEFAULT '300',
  `discount_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `override_price` decimal(10,2) NOT NULL,
  `insert_date` int(11) NOT NULL DEFAULT '0',
  `update_date` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=463 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `revel_order_id`, `order_code`, `cake_id`, `customer_id`, `employee_id`, `manager_id`, `location_id`, `kitchen_location_id`, `order_date`, `delivery_type`, `pickup_location_id`, `delivery_zone_id`, `delivery_zone_surcharge`, `delivery_date`, `delivery_time`, `flavour_id`, `fondant`, `price_matrix_id`, `tiers`, `shape`, `matrix_price`, `cake_email_photo`, `magic_cake_id`, `magic_surcharge`, `on_cake_image_needed`, `on_cake_image`, `printed_image_surcharge`, `inscription`, `special_instruction`, `instructional_email_photo`, `vaughan_location`, `order_status`, `discount_price`, `total_price`, `override_price`, `insert_date`, `update_date`, `is_deleted`) VALUES
(462, 0, 100462, 24, 27, 11, 0, 1, 1, 1378725482, 'pickup', 2, 0, 0.00, '09/16/2013', '05:15 PM', 5, 0, 228, 1, '', 50.00, 0, '', 0.00, 0, '', 0.00, '', '', 0, 1, 301, 0.00, 50.00, 0.00, 1378725482, 1378725442, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery`
--

CREATE TABLE IF NOT EXISTS `order_delivery` (
  `delivery_order_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `delivery_instruction` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE IF NOT EXISTS `order_notes` (
  `order_notes_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `create_date` int(10) NOT NULL,
  `insert_date` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  PRIMARY KEY (`order_notes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `production_status_code` bigint(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`production_status_code`, `title`, `description`, `status`) VALUES
(305, 'cancelled', 'Cancelled', 1),
(302, 'changed', 'Changed', 1),
(300, 'estimate', 'Estimate', 1),
(301, 'in-production', 'In Production', 1),
(303, 'ready-for-pickup', 'Ready For Pickup', 1),
(304, 'sold', 'Sold', 1);

-- --------------------------------------------------------

--
-- Table structure for table `price_matrix`
--

CREATE TABLE IF NOT EXISTS `price_matrix` (
  `price_matrix_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `location_id` mediumint(5) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `serving_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`price_matrix_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='p' AUTO_INCREMENT=393 ;

--
-- Dumping data for table `price_matrix`
--

INSERT INTO `price_matrix` (`price_matrix_id`, `location_id`, `flavour_id`, `serving_id`, `price`) VALUES
(1, 2, 1, 1, 22.00),
(2, 2, 1, 2, 0.00),
(3, 2, 1, 3, 40.00),
(4, 2, 1, 4, 0.00),
(5, 2, 1, 5, 0.00),
(6, 2, 1, 6, 0.00),
(7, 2, 1, 7, 0.00),
(8, 2, 2, 1, 0.00),
(9, 2, 2, 2, 30.00),
(10, 2, 2, 3, 40.00),
(11, 2, 2, 4, 46.00),
(12, 2, 2, 5, 60.00),
(13, 2, 2, 6, 96.00),
(14, 2, 2, 7, 160.00),
(15, 2, 3, 1, 22.00),
(16, 2, 3, 2, 0.00),
(17, 2, 3, 3, 40.00),
(18, 2, 3, 4, 0.00),
(19, 2, 3, 5, 0.00),
(20, 2, 3, 6, 0.00),
(21, 2, 3, 7, 0.00),
(22, 2, 4, 1, 22.00),
(23, 2, 4, 2, 0.00),
(24, 2, 4, 3, 40.00),
(25, 2, 4, 4, 0.00),
(26, 2, 4, 5, 0.00),
(27, 2, 4, 6, 0.00),
(28, 2, 4, 7, 0.00),
(29, 2, 5, 1, 22.00),
(30, 2, 5, 2, 0.00),
(31, 2, 5, 3, 50.00),
(32, 2, 5, 4, 60.00),
(33, 2, 5, 5, 80.00),
(34, 2, 5, 6, 110.00),
(35, 2, 5, 7, 225.00),
(36, 2, 28, 1, 0.00),
(37, 2, 28, 2, 30.00),
(38, 2, 28, 3, 40.00),
(39, 2, 28, 4, 50.00),
(40, 2, 28, 5, 80.00),
(41, 2, 28, 6, 110.00),
(42, 2, 28, 7, 225.00),
(43, 2, 6, 1, 0.00),
(44, 2, 6, 2, 30.00),
(45, 2, 6, 3, 40.00),
(46, 2, 6, 4, 46.00),
(47, 2, 6, 5, 60.00),
(48, 2, 6, 6, 96.00),
(49, 2, 6, 7, 160.00),
(50, 2, 7, 1, 0.00),
(51, 2, 7, 2, 30.00),
(52, 2, 7, 3, 40.00),
(53, 2, 7, 4, 50.00),
(54, 2, 7, 5, 66.00),
(55, 2, 7, 6, 100.00),
(56, 2, 7, 7, 175.00),
(57, 2, 22, 1, 0.00),
(58, 2, 22, 2, 30.00),
(59, 2, 22, 3, 40.00),
(60, 2, 22, 4, 50.00),
(61, 2, 22, 5, 66.00),
(62, 2, 22, 6, 100.00),
(63, 2, 22, 7, 175.00),
(64, 2, 18, 1, 0.00),
(65, 2, 18, 2, 30.00),
(66, 2, 18, 3, 40.00),
(67, 2, 18, 4, 46.00),
(68, 2, 18, 5, 60.00),
(69, 2, 18, 6, 96.00),
(70, 2, 18, 7, 175.00),
(71, 2, 8, 1, 0.00),
(72, 2, 8, 2, 30.00),
(73, 2, 8, 3, 40.00),
(74, 2, 8, 4, 46.00),
(75, 2, 8, 5, 60.00),
(76, 2, 8, 6, 96.00),
(77, 2, 8, 7, 160.00),
(78, 2, 9, 1, 0.00),
(79, 2, 9, 2, 30.00),
(80, 2, 9, 3, 40.00),
(81, 2, 9, 4, 50.00),
(82, 2, 9, 5, 66.00),
(83, 2, 9, 6, 100.00),
(84, 2, 9, 7, 175.00),
(85, 2, 10, 1, 0.00),
(86, 2, 10, 2, 30.00),
(87, 2, 10, 3, 40.00),
(88, 2, 10, 4, 46.00),
(89, 2, 10, 5, 60.00),
(90, 2, 10, 6, 96.00),
(91, 2, 10, 7, 175.00),
(92, 2, 11, 1, 0.00),
(93, 2, 11, 2, 30.00),
(94, 2, 11, 3, 40.00),
(95, 2, 11, 4, 46.00),
(96, 2, 11, 5, 60.00),
(97, 2, 11, 6, 96.00),
(98, 2, 11, 7, 160.00),
(99, 2, 12, 1, 22.00),
(100, 2, 12, 2, 30.00),
(101, 2, 12, 3, 0.00),
(102, 2, 12, 4, 50.00),
(103, 2, 12, 5, 80.00),
(104, 2, 12, 6, 110.00),
(105, 2, 12, 7, 225.00),
(106, 2, 13, 1, 0.00),
(107, 2, 13, 2, 30.00),
(108, 2, 13, 3, 40.00),
(109, 2, 13, 4, 46.00),
(110, 2, 13, 5, 60.00),
(111, 2, 13, 6, 96.00),
(112, 2, 13, 7, 160.00),
(113, 2, 14, 1, 0.00),
(114, 2, 14, 2, 30.00),
(115, 2, 14, 3, 40.00),
(116, 2, 14, 4, 46.00),
(117, 2, 14, 5, 66.00),
(118, 2, 14, 6, 100.00),
(119, 2, 14, 7, 175.00),
(120, 2, 26, 1, 22.00),
(121, 2, 26, 2, 0.00),
(122, 2, 26, 3, 40.00),
(123, 2, 26, 4, 50.00),
(124, 2, 26, 5, 66.00),
(125, 2, 26, 6, 100.00),
(126, 2, 26, 7, 160.00),
(127, 2, 15, 1, 22.00),
(128, 2, 15, 2, 30.00),
(129, 2, 15, 3, 40.00),
(130, 2, 15, 4, 50.00),
(131, 2, 15, 5, 66.00),
(132, 2, 15, 6, 100.00),
(133, 2, 15, 7, 175.00),
(134, 2, 16, 1, 22.00),
(135, 2, 16, 2, 30.00),
(136, 2, 16, 3, 40.00),
(137, 2, 16, 4, 0.00),
(138, 2, 16, 5, 66.00),
(139, 2, 16, 6, 100.00),
(140, 2, 16, 7, 175.00),
(141, 2, 25, 1, 0.00),
(142, 2, 25, 2, 30.00),
(143, 2, 25, 3, 40.00),
(144, 2, 25, 4, 46.00),
(145, 2, 25, 5, 60.00),
(146, 2, 25, 6, 96.00),
(147, 2, 25, 7, 160.00),
(148, 2, 17, 1, 0.00),
(149, 2, 17, 2, 30.00),
(150, 2, 17, 3, 40.00),
(151, 2, 17, 4, 50.00),
(152, 2, 17, 5, 66.00),
(153, 2, 17, 6, 100.00),
(154, 2, 17, 7, 175.00),
(155, 2, 27, 1, 0.00),
(156, 2, 27, 2, 30.00),
(157, 2, 27, 3, 40.00),
(158, 2, 27, 4, 50.00),
(159, 2, 27, 5, 66.00),
(160, 2, 27, 6, 100.00),
(161, 2, 27, 7, 175.00),
(162, 2, 19, 1, 22.00),
(163, 2, 19, 2, 30.00),
(164, 2, 19, 3, 40.00),
(165, 2, 19, 4, 46.00),
(166, 2, 19, 5, 66.00),
(167, 2, 19, 6, 100.00),
(168, 2, 19, 7, 175.00),
(169, 2, 20, 1, 0.00),
(170, 2, 20, 2, 30.00),
(171, 2, 20, 3, 40.00),
(172, 2, 20, 4, 46.00),
(173, 2, 20, 5, 60.00),
(174, 2, 20, 6, 96.00),
(175, 2, 20, 7, 160.00),
(176, 2, 21, 1, 0.00),
(177, 2, 21, 2, 30.00),
(178, 2, 21, 3, 40.00),
(179, 2, 21, 4, 46.00),
(180, 2, 21, 5, 60.00),
(181, 2, 21, 6, 96.00),
(182, 2, 21, 7, 160.00),
(183, 2, 23, 1, 22.00),
(184, 2, 23, 2, 30.00),
(185, 2, 23, 3, 40.00),
(186, 2, 23, 4, 46.00),
(187, 2, 23, 5, 66.00),
(188, 2, 23, 6, 100.00),
(189, 2, 23, 7, 175.00),
(190, 2, 24, 1, 0.00),
(191, 2, 24, 2, 40.00),
(192, 2, 24, 3, 0.00),
(193, 2, 24, 4, 60.00),
(194, 2, 24, 5, 80.00),
(195, 2, 24, 6, 110.00),
(196, 2, 24, 7, 225.00),
(197, 1, 1, 1, 22.00),
(198, 1, 1, 2, 0.00),
(199, 1, 1, 3, 40.00),
(200, 1, 1, 4, 0.00),
(201, 1, 1, 5, 0.00),
(202, 1, 1, 6, 0.00),
(203, 1, 1, 7, 0.00),
(204, 1, 2, 1, 0.00),
(205, 1, 2, 2, 30.00),
(206, 1, 2, 3, 40.00),
(207, 1, 2, 4, 46.00),
(208, 1, 2, 5, 60.00),
(209, 1, 2, 6, 96.00),
(210, 1, 2, 7, 160.00),
(211, 1, 3, 1, 22.00),
(212, 1, 3, 2, 0.00),
(213, 1, 3, 3, 40.00),
(214, 1, 3, 4, 0.00),
(215, 1, 3, 5, 0.00),
(216, 1, 3, 6, 0.00),
(217, 1, 3, 7, 0.00),
(218, 1, 4, 1, 22.00),
(219, 1, 4, 2, 0.00),
(220, 1, 4, 3, 50.00),
(221, 1, 4, 4, 60.00),
(222, 1, 4, 5, 80.00),
(223, 1, 4, 6, 110.00),
(224, 1, 4, 7, 225.00),
(225, 1, 5, 1, 0.00),
(226, 1, 5, 2, 30.00),
(227, 1, 5, 3, 40.00),
(228, 1, 5, 4, 50.00),
(229, 1, 5, 5, 80.00),
(230, 1, 5, 6, 110.00),
(231, 1, 5, 7, 225.00),
(232, 1, 28, 1, 0.00),
(233, 1, 28, 2, 30.00),
(234, 1, 28, 3, 40.00),
(235, 1, 28, 4, 46.00),
(236, 1, 28, 5, 60.00),
(237, 1, 28, 6, 96.00),
(238, 1, 28, 7, 160.00),
(239, 1, 6, 1, 0.00),
(240, 1, 6, 2, 30.00),
(241, 1, 6, 3, 40.00),
(242, 1, 6, 4, 50.00),
(243, 1, 6, 5, 66.00),
(244, 1, 6, 6, 100.00),
(245, 1, 6, 7, 175.00),
(246, 1, 7, 1, 0.00),
(247, 1, 7, 2, 30.00),
(248, 1, 7, 3, 40.00),
(249, 1, 7, 4, 50.00),
(250, 1, 7, 5, 66.00),
(251, 1, 7, 6, 100.00),
(252, 1, 7, 7, 175.00),
(253, 1, 22, 1, 0.00),
(254, 1, 22, 2, 30.00),
(255, 1, 22, 3, 40.00),
(256, 1, 22, 4, 46.00),
(257, 1, 22, 5, 60.00),
(258, 1, 22, 6, 96.00),
(259, 1, 22, 7, 175.00),
(260, 1, 18, 1, 0.00),
(261, 1, 18, 2, 30.00),
(262, 1, 18, 3, 40.00),
(263, 1, 18, 4, 46.00),
(264, 1, 18, 5, 60.00),
(265, 1, 18, 6, 96.00),
(266, 1, 18, 7, 160.00),
(267, 1, 8, 1, 22.00),
(268, 1, 8, 2, 30.00),
(269, 1, 8, 3, 0.00),
(270, 1, 8, 4, 50.00),
(271, 1, 8, 5, 80.00),
(272, 1, 8, 6, 110.00),
(273, 1, 8, 7, 225.00),
(274, 1, 9, 1, 0.00),
(275, 1, 9, 2, 30.00),
(276, 1, 9, 3, 40.00),
(277, 1, 9, 4, 46.00),
(278, 1, 9, 5, 60.00),
(279, 1, 9, 6, 96.00),
(280, 1, 9, 7, 160.00),
(281, 1, 10, 1, 0.00),
(282, 1, 10, 2, 30.00),
(283, 1, 10, 3, 40.00),
(284, 1, 10, 4, 46.00),
(285, 1, 10, 5, 66.00),
(286, 1, 10, 6, 100.00),
(287, 1, 10, 7, 175.00),
(288, 1, 11, 1, 22.00),
(289, 1, 11, 2, 0.00),
(290, 1, 11, 3, 40.00),
(291, 1, 11, 4, 50.00),
(292, 1, 11, 5, 66.00),
(293, 1, 11, 6, 100.00),
(294, 1, 11, 7, 160.00),
(295, 1, 12, 1, 22.00),
(296, 1, 12, 2, 30.00),
(297, 1, 12, 3, 40.00),
(298, 1, 12, 4, 50.00),
(299, 1, 12, 5, 66.00),
(300, 1, 12, 6, 100.00),
(301, 1, 12, 7, 175.00),
(302, 1, 13, 1, 22.00),
(303, 1, 13, 2, 30.00),
(304, 1, 13, 3, 40.00),
(305, 1, 13, 4, 0.00),
(306, 1, 13, 5, 66.00),
(307, 1, 13, 6, 100.00),
(308, 1, 13, 7, 175.00),
(309, 1, 14, 1, 0.00),
(310, 1, 14, 2, 30.00),
(311, 1, 14, 3, 40.00),
(312, 1, 14, 4, 46.00),
(313, 1, 14, 5, 60.00),
(314, 1, 14, 6, 96.00),
(315, 1, 14, 7, 160.00),
(316, 1, 26, 1, 0.00),
(317, 1, 26, 2, 30.00),
(318, 1, 26, 3, 40.00),
(319, 1, 26, 4, 50.00),
(320, 1, 26, 5, 66.00),
(321, 1, 26, 6, 100.00),
(322, 1, 26, 7, 175.00),
(323, 1, 15, 1, 0.00),
(324, 1, 15, 2, 30.00),
(325, 1, 15, 3, 40.00),
(326, 1, 15, 4, 50.00),
(327, 1, 15, 5, 66.00),
(328, 1, 15, 6, 100.00),
(329, 1, 15, 7, 175.00),
(330, 1, 16, 1, 22.00),
(331, 1, 16, 2, 30.00),
(332, 1, 16, 3, 40.00),
(333, 1, 16, 4, 46.00),
(334, 1, 16, 5, 66.00),
(335, 1, 16, 6, 100.00),
(336, 1, 16, 7, 175.00),
(337, 1, 25, 1, 0.00),
(338, 1, 25, 2, 30.00),
(339, 1, 25, 3, 40.00),
(340, 1, 25, 4, 46.00),
(341, 1, 25, 5, 60.00),
(342, 1, 25, 6, 96.00),
(343, 1, 25, 7, 160.00),
(344, 1, 17, 1, 0.00),
(345, 1, 17, 2, 30.00),
(346, 1, 17, 3, 40.00),
(347, 1, 17, 4, 46.00),
(348, 1, 17, 5, 60.00),
(349, 1, 17, 6, 96.00),
(350, 1, 17, 7, 160.00),
(351, 1, 27, 1, 22.00),
(352, 1, 27, 2, 30.00),
(353, 1, 27, 3, 40.00),
(354, 1, 27, 4, 46.00),
(355, 1, 27, 5, 66.00),
(356, 1, 27, 6, 100.00),
(357, 1, 27, 7, 175.00),
(358, 1, 19, 1, 0.00),
(359, 1, 19, 2, 40.00),
(360, 1, 19, 3, 0.00),
(361, 1, 19, 4, 60.00),
(362, 1, 19, 5, 80.00),
(363, 1, 19, 6, 110.00),
(364, 1, 19, 7, 225.00),
(365, 1, 20, 1, 0.00),
(366, 1, 20, 2, 40.00),
(367, 1, 20, 3, 0.00),
(368, 1, 20, 4, 60.00),
(369, 1, 20, 5, 80.00),
(370, 1, 20, 6, 110.00),
(371, 1, 20, 7, 225.00),
(372, 1, 21, 1, 16.00),
(373, 1, 21, 2, 25.00),
(374, 1, 21, 3, 40.00),
(375, 1, 21, 4, 0.00),
(376, 1, 21, 5, 0.00),
(377, 1, 21, 6, 0.00),
(378, 1, 21, 7, 0.00),
(379, 1, 23, 1, 16.00),
(380, 1, 23, 2, 25.00),
(381, 1, 23, 3, 40.00),
(382, 1, 23, 4, 0.00),
(383, 1, 23, 5, 0.00),
(384, 1, 23, 6, 0.00),
(385, 1, 23, 7, 0.00),
(386, 1, 24, 1, 0.00),
(387, 1, 24, 2, 0.00),
(388, 1, 24, 3, 40.00),
(389, 1, 24, 4, 43.00),
(390, 1, 24, 5, 60.00),
(391, 1, 24, 6, 96.00),
(392, 1, 24, 7, 160.00);

-- --------------------------------------------------------

--
-- Table structure for table `servings`
--

CREATE TABLE IF NOT EXISTS `servings` (
  `serving_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `size` varchar(100) CHARACTER SET utf8 NOT NULL,
  `printing_surcharge` decimal(10,2) NOT NULL,
  `ordering` mediumint(5) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`serving_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `servings`
--

INSERT INTO `servings` (`serving_id`, `title`, `size`, `printing_surcharge`, `ordering`, `status`) VALUES
(1, '6-8', '6" Round', 5.00, 0, 1),
(2, '10-12', '8" Round', 10.00, 0, 1),
(3, '12-15', '9" Round', 15.00, 0, 1),
(4, '15-20', '10" Round', 20.00, 0, 1),
(5, '20-30', '1/4 Slab', 25.00, 0, 1),
(6, '40-50', '1/2 Slab', 30.00, 0, 1),
(7, '60-80', 'Full Slab', 35.00, 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1378720187, 1),
(11, 1, '72.136.152.153', 'jobozzo', '8579e29969ad7c2c3e967b4f19b2f82f8af57498', NULL, '0', NULL, NULL, NULL, 1377616713, 1378721128, 1),
(12, 1, '72.136.152.153', 'spencer_s', '384eecc28211dd0e15932da75adc6d0eeaba78e9', NULL, '0', NULL, NULL, NULL, 1377616783, 1378216681, 1),
(13, 2, '72.136.152.153', 'des_lo', 'f5702632df422bf0f0c5b2c03af0dbedf77f0c70', NULL, '0', NULL, NULL, NULL, 1377616831, 1377617430, 1),
(14, 3, '72.136.152.153', 'dan_b', '5d4b859e76cffdaa4f2b0816a21af41e4d23a9bb', NULL, '0', NULL, NULL, NULL, 1377616858, 1377616858, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE IF NOT EXISTS `user_control` (
  `control_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(100) NOT NULL,
  `ordering` tinyint(2) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`control_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_control`
--

INSERT INTO `user_control` (`control_id`, `controller_name`, `ordering`, `active`) VALUES
(1, 'dashboard', 0, 1),
(2, 'users', 12, 1),
(3, 'categories', 1, 1),
(4, 'flavours', 2, 1),
(5, 'cakes', 6, 1),
(6, 'shapes', 4, 1),
(7, 'price_matrix', 5, 1),
(8, 'locations', 8, 1),
(9, 'zones', 9, 1),
(10, 'orders', 10, 1),
(11, 'customers', 11, 1),
(12, 'roles', 13, 1),
(13, 'controls', 14, 1),
(14, 'access_controls', 15, 1),
(15, 'servings', 3, 1),
(16, 'gallery', 7, 1),
(17, 'productions', 17, 1),
(18, 'blackouts', 16, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `title`, `description`, `surcharge`, `ordering`, `status`) VALUES
(1, 'Zone 1', 'Within 5 km of the store location', 20.00, 0, 1),
(2, 'Zone 2', 'Within 10 km of the store location', 40.00, 0, 1),
(3, 'Zone 3', 'Within 20km of the store location', 50.00, 0, 1),
(4, 'Zone 4', '40+ km from store location', 100.00, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
