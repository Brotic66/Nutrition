-- MySQL dump 10.14  Distrib 5.5.53-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	5.5.53-MariaDB-1ubuntu0.14.04.1

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Petit-déjeuné'),(2,'Déjeuné'),(3,'En-cas'),(4,'Diner');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cook`
--

DROP TABLE IF EXISTS `cook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7359C454E899029B` (`plan_id`),
  CONSTRAINT `FK_7359C454E899029B` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cook`
--

LOCK TABLES `cook` WRITE;
/*!40000 ALTER TABLE `cook` DISABLE KEYS */;
INSERT INTO `cook` VALUES (1,1,'Bol express de protéines'),(2,1,'Haricots blancs à la sauce crémeuse'),(3,1,'Fromage blanc au miel'),(4,2,'Salade césar végétarienne'),(5,2,'Tofu à la sauce de jalapeno et de citron vert'),(6,2,'Crêpes à la noix de coco'),(7,4,'Poulet caprese'),(8,4,'Poisson frit à la salsa de pamplemousse'),(9,4,'Steak à la sauce de jalapeno et de citron vert'),(10,3,'Potiron au four à la sauce de fromage blanc'),(11,3,'Salade de quinoa au poulet grillé'),(12,3,'Salade de chicorée'),(13,5,'Nouille de courgettes à la sauce orange-noix de cajou'),(14,5,'Carottes râpées et salade d\'halloumi'),(15,5,'Soupe de tomate caribéenne'),(16,2,'Salade de thon cru');
/*!40000 ALTER TABLE `cook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cook_category`
--

DROP TABLE IF EXISTS `cook_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cook_category` (
  `cook_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`cook_id`,`category_id`),
  KEY `IDX_C225D61DB0D5B835` (`cook_id`),
  KEY `IDX_C225D61D12469DE2` (`category_id`),
  CONSTRAINT `FK_C225D61D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_C225D61DB0D5B835` FOREIGN KEY (`cook_id`) REFERENCES `cook` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cook_category`
--

LOCK TABLES `cook_category` WRITE;
/*!40000 ALTER TABLE `cook_category` DISABLE KEYS */;
INSERT INTO `cook_category` VALUES (1,1),(1,2),(1,3),(1,4),(2,2),(2,4),(3,1),(3,2),(3,3),(3,4),(4,2),(4,4),(5,2),(5,4),(6,1),(6,2),(6,3),(6,4),(7,2),(7,4),(8,2),(8,4),(9,2),(9,4),(10,2),(10,4),(11,2),(11,4),(12,2),(12,4),(13,2),(13,4),(14,2),(14,4),(15,2),(15,3),(16,2),(16,4);
/*!40000 ALTER TABLE `cook_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week_id` int(11) DEFAULT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E5A02990C86F3B2F` (`week_id`),
  CONSTRAINT `FK_E5A02990C86F3B2F` FOREIGN KEY (`week_id`) REFERENCES `week` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
INSERT INTO `day` VALUES (4,3,'2'),(5,3,'3'),(6,3,'4'),(7,3,'5'),(8,3,'6'),(9,3,'7'),(10,4,'2'),(11,4,'3'),(12,4,'4'),(13,4,'5'),(14,4,'6'),(15,4,'7');
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_breakfast`
--

DROP TABLE IF EXISTS `day_breakfast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_breakfast` (
  `day_id` int(11) NOT NULL,
  `breakfast_id` int(11) NOT NULL,
  PRIMARY KEY (`day_id`,`breakfast_id`),
  KEY `IDX_D3BF37689C24126` (`day_id`),
  KEY `IDX_D3BF3768442D22` (`breakfast_id`),
  CONSTRAINT `FK_D3BF3768442D22` FOREIGN KEY (`breakfast_id`) REFERENCES `cook` (`id`),
  CONSTRAINT `FK_D3BF37689C24126` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_breakfast`
--

LOCK TABLES `day_breakfast` WRITE;
/*!40000 ALTER TABLE `day_breakfast` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_breakfast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_dinner`
--

DROP TABLE IF EXISTS `day_dinner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_dinner` (
  `day_id` int(11) NOT NULL,
  `dinner_id` int(11) NOT NULL,
  PRIMARY KEY (`day_id`,`dinner_id`),
  KEY `IDX_2E6AFBE69C24126` (`day_id`),
  KEY `IDX_2E6AFBE6C8B1AA0C` (`dinner_id`),
  CONSTRAINT `FK_2E6AFBE6C8B1AA0C` FOREIGN KEY (`dinner_id`) REFERENCES `cook` (`id`),
  CONSTRAINT `FK_2E6AFBE69C24126` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_dinner`
--

LOCK TABLES `day_dinner` WRITE;
/*!40000 ALTER TABLE `day_dinner` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_dinner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_lunch`
--

DROP TABLE IF EXISTS `day_lunch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_lunch` (
  `day_id` int(11) NOT NULL,
  `lunch_id` int(11) NOT NULL,
  PRIMARY KEY (`day_id`,`lunch_id`),
  KEY `IDX_303CB63F9C24126` (`day_id`),
  KEY `IDX_303CB63FD7C83568` (`lunch_id`),
  CONSTRAINT `FK_303CB63FD7C83568` FOREIGN KEY (`lunch_id`) REFERENCES `cook` (`id`),
  CONSTRAINT `FK_303CB63F9C24126` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_lunch`
--

LOCK TABLES `day_lunch` WRITE;
/*!40000 ALTER TABLE `day_lunch` DISABLE KEYS */;
INSERT INTO `day_lunch` VALUES (4,1),(4,2),(4,3),(5,4),(5,5),(5,6),(6,7),(6,8),(6,9),(7,10),(7,11),(7,12),(8,13),(8,14),(8,15),(9,1),(9,2),(9,3),(10,3),(10,4),(10,5),(10,6),(11,7),(11,8),(11,9),(12,10),(12,11),(12,12),(13,13),(13,14),(13,15),(14,1),(14,2),(14,3),(15,5),(15,6),(15,16);
/*!40000 ALTER TABLE `day_lunch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day_snack`
--

DROP TABLE IF EXISTS `day_snack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day_snack` (
  `day_id` int(11) NOT NULL,
  `snack_id` int(11) NOT NULL,
  PRIMARY KEY (`day_id`,`snack_id`),
  KEY `IDX_C7C170759C24126` (`day_id`),
  KEY `IDX_C7C17075F469C3E0` (`snack_id`),
  CONSTRAINT `FK_C7C17075F469C3E0` FOREIGN KEY (`snack_id`) REFERENCES `cook` (`id`),
  CONSTRAINT `FK_C7C170759C24126` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day_snack`
--

LOCK TABLES `day_snack` WRITE;
/*!40000 ALTER TABLE `day_snack` DISABLE KEYS */;
/*!40000 ALTER TABLE `day_snack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
INSERT INTO `plan` VALUES (1,'Impleo'),(2,'Eques'),(3,'Nitor'),(4,'Opes'),(5,'Vita');
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brice'),(2,'Marina');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `week`
--

DROP TABLE IF EXISTS `week`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5B5A69C0A76ED395` (`user_id`),
  CONSTRAINT `FK_5B5A69C0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `week`
--

LOCK TABLES `week` WRITE;
/*!40000 ALTER TABLE `week` DISABLE KEYS */;
INSERT INTO `week` VALUES (3,1,3),(4,2,1);
/*!40000 ALTER TABLE `week` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-16 17:47:51
