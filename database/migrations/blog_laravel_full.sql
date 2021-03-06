-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 10, 2020 at 06:54 AM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_laravel`
--
CREATE DATABASE IF NOT EXISTS `blog_laravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog_laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jesus', 'jesus.ramos@entelgy.com', NULL, '$2y$10$guuDzIj5svH7nSsgOw9Rzu2CXW.J9qHBcunjJRGx/Zri6gOEvBHtC', 'bljXDKob3GDv0naMwooTWAz8UMnm7iLEoHyN8q6jjO9vAUpevHweOWbp0sNm', '2020-03-20 14:41:51', '2020-03-20 14:41:51'),
(2, 'Jesus Ramos', 'jesus.ramos@gmail.com', NULL, '$2y$10$rwmcpiQnt7QpIyGdilRkNuGbuNCkRMTroiW9IJnV6NIoBq1Od51Wi', NULL, '2020-05-09 11:34:40', '2020-05-09 11:34:40'),
(3, 'Jhon Michael', 'jhon@gmail.com', NULL, '$2y$10$/r4sywuKkKIW4Ek0ER3LqeC4J8.cIeFcZjEsklSYKvlfJtP7wUk36', NULL, '2020-05-10 01:25:57', '2020-05-10 01:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

DROP TABLE IF EXISTS `wall`;
CREATE TABLE IF NOT EXISTS `wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptext` text NOT NULL,
  `pby` varchar(100) NOT NULL,
  `pdate` datetime NOT NULL,
  `pbyid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wall`
--

INSERT INTO `wall` (`id`, `ptext`, `pby`, `pdate`, `pbyid`) VALUES
(23, 'Test of posting', 'Jhon Michael', '2020-05-10 06:27:32', 3),
(22, 'Checking what I can delete', 'Jesus Ramos', '2020-05-10 06:26:59', 2),
(19, 'Prueba de eliminacion', 'Jesus Ramos', '2020-05-07 06:23:36', 2),
(21, 'Test by Jhon', 'Jhon Michael', '2020-05-10 06:26:11', 3),
(24, 'Checking pagination', 'Jhon Michael', '2020-05-10 06:28:28', 3),
(25, 'Testing new sorting for result', 'Jesus Ramos', '2020-05-10 06:51:11', 2),
(15, 'Prueba de enrutamiento', 'Jesus Ramos', '2020-05-10 05:55:35', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
