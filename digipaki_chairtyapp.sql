-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2024 at 06:50 AM
-- Server version: 10.6.16-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digipaki_chairtyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(12) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `date`) VALUES
(1, 'admin@gmail.com', 'admin', '2023-01-27 18:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin1234@dropbox.com', '168966594097.jpg', '2023-06-21 00:48:26', '$2y$10$eBsyM/Mq2g1ub2EbMkLSHeW9.MgdTeC0FtIWnizqenQ6BKLEDYDX2', 'tW8icptJM97qIR66LmaaOSasqfOWQTllO7OxpMvfBKP7t6vTlX4OSuV2A24N', '2023-06-21 00:48:26', '2023-07-18 02:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flood', 'testing..', 'active', '2023-07-11 02:29:25', '2023-07-19 15:12:52'),
(2, 'Drought', 'The drought is slow onset disaster.', 'active', '2023-08-05 22:40:04', '2023-08-05 22:40:04'),
(3, 'Health', 'Health is wealth', 'active', '2023-08-25 19:11:51', '2023-08-25 19:11:51'),
(4, 'Livelihood', 'Testing', 'active', '2023-08-28 09:54:25', '2023-08-28 09:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `doner_id` int(10) DEFAULT NULL,
  `transaction_id` int(10) DEFAULT NULL,
  `project_id` int(10) NOT NULL,
  `goal` decimal(19,2) NOT NULL,
  `donated` decimal(19,2) NOT NULL,
  `donor` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `payment_method` varchar(20) NOT NULL DEFAULT 'easypaisa',
  `status` varchar(15) NOT NULL DEFAULT 'succeed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `doner_id`, `transaction_id`, `project_id`, `goal`, `donated`, `donor`, `email`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 2, 120.00, 110.00, 'Salim Ullah', 'engr.salim339@gmail.com', 'easyPaisa', 'succeed', '2023-08-28 10:08:32', '2023-08-28 10:08:32'),
(2, 3, NULL, 2, 120.00, 5.00, 'Salim Ullah', 'engr.salim339@gmail.com', 'easyPaisa', 'succeed', '2023-08-28 10:08:59', '2023-08-28 10:08:59'),
(3, 3, NULL, 1, 120.00, 120.00, 'Salim Ullah', 'engr.salim339@gmail.com', 'easyPaisa', 'succeed', '2023-08-28 10:10:28', '2023-08-28 10:10:28'),
(4, 18, NULL, 2, 120.00, 0.50, 'Ibad khan', 'skynation.pk12@gmail.com', 'easyPaisa', 'succeed', '2023-09-05 11:10:27', '2023-09-05 11:10:27'),
(5, 17, NULL, 9, 200.00, 1.00, 'Salim Ullah', 'engr.salim339@gmail.com', 'easyPaisa', 'succeed', '2023-09-05 11:11:32', '2023-09-05 11:11:32'),
(6, 17, NULL, 3, 20000.00, 1.00, 'Salim Ullah', 'engr.salim339@gmail.com', 'easyPaisa', 'succeed', '2023-09-05 11:14:04', '2023-09-05 11:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `doners`
--

CREATE TABLE `doners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doners`
--

INSERT INTO `doners` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Arif', 'marif964@hotmail.com', '169297111945.png', NULL, '$2y$10$PUBIoy/rLpfzDDMrzrgKdehmh.m2Amtyb5Kxl2.nbuXp.6QyVR1Iu', NULL, '2023-08-25 17:41:41', '2023-08-25 17:45:19'),
(2, 'Atta Durrani', 'arcshangla@gmail.com', NULL, NULL, '$2y$10$HTzYfEGIWGbQ/T58O0hBmORcERIA8E/9ZJLjhuX1DK5Q312BzEj6q', NULL, '2023-08-25 20:47:04', '2023-08-25 20:47:04'),
(4, 'Jamal khan', 'jamal@mail.com', NULL, NULL, '$2y$10$giLmoGJ/Goe3ZNycKR9c1OcIOeSF0CVhwXIw5J5iVCw59xWPTn4zm', NULL, '2023-08-28 09:55:33', '2023-08-28 09:55:33'),
(5, 'samad ali', 'samad@mail.com', NULL, NULL, '$2y$10$lEt075Bk3wPuCbpE8USzdummToWIvkP3yxBMLdSdPNe9CbZShAxIi', NULL, '2023-08-29 09:43:04', '2023-08-29 09:43:04'),
(16, 'hameed khan', 'hameedullahcharsada@gmail.com', NULL, '2023-08-31 09:14:08', '$2y$10$SkgkJYrPOU8eQr.xeNPgG.ChzUyy1xGRMgqdimRjxWXw3XFynPH3S', 'VBdcGewYHzS63fC7m969kEE6WcTfrI6PluV5YH7sA07ah9Y3utO0aZfmcUYr', '2023-08-31 09:13:41', '2023-08-31 09:14:08'),
(17, 'Salim Ullah', 'engr.salim339@gmail.com', NULL, '2023-08-31 10:45:50', '$2y$10$3g5znaQpnHQ4a/DcOT8DO.RhDlOXywk2lrhLnA2xo9okYrBfoQ.aG', '4UnpjewWUbSntLuSr3zmqyClVWmCMkgUgoGJAkLCYTbq8MD24e9mWJhAMLAS6QeS', '2023-08-31 10:45:36', '2023-08-31 10:45:50'),
(18, 'Ibad khan', 'skynation.pk12@gmail.com', NULL, '2023-08-31 11:20:24', '$2y$10$NGhZzrhOy44AFf3HlMEKIetT/fs58SVTJQl3cswMyOiOE1CKd5qU2', 'g1OLTmyGyadn7VLfQYlXDaAcpLvtrNicJSQkFp6iEvadhRIgVgSVoezOfXIC', '2023-08-31 11:19:08', '2023-08-31 11:20:24'),
(19, 'Muhammad Arif', 'marif964@gmail.com', NULL, '2023-10-08 20:42:03', '$2y$10$NNSiwdLLmIrtRH5Nlwu41.YvTw21fiB6ELmgjsV.vXlBt3FwJvJca', 'xhcaACXmqLkZvYhlyHQiFaSUpaspticEoqPYIw08Ldk4BYuxqHudTSlTdiLo', '2023-10-08 20:37:37', '2023-10-08 20:42:03');

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
-- Table structure for table `fundraiser`
--

CREATE TABLE `fundraiser` (
  `id` int(12) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `fund_name` varchar(50) NOT NULL,
  `fund_title` varchar(100) NOT NULL,
  `fund_image` varchar(50) NOT NULL,
  `fund_url` varchar(50) NOT NULL,
  `fund_desc` varchar(250) NOT NULL,
  `fund_goal` varchar(30) NOT NULL,
  `summary` longtext NOT NULL,
  `challenge` longtext NOT NULL,
  `solution` longtext NOT NULL,
  `donation` longtext NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `ranked` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `catagory`, `fund_name`, `fund_title`, `fund_image`, `fund_url`, `fund_desc`, `fund_goal`, `summary`, `challenge`, `solution`, `donation`, `status`, `ranked`, `date`) VALUES
(1, 'Food Security', 'Muhamamd Faraz Ahmad', 'food security', 'turkey.jpg', 'https://www.fiverr.com/', '               food security         ', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 1, '2023-03-01 16:08:46'),
(2, 'Education', 'Muhamamd Faraz Ahmad', 'education', 'climate.jpg', 'https://www.fiverr.com/', 'education', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 2, '2023-03-01 16:09:12'),
(3, 'Child Protection', 'Muhamamd Faraz Ahmad', 'child protection', 'child.jpg', 'https://www.fiverr.com/', 'child protection', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 3, '2023-03-01 16:09:30'),
(4, 'Gender Equality', 'Muhamamd Faraz Ahmad', 'gender equality', 'ukraine.jpg', 'https://www.fiverr.com/', 'gender equality', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 4, '2023-03-01 16:09:49'),
(5, 'Covid-19', 'Muhamamd Faraz Ahmad', 'covid-19', 'security.jpg', 'https://www.fiverr.com/', 'gender equality', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 5, '2023-03-01 16:10:05'),
(6, 'Flood', 'Muhamamd Faraz Ahmad', 'flood', '1677687027.jpg', 'https://www.fiverr.com/', 'gender equality', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 0, '2023-03-01 16:10:27'),
(7, 'Earthquake', 'Muhamamd Faraz Ahmad', 'earthquak', '1677687045.jpg', 'https://www.fiverr.com/', 'earthquak', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 0, '2023-03-01 16:10:45'),
(8, 'Storms', 'Muhamamd Faraz Ahmad', 'storms', '1677687073.jpg', 'https://www.fiverr.com/', 'earthquak', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 0, '2023-03-01 16:11:13'),
(9, 'Racial Justice', 'Muhamamd Faraz Ahmad', 'racial justice', '1677687092.jpg', 'https://www.fiverr.com/', 'racial justice', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 0, '2023-03-01 16:11:32'),
(10, 'Hurricanes', 'Muhamamd Faraz Ahmad', 'hurricans', '1677687116.jpg', 'https://www.fiverr.com/', 'hurricans', '2000', 'food security', 'food security            ', 'food security', 'food security ', '0', 0, '2023-03-01 16:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `fundraising_campaign`
--

CREATE TABLE `fundraising_campaign` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `challenge` varchar(255) NOT NULL,
  `solution` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(138, '2023_03_18_154505_create_dashboards_table', 2),
(159, '2014_10_12_000000_create_users_table', 3),
(160, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(161, '2019_08_19_000000_create_failed_jobs_table', 3),
(162, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(163, '2023_03_03_172426_create_fundraising_campaign_table', 3),
(164, '2023_03_03_173234_create_listings_table', 3),
(165, '2023_03_11_160903_create_organizations_table', 3),
(166, '2023_06_21_051739_create_admins_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link_title` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'in-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `heading`, `title`, `link_title`, `description`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How It Works', 'NONPROFITS', NULL, 'Nonprofits around the world apply and join GlobalGiving to access more funding, to build new skills, and to make important connections.', '169139135736.svg', NULL, 'active', '2023-08-07 05:49:00', '2023-08-07 07:19:48'),
(2, 'How It Works', 'DONORS', NULL, 'People like you give to your favorite projects; you feel great when you get updates about how your money is put to work by trusted organizations.', '169139138928.svg', NULL, 'active', '2023-08-07 05:49:00', '2023-08-07 07:19:55'),
(3, 'How It Works', 'COMPANIES', NULL, 'Generous companies and their employees further support high-impact projects with donations and grants, helping local communities thrive.', '1691391418100.svg', NULL, 'active', '2023-08-07 05:54:50', '2023-08-07 07:20:01'),
(4, 'How It Works', 'OUR IMPACT', NULL, 'ARCPK is a nonprofit that supports other nonprofits by connecting them to donors and companies. Since 2002, we\'ve helped trusted, community-led organizations from Afghanistan to Zimbabwe (and hundreds of places in between) access the tools, training, and support they need to make our world a better place.', '169139143182.svg', NULL, 'active', '2023-08-07 05:54:50', '2023-09-04 09:18:24'),
(5, 'News', 'GlobalGiving Rings the Nasdaq Opening Bell', 'LEARN MORE', 'GlobalGiving opened the Nasdaq on December 27, 2022, marking the occasion with reflections on our 20th anniversary.', '169139148954.jpg', '#', 'active', '2023-08-07 05:57:20', '2023-08-07 07:20:13'),
(6, 'News', 'GlobalGiving Welcomes Victoria Vrana As CEO', 'Meet Victoria', 'Victoria comes to GlobalGiving from the Bill & Melinda Gates Foundation.', '169139155839.jpg', 'javascript:void()', 'active', '2023-08-07 05:57:20', '2023-08-07 07:20:21'),
(7, 'News', 'Bringing Hope To Every Crisis', 'LEARN MORE', 'GlobalGiving opened the Nasdaq on December 27, 2022, marking the occasion with reflections on our 20th anniversary.', '16913915875.jpg', 'javascript:void()', 'active', '2023-08-07 06:00:37', '2023-08-07 07:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE `news_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature_img` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`id`, `title`, `feature_img`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GlobalGiving Rings the Nasdaq Opening Bell', '169380975340.jpg', '<p>GlobalGiving opened the Nasdaq on December 27, 2022, marking the occasion with reflections on our 20th anniversary.</p><p>&nbsp;</p>', 'active', '2023-09-01 01:49:34', '2023-09-04 10:42:33'),
(2, 'GlobalGiving Welcomes Victoria Vrana As CEO', '169380970462.jpg', '<p>Victoria comes to GlobalGiving from the Bill &amp; Melinda Gates Foundation.</p><p><img src=\"http://arcpk.org/assets/uploads/media/bbb_1693809698.png\"></p>', 'active', '2023-09-03 11:33:13', '2023-09-04 10:41:44'),
(3, 'Bringing Hope To Every Crisis', '169380979664.jpg', '<p>GlobalGiving opened the Nasdaq on December 27, 2022, marking the occasion with reflections on our 20th anniversary.</p>', 'active', '2023-09-04 10:43:16', '2023-09-04 10:43:16'),
(4, 'GlobalGiving Partners with Endaoment to Enable Cryptocurrency Donations', '169382860217.png', '<p><i>May 16, 2023 (WASHINGTON, DC)</i> — GlobalGiving is excited to announce a new partnership with Endaoment that opens cryptocurrency donation opportunities for more than 4,200 organizations from the GlobalGiving network.</p><p>GlobalGiving’s thousands of vetted nonprofit partners will now be visible on Endaoment’s platform, empowering donors to make effortless crypto donations to community-led organizations in nearly every country around the world.</p><p>Announced today, the partnership has tripled the number of verified organizations available for cryptocurrency and NFT-derived donations on Endaoment, increasing donors’ ability to support causes around the world.</p><p>\"We’re excited to partner with Endaoment to expand the ways that people can give to community-led nonprofits around the globe,” said Victoria Vrana, CEO of GlobalGiving. “This partnership represents a powerful moment to unleash generosity in the cryptocurrency space by connecting donors to grassroots nonprofits.\"</p><p>Vetted nonprofits in the GlobalGiving network can now receive digitally-derived donations in their local currency via Endaoment, without directly handling crypto assets or modifying their existing giving policies.</p><p>\"Cryptocurrencies and digital assets are a vibrant global movement with users and evangelists around the world. Our donors have consistently expressed interest in supporting local philanthropic activities around the globe, and we’re thrilled to expand their options through this major onboarding effort,” said Robbie Heeger, President and CEO of Endaoment. “By teaming up with the veteran, reputable nonprofit GlobalGiving, we take a landmark step forward in our quest to provide easy access to digital asset donations to as many nonprofits as possible worldwide.\"</p><p>Since 2002, GlobalGiving has raised more than $826 million from 1.7+ million donors for 34,000 projects in 175+ countries. GlobalGiving has been in existence for 20+ years, vetting organizations around the globe and connecting donors with causes they care about. The partnership with Endaoment will expand donors’ opportunities to give, benefiting more organizations and offering crypto donors thousands of verified options for giving.</p>', 'active', '2023-09-04 15:56:42', '2023-09-04 15:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `designation` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `reg_certificate` varchar(255) DEFAULT NULL,
  `audit_report` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `name`, `email`, `designation`, `contact_no`, `address`, `reg_certificate`, `audit_report`, `created_at`, `updated_at`) VALUES
(2, 1, 'ABC', NULL, 'Teacher', '03248866554', 'Peshawar sadar cantt', '169234231563.png', '169234231578.png', '2023-08-18 05:04:47', '2023-08-18 07:06:09'),
(3, 2, 'ABCD', NULL, 'Teacher', '03248866554', 'Dir lower', '169269569966.png', '169269569975.png', '2023-08-18 07:35:41', '2023-08-22 13:14:59'),
(5, 19, 'Red Stonz', NULL, 'CEO', '03018578520', '419 4th Floor', '169346426263.jpg', '169346426295.pdf', '2023-08-31 10:43:48', '2023-08-31 10:44:22'),
(6, 21, 'xyz', NULL, 'Teacher', '03248866554', 'Peshawar sadar', '169346617673.jpg', '169346617638.png', '2023-08-31 11:16:04', '2023-08-31 11:16:16');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `summary` text NOT NULL,
  `goal` decimal(19,2) NOT NULL,
  `challenge` text NOT NULL,
  `solution` text NOT NULL,
  `donation_usage` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'pending',
  `goal_status` varchar(20) NOT NULL DEFAULT 'not-achived',
  `ranked` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `category_id`, `url`, `description`, `summary`, `goal`, `challenge`, `solution`, `donation_usage`, `status`, `goal_status`, `ranked`, `created_at`, `updated_at`) VALUES
(1, 2, 'Safe Drinking Water for Flood Victims Pakistan', 1, 'localhost:8080', 'This project empowers poor communities and single mothers to gain resilience on difficult situations in life while drinking contaminated water at their household level. About 5,000 families will be skilled and trained to install and use life time based technology of Nadi filter units. Through this Nadi filter no more sickness in women and children under 6 months.', 'Pakistan Floods 2022 affected families of Sujawal, Thatta, TM Khan, Dadu & Badin, the families lost all, houses, crops and animals now on raods and open sky and looking for help. AHD will help these poor flood victims with skill training & facing contamination in drinking water. AHD will provide initial 5000 Nadi filter unit to above 6 selected districts within next 06 months. The objective of this project to HELP FLOOD VICTIMS with ACCESS TO SAFE & CLEAN DRINKING WATER FOR PAKISTAN FLOODS 2022.', 120.00, 'Floods Pakistan 2022 affected 33 million people to displacement, 850,000 houses damaged and 1750 people DEATHS via this floods. Flood affected families are facing worst situation of disasters, in remote rural areas of Sindh Pakistan hit by heavy rain spell creates flood affected during July-August 2022. majority of people lost houses and crops submerged in flood water. problems persist. Sadly, water-borne diseases such as cholera, dysentery and typhoid increased due to rain floods 2022.', 'Association for Humanitarian Development introduced safe drinking Nadi filter with poor slum areas based families and find very good response back, AHD will help rural 6 districts of rural Sindh to install quickly 5000 Nadi filter water units in for poor families about 100,000 will access to safe and clean drinking water at their household level through AHD NADI FILTER. About 100,000 Floods Affected Families saved from waterborne diseases', 'something... about donation', 'approved', 'not-achived', 1, '2023-07-13 01:33:09', '2023-08-02 15:27:41'),
(2, 2, 'Relief to 10000 flood survivors in South Sudansilience', 1, 'http://localhost:8000/route-cache', 'The project will provide relief packages including food and non items to 10,000 flood survivors in (Twic East County of Jonglei State and Terekeka county of Central Equatoria State in South Sudan. Communities are not aware of flood control and disaster management methods to retain water that can\'t be carried out within stream channels or retained in natural pound lakes. The project will inform the flood survivors to create man-mad channels to divert water around their homes and plant', 'The project will provide relief packages including food and non items to 10,000 flood survivors in (Twic East County of Jonglei State and Terekeka county of Central Equatoria State in South Sudan. Communities are not aware of flood control and disaster management methods to retain water that can\'t be carried out within stream channels or retained in natural pound lakes. The project will inform the flood survivors to create man-mad channels to divert water around their homes and plant', 120.00, 'South Sudan has faced flooding for three consecutive years and the current flooding has worsened the already dire situation. People have been forced to leave their flooded houses on higher grounds with no food or land. The flooded areas have become a perfect breeding ground for mosquitos leaving them dangerously exposed to diseases. Many communities in flooded areas are not knowledgeable about flood control and disaster management to create man-made channels to divert flooded water.', 'South Sudan has faced flooding for three consecutive years and the current flooding has worsened the already dire situation. People have been forced to leave their flooded houses on higher grounds with no food or land. The flooded areas have become a perfect breeding ground for mosquitos leaving them dangerously exposed to diseases. Many communities in flooded areas are not knowledgeable about flood control and disaster management to create man-made channels to divert flooded water.', 'The project will provide a relief package to 10,000 flood survivors and sensitize them on flood control and disaster management method by creating man-made channels to divert flooded water and plant vegetation to retain extra water which can\'t be carried out within stream channels or retained in natural pound lakes to reduce and prevent the flow of water from flooding.', 'approved', 'not-achived', 2, '2023-07-19 05:00:05', '2023-08-02 15:31:46'),
(3, 2, '3 Flood Control Structures Completed in Bataan', 1, 'www.redstonz.com', 'In an effort to further mitigate flooding in the Province of Bataan, the Department of Public Works and Highways (DPWH) has completed the construction of three (3) flood control structures in the Municipality of Dinalupihan.  Secretary Mark A. Villar said that the newly-built flood walls will serve as protection for residents living in Barangays Dalao, Maligaya, and Pita which are located near the river.', 'We should also commend Bataan First District Engineering Office (DEO) and Regional Director Roseller Tolentino for completing the much needed infrastructure projects on time despite the additional requirements poised by the minimum health standards in order to aid the the flood management program of the province,” said Secretary Villar.', 20000.00, 'A total of P43-million has been allotted for the completion of the project with drainage system in Dalao River with net length of 108-meters on the left side and 267-meters on the right.', 'A total of P43-million has been allotted for the completion of the project with drainage system in Dalao River with net length of 108-meters on the left side and 267-meters on the right.', 'A total of P43-million has been allotted for the completion of the project with drainage system in Dalao River with net length of 108-meters on the left side and 267-meters on the right.', 'approved', 'not-achived', 3, '2023-07-20 14:15:15', '2023-07-21 08:43:41'),
(4, 2, 'Help Us Transform the Surf Industry in Mozambique', 1, 'www.pdma.gov.pk', 'This project continues our support for Manuel \'Manu Shapes\' and at the same time strengthening our partnership with \'Lwandi Surf\' a nonprofit organisation in Ponta do Ouro, Mozambique. We will bring two expert surfboard shapers to teach and share their knowledge of a sustainable and innovative shaping technique. This technique uses only natural or recycled materials that have almost zero impact on the ocean environment and will empower a new generation of sustainable artisans.', 'The project will equip young Mozambicans with the skills and knowledge that can be transcended into creative jobs, generating economic value for the community. It will eliminate the barriers to accessing this expensive, often polluting sport, by encouraging a respect for the ocean and the environment. By using only natural materials and hand tools, this project not only produces skilled artisans, but sustainability pioneers who empower their community whilst protecting the environment.', 20000.00, 'Mozambique has a wealth of opportunities to practice surfing, however, there\'s limited infrastructure and equipment such as surfboards are made from polluting materials impacting and littering the ocean, along with being produced far way and they are expensive. Mozambique has enormous potential for this sport and tourism is beginning to boom. This project will equip local people with the skills to produce their own equipment, furthering their access to this sport with zero environmental impact.', 'We provide the knowledge, skills and business acumen to the young people who engage in our workshops. Through mentorship and guidance, we will begin a locally sourced and locally made production of sustainable surfing equipment such as wooden surfboards, accessories made out of recycled materials and natural surf wax. This will impact Mozambique\'s economy and tourism industry by minimising its carbon footprint, taking giant steps towards sustainability whilst empowering the community.', 'preparedness measures', 'approved', 'not-achived', 1, '2023-07-21 10:59:21', '2023-08-28 13:02:36'),
(5, 2, 'Supporting vulnerable children in Uganda\'s slums', 1, 'https://www.youtube.com/watch?v=1kUoOLZ0g6g', 'Over the last 10 years we have provided 1.5 million hot meals to hungry children; free education for 1,000 children; counselling for 3,000 vulnerable young people; vital skills training for 700 women; rescued 100 children from abandonment and reunited 60 children back with loving families. Our vision is to see children\'s lives transformed, communities empowered and poverty reduced throughout Uganda.', 'Kids Club Kampala is a UK charity helping vulnerable kids in Uganda to survive and thrive. Kids Club Kampala works to overcome the lack of hope and self-esteem of children living in situations of extreme poverty by empowering communities to bring about sustainable changes. We work in partnership with our team in Uganda who passionately lead and implement our projects which are a life line to some of the most vulnerable children in the world.', 120.00, 'The children that we are working with come from extremely poor households and the conditions in Kampala\'s slums are shocking. The slums are notorious for drug and alcohol abuse, violent crime and abject poverty. People face problems of overcrowding, poor sanitation, insufficient shelter and food insecurity on a daily basis. Many children have been orphaned, neglected or simply abandoned as a result of poverty or sickness.', 'We are passionate about empowering these children and communities, letting them know they are loved and helping them to overcome their situations of poverty. We support vulnerable kids in Uganda by providing for both their immediate needs and strengthening their futures through educating, feeding, protecting, and skilling.', 'something...', 'approved', 'not-achived', 5, '2023-07-21 11:45:24', '2023-08-02 14:55:56'),
(6, 2, 'Chitral flood response', 1, 'www.arcpk.org', 'The flood in july 23 had devastated effects on vulnerable communities in Chitral, many living in the open sky due to lack of shelters', 'The district has declared emergency and appealed to support the affected people', 10000.00, 'The winter is coming and people who have no shelters will suffer.the district govt; does not have sufficient funds.', 'immediate response to provide relief items', 'procurement of food and non food items', 'cancelled', 'not-achived', 1, '2023-08-05 22:36:34', '2023-08-05 22:44:24'),
(8, 6, 'Microplanning for LHWs', 3, 'www.health.org', '\"Health is wealth\" is a well-known proverb that emphasizes the importance of good health as a valuable asset. It suggests that being in good health is incredibly valuable and can be considered a form of wealth that is often taken for granted until it is compromised. The saying highlights the idea that no matter how much material wealth or possessions a person may have, if they are not healthy, they won\'t be able to fully enjoy or utilize their resources.  Maintaining good health through proper nutrition, regular exercise, sufficient sleep, and other healthy habits can lead to a better quality of life and increased longevity. Good health allows individuals to pursue their goals, engage in activities they enjoy, and be more productive in various aspects of life. It also helps prevent or manage various health conditions that can be physically, emotionally, and financially taxing.  In essence, the proverb \"Health is wealth\" serves as a reminder that taking care of one\'s health is an investment in overall well-being and a foundation for a fulfilling and prosperous life.', 'Health is often referred to as wealth because of the numerous ways in which good health contributes to a prosperous and fulfilling life. Here are some reasons why health can be considered as valuable as wealth:  1. **Quality of Life:** Good health enhances the overall quality of life. When you\'re healthy, you can engage in various activities, hobbies, and experiences that bring joy and satisfaction. You\'re more likely to enjoy life to the fullest when you\'re not hindered by health issues.  2. **Productivity:** Good health allows you to be more productive and efficient in your work and daily activities. When you\'re physically and mentally well, you can focus better, complete tasks more effectively, and achieve your goals.  3. **Longevity:** Maintaining good health increases your chances of living a longer and more active life. This provides more opportunities to spend time with loved ones, pursue interests, and make a positive impact on the world.  4. **Financial Security:** Poor health can lead to significant medical expenses and reduced earning capacity. Staying healthy can prevent or minimize medical bills and lost income due to illness, helping you maintain financial stability.  5. **Mental Well-being:** Physical health is closely linked to mental and emotional well-being. Regular exercise, a balanced diet, and sufficient sleep can help regulate mood, reduce stress, anxiety, and depression, and improve cognitive function.  6. **Independence:** Good health promotes independence and self-sufficiency. You\'re able to take care of yourself and perform daily tasks without relying heavily on others for assistance.  7. **Prevention of Chronic Diseases:** Leading a healthy lifestyle can significantly reduce the risk of chronic diseases such as heart disease, diabetes, and certain types of cancer. Preventing these diseases can save you from years of discomfort and medical treatment.  8. **Positive Relationships:** When you\'re healthy, you can maintain active and fulfilling relationships with family, friends, and the community. You can participate in social activities and be a source of support for others.  9. **Energy and Vitality:** Good health provides you with the energy and vitality needed to engage in physical activities, travel, and explore new experiences. It allows you to seize opportunities and make the most of life\'s adventures.  10. **Self-Confidence:** Feeling healthy and looking after your well-being boosts self-confidence and self-esteem. It allows you to feel comfortable in your own skin and approach challenges with a positive mindset.  Ultimately, the concept of \"health is wealth\" underscores the idea that health is a valuable resource that should not be taken for granted. Just as financial wealth requires careful management and investment, so does our health. Prioritizing healthy habits and taking proactive steps to maintain good health can lead to a more fulfilling and prosperous life.', 100000.00, 'vPakistan, like many countries, faces a range of health challenges that stem from various factors including socioeconomic conditions, infrastructure limitations, cultural practices, and public health policies. Some of the prominent health challenges in Pakistan include:  1. **Infectious Diseases:** Pakistan grapples with a high burden of infectious diseases such as tuberculosis, hepatitis, malaria, and dengue fever. Limited access to clean water and sanitation facilities contributes to the spread of these diseases.  2. **Malnutrition:** Malnutrition is a significant issue, affecting both children and adults. Chronic malnutrition, micronutrient deficiencies, and stunted growth are prevalent, leading to long-term health and developmental problems.  3. **Maternal and Child Health:** High maternal and infant mortality rates persist due to inadequate access to quality healthcare services, skilled birth attendants, and proper prenatal care.  4. **Polio:** Pakistan is one of the few remaining countries where polio is still endemic. Efforts to eradicate polio have been hindered by various factors, including vaccine hesitancy, misinformation, and challenges in reaching remote and conflict-affected areas.  5. **Non-Communicable Diseases (NCDs):** There is a rising burden of non-communicable diseases such as cardiovascular diseases, diabetes, and cancer. Lifestyle factors, including unhealthy diets, lack of physical activity, and tobacco use, contribute to the prevalence of NCDs.  6. **Healthcare Infrastructure:** The healthcare infrastructure in Pakistan is often inadequate, particularly in rural and remote areas. Shortages of medical personnel, essential medicines, and proper facilities hinder access to healthcare services.  7. **Access to Clean Water and Sanitation:** Many people in Pakistan lack access to clean drinking water and proper sanitation facilities, leading to the spread of waterborne diseases and other health problems.  8. **Lack of Health Awareness:** Limited health awareness and education contribute to a lack of understanding about preventive measures, family planning, and proper healthcare practices.  9. **Health Disparities:** There are significant disparities in healthcare access and outcomes between urban and rural areas, as well as among different socioeconomic groups. Vulnerable populations, including women, children, and marginalized communities, face greater challenges in accessing healthcare.  10. **Environmental Health:** Air and water pollution, particularly in urban areas, contribute to various health issues. Exposure to pollutants can lead to respiratory diseases, skin problems, and other health complications.  11. **Limited Healthcare Financing:** Healthcare financing remains a challenge, with inadequate public funding for health services. This often results in out-of-pocket expenditures and financial barriers to accessing healthcare.  12. **Emergency Response and Preparedness:** Natural disasters, such as earthquakes and floods, can strain the healthcare system and hinder emergency response efforts.  Efforts to address these health challenges require a multifaceted approach involving improved healthcare infrastructure, increased awareness, policy reforms, better education, and international collaboration. The Pakistani government, along with non-governmental organizations and international partners, continues to work toward improving healthcare access and outcomes for its population.', 'Pakistan, like many countries, faces a range of health challenges that stem from various factors including socioeconomic conditions, infrastructure limitations, cultural practices, and public health policies. Some of the prominent health challenges in Pakistan include:  1. **Infectious Diseases:** Pakistan grapples with a high burden of infectious diseases such as tuberculosis, hepatitis, malaria, and dengue fever. Limited access to clean water and sanitation facilities contributes to the spread of these diseases.  2. **Malnutrition:** Malnutrition is a significant issue, affecting both children and adults. Chronic malnutrition, micronutrient deficiencies, and stunted growth are prevalent, leading to long-term health and developmental problems.  3. **Maternal and Child Health:** High maternal and infant mortality rates persist due to inadequate access to quality healthcare services, skilled birth attendants, and proper prenatal care.  4. **Polio:** Pakistan is one of the few remaining countries where polio is still endemic. Efforts to eradicate polio have been hindered by various factors, including vaccine hesitancy, misinformation, and challenges in reaching remote and conflict-affected areas.  5. **Non-Communicable Diseases (NCDs):** There is a rising burden of non-communicable diseases such as cardiovascular diseases, diabetes, and cancer. Lifestyle factors, including unhealthy diets, lack of physical activity, and tobacco use, contribute to the prevalence of NCDs.  6. **Healthcare Infrastructure:** The healthcare infrastructure in Pakistan is often inadequate, particularly in rural and remote areas. Shortages of medical personnel, essential medicines, and proper facilities hinder access to healthcare services.  7. **Access to Clean Water and Sanitation:** Many people in Pakistan lack access to clean drinking water and proper sanitation facilities, leading to the spread of waterborne diseases and other health problems.  8. **Lack of Health Awareness:** Limited health awareness and education contribute to a lack of understanding about preventive measures, family planning, and proper healthcare practices.  9. **Health Disparities:** There are significant disparities in healthcare access and outcomes between urban and rural areas, as well as among different socioeconomic groups. Vulnerable populations, including women, children, and marginalized communities, face greater challenges in accessing healthcare.  10. **Environmental Health:** Air and water pollution, particularly in urban areas, contribute to various health issues. Exposure to pollutants can lead to respiratory diseases, skin problems, and other health complications.  11. **Limited Healthcare Financing:** Healthcare financing remains a challenge, with inadequate public funding for health services. This often results in out-of-pocket expenditures and financial barriers to accessing healthcare.  12. **Emergency Response and Preparedness:** Natural disasters, such as earthquakes and floods, can strain the healthcare system and hinder emergency response efforts.  Efforts to address these health challenges require a multifaceted approach involving improved healthcare infrastructure, increased awareness, policy reforms, better education, and international collaboration. The Pakistani government, along with non-governmental organizations and international partners, continues to work toward improving healthcare access and outcomes for its population.', 'Donations can play a crucial role in addressing health problems in Pakistan by providing additional resources and support to initiatives aimed at improving healthcare services, infrastructure, and access. While donations alone may not completely solve all the health challenges, they can certainly contribute to meaningful and positive changes. Here\'s how donations can help:  1. **Medical Supplies and Equipment:** Donations can provide much-needed medical supplies, equipment, and technologies to healthcare facilities. This can enhance the capacity to diagnose and treat various illnesses, improving the quality of care.  2. **Infrastructure Development:** Donations can be used to build or upgrade healthcare facilities, particularly in underserved areas. This helps expand access to healthcare services and improves the overall quality of care provided.  3. **Training and Capacity Building:** Donated funds can be used to train healthcare professionals, including doctors, nurses, and community health workers. Well-trained personnel can provide better care and disseminate health education within communities.  4. **Medications and Vaccinations:** Donations can support programs that provide essential medications and vaccines to vulnerable populations. This is particularly important for controlling infectious diseases and preventing outbreaks.  5. **Emergency Response:** Donations can aid in disaster preparedness and response efforts. This includes providing medical supplies, setting up mobile clinics, and offering immediate medical assistance during emergencies.  6. **Maternal and Child Health:** Donations can be directed toward programs focused on improving maternal and child health, including prenatal care, safe deliveries, and vaccinations to reduce maternal and infant mortality rates.  7. **Nutrition Programs:** Donations can support nutrition programs that provide nutritious food and supplements to malnourished children and mothers.  8. **Health Awareness Campaigns:** Donations can fund health education and awareness campaigns that educate communities about preventive measures, hygiene practices, family planning, and disease prevention.  9. **Community Health Initiatives:** Donations can empower communities to take charge of their health by supporting initiatives that train community health workers and promote health education at the grassroots level.  10. **Non-Profit Organizations and NGOs:** Many non-profit organizations and NGOs work tirelessly to address health issues in Pakistan. Donations can support their efforts in implementing healthcare projects and initiatives.  11. **Research and Innovation:** Donations can fund research projects that focus on understanding and addressing specific health challenges in Pakistan, leading to evidence-based solutions.  12. **Access to Clean Water and Sanitation:** Donations can contribute to water and sanitation projects, which can have a direct impact on reducing waterborne diseases and improving overall health.  13. **Healthcare Outreach:** Donations can facilitate outreach programs that bring healthcare services to remote and underserved areas, where access is limited.  14. **Collaboration and Partnerships:** Donations can foster collaborations between local and international organizations, governments, and communities, allowing for a more comprehensive and effective approach to health challenges.  While donations can make a positive difference, it\'s important to ensure that they are directed toward reputable organizations with a track record of transparency and accountability. Collaborating with local stakeholders and understanding the specific needs of the communities is essential for donations to have a sustainable impact on health problems in Pakistan.', 'approved', 'not-achived', 2, '2023-08-25 20:35:00', '2023-08-28 12:17:47'),
(9, 2, 'testing', 4, 'testing', 'testing', 'testing', 200.00, 'testing', 'testing', 'testing', 'approved', 'not-achived', 4, '2023-08-28 09:59:27', '2023-08-28 17:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(19, 3, '169097271699.jpg', 'active', '2023-08-02 14:38:36', '2023-08-02 14:38:36'),
(20, 4, '169097359058.jpg', 'active', '2023-08-02 14:53:10', '2023-08-02 14:53:10'),
(21, 4, '169097359043.jpg', 'active', '2023-08-02 14:53:10', '2023-08-02 14:53:10'),
(22, 4, '1690973590100.png', 'active', '2023-08-02 14:53:10', '2023-08-02 14:53:10'),
(23, 5, '169097375613.jpg', 'active', '2023-08-02 14:55:56', '2023-08-02 14:55:56'),
(24, 5, '169097375693.jpg', 'active', '2023-08-02 14:55:56', '2023-08-02 14:55:56'),
(25, 5, '169097375678.jpg', 'active', '2023-08-02 14:55:56', '2023-08-02 14:55:56'),
(26, 1, '169097566148.png', 'active', '2023-08-02 15:27:41', '2023-08-02 15:27:41'),
(27, 1, '169097566192.jpg', 'active', '2023-08-02 15:27:41', '2023-08-02 15:27:41'),
(28, 2, '169097586251.png', 'active', '2023-08-02 15:31:03', '2023-08-02 15:31:03'),
(29, 2, '169097586338.png', 'active', '2023-08-02 15:31:03', '2023-08-02 15:31:03'),
(30, 1, '169126059445.jpg', 'active', '2023-08-05 22:36:34', '2023-08-05 22:36:34'),
(31, 6, '169126087178.jpg', 'active', '2023-08-05 22:41:11', '2023-08-05 22:41:11'),
(32, 1, '169126119512.jpg', 'active', '2023-08-05 22:46:35', '2023-08-05 22:46:35'),
(34, 1, '169298130090.jpg', 'active', '2023-08-25 20:35:00', '2023-08-25 20:35:00'),
(35, 8, '169298154434.jpg', 'active', '2023-08-25 20:39:04', '2023-08-25 20:39:04'),
(36, 1, '169320236776.png', 'active', '2023-08-28 09:59:27', '2023-08-28 09:59:27'),
(37, 9, '169320409880.jpg', 'active', '2023-08-28 10:28:18', '2023-08-28 10:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `verifiacation_code` varchar(255) NOT NULL,
  `is_verified` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `fname`, `lname`, `email`, `password`, `verifiacation_code`, `is_verified`, `date`) VALUES
(1, 'muhammad', 'faraz ahmad', 'muhammadfarazahmad73@gmail.com', '$2y$10$GdfhzjXgrX0ojgQ2zkb5WeNwSXGhcHlKoxrmOWBE4SxuX7YTyBlGa', 'a5a758d47a33e849ed3bc4645d370856', 1, '2023-02-22 19:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Arif', 'marif964@hotmail.com', NULL, NULL, '$2y$10$ObQm7px7WquzZIU0quapEeGmF2NXh.62vYrEV6dkkcLEOBPChStMi', NULL, '2023-03-19 05:02:48', '2023-03-19 05:02:48'),
(2, 'asad', 'khan', 'asadkhan@mail.com', '168967854895.jpg', NULL, '$2y$10$3.U244qFifHsHTHlqy3ymOp6Bg8n0CLyxjW5zqsHCozWVdliov1Pu', NULL, '2023-06-20 01:13:31', '2023-07-18 06:09:08'),
(3, 'asad', 'khan', 'asad@admin.com', NULL, NULL, '$2y$10$dn.evUsYdEHjylpFEAMts.xRSQFUVHRWSRd/OwlOu2utGIN1Am6oi', NULL, '2023-06-22 01:18:02', '2023-06-22 01:18:02'),
(5, 'asad', 'khan', 'asadkhan@xmail.com', NULL, NULL, '$2y$10$EmaBaGRSwQRpSD4jkqW.bukMMziCEzaY7uK3yklysZRVSirVTN1/i', NULL, '2023-07-10 06:25:30', '2023-07-10 06:25:30'),
(6, 'imran', 'khan', 'marif964@gmail.com', NULL, NULL, '$2y$10$8TBBP8G1TiCsVbwgvBDjkOXEVzAYorYuOCNvoPKQPsOrjabPDRAv6', NULL, '2023-08-25 20:30:03', '2023-08-25 20:30:03'),
(7, 'Jameel', 'Ahmad', 'jameel@mail.com', NULL, NULL, '$2y$10$b3SZxv2Sk0lTrehpaltvFe/Bi/O4Hcp5Rz.HRw4x4jwDIWHoMwhgW', NULL, '2023-08-30 11:07:41', '2023-08-30 11:07:41'),
(17, 'hameed', 'khan', 'hameedullahcharsada@gmail.com', NULL, '2023-08-31 09:57:58', '$2y$10$KFtjF6FXrv9V7ZnbYLhrsOsqd3ImAWON2MZVRsgJ9lvDbz1YAeOyy', '3xG63s4PW79PECxp54u6Hh0WHmx0pm1JIIwgpi9eVQUKcOxgTJB2u9tnbIlE', '2023-08-31 09:57:17', '2023-08-31 09:57:58'),
(19, 'Salim', 'ullah', 'engr.salim339@gmail.com', NULL, '2023-08-31 10:43:13', '$2y$10$MFyoHMxJU1LoXoNvyi9xUet.O7EZrzVKhrds3pt6d90wkouh/EJdm', 'RmYqqUFE8tBBpIos3dw2IIKC0OPs88ciJemclHZ8zY4C28V8beuVfrztwGCf', '2023-08-31 10:42:58', '2023-08-31 10:43:13'),
(21, 'hameed', 'khan', 'skynation.pk12@gmail.com', NULL, '2023-08-31 11:14:41', '$2y$10$7GViL8Q4T11iDBY8Yr3P0e2Uz1yoP4t3BsSG.tFwJeBGYyvp.wZZy', 'BxQhaRnGJEDzvV0NoTmuW9qNAUnhkZBEpu9OhT0AKsDuMLOiAkAuChYUNGu9', '2023-08-31 11:14:15', '2023-08-31 11:14:41'),
(22, 'Maeve', 'Maeve', 'cRjMiw.bbqmjqq@lustrum.cfd', NULL, NULL, '$2y$10$ZX/iiJg1eEgQ4P/fSXFDUuUbUXwXcvU6ua7qPA8KnGzyv/lC6VDD6', 'OPNMTlsWOGYtTT7eFoeVEsg62mVvtsoiyyFvv0BBpl7QG8EpzoJd9OkLy3yzwCdS', '2023-11-21 09:21:19', '2023-11-21 09:21:19'),
(23, 'Yasmin', 'Yasmin', 'siddijebsen@mac.com', NULL, NULL, '$2y$10$qyOGSKQRvulxQ73ONrzpNuwCv8EA55.Kn9kK4LFT0M..jrf3HIZaC', 'qME87ygqz6cDRYwrmJFrwLzArfI4nhDerKfWgjTIJFxtCskrGH3q1nVbQwSr5Swf', '2023-11-21 09:21:40', '2023-11-21 09:21:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doners`
--
ALTER TABLE `doners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fundraiser`
--
ALTER TABLE `fundraiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraising_campaign`
--
ALTER TABLE `fundraising_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doners`
--
ALTER TABLE `doners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundraiser`
--
ALTER TABLE `fundraiser`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fundraising_campaign`
--
ALTER TABLE `fundraising_campaign`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news_articles`
--
ALTER TABLE `news_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
