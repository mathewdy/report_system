-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 04:48 PM
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
(12, 'TA00006', '<p>sample note</p>', '2023-01-24', '12:57:58', '2023-01-24', '12:57:58');

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
(49, 'TA00005', 'RID00011', 'Cum sed voluptatem m', 'Barangay 4', '', 'Ducimus tempor enim', '', '<p>report</p>', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2023-08-11', '00:00:00', '2023-02-02', '12:54:13'),
(127, 'ADM00005', 'RID00013', 'thaddeusgamit31@gmail.com', 'mathewdy@gmail.com', 'Real', 'sheesh', 'OPRSA', '<p>GASDASDA</p>', 'Daily', '', 3, 0, '2023-01-31 12:00:00', '2023-02-01 12:00:00', 1, '2023-01-31', '10:00:38', '2023-01-31', '10:00:38'),
(128, 'ADM00005', 'RID00014', 'thaddeusgamit31@gmail.com', 'mathewdy@gmail.com', 'Real', 'jpoy', 'jopyzxc', '', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '2023-02-01 00:00:00', 0, '2023-01-31', '10:04:07', '2023-01-31', '10:04:07');

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
(6, 'ADM00005', 'RID00014', 'thaddeusgamit31@gmail.com', 'mathewdy@gmail.com', 'Real', 'jpoy', 'jopyzxc', '', 'Bi-weekly', '', 3, 0, '2023-02-01 00:00:00', '2023-02-01 00:00:00', 0, '2023-01-31', '10:04:07', '2023-01-31', '10:04:07');

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
(27, 2, 'TA00001', 'amthew', '$2y$10$1KnVjHRgdhYbAik7CUK8RuHdHJRmyV4mVW7mWN4futp.Ig/xs0TGC', 'Ratahydade', 'Dowotuwujo', 'Dowotuwujo', '2003-07-22', 'sasybu', 'Dalitope', 'Mokuwysazi', '0', 0x6c632e706e67, '2023-01-11 09:20:24', '2023-01-11 09:20:24'),
(32, 2, 'TA00002', 'seqepat', '$2y$10$DH35AFCzc5wNRSirCi/P1O/CKK88m0Tuy0ZBSSLDy23EllRi6HZny', 'Jofax', 'Bezafoq', 'Bezafoq', '1971-12-04', 'matafys', 'Qisaxex', 'Kubuco', '0', 0x3332333632333736325f3534303737383131313331323439375f353131363739303730373431363239353634345f6e2e6a7067, '2023-01-11 09:27:14', '2023-01-11 09:27:14'),
(33, 1, 'ADM00001', 'admin', '$2y$10$6gAl2.aagJRHQwdh.yio5.arsjhZyCYax.zMPchPL.AsDGtEVpqwa', 'Firef', 'Momosaqake', 'Momosaqake', '1983-09-09', 'deruj', 'Lyxes', '0', 'DILG-0001', 0x31613862366634626530326539323438326333363732653864646433363239642e706e67, '2023-01-12 12:48:07', '2023-01-12 12:48:07'),
(35, 2, 'TA00003', 'politah', '$2y$10$97WkrART/KVTzShLPI2VoetKEGftiz1cP85aGz22Jva0waUk83nSG', 'Mojuqanuna', 'Litid', 'Litid', '2015-09-06', 'kygizi', 'Zyxeg', 'Ruqif', '', 0x3331383432373339325f3730343330363238373936313538325f343339373133353935353338313930353437385f6e2e6a7067, '2023-01-12 01:06:26', '2023-01-12 01:06:26'),
(37, 1, 'ADM00004', 'najyzil', '$2y$10$.dNasatAgE774x1Ap/JrLOpCI0yJa4LA1EtPWmZ0UgqAeAdrhHmRK', 'Biromudepy', 'Tehagiha', 'Tehagiha', '1999-07-02', 'zitivogi', 'Faqubuwa', '0', 'Qaxyge', 0x3331383432373339325f3730343330363238373936313538325f343339373133353935353338313930353437385f6e2e6a7067, '2023-01-12 01:11:19', '2023-01-12 01:11:19'),
(38, 1, 'ADM00003', 'kotyqugof', '$2y$10$2VB3LEpcT6IoS3/5s4CF8uX1XTXGKFImz77bM9BjDMD4e7ikNYlRS', 'Tegaxol', 'Zyjujutaqy', 'Zyjujutaqy', '1998-11-07', 'byfikofuxo', 'Raziwofa', '0', 'Velyjiv', 0x3331393831303532335f3638303337383338303230333637305f343139383938313439333333353532323232375f6e2e6a7067, '2023-01-12 01:12:34', '2023-01-12 01:12:34'),
(39, 2, 'TA00004', 'Olivia', '$2y$10$wttj7QyK2GDlJNQ5gnqtneAB0.gR3ysrWE.kEVeKpTHcU9x1bOKei', 'Leandra', 'TaShya', 'TaShya', '1994-07-27', 'Emma', 'Chastity', 'Maris', '', 0x3332353137383136385f3639363131333032383931303033395f363034313337393631363236333632393132385f6e2e6a7067, '2023-01-15 02:15:16', '2023-01-15 02:15:16'),
(40, 1, 'ADM00004', 'mathew123', '$2y$10$pfBBgXRb.cNI.a.diOq.jO5mBE.mVI5oW3Bgm0yAVzwF/anl5dsxi', 'Hupyra', 'Bitovakuh', 'Bitovakuh', '2005-09-15', 'rurakewafi', 'Qybyjijov', '0', 'Lalew', 0x3332353230333134345f3436363636353433393030383132395f353839363133373432353136393731373735315f6e2e6a7067, '2023-01-17 01:47:11', '2023-01-17 01:47:11'),
(41, 2, 'TA00005', 'thaddeusgamit31@gmail.com', '$2y$10$RhZ3vIenrmVj6MMaxJk0feGlz7pPSWIKrL3LADN3uxfNXAdtuvMB.', 'Drake', 'Maia', 'Maia', '1973-12-22', 'Fiona', 'Real', 'Nelle', '', 0x556e7469746c65642064657369676e2e6a7067, '2023-01-21 07:47:55', '2023-01-21 07:47:55'),
(42, 2, 'TA00006', 'mathewdy@gmail.com', '$2y$10$HCF/Lqdn85RUoHKYMry47e2ur5bN6QXQAPTmH1uILvX1X4YnjmMSu', 'Eleanor', 'Gisela', 'Gisela', '1990-09-13', 'Demetria', 'Real', 'Tucker', '', 0x3332303634323139325f3730363038393839303839373237395f313531363939313231343636353132373131315f6e2e6a7067, '2023-01-23 09:06:22', '2023-01-23 09:06:22'),
(45, 1, 'ADM00005', 'thaddeusgamit31@gmail.com', '$2y$10$1vlxeUocbqMx20xd4zk1tupMx6p32tim7PubsPYPoMt3MK.L8dP0i', 'Cora', 'Hanna', 'Hanna', '1985-01-02', 'Jenna', 'Ella', '0', 'DILG-0002', 0x556e7469746c65642064657369676e2e6a7067, '2023-01-25 09:39:03', '2023-01-25 09:39:03'),
(46, 2, 'TA00007', 'Maxine', '$2y$10$lULh0TmDPatNgrINh7CAG.seeRa5/PgeUmDmlnQV3ra01LAC7Zwn2', 'Thane', 'Kaitlin', 'Kaitlin', '1996-06-15', 'Carolyn', 'Palingon', 'Xena', '0', 0x3332353230333134345f3436363636353433393030383132395f353839363133373432353136393731373735315f6e2e6a7067, '2023-01-31 08:42:48', '2023-01-31 08:42:48');

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
