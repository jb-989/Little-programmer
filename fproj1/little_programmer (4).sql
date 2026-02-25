-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11 يونيو 2025 الساعة 14:29
-- إصدار الخادم: 8.3.0
-- PHP Version: 8.2.18

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
-- بنية الجدول `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE IF NOT EXISTS `enrollment` (
  `enrollment-id` int NOT NULL AUTO_INCREMENT,
  `data_enrolled` date NOT NULL,
  `user id` int NOT NULL,
  `Lassons id` int DEFAULT NULL,
  PRIMARY KEY (`enrollment-id`) USING BTREE,
  KEY `user_id` (`user id`),
  KEY `Lassons_id` (`Lassons id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `description` text NOT NULL,
  `Lassons_id` int DEFAULT NULL,
  KEY `Lassons_id` (`Lassons_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `lassons`
--

DROP TABLE IF EXISTS `lassons`;
CREATE TABLE IF NOT EXISTS `lassons` (
  `Lassons_id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Diffculty-level` int NOT NULL,
  `level_number` int NOT NULL,
  `video_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`Lassons_id`),
  KEY `fk_lassons_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lassons`
--

INSERT INTO `lassons` (`Lassons_id`, `Title`, `Content`, `Diffculty-level`, `level_number`, `video_url`, `user_id`) VALUES
(1, 'Lesson 1: Intro to Programming', 'In this lesson, you\'ll learn the basics of programming, including what programming is, why it\'s important, and how computers understand code. We\'ll cover fundamental concepts like algorithms and computational thinking.', 1, 1, 'Introduction.mp4', NULL),
(2, 'Lesson 2: Variables and Data Types', 'This lesson introduces variables - the building blocks of any program. You\'ll learn how to store information in variables, the different data types available, and how to use them in simple programs.', 1, 1, 'Variables.mp4', NULL),
(3, 'Lesson 3: Conditional Statements', 'Learn how to make decisions in your code with if/else statements. We\'ll cover boolean logic, comparison operators, and how to control the flow of your programs based on different conditions.', 1, 1, 'Conditional.mp4', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentId` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `free` int NOT NULL,
  KEY `PaymentId` (`PaymentId`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `payment`
--

INSERT INTO `payment` (`PaymentId`, `user_id`, `free`) VALUES
(0, NULL, 1),
(1, NULL, 0),
(1, NULL, 0),
(0, NULL, 1),
(1, NULL, 0),
(0, NULL, 1),
(0, NULL, 1),
(0, NULL, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `child_first_name` varchar(50) NOT NULL,
  `child_last_name` varchar(50) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `mobile_number` varchar(255) NOT NULL DEFAULT 'none',
  `grade` enum('Grade 4','Grade 5','Grade 6','Grade 7','Grade 8','Grade 9') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `has_laptop` enum('Yes','No') NOT NULL,
  `user_type` enum('Parent','Student') NOT NULL,
  `signup_reason` varchar(100) NOT NULL,
  `subscribe_plan_timing` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int NOT NULL,
  `videos_completed` int DEFAULT NULL,
  `progress_level` int DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`user_id`, `child_first_name`, `child_last_name`, `parent_name`, `email`, `password`, `country_code`, `mobile_number`, `grade`, `has_laptop`, `user_type`, `signup_reason`, `subscribe_plan_timing`, `created_at`, `age`, `videos_completed`, `progress_level`) VALUES
(50, 'ri', 'no', 'noor', 'rima@gmail.com', 'RR22nn', '', '0546007236', 'Grade 4', 'Yes', 'Parent', '', '', '2025-05-24 12:53:50', 20, 2, 20),
(51, 'ri', 'no', 'ree', 'ri22@gmail.com', 'Noo22r', '', 'none', 'Grade 4', 'Yes', 'Parent', '', '', '2025-05-25 12:14:20', 20, 3, 55),
(52, 'gogo', 'ge', 'ree', 'gogo1@gmail.com', 'gogo11', '', 'none', '', '', 'Parent', '', '', '2025-05-25 12:53:28', 20, 1, 70),
(53, 'ri', 'no', 'noor', 'gnoo1@gmail.com', 'no22', '', '22', '', 'Yes', 'Parent', '', '', '2025-05-25 12:58:01', 18, 3, 60),
(54, 'gogo', 'be', 'noora', 'too@gmail.com', 'tono22', '', '4', '', 'No', 'Parent', '', '', '2025-05-25 13:08:45', 18, 0, 10),
(55, '', '', '', '', '', '', 'none', 'Grade 4', 'Yes', 'Student', 'Want to subscribe for more levels', '', '2025-05-25 13:09:16', 0, 3, 95),
(56, 'ري', 'تو', 'نور', 'noo1@gmail.com', 'nor11', '', '28', 'Grade 9', 'No', 'Parent', '', '', '2025-05-25 14:02:21', 16, 0, 40);

-- --------------------------------------------------------

--
-- بنية الجدول `user_reward`
--

DROP TABLE IF EXISTS `user_reward`;
CREATE TABLE IF NOT EXISTS `user_reward` (
  `reward_id` int NOT NULL AUTO_INCREMENT,
  `date_earned` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_reward` varchar(255) DEFAULT NULL,
  `result_reward` double DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  UNIQUE KEY `reward_id` (`reward_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `fk_enrollment_lassons` FOREIGN KEY (`Lassons id`) REFERENCES `lassons` (`Lassons_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_enrollment_user` FOREIGN KEY (`user id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- قيود الجداول `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `fk_games_lassons` FOREIGN KEY (`Lassons_id`) REFERENCES `lassons` (`Lassons_id`) ON DELETE CASCADE;

--
-- قيود الجداول `lassons`
--
ALTER TABLE `lassons`
  ADD CONSTRAINT `fk_lassons_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- قيود الجداول `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- قيود الجداول `user_reward`
--
ALTER TABLE `user_reward`
  ADD CONSTRAINT `fk_user_reward_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
