-- MySQL dump 10.15  Distrib 10.0.32-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: transferzurich
-- ------------------------------------------------------
-- Server version	10.0.32-MariaDB-0+deb8u1

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `short` varchar(10) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Schweiz','CH'),(2,'Deutschland','D'),(3,'Östereich','A'),(4,'Frankreich','F'),(5,'Italien','I'),(6,'Lichtenstein','LI'),(28,'Test','te'),(29,'Test','te');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destination` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(80) NOT NULL,
  `country_fs` int(11) DEFAULT NULL,
  `region_fs` int(11) DEFAULT NULL,
  `dist_from_zrh` int(11) DEFAULT NULL,
  `dist_from_bsl` int(11) DEFAULT NULL,
  `dist_from_alt` int(11) DEFAULT NULL,
  `route_from_zrh` varchar(255) DEFAULT NULL,
  `route_from_bsl` varchar(255) DEFAULT NULL,
  `route_from_alt` varchar(255) DEFAULT NULL,
  `time_zrh` time DEFAULT NULL,
  `time_bsl` time DEFAULT NULL,
  `time_alt` time DEFAULT NULL,
  `breaks` time DEFAULT NULL,
  `traffic_jam_surcharge` time DEFAULT NULL,
  `search_at_place` time DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `maut_fs` int(11) DEFAULT NULL,
  `suntransfers` tinyint(1) DEFAULT '0',
  `foxtravels` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`destination_id`),
  KEY `country_fs` (`country_fs`),
  KEY `region_fs` (`region_fs`),
  KEY `maut_fs` (`maut_fs`),
  CONSTRAINT `destination_ibfk_1` FOREIGN KEY (`country_fs`) REFERENCES `country` (`country_id`),
  CONSTRAINT `destination_ibfk_2` FOREIGN KEY (`region_fs`) REFERENCES `region` (`region_id`),
  CONSTRAINT `destination_ibfk_3` FOREIGN KEY (`maut_fs`) REFERENCES `maut` (`maut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destination`
--

LOCK TABLES `destination` WRITE;
/*!40000 ALTER TABLE `destination` DISABLE KEYS */;
INSERT INTO `destination` VALUES (1,'Strausburg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0);
/*!40000 ALTER TABLE `destination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL AUTO_INCREMENT,
  `initials` varchar(8) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `places_fs` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `drivers_license` varchar(255) NOT NULL,
  `drivers_license_back` varchar(255) NOT NULL,
  `identity_card` varchar(255) NOT NULL,
  `identitiy_card_back` varchar(255) NOT NULL,
  PRIMARY KEY (`driver_id`),
  UNIQUE KEY `initials` (`initials`),
  UNIQUE KEY `drivers_license` (`drivers_license`),
  UNIQUE KEY `drivers_license_back` (`drivers_license_back`),
  UNIQUE KEY `identity_card` (`identity_card`),
  UNIQUE KEY `identitiy_card_back` (`identitiy_card_back`),
  KEY `places_fs` (`places_fs`),
  CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`places_fs`) REFERENCES `places` (`places_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driver`
--

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel` varchar(150) NOT NULL,
  `hotel_url` varchar(255) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `places_fs` int(11) NOT NULL,
  `country_fs` int(11) NOT NULL,
  `destination_fs` int(11) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `places_fs` (`places_fs`),
  KEY `country_fs` (`country_fs`),
  KEY `destination_fs` (`destination_fs`),
  CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`places_fs`) REFERENCES `places` (`places_id`),
  CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`country_fs`) REFERENCES `country` (`country_id`),
  CONSTRAINT `hotel_ibfk_3` FOREIGN KEY (`destination_fs`) REFERENCES `destination` (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_transfer`
--

DROP TABLE IF EXISTS `income_transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_passenger` varchar(255) NOT NULL,
  `datum` varchar(50) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `pick_up_time` varchar(50) NOT NULL,
  `flight_from_to` varchar(255) DEFAULT NULL,
  `transfer_type_fs` int(11) DEFAULT NULL,
  `special_needs` varchar(255) DEFAULT NULL,
  `number_passengers` varchar(10) NOT NULL,
  `baby_passengers` varchar(60) DEFAULT NULL,
  `toddler_passengers` varchar(60) DEFAULT NULL,
  `kid_passengers` varchar(60) DEFAULT NULL,
  `destination_fs` int(11) NOT NULL,
  `landing_takeoff_time` varchar(30) DEFAULT NULL,
  `flight_number` varchar(15) DEFAULT NULL,
  `terminal` varchar(15) DEFAULT NULL,
  `phone_passenger` varchar(20) NOT NULL,
  `suitcase_big` int(11) DEFAULT NULL,
  `suitcase_medium` int(11) DEFAULT NULL,
  `suitcase_small` int(11) DEFAULT NULL,
  `ski_snowboard` int(11) DEFAULT NULL,
  `other_luggage` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `accept_link` varchar(255) NOT NULL,
  `decline_link` varchar(255) NOT NULL,
  `hotel_fs` int(11) DEFAULT NULL,
  `driver_fs` int(11) DEFAULT NULL,
  `vehicle_fs` int(11) DEFAULT NULL,
  `trailer` tinyint(1) DEFAULT NULL,
  `partner_fs` int(11) DEFAULT NULL,
  `project_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_fs` (`partner_fs`),
  KEY `vehicle_fs` (`vehicle_fs`),
  KEY `driver_fs` (`driver_fs`),
  KEY `hotel_fs` (`hotel_fs`),
  KEY `destination_fs` (`destination_fs`),
  KEY `transfer_type_fs` (`transfer_type_fs`),
  CONSTRAINT `income_transfer_ibfk_1` FOREIGN KEY (`partner_fs`) REFERENCES `partner` (`partner_id`),
  CONSTRAINT `income_transfer_ibfk_2` FOREIGN KEY (`vehicle_fs`) REFERENCES `vehicle` (`vehicle_id`),
  CONSTRAINT `income_transfer_ibfk_3` FOREIGN KEY (`driver_fs`) REFERENCES `driver` (`driver_id`),
  CONSTRAINT `income_transfer_ibfk_4` FOREIGN KEY (`hotel_fs`) REFERENCES `hotel` (`hotel_id`),
  CONSTRAINT `income_transfer_ibfk_5` FOREIGN KEY (`destination_fs`) REFERENCES `destination` (`destination_id`),
  CONSTRAINT `income_transfer_ibfk_6` FOREIGN KEY (`transfer_type_fs`) REFERENCES `transfer_type` (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_transfer`
--

LOCK TABLES `income_transfer` WRITE;
/*!40000 ALTER TABLE `income_transfer` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_transfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maut`
--

DROP TABLE IF EXISTS `maut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maut` (
  `maut_id` int(11) NOT NULL AUTO_INCREMENT,
  `maut_strecke` varchar(100) NOT NULL,
  `maut_preis_saison_pw` float NOT NULL,
  `maut_preis_ohne_saison_pw` float NOT NULL,
  `maut_preis_saison_bus` float NOT NULL,
  `maut_preis_ohne_saison_bus` float NOT NULL,
  `maut_preis_saison_bus_anhaenger` float NOT NULL,
  `maut_preis_ohne_saison_bus_anhaenger` float NOT NULL,
  `maut_bemerkung` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`maut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maut`
--

LOCK TABLES `maut` WRITE;
/*!40000 ALTER TABLE `maut` DISABLE KEYS */;
INSERT INTO `maut` VALUES (1,'Keine',0,0,0,0,0,0,NULL),(3,'Fähre',12,0,0,0,0,0,'Kuuhl'),(4,'färhe',12,12,12,12,12,0,'kuuhl'),(5,'Mega Kuuhli fahre',12,12,12,12,1212,0,'ja ka'),(6,'Testli',12,12,12,12,12,0,'TEste'),(7,'test2',12,12,12,12,12,12,'test2');
/*!40000 ALTER TABLE `maut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(100) NOT NULL,
  PRIMARY KEY (`partner_id`),
  UNIQUE KEY `partner_name` (`partner_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner`
--

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `places_id` int(11) NOT NULL AUTO_INCREMENT,
  `plz` varchar(20) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`places_id`),
  UNIQUE KEY `plz` (`plz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(50) NOT NULL,
  `country_fs` int(11) NOT NULL,
  PRIMARY KEY (`region_id`),
  KEY `country_fs` (`country_fs`),
  CONSTRAINT `region_ibfk_1` FOREIGN KEY (`country_fs`) REFERENCES `country` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Keine',1),(7,'Chur',1),(8,'Test ',5),(9,'Berlin',2),(10,'Berlin',2),(11,'Berlin',2),(12,'Test ',3),(13,'5',5);
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_entry`
--

DROP TABLE IF EXISTS `task_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_entry` (
  `id_task_entry` int(11) NOT NULL,
  `contractor` varchar(45) DEFAULT NULL,
  `project_number` varchar(45) DEFAULT NULL,
  `accept_link` varchar(255) NOT NULL,
  `decline_link` varchar(255) NOT NULL,
  `lead_passenger` varchar(45) DEFAULT NULL,
  `datum` varchar(45) DEFAULT NULL,
  `transfer_type` varchar(150) DEFAULT NULL,
  `special_needs` varchar(45) DEFAULT NULL,
  `phone_passenger` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `number_passengers` varchar(45) DEFAULT NULL,
  `baby_passengers` varchar(45) DEFAULT NULL,
  `toddler_passengers` varchar(45) DEFAULT NULL,
  `kid_passengers` varchar(45) DEFAULT NULL,
  `suitcase_big` varchar(45) DEFAULT NULL,
  `suitcase_medium` varchar(45) DEFAULT NULL,
  `suitcase_small` varchar(45) DEFAULT NULL,
  `ski_snowboard` varchar(45) DEFAULT NULL,
  `other_luggage` varchar(45) DEFAULT NULL,
  `origin` varchar(150) DEFAULT NULL,
  `origin_address` varchar(255) NOT NULL,
  `pickup_time` varchar(45) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `destination_address` varchar(255) NOT NULL,
  `landing_takeoff_time` varchar(45) DEFAULT NULL,
  `flight_from_to` varchar(20) DEFAULT NULL,
  `flightnumber` varchar(45) DEFAULT NULL,
  `terminal` varchar(45) DEFAULT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_entry`
--

LOCK TABLES `task_entry` WRITE;
/*!40000 ALTER TABLE `task_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_type`
--

DROP TABLE IF EXISTS `transfer_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_type` (
  `transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_type` varchar(30) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_type`
--

LOCK TABLES `transfer_type` WRITE;
/*!40000 ALTER TABLE `transfer_type` DISABLE KEYS */;
INSERT INTO `transfer_type` VALUES (1,'cash');
/*!40000 ALTER TABLE `transfer_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dkalchofner','$2a$10$mBJ5WO3t6xQD./lXJkZg1ezH88d6.5w/aU0/mDzwFtcH7ASflm0A6'),(2,'jwidmer','$2a$10$biL2BaeZoqHdaSaX2RdF/OboiyuJbSBOLGLCWMSxm9fhs5LpqX/w.'),(3,'dokerwin','$2a$10$Q1NfVtXpmIqcV40LNnwozu3Gj7GOskqN7MKJ.b.72Ht4XUF9FUWva'),(6,'dmutluay','$2a$10$F/XH/PLQ8uyIPM2dLj3yMus5Erjdmb21UayFVpJDJMvqnqNzUB4hO'),(7,'lauriquio','$2a$10$0MsYsVX2E6wgIZXJrcTSOOaX6U.EQMDcFnaJhMnnoj5ZLArbOSdlO');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(60) NOT NULL,
  `vehicle_seats` int(50) NOT NULL,
  `vehicle_license_plate` varchar(255) NOT NULL,
  `created_data_on` date NOT NULL,
  `vehicle_km_stand` int(11) DEFAULT NULL,
  `vehicle_garage` varchar(200) NOT NULL,
  `vehicle_next_service` date DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `vehicle_license_plate` (`vehicle_license_plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'transferzurich'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-12  2:06:22
