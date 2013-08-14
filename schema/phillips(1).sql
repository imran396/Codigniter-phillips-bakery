-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2013 at 04:37 PM
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
(1, 16, 1, 1, 0, 0, 0, 0, 0, 1),
(1, 17, 1, 1, 1, 1, 1, 1, 1, 1),
(1, 18, 1, 1, 1, 1, 1, 1, 1, 1),
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
  `flavour_id` mediumint(5) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `blackout_date` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`blackout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blackouts`
--

INSERT INTO `blackouts` (`blackout_id`, `flavour_id`, `location_id`, `blackout_date`, `start_date`, `end_date`) VALUES
(5, 3, 1, '07/02/2013,07/09/2013,07/16/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 2, '07/09/2013,07/16/2013,07/23/2013,07/30/2013', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `tiers` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cake_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`cake_id`, `category_id`, `flavour_id`, `title`, `description`, `shape_id`, `meta_tag`, `image`, `status`, `create_date`, `tiers`, `ordering`) VALUES
(1, 1, 1, 'Beer Bottle', 'St. Phillips Provides its customers With Fresh Bread Baked throughout the Day. Whether you come in the morning, noon, on the way home from work, or in the evening you can be rest assured that your bread is as fresh as can\n\n St. Phillips Provides its customers With Fresh Bread Baked throughout the Day. Whether you come in the morning, noon, on the way home from work, \n\nor in the evening you can be rest assured that your bread is as fresh as can ', 'a:3:{i:0;s:9:"Rectangle";i:1;s:6:"Square";i:2;s:5:"Round";}', 'Beer Bottle', 'assets/uploads/cakes/chocolate_truffel.jpg', 1, '2013-07-14 09:00:30', 2, 0),
(2, 2, 2, 'Book Novel Theme', 'Book Novel Theme', 'a:3:{i:0;s:9:"Rectangle";i:1;s:6:"Square";i:2;s:5:"Round";}', 'Book Novel Theme,black forest', 'assets/uploads/cakes/chocolate_truffel1.jpg', 1, '2013-07-14 09:27:12', 3, 0),
(3, 1, 3, 'Ariel Under the Sea', 'Ariel Under the Sea', 'a:2:{i:0;s:9:"Rectangle";i:1;s:12:"Square Round";}', 'Ariel, Under, Sea', 'assets/uploads/cakes/Black_Forest-300x300.jpg', 1, '2013-06-18 21:45:11', 2, 0),
(4, 2, 3, 'Mousse Cups', ' Every day St. Phillips presents their customers with a large, fresh selection of the finest Pastries. Classic Italian favourites such as Sicilian Cannoli, Sfogliatelle, Baba and Cornetti. We have the best of Europe, Crème Caramel, Pâté choux and Napoleon pastries. Check out St. Phillips’ “must haves”, the pastry chefs’ specialties, including Raspberry Lemon Curd, Opera Slices, Lemon Meringue & White Chocolate Mousse. Oh, by the way, try our delicate brownies...mm...mm...mmm!\n\nAlong with our Pastries all our cookies are made fresh in-house! From Shortbread, to Amaretti, St. Phillips can provide you with a beautiful assortment for that special someone. Need Confetti for an occasion? We have chosen to carry only the best Salmone Brand imported from Italy to ensure that quality is what truly makes the difference!\n', 'a:2:{i:0;s:9:"Rectangle";i:1;s:5:"Round";}', '', 'assets/uploads/cakes/chocolate_truffel1.jpg', 1, '2013-07-14 09:15:32', 2, 0),
(5, 2, 2, 'Football', 'The cake is Football shaped', 'a:2:{i:0;s:5:"Round";i:1;s:7:"Round 2";}', '', 'assets/uploads/cakes/Cake_with_rose_2.jpg', 1, '2013-07-14 09:18:33', 1, 0),
(6, 16, 7, 'New Black Forest Vanila', 'New Black Forest Vanila', 'a:3:{i:0;s:9:"Rectangle";i:1;s:12:"Square Round";i:2;s:6:"Square";}', 'test,test2', 'assets/uploads/cakes/images.jpeg', 1, '2013-07-08 10:04:05', 3, 0),
(7, 13, 9, 'Testing Cake', 'Testing Cake', 'a:2:{i:0;s:9:"Rectangle";i:1;s:5:"Round";}', '', 'assets/uploads/cakes//tmp/phpNzsg1h', 1, '2013-07-15 09:00:35', 5, 0),
(8, 13, 0, 'Testing Cake1', 'Testing Cake', '', '', '', 1, '2013-07-15 08:52:35', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `cake_gallery`
--

INSERT INTO `cake_gallery` (`gallery_id`, `cake_id`, `image`, `status`) VALUES
(16, 6, 'assets/uploads/gallery/p17uusjvo37fe1gvtcdk13cf7le4.jpg', 1),
(17, 6, 'assets/uploads/gallery/p17uusjvo31rrcd201f18162q1i9d5.jpg', 1),
(18, 4, 'assets/uploads/gallery/p17v3k104l13561m03enp1bua6ff5.jpg', 1),
(19, 4, 'assets/uploads/gallery/p17v3k104l6q5p8nblk1rou7bj6.jpg', 1),
(20, 4, 'assets/uploads/gallery/p17v3k104l8115qr17od1che1f67.jpg', 1),
(21, 4, 'assets/uploads/gallery/p17v3k104lm7u1ib714eb17fu1dg98.jpg', 1),
(22, 1, 'assets/uploads/gallery/p17ve6nr5r15cq12tj1v2m11sgs1t4.jpg', 1),
(23, 1, 'assets/uploads/gallery/p17ve6nr5r1ja31i421ael112hkrv5.jpg', 1),
(24, 1, 'assets/uploads/gallery/p17ve6nr5rsqj11khjpma7bv957.jpg', 1),
(25, 1, 'assets/uploads/gallery/p17ve6nr5rkol1ohs14eokcv1gee8.jpg', 1),
(26, 1, 'assets/uploads/gallery/p17ve6nr5r1jupsdl89134g1nam9.jpg', 1),
(27, 1, 'assets/uploads/gallery/p17ve6nr5r1o6r1is1832phcpc2a.jpg', 1),
(28, 1, 'assets/uploads/gallery/p17ve6nr5rjkm1s8h459ndn1sg7b.jpg', 1),
(29, 1, 'assets/uploads/gallery/p17ve6nr5rh851eruvfc16jk3bac.jpg', 1),
(30, 5, 'assets/uploads/gallery/p17ve75ht61lp0dee1pc81l4r1f8d4.jpg', 1),
(31, 5, 'assets/uploads/gallery/p17ve75ht6enc1o69m61hk21p815.jpg', 1),
(32, 5, 'assets/uploads/gallery/p17ve75ht61pd81e7g16bdof41lq7.jpg', 1),
(33, 5, 'assets/uploads/gallery/p17ve75ht617bv1fr61te81ih61jb38.jpg', 1),
(34, 5, 'assets/uploads/gallery/p17ve75ht68ou15o91lh91ab0c839.jpg', 1),
(35, 5, 'assets/uploads/gallery/p17ve75ht6otg2dhsp61f957eta.jpg', 1),
(36, 5, 'assets/uploads/gallery/p17ve75ht6pj03sjs5u1pdgouob.jpg', 1),
(37, 4, 'assets/uploads/gallery/p17ve7e1esu2h5c183jhc1dk64.jpg', 1),
(38, 4, 'assets/uploads/gallery/p17ve7e1esuqas42dqh4up1gha5.jpg', 1),
(39, 4, 'assets/uploads/gallery/p17ve7e1es1mh51f041u3ddkd1b6v7.jpg', 1),
(40, 4, 'assets/uploads/gallery/p17ve7e1es192g6b81ug11ieg1nmp8.jpg', 1),
(41, 4, 'assets/uploads/gallery/p17ve7e1esv0f1knn132riq1bk19.jpg', 1),
(42, 4, 'assets/uploads/gallery/p17ve7e1es5c816e0v7j18t013jda.jpg', 1),
(43, 4, 'assets/uploads/gallery/p17ve7e1esol51jfi37i6drsq5b.jpg', 1),
(44, 5, 'assets/uploads/gallery/p17ve7jhm61frd14dj453lit1plv4.jpg', 1),
(45, 5, 'assets/uploads/gallery/p17ve7jhm614gg11qfmup1m291m2j5.jpg', 1),
(46, 5, 'assets/uploads/gallery/p17ve7jhm61l7a79v1q31kb21upt7.jpg', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `ordering`, `status`) VALUES
(1, 'Adult Cake 	', 0, 1),
(2, 'Baby Shower Cake', 1, 1),
(3, 'Wedding cake', 2, 1),
(4, 'Anniversary Cakes', 0, 1),
(5, 'Birthday Cakes', 0, 1),
(6, 'Bridal Shower Cakes', 0, 1),
(7, 'Christening Cakes', 0, 1),
(8, 'Confirmation Cakes', 0, 1),
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
(21, 'New Year''s Eve', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `country`, `notes`, `email_notification`, `status`) VALUES
(2, 'Ashik', 'Ahmad', '0201203443', 'ashikabcd@gmail.com', 'Uttara', 'Sector#14, Road#19', 'Toronto', '', '10101', 'Bangladesh', '  ', 0, 1),
(3, 'Nancy', 'Charlton', '12313434324325', 'nancy@gmail.com', '', '', 'Toronto', 'qrqer', '34235', 'Canada', ' Regular Customer', 1, 1),
(4, 'dilshad', 'Ferdousi', '12313434324325', 'dilshad@emicrograph.com', '', '', 'Dhaka', 'Dhaka', '1212', 'Bangladesh', ' regular customer', 1, 1),
(5, 'Jenna', 'charlton', '2342342343', 'jenna_charlton@workopolis.com', '', '', 'wwetwt', 'wwtw', 'wtwt', 'wtwtw', ' wwetwt', 0, 1),
(6, 'Sophie', 'meunier', '2342342343', 'sophie_meunier@workopolis.com', '', '', 'Dhaka', 'Dhaka', '1209', 'Canada', ' fgfgdftgfb cftgrh', 1, 1),
(7, 'Paul', 'gherman', '12313434324325', 'paul.gherman+t1@nordlogic.com', '', '', 'ewrfczxesw', 'wefczxew', 'wedxzawe', 'werzxcew', ' esfrescxze', 0, 1),
(8, 'Antoine', 'palangie', '1231343432', 'antoine@workopolis.com', 'sdds', 'dfsfs', 'dhdh', 'Dhaka', 'wtwt', 'Canada', ' ewwefcx efczxerf', 0, 1),
(9, 'M Maksud', '', '123456', 'maksud@', 'Mohammudpur,Dhaka', 'Lalmatia,Dhaka', '', '3tt T57', '3tt T57', 'Canada', '', 0, 1),
(10, 'M Maksud', '', '123456', 'maksud@', 'Mohammudpur,Dhaka', 'Lalmatia,Dhaka', '', '3tt T57', '3tt T57', 'Canada', '', 0, 1),
(11, 'M Maksud', '', '123456', 'maksud@', 'Mohammudpur,Dhaka', 'Lalmatia,Dhaka', '', '3tt T57', '3tt T57', 'Canada', '', 0, 1),
(12, 'M Maksud', '', '123456', 'maksud@', 'Mohammudpur,Dhaka', 'Lalmatia,Dhaka', '', '3tt T57', '3tt T57', 'Canada', '', 0, 1),
(13, 'M Maksud', '', '123456', 'maksud@', 'Mohammudpur,Dhaka', 'Lalmatia,Dhaka', '', '3tt T57', '3tt T57', 'Canada', '', 0, 1),
(14, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(15, 'ash', 'ah', '33', '', '', '', '', '', '', '', '', 0, 1),
(16, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(17, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(18, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(19, 'Evana', 'Shahin', '1 (233) 456-7853', '', '', '', 'Dhaka', '', '', '', '', 0, 1),
(20, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(21, '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(22, 'Evana', 'Shahin', '234-567-8901', 'evana@shahin.edu', 'A fine long general address', 'Line 2 for Address', 'Dhaka', '', '4321', '', '', 0, 1),
(23, 'Tarek', 'Mahmud', '908-765-4321', 'eee@tarek.com', '', '', '', '', '', '', '', 0, 1),
(24, 'Emran', 'ul%20hadi', '332-211-2211', 'em@ran.hadi', '', '', '', '', '', '', '', 0, 1),
(25, 'Horoshima', 'Nagasaki', '420-840-0210', 'boom@boom.com', 'Hiroshima', 'Nagasaki', 'Nagasaki', '', '4200', '', '', 0, 1),
(26, 'Anis', 'Ahmad', '234-567-8912', 'an@is.org', '', '', '', '', '', '', '', 0, 1),
(27, 'abc', 'def', '1%20(234)%20567-8901', 'a@b.c', 'asdasdsd%20dfg%20ddf%20a', '', '', '', '34545', '', '', 0, 1),
(28, 'New', 'Customer', '212-121-2121', 'a@s.c', '', '', '', '', '', '', '', 0, 1),
(29, 'AName', 'BName', '1%20(234)%20567-6780', 'amail@domain.com', '', '', '', '', '', '', '', 0, 1),
(30, '', '', '289-221-6124', 'spencer@gsisolutions.ca', '', '', '', '', '', '', '', 0, 1),
(31, 'Nasir', 'Mandal', '231-452-7349', 'nasir.mandal@waw.com', '', '', 'Dhaka', 'Manitoba', '', '', '', 0, 1),
(32, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(33, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(34, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(35, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(36, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(37, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(38, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(39, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(40, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(41, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(42, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(43, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(44, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(45, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(46, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(47, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(48, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(49, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(50, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(51, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(52, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(53, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(54, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(55, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(56, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(57, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(58, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(59, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(60, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(61, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(62, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(63, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(64, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(65, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(66, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(67, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(68, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(69, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(70, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(71, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(72, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(73, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(74, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(75, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(76, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(77, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(78, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(79, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(80, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(81, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(82, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(83, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(84, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(85, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(86, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(87, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(88, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(89, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(90, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(91, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(92, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(93, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(94, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(95, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(96, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(97, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(98, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(99, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(100, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(101, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(102, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(103, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(104, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(105, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(106, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(107, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(108, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(109, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(110, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(111, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(112, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(113, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(114, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(115, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(116, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(117, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(118, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(119, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(120, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(121, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(122, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(123, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(124, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(125, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(126, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(127, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(128, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(129, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(130, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(131, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(132, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(133, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(134, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(135, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(136, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(137, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(138, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(139, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(140, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(141, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(142, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(143, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(144, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(145, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(146, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(147, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(148, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(149, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(150, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(151, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(152, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(153, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(154, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(155, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(156, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(157, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(158, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(159, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(160, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(161, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(162, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(163, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(164, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(165, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(166, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(167, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(168, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(169, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(170, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(171, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(172, 'Nasir', 'Mandal', '213-456-7890', '', 'Uttara', '', '', 'New Brunswick', '', '', '', 0, 1),
(173, 'Emran', 'UlHadi', '432-123-4567', '', '', '', 'Dhaka', 'Alberta', '', '', '', 0, 1),
(174, 'Emran', 'Hadi', '675-123-4567', '', 'Lake-par', '', '', 'British Columbia', '', '', '', 0, 1),
(175, 'Billal', 'Hossain', '416-782-1091', '', 'Gulshan', '', '', 'New Brunswick', '', '', '', 0, 1);

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
(1, 'Banana Chocolate', 1, '', 3, 1),
(2, 'Black Forest', 1, '', 0, 1),
(3, 'Grand Marnier', 1, '', 0, 1),
(4, 'Vanilla', 1, '', 0, 1),
(5, 'Cappuccino Meringue', 1, '', 0, 1),
(6, 'Caramel Crunch', 1, '', 0, 1),
(7, 'Carrot Cake', 1, '', 0, 1),
(8, 'Chocolate Hazelnut/Bacio', 1, '', 0, 1),
(9, 'Chocolate Truffle', 1, '', 0, 1),
(10, 'Fruit Torte', 1, '', 0, 1),
(11, 'Frutta Di Bosco', 1, '', 0, 1),
(12, 'Lemon Chiffon', 1, '', 0, 1),
(13, 'Lemon Yogurt', 1, '', 0, 1),
(14, 'Mocha', 1, '', 0, 1),
(15, 'Mocha Mousse', 1, '', 0, 1),
(16, 'Rasberry Chocolate Truffle', 1, '', 0, 1),
(17, 'Raspberry Chocolate Mousse', 1, '', 0, 1),
(18, 'Red Velvet', 1, '', 0, 1),
(19, 'Classic Italian', 1, '', 0, 1),
(20, 'Strawberry Shortcake', 1, '', 0, 1),
(21, 'Tiramisu', 1, '', 0, 1),
(22, 'Tiramisu Mousse', 1, '', 0, 1),
(23, 'Chocoloate', 1, '', 0, 1),
(24, 'White Chocolate Mousse', 1, '', 0, 1),
(25, 'Raspberry Lemon Curd', 1, '', 0, 1),
(26, 'Opera Cake', 1, '', 0, 1),
(27, 'Strawberry Cheesecake', 1, '', 0, 1),
(28, 'Chocolate Cheesecake', 1, '', 0, 1);

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
  `instructional_order_id` bigint(20) NOT NULL,
  `instructional_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructional_photo`
--

INSERT INTO `instructional_photo` (`instructional_order_id`, `instructional_photo`) VALUES
(1, 'assets/uploads/4e4nnz39vjk-img-1.jpg'),
(1, 'assets/uploads/kwbetx5bf8g-layer.png'),
(1, 'assets/uploads/q7880rtquzi-logo-2.png'),
(1, 'assets/uploads/fzfti5y9he8-img-1.jpg'),
(1, 'assets/uploads/laqb4p64tkg-layer.png'),
(1, 'assets/uploads/p6pkrn2aplr-logo-2.png'),
(1, 'assets/uploads/p6pkrn2aplr-logo-2.png'),
(1, 'assets/uploads/gallery/2xz0vdnp68g-layer.png'),
(1, 'assets/uploads/gallery/kbdi5bx50ik-logo-2.png'),
(77, 'assets/uploads/gallery/1htw314p80-img-1.jpg/1htw314p80-img-1.jpg'),
(77, 'assets/uploads/gallery/1nph69vaz0w-layer.png/1nph69vaz0w-layer.png'),
(77, 'assets/uploads/gallery/lxa3ph47o0w-logo-2.png/lxa3ph47o0w-logo-2.png'),
(78, 'assets/uploads/gallery/6zdo4rqjhu8-img-1.jpg/6zdo4rqjhu8-img-1.jpg'),
(78, 'assets/uploads/gallery/5wq4yprmavk-layer.png/5wq4yprmavk-layer.png'),
(78, 'assets/uploads/gallery/mspkkeky2io-logo-2.png/mspkkeky2io-logo-2.png'),
(20, 'assets/uploads/gallery/5q34vcrg568-img-1.jpg/5q34vcrg568-img-1.jpg'),
(20, 'assets/uploads/gallery/kl7c57w0s74-layer.png/kl7c57w0s74-layer.png'),
(20, 'assets/uploads/gallery/e6kybb1ra5k-logo-2.png/e6kybb1ra5k-logo-2.png'),
(15, 'assets/uploads/gallery/d6w625kibz4-DSC01412.JPG/d6w625kibz4-DSC01412.JPG'),
(15, 'assets/uploads/gallery/7ipl81sojhc-DSC01411.JPG/7ipl81sojhc-DSC01411.JPG'),
(15, 'assets/uploads/gallery/cru55af94mg-DSC01401.JPG/cru55af94mg-DSC01401.JPG'),
(2, 'assets/uploads/gallery/32wddml0qkw-DSC01412.JPG'),
(2, 'assets/uploads/gallery/q5jtsvzsm4o-DSC01411.JPG'),
(2, 'assets/uploads/gallery/bgw4a19mwhc-DSC01401.JPG'),
(1, '/assets/uploads/gallery/eg60w1vxnpk-DSC01412.JPG'),
(1, '/assets/uploads/gallery/c5060bea3cg-DSC01411.JPG'),
(1, '/assets/uploads/gallery/43cscqmnwzk-DSC01401.JPG'),
(1, '/assets/uploads/gallery/idxlv0ayw1g-DSC01412.JPG'),
(1, '/assets/uploads/gallery/2ks9acy3w9c-DSC01411.JPG'),
(1, '/assets/uploads/gallery/domhk7jbs80-DSC01401.JPG');

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
(1, 'Woodbridge', '5100 Rutherford Road', 'North of Islington Ave', 'Woodbridge ', 'ON', ' L4H 2J2', 'Canada', '', 0.00, 0, 1),
(5, 'Maple Address (Map It)', '2563 Major Mackenzie Drive', '(West of Keele Street)', '', '', 'Maple ON - L6A 2E8', 'Canada', '', 0.00, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `employee_id`, `first_name`, `last_name`, `location_id`, `phone`, `postal_code`, `address`) VALUES
(1, 1, 'SP-10000', 'Admin2', 'istrator3', NULL, '0', '', ''),
(2, 2, 'SP-10001', 'M Shafiq', 'Islam', NULL, NULL, '', ''),
(3, 3, 'SP-10002', 'M Shafiq', 'Islam', NULL, NULL, '', ''),
(4, 4, 'SP-10003', 'fhjf', 'gfhfgh', NULL, NULL, '', ''),
(5, 5, 'SP-10004', 'M Shafiq', 'Islam', 0, NULL, '', ''),
(6, 6, 'SP-10005', 'Samiulx', 'Aminx', 5, NULL, '', ''),
(7, 7, 'SP-10006', 'Imran', 'Rahman', 3, NULL, '', ''),
(8, 8, 'SP-10007', 'Maqsudur', 'Rahman', 3, NULL, '', ''),
(9, 9, 'SP-10008', 'asraful', 'Islam', 2, NULL, '', ''),
(10, 10, 'SP-10009', 'fdgdf', 'fdgfd', 2, NULL, '', ''),
(11, 11, 'SP-100010', 'dvfsdfs', 'sdfsdf', 4, NULL, '', ''),
(12, 12, 'SP-100011', 'fdfd', 'dfsdf', 3, NULL, '', ''),
(13, 13, 'SP-100012', 'dilshad1', 'Ferdousi2', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_code` bigint(20) NOT NULL DEFAULT '0',
  `cake_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `manager_id` mediumint(8) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `pickup_location_id` mediumint(5) NOT NULL,
  `delivery_zone_id` mediumint(5) NOT NULL,
  `delivery_zone_surcharge` decimal(10,2) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `delivery_time` varchar(20) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `fondant` varchar(10) NOT NULL,
  `price_matrix_id` mediumint(8) NOT NULL,
  `tiers` tinyint(2) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `matrix_price` decimal(10,2) NOT NULL,
  `cake_email_photo` varchar(10) NOT NULL,
  `magic_cake_id` varchar(50) NOT NULL,
  `magic_surcharge` decimal(10,2) NOT NULL,
  `on_cake_image` text NOT NULL,
  `inscription` text NOT NULL,
  `special_instruction` text NOT NULL,
  `instructional_email_photo` varchar(10) NOT NULL,
  `vaughan_location` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `override_price` decimal(10,2) NOT NULL,
  `production_status` varchar(50) NOT NULL DEFAULT 'in-production',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_code`, `cake_id`, `customer_id`, `employee_id`, `manager_id`, `location_id`, `order_date`, `delivery_type`, `pickup_location_id`, `delivery_zone_id`, `delivery_zone_surcharge`, `delivery_date`, `delivery_time`, `flavour_id`, `fondant`, `price_matrix_id`, `tiers`, `shape`, `matrix_price`, `cake_email_photo`, `magic_cake_id`, `magic_surcharge`, `on_cake_image`, `inscription`, `special_instruction`, `instructional_email_photo`, `vaughan_location`, `order_status`, `discount_price`, `total_price`, `override_price`, `production_status`) VALUES
(1, 100001, 4, 2, 2, 1, 1, '01/20/2013', '1delivery', 2, 1, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, 'Round', 56.40, 'No', 'MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'order', 110.00, 1275.00, 1000.00, 'in-production'),
(3, 100003, 8, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/img-15.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'cancelled', 110.00, 1275.00, 1250.00, ''),
(4, 100004, 8, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '/assets/uploads/cakes/img-16.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'estimate', 110.00, 1275.00, 1250.00, ''),
(5, 100005, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(6, 100006, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(7, 100007, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, '', 0.00, 'Yes', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, 'in-production'),
(8, 100008, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira10.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(9, 100009, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(10, 100010, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira11.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(11, 100011, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(12, 100012, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', '', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'order', 10.00, 275.00, 250.00, 'ready-for-pickup'),
(13, 100013, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'order', 10.00, 275.00, 250.00, 'sold'),
(14, 100014, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(15, 100015, 5, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/img-13.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(16, 100016, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(17, 100017, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(18, 100018, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(19, 100019, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(20, 100020, 5, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/img-12.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(21, 100021, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(22, 100022, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(23, 100023, 0, 5, 2, 1, 1, '06/20/2013', '', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(24, 100024, 0, 5, 2, 1, 1, '06/20/2013', 'pickup', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, 'Sold'),
(25, 100025, 0, 5, 2, 1, 1, '06/20/2013', 'Delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Sold', 10.00, 275.00, 250.00, ''),
(26, 100026, 0, 5, 2, 1, 1, '06/20/2013', 'Pickup', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Cancelled', 10.00, 275.00, 250.00, ''),
(27, 100027, 0, 5, 2, 1, 1, '06/20/2013', 'Delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, 'Estimated'),
(28, 100028, 0, 5, 2, 1, 1, '06/20/2013', 'Pickup', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(29, 100029, 1, 5, 2, 1, 1, '06/20/2013', 'Pickup', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Sold', 10.00, 275.00, 250.00, ''),
(30, 100030, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(31, 100031, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(32, 100032, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(33, 100033, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(34, 100034, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(35, 100035, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(36, 100036, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(37, 100037, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(38, 100038, 0, 5, 2, 1, 1, '06/20/2013', 'delivery', 2, 1, 10.50, '07/20/2013', '10:30 AM', 1, 'Yes', 2, 4, 'Round', 56.40, 'Yes', 'MC12345', 20.00, '/assets/cakes/cake_image.png', 'The cake is very good', 'The cake is very good Instruction', 'No', 'Yes', 'Pending', 10.00, 275.00, 250.00, ''),
(39, 100039, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(40, 100040, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(41, 100041, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(42, 100042, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(43, 100043, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(44, 100044, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(45, 100045, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(46, 100046, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(47, 100047, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(48, 100048, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(49, 100049, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(50, 100050, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(51, 100051, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(52, 100052, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(53, 100053, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '1/assets/cakes/cake_image.png', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(54, 100054, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option11.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(55, 100055, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option12.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(56, 100056, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option13.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(57, 100057, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option14.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(58, 100058, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option15.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(59, 100059, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Option1.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(60, 100060, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(61, 100061, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira1.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(62, 100062, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira2.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(63, 100063, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira3.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(64, 100064, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira4.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(65, 100065, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira5.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(66, 100066, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira6.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(67, 100067, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira7.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(68, 100068, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira8.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(69, 100069, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(70, 100070, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/Hira9.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(71, 100071, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(72, 100072, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(73, 100073, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(74, 100074, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', 'Pending', 0.00, 0.00, 0.00, ''),
(75, 100075, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, 'assets/uploads/cakes/img-1.jpg', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(76, 100076, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(77, 100077, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, ''),
(78, 100078, 12, 21, 21, 11, 11, '01/20/2013', '1delivery', 21, 11, 101.50, '01/20/2013', '11:30 AM', 11, 'No', 12, 14, '1Round', 156.40, 'No', '1MC12345', 120.00, '', '1The cake is very good', '1The cake is very good Instruction', 'no', 'no', 'Pending', 110.00, 1275.00, 1250.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_back`
--

CREATE TABLE IF NOT EXISTS `orders_back` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_code` bigint(20) NOT NULL DEFAULT '0',
  `cake_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `manager_id` mediumint(8) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `pickup_location_id` mediumint(5) NOT NULL,
  `delivery_zone_id` mediumint(5) NOT NULL,
  `delivery_zone_surcharge` decimal(10,2) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `delivery_time` varchar(20) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `fondant` varchar(10) NOT NULL,
  `price_matrix_id` mediumint(8) NOT NULL,
  `tiers` tinyint(2) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `matrix_price` decimal(10,2) NOT NULL,
  `cake_email_photo` varchar(10) NOT NULL,
  `magic_cake_id` varchar(50) NOT NULL,
  `magic_surcharge` decimal(10,2) NOT NULL,
  `custom_cake_image_name` varchar(200) NOT NULL,
  `custom_cake_image` longblob NOT NULL,
  `inscription` text NOT NULL,
  `special_instruction` text NOT NULL,
  `instructional_email_photo` varchar(10) NOT NULL,
  `vaughan_location` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `override_price` decimal(10,2) NOT NULL,
  `production_status` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `orders_back`
--

INSERT INTO `orders_back` (`order_id`, `order_code`, `cake_id`, `customer_id`, `employee_id`, `manager_id`, `location_id`, `order_date`, `delivery_type`, `pickup_location_id`, `delivery_zone_id`, `delivery_zone_surcharge`, `delivery_date`, `delivery_time`, `flavour_id`, `fondant`, `price_matrix_id`, `tiers`, `shape`, `matrix_price`, `cake_email_photo`, `magic_cake_id`, `magic_surcharge`, `custom_cake_image_name`, `custom_cake_image`, `inscription`, `special_instruction`, `instructional_email_photo`, `vaughan_location`, `order_status`, `discount_price`, `total_price`, `override_price`, `production_status`) VALUES
(1, 100001, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(2, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 3, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(3, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 4, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(4, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 4, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(5, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(6, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(7, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(8, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(9, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(10, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(11, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(12, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(13, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(14, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(15, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(16, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(17, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(18, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(19, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(20, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(21, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(22, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(23, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(24, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(25, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(26, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(27, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(28, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(29, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(30, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(31, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8=>30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, 'Production'),
(32, 0, 1, 5, 1, 1, 1, '06/20/2013', 'delivery', 2, 1, 49.90, '07/08/2013', '8:30 AM', 1, 'yes', 1, 4, 'Round', 56.90, 'yes', '#MC12345', 40.00, '../photo.png', '', 'The cake is very good', 'Test', 'yes', 'yes', 'estimate', 10.80, 999.90, 49.90, ''),
(33, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(34, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(35, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(36, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(37, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(38, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(39, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(40, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, ''),
(41, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0.00, '', '', 0, '', 0, 0, '', 0.00, '', '', 0.00, '', '', '', '', '', '', '', 0.00, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_old`
--

CREATE TABLE IF NOT EXISTS `orders_old` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_code` bigint(20) NOT NULL DEFAULT '0',
  `cake_id` int(11) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `manager_id` mediumint(8) NOT NULL,
  `location_id` mediumint(5) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `delivery_type` varchar(20) NOT NULL,
  `pickup_location_id` mediumint(5) NOT NULL,
  `delivery_zone_id` mediumint(5) NOT NULL,
  `delivery_zone_surcharge` decimal(10,2) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `delivery_time` varchar(20) NOT NULL,
  `flavour_id` int(11) NOT NULL,
  `fondant` varchar(10) NOT NULL,
  `price_matrix_id` mediumint(8) NOT NULL,
  `tiers` tinyint(2) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `matrix_price` decimal(10,2) NOT NULL,
  `cake_email_photo` varchar(10) NOT NULL,
  `magic_cake_id` varchar(50) NOT NULL,
  `magic_surcharge` decimal(10,2) NOT NULL,
  `custom_cake_image_name` varchar(200) NOT NULL,
  `custom_cake_image` text NOT NULL,
  `inscription` text NOT NULL,
  `special_instruction` text NOT NULL,
  `instructional_email_photo` varchar(10) NOT NULL,
  `vaughan_location` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `override_price` decimal(10,2) NOT NULL,
  `production_status` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery`
--

CREATE TABLE IF NOT EXISTS `order_delivery` (
  `delivery_order_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `postal` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `delivery_instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_delivery`
--

INSERT INTO `order_delivery` (`delivery_order_id`, `name`, `phone`, `address_1`, `address_2`, `postal`, `city`, `province`, `delivery_instruction`) VALUES
(27, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(28, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(29, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(30, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(31, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(38, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(1, 'M Shafiq', '12345678', 'Dhakaa, Lalmati', 'Dhaka2, Lalmati2', '4TP 7GK', 'DhaKa', 'Uttara', 'The cake is very good spacial instruction'),
(15, 'shafiq', '', '', '', '', '', '', ''),
(12, 'Imran', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

CREATE TABLE IF NOT EXISTS `order_notes` (
  `order_notes_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `employee_id` mediumint(8) NOT NULL,
  `create_date` int(10) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`order_notes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_notes`
--

INSERT INTO `order_notes` (`order_notes_id`, `order_id`, `employee_id`, `create_date`, `notes`) VALUES
(1, 1, 3, 1373260236, 'Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. '),
(2, 1, 2, 1373260236, 'Lorem ipsum set amet dolore illum aplha lorem upsum. Lorem ipsum set amet dolore and aplha lorem upsum. Lorem ipsum set amet dolore illum aplha lorem upsum. '),
(3, 5, 2, 1373260236, 'Tesy message');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`title`, `description`, `status`) VALUES
('cancel-order', 'Cancel Order', 1),
('in-production', 'In Production', 1),
('ready-for-pickup', 'Ready For Pickup', 1),
('sold', 'Sold', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=499 ;

--
-- Dumping data for table `price_matrix`
--

INSERT INTO `price_matrix` (`price_matrix_id`, `location_id`, `flavour_id`, `serving_id`, `price`) VALUES
(1, 1, 2, 2, 30.00),
(2, 1, 2, 4, 30.00),
(3, 1, 2, 5, 40.00),
(4, 1, 2, 3, 60.00),
(5, 1, 2, 6, 46.00),
(6, 1, 2, 7, 96.00),
(7, 1, 2, 8, 160.00),
(8, 1, 3, 2, 30.00),
(9, 1, 3, 4, 30.00),
(10, 1, 3, 5, 40.00),
(11, 1, 3, 3, 60.00),
(12, 1, 3, 6, 46.00),
(13, 1, 3, 7, 96.00),
(14, 1, 3, 8, 175.00),
(15, 1, 1, 2, 22.00),
(16, 1, 1, 4, 0.00),
(17, 1, 1, 5, 40.00),
(18, 1, 1, 3, 0.00),
(19, 1, 1, 6, 0.00),
(20, 1, 1, 7, 0.00),
(21, 1, 1, 8, 0.00),
(22, 2, 2, 4, 1.00),
(23, 2, 2, 5, 0.00),
(24, 2, 2, 6, 0.00),
(25, 2, 2, 3, 0.00),
(26, 2, 2, 7, 0.00),
(27, 2, 2, 8, 0.00),
(28, 2, 3, 4, 2.00),
(29, 2, 3, 5, 0.00),
(30, 2, 3, 6, 0.00),
(31, 2, 3, 3, 0.00),
(32, 2, 3, 7, 0.00),
(33, 2, 3, 8, 0.00),
(34, 2, 4, 4, 3.00),
(35, 2, 4, 5, 0.00),
(36, 2, 4, 6, 0.00),
(37, 2, 4, 3, 0.00),
(38, 2, 4, 7, 0.00),
(39, 2, 4, 8, 0.00),
(40, 2, 1, 4, 4.00),
(41, 2, 1, 5, 0.00),
(42, 2, 1, 6, 0.00),
(43, 2, 1, 3, 0.00),
(44, 2, 1, 7, 0.00),
(45, 2, 1, 8, 0.00),
(46, 1, 4, 2, 30.00),
(47, 1, 4, 4, 30.00),
(48, 1, 4, 5, 40.00),
(49, 1, 4, 6, 46.00),
(50, 1, 4, 3, 60.00),
(51, 1, 4, 7, 96.00),
(52, 1, 4, 8, 160.00),
(53, 1, 5, 2, 22.00),
(54, 1, 5, 4, 0.00),
(55, 1, 5, 5, 40.00),
(56, 1, 5, 6, 0.00),
(57, 1, 5, 3, 0.00),
(58, 1, 5, 7, 0.00),
(59, 1, 5, 8, 0.00),
(60, 1, 6, 2, 22.00),
(61, 1, 6, 4, 0.00),
(62, 1, 6, 5, 40.00),
(63, 1, 6, 6, 0.00),
(64, 1, 6, 3, 0.00),
(65, 1, 6, 7, 0.00),
(66, 1, 6, 8, 0.00),
(67, 1, 7, 2, 22.00),
(68, 1, 7, 4, 0.00),
(69, 1, 7, 5, 40.00),
(70, 1, 7, 6, 60.00),
(71, 1, 7, 3, 80.00),
(72, 1, 7, 7, 110.00),
(73, 1, 7, 8, 225.00),
(74, 1, 8, 2, 0.00),
(75, 1, 8, 4, 30.00),
(76, 1, 8, 5, 40.00),
(77, 1, 8, 6, 50.00),
(78, 1, 8, 3, 80.00),
(79, 1, 8, 7, 110.00),
(80, 1, 8, 8, 225.00),
(81, 1, 9, 2, 0.00),
(82, 1, 9, 4, 30.00),
(83, 1, 9, 5, 40.00),
(84, 1, 9, 6, 46.00),
(85, 1, 9, 3, 60.00),
(86, 1, 9, 7, 96.00),
(87, 1, 9, 8, 160.00),
(88, 1, 10, 2, 0.00),
(89, 1, 10, 4, 30.00),
(90, 1, 10, 5, 40.00),
(91, 1, 10, 6, 50.00),
(92, 1, 10, 3, 66.00),
(93, 1, 10, 7, 100.00),
(94, 1, 10, 8, 175.00),
(95, 1, 11, 2, 0.00),
(96, 1, 11, 4, 30.00),
(97, 1, 11, 5, 40.00),
(98, 1, 11, 6, 50.00),
(99, 1, 11, 3, 66.00),
(100, 1, 11, 7, 100.00),
(101, 1, 11, 8, 175.00),
(102, 1, 12, 2, 0.00),
(103, 1, 12, 4, 30.00),
(104, 1, 12, 5, 40.00),
(105, 1, 12, 6, 46.00),
(106, 1, 12, 3, 60.00),
(107, 1, 12, 7, 96.00),
(108, 1, 12, 8, 160.00),
(109, 1, 13, 2, 22.00),
(110, 1, 13, 4, 30.00),
(111, 1, 13, 5, 0.00),
(112, 1, 13, 6, 50.00),
(113, 1, 13, 3, 80.00),
(114, 1, 13, 7, 110.00),
(115, 1, 13, 8, 225.00),
(116, 1, 14, 2, 0.00),
(117, 1, 14, 4, 30.00),
(118, 1, 14, 5, 40.00),
(119, 1, 14, 6, 46.00),
(120, 1, 14, 3, 60.00),
(121, 1, 14, 7, 96.00),
(122, 1, 14, 8, 160.00),
(123, 1, 15, 2, 0.00),
(124, 1, 15, 4, 30.00),
(125, 1, 15, 5, 40.00),
(126, 1, 15, 6, 46.00),
(127, 1, 15, 3, 66.00),
(128, 5, 2, 2, 5.00),
(129, 5, 2, 4, 0.00),
(130, 5, 2, 5, 0.00),
(131, 5, 2, 6, 0.00),
(132, 5, 2, 3, 0.00),
(133, 5, 2, 7, 0.00),
(134, 5, 2, 8, 0.00),
(135, 5, 3, 2, 0.00),
(136, 5, 3, 4, 0.00),
(137, 5, 3, 5, 0.00),
(138, 5, 3, 6, 0.00),
(139, 5, 3, 3, 0.00),
(140, 5, 3, 7, 0.00),
(141, 5, 3, 8, 0.00),
(142, 5, 4, 2, 0.00),
(143, 5, 4, 4, 0.00),
(144, 5, 4, 5, 0.00),
(145, 5, 4, 6, 0.00),
(146, 5, 4, 3, 0.00),
(147, 5, 4, 7, 0.00),
(148, 5, 4, 8, 0.00),
(149, 5, 5, 2, 0.00),
(150, 5, 5, 4, 0.00),
(151, 5, 5, 5, 0.00),
(152, 5, 5, 6, 0.00),
(153, 5, 5, 3, 0.00),
(154, 5, 5, 7, 0.00),
(155, 5, 5, 8, 0.00),
(156, 5, 6, 2, 0.00),
(157, 5, 6, 4, 0.00),
(158, 5, 6, 5, 0.00),
(159, 5, 6, 6, 0.00),
(160, 5, 6, 3, 0.00),
(161, 5, 6, 7, 0.00),
(162, 5, 6, 8, 0.00),
(163, 5, 7, 2, 0.00),
(164, 5, 7, 4, 0.00),
(165, 5, 7, 5, 0.00),
(166, 5, 7, 6, 0.00),
(167, 5, 7, 3, 0.00),
(168, 5, 7, 7, 0.00),
(169, 5, 7, 8, 0.00),
(170, 5, 8, 2, 0.00),
(171, 5, 8, 4, 0.00),
(172, 5, 8, 5, 0.00),
(173, 5, 8, 6, 0.00),
(174, 5, 8, 3, 0.00),
(175, 5, 8, 7, 0.00),
(176, 5, 8, 8, 0.00),
(177, 5, 9, 2, 0.00),
(178, 5, 9, 4, 0.00),
(179, 5, 9, 5, 0.00),
(180, 5, 9, 6, 0.00),
(181, 5, 9, 3, 0.00),
(182, 5, 9, 7, 0.00),
(183, 5, 9, 8, 0.00),
(184, 5, 10, 2, 0.00),
(185, 5, 10, 4, 0.00),
(186, 5, 10, 5, 0.00),
(187, 5, 10, 6, 0.00),
(188, 5, 10, 3, 0.00),
(189, 5, 10, 7, 0.00),
(190, 5, 10, 8, 0.00),
(191, 5, 11, 2, 0.00),
(192, 5, 11, 4, 0.00),
(193, 5, 11, 5, 0.00),
(194, 5, 11, 6, 0.00),
(195, 5, 11, 3, 0.00),
(196, 5, 11, 7, 0.00),
(197, 5, 11, 8, 0.00),
(198, 5, 12, 2, 0.00),
(199, 5, 12, 4, 0.00),
(200, 5, 12, 5, 0.00),
(201, 5, 12, 6, 0.00),
(202, 5, 12, 3, 0.00),
(203, 5, 12, 7, 0.00),
(204, 5, 12, 8, 0.00),
(205, 5, 13, 2, 0.00),
(206, 5, 13, 4, 0.00),
(207, 5, 13, 5, 0.00),
(208, 5, 13, 6, 0.00),
(209, 5, 13, 3, 0.00),
(210, 5, 13, 7, 0.00),
(211, 5, 13, 8, 0.00),
(212, 5, 14, 2, 0.00),
(213, 5, 14, 4, 0.00),
(214, 5, 14, 5, 0.00),
(215, 5, 14, 6, 0.00),
(216, 5, 14, 3, 0.00),
(217, 5, 14, 7, 0.00),
(218, 5, 14, 8, 0.00),
(219, 5, 15, 2, 0.00),
(220, 5, 15, 4, 0.00),
(221, 5, 15, 5, 0.00),
(222, 5, 15, 6, 0.00),
(223, 5, 15, 3, 0.00),
(224, 5, 15, 7, 0.00),
(225, 5, 15, 8, 0.00),
(226, 5, 16, 2, 0.00),
(227, 5, 16, 4, 0.00),
(228, 5, 16, 5, 0.00),
(229, 5, 16, 6, 0.00),
(230, 5, 16, 3, 0.00),
(231, 5, 16, 7, 0.00),
(232, 5, 16, 8, 0.00),
(233, 5, 17, 2, 0.00),
(234, 5, 17, 4, 0.00),
(235, 5, 17, 5, 0.00),
(236, 5, 17, 6, 0.00),
(237, 5, 17, 3, 0.00),
(238, 5, 17, 7, 0.00),
(239, 5, 17, 8, 0.00),
(240, 5, 18, 2, 0.00),
(241, 5, 18, 4, 0.00),
(242, 5, 18, 5, 0.00),
(243, 5, 18, 6, 0.00),
(244, 5, 18, 3, 0.00),
(245, 5, 18, 7, 0.00),
(246, 5, 18, 8, 0.00),
(247, 5, 19, 2, 0.00),
(248, 5, 19, 4, 0.00),
(249, 5, 19, 5, 0.00),
(250, 5, 19, 6, 0.00),
(251, 5, 19, 3, 0.00),
(252, 5, 19, 7, 0.00),
(253, 5, 19, 8, 0.00),
(254, 5, 20, 2, 0.00),
(255, 5, 20, 4, 0.00),
(256, 5, 20, 5, 0.00),
(257, 5, 20, 6, 0.00),
(258, 5, 20, 3, 0.00),
(259, 5, 20, 7, 0.00),
(260, 5, 20, 8, 0.00),
(261, 5, 21, 2, 0.00),
(262, 5, 21, 4, 0.00),
(263, 5, 21, 5, 0.00),
(264, 5, 21, 6, 0.00),
(265, 5, 21, 3, 0.00),
(266, 5, 21, 7, 0.00),
(267, 5, 21, 8, 0.00),
(268, 5, 22, 2, 0.00),
(269, 5, 22, 4, 0.00),
(270, 5, 22, 5, 0.00),
(271, 5, 22, 6, 0.00),
(272, 5, 22, 3, 0.00),
(273, 5, 22, 7, 0.00),
(274, 5, 22, 8, 0.00),
(275, 5, 23, 2, 0.00),
(276, 5, 23, 4, 0.00),
(277, 5, 23, 5, 0.00),
(278, 5, 23, 6, 0.00),
(279, 5, 23, 3, 0.00),
(280, 5, 23, 7, 0.00),
(281, 5, 23, 8, 0.00),
(282, 5, 24, 2, 0.00),
(283, 5, 24, 4, 0.00),
(284, 5, 24, 5, 0.00),
(285, 5, 24, 6, 0.00),
(286, 5, 24, 3, 0.00),
(287, 5, 24, 7, 0.00),
(288, 5, 24, 8, 0.00),
(289, 5, 25, 2, 0.00),
(290, 5, 25, 4, 0.00),
(291, 5, 25, 5, 0.00),
(292, 5, 25, 6, 0.00),
(293, 5, 25, 3, 0.00),
(294, 5, 25, 7, 0.00),
(295, 5, 25, 8, 0.00),
(296, 5, 26, 2, 0.00),
(297, 5, 26, 4, 0.00),
(298, 5, 26, 5, 0.00),
(299, 5, 26, 6, 0.00),
(300, 5, 26, 3, 0.00),
(301, 5, 26, 7, 0.00),
(302, 5, 26, 8, 0.00),
(303, 5, 27, 2, 0.00),
(304, 5, 27, 4, 0.00),
(305, 5, 27, 5, 0.00),
(306, 5, 27, 6, 0.00),
(307, 5, 27, 3, 0.00),
(308, 5, 27, 7, 0.00),
(309, 5, 27, 8, 0.00),
(310, 5, 28, 2, 0.00),
(311, 5, 28, 4, 0.00),
(312, 5, 28, 5, 0.00),
(313, 5, 28, 6, 0.00),
(314, 5, 28, 3, 0.00),
(315, 5, 28, 7, 0.00),
(316, 5, 28, 8, 0.00),
(317, 5, 1, 2, 0.00),
(318, 5, 1, 4, 0.00),
(319, 5, 1, 5, 0.00),
(320, 5, 1, 6, 0.00),
(321, 5, 1, 3, 0.00),
(322, 5, 1, 7, 0.00),
(323, 5, 1, 8, 0.00),
(324, 1, 4, 2, 30.00),
(325, 1, 4, 4, 0.00),
(326, 1, 4, 5, 0.00),
(327, 1, 4, 6, 0.00),
(328, 1, 4, 3, 0.00),
(329, 1, 4, 7, 0.00),
(330, 1, 4, 8, 0.00),
(331, 1, 5, 2, 0.00),
(332, 1, 5, 4, 0.00),
(333, 1, 5, 5, 0.00),
(334, 1, 5, 6, 0.00),
(335, 1, 5, 3, 0.00),
(336, 1, 5, 7, 0.00),
(337, 1, 5, 8, 0.00),
(338, 1, 6, 2, 0.00),
(339, 1, 6, 4, 0.00),
(340, 1, 6, 5, 0.00),
(341, 1, 6, 6, 0.00),
(342, 1, 6, 3, 0.00),
(343, 1, 6, 7, 0.00),
(344, 1, 6, 8, 0.00),
(345, 1, 7, 2, 0.00),
(346, 1, 7, 4, 0.00),
(347, 1, 7, 5, 0.00),
(348, 1, 7, 6, 0.00),
(349, 1, 7, 3, 0.00),
(350, 1, 7, 7, 0.00),
(351, 1, 7, 8, 0.00),
(352, 1, 8, 2, 30.00),
(353, 1, 8, 4, 0.00),
(354, 1, 8, 5, 0.00),
(355, 1, 8, 6, 0.00),
(356, 1, 8, 3, 0.00),
(357, 1, 8, 7, 0.00),
(358, 1, 8, 8, 0.00),
(359, 1, 9, 2, 30.00),
(360, 1, 9, 4, 0.00),
(361, 1, 9, 5, 0.00),
(362, 1, 9, 6, 0.00),
(363, 1, 9, 3, 0.00),
(364, 1, 9, 7, 0.00),
(365, 1, 9, 8, 0.00),
(366, 1, 10, 2, 30.00),
(367, 1, 10, 4, 0.00),
(368, 1, 10, 5, 0.00),
(369, 1, 10, 6, 0.00),
(370, 1, 10, 3, 0.00),
(371, 1, 10, 7, 0.00),
(372, 1, 10, 8, 0.00),
(373, 1, 11, 2, 30.00),
(374, 1, 11, 4, 0.00),
(375, 1, 11, 5, 0.00),
(376, 1, 11, 6, 0.00),
(377, 1, 11, 3, 0.00),
(378, 1, 11, 7, 0.00),
(379, 1, 11, 8, 0.00),
(380, 1, 12, 2, 30.00),
(381, 1, 12, 4, 0.00),
(382, 1, 12, 5, 0.00),
(383, 1, 12, 6, 0.00),
(384, 1, 12, 3, 0.00),
(385, 1, 12, 7, 0.00),
(386, 1, 12, 8, 0.00),
(387, 1, 13, 2, 30.00),
(388, 1, 13, 4, 0.00),
(389, 1, 13, 5, 0.00),
(390, 1, 13, 6, 0.00),
(391, 1, 13, 3, 0.00),
(392, 1, 13, 7, 0.00),
(393, 1, 13, 8, 0.00),
(394, 1, 14, 2, 30.00),
(395, 1, 14, 4, 0.00),
(396, 1, 14, 5, 0.00),
(397, 1, 14, 6, 0.00),
(398, 1, 14, 3, 0.00),
(399, 1, 14, 7, 0.00),
(400, 1, 14, 8, 0.00),
(401, 1, 15, 2, 30.00),
(402, 1, 15, 4, 0.00),
(403, 1, 15, 5, 0.00),
(404, 1, 15, 6, 0.00),
(405, 1, 15, 3, 0.00),
(406, 1, 15, 7, 110.00),
(407, 1, 15, 8, 0.00),
(408, 1, 16, 2, 22.00),
(409, 1, 16, 4, 0.00),
(410, 1, 16, 5, 40.00),
(411, 1, 16, 6, 50.00),
(412, 1, 16, 3, 0.00),
(413, 1, 16, 7, 0.00),
(414, 1, 16, 8, 0.00),
(415, 1, 17, 2, 22.00),
(416, 1, 17, 4, 30.00),
(417, 1, 17, 5, 40.00),
(418, 1, 17, 6, 50.00),
(419, 1, 17, 3, 0.00),
(420, 1, 17, 7, 0.00),
(421, 1, 17, 8, 0.00),
(422, 1, 18, 2, 22.00),
(423, 1, 18, 4, 30.00),
(424, 1, 18, 5, 40.00),
(425, 1, 18, 6, 0.00),
(426, 1, 18, 3, 0.00),
(427, 1, 18, 7, 0.00),
(428, 1, 18, 8, 0.00),
(429, 1, 19, 2, 0.00),
(430, 1, 19, 4, 30.00),
(431, 1, 19, 5, 40.00),
(432, 1, 19, 6, 46.00),
(433, 1, 19, 3, 0.00),
(434, 1, 19, 7, 0.00),
(435, 1, 19, 8, 0.00),
(436, 1, 20, 2, 0.00),
(437, 1, 20, 4, 30.00),
(438, 1, 20, 5, 40.00),
(439, 1, 20, 6, 50.00),
(440, 1, 20, 3, 0.00),
(441, 1, 20, 7, 0.00),
(442, 1, 20, 8, 0.00),
(443, 1, 21, 2, 0.00),
(444, 1, 21, 4, 30.00),
(445, 1, 21, 5, 40.00),
(446, 1, 21, 6, 50.00),
(447, 1, 21, 3, 0.00),
(448, 1, 21, 7, 0.00),
(449, 1, 21, 8, 0.00),
(450, 1, 22, 2, 22.00),
(451, 1, 22, 4, 30.00),
(452, 1, 22, 5, 40.00),
(453, 1, 22, 6, 46.00),
(454, 1, 22, 3, 0.00),
(455, 1, 22, 7, 0.00),
(456, 1, 22, 8, 0.00),
(457, 1, 23, 2, 0.00),
(458, 1, 23, 4, 30.00),
(459, 1, 23, 5, 40.00),
(460, 1, 23, 6, 46.00),
(461, 1, 23, 3, 0.00),
(462, 1, 23, 7, 0.00),
(463, 1, 23, 8, 0.00),
(464, 1, 24, 2, 22.00),
(465, 1, 24, 4, 30.00),
(466, 1, 24, 5, 40.00),
(467, 1, 24, 6, 46.00),
(468, 1, 24, 3, 66.00),
(469, 1, 24, 7, 100.00),
(470, 1, 24, 8, 175.00),
(471, 1, 25, 2, 0.00),
(472, 1, 25, 4, 40.00),
(473, 1, 25, 5, 0.00),
(474, 1, 25, 6, 60.00),
(475, 1, 25, 3, 80.00),
(476, 1, 25, 7, 110.00),
(477, 1, 25, 8, 225.00),
(478, 1, 26, 2, 0.00),
(479, 1, 26, 4, 40.00),
(480, 1, 26, 5, 0.00),
(481, 1, 26, 6, 60.00),
(482, 1, 26, 3, 80.00),
(483, 1, 26, 7, 110.00),
(484, 1, 26, 8, 225.00),
(485, 1, 27, 2, 16.00),
(486, 1, 27, 4, 25.00),
(487, 1, 27, 5, 40.00),
(488, 1, 27, 6, 0.00),
(489, 1, 27, 3, 0.00),
(490, 1, 27, 7, 0.00),
(491, 1, 27, 8, 0.00),
(492, 1, 28, 2, 16.00),
(493, 1, 28, 4, 25.00),
(494, 1, 28, 5, 40.00),
(495, 1, 28, 6, 0.00),
(496, 1, 28, 3, 0.00),
(497, 1, 28, 7, 0.00),
(498, 1, 28, 8, 0.00);

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
(2, '6-8', '6" round', 0, 1),
(3, '20-30', '1/4 slab', 4, 1),
(4, '10-12', '8" round', 1, 1),
(5, '12-15', '9" round', 2, 1),
(6, '15-20', '10" round', 3, 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`shape_id`, `title`, `ordering`, `status`) VALUES
(3, 'Rectangle', 0, 1),
(4, 'Square Round', 0, 1),
(5, 'Square', 0, 1),
(6, 'Round', 0, 1),
(7, 'Round 2', 0, 1),
(8, 'round 3', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '49247b3ddefbd2bbeb140b09bb0820c18949b325', '9462e8eee0', '1admin@admin.com', '', NULL, 'c8b84d7ae849fb82a5984e6653340d3b41729b0d', 1268889823, 1373865874, 1),
(2, 2, '127.0.0.1', 'admin', '3e082c38a4f0eacf970adf483f31fc17630ac754', NULL, '0', NULL, NULL, '66e272b8635eee519049ae53b7b0c89612763d9c', 1368551217, 1368591499, 1),
(3, 2, '127.0.0.1', 'sislam', 'a53c3ffeb3daca8e568e424ce3ad5b10ddc916fc', NULL, '0', NULL, NULL, NULL, 1369204334, 1369204348, 1),
(4, 2, '127.0.0.1', 'admin2', 'af71faa19ef5029f247e88803f3d46225002198b', NULL, '', NULL, NULL, NULL, 1369216210, 1369216210, 1),
(5, 3, '127.0.0.1', 'islam', 'f325887144195c402593e48f1750ae052ea981a6', NULL, 'shafiqx@emicrograph.com', NULL, NULL, '6113e35714c8ad5bb9a9d335205b999a733a7280', 1370943111, 1371039701, 0),
(6, 2, '127.0.0.1', 'samiul', 'ac4c9929aff5b8894eec22497dc77f202c68311c', NULL, 'samiul@gmail.com', NULL, NULL, NULL, 1370943464, 1370943464, 0),
(7, 3, '127.0.0.1', 'imran', '43858b01c070988ae4274bcc85c60c39a506e8e4', NULL, 'samiul@gmail.com', NULL, NULL, NULL, 1371536070, 1371536070, 1),
(8, 3, '127.0.0.1', 'rahman', '2788f86bf2a318da2e2bb42b3aa1e0937df1ac02', NULL, 'maqsud@gmail.com', NULL, NULL, NULL, 1371553601, 1371553601, 1),
(9, 2, '127.0.0.1', 'asraful', '6a1e422e52cd9dc217e977201d1fa5e9691dd6e0', NULL, 'asraful@gmail.com', NULL, NULL, NULL, 1371553690, 1371553690, 1),
(10, 3, '127.0.0.1', 'dgsgd', 'ab865578cf9f72da4152835da3558cadec782b53', NULL, '', NULL, NULL, NULL, 1371553788, 1371553788, 1),
(11, 2, '127.0.0.1', 'admddsf', 'ec4bdf77b83c57d4ae6161b0a6d469d89de8042b', NULL, '', NULL, NULL, NULL, 1371553900, 1371553900, 1),
(12, 2, '127.0.0.1', 'nistrator', 'ff26c226042d369679f22e633ebf0eaabb4ed5ea', NULL, '', NULL, NULL, NULL, 1371553954, 1371553954, 1),
(13, 2, '120.50.7.58', 'dilshad', 'ba65acb1b035567815341dc0f8ed04d437c8e748', NULL, 'shafiq@emicrograph.com', NULL, NULL, NULL, 1372053014, 1372053014, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `title`, `description`, `surcharge`, `ordering`, `status`) VALUES
(1, 'Toronto Opera House', 'Toronto Opera House', 12.00, 1, 1),
(2, 'Cappuccino Meringue', 'ggfgghh', 23.00, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
