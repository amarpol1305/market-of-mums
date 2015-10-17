-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: mums
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'category','category','2015-10-09 12:57:37',1,0),(2,'Electronics','Electronics','2015-10-09 15:25:49',1,0),(3,'new','new','2015-10-10 12:06:37',1,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charity_master`
--

DROP TABLE IF EXISTS `charity_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charity_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charity_master`
--

LOCK TABLES `charity_master` WRITE;
/*!40000 ALTER TABLE `charity_master` DISABLE KEYS */;
INSERT INTO `charity_master` VALUES (1,'Save the children','Save the children','2015-10-09 12:49:27',1,0),(6,'Barnadoâ€™s','Barnadoâ€™s','2015-10-09 13:37:02',1,0),(7,'Beat Bullying','Beat Bullying','2015-10-09 14:09:53',1,0);
/*!40000 ALTER TABLE `charity_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `param` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (1,2,'',NULL,'2015-10-09 15:28:56',1,0),(5,2,'home equipments','home related devices','2015-10-10 12:26:21',1,0);
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `AID` int(4) NOT NULL AUTO_INCREMENT,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `EmailId` varchar(100) NOT NULL,
  `UName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ActionBy` int(4) NOT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `IsDelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AID`),
  KEY `ActionBy` (`ActionBy`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (2,'sourabh','kale','kalesourabh01@gmail.com','kalesourabh01','d7f9d29e9f78b1c0e4196f29a02a1124',1,1,NULL);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category_master`
--

DROP TABLE IF EXISTS `tbl_category_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category_master` (
  `CAID` int(4) NOT NULL AUTO_INCREMENT,
  `Category` varchar(100) NOT NULL,
  `Details` varchar(300) DEFAULT NULL,
  `RegDT` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`CAID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category_master`
--

LOCK TABLES `tbl_category_master` WRITE;
/*!40000 ALTER TABLE `tbl_category_master` DISABLE KEYS */;
INSERT INTO `tbl_category_master` VALUES (1,'Newborn clothing','Newborn clothing','0000-00-00 00:00:00',0,0),(2,'Baby Girls Clothes','Baby Girls Clothes','0000-00-00 00:00:00',1,0),(3,'Baby Boys Clothes','Baby Boys Clothes','0000-00-00 00:00:00',1,0),(4,'Boys clothes ages 1-4','Boys clothes ages 1-4','0000-00-00 00:00:00',1,0),(5,'category','details','2015-10-08 18:10:33',1,0),(6,'category','details','2015-10-08 18:17:00',1,0),(7,'my category','details','2015-10-08 18:32:10',1,0);
/*!40000 ALTER TABLE `tbl_category_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_charity_master`
--

DROP TABLE IF EXISTS `tbl_charity_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_charity_master` (
  `CID` int(4) NOT NULL AUTO_INCREMENT,
  `CharityName` varchar(100) NOT NULL,
  `Details` varchar(300) DEFAULT NULL,
  `RegDT` datetime NOT NULL,
  `IsActive` tinyint(4) DEFAULT NULL,
  `IsDelete` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_charity_master`
--

LOCK TABLES `tbl_charity_master` WRITE;
/*!40000 ALTER TABLE `tbl_charity_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_charity_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategory_master`
--

DROP TABLE IF EXISTS `tbl_subcategory_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subcategory_master` (
  `SCAID` int(4) NOT NULL AUTO_INCREMENT,
  `CAID` int(4) NOT NULL,
  `SubCategory` varchar(100) NOT NULL,
  `Details` varchar(300) DEFAULT NULL,
  `RegDT` datetime NOT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `IsDelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`SCAID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategory_master`
--

LOCK TABLES `tbl_subcategory_master` WRITE;
/*!40000 ALTER TABLE `tbl_subcategory_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subcategory_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(150) DEFAULT NULL,
  `message` text,
  `user_id` int(11) NOT NULL,
  `note` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_types`
--

LOCK TABLES `user_types` WRITE;
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` VALUES (1,'Member'),(2,'Subadmin'),(3,'Admin');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` int(8) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `actionby` tinyint(4) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile_number` (`mobile_number`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'amarpol1305@gmail.com',NULL,'21232f297a57a5a743894a0e4a801fc3','admin',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'kalesourabh01@gmail.com','sourabh','d7f9d29e9f78b1c0e4196f29a02a1124','kalesourabh01',1,3,'2015-10-10 15:15:22',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(5,'omkarwajage11@gmail.com','onkarss','e10adc3949ba59abbe56e057f20f883e','omkarss',NULL,2,'2015-10-10 15:26:54',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL),(7,'test@info.com','test','098f6bcd4621d373cade4e832627b4f6','test',1,1,'2015-10-10 18:53:51',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL);
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

-- Dump completed on 2015-10-11 18:29:20
