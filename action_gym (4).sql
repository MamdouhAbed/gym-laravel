-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2020 at 06:17 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `action_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ذكر', '2019-11-02 08:30:49', '2019-11-02 08:30:49'),
(2, 'أنثى', '2019-11-02 08:35:44', '2019-11-02 08:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'لاعب مبتدئ', '2020-01-27 13:49:26', '2020-01-27 13:49:26'),
(2, 'لاعب متمرس', '2020-01-27 13:49:26', '2020-01-27 13:49:26'),
(3, 'لاعب محترف', '2020-01-27 13:49:36', '2020-01-27 13:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_10_23_070434_create_news_table', 1),
(4, '2019_10_23_070534_create_categories_table', 1),
(5, '2019_10_23_070629_create_news_imgs_table', 1),
(6, '2019_10_23_070708_create_news_videos_table', 1),
(7, '2019_10_23_070802_create_settings_table', 1),
(8, '2019_10_23_070819_create_tags_table', 1),
(9, '2019_10_23_070837_create_tag_news_table', 1),
(10, '2019_10_23_070910_create_imgs_newspapers_table', 1),
(11, '2019_10_23_070937_create_authors_table', 1),
(12, '2019_10_23_123054_create_users_table', 1),
(13, '2019_10_28_082700_create_news_papers_table', 1),
(14, '2019_10_28_082744_create_breaknews_table', 1),
(15, '2019_10_28_082816_create_currencies_table', 1),
(16, '2019_10_28_082922_create_images_table', 1),
(17, '2019_10_28_082944_create_infographics_table', 1),
(18, '2019_10_28_083214_create_albums_table', 1),
(19, '2019_10_28_083318_create_news_tickers_table', 1),
(20, '2019_10_28_083347_create_place_ads_table', 1),
(21, '2019_10_28_083416_create_upload_files_table', 1),
(22, '2019_10_28_083442_create_videos_table', 1),
(23, '2019_10_28_083701_create_ads_table', 1),
(24, '2019_10_28_084051_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paids`
--

DROP TABLE IF EXISTS `paids`;
CREATE TABLE IF NOT EXISTS `paids` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paids`
--

INSERT INTO `paids` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'مدفوع كامل', '2020-01-22 12:29:22', '2020-01-22 12:29:22'),
(2, 'مدفوع جزئـي', '2020-01-22 12:29:22', '2020-01-26 10:16:35'),
(3, 'غيــر مــدفـــوع', '2020-01-22 12:29:32', '2020-01-26 10:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mamdouh.abed@gmail.com', '$2y$10$1.wDL89ruLE.f8tuxl02W.v7DeoLBEl2yZ2iWSqxNN5OCFaWKSgFO', '2019-11-24 08:55:19'),
('ahmed@gmail.com', '$2y$10$4yHrKFbAuwI4UEApcs86.OYp.9xhkRO90xh4TxkKq9KtMZsIrSOmu', '2020-02-29 10:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) NOT NULL,
  `weight` varchar(6) DEFAULT NULL,
  `category_id` int(2) UNSIGNED NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `bondnumber` varchar(50) DEFAULT NULL,
  `notes` varchar(300) DEFAULT NULL,
  `img` varchar(191) DEFAULT NULL,
  `paid_id` int(1) NOT NULL,
  `paid_value` int(3) DEFAULT NULL,
  `paid_remainder` int(3) DEFAULT NULL,
  `reg_date` varchar(50) NOT NULL,
  `reg_end_date` varchar(50) NOT NULL,
  `activated_id` int(1) NOT NULL DEFAULT '1',
  `level_id` int(1) DEFAULT '1',
  `created_by` int(2) UNSIGNED NOT NULL,
  `updated_by` int(2) UNSIGNED DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0',
  `deleted_by` int(2) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_category_id_foreign` (`category_id`),
  KEY `news_created_by_foreign` (`created_by`),
  KEY `news_updated_by_foreign` (`updated_by`),
  KEY `news_deleted_by_foreign` (`deleted_by`),
  KEY `paid_id` (`paid_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `order_id`, `name`, `weight`, `category_id`, `phone`, `bondnumber`, `notes`, `img`, `paid_id`, `paid_value`, `paid_remainder`, `reg_date`, `reg_end_date`, `activated_id`, `level_id`, `created_by`, `updated_by`, `is_delete`, `deleted_by`, `created_at`, `updated_at`) VALUES
(115, 119, 'حامد مصطفى', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 0, NULL, '2019-11-20 09:31:42', '2019-12-11 07:11:18'),
(117, 116, 'حسام علي', NULL, 1, NULL, NULL, 'ggggg', 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-20 09:38:31', '2019-12-11 06:53:57'),
(118, 117, 'هاني احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 1, 1, '2019-11-20 09:43:21', '2019-12-11 06:53:57'),
(119, 118, 'انور محمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 1, 1, '2019-11-20 09:44:12', '2019-12-11 06:53:57'),
(120, 143, 'ابراهيم احمد', NULL, 2, NULL, NULL, NULL, 'uploads/news/images/2019/11/20/1574250310.jpeg', 1, 0, 0, '2020-02-02', '2020-02-06', 1, 1, 1, 1, 0, 1, '2019-11-20 09:45:10', '2020-02-04 07:39:02'),
(121, 120, 'حسن حسن', NULL, 2, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574505132.png', 1, 0, 0, '2020-02-02', '2020-02-21', 1, 1, 1, 2, 0, NULL, '2019-11-23 08:32:13', '2020-02-21 12:40:15'),
(122, 121, 'احمد محمود', NULL, 2, NULL, NULL, 'sssss', 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 0, 0, '', '', 0, 1, 1, 2, 0, 2, '2019-11-23 08:35:30', '2020-02-20 22:30:03'),
(123, 122, 'عمر محمد', NULL, 1, NULL, NULL, 'hhhhhh', 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 1, 1, '2019-11-23 08:40:56', '2019-12-11 07:33:33'),
(124, 123, 'حمزة احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-23 09:25:41', '2019-12-11 07:33:33'),
(125, 124, 'حميد احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/26/1574764554.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-24 06:58:49', '2019-12-11 07:33:33'),
(126, 170, 'محمود محمود', NULL, 1, NULL, NULL, 'lll', 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 0, 1, 1, 1, 0, 1, '2019-11-24 08:07:18', '2020-01-28 09:15:05'),
(127, 125, 'محمود احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/26/1574764673.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-24 08:08:34', '2019-12-11 07:33:33'),
(134, 132, 'محمد محمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/26/1574764673.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-24 08:08:34', '2019-12-11 07:33:33'),
(135, 133, 'احمد محمد', NULL, 1, NULL, NULL, 'lll', 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 1, 1, '2019-11-24 08:07:18', '2019-12-11 07:33:33'),
(136, 134, 'علي احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/26/1574764554.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-24 06:58:49', '2019-12-11 07:33:33'),
(137, 135, 'علي محمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-23 09:25:41', '2019-12-11 07:33:33'),
(138, 136, 'test', '65', 2, 566333222, NULL, 'hhhhhh', 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 40, 0, '2020-02-21', '2020-03-28', 1, 1, 1, 1, 1, 1, '2019-11-23 08:40:56', '2020-02-20 22:47:56'),
(139, 139, 'علي علي', NULL, 1, NULL, NULL, 'sssss', 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 0, 0, '', '', 0, 1, 1, 1, 0, 1, '2019-11-23 08:35:30', '2019-12-11 07:33:33'),
(140, 142, 'احمد احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 0, 0, '2020-02-20', '2020-02-22', 1, 1, 1, 1, 0, 1, '2019-11-23 08:32:13', '2020-02-22 09:44:21'),
(143, 141, 'احمد محمد محمد', NULL, 1, NULL, NULL, 'ggggg', 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 0, 1, '2019-12-02 09:38:31', '2019-12-14 08:28:08'),
(144, 140, 'مصطفى حسن احمد', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 0, 1, '2019-11-20 09:31:42', '2019-12-14 08:28:18'),
(145, 144, 'محمد احمد علي', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 0, 0, '', '', 1, 1, 1, 1, 1, 1, '2019-11-20 09:44:12', '2020-01-28 08:56:25'),
(147, 146, '0599111222', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2020/01/03/1578050536.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 0, NULL, '2020-01-03 09:22:16', '2020-01-28 08:56:25'),
(148, 149, 'مصطفى ابو زايد 2', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2020/01/03/1578050667.jpeg', 1, 0, 0, '', '', 1, 1, 1, NULL, 0, NULL, '2020-01-03 09:24:27', '2020-01-28 09:15:31'),
(150, 148, 'ممدوح عابد', '63', 1, 592881818, NULL, 'مسجل جديد', 'uploads/news/images/2020/01/26/1580040057.jpeg', 2, 20, 15, '2020-01-26', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-26 10:00:57', '2020-01-28 09:15:31'),
(151, 150, 'محمد احمد', '70', 1, 599111223, NULL, NULL, 'uploads/news/images/2020/01/26/1580074399.jpeg', 2, 30, 5, '2020-01-26', '2020-02-25', 1, 1, 1, NULL, 0, NULL, '2020-01-26 19:33:19', '2020-01-28 08:56:25'),
(152, 151, 'مريم علي', '65', 2, 592123456, NULL, NULL, 'uploads/news/images/2020/01/26/1580074608.jpeg', 3, 0, 35, '2020-01-26', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-26 19:36:48', '2020-01-28 08:56:25'),
(153, 152, 'محمد حمد', '65', 1, 592111333, NULL, NULL, NULL, 1, 35, 0, '2020-01-26', '2020-03-26', 1, 1, 1, NULL, 0, NULL, '2020-01-26 19:39:48', '2020-01-28 08:56:25'),
(154, 153, 'aa', '60', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076009.jpeg', 1, 35, 0, '2020-01-26', '2020-02-04', 1, 1, 1, 1, 0, NULL, '2020-01-26 20:00:09', '2020-02-04 09:32:43'),
(155, 154, 'ggg', '70', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076079.jpeg', 1, 35, 0, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:01:19', '2020-01-28 08:56:25'),
(156, 165, 'hhh', '75', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076231.jpeg', 2, 15, 20, '2020-01-27', '2020-01-30', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:03:51', '2020-01-28 08:56:24'),
(157, 155, 'kkkk', '90', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076327.jpeg', 3, 0, 35, '2020-01-27', '2020-02-27', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:05:27', '2020-01-28 08:56:25'),
(158, 156, 'iiii', '80', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076502.jpeg', 1, 35, 0, '2020-01-27', '2020-03-27', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:08:22', '2020-01-28 08:56:25'),
(159, 157, 'vvvv', '55', 1, 599555666, NULL, NULL, 'uploads/news/images/2020/01/26/1580076817.jpeg', 1, 35, 0, '2020-01-27', '2020-03-27', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:13:37', '2020-01-28 08:56:25'),
(160, 158, 'mmm', '65', 1, 599555666, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 55, 0, '2020-01-27', '2020-01-28', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:18:09', '2020-01-28 08:56:25'),
(161, 159, 'nnnn', '66', 1, 599555666, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 35, 0, '2020-01-27', '2020-03-26', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:21:56', '2020-01-28 08:56:25'),
(162, 160, 'cccc', '54', 1, 599555666, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, NULL, NULL, '2020-01-27', '2020-03-27', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:28:19', '2020-01-28 08:56:24'),
(163, 161, 'zzz', '55', 1, 599123455, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 50, 0, '2020-01-27', '2020-03-27', 1, 1, 1, NULL, 0, NULL, '2020-01-26 20:31:09', '2020-01-28 08:56:24'),
(164, 162, 'rrr', '65', 1, 599123456, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 35, 0, '2020-01-27', '2020-03-27', 1, 1, 1, NULL, 0, NULL, '2020-01-27 06:46:15', '2020-01-28 08:56:24'),
(165, 163, 'ppp', '65', 1, 599123456, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 2, 0, 35, '2020-01-27', '2020-02-28', 1, 1, 1, NULL, 0, NULL, '2020-01-27 06:48:13', '2020-01-28 08:56:24'),
(166, 166, 'ttt', '65', 1, 599123451, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 35, 0, '2020-01-27', '2020-01-28', 1, 1, 1, NULL, 0, NULL, '2020-01-27 06:54:08', '2020-01-28 08:56:24'),
(167, 167, 'احمد علي', '54', 1, 599123452, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 2, 30, NULL, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 06:57:32', '2020-01-28 08:56:24'),
(168, 168, 'ggg', '60', 1, 599123452, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 35, 0, '2020-01-27', '2020-03-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:02:25', '2020-02-20 23:07:35'),
(169, 169, 'aaaa', '65', 1, 592123123, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 35, 0, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:03:15', '2020-01-28 08:56:24'),
(170, 171, 'lll', '65', 1, 599666333, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 35, 0, '2020-01-27', '2020-02-27', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:04:47', '2020-01-28 09:15:05'),
(171, 164, 'uuuu', '77', 1, 599666644, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 2, 25, 10, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:05:30', '2020-01-28 08:56:24'),
(172, 172, 'yyy', '90', 1, 599333222, NULL, 'iiii', 'uploads/news/images/2019/11/23/1574508341.jpeg', 2, 0, 35, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:07:22', '2020-01-28 09:15:05'),
(173, 173, 'rrr', '55', 1, 599888777, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 3, 0, 35, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:07:54', '2020-01-28 09:15:05'),
(174, 174, 'zsd', '65', 2, 599555444, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 1, 40, 0, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:11:50', '2020-01-28 09:15:05'),
(175, 175, 'iii', '80', 1, 599777444, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 35, 0, '2020-01-27', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-27 08:12:22', '2020-01-28 09:15:01'),
(176, 176, 'eee', '60', 1, 592222233, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 2, 30, 5, '2020-01-27', '2020-02-26', 1, 2, 1, NULL, 0, NULL, '2020-01-27 12:05:56', '2020-01-28 09:15:01'),
(177, 179, 'محمد احمد', '63', 1, 592333111, NULL, NULL, 'uploads/players/images/2020/01/29/1580292812.jpeg', 2, 20, 15, '2020-01-29', '2020-02-26', 1, 2, 1, 1, 0, NULL, '2020-01-27 12:07:48', '2020-01-29 08:13:32'),
(178, 177, 'sss', '60', 2, 592444111, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 3, 0, 40, '2020-01-27', '2020-02-26', 1, 3, 1, NULL, 0, NULL, '2020-01-27 12:08:39', '2020-01-28 09:14:57'),
(179, 178, 'محمد احمد', '65', 1, 592111333, NULL, NULL, 'uploads/news/images/2019/11/26/1574764554.jpeg', 1, 70, 0, '2020-01-27', '2020-03-27', 1, 2, 1, 1, 0, NULL, '2020-01-27 12:13:58', '2020-01-29 08:24:07'),
(180, 180, 'www', '65', 1, 592666333, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 35, 0, '2020-01-30', '2020-02-29', 1, 1, 1, NULL, 0, NULL, '2020-01-29 09:08:27', '2020-01-29 09:08:27'),
(181, 181, 'eee', '60', 2, 599444552, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 40, 0, '2020-01-28', '2020-02-28', 1, 2, 1, NULL, 0, NULL, '2020-01-29 09:09:24', '2020-01-29 09:09:24'),
(182, 182, 'aaa2', '90', 2, 599888445, NULL, NULL, 'uploads/news/images/2019/11/20/1574250310.jpeg', 2, 50, 10, '2020-01-29', '2020-03-29', 1, 1, 1, 2, 0, NULL, '2020-01-29 09:10:34', '2020-02-22 12:36:25'),
(183, 183, 'احمد ابو العمرين', '60', 1, 592333112, NULL, NULL, 'uploads/news/images/2019/11/23/1574505132.png', 2, 30, 5, '2020-01-29', '2020-02-28', 1, 1, 1, NULL, 0, NULL, '2020-01-29 09:19:23', '2020-07-08 09:23:19'),
(184, 184, 'احمد علي', '65', 1, 599866333, NULL, NULL, NULL, 3, 0, 35, '2020-01-29', '2020-02-28', 1, 1, 1, NULL, 0, NULL, '2020-01-29 09:20:23', '2020-01-29 09:20:23'),
(185, 185, 'www', '65', 1, 598444111, NULL, NULL, NULL, 1, 35, 0, '2020-01-29 00:00:00', '2020-02-26', 1, 1, 1, NULL, 0, NULL, '2020-01-29 09:24:32', '2020-01-29 09:24:32'),
(186, 186, 'cccc', '60', 1, 599888445, NULL, NULL, 'uploads/news/images/2019/11/26/1574764554.jpeg', 1, 35, 0, '2020-01-29', '2020-02-29', 1, 1, 1, 1, 0, NULL, '2020-01-29 10:10:05', '2020-01-29 10:11:47'),
(187, 187, 'احمد علي', '65', 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574505330.jpeg', 2, 25, 10, '2020-01-31', '2020-02-29 00:00:00', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:17:38', '2020-01-29 10:17:38'),
(188, 188, 'ففف', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/23/1574508341.jpeg', 1, 35, 0, '2019-12-02', '2020-02-29 00:00:00', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:18:36', '2020-01-29 10:18:36'),
(189, 189, 'محمد احمد1', NULL, 1, NULL, NULL, NULL, 'uploads/news/images/2019/11/26/1574764673.jpeg', 2, 30, 5, '2020-02-02', '2020-02-27', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:31:25', '2020-02-20 19:17:09'),
(190, 190, 'fff', NULL, 1, NULL, NULL, NULL, NULL, 3, 0, 35, '2020-01-29', '2020-02-28', 1, 1, 1, 1, 0, NULL, '2020-01-29 10:31:51', '2020-02-20 19:14:06'),
(191, 191, 'hhh', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2020-01-31', '2020-02-20', 1, 1, 1, 1, 0, NULL, '2020-01-29 10:32:22', '2020-02-20 19:12:48'),
(192, 192, 'cccb', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2019-11-01', '2020-02-01 14:10:00', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:33:17', '2020-01-29 10:33:17'),
(193, 193, 'gggg', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2020-02-25', '2020-03-24', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:34:13', '2020-02-25 08:06:36'),
(194, 194, 'iii', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2020-01-28', '2020-02-17 14:10:00', 1, 1, 1, NULL, 0, NULL, '2020-01-29 10:34:41', '2020-01-29 10:34:41'),
(195, 195, 'محمد ابو علي', NULL, 1, NULL, NULL, NULL, NULL, 2, 20, 20, '2020-06-01', '2020-07-30', 1, 1, 1, 1, 0, NULL, '2020-01-29 10:36:10', '2020-07-08 09:22:21'),
(196, 196, 'ممدوح عابد', '65', 1, 599222333, NULL, NULL, 'uploads/players/images/2020/01/29/1580335863.jpeg', 2, 20, 15, '2020-01-30', '2020-02-05', 1, 1, 1, 1, 0, NULL, '2020-01-29 20:11:03', '2020-02-20 23:32:22'),
(197, 197, 'محمد ابو صقر', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2020-03-03', '2020-04-04', 1, 1, 1, 1, 0, NULL, '2020-02-04 07:53:06', '2020-07-08 09:22:31'),
(198, 198, 'توفيق سائد', NULL, 1, NULL, NULL, NULL, NULL, 1, 35, 0, '2020-02-05', '2020-03-05', 1, 1, 1, 1, 0, NULL, '2020-02-04 07:53:59', '2020-07-08 09:21:48'),
(199, 199, 'ممدوح احمد', '63', 2, 592111232, NULL, NULL, 'uploads/players/images/2020/02/21/1582245331.jpeg', 3, 0, 40, '2020-02-21', '2020-03-22', 1, 1, 2, 2, 0, NULL, '2020-02-20 22:35:31', '2020-07-08 09:21:21'),
(200, 200, 'محمد منصور', NULL, 2, NULL, '30121', NULL, 'uploads/players/images/2020/02/21/1582245681.jpeg', 1, 30, 0, '2020-02-21', '2020-03-21', 1, 1, 2, NULL, 0, NULL, '2020-02-20 22:41:21', '2020-07-08 09:20:59'),
(201, 201, 'asma', NULL, 2, NULL, NULL, NULL, 'uploads/players/images/2020/02/21/1582245331.jpeg', 1, 40, 0, '2020-02-20', '2020-03-03', 1, 1, 2, 1, 1, 1, '2020-02-21 10:59:39', '2020-03-03 15:31:49'),
(205, 205, 'صالح ابو المعرين', NULL, 1, NULL, NULL, NULL, 'uploads/players/images/2020/02/29/1582978074.jpeg', 1, 35, 0, '2020-02-29', '2020-03-29', 1, 1, 1, 1, 0, 1, '2020-02-29 10:18:00', '2020-03-03 15:30:37'),
(206, 206, 'ثائر اسعد', '66', 1, NULL, '30012', NULL, 'uploads/players/images/2020/02/29/1582978074.jpeg', 1, 35, 0, '2020-03-04', '2020-04-04', 1, 1, 1, 1, 0, NULL, '2020-03-04 11:41:22', '2020-07-08 09:21:11'),
(207, 207, 'مصطفى فرج الله', NULL, 1, NULL, NULL, NULL, 'uploads/players/images/2020/03/04/1583329390.jpeg', 3, 0, 35, '2020-03-04', '2020-04-04', 1, 1, 1, NULL, 0, NULL, '2020-03-04 11:43:10', '2020-07-08 09:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `male_paid` varchar(20) NOT NULL,
  `female_paid` varchar(20) NOT NULL,
  `img` varchar(191) NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_updated_by_foreign` (`updated_by`),
  KEY `settings_deleted_by_foreign` (`deleted_by`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `male_paid`, `female_paid`, `img`, `updated_by`, `is_delete`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Sport club', '35', '40', 'uploads/logo/1583256476.jpeg', 4, 0, NULL, '2020-02-28 12:52:31', '2020-07-08 09:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `activated_id` int(11) NOT NULL DEFAULT '1',
  `img` varchar(255) DEFAULT 'uploads/users/aa.jpg',
  `role` int(1) DEFAULT '1',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_created_by_foreign` (`created_by`),
  KEY `users_updated_by_foreign` (`updated_by`),
  KEY `users_deleted_by_foreign` (`deleted_by`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `activated_id`, `img`, `role`, `created_by`, `updated_by`, `is_delete`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'أحمد عابد', 'ahmed@gmail.com', NULL, '$2y$10$tCe7NiM7nCMX7OtJnIBOqua1qCKSnwJtu/CgWTkj//890rFrYhWy6', 'pIwCTMBpEMVeYxBc1BKeNgTu9FEBJTcRiqfxhFi1Nw7genlYf8cvteL1iP2D', 1, 'uploads/users/ahmed.jpg', 1, NULL, NULL, 0, NULL, '2019-10-28 09:49:13', '2019-10-28 09:49:13'),
(3, 'هاني عابد', 'hani@gmail.com', NULL, '$2y$10$SuS2leU7nSLXIhHOYn6Jxu5wJNLHEiGwLRgHlk8BZJg31aWb1.vZW', '1wg7FlJpzNDBy26h0w0qupBmDLIjjSdMFW0jTVOXbkxoxLAjSoFe4g6WqmR0', 1, 'uploads/users/hani.jpg', 1, NULL, NULL, 0, NULL, '2019-10-28 09:49:13', '2019-10-28 09:49:13'),
(2, 'وسام', 'wesam@gmail.com', NULL, '$2y$10$gVsAnu4FSmTwQURks7Dz8uNO51hwqLtzfz/2TuJrnlJZ2IsDbx1S2', 'wLP9fSGwYBiAFA4NMuuU13iwYDfRuKgzeMPSL8ZI9yxzYXcYs0137U78OOUV', 1, 'uploads/users/wesam.jpg', 2, NULL, NULL, 0, NULL, '2019-10-28 09:49:13', '2019-10-28 09:49:13'),
(4, 'Ahmed', 'mamdouh.abed@gmail.com', NULL, '$2y$10$gVsAnu4FSmTwQURks7Dz8uNO51hwqLtzfz/2TuJrnlJZ2IsDbx1S2', '', 1, 'uploads/users/ahmed.jpg', 1, NULL, NULL, 0, NULL, '2019-10-28 09:49:13', '2019-10-28 09:49:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`paid_id`) REFERENCES `paids` (`id`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
