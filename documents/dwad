-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2018 at 12:46 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticeboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `uid` int(100) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`uid`, `id`, `category_name`, `timestamp`, `created`, `modified`) VALUES
(1, 8, 'jhg', '2018-09-21 08:08:32', '2018-08-27', '2018-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `g_users`
--

DROP TABLE IF EXISTS `g_users`;
CREATE TABLE IF NOT EXISTS `g_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `g_users`
--

INSERT INTO `g_users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `status`, `created`, `modified`) VALUES
(29, 'google', '104831926786676899867', 'YAGNA', 'SORATHIYA', '16it136@charusat.edu.in', '', 'en', 'https://lh6.googleusercontent.com/-jGLl7NlSHwc/AAAAAAAAAAI/AAAAAAAAAAA/ABtNlbBeD5spFHlfXHTXKR7ppzntBIeuig/mo/photo.jpg', 'https://plus.google.com/104831926786676899867', '0', '2018-10-19 11:49:19', '2018-10-19 11:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `notice_creator` varchar(10) NOT NULL,
  `uid` int(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `end_date` date DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `docname` varchar(100) DEFAULT NULL,
  `docpath` varchar(100) DEFAULT NULL,
  `upload_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice_creator`, `uid`, `Title`, `category`, `end_date`, `content`, `docname`, `docpath`, `upload_date`, `timestamp`, `created`, `modified`) VALUES
(138, 'ff', 19, 'dawd', 'jhg', '2018-10-19', '', '', 'documents/', '2018-10-19', '2018-10-19 12:38:07', '2018-10-19', '2018-10-19'),
(137, 'dwuah', 12, 'dwda', 'jhg', '2018-10-19', '', '', 'documents/', '2018-10-19', '2018-10-19 12:37:40', '2018-10-19', '2018-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `username`, `password`, `email`, `contact_no`, `address`, `city`, `role`, `status`, `created`, `modified`) VALUES
(1, 'Yagna', 'ee', 'admin@n.com', '123456789', 'gandhidham', 'gandhidham', 'admin', 'active', '2018-06-23', '2018-08-15'),
(12, 'dwuah', 'dhwad', 'yagnasorathiya1294@gmail.com', '6576767', 'wdwad', 'ndbwajdb', 'subadmin', 'Active', '2018-08-06', '2018-08-06'),
(19, 'ff', 'ff', 'rfed@dwad.com', '(345) 678-9009', 'aef', 'faf', 'subadmin', 'Active', '2018-10-03', '2018-10-03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
