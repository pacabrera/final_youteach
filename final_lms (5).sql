-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 01:21 AM
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
  `usr_id` int(11) NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `assign_submissions`
--

CREATE TABLE `assign_submissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `assgn_id` int(10) UNSIGNED NOT NULL,
  `usr_id` int(11) NOT NULL,
  `response` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `qr_id` int(10) UNSIGNED NOT NULL,
  `usr_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `qr_id`, `usr_id`, `created_at`, `updated_at`) VALUES
(17, 1, 123456, '2019-01-14 17:23:11', '2019-01-14 17:23:11');

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
(1, '2019-01-15 00:25:34R6wjUu', 'zeAGC', '2019-01-14 16:25:34', '2019-01-14 16:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 200, 'created', 'App\\Post', 1, '[]', '{\"thread_id\":1,\"usr_id\":200,\"body\":\"<p>ASasAS<\\/p>\",\"id\":1}', 'http://127.0.0.1:8000/post?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', NULL, '2019-01-14 01:22:12', '2019-01-14 01:22:12'),
(2, 'App\\User', 200, 'created', 'App\\Post', 2, '[]', '{\"thread_id\":2,\"usr_id\":200,\"body\":\"<p>asdasd<\\/p>\",\"id\":2}', 'http://127.0.0.1:8000/post?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', NULL, '2019-01-14 01:22:59', '2019-01-14 01:22:59'),
(3, 'App\\User', 200, 'created', 'App\\Post', 3, '[]', '{\"thread_id\":3,\"usr_id\":200,\"body\":\"Quiz on HTML5_WD-101\",\"id\":3}', 'http://127.0.0.1:8000/teacher/quiz/zeAGC?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', NULL, '2019-01-14 16:05:51', '2019-01-14 16:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` int(11) NOT NULL,
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
('zeAGC', 200, 1, 1, 'HTML5_WD-101', 1, '2019-01-14 01:21:21', '2019-01-14 01:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `class_members`
--

CREATE TABLE `class_members` (
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `isCalled` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_members`
--

INSERT INTO `class_members` (`class_id`, `student_id`, `isCalled`, `created_at`, `updated_at`) VALUES
('zeAGC', 20479634, '1', '2019-01-14 14:07:30', '2019-01-14 15:51:12'),
('zeAGC', 123456, '0', '2019-01-14 16:21:17', '2019-01-14 16:21:17');

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
(1, 'Sample', '1', '1', '#000000', '2019-01-14 17:35:53', '2019-01-24 17:35:53', '2019-01-14 09:38:11', '2019-01-14 09:38:11'),
(2, 'Sample Event', 'Event vadsf', 'asdfasdf', '#000000', '2019-01-14 17:40:32', '2019-01-14 16:45:32', '2019-01-14 09:41:48', '2019-01-14 09:41:48'),
(4, 'asdasd', 'asd', 'asd', '#00ff00', '2019-01-17 17:35:37', '2019-01-16 17:55:37', '2019-01-14 09:42:53', '2019-01-14 09:42:53'),
(5, 'asdasd', 'asd', 'asd', '#00ff00', '2019-01-17 17:35:37', '2019-01-16 17:55:37', '2019-01-14 09:42:53', '2019-01-14 09:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(10) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_categories`
--

CREATE TABLE `grade_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_categories`
--

INSERT INTO `grade_categories` (`id`, `type`) VALUES
(4, 'Recitation');

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
(22, '2019_01_09_102745_create_attendance_qrs_table', 1),
(23, '2019_01_09_102926_create_attendances_table', 1),
(24, '2019_01_10_203957_create_events_table', 1),
(25, '2019_01_10_222521_create_grade_categories_table', 1),
(27, '2019_01_12_022747_create_audits_table', 1),
(28, '2019_01_13_160900_create_notifications_table', 1),
(29, '2019_01_14_222956_create_schedules_table', 2),
(30, '2019_01_10_222823_create_grades_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `usr_id` int(11) NOT NULL,
  `thread_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `body`, `usr_id`, `thread_id`) VALUES
(1, '2019-01-14 01:22:11', '2019-01-14 01:22:11', '<p>ASasASdddd</p>', 200, 1),
(2, '2019-01-14 01:22:59', '2019-01-14 01:22:59', '<p>asdasd</p>', 200, 2),
(3, '2019-01-14 16:05:51', '2019-01-14 16:05:51', 'Quiz on HTML5_WD-101', 200, 3);

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
(1, 'Sample Quiz Post', '2019-01-14 16:05:51', '2019-01-14 16:05:51');

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
(1, 1, 'True or False', 3, '', '1', 5),
(2, 1, 'Sample identification question', 1, '', 'answer', 10),
(3, 1, 'Fruits', 2, 'apple;ball;pen;mouse', '1', 5);

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
(1, 'Sample Quiz Post', 1, 'zeAGC', 1, '2019-01-14 16:05:51', '2019-01-14 16:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_answers`
--

CREATE TABLE `quiz_student_answers` (
  `student_id` int(11) NOT NULL,
  `quiz_event_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `student_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_student_answers`
--

INSERT INTO `quiz_student_answers` (`student_id`, `quiz_event_id`, `question_id`, `student_answer`) VALUES
(20479634, 1, 2, 'answer'),
(20479634, 1, 3, '1'),
(20479634, 1, 1, '1'),
(123456, 1, 2, 'xd'),
(123456, 1, 3, '2'),
(123456, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_score`
--

CREATE TABLE `quiz_student_score` (
  `student_id` int(11) NOT NULL,
  `quiz_event_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `recorded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_student_score`
--

INSERT INTO `quiz_student_score` (`student_id`, `quiz_event_id`, `score`, `recorded_on`) VALUES
(20479634, 1, 20, '2019-01-14 16:15:09'),
(123456, 1, 5, '2019-01-14 16:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `class_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'WD-101', '2019-01-14 01:20:59', '2019-01-14 01:20:59');

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
(1, 'HTML5', 'basic of html');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_id` int(11) NOT NULL,
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
(1, 'Sample', 200, 'zeAGC', NULL, NULL, '2019-01-14 01:22:11', '2019-01-14 01:22:11'),
(2, 'sadas', 200, 'zeAGC', NULL, NULL, '2019-01-14 01:22:59', '2019-01-14 01:22:59'),
(3, 'Sample Quiz Post', 200, 'zeAGC', NULL, 1, '2019-01-14 16:05:51', '2019-01-14 16:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `permissions`, `remember_token`, `created_at`, `updated_at`) VALUES
(100, '$2y$10$YduIfIgB8rybDZNzIuwkEeqNoHyJAFSufPL2r8ej1ItaR3M.d4iTm', 0, '69zyEJHjSJ5GeNZTWukG5VSDKASOgu6eqOyZZ8JY0yTwspZ3Wg0SlxtnAAy0', '2019-01-14 01:03:38', '2019-01-14 01:03:38'),
(200, '$2y$10$woU.puUivWv4gc2u6f0YJ.LpxgF5pxyYX0Rref4AoG3RGUJmsmCmS', 1, 'AYEB1OFf1SobyS0xAFgfPri9MRv1rb7sCMBzXfIgeK2tT5haccqoF4LWKdrh', '2019-01-14 01:18:21', '2019-01-14 01:18:21'),
(123456, '$2y$10$w1ppDU9VbgLF0VNWM96UQePijg0WzN7vfcs27sW9zcZtYy7Q4oFzW', 2, NULL, '2019-01-14 16:20:49', '2019-01-14 16:20:49'),
(20479634, '$2y$10$9buEKj7QTibiEY4yZy06YuRey1DIOwvhCcOtg.xx6kk1YbBE6J4PK', 2, 'PnqfHNC00v4rBF3WlCH3eHKeDp9zkLASR1bFHqjLcwiiM6NtRWtszOl6dyEk', '2019-01-14 14:07:09', '2019-01-14 14:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `given_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `given_name`, `family_name`, `middle_name`, `ext_name`, `gender`, `created_at`, `updated_at`, `profile_pic`) VALUES
(100, 'Admin', 'Admin', 'Admin', NULL, 'Male', '2019-01-14 01:03:39', '2019-01-14 01:03:39', 'no-profile.png'),
(200, 'Teacher', 'Teacher', 'M', NULL, 'Male', '2019-01-14 01:18:21', '2019-01-14 01:18:21', 'no-profile.png'),
(20479634, 'Paul Andrey', 'Cabrera', 'Miranda', NULL, 'Male', '2019-01-14 14:07:09', '2019-01-14 14:07:09', 'no-profile.png'),
(123456, 'Sample', 'Sample', 'M.', NULL, 'Male', '2019-01-14 16:20:49', '2019-01-14 16:20:49', 'no-profile.png');

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
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_class_id_foreign` (`class_id`);

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
  ADD UNIQUE KEY `users_id_unique` (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_files`
--
ALTER TABLE `assign_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_submissions`
--
ALTER TABLE `assign_submissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_submission_files`
--
ALTER TABLE `assign_submission_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `attendance_qrs`
--
ALTER TABLE `attendance_qrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade_categories`
--
ALTER TABLE `grade_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `questionnaire_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz_events`
--
ALTER TABLE `quiz_events`
  MODIFY `quiz_event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
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
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`) ON DELETE CASCADE;

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
