-- MySQL dump 10.13  Distrib 5.5.15, for Win32 (x86)
--
-- Host: localhost    Database: firma
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Current Database: `firma`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `firma` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci */;

USE `firma`;

--
-- Table structure for table `budynek`
--

DROP TABLE IF EXISTS `budynek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budynek` (
  `idBudynek` int(11) NOT NULL AUTO_INCREMENT,
  `Ulica` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Nr` int(11) DEFAULT NULL,
  `Kod_pocztowy` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`idBudynek`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budynek`
--

LOCK TABLES `budynek` WRITE;
/*!40000 ALTER TABLE `budynek` DISABLE KEYS */;
INSERT INTO `budynek` VALUES (1,'Kraśnickie',82,'20-506'),(2,'Romanowskiego',15,'20-358'),(3,'Wojciechowska',54,'20-479'),(4,'Romanowskiego',22,'20-358'),(5,'Konstantynow',6,'20-708'),(6,'Konstantynow',8,'20-708'),(7,'Zwycieska',2,'20-706'),(8,'Orkana',5,'20-709'),(9,'Kraśnickie',57,'20-506'),(10,'Orkana',19,'20-709');
/*!40000 ALTER TABLE `budynek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dzial`
--

DROP TABLE IF EXISTS `dzial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dzial` (
  `idDzial` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`idDzial`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dzial`
--

LOCK TABLES `dzial` WRITE;
/*!40000 ALTER TABLE `dzial` DISABLE KEYS */;
INSERT INTO `dzial` VALUES (1,'Produkcja'),(2,'Handel'),(3,'Obsluga klienta'),(4,'Serwis'),(5,'Zarzad');
/*!40000 ALTER TABLE `dzial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dzial_has_budynek`
--

DROP TABLE IF EXISTS `dzial_has_budynek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dzial_has_budynek` (
  `Dzial_idDzial` int(11) NOT NULL,
  `Budynek_idBudynek` int(11) NOT NULL,
  PRIMARY KEY (`Dzial_idDzial`,`Budynek_idBudynek`),
  KEY `fk_Dzial_has_Budynek_Budynek1` (`Budynek_idBudynek`),
  KEY `fk_Dzial_has_Budynek_Dzial1` (`Dzial_idDzial`),
  CONSTRAINT `fk_Dzial_has_Budynek_Budynek1` FOREIGN KEY (`Budynek_idBudynek`) REFERENCES `budynek` (`idBudynek`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dzial_has_Budynek_Dzial1` FOREIGN KEY (`Dzial_idDzial`) REFERENCES `dzial` (`idDzial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dzial_has_budynek`
--

LOCK TABLES `dzial_has_budynek` WRITE;
/*!40000 ALTER TABLE `dzial_has_budynek` DISABLE KEYS */;
INSERT INTO `dzial_has_budynek` VALUES (2,1),(3,1),(5,1),(4,2),(1,3),(4,3),(4,4),(1,5),(1,6),(2,6),(4,6),(3,7),(1,8),(2,9),(2,10),(3,10);
/*!40000 ALTER TABLE `dzial_has_budynek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miasto`
--

DROP TABLE IF EXISTS `miasto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miasto` (
  `idMiasto` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`idMiasto`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miasto`
--

LOCK TABLES `miasto` WRITE;
/*!40000 ALTER TABLE `miasto` DISABLE KEYS */;
INSERT INTO `miasto` VALUES (1,'Lublin'),(2,'Leczna'),(3,'Dys'),(4,'Elizowka'),(5,'Turka'),(6,'Konopnica'),(7,'Cmilow'),(8,'Chelm'),(9,'Wilkolaz'),(10,'Krasnik'),(11,'Jaszczow'),(12,'Siedliszcze'),(13,'Obroki'),(14,'Strzeszkowice'),(15,'Niemce'),(16,'Zezulin'),(17,'Kaliszany'),(18,'Bogdanka'),(19,'Dominów'),(20,'Janów'),(21,'Kazimierz'),(22,'Swidnik');
/*!40000 ALTER TABLE `miasto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pracownik`
--

DROP TABLE IF EXISTS `pracownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pracownik` (
  `idPracownik` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwisko` varchar(60) COLLATE utf8_polish_ci DEFAULT NULL,
  `Imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pensja` float DEFAULT NULL,
  `Dzial_idDzial` int(11) NOT NULL,
  `Miasto_idMiasto` int(11) NOT NULL,
  PRIMARY KEY (`idPracownik`,`Dzial_idDzial`,`Miasto_idMiasto`),
  KEY `fk_Pracownik_Dzial` (`Dzial_idDzial`),
  KEY `fk_Pracownik_Miasto1` (`Miasto_idMiasto`),
  CONSTRAINT `fk_Pracownik_Dzial` FOREIGN KEY (`Dzial_idDzial`) REFERENCES `dzial` (`idDzial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pracownik_Miasto1` FOREIGN KEY (`Miasto_idMiasto`) REFERENCES `miasto` (`idMiasto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pracownik`
--

LOCK TABLES `pracownik` WRITE;
/*!40000 ALTER TABLE `pracownik` DISABLE KEYS */;
INSERT INTO `pracownik` VALUES (1,'Adamski','Edward',1300,1,1),(2,'Abramowicz','Jolanta',1300,1,1),(3,'Artus','Roman',1400,1,15),(4,'Balcerek','Anna',1300,1,12),(5,'Baran','Jan',1200,2,5),(6,'Bogusław','Emilia',1350,1,3),(7,'Biernacka','Zofia',1400,3,9),(8,'Czeska','Robert',1250,1,1),(9,'Głowacz','Sylwia',1600,4,2),(10,'Coria','Ewa',1800,5,1),(11,'Erki','Jonatan',2000,5,1),(12,'Bystry','Kamil',1500,1,1),(13,'Drazek','Barbara',1750,5,3),(14,'Jakimowich','Ewa',1600,4,19),(15,'Jakubski','Radosław',2200,5,22),(16,'Fragowski','Paweł',1550,4,20),(17,'Fala','Piotr',1350,3,17),(18,'Wojcik','Jacek',1500,2,1),(19,'Zakoscielny','Marek',1250,2,15),(20,'Fasola','Jaś',1600,2,5),(21,'Kowalik','Adam',1900,3,1),(22,'Karwat','Natalia',1350,1,3),(23,'Gras','Tadeusz',1580,2,6),(24,'Głaz','Mateusz',1600,3,8),(25,'Ladt','Ivo',1500,1,3),(26,'Mokrzynski','Piotr',1850,1,7),(27,'Narta','Teodor',1470,2,10),(28,'Burzynski','Eryk',1250,1,13),(29,'Jakubski','Marek',1500,2,4),(30,'Banach','Marek',1400,1,11),(31,'Czartoch','Sebastian',1680,3,14),(32,'Nowak','Zuzanna',1580,2,16),(33,'Opalinski','Damian',1470,2,18),(34,'Stoklosa','Cecylia',1500,1,21),(35,'Urbanski','Patryk',1800,4,13),(36,'Zatorski','Karol',1350,2,16),(37,'Zelichowski','Zygmunt',2100,5,22),(38,'Fichtelbaum','Joel',1450,2,19),(39,'Chmura','Paweł',1540,3,4),(40,'Irman','Lukasz',1650,1,1),(41,'Pokrzywa','Weronika',1400,1,4),(42,'Deresz','Szymon',1350,3,7),(43,'Rogowski','Michał',1600,4,8),(44,'Szymanski','Piotr',1100,1,3),(45,'Gracki','Maciej',1150,2,1),(46,'Kowalewska','Anna',1450,1,1),(47,'Bielski','Igor',1800,2,5),(48,'Szujski','Dymitr',1000,1,1);
/*!40000 ALTER TABLE `pracownik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-22  0:09:22
