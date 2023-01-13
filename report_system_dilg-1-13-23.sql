-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 10:55 AM
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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `to_user` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `documents` blob NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_updated` date NOT NULL,
  `time_updated` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `report_id`, `from_user`, `to_user`, `subject`, `statement`, `documents`, `date_created`, `time_created`, `date_updated`, `time_updated`) VALUES
(1, 'ADM00001', 'RID00001', 'Voluptatem Qui dist', 'Ipsum enim molestiae', 'Dolorum enim vitae q', '<p>sample</p>', 0x47726f7570342e706466, '2023-01-12', '10:14:41', '2023-01-12', '10:14:41'),
(2, 'ADM00001', 'RID00002', 'Odit aut non earum l', 'Nulla qui omnis sequ', 'Dolore veritatis tem', '<p>SAMPLE TEXT 2&nbsp;</p>', 0x4d6174682d424c4550542d5265766965772d53657373696f6e2d5765656b2d322e706466, '2023-01-12', '10:43:48', '2023-01-12', '10:43:48'),
(3, 'ADM00001', 'RID00003', 'Odit aut non earum l', 'Nulla qui omnis sequ', 'Dolore veritatis tem', '<p>SAMPLE TEXT 3&nbsp;</p>', 0x4d6174682d424c4550542d5265766965772d53657373696f6e2d5765656b2d322e706466, '2023-01-12', '10:45:34', '2023-01-12', '10:45:34'),
(4, 'ADM00001', 'RID00004', 'Vel dolor esse null', 'Eu autem nihil enim ', 'Voluptate harum exer', '', 0x424c4550542d4d6174682d5265766965772d53657373696f6e2d322d312e706466, '2023-01-12', '10:49:04', '2023-01-12', '10:49:04'),
(5, 'ADM00001', 'RID00005', 'Quidem quis lorem si', 'Saepe similique ulla', 'Irure nobis aut nemo', '', 0x4861636b6572735f47756964655f746f5f50726f6a6563745f4d616e6167656d656e745f326e642e706466, '2023-01-12', '10:50:41', '2023-01-12', '10:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
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

INSERT INTO `users` (`id`, `user_type`, `user_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `address`, `barangay`, `barangay_id`, `dilg_id`, `image`, `date_time_created`, `date_time_updated`) VALUES
(27, 2, 'TA00001', 'amthew', '$2y$10$1KnVjHRgdhYbAik7CUK8RuHdHJRmyV4mVW7mWN4futp.Ig/xs0TGC', 'Ratahydade', 'Dowotuwujo', 'Dowotuwujo', '2003-07-22', 'sasybu', 'Dalitope', 'Mokuwysazi', '0', 0x6c632e706e67, '2023-01-11 09:20:24', '2023-01-11 09:20:24'),
(32, 2, 'TA00002', 'seqepat', '$2y$10$DH35AFCzc5wNRSirCi/P1O/CKK88m0Tuy0ZBSSLDy23EllRi6HZny', 'Jofax', 'Bezafoq', 'Bezafoq', '1971-12-04', 'matafys', 'Qisaxex', 'Kubuco', '0', 0x3332333632333736325f3534303737383131313331323439375f353131363739303730373431363239353634345f6e2e6a7067, '2023-01-11 09:27:14', '2023-01-11 09:27:14'),
(33, 1, 'ADM00001', 'admin', '$2y$10$6gAl2.aagJRHQwdh.yio5.arsjhZyCYax.zMPchPL.AsDGtEVpqwa', 'Firef', 'Momosaqake', 'Momosaqake', '1983-09-09', 'deruj', 'Lyxes', '0', 'DILG-0001', 0x31613862366634626530326539323438326333363732653864646433363239642e706e67, '2023-01-12 12:48:07', '2023-01-12 12:48:07'),
(35, 2, 'TA00003', 'politah', '$2y$10$97WkrART/KVTzShLPI2VoetKEGftiz1cP85aGz22Jva0waUk83nSG', 'Mojuqanuna', 'Litid', 'Litid', '2015-09-06', 'kygizi', 'Zyxeg', 'Ruqif', '', 0x3331383432373339325f3730343330363238373936313538325f343339373133353935353338313930353437385f6e2e6a7067, '2023-01-12 01:06:26', '2023-01-12 01:06:26'),
(37, 1, 'ADM00004', 'najyzil', '$2y$10$.dNasatAgE774x1Ap/JrLOpCI0yJa4LA1EtPWmZ0UgqAeAdrhHmRK', 'Biromudepy', 'Tehagiha', 'Tehagiha', '1999-07-02', 'zitivogi', 'Faqubuwa', '0', 'Qaxyge', 0x3331383432373339325f3730343330363238373936313538325f343339373133353935353338313930353437385f6e2e6a7067, '2023-01-12 01:11:19', '2023-01-12 01:11:19'),
(38, 1, 'ADM00003', 'kotyqugof', '$2y$10$2VB3LEpcT6IoS3/5s4CF8uX1XTXGKFImz77bM9BjDMD4e7ikNYlRS', 'Tegaxol', 'Zyjujutaqy', 'Zyjujutaqy', '1998-11-07', 'byfikofuxo', 'Raziwofa', '0', 'Velyjiv', 0x3331393831303532335f3638303337383338303230333637305f343139383938313439333333353532323232375f6e2e6a7067, '2023-01-12 01:12:34', '2023-01-12 01:12:34');

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`report_id`);

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
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
