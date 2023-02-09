-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 08:46 PM
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
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
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
  `bmi` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `active_level` varchar(50) NOT NULL,
  `health_history` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_infos`
--

INSERT INTO `health_infos` (`id`, `student_id`, `height`, `weight`, `bmi`, `status`, `active_level`, `health_history`, `date_time_created`, `date_time_updated`) VALUES
(41, 'Brent', 60778182, 858740, 0, 'Under Weight', '1', 'Jamalia', '2022-12-18 03:44:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program_records`
--

CREATE TABLE `program_records` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `date_started` date NOT NULL,
  `foods` varchar(255) NOT NULL,
  `exercises` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL,
  `food_acknowledge` int(11) NOT NULL,
  `exercise_acknowledge` int(11) NOT NULL,
  `ended_day` date NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_records`
--

INSERT INTO `program_records` (`id`, `student_id`, `date_started`, `foods`, `exercises`, `day`, `food_acknowledge`, `exercise_acknowledge`, `ended_day`, `date_time_created`, `date_time_updated`) VALUES
(331, 'Brent', '2022-12-18', 'Potato, Eggs, Oranges, Cheese, Beef', 'Jumping\r\n', '1', 0, 1, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(332, 'Brent', '2022-12-18', 'Cheese, Rice, Eggs, Sweet Potato, Eggs', 'Squats And Lunges\r\n', '2', 1, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(333, 'Brent', '2022-12-18', 'Cheese, Fish, Chicken, Eggs, Fish', 'Squats And Lunges\r\n', '3', 1, 1, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(334, 'Brent', '2022-12-18', 'Biscuits, Cheese, Curry Chicken, Potato, Cheese', 'Bear Crawl\r\n', '4', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(335, 'Brent', '2022-12-18', 'Milk, Fish, Monggo, Bread, Fish', 'Stretching', '5', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(336, 'Brent', '2022-12-18', 'Milk, Crab, Parsley, Cereals, Crab', 'Squats And Lunges\r\n', '6', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(337, 'Brent', '2022-12-18', 'Honey, Eggs, Parsley, Eggs, Eggs', 'Jogging ', '7', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(338, 'Brent', '2022-12-18', 'Milk, Beef, Mangos, Eggs, Beef', 'Push-up \r\n', '8', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(339, 'Brent', '2022-12-18', 'Sweet Potato, Rice, Coconut Juice, Honey, Chicken', 'Squats And Lunges\r\n', '9', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(340, 'Brent', '2022-12-18', 'Cereals, Rice, Meat, Potato, Cheese', 'Bear Crawl\r\n', '10', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(341, 'Brent', '2022-12-18', 'Grains, Chicken, Bananas, Grains, Eggs', 'Bear Crawl\r\n', '11', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(342, 'Brent', '2022-12-18', 'Bread, Cheese, Corn, Noodles, Crab', 'Stretching', '12', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(343, 'Brent', '2022-12-18', 'Biscuits, Chicken, Bell Peppers, Corn, Chicken', 'Jumping\r\n', '13', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(344, 'Brent', '2022-12-18', 'Pasta, Beef, Saluyot, Honey, Crab', 'Sit-ups\r\n', '14', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(345, 'Brent', '2022-12-18', 'Pasta, Fish, Oranges, Wheats, Crab', 'Squats And Lunges\r\n', '15', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(346, 'Brent', '2022-12-18', 'Sweet Potato, Rice, Spinach, Honey, Cheese', 'Sit-ups\r\n', '16', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(347, 'Brent', '2022-12-18', 'Pasta, Eggs, Spinach, Biscuits, Beef', 'Bear Crawl\r\n', '17', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(348, 'Brent', '2022-12-18', 'Eggs, Cheese, Pineapple, Cheese, Cheese', 'Jogging ', '18', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(349, 'Brent', '2022-12-18', 'Bread, Cheese, Curry Chicken, Honey, Crab', 'Jumping\r\n', '19', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(350, 'Brent', '2022-12-18', 'Cheese, Cheese, Mangos, Corn, Beef', 'Bear Crawl\r\n', '20', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(351, 'Brent', '2022-12-18', 'Wheats, Rice, Malunggay, Cheese, Pumpkin Seeds', 'Jumping\r\n', '21', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(352, 'Brent', '2022-12-18', 'Eggs, Eggs, Oranges, Cereals, Fish', 'Sit-ups\r\n', '22', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(353, 'Brent', '2022-12-18', 'Potato, Beef, Peanuts, Biscuits, Eggs', 'Sit-ups\r\n', '23', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(354, 'Brent', '2022-12-18', 'Noodles, Cheese, Monggo, Cheese, Rice', 'Sit-ups\r\n', '24', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(355, 'Brent', '2022-12-18', 'Potato, Chicken, Cauliflower, Pasta, Beef', 'Jumping\r\n', '25', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(356, 'Brent', '2022-12-18', 'Grains, Chicken, Lemon, Noodles, Eggs', 'Catching Balls \r\n', '26', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(357, 'Brent', '2022-12-18', 'Bread, Crab, Malunggay, Biscuits, Crab', 'Squats And Lunges\r\n', '27', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(358, 'Brent', '2022-12-18', 'Potato, Eggs, Potato, Honey, Eggs', 'Jumping\r\n', '28', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(359, 'Brent', '2022-12-18', 'Eggs, Fish, Watermelon, Noodles, Rice', 'Push-up \r\n', '29', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(360, 'Brent', '2022-12-18', 'Oats, Beef, Lemon, Corn, Pumpkin Seeds', 'Jogging ', '30', 0, 0, '2023-01-17', '2022-12-18 03:44:05', '2022-12-18 03:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `question_1` varchar(50) NOT NULL,
  `answer_1` varchar(50) NOT NULL,
  `question_2` varchar(50) NOT NULL,
  `answer_2` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `student_id`, `question_1`, `answer_1`, `question_2`, `answer_2`, `date_time_created`, `date_time_updated`) VALUES
(6, 'Brent', 'What was your favorite food as a child?', '123', 'What was your first car?', '1234', '2022-12-18 03:44:14', '2022-12-18 03:44:14');

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
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `room`, `house`, `street`, `subdivision`, `barangay`, `city`, `zip`, `image`, `grade`, `section`, `date_time_created`, `date_time_updated`) VALUES
(45, 'Brent', 'Lucas', 'Brenda', 'Kameko', '1992-09-20', 'Female', 'MARIS', 'SHELLEY', 'HAVIVA', 'BELL', 'JASON', 'ROSE', '15902', 0x3332303432343434345f3535363637323237353936303437335f353237323131363237353838313337323132345f6e2e6a7067, 'Grade 6', 'Emma', '2022-12-18 03:44:01', '2022-12-18 03:44:01');

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

--
-- Dumping data for table `students_survery_answers`
--

INSERT INTO `students_survery_answers` (`id`, `student_id`, `question`, `answer`, `date_time_created`, `date_time_updated`) VALUES
(147, 'Brent', 1, 1, '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(148, 'Brent', 2, 1, '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(149, 'Brent', 3, 1, '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(150, 'Brent', 4, 0, '2022-12-18 03:44:05', '2022-12-18 03:44:05'),
(151, 'Brent', 5, 1, '2022-12-18 03:44:05', '2022-12-18 03:44:05');

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
  `address` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `image` blob NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `contact_number`, `room`, `house`, `street`, `subdivision`, `barangay`, `city`, `zip`, `address`, `gender`, `user_type`, `image`, `student_id`, `date_time_created`, `date_time_updated`) VALUES
(37, '202238855', 'fadymic@mailinator.com', 'Welcome@12345', 'Ori', 'Cameran', 'Edan', '', 'MARIS', 'SHELLEY', 'HAVIVA', 'BELL', 'JASON', 'ROSE', '15902', '', 'Female', 2, 0x3331353237373330395f3439373232343633353638393036305f343736343732313631393034333233393338385f6e2e6a7067, 'Brent', '2022-12-18 03:44:01', '2022-12-18 03:44:01');

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
-- Indexes for table `program_records`
--
ALTER TABLE `program_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nutritionist_id` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `program_records`
--
ALTER TABLE `program_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
-- Constraints for table `program_records`
--
ALTER TABLE `program_records`
  ADD CONSTRAINT `program_records_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  ADD CONSTRAINT `students_survery_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
