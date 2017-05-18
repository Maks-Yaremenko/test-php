-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `ingredient_recipe`
--

DROP TABLE IF EXISTS `ingredient_recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient_recipe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredient_recipe_recipe_id_index` (`recipe_id`),
  KEY `ingredient_recipe_ingredient_id_index` (`ingredient_id`),
  CONSTRAINT `ingredient_recipe_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ingredient_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_recipe`
--

LOCK TABLES `ingredient_recipe` WRITE;
/*!40000 ALTER TABLE `ingredient_recipe` DISABLE KEYS */;
INSERT INTO `ingredient_recipe` VALUES (3,29,28,'6 шт','2017-05-12 07:03:37','2017-05-12 07:03:37'),(4,29,4,'2 шт','2017-05-12 07:03:37','2017-05-12 07:03:37'),(5,29,29,'1 шт','2017-05-12 07:03:37','2017-05-12 07:03:37'),(6,29,30,'1 упаковка','2017-05-12 07:03:37','2017-05-12 07:03:37'),(7,29,31,'2 шт','2017-05-12 07:03:37','2017-05-12 07:03:37'),(250,77,312,'1 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(251,77,313,'1 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(252,77,314,'4 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(253,77,315,'2 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(254,77,316,'4 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(255,78,317,'6 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(256,78,318,'7 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(257,78,319,'8 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(258,78,320,'5 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(259,78,321,'7 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(260,79,322,'5 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(261,79,323,'4 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(262,79,324,'5 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(263,79,325,'9 шт','2017-05-17 07:32:12','2017-05-17 07:32:12'),(264,79,326,'4 шт','2017-05-17 07:32:12','2017-05-17 07:32:12');
/*!40000 ALTER TABLE `ingredient_recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (4,'2017-05-08 08:24:58','2017-05-08 08:24:58','Морковь'),(28,'2017-05-12 07:02:40','2017-05-12 07:02:40','Картофель'),(29,'2017-05-12 07:02:49','2017-05-12 07:02:49','Лук'),(30,'2017-05-12 07:03:09','2017-05-12 07:03:09','Томатная паста'),(31,'2017-05-12 07:03:18','2017-05-12 07:03:18','Буряк'),(312,'2017-05-17 07:32:12','2017-05-17 07:32:12','Durgan Inc'),(313,'2017-05-17 07:32:12','2017-05-17 07:32:12','Quigley-Durgan'),(314,'2017-05-17 07:32:12','2017-05-17 07:32:12','Konopelski, Legros and Corkery'),(315,'2017-05-17 07:32:12','2017-05-17 07:32:12','Hahn LLC'),(316,'2017-05-17 07:32:12','2017-05-17 07:32:12','Jerde Inc'),(317,'2017-05-17 07:32:12','2017-05-17 07:32:12','Lindgren Ltd'),(318,'2017-05-17 07:32:12','2017-05-17 07:32:12','Considine Ltd'),(319,'2017-05-17 07:32:12','2017-05-17 07:32:12','Ebert Ltd'),(320,'2017-05-17 07:32:12','2017-05-17 07:32:12','Collier, Kuhn and Wiegand'),(321,'2017-05-17 07:32:12','2017-05-17 07:32:12','Rath, McGlynn and Kilback'),(322,'2017-05-17 07:32:12','2017-05-17 07:32:12','Daniel Inc'),(323,'2017-05-17 07:32:12','2017-05-17 07:32:12','Weimann, Donnelly and Koch'),(324,'2017-05-17 07:32:12','2017-05-17 07:32:12','Torphy-Erdman'),(325,'2017-05-17 07:32:12','2017-05-17 07:32:12','Blanda-Cole'),(326,'2017-05-17 07:32:12','2017-05-17 07:32:12','Kuvalis PLC');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_05_08_080138_create_ingredients_table',1),(4,'2017_05_08_080207_create_recipes_table',1),(6,'2017_05_08_132859_create_ingredient_recipe_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (29,'2017-05-12 07:03:37','2017-05-12 07:03:37','Борщ украинский','Всем известный рецепт борща'),(77,'2017-05-17 07:32:11','2017-05-17 07:32:11','Earline','Queen. \'Never!\' said the Pigeon. \'I\'m NOT a serpent, I tell you, you coward!\' and at last she stretched her arms folded, frowning like a sky-rocket!\' \'So you did, old fellow!\' said the Caterpillar..'),(78,'2017-05-17 07:32:11','2017-05-17 07:32:11','Giovanny','King, rubbing his hands; \'so now let the jury--\' \'If any one left alive!\' She was a good deal on where you want to see what was on the other two were using it as you can--\' \'Swim after them!\'.'),(79,'2017-05-17 07:32:11','2017-05-17 07:32:11','Rebecca','I don\'t know of any one; so, when the tide rises and sharks are around, His voice has a timid and tremulous sound.] \'That\'s different from what I get\" is the capital of Rome, and Rome--no, THAT\'S.');
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'MAKSIM','peugeot_307@mail.ru','$2y$10$jjnr8rvWWbsrZB2j5VidbO0PjPygYtkVP6nk1aCMiUya0S8zesrmS','dM7rKYUkScM9orx5dJ6cbV1cG2OhCmGpGcfNydFiRHUAWBIy47EKxJseHFq7','2017-05-17 05:30:44','2017-05-17 05:30:44'),(21,'admin','admin@gmail.com','$2y$10$sFN.NyxmyJ/rLgvg4zXtkOdWpMWkzrE2IdwrHgXecajH6rwvoAsK.',NULL,'2017-05-17 07:32:11','2017-05-17 07:32:11');
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

-- Dump completed on 2017-05-17 19:39:35
