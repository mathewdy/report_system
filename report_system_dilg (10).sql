-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 02:06 AM
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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(27, 'sample1', '2023-02-08 00:00:00', '2023-02-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `content`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(2, 'ADM00001', 'ANOTHER EDIT', '2023-01-20', '12:48:06', '2023-01-20', '07:09:37'),
(10, 'TA00005', 'fasd gasd', '2023-01-21', '01:49:26', '2023-01-21', '09:11:23'),
(11, 'TA00006', 'haha', '2023-01-23', '02:07:24', '2023-01-23', '09:07:44'),
(12, 'TA00006', '<p>sample note</p>', '2023-01-24', '12:57:58', '2023-01-24', '12:57:58'),
(13, 'TA00007', 'sample @)@ ', '2023-02-01', '01:25:46', '2023-02-01', '08:25:56'),
(14, 'TA00004', '<p>hahaha</p>', '2023-02-02', '01:49:09', '2023-02-02', '01:49:09');

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `barangay` varchar(10000) NOT NULL,
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
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(138, 'ADM00001', 'RID00001', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sample', 'samlela', '<p>hahaha</p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:26:17', '2023-02-01', '05:26:17'),
(139, 'ADM00001', 'RID00002', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'daldalhi', 'di tayo mag aaway', '<p>sa tunay na mundoooooooooooooooooooooooooooooo DADALHN KIT<strong> sa aming bahay di tayo mag aaway</strong></p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:36:21', '2023-02-01', '05:36:21'),
(140, 'ADM00001', 'RID00003', 'rose_1@dilg.com', 'mathew_2@dilg.com', 'Laguerta', 'jopay ', 'jopay2', '<p>JOPAAAY imiss you</p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:39:48', '2023-02-01', '05:39:48'),
(141, 'TA00003', 'RID00004', 'mathew_1@dilg.com', 'rose_1@dilg.com', 'Mabato', 'reports1', 'CPH', '<p>reply from barangay // mathew/_1&nbsp;</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '10:45:29', '2023-02-01', '10:45:29'),
(142, 'ADM00001', 'RID00005', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sayo lang', 'baliw', '<p>hahaha</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 05:50:00', '2023-02-14 05:51:00', 13, '2023-02-01', '05:51:49', '2023-02-01', '05:51:49'),
(143, 'TA00003', 'RID00006', 'mathew_1@dilg.com', 'rose_1@dilg.com', 'Mabato', 'Reply', 'Ko sa baliw na subject', '<p>SAYO LANG&nbsp;<strong>BALIW&nbsp;</strong></p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '10:53:15', '2023-02-01', '10:53:15'),
(145, 'ADM00001', 'RID00008', 'rose_1@dilg.com', 'mathew_2@dilg.com', 'Laguerta', 'Sample SUBJECT', 'SAMPLE OPR', '<p>sample output 1</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 06:36:00', '2023-02-04 06:36:00', 3, '2023-02-01', '06:37:57', '2023-02-01', '06:37:57'),
(146, 'TA00004', 'RID00009', 'mathew_2@dilg.com', 'rose_1@dilg.com', 'Mabato', 'Sample SUBJECT', 'SAMPLE OPR', '<p>reply1&nbsp;</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '11:39:54', '2023-02-01', '11:39:54'),
(147, 'ADM00001', 'RID00010', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sample pdf', 'sample opr', '<p>output</p>', 'Bi-weekly', 0x616c6c2d73747564656e747320283130292e706466, 3, 0, '2023-02-01 06:59:00', '2023-02-03 06:59:00', 2, '2023-02-01', '06:59:11', '2023-02-01', '06:59:11');

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
  `user_id` varchar(50) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `barangay` varchar(10000) NOT NULL,
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
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sent`
--

INSERT INTO `sent` (`id`, `user_id`, `report_id`, `from_user`, `to_user`, `barangay`, `subject`, `opr`, `message`, `duration`, `pdf_files`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(15, 'ADM00001', 'RID00001', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sample', 'samlela', '<p>hahaha</p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:26:17', '2023-02-01', '05:26:17'),
(16, 'ADM00001', 'RID00002', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'daldalhi', 'di tayo mag aaway', '<p>sa tunay na mundoooooooooooooooooooooooooooooo DADALHN KIT<strong> sa aming bahay di tayo mag aaway</strong></p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:36:21', '2023-02-01', '05:36:21'),
(17, 'ADM00001', 'RID00003', 'rose_1@dilg.com', 'mathew_2@dilg.com', 'Laguerta', 'jopay ', 'jopay2', '<p>JOPAAAY imiss you</p>', 'Bi-weekly', '', 3, 0, '1970-01-01 08:00:00', '1970-01-01 08:00:00', 0, '2023-02-01', '05:39:48', '2023-02-01', '05:39:48'),
(18, 'TA00003', 'RID00004', 'mathew_1@dilg.com', 'rose_1@dilg.com', 'Mabato', 'reports1', 'CPH', '<p>reply from barangay // mathew/_1&nbsp;</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '10:45:29', '2023-02-01', '10:45:29'),
(19, 'ADM00001', 'RID00005', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sayo lang', 'baliw', '<p>hahaha</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 05:50:00', '2023-02-14 05:51:00', 13, '2023-02-01', '05:51:49', '2023-02-01', '05:51:49'),
(20, 'TA00003', 'RID00006', 'mathew_1@dilg.com', 'rose_1@dilg.com', 'Mabato', 'Reply', 'Ko sa baliw na subject', '<p>SAYO LANG&nbsp;<strong>BALIW&nbsp;</strong></p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '10:53:15', '2023-02-01', '10:53:15'),
(21, 'TA00003', 'RID00007', 'mathew_1@dilg.com', 'rose_1@dilg.com', 'Mabato', 'replt_y2', 'baliw part 2', '<p>baliwhsdadsahdahsduasdas part 2&nbsp;</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '10:54:10', '2023-02-01', '10:54:10'),
(22, 'ADM00001', 'RID00008', 'rose_1@dilg.com', 'mathew_2@dilg.com', 'Laguerta', 'Sample SUBJECT', 'SAMPLE OPR', '<p>sample output 1</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 06:36:00', '2023-02-04 06:36:00', 3, '2023-02-01', '06:37:57', '2023-02-01', '06:37:57'),
(23, 'TA00004', 'RID00009', 'mathew_2@dilg.com', 'rose_1@dilg.com', 'Mabato', 'Sample SUBJECT', 'SAMPLE OPR', '<p>reply1&nbsp;</p>', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-01', '11:39:54', '2023-02-01', '11:39:54'),
(24, 'ADM00001', 'RID00010', 'rose_1@dilg.com', 'mathew_1@dilg.com', 'San Juan', 'sample pdf', 'sample opr', '<p>output</p>', 'Bi-weekly', 0x616c6c2d73747564656e747320283130292e706466, 3, 0, '2023-02-01 06:59:00', '2023-02-03 06:59:00', 2, '2023-02-01', '06:59:11', '2023-02-01', '06:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `try`
--

INSERT INTO `try` (`id`, `name`, `date`) VALUES
(5, 'tite malake', '2023-02-14'),
(6, 'bilat ', '2023-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `barangay_id` varchar(50) NOT NULL,
  `dilg_id` varchar(100) NOT NULL,
  `image` blob NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `user_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `address`, `barangay`, `barangay_id`, `dilg_id`, `image`, `date_time_created`, `date_time_updated`) VALUES
(49, 1, 'ADM00001', 'rose_1@dilg.com', '$2y$10$KLEf5nSZGwBwN5bOw9e/a.B2JQS2TXbzF.lxQvUx8jnM/GH/W9lyW', 'Lucian', 'Grace', 'Grace', '2020-11-25', 'Russell', 'Mabato', '0', 'Hannah', 0x6c632e706e67, '2023-02-01 09:39:56', '2023-02-01 09:39:56'),
(50, 2, 'TA00001', 'hazel_1@dilg.com', '$2y$10$sR6fOUsVs4AokYJVdMPKcuW51jPK1BnrT.5vNcS8gpTBbXNQRC.Ny', 'Cameron', 'Beau', 'Beau', '1983-05-16', 'Olga', 'Barandal', 'Germaine', '', 0x636d2e706e67, '2023-02-01 09:43:15', '2023-02-01 09:43:15'),
(51, 2, 'TA00002', 'tite@gmail.com', '$2y$10$O9zKLPT8fg2QX4R.NJcFau8vg.H92jUn6wL49/UMRB9A6PEJ8dktS', 'Wilma', 'Shelly', 'Shelly', '1975-11-15', 'Lara', 'Sampiruhan', 'Madaline', '0', 0x70726f6a656374206d616e616765722e504e47, '2023-02-01 10:24:56', '2023-02-01 10:24:56'),
(52, 2, 'TA00003', 'mathew_1@dilg.com', '$2y$10$udkwlxFDwmoj3yhApxFCdOZuZ8clpCcRr/I01ItUbmgQSR2PeIKha', 'Jopay', 'Tite', 'Tite', '2013-06-15', 'Jakeem', 'San Juan', 'Eden', '0', 0x627572616f742e6a7067, '2023-02-01 04:48:15', '2023-02-01 04:48:15'),
(53, 2, 'TA00004', 'mathew_2@dilg.com', '$2y$10$4KjV8GZxhxZlggBZL96OauUovEWuBP9TCknAjSP76JU3.0QWAr37a', 'Wylie1234', 'April123', 'April123', '1972-12-18', 'Quinlan', 'Laguerta', 'Virginia', '0', 0x3332363532353238325f323135323139393436383331383331375f373639373735303836333034313531323134305f6e2e6a7067, '2023-02-01 05:39:05', '2023-02-01 05:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`) VALUES
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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`report_id`),
  ADD KEY `status` (`status`),
  ADD KEY `to_user` (`to_user`);

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
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `opr`
--
ALTER TABLE `opr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`status`) REFERENCES `report_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
