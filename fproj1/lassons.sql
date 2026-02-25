-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 مايو 2025 الساعة 17:22
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `little_programmer`
--

-- --------------------------------------------------------

--
-- بنية الجدول `lassons`
--

CREATE TABLE `lassons` (
  `Lassons_id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Diffculty-level` int(11) NOT NULL,
  `level_number` int(11) NOT NULL,
  `video_url` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lassons`
--

INSERT INTO `lassons` (`Lassons_id`, `Title`, `Content`, `Diffculty-level`, `level_number`, `video_url`) VALUES
(2, 'Lesson 2: Variables and Data Types', 'This lesson introduces variables - the building blocks of any program. You\'ll learn how to store information in variables, the different data types available, and how to use them in simple programs.', 1, 1, 'Variables.mp4'),
(1, 'Lesson 1: Intro to Programming', 'In this lesson, you\'ll learn the basics of programming, including what programming is, why it\'s important, and how computers understand code. We\'ll cover fundamental concepts like algorithms and computational thinking.', 1, 1, 'Introduction.mp4'),
(3, 'Lesson 3: Conditional Statements', 'Learn how to make decisions in your code with if/else statements. We\'ll cover boolean logic, comparison operators, and how to control the flow of your programs based on different conditions.', 1, 1, 'Conditional.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lassons`
--
ALTER TABLE `lassons`
  ADD PRIMARY KEY (`Lassons_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lassons`
--
ALTER TABLE `lassons`
  MODIFY `Lassons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
