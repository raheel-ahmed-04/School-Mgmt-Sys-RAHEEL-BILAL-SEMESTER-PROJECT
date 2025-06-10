-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 06:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-21', 1, '2024-11-24 12:54:44', '2024-11-24 12:54:44'),
(2, 2, '2024-11-21', 1, '2024-11-24 12:54:44', '2024-11-24 12:54:44'),
(3, 3, '2024-11-21', 0, '2024-11-24 12:54:44', '2024-11-24 12:54:44'),
(4, 1, '2024-11-22', 0, '2024-11-24 12:55:00', '2024-11-24 12:55:00'),
(5, 2, '2024-11-22', 1, '2024-11-24 12:55:00', '2024-11-24 12:55:00'),
(6, 3, '2024-11-22', 1, '2024-11-24 12:55:00', '2024-11-24 12:55:00'),
(7, 1, '2024-11-23', 1, '2024-11-24 12:55:20', '2024-11-24 12:55:20'),
(8, 2, '2024-11-23', 1, '2024-11-24 12:55:20', '2024-11-24 12:55:20'),
(9, 3, '2024-11-23', 1, '2024-11-24 12:55:20', '2024-11-24 12:55:20'),
(10, 4, '2024-11-21', 1, '2024-11-24 12:55:45', '2024-11-24 12:55:45'),
(11, 5, '2024-11-21', 0, '2024-11-24 12:55:45', '2024-11-24 12:55:45'),
(12, 4, '2024-11-22', 0, '2024-11-24 12:55:57', '2024-11-24 12:55:57'),
(13, 5, '2024-11-22', 0, '2024-11-24 12:55:57', '2024-11-24 12:55:57'),
(14, 4, '2024-11-23', 1, '2024-11-24 12:56:13', '2024-11-24 12:56:13'),
(15, 5, '2024-11-23', 0, '2024-11-24 12:56:13', '2024-11-24 12:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classnames`
--

CREATE TABLE `classnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classnames`
--

INSERT INTO `classnames` (`id`, `name`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', 1, '2024-11-24 12:45:26', '2024-11-24 12:45:26'),
(2, 'Class 2', 1, '2024-11-24 12:45:37', '2024-11-24 12:45:37'),
(3, 'Class 3', 2, '2024-11-24 12:45:50', '2024-11-24 12:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subjects`
--

INSERT INTO `class_subjects` (`id`, `class_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-24 12:46:13', '2024-11-24 12:46:13'),
(2, 1, 2, '2024-11-24 12:46:13', '2024-11-24 12:46:13'),
(3, 1, 3, '2024-11-24 12:46:13', '2024-11-24 12:46:13'),
(4, 2, 1, '2024-11-24 12:46:26', '2024-11-24 12:46:26'),
(5, 2, 2, '2024-11-24 12:46:26', '2024-11-24 12:46:26'),
(6, 3, 2, '2024-11-24 12:46:34', '2024-11-24 12:46:34'),
(7, 3, 3, '2024-11-24 12:46:34', '2024-11-24 12:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_19_080238_create_subjects_table', 1),
(5, '2024_11_20_065359_create_teachers_table', 1),
(6, '2024_11_20_083816_create_classnames_table', 1),
(7, '2024_11_21_113543_create_class_subjects_table', 1),
(8, '2024_11_21_203953_create_students_table', 1),
(9, '2024_11_21_204116_create_slots_table', 1),
(10, '2024_11_21_210002_create_timetables_table', 1),
(11, '2024_11_23_194329_create_attendances_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UKMDtYHD1QgZrtrLqjyHtGFBsy8t4J5kVW4ksLG2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkI3THE0TFJwWUl0R1RDTTZFYmdCRDdHQ21JMDhzNlVWU041SlJrYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1732471022);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `day`, `time_slot`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '08:00am to 09:00am', NULL, NULL),
(2, 'Monday', '09:00am to 10:00am', NULL, NULL),
(3, 'Monday', '10:00am to 11:00am', NULL, NULL),
(4, 'Monday', '11:00am to 12:00pm', NULL, NULL),
(5, 'Monday', '12:00pm to 01:00pm', NULL, NULL),
(6, 'Tuesday', '08:00am to 09:00am', NULL, NULL),
(7, 'Tuesday', '09:00am to 10:00am', NULL, NULL),
(8, 'Tuesday', '10:00am to 11:00am', NULL, NULL),
(9, 'Tuesday', '11:00am to 12:00pm', NULL, NULL),
(10, 'Tuesday', '12:00pm to 01:00pm', NULL, NULL),
(11, 'Wednesday', '08:00am to 09:00am', NULL, NULL),
(12, 'Wednesday', '09:00am to 10:00am', NULL, NULL),
(13, 'Wednesday', '10:00am to 11:00am', NULL, NULL),
(14, 'Wednesday', '11:00am to 12:00pm', NULL, NULL),
(15, 'Wednesday', '12:00pm to 01:00pm', NULL, NULL),
(16, 'Thursday', '08:00am to 09:00am', NULL, NULL),
(17, 'Thursday', '09:00am to 10:00am', NULL, NULL),
(18, 'Thursday', '10:00am to 11:00am', NULL, NULL),
(19, 'Thursday', '11:00am to 12:00pm', NULL, NULL),
(20, 'Thursday', '12:00pm to 01:00pm', NULL, NULL),
(21, 'Friday', '08:00am to 08:45am', NULL, NULL),
(22, 'Friday', '08:45am to 09:30am', NULL, NULL),
(23, 'Friday', '09:30am to 10:15am', NULL, NULL),
(24, 'Friday', '10:15am to 11:00am', NULL, NULL),
(25, 'Friday', '11:00am to 11:45am', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll_number`, `class_id`, `date_of_birth`, `parent_contact`, `created_at`, `updated_at`) VALUES
(1, 'Hammad', '45678', 1, '2024-11-28', '34567893', '2024-11-24 12:46:57', '2024-11-24 12:46:57'),
(2, 'Ali', '4567800', 1, '2024-11-29', '34567890', '2024-11-24 12:47:24', '2024-11-24 12:47:24'),
(3, 'Hanzalah', '456', 1, '2024-11-21', '34567893', '2024-11-24 12:47:45', '2024-11-24 12:47:45'),
(4, 'MALIK FAIZ UR REHMAN', '456780', 2, '2024-11-06', '34567890', '2024-11-24 12:48:03', '2024-11-24 12:48:03'),
(5, 'Robert', '4', 2, '2024-11-13', '34567890', '2024-11-24 12:48:34', '2024-11-24 12:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `credit_hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `description`, `credit_hours`, `created_at`, `updated_at`) VALUES
(1, 'Math', 'MTH123', 'Mandatory', 2, '2024-11-24 12:42:34', '2024-11-24 12:42:34'),
(2, 'Urdu', 'UR890', 'Mandatory', 3, '2024-11-24 12:42:50', '2024-11-24 12:42:50'),
(3, 'Physic', 'PHY780', 'Mandatory', 3, '2024-11-24 12:43:16', '2024-11-24 12:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject_expertise` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `subject_expertise`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'Sir Maaz', 'maazrehan@gmail.com', 'Math', '03143640000', '2024-11-24 12:44:14', '2024-11-24 12:44:54'),
(2, 'Sir Jamal', 'jamalhussain@gmail.com', 'Urdu', '03448908700', '2024-11-24 12:44:42', '2024-11-24 12:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `class_subject_id`, `teacher_id`, `slot_id`, `room_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '12', '2024-11-24 12:49:06', '2024-11-24 12:49:45'),
(2, 2, 2, 3, '19', '2024-11-24 12:49:20', '2024-11-24 12:49:52'),
(3, 3, 1, 5, '5', '2024-11-24 12:50:11', '2024-11-24 12:50:11'),
(4, 4, 1, 7, '4', '2024-11-24 12:50:32', '2024-11-24 12:51:03'),
(5, 5, 2, 12, '67', '2024-11-24 12:50:54', '2024-11-24 12:50:54'),
(6, 6, 2, 16, '44', '2024-11-24 12:51:23', '2024-11-24 12:51:23'),
(7, 7, 1, 23, '67', '2024-11-24 12:51:45', '2024-11-24 12:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'teacher',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', 'admin', NULL, '$2y$12$ICP8ZtJhyA5QEkao74kw2uRl2PGYoDUO1qiiqnGqaBr0WwEJiEXDC', NULL, '2024-11-24 12:41:51', '2024-11-24 12:41:51'),
(2, 'Maaz Rehan', 'maazrehan@gmail.com', 'teacher', NULL, '$2y$12$hglEecpM34/JRryIxELjWu/30OrtxQMs5XzEcxqgsQt9l3YRYr9FO', NULL, '2024-11-24 12:53:14', '2024-11-24 12:53:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classnames`
--
ALTER TABLE `classnames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classnames_name_unique` (`name`),
  ADD KEY `classnames_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_subjects_class_id_foreign` (`class_id`),
  ADD KEY `class_subjects_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_roll_number_unique` (`roll_number`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`),
  ADD UNIQUE KEY `subjects_code_unique` (`code`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetables_class_subject_id_foreign` (`class_subject_id`),
  ADD KEY `timetables_teacher_id_foreign` (`teacher_id`),
  ADD KEY `timetables_slot_id_foreign` (`slot_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `classnames`
--
ALTER TABLE `classnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classnames`
--
ALTER TABLE `classnames`
  ADD CONSTRAINT `classnames_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classnames` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classnames` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetables_class_subject_id_foreign` FOREIGN KEY (`class_subject_id`) REFERENCES `class_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timetables_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timetables_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
