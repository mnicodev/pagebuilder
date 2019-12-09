-- MySQL dump 10.17  Distrib 10.3.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: symfony4_pagebuilder
-- ------------------------------------------------------
-- Server version	10.3.15-MariaDB-1

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
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advert`
--

LOCK TABLES `advert` WRITE;
/*!40000 ALTER TABLE `advert` DISABLE KEYS */;
INSERT INTO `advert` VALUES (1,'Recherche développeur Symfony2.','Alexandre');
/*!40000 ALTER TABLE `advert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advert_id` int(11) DEFAULT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A45BDDC1D07ECCB6` (`advert_id`),
  CONSTRAINT `FK_A45BDDC1D07ECCB6` FOREIGN KEY (`advert_id`) REFERENCES `advert` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (1,1,'Marine','J\'ai toutes les qualités requises.'),(2,1,'Toto','J\'ai toutes les qualités requises.');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloc`
--

DROP TABLE IF EXISTS `bloc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C778955A9F2C3FAB` (`zone_id`),
  CONSTRAINT `FK_C778955A9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloc`
--

LOCK TABLES `bloc` WRITE;
/*!40000 ALTER TABLE `bloc` DISABLE KEYS */;
INSERT INTO `bloc` VALUES (9,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',7),(10,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',7),(11,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',8),(12,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',8),(13,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',8),(14,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',9),(15,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',10),(16,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',11),(17,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',12),(18,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',12),(19,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',13),(20,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',13),(21,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',13),(22,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',14),(23,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',15),(24,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',16),(25,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',16),(115,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',65),(116,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',66),(117,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',66),(146,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',83),(147,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',84),(148,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',84),(149,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',84),(150,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',85),(151,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',85),(152,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',86),(163,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',92),(164,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',93),(165,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',93),(166,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',93),(167,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',94),(168,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',94),(169,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',95),(170,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',95),(171,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',95),(172,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',96),(221,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',111),(222,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',112),(223,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',112),(224,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',113),(225,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',113),(226,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',113),(227,'0','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114),(228,'1','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114),(229,'2','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114),(230,'3','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114),(231,'4','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114),(232,'5','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',114);
/*!40000 ALTER TABLE `bloc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `bloc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FEC530A95582E9C0` (`bloc_id`),
  CONSTRAINT `FK_FEC530A95582E9C0` FOREIGN KEY (`bloc_id`) REFERENCES `bloc` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (17,'<h2>colonne de gauche</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,9),(18,'<p>français et américains ont étudié la circulation des colonies de fourmis pendant leur récolte de nourriture. Ils se sont aperçu qu\'elles sont bien plus expertes que nous dans l\'art de réguler le trafic.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,9),(19,'<h2>Colonne de droite</h2><div class=\"c-action\"></div>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,10),(20,'<p>Feugiat pretium nibh ipsum consequat nisl vel pretium lectus. Eget sit amet tellus cras. Ac turpis egestas maecenas pharetra convallis. Ipsum a arcu cursus vitae <strong>congue</strong> mauris rhoncus aenean vel.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,10),(21,'<h3>Première colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,11),(22,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,11),(23,'<h3>Deuxième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,12),(24,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,12),(25,'<h3>Troisième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,13),(26,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a <strong>cras semper. Rhoncus est </strong>pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,13),(27,'<h2>Pied de page</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,14),(28,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,14),(29,'<h1>Ceci est un test de page builder</h1>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,15),(30,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,15),(31,'<h1>Ceci est un test de page builder</h1>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,16),(32,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,16),(33,'<h2>colonne de gauche</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,17),(34,'<p>français et américains ont étudié la circulation des colonies de fourmis pendant leur récolte de nourriture. Ils se sont aperçu qu\'elles sont bien plus expertes que nous dans l\'art de réguler le trafic.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,17),(35,'<h2>Colonne de droite</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,18),(36,'<p>Feugiat pretium nibh ipsum consequat nisl vel pretium lectus. Eget sit amet tellus cras. Ac turpis egestas maecenas pharetra convallis. Ipsum a arcu cursus vitae <strong>congue</strong> mauris rhoncus aenean vel.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,18),(37,'<h3>Première colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,19),(38,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,19),(39,'<h3>Deuxième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,20),(40,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,20),(41,'<h3>Troisième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,21),(42,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a <strong>cras semper. Rhoncus est </strong>pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,21),(43,'<h2>Pied de page</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,22),(44,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit mas<strong>sa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut le</strong>ctus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,22),(45,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit mas<strong>sa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut le</strong>ctus. Nulla facilisi cras fermentum odio. Adipiscing t</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,22),(46,'<ol>	<li>Tortor consequat id porta nibh venenatis cras.</li>	<li>Sit amet consectetur adipiscing elit pellentesque.</li>	<li>Interdum velit euismod in pellentesque massa placerat.</li></ol><div class=\"c-action\"></div>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,23),(47,'<p>Tristique magna sit amet purus gravida quis. Et sollicitudin ac orci phasellus. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. Sollicitudin aliquam ultrices sagittis orci a. Tortor consequat id porta nibh venenatis cras. Sit amet consectetur adipiscing elit pellentesque. Interdum velit euismod in pellentesque massa placerat.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,23),(48,'<p>ulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,24),(49,'<p>Tortor consequat id porta nibh venenatis cras. Sit amet consectetur adipiscing elit <s>pellentesque</s>. Interdum velit euismod in pellentesque massa placerat.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,24),(50,'<p>Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,25),(51,'<p>Nunc faucibus a pellentesque sit amet porttitor eget. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Fusce ut placerat orci nulla pellentesque. Ultricies mi quis hendrerit dolor magna eget est lorem. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. Sed blandit libero volutpat sed cras. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Vel pretium lectus quam id. Aliquam ultrices sagittis orci a scelerisque purus.</p><ul>	<li>Eu lobortis elementum nibh tellus molestie nunc non blandit massa.</li>	<li>Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis.</li>	<li>Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio.</li></ul>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,25),(89,'<ol>	<li>Tortor consequat id porta nibh venenatis cras.</li>	<li>Sit amet consectetur adipiscing elit pellentesque.</li>	<li>Interdum velit euismod in pellentesque massa placerat.</li></ol>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,115),(90,'<p>Tristique magna sit amet purus gravida quis. Et sollicitudin ac orci phasellus. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. Sollicitudin aliquam ultrices sagittis orci a. Tortor consequat id porta nibh venenatis cras. Sit amet consectetur adipiscing elit pellentesque. Interdum velit euismod in pellentesque massa placerat.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,115),(91,'<p>ulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,116),(92,'<p>Tortor consequat id porta nibh venenatis cras. Sit amet consectetur adipiscing elit <s>pellentesque</s>. Interdum velit euismod in pellentesque massa placerat.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,116),(93,'<p>Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,117),(94,'<p>Nunc faucibus a pellentesque sit amet porttitor eget. In hac habitasse platea dictumst vestibulum rhoncus est pellentesque. Fusce ut placerat orci nulla pellentesque. Ultricies mi quis hendrerit dolor magna eget est lorem. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum. Sed blandit libero volutpat sed cras. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Vel pretium lectus quam id. Aliquam ultrices sagittis orci a scelerisque purus.</p><ul>	<li>Eu lobortis elementum nibh tellus molestie nunc non blandit massa.</li>	<li>Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis.</li>	<li>Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio.</li></ul>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,117),(111,'<p>Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Sit amet est placerat in egestas erat. Arcu dictum varius duis at. Massa tempor nec feugiat nisl pretium fusce. Suscipit adipiscing bibendum est ultricies integer quis. Massa tempor nec feugiat nisl pretium fusce id velit ut. Turpis egestas sed tempus urna et pharetra pharetra massa. Hac habitasse platea dictumst vestibulum rhoncus. Commodo sed egestas egestas fringilla phasellus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,146),(112,'<p>Cursus eget nunc scelerisque viverra mauris in aliquam sem. Congue quisque egestas diam in arcu cursus euismod. Mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,148),(113,'<p><img alt=\"\" src=\"/img/tux.png\" style=\"float:left; width:50%\">egestas erat. Arcu dictum varius duis at. Massa tempor nec feugiat nisl pretium fusce. Suscipit adipiscing bibendum est ultricies integer quis. Massa tempor nec feugiat nisl pretium fusce id velit ut. Turpis egestas sed tempus urna et pharetra pharetra massa. Hac habitasse platea dictumst vestibulum rhoncus. Commodo sed egestas egestas fringilla phasellus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,150),(114,'<p><img alt=\"\" src=\"/img/terre.jpg\" style=\"float:left; width:50%\">egestas erat. Arcu dictum varius duis at. Massa tempor nec feugiat nisl pretium fusce. Suscipit adipiscing bibendum est ultricies integer quis. Massa tempor nec feugiat nisl pretium fusce id velit ut. Turpis egestas sed tempus urna et pharetra pharetra massa. Hac habitasse platea dictumst vestibulum rhoncus. Commodo sed egestas egestas fringilla phasellus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,151),(115,'<p>Sagittis vitae et leo duis ut diam quam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Aliquet enim tortor at auctor urna nunc id cursus metus. Suspendisse faucibus interdum posuere lorem. Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,152),(134,'<h1>Ceci est un test de page builder</h1>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,163),(135,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,163),(136,'<p>elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,164),(137,'<p>elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,165),(138,'<p>elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,166),(139,'<h2>colonne de gauche</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,167),(140,'<p>elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,167),(141,'<h2>Colonne de droite</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,168),(142,'<p>Feugiat pretium nibh ipsum consequat nisl vel pretium lectus. Eget sit amet tellus cras. Ac turpis egestas maecenas pharetra convallis. Ipsum a arcu cursus vitae <strong>congue</strong> mauris rhoncus aenean vel.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,168),(143,'<p>français et américains ont étudié la circulation des colonies de fourmis pendant leur récolte de nourriture. Ils se sont aperçu qu\'elles sont bien plus expertes que nous dans l\'art de réguler le trafic.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,168),(144,'<h3>Première colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,169),(145,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,169),(146,'<h3>Deuxième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,170),(147,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p><div class=\"c-action\"></div>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,170),(148,'<h3>Troisième colonne</h3>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,171),(149,'<p>Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a <strong>cras semper. Rhoncus est </strong>pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,171),(150,'<h2>Pied de page</h2>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,172),(151,'<p>Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu augue ut lectus. Nulla facilisi cras fermentum odio. Adipiscing tristique risus nec feugiat. Enim facilisis gravida neque convallis a cras semper. Rhoncus est pellentesque elit ullamcorper dignissim cras.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,172),(224,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p><div class=\"c-action\"></div>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,221),(225,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,222),(226,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,222),(227,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,223),(228,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,223),(229,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,224),(230,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,225),(231,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,226),(232,'<p>Tristique magna sit amet purus gravida quis. Et sollicitudin ac orci phasellus. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. Sollicitudin aliquam ultrices sagittis orci a. Tortor consequat id porta nibh venenatis cras. Sit amet consectetur adipiscing elit pellentesque. Interdum velit euismod in pellentesque massa placerat.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,227),(233,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,228),(234,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,228),(235,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,228),(236,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,228),(237,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',4,228),(238,'<p>Nisi quis eleifend quam adipiscing vitae. Egestas sed sed risus pretium quam vulputate dignissim. Volutpat lacus laoreet non curabitur.</p>','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',5,228);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_data`
--

DROP TABLE IF EXISTS `content_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_60911EA6C54C8C93` (`type_id`),
  CONSTRAINT `FK_60911EA6C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `content_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_data`
--

LOCK TABLES `content_data` WRITE;
/*!40000 ALTER TABLE `content_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `content_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_type`
--

DROP TABLE IF EXISTS `content_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_type`
--

LOCK TABLES `content_type` WRITE;
/*!40000 ALTER TABLE `content_type` DISABLE KEYS */;
INSERT INTO `content_type` VALUES (1,'texte'),(2,'image'),(3,'diaporama'),(4,'h2'),(5,'h3');
/*!40000 ALTER TABLE `content_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `format_zone`
--

DROP TABLE IF EXISTS `format_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `format_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `format_zone`
--

LOCK TABLES `format_zone` WRITE;
/*!40000 ALTER TABLE `format_zone` DISABLE KEYS */;
INSERT INTO `format_zone` VALUES (1,'Large','12',1),(2,'50:50','6:6',1),(3,'33:66','4:8',1),(4,'25:75','3:9',1),(5,'66:33','8:4',1),(6,'75:25','9:3',1),(7,'30:30:30','4:4:4',1),(8,'25:50:25','3:6:3',1);
/*!40000 ALTER TABLE `format_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20191021083735','2019-10-21 08:37:45'),('20191022164745','2019-10-22 16:47:56'),('20191022165014','2019-10-22 16:50:17'),('20191022165935','2019-10-22 16:59:37'),('20191023072410','2019-10-23 07:24:24'),('20191023154155','2019-10-23 15:42:02'),('20191023154252','2019-10-23 15:42:55'),('20191023154547','2019-10-23 15:46:41'),('20191023155039','2019-10-23 15:50:42'),('20191023155200','2019-10-23 15:52:02'),('20191023161003','2019-10-23 16:10:07'),('20191023161541','2019-10-23 16:15:44'),('20191023163833','2019-10-23 16:38:37'),('20191023164121','2019-10-23 16:41:24'),('20191024092233','2019-10-24 09:22:37'),('20191024133822','2019-10-24 13:38:25');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_site` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (5,'page',1,'2019-10-23 18:48:28','2019-10-23 18:48:28',1,'Page de test','O:8:\"stdClass\":2:{s:7:\"classes\";s:16:\"create container\";s:5:\"style\";s:0:\"\";}','description test'),(6,'page',1,'2019-10-23 19:00:45','2019-10-23 19:00:45',1,'gf','O:8:\"stdClass\":2:{s:7:\"classes\";s:16:\"create container\";s:5:\"style\";s:0:\"\";}',NULL),(7,'page',1,'2019-10-23 19:05:49','2019-10-23 19:05:49',1,'gf','O:8:\"stdClass\":2:{s:7:\"classes\";s:16:\"create container\";s:5:\"style\";s:0:\"\";}',NULL),(8,'page',1,'2019-10-24 14:42:26','2019-10-24 14:42:26',1,'page test','O:8:\"stdClass\":2:{s:7:\"classes\";s:9:\"container\";s:5:\"style\";s:0:\"\";}','Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. In arcu cursus euismod quis. Vitae auctor eu'),(9,'page',1,'2019-10-24 14:45:41','2019-10-24 14:45:41',1,'page testddfdsd','O:8:\"stdClass\":2:{s:7:\"classes\";s:9:\"container\";s:5:\"style\";s:0:\"\";}','Aliquam ultrices sagittis orci a scelerisque purus. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt'),(10,'page',1,'2019-10-24 15:46:00','2019-10-24 15:46:00',1,'vvvcx','O:8:\"stdClass\":2:{s:7:\"classes\";s:9:\"container\";s:5:\"style\";s:0:\"\";}','vxcvx'),(11,'page',1,'2019-10-24 17:20:30','2019-10-24 17:20:30',1,'popopo','O:8:\"stdClass\":2:{s:7:\"classes\";s:9:\"container\";s:5:\"style\";s:0:\"\";}','popo');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zone`
--

DROP TABLE IF EXISTS `zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_format_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `param` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A0EBC007C4663E4` (`page_id`),
  CONSTRAINT `FK_A0EBC007C4663E4` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zone`
--

LOCK TABLES `zone` WRITE;
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
INSERT INTO `zone` VALUES (7,'6:6','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,6),(8,'3:6:3','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,6),(9,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,6),(10,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,6),(11,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,7),(12,'6:6','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,7),(13,'3:6:3','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,7),(14,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,7),(15,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,8),(16,'3:9','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,8),(65,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,9),(66,'3:9','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,9),(83,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,11),(84,'4:4:4','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,11),(85,'6:6','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,11),(86,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,11),(92,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,5),(93,'4:4:4','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,5),(94,'6:6','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,5),(95,'3:6:3','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,5),(96,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',4,5),(111,'12','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',0,10),(112,'6:6','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',1,10),(113,'4:4:4','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',2,10),(114,'4:8','O:8:\"stdClass\":2:{s:7:\"classes\";s:0:\"\";s:5:\"style\";s:0:\"\";}',3,10);
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-09 20:11:52
