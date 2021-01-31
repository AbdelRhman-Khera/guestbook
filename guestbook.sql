-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2021 at 11:57 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

DROP TABLE IF EXISTS `msgs`;
CREATE TABLE IF NOT EXISTS `msgs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name` varchar(191) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `msgs_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `user_id`, `user_name`, `msg`, `created_at`, `updated_at`) VALUES
(1, 7, 'hjh', 'nnmnm', '2021-01-30 20:21:19', NULL),
(2, 7, 'hjh', 'nnmnmjjj', '2021-01-30 20:21:19', NULL),
(3, 7, 'Bryar Wiley', 'ghg', '2021-01-30 20:55:23', NULL),
(4, 7, 'Bryar Wiley', 'hello\r\n', '2021-01-30 20:56:03', NULL),
(9, 8, 'Wesley Reed', 'qwqhjhj', '2021-01-30 21:38:40', '2021-01-30 21:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `msg_id` bigint(20) UNSIGNED DEFAULT NULL,
  `replay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `replies_user_id_foreign` (`user_id`),
  KEY `replies_msg_id_foreign` (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `msg_id`, `replay`, `created_at`, `user_name`) VALUES
(1, 8, 4, 'fffnn', '2021-01-30 21:28:28', 'Wesley Reed'),
(2, 8, 4, 'hgggkk', '2021-01-30 21:32:02', 'Wesley Reedh'),
(3, 8, 9, 'fgfgfgff', '2021-01-30 21:38:46', 'Wesley Reed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `created_at`) VALUES
(1, 'Moana Ewing', 'mynyc@mailinator.com', '$2y$10$I4cichTK.uGHjYfziWIDf.YvF30fzPuu.jmgn3BZY/Yi10W4sqfHW', '80f9e0cdcb7fd144473f9eaaf42a14927cc6157bd52d5c0613b6a2138ed3475d', '2021-01-30 16:55:17'),
(7, 'Bryar Wiley', 'redugapy@mailinator.com', '$2y$10$Y5JmrlgEWB9dISxP/gJ7le6se7hX4w3D6PsXXZB/WdPyKxZVOU9oa', '6d5bcbdda51cae28142465ff392da01e59241970d93ea25320798000c80d042b', '2021-01-30 19:35:12'),
(6, 'test', 'test@test.com', '$2y$10$ZxIQ359UH6dPTX/X6udwku3aIKy5vE/G9MkJbQsaDsp98IiU8.sqK', '112982979dd3495c09a81a16139ea34660ecf64ad67bda7b348f97b724f8c299', '2021-01-30 19:23:59'),
(5, 'Gisela Tran', 'vonumon@mailinator.com', '$2y$10$oj9LJHmV1SWpVh4DYM.Nb.cuztOTKvmBORkGJSVyvOw821tvbHZWa', 'd03b9fd67dcabeb5af0f97fc35631734d469956f93b84ad61255782416033d32', '2021-01-30 19:07:56'),
(8, 'Wesley Reed', 'hexytyq@mailinator.com', '$2y$10$hFpw4NpmFxc04uwCdIiwAeUFcigPcHN/PHmLv3aIXdsWlDV.QvNzq', '75d2a4b955aba68f675224546c360d1f30ecd90af31159c047df26658e805fd4', '2021-01-30 21:02:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
