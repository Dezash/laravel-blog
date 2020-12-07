-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 12:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` enum('REJECTED','SUBMITTED','APPROVED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SUBMITTED',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author_id`, `title`, `body`, `category_id`, `nature`, `reviewer_id`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 'asd2', 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'asda', 1, 'APPROVED', '2020-11-23 04:54:26', '2020-12-06 17:04:24'),
(2, 1, 'qwewqrqw', '<h1>BIG HEADING</h1><p><br></p><p>my <strong>content </strong>he<s>re</s> ... <u>underlined text </u> not a<a href=\"https://www.google.com\" target=\"_blank\">nym</a>ore</p><ol><li><span class=\"ql-size-huge\">one</span><sup>2</sup></li><li><span style=\"background-color: rgb(0, 138, 0);\">two</span><sub>e</sub></li><li><span style=\"color: rgb(230, 0, 0);\">three</span></li></ol><p><br></p><pre class=\"ql-syntax\" spellcheck=\"false\">function(a, b) {\n  return a + b;\n}\n</pre><p><br></p><p><br></p>', 1, 'sadas', 1, 'APPROVED', '2020-11-23 05:54:44', '2020-12-06 20:28:34'),
(3, 1, 'test', '<p>WWWWWWWWWWW WWWWWW<strong>W</strong>WWWWWWWWWWWWWWW WWWWW<u>WWW</u>WWWWWWWWWWWWW WWW<em>W</em>WWWWWWWWWWWWWWWWWWWWW WWWWWWWWWWWWWWWWWW</p>', 3, 'test_pobudis', NULL, 'SUBMITTED', '2020-12-05 22:34:49', '2020-12-06 02:13:24'),
(4, 1, 'gWW', '<p>dfgdfgdffghfghfghfghfghfghfghfghfghfghfghfgWWWW</p>', 4, 'fghfg', 1, 'REJECTED', '2020-12-06 02:55:21', '2020-12-06 04:35:41'),
(5, 1, 'Donec et nibh nisl', '<p><span style=\"background-color: rgb(255, 255, 255);\">Donec et nibh nisl. Proin tincidunt nulla viverra nisl sollicitudin pretium. Ut quis odio non eros sodales dapibus ac id leo. Aliquam feugiat, augue et varius suscipit, velit turpis mattis risus, eget dapibus lacus nisi nec dui. Curabitur ornare quam in odio finibus ultrices. Donec dui massa, ullamcorper vel dictum vel, vulputate id mi. Donec commodo ipsum a efficitur dignissim. Integer sed consectetur ligula. Vestibulum sed dapibus est, at imperdiet dolor. Nulla eu nulla fringilla libero lobortis aliquet. Nunc sollicitudin et ante ac pellentesque. Vestibulum at tempus neque, in sodales enim. Fusce vel ligula efficitur, vulputate libero et, hendrerit erat. Nam vulputate mi turpis, vel dapibus dui ullamcorper id. Mauris quis tristique nulla. Cras erat est, eleifend sit amet bibendum ut, condimentum at leo.</span></p>', 5, 'lorem', 1, 'APPROVED', '2020-12-06 02:55:50', '2020-12-06 02:57:02'),
(6, 1, 'Suspendisse blandit', '<p><span style=\"background-color: rgb(255, 255, 255);\">Suspendisse blandit bibendum lacus, a ultrices magna convallis sed. In aliquet mauris sit amet tellus vehicula tincidunt sed vitae lorem. Vivamus viverra turpis velit, in pharetra libero pretium ut. Phasellus scelerisque ullamcorper lacus. In porttitor at ante id lobortis. Phasellus aliquet luctus justo sit amet ornare. Etiam mollis nisl consectetur, rutrum tellus nec, semper mi. Etiam a nulla ultrices tellus interdum mollis non in libero. Morbi ac est at est iaculis lacinia.</span></p>', 5, 'lorem', 1, 'APPROVED', '2020-12-06 02:56:23', '2020-12-06 02:57:05'),
(7, 1, 'Pellentesque imperdiet', '<p><span style=\"background-color: rgb(255, 255, 255);\">Pellentesque imperdiet massa sed erat viverra interdum. Curabitur vitae massa mollis, vestibulum neque eget, sagittis ex. Sed porta elit nec nulla molestie, lobortis ultricies leo pulvinar. Nam gravida nulla in enim aliquet, et lacinia enim mattis. Proin sit amet ligula orci. Etiam egestas purus at congue pellentesque. Cras quam leo, cursus id pretium vel, congue at urna. Suspendisse mollis enim sit amet semper scelerisque.</span></p>', 5, 'Pellentesque', 1, 'APPROVED', '2020-12-06 02:56:53', '2020-12-06 02:57:06'),
(8, 1, 'Nunc eleifen', '<p><strong style=\"background-color: rgb(255, 255, 255);\">Nunc</strong><span style=\"background-color: rgb(255, 255, 255);\"> eleifend ante id aliquet tristique. Integer in tortor non mi pharetra maximus. Praesent eleifend tortor ac libero placerat, nec fermentum libero tincidunt. Phasellus ligula mauris, vehicula a lacus at, rhoncus venenatis turpis. Maecenas sed maximus neque. Nam nulla ex, posuere quis lacinia vitae, eleifend non turpis. Etiam in laoreet ante. Donec sit amet lacinia velit. Nullam maximus pellentesque vestibulum. Phasellus interdum rhoncus faucibus. In vestibulum accumsan fringilla. Suspendisse et erat ex. Cras vehicula leo et molestie consequat. Sed feugiat mauris sem, gravida porta neque cursus vitae.</span></p>', 5, 'lorem', 1, 'APPROVED', '2020-12-06 02:57:34', '2020-12-06 03:01:58'),
(9, 1, 'test', '<p>dfgdfgdfgdfWWWWWWWWWWWWWWWWWWW <strong>WWWWWWWWWWWWWWWWWWWWW</strong></p>', 1, 'sdf', 1, 'REJECTED', '2020-12-06 03:11:56', '2020-12-06 04:32:41'),
(10, 4, 'autoriaus straipsnis', '<p><strong class=\"ql-font-monospace\">Verslo</strong><strong> <u>naujiena</u>!!</strong></p>', 1, 'verslas', 1, 'REJECTED', '2020-12-06 16:50:28', '2020-12-06 19:35:07'),
(11, 1, 'Etiam id', '<p><span style=\"background-color: rgb(255, 255, 255);\">Etiam id tempor enim. Fusce libero dui, egestas nec ex et, vulputate dignissim lectus. Proin sed lorem in turpis porttitor tempus eu quis quam. Cras quis ultrices massa, sit amet interdum nunc. Donec tincidunt lacinia ultrices. Proin facilisis pulvinar diam non iaculis. Nunc dictum tristique enim. Quisque sed sapien ac dui tincidunt semper.</span></p>', 1, 'lorem', 1, 'APPROVED', '2020-12-06 17:07:37', '2020-12-06 17:50:25'),
(12, 4, 'asfasf', '<p>dfgdfgdf WWWWWWWWWW WWWWWWWWWWWWWWW WWWWWWWWWWWWWW</p>', 1, 'sdgdfg', NULL, 'SUBMITTED', '2020-12-06 17:21:02', '2020-12-06 17:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Verslas', NULL, NULL),
(2, 'Sportas', NULL, NULL),
(3, 'Politika', NULL, NULL),
(4, 'Technologija', NULL, NULL),
(5, 'Kultūra', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `blog_id`, `created_at`, `updated_at`) VALUES
(1, 'zzz', 1, '2020-11-23 04:54:26', '2020-11-23 04:54:26'),
(4, 'raktazodis1', 2, '2020-12-04 10:53:10', '2020-12-04 10:53:10'),
(5, 'raktazodis 3', 2, '2020-12-04 10:53:10', '2020-12-04 10:53:10'),
(6, 'test', 3, '2020-12-05 22:34:49', '2020-12-05 22:34:49'),
(7, 'donec', 5, '2020-12-06 02:55:50', '2020-12-06 02:55:50'),
(8, 'Suspendisse', 6, '2020-12-06 02:56:23', '2020-12-06 02:56:23'),
(9, 'lorem', 6, '2020-12-06 02:56:23', '2020-12-06 02:56:23'),
(10, 'lorem', 7, '2020-12-06 02:56:53', '2020-12-06 02:56:53'),
(11, 'Pellentesque', 7, '2020-12-06 02:56:53', '2020-12-06 02:56:53'),
(12, 'lorem', 8, '2020-12-06 02:57:34', '2020-12-06 02:57:34'),
(13, 'nunc', 8, '2020-12-06 02:57:34', '2020-12-06 02:57:34'),
(14, 'verslas', 10, '2020-12-06 16:50:28', '2020-12-06 16:50:28'),
(15, 'naujienos', 10, '2020-12-06 16:50:28', '2020-12-06 16:50:28'),
(16, 'lorem', 11, '2020-12-06 17:07:37', '2020-12-06 17:07:37'),
(17, 'etiam', 11, '2020-12-06 17:07:37', '2020-12-06 17:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `user_id`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 'Sveiki, jūsų straipsnis \"test\" buvo atmestas.', 1, 1, '2020-12-06 04:32:41', '2020-12-06 04:32:41'),
(2, 'WWWWWWW WWWWWWW WWWWW', 1, 1, '2020-12-06 04:35:41', '2020-12-06 04:35:41'),
(3, 'Sveiki, jūsų straipsnis \"autoriaus straipsnis\" buvo atmestas.', 4, 1, '2020-12-06 16:50:48', '2020-12-06 16:50:48'),
(4, 'Sveiki, jūsų straipsnis \"Etiam id\" buvo patvirtintas.', 1, 1, '2020-12-06 17:07:46', '2020-12-06 17:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_11_22_222159_create_sessions_table', 1),
(9, '2020_11_22_224226_create_blogs_table', 1),
(10, '2020_11_22_225255_create_categories_table', 1),
(11, '2020_11_22_225934_create_keywords_table', 1),
(12, '2020_11_23_050843_create_messages_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('G0jUCrElqIJdZFDwOxaSbfw3iBlrQZOpGaKMMzQj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYlRQZ1doMlcxSkNaazJVZHRXSGtwNnphSmZNb0cwczBLcmVuRGhMTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ibG9nL3Bvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTHE0d0pPZW5WS0ludmdQTUhrMHdtZWtKUHJZVjM2TnByTTdZSFZqWXJHVEJqbnpXZkV2QUMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJExxNHdKT2VuVktJbnZnUE1IazB3bWVrSlByWVYzNk5wck03WUhWallyR1RCam56V2ZFdkFDIjt9', 1607294662);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog komanda', 1, '2020-11-23 04:06:29', '2020-12-04 12:18:26'),
(2, 2, 'Tester\'s Team', 1, '2020-12-04 12:16:29', '2020-12-04 12:16:29'),
(3, 3, 'tester2\'s Team', 1, '2020-12-05 23:42:52', '2020-12-05 23:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `team_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'editor', '2020-12-04 12:17:04', '2020-12-04 12:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@blog.test', NULL, '$2y$10$Lq4wJOenVKInvgPMHk0wmekJPrYV36NprM7YHVjYrGTBjnzWfEvAC', NULL, NULL, NULL, 1, NULL, '2020-11-23 04:06:29', '2020-11-23 04:06:30'),
(2, 'Tester', 'test@gmail.com', NULL, '$2y$10$V51alGxgEub/HMDeNOXKUe9wo5flnstCB3MP.YICpOICFysvVyIum', NULL, NULL, NULL, 1, NULL, '2020-12-04 12:16:29', '2020-12-06 03:26:42'),
(4, 'tester3', 'test3@gmail.com', NULL, '$2y$10$k8Ow7eFYb2A3XbUBgwALl.oQDamQkRif9mRfffazVRWaE5K3bVjHq', NULL, NULL, NULL, NULL, NULL, '2020-12-06 00:04:30', '2020-12-06 00:04:30'),
(6, 'tester5', 'test5@gmail.com', NULL, '$2y$10$opNHaSWbjSfkSNV1745eW.2m7/Vzm6M/oHY0B06J74egyYtAamKzi', NULL, NULL, NULL, NULL, NULL, '2020-12-06 00:47:47', '2020-12-06 00:47:47'),
(7, 'tester6', 'test6@gmail.com', NULL, '$2y$10$F/VpSukNA0VUvVl060wfDeUpUcf7AzWoMtZ55AuejSkhfwCNFL0Wq', NULL, NULL, NULL, NULL, NULL, '2020-12-06 00:48:22', '2020-12-06 00:48:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_author_id_index` (`author_id`),
  ADD KEY `blogs_reviewer_id_index` (`reviewer_id`),
  ADD KEY `blogs_category_id_index` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keywords_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blogs_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
