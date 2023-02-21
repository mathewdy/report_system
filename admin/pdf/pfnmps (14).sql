-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 01:11 AM
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
-- Table structure for table `deleted_student`
--

CREATE TABLE `deleted_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
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
  `grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `four_ps` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted_student`
--

INSERT INTO `deleted_student` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `age`, `gender`, `room`, `house`, `street`, `subdivision`, `barangay`, `city`, `zip`, `image`, `grade`, `section`, `four_ps`, `date_created`, `date_time_created`, `date_time_updated`) VALUES
(1, 'Sasha', 'Cecilia', 'Zoe', 'Travis', '2012-05-20', '10', 'Female', 'YVONNE', 'GANNON', 'ADRIA', 'SOLOMON', 'ERIC', 'ROWAN', '405', 0x636d2e706e67, 'Grade 4', 'A', 0, '2023-02-17', '2023-02-17 08:01:12', '2023-02-17 08:01:12'),
(6, 'Chaim', 'Ivy', 'Brenna', 'Amos', '2015-12-13', '7', 'Female', 'FELICIA', 'AURORA', 'BELL', 'LEE', 'ERICA', 'KEIKO', '455', 0x70726f6a656374206d616e616765722d72656d6f766562672d707265766965772e6a7067, 'Kinder', 'A', 0, '2023-02-17', '2023-02-17 08:10:08', '2023-02-17 08:10:08');

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

--
-- Dumping data for table `failed`
--

INSERT INTO `failed` (`id`, `student_id`, `output`, `date_created`, `date_updated`) VALUES
(8, 'Montana', 'failed', '2023-02-05', '2023-02-05'),
(10, 'Chaim', 'failed', '2023-02-17', '2023-02-17');

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

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `student_id`, `program_id`, `bmi`, `date_created`, `date_time_updated`) VALUES
(12, 'Montana', 0, 18, '2023-02-05', '2023-02-05 10:03:00'),
(13, 'Sasha', 0, 23, '2023-02-17', '2023-02-17 08:00:49'),
(14, 'September', 0, 22, '2023-02-17', '2023-02-17 08:04:15'),
(15, 'Chaim', 0, 22, '2023-02-17', '2023-02-17 08:09:57');

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

--
-- Dumping data for table `history_bmi`
--

INSERT INTO `history_bmi` (`id`, `student_id`, `program_id`, `bmi`, `date_created`, `date_updated`) VALUES
(13, 'Montana', '0', '17.959183673469', '2023-02-05', '2023-02-05'),
(14, 'Sasha', '0', '22.600262984878', '2023-02-17', '2023-02-17'),
(15, 'September', '0', '22.313278429145', '2023-02-17', '2023-02-17'),
(16, 'Chaim', '0', '22.313278429145', '2023-02-17', '2023-02-17');

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

--
-- Dumping data for table `program_records`
--

INSERT INTO `program_records` (`id`, `student_id`, `date_started`, `predicted_date`, `foods`, `exercises`, `day`, `food_acknowledge`, `exercise_acknowledge`, `ended_day`, `date_time_created`, `date_time_updated`) VALUES
(91, 'Montana', '2023-02-05', 0, 'Corn, Beef, Chocolate, Oats, Rice', 'Squats And Lunges\r\n', '1', 1, 1, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(92, 'Montana', '2023-02-05', 0, 'Potato, Crab, Corn, Wheats, Pumpkin Seeds', 'Bear Crawl\r\n', '2', 1, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-13 10:03:03'),
(93, 'Montana', '2023-02-05', 0, 'Cheese, Fish, Watermelon, Corn, Rice', 'Squats And Lunges\r\n', '3', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(94, 'Montana', '2023-02-05', 0, 'Grains, Pumpkin Seeds, Monggo, Sweet Potato, Fish', 'Bear Crawl\r\n', '4', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(95, 'Montana', '2023-02-05', 0, 'Nuts, Fish, Malunggay, Pasta, Beef', 'Sit-ups\r\n', '5', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(96, 'Montana', '2023-02-05', 0, 'Eggs, Cheese, Malunggay, Biscuits, Fish', 'Stretching', '6', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(97, 'Montana', '2023-02-05', 0, 'Wheats, Chicken, Parsley, Cereals, Fish', 'Jogging ', '7', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(98, 'Montana', '2023-02-05', 0, 'Sweet Potato, Crab, Bell Peppers, Pasta, Cheese', 'Stretching', '8', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(99, 'Montana', '2023-02-05', 0, 'Nuts, Cheese, Spinach, Biscuits, Rice', 'Jumping\r\n', '9', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(100, 'Montana', '2023-02-05', 0, 'Potato, Beef, Oranges, Potato, Beef', 'Squats And Lunges\r\n', '10', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(101, 'Montana', '2023-02-05', 0, 'Sweet Potato, Beef, Lemon, Honey, Cheese', 'Squats And Lunges\r\n', '11', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(102, 'Montana', '2023-02-05', 0, 'Wheats, Cheese, Malunggay, Honey, Cheese', 'Catching Balls \r\n', '12', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(103, 'Montana', '2023-02-05', 0, 'Pasta, Crab, Bananas, Wheats, Cheese', 'Jumping\r\n', '13', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(104, 'Montana', '2023-02-05', 0, 'Bread, Rice, Corn, Pasta, Eggs', 'Squats And Lunges\r\n', '14', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(105, 'Montana', '2023-02-05', 0, 'Eggs, Pumpkin Seeds, Seaweed, Oats, Fish', 'Squats And Lunges\r\n', '15', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(106, 'Montana', '2023-02-05', 0, 'Corn, Fish, Cauliflower, Biscuits, Fish', 'Catching Balls \r\n', '16', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(107, 'Montana', '2023-02-05', 0, 'Eggs, Fish, Broccoli, Cereals, Crab', 'Bear Crawl\r\n', '17', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(108, 'Montana', '2023-02-05', 0, 'Nuts, Cheese, Saluyot, Milk, Cheese', 'Squats And Lunges\r\n', '18', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(109, 'Montana', '2023-02-05', 0, 'Biscuits, Fish, Cauliflower, Cheese, Crab', 'Stretching', '19', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(110, 'Montana', '2023-02-05', 0, 'Bread, Cheese, Oranges, Wheats, Pumpkin Seeds', 'Bear Crawl\r\n', '20', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(111, 'Montana', '2023-02-05', 0, 'Biscuits, Cheese, Bell Peppers, Grains, Eggs', 'Jogging ', '21', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(112, 'Montana', '2023-02-05', 0, 'Grains, Beef, Potato, Sweet Potato, Pumpkin Seeds', 'Jumping\r\n', '22', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(113, 'Montana', '2023-02-05', 0, 'Wheats, Eggs, Pineapple, Eggs, Eggs', 'Stretching', '23', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(114, 'Montana', '2023-02-05', 0, 'Cheese, Crab, Monggo, Biscuits, Cheese', 'Jumping\r\n', '24', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(115, 'Montana', '2023-02-05', 0, 'Corn, Eggs, Monggo, Sweet Potato, Crab', 'Jumping\r\n', '25', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(116, 'Montana', '2023-02-05', 0, 'Cheese, Cheese, Peanuts, Honey, Chicken', 'Jumping\r\n', '26', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(117, 'Montana', '2023-02-05', 0, 'Biscuits, Beef, Corn, Eggs, Rice', 'Jumping\r\n', '27', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(118, 'Montana', '2023-02-05', 0, 'Grains, Rice, Apples, Sweet Potato, Pumpkin Seeds', 'Catching Balls \r\n', '28', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(119, 'Montana', '2023-02-05', 0, 'Potato, Chicken, Coconut Juice, Corn, Rice', 'Jogging ', '29', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(120, 'Montana', '2023-02-05', 0, 'Cereals, Crab, Cauliflower, Pasta, Beef', 'Sit-ups\r\n', '30', 0, 0, '2023-03-07', '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(121, 'Sasha', '2023-02-17', 0, 'Eggs, Crab, Saluyot, Cheese, Cheese', 'Squats And Lunges\r\n', '1', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(122, 'Sasha', '2023-02-17', 0, 'Grains, Eggs, Lemon, Honey, Eggs', 'Catching Balls \r\n', '2', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(123, 'Sasha', '2023-02-17', 0, 'Biscuits, Pumpkin Seeds, Eggs, Eggs, Pumpkin Seeds', 'Jogging ', '3', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(124, 'Sasha', '2023-02-17', 0, 'Sweet Potato, Eggs, Seaweed, Wheats, Chicken', 'Stretching', '4', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(125, 'Sasha', '2023-02-17', 0, 'Cheese, Beef, Coconut Juice, Wheats, Cheese', 'Squats And Lunges\r\n', '5', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(126, 'Sasha', '2023-02-17', 0, 'Milk, Cheese, Avocados, Grains, Chicken', 'Jogging ', '6', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(127, 'Sasha', '2023-02-17', 0, 'Pasta, Beef, Stir Fried Tofu, Pasta, Fish', 'Catching Balls \r\n', '7', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(128, 'Sasha', '2023-02-17', 0, 'Cheese, Fish, Stir Fried Tofu, Nuts, Crab', 'Stretching', '8', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(129, 'Sasha', '2023-02-17', 0, 'Potato, Crab, Apples, Corn, Fish', 'Push-up \r\n', '9', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(130, 'Sasha', '2023-02-17', 0, 'Pasta, Crab, Broccoli, Eggs, Eggs', 'Squats And Lunges\r\n', '10', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(131, 'Sasha', '2023-02-17', 0, 'Grains, Pumpkin Seeds, Lemon, Noodles, Eggs', 'Catching Balls \r\n', '11', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(132, 'Sasha', '2023-02-17', 0, 'Bread, Chicken, Malunggay, Cereals, Chicken', 'Catching Balls \r\n', '12', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(133, 'Sasha', '2023-02-17', 0, 'Honey, Beef, Curry Chicken, Eggs, Chicken', 'Jogging ', '13', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(134, 'Sasha', '2023-02-17', 0, 'Honey, Fish, Saluyot, Sweet Potato, Cheese', 'Push-up \r\n', '14', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(135, 'Sasha', '2023-02-17', 0, 'Sweet Potato, Beef, Cauliflower, Cheese, Fish', 'Push-up \r\n', '15', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(136, 'Sasha', '2023-02-17', 0, 'Wheats, Chicken, Spinach, Nuts, Rice', 'Jogging ', '16', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(137, 'Sasha', '2023-02-17', 0, 'Grains, Rice, Pineapple, Bread, Fish', 'Catching Balls \r\n', '17', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(138, 'Sasha', '2023-02-17', 0, 'Oats, Rice, Spinach, Biscuits, Cheese', 'Catching Balls \r\n', '18', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(139, 'Sasha', '2023-02-17', 0, 'Noodles, Crab, Lemon, Eggs, Cheese', 'Squats And Lunges\r\n', '19', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(140, 'Sasha', '2023-02-17', 0, 'Corn, Rice, Avocados, Wheats, Chicken', 'Push-up \r\n', '20', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(141, 'Sasha', '2023-02-17', 0, 'Potato, Pumpkin Seeds, Mangos, Pasta, Rice', 'Jumping\r\n', '21', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(142, 'Sasha', '2023-02-17', 0, 'Eggs, Chicken, Watermelon, Biscuits, Chicken', 'Jumping\r\n', '22', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(143, 'Sasha', '2023-02-17', 0, 'Noodles, Eggs, Saluyot, Oats, Chicken', 'Stretching', '23', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(144, 'Sasha', '2023-02-17', 0, 'Wheats, Rice, Chicken, Oats, Pumpkin Seeds', 'Jogging ', '24', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(145, 'Sasha', '2023-02-17', 0, 'Corn, Crab, Carrots, Bread, Chicken', 'Sit-ups\r\n', '25', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(146, 'Sasha', '2023-02-17', 0, 'Bread, Fish, Avocados, Cereals, Cheese', 'Jogging ', '26', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(147, 'Sasha', '2023-02-17', 0, 'Potato, Crab, Monggo, Grains, Chicken', 'Jumping\r\n', '27', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(148, 'Sasha', '2023-02-17', 0, 'Sweet Potato, Fish, Chocolate, Oats, Eggs', 'Sit-ups\r\n', '28', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(149, 'Sasha', '2023-02-17', 0, 'Milk, Eggs, Meat, Corn, Rice', 'Catching Balls \r\n', '29', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(150, 'Sasha', '2023-02-17', 0, 'Cheese, Crab, Apples, Biscuits, Crab', 'Jogging ', '30', 0, 0, '2023-03-19', '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(151, 'September', '2023-02-17', 0, 'Nuts, Fish, Carrots, Pasta, Fish', 'Catching Balls \r\n', '1', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(152, 'September', '2023-02-17', 0, 'Cheese, Cheese, Coconut Juice, Cereals, Fish', 'Squats And Lunges\r\n', '2', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(153, 'September', '2023-02-17', 0, 'Cereals, Cheese, Chocolate, Bread, Chicken', 'Jumping\r\n', '3', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(154, 'September', '2023-02-17', 0, 'Potato, Fish, Malunggay, Grains, Pumpkin Seeds', 'Bear Crawl\r\n', '4', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(155, 'September', '2023-02-17', 0, 'Cheese, Eggs, Cauliflower, Pasta, Beef', 'Jumping\r\n', '5', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(156, 'September', '2023-02-17', 0, 'Nuts, Beef, Apples, Oats, Crab', 'Bear Crawl\r\n', '6', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(157, 'September', '2023-02-17', 0, 'Pasta, Rice, Lemon, Wheats, Fish', 'Stretching', '7', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(158, 'September', '2023-02-17', 0, 'Potato, Cheese, Spinach, Cereals, Chicken', 'Jumping\r\n', '8', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(159, 'September', '2023-02-17', 0, 'Eggs, Beef, Meat, Cereals, Cheese', 'Jogging ', '9', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(160, 'September', '2023-02-17', 0, 'Potato, Chicken, Monggo, Biscuits, Rice', 'Squats And Lunges\r\n', '10', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(161, 'September', '2023-02-17', 0, 'Corn, Beef, Bananas, Wheats, Cheese', 'Catching Balls \r\n', '11', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(162, 'September', '2023-02-17', 0, 'Grains, Pumpkin Seeds, Parsley, Biscuits, Chicken', 'Sit-ups\r\n', '12', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(163, 'September', '2023-02-17', 0, 'Grains, Pumpkin Seeds, Chocolate, Sweet Potato, Pumpkin Seeds', 'Stretching', '13', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(164, 'September', '2023-02-17', 0, 'Wheats, Pumpkin Seeds, Potato, Honey, Pumpkin Seeds', 'Jogging ', '14', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(165, 'September', '2023-02-17', 0, 'Milk, Beef, Broccoli, Nuts, Chicken', 'Jumping\r\n', '15', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(166, 'September', '2023-02-17', 0, 'Corn, Beef, Avocados, Bread, Rice', 'Bear Crawl\r\n', '16', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(167, 'September', '2023-02-17', 0, 'Honey, Chicken, Malunggay, Eggs, Beef', 'Push-up \r\n', '17', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(168, 'September', '2023-02-17', 0, 'Biscuits, Fish, Potato, Nuts, Cheese', 'Squats And Lunges\r\n', '18', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(169, 'September', '2023-02-17', 0, 'Pasta, Beef, Spinach, Wheats, Cheese', 'Push-up \r\n', '19', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(170, 'September', '2023-02-17', 0, 'Potato, Rice, Bananas, Oats, Chicken', 'Jogging ', '20', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(171, 'September', '2023-02-17', 0, 'Bread, Pumpkin Seeds, Bananas, Oats, Eggs', 'Stretching', '21', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(172, 'September', '2023-02-17', 0, 'Potato, Cheese, Meat, Potato, Beef', 'Squats And Lunges\r\n', '22', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(173, 'September', '2023-02-17', 0, 'Corn, Pumpkin Seeds, Parsley, Honey, Fish', 'Jumping\r\n', '23', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(174, 'September', '2023-02-17', 0, 'Sweet Potato, Rice, Coconut Juice, Eggs, Beef', 'Push-up \r\n', '24', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(175, 'September', '2023-02-17', 0, 'Cheese, Rice, Apples, Eggs, Cheese', 'Catching Balls \r\n', '25', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(176, 'September', '2023-02-17', 0, 'Eggs, Rice, Avocados, Corn, Chicken', 'Push-up \r\n', '26', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(177, 'September', '2023-02-17', 0, 'Oats, Chicken, Curry Chicken, Corn, Cheese', 'Push-up \r\n', '27', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(178, 'September', '2023-02-17', 0, 'Oats, Eggs, Bell Peppers, Corn, Eggs', 'Squats And Lunges\r\n', '28', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(179, 'September', '2023-02-17', 0, 'Biscuits, Crab, Stir Fried Tofu, Eggs, Beef', 'Push-up \r\n', '29', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(180, 'September', '2023-02-17', 0, 'Grains, Beef, Bananas, Nuts, Crab', 'Jumping\r\n', '30', 0, 0, '2023-03-19', '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(181, 'Chaim', '2023-02-17', 0, 'Wheats, Eggs, Ham & Cheese, Grains, Beef', 'Jogging ', '1', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(182, 'Chaim', '2023-02-17', 0, 'Eggs, Cheese, Watermelon, Honey, Fish', 'Sit-ups\r\n', '2', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(183, 'Chaim', '2023-02-17', 0, 'Eggs, Beef, Pineapple, Honey, Pumpkin Seeds', 'Push-up \r\n', '3', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(184, 'Chaim', '2023-02-17', 0, 'Pasta, Pumpkin Seeds, Eggs, Sweet Potato, Fish', 'Catching Balls \r\n', '4', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(185, 'Chaim', '2023-02-17', 0, 'Grains, Crab, Apples, Biscuits, Chicken', 'Stretching', '5', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(186, 'Chaim', '2023-02-17', 0, 'Corn, Eggs, Stir Fried Tofu, Grains, Pumpkin Seeds', 'Catching Balls \r\n', '6', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(187, 'Chaim', '2023-02-17', 0, 'Nuts, Chicken, Stir Fried Tofu, Honey, Fish', 'Jogging ', '7', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(188, 'Chaim', '2023-02-17', 0, 'Potato, Beef, Bananas, Cereals, Eggs', 'Sit-ups\r\n', '8', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(189, 'Chaim', '2023-02-17', 0, 'Cheese, Pumpkin Seeds, Curry Chicken, Milk, Rice', 'Catching Balls \r\n', '9', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(190, 'Chaim', '2023-02-17', 0, 'Oats, Chicken, Parsley, Grains, Chicken', 'Jogging ', '10', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(191, 'Chaim', '2023-02-17', 0, 'Grains, Pumpkin Seeds, Apples, Cereals, Crab', 'Push-up \r\n', '11', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(192, 'Chaim', '2023-02-17', 0, 'Grains, Crab, Apples, Corn, Beef', 'Squats And Lunges\r\n', '12', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(193, 'Chaim', '2023-02-17', 0, 'Pasta, Crab, Oranges, Sweet Potato, Rice', 'Stretching', '13', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(194, 'Chaim', '2023-02-17', 0, 'Eggs, Rice, Bananas, Sweet Potato, Cheese', 'Squats And Lunges\r\n', '14', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(195, 'Chaim', '2023-02-17', 0, 'Milk, Beef, Cauliflower, Wheats, Cheese', 'Push-up \r\n', '15', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(196, 'Chaim', '2023-02-17', 0, 'Corn, Beef, Peanuts, Sweet Potato, Chicken', 'Jumping\r\n', '16', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(197, 'Chaim', '2023-02-17', 0, 'Honey, Pumpkin Seeds, Coconut Juice, Sweet Potato, Rice', 'Jumping\r\n', '17', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(198, 'Chaim', '2023-02-17', 0, 'Noodles, Fish, Bananas, Biscuits, Eggs', 'Catching Balls \r\n', '18', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(199, 'Chaim', '2023-02-17', 0, 'Nuts, Beef, Curry Chicken, Nuts, Pumpkin Seeds', 'Squats And Lunges\r\n', '19', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(200, 'Chaim', '2023-02-17', 0, 'Sweet Potato, Chicken, Chocolate, Honey, Chicken', 'Sit-ups\r\n', '20', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(201, 'Chaim', '2023-02-17', 0, 'Nuts, Pumpkin Seeds, Chicken, Sweet Potato, Cheese', 'Squats And Lunges\r\n', '21', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(202, 'Chaim', '2023-02-17', 0, 'Milk, Crab, Chocolate, Oats, Beef', 'Sit-ups\r\n', '22', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(203, 'Chaim', '2023-02-17', 0, 'Noodles, Rice, Lemon, Cereals, Pumpkin Seeds', 'Jogging ', '23', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(204, 'Chaim', '2023-02-17', 0, 'Sweet Potato, Cheese, Mangos, Cheese, Rice', 'Squats And Lunges\r\n', '24', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(205, 'Chaim', '2023-02-17', 0, 'Bread, Beef, Chicken, Eggs, Eggs', 'Squats And Lunges\r\n', '25', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(206, 'Chaim', '2023-02-17', 0, 'Eggs, Chicken, Mangos, Biscuits, Pumpkin Seeds', 'Bear Crawl\r\n', '26', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(207, 'Chaim', '2023-02-17', 0, 'Potato, Fish, Pineapple, Cereals, Fish', 'Push-up \r\n', '27', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(208, 'Chaim', '2023-02-17', 0, 'Noodles, Rice, Oranges, Oats, Pumpkin Seeds', 'Push-up \r\n', '28', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(209, 'Chaim', '2023-02-17', 0, 'Milk, Crab, Cauliflower, Potato, Beef', 'Stretching', '29', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(210, 'Chaim', '2023-02-17', 0, 'Sweet Potato, Crab, Pineapple, Nuts, Beef', 'Push-up \r\n', '30', 0, 0, '2023-03-19', '2023-02-17 08:09:59', '2023-02-17 08:09:59');

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

--
-- Dumping data for table `program_records_2`
--

INSERT INTO `program_records_2` (`id`, `student_id`, `date_started`, `date_created`, `date_updated`) VALUES
(211, 'Montana', '2023-02-06', '2023-02-05', '2023-02-05'),
(212, 'Montana', '2023-02-07', '2023-02-05', '2023-02-05'),
(213, 'Montana', '2023-02-08', '2023-02-05', '2023-02-05'),
(214, 'Montana', '2023-02-09', '2023-02-05', '2023-02-05'),
(215, 'Montana', '2023-02-10', '2023-02-05', '2023-02-05'),
(216, 'Montana', '2023-02-11', '2023-02-05', '2023-02-05'),
(217, 'Montana', '2023-02-12', '2023-02-05', '2023-02-05'),
(218, 'Montana', '2023-02-13', '2023-02-05', '2023-02-05'),
(219, 'Montana', '2023-02-14', '2023-02-05', '2023-02-05'),
(220, 'Montana', '2023-02-15', '2023-02-05', '2023-02-05'),
(221, 'Montana', '2023-02-16', '2023-02-05', '2023-02-05'),
(222, 'Montana', '2023-02-17', '2023-02-05', '2023-02-05'),
(223, 'Montana', '2023-02-18', '2023-02-05', '2023-02-05'),
(224, 'Montana', '2023-02-19', '2023-02-05', '2023-02-05'),
(225, 'Montana', '2023-02-20', '2023-02-05', '2023-02-05'),
(226, 'Montana', '2023-02-21', '2023-02-05', '2023-02-05'),
(227, 'Montana', '2023-02-22', '2023-02-05', '2023-02-05'),
(228, 'Montana', '2023-02-23', '2023-02-05', '2023-02-05'),
(229, 'Montana', '2023-02-24', '2023-02-05', '2023-02-05'),
(230, 'Montana', '2023-02-25', '2023-02-05', '2023-02-05'),
(231, 'Montana', '2023-02-26', '2023-02-05', '2023-02-05'),
(232, 'Montana', '2023-02-27', '2023-02-05', '2023-02-05'),
(233, 'Montana', '2023-02-28', '2023-02-05', '2023-02-05'),
(234, 'Montana', '2023-03-01', '2023-02-05', '2023-02-05'),
(235, 'Montana', '2023-03-02', '2023-02-05', '2023-02-05'),
(236, 'Montana', '2023-03-03', '2023-02-05', '2023-02-05'),
(237, 'Montana', '2023-03-04', '2023-02-05', '2023-02-05'),
(238, 'Montana', '2023-03-05', '2023-02-05', '2023-02-05'),
(239, 'Montana', '2023-03-06', '2023-02-05', '2023-02-05'),
(240, 'Montana', '2023-03-07', '2023-02-05', '2023-02-05'),
(241, 'Sasha', '2023-02-18', '2023-02-17', '2023-02-17'),
(242, 'Sasha', '2023-02-19', '2023-02-17', '2023-02-17'),
(243, 'Sasha', '2023-02-20', '2023-02-17', '2023-02-17'),
(244, 'Sasha', '2023-02-21', '2023-02-17', '2023-02-17'),
(245, 'Sasha', '2023-02-22', '2023-02-17', '2023-02-17'),
(246, 'Sasha', '2023-02-23', '2023-02-17', '2023-02-17'),
(247, 'Sasha', '2023-02-24', '2023-02-17', '2023-02-17'),
(248, 'Sasha', '2023-02-25', '2023-02-17', '2023-02-17'),
(249, 'Sasha', '2023-02-26', '2023-02-17', '2023-02-17'),
(250, 'Sasha', '2023-02-27', '2023-02-17', '2023-02-17'),
(251, 'Sasha', '2023-02-28', '2023-02-17', '2023-02-17'),
(252, 'Sasha', '2023-03-01', '2023-02-17', '2023-02-17'),
(253, 'Sasha', '2023-03-02', '2023-02-17', '2023-02-17'),
(254, 'Sasha', '2023-03-03', '2023-02-17', '2023-02-17'),
(255, 'Sasha', '2023-03-04', '2023-02-17', '2023-02-17'),
(256, 'Sasha', '2023-03-05', '2023-02-17', '2023-02-17'),
(257, 'Sasha', '2023-03-06', '2023-02-17', '2023-02-17'),
(258, 'Sasha', '2023-03-07', '2023-02-17', '2023-02-17'),
(259, 'Sasha', '2023-03-08', '2023-02-17', '2023-02-17'),
(260, 'Sasha', '2023-03-09', '2023-02-17', '2023-02-17'),
(261, 'Sasha', '2023-03-10', '2023-02-17', '2023-02-17'),
(262, 'Sasha', '2023-03-11', '2023-02-17', '2023-02-17'),
(263, 'Sasha', '2023-03-12', '2023-02-17', '2023-02-17'),
(264, 'Sasha', '2023-03-13', '2023-02-17', '2023-02-17'),
(265, 'Sasha', '2023-03-14', '2023-02-17', '2023-02-17'),
(266, 'Sasha', '2023-03-15', '2023-02-17', '2023-02-17'),
(267, 'Sasha', '2023-03-16', '2023-02-17', '2023-02-17'),
(268, 'Sasha', '2023-03-17', '2023-02-17', '2023-02-17'),
(269, 'Sasha', '2023-03-18', '2023-02-17', '2023-02-17'),
(270, 'Sasha', '2023-03-19', '2023-02-17', '2023-02-17'),
(271, 'September', '2023-02-18', '2023-02-17', '2023-02-17'),
(272, 'September', '2023-02-19', '2023-02-17', '2023-02-17'),
(273, 'September', '2023-02-20', '2023-02-17', '2023-02-17'),
(274, 'September', '2023-02-21', '2023-02-17', '2023-02-17'),
(275, 'September', '2023-02-22', '2023-02-17', '2023-02-17'),
(276, 'September', '2023-02-23', '2023-02-17', '2023-02-17'),
(277, 'September', '2023-02-24', '2023-02-17', '2023-02-17'),
(278, 'September', '2023-02-25', '2023-02-17', '2023-02-17'),
(279, 'September', '2023-02-26', '2023-02-17', '2023-02-17'),
(280, 'September', '2023-02-27', '2023-02-17', '2023-02-17'),
(281, 'September', '2023-02-28', '2023-02-17', '2023-02-17'),
(282, 'September', '2023-03-01', '2023-02-17', '2023-02-17'),
(283, 'September', '2023-03-02', '2023-02-17', '2023-02-17'),
(284, 'September', '2023-03-03', '2023-02-17', '2023-02-17'),
(285, 'September', '2023-03-04', '2023-02-17', '2023-02-17'),
(286, 'September', '2023-03-05', '2023-02-17', '2023-02-17'),
(287, 'September', '2023-03-06', '2023-02-17', '2023-02-17'),
(288, 'September', '2023-03-07', '2023-02-17', '2023-02-17'),
(289, 'September', '2023-03-08', '2023-02-17', '2023-02-17'),
(290, 'September', '2023-03-09', '2023-02-17', '2023-02-17'),
(291, 'September', '2023-03-10', '2023-02-17', '2023-02-17'),
(292, 'September', '2023-03-11', '2023-02-17', '2023-02-17'),
(293, 'September', '2023-03-12', '2023-02-17', '2023-02-17'),
(294, 'September', '2023-03-13', '2023-02-17', '2023-02-17'),
(295, 'September', '2023-03-14', '2023-02-17', '2023-02-17'),
(296, 'September', '2023-03-15', '2023-02-17', '2023-02-17'),
(297, 'September', '2023-03-16', '2023-02-17', '2023-02-17'),
(298, 'September', '2023-03-17', '2023-02-17', '2023-02-17'),
(299, 'September', '2023-03-18', '2023-02-17', '2023-02-17'),
(300, 'September', '2023-03-19', '2023-02-17', '2023-02-17'),
(301, 'Chaim', '2023-02-18', '2023-02-17', '2023-02-17'),
(302, 'Chaim', '2023-02-19', '2023-02-17', '2023-02-17'),
(303, 'Chaim', '2023-02-20', '2023-02-17', '2023-02-17'),
(304, 'Chaim', '2023-02-21', '2023-02-17', '2023-02-17'),
(305, 'Chaim', '2023-02-22', '2023-02-17', '2023-02-17'),
(306, 'Chaim', '2023-02-23', '2023-02-17', '2023-02-17'),
(307, 'Chaim', '2023-02-24', '2023-02-17', '2023-02-17'),
(308, 'Chaim', '2023-02-25', '2023-02-17', '2023-02-17'),
(309, 'Chaim', '2023-02-26', '2023-02-17', '2023-02-17'),
(310, 'Chaim', '2023-02-27', '2023-02-17', '2023-02-17'),
(311, 'Chaim', '2023-02-28', '2023-02-17', '2023-02-17'),
(312, 'Chaim', '2023-03-01', '2023-02-17', '2023-02-17'),
(313, 'Chaim', '2023-03-02', '2023-02-17', '2023-02-17'),
(314, 'Chaim', '2023-03-03', '2023-02-17', '2023-02-17'),
(315, 'Chaim', '2023-03-04', '2023-02-17', '2023-02-17'),
(316, 'Chaim', '2023-03-05', '2023-02-17', '2023-02-17'),
(317, 'Chaim', '2023-03-06', '2023-02-17', '2023-02-17'),
(318, 'Chaim', '2023-03-07', '2023-02-17', '2023-02-17'),
(319, 'Chaim', '2023-03-08', '2023-02-17', '2023-02-17'),
(320, 'Chaim', '2023-03-09', '2023-02-17', '2023-02-17'),
(321, 'Chaim', '2023-03-10', '2023-02-17', '2023-02-17'),
(322, 'Chaim', '2023-03-11', '2023-02-17', '2023-02-17'),
(323, 'Chaim', '2023-03-12', '2023-02-17', '2023-02-17'),
(324, 'Chaim', '2023-03-13', '2023-02-17', '2023-02-17'),
(325, 'Chaim', '2023-03-14', '2023-02-17', '2023-02-17'),
(326, 'Chaim', '2023-03-15', '2023-02-17', '2023-02-17'),
(327, 'Chaim', '2023-03-16', '2023-02-17', '2023-02-17'),
(328, 'Chaim', '2023-03-17', '2023-02-17', '2023-02-17'),
(329, 'Chaim', '2023-03-18', '2023-02-17', '2023-02-17'),
(330, 'Chaim', '2023-03-19', '2023-02-17', '2023-02-17');

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

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_type`, `student_id`, `user_id`, `question_1`, `answer_1`, `question_2`, `answer_2`, `date_time_created`, `date_time_updated`) VALUES
(8, 2, 'Montana', 0, 'What was your favorite food as a child?', '123', 'What is the name of your first pet?', '12323', '2023-02-05 10:03:08', '2023-02-05 10:03:08'),
(9, 2, 'Sasha', 0, 'Who is your first crush?', 'Labore nobis quia cu', 'What is the name of your first pet?', 'Rem fuga Et occaeca', '2023-02-17 08:00:59', '2023-02-17 08:00:59'),
(10, 2, 'September', 0, 'What is the name of your first pet?', 'Quae nemo voluptas e', 'What was your favorite food as a child?', 'Ut minus unde natus ', '2023-02-17 08:04:21', '2023-02-17 08:04:21'),
(11, 2, 'Chaim', 0, 'What was your favorite food as a child?', 'Minima pariatur Duc', 'What is the name of your first pet?', 'Illo unde est et vol', '2023-02-17 08:10:02', '2023-02-17 08:10:02');

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

--
-- Dumping data for table `students_survey_answers_history`
--

INSERT INTO `students_survey_answers_history` (`id`, `student_id`, `question`, `answer`, `date_time_created`, `date_time_updated`) VALUES
(29, 'Montana', 0, 0, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(30, 'Montana', 1, 1, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(31, 'Montana', 2, 0, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(32, 'Montana', 3, 0, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(33, 'Montana', 4, 1, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(34, 'Montana', 5, 0, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(35, 'Montana', 6, 1, '2023-02-05 10:03:03', '2023-02-05 10:03:03'),
(36, 'Sasha', 0, 0, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(37, 'Sasha', 1, 0, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(38, 'Sasha', 2, 1, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(39, 'Sasha', 3, 1, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(40, 'Sasha', 4, 1, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(41, 'Sasha', 5, 0, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(42, 'Sasha', 6, 1, '2023-02-17 08:00:52', '2023-02-17 08:00:52'),
(43, 'September', 0, 0, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(44, 'September', 1, 1, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(45, 'September', 2, 0, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(46, 'September', 3, 1, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(47, 'September', 4, 1, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(48, 'September', 5, 0, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(49, 'September', 6, 1, '2023-02-17 08:04:17', '2023-02-17 08:04:17'),
(50, 'Chaim', 0, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(51, 'Chaim', 1, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(52, 'Chaim', 2, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(53, 'Chaim', 3, 1, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(54, 'Chaim', 4, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(55, 'Chaim', 5, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59'),
(56, 'Chaim', 6, 0, '2023-02-17 08:09:59', '2023-02-17 08:09:59');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `contact_number`, `room`, `house`, `street`, `subdivision`, `barangay`, `city`, `zip`, `gender`, `user_type`, `image`, `student_id`, `date_time_created`, `date_time_updated`) VALUES
(12, '202233474', 'bimujonan@mailinator.com', '123', 'Claudia', 'Dara', 'Fuller', 'Francis', 'HAYLEY', 'AVYE', 'MELISSA', 'CHRISTEN', 'ABIGAIL', 'IDONA', '327', 'Male', 2, 0x3332333632333736325f3534303737383131313331323439375f353131363739303730373431363239353634345f6e202831292e6a7067, 'Montana', '2023-02-05 10:03:00', '2023-02-05 10:03:00'),
(13, '202235195', 'quhewi@mailinator.com', 'Welcome@12345', 'Hakeem', 'Baker', 'Vincent', 'Oliver', 'YVONNE', 'GANNON', 'ADRIA', 'SOLOMON', 'ERIC', 'ROWAN', '405', 'Male', 2, 0x636974792068616c6c2e6a7067, 'Sasha', '2023-02-17 08:00:49', '2023-02-17 08:00:49'),
(14, '202286965', 'dopol@mailinator.com', 'Welcome@12345', 'Jennifer', 'TaShya', 'Raphael', 'Laurel', 'GANNON', 'CHANDA', 'RIGEL', 'EDAN', 'KEVIN', 'CHESTER', '424', 'Female', 2, 0x737065656420746573742e504e47, 'September', '2023-02-17 08:04:15', '2023-02-17 08:04:15'),
(15, '202226217', 'tavomyge@mailinator.com', 'Welcome@12345', 'Rinah', 'Iliana', 'Keegan', 'Kitra', 'FELICIA', 'AURORA', 'BELL', 'LEE', 'ERICA', 'KEIKO', '455', 'Female', 2, 0x627572616f742e6a7067, 'Chaim', '2023-02-17 08:09:57', '2023-02-17 08:09:57');

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
-- Indexes for table `deleted_student`
--
ALTER TABLE `deleted_student`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `deleted_student`
--
ALTER TABLE `deleted_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed`
--
ALTER TABLE `failed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `history_bmi`
--
ALTER TABLE `history_bmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `history_program_records`
--
ALTER TABLE `history_program_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_records`
--
ALTER TABLE `program_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `program_records_2`
--
ALTER TABLE `program_records_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `students_survery_answers`
--
ALTER TABLE `students_survery_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `students_survey_answers_history`
--
ALTER TABLE `students_survey_answers_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
