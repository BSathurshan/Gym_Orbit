-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gym_orbit
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `type` enum('super','normal') NOT NULL DEFAULT 'normal',
  `admin_username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `location` text NOT NULL,
  `contact` varchar(13) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  PRIMARY KEY (`admin_username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('super','3','141','Loki','loki@@',21,'male','jasdgsajd','+94712345678','default.jpg','no'),('super','admin','admin','admin','sathu@gmail.com',31,'female','Wellawatte,Colombo','2147483647','674d5b6602aa7.jpg',NULL),('normal','jj','jj','jj','brusleepatimaraja@gmail.com',21,'male','Chicago','777777777','674c2a812e99c.png','no');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_reminders`
--

DROP TABLE IF EXISTS `admin_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_reminders`
--

LOCK TABLES `admin_reminders` WRITE;
/*!40000 ALTER TABLE `admin_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `time` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`,`gym_username`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES ('123','01','ggmicha','2025-04-17','08:00-09:00','2025-04-17 17:39:37'),('123','01',NULL,'2025-04-19','08:00-09:00','2025-04-17 18:14:39'),('123','01','ggmicha','2025-04-20','10:00-11:00','2025-04-19 00:10:54'),('123','01',NULL,'2025-04-21','11:00-12:00','2025-04-19 10:24:20'),('123','01',NULL,'2025-04-30','13:00-14:00','2025-04-22 08:02:51'),('141','01','ss','2025-02-09','07:00-10:00','2025-02-09 14:26:05'),('141','01','ss','2025-02-11','07:00-10:00','2025-02-09 14:29:07'),('141','01','No Instructor','2025-02-17','18:00-19:00','2025-02-05 03:26:48'),('141','01','ss','2025-02-24','07:00-09:00','2025-02-06 10:50:51');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_event_master`
--

DROP TABLE IF EXISTS `calendar_event_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_event_master`
--

LOCK TABLES `calendar_event_master` WRITE;
/*!40000 ALTER TABLE `calendar_event_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendar_event_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connects_gym`
--

DROP TABLE IF EXISTS `connects_gym`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connects_gym` (
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `gym_Name` varchar(255) NOT NULL,
  `type` enum('normal','premium') DEFAULT NULL,
  PRIMARY KEY (`username`,`gym_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connects_gym`
--

LOCK TABLES `connects_gym` WRITE;
/*!40000 ALTER TABLE `connects_gym` DISABLE KEYS */;
INSERT INTO `connects_gym` VALUES ('123','01','loki','meme','premium'),('123','fitlifejohn','loki','FitLife Gym','premium'),('123','ironsarah','loki','Iron Paradise Gym','normal'),('alexmo123','fitlifejohn','Alex Morgan','FitLife Gym',NULL),('alexmo123','ironsarah','Alex Morgan','Iron Paradise Gym',NULL);
/*!40000 ALTER TABLE `connects_gym` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connects_instructors`
--

DROP TABLE IF EXISTS `connects_instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connects_instructors` (
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  PRIMARY KEY (`gym_username`,`trainer_username`,`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connects_instructors`
--

LOCK TABLES `connects_instructors` WRITE;
/*!40000 ALTER TABLE `connects_instructors` DISABLE KEYS */;
INSERT INTO `connects_instructors` VALUES ('01','sarahbbbb','alexmo123 ','loki','0');
/*!40000 ALTER TABLE `connects_instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym`
--

DROP TABLE IF EXISTS `gym`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym` (
  `gym_username` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `location` text NOT NULL,
  `gym_contact` varchar(13) NOT NULL,
  `owner_contact` varchar(13) NOT NULL,
  `start_year` date NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `experience` int(11) NOT NULL,
  `web` text NOT NULL,
  `social` text NOT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gym_username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym`
--

LOCK TABLES `gym` WRITE;
/*!40000 ALTER TABLE `gym` DISABLE KEYS */;
INSERT INTO `gym` VALUES ('01','meme','141','assa','abc@',21,'male','dasdasd','14440','+94712345679','2024-11-01','2025-04-19 03:09:10',45,'asdsa','sad','no','677cb115669eb.png'),('asdasd123','sdasdasd','dasdasd','John Smith','farmer@gmail.com',66,'female','Chicago','+94712345676','+94712345672','2025-04-18','2025-04-21 02:54:18',20,'https://dribbble.com/tags/gym-website','https://dribbble.com/tags/gym-website',NULL,'default.jpg'),('fitlifejohn','FitLife Gym','fitlifejohn','John Smith','ohn.smith@gmail.com',35,'male','Wellawattee,Colombo -06','2147483647','2147483647','2024-07-11','2024-12-02 05:19:27',12,'https://www.goldsgym.com/','',NULL,'674d435f238b3.jpg'),('ironsarah','Iron Paradise Gym','ironsarah','Sarah Johnson','sarah.johnson@gmail.com',56,'male','Orr\'sHill,Trincomalee','740077777','2147483647','2021-06-12','2024-12-02 05:23:35',23,'https://www.equinox.com/','',NULL,'674d445758234.jpg');
/*!40000 ALTER TABLE `gym` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym_notes`
--

DROP TABLE IF EXISTS `gym_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym_notes` (
  `gym_username` varchar(255) NOT NULL,
  `note_id` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`note_id`,`gym_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym_notes`
--

LOCK TABLES `gym_notes` WRITE;
/*!40000 ALTER TABLE `gym_notes` DISABLE KEYS */;
INSERT INTO `gym_notes` VALUES ('01','1744215433987','checking 2','4/9/2025, 9:46:20 PM','2025-04-09 16:17:13'),('01','1745017453033','checking 1','4/19/2025, 4:34:03 AM','2025-04-18 23:04:13'),('fitlifejohn','1745053281065','save 123','4/19/2025, 2:30:44 PM','2025-04-19 09:01:21'),('01','1745304012715','ghgghjg','4/22/2025, 12:09:07 PM','2025-04-22 06:40:12');
/*!40000 ALTER TABLE `gym_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym_schedule`
--

DROP TABLE IF EXISTS `gym_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym_schedule` (
  `gym_username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`gym_username`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym_schedule`
--

LOCK TABLES `gym_schedule` WRITE;
/*!40000 ALTER TABLE `gym_schedule` DISABLE KEYS */;
INSERT INTO `gym_schedule` VALUES ('01','2025-04-19','rgb(0, 128, 0)'),('01','2025-04-23','rgb(0, 0, 255)'),('01','2025-04-24','rgb(0, 128, 0)'),('01','2025-04-25','rgb(0, 128, 0)'),('01','2025-04-26','rgb(255, 0, 0)'),('01','2025-04-30','rgb(255, 255, 0)'),('01','2025-05-09','rgb(255, 255, 0)'),('fitlifejohn','2025-04-24','rgb(255, 0, 0)'),('fitlifejohn','2025-04-25','rgb(0, 128, 0)');
/*!40000 ALTER TABLE `gym_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gym_time`
--

DROP TABLE IF EXISTS `gym_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gym_time` (
  `gym_username` varchar(255) NOT NULL,
  `Monday` text DEFAULT NULL,
  `Tuesday` text DEFAULT NULL,
  `Wednesday` text DEFAULT NULL,
  `Thursday` text DEFAULT NULL,
  `Friday` text DEFAULT NULL,
  `Saturday` text DEFAULT NULL,
  `Sunday` text DEFAULT NULL,
  PRIMARY KEY (`gym_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gym_time`
--

LOCK TABLES `gym_time` WRITE;
/*!40000 ALTER TABLE `gym_time` DISABLE KEYS */;
INSERT INTO `gym_time` VALUES ('01','','','','08:00-09:00,10:00-11:00,11:00-12:00,13:00-14:00','13:00-14:00,14:00-15:00','','10:00-11:00,11:00-12:00,13:00-14:00');
/*!40000 ALTER TABLE `gym_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor_request`
--

DROP TABLE IF EXISTS `instructor_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor_request` (
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`gym_username`,`trainer_username`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor_request`
--

LOCK TABLES `instructor_request` WRITE;
/*!40000 ALTER TABLE `instructor_request` DISABLE KEYS */;
INSERT INTO `instructor_request` VALUES ('01','sarahbbbbdds','Sarah Bennett','123','loki','2025-04-21 04:07:39'),('ironsarah','sarahbbbb','Sarah Bennett','123','loki','2024-12-16 13:21:51');
/*!40000 ALTER TABLE `instructor_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor_time`
--

DROP TABLE IF EXISTS `instructor_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor_time` (
  `trainer_username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `Monday` text DEFAULT NULL,
  `Tuesday` text DEFAULT NULL,
  `Wednesday` text DEFAULT NULL,
  `Thursday` text DEFAULT NULL,
  `Friday` text DEFAULT NULL,
  `Saturday` text DEFAULT NULL,
  `Sunday` text DEFAULT NULL,
  `trainer_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`trainer_username`,`gym_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor_time`
--

LOCK TABLES `instructor_time` WRITE;
/*!40000 ALTER TABLE `instructor_time` DISABLE KEYS */;
INSERT INTO `instructor_time` VALUES ('ggmicha','01','','','','08:00-09:00,09:00-10:00','08:00-09:00,09:00-10:00','','08:00-09:00,09:00-10:00,10:00-11:00','mic','22','male','67f66dfeebffd.png'),('ss','01','08:00-09:00,09:00-10:00',NULL,'08:00-09:00,09:00-10:00','08:00-09:00,09:00-10:00','08:00-09:00,09:00-10:00',NULL,NULL,'uuu','22','male','6795cf02ceae6.jpg');
/*!40000 ALTER TABLE `instructor_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructors` (
  `gym_username` varchar(50) NOT NULL,
  `trainer_username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `social` text NOT NULL,
  `experience` int(11) NOT NULL,
  `location` text NOT NULL,
  `availiblity` text DEFAULT NULL,
  `qualify` text DEFAULT NULL,
  `special` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ban` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`trainer_username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES ('01','ggmicha','mic@gmail.com','mic141','mic',22,'female','+94712345673','https://fitgirl1-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_01',12,'Wellawatte,Colombo','weekends','medalist','athlete','67f66dfeebffd.png',NULL),('ironsarah','sarahbbbb','sarah.bennett@gmail.com','123','Sarah Bennett',32,'male','2147483647','https://sociallinks.io/',12,'Wellawatte,Colombo','weekends','medalist','athlete','674d46d404b94.jpg',NULL),('01','sarahbbbbdds','lokiajsd22@gmail.com','141','Sarah Bennett',22,'male','777777777','https://fitgirl1-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_01',24,'sadasd','weekends','ss','athlete1','default.jpg',NULL),('01','ss','lokiajsd@gmail.com','141','uuu',24,'male','777777777','https://dribbble.com/tags/gym-website',0,'Wellawatte,Colombo','weekends','medalist','athlete1','6795cf02ceae6.jpg',NULL);
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors_client_history`
--

DROP TABLE IF EXISTS `instructors_client_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructors_client_history` (
  `trainer_username` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`trainer_username`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors_client_history`
--

LOCK TABLES `instructors_client_history` WRITE;
/*!40000 ALTER TABLE `instructors_client_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `instructors_client_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors_reminders`
--

DROP TABLE IF EXISTS `instructors_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructors_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors_reminders`
--

LOCK TABLES `instructors_reminders` WRITE;
/*!40000 ALTER TABLE `instructors_reminders` DISABLE KEYS */;
INSERT INTO `instructors_reminders` VALUES ('sarahbbbb','sarahbbbb@gmail.com','reminder checking :}','2024-12-17 18:45:50');
/*!40000 ALTER TABLE `instructors_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machines` (
  `gym_username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `total` varchar(12) DEFAULT NULL,
  `available` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`gym_username`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machines`
--

LOCK TABLES `machines` WRITE;
/*!40000 ALTER TABLE `machines` DISABLE KEYS */;
INSERT INTO `machines` VALUES ('01','mach1','67409af2aae2c.jpg','7','2'),('01','machine 2','b.png','5','1'),('fitlifejohn','dumbell','674d4c23d65bc.jpeg','3','3');
/*!40000 ALTER TABLE `machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `gym_username` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`gym_username`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES ('01','6742216a04fb3','meme','Premium','Tool','6742216a04fb8.png','Tool','2025-04-20 01:50:14'),('fitlifejohn','674d4c0c9cd2b','FitLife Gym','Premium','free meel planner','674d4c0c9cd38.jpg','free meel planner','2025-04-20 01:50:36'),('ironsarah','674221209fbcb','meme','Premium','lets gooo!','674221209fbd1.png','use this benefits','2025-04-20 01:49:44');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_reminders`
--

DROP TABLE IF EXISTS `owner_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_reminders`
--

LOCK TABLES `owner_reminders` WRITE;
/*!40000 ALTER TABLE `owner_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `owner_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `gym_username` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text DEFAULT NULL,
  `details` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`gym_username`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES ('01','67421d255951a','meme','hi','67421d337d9db.jpg','asdasd','2025-04-21 04:06:39'),('fitlifejohn','674d4b6e0f65e','FitLife Gym','\"Your only limit is you.\"','674d4b6e0f665.jpeg','Numbered List of 20 Catchy Fitness Slogan Ideas. \"Fit is the New Cool\" \"Sweat it Out, Make it Count\" \"Get Fit, Stay Fit\" \"Strong Body, Strong Mind\"\r\n','2025-04-20 01:38:16'),('fitlifejohn','6759244926f15','FitLife Gym','“Pain is temporary, but pride is forever.” ','6759244926f1f.jpeg','You\'re really complimenting her hard work when you do this.\r\n\"You\'re working so hard.\"\r\n\"I\'m so impressed by your dedication.\"\r\n\"I can see your progress.\"','2025-04-20 01:31:16'),('ironsarah','674d4a0a6b4a9','Iron Paradise Gym','\"Sweat now, shine later.\"','674d4a0a6b4b1.avif','Here are some more of our favourite motivational quotes to help you on your fitness journey.','2025-04-20 01:37:16');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `issue` text NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `reply` text DEFAULT NULL,
  PRIMARY KEY (`username`,`email`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES ('','','admin','34234','Re: werewrewr','2025-04-17 15:29:41',NULL),('01','abc@','admin','check123','check123','2025-04-23 09:27:32','jgjgjhgj'),('123','lokiaj141@gmail.com','admin','test','test1234','2025-04-23 09:36:11','checking the reply'),('123','lokiaj141@gmail.com','admin','test','test1234','2025-04-23 10:16:03','checking the reply'),('123','lokiaj141@gmail.com','admin','test','test1234','2025-04-23 10:17:39','checking the reply'),('us1234','lokiaj141@gmail.com','admin','checking function','What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2025-04-23 11:48:07','hey hi iam solving');
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_user_gym_instructor`
--

DROP TABLE IF EXISTS `schedule_user_gym_instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_user_gym_instructor` (
  `gym_username` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `instructor_username` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`gym_username`,`username`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_user_gym_instructor`
--

LOCK TABLES `schedule_user_gym_instructor` WRITE;
/*!40000 ALTER TABLE `schedule_user_gym_instructor` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_user_gym_instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `issue` text NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('solved','unsolved') DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support`
--

LOCK TABLES `support` WRITE;
/*!40000 ALTER TABLE `support` DISABLE KEYS */;
INSERT INTO `support` VALUES ('01','abc@','owner','check123','check123','2025-04-22 11:52:07',NULL),('1','fdgkdg@kdsgks','','trrere','werewrewr','2025-04-23 06:37:56',NULL),('sarahbbbb','sarah.bennett@gmail.com','instructor','test','gfgf','2024-12-18 11:45:22',NULL),('us1234','lokiaj141@gmail.com','user','checking function','What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2025-04-23 09:48:07','solved');
/*!40000 ALTER TABLE `support` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `id` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`admin_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES ('6808f222ec4a6','3','system-maintenence','system maintenence','2025-04-23 13:58:58','2025-04-23 11:30:00','2025-04-25 09:27:00');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(70) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') DEFAULT NULL,
  `contact` varchar(13) NOT NULL,
  `location` text DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `active` enum('full','part','temporary','not sure') DEFAULT NULL,
  `health` enum('yes','no') DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `achieve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('123','123','loki','wolverine@gmail.com',21,'male','+94712345671','sadasddas','Strength','full','yes','no','hq720.jpg',NULL),('davejohnson89','david123','David Johnson','david.johnson@gmail.com',45,'male','2147483647','Orr\'s Hill,Trincomalee','Physic','full','no',NULL,'674d41311fda6.jpg',NULL),('emmat92','emmat92','Emma Thompson','emma.thompson@gmail.com',32,'male','1234567890','Wellawatte,Colombo','Endurance','part','','no','674d41cd6133e.jpg',NULL),('Saneesha','141','asd','check@gmail.com',24,'female','777777777','sadasd','strength','full','no','no','67827d7756557.webp','build muscle'),('us1234','141','HomeLander','lokiaj141@gmail.com',22,'male','+94712345677','Chicago','Strength','full','no',NULL,'default.jpg','Build Muscle');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_payments`
--

DROP TABLE IF EXISTS `user_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(70) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `package` varchar(24) NOT NULL,
  `amount` float NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_payments`
--

LOCK TABLES `user_payments` WRITE;
/*!40000 ALTER TABLE `user_payments` DISABLE KEYS */;
INSERT INTO `user_payments` VALUES (50,'123','01','1_MONTH',8000,'2025-02-18 20:43:45',NULL,NULL),(51,'123','fitlifejohn','1_MONTH',8000,'2025-02-18 21:31:20',NULL,NULL),(52,'123','fitlifejohn','1_MONTH',8000,'2025-02-19 06:58:52',NULL,NULL),(59,'123','01','1_MONTH',8000,'2025-04-21 21:43:58','2025-04-21 18:13:58','2025-05-21 18:13:58');
/*!40000 ALTER TABLE `user_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reminders`
--

DROP TABLE IF EXISTS `user_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_reminders` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reminders`
--

LOCK TABLES `user_reminders` WRITE;
/*!40000 ALTER TABLE `user_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_progress`
--

DROP TABLE IF EXISTS `workout_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `day` varchar(10) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `workout_progress_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_progress`
--

LOCK TABLES `workout_progress` WRITE;
/*!40000 ALTER TABLE `workout_progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `workout_progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_schedule`
--

DROP TABLE IF EXISTS `workout_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workout_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `sets` int(11) DEFAULT 0,
  `reps` int(11) DEFAULT 0,
  `done` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_schedule`
--

LOCK TABLES `workout_schedule` WRITE;
/*!40000 ALTER TABLE `workout_schedule` DISABLE KEYS */;
INSERT INTO `workout_schedule` VALUES (74,'Saneesha','Monday','squats',12,4,0),(75,'Saneesha','Monday','push',12,3,1),(76,'Saneesha','Monday','throw',12,3,1),(77,'Saneesha','Tuesday','run',30,12,1),(78,'Saneesha','Wednesday','fast',23,4,0),(79,'Saneesha','Friday','pull',12,3,0),(80,'Saneesha','Friday','push',12,4,0);
/*!40000 ALTER TABLE `workout_schedule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-23 20:57:08
