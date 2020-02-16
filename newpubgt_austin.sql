-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2020 at 05:03 AM
-- Server version: 5.7.29
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newpubgt_austin`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `task_id`, `file_path`, `file_type`) VALUES
(23, 30, 'assets/task_files/5e4328cbd4d536.692340111.aac', 'audio'),
(24, 30, 'assets/task_files/5e4328cbe0be27.777340401 - Copy.aac', 'audio'),
(25, 35, 'assets/task_files/5e43d89c66fa622548001748.png', 'Picture'),
(26, 36, 'assets/task_files/5e43d8f6a11e88.796844801', 'audio'),
(27, 37, 'assets/task_files/5e43ec9a95e962.749653045e432787a911d7.922747391.aac.aac', 'audio'),
(28, 37, 'assets/task_files/5e43ec9a9f53b8.126430035e432787a911d7.922747391.aac.aac', 'audio'),
(29, 38, 'assets/task_files/5e43ecdb743b32.687300495e432787a911d7.922747391.aac', 'audio'),
(30, 38, 'assets/task_files/5e43ecdb769159.284550665e432787a911d7.922747391.aac', 'audio'),
(31, 39, 'assets/task_files/5e43f633a71640.126368341', 'audio'),
(32, 41, 'assets/task_files/5e43fcdf1bd0f8.63151608aac', 'audio'),
(33, 42, 'assets/task_files/5e43fd1d2e7843.26665893.aac', 'audio'),
(34, 43, 'assets/task_files/5e4401473b0791.50943815.mp3', 'audio'),
(35, 46, 'assets/task_files/5e44ee5097f543.30771692.mp3', 'audio'),
(36, 47, 'assets/task_files/5e452d2eb6abb7.21941266.mp3', 'audio'),
(37, 48, 'assets/task_files/5e4533ab2b68f6.93234738.mp3', 'audio'),
(38, 49, 'assets/task_files/5e4549325bc0092542094562.png', 'Picture'),
(39, 50, 'assets/task_files/5e45559dd27f642554964563.png', 'Picture'),
(40, 50, 'assets/task_files/5e4555b2451114.74521628.mp3', 'audio'),
(41, 51, 'assets/task_files/5e47c94b297a06.80263163.mp3', 'audio'),
(42, 52, 'assets/task_files/5e47ca2a402b562568738857.png', 'Picture'),
(43, 53, 'assets/task_files/5e488117acc7083287844217.png', 'Picture'),
(44, 54, 'assets/task_files/5e4883a8b7ec233235856382.png', 'Picture'),
(45, 55, 'assets/task_files/5e48cadf14ff192544340183.png', 'Picture'),
(46, 56, 'assets/task_files/5e48dcc5b6f0a42570178861.png', 'Picture'),
(47, 56, 'assets/task_files/5e48dcc6039f96.02215442.mp3', 'audio'),
(48, 57, 'assets/task_files/5e4912898bbcc03460564484.png', 'Picture');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_user` int(11) NOT NULL,
  `mob_date` varchar(50) NOT NULL,
  `mob_time` varchar(50) NOT NULL,
  `instruction` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `notify` tinyint(4) NOT NULL DEFAULT '0',
  `days_repeat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `assigned_user`, `mob_date`, `mob_time`, `instruction`, `timestamp`, `status`, `notify`, `days_repeat`) VALUES
(28, 1, 2, '11111', '22222', '2adasdasdad2222', '2020-02-11 15:02:04', 0, 0, 'xxxxxsss'),
(29, 1, 2, '11111', '22222', '2adasdasdad2222', '2020-02-11 15:02:13', 0, 0, 'xxxxxsss'),
(43, 25, 26, '2/12/2020', '18:44', 'test', '2020-02-12 14:15:19', 1, 1, 'Everyday'),
(44, 25, 26, '2/12/2020', '19:18', 'test', '2020-02-12 14:23:25', 1, 1, 'Everyday'),
(45, 25, 26, '2/12/2020', '19:18', 'gjhg', '2020-02-12 07:02:26', 0, 0, 'Everyday'),
(46, 27, 28, '22', '3333', 'adadasdadasdadadadadada asdadadad', '2020-02-15 23:02:37', 0, 0, 'xXxXxXxXx'),
(47, 1, 2, 'adsf', 'ads', 'adsf', '2020-02-13 16:02:14', 0, 1, 'adfs'),
(48, 25, 26, '2/13/2020', '16:31', 'test', '2020-02-15 17:13:23', 1, 1, 'Everyday'),
(49, 25, 26, '2/14/2020', '22:00', '123', '2020-02-13 06:02:45', 0, 1, 'Sun,'),
(50, 25, 26, '2/13/2020', '23:54', '123', '2020-02-16 04:57:37', 1, 1, 'Sun,Tue,'),
(51, 25, 26, '2/15/2020', '18:34', 'test123', '2020-02-16 04:54:53', 1, 1, 'Sun,Sat,'),
(52, 25, 26, '2/16/2020', '18:38', 'test321', '2020-02-15 15:02:34', 0, 1, 'Sun,Tue,Wed,'),
(53, 32, 33, '2/15/2020', '23:36', 'test', '2020-02-15 23:46:31', 1, 1, 'Everyday'),
(54, 32, 33, '2/15/2020', '23:47', 'test', '2020-02-15 16:02:00', 0, 1, 'Everyday'),
(55, 25, 26, '2/16/2020', '12:53', '321', '2020-02-16 09:02:51', 0, 1, 'Sun,Wed,'),
(56, 25, 26, '2/13/2020', '23:54', '123', '2020-02-16 06:25:15', 1, 1, 'Sun,Tue,'),
(57, 34, 35, '2/16/2020', '09:57', 'test', '2020-02-16 14:02:36', 0, 1, 'Everyday');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `employer_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `mobile`, `created_at`, `employer_id`) VALUES
(7, 'shahzaib', 'shahzaib@gmail.com', '96e79218965eb72c92a549dd5a330112', 1, '03006295987', '2020-02-11 20:11:40', NULL),
(13, 'huzaifa', 'huzaifa@test.com', '098f6bcd4621d373cade4e832627b4f6', 1, 'test', '2020-02-11 22:56:12', NULL),
(24, 'test', 'testHelper', '098f6bcd4621d373cade4e832627b4f6', 2, 'fdas', '2020-02-12 00:03:04', '13'),
(25, 'huzaifa1', 'huzaifa1@test.com', '098f6bcd4621d373cade4e832627b4f6', 1, 'fdasfsd', '2020-02-12 04:57:14', NULL),
(26, 'helper1', 'helper1@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, 'safddsfa', '2020-02-12 04:57:51', '25'),
(27, 'xyz', 'xyz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '03003532589', '2020-02-13 06:34:15', NULL),
(28, 'xyz_helper', 'xyz_helper@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '03005825896', '2020-02-13 06:34:54', '27'),
(29, '123', '123', '202cb962ac59075b964b07152d234b70', 2, '6182', '2020-02-15 10:43:29', '26'),
(30, 'testing', 'stoforum2011@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '61698567', '2020-02-15 17:10:42', NULL),
(31, 'testing2', 'stoforum2001@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2, '61668568', '2020-02-15 17:11:34', '30'),
(32, 'test2', 'test2@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1, '25556677744', '2020-02-15 22:58:19', NULL),
(33, 'helper2', 'helper2@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, '5688452888', '2020-02-15 23:01:16', '32'),
(34, 'huzaifa2', 'huzaifa@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1, '+923412008591', '2020-02-16 09:58:16', NULL),
(35, 'helper3', 'helper3@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, '+923412008591', '2020-02-16 09:59:07', '34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
