-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 03:59 AM
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
(34, 'dasdasdas', '2023-02-06 00:00:00', '2023-02-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `report_id` varchar(250) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `email`, `content`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(24, 'mathewdalisay@gmail.com', '<p>asdasdsad</p>', '2023-02-10', '12:16:38', '2023-02-10', '12:16:38'),
(25, 'cmdyzxcvbnm123@gmail.com', '<p>sdfasfsdafsdfsf</p>', '2023-02-10', '05:17:51', '2023-02-10', '05:17:51');

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
  `report_id_2` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `opr` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `duration` varchar(50) NOT NULL,
  `report_or_reply` int(11) NOT NULL,
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

INSERT INTO `reports` (`id`, `report_id`, `report_id_2`, `to_user`, `from_user`, `subject`, `opr`, `message`, `duration`, `report_or_reply`, `status`, `notif_status`, `date_start`, `date_end`, `deadline`, `date_time_acknowledge`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(318, 'RID00001', 'RID00001', '', '', '', '', '', '', 0, 0, 0, '2023-02-20 03:56:31', '2023-02-20 03:56:31', 0, '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00');

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
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `duration`) VALUES
(1, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `sent`
--

CREATE TABLE `sent` (
  `id` int(11) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `report_id_2` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `opr` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `duration` varchar(50) NOT NULL,
  `report_or_reply` int(11) NOT NULL,
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
(98, 1, 'mathewdalisay@gmail.com', 0, '$2y$10$oh3hXLYpMXc0U6YAtbqYiO5tyU5FcmQGE6SySXf5FxAEmjC4cPc9q', 'Robin', 'Lareina', 'Lareina', '1973-04-06', 'Sirang Lupa', 'dc488ddfd15f3e36832b261242203efd', 0x416e79436f6e762e636f6d5f5f6e61706f6c63706d2e6a7067, '2023-02-12 09:08:26', '2023-02-12 09:08:26'),
(99, 2, 'try@gmail.com', 0, '$2y$10$tcanppdGnCD52MH0vZgdFOIyppceL6VCvNv.tic98OEaa2b/voQrS', 'Asndhsa', 'Lkjhsadlkjfh', 'Lkjhsadlkjfh', '1956-01-10', 'Camaligan', 'd42e7ec02d056bf674d1ca17f38541d6', 0x3332333736303038375f363136393032303131363435303035315f373334363939333831353436353531343733365f6e2e6a7067, '2023-02-12 09:32:33', '2023-02-12 09:32:33'),
(100, 2, 'test2@gmail.com', 0, '$2y$10$ZYqCo0YsEsTfcu9vVfJbS.e2JcEoY5CLEOC0dRwaPCaDIZZXPoKQO', 'Cathleen', 'Kareem', 'Kareem', '1988-07-31', 'Batino', 'd0f25a4b267cfcb7894c13ef262946f1', 0x737065656420746573742e504e47, '2023-02-17 03:16:48', '2023-02-17 03:16:48');

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
-- Indexes for table `sample`
--
ALTER TABLE `sample`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
