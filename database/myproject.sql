-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2017 at 03:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `academic_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `academic_year`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2017', 'user_from_session', NULL, '2017-01-21 16:15:59', '2017-01-21 16:15:59'),
(2, '2018', 'user_from_session', NULL, '2017-01-21 16:17:10', '2017-01-21 16:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `class_names`
--

CREATE TABLE `class_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_names`
--

INSERT INTO `class_names` (`id`, `class_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'five', 'user_from_session', NULL, '2017-01-20 22:34:23', '2017-01-22 10:53:53'),
(2, 'six', 'user_from_session', NULL, '2017-01-20 22:34:39', '2017-01-20 22:34:39'),
(3, 'seven', 'user_from_session', NULL, '2017-01-20 22:34:50', '2017-01-20 22:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_names`
--

CREATE TABLE `exam_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_types_id` int(10) UNSIGNED NOT NULL,
  `class_names_id` int(10) UNSIGNED NOT NULL,
  `academic_years_id` int(10) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_start_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_end_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_classes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage_for_final` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_names`
--

INSERT INTO `exam_names` (`id`, `exam_types_id`, `class_names_id`, `academic_years_id`, `exam_name`, `class_start_from`, `class_end_to`, `total_classes`, `percentage_for_final`, `status`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '1st semister', '01/01/2017', '04/30/2017', '77', '30', 'running', 'user_from_session', NULL, '2017-01-21 16:20:32', '2017-01-21 16:20:32'),
(2, 2, 1, 1, '2nd semester exam', '05/01/2017', '08/31/2017', '55', '30', 'running', 'user_from_session', NULL, '2017-01-21 16:29:17', '2017-01-21 16:29:17'),
(3, 2, 2, 1, '1st Semister ', '01/01/2017', '04/30/2017', '66', '30', 'running', 'user_from_session', NULL, '2017-01-22 12:09:14', '2017-01-22 12:09:14'),
(4, 2, 3, 1, '1st semister', '01/01/2017', '04/30/2017', '66', '30', 'running', 'user_from_session', NULL, '2017-01-22 12:09:57', '2017-01-22 12:09:57'),
(5, 2, 2, 1, '2nd semister', '01/01/2017', '04/30/2017', '56', '30', 'running', 'user_from_session', NULL, '2017-01-22 12:22:14', '2017-01-22 12:22:14'),
(6, 2, 3, 1, '2nd semister', '01/01/2017', '04/30/2017', '44', '30', 'running', 'user_from_session', NULL, '2017-01-22 12:22:53', '2017-01-22 12:22:53'),
(7, 2, 3, 1, '3rd Semister Exam', '09/01/2017', '12/31/2017', '77', '33', 'running', 'user_from_session', NULL, '2017-01-30 12:44:39', '2017-01-30 12:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `exam_type`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'monthly test', 'user_from_session', NULL, '2017-01-20 12:51:13', '2017-01-20 12:51:13'),
(2, 'semister exam', 'user_from_session', NULL, '2017-01-20 12:51:32', '2017-01-20 12:51:32'),
(3, 'Term Test', 'user_from_session', NULL, '2017-01-20 12:51:52', '2017-01-20 12:51:52'),
(4, 'Model Test', 'user_from_session', NULL, '2017-01-20 12:52:06', '2017-01-20 12:52:06'),
(5, 'Pre-model Test', 'user_from_session', NULL, '2017-01-20 12:52:14', '2017-01-20 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `marks_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marks_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `marks_from`, `marks_to`, `grade`, `grade_point`, `remark`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '80', '100', 'A+', '5.00', 'Excellent', 'user_from_session', NULL, '2017-01-20 10:46:42', '2017-01-20 10:46:42'),
(2, '70', '79', 'A', '4.00', 'Good', 'user_from_session', NULL, '2017-01-20 10:47:12', '2017-01-20 10:47:12'),
(3, '60', '69', 'A-', '3.5', 'Study hurd', 'user_from_session', NULL, '2017-01-20 10:47:42', '2017-01-20 10:47:42'),
(4, '50', '59', 'B', '3.0', 'study very hard', 'user_from_session', NULL, '2017-01-20 10:48:29', '2017-01-20 10:48:29'),
(5, '40', '49', 'C', '2.5', 'luckey this time', 'user_from_session', NULL, '2017-01-20 10:49:29', '2017-01-20 10:49:29'),
(6, '0', '40', 'F', '0', 'you are the top', 'user_from_session', NULL, '2017-01-20 10:50:05', '2017-01-20 10:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `mark_entries`
--

CREATE TABLE `mark_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `subjects_id` int(10) UNSIGNED NOT NULL,
  `exam_names_id` int(10) UNSIGNED NOT NULL,
  `students_id` int(10) UNSIGNED NOT NULL,
  `written_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oral_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t1_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t2_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mark_entries`
--

INSERT INTO `mark_entries` (`id`, `subjects_id`, `exam_names_id`, `students_id`, `written_mark`, `oral_mark`, `t1_mark`, `t2_mark`, `total_mark`, `grade_point`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 3, 3, 3, '20', '50', '', '', '70', '4', 'user_from_session', NULL, '2017-01-29 11:41:34', '2017-01-29 11:41:34'),
(7, 3, 3, 4, '5', '40', '', '', '45', '0', 'user_from_session', NULL, '2017-01-29 11:41:34', '2017-01-29 11:41:34'),
(8, 3, 3, 5, '40', '5', '', '', '45', '0', 'user_from_session', NULL, '2017-01-29 11:41:34', '2017-01-29 11:41:34'),
(9, 3, 3, 6, '4', '0', '', '', '4', '0', 'user_from_session', NULL, '2017-01-29 11:41:34', '2017-01-29 11:41:34'),
(10, 3, 3, 7, '0', '50', '', '', '50', '0', 'user_from_session', NULL, '2017-01-29 11:41:34', '2017-01-29 11:41:34'),
(21, 7, 3, 3, '15', '15', '7', '', '37', '4', 'user_from_session', NULL, '2017-01-29 12:24:53', '2017-01-29 12:24:53'),
(22, 7, 3, 4, '8', '10', '7', '', '25', '3', 'user_from_session', NULL, '2017-01-29 12:24:53', '2017-01-29 12:24:53'),
(23, 7, 3, 5, '15', '15', '2', '', '32', '0', 'user_from_session', NULL, '2017-01-29 12:24:54', '2017-01-29 12:24:54'),
(24, 7, 3, 6, '15', '15', '0', '', '30', '0', 'user_from_session', NULL, '2017-01-29 12:24:54', '2017-01-29 12:24:54'),
(25, 7, 3, 7, '10', '10', '4', '', '24', '2.5', 'user_from_session', NULL, '2017-01-29 12:24:54', '2017-01-29 12:24:54'),
(26, 4, 3, 3, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:48:13', '2017-01-29 12:48:13'),
(27, 4, 3, 4, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:48:13', '2017-01-29 12:48:13'),
(28, 4, 3, 5, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:48:13', '2017-01-29 12:48:13'),
(29, 4, 3, 6, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:48:13', '2017-01-29 12:48:13'),
(30, 4, 3, 7, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:48:14', '2017-01-29 12:48:14'),
(31, 3, 3, 13, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:48:52', '2017-01-29 12:48:52'),
(32, 3, 3, 14, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:48:52', '2017-01-29 12:48:52'),
(33, 3, 3, 15, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:48:52', '2017-01-29 12:48:52'),
(34, 3, 3, 16, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:48:52', '2017-01-29 12:48:52'),
(35, 3, 3, 17, '33', '44', '', '', '77', '4', 'user_from_session', NULL, '2017-01-29 12:48:52', '2017-01-29 12:48:52'),
(36, 4, 3, 13, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:49:16', '2017-01-29 12:49:16'),
(37, 4, 3, 14, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:49:16', '2017-01-29 12:49:16'),
(38, 4, 3, 15, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:49:16', '2017-01-29 12:49:16'),
(39, 4, 3, 16, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:49:16', '2017-01-29 12:49:16'),
(40, 4, 3, 17, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-29 12:49:16', '2017-01-29 12:49:16'),
(41, 7, 3, 13, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:50:26', '2017-01-29 12:50:26'),
(42, 7, 3, 14, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:50:26', '2017-01-29 12:50:26'),
(43, 7, 3, 15, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:50:26', '2017-01-29 12:50:26'),
(44, 7, 3, 16, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:50:26', '2017-01-29 12:50:26'),
(45, 7, 3, 17, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:50:26', '2017-01-29 12:50:26'),
(46, 3, 5, 3, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:15', '2017-01-29 12:51:15'),
(47, 3, 5, 4, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:15', '2017-01-29 12:51:15'),
(48, 3, 5, 5, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:15', '2017-01-29 12:51:15'),
(49, 3, 5, 6, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:15', '2017-01-29 12:51:15'),
(50, 3, 5, 7, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:15', '2017-01-29 12:51:15'),
(51, 4, 5, 3, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:46', '2017-01-29 12:51:46'),
(52, 4, 5, 4, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:46', '2017-01-29 12:51:46'),
(53, 4, 5, 5, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:46', '2017-01-29 12:51:46'),
(54, 4, 5, 6, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:46', '2017-01-29 12:51:46'),
(55, 4, 5, 7, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:51:46', '2017-01-29 12:51:46'),
(56, 7, 5, 3, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:52:17', '2017-01-29 12:52:17'),
(57, 7, 5, 4, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:52:17', '2017-01-29 12:52:17'),
(58, 7, 5, 5, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:52:17', '2017-01-29 12:52:17'),
(59, 7, 5, 6, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:52:17', '2017-01-29 12:52:17'),
(60, 7, 5, 7, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:52:17', '2017-01-29 12:52:17'),
(61, 3, 5, 13, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:52:39', '2017-01-29 12:52:39'),
(62, 3, 5, 14, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:52:39', '2017-01-29 12:52:39'),
(63, 3, 5, 15, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:52:39', '2017-01-29 12:52:39'),
(64, 3, 5, 16, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:52:39', '2017-01-29 12:52:39'),
(65, 3, 5, 17, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:52:39', '2017-01-29 12:52:39'),
(66, 4, 5, 13, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:53:09', '2017-01-29 12:53:09'),
(67, 4, 5, 14, '4', '44', '', '', '48', '0', 'user_from_session', NULL, '2017-01-29 12:53:09', '2017-01-29 12:53:09'),
(68, 4, 5, 15, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:53:09', '2017-01-29 12:53:09'),
(69, 4, 5, 16, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:53:09', '2017-01-29 12:53:09'),
(70, 4, 5, 17, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-29 12:53:09', '2017-01-29 12:53:09'),
(71, 7, 5, 13, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:53:47', '2017-01-29 12:53:47'),
(72, 7, 5, 14, '9', '9', '0', '', '18', '0', 'user_from_session', NULL, '2017-01-29 12:53:47', '2017-01-29 12:53:47'),
(73, 7, 5, 15, '0', '9', '9', '', '18', '0', 'user_from_session', NULL, '2017-01-29 12:53:47', '2017-01-29 12:53:47'),
(74, 7, 5, 16, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:53:47', '2017-01-29 12:53:47'),
(75, 7, 5, 17, '9', '9', '9', '', '27', '3', 'user_from_session', NULL, '2017-01-29 12:53:48', '2017-01-29 12:53:48'),
(76, 8, 4, 18, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 12:48:51', '2017-01-30 12:48:51'),
(77, 8, 4, 19, '11', '44', '', '', '55', '0', 'user_from_session', NULL, '2017-01-30 12:48:51', '2017-01-30 12:48:51'),
(78, 8, 4, 20, '31', '26', '', '', '57', '3', 'user_from_session', NULL, '2017-01-30 12:48:51', '2017-01-30 12:48:51'),
(79, 8, 4, 21, '34', '9', '', '', '43', '0', 'user_from_session', NULL, '2017-01-30 12:48:51', '2017-01-30 12:48:51'),
(80, 8, 4, 22, '22', '32', '', '', '54', '3', 'user_from_session', NULL, '2017-01-30 12:48:51', '2017-01-30 12:48:51'),
(81, 9, 4, 18, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 12:55:02', '2017-01-30 12:55:02'),
(82, 9, 4, 19, '32', '22', '', '', '54', '3', 'user_from_session', NULL, '2017-01-30 12:55:02', '2017-01-30 12:55:02'),
(83, 9, 4, 20, '18', '21', '', '', '39', '0', 'user_from_session', NULL, '2017-01-30 12:55:02', '2017-01-30 12:55:02'),
(84, 9, 4, 21, '9', '33', '', '', '42', '0', 'user_from_session', NULL, '2017-01-30 12:55:02', '2017-01-30 12:55:02'),
(85, 9, 4, 22, '24', '33', '', '', '57', '3', 'user_from_session', NULL, '2017-01-30 12:55:02', '2017-01-30 12:55:02'),
(86, 10, 4, 18, '90', '', '', '', '90', '5', 'user_from_session', NULL, '2017-01-30 12:58:53', '2017-01-30 12:58:53'),
(87, 10, 4, 19, '39', '', '', '', '39', '0', 'user_from_session', NULL, '2017-01-30 12:58:53', '2017-01-30 12:58:53'),
(88, 10, 4, 20, '45', '', '', '', '45', '2.5', 'user_from_session', NULL, '2017-01-30 12:58:53', '2017-01-30 12:58:53'),
(89, 10, 4, 21, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 12:58:53', '2017-01-30 12:58:53'),
(90, 10, 4, 22, '74', '', '', '', '74', '4', 'user_from_session', NULL, '2017-01-30 12:58:53', '2017-01-30 12:58:53'),
(91, 11, 4, 18, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:00:43', '2017-01-30 13:00:43'),
(92, 11, 4, 19, '89', '', '', '', '89', '5', 'user_from_session', NULL, '2017-01-30 13:00:43', '2017-01-30 13:00:43'),
(93, 11, 4, 20, '46', '', '', '', '46', '2.5', 'user_from_session', NULL, '2017-01-30 13:00:43', '2017-01-30 13:00:43'),
(94, 11, 4, 21, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:00:43', '2017-01-30 13:00:43'),
(95, 11, 4, 22, '33', '', '', '', '33', '0', 'user_from_session', NULL, '2017-01-30 13:00:43', '2017-01-30 13:00:43'),
(96, 12, 4, 18, '35', '33', '22', '', '90', '5', 'user_from_session', NULL, '2017-01-30 13:02:55', '2017-01-30 13:02:55'),
(97, 12, 4, 19, '22', '22', '11', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:02:55', '2017-01-30 13:02:55'),
(98, 12, 4, 20, '11', '23', '24', '', '58', '0', 'user_from_session', NULL, '2017-01-30 13:02:55', '2017-01-30 13:02:55'),
(99, 12, 4, 21, '34', '24', '15', '', '73', '4', 'user_from_session', NULL, '2017-01-30 13:02:55', '2017-01-30 13:02:55'),
(100, 12, 4, 22, '27', '25', '21', '', '73', '4', 'user_from_session', NULL, '2017-01-30 13:02:55', '2017-01-30 13:02:55'),
(101, 8, 4, 23, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:03:38', '2017-01-30 13:03:38'),
(102, 8, 4, 24, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:03:38', '2017-01-30 13:03:38'),
(103, 8, 4, 25, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:03:38', '2017-01-30 13:03:38'),
(104, 8, 4, 26, '33', '11', '', '', '44', '0', 'user_from_session', NULL, '2017-01-30 13:03:38', '2017-01-30 13:03:38'),
(105, 8, 4, 27, '33', '44', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:03:38', '2017-01-30 13:03:38'),
(106, 9, 4, 23, '44', '33', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:04:17', '2017-01-30 13:04:17'),
(107, 9, 4, 24, '33', '44', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:04:17', '2017-01-30 13:04:17'),
(108, 9, 4, 25, '45', '7', '', '', '52', '0', 'user_from_session', NULL, '2017-01-30 13:04:17', '2017-01-30 13:04:17'),
(109, 9, 4, 26, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:04:17', '2017-01-30 13:04:17'),
(110, 9, 4, 27, '34', '34', '', '', '68', '3.5', 'user_from_session', NULL, '2017-01-30 13:04:17', '2017-01-30 13:04:17'),
(111, 10, 4, 23, '96', '', '', '', '96', '5', 'user_from_session', NULL, '2017-01-30 13:04:53', '2017-01-30 13:04:53'),
(112, 10, 4, 24, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:04:53', '2017-01-30 13:04:53'),
(113, 10, 4, 25, '23', '', '', '', '23', '0', 'user_from_session', NULL, '2017-01-30 13:04:53', '2017-01-30 13:04:53'),
(114, 10, 4, 26, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:04:53', '2017-01-30 13:04:53'),
(115, 10, 4, 27, '56', '', '', '', '56', '3', 'user_from_session', NULL, '2017-01-30 13:04:53', '2017-01-30 13:04:53'),
(116, 11, 4, 23, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:05:28', '2017-01-30 13:05:28'),
(117, 11, 4, 24, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:05:28', '2017-01-30 13:05:28'),
(118, 11, 4, 25, '65', '', '', '', '65', '3.5', 'user_from_session', NULL, '2017-01-30 13:05:28', '2017-01-30 13:05:28'),
(119, 11, 4, 26, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:05:28', '2017-01-30 13:05:28'),
(120, 11, 4, 27, '6', '', '', '', '6', '0', 'user_from_session', NULL, '2017-01-30 13:05:28', '2017-01-30 13:05:28'),
(121, 12, 4, 23, '33', '33', '21', '', '87', '5', 'user_from_session', NULL, '2017-01-30 13:06:44', '2017-01-30 13:06:44'),
(122, 12, 4, 24, '22', '22', '22', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:06:44', '2017-01-30 13:06:44'),
(123, 12, 4, 25, '21', '21', '21', '', '63', '3.5', 'user_from_session', NULL, '2017-01-30 13:06:44', '2017-01-30 13:06:44'),
(124, 12, 4, 26, '21', '21', '21', '', '63', '3.5', 'user_from_session', NULL, '2017-01-30 13:06:44', '2017-01-30 13:06:44'),
(125, 12, 4, 27, '21', '30', '24', '', '75', '4', 'user_from_session', NULL, '2017-01-30 13:06:44', '2017-01-30 13:06:44'),
(126, 8, 6, 18, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:09:28', '2017-01-30 13:09:28'),
(127, 8, 6, 19, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:09:28', '2017-01-30 13:09:28'),
(128, 8, 6, 20, '22', '22', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:09:28', '2017-01-30 13:09:28'),
(129, 8, 6, 21, '44', '33', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:09:28', '2017-01-30 13:09:28'),
(130, 8, 6, 22, '5', '44', '', '', '49', '0', 'user_from_session', NULL, '2017-01-30 13:09:28', '2017-01-30 13:09:28'),
(131, 9, 6, 18, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:09:56', '2017-01-30 13:09:56'),
(132, 9, 6, 19, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:09:56', '2017-01-30 13:09:56'),
(133, 9, 6, 20, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:09:56', '2017-01-30 13:09:56'),
(134, 9, 6, 21, '6', '55', '', '', '61', '0', 'user_from_session', NULL, '2017-01-30 13:09:56', '2017-01-30 13:09:56'),
(135, 9, 6, 22, '34', '34', '', '', '68', '3.5', 'user_from_session', NULL, '2017-01-30 13:09:56', '2017-01-30 13:09:56'),
(136, 10, 6, 18, '64', '', '', '', '64', '3.5', 'user_from_session', NULL, '2017-01-30 13:10:23', '2017-01-30 13:10:23'),
(137, 10, 6, 19, '64', '', '', '', '64', '3.5', 'user_from_session', NULL, '2017-01-30 13:10:23', '2017-01-30 13:10:23'),
(138, 10, 6, 20, '3', '', '', '', '3', '0', 'user_from_session', NULL, '2017-01-30 13:10:23', '2017-01-30 13:10:23'),
(139, 10, 6, 21, '56', '', '', '', '56', '3', 'user_from_session', NULL, '2017-01-30 13:10:23', '2017-01-30 13:10:23'),
(140, 10, 6, 22, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:10:23', '2017-01-30 13:10:23'),
(141, 11, 6, 18, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:10:53', '2017-01-30 13:10:53'),
(142, 11, 6, 19, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:10:53', '2017-01-30 13:10:53'),
(143, 11, 6, 20, '7', '', '', '', '7', '0', 'user_from_session', NULL, '2017-01-30 13:10:53', '2017-01-30 13:10:53'),
(144, 11, 6, 21, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:10:53', '2017-01-30 13:10:53'),
(145, 11, 6, 22, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:10:53', '2017-01-30 13:10:53'),
(146, 12, 6, 18, '33', '32', '21', '', '86', '5', 'user_from_session', NULL, '2017-01-30 13:11:58', '2017-01-30 13:11:58'),
(147, 12, 6, 19, '11', '32', '21', '', '64', '0', 'user_from_session', NULL, '2017-01-30 13:11:58', '2017-01-30 13:11:58'),
(148, 12, 6, 20, '33', '25', '23', '', '81', '5', 'user_from_session', NULL, '2017-01-30 13:11:58', '2017-01-30 13:11:58'),
(149, 12, 6, 21, '33', '33', '22', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:11:58', '2017-01-30 13:11:58'),
(150, 12, 6, 22, '33', '33', '22', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:11:58', '2017-01-30 13:11:58'),
(151, 8, 6, 23, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:12:29', '2017-01-30 13:12:29'),
(152, 8, 6, 24, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:12:29', '2017-01-30 13:12:29'),
(153, 8, 6, 25, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:12:29', '2017-01-30 13:12:29'),
(154, 8, 6, 26, '33', '22', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:12:29', '2017-01-30 13:12:29'),
(155, 8, 6, 27, '11', '44', '', '', '55', '0', 'user_from_session', NULL, '2017-01-30 13:12:29', '2017-01-30 13:12:29'),
(156, 9, 6, 23, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:12:58', '2017-01-30 13:12:58'),
(157, 9, 6, 24, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:12:58', '2017-01-30 13:12:58'),
(158, 9, 6, 25, '22', '22', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:12:58', '2017-01-30 13:12:58'),
(159, 9, 6, 26, '11', '11', '', '', '22', '0', 'user_from_session', NULL, '2017-01-30 13:12:58', '2017-01-30 13:12:58'),
(160, 9, 6, 27, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:12:58', '2017-01-30 13:12:58'),
(161, 10, 6, 23, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:16:03', '2017-01-30 13:16:03'),
(162, 10, 6, 24, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:16:03', '2017-01-30 13:16:03'),
(163, 10, 6, 25, '23', '', '', '', '23', '0', 'user_from_session', NULL, '2017-01-30 13:16:03', '2017-01-30 13:16:03'),
(164, 10, 6, 26, '56', '', '', '', '56', '3', 'user_from_session', NULL, '2017-01-30 13:16:03', '2017-01-30 13:16:03'),
(165, 10, 6, 27, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:16:03', '2017-01-30 13:16:03'),
(166, 11, 6, 23, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:18:39', '2017-01-30 13:18:39'),
(167, 11, 6, 24, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:18:40', '2017-01-30 13:18:40'),
(168, 11, 6, 25, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:18:40', '2017-01-30 13:18:40'),
(169, 11, 6, 26, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:18:40', '2017-01-30 13:18:40'),
(170, 11, 6, 27, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:18:40', '2017-01-30 13:18:40'),
(171, 12, 6, 23, '33', '33', '21', '', '87', '5', 'user_from_session', NULL, '2017-01-30 13:19:27', '2017-01-30 13:19:27'),
(172, 12, 6, 24, '22', '33', '22', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:19:27', '2017-01-30 13:19:27'),
(173, 12, 6, 25, '33', '33', '21', '', '87', '5', 'user_from_session', NULL, '2017-01-30 13:19:27', '2017-01-30 13:19:27'),
(174, 12, 6, 26, '33', '24', '13', '', '70', '4', 'user_from_session', NULL, '2017-01-30 13:19:27', '2017-01-30 13:19:27'),
(175, 12, 6, 27, '22', '10', '15', '', '47', '0', 'user_from_session', NULL, '2017-01-30 13:19:27', '2017-01-30 13:19:27'),
(176, 8, 7, 18, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:45:23', '2017-01-30 13:45:23'),
(177, 8, 7, 19, '43', '33', '', '', '76', '4', 'user_from_session', NULL, '2017-01-30 13:45:24', '2017-01-30 13:45:24'),
(178, 8, 7, 18, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:46:22', '2017-01-30 13:46:22'),
(179, 8, 7, 19, '43', '33', '', '', '76', '4', 'user_from_session', NULL, '2017-01-30 13:46:22', '2017-01-30 13:46:22'),
(180, 8, 7, 20, '44', '35', '', '', '79', '4', 'user_from_session', NULL, '2017-01-30 13:46:22', '2017-01-30 13:46:22'),
(181, 8, 7, 21, '11', '44', '', '', '55', '0', 'user_from_session', NULL, '2017-01-30 13:46:23', '2017-01-30 13:46:23'),
(182, 8, 7, 22, '55', '44', '', '', '99', '5', 'user_from_session', NULL, '2017-01-30 13:46:23', '2017-01-30 13:46:23'),
(183, 9, 7, 18, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:47:01', '2017-01-30 13:47:01'),
(184, 9, 7, 19, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:47:01', '2017-01-30 13:47:01'),
(185, 9, 7, 20, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:47:01', '2017-01-30 13:47:01'),
(186, 9, 7, 21, '44', '10', '', '', '54', '0', 'user_from_session', NULL, '2017-01-30 13:47:01', '2017-01-30 13:47:01'),
(187, 9, 7, 22, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:47:01', '2017-01-30 13:47:01'),
(188, 10, 7, 18, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:47:35', '2017-01-30 13:47:35'),
(189, 10, 7, 19, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:47:35', '2017-01-30 13:47:35'),
(190, 10, 7, 20, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:47:35', '2017-01-30 13:47:35'),
(191, 10, 7, 21, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:47:35', '2017-01-30 13:47:35'),
(192, 10, 7, 22, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:47:35', '2017-01-30 13:47:35'),
(193, 11, 7, 18, '77', '', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:48:04', '2017-01-30 13:48:04'),
(194, 11, 7, 19, '77', '', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:48:04', '2017-01-30 13:48:04'),
(195, 11, 7, 20, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:48:04', '2017-01-30 13:48:04'),
(196, 11, 7, 21, '76', '', '', '', '76', '4', 'user_from_session', NULL, '2017-01-30 13:48:04', '2017-01-30 13:48:04'),
(197, 11, 7, 22, '8', '', '', '', '8', '0', 'user_from_session', NULL, '2017-01-30 13:48:05', '2017-01-30 13:48:05'),
(198, 12, 7, 18, '33', '33', '21', '', '87', '5', 'user_from_session', NULL, '2017-01-30 13:48:52', '2017-01-30 13:48:52'),
(199, 12, 7, 19, '35', '21', '21', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:48:52', '2017-01-30 13:48:52'),
(200, 12, 7, 20, '22', '22', '22', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:48:52', '2017-01-30 13:48:52'),
(201, 12, 7, 21, '35', '22', '22', '', '79', '4', 'user_from_session', NULL, '2017-01-30 13:48:52', '2017-01-30 13:48:52'),
(202, 12, 7, 22, '22', '22', '22', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:48:52', '2017-01-30 13:48:52'),
(203, 8, 7, 23, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:49:19', '2017-01-30 13:49:19'),
(204, 8, 7, 24, '33', '33', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:49:19', '2017-01-30 13:49:19'),
(205, 8, 7, 25, '22', '33', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:49:19', '2017-01-30 13:49:19'),
(206, 8, 7, 26, '33', '22', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:49:19', '2017-01-30 13:49:19'),
(207, 8, 7, 27, '44', '33', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:49:19', '2017-01-30 13:49:19'),
(208, 9, 7, 23, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:49:42', '2017-01-30 13:49:42'),
(209, 9, 7, 24, '44', '44', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:49:42', '2017-01-30 13:49:42'),
(210, 9, 7, 25, '33', '44', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:49:42', '2017-01-30 13:49:42'),
(211, 9, 7, 26, '44', '33', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:49:42', '2017-01-30 13:49:42'),
(212, 9, 7, 27, '44', '45', '', '', '99', '5', 'user_from_session', NULL, '2017-01-30 13:49:43', '2017-01-30 13:49:43'),
(213, 10, 7, 23, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:50:59', '2017-01-30 13:50:59'),
(214, 10, 7, 24, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:50:59', '2017-01-30 13:50:59'),
(215, 10, 7, 25, '33', '', '', '', '33', '0', 'user_from_session', NULL, '2017-01-30 13:50:59', '2017-01-30 13:50:59'),
(216, 10, 7, 26, '66', '', '', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:50:59', '2017-01-30 13:50:59'),
(217, 10, 7, 27, '65', '', '', '', '65', '3.5', 'user_from_session', NULL, '2017-01-30 13:50:59', '2017-01-30 13:50:59'),
(218, 11, 7, 23, '77', '', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:51:26', '2017-01-30 13:51:26'),
(219, 11, 7, 24, '44', '', '', '', '44', '2.5', 'user_from_session', NULL, '2017-01-30 13:51:26', '2017-01-30 13:51:26'),
(220, 11, 7, 25, '55', '', '', '', '55', '3', 'user_from_session', NULL, '2017-01-30 13:51:26', '2017-01-30 13:51:26'),
(221, 11, 7, 26, '77', '', '', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:51:27', '2017-01-30 13:51:27'),
(222, 11, 7, 27, '88', '', '', '', '88', '5', 'user_from_session', NULL, '2017-01-30 13:51:27', '2017-01-30 13:51:27'),
(223, 12, 7, 23, '33', '33', '21', '', '87', '5', 'user_from_session', NULL, '2017-01-30 13:52:06', '2017-01-30 13:52:06'),
(224, 12, 7, 24, '22', '22', '22', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:52:06', '2017-01-30 13:52:06'),
(225, 12, 7, 25, '22', '22', '22', '', '66', '3.5', 'user_from_session', NULL, '2017-01-30 13:52:06', '2017-01-30 13:52:06'),
(226, 12, 7, 26, '2', '22', '21', '', '45', '0', 'user_from_session', NULL, '2017-01-30 13:52:06', '2017-01-30 13:52:06'),
(227, 12, 7, 27, '33', '29', '15', '', '77', '4', 'user_from_session', NULL, '2017-01-30 13:52:06', '2017-01-30 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_01_123833_create_class_names_table', 1),
(4, '2017_01_02_195102_create_academic_years_table', 1),
(5, '2017_01_03_202414_create_students_table', 1),
(6, '2017_01_04_083253_create_student_detaileds_table', 1),
(7, '2017_01_05_124521_create_section_names_table', 1),
(8, '2017_01_06_144946_create_subjects_table', 1),
(9, '2017_01_07_193337_create_exam_types_table', 1),
(10, '2017_01_08_193421_create_exam_names_table', 1),
(11, '2017_01_09_193444_create_mark_entries_tabl', 1),
(12, '2017_01_10_163638_create_grades_table', 1),
(13, '2017_01_14_150552_create_teachers_table', 1),
(14, '2017_01_14_155258_create_departments_table', 1),
(16, '2017_01_09_193444_create_mark_entries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_names`
--

CREATE TABLE `section_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_names_id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_names`
--

INSERT INTO `section_names` (`id`, `class_names_id`, `section_name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Boys', 'user_from_session', NULL, '2017-01-21 11:32:48', '2017-01-21 11:32:48'),
(2, 1, 'Girls', 'user_from_session', NULL, '2017-01-21 11:58:08', '2017-01-21 11:58:08'),
(3, 2, 'Boys--Day', 'user_from_session', NULL, '2017-01-21 11:58:19', '2017-01-21 11:58:19'),
(4, 2, 'Girls--Morning', 'user_from_session', NULL, '2017-01-21 11:58:26', '2017-01-21 11:58:26'),
(5, 3, 'Boys', 'user_from_session', NULL, '2017-01-21 11:58:33', '2017-01-21 11:58:33'),
(6, 3, 'Girls', 'user_from_session', NULL, '2017-01-21 11:58:41', '2017-01-21 11:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_names_id` int(10) UNSIGNED NOT NULL,
  `sid` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `academic_year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student_image/user.png',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `class_names_id`, `sid`, `first_name`, `last_name`, `gender`, `group`, `religion`, `class`, `section`, `academic_year`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 2, 1700003, 'abu', 'alam', 'male', 'general', 'islam', '', '3', '2017', 'student_image/user.png', NULL, '2017-01-22 13:13:21', '2017-01-22 13:13:21'),
(4, 2, 1700004, 'abdul', 'alim', 'male', 'general', 'islam', '', '3', '2017', 'student_image/user.png', NULL, '2017-01-22 13:15:15', '2017-01-22 13:15:15'),
(5, 2, 1700005, 'is', 'mon', 'male', 'general', 'islam', '', '3', '2017', 'student_image/user.png', NULL, '2017-01-22 13:18:02', '2017-01-22 13:18:02'),
(6, 2, 1700006, 'ke', 'mon', 'male', 'general', 'islam', '', '3', '2017', 'student_image/user.png', NULL, '2017-01-22 13:18:41', '2017-01-22 13:18:41'),
(7, 2, 1700007, 'ajib', 'aj', 'male', 'general', 'islam', '', '3', '2017', 'student_image/user.png', NULL, '2017-01-22 13:19:54', '2017-01-22 13:19:54'),
(13, 2, 1700013, 'umme', 'jar', 'female', 'general', 'islam', '', '4', '2017', 'student_image/user.png', NULL, '2017-01-29 12:34:50', '2017-01-29 12:34:50'),
(14, 2, 1700014, 'binte', 'kar', 'female', 'general', 'islam', '', '4', '2017', 'student_image/user.png', NULL, '2017-01-29 12:36:11', '2017-01-29 12:36:11'),
(15, 2, 1700015, 'salasa', 'three', 'female', 'general', 'islam', '', '4', '2017', 'student_image/user.png', NULL, '2017-01-29 12:37:00', '2017-01-29 12:37:00'),
(16, 2, 1700016, 'arbaaa', 'binte', 'female', 'general', 'islam', '', '4', '2017', 'student_image/user.png', NULL, '2017-01-29 12:37:33', '2017-01-29 12:37:33'),
(17, 2, 1700017, 'penta', 'khumsa', 'female', 'general', 'islam', '', '4', '2017', 'student_image/user.png', NULL, '2017-01-29 12:38:21', '2017-01-29 12:38:21'),
(18, 3, 1700018, 'sabaa', 'class', 'male', 'general', 'islam', '', '5', '2017', 'student_image/user.png', NULL, '2017-01-29 12:39:56', '2017-01-29 12:39:56'),
(19, 3, 1700019, 'jane', 'cour', 'male', 'general', 'islam', '', '5', '2017', 'student_image/user.png', NULL, '2017-01-29 12:40:32', '2017-01-29 12:40:32'),
(20, 3, 1700020, 'year', 'cour', 'male', 'general', 'islam', '', '5', '2017', 'student_image/user.png', NULL, '2017-01-29 12:41:00', '2017-01-29 12:41:00'),
(21, 3, 1700021, 'abz', 'cour', 'male', 'general', 'islam', '', '5', '2017', 'student_image/user.png', NULL, '2017-01-29 12:41:29', '2017-01-29 12:41:29'),
(22, 3, 1700022, 'abu', 'zar', 'male', 'general', 'islam', '', '5', '2017', 'student_image/user.png', NULL, '2017-01-29 12:43:09', '2017-01-29 12:43:09'),
(23, 3, 1700023, 'umme', 'zar', 'female', 'general', 'islam', '', '6', '2017', 'student_image/user.png', NULL, '2017-01-29 12:43:43', '2017-01-29 12:43:43'),
(24, 3, 1700024, 'um', 'zar', 'female', 'general', 'islam', '', '6', '2017', 'student_image/user.png', NULL, '2017-01-29 12:44:03', '2017-01-29 12:44:03'),
(25, 3, 1700025, 'binte', 'zar', 'female', 'general', 'islam', '', '6', '2017', 'student_image/user.png', NULL, '2017-01-29 12:44:21', '2017-01-29 12:44:21'),
(26, 3, 1700026, 'abdc', 'zar', 'female', 'general', 'islam', '', '6', '2017', 'student_image/user.png', NULL, '2017-01-29 12:44:43', '2017-01-29 12:44:43'),
(27, 3, 1700027, 'efghi', 'zar', 'female', 'general', 'islam', '', '6', '2017', 'student_image/user.png', NULL, '2017-01-29 12:45:00', '2017-01-29 12:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_detaileds`
--

CREATE TABLE `student_detaileds` (
  `id` int(10) UNSIGNED NOT NULL,
  `students_id` int(10) UNSIGNED NOT NULL,
  `transport` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birth_certificate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_school` text COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_education` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_occupation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_nid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `father_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `father_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_education` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_occupation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_nid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mother_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mother_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_detaileds`
--

INSERT INTO `student_detaileds` (`id`, `students_id`, `transport`, `dob`, `birth_certificate`, `blood_group`, `last_school`, `father_name`, `father_education`, `father_occupation`, `father_nid`, `father_phone`, `father_email`, `mother_name`, `mother_education`, `mother_occupation`, `mother_nid`, `mother_phone`, `mother_email`, `guardian_name`, `guardian_email`, `relation`, `guardian_phone`, `present_address`, `permanent_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, '0', '01/18/2017', '', 'B-', 'as', 'anu', 'bsc', 'business', '', '9785978', '', 'umme', '', '', '', '', '', 'abu', '', 'son', '6786564', 'zv, fawe, Dhaka', 'zv, fawe, Dhaka', NULL, '2017-01-22 13:13:21', '2017-01-22 13:13:21'),
(2, 4, '0', '01/18/2017', '', 'B-', 'as', 'anu', 'bsc', 'business', '', '9785978', '', 'umme', '', '', '', '', '', 'abu', '', 'son', '6786564', 'zv, fawe, Dhaka', 'zv, fawe, Dhaka', NULL, '2017-01-22 13:15:15', '2017-01-22 13:15:15'),
(3, 5, '0', '01/19/2017', '', 'O+', '', 'abu', 'msc', 'business', '', '87976', '', 'umme', '', '', '', '', '', 'abu', '', 'son', '765976', 'knsd, sd , Dhaka', 'knsd, sd , Dhaka', NULL, '2017-01-22 13:18:02', '2017-01-22 13:18:02'),
(4, 6, '0', '01/19/2017', '', 'O+', '', 'abu', 'msc', 'business', '', '87976', '', 'umme', '', '', '', '', '', 'abu', '', 'son', '765976', 'knsd, sd , Dhaka', 'knsd, sd , Dhaka', NULL, '2017-01-22 13:18:41', '2017-01-22 13:18:41'),
(5, 7, '0', '01/19/2017', '', 'O+', '', 'abu', 'msc', 'business', '', '87976', '', 'umme', '', '', '', '', '', 'abu', '', 'son', '765976', 'knsd, sd , Dhaka', 'knsd, sd , Dhaka', NULL, '2017-01-22 13:19:55', '2017-01-22 13:19:55'),
(11, 13, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:34:50', '2017-01-29 12:34:50'),
(12, 14, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:36:12', '2017-01-29 12:36:12'),
(13, 15, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:37:01', '2017-01-29 12:37:01'),
(14, 16, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:37:34', '2017-01-29 12:37:34'),
(15, 17, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:38:21', '2017-01-29 12:38:21'),
(16, 18, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:39:57', '2017-01-29 12:39:57'),
(17, 19, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:40:32', '2017-01-29 12:40:32'),
(18, 20, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:41:00', '2017-01-29 12:41:00'),
(19, 21, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:41:29', '2017-01-29 12:41:29'),
(20, 22, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:43:09', '2017-01-29 12:43:09'),
(21, 23, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:43:43', '2017-01-29 12:43:43'),
(22, 24, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:44:03', '2017-01-29 12:44:03'),
(23, 25, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:44:21', '2017-01-29 12:44:21'),
(24, 26, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:44:43', '2017-01-29 12:44:43'),
(25, 27, '0', '01/11/2017', 'kjsds', 'B-', 'abcd', 'abc', 'def', 'jkl', '', '019283837', '', 'ghi', '', '', '', '', '', 'mno', '', 'daughter', '019292833743', 'abc, def, Ghi, Dhaka', 'abc, def, Ghi, Dhaka', NULL, '2017-01-29 12:45:01', '2017-01-29 12:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_names_id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `written_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `oral_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `t1_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `t2_mark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user_from_session',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_names_id`, `subject_name`, `class_name`, `section_name`, `written_mark`, `oral_mark`, `t1_mark`, `t2_mark`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bangla', '', '', '50', '50', '0', '0', 'user_from_session', NULL, '2017-01-21 15:57:38', '2017-01-21 15:57:38'),
(2, 1, 'English', '', '', '50', '50', '0', '0', 'user_from_session', NULL, '2017-01-21 16:01:53', '2017-01-21 16:01:53'),
(3, 2, 'Bangla', '', '', '50', '50', '0', '0', 'user_from_session', NULL, '2017-01-22 11:47:55', '2017-01-22 11:47:55'),
(4, 2, 'English', '', '', '50', '50', '0', '0', 'user_from_session', NULL, '2017-01-22 11:48:38', '2017-01-22 11:48:38'),
(7, 2, 'GK', '', '', '20', '20', '10', '0', 'user_from_session', NULL, '2017-01-25 22:17:00', '2017-01-25 22:17:00'),
(8, 3, 'Bangla1st Paper', '', '', '50', '50', '', '', 'user_from_session', NULL, '2017-01-30 12:33:23', '2017-01-30 12:33:23'),
(9, 3, 'Bangla 2nd Paper', '', '', '50', '50', '', '', 'user_from_session', NULL, '2017-01-30 12:34:15', '2017-01-30 12:34:15'),
(10, 3, 'English 1st Paper', '', '', '100', '', '', '', 'user_from_session', NULL, '2017-01-30 12:37:00', '2017-01-30 12:37:00'),
(11, 3, 'English 2nd Paper', '', '', '100', '', '', '', 'user_from_session', NULL, '2017-01-30 12:37:18', '2017-01-30 12:37:18'),
(12, 3, 'Science', '', '', '40', '35', '25', '', 'user_from_session', NULL, '2017-01-30 12:37:51', '2017-01-30 12:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_names`
--
ALTER TABLE `class_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_names`
--
ALTER TABLE `exam_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_names_exam_types_id_foreign` (`exam_types_id`),
  ADD KEY `exam_names_class_names_id_foreign` (`class_names_id`),
  ADD KEY `exam_names_academic_years_id_foreign` (`academic_years_id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_entries`
--
ALTER TABLE `mark_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_entries_subjects_id_foreign` (`subjects_id`),
  ADD KEY `mark_entries_exam_names_id_foreign` (`exam_names_id`),
  ADD KEY `mark_entries_students_id_foreign` (`students_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `section_names`
--
ALTER TABLE `section_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_names_class_names_id_foreign` (`class_names_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_class_names_id_foreign` (`class_names_id`);

--
-- Indexes for table `student_detaileds`
--
ALTER TABLE `student_detaileds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_detaileds_students_id_foreign` (`students_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_class_names_id_foreign` (`class_names_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_names`
--
ALTER TABLE `class_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_names`
--
ALTER TABLE `exam_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mark_entries`
--
ALTER TABLE `mark_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `section_names`
--
ALTER TABLE `section_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `student_detaileds`
--
ALTER TABLE `student_detaileds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_names`
--
ALTER TABLE `exam_names`
  ADD CONSTRAINT `exam_names_academic_years_id_foreign` FOREIGN KEY (`academic_years_id`) REFERENCES `academic_years` (`id`),
  ADD CONSTRAINT `exam_names_class_names_id_foreign` FOREIGN KEY (`class_names_id`) REFERENCES `class_names` (`id`),
  ADD CONSTRAINT `exam_names_exam_types_id_foreign` FOREIGN KEY (`exam_types_id`) REFERENCES `exam_types` (`id`);

--
-- Constraints for table `mark_entries`
--
ALTER TABLE `mark_entries`
  ADD CONSTRAINT `mark_entries_exam_names_id_foreign` FOREIGN KEY (`exam_names_id`) REFERENCES `exam_names` (`id`),
  ADD CONSTRAINT `mark_entries_students_id_foreign` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `mark_entries_subjects_id_foreign` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `section_names`
--
ALTER TABLE `section_names`
  ADD CONSTRAINT `section_names_class_names_id_foreign` FOREIGN KEY (`class_names_id`) REFERENCES `class_names` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_names_id_foreign` FOREIGN KEY (`class_names_id`) REFERENCES `class_names` (`id`);

--
-- Constraints for table `student_detaileds`
--
ALTER TABLE `student_detaileds`
  ADD CONSTRAINT `student_detaileds_students_id_foreign` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_class_names_id_foreign` FOREIGN KEY (`class_names_id`) REFERENCES `class_names` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
