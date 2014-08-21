-- MySQL dump 10.13  Distrib 5.6.17, for osx10.7 (x86_64)
--
-- Host: localhost    Database: virtual_class
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dept_id` (`dept_id`),
  KEY `prof_id` (`prof_id`),
  CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_ibfk_2` FOREIGN KEY (`prof_id`) REFERENCES `prof` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (34,'Photosynthesis',1,NULL),(35,'Neurobiology',1,NULL),(37,'Thermodynamics',2,NULL),(38,'Biology 101',1,NULL),(39,'Quantum Mechanics',3,NULL),(41,'Milton',4,NULL),(43,'Data Structures',5,NULL),(44,'Fiction Writing',4,NULL),(45,'Real Analysis',6,NULL),(46,'Growing Mushrooms',7,NULL),(48,'Database Systems',5,NULL),(49,'PHP',5,NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept`
--

LOCK TABLES `dept` WRITE;
/*!40000 ALTER TABLE `dept` DISABLE KEYS */;
INSERT INTO `dept` VALUES (1,'Biology'),(2,'Chemistry'),(5,'Computer Science'),(4,'English'),(6,'Mathematics'),(7,'Mycology'),(3,'Physics'),(8,'Undeclared');
/*!40000 ALTER TABLE `dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` VALUES (55,10,35),(56,10,34),(57,10,34),(59,14,41),(61,15,35),(62,16,43),(64,12,46);
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof`
--

DROP TABLE IF EXISTS `prof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `prof_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof`
--

LOCK TABLES `prof` WRITE;
/*!40000 ALTER TABLE `prof` DISABLE KEYS */;
/*!40000 ALTER TABLE `prof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `dob` datetime DEFAULT NULL,
  `major_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `major_id` (`major_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `dept` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (10,'Allie','','Lake',NULL,1),(12,'Mushroom','','Lover',NULL,7),(13,'Dave','','McClung',NULL,3),(14,'Sarah','','Wingfield',NULL,4),(15,'Bobbi','','Brown',NULL,1),(16,'Grace','','Hopper',NULL,5),(17,'Joe','','Lake',NULL,8),(18,'John','','Doe',NULL,2),(19,'Augustin','','Cauchy',NULL,6),(20,'Alan','','Turing',NULL,5),(21,'TestStudent',NULL,'1',NULL,1),(22,'TestStudent',NULL,'2',NULL,1),(23,'TestStudent',NULL,'3',NULL,1),(24,'TestStudent',NULL,'4',NULL,1),(25,'TestStudent',NULL,'5',NULL,1),(26,'TestStudent',NULL,'6',NULL,1),(27,'TestStudent',NULL,'7',NULL,1),(28,'TestStudent',NULL,'8',NULL,1),(29,'TestStudent',NULL,'9',NULL,1),(30,'TestStudent',NULL,'10',NULL,1),(31,'TestStudent',NULL,'11',NULL,1),(32,'TestStudent',NULL,'12',NULL,1),(33,'TestStudent',NULL,'13',NULL,1),(34,'TestStudent',NULL,'14',NULL,1),(35,'TestStudent',NULL,'15',NULL,1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-21 15:30:05
