-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2025 at 05:48 AM
-- Server version: 8.0.43
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Admin-name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Admin-email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Admin-password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint NOT NULL,
  `appointment_date` date NOT NULL,
  `user_id` int NOT NULL,
  `reason_for_visit` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Not Approved',
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_name`, `patient_email`, `phone_number`, `appointment_date`, `user_id`, `reason_for_visit`, `status`, `department`, `city`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'SHEHRIYAL AZIZ', 'shehryal123@gmail.com', 3162830005, '2025-12-25', 6, 'neck pain', 'Approved', NULL, 'karachi', 5, '2025-12-24 07:27:04', '2025-12-25 13:45:13'),
(2, 'yaya', 'yaya34@gmail.com', 3162830565, '2026-04-23', 6, 'salaala', 'Rejected', NULL, 'isl', 5, '2025-12-24 07:35:01', '2025-12-25 13:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `city`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'DHA Main Clinic', 'Karachi', 24.8138000, 67.0305000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(2, 'Clifton Medical Center', 'Karachi', 24.8075000, 67.0290000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(3, 'Gulshan-e-Iqbal Branch', 'Karachi', 24.9180000, 67.0971000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(4, 'Blue Area Clinic', 'Islamabad', 33.7205000, 73.0586000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(5, 'F-10 Markaz Branch', 'Islamabad', 33.6920000, 73.0110000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(6, 'Johar Town Clinic', 'Lahore', 31.4697000, 74.2728000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(7, 'DHA Lahore Branch', 'Lahore', 31.4699000, 74.4100000, '2025-12-26 11:09:13', '2025-12-26 11:09:13'),
(8, 'Lahore Central Clinic', 'lahore', 31.5204000, 74.3587000, '2025-12-26 07:37:35', '2025-12-26 07:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cityname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pakistan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityname`, `countryname`, `created_at`, `updated_at`) VALUES
(1, 'karachi\r\n', 'Pakistan', NULL, NULL),
(2, 'Islamabad', 'Pakistan', NULL, NULL),
(3, 'lahore', 'Pakistan', '2025-12-25 13:21:17', '2025-12-25 13:21:17'),
(4, 'Ralwalpindi', 'Pakistan', '2025-12-25 13:24:55', '2025-12-25 13:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availabilities`
--

DROP TABLE IF EXISTS `doctor_availabilities`;
CREATE TABLE IF NOT EXISTS `doctor_availabilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctor_availabilities_doctor_id_day_of_week_unique` (`doctor_id`,`day_of_week`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_availabilities`
--

INSERT INTO `doctor_availabilities` (`id`, `doctor_id`, `day_of_week`, `start_time`, `end_time`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 5, 'Monday', '09:00:00', '17:00:00', 1, '2025-12-26 14:21:21', '2025-12-26 14:21:21'),
(2, 5, 'Tuesday', '09:00:00', '17:00:00', 1, '2025-12-26 14:21:33', '2025-12-26 14:21:33'),
(3, 5, 'Wednesday', '09:00:00', '17:00:00', 1, '2025-12-26 14:21:33', '2025-12-26 14:21:33'),
(4, 5, 'Thursday', '09:00:00', '17:00:00', 1, '2025-12-26 14:21:33', '2025-12-26 14:21:33'),
(5, 5, 'Friday', '09:00:00', '13:00:00', 1, '2025-12-26 14:21:47', '2025-12-26 14:21:47'),
(6, 5, 'Saturday', '09:00:00', '17:00:00', 0, '2025-12-26 14:21:57', '2025-12-26 14:21:57'),
(7, 5, 'Sunday', '09:00:00', '17:00:00', 0, '2025-12-26 14:21:57', '2025-12-26 14:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_12_092923_add_two_factor_columns_to_users_table', 1),
(5, '2025_12_12_093527_create_personal_access_tokens_table', 1),
(6, '2025_12_23_101652_create_admins_table', 1),
(7, '2025_12_23_101717_create_appointments_table', 1),
(8, '2025_12_23_101751_create_cities_table', 1),
(9, '2025_12_23_101845_create_doctors_table', 1),
(10, '2025_12_23_101927_create_doctor_availabilities_table', 1),
(11, '2025_12_23_101943_create_departments_table', 1),
(12, '2025_12_26_100948_create_branches_table', 2),
(13, '2025_12_26_101149_add_branch_id_to_users_table', 3),
(14, '2025_12_26_112656_add_branch_id_to_users_table', 4),
(15, '2025_12_26_190526_create_doctor_availabilities_table', 5),
(16, '2025_12_27_051646_create_monthly_appointment_reports_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_appointment_reports`
--

DROP TABLE IF EXISTS `monthly_appointment_reports`;
CREATE TABLE IF NOT EXISTS `monthly_appointment_reports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ca1k7x4dBrWGvK29UlfXLVwwpw3c4MuQTXUWY7BF', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTjFoUm5NR1h6Vkc3OWpvSm43cGUxQWNJZWgwdTdMN2hKQXFtNklHQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Eb2N0b3JEYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkMm1pQ2JRZFdBZG1LaWNUNVFUcTdpT1Y0RXJ0RzNENE9nVFREVE11dTdyVFlGZjJMLnJya2kiO3M6MjI6ImRpc21pc3NlZF9hcHBvaW50bWVudHMiO2E6MTp7aTowO2k6Mjt9fQ==', 1766813601),
('D126cXt9dyMbeyB55yoChbNcc7JDjAyhRFqBjbS8', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWRDNmpFOE1zYVBtZFRyWTc3VnY2SHlNOUNZRGtRRWJIc0VJeXowaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Eb2N0b3JEYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkMm1pQ2JRZFdBZG1LaWNUNVFUcTdpT1Y0RXJ0RzNENE9nVFREVE11dTdyVFlGZjJMLnJya2kiO30=', 1766779084);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `doctorstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not provided',
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not provided',
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not provided',
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not provided',
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `stoptime` time DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not provided',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_branch_id_foreign` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `doctorstatus`, `phone`, `specialization`, `cv`, `city`, `branch_id`, `starttime`, `stoptime`, `experience`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'shehryal123@gmail.com', '2025-12-24 06:50:13', '$2y$12$Yxa15nkh/4O8YxXk9RBPReHMtdayW3exnLRytVLKJoT2zX325deiu', NULL, NULL, NULL, 'admin', 'null', 'not provided', 'not provided', 'not provided', 'not provided', NULL, NULL, NULL, 'not provided', NULL, NULL, NULL, '2025-12-24 06:49:42', '2025-12-24 06:50:13'),
(5, 'lala', 'liangsiperfecter@gmail.com', '2025-12-24 07:04:39', '$2y$12$2miCbQdWAdmKicT5QTq7iOV4ErtG3D4OgTTDTMuu7rTYFf2L.rrki', NULL, NULL, NULL, 'doctor', 'accepted', '03278420130', 'mbbs', '1766577922_203007144.png', 'karachi', 1, '17:05:00', '22:10:00', '3', 'F2lrm4uYZUC4pxDrJlDIf7OhRfBXDOfBXJWVe4NzNYcH0HOhwC0ZgaErqHR2', NULL, NULL, '2025-12-24 07:03:55', '2025-12-26 06:36:52'),
(6, 'user', 'shehriyalaziz38@gmail.com', '2025-12-24 07:08:05', '$2y$12$TEe8oJhbIciwN3WnDz7HQu2t7KIGe2Iy7640KXwE3YruIaqwPIdiS', NULL, NULL, NULL, 'user', 'accepted', '03162850005', 'Psychiatry', '1766751187_Luxury Satin Sheet.jpg', 'Islamabad', 4, NULL, NULL, '4', NULL, NULL, NULL, '2025-12-24 07:07:39', '2025-12-26 07:14:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_availabilities`
--
ALTER TABLE `doctor_availabilities`
  ADD CONSTRAINT `doctor_availabilities_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
