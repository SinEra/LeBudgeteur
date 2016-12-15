CREATE DATABASE  IF NOT EXISTS `application_budget` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `application_budget`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: us-cdbr-iron-east-04.cleardb.net    Database: application_budget
-- ------------------------------------------------------
-- Server version	5.5.46-log

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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `categorieId` int(2) NOT NULL AUTO_INCREMENT,
  `categorieParentId` int(2) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `userId` int(6) DEFAULT NULL,
  PRIMARY KEY (`categorieId`)
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (22,NULL,'Cadeaux',NULL),(32,NULL,'Emploi',NULL),(52,NULL,'Electricité',NULL),(62,NULL,'Internet',NULL),(82,NULL,'Cellulaire',NULL),(92,NULL,'Nourriture',NULL),(102,NULL,'Alcool',NULL),(112,NULL,'Assurances',NULL),(122,NULL,'Transport',NULL),(132,NULL,'Ecole',NULL),(142,NULL,'Loisirs',NULL),(152,NULL,'Vacances',NULL),(162,NULL,'Santé',NULL),(172,92,'Restaurant',NULL),(182,92,'Épicerie',NULL),(192,162,'Dentiste',NULL),(202,122,'STM',NULL),(212,122,'Location',NULL),(222,122,'Bixi',NULL),(232,142,'Sports',NULL),(242,142,'Cinéma',NULL),(252,142,'Danse',NULL),(262,132,'Frais de scolarité',NULL),(272,132,'Livres',NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compte` (
  `compteId` int(1) NOT NULL AUTO_INCREMENT,
  `userId` int(6) NOT NULL,
  `typeCompteId` int(1) NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`compteId`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compte`
--

LOCK TABLES `compte` WRITE;
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
INSERT INTO `compte` VALUES (1,5,1,50.00,'Principal'),(2,5,1,1000.00,'Epargne'),(3,6,2,200.00,'BMO Mastercard'),(4,7,1,1000.00,'Conjoint'),(5,8,1,455.00,'credit'),(6,10,1,544.00,'Principal'),(7,10,1,700.00,'Epargne'),(8,11,1,2000.00,'Principal'),(9,12,1,500.00,'Principal'),(10,13,1,455.00,'Pricipal'),(11,13,1,455.00,'Pricipal'),(12,13,1,455.00,'Pricipal'),(13,13,1,455.00,'Pricipal'),(14,13,1,455.00,'Pricipal'),(15,13,1,455.00,'Pricipal'),(16,13,1,455.00,'Pricipal'),(17,14,1,100000.00,'Principale'),(18,14,2,-1000.00,'Crédit'),(19,15,1,100.00,'Principal'),(20,17,2,500000.00,'Drogue'),(21,17,2,10000.00,'Alcool'),(22,17,2,600000.00,'Sexe'),(23,24,1,500.00,'Principal'),(24,24,1,1000.00,'Épargne'),(25,6,2,1000.00,'Visa'),(32,32,1,500.00,'era'),(42,42,1,40000.00,'Principal'),(52,42,2,-1500.00,'Visa');
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiement` (
  `paiementId` int(2) NOT NULL AUTO_INCREMENT,
  `transactionId` int(6) NOT NULL,
  `categorieId` int(2) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `montant` decimal(8,0) NOT NULL,
  `payé` tinyint(1) NOT NULL,
  PRIMARY KEY (`paiementId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiement`
--

LOCK TABLES `paiement` WRITE;
/*!40000 ALTER TABLE `paiement` DISABLE KEYS */;
/*!40000 ALTER TABLE `paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `questionId` int(2) NOT NULL AUTO_INCREMENT,
  `question` varchar(75) NOT NULL,
  PRIMARY KEY (`questionId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Quel est le nom de votre mère?'),(2,'Quel est le prénom de votre neveu le plus âgé?'),(3,'Quel est votre animal préféré?'),(4,'Quel est le prénom de votre grand-mère maternelle?'),(6,'Quel est le prénom de votre grand-mère paternelle?'),(7,'Quel est nom de votre dernier animal de compagnie?');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transactionId` int(6) NOT NULL AUTO_INCREMENT,
  `typeTransactionId` int(1) NOT NULL,
  `compteId` int(2) NOT NULL,
  `categorieId` int(2) NOT NULL,
  `montant` decimal(8,2) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `brouillon` tinyint(1) NOT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (30,1,3,4,25.00,'Soulier','2016-11-23',0),(31,1,3,15,50.00,'Job','2016-11-03',0),(32,2,3,15,150.00,'Job','2016-11-03',0),(33,2,3,3,75.00,'Cadeau','2016-10-26',0),(34,1,3,3,34.00,'Chips','2016-11-23',0),(35,1,9,3,34.00,'Chip','2016-07-12',0),(36,2,9,16,300.00,'Chien','2016-08-24',0),(37,2,9,16,300.00,'Chien','2016-08-24',0),(38,2,9,3,5000.00,'Loterie','2006-12-12',0),(39,1,20,3,500.00,'Tylenol','2016-12-01',0),(40,2,20,3,999999.99,'Salaire','2016-12-01',0),(41,1,3,4,0.00,'Soulier','2016-11-12',0),(42,1,3,4,34.00,'Shoes','2016-11-13',0),(43,1,3,3,56.00,'Chip','2016-11-25',0),(44,2,3,3,5000.00,'Job','2016-11-29',0),(45,1,3,3,3.00,'Chip','2016-12-01',0),(46,1,3,3,50.00,'sfaf','2016-12-13',0),(47,1,23,4,50.00,'Souliers','2016-12-12',0),(48,2,23,17,150.00,'Travail','2016-12-12',0),(52,1,42,182,10.00,'Chip','2016-12-15',0),(62,2,42,32,150.00,'Contrat','2016-12-15',0),(72,1,42,202,75.00,'Autobus','2016-12-15',1);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecompte`
--

DROP TABLE IF EXISTS `typecompte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecompte` (
  `typeCompteId` int(2) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`typeCompteId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecompte`
--

LOCK TABLES `typecompte` WRITE;
/*!40000 ALTER TABLE `typecompte` DISABLE KEYS */;
INSERT INTO `typecompte` VALUES (1,'Débit'),(2,'Crédit');
/*!40000 ALTER TABLE `typecompte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typetransaction`
--

DROP TABLE IF EXISTS `typetransaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typetransaction` (
  `typeTransactionId` int(1) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  PRIMARY KEY (`typeTransactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typetransaction`
--

LOCK TABLES `typetransaction` WRITE;
/*!40000 ALTER TABLE `typetransaction` DISABLE KEYS */;
INSERT INTO `typetransaction` VALUES (1,'Dépense'),(2,'Revenu');
/*!40000 ALTER TABLE `typetransaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(6) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `questionid` int(1) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Sinbandith','Era','era@gmail.com',1,'','$2y$10$Fd1fj88HgF7i12rR8P9rI.8n6hUO95wDiGn5zKVnK73MyS48QxhjC'),(4,'Bullock','Sandra','sbullock@gmail.com',0,'','$2y$10$RVEjewllnc1YEpv6w6Lw/uzmLeLepdtsX6AWPuBY3YEmtOlMj7/y.'),(5,'Bernie','Sanders','bernie@gmail.com',0,'','$2y$10$LkB/ujLFT8cPKQBaV3kjsenh2Czec0VFnquje/ialIiL0frnJ9ji2'),(6,'Clinton','Bill','hclinton@hotmail.com',7,'Meeko','$2y$10$W6NeYmfKuAtURRmJjfJ2zeOBVpIvuOenJy8nJCK.6TDy3lm7HC8Ye'),(7,'Era','Sin','era@hotmail.com',0,'','$2y$10$yFtS9gNYgJuJgJeCK/oTKuS6zaIhpofbSppYxLYRvtnSfGNP53wxi'),(8,'sind','sds','dfds',0,'','$2y$10$1GfNGq2wmIlxYmdkdrK.e.RLNrIqVw3jdEC5E3ECazNaJjDunfyu2'),(9,'Bonhomme','Carnaval','bcar@gmail.com',0,'','$2y$10$cpkGylP1YwuMy8CUQKNNAuh.S9OGX/jvlQ/ypBlrNjJE8gzQ3LJ9i'),(11,'Bernard','Halle','bhal@gmail.com',0,'','$2y$10$uJi1nlQdOWjtm0Hvt7WDiutXqEJLdHmqifIRxV510jEIOhy667vO2'),(12,'Gamble','Barney','bg@gamail.com',0,'','$2y$10$DsM/em7PVo12EARm.KdDLOSxZnl7orGQHnLxvTy7gwBjfV0HhHvgO'),(13,'Sinbandith','Era','erasinbandith@gmail.com',0,'','$2y$10$hKUl9b.bbCYZQBRfUnE5O.STUn2A5QpxR7GnQAOT0fmfyb8RlPDGa'),(14,'Hallé','Israël','isra@gmail.com',0,'','$2y$10$s5SzOCOmnxPO4Rrq3davfOZzONGsrzTYvqxLhd4gIndaTYhXzDxTK'),(15,'Le Clown','Krusty','ck@gmail.com',0,'','$2y$10$Dh7bCPJfeoB8YReDV9gn1.xBmSFJndGSzdhGogjAb3xxx9kS1i7ve'),(16,'ghjg','gjk','vghvjh',0,'','$2y$10$FJug1IHwSJIzUexNtQxOeernBq5pyht1dHhhNN4uY51Yn5i9Qb/Fy'),(17,'Stone','Emma','emma@stone.com',0,'','$2y$10$5MA3YsnYjkck8NAup0/GYuKQ9g5tETvXMreyDFC1FRf6WYemFty6i'),(18,'hal','Isra','isra@hotmail.com',0,'Natacha','$2y$10$oYLVRK9oysL0Qr2wD9NLe.AlrTVEqN/KGNn/ddik2ro/Z9HPyip2K'),(19,'Era','Sin','Erasinbandith',0,'Padthai','$2y$10$qsSl.DC2EZs6V9hmwDo3C.oyX.EkWxS8vlfHw.DAhZz6q9GnWMvYS'),(20,'SIN','ERA','erasin',0,'derek','$2y$10$xurml5gO1GCGfsbXDLjAl.Li.tvv38.7UIvtyk9Njxe.iCbWAf6x2'),(21,'ISRA','HALL','Hall',0,'Natacha','$2y$10$VkhGzAS47oI/fw01t/57Lu/ZD9tjB7eaYJvXDl/XhPDMiKNtVo71q'),(22,'Mickey','Mouse','mickey',6,'minie','$2y$10$ZK3CoNT02gJb8rgG2PU31OARgU6vs2kZIMFNDUwyhRpqzb/aO/XMC'),(23,'aaa','aaa','aaa',7,'aaa','$2y$10$fNzYJAI49r9NzVzDyD5n2O0UJIVbfR9qtsnGgOpUSywikL4w/HIim'),(24,'Sinbandith','Era','era@sinbandith.com',3,'Chien','$2y$10$VVTVxYeSEwOAXWev80rt9OLVnxq6U6nTsvgfkwR3pkxQuvE4me6BC'),(32,'era','era','era@era.com',1,'era','$2y$10$HwT4n4dHnWPWYztKkwegHue8QOrMcogy8U4wAGVaH43OUc4fIdc56'),(42,'Dion','Céline','cdion@hotmail.com',3,'Meeko','$2y$10$A3uaYrhcr5GP/Zg/Yr7b1.tfwE.3E8Dv1ERC/xEX8jQkyppQX/9uO');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15  9:41:58
