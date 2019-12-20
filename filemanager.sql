-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: algo_filemanager
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `configs`
--



DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` VALUES (1,'site_name','LaravelFileManager','2019-12-19 05:58:57','2019-12-19 05:58:57'),(2,'show_footer_message','1','2019-12-19 05:58:57','2019-12-19 05:58:57');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `file_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_extension` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` bigint(20) NOT NULL,
  `file_hash` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,1,1,'SampleVideo_1280x720_1mb.mp4','mp4',1055736,'ZsxGsWo5XgWng5LgM7g3gDJX1v9TXFdJQMGxq4vF.mp4','2019-12-19 06:28:34','2019-12-20 05:02:34',''),(2,1,1,'image001.png','png',58850,'qzZi2JoxQ3C7hpm0VjzSsxdqQBmfkIszIlhLsmgT.png','2019-12-19 06:29:17','2019-12-20 04:59:16',''),(3,1,2,'SampleVideo_1280x720_1mb (1).mp4','mp4',1055736,'wzmyozxL7kAfi9jMPxbGjjohwTtCJSKHyXreNhow.mp4','2019-12-19 06:57:21','2019-12-19 06:57:21',''),(4,1,2,'image001 (1).png','png',58850,'3hsDvl4254ZXL40z6Dr5xumNdx3L4b9GQnMYn8sq.png','2019-12-19 06:57:44','2019-12-19 06:57:44',''),(5,1,2,'Dist_upload_test_v1_01Dec2019 (24).xlsx','xlsx',12741,'cmOLyynOay1ML9MDnTxAAMq7IaA6PLulaGB3DvwT.xlsx','2019-12-19 06:57:45','2019-12-20 05:31:10',''),(6,1,4,'image001.png','png',58850,'u5eKWrs0usqKgJrxAUGfdHE9U23m36zAq1KFlAs8.png','2019-12-19 07:22:59','2019-12-20 02:14:27','hfghfg'),(7,1,5,'image001 (2).png','png',58850,'qSCqvFnk0HayzSkuayssBGj8xjAGnP08MteKkItU.png','2019-12-19 07:55:47','2019-12-20 01:26:44',''),(8,1,4,'image001 (2).png','png',58850,'tgP5YcAHDjAkH7AXRw8PITKehLmgcRrPTdZsSiKW.png','2019-12-19 08:00:43','2019-12-20 05:32:22',''),(10,1,3,'image001 (2).png','png',58850,'POgeMEFRIm09BKoXG767qtGjTJGIwy4Jd5jya40Z.png','2019-12-19 08:08:09','2019-12-20 01:04:48','Awsome buddy'),(11,1,6,'SampleVideo_640x360_1mb.mp4','mp4',1057551,'mcGpmFYFP4SyctVf0wRQQe0yeEMOhWXlScNupJUy.mp4','2019-12-20 09:11:52','2019-12-20 09:24:37','dsfsdfsdf'),(12,1,2,'file_example_MP4_480_1_5MG.mp4','mp4',1570024,'JKg2y3DboO58TijrzQnC8l4vXJGJPVQLPa3WpRyk.mp4','2019-12-20 09:14:20','2019-12-20 09:14:20','dsfsdfsdf');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `folder_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_folder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folders`
--

LOCK TABLES `folders` WRITE;
/*!40000 ALTER TABLE `folders` DISABLE KEYS */;
INSERT INTO `folders` VALUES (1,1,'Sample one','lallala',0,'2019-12-19 06:25:30','2019-12-19 06:25:30',0),(2,1,'Akhram New','All About ML',0,'2019-12-19 06:57:05','2019-12-19 06:57:05',1),(3,1,'Akhram 2','sssss',0,'2019-12-19 06:58:13','2019-12-19 06:58:13',1),(4,1,'Uncategorised','dddddd gjgh',0,'2019-12-19 07:06:09','2019-12-19 08:45:09',0),(5,1,'child folder','fghgf',0,'2019-12-19 07:25:23','2019-12-19 07:25:23',1),(6,1,'child folder 2','asdsa',0,'2019-12-19 07:25:52','2019-12-19 07:25:52',3);
/*!40000 ALTER TABLE `folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_08_24_181052_create_files_table',1),(4,'2017_08_24_181416_create_folders_table',1),(5,'2017_08_27_180410_alter_folders_table',1),(6,'2017_08_30_142329_alter_users_table_user_type',1),(7,'2017_08_30_144307_create_configs_table',1),(8,'2017_09_01_111352_alter_users_table_disk_quota',1),(9,'2019_12_19_133350_alter_file_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `disk_quota` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kartik k','kartiksky10@gmail.com','$2y$10$KZ9nGIuNE6vRWXxtqXf4o.ix7QMbMNsI02vW4oIFbVWdEol0vBPZO','zlB4Hf8zmFs29cxk4m9ILEToH7Ovmsjdi9UOp9tyUKcrvg7Up1QV5OEzB1e0','2019-12-19 06:00:57','2019-12-19 06:00:57','user','0');
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

-- Dump completed on 2019-12-20 20:35:09
