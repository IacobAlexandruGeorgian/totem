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
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table totem_contact.contacts: ~10 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `gender`, `CNP`, `birth_date`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Amos Bashirian', 'male', '0750239870105', '2018-02-20', 'zander.ferry@example.org', '1998-07-03 13:38:37', NULL, NULL),
	(2, 'Benedict Heathcote', 'male', '1439535543786', '2008-11-26', 'aniyah62@example.org', '2015-03-09 20:27:04', '2024-10-26 12:06:36', '2024-10-26 12:06:36'),
	(3, 'Addie Bogisich', 'male', '8044426633477', '2006-11-07', 'alex.gulgowski@example.net', '1985-05-19 13:06:56', NULL, NULL),
	(4, 'Ms. Anne Haley Sr.', 'female', '6034398497434', '2008-06-23', 'wtowne@example.org', '1997-08-22 04:48:37', NULL, NULL),
	(5, 'Cayla Bogan', 'female', '3227243876766', '2020-07-10', 'qmueller@example.net', '1988-01-03 02:43:01', NULL, NULL),
	(6, 'Ella O\'Hara MD', 'male', '0580525165418', '2023-07-26', 'edwardo36@example.com', '2007-01-12 14:57:06', NULL, NULL),
	(7, 'Celine Kihn Sr.23', 'male', '8754722729497', '1976-03-18', 'tconnelly@example.org', '2022-08-18 17:54:29', '2024-10-26 13:31:31', '2024-10-26 12:05:37'),
	(8, 'Mr. Tyler Kemmer MD', 'female', '2956767323904', '1979-04-17', 'mariam79@example.org', '1978-06-23 05:21:21', NULL, NULL),
	(9, 'Pablo Durgan', 'male', '6925837007287', '2023-11-10', 'vkihn@example.net', '1991-04-08 15:12:15', NULL, NULL),
	(10, 'Rodrick Morissette', 'female', '3158467387744', '1972-07-25', 'amanda33@example.com', '1994-08-09 05:11:03', NULL, NULL),
	(11, 'Iacob Alexandru-Georgian', 'male', '1111111111111', '2024-10-09', 'iacobalex11@yahoo.com', '2024-10-26 13:34:07', '2024-10-26 13:36:31', '2024-10-26 13:36:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table totem_contact.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(4, '2024-10-25-102938', 'App\\Database\\Migrations\\CreateContactsTable', 'default', 'App', 1729941888, 1),
	(5, '2024-10-26-112042', 'App\\Database\\Migrations\\CreatePhonesTable', 'default', 'App', 1729941888, 1);

-- Dumping structure for table totem_contact.phones
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int unsigned NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_contact_id_foreign` (`contact_id`),
  CONSTRAINT `phones_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table totem_contact.phones: ~24 rows (approximately)
INSERT INTO `phones` (`id`, `contact_id`, `phone_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '1488267593', '2012-02-10 13:15:59', NULL, NULL),
	(2, 1, '9615069231', '2004-02-11 04:20:33', NULL, NULL),
	(3, 1, '6639829371', '2012-07-26 10:45:59', NULL, NULL),
	(4, 2, '1396833347', '2021-06-15 19:01:31', '2024-10-26 13:33:30', '2024-10-26 13:33:30'),
	(5, 2, '2137316843', '1984-06-14 19:51:06', '2024-10-26 13:33:30', '2024-10-26 13:33:30'),
	(6, 3, '4923544460', '1983-02-02 21:33:52', NULL, NULL),
	(7, 3, '8572726776', '1992-01-30 13:25:10', NULL, NULL),
	(8, 3, '8725946322', '1971-01-29 06:43:52', NULL, NULL),
	(9, 4, '3612328291', '1996-07-16 09:34:23', NULL, NULL),
	(10, 4, '1067902169', '1971-05-05 15:02:25', NULL, NULL),
	(11, 5, '6460267517', '1988-07-22 06:45:47', NULL, NULL),
	(12, 5, '7754012807', '1978-09-14 17:56:31', NULL, NULL),
	(13, 6, '4851830132', '2014-10-23 20:26:26', NULL, NULL),
	(14, 6, '5301704689', '2017-07-19 00:33:09', NULL, NULL),
	(15, 6, '4444682820', '2015-05-24 10:35:12', NULL, NULL),
	(16, 7, '7022442593', '2020-12-20 14:23:39', '2024-10-26 13:33:14', '2024-10-26 13:33:14'),
	(17, 8, '0851545775', '1979-08-04 17:57:53', NULL, NULL),
	(18, 9, '8529599949', '1974-05-04 13:12:30', NULL, NULL),
	(19, 9, '8355533816', '1983-10-06 04:57:40', NULL, NULL),
	(20, 9, '0774695602', '2023-04-03 06:25:28', NULL, NULL),
	(21, 10, '1835793748', '1973-11-19 02:20:38', NULL, NULL),
	(22, 10, '8768688652', '2019-10-12 23:57:32', NULL, NULL),
	(23, 10, '9061377919', '1989-05-01 10:37:26', NULL, NULL),
	(24, 7, '2222222222', '2024-10-26 13:31:31', '2024-10-26 13:33:14', '2024-10-26 13:33:14'),
	(25, 11, '0758848066', '2024-10-26 13:34:07', '2024-10-26 13:36:31', '2024-10-26 13:36:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
