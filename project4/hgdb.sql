-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: hgdb
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `entryid` int(10) NOT NULL AUTO_INCREMENT,
  `clname` varchar(130) NOT NULL,
  `clexist` tinyint(4) NOT NULL,
  `clid` varchar(10) DEFAULT NULL,
  `cltype` varchar(5) NOT NULL,
  `clsubtype` varchar(5) DEFAULT NULL,
  `clformat` varchar(10) DEFAULT NULL,
  `clcostrg1` float DEFAULT NULL,
  `clmax` int(3) DEFAULT NULL,
  `clreghow` char(1) DEFAULT NULL,
  `cldesc` longtext,
  `clhiname` varchar(100) DEFAULT NULL,
  `claddress1` varchar(100) DEFAULT NULL,
  `claddress2` varchar(100) DEFAULT NULL,
  `clcity` varchar(25) DEFAULT NULL,
  `clstate` varchar(2) DEFAULT NULL,
  `clzip` char(5) DEFAULT NULL,
  `clphone` varchar(20) DEFAULT NULL,
  `cldatead` datetime DEFAULT NULL,
  `cldatestr` date DEFAULT NULL,
  `cltimestr` time DEFAULT NULL,
  `cltimeend` time DEFAULT NULL,
  `cldatest02` date DEFAULT NULL,
  `cltimest02` time DEFAULT NULL,
  `cltimeen02` time DEFAULT NULL,
  `clapproved` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`entryid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (3,'bc3',0,'','bc','','Series',35,NULL,NULL,'gdfgdsfgd','Dublin','222 ohio st','','Dublin','OH','22553','6082222222','2020-05-02 08:07:12','2020-05-14','18:00:00','20:00:00',NULL,NULL,NULL,1),(4,'bc3',0,'','bc','','Series',35,NULL,NULL,'gdfgdsfgd','Dublin','222 ohio st','','Dublin','OH','22553','6082222222','2020-05-02 08:49:59','2020-05-14','18:00:00','20:00:00',NULL,NULL,NULL,1),(6,'cbe',0,'','cbe','','Series',55,NULL,NULL,'dfgdfsgdsf','Dublin','552 Ohio St','','Dublin','OH','22553','6082222222','2020-05-02 13:08:50','2020-05-14','18:00:00','20:00:00',NULL,NULL,NULL,0),(7,'bct',0,'','Tour','','Scn',20,12,'P','dgfdsgfsd','Dublin','222 Ohio St','','Dublin','OH','22253','6082222222','2020-05-03 21:57:02','2020-05-11','18:00:00','19:00:00',NULL,NULL,NULL,0),(8,'cbe live',1,'2222','cbe','','Scn',60,8,'C','dsfsdfdsafsd','Dublin','553 Ohio Fast St','Room B3','Dublin','OH','22553','6082299900','2020-05-03 23:15:16','2020-05-13','18:30:00','19:30:00','2020-05-15','17:00:00','18:00:00',0),(9,'CBE2',1,'22334','cbe','','Scn',50,5,'P','sdfsda','Dublin','220 Ohio St','','Dublin','OH','22553','6082222222','2020-05-04 00:33:40','2020-05-21','19:00:00','20:00:00',NULL,'00:00:00','00:00:00',0);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `client` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `userpw` varchar(255) NOT NULL,
  `userdatead` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Hgs','rlee','Rebecca','Lee','rlee@healthgrades.com',NULL,'7acb896e2328413de34c2eff02398f02eae3c441',NULL),(2,'Ohio','rleeo','Rebecca','Lee','rlee@healthgrades.com','6082222222','30f6843d4965aa3f3d76ef4f56c126f3bcb93532','2020-05-03 12:10:29'),(10,'Ohio','rl11','Reb','Lee','rlee@yahoo.com','6022033300','99ea7bf70f6e69ad71659995677b43f8a8312025','2020-05-03 18:57:54'),(11,'Ohio','rl52','Reb','Lee','rlee@yahoo.com','6022033300','99ea7bf70f6e69ad71659995677b43f8a8312025','2020-05-04 00:07:06');
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

-- Dump completed on 2020-05-04  0:37:21
