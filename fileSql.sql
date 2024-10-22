-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: db_bookstore
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_05_24_004423_add_column_timestamp_table_categories',2),(5,'2024_05_24_004725_add_column_timestamp_table_product',3),(6,'2024_05_24_010437_add_column_timestamp_table_slides',4),(7,'2024_05_24_011505_add_colum_timestamps_table_config',4),(8,'2024_05_24_011743_add_colum_timestamps_table_ps',5),(9,'2024_05_24_015132_add_colum_timestamps_table_order',6),(10,'2024_05_24_015214_add_colum_timestamps_table_orderd',6),(11,'2024_05_24_030357_add_colum_timestamps_table_listimg',7),(12,'2024_05_24_030822_add_colum_timestamps_table_size',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('106cwPRic97tP4q96jlmi86O2bMRCKtAmBXbFpsk',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicThUb0tzS2lTaDdrWEd2dkRhdVliTER0SDBSYlRXaEdqOEk2OVFuWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiQ2FydCI7YTozOntpOjE7YTo1OntzOjI6ImlkIjtzOjE6IjEiO3M6NDoibmFtZSI7czoyNzoiTGV2ZW50cyBXZWxsbmVzcyBUZWUvIFdoaXRlIjtzOjU6InByaWNlIjtzOjY6IjMxMDAwMCI7czoxMDoiaW1hZ2VfcGF0aCI7czo0MzoiL3N0b3JhZ2UvcHJvZHVjdC8vVFB0N3AwZFhrS3NPZUlSckhpTVkuanBlZyI7czo4OiJxdWFudGl0eSI7aToxO31pOjEwO2E6NTp7czoyOiJpZCI7czoyOiIxMCI7czo0OiJuYW1lIjtzOjI6ImhoIjtzOjU6InByaWNlIjtzOjQ6IjEwMDAiO3M6MTA6ImltYWdlX3BhdGgiO3M6NDM6Ii9zdG9yYWdlL3Byb2R1Y3QyLzNjVlRoQU5UTGU1YlYwNXM1dnpxLndlYnAiO3M6ODoicXVhbnRpdHkiO2k6MTt9aToyO2E6NTp7czoyOiJpZCI7czoxOiIyIjtzOjQ6Im5hbWUiO3M6MTA6IsOBbyBzxqEgbWkiO3M6NToicHJpY2UiO3M6NjoiMTAwMDAwIjtzOjEwOiJpbWFnZV9wYXRoIjtzOjQyOiIvc3RvcmFnZS9wcm9kdWN0L1hMZGVxNzNCbHp3TGFiQXEwRVVMLndlYnAiO3M6ODoicXVhbnRpdHkiO2k6MTt9fX0=',1716536960),('lwrD4nXpVEJpzjSCKLsUHfq7cU9kvdAtNRlNVIVO',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmlvVTdGeFN3UnFxWHdqaWJsQkV0dkNFWEJFTDVPMzRnNDM3eTAwTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9vcmRlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiQ2FydCI7YToxOntpOjE7YTo1OntzOjI6ImlkIjtzOjE6IjEiO3M6NDoibmFtZSI7czoyNzoiTGV2ZW50cyBXZWxsbmVzcyBUZWUvIFdoaXRlIjtzOjU6InByaWNlIjtzOjY6IjMxMDAwMCI7czoxMDoiaW1hZ2VfcGF0aCI7czo0MzoiL3N0b3JhZ2UvcHJvZHVjdC8vVFB0N3AwZFhrS3NPZUlSckhpTVkuanBlZyI7czo4OiJxdWFudGl0eSI7czoxOiIyIjt9fX0=',1721816271);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categories`
--

DROP TABLE IF EXISTS `tb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categories`
--

LOCK TABLES `tb_categories` WRITE;
/*!40000 ALTER TABLE `tb_categories` DISABLE KEYS */;
INSERT INTO `tb_categories` VALUES (1,'StreetWear',NULL,NULL,NULL,NULL),(2,'Tops',1,NULL,NULL,NULL),(3,'Sweaters',1,NULL,NULL,NULL),(4,'Bags',NULL,NULL,NULL,NULL),(5,'Shoes',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_configurations`
--

DROP TABLE IF EXISTS `tb_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_configurations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_configurations`
--

LOCK TABLES `tb_configurations` WRITE;
/*!40000 ALTER TABLE `tb_configurations` DISABLE KEYS */;
INSERT INTO `tb_configurations` VALUES (1,'Facebook','https://www.facebook.com/profile.php?id=100049833090265&locale=vi_VN','2024-05-23 18:15:37','2024-05-23 18:15:37');
/*!40000 ALTER TABLE `tb_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_list_images`
--

DROP TABLE IF EXISTS `tb_list_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_list_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `image_name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_list_images`
--

LOCK TABLES `tb_list_images` WRITE;
/*!40000 ALTER TABLE `tb_list_images` DISABLE KEYS */;
INSERT INTO `tb_list_images` VALUES (6,10,'/storage/product2/m5d4hVYX9lfZQ1L7cUYQ.webp','shoe 1 2.webp','2024-05-23 20:09:04','2024-05-23 20:09:04'),(7,10,'/storage/product2/ZtmtGSedAnXBebk76MKi.webp','shoe 1 3.webp','2024-05-23 20:09:04','2024-05-23 20:09:04'),(8,2,'/storage/product/3HjA2RbQE0dEhqaNBiQC.webp','hood 1.webp','2024-05-24 00:10:20','2024-05-24 00:10:20'),(9,2,'/storage/product/yfPnlWgv0JU24r8Hfwk1.webp','hood 2.webp','2024-05-24 00:10:20','2024-05-24 00:10:20'),(10,3,'/storage/product/FRaetiRkJsLspltwsSLL.png','ao3.png','2024-05-24 00:11:08','2024-05-24 00:11:08'),(11,3,'/storage/product/d9EqHCar449YNaW7jguX.png','ao4.png','2024-05-24 00:11:09','2024-05-24 00:11:09'),(12,3,'/storage/product/0XSliNNuwabZAEyhkatU.png','ao5.png','2024-05-24 00:11:09','2024-05-24 00:11:09'),(13,9,'/storage/product/WQCePpbgIyvGhEdpqurI.webp','shoe 1 2.webp','2024-05-24 00:12:48','2024-05-24 00:12:48'),(14,9,'/storage/product/cyPxXCP0ZBGw76qtfyW0.webp','shoe 1 3.webp','2024-05-24 00:12:48','2024-05-24 00:12:48'),(15,9,'/storage/product/XJL1Td155ug64Eiwyb4e.webp','shoe 1.webp','2024-05-24 00:12:48','2024-05-24 00:12:48'),(16,7,'/storage/product/5YFy3qJ5dUaUGLQnL6gM.png','ao4.png','2024-05-24 00:13:54','2024-05-24 00:13:54'),(17,7,'/storage/product/2xuEMzLToiZjcCjPlISz.png','ao5.png','2024-05-24 00:13:54','2024-05-24 00:13:54'),(18,7,'/storage/product/0gcuVAqios80aKINBhiR.png','ao6.png','2024-05-24 00:13:54','2024-05-24 00:13:54'),(19,8,'/storage/product/TCtTJ5fZlAprtgIeAsbq.webp','over 1 2.webp','2024-05-24 00:14:51','2024-05-24 00:14:51'),(20,8,'/storage/product/KCaGeIWWGcvI8Mr1SGWk.jpeg','over 1 3.jpeg','2024-05-24 00:14:51','2024-05-24 00:14:51');
/*!40000 ALTER TABLE `tb_list_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orderdetails`
--

DROP TABLE IF EXISTS `tb_orderdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_orderdetails` (
  `id_Order` int DEFAULT NULL,
  `id_Product` int DEFAULT NULL,
  `total_price` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orderdetails`
--

LOCK TABLES `tb_orderdetails` WRITE;
/*!40000 ALTER TABLE `tb_orderdetails` DISABLE KEYS */;
INSERT INTO `tb_orderdetails` VALUES (1,1,'310000','1','2024-05-23 18:53:14','2024-05-23 18:53:14'),(2,1,'310000','1','2024-05-23 18:54:31','2024-05-23 18:54:31'),(3,1,'310000','1','2024-05-23 22:12:35','2024-05-23 22:12:35'),(4,1,'310000','1','2024-05-23 22:14:05','2024-05-23 22:14:05'),(5,1,'310000','1','2024-05-23 22:15:44','2024-05-23 22:15:44'),(6,1,'310000','1','2024-05-23 22:17:29','2024-05-23 22:17:29'),(6,10,'1000','1','2024-05-23 22:17:29','2024-05-23 22:17:29'),(7,1,'310000','1','2024-05-24 00:36:36','2024-05-24 00:36:36'),(7,10,'1000','1','2024-05-24 00:36:36','2024-05-24 00:36:36'),(7,2,'100000','1','2024-05-24 00:36:36','2024-05-24 00:36:36');
/*!40000 ALTER TABLE `tb_orderdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_orders`
--

DROP TABLE IF EXISTS `tb_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `address_city` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `code_zip` varchar(15) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_orders`
--

LOCK TABLES `tb_orders` WRITE;
/*!40000 ALTER TABLE `tb_orders` DISABLE KEYS */;
INSERT INTO `tb_orders` VALUES (1,'nguyễn thị linh','Số 210, Thành Trì, Hoàng Mai','Hà Nội','0834802680','12345','ilovejapansong@gmail.com','directcheck','2024-05-23 18:53:14','2024-05-23 18:53:14'),(2,'nguyễn thị linh','Số 210, Thành Trì, Hoàng Mai','Hà Nội','0834802680','12345','ilovejapansong@gmail.com','directcheck','2024-05-23 18:54:31','2024-05-23 18:54:31'),(3,'Nguyễn Thị Thảo Phương','Số nhà 15','Hà Nội','033840593','123','thaophuong102003@gmail.com','directcheck','2024-05-23 22:12:35','2024-05-23 22:12:35'),(4,'Nguyễn Thị Út Linh','Số 16','TP Hồ Chí Minh','013848541','12345','belinhcute8386@gmail.com','directcheck','2024-05-23 22:14:05','2024-05-23 22:14:05'),(5,'nguyễn sơn tùng','Ha Noi','TP Hồ Chí Minh','0834802680','123','ilovejapansong@gmail.com','directcheck','2024-05-23 22:15:44','2024-05-23 22:15:44'),(6,'Nguyễn Thị Út Linh','Số 210','TP Hồ Chí Minh','0834802680','12345','belinhcute8386@gmail.com','directcheck','2024-05-23 22:17:29','2024-05-23 22:17:29'),(7,'Ngô Văn Đức','Ha Noi','Hà Nội','0834802680','123','ilovejapansong@gmail.com','directcheck','2024-05-24 00:36:36','2024-05-24 00:36:36');
/*!40000 ALTER TABLE `tb_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_product_sizes`
--

DROP TABLE IF EXISTS `tb_product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_product_sizes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `size_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_product_sizes`
--

LOCK TABLES `tb_product_sizes` WRITE;
/*!40000 ALTER TABLE `tb_product_sizes` DISABLE KEYS */;
INSERT INTO `tb_product_sizes` VALUES (1,10,1,'2024-05-23 20:09:04','2024-05-23 20:09:04'),(2,10,2,'2024-05-23 20:09:04','2024-05-23 20:09:04'),(3,2,2,'2024-05-24 00:10:20','2024-05-24 00:10:20'),(4,2,3,'2024-05-24 00:10:20','2024-05-24 00:10:20'),(5,2,4,'2024-05-24 00:10:20','2024-05-24 00:10:20'),(6,3,2,'2024-05-24 00:11:09','2024-05-24 00:11:09'),(7,3,4,'2024-05-24 00:11:09','2024-05-24 00:11:09'),(8,4,4,'2024-05-24 00:11:58','2024-05-24 00:11:58'),(9,4,5,'2024-05-24 00:11:58','2024-05-24 00:11:58'),(10,9,6,'2024-05-24 00:12:48','2024-05-24 00:12:48'),(11,9,7,'2024-05-24 00:12:48','2024-05-24 00:12:48'),(12,6,5,'2024-05-24 00:13:17','2024-05-24 00:13:17'),(13,7,2,'2024-05-24 00:13:54','2024-05-24 00:13:54'),(14,8,8,'2024-05-24 00:14:51','2024-05-24 00:14:51'),(15,8,9,'2024-05-24 00:14:51','2024-05-24 00:14:51'),(16,8,2,'2024-05-24 00:14:51','2024-05-24 00:14:51');
/*!40000 ALTER TABLE `tb_product_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_products`
--

DROP TABLE IF EXISTS `tb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_products` (
  `id` int NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `id_Cate` int DEFAULT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `view` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_products`
--

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;
INSERT INTO `tb_products` VALUES (1,'Levents Wellness Tee/ White',310000,NULL,NULL,'Áo form boxy 2.0 có độ dài được cải tiến từ form boxy, dạng như chiếc hộp vuông, chiều dài áo ngắn hơn thắt lưng.',2,'/storage/product//TPt7p0dXkKsOeIRrHiMY.jpeg','over 2 1.jpeg','2024-05-23 17:49:26','2024-07-24 02:37:47',NULL,NULL),(2,'Áo sơ mi',100000,NULL,NULL,'Chất liệu thoáng mát, phù hợp với người trưởng thành',2,'/storage/product/XLdeq73BlzwLabAq0EUL.webp','hood 1.webp','2024-05-23 19:03:40','2024-05-24 00:10:20',NULL,NULL),(3,'Váy trắng',100000,NULL,NULL,'Phù hợp cho các chị em phụ nữ',3,'/storage/product/0NX4xG4FVZ0JfDdYhfxI.png','ao4.png','2024-05-23 19:45:57','2024-07-24 03:14:47',NULL,NULL),(4,'Áo hai dây',111000,NULL,NULL,'Thoáng mát dễ chịu',2,'/storage/product/y6WleNPmHyTlF7tXgktm.png','ao3.png','2024-05-23 19:56:46','2024-05-24 00:11:58',NULL,NULL),(5,'Áo đẹp',10000,NULL,NULL,'KKK',4,'/storage/product2/taHNtP5T2wm3a07LXsdO.png','ao1.png','2024-05-23 20:01:23','2024-05-23 20:01:23',NULL,NULL),(6,'Áo đẹp 1',10000,NULL,NULL,'Màu vàng',3,'/storage/product/7HLHPViI0ieylZcdtaQm.png','ao1.png','2024-05-23 20:01:48','2024-05-24 00:13:17',NULL,NULL),(7,'Áo đẹp 2',100000,NULL,NULL,'Áo nhiều màu',2,'/storage/product/kjEWWQqG4SIdfvAeh6Ko.png','ao6.png','2024-05-23 20:03:09','2024-05-24 00:13:54',NULL,NULL),(8,'Áo đẹp Levents',100001,NULL,NULL,'Mang chất lượng vượt thời gian',4,'/storage/product/Pql9gGLIOXcumvHSSzey.webp','over 1 2.webp','2024-05-23 20:04:45','2024-05-24 00:14:51',NULL,NULL),(9,'Dép tổ ong',1000,NULL,NULL,'Dép thời chiến rất bền, màu đen',5,'/storage/product/0MbA6s3yt9KckFKVj9cE.webp','shoe 1 2.webp','2024-05-23 20:08:05','2024-05-24 00:12:48',NULL,NULL),(10,'Dép đen',120000,NULL,NULL,'Dép bền',5,'/storage/product/GWXj49uxvK4fnQUk57Q2.webp','shoe 1 2.webp','2024-05-23 20:09:04','2024-05-24 00:15:18',NULL,NULL);
/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sizes`
--

DROP TABLE IF EXISTS `tb_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_sizes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sizes`
--

LOCK TABLES `tb_sizes` WRITE;
/*!40000 ALTER TABLE `tb_sizes` DISABLE KEYS */;
INSERT INTO `tb_sizes` VALUES (1,'H','2024-05-23 20:09:04','2024-05-23 20:09:04'),(2,'L','2024-05-23 20:09:04','2024-05-23 20:09:04'),(3,'XL','2024-05-24 00:10:20','2024-05-24 00:10:20'),(4,'S','2024-05-24 00:10:20','2024-05-24 00:10:20'),(5,'XS','2024-05-24 00:11:58','2024-05-24 00:11:58'),(6,'43','2024-05-24 00:12:48','2024-05-24 00:12:48'),(7,'42','2024-05-24 00:12:48','2024-05-24 00:12:48'),(8,'D','2024-05-24 00:14:51','2024-05-24 00:14:51'),(9,'K','2024-05-24 00:14:51','2024-05-24 00:14:51');
/*!40000 ALTER TABLE `tb_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_slides`
--

DROP TABLE IF EXISTS `tb_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_slides` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_slides`
--

LOCK TABLES `tb_slides` WRITE;
/*!40000 ALTER TABLE `tb_slides` DISABLE KEYS */;
INSERT INTO `tb_slides` VALUES (1,'DirtyCoin','Lady and gentlemen','/storage/slider/ZaQxABwdpHPoxruFmA91.jpg','carousel-1.jpg',NULL,'2024-05-23 23:55:41'),(2,'Lycy','Yumi and Lucy','/storage/slider/k5DQFBQKlpAN3XUoB6Ii.jpg','carousel-1.jpg',NULL,'2024-05-23 23:55:06'),(3,'DirtyCoin','Beauty and sweet','/storage/slider/Jj4xUtw5pJCybBc1gc2n.jpg','carousel-1.jpg','2024-05-23 19:39:38','2024-05-23 23:54:39');
/*!40000 ALTER TABLE `tb_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `token` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-22 22:23:38
