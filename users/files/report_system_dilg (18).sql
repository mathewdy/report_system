-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 02:47 PM
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
(1, 'RID00002', 'Group-8-POS-Autosaved.xlsx', '', ''),
(2, 'RID00002', 'SP101assign.docx', '', ''),
(3, 'RID00002', 'OBE.pdf', '', ''),
(4, 'RID00002', 'CHECKLIST OF REQUIREMENTS (1).xls', '', ''),
(5, 'RID00002', 'SYSTEG_final (1).pdf', '', ''),
(6, 'RID00002', '8f76b2ee-6c1e-4812-92a1-9288ea58e968 (1).docx', '', ''),
(7, 'RID00002', 'resume-1 (2) (1).pdf', '', ''),
(8, 'RID00002', 'resume-1 (2).docx', '', ''),
(9, 'RID00002', 'resume-1 (2).pdf', '', ''),
(10, 'RID00002', 'resume.docx', '', ''),
(11, 'RID00003', 'Group-8-POS-Autosaved.xlsx', '', ''),
(12, 'RID00003', 'SP101assign.docx', '', ''),
(13, 'RID00003', 'OBE.pdf', '', ''),
(14, 'RID00003', 'CHECKLIST OF REQUIREMENTS (1).xls', '', ''),
(15, 'RID00003', 'SYSTEG_final (1).pdf', '', ''),
(16, 'RID00003', '8f76b2ee-6c1e-4812-92a1-9288ea58e968 (1).docx', '', ''),
(17, 'RID00003', 'resume-1 (2) (1).pdf', '', ''),
(18, 'RID00003', 'resume-1 (2).docx', '', ''),
(19, 'RID00004', 'all-students (13).pdf', '', ''),
(20, 'RID00004', 'all-students (12).pdf', '', ''),
(21, 'RID00004', 'student-history (5).pdf', '', ''),
(22, 'RID00004', 'student-history (4).pdf', '', ''),
(23, 'RID00004', 'student-history (3).pdf', '', ''),
(24, 'RID00004', 'student-history (2).pdf', '', ''),
(25, 'RID00004', 'student-history (1).pdf', '', ''),
(26, 'RID00004', 'student-history.pdf', '', ''),
(27, 'RID00004', 'student-record2 (1).pdf', '', ''),
(28, 'RID00005', 'Group-8-POS-Autosaved.xlsx', '', ''),
(29, 'RID00005', 'SP101assign.docx', '', ''),
(30, 'RID00005', 'OBE.pdf', '', ''),
(31, 'RID00005', 'CHECKLIST OF REQUIREMENTS (1).xls', '', ''),
(32, 'RID00005', 'SYSTEG_final (1).pdf', '', ''),
(33, 'RID00005', '8f76b2ee-6c1e-4812-92a1-9288ea58e968 (1).docx', '', ''),
(34, 'RID00005', 'resume-1 (2) (1).pdf', '', ''),
(35, 'RID00005', 'resume-1 (2).docx', '', ''),
(36, 'RID00005', 'resume-1 (2).pdf', '', ''),
(37, 'RID00005', 'resume.docx', '', ''),
(38, 'RID00006', '102132720_4df231d2-c07d-4063-923b-4840c011355d (1).pdf', '', ''),
(39, 'RID00006', '102132720_b9b54ad3-eaf1-4767-917a-32bfd27bf6d7.pdf', '', ''),
(40, 'RID00006', '102132720_4df231d2-c07d-4063-923b-4840c011355d.pdf', '', ''),
(41, 'RID00006', 'ririteccc.docx', '', ''),
(42, 'RID00006', 'Group4.pdf', '', ''),
(43, 'RID00006', '102132720_037311d2-009d-40cd-8d54-82f51c8471c5.pdf', '', ''),
(44, 'RID00006', 'resume-1 (1).docx', '', ''),
(45, 'RID00006', 'Thesis-Sp-101 (2).docx', '', ''),
(46, 'RID00006', 'Thesis-Sp-101 (1).docx', '', ''),
(47, 'RID00006', 'EasyChair-Preprint-5706.pdf', '', ''),
(48, 'RID00006', 'Thesis-Sp-101(1).docx', '', ''),
(49, 'RID00006', 'thesissss-1_2-1-7_1 (2).docx', '', ''),
(50, 'RID00006', 'Thesis-Sp-101.docx', '', ''),
(51, 'RID00006', 'Summary.docx', '', ''),
(52, 'RID00006', 'Invoice-4.pdf', '', ''),
(53, 'RID00007', 'report_system_dilg (16).sql', '', ''),
(54, 'RID00007', 'report_system_dilg (15).sql', '', ''),
(55, 'RID00007', 'report_system_dilg (14).sql', '', ''),
(56, 'RID00007', 'mailer2023.zip', '', ''),
(57, 'RID00007', 'smtp_hosting.zip', '', ''),
(58, 'RID00007', '329639870_515288160675196_3288495075849050064_n.jpg', '', ''),
(59, 'RID00007', 'report_system_dilg (13).sql', '', ''),
(60, 'RID00007', 'reports.php', '', ''),
(61, 'RID00007', 'Group-8-POS-Autosaved.xlsx', '', ''),
(62, 'RID00007', 'SP101assign.docx', '', ''),
(63, 'RID00007', 'OBE.pdf', '', ''),
(64, 'RID00007', 'CHECKLIST OF REQUIREMENTS (1).xls', '', ''),
(65, 'RID00007', 'SYSTEG_final (1).pdf', '', ''),
(66, 'RID00007', '8f76b2ee-6c1e-4812-92a1-9288ea58e968 (1).docx', '', ''),
(67, 'RID00008', 'report_system_dilg (16).sql', '', ''),
(68, 'RID00008', 'report_system_dilg (15).sql', '', ''),
(69, 'RID00008', 'report_system_dilg (14).sql', '', ''),
(70, 'RID00009', 'report_system_dilg (9).sql', '', ''),
(71, 'RID00010', '', '', ''),
(72, 'RID00011', '', '', ''),
(73, 'RID00012', '', '', ''),
(74, 'RID00013', '', '', ''),
(75, 'RID00014', '318863762_1546677379129606_6097858867820804561_n.jpg', '', ''),
(76, 'RID00014', '320817678_986019202392706_1637434223931334718_n.jpg', '', ''),
(77, 'RID00014', 'aaa.PNG', '', ''),
(78, 'RID00014', 'pfnmps (2).sql', '', ''),
(79, 'RID00015', '', '', ''),
(80, 'RID00002', '', '', ''),
(81, 'RID00003', '', '', ''),
(82, 'RID00004', '', '', '');

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
(259, 'RID00001', 'Punta', '1', 'sadasd', 'CDRRMO', '<p>ahaha</p>', 'Weekly', '', 3, 0, '2023-02-09 07:10:00', '2023-02-16 07:10:00', 7, '', '2023-02-09', '07:10:17', '2023-02-09', '07:10:17'),
(260, 'RID00002', 'Punta', '1', 'haha', 'VET', '<p>haha</p>', 'Bi-weekly', '', 3, 0, '2023-02-10 07:12:00', '2023-02-15 07:12:00', 5, '', '2023-02-09', '07:12:07', '2023-02-09', '07:12:07'),
(261, 'RID00003', '1', 'Punta', 'haha', 'haha', '<p>asdasdas</p>', 'Bi-weekly', '', 3, 0, '2023-02-09 12:27:00', '2023-02-09 12:27:00', 0, '', '2023-02-09', '12:27:08', '2023-02-09', '12:27:08'),
(262, 'RID00004', '1', 'Punta', 'isa pang s', 'sample', '<p>fadsfsd</p>', 'Bi-weekly', '', 3, 0, '2023-02-09 12:29:00', '2023-02-09 12:29:00', 0, '', '2023-02-09', '12:29:02', '2023-02-09', '12:29:02');

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
(128, 'RID00001', 'Punta', '1', 'sadasd', 'CDRRMO', '<p>ahaha</p>', 'Weekly', 3, '', 0, '2023-02-09 07:10:00', '2023-02-16 07:10:00', 7, '', '2023-02-09', '07:10:17', '2023-02-09', '07:10:17'),
(129, 'RID00002', 'Punta', '1', 'haha', 'VET', '<p>haha</p>', 'Bi-weekly', 3, '', 0, '2023-02-10 07:12:00', '2023-02-15 07:12:00', 5, '', '2023-02-09', '07:12:07', '2023-02-09', '07:12:07'),
(130, 'RID00003', '1', 'Punta', 'haha', 'haha', '<p>asdasdas</p>', 'Bi-weekly', 3, '', 0, '2023-02-09 12:27:00', '2023-02-09 12:27:00', 0, '', '2023-02-09', '12:27:08', '2023-02-09', '12:27:08'),
(131, 'RID00004', '1', 'Punta', 'isa pang s', 'sample', '<p>fadsfsd</p>', 'Bi-weekly', 3, '', 0, '2023-02-09 12:29:00', '2023-02-09 12:29:00', 0, '', '2023-02-09', '12:29:02', '2023-02-09', '12:29:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

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
