-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for totem_contact
CREATE DATABASE IF NOT EXISTS `totem_contact` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `totem_contact`;

-- Dumping structure for table totem_contact.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_general_ci NOT NULL,
  `CNP` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table totem_contact.contacts: ~13 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `gender`, `CNP`, `birth_date`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Micheal Prosacco', 'female', '7310680376861', '1973-09-07', 'flavio24@example.net', '5522309873', '2022-11-29 18:21:49', '2024-10-26 10:35:22', NULL),
	(2, 'London Sawayn', 'female', '6813606596192', '2007-07-13', 'jennings.davis@example.net', '0245289863', '1980-01-08 01:20:25', NULL, NULL),
	(3, 'Keshawn Dietrich', 'male', '8705515158329', '2018-07-13', 'ryan.alia@example.org', '2007035355', '1975-06-16 11:45:25', NULL, NULL),
	(4, 'Miracle Daugherty', 'male', '1344725397717', '1978-12-27', 'trent.dicki@example.com', '1747928494', '1971-10-18 08:47:11', NULL, NULL),
	(5, 'Prince Wuckert', 'male', '0023933088846', '1973-12-29', 'keagan05@example.org', '4549358467', '1997-05-22 11:23:38', NULL, NULL),
	(6, 'Idell Aufderhar', 'female', '3456210045917', '1993-01-26', 'kautzer.gregory@example.org', '0573949330', '2005-07-25 07:32:36', NULL, NULL),
	(7, 'Adonis Kuhlman', 'female', '9677026969581', '2021-06-27', 'barrows.norma@example.org', '1012646903', '2016-03-21 20:59:39', NULL, NULL),
	(8, 'Ward Dach', 'female', '1907978825455', '1975-12-14', 'bemmerich@example.org', '2307670610', '2010-01-08 01:53:53', NULL, NULL),
	(9, 'Mateo Buckridge I', 'female', '6756165508307', '2004-10-30', 'owen54@example.net', '1211541988', '1997-05-31 08:30:28', NULL, NULL),
	(10, 'Merlin Hartmann', 'female', '8689957143221', '2004-05-20', 'ronny.hilpert@example.net', '5942458492', '1980-06-13 06:12:54', NULL, NULL),
	(11, 'Iacob Alexandru-Georgian', 'male', '1111111111111', '2024-10-15', 'iacobalex11@yahoo.com', '0758848066', '2024-10-26 08:19:01', '2024-10-26 10:35:13', NULL),
	(12, 'Iacob Alexandru-Georgian22', 'male', '1111111111211', '2024-10-16', 'iacobalex11@yahoo.com', '0758848066', '2024-10-26 08:22:38', '2024-10-26 10:35:03', NULL),
	(13, 'Iacob Alexandru-Georgian44', 'female', '1111111111133', '2024-10-14', 'iacobalex11@yahoo.com', '0758848066', '2024-10-26 08:28:59', '2024-10-26 10:36:44', '2024-10-26 10:36:44');

-- Dumping structure for table totem_contact.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table totem_contact.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2024-10-25-102938', 'App\\Database\\Migrations\\CreateContactsTable', 'default', 'App', 1729930270, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
