-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 02:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report_system_dilg`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(100) NOT NULL,
  `brgy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `brgy`) VALUES
(1, 'Bagong Kalsada'),
(2, 'Bandero'),
(3, 'Banlic'),
(4, 'Barandal'),
(5, 'Barangay 1'),
(6, 'Barangay 2 '),
(7, 'Barangay 3'),
(8, 'Barangay 4'),
(9, 'Barangay 5'),
(10, 'Barangay 6'),
(11, 'Barangay 7'),
(12, 'Batino'),
(13, 'Bubuyan'),
(14, 'Bucal'),
(15, 'Bunggo'),
(16, 'Burol'),
(17, 'Camaligan'),
(18, 'Canlubang'),
(19, 'Halang'),
(20, 'Hornalan'),
(21, 'Kay-Anlog'),
(23, 'La Mesa'),
(22, 'Laguerta'),
(24, 'Lawa'),
(25, 'Lecheria'),
(26, 'Lingga'),
(27, 'Looc'),
(28, 'Mabato'),
(29, 'Majada-Labas'),
(30, 'Makiling'),
(31, 'Mapagong'),
(32, 'Masili'),
(33, 'Maunong'),
(34, 'Mayapa'),
(35, 'Milagrosa'),
(36, 'Paciano Rizal'),
(37, 'Palingon'),
(38, 'Palo-Alto'),
(39, 'Pansol'),
(40, 'Parian'),
(41, 'Prinza'),
(42, 'Punta'),
(43, 'Puting Lupa'),
(44, 'Real'),
(45, 'Saimsim'),
(46, 'Sampiruhan'),
(48, 'San Cristobal'),
(49, 'San Jose'),
(50, 'San Juan'),
(47, 'Sirang Lupa'),
(51, 'Sucol'),
(52, 'Turbina'),
(53, 'Ulango'),
(54, 'Uwisan');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `report_id` varchar(250) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `report_id`, `file_name`, `uploaded_on`, `status`) VALUES
(50, 'RID00002', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `opr`
--

CREATE TABLE `opr` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opr`
--

INSERT INTO `opr` (`id`, `name`) VALUES
(1, 'GAD'),
(2, 'PNP'),
(3, 'BPTFO'),
(4, 'CSSYD'),
(5, 'SP'),
(6, 'CENRO'),
(7, 'BUILDING'),
(8, 'DILG'),
(9, 'PDAO'),
(10, 'CHO'),
(11, 'CMO'),
(12, 'VET'),
(13, 'PLEB'),
(14, 'CPDO'),
(15, 'CDRRMO'),
(16, 'HR'),
(17, 'CSSD');

-- --------------------------------------------------------

--
-- Table structure for table `realtime`
--

CREATE TABLE `realtime` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realtime`
--

INSERT INTO `realtime` (`id`, `name`) VALUES
(1, '0'),
(2, '0'),
(3, 'asdasd'),
(4, 'tote'),
(5, 'burat');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `opr` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `duration` varchar(50) NOT NULL,
  `pdf_files` blob NOT NULL,
  `status` int(225) NOT NULL,
  `notif_status` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `deadline` int(11) NOT NULL,
  `date_time_acknowledge` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_id`, `to_user`, `from_user`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_time_acknowledge`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(274, 'RID00001', 'Punta', '1', 'sample 1', 'CENRO', '<p>wtf&nbsp;</p>', 'Bi-weekly', '', 1, 1, '2023-02-10 09:30:00', '0000-00-00 00:00:00', 0, '2023-02-10 09:32:41', '2023-02-10', '09:31:06', '2023-02-10', '09:31:06'),
(275, 'RID00002', '1', 'Punta', 'sample 1', 'CENRO', '<p>reply mesage 1</p>', 'Bi-weekly', '', 1, 1, '2023-02-10 09:32:00', '0000-00-00 00:00:00', 0, '2023-02-10 09:32:41', '2023-02-10', '09:32:09', '2023-02-10', '09:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `id` int(50) NOT NULL,
  `report_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`id`, `report_type`) VALUES
(1, 'Submitted'),
(2, 'No Submission'),
(3, 'Incomplete'),
(4, 'Late');

-- --------------------------------------------------------

--
-- Table structure for table `sent`
--

CREATE TABLE `sent` (
  `id` int(11) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `opr` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `duration` varchar(50) NOT NULL,
  `status` int(225) NOT NULL,
  `pdf_files` blob NOT NULL,
  `notif_status` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `deadline` int(11) NOT NULL,
  `date_time_acknowledge` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sent`
--

INSERT INTO `sent` (`id`, `report_id`, `to_user`, `from_user`, `subject`, `opr`, `message`, `duration`, `status`, `pdf_files`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_time_acknowledge`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(143, 'RID00001', 'Punta', '1', 'sample 1', 'CENRO', '<p>wtf&nbsp;</p>', 'Bi-weekly', 3, '', 0, '2023-02-10 09:30:00', '2023-03-24 09:30:00', 42, '', '2023-02-10', '09:31:06', '2023-02-10', '09:31:06'),
(144, 'RID00002', '1', 'Punta', 'sample 1', 'CENRO', '<p>reply mesage 1</p>', 'Bi-weekly', 3, '', 0, '2023-02-10 09:32:00', '2023-02-10 09:32:00', 0, '', '2023-02-10', '09:32:09', '2023-02-10', '09:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_status` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `v_token` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `email_status`, `password`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `barangay`, `v_token`, `image`, `date_time_created`, `date_time_updated`) VALUES
(80, 1, 'mathewdalisay@gmail.com', 1, '$2y$10$BUTUSorH99XUmxqszrMW7Od5Js/cNMrt9YGZqDH.V.xNF0qTaKj6O', 'Preston', 'Thane', 'Thane', '1972-10-18', 'Barangay 6', '95976889177474811089d4182abc1280', 0x627572616f742e6a7067, '2023-02-09 03:17:25', '2023-02-09 03:17:25'),
(81, 2, 'cmdyzxcvbnm123@gmail.com', 1, '$2y$10$wwffx1Fvewq8AKpZDXzMsuEhPONutXntd2Ip3PuVgAOlj7oTVmYtK', 'Gay', 'Rhiannon', 'Rhiannon', '2005-07-23', 'Punta', '901e18a90bdc0c3972e7ee516dd8eb4e', 0x626c61636b2e6a7067, '2023-02-09 03:19:02', '2023-02-09 03:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brgy` (`brgy`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opr`
--
ALTER TABLE `opr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtime`
--
ALTER TABLE `realtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent`
--
ALTER TABLE `sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `opr`
--
ALTER TABLE `opr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `realtime`
--
ALTER TABLE `realtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
