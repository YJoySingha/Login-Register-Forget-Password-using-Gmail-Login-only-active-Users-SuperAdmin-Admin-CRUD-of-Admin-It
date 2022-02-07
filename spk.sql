-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 06:05 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemUniqueId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `stock`, `itemUniqueId`, `status`, `created_at`, `updated_at`) VALUES
(4, 'banana update', 'banana is good', '90', '100', 'SPK-Item-4', 'available', '2022-02-06 10:00:30', '2022-02-07 04:49:01'),
(5, 'fish', 'fish is high protein', '90', '200', 'SPK-Item-5', 'available', '2022-02-06 13:14:42', '2022-02-06 13:14:42'),
(6, 'fish check', 'fish is high protein', '90', '10', 'SPK-Item-6', 'available', '2022-02-06 13:28:17', '2022-02-06 13:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_05_063302_create_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('sadmin','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `employeeId` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `role`, `employeeId`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'y joy chandra singha12 update', '9686990040', 'angambameetei93+1@gmail.com', 'update 1', 'admin', 'SPK-15', 'inactive', NULL, '$2y$10$LPZgUXRXEWkY3UNwgXSRy.bQnMUr6jY2Sq/qDf9U4QFfZzuxZBJ62', NULL, '2022-02-06 00:39:40', '2022-02-07 04:30:46'),
(16, 'y joy chandra singha22', '9686990051', 'angambameetei93+2@gmail.com', 'here is address update', 'sadmin', 'SPK-16', 'active', NULL, '$2y$10$YLR7CdG4otxxqA7QAXqve.GcMK0Qw5daF1Hk3Lm4J9g9BOaD6ta0y', NULL, '2022-02-06 04:43:35', '2022-02-07 01:43:35'),
(17, 'y joy chandra singha', '9686990041', 'angambameetei93@gmail.com', NULL, 'sadmin', 'SPK-17', 'active', NULL, '$2y$10$qsMbM7yoG0bK2Vmbjs5Lte4vqYCBHgR0qaE4VLsLUtt4vLAdjAlUO', NULL, '2022-02-06 07:54:17', '2022-02-07 05:34:08'),
(18, 'yjoy', '9686990041', 'yjoy@gmail.com', 'here is address from api', 'admin', 'SPK-18', 'active', NULL, '$2y$10$lIZfGSk8VSVWmmfdbjmEdO.YWEfNZp6Nxl7tSbZ2iTOn/K9.QXyhy', NULL, '2022-02-06 13:06:56', '2022-02-07 04:45:38'),
(19, 'yjoy', '9686990041', 'yjoy+1@gmail.com', 'here is address from api', 'admin', 'SPK-19', 'inactive', NULL, '$2y$10$mWPDHDArYBY0GUTdXn7TpOdRAxn95zARB3ZtDNiEaveaD/SiaNYqS', NULL, '2022-02-06 13:27:44', '2022-02-06 13:27:44'),
(20, 'yjoy', '9686990041', 'angambameetei9@gmail.com', NULL, 'admin', 'SPK-20', 'inactive', NULL, '$2y$10$oGCHWnoP0/dZJMpG2WPkOe5KMS5sMRdE4qRkfenCcJ8fM9m73cJ3u', NULL, '2022-02-06 13:35:02', '2022-02-06 13:35:02'),
(21, 'yjoy', '9686990041', 'angambameetei93+4@gmail.com', NULL, 'admin', 'SPK-21', 'inactive', NULL, '$2y$10$i2cPP8FrZ8C7CdrXiHfraOrnyUxYTmR6fcM1xQ/S4UwjB9BZ.QyHq', NULL, '2022-02-06 13:37:51', '2022-02-06 13:37:51'),
(22, 'yjoy', '9686990041', 'angambameetei@gmail.com', NULL, 'admin', 'SPK-22', 'inactive', NULL, '$2y$10$pVOS5uNE64/oeyJ9Z/OpPOueAuJ6sN0iZJUDo9saNkGb7yc8XgUau', NULL, '2022-02-07 04:16:46', '2022-02-07 04:16:46'),
(23, 'y joy chandra singha', '9686990041', 'angambameete@gmail.com', NULL, 'admin', 'SPK-23', 'active', NULL, '$2y$10$ZfNoX2SYdrOiBPitkZ41X.dQwsnRlgMW8RZCf2axxG3iyZAqyGqwS', NULL, '2022-02-07 04:26:56', '2022-02-07 04:26:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
