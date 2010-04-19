-- MySQL dump 10.13  Distrib 5.1.45, for unknown-linux-gnu (x86_64)
--
-- Host: localhost    Database: monicetc_monicet
-- ------------------------------------------------------
-- Server version	5.1.45-log

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
-- Table structure for table `association`
--

DROP TABLE IF EXISTS `association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `association` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `association`
--

LOCK TABLES `association` WRITE;
/*!40000 ALTER TABLE `association` DISABLE KEYS */;
INSERT INTO `association` VALUES (1,'nada','2010-03-11 09:24:20','2010-03-11 09:24:20'),(2,'pássaros','2010-03-11 09:24:20','2010-03-11 09:24:20'),(3,'atum','2010-03-11 09:24:20','2010-03-11 09:24:20'),(4,'jamantas ou tubarões','2010-03-11 09:24:20','2010-03-11 09:24:20'),(5,'outros cetáceos','2010-03-11 09:24:20','2010-03-11 09:24:20'),(6,'outros animais','2010-03-11 09:24:20','2010-03-11 09:24:20');
/*!40000 ALTER TABLE `association` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `behaviour`
--

DROP TABLE IF EXISTS `behaviour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `behaviour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `behaviour`
--

LOCK TABLES `behaviour` WRITE;
/*!40000 ALTER TABLE `behaviour` DISABLE KEYS */;
INSERT INTO `behaviour` VALUES (1,'socialização','2010-03-11 09:24:20','2010-03-11 09:24:20'),(2,'alimentação','2010-03-11 09:24:20','2010-03-11 09:24:20'),(3,'deslocação','2010-03-11 09:24:20','2010-03-11 09:24:20'),(4,'repouso','2010-03-11 09:24:20','2010-03-11 09:24:20');
/*!40000 ALTER TABLE `behaviour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronym` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` VALUES (1,'I','início','2010-03-11 09:24:20','2010-03-11 09:24:20'),(2,'F','fim','2010-03-11 09:24:20','2010-03-11 09:24:20'),(3,'IA','início do avistamento','2010-03-11 09:24:20','2010-03-11 09:24:20'),(4,'FA','fim do avistamento','2010-03-11 09:24:20','2010-03-11 09:24:20'),(5,'R','registo','2010-03-11 09:24:20','2010-03-11 09:24:20'),(6,'RA','registo de avistamento','2010-03-11 09:24:20','2010-03-11 09:24:20');
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `base_latitude` varchar(45) NOT NULL,
  `base_longitude` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `address` tinytext,
  `island` varchar(255) DEFAULT NULL,
  `council` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Futurismo','3.4','4.3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(2,'Terra Azul','2.1','1.2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(3,'Picos de Aventura','7.8','8.7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_user`
--

DROP TABLE IF EXISTS `company_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_user` (
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`company_id`,`user_id`),
  KEY `company_user_FI_2` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_user`
--

LOCK TABLES `company_user` WRITE;
/*!40000 ALTER TABLE `company_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consorcium_element`
--

DROP TABLE IF EXISTS `consorcium_element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consorcium_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logotype` varchar(255) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `consorcium_element_U_1` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consorcium_element`
--

LOCK TABLES `consorcium_element` WRITE;
/*!40000 ALTER TABLE `consorcium_element` DISABLE KEYS */;
INSERT INTO `consorcium_element` VALUES (1,'CIRN','ebb319871d9176047cf4f949eda0bf4c1d922e8c.jpg','http://cirn.4dproducoes.com/','cirn','2010-03-11 09:24:20','2010-03-13 05:44:47'),(2,'Futurismo','1bc741e449d59965d2e0ea44cf3589c5027f24fa.png','http://www.futurismo.pt','futurismo','2010-03-11 09:24:20','2010-03-15 13:32:04'),(3,'Terra Azul','0f7afe3d8536eae4acded2ad27403b3e8db9e59e.jpg','http://www.terrazulazores.com/','terra_azul','2010-03-11 09:24:20','2010-03-12 04:49:12'),(4,'Picos de Aventura','70f5eb4b23fb62b862de25ee1ae8a717b135a7bd.jpg','http://www.picosdeaventura.com/','picos_de_aventura','2010-03-11 09:24:20','2010-03-15 12:28:39');
/*!40000 ALTER TABLE `consorcium_element` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consorcium_element_i18n`
--

DROP TABLE IF EXISTS `consorcium_element_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consorcium_element_i18n` (
  `id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`,`culture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consorcium_element_i18n`
--

LOCK TABLES `consorcium_element_i18n` WRITE;
/*!40000 ALTER TABLE `consorcium_element_i18n` DISABLE KEYS */;
INSERT INTO `consorcium_element_i18n` VALUES (1,'en','<p>This unit covers a wide range of biological research, from the biochemistry of nematode infection and resistance to human population genetics. Much of this work is directed to understanding the biological resources of the Azores.</p>\r\n<p>MONICET is a project of the <strong>Biodiversity Group </strong>of CIRN.</p>'),(1,'pt','<div>A investiga&ccedil;&atilde;o do CIRN cobre um leque vasto de t&oacute;picos, desde a  bioqu&iacute;mica das infec&ccedil;&otilde;es em nem&aacute;todes at&eacute; &agrave; gen&eacute;tica populacional  humana. Muito deste trabalho &eacute; dirigido ao aumento do conhecimento sobre  os recursos biol&oacute;gicos dos A&ccedil;ores.</div>\r\n<div>O projecto MONICET &eacute;  desenvolvido no <strong>Grupo de Biodiversidade</strong> do CIRN.</div>'),(2,'en','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>With 20 years of experience Futurismo offers a unique experience in the middle of the Atlantic Ocean! Our guides will let you have some of the most spectacular adventures that nature has to offer.</p>'),(2,'pt','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Com 20 anos de experi&ecirc;ncia a Futurismo proporciona uma aventura fant&aacute;stica no meio do Oceano Atl&acirc;ntico! Os nossos guias v&atilde;o proporcionar-lhe as experi&ecirc;ncias mais espetaculares que a natureza tem para oferecer.</p>'),(3,'en','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>TERRA AZUL-<em>azores whale watching</em> was born in 2001 under the slogan Ecotourism, Education and Conservation.</p>\r\n<p>Being established in the &nbsp;Marina of Vilafranca do Campo, palced on the center of the South shore of S&atilde;o Miguel Island, seeks to provide its costumers unique and memorable experiences, discovering the &ldquo;<em>fanatasy world of dolphins and whales of the Azores</em>&rdquo;.Whether throught the Whale Watching or Swiming With Dolphins, their main purpose is to stimulate new connections between people and nature, through a better understanding of the diversity of marine wildlife.</p>'),(3,'pt','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>TERRA AZUL &ndash; <em>azores whale watching</em> nasceu em 2001 sob o lema do Ecoturismo, Educa&ccedil;&atilde;o e Conserva&ccedil;&atilde;o.</p>\r\n<p>Estabelecendo a sua base na Marina de Vila Franca do Campo, centro/sul da ilha de S. Miguel, procura proporcionar aos seus clientes experi&ecirc;ncias, &uacute;nicas e memor&aacute;veis, &agrave; descoberta do &ldquo;<em>mundo fant&aacute;stico dos golfinhos e das baleias dos A&ccedil;ores</em>&rdquo;.  Seja atrav&eacute;s da observa&ccedil;&atilde;o dos cet&aacute;ceos ou da nata&ccedil;&atilde;o com os golfinhos, o seu principal objectivo &eacute; estimular novas conex&otilde;es entre as Pessoas e a Natureza, atrav&eacute;s de um melhor conhecimento da diversidade da vida marinha selvagem</p>'),(4,'en','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Created in 2003, Picos de Aventura is a company of Touristic Entertainment that allows you to enjoy the best that the Azores have to offer.</p>\r\n<p>As the only company with Azorean System Certification Quality Management APCER and IQNet. Its activities, in sea and in land, give you the opportunity to know all the corners of S&atilde;o Miguel&rsquo;s island, involving you in constant interaction with nature, an approach of respect and preservation of the environment and biodiversity characteristic of the region.</p>'),(4,'pt','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Criada em 2003, a Picos de Aventura &eacute; uma empresa de Anima&ccedil;&atilde;o Tur&iacute;stica que lhe permite desfrutar do que os A&ccedil;ores t&ecirc;m de melhor para oferecer.</p>\r\n<p>Sendo a &uacute;nica empresa a&ccedil;oriana com Certifica&ccedil;&atilde;o de Sistema de Gest&atilde;o da Qualidade pela APCER e IQNet.  As suas actividades, quer em mar quer em terra, permitem-lhe conhecer os recantos da ilha de S&atilde;o Miguel, envolvendo-o numa interac&ccedil;&atilde;o constante com a natureza, numa l&oacute;gica de respeito e preserva&ccedil;&atilde;o do meio ambiente, e da biodiversidade caracter&iacute;stica da regi&atilde;o.</p>');
/*!40000 ALTER TABLE `consorcium_element_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_info`
--

DROP TABLE IF EXISTS `general_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vessel_id` int(11) NOT NULL,
  `skipper_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `base_latitude` varchar(45) NOT NULL,
  `base_longitude` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `general_info_FI_1` (`vessel_id`),
  KEY `general_info_FI_2` (`skipper_id`),
  KEY `general_info_FI_3` (`guide_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_info`
--

LOCK TABLES `general_info` WRITE;
/*!40000 ALTER TABLE `general_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `general_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guide`
--

DROP TABLE IF EXISTS `guide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guide_FI_1` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guide`
--

LOCK TABLES `guide` WRITE;
/*!40000 ALTER TABLE `guide` DISABLE KEYS */;
/*!40000 ALTER TABLE `guide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `message` tinytext,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mf_formulario`
--

DROP TABLE IF EXISTS `mf_formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mf_formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regra` varchar(255) NOT NULL,
  `visivel` tinyint(4) DEFAULT '1',
  `ao_editar` tinyint(4) DEFAULT '1',
  `ao_criar` tinyint(4) DEFAULT '1',
  `observacoes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mf_formulario`
--

LOCK TABLES `mf_formulario` WRITE;
/*!40000 ALTER TABLE `mf_formulario` DISABLE KEYS */;
/*!40000 ALTER TABLE `mf_formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mf_formulario_utilizador`
--

DROP TABLE IF EXISTS `mf_formulario_utilizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mf_formulario_utilizador` (
  `formulario_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  PRIMARY KEY (`formulario_id`,`utilizador_id`),
  KEY `mf_formulario_utilizador_I_1` (`formulario_id`),
  KEY `mf_formulario_utilizador_I_2` (`utilizador_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mf_formulario_utilizador`
--

LOCK TABLES `mf_formulario_utilizador` WRITE;
/*!40000 ALTER TABLE `mf_formulario_utilizador` DISABLE KEYS */;
/*!40000 ALTER TABLE `mf_formulario_utilizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mf_log`
--

DROP TABLE IF EXISTS `mf_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mf_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mf_log`
--

LOCK TABLES `mf_log` WRITE;
/*!40000 ALTER TABLE `mf_log` DISABLE KEYS */;
INSERT INTO `mf_log` VALUES (1,'warning','Utilizador monicet tentou aceder à accção \"index\" do módulo \"consorcium_element\" mas não tem permissão.','2010-03-11 09:25:28'),(2,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:38:06'),(3,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:38:40'),(4,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:39:19'),(5,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:41:35'),(6,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:44:42'),(7,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:45:38'),(8,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:47:30'),(9,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:47:42'),(10,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:49:47'),(11,'error','Ocorreu a seguinte excepção: \"Format \'TXT\' is not supported.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/1\".','2010-03-12 06:50:26'),(12,'error','Ocorreu a seguinte excepção: \"Format \'TXT\' is not supported.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/1\".','2010-03-12 06:50:55'),(13,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:51:25'),(14,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:51:31'),(15,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:51:52'),(16,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/cirn.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://monicet.net/admin.php/consorcium_element/1\".','2010-03-12 06:51:52'),(17,'error','Ocorreu a seguinte excepção: \"Format \'TXT\' is not supported.\" no módulo \"news_article\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/news_article/1\".','2010-03-12 06:51:53'),(18,'error','Ocorreu a seguinte excepção: \"Action \"news_article/show\" does not exist.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1\".','2010-03-12 06:52:12'),(19,'error','Ocorreu a seguinte excepção: \"Action \"news_article/1\" does not exist.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1/css/content.css\".','2010-03-12 06:52:31'),(20,'error','Ocorreu a seguinte excepção: \"Action \"news_article/1\" does not exist.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1/css/content.css\".','2010-03-12 06:52:32'),(21,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:52:36'),(22,'error','Ocorreu a seguinte excepção: \"Format \'TXT\' is not supported.\" no módulo \"news_article\" e acção \"update\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1\".','2010-03-12 06:52:39'),(23,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/cirn.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://monicet.net/admin.php/consorcium_element/1\".','2010-03-12 06:55:43'),(24,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 06:55:44'),(25,'error','Ocorreu a seguinte excepção: \"Format \'TXT\' is not supported.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/2\".','2010-03-12 06:56:13'),(26,'error','Ocorreu a seguinte excepção: \"Action \"news_article/1\" does not exist.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1/css/content.css\".','2010-03-12 06:57:02'),(27,'error','Ocorreu a seguinte excepção: \"Action \"news_article/1\" does not exist.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/backend_dev.php/news_article/1/css/content.css\".','2010-03-12 06:57:03'),(28,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:01:03'),(29,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/cirn.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://monicet.net/admin.php/consorcium_element/1\".','2010-03-12 07:01:21'),(30,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:03:06'),(31,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/futurismo.png\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/2\".','2010-03-12 07:03:09'),(32,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:10:48'),(33,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/futurismo.png\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/2\".','2010-03-12 07:10:50'),(34,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:11:24'),(35,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/cirn.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://monicet.net/admin.php/consorcium_element/1\".','2010-03-12 07:11:32'),(36,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:34:03'),(37,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:34:16'),(38,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:34:27'),(39,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:35:33'),(40,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:36:12'),(41,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:36:47'),(42,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 07:37:34'),(43,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 08:29:13'),(44,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 08:29:14'),(45,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/cirn.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/1\".','2010-03-12 08:31:20'),(46,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 08:57:07'),(47,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 08:59:13'),(48,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/team/natacha-soto.jpg\' appears to be an invalid image source.\" no módulo \"team\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/team/5\".','2010-03-12 08:59:24'),(49,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:49:24'),(50,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:49:37'),(51,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:49:51'),(52,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:50:34'),(53,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:50:43'),(54,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:50:45'),(55,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:01'),(56,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:13'),(57,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:19'),(58,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:21'),(59,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:23'),(60,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:51:42'),(61,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:03'),(62,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:17'),(63,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:28'),(64,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:30'),(65,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:47'),(66,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:52:48'),(67,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:53:52'),(68,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:53:53'),(69,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:54:03'),(70,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 09:59:34'),(71,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:00:15'),(72,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:00:36'),(73,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:00:37'),(74,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:00:55'),(75,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:01:34'),(76,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:01:35'),(77,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:02:40'),(78,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:03:45'),(79,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:04:04'),(80,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:04:33'),(81,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:04:58'),(82,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:06:42'),(83,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:08:44'),(84,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:09:12'),(85,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:09:52'),(86,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:09:52'),(87,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:10:23'),(88,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:10:24'),(89,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:12:26'),(90,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:12:41'),(91,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:13:14'),(92,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:13:15'),(93,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:15:05'),(94,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:15:41'),(95,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:16:36'),(96,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/2\".','2010-03-12 10:16:40'),(97,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/2\".','2010-03-12 10:16:56'),(98,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:17:03'),(99,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:17:49'),(100,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:18:26'),(101,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:25:36'),(102,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:30:03'),(103,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:30:22'),(104,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:30:58'),(105,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:31:21'),(106,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:32:07'),(107,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:32:16'),(108,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:32:27'),(109,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:40:04'),(110,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-12 10:40:07'),(111,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:40:12'),(112,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-12 10:44:56'),(113,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 10:56:24'),(114,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/2\".','2010-03-12 11:01:01'),(115,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-12 11:12:21'),(116,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:41:59'),(117,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:42:01'),(118,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:44:02'),(119,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:44:07'),(120,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:44:49'),(121,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:44:50'),(122,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/4\".','2010-03-13 05:46:41'),(123,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:46:53'),(124,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:47:24'),(125,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 05:47:24'),(126,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:42:51'),(127,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:42:52'),(128,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:43:07'),(129,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:43:07'),(130,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:44:34'),(131,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:44:35'),(132,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:45:00'),(133,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:45:01'),(134,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:45:58'),(135,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 09:45:58'),(136,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:00'),(137,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:01'),(138,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:15'),(139,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:16'),(140,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:27'),(141,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-13 10:41:28'),(142,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/4\".','2010-03-13 10:41:42'),(143,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 04:52:14'),(144,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 04:52:44'),(145,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 04:57:01'),(146,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 05:47:54'),(147,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 05:48:11'),(148,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 05:48:15'),(149,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 06:42:38'),(150,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 06:42:42'),(151,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 07:01:19'),(152,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 07:01:26'),(153,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 09:00:22'),(154,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 09:00:27'),(155,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 09:41:19'),(156,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 09:41:25'),(157,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 10:41:04'),(158,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 10:41:12'),(159,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 11:52:03'),(160,'error','Ocorreu a seguinte excepção: \"File \'/home/monicetc/symfony/projects/monicet/web/uploads/consorcium/d599c183911de33c343095ae0cb81b9be90e1e37.jpg\' appears to be an invalid image source.\" no módulo \"consorcium_element\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/consorcium_element/4\".','2010-03-15 11:52:09'),(161,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 12:36:34'),(162,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 12:36:42'),(163,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 12:40:15'),(164,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 12:40:53'),(165,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 12:41:07'),(166,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 13:31:58'),(167,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-15 13:32:08'),(168,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/4\".','2010-03-18 10:05:34'),(169,'error','Ocorreu a seguinte excepção: \"Unable to execute DELETE statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`monicetc_monicet`.`news_article_i18n`, CONSTRAINT `news_article_i18n_FK_1` FOREIGN KEY (`id`) REFERENCES `news_article` (`id`))]\" no módulo \"news_article\" e acção \"delete\" no endereço \"http://www.monicet.net/admin.php/news_article/1\".','2010-03-18 10:07:05'),(170,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-18 14:16:41'),(171,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-18 14:16:41'),(172,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-18 14:35:38'),(173,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:47:46'),(174,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:49:11'),(175,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:49:51'),(176,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:50:56'),(177,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:51:25'),(178,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:51:44'),(179,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:51:59'),(180,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:52:12'),(181,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:52:54'),(182,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:53:50'),(183,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:54:34'),(184,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:54:48'),(185,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:55:09'),(186,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:56:12'),(187,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:56:34'),(188,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:57:05'),(189,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:57:42'),(190,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:58:03'),(191,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:58:28'),(192,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 04:58:50'),(193,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:02:12'),(194,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:03:01'),(195,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:03:24'),(196,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:03:58'),(197,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:04:53'),(198,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:05:05'),(199,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:05:22'),(200,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:07:32'),(201,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:07:42'),(202,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:08:00'),(203,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:08:11'),(204,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:09:45'),(205,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:10:03'),(206,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:11:10'),(207,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:11:18'),(208,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:11:38'),(209,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:12:22'),(210,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:13:11'),(211,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 05:13:44'),(212,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 08:20:11'),(213,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 08:20:22'),(214,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 08:20:40'),(215,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-19 08:20:49'),(216,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:33:35'),(217,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:33:35'),(218,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:41:27'),(219,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:41:28'),(220,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:42:10'),(221,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:42:10'),(222,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:43:21'),(223,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:44:01'),(224,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:44:11'),(225,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:44:18'),(226,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:45:12'),(227,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:45:13'),(228,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:45:22'),(229,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:45:38'),(230,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:46:48'),(231,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:46:48'),(232,'error','Ocorreu a seguinte excepção: \"Unable to execute INSERT statement. [wrapped: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry \'\' for key \'news_article_U_1\']\" no módulo \"news_article\" e acção \"create\" no endereço \"http://www.monicet.net/admin.php/news_article\".','2010-03-22 12:52:49'),(233,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:53:15'),(234,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-22 12:53:15'),(235,'error','Ocorreu a seguinte excepção: \"The module \"mfLog\" is not enabled.\" no módulo \"\" e acção \"\" no endereço \"http://www.monicet.net/log/new\".','2010-03-22 12:59:36'),(236,'error','Ocorreu a seguinte excepção: \"Call to undefined method: getPublishedDate\" no módulo \"news\" e acção \"show\" no endereço \"http://www.monicet.net/pt/news/arranque_do_projecto\".','2010-03-22 13:18:00'),(237,'error','Ocorreu a seguinte excepção: \"Call to undefined method: getPublishedDate\" no módulo \"news\" e acção \"show\" no endereço \"http://www.monicet.net/en/news/news_article_h2_en\".','2010-03-22 13:18:09'),(238,'error','Ocorreu a seguinte excepção: \"Call to undefined method: getPublishedDate\" no módulo \"news\" e acção \"all\" no endereço \"http://www.monicet.net/en/news/all\".','2010-03-22 13:18:11'),(239,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:30:10'),(240,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:30:10'),(241,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:32:47'),(242,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:32:47'),(243,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:40:22'),(244,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-23 05:40:22'),(245,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:23:16'),(246,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:25:37'),(247,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:26:41'),(248,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:33:59'),(249,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:39:32'),(250,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:39:46'),(251,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:39:55'),(252,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:42:48'),(253,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:45:29'),(254,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:50:26'),(255,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:51:27'),(256,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:52:48'),(257,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:52:49'),(258,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:53:22'),(259,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:53:23'),(260,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:55:44'),(261,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:55:45'),(262,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:56:52'),(263,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 14:56:52'),(264,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:00:04'),(265,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:00:04'),(266,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:20:04'),(267,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:20:05'),(268,'error','Ocorreu a seguinte excepção: \"File \'/home1/monicetc/symfony/projects/monicet/web/uploads/news/2a26d55f0e6d230d1967ea1d5ee45fd8023ec5c0.jpg\' appears to be an invalid image source.\" no módulo \"news_article\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/news_article/9\".','2010-03-25 15:20:10'),(269,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:20:44'),(270,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-25 15:20:45'),(271,'error','Ocorreu a seguinte excepção: \"File \'/home1/monicetc/symfony/projects/monicet/web/uploads/news/2a26d55f0e6d230d1967ea1d5ee45fd8023ec5c0.jpg\' appears to be an invalid image source.\" no módulo \"news_article\" e acção \"update\" no endereço \"http://www.monicet.net/admin.php/news_article/9\".','2010-03-25 15:20:58'),(272,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-26 09:43:21'),(273,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-03-26 09:44:02'),(274,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-04-16 07:59:16'),(275,'warning','Utilizador monicet tentou aceder à accção \"error404\" do módulo \"default\" mas não tem permissão.','2010-04-16 08:00:42');
/*!40000 ALTER TABLE `mf_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mf_menu`
--

DROP TABLE IF EXISTS `mf_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mf_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `menu_pai_id` int(11) DEFAULT NULL,
  `rota` varchar(255) DEFAULT NULL,
  `permissao_id` int(11) DEFAULT NULL,
  `posicao` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mf_menu_I_1` (`nome`),
  KEY `mf_menu_FI_1` (`menu_pai_id`),
  KEY `mf_menu_FI_2` (`permissao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mf_menu`
--

LOCK TABLES `mf_menu` WRITE;
/*!40000 ALTER TABLE `mf_menu` DISABLE KEYS */;
INSERT INTO `mf_menu` VALUES (1,'Sítio web',NULL,NULL,1,10,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(2,'Administração',NULL,NULL,1,20,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(3,'Administração Mar',NULL,NULL,1,30,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(4,'Registos Mar',NULL,NULL,1,40,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(5,'Notícias',1,'news_article',1,10,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(6,'Consórcio',1,'consorcium_element',1,20,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(7,'Equipa',1,'team',1,30,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(8,'Grupos de espécies',3,'specie_group',1,10,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(9,'Espécies',3,'specie',1,20,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(10,'Associações',3,'association',1,30,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(11,'Comportamento',3,'behaviour',1,40,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(12,'Códigos',3,'code',1,50,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(13,'Estados do mar',3,'sea_state',1,60,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(14,'Visibilidade',3,'visibility',1,70,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(15,'Barcos',3,'vessel',1,80,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(16,'Registo',4,'record',1,10,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(17,'Avistamento',4,'sighting',1,20,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(18,'Saídas',4,'general_info',1,30,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(19,'Empresas',2,'company',1,10,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(20,'Utilizadores',2,'sf_guard_user',1,20,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(21,'Administração',NULL,NULL,2,20,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(22,'Administração Mar',NULL,NULL,2,30,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(23,'Registos Mar',NULL,NULL,2,40,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(24,'Espécies',22,'specie',2,20,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(25,'Registo',23,'record',NULL,10,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(26,'Avistamento',23,'sighting',2,20,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(27,'Saídas',23,'general_info',2,30,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(28,'Empresas',21,'company',2,10,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(29,'Utilizadores',21,'sf_guard_user',2,30,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(30,'Administração',NULL,NULL,3,40,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(31,'Registos Mar',NULL,NULL,3,40,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(32,'Registo',31,'record',3,10,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(33,'Saídas',31,'general_info',3,30,'2010-03-11 09:24:20','2010-03-11 09:24:20'),(34,'Utilizadores',30,'sf_guard_user',3,30,'2010-03-11 09:24:20','2010-03-11 09:24:20');
/*!40000 ALTER TABLE `mf_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_article`
--

DROP TABLE IF EXISTS `news_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_published` tinyint(4) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `enter_date` date DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `publish_date` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_article_U_1` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_article`
--

LOCK TABLES `news_article` WRITE;
/*!40000 ALTER TABLE `news_article` DISABLE KEYS */;
INSERT INTO `news_article` VALUES (5,1,'arranque_do_projecto',NULL,'2009-11-01',NULL,'2009-11-01','2010-03-22 12:41:25','2010-03-22 12:58:59'),(6,1,'apresentacao_publica',NULL,'2010-03-23','2010-03-25','2010-03-23','2010-03-23 05:32:45','2010-03-23 05:32:45'),(9,1,'apresentacao_do_projecto','5610d9e52dfe85b9b3090fd9b2e11edf59657e96.jpg',NULL,NULL,'2010-03-25','2010-03-25 14:39:42','2010-04-14 07:29:20');
/*!40000 ALTER TABLE `news_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_article_i18n`
--

DROP TABLE IF EXISTS `news_article_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_article_i18n` (
  `id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`,`culture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_article_i18n`
--

LOCK TABLES `news_article_i18n` WRITE;
/*!40000 ALTER TABLE `news_article_i18n` DISABLE KEYS */;
INSERT INTO `news_article_i18n` VALUES (5,'en','Project start','<p>Today is the official starting date of the project. An important day,&nbsp;in a line of&nbsp;work that&nbsp;started several years ago and that we hope it will continue long before this particular project is over. For the good of the cetaceans in the Azores and of the people that like them and depend on them.</p>'),(5,'pt','Arranque do projecto','<p>Hoje, 1 de Novembro de 2009, arrancou oficialmente o projecto. Uma data apenas, num trabalho que come&ccedil;ou j&aacute; h&aacute; alguns anos e que se espera que se prolongue por muitos mais. A bem dos cet&aacute;ceos dos A&ccedil;ores e das pessoas que deles gostam e que deles dependem.</p>'),(6,'en','Public presentation','<p>A public presentation of the project will take place wednesday, March  24, to launch the project\'s web site and the preparation of the data  collection for this season. The event will take place on Anf. VI of the  Scientific Complex, at the Ponta Delgada campus of the University of the  Azores. The entrance is free.</p>'),(6,'pt','Apresentação pública','<div>Vai realizar-se na quarta-feira, dia 24 de Mar&ccedil;o, uma apresenta&ccedil;&atilde;o  p&uacute;blica do projecto, sinalizando o lan&ccedil;amento do s&iacute;tio internet e o  in&iacute;cio dos trabalhos preparat&oacute;rios da recolha de dados da pr&oacute;xima &eacute;poca.  O evento realiza-se no Anfiteatro VI do Complexo Cient&iacute;fico da  Universidade dos A&ccedil;ores, em Ponta Delgada. A entrada &eacute; livre.</div>'),(9,'en','Public presentation','<p>The MONICET project was presented yesterday in Ponta Delgada, on the Anf. IV of the Scientific Complex of the University of the Azores, to mark the lunching of the site. In the presentatin were present all the consortium members, as well as the project\'s scientific team.</p>\r\n<p>On the assistence were students, teachers, members of the consortium companies and other interested persons, along with several local journalists.</p>'),(9,'pt','Apresentação do Projecto','<p>Foi ontem realizada, no Anf. IV do Complexo Cient&iacute;fico da Universidade dos A&ccedil;ores, em Ponta Delgada, a apresenta&ccedil;&atilde;o publica do projecto MONICET, coincidindo com o lan&ccedil;amento do site. Nesta apresenta&ccedil;&atilde;o estiveram presentes todos os membros do cons&oacute;rcio, assim como a equipa cientifica responsavel pelo projecto.&nbsp;</p>\r\n<p>Assistiram &agrave; apresenta&ccedil;&atilde;o alunos, professores, colaboradores das empresas envolvidas no cons&oacute;rcio e outras pessoas interessadas, assim como diversos meios de comunica&ccedil;&atilde;o social.</p>');
/*!40000 ALTER TABLE `news_article_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `initial` varchar(255) DEFAULT '',
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_id` int(11) NOT NULL,
  `visibility_id` int(11) NOT NULL,
  `sea_state_id` int(11) NOT NULL,
  `general_info_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `comments` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `record_FI_1` (`code_id`),
  KEY `record_FI_2` (`visibility_id`),
  KEY `record_FI_3` (`sea_state_id`),
  KEY `record_FI_4` (`general_info_id`),
  KEY `record_FI_5` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sea_state`
--

DROP TABLE IF EXISTS `sea_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sea_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sea_state_U_1` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sea_state`
--

LOCK TABLES `sea_state` WRITE;
/*!40000 ALTER TABLE `sea_state` DISABLE KEYS */;
/*!40000 ALTER TABLE `sea_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_group_U_1` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_permission_U_1` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_permission` VALUES (1,'administrator','global administrator'),(2,'boss','administrator of a company'),(3,'employee','regular worker'),(4,'association.*','All association actions'),(5,'behaviour.*','All behaviour actions'),(6,'code.*','All behaviour actions'),(7,'company.*','All company actions'),(8,'consorcium_element.*','All concorcium actions'),(9,'general_info.*','All general info actions'),(10,'news_article.*','All news actions'),(11,'record.*','All record actions'),(12,'sea_state.*','All sea_state actions'),(13,'utilizador.*','All user actions'),(14,'sighting.*','All sighting actions'),(15,'specie_group.*','All specie group actions'),(16,'specie.*','All specie actions'),(17,'team.*','All team actions'),(18,'vessel.*','All vessel actions'),(19,'visibility.*','All visibility actions');
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ip_address`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,'morfose','sha1','bc488e0118f80affaab059f9b2c1d246','26984f29f147ae9d319fc9cb2b69870d4d7abba9','2010-03-11 09:24:19','2010-04-19 08:43:42',1,1),(2,'monicet','sha1','fd3bb1e4c6102f673894fa3c8451d8de','91dfb89b1db26d6807c2db2aed8c7a6100873800','2010-03-11 09:24:19','2010-04-16 07:41:51',1,0),(3,'joao','sha1','601008df90d185a5112d8920a134694a','5e3a75475a17102151fd3ffe2ab4dee4708ce024','2010-03-11 09:24:19',NULL,1,0),(4,'joana','sha1','4947cd946033d22435d9f7885f607711','c01237931c88f81f6722dc79f3fa5960f9337358','2010-03-11 09:24:19',NULL,1,0),(5,'pedro','sha1','df59ca042d5f7a1a5d307b0434bcdc55','e66c03ca96084688254e3c68d8c5c7d793bb4986','2010-03-11 09:24:19',NULL,1,0);
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
INSERT INTO `sf_guard_user_permission` VALUES (2,1),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,16),(2,17),(2,18),(2,19),(3,2),(4,3);
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sighting`
--

DROP TABLE IF EXISTS `sighting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sighting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `behaviour_id` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  `adults` int(11) DEFAULT '0',
  `juveniles` int(11) DEFAULT '0',
  `cubs` int(11) DEFAULT '0',
  `total` int(11) DEFAULT NULL,
  `num_vessels` int(11) DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sighting_FI_1` (`record_id`),
  KEY `sighting_FI_2` (`specie_id`),
  KEY `sighting_FI_3` (`behaviour_id`),
  KEY `sighting_FI_4` (`association_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sighting`
--

LOCK TABLES `sighting` WRITE;
/*!40000 ALTER TABLE `sighting` DISABLE KEYS */;
/*!40000 ALTER TABLE `sighting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specie`
--

DROP TABLE IF EXISTS `specie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specie_group_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `specie_FI_1` (`specie_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specie`
--

LOCK TABLES `specie` WRITE;
/*!40000 ALTER TABLE `specie` DISABLE KEYS */;
/*!40000 ALTER TABLE `specie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specie_group`
--

DROP TABLE IF EXISTS `specie_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specie_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specie_group`
--

LOCK TABLES `specie_group` WRITE;
/*!40000 ALTER TABLE `specie_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `specie_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(512) NOT NULL,
  `link` varchar(1024) DEFAULT NULL,
  `photo` varchar(1024) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_U_1` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'ana-neto','investigador','Ana Isabel Neto','','87dfc7d19c439ec31e01f05eb3aad5492878a302.jpg','2010-03-11 09:24:20','2010-03-13 09:43:03'),(2,'jose-azevedo','investigador','José Manuel N. Azevedo','http://www.uac.pt/~jazevedo','d668bf01ebd2c2314c3cec7fa94d80a744416d50.jpg','2010-03-11 09:24:20','2010-03-12 10:01:30'),(3,'marc-fernandez','investigador','Marc Fernandez','','75711cc679292d16bb848d1d293566af85b6b66d.jpg','2010-03-11 09:24:20','2010-03-12 10:12:36'),(4,'peter-evans','consultor','Peter Evans','http://www.seawatchfoundation.org.uk/','9dc5e1a63e7ef493ee860efad9071322d7f63340.jpg','2010-03-11 09:24:20','2010-03-12 10:17:42'),(5,'natacha-soto','consultor','Natacha Aguilar Soto','http://viinv.ull.es/grupos/1246','4981bdb48c3deb57cccbfde75b4d1e1c0e47cbe5.jpg','2010-03-11 09:24:20','2010-03-12 10:04:52'),(6,'carole-carlson','consultor','Carole Carlson','http://www.whalewatch.com','ef9e4d642069cb792b22243f13639e7c5ebb069f.jpg','2010-03-11 09:24:20','2010-03-12 10:09:07'),(7,'jonathan-gordon','consultor','Jonathan Gordon','http://www.smru.st-andrews.ac.uk/staffProfile.aspx?sunID=jg20','1fe7d53b598e34034acc175fef0bf62fcb3ab58a.jpg','2010-03-11 09:24:20','2010-03-19 05:05:02'),(8,'lenin-oviedo','consultor','Lenin Oviedo','','394a9053dc6b395665fab313f06c1d9018b4ab1d.jpg','2010-03-11 09:24:20','2010-03-12 10:02:35');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_i18n`
--

DROP TABLE IF EXISTS `team_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_i18n` (
  `id` int(11) NOT NULL,
  `culture` varchar(7) NOT NULL,
  `about` text,
  PRIMARY KEY (`id`,`culture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_i18n`
--

LOCK TABLES `team_i18n` WRITE;
/*!40000 ALTER TABLE `team_i18n` DISABLE KEYS */;
INSERT INTO `team_i18n` VALUES (1,'en','<p><strong>Project coordinator</strong></p>\r\n<p>Assistant professor at the Department of Biology of the University of the Azores.</p>\r\n<p>Coordinator of the Biodiversity Group at CIRN.</p>'),(1,'pt','<p><strong>Coordenadora do projecto</strong></p>\r\n<p>Professora auxiliar do Departamento de Biologia da Universidade dos A&ccedil;ores.</p>\r\n<p>Coordenadora do Grupo de Biodiversidade do CIRN</p>'),(2,'en','<p><strong>Scientific coordinator</strong></p>\r\n<p>Assistant professor at the Department of Biology, University of the Azores</p>\r\n<p>PhD in Animal Ecology</p>'),(2,'pt','<p><strong>Coordenador cient&iacute;fico</strong></p>\r\n<p>Professor auxiliar do Departamento de Biologia da Universidade dos A&ccedil;ores.</p>\r\n<p>Doutorado em Ecologia Animal.</p>'),(3,'en','<p>Research assistant granted by Fundo Regional de Ci&ecirc;ncia e Tecnologia.</p>\r\n<p>Degree on Marine Sciences by the University of Las Palmas de Gran Canaria.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Has worked in Costa Rica and Azores, mostly on the cetacean distribution and their relations with the environment and eco-geographical variables.</p>'),(3,'pt','<p>Bolseiro de Investiga&ccedil;&atilde;o do Fundo Regional de Ci&ecirc;ncia e Tecnologia.</p>\r\n<p>Licenciado em Ci&ecirc;ncias do Mar pela Universiadade das Palmas de Gran Canaria.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>T&ecirc;m trabalhado na Costa Rica e nos A&ccedil;ores, basicamente na distribui&ccedil;&atilde;o de cet&aacute;ceos e as rela&ccedil;&otilde;es com o seu ambiente e vari&aacute;veis eco-geogr&aacute;ficas.</p>'),(4,'en','<p><strong>Director of&nbsp;<a id=\"q.7i\" title=\"Sea Watch\" href=\"http://www.seawatchfoundation.org.uk/index.php\">Sea Watch Foundation</a>, a national marine conservation research charity dedicated to the protection of cetaceans around the UK. Founding Secretary of the&nbsp;<strong><a href=\"http://www.europeancetaceansociety.eu/\" target=\"_blank\">European Cetacean Society</a></strong>, and later Chairman, as well as Editor for 21 years. He is a Trustee of the&nbsp;<strong><strong><a href=\"http://www.whaledolphintrust.co.uk/\" target=\"_blank\">Hebridean Whale and Dolphin Trust</a></strong></strong>, and advisor to the government and various NGO\'s on cetacean matters.</strong></p>\r\n<p><strong>Peter\'s field research concentrates upon ecological, behavioural and conservation biology studies of cetaceans in UK particularly harbour porpoises, bottlenose dolphins and minke whales, as well as the effects of human disturbance upon cetaceans. He has written or edited 12 books and 120 scientific publications, and is Honorary Senior Lecturer at the&nbsp;<a id=\"riat\" title=\"School of Ocean Sciences\" href=\"http://www.sos.bangor.ac.uk/\">School of Ocean Sciences</a>, University of Bangor.<br /></strong></p>'),(4,'pt','<p><strong>Director da&nbsp;<a href=\"http://www.seawatchfoundation.org.uk\" target=\"_blank\">Sea Watch Foundation</a>, uma organiza&ccedil;&atilde;o dedicada &agrave; protec&ccedil;&atilde;o dos cet&aacute;ceos no Reino Unido. Secret&aacute;rio fundador da <a href=\"http://www.europeancetaceansociety.eu/\" target=\"_blank\">European Cetacean Society</a>, da qual foi director e editor durante 21 anos. Administrador do&nbsp;<strong><a href=\"http://www.whaledolphintrust.co.uk/\" target=\"_blank\">Hebridean Whale and Dolphin Trust</a>, e conselheiro governamental em assuntos relacionados com os cet&aacute;ceos.</strong></strong></p>\r\n<p><strong><strong>A sua investiga&ccedil;&atilde;o concentra-se em estudos de biologia, ecologia, comportamento e conserva&ccedil;&atilde;o de cet&aacute;ceos no Reino Unido, particularmente toninhas, roazes e baleias-an&atilde;s, assim como nos efeitos de perturba&ccedil;&otilde;es de origem humana. Escreveu 12 livros e mais de 120 publica&ccedil;&otilde;es cient&iacute;ficas. &Eacute; professor catedr&aacute;tico honor&aacute;rio na&nbsp;<strong><a id=\"riat\" title=\"School of Ocean Sciences\" href=\"http://www.sos.bangor.ac.uk/\">School of Ocean Sciences</a>, Universidade de Bangor.</strong><br /></strong></strong></p>'),(5,'en','<p>Dr. Natacha Aguilar de Soto is the director of the cetacean research line within&nbsp; <strong><a href=\"http://viinv.ull.es/grupos/1246/\" target=\"_blank\">BIOECOMAC</a></strong> (Grupo Investigaci&oacute;n en Biodiversidad, Ecolog&iacute;a Marina y Conservaci&oacute;n) of <strong><a href=\"http://www.ull.es\" target=\"_blank\">La Laguna University</a></strong>, Canary Islands. Dr. Aguilar de Soto has directed and participated in several studies related with noise disturbance in cetaceans, as well as acoustic ecology and diving behaviour of Pilot Whales and Beaked Whales. At the moment she has an EU Marie Curie Fellowship and combines research in Auckland University and in the Canary Islands.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><a href=\"http://www.cetabase.info\" target=\"_blank\">CETABASE</a></strong>&nbsp;(online photoID tool open to collaborative research)</p>'),(5,'pt','<p>A Doutora Natacha Aguilar de Soto &eacute; a directora da linha de investiga&ccedil;&atilde;o de cet&aacute;ceos&nbsp; do <strong><a href=\"http://viinv.ull.es/grupos/1246/\" target=\"_blank\">BIOECOMAC</a> </strong>(Grupo Investigaci&oacute;n en Biodiversidad, Ecolog&iacute;a Marina y Conservaci&oacute;n) da <strong><a href=\"http://www.ull.es\" target=\"_blank\">Universidade da Laguna</a></strong> (Ilhas Canarias). A Doutora Aguilar de Soto tem dirigido e participado em varios estudo na &aacute;rea da polui&ccedil;&atilde;o ac&uacute;stica em cet&aacute;ceos, assim como tamb&eacute;m ecologia acustica e comportamento no mergulho de Balieas Piloto e&nbsp; Baleias de Bico. Na actualidade t&ecirc;m uma bolsa EU Marie Curie Fellowship e combina isso com a investiga&ccedil;&atilde;o na Universidade de Auckland e nas Ilhas Canarias.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><a href=\"http://www.cetabase.info\" target=\"_blank\">CETABASE</a></strong> (Base de dados de fotoidentifica&ccedil;&atilde;o aberta a colabora&ccedil;&atilde;o cientifica)</p>'),(6,'en','<p>Dr. Carole Carlson directs the research and education program of the <strong><a href=\"http://www.whalewatch.com\">Dolphin Fleet</a></strong> and is an Adjunct Scientist at the Provincetown Center for Coastal Studies and College of the Atlantic, Bar harbor Maine, USA. Dr. Carlson has extensive humpback, blue, right and sperm whale photo-identification experience and for the past 30 years has studied large cetaceans off the east coast of the United States, Puerto Rico, Brazil, Chile, the Dominican Republic and the Eastern Caribbean. She has organized 5 international workshops on various aspects of whalewatching, worked actively on the promotion of the SPAW Protocol of the Cartegena Convention of the United Nations Environmental Programme (UNEP) and helped to draft its Marine Mammal Action Plan. Through the International Whaling Commission and the College of the Atlantic, she helped to establish an international, collaborative catalogue for <strong><a href=\"http://home.coa.edu/Filemaker%20Pro%204.0%20folder/web/alliedwhale/\" target=\"_blank\">Antarctic humpback whales</a></strong>.</p>'),(6,'pt','<p>A Doutora Carole Carlson dirige&nbsp; a investiga&ccedil;&atilde;o e educa&ccedil;&atilde;o da <strong><a href=\"http://www.whalewatch.com\" target=\"_blank\">Dolphin Fleet</a></strong> &eacute; cientista adjunta ao Princetown Center for Coastal Studies e do College of Atlantic, Bar harbor Maine, USA. A Doutora Carlson t&ecirc;m muita experi&ecirc;ncia na area de fotoidentifica&ccedil;&atilde;o de baleias de bossa, azuis, francas e cachalotes, e t&ecirc;m estudado cet&aacute;ceos ao longo da Costa Este dos Estados Unidos, Puerto Rico, Brazil, Chile, a Republica Dominicana e o Este das Caraibas durante os passados 30 anos. T&ecirc;m organizado 5 workshops internacionais em varios aspectos da Observa&ccedil;&atilde;o de Cet&aacute;ceos, trabalhando activamente na promo&ccedil;&atilde;o do Protocolo SPAW da Conven&ccedil;&atilde;o de Cartagena do United Nations Enviromental Programme (UNEP), e t&ecirc;m ajudado a desenhar o seu Plano de Ac&ccedil;&atilde;o de Mamiferos Marinhos. Tambem ajudou, a traves da Comiss&atilde;o Internacional Baleeira e do College of Atlantic, a estabelecer um catalago internacional e colaborativo das <strong><a href=\"http://home.coa.edu/Filemaker%20Pro%204.0%20folder/web/alliedwhale/\">Baleias de bossa do Antartico</a></strong>.</p>'),(7,'en','<p><strong><a href=\"http://www.st-andrews.ac.uk/\" target=\"_blank\">St. Andrews University</a></strong></p>\r\n<p><strong><a href=\"http://www.smru.st-andrews.ac.uk\" target=\"_blank\">SMRU (Sea Mammal Research Unit)</a></strong></p>'),(7,'pt','<p><strong><a href=\"http://www.st-andrews.ac.uk/\" target=\"_blank\">St. Andrews University</a></strong></p>\r\n<p><strong><a href=\"http://www.smru.st-andrews.ac.uk\" target=\"_blank\">SMRU (Sea Mammal Research Unit)</a></strong></p>'),(8,'en','<p style=\"text-align: justify;\">Lenin E. Oviedo Correa&nbsp; is a cetacean researcher, working on small odontocetes&rsquo; ecology both in his home country Venezuela and in Costa Rica&rsquo;s Southern Pacific Coast. His research efforts are mostly directed to the evaluation of critical habitat for sympatric dolphin species, particularly common and Guiana dolphins in northeast Venezuela, as well as Pantropical spotted and bottlenose dolphins in Golfo Dulce, Costa Rica.</p>\r\n<p style=\"text-align: justify;\">Lenin is currently a PhD candidate in the University of Hong Kong.</p>'),(8,'pt','<p style=\"text-align: justify;\">Lenin E. Oviedo Correa &eacute; um investigador na &aacute;rea dos cet&aacute;ceos, os seus trabalhos tem-se desenvolvido principalmente com a ecologia de pequenos odontocetos&nbsp; na Venezuela e na costa sul do Pacifico da Costa Rica. As suas investiga&ccedil;&otilde;es est&atilde;o focalizadas para a avalia&ccedil;&atilde;o do habitat critico para especias simpatricas de golfinhos, em particular Golfinho Comum e de Guiana, no Nordeste de Venezuela, assim como com Golfinho Pintado Pantropical e Roaz no Golfo Dulce, Costa Rica.</p>\r\n<p style=\"text-align: justify;\">Na actualidad Lenin &eacute; um candidato a Doutoramente na Universidade de Hong Kong.</p>');
/*!40000 ALTER TABLE `team_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `One` int(255) NOT NULL,
  `Two` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Just a Test';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `bi` varchar(30) DEFAULT NULL,
  `nif` varchar(30) DEFAULT NULL,
  `country` varchar(255) DEFAULT 'PT',
  `island` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(8) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT 'pt',
  `photo` varchar(255) DEFAULT NULL,
  `situation` varchar(255) DEFAULT NULL,
  `observations` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_FI_1` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'morfose','lda',NULL,NULL,NULL,'PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'geral@morfose.net','http://www.morfose.net/','pt',NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(2,2,'monicet','lda',NULL,'','','PT','','','','','','','','geral@monicet.net','http://www.monicet.net/','pt','','','','2010-03-11 09:24:19','2010-03-11 09:25:48'),(3,3,'João','Mendes',NULL,NULL,NULL,'PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'joao@mail.pt','http://www.monicet.net/','pt',NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(4,4,'Joana','Saraiva',NULL,NULL,NULL,'PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'joana@mail.pt','http://www.monicet.net/','pt',NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19'),(5,5,'Pedro','Guedes',NULL,NULL,NULL,'PT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pedro@mail.pt','http://www.monicet.net/','pt',NULL,NULL,NULL,'2010-03-11 09:24:19','2010-03-11 09:24:19');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vessel`
--

DROP TABLE IF EXISTS `vessel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vessel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vessel_FI_1` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vessel`
--

LOCK TABLES `vessel` WRITE;
/*!40000 ALTER TABLE `vessel` DISABLE KEYS */;
/*!40000 ALTER TABLE `vessel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visibility`
--

DROP TABLE IF EXISTS `visibility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visibility`
--

LOCK TABLES `visibility` WRITE;
/*!40000 ALTER TABLE `visibility` DISABLE KEYS */;
/*!40000 ALTER TABLE `visibility` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-19  9:27:47
