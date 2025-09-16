-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2025 at 12:40 AM
-- Server version: 10.5.29-MariaDB-cll-lve
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecowaveconsultan_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `count`, `suffix`, `icon`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Years of Experience', 14, NULL, NULL, 0, 'active', '2025-09-04 19:50:28', '2025-09-04 19:50:28'),
(2, 'Project Taken', 237, NULL, NULL, 0, 'active', '2025-09-04 19:50:43', '2025-09-04 19:50:43'),
(3, 'Twitter Follower', 11, 'K', NULL, 0, 'active', '2025-09-04 19:51:05', '2025-09-04 19:51:05'),
(4, 'Awards won', 12, NULL, NULL, 0, 'active', '2025-09-04 19:51:18', '2025-09-04 19:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `parent_type`, `parent_id`, `name`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Service', 1, 'Brochoure', 'uploads/attachments/assignment-1_68c45a2266ef9.pdf', '2025-09-12 11:36:34', '2025-09-12 11:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('published','scheduled','draft') NOT NULL DEFAULT 'draft',
  `published_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Architecture', 'architecture', NULL, 'active', '2025-09-04 19:54:17', '2025-09-04 19:54:17'),
(2, 'Commercial Interior', 'commercial-interior', NULL, 'active', '2025-09-04 19:54:26', '2025-09-04 19:54:26'),
(3, 'Residential Interior', 'residential-interior', NULL, 'active', '2025-09-04 19:54:34', '2025-09-04 19:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `logo`, `url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Client 1', 'frontEnd/images/clients/client (1).jpg', '#', 1, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(2, 'Client 2', 'frontEnd/images/clients/client (2).jpg', '#', 2, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(3, 'Client 3', 'frontEnd/images/clients/client (3).jpg', '#', 3, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(4, 'Client 4', 'frontEnd/images/clients/client (4).jpg', '#', 4, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(5, 'Client 5', 'frontEnd/images/clients/client (5).jpg', '#', 5, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(6, 'Client 6', 'frontEnd/images/clients/client (6).jpg', '#', 6, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(7, 'Client 7', 'frontEnd/images/clients/client (7).jpg', '#', 7, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(8, 'Client 8', 'frontEnd/images/clients/client (8).jpg', '#', 8, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(9, 'Client 9', 'frontEnd/images/clients/client (9).jpg', '#', 9, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(10, 'Client 10', 'frontEnd/images/clients/client (10).jpg', '#', 10, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(11, 'Client 11', 'frontEnd/images/clients/client (11).jpg', '#', 11, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(12, 'Client 12', 'frontEnd/images/clients/client (12).jpg', '#', 12, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(13, 'Client 13', 'frontEnd/images/clients/client (13).jpg', '#', 13, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(14, 'Client 14', 'frontEnd/images/clients/client (14).jpg', '#', 14, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `description`, `address`, `email2`, `email`, `phone`, `phone2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Get In Touch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2512, New Market, Eliza Road, Sincher 80 CA, Canada, USA', 'support@example.com', 'support@example.com', '(41) 123 521 458', '(41) 123 521 458', 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_type` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `parent_type`, `parent_id`, `file_path`, `caption`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Service', 1, 'uploads/services/service-1_68ba097308a58.jpg', NULL, 1, '2025-09-04 19:49:39', '2025-09-04 19:49:39'),
(2, 'App\\Models\\Service', 2, 'uploads/services/service-2_68ba097c0dc4f.jpg', NULL, 1, '2025-09-04 19:49:48', '2025-09-04 19:49:48'),
(3, 'App\\Models\\Service', 3, 'uploads/services/service-3_68ba098590a0f.jpg', NULL, 1, '2025-09-04 19:49:57', '2025-09-04 19:49:57'),
(10, 'App\\Models\\Project', 1, 'uploads/projects/4storied-residence-for-matuail-dorbar-sorif-pir-shaheb_68c1ccf1af09e.jpg', NULL, 1, '2025-09-10 17:09:37', '2025-09-10 17:12:43'),
(11, 'App\\Models\\Project', 2, 'uploads/projects/alom-residence-4-katha_68c1cd3fb15fd.jpg', NULL, 1, '2025-09-10 17:10:56', '2025-09-10 17:13:27'),
(12, 'App\\Models\\Project', 2, 'uploads/projects/img-20250910-wa0010_68c1cdd772934.jpg', NULL, 0, '2025-09-10 17:13:27', '2025-09-10 17:13:27'),
(13, 'App\\Models\\Project', 2, 'uploads/projects/img-20250910-wa0011_68c1cdd776fcf.jpg', NULL, 0, '2025-09-10 17:13:27', '2025-09-10 17:13:27'),
(14, 'App\\Models\\Project', 2, 'uploads/projects/img-20250910-wa0012_68c1cdd77ae06.jpg', NULL, 0, '2025-09-10 17:13:27', '2025-09-10 17:13:27'),
(15, 'App\\Models\\Project', 3, 'uploads/projects/commercial-cum-residence-at-narayangong-bumipoli_68c1ce24dc7cb.jpg', NULL, 1, '2025-09-10 17:14:44', '2025-09-10 17:14:44'),
(16, 'App\\Models\\Project', 4, 'uploads/projects/milon-sir-residence_68c1ce8e76956.jpg', NULL, 1, '2025-09-10 17:16:30', '2025-09-10 17:16:44'),
(17, 'App\\Models\\Project', 4, 'uploads/projects/whatsapp-image-2025-09-10-at-013815-5a28ecf0_68c1ce9cf19a5.jpg', NULL, 0, '2025-09-10 17:16:44', '2025-09-10 17:16:44'),
(18, 'App\\Models\\Project', 4, 'uploads/projects/whatsapp-image-2025-09-10-at-013859-b6cf7088_68c1ce9d1c5fd.jpg', NULL, 0, '2025-09-10 17:16:45', '2025-09-10 17:16:45'),
(19, 'App\\Models\\Project', 4, 'uploads/projects/whatsapp-image-2025-09-10-at-013900-f4675e54_68c1ce9d1da80.jpg', NULL, 0, '2025-09-10 17:16:45', '2025-09-10 17:16:45'),
(20, 'App\\Models\\Project', 5, 'uploads/projects/mosque-at-mayuail-dorbar-sorif_68c1cf6dbdc45.jpg', NULL, 1, '2025-09-10 17:20:14', '2025-09-10 17:20:38'),
(21, 'App\\Models\\Project', 6, 'uploads/projects/img-20250826-wa0001_68c1d0041f27b.jpg', NULL, 0, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(22, 'App\\Models\\Project', 6, 'uploads/projects/img-20250829-wa0004_68c1d0043ed37.jpg', NULL, 0, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(23, 'App\\Models\\Project', 6, 'uploads/projects/img-20250829-wa0005_68c1d004703c3.jpg', NULL, 0, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(24, 'App\\Models\\Project', 6, 'uploads/projects/img-20250829-wa0006_68c1d0049c564.jpg', NULL, 0, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(25, 'App\\Models\\Project', 6, 'uploads/projects/img-20250829-wa0007_68c1d004cdd07.jpg', NULL, 0, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(26, 'App\\Models\\Project', 6, 'uploads/projects/img-20250910-wa0005_68c1d004ed374.jpg', NULL, 0, '2025-09-10 17:22:45', '2025-09-10 17:27:23'),
(27, 'App\\Models\\Project', 6, 'uploads/projects/img-20250910-wa0007_68c1d00516e2b.jpg', NULL, 0, '2025-09-10 17:22:45', '2025-09-10 17:27:23'),
(28, 'App\\Models\\Project', 6, 'uploads/projects/img-20250910-wa0008_68c1d0052eb3d.jpg', NULL, 0, '2025-09-10 17:22:45', '2025-09-10 17:27:23'),
(29, 'App\\Models\\Project', 6, 'uploads/projects/sayed-vai-residence-10-katha_68c1d00555db3.jpg', NULL, 1, '2025-09-10 17:22:45', '2025-09-10 17:27:23'),
(30, 'App\\Models\\Project', 7, 'uploads/projects/vivas-menson-at-bashundhara-n-block-3-katha-residencial-building_68c1d0a9f361a.jpg', NULL, 1, '2025-09-10 17:25:30', '2025-09-10 17:26:12'),
(31, 'App\\Models\\Project', 7, 'uploads/projects/img-20250910-wa0021_68c1d0d430b52.jpg', NULL, 0, '2025-09-10 17:26:12', '2025-09-10 17:26:12'),
(32, 'App\\Models\\Project', 7, 'uploads/projects/img-20250910-wa0024_68c1d0d437315.jpg', NULL, 0, '2025-09-10 17:26:12', '2025-09-10 17:26:12'),
(33, 'App\\Models\\Project', 7, 'uploads/projects/img-20250910-wa0027_68c1d0d43b4e7.jpg', NULL, 0, '2025-09-10 17:26:12', '2025-09-10 17:26:12'),
(34, 'App\\Models\\Project', 7, 'uploads/projects/img-20250910-wa0028_68c1d0d43c594.jpg', NULL, 0, '2025-09-10 17:26:12', '2025-09-10 17:26:12'),
(35, 'App\\Models\\Project', 6, 'uploads/projects/sayed-vai-residence-10-katha_68c1d11b96887.jpg', NULL, 0, '2025-09-10 17:27:23', '2025-09-10 17:27:23');

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
(4, '0001_01_01_000003_create_permission_tables', 1),
(5, '2024_07_27_090636_create_settings_table', 1),
(6, '2025_08_26_060808_create_categories_table', 1),
(7, '2025_08_26_080422_create_features_table', 1),
(8, '2025_08_27_060809_create_services_table', 1),
(9, '2025_08_27_060810_create_service_features_table', 1),
(10, '2025_08_27_085848_media_table', 1),
(11, '2025_08_27_085919_create_attachments_table', 1),
(12, '2025_08_31_050526_create_testimonials_table', 1),
(13, '2025_08_31_081220_create_contacts_table', 1),
(14, '2025_08_31_081221_create_contact_submissions_table', 1),
(15, '2025_08_31_090108_create_stories_table', 1),
(16, '2025_08_31_101835_create_teams_table', 1),
(17, '2025_08_31_110639_create_missions_table', 1),
(18, '2025_08_31_190722_create_clients_table', 1),
(19, '2025_09_01_202959_create_seos_table', 1),
(20, '2025_09_02_085107_create_achievements_table', 1),
(21, '2025_09_03_171314_create_projects_table', 1),
(22, '2025_09_12_234919_create_blog_posts_table', 1),
(23, '2025_09_12_234920_create_blog_comments_table', 1),
(24, '2025_09_12_235009_create_tags_table', 1),
(25, '2025_09_12_235117_create_blog_post_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `mission_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`mission_items`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `image_path`, `mission_items`, `status`, `created_at`, `updated_at`) VALUES
(1, 'frontEnd/img/city.png', '[{\"icon_class\":\"fa-solid fa-unlock-keyhole\",\"title\":\"Fully Secure & 24x7 Dedicated Support\",\"description\":\"If you are an individual client, or just a business startup looking for good backlinks for your website.\",\"order\":1,\"status\":true}]', 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create blogs', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(2, 'edit blogs', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(3, 'view blogs', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(4, 'delete blogs', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(5, 'create categories', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(6, 'edit categories', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(7, 'view categories', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(8, 'delete categories', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(9, 'create services', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(10, 'edit services', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(11, 'view services', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(12, 'delete services', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(13, 'create projects', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(14, 'edit projects', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(15, 'view projects', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(16, 'delete projects', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(17, 'create features', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(18, 'edit features', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(19, 'view features', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(20, 'delete features', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(21, 'create testimonials', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(22, 'edit testimonials', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(23, 'view testimonials', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(24, 'delete testimonials', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(25, 'create achievements', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(26, 'edit achievements', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(27, 'view achievements', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(28, 'delete achievements', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(29, 'create teams', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(30, 'edit teams', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(31, 'view teams', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(32, 'delete teams', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(33, 'create clients', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(34, 'edit clients', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(35, 'view clients', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(36, 'delete clients', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(37, 'create missions', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(38, 'edit missions', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(39, 'view missions', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(40, 'delete missions', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(41, 'create contact', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(42, 'edit contact', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(43, 'view contact', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(44, 'delete contact', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(45, 'create settings', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(46, 'edit settings', 'web', '2025-09-15 15:22:56', '2025-09-15 15:22:56'),
(47, 'view settings', 'web', '2025-09-15 15:22:57', '2025-09-15 15:22:57'),
(48, 'delete settings', 'web', '2025-09-15 15:22:57', '2025-09-15 15:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area_size` varchar(255) DEFAULT NULL,
  `build_year` year(4) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `architect` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `description`, `client_name`, `location`, `area_size`, `build_year`, `price`, `architect`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '4 Storied Residence For Matuail Dorbar Sorif Pir Shaheb', '4-storied-residence-for-matuail-dorbar-sorif-pir-shaheb', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Allegra Chapman', 'Vero aspernatur aute', '1500', '2022', NULL, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-04 19:55:57', '2025-09-10 17:12:43'),
(2, 3, 'Alom Residence', 'alom-residence', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Walter Haney', 'Autem illo nulla cum', '2,880 sq ft', '2024', 0.00, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-04 19:56:53', '2025-09-10 17:13:10'),
(3, 3, 'Commercial Cum Residence At Narayangong Bumipoli', 'commercial-cum-residence-at-narayangong-bumipoli', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Arthur Carpenter', 'Esse cupiditate prae', '2,880 sq ft', '2025', NULL, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-04 19:57:21', '2025-09-10 17:14:44'),
(4, 3, 'Milon Sir Residence', 'milon-sir-residence', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Kennedy Stewart', 'Sit aut optio sed', '2,880 sq ft', '2025', NULL, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-04 19:58:08', '2025-09-10 17:16:03'),
(5, 2, 'Mosque At mayuail Dorbar Sorif', 'mosque-at-mayuail-dorbar-sorif', '<h1 style=\"margin-right: 0px; margin-bottom: 35px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 48px; font-family: Rubik, sans-serif; line-height: 50px; color: rgb(255, 255, 255); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Ar. Mohammad</h1><h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><h1 style=\"margin-right: 0px; margin-bottom: 35px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 48px; font-family: Rubik, sans-serif; line-height: 50px; color: rgb(255, 255, 255); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color: rgb(102, 102, 102); font-family: Arimo, sans-serif; font-size: 14px;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</span> Ismaiel Parvez</h1>', 'Keelie Schwartz', 'Qui sint est harum u', '2,880 sq ft', '2020', 398.00, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-10 17:20:13', '2025-09-10 17:20:38'),
(6, 3, 'Sayed Vai Residence', 'sayed-vai-residence', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Hadassah Blake', 'Quasi ut nihil amet', '13610 sq ft', '2025', NULL, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(7, 3, 'Vivas menson', 'vivas-menson', '<h2 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 30px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Descripation</h2><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Well we’re movin’ on up to the east side. To a deluxe apartment in the sky. The weather started getting rough – the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. I have always wanted to have a neighbor just like you. I’ve always wanted to live in a neighborhood with you.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Project Challenge</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">It’s time to put on makeup. It’s time to dress up right. It’s time to raise the curtain on the Muppet Show tonight. The mate was a mighty sailin’ man the Skipper brave and sure.</p><ul class=\"list-style-one\" style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(119, 119, 119); font-family: Arimo, sans-serif;\"><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Five passengers set sail that day for a three hour</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Till the one day when the lady met this fellow</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Family that’s the way we all became the brady</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Champion the cause of the innocent career</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">Now were up in the big leagues getting’ turn</li><li style=\"margin: 0px; padding: 0px 0px 0px 35px; border: none; outline: none; list-style: none; position: relative; float: left; width: 385px; line-height: 28px; color: rgb(102, 102, 102);\">The powerless in a world of criminals operate</li></ul><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">What We Did</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">Then along come two they got nothin’ but their jeans. Texas tea. Knight Rider: A shadowy flight into the dangerous world of a man who does not exist. The first mate and his Skipper too will do their very best to make the tropic island nest.</p><h4 style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 24px; font-family: Rubik, sans-serif; line-height: 1.2em; color: rgb(34, 34, 34); position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">RESULT</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; line-height: 28px; color: rgb(102, 102, 102); position: relative; font-family: Arimo, sans-serif;\">That’s just a little bit more than the law will allow. We’re gonna do it. On your mark get set and go now. Got a dream and we just know now we’re gonna make our dream come true. Makin their way the only way they know how. That’s just a little bit more than the law will allow.</p>', 'Pandora Levy', 'Bashundhara N block', '2160 sq ft', '2024', NULL, 'Ar. Mohammad Ismaiel Parvez', 1, '2025-09-10 17:25:10', '2025-09-10 17:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-09-15 15:22:57', '2025-09-15 15:22:57'),
(2, 'editor', 'web', '2025-09-15 15:22:57', '2025-09-15 15:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(23, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(27, 2),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(35, 2),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(43, 2),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(47, 2),
(48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `twitter_card` varchar(255) DEFAULT NULL,
  `robots` varchar(255) NOT NULL DEFAULT 'index, follow',
  `seoable_type` varchar(255) NOT NULL,
  `seoable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_title`, `og_description`, `og_image`, `twitter_card`, `robots`, `seoable_type`, `seoable_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 1, '2025-09-04 19:49:38', '2025-09-04 19:49:38'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 2, '2025-09-04 19:49:48', '2025-09-04 19:49:48'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Service', 3, '2025-09-04 19:49:57', '2025-09-04 19:49:57'),
(4, 'Amet lorem nihil co', 'Vel consequatur rep', 'Neque architecto sus', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 1, '2025-09-04 19:55:58', '2025-09-10 17:12:43'),
(5, 'Quisquam id eum pari', 'Numquam quisquam aut', 'Tempora est harum iu', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 2, '2025-09-04 19:56:53', '2025-09-10 17:13:27'),
(6, 'Sed eos sunt tenetu', 'Ex ut aliquam pariat', 'Qui mollitia optio', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 3, '2025-09-04 19:57:21', '2025-09-10 17:14:44'),
(7, 'Est animi et deser', 'Ea consequatur Ulla', 'Ipsam fugiat et dolo', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 4, '2025-09-04 19:58:08', '2025-09-10 17:16:44'),
(8, 'Doloribus veniam do', 'Sed odio maiores id', 'Enim nulla quis anim', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 5, '2025-09-10 17:20:13', '2025-09-10 17:20:38'),
(9, 'Amet autem dolorem', 'Velit in non similiq', 'Veniam est aspernat', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 6, '2025-09-10 17:22:44', '2025-09-10 17:27:23'),
(10, 'Aliquip molestiae no', 'Alias doloribus prov', 'Qui magni voluptas t', NULL, NULL, NULL, NULL, NULL, 'index, follow', 'App\\Models\\Project', 7, '2025-09-10 17:25:11', '2025-09-10 17:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `image`, `icon`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Architectural Design', 'architectural-design', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.', 'images/services/service-1.jpg', 'flaticon-architecture', 1, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(2, 'Interior Design', 'interior-design', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.', 'images/services/service-2.jpg', 'flaticon-interior-design', 2, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58'),
(3, 'Corporate Design', 'corporate-design', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they.', 'images/services/service-3.jpg', 'flaticon-corporate', 3, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `service_features`
--

CREATE TABLE `service_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('3AdnTdeTA3RHrv5qHzvT2qZlSlVxCggnroxo0Rl1', NULL, '43.166.251.233', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmtlMmdwWkVnTXJjMTVzVFlsb0Q2akZsOVQzSHpTMW1ETGRTQjVNYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvbW9zcXVlLWF0LW1heXVhaWwtZG9yYmFyLXNvcmlmIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757993923),
('4R8znf58JERdDWOSuAxp8cop26YeQwrjXUTmSBY9', NULL, '49.7.227.204', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkRacnVyV1hvVDR6djFuZXdWSGFHOUVrOHNFZWdRN1R2c2g5UlFSRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757972973),
('8vrBEJOtzhuKrdXr8Pl7BvSxztl4Z8Neec9tYkDI', NULL, '66.249.64.227', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.127 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnlRRTUyZ3kwVzBMMkl0MVN3T1Nqa2xmQ2g4VEdPT2NHaWE1bnI3VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvY29udGFjdC5odG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757989858),
('9sWKnszwE1SGT6capZEh1kEjm99PZFqrSmUVRzfl', NULL, '43.131.243.61', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUxDZFF1dU5XaEl4dW05MHhmMGZ2OVpBTHFSem9qWmtnbUp5akpENCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757991278),
('A2GdWtkGkMR8j0Ue1PFfVwqavaaIGBOIXltirFQh', NULL, '49.51.253.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVV1UzIyZTZJemR3dUs4Z25YQkpYdmU0TkZnekNUenpOSVNOVENMYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzI6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvaW5kZXguaHRtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757996928),
('ADYLbh3ACm1MDN3xZ3p65ej1S4Lhq796OnfFQw8W', NULL, '150.109.46.88', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFFSRnFJYnFmVFJVYkRZb1lpVUZXQll4c1huYUtvUnpBcTNJODJ1VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzU6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvc2VydmljZXMuaHRtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757996277),
('ASWZv0sTIkOsFBwsodoleuiChr1fziAdJGaq8bx0', NULL, '162.62.132.25', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkN2WFNjeXBBaGJCWXl4enVWemdQb3UwN3E0Sm5hQnBFMXZtSmtqcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODE6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvc2F5ZWQtdmFpLXJlc2lkZW5jZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757993292),
('bQeOqTvs30zEjFqvligHzoEKlc2fwijn7y98332t', NULL, '170.106.192.3', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTldvYzlLNm03VGhlUDNJVzI5MHFteGpudzI5Mkp5aXBCS0I4bFlWUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzk6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvYmxvZy1jbGFzc2ljLmh0bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757995790),
('CVYZepMcx4no1scoj5SOICJ8RWFpWDtYOIuKujS1', NULL, '43.130.228.73', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicExHWWFIU2twWThQd0JobDZ2UmF6MEU4RjhXb3NMRUJNMmpnUnNYVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tL3BhZ2UvcHJvamVjdHMtZGV0YWlscy9jb250YWN0Lmh0bWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757968234),
('d8DvTuwj1Trktt5LVNlWIku6a8gyw8vJskssHuRt', NULL, '43.157.67.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkkyeDhLQ0gzMlQ1Tjc0bmVqajVBczc3MEhuV1pDN1BrdEJXM243RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzQ6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvdml2YXMtbWVuc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757992772),
('dSB5qv6C3BPYLgmxtleQJH1iF0yZdKinx1wKo0DP', NULL, '66.249.66.67', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.127 Mobile Safari/537.36 (compatible; GoogleOther)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1NTTEtudFJrd1VBUUpVUzU1NmRaVG5pOHBBcDJiUk1OZjljMTd5UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODY6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tL3BhZ2UvcHJvamVjdHMtZGV0YWlscy9zYXllZC12YWktcmVzaWRlbmNlLTEwLWthdGhhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757994017),
('H28cSrUvlPOEHgZNJO0duKMdZTefJYz5LyT4P5pS', NULL, '43.167.245.18', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzZlTVZXY0QwRHRvUlUxcVNIZGJMa0V2MU5OV3V6SkNNdU9CQ2cwaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODE6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvbWlsb24tc2lyLXJlc2lkZW5jZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757995073),
('HbGc8sYDDgqxyuGBGGf2jeQdQ2bSLtzCl3b3J0rD', NULL, '49.51.196.42', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGM5cGZnREZoZjhzbWdkVGYza0xrSkJkVk5FcDBETjNkczRLb1ZEMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njg6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tL3BhZ2UvcHJvamVjdHMtZGV0YWlscy9hYm91dC5odG1sIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757968823),
('ITGZCoVSmEL4YvSQc24gITGpS8hlmuJKDVLVj0kK', NULL, '103.108.63.239', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWF2UHdWTnJSQzMxYnBrSmtGaGl3Z3hRSWhpR0xjb0ZBTW5yVDhkbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757968058),
('o1JE2ExgrniNNnSty4t4mkqMKKAPa0o2DKwVe8Sx', NULL, '43.153.79.218', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUlSN0l5a05vT2x5VzdMRDlRajAxSHg0NmlGbHdiYlhVeG9uMHdSYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvYWxvbS1yZXNpZGVuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757992158),
('P9IgBmDldNtFGv9t8dZONaS8qdodQwmKxzpfEtkm', NULL, '23.95.184.98', 'Mozilla/5.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTdwTHdicU41eDFIUkh2aTBuWDFxUG12WHV5T0JoZllPRk9YbTk2dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757987024),
('QRAhoI9ALa4Y0xVePgeePkjpufTZEMuJaRh2RW3m', NULL, '43.157.142.101', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFdxR1FsYjc4V3lZOU9BREtIQ3RuUFhJVXZBeEgyMTlxZURINVJ3dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTEwOiJodHRwczovL3d3dy5lY293YXZlY29uc3VsdGFudHN0dWRpby5jb20vcGFnZS9wcm9qZWN0cy1kZXRhaWxzL2NvbW1lcmNpYWwtY3VtLXJlc2lkZW5jZS1hdC1uYXJheWFuZ29uZy1idW1pcG9saSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757994430),
('QX05wylKcQwoeMROZaug5O5aHxe9pETUF4LI7dK8', NULL, '52.208.151.205', 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0JWaG1iYnd4WjBYelJ4REMwZVZSdmxreUNDeVY1MUZnc2RyQk80dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757988086),
('SutForASOOmlKRmZzUGDhZxPdurjMHIJGv44s6MW', NULL, '129.28.14.231', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkxQZUZPcHBaSHB5MGpUSlNBNkpOMkF2SWk5czBTYXJCV3pwb0dkcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZWNvd2F2ZWNvbnN1bHRhbnRzdHVkaW8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757986702),
('u4xhuUk0y7gZeeXPQ1HKBYtNWRVuzbFU4pXS6WAS', NULL, '43.133.14.237', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHRqSUc3YkFxYWUwaFRGY1I2clEzUG9tZGVMekhLbWNtTVZHb05nOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHBzOi8vd3d3LmVjb3dhdmVjb25zdWx0YW50c3R1ZGlvLmNvbS9wYWdlL3Byb2plY3RzLWRldGFpbHMvYmxvZy1kZXRhaWwuaHRtbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757997465);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `success_text` text DEFAULT NULL,
  `fb_pixel_code` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ecowave ConsultantStudio', 'At Ecowave Consultant Studio, we transform ordinary spaces into extraordinary environments. With over 14 years of experience in creating inspired interiors, our expert team specializes in delivering innovative, sustainable, and aesthetically pleasing designs. Whether you are a homeowner, office owner, architect, or property developer, our tailored solutions bring your vision to life for users and the surrounding community.', 'frontEnd/images/bg-about-us.jpg', 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `bio`, `image`, `facebook`, `twitter`, `instagram`, `linkedin`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ar. Mohammad Ismaiel Parvez', 'Chief Architect', 'Experienced professional with years of industry knowledge.', 'uploads/team/architect_68ba0c192d9a1.jpg', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://linkedin.com', 1, 1, '2025-09-15 15:22:58', '2025-09-15 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `position`, `company`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Motiur Rahman', 'Full-Stack Developer', 'Sky Tech Solve', 'I believe that great design is a perfect blend of aesthetics, functionality, and sustainability. Every project is an opportunity to create something unique that refl', 'uploads/testimonials/20250617-172801_68ba0c69df64f.jpg', 1, '2025-09-04 20:02:18', '2025-09-04 20:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo_path`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, NULL, '$2y$12$WuoAKUwiB0HIYQpEEJw3F.St8iQ9gy9Utzl651lYldMAM0duYzHSy', NULL, '2025-09-15 15:22:57', '2025-09-15 15:22:57'),
(2, 'Editor User', 'editor@gmail.com', NULL, NULL, '$2y$12$eAlmnVD4eHYscZ.444bGPuRDmYjW47SgWc5UhXEMx8iWJmXVyeNJG', NULL, '2025-09-15 15:22:57', '2025-09-15 15:22:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_parent_type_parent_id_index` (`parent_type`,`parent_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`),
  ADD KEY `blog_comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_category_id_foreign` (`category_id`),
  ADD KEY `blog_posts_author_id_index` (`author_id`),
  ADD KEY `blog_posts_title_index` (`title`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_post_tags_blog_post_id_foreign` (`blog_post_id`),
  ADD KEY `blog_post_tags_tag_id_foreign` (`tag_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_parent_type_parent_id_index` (`parent_type`,`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seos_seoable_type_seoable_id_index` (`seoable_type`,`seoable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `service_features`
--
ALTER TABLE `service_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_features_service_id_foreign` (`service_id`),
  ADD KEY `service_features_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_features`
--
ALTER TABLE `service_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `blog_post_tags_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_features`
--
ALTER TABLE `service_features`
  ADD CONSTRAINT `service_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_features_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
