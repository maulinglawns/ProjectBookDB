-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `uniqID` int(11) NOT NULL AUTO_INCREMENT,
  `auth` varchar(100) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `descr` varchar(5000) DEFAULT NULL,
  `comm` varchar(5000) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`uniqID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'KING, STEPHEN','DÖD ZON','Stockholm: Legenda, 1988. Ny svensk upplaga. 508 s. Inbunden i förlagets tryckta pappband. ISBN 9158206051',NULL,90,121662,'http://www.ryo.se/bokbilder/121662.jpg',1988,0),(2,'KING, STEPHEN','DRAKENS ÖGON','Höganäs: Bra Böcker, 1988. Första svenska upplagan. 352, (1) s. Inbunden i förlagets pappband med skyddsomslag. Illustrerad med svartvita teckningar av David Palladini.',NULL,90,88799,'http://www.ryo.se/bokbilder/88799.jpg',1988,0),(3,'KAFKA, FRANZ','BREV TILL FELICE I-II','Översättning och kommentarer: Hans Blomqvist och Erik Ågren. Lund: Bakhåll, 1997. Första svenska upplagan. 615, (1) s. 2 trådhäftade volymer. ISBN 9177421329',NULL,175,99124,'http://www.ryo.se/bokbilder/99124.jpg',1997,0),(4,'CONRAD, JOSEPH','ANARKISTEN','Stockholm: Tiden, 1983. Ny svensk upplaga. 274 s. Inbunden i förlagets pappband med liten lagad reva i skyddsomslaget. Med diskret namnteckning på det fria försättsbladet. ISBN 9155029272','',75,119334,'http://www.ryo.se/bokbilder/97246.jpg',1983,0),(5,'RANKIN, IAN','THE NAMING OF THE DEAD','London: Orion Books, 2006. First trade edition. (10), 420, (1) pp. Publisher\'s large paperback. Copy as new. ISBN 0752868594','An Inspector Rebus Novel',75,101643,'http://www.ryo.se/bokbilder/101643.jpg',2006,0),(6,'CHANDLER, RAYMOND','MARLOWES TEMA','Femtio brev i urval av Eric Fylkeson och översättning av Peter Lindforss. Uppsala: Janus (i samrabete med Jury), 1984. Första svenska upplagan. 180, (9) s. Trådhäftad och ouppskuren med obetydliga bruksspår. ISBN 9185986194','',100,41820,'',1984,0),(11,'FLOYD, PINK','Ummagumma','','',0,0,'',0,0);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-22 15:40:08
