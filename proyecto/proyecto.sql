-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2023 at 06:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230125041935', '2023-01-25 04:20:27', 181),
('DoctrineMigrations\\Version20230128075139', '2023-01-28 07:54:40', 166),
('DoctrineMigrations\\Version20230128164258', '2023-01-28 16:43:14', 221);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

DROP TABLE IF EXISTS `quote`;
CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `name`, `description`) VALUES
(182, 'quote 0', 'Description 1'),
(183, 'quote 1', 'Description 1'),
(184, 'quote 2', 'Description 2'),
(185, 'quote 3', 'Description 3'),
(186, 'quote 4', 'Description 4'),
(187, 'quote 5', 'Description 5'),
(188, 'quote 6', 'Description 6'),
(189, 'quote 7', 'Description 7'),
(190, 'quote 8', 'Description 8'),
(191, 'quote 9', 'Description 9'),
(192, 'quote 10', 'Description 10'),
(193, 'quote 11', 'Description 11'),
(194, 'quote 12', 'Description 12'),
(195, 'quote 13', 'Description 13'),
(196, 'quote 14', 'Description 14'),
(198, 'quote 16', 'Description 16'),
(199, 'quote 17', 'Description 17'),
(200, 'quote 18', 'Description 18'),
(201, 'quote 19', 'Description 19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `biography`, `roles`) VALUES
(107, 'user 0', 'user0@email.com', 'Admin1234', 'Biograpy user0', '[\"ROLE_USER\"]'),
(108, 'user 1', 'user1@email.com', 'Admin1234', 'Biograpy user1', '[\"ROLE_USER\"]'),
(109, 'user 2', 'user2@email.com', 'Admin1234', 'Biograpy user2', '[\"ROLE_USER\"]'),
(110, 'user 3', 'user3@email.com', 'Admin1234', 'Biograpy user3', '[\"ROLE_USER\"]'),
(111, 'user 4', 'user4@email.com', 'Admin1234', 'Biograpy user4', '[\"ROLE_USER\"]'),
(113, 'user 6', 'user6@email.com', 'Admin1234', 'Biograpy user6', '[\"ROLE_USER\"]'),
(114, 'user 7', 'user7@email.com', 'Admin1234', 'Biograpy user7', '[\"ROLE_USER\"]'),
(115, 'user 8', 'user8@email.com', 'Admin1234', 'Biograpy user8', '[\"ROLE_USER\"]'),
(116, 'user 9', 'user9@email.com', 'Admin1234', 'Biograpy user9', '[\"ROLE_USER\"]'),
(117, 'user 10', 'user10@email.com', 'Admin1234', 'Biograpy user10', '[\"ROLE_USER\"]'),
(118, 'user 11', 'user11@email.com', 'Admin1234', 'Biograpy user11', '[\"ROLE_USER\"]'),
(119, 'user 12', 'user12@email.com', 'Admin1234', 'Biograpy user12', '[\"ROLE_USER\"]'),
(120, 'user 13', 'user13@email.com', 'Admin1234', 'Biograpy user13', '[\"ROLE_USER\"]'),
(121, 'user 14', 'user14@email.com', 'Admin1234', 'Biograpy user14', '[\"ROLE_USER\"]'),
(122, 'user 15', 'user15@email.com', 'Admin1234', 'Biograpy user15', '[\"ROLE_USER\"]'),
(123, 'user 16', 'user16@email.com', 'Admin1234', 'Biograpy user16', '[\"ROLE_USER\"]'),
(124, 'user 17', 'user17@email.com', 'Admin1234', 'Biograpy user17', '[\"ROLE_USER\"]'),
(125, 'user 18', 'user18@email.com', 'Admin1234', 'Biograpy user18', '[\"ROLE_USER\"]'),
(126, 'user 19', 'user19@email.com', 'Admin1234', 'Biograpy user19', '[\"ROLE_USER\"]'),
(127, 'Admin', 'admin@email.com', '$2y$13$h92ecCj.rrL1HgC9dX8Twuxa/IRYCZnVExfyhXqwvJfPwxR41nT6C', NULL, '[\"ROLE_ADMIN\"]'),
(128, 'User', 'user@email.com', '$2y$13$zTSVESjLbFu76tzkWyVS5OWZZAU13cLGUqyILzqB03heMVIQblXOm', NULL, '[\"ROLE_USER\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
