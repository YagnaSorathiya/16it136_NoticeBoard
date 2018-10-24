-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 11:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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

CREATE TABLE `category` (
  `uid` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`uid`, `id`, `category_name`, `created`, `modified`) VALUES
(1, 9, 'HTML', '2018-09-18', '2018-09-18'),
(1, 10, 'CSS', '2018-09-18', '2018-09-18'),
(1, 11, 'Android', '2018-09-18', '2018-09-18'),
(1, 12, 'Laravel', '2018-09-18', '2018-09-18'),
(1, 13, 'Jscript', '2018-09-18', '2018-09-18'),
(1, 14, 'Unit Test', '2018-09-18', '2018-09-18'),
(1, 15, 'Cognizance', '2018-09-18', '2018-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
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

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `docname` varchar(100) NOT NULL,
  `docpath` varchar(100) NOT NULL,
  `upload_date` date NOT NULL,
  `valid_date` date NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `uid`, `Title`, `category`, `start_date`, `end_date`, `content`, `docname`, `docpath`, `upload_date`, `valid_date`, `created`, `modified`) VALUES
(51, 12, 'Workshop', 'Android', '2018-09-06', '2018-09-08', 'Android Workshop Will be organized in our department on next Monday', 'Android', 'documents/Android', '2018-09-18', '2018-09-26', '2018-09-18', '2018-09-18'),
(47, 12, 'Java Unit Test', 'Unit Test', '2018-09-04', '2018-09-05', 'Unit test will be there on next Monday', 'Java Document', 'documents/Java Document', '2018-09-18', '0000-00-00', '2018-09-18', '2018-09-18'),
(52, 12, 'Jscript', 'Jscript', '2018-09-05', '2018-08-28', 'Jscripy', 'sd', 'documents/sd', '2018-09-18', '2018-09-25', '2018-09-18', '2018-09-18'),
(53, 12, 'Advance Java', 'Unit Test', '2018-09-07', '2018-09-08', 'Test of Advance java will be taken on Monday instead of next week', 'Hello ', 'documents/Hello ', '2018-09-26', '2018-09-12', '2018-09-26', '2018-09-26'),
(64, 12, 'Sem 5 unit test', 'Unit Test', '2018-09-05', '2018-09-04', 'Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the duringSem 5 students are notified that the unit test of the computer networks are postponed and the duringSem 5 students are notified that the unit test of the computer networks are postponed and the duringSem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during.Sem 5 students are notified that the unit test of the computer networks are postponed and the during', 'Sitting Arrangement', 'documents/Sitting Arrangement', '2018-09-27', '2018-09-20', '2018-09-27', '2018-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `uid` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_no` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`uid`, `username`, `password`, `email`, `contact_no`, `address`, `city`, `role`, `status`, `created`, `modified`) VALUES
(1, 'Yagna', 'ee', 'admin@n.com', '123456789', 'gandhidham', 'gandhidham', 'admin', 'active', '2018-06-23', '2018-08-15'),
(12, 'dwuah', 'dhwad', 'yagnasorathiya1294@gmail.com', '6576767', 'wdwad', 'ndbwajdb', 'subadmin', 'Active', '2018-08-06', '2018-08-06'),
(15, 'daw', '(FRZUuhJ', 'dwad@cadw.cpj', '4343434', 'dwad', 'sfe', 'management', 'Active', '2018-08-06', '2018-08-06'),
(16, 'eadwa', 'R@XzuJnt', 'yj@gmail.com', '2222222', 'a', 'wadw', 'user', 'Active', '2018-08-14', '2018-08-14'),
(17, 'rr', 'rr', 'karanparmar1718@gmail.com', '233333', 'dawd', 'feafa', 'subadmin', 'Deactive', '2018-08-14', '2018-08-15'),
(18, '1', 'adaw', 'yj@gmail.comd', '222222222222222222222222', 'adwwadwa', '232323', 'dealer', 'Active', '2018-08-15', '2018-08-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
