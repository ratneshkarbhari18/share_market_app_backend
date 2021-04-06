-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: astro_app
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `daily_horoscopes`
--

DROP TABLE IF EXISTS `daily_horoscopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_horoscopes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `data` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_horoscopes`
--

LOCK TABLES `daily_horoscopes` WRITE;
/*!40000 ALTER TABLE `daily_horoscopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_horoscopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `contact_number` text NOT NULL,
  `birth_date` text NOT NULL,
  `birth_month` text NOT NULL,
  `birth_year` text NOT NULL,
  `birth_hour` text NOT NULL,
  `birth_minute` text NOT NULL,
  `birth_second` text NOT NULL,
  `birth_place` text NOT NULL,
  `service` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,'Ratnesh','Male','9137976398','28','September','1993','00','30','57','Mumbai','Kundli Matching');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (4,'New Item 1','New Item Text 1'),(5,'Test notif 1 from server','Test notif 1 details '),(6,'New Item 1 from Server','New Item 1 Details from Server'),(7,'New Item 1 from Server latest','New Item 1 Details from Server latest'),(8,'Test Notif from Server','Server Notif Body'),(9,'Server notification title','server notification body'),(10,'Server notification title','server notification body');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_data`
--

DROP TABLE IF EXISTS `page_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `home_carousel_images` longtext NOT NULL,
  `address` text NOT NULL,
  `contact_number` text NOT NULL,
  `email` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_data`
--

LOCK TABLES `page_data` WRITE;
/*!40000 ALTER TABLE `page_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (3,'Ratnesh','Karbhari','9137976398','MessaHello kaise ho?');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_images`
--

DROP TABLE IF EXISTS `slider_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_images`
--

LOCK TABLES `slider_images` WRITE;
/*!40000 ALTER TABLE `slider_images` DISABLE KEYS */;
INSERT INTO `slider_images` VALUES (3,'1617693996_4335ae7315a8becce081.jpg'),(4,'1617694004_7605730fe35fa3c9ab56.jpg'),(5,'1617694012_9897d988d2fa8c379a00.jpg');
/*!40000 ALTER TABLE `slider_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ratnesh','Karbhari','ratneshkarbhari74@gmail.com','$2y$10$Rw.BIbApcJUOmVFvFIyRVeae4l2sLiW5NhNeNvsOzQ1LwO/Q.JBfS','admin','active'),(6,'Ratnesh','Karbhari','ratneshkarbhari74@gmail.com','$2y$10$e2FVEgx7vaOT4AVpl/QHmu3fGOEWys8PP58DpZL2k3z592R0la.V2','subscriber','active'),(7,'Ratnvh','bhkb','rkarbhari23@gmail.com','$2y$10$FTW4DsRjLzfxdktJiHEfauQONjhdmnnldvLIYa6PVbbCJni5ijt2G','subscriber','active'),(8,'Satish','kandregula','satish.m.kandregula@gmail.com','$2y$10$CwN9wL55OCoc0KjTieTFUOPS5H96U28JMFr7Cx6GkWc4IkGerxUTS','subscriber','active'),(9,'Satish','kandregula','merlinragnarok1987@gmail.com@gmail.com','$2y$10$5qfqx/jr/wYSn5gRZSosVucd.2Fiq16HxAjl7KXQCBKO4HB.DhExi','subscriber','active'),(10,'test','user','abc@gmail.com','$2y$10$zPcpbc454pf3cfIwZD6dn.sI7NjZaMgvuoCeegjRtk38hKJS/r.wm','subscriber','active'),(11,'Ratnesh','Karbhari','ratneshkarbhari23@gmail.com','$2y$10$0cvr3YDp5HV3MdrYSnC7N.FHpMn7kY82Xe5PnfuWw4DA.1jIaEHXS','subscriber','active'),(12,'Test ','User','testuser@gmail.com','$2y$10$Hi83KZ8WHQFWIlDgsR9Cb.THGsbCie1DwREjMNli9VbiWXk47Q4ba','subscriber','active'),(13,'Dummy ','User','','$2y$10$pmnl.EIY2de6LgYR5dgv5OoZ8ztvfoYdsw95HLDbBec.plHocGP82','subscriber','active'),(14,'testuser2','test user 2 surname','testuser2@gmail.com','$2y$10$RNejmiAIQODOjvcYc8B.huCKZ78PTlraOp6KG95ZM6LFn.LezVZqS','subscriber','active');
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

-- Dump completed on 2021-04-06  7:28:54
