-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 05:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
(49, 'RID00002', 'titekaapala (2).xlsx', '', ''),
(50, 'RID00002', 'tarantadostudentnyo (1).docx', '', ''),
(51, 'RID00003', 'OBE.pdf', '', ''),
(52, 'RID00003', 'SP101assign.docx', '', ''),
(53, 'RID00003', 'Group-8-POS-Autosaved.xlsx', '', '');

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
(191, 'TA00002', 'RID00001', 'smadiccu@gmail.com', '', '', 'gago', 'fix na?', '<p>sana okay na</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 04:52:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:52:03', '2023-02-05', '04:52:03'),
(192, 'TA00001', 'RID00002', 'usersample@gmail.com', 'adminsample@gmail.com', '', 'sfasf', 'sad', '<p>asd</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 04:56:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:56:21', '2023-02-05', '04:56:21'),
(193, 'TA00001', 'RID00002', 'usersample@gmail.com', 'admin1sample@gmail.com', '', 'sfasf', 'sad', '<p>asd</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 04:56:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:56:21', '2023-02-05', '04:56:21'),
(194, 'ADM00001', 'RID00003', 'adminsample@gmail.com', 'usersample@gmail.com', '', 'for user', 'tanaginmo', '<p>asdasd</p>', 'Weekly', '', 3, 0, '2023-02-15 11:59:00', '2023-02-22 11:59:00', 7, '2023-02-05', '11:59:52', '2023-02-05', '11:59:52'),
(195, 'ADM00001', 'RID00003', 'adminsample@gmail.com', 'user1sample@gmail.com', '', 'for user', 'tanaginmo', '<p>asdasd</p>', 'Weekly', '', 3, 0, '2023-02-15 11:59:00', '2023-02-22 11:59:00', 7, '2023-02-05', '11:59:52', '2023-02-05', '11:59:52');

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
(63, 'TA00002', 'RID00001', 'smadiccu@gmail.com', '', '', 'gago', 'fix na?', '<p>sana okay na</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 00:00:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:52:03', '2023-02-05', '04:52:03'),
(64, 'TA00001', 'RID00002', 'usersample@gmail.com', 'adminsample@gmail.com', '', 'sfasf', 'sad', '<p>asd</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 04:56:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:56:21', '2023-02-05', '04:56:21'),
(65, 'TA00001', 'RID00002', 'usersample@gmail.com', 'admin1sample@gmail.com', '', 'sfasf', 'sad', '<p>asd</p>', 'Bi-weekly', '', 3, 0, '2023-02-05 04:56:00', '0000-00-00 00:00:00', 0, '2023-02-05', '04:56:21', '2023-02-05', '04:56:21'),
(66, 'ADM00001', 'RID00003', 'adminsample@gmail.com', 'usersample@gmail.com', '', 'for user', 'tanaginmo', '<p>asdasd</p>', 'Weekly', '', 3, 0, '2023-02-15 11:59:00', '2023-02-22 11:59:00', 7, '2023-02-05', '11:59:52', '2023-02-05', '11:59:52'),
(67, 'ADM00001', 'RID00003', 'adminsample@gmail.com', 'user1sample@gmail.com', '', 'for user', 'tanaginmo', '<p>asdasd</p>', 'Weekly', '', 3, 0, '2023-02-15 11:59:00', '2023-02-22 11:59:00', 7, '2023-02-05', '11:59:52', '2023-02-05', '11:59:52');

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
(60, 2, 'TA00001', 'usersample@gmail.com', '$2y$10$ugpxk.tZQFag1ayUvNGROOICX0sZiqno8SGUA6yciN.A2WGezPlIO', 'Usersample', 'Asdasd', 'Asdasd', '2023-02-05', 'q123124', 'Saimsim', '2319', '', 0x3331323031303734305f323932393632343736333939383136375f323732333733353436343539383532393433365f6e2e706e67, '2023-02-05 11:54:13', '2023-02-05 11:54:13'),
(61, 1, 'ADM00001', 'adminsample@gmail.com', '$2y$10$5eV5ut3qhxIAvvkv3m18wu6DK1.kcKT52p.Kh66gQZQy8x0AbiePq', 'Admin', '980w98123', '980w98123', '2023-02-05', 'sdomo23', 'Saimsim', '0', '923901', 0x3331303836323134375f3738353730363933393137333735335f343430343837323231393135373731373039375f6e2e6a7067, '2023-02-05 11:54:41', '2023-02-05 11:54:41'),
(62, 1, 'ADM00002', 'admin1sample@gmail.com', '$2y$10$YioyWYniqTWsKQyi13g6cunHSV2NlYme1GhgPqaELHxZ4PtilmZJ.', 'Math', 'Oijc0as', 'Oijc0as', '2023-03-09', '91923', 'Barangay 4', '0', 'Sf1231', 0x3236363536343234385f3633393534383637303432373032345f343530333533373730373833323835343337345f6e202831292e6a7067, '2023-02-05 11:55:15', '2023-02-05 11:55:15'),
(63, 2, 'TA00002', 'user1sample@gmail.com', '$2y$10$ct.08vcrBUQi/6SH.wyahOT5Cgi3kOd0wf.1Yxqqdw2KUIb21omJ6', 'Uasdwe', 'Psad1', 'Psad1', '2023-03-02', '231e98', 'Barangay 5', '2131', '0', 0x74756d626c725f33613639633535303366373337396365313639326432653764303462373032665f31393563313937625f313238302e6a7067, '2023-02-05 11:55:51', '2023-02-05 11:55:51');

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `opr`
--
ALTER TABLE `opr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
