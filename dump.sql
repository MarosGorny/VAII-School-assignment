-- MariaDB dump 10.19  Distrib 10.9.2-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: bodyinngym
-- ------------------------------------------------------
-- Server version	10.9.2-MariaDB

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
-- Table structure for table `rezervaciapriestors`
--

DROP TABLE IF EXISTS `rezervaciapriestors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rezervaciapriestors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `den` varchar(10) NOT NULL,
  `zaciatok` int(11) NOT NULL,
  `koniec` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `check_den` CHECK (`den` in ('Pondelok','Utorok','Streda','Stvrtok','Piatok')),
  CONSTRAINT `check_koniec` CHECK (`koniec` >= 9 and `koniec` <= 22),
  CONSTRAINT `check_zaciatok` CHECK (`zaciatok` >= 8 and `zaciatok` <= 21)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rezervaciapriestors`
--

LOCK TABLES `rezervaciapriestors` WRITE;
/*!40000 ALTER TABLE `rezervaciapriestors` DISABLE KEYS */;
INSERT INTO `rezervaciapriestors` VALUES
(24,'Pondelok',10,18),
(29,'Pondelok',8,9),
(30,'Utorok',8,9),
(32,'Streda',8,19),
(33,'Stvrtok',8,9),
(37,'Piatok',8,9),
(38,'Pondelok',8,9);
/*!40000 ALTER TABLE `rezervaciapriestors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trenings`
--

DROP TABLE IF EXISTS `trenings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trenings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aktualnyPocet` int(11) NOT NULL,
  `maximalnaKapacita` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trenings`
--

LOCK TABLES `trenings` WRITE;
/*!40000 ALTER TABLE `trenings` DISABLE KEYS */;
INSERT INTO `trenings` VALUES
(1,5,5),
(2,3,11);
/*!40000 ALTER TABLE `trenings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-16  4:00:44
