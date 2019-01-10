-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 04:15 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `title`, `body`, `deadline`, `usr_id`, `class_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'xd', 'xd', '2019-01-10 22:40:13', 2, '8AJyH', 1, '2019-01-10 14:40:38', '2019-01-10 15:00:17'),
(2, 'Sample', 'xd', '2019-01-11 22:55:47', 2, '8AJyH', 0, '2019-01-10 14:42:04', '2019-01-10 14:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `assign_files`
--

CREATE TABLE `assign_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assgn_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_files`
--

INSERT INTO `assign_files` (`id`, `file`, `created_at`, `updated_at`, `assgn_id`) VALUES
(1, 'download (2).png', '2019-01-10 14:40:39', '2019-01-10 14:40:39', 1),
(2, 'download (2).png', '2019-01-10 14:42:04', '2019-01-10 14:42:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `assign_submissions`
--

CREATE TABLE `assign_submissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `assgn_id` int(10) UNSIGNED NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `response` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_submissions`
--

INSERT INTO `assign_submissions` (`id`, `assgn_id`, `usr_id`, `response`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'xd', '2019-01-10 14:42:20', '2019-01-10 14:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `assign_submission_files`
--

CREATE TABLE `assign_submission_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_submission_files`
--

INSERT INTO `assign_submission_files` (`id`, `file`, `created_at`, `updated_at`, `submission_id`) VALUES
(1, 'download (2).png', '2019-01-10 14:42:21', '2019-01-10 14:42:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `qr_id` int(10) UNSIGNED NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `string` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `qr_id`, `usr_id`, `created_at`, `updated_at`, `string`) VALUES
(1, 18, 3, '2019-01-09 06:08:54', '2019-01-09 06:08:54', ''),
(4, 18, 3, '2019-01-09 07:08:10', '2019-01-09 07:08:10', ''),
(5, 18, 3, '2019-01-09 07:09:32', '2019-01-09 07:09:32', ''),
(6, 18, 3, '2019-01-09 07:10:39', '2019-01-09 07:10:39', 'kDZa27'),
(7, 18, 3, '2019-01-09 07:16:20', '2019-01-09 07:16:20', 'kDZa27'),
(8, 18, 3, '2019-01-09 07:17:07', '2019-01-09 07:17:07', 'kDZa27'),
(9, 18, 3, '2019-01-09 07:18:17', '2019-01-09 07:18:17', 'kDZa27'),
(10, 18, 3, '2019-01-09 07:21:24', '2019-01-09 07:21:24', 'kDZa27'),
(11, 18, 3, '2019-01-09 07:21:48', '2019-01-09 07:21:48', 'kDZa27'),
(12, 18, 3, '2019-01-09 07:22:17', '2019-01-09 07:22:17', 'kDZa27'),
(13, 18, 3, '2019-01-09 07:22:29', '2019-01-09 07:22:29', 'kDZa27'),
(14, 18, 3, '2019-01-09 07:24:01', '2019-01-09 07:24:01', 'kDZa27');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_qrs`
--

CREATE TABLE `attendance_qrs` (
  `id` int(10) UNSIGNED NOT NULL,
  `qrcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_qrs`
--

INSERT INTO `attendance_qrs` (`id`, `qrcode`, `class_id`, `created_at`, `updated_at`) VALUES
(18, 'kDZa27', '8AJyH', '2019-01-09 03:41:31', '2019-01-09 03:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `class_active` tinyint(1) NOT NULL,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `instructor_id`, `subject_id`, `class_active`, `class_name`, `section_id`, `created_at`, `updated_at`) VALUES
('8AJyH', 2, 2, 1, 'HTML5_WD-101', 1, '2019-01-07 14:25:44', '2019-01-07 14:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_members`
--

CREATE TABLE `class_members` (
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `isCalled` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_members`
--

INSERT INTO `class_members` (`class_id`, `student_id`, `isCalled`, `created_at`, `updated_at`) VALUES
('8AJyH', 3, '0', '2019-01-07 15:06:17', '2019-01-10 15:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `venue`, `description`, `color`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Sample', 'SJH', 'Sample Event DescriptionSample Event DescriptionSample Event Description Sample Event DescriptionSample Event Descriptio nSample Event DescriptionSample Event DescriptionSample Event \n D escription', '#000000', '2019-01-20 10:35:37', '2019-01-21 23:55:37', '2019-01-10 14:33:06', '2019-01-10 14:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(10) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradeCategory` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `usr_id`, `class_id`, `gradeCategory`, `created_at`, `updated_at`) VALUES
(1, 5, 3, '8AJyH', 4, '2019-01-10 15:00:03', '2019-01-10 15:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `grade_categories`
--

CREATE TABLE `grade_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_06_081932_create_user_profiles_table', 1),
(4, '2019_01_06_082137_create_school_years_table', 1),
(5, '2019_01_06_082250_create_subjects_table', 1),
(6, '2019_01_06_082357_create_sections_table', 1),
(7, '2019_01_06_082429_create_klases_table', 1),
(8, '2019_01_06_082513_create_class_members_table', 1),
(9, '2019_01_06_082514_create_assignments_table', 1),
(10, '2019_01_06_082515_create_assign_files_table', 1),
(11, '2019_01_06_082516_create_assign_submissions_table', 1),
(12, '2019_01_06_082517_create_assign_submission_files_table', 1),
(13, '2019_01_07_221015_create_questionnaires_table', 1),
(14, '2019_01_07_221158_create_questions_table', 1),
(15, '2019_01_07_221243_create_quiz_events_table', 1),
(16, '2019_01_07_221311_create_student_answers_table', 1),
(17, '2019_01_07_221440_create_student_scores_table', 1),
(18, '2019_01_07_221441_create_threads_table', 1),
(19, '2019_01_07_221442_create_posts_table', 1),
(20, '2019_01_07_221443_create_post_files_table', 1),
(21, '2019_01_07_221446_create_post_images_table', 1),
(22, '2019_01_09_102745_create_attendance_qrs_table', 2),
(23, '2019_01_09_102926_create_attendances_table', 3),
(27, '2019_01_10_222521_create_grade_categories_table', 5),
(28, '2019_01_10_222823_create_grades_table', 5),
(29, '2019_01_10_203957_create_events_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `body`, `usr_id`, `thread_id`) VALUES
(3, '2019-01-07 15:00:45', '2019-01-07 15:00:45', 'Quiz on HTML5_WD-101', 2, 3),
(4, '2019-01-07 15:03:19', '2019-01-07 15:03:19', 'Quiz on HTML5_WD-101', 2, 4),
(5, '2019-01-07 15:04:36', '2019-01-07 15:04:36', 'Quiz on HTML5_WD-101', 2, 5),
(6, '2019-01-10 14:40:39', '2019-01-10 14:40:39', 'xd', 2, 6),
(7, '2019-01-10 14:42:04', '2019-01-10 14:42:04', 'xd', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `questionnaire_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`questionnaire_id`, `questionnaire_name`, `created_at`, `updated_at`) VALUES
(1, 'Sample', '2019-01-07 14:27:23', '2019-01-07 14:27:23'),
(2, 'Sample Quiz Post', '2019-01-07 14:39:59', '2019-01-07 14:39:59'),
(3, 'Sample Quiz Post', '2019-01-07 14:40:24', '2019-01-07 14:40:24'),
(4, 'xd', '2019-01-07 14:48:34', '2019-01-07 14:48:34'),
(5, 'Sample Quiz Post', '2019-01-07 15:00:45', '2019-01-07 15:00:45'),
(6, 'Sample Quiz Post', '2019-01-07 15:03:19', '2019-01-07 15:03:19'),
(7, 'Sample Quiz Post', '2019-01-07 15:04:36', '2019-01-07 15:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(10) UNSIGNED NOT NULL,
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `question_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` int(11) NOT NULL,
  `choices` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `questionnaire_id`, `question_name`, `question_type`, `choices`, `answer`, `points`) VALUES
(1, 1, 'xd', 1, '', 'xd', 1),
(2, 1, 'xddd', 2, 'a;b;c;d', '2', 1),
(3, 2, 'xd', 3, '', '1', 1),
(4, 3, 'xd', 3, '', '1', 1),
(5, 4, 'xd', 3, '', '1', 1),
(6, 5, 'XD', 3, '', '1', 1),
(7, 6, 'zs', 3, '', '1', 1),
(8, 7, 'xd', 3, '', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_events`
--

CREATE TABLE `quiz_events` (
  `quiz_event_id` int(10) UNSIGNED NOT NULL,
  `quiz_event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionnaire_id` int(10) UNSIGNED NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_event_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_events`
--

INSERT INTO `quiz_events` (`quiz_event_id`, `quiz_event_name`, `questionnaire_id`, `class_id`, `quiz_event_status`, `created_at`, `updated_at`) VALUES
(1, 'Sample', 1, '8AJyH', 0, '2019-01-07 14:27:24', '2019-01-07 14:27:24'),
(2, 'Sample Quiz Post', 2, '8AJyH', 0, '2019-01-07 14:39:59', '2019-01-07 14:39:59'),
(3, 'Sample Quiz Post', 3, '8AJyH', 0, '2019-01-07 14:40:24', '2019-01-07 14:40:24'),
(4, 'xd', 4, '8AJyH', 0, '2019-01-07 14:48:34', '2019-01-07 14:48:34'),
(5, 'Sample Quiz Post', 5, '8AJyH', 0, '2019-01-07 15:00:45', '2019-01-07 15:00:45'),
(6, 'Sample Quiz Post', 6, '8AJyH', 0, '2019-01-07 15:03:19', '2019-01-07 15:03:19'),
(7, 'Sample Quiz Post', 7, '8AJyH', 1, '2019-01-07 15:04:36', '2019-01-10 14:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_answers`
--

CREATE TABLE `quiz_student_answers` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `quiz_event_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `student_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_score`
--

CREATE TABLE `quiz_student_score` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `quiz_event_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `recorded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `yearStart` date NOT NULL,
  `yearEnd` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `created_at`, `updated_at`) VALUES
(1, 'WD-101', '2019-01-07 14:24:45', '2019-01-07 14:24:45'),
(2, '$2y$10$fdt9CVor.TYEzSTmIxH22eEqRaySA3iXdpGN2Qrp6TzCZEWQlAB/W', '2019-01-09 06:53:20', '2019-01-09 06:53:20'),
(3, '$2y$10$fdt9CVor.TYEzSTmIxH22eEqRaySA3iXdpGN2Qrp6TzCZEWQlAB/W', '2019-01-09 06:59:52', '2019-01-09 06:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_desc`) VALUES
(2, 'HTML5', 'basic of html');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_id` int(10) UNSIGNED NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_id` int(10) UNSIGNED DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title`, `usr_id`, `class_id`, `assign_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(3, 'Sample Quiz Post', 2, '8AJyH', NULL, NULL, '2019-01-07 15:00:45', '2019-01-07 15:00:45'),
(4, 'Sample Quiz Post', 2, '8AJyH', NULL, NULL, '2019-01-07 15:03:19', '2019-01-07 15:03:19'),
(5, 'Sample Quiz Post', 2, '8AJyH', NULL, 7, '2019-01-07 15:04:36', '2019-01-07 15:04:36'),
(6, 'xd', 2, '8AJyH', 1, NULL, '2019-01-10 14:40:39', '2019-01-10 14:40:39'),
(7, 'Sample', 2, '8AJyH', 2, NULL, '2019-01-10 14:42:04', '2019-01-10 14:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usr`, `password`, `permissions`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '$2y$10$I5WE4LOOEVsRUqRw8e64E.pfZl7QuMYR6RQByQfNlFPp4jzVC76Lq', 0, 'Erx32XVNjaiDciibkDMamU5TzFAuMrZrcUR8KRzr9wx9bn2pz3QJ6C7m3nQ7', '2019-01-07 14:22:14', '2019-01-07 14:22:14'),
(2, 'Teacher', '$2y$10$1yjNb8vUpsjGpzER8el/q.pBQc4D/2z8M18/0zSaxzSkFS1.opK16', 1, 'kV17afIEKz1IVA7xmCMMrsyqX3zMZxfQU2H6HR9JLrAZAhYfb6RJaSnNWIul', '2019-01-07 14:23:26', '2019-01-07 14:23:26'),
(3, 'Student', '$2y$10$oWMmpLgGvsibLbUcrf.geuSwiZNEJO5oecj4MkViGMbDzRPogYfu.', 2, 'cDBOZYEKh5arYVptvHy3zR1PELbHmumfShwgNM3qFz00W8B15DfAbnrWvidC', '2019-01-07 15:06:00', '2019-01-07 15:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `given_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `given_name`, `family_name`, `middle_name`, `ext_name`, `created_at`, `updated_at`, `profile_pic`) VALUES
(1, 'Admin', 'Admin', 'Admin', NULL, '2019-01-07 14:22:16', '2019-01-07 14:22:16', 'no-profile.png'),
(2, 'John', 'Doe', 'A.', NULL, '2019-01-07 14:23:26', '2019-01-07 14:23:26', 'no-profile.png'),
(3, 'Paul', 'Cabrera', 'M', NULL, '2019-01-07 15:06:00', '2019-01-07 15:06:00', 'no-profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_usr_id_foreign` (`usr_id`),
  ADD KEY `assignments_class_id_foreign` (`class_id`);

--
-- Indexes for table `assign_files`
--
ALTER TABLE `assign_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_files_assgn_id_foreign` (`assgn_id`);

--
-- Indexes for table `assign_submissions`
--
ALTER TABLE `assign_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_submissions_usr_id_foreign` (`usr_id`),
  ADD KEY `assign_submissions_assgn_id_foreign` (`assgn_id`);

--
-- Indexes for table `assign_submission_files`
--
ALTER TABLE `assign_submission_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_submission_files_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_usr_id_foreign` (`usr_id`),
  ADD KEY `attendances_qr_id_foreign` (`qr_id`);

--
-- Indexes for table `attendance_qrs`
--
ALTER TABLE `attendance_qrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_qrs_class_id_foreign` (`class_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `classes_instructor_id_foreign` (`instructor_id`),
  ADD KEY `classes_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `class_members`
--
ALTER TABLE `class_members`
  ADD KEY `class_members_student_id_foreign` (`student_id`),
  ADD KEY `class_members_class_id_foreign` (`class_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grades_usr_id_foreign` (`usr_id`),
  ADD KEY `grades_class_id_foreign` (`class_id`);

--
-- Indexes for table `grade_categories`
--
ALTER TABLE `grade_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_usr_id_foreign` (`usr_id`),
  ADD KEY `posts_thread_id_foreign` (`thread_id`);

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_files_post_id_foreign` (`post_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_images_post_id_foreign` (`post_id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`questionnaire_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_questionnaire_id_foreign` (`questionnaire_id`);

--
-- Indexes for table `quiz_events`
--
ALTER TABLE `quiz_events`
  ADD PRIMARY KEY (`quiz_event_id`),
  ADD KEY `quiz_events_class_id_foreign` (`class_id`),
  ADD KEY `quiz_events_questionnaire_id_foreign` (`questionnaire_id`);

--
-- Indexes for table `quiz_student_answers`
--
ALTER TABLE `quiz_student_answers`
  ADD KEY `quiz_student_answers_student_id_foreign` (`student_id`),
  ADD KEY `quiz_student_answers_quiz_event_id_foreign` (`quiz_event_id`),
  ADD KEY `quiz_student_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `quiz_student_score`
--
ALTER TABLE `quiz_student_score`
  ADD KEY `quiz_student_score_student_id_foreign` (`student_id`),
  ADD KEY `quiz_student_score_quiz_event_id_foreign` (`quiz_event_id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threads_usr_id_foreign` (`usr_id`),
  ADD KEY `threads_class_id_foreign` (`class_id`),
  ADD KEY `threads_assign_id_foreign` (`assign_id`),
  ADD KEY `threads_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usr_unique` (`usr`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD KEY `user_profiles_id_foreign` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assign_files`
--
ALTER TABLE `assign_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assign_submissions`
--
ALTER TABLE `assign_submissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_submission_files`
--
ALTER TABLE `assign_submission_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `attendance_qrs`
--
ALTER TABLE `attendance_qrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade_categories`
--
ALTER TABLE `grade_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `questionnaire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `quiz_events`
--
ALTER TABLE `quiz_events`
  MODIFY `quiz_event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `assign_files`
--
ALTER TABLE `assign_files`
  ADD CONSTRAINT `assign_files_assgn_id_foreign` FOREIGN KEY (`assgn_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assign_submissions`
--
ALTER TABLE `assign_submissions`
  ADD CONSTRAINT `assign_submissions_assgn_id_foreign` FOREIGN KEY (`assgn_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_submissions_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `assign_submission_files`
--
ALTER TABLE `assign_submission_files`
  ADD CONSTRAINT `assign_submission_files_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `assign_submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_qr_id_foreign` FOREIGN KEY (`qr_id`) REFERENCES `attendance_qrs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `attendance_qrs`
--
ALTER TABLE `attendance_qrs`
  ADD CONSTRAINT `attendance_qrs_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `class_members`
--
ALTER TABLE `class_members`
  ADD CONSTRAINT `class_members_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_members_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `grades_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_thread_id_foreign` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_files`
--
ALTER TABLE `post_files`
  ADD CONSTRAINT `post_files_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`questionnaire_id`);

--
-- Constraints for table `quiz_events`
--
ALTER TABLE `quiz_events`
  ADD CONSTRAINT `quiz_events_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_events_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`questionnaire_id`);

--
-- Constraints for table `quiz_student_answers`
--
ALTER TABLE `quiz_student_answers`
  ADD CONSTRAINT `quiz_student_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `quiz_student_answers_quiz_event_id_foreign` FOREIGN KEY (`quiz_event_id`) REFERENCES `quiz_events` (`quiz_event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_student_answers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `quiz_student_score`
--
ALTER TABLE `quiz_student_score`
  ADD CONSTRAINT `quiz_student_score_quiz_event_id_foreign` FOREIGN KEY (`quiz_event_id`) REFERENCES `quiz_events` (`quiz_event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_student_score_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_assign_id_foreign` FOREIGN KEY (`assign_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `threads_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `threads_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quiz_events` (`quiz_event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `threads_usr_id_foreign` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
