# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: mini_pos
# Generation Time: 2020-09-21 09:21:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Mamun Sarkar','mamun@gmail.com',NULL,'$2y$10$RAwgPgU98KPXl0.pQaeF5e5MDVyqbt2QnZJk1F2f.hJVXh2Qg3MkW',NULL,NULL,NULL,NULL,NULL),
	(2,'Jone Done','jone@example.com',NULL,'$2y$10$RAwgPgU98KPXl0.pQaeF5e5MDVyqbt2QnZJk1F2f.hJVXh2Qg3MkW',NULL,NULL,NULL,'2020-08-29 04:22:17','2020-08-29 04:22:17');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(2,'Laptop',NULL,NULL),
	(3,'Computer','2020-08-25 14:34:59','2020-08-25 14:34:59'),
	(4,'Computer','2020-08-25 14:35:17','2020-08-25 14:35:17'),
	(5,'Shirt','2020-08-25 14:35:26','2020-08-25 14:35:26'),
	(6,'User Guide','2020-08-25 14:35:54','2020-08-25 14:35:54'),
	(8,'TV','2020-08-25 14:42:04','2020-08-25 14:42:04');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Customer',NULL,NULL),
	(2,'Supplier',NULL,NULL),
	(3,'Bank',NULL,NULL),
	(4,'Owner','2020-08-22 05:17:49','2020-08-22 05:17:49'),
	(7,'Investor','2020-08-22 05:27:49','2020-08-22 05:27:49');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_admins_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2020_08_20_140107_create_users_table',1),
	(5,'2020_08_20_140145_create_groups_table',1),
	(6,'2020_08_20_140634_create_products_table',1),
	(7,'2020_08_20_140705_create_categories_table',1),
	(8,'2020_08_20_140736_create_sale_invoices_table',1),
	(9,'2020_08_20_140800_create_sale_items_table',1),
	(10,'2020_08_20_140828_create_purchase_invoices_table',1),
	(11,'2020_08_20_140846_create_purchase_items_table',1),
	(12,'2020_08_20_140903_create_payments_table',1),
	(13,'2020_08_20_140925_create_receipts_table',1),
	(14,'2020_08_29_041825_add_admin',2),
	(15,'2020_09_03_141625_update_payment_and_receipt_note',3),
	(17,'2020_09_06_134357_add_note_to_sales_and_purchase_table',4),
	(18,'2020_09_08_135325_add_invoice_id_on_payments_and_receipts',5);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `purchase_invoice_id` bigint(20) unsigned DEFAULT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

INSERT INTO `payments` (`id`, `admin_id`, `user_id`, `purchase_invoice_id`, `amount`, `date`, `note`, `created_at`, `updated_at`)
VALUES
	(1,1,1,NULL,100,'2020-08-23','',NULL,NULL),
	(4,NULL,1,NULL,200,'2020-09-03','asfasd','2020-09-03 14:18:33','2020-09-03 14:18:33'),
	(7,2,1,NULL,600,'2020-09-05',NULL,'2020-09-05 04:35:19','2020-09-05 04:35:19'),
	(8,1,1,NULL,700,'2020-09-05',NULL,'2020-09-05 04:36:10','2020-09-05 04:36:10'),
	(14,2,3,2,1000,'2020-09-10',NULL,'2020-09-10 14:17:51','2020-09-10 14:17:51'),
	(15,2,3,NULL,100,'2020-09-10',NULL,'2020-09-10 14:35:01','2020-09-10 14:35:01'),
	(16,2,3,NULL,200,'2020-09-10',NULL,'2020-09-10 14:35:14','2020-09-10 14:35:14'),
	(17,2,3,NULL,100,'2020-09-10',NULL,'2020-09-10 14:40:15','2020-09-10 14:40:15'),
	(18,2,3,NULL,700,'2020-09-10',NULL,'2020-09-10 14:43:15','2020-09-10 14:43:15'),
	(20,2,4,4,6000,'2020-09-12',NULL,'2020-09-12 03:59:48','2020-09-12 03:59:48'),
	(21,2,4,5,400,'2020-09-13',NULL,'2020-09-13 05:10:10','2020-09-13 05:10:10');

/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cost_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `cost_price`, `price`, `created_at`, `updated_at`)
VALUES
	(1,5,'HP Probook 450 G4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',400,500,NULL,'2020-09-06 14:37:24'),
	(2,3,'Logitech Keyboard','The title must be a string.\r\nThe title field is required.\r\nThe description must be a string.\r\nThe description field is required.\r\nThe category id field is required.',200,300,'2020-08-27 14:27:55','2020-09-06 14:37:47');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table purchase_invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_invoices`;

CREATE TABLE `purchase_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `challan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `purchase_invoices` WRITE;
/*!40000 ALTER TABLE `purchase_invoices` DISABLE KEYS */;

INSERT INTO `purchase_invoices` (`id`, `admin_id`, `user_id`, `challan_no`, `date`, `note`, `created_at`, `updated_at`)
VALUES
	(2,2,3,'23234','2020-09-10',NULL,'2020-09-10 14:17:05','2020-09-10 14:17:05'),
	(3,2,3,'23234','2020-09-10',NULL,'2020-09-10 14:33:59','2020-09-10 14:33:59'),
	(4,2,4,'23234','2020-09-12',NULL,'2020-09-12 03:58:58','2020-09-12 03:58:58'),
	(5,2,4,NULL,'2020-09-13',NULL,'2020-09-13 04:59:56','2020-09-13 04:59:56');

/*!40000 ALTER TABLE `purchase_invoices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table purchase_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_items`;

CREATE TABLE `purchase_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `purchase_invoice_id` bigint(20) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `purchase_items` WRITE;
/*!40000 ALTER TABLE `purchase_items` DISABLE KEYS */;

INSERT INTO `purchase_items` (`id`, `product_id`, `purchase_invoice_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`)
VALUES
	(5,1,2,1,400,400,'2020-09-10 14:17:24','2020-09-10 14:17:24'),
	(6,2,2,3,200,600,'2020-09-10 14:17:39','2020-09-10 14:17:39'),
	(7,1,3,1,400,400,'2020-09-10 14:34:11','2020-09-10 14:34:11'),
	(8,1,4,20,300,6000,'2020-09-12 03:59:21','2020-09-12 03:59:21'),
	(9,2,4,10,200,2000,'2020-09-12 03:59:36','2020-09-12 03:59:36'),
	(10,1,5,2,200,400,'2020-09-13 05:00:06','2020-09-13 05:00:06');

/*!40000 ALTER TABLE `purchase_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table receipts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `receipts`;

CREATE TABLE `receipts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `sale_invoice_id` bigint(20) unsigned DEFAULT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;

INSERT INTO `receipts` (`id`, `admin_id`, `user_id`, `sale_invoice_id`, `amount`, `date`, `note`, `created_at`, `updated_at`)
VALUES
	(1,1,1,NULL,300,'2020-08-23','',NULL,NULL),
	(4,NULL,1,NULL,100,'2020-09-05','New Receipt','2020-09-05 04:23:27','2020-09-05 04:23:27'),
	(5,2,1,NULL,200,'2020-09-05','hello','2020-09-05 04:27:09','2020-09-05 04:27:09'),
	(9,2,3,8,500,'2020-09-08',NULL,'2020-09-08 14:20:43','2020-09-08 14:20:43'),
	(10,2,3,8,400,'2020-09-08',NULL,'2020-09-08 14:21:17','2020-09-08 14:21:17'),
	(11,2,3,9,500,'2020-09-08',NULL,'2020-09-08 14:23:12','2020-09-08 14:23:12'),
	(12,2,3,NULL,100,'2020-09-08',NULL,'2020-09-08 14:23:29','2020-09-08 14:23:29'),
	(14,2,3,NULL,800,'2020-09-10',NULL,'2020-09-10 14:33:42','2020-09-10 14:33:42'),
	(15,2,3,NULL,100,'2020-09-10',NULL,'2020-09-10 14:35:29','2020-09-10 14:35:29'),
	(16,2,3,NULL,200,'2020-09-10',NULL,'2020-09-10 14:40:54','2020-09-10 14:40:54'),
	(17,2,3,NULL,600,'2020-09-10',NULL,'2020-09-10 14:44:33','2020-09-10 14:44:33'),
	(18,2,4,NULL,700,'2020-09-13',NULL,'2020-09-13 05:18:00','2020-09-13 05:18:00'),
	(19,2,3,NULL,20000,'2020-09-15',NULL,'2020-09-15 13:30:47','2020-09-15 13:30:47');

/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_invoices`;

CREATE TABLE `sale_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `challan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sale_invoices` WRITE;
/*!40000 ALTER TABLE `sale_invoices` DISABLE KEYS */;

INSERT INTO `sale_invoices` (`id`, `admin_id`, `user_id`, `challan_no`, `date`, `note`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'1213','2020-08-12',NULL,NULL,NULL),
	(2,1,1,'3543','2020-12-12',NULL,NULL,NULL),
	(3,2,1,'243','2020-09-06','Test note','2020-09-06 13:57:05','2020-09-06 13:57:05'),
	(4,2,1,'235434','2020-09-06','This is note','2020-09-06 14:54:43','2020-09-06 14:54:43'),
	(5,2,3,'2134','2020-09-06','Test Node','2020-09-06 15:14:47','2020-09-06 15:14:47'),
	(8,2,3,'243','2020-09-06',NULL,'2020-09-06 15:24:30','2020-09-06 15:24:30'),
	(9,2,3,'235434','2020-09-08',NULL,'2020-09-08 14:22:44','2020-09-08 14:22:44'),
	(11,2,3,'23234','2020-09-10',NULL,'2020-09-10 14:34:33','2020-09-10 14:34:33'),
	(12,2,3,'23234','2020-09-13',NULL,'2020-09-13 04:40:35','2020-09-13 04:40:35');

/*!40000 ALTER TABLE `sale_invoices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sale_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sale_items`;

CREATE TABLE `sale_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `sale_invoice_id` bigint(20) unsigned NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sale_items` WRITE;
/*!40000 ALTER TABLE `sale_items` DISABLE KEYS */;

INSERT INTO `sale_items` (`id`, `product_id`, `sale_invoice_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`)
VALUES
	(7,1,1,2,500,1000,'2020-09-06 15:11:05','2020-09-06 15:11:05'),
	(9,1,4,1,500,500,'2020-09-06 15:12:07','2020-09-06 15:12:07'),
	(11,1,4,2,400,800,'2020-09-06 15:13:33','2020-09-06 15:13:33'),
	(12,1,5,1,500,500,'2020-09-06 15:15:02','2020-09-06 15:15:02'),
	(13,2,5,2,200,400,'2020-09-06 15:15:16','2020-09-06 15:15:16'),
	(15,1,8,1,500,500,'2020-09-06 15:24:43','2020-09-06 15:24:43'),
	(16,2,8,2,200,400,'2020-09-06 15:24:54','2020-09-06 15:24:54'),
	(17,1,9,1,500,500,'2020-09-08 14:23:00','2020-09-08 14:23:00'),
	(19,2,11,1,200,200,'2020-09-10 14:34:46','2020-09-10 14:34:46'),
	(20,2,12,2,400,800,'2020-09-13 04:40:45','2020-09-13 04:40:45');

/*!40000 ALTER TABLE `sale_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `admin_id`, `group_id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`)
VALUES
	(3,NULL,1,'Jone','jone@gmail.com','23045093245',NULL,'2020-08-23 04:55:04','2020-08-23 04:55:04'),
	(4,NULL,1,'Jone New','jone_new@gmail.com','230450932',NULL,'2020-08-23 04:55:33','2020-08-23 04:55:33');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
