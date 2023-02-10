-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 07:26 AM
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
-- Database: `pfnmps`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `exercises` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `exercises`) VALUES
(1, 'Jogging '),
(2, 'push-up \r\n'),
(3, 'jumping\r\n'),
(4, 'catching balls \r\n'),
(5, 'bear crawl\r\n'),
(6, 'squats and lunges\r\n'),
(7, 'sit-ups\r\n'),
(8, 'stretching');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `image` blob NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `gender`, `address`, `user_type`, `image`, `date_time_created`, `date_time_updated`) VALUES
(1, '202226885', 'kere@mailinator.com', '123', 'Maia', 'Lev', 'Chase', 2, 'Moses', 1, 0x636d2e706e67, '2023-02-02 12:59:33', '2023-02-02 12:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed`
--

CREATE TABLE `failed` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `output` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `food_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_type_id`, `name`) VALUES
(1, 3, 'watermelon'),
(2, 3, 'apples'),
(3, 3, 'mangos'),
(4, 3, 'Monggo'),
(5, 3, 'Meat'),
(6, 3, 'bananas'),
(7, 3, 'oranges'),
(8, 3, 'Potato'),
(9, 3, 'Stir fried tofu'),
(10, 3, 'Curry chicken'),
(11, 3, 'Eggs'),
(12, 3, 'Ham & Cheese'),
(13, 3, 'Chocolate'),
(14, 3, 'avocados'),
(15, 3, 'Coconut Juice'),
(16, 3, 'lemon'),
(17, 3, 'Chicken'),
(18, 3, 'Carrots'),
(19, 3, 'Peanuts'),
(20, 3, 'pineapple'),
(21, 3, 'malunggay'),
(22, 3, 'saluyot'),
(23, 3, 'Corn'),
(24, 3, 'Spinach'),
(25, 3, 'Broccoli'),
(26, 3, 'Seaweed'),
(27, 3, 'Bell peppers'),
(28, 3, 'Carrots'),
(29, 3, 'Parsley'),
(30, 3, 'Cauliflower'),
(61, 1, 'cereals'),
(62, 1, 'eggs'),
(63, 1, 'bread'),
(64, 1, 'milk'),
(65, 1, 'pasta'),
(66, 1, 'grains'),
(67, 1, 'sweet potato'),
(68, 1, 'potato'),
(69, 1, 'honey'),
(70, 1, 'nuts'),
(71, 1, 'noodles'),
(72, 1, 'corn'),
(73, 1, 'wheats'),
(74, 1, 'cheese'),
(75, 1, 'biscuits'),
(76, 1, 'oats'),
(77, 2, 'Pumpkin Seeds'),
(78, 2, 'Fish'),
(79, 2, 'beef'),
(80, 2, 'rice'),
(81, 2, 'chicken'),
(82, 2, 'cheese'),
(83, 2, 'eggs'),
(84, 2, 'crab');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`id`, `name`) VALUES
(1, 'go'),
(2, 'grow'),
(3, 'glow');

-- --------------------------------------------------------

--
-- Table structure for table `health_infos`
--

CREATE TABLE `health_infos` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `bmi` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `active_level` varchar(50) NOT NULL,
  `health_history` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `bmi` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_bmi`
--

CREATE TABLE `history_bmi` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `program_id` varchar(50) NOT NULL,
  `bmi` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_program_records`
--

CREATE TABLE `history_program_records` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `date_started` date NOT NULL,
  `predicted_date` varchar(50) NOT NULL,
  `foods` varchar(50) NOT NULL,
  `excercises` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `food_acknowledge` int(11) NOT NULL,
  `exercise_acknowledge` int(11) NOT NULL,
  `ended_day` date NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program_records`
--

CREATE TABLE `program_records` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `date_started` date NOT NULL,
  `predicted_date` int(11) NOT NULL,
  `foods` varchar(255) NOT NULL,
  `exercises` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL,
  `food_acknowledge` int(11) NOT NULL,
  `exercise_acknowledge` int(11) NOT NULL,
  `ended_day` date NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program_records_2`
--

CREATE TABLE `program_records_2` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `date_started` date NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `user_type` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_1` varchar(50) NOT NULL,
  `answer_1` varchar(50) NOT NULL,
  `question_2` varchar(50) NOT NULL,
  `answer_2` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `output` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `house` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `subdivision` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `grade` varchar(10) NOT NULL,
  `section` varchar(50) NOT NULL,
  `four_ps` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_survery_answers`
--

CREATE TABLE `students_survery_answers` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `question` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_survey_answers_history`
--

CREATE TABLE `students_survey_answers_history` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `question` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `house` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `subdivision` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `image` blob NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'parent'),
(3, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`user_type`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `failed`
--
ALTER TABLE `failed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_type_id` (`food_type_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_infos`
--
ALTER TABLE `health_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_bmi`
--
ALTER TABLE `history_bmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_program_records`
--
ALTER TABLE `history_program_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_records`
--
ALTER TABLE `program_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nutritionist_id` (`student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `predicted_date` (`predicted_date`);

--
-- Indexes for table `program_records_2`
--
ALTER TABLE `program_records_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students_survey_answers_history`
--
ALTER TABLE `students_survey_answers_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`user_type`,`student_id`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed`
--
ALTER TABLE `failed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `food_type`
--
ALTER TABLE `food_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `health_infos`
--
ALTER TABLE `health_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history_bmi`
--
ALTER TABLE `history_bmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history_program_records`
--
ALTER TABLE `history_program_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_records`
--
ALTER TABLE `program_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `program_records_2`
--
ALTER TABLE `program_records_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `students_survey_answers_history`
--
ALTER TABLE `students_survey_answers_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`food_type_id`) REFERENCES `food_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `health_infos`
--
ALTER TABLE `health_infos`
  ADD CONSTRAINT `health_infos_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  ADD CONSTRAINT `students_survery_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
