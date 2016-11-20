CREATE DATABASE  IF NOT EXISTS `rapicarga` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `rapicarga`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rapicarga
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `costoxtipocarga`
--

DROP TABLE IF EXISTS `costoxtipocarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costoxtipocarga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproveedor` int(11) NOT NULL,
  `tipocosto` int(11) NOT NULL,
  `valor1` float NOT NULL,
  `tipocont` int(11) NOT NULL,
  `valor2` float NOT NULL,
  `valor3` float NOT NULL,
  `valor4` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costoxtipocarga`
--

LOCK TABLES `costoxtipocarga` WRITE;
/*!40000 ALTER TABLE `costoxtipocarga` DISABLE KEYS */;
INSERT INTO `costoxtipocarga` VALUES (1,2,2,0,1,0,0.25,7500),(2,7,2,0,1,0,0.25,7500),(3,6,2,0,1,0,0.25,7500),(4,1,1,60,1,0,0,0),(5,3,2,0,1,0.8,0,0),(6,7,2,0,2,0,0.35,6800),(7,7,2,0,3,0,0.6,9000),(8,5,1,600,3,0,0,0),(9,4,1,15,3,0,0,0),(10,4,1,15,1,0,0,0),(11,4,1,15,2,0,0,0),(12,1,2,0,3,0,0,1200),(13,2,2,0,3,0,0.3,6400),(14,3,2,0,3,0.99,0,0),(15,3,2,1.05,2,0,0,0),(16,3,2,0,2,1.05,0,0),(17,1,2,0,3,0,0,1500);
/*!40000 ALTER TABLE `costoxtipocarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizaciones`
--

DROP TABLE IF EXISTS `cotizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizaciones` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idempresa` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idcorresponsal` int(11) DEFAULT NULL,
  `codigocotizacion` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `idpaisorigen` int(11) DEFAULT NULL,
  `idpaisdestino` int(11) DEFAULT NULL,
  `idtipocarga` int(11) DEFAULT NULL,
  `peso` varchar(45) DEFAULT NULL,
  `dimensiones` varchar(45) DEFAULT NULL,
  `tarifarapicarga` float DEFAULT NULL,
  `valorRealCarga` float NOT NULL,
  `idpuertoO` int(11) DEFAULT NULL,
  `idpuertoD` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `fechasalida` varchar(45) DEFAULT NULL,
  `comcarga` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cotizaciones_1_idx` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
INSERT INTO `cotizaciones` VALUES (8,3,2,1,'2','2016-11-17','5964',10,1,1,'16000','300',1704,25000,19,198,1,'2016-11-21','Camiones de Carga'),(9,3,2,1,'2','2016-11-17','8313.2',10,1,1,'23000','652',2375.2,16000,11,198,1,'2016-11-28','La carga es la puta madre'),(10,1,3,1,'1','2016-11-17',NULL,33,1,1,'45000','0',4635.68,34900,63,200,2,'2016-12-05','25 tractores  de agricultura'),(11,3,16,1,'2','2016-11-18','2002',114,1,1,'3500','20',572,60000,391,200,1,'2016-11-21','consola 2ds '),(12,6,15,1,'2','2016-11-18','15',10,1,1,'3500','120',0,30,1,198,5,'2016-11-23','Bananos, Pixae y Yuca'),(13,6,15,1,'2','2016-11-18','1575',1,14,1,'3000','100',450,45000,200,349,3,'2016-11-25','arroz, papas, yuca'),(14,3,2,14,'1','2016-11-18',NULL,114,1,1,'4000','120',590,50000,391,199,5,'2016-11-21','tecnologia');
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cotizaciones_p`
--

DROP TABLE IF EXISTS `cotizaciones_p`;
/*!50001 DROP VIEW IF EXISTS `cotizaciones_p`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cotizaciones_p` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `cedula`,
 1 AS `nombrecomercial`,
 1 AS `fecha`,
 1 AS `valorRealCarga`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `cotizaciones_view`
--

DROP TABLE IF EXISTS `cotizaciones_view`;
/*!50001 DROP VIEW IF EXISTS `cotizaciones_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `cotizaciones_view` AS SELECT 
 1 AS `Identificador`,
 1 AS `Cliente`,
 1 AS `cedula`,
 1 AS `nombrecomercial`,
 1 AS `nombrelegal`,
 1 AS `ruc`,
 1 AS `fecha`,
 1 AS `tipocarga`,
 1 AS `peso`,
 1 AS `dimensiones`,
 1 AS `tarifarapicarga`,
 1 AS `valorRealCarga`,
 1 AS `cantidad`,
 1 AS `fechasalida`,
 1 AS `comcarga`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensiones`
--

DROP TABLE IF EXISTS `dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimensiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dimencion` double DEFAULT NULL,
  `unidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensiones`
--

LOCK TABLES `dimensiones` WRITE;
/*!40000 ALTER TABLE `dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombrecomercial` varchar(95) DEFAULT NULL,
  `nombrelegal` varchar(95) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `ruc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pais_idx` (`idpais`),
  CONSTRAINT `fk_paises` FOREIGN KEY (`idpais`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'RapiRepuestos','Distribuidora de Repuestos S.A.','Calle 2da, Urb. Lomas','Panama','2359565','8542151',1,'rapirepuestos@gmail.com','np-852-233-965874'),(3,'Super 99','Importadora RicaMar S.A.','Calle 7ma final, urb. lassonde','Panama','2358442','2358441',1,'super99@gmail.com','95-8547-6325'),(4,'Cafe Alicia','Cafe Alicia','Calle 5ta, Aristides Romero','David',NULL,'',1,'acacosta@gmail.com','4-132-2601'),(6,'Optica Centeno','Optica Centeno','Calle Aristides Romero, Calle Central','David','2211334','334455',1,'optcen@gmail.com','8-58-965'),(7,'Muebles y mas','Importadora Americana S.A.','Ave. Brasil','Panama','null','null',1,'muebels@gmai.com','92-547-8547');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigofactura` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `idcotizacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `facturas_p`
--

DROP TABLE IF EXISTS `facturas_p`;
/*!50001 DROP VIEW IF EXISTS `facturas_p`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `facturas_p` AS SELECT 
 1 AS `id`,
 1 AS `nombre`,
 1 AS `cedula`,
 1 AS `nombrecomercial`,
 1 AS `fecha`,
 1 AS `monto`,
 1 AS `codigo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `idmodulos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmodulos`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'USUARIOS'),(2,'CLIENTES'),(3,'COTIZACIONES'),(4,'FACTURAS'),(5,'PROVEEDORES'),(6,'RUTAS');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origen-destino`
--

DROP TABLE IF EXISTS `origen-destino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origen-destino` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpaisorigen` int(11) DEFAULT NULL,
  `idpaisdestino` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origen-destino`
--

LOCK TABLES `origen-destino` WRITE;
/*!40000 ALTER TABLE `origen-destino` DISABLE KEYS */;
INSERT INTO `origen-destino` VALUES (1,47,46),(2,71,223);
/*!40000 ALTER TABLE `origen-destino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `isocodigo` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'Panamá','PAN',NULL,NULL),(2,'Afganistán','AFG',NULL,NULL),(3,'Antillas Neerlandesas','AHO',NULL,NULL),(4,'Albania','ALB',NULL,NULL),(5,'Argelia','ALG',NULL,NULL),(6,'Andorra','AND',NULL,NULL),(7,'Angola ','ANG',NULL,NULL),(8,'Antigua y Barbuda','ANT',NULL,NULL),(9,'Australasia','ANZ',NULL,NULL),(10,'Argentina','ARG',NULL,NULL),(11,'Armenia','ARM',NULL,NULL),(12,'Aruba','ARU',NULL,NULL),(13,'Samoa Americana','ASA',NULL,NULL),(14,'Australia','AUS',NULL,NULL),(15,'Austria','AUT',NULL,NULL),(16,'Azerbaiyán ','AZE',NULL,NULL),(17,'Las Bahamas Bahamas','BAH',NULL,NULL),(18,'Bangladés','BAN',NULL,NULL),(19,'Barbados','BAR',NULL,NULL),(20,'Burundi','BDI',NULL,NULL),(21,'Bélgica','BEL',NULL,NULL),(22,'Benín ','BEN',NULL,NULL),(23,'Bermuda','BER',NULL,NULL),(24,'Bután','BHU',NULL,NULL),(25,'Bosnia y Herzegovina','BIH',NULL,NULL),(26,'Birmania','MYA',NULL,NULL),(27,'Belice','BIZ',NULL,NULL),(28,'Bielorrusia','BLR',NULL,NULL),(29,'Bohemia','BOH',NULL,NULL),(30,'Bolivia','BOL',NULL,NULL),(31,'Borneo','BOR',NULL,NULL),(32,'Botsuana','BOT',NULL,NULL),(33,'Brasil','BRA',NULL,NULL),(34,'Baréin','BRN',NULL,NULL),(35,'Brunéi','BRU',NULL,NULL),(36,'Bulgaria','BUL',NULL,NULL),(37,'Burkina Faso','BUR',NULL,NULL),(38,'Indias Occidentales','BWI',NULL,NULL),(39,'República Centroafricana','CAF',NULL,NULL),(40,'Camboya','CAM',NULL,NULL),(41,'Canadá','CAN',NULL,NULL),(42,'Islas Caimán','CAY',NULL,NULL),(43,'República del Congo','CGO',NULL,NULL),(44,'Ceilán','CEY',NULL,NULL),(45,'Chad','CHA',NULL,NULL),(46,'Chile','CHI',NULL,NULL),(47,'República Popular China ','CHN',NULL,NULL),(48,'Costa de Marfil','CIV',NULL,NULL),(49,'Camerún','CMR',NULL,NULL),(50,'Congo-Brazzaville','COB',NULL,NULL),(51,'República Democrática del Congo ','COD',NULL,NULL),(52,'Islas Cook','COK',NULL,NULL),(53,'Colombia','COL',NULL,NULL),(54,'Comoras','COM',NULL,NULL),(55,'Congo-Kinshasa','CON',NULL,NULL),(56,'Cabo Verde','CPV',NULL,NULL),(57,'Costa Rica','CRC',NULL,NULL),(58,'Croacia','CRO',NULL,NULL),(59,'Cuba','CUB',NULL,NULL),(60,'Chipre','CYP',NULL,NULL),(61,'República Checa','CZE',NULL,NULL),(62,'Dahomey','DAH',NULL,NULL),(63,'Dinamarca','DEN',NULL,NULL),(64,'Yibuti','DJI',NULL,NULL),(65,'Dominica','DMA',NULL,NULL),(66,'República Dominicana','DOM',NULL,NULL),(67,'Ecuador','ECU',NULL,NULL),(68,'Egipto','EGY',NULL,NULL),(69,'Eritrea','ERI',NULL,NULL),(70,'El Salvador','ESA',NULL,NULL),(71,'España','ESP',NULL,NULL),(72,'Estonia','EST',NULL,NULL),(73,'Etiopía','ETH',NULL,NULL),(74,'Equipo Alemán Unificado','EUA',NULL,NULL),(75,'Equipo Unificado','EUN',NULL,NULL),(76,'Fiyi','FIJ',NULL,NULL),(77,'Finlandia','FIN',NULL,NULL),(78,'Francia','FRA',NULL,NULL),(79,'Germany R.F.A.','FRG',NULL,NULL),(80,'Estados Federados de Micronesia ','FSM',NULL,NULL),(81,'Gabón','GAB',NULL,NULL),(82,'Gambia','GAM',NULL,NULL),(83,'Reino Unido','GBR',NULL,NULL),(84,'Guinea-Bisáu','GBS',NULL,NULL),(85,'Georgia','GEO',NULL,NULL),(86,'Guinea Ecuatorial','GEQ',NULL,NULL),(87,'Alemania','GER',NULL,NULL),(88,'Ghana','GHA',NULL,NULL),(89,'Grecia','GRE',NULL,NULL),(90,'Granada','GRN',NULL,NULL),(91,'Guatemala','GUA',NULL,NULL),(92,'Guinea','GUI',NULL,NULL),(93,'Guam','GUM',NULL,NULL),(94,'Guyana','GUY',NULL,NULL),(95,'Haití','HAI',NULL,NULL),(96,'Honduras Británica','HBR',NULL,NULL),(97,'Hong Kong Hong Kong','HKG',NULL,NULL),(98,'Holanda  ','HOL',NULL,NULL),(99,'Honduras','HON',NULL,NULL),(100,'Hungría','HUN',NULL,NULL),(101,'Indias Orientales Neerlandesas','IHO',NULL,NULL),(102,'Indonesia Indonesia','INA',NULL,NULL),(103,'India','IND',NULL,NULL),(104,'Irán','IRI',NULL,NULL),(105,'Irlanda','IRL',NULL,NULL),(106,'Irak','IRQ',NULL,NULL),(107,'Islandia','ISL',NULL,NULL),(108,'Israel','ISR',NULL,NULL),(109,'Islas Vírgenes de los Estados Unidos','ISV',NULL,NULL),(110,'Italia','ITA',NULL,NULL),(111,'Islas Vírgenes Británicas','IVB',NULL,NULL),(112,'Jamaica','JAM',NULL,NULL),(113,'Jordania','JOR',NULL,NULL),(114,'Japón','JPN',NULL,NULL),(115,'Kazajistán','KAZ',NULL,NULL),(116,'Kenia','KEN',NULL,NULL),(117,'Kirguistán','KGZ',NULL,NULL),(118,'Kiribati','KIR',NULL,NULL),(119,'Korea del Sur','KOR',NULL,NULL),(120,'Arabia Saudita','KSA',NULL,NULL),(121,'Kuwait','KUW',NULL,NULL),(122,'Laos','LAO',NULL,NULL),(123,'Letonia','LAT',NULL,NULL),(124,'Libia','LBA',NULL,NULL),(125,'Liberia','LBR',NULL,NULL),(126,'Santa Lucía','LCA',NULL,NULL),(127,'Lesoto','LES',NULL,NULL),(128,'Líbano','LIB',NULL,NULL),(129,'Liechtenstein','LIE',NULL,NULL),(130,'Lituania','LTU',NULL,NULL),(131,'Luxemburgo','LUX',NULL,NULL),(132,'Madagascar','MAD',NULL,NULL),(133,'Marruecos','MAR',NULL,NULL),(134,'Malasia','MAS',NULL,NULL),(135,'Malaui','MAW',NULL,NULL),(136,'Moldavia','MDA',NULL,NULL),(137,'Maldivas','MDV',NULL,NULL),(138,'México','MEX',NULL,NULL),(139,'Mongolia','MGL',NULL,NULL),(140,'Islas Marshall','MHL',NULL,NULL),(141,'Macedonia','MKD',NULL,NULL),(142,'Malí','MLI',NULL,NULL),(143,'Malta','MLT',NULL,NULL),(144,'Montenegro','MNE',NULL,NULL),(145,'Mónaco','MON',NULL,NULL),(146,'Mozambique','MOZ',NULL,NULL),(147,'Mauricio','MRI',NULL,NULL),(148,'Mauritania','MTN',NULL,NULL),(150,'Namibia','NAM',NULL,NULL),(151,'Nicaragua','NCA',NULL,NULL),(152,'Países Bajos Holanda','NED',NULL,NULL),(153,'Nepal','NEP',NULL,NULL),(154,'Nigeria','NGR',NULL,NULL),(155,'Níger','NIG',NULL,NULL),(156,'Noruega','NOR',NULL,NULL),(157,'Nauru','NRU',NULL,NULL),(158,'Nueva Zelanda ','NZL',NULL,NULL),(159,'Omán','OMA',NULL,NULL),(160,'Pakistán','PAK',NULL,NULL),(161,'Paraguay','PAR',NULL,NULL),(162,'Perú','PER',NULL,NULL),(163,'Filipinas','PHI',NULL,NULL),(164,'Palestina','PLE',NULL,NULL),(165,'Palaos','PLW',NULL,NULL),(166,'Papúa Nueva Guinea','PNG',NULL,NULL),(167,'Polonia','POL',NULL,NULL),(168,'Portugal','POR',NULL,NULL),(169,'Corea del Norte','PRK',NULL,NULL),(170,'Puerto Rico','PUR',NULL,NULL),(171,'Catar','QAT',NULL,NULL),(172,'Rodesia del Norte','RHN',NULL,NULL),(173,'Rodesia','RHO',NULL,NULL),(174,'Rodesia del Sur','RHS',NULL,NULL),(175,'Republic of China','ROC',NULL,NULL),(176,'Rumanía','ROU',NULL,NULL),(177,'Sudáfrica','RSA',NULL,NULL),(178,'Imperio Ruso','RU1',NULL,NULL),(179,'Rusia','RUS',NULL,NULL),(180,'Ruanda','RWA',NULL,NULL),(181,'Sarre','SAA',NULL,NULL),(183,'Samoa','SAM',NULL,NULL),(184,'Serbia y Montenegro','SCG',NULL,NULL),(185,'Senegal','SEN',NULL,NULL),(186,'Seychelles','SEY',NULL,NULL),(187,'Singapur','SIN',NULL,NULL),(188,'San Cristóbal y Nieves','SKN',NULL,NULL),(189,'Sierra Leona ','SLE',NULL,NULL),(190,'Eslovenia','SLO',NULL,NULL),(191,'San Marino','SMR',NULL,NULL),(192,'Islas Salomón','SOL',NULL,NULL),(193,'Somalia','SOM',NULL,NULL),(194,'Serbia','SRB',NULL,NULL),(195,'Sri Lanka ','SRI',NULL,NULL),(196,'Santo Tomé y Príncipe','STP',NULL,NULL),(197,'Sudán','SUD',NULL,NULL),(198,'Suiza','SUI',NULL,NULL),(199,'Surinam','SUR',NULL,NULL),(200,'Eslovaquia','SVK',NULL,NULL),(201,'Suecia','SWE',NULL,NULL),(202,'Suazilandia','SWZ',NULL,NULL),(203,'Siria','SYR',NULL,NULL),(204,'Tanganica','TAG',NULL,NULL),(205,'República de China','TAI',NULL,NULL),(206,'Tanzania','TAN',NULL,NULL),(207,'Checoslovaquia','TCH',NULL,NULL),(208,'Tonga','TGA',NULL,NULL),(209,'Tailandia','THA',NULL,NULL),(210,'Turkmenistán','TKM',NULL,NULL),(211,'Timor Oriental','TLS',NULL,NULL),(212,'Togo','TOG',NULL,NULL),(213,'China Taipéi','TPE',NULL,NULL),(214,'Trinidad y Tobago','TRI',NULL,NULL),(215,'Túnez','TUN',NULL,NULL),(216,'Turquía','TUR',NULL,NULL),(217,'Tuvalu','TUV',NULL,NULL),(218,'Emiratos Árabes Unidos','UAE',NULL,NULL),(219,'República Árabe Unida','UAR',NULL,NULL),(220,'Uganda','UGA',NULL,NULL),(221,'Ucrania','UKR',NULL,NULL),(222,'Uruguay','URU',NULL,NULL),(223,'Estados Unidos','USA',NULL,NULL),(224,'Uzbekistán','UZB',NULL,NULL),(225,'Vanuatu','VAN',NULL,NULL),(226,'Venezuela','VEN',NULL,NULL),(227,'Vietnam ','VIE',NULL,NULL),(228,'San Vicente y las Granadinas','VIN',NULL,NULL),(229,'Alto Volta','VOL',NULL,NULL),(230,'República Árabe del Yemen','YAR',NULL,NULL),(231,'Yemen','YEM',NULL,NULL),(232,'Zaire','ZAI',NULL,NULL),(233,'Zambia','ZAM',NULL,NULL),(234,'Zimbabue','ZIM',NULL,NULL);
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `paises_puertos_view`
--

DROP TABLE IF EXISTS `paises_puertos_view`;
/*!50001 DROP VIEW IF EXISTS `paises_puertos_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `paises_puertos_view` AS SELECT 
 1 AS `Identificador`,
 1 AS `PaisO`,
 1 AS `PaisD`,
 1 AS `PuertoO`,
 1 AS `PuertoD`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `modulo` int(11) NOT NULL,
  `C` tinyint(1) NOT NULL DEFAULT '0',
  `R` tinyint(1) NOT NULL DEFAULT '0',
  `U` tinyint(1) NOT NULL DEFAULT '0',
  `D` tinyint(1) NOT NULL DEFAULT '0',
  `I` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idpermisos`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,1,1,1,1,1,1,1),(21,1,3,1,1,1,1,1),(22,1,2,1,1,1,1,1),(23,1,6,1,1,1,1,1),(24,9,1,0,0,0,0,0),(25,1,4,1,1,1,1,1),(26,1,5,1,1,1,1,1),(27,9,2,0,0,0,0,0),(28,9,3,0,0,0,0,0),(29,9,4,0,0,0,0,0),(30,9,5,0,0,0,0,0),(31,9,6,0,0,0,0,0),(32,12,1,1,0,0,0,0),(33,12,2,0,1,0,0,0),(34,12,3,0,0,0,0,1),(35,13,1,1,1,1,1,1),(36,13,2,1,1,1,1,1),(37,13,3,1,1,1,1,1),(38,13,4,1,1,1,1,1),(39,13,5,1,1,1,1,1),(40,14,1,0,1,1,0,0),(41,13,6,1,1,1,1,1),(42,14,2,1,1,1,1,1),(43,14,3,1,1,1,1,1),(44,14,4,1,1,1,1,1),(45,14,5,1,1,1,1,1),(46,14,6,1,1,1,1,1);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesos`
--

DROP TABLE IF EXISTS `pesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `peso` double DEFAULT NULL,
  `unidad` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesos`
--

LOCK TABLES `pesos` WRITE;
/*!40000 ALTER TABLE `pesos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(45) DEFAULT NULL,
  `idrutas` int(11) DEFAULT NULL,
  `idserxpro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'Transportes Fergunson',0,1),(2,'MAERSK S.A.',0,2),(3,'Internacional de Seguros',0,5),(4,'Corredores Abrego S.A.',0,3),(5,'Servicios y Bodegas Atlantis S.A',0,4),(6,'APL',0,2),(7,'Hapag Lloyd',0,2);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puertos`
--

DROP TABLE IF EXISTS `puertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puertos` (
  `idpuertos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codpuerto` int(11) DEFAULT NULL,
  `codpais` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpuertos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puertos`
--

LOCK TABLES `puertos` WRITE;
/*!40000 ALTER TABLE `puertos` DISABLE KEYS */;
INSERT INTO `puertos` VALUES (1,'    ALMIRANTE BROWN    ',0,10),(2,'    BAHIA BLANCA    ',0,10),(3,'    BAHIA SAN BLAS    ',0,10),(4,'    BAHIA SAN SEBASTIAN    ',0,10),(5,'    BARRANQUERAS    ',0,10),(6,'    BUENOS AIRES    ',0,10),(7,'    CALETA CORDOBA    ',0,10),(8,'    CALETA OLIVIA    ',0,10),(9,'    CAMPANA    ',0,10),(10,'    CARMEN DE PATAGONES    ',0,10),(11,'    COLON    ',0,10),(12,'    COMODORO RIVADAVIA    ',0,10),(13,'    CONCEPTION DEL URUGUAY    ',0,10),(14,'    CONCORDIA    ',0,10),(15,'    CORRIENTES    ',0,10),(16,'    DECEPCION    ',0,10),(17,'    DIAMANTE    ',0,10),(18,'    EMPEDRADO    ',0,10),(19,'    ESQUINA    ',0,10),(20,'    FORMOSA    ',0,10),(21,'    GENERAL ALVEAR    ',0,10),(22,'    GENERAL BELGRANO    ',0,10),(23,'    GENERAL SAN MARTIN    ',0,10),(24,'    HERNANDARIAS    ',0,10),(25,'    IBICUY    ',0,10),(26,'    LA PLATA    ',0,10),(27,'    MAR DEL PLATA    ',0,10),(28,'    NECOCHEA    ',0,10),(29,'    PARANA    ',0,10),(30,'    PUERTO BELGRANO    ',0,10),(31,'    PUERTO BERMEJO    ',0,10),(32,'    PUERTO DESEADO    ',0,10),(33,'    PUERTO GOYA    ',0,10),(34,'    PUERTO IBICUY    ',0,10),(35,'    PUERTO INGENIERO WHITE    ',0,10),(36,'    PUERTO MADRYN    ',0,10),(37,'    PUERTO PILCOMAYO    ',0,10),(38,'    PUERTO PIRAMIDE    ',0,10),(39,'    PUERTO QUEQUEN    ',0,10),(40,'    PUERTO SAN CARLOS    ',0,10),(41,'    RADA LA PLATA    ',0,10),(42,'    RAMALLO    ',0,10),(43,'    RECALADA    ',0,10),(44,'    RECONQUISTA    ',0,10),(45,'    RIO GALLEGOS    ',0,10),(46,'    RIO GRANDE    ',0,10),(47,'    ROSARIO    ',0,10),(48,'    SAN ANTONIO-ALIJE    ',0,10),(49,'    SAN ANTONIO    ',0,10),(50,'    SAN JULIAN    ',0,10),(51,'    SAN LORENZO    ',0,10),(52,'    SAN MARTIN    ',0,10),(53,'    SAN MATIAS-ALIJE    ',0,10),(54,'    SAN PEDRO    ',0,10),(55,'    SANTA CRUZ    ',0,10),(56,'    SANTA FE    ',0,10),(57,'    USHUAIA    ',0,10),(58,'    VILLA CONSTITUCION    ',0,10),(59,'    ZARATE    ',0,10),(60,'    BARBADOS    ',0,19),(61,'    ARACAJU    ',0,33),(62,'    BAHIA    ',0,33),(63,'    BELEM    ',0,33),(64,'    BELLO HORIZONTE    ',0,33),(65,'    CABEDELLO    ',0,33),(66,'    CEARA    ',0,33),(67,'    FLORIANOPOLIS    ',0,33),(68,'    ILHEUS    ',0,33),(69,'    IMBITUBA    ',0,33),(70,'    ITAJAI    ',0,33),(71,'    MACEIO    ',0,33),(72,'    MANAOS    ',0,33),(73,'    NATAL    ',0,33),(74,'    PARANAGUA    ',0,33),(75,'    PORTO ALEGRE    ',0,33),(76,'    RIO DE JANEIRO    ',0,33),(77,'    RIO GRANDE    ',0,33),(78,'    S.CAETANO DO SUL    ',0,33),(79,'    SALVADOR    ',0,33),(80,'    SAN PABLO    ',0,33),(81,'    SANTA CATARINA    ',0,33),(82,'    SANTOS    ',0,33),(83,'    SAO FRANCISCO    ',0,33),(84,'    SUAPE    ',0,33),(85,'    TUBARAO    ',0,33),(86,'    VICTORIA    ',0,33),(87,'    ALBERTON    ',0,41),(88,'    HALIFAX    ',0,41),(89,'    JACKSON BAY    ',0,41),(90,'    LABRADOR    ',0,41),(91,'    MONTREAL    ',0,41),(92,'    NEW BRUNSWICK    ',0,41),(93,'    NOVA SCOTIA    ',0,41),(94,'    ONTARIO    ',0,41),(95,'    OTTAWA    ',0,41),(96,'    QUEBEC    ',0,41),(97,'    QUEBEC HARBOUR    ',0,41),(98,'    TORONTO    ',0,41),(99,'    TRENTON    ',0,41),(100,'    VICTORIA    ',0,41),(101,'    WINNIPEG    ',0,41),(102,'    YARMOUTH    ',0,41),(103,'    BARRANQUILLA    ',0,53),(104,'    BOGOTA    ',0,53),(105,'    BUENAVENTURA    ',0,53),(106,'    CALI    ',0,53),(107,'    CARTAGENA    ',0,53),(108,'    SANTA MARTA    ',0,53),(109,'    CALDERA    ',0,57),(110,'    LIMON    ',0,57),(111,'    PORT LIMON    ',0,57),(112,'    SAN JOSE    ',0,57),(113,'    BOQUERON    ',0,59),(114,'    CIENFUEGOS    ',0,59),(115,'    MATANZAS    ',0,59),(116,'    PUERTO MANATI    ',0,59),(117,'    SANTA LUCIA    ',0,59),(118,'    SANTIAGO DE CUBA    ',0,59),(119,'    ANTOFAGASTA    ',0,46),(120,'    ARICA    ',0,46),(121,'    CONCEPCION    ',0,46),(122,'    COQUIMBO    ',0,46),(123,'    IQUIQUE    ',0,46),(124,'    LIRQUEN    ',0,46),(125,'    OSORNO    ',0,46),(126,'    PUCON    ',0,46),(127,'    PUERTO MONTT    ',0,46),(128,'    PUNTA ARENAS    ',0,46),(129,'    RIO BUENO    ',0,46),(130,'    SAN ANTONIO    ',0,46),(131,'    SAN VICENTE    ',0,46),(132,'    SANTIAGO    ',0,46),(133,'    TALCAHUANO    ',0,46),(134,'    TEMUCO    ',0,46),(135,'    VALDIVIA    ',0,46),(136,'    VALPARAISO    ',0,46),(137,'    CALLO    ',0,67),(138,'    ESMERALDAS    ',0,67),(139,'    GUAYAQUIL    ',0,67),(140,'    MANTA    ',0,67),(141,'    PUERTO BOLIVAR    ',0,67),(142,'    QUITO    ',0,67),(143,'    ACAJUTLA    ',0,70),(144,'    ALABAMA    ',0,223),(145,'    ANCHORAGE    ',0,223),(146,'    BALTIMORE    ',0,223),(147,'    BOSTON    ',0,223),(148,'    BROOKLYN    ',0,223),(149,'    CLEVELAND    ',0,223),(150,'    CHARLESTON    ',0,223),(151,'    CHARLOTTE    ',0,223),(152,'    CHICAGO    ',0,223),(153,'    DAVENPORT    ',0,223),(154,'    ELIZABETHPORT    ',0,223),(155,'    FORT LAUDERDALE    ',0,223),(156,'    FREEPORT    ',0,223),(157,'    GALVESTON    ',0,223),(158,'    LOS ANGELES    ',0,223),(159,'    MIAMI    ',0,223),(160,'    MISSISSIPPI    ',0,223),(161,'    NEW JERSEY    ',0,223),(162,'    NEW ORLEANS    ',0,223),(163,'    NEW YORK    ',0,223),(164,'    NEWARK    ',0,223),(165,'    NEWPORT    ',0,223),(166,'    NEWPORT    ',0,223),(167,'    NORFOLK    ',0,223),(168,'    OAKLAND    ',0,223),(169,'    PHILADELPHIA    ',0,223),(170,'    PORT EVERGLADES    ',0,223),(171,'    SAN DIEGO    ',0,223),(172,'    SAN FRANCISCO    ',0,223),(173,'    SEATTLE    ',0,223),(174,'    TAMPA    ',0,223),(175,'    LIVINGSTON    ',0,91),(176,'    PUERTO QUETZAL    ',0,91),(177,'    SAN JOSE    ',0,91),(178,'    GEORGE TOWN    ',0,94),(179,'    LA CEIBA    ',0,99),(180,'    PUERTO CASTILLA    ',0,99),(181,'    PUERTO CORTES    ',0,99),(182,'    SAN LORENZO    ',0,99),(183,'    TEGUCIGALPA    ',0,99),(184,'    ACAPULCO    ',0,138),(185,'    ALTAMIRA    ',0,138),(186,'    BENITO JUAREZ    ',0,138),(187,'    CAMPECHE    ',0,138),(188,'    COZUMEL    ',0,138),(189,'    GUADALAJARA    ',0,138),(190,'    LAZARO CARDENAS    ',0,138),(191,'    MANZANILLO    ',0,138),(192,'    MEJICO    ',0,138),(193,'    TAMPICO    ',0,138),(194,'    VERACRUZ    ',0,138),(195,'    CORINTO    ',0,151),(196,'    PUERTO CABEZAS    ',0,151),(197,'    SAN JUAN DEL SUR    ',0,151),(198,'    BALBOA    ',0,1),(199,'    COLON    ',0,1),(200,'    CRISTOBAL    ',0,1),(201,'    PANAMA CITY    ',0,1),(202,'    ASUNCION    ',0,161),(203,'    LUQUE    ',0,161),(204,'    SAN LORENZO    ',0,161),(205,'    CALLAO    ',0,162),(206,'    ILO    ',0,162),(207,'    IQUITOS    ',0,162),(208,'    LIMA    ',0,162),(209,'    PAITA    ',0,162),(210,'    PUERTO PAITA    ',0,162),(211,'    TACNA    ',0,162),(212,'    POINT FORTIN    ',0,214),(213,'    POINT LISAS    ',0,214),(214,'    POINTE A PIERRE    ',0,214),(215,'    PORT OF SPAIN    ',0,214),(216,'    CANELONES    ',0,222),(217,'    CARRASCO    ',0,222),(218,'    CARRO LARGO    ',0,222),(219,'    COLONIA    ',0,222),(220,'    FRAY BENTOS    ',0,222),(221,'    MALDONADO    ',0,222),(222,'    MONTEVIDEO    ',0,222),(223,'    NUEVA PALMIRA    ',0,222),(224,'    SALTO    ',0,222),(225,'    CARACAS    ',0,226),(226,'    GUANTA    ',0,226),(227,'    LA GUAIRA    ',0,226),(228,'    MARACAIBO    ',0,226),(229,'    PUERTO CABELLO    ',0,226),(230,'    PUERTO ORDAZ    ',0,226),(231,'    SAN LORENZO    ',0,226),(232,'    SIMON BOLIVAR    ',0,226),(233,'    BREMEN    ',0,87),(234,'    BREMERHAVEN    ',0,87),(235,'    DUSSELDORF    ',0,87),(236,'    FRANKFURT    ',0,87),(237,'    HAMBURGO    ',0,87),(238,'    ANTWERP    ',0,21),(239,'    BRUSSELS    ',0,21),(240,'    GENT    ',0,21),(241,'    GAND    ',0,21),(242,'    LIEJA    ',0,21),(243,'    ZEEBRUGGE    ',0,21),(244,'    SOFIA    ',0,36),(245,'    VARNA    ',0,36),(246,'    COPENHAGEN    ',0,63),(247,'    THULE    ',0,63),(248,'    ALGECIRAS    ',0,71),(249,'    BARCELONA    ',0,71),(250,'    BILBAO    ',0,71),(251,'    CADIZ    ',0,71),(252,'    CARTAGENA    ',0,71),(253,'    EL FERROL    ',0,71),(254,'    FERROL    ',0,71),(255,'    GIJON    ',0,71),(256,'    IBIZA    ',0,71),(257,'    LA CORUÑA    ',0,71),(258,'    LAS PALMAS    ',0,71),(259,'    MADRID    ',0,71),(260,'    MALAGA    ',0,71),(261,'    SAN SEBASTIAN    ',0,71),(262,'    TENERIFE    ',0,71),(263,'    VALENCIA    ',0,71),(264,'    VIGO    ',0,71),(265,'    HELSINGFORS    ',0,77),(266,'    KOTKA    ',0,77),(267,'    TURKU    ',0,77),(268,'    BAYONNE    ',0,78),(269,'    BIARRITZ    ',0,78),(270,'    BOULOGNE-SUR-MER    ',0,78),(271,'    BREST    ',0,78),(272,'    CAEN    ',0,78),(273,'    CALAIS    ',0,78),(274,'    CANNES    ',0,78),(275,'    CHERBOURG    ',0,78),(276,'    FOS SUR MER    ',0,78),(277,'    HAVRE    ',0,78),(278,'    LILLE    ',0,78),(279,'    LYON    ',0,78),(280,'    ORLY    ',0,78),(281,'    ORSAY    ',0,78),(282,'    PARIS    ',0,78),(283,'    TOULOUSE    ',0,78),(284,'    BELFAST    ',0,83),(285,'    BIRMINGHAN    ',0,83),(286,'    BOSTON    ',0,83),(287,'    BRIGHTON    ',0,83),(288,'    BRISTOL    ',0,83),(289,'    CARDIFF    ',0,83),(290,'    FELIXSTOWE    ',0,83),(291,'    GATWICK    ',0,83),(292,'    GLOUCESTER    ',0,83),(293,'    LEEDS    ',0,83),(294,'    LIVERPOOL    ',0,83),(295,'    LONDRES    ',0,83),(296,'    MANCHESTER    ',0,83),(297,'    PORT GLASGOW    ',0,83),(298,'    PORTLAND    ',0,83),(299,'    PORTSMOUTH    ',0,83),(300,'    SOUTHAMPTON    ',0,83),(301,'    TILBURY    ',0,83),(302,'    AGRIA    ',0,89),(303,'    ATHENS    ',0,89),(304,'    SKOPELOS    ',0,89),(305,'    VOLOS    ',0,89),(306,'    AMSTERDAM    ',0,98),(307,'    ROTTERDAM    ',0,98),(308,'    BARI    ',0,110),(309,'    BOLONIA    ',0,110),(310,'    BRESCIA    ',0,110),(311,'    BRINDISI    ',0,110),(312,'    CAGLIARI    ',0,110),(313,'    CASTELLAMMARE    ',0,110),(314,'    CATANIA    ',0,110),(315,'    GENOVA    ',0,110),(316,'    LA SPEZIA    ',0,110),(317,'    LIVORNO    ',0,110),(318,'    MESSINA    ',0,110),(319,'    MILAN    ',0,110),(320,'    NAPOLES    ',0,110),(321,'    PALERMO    ',0,110),(322,'    ROMA    ',0,110),(323,'    SORRENTO    ',0,110),(324,'    TARANTO    ',0,110),(325,'    VADO LIGURE    ',0,110),(326,'    LA VALETTA    ',0,143),(327,'    NARVIK    ',0,156),(328,'    OSLO    ',0,156),(329,'    GDANSK    ',0,167),(330,'    GDYNIA    ',0,167),(331,'    SOPOT    ',0,167),(332,'    VARSOVIA    ',0,167),(333,'    ANGRA (HARBOUR)    ',0,168),(334,'    AZORES    ',0,168),(335,'    LISBOA    ',0,168),(336,'    OPORTO    ',0,168),(337,'    SETUBAL    ',0,168),(338,'    KALININGRADO    ',0,179),(339,'    KRONSHTADT    ',0,179),(340,'    MOSCU    ',0,179),(341,'    ODESSA    ',0,179),(342,'    SEVASTOPOL    ',0,179),(343,'    MALMO    ',0,201),(344,'    SANDVIK    ',0,201),(345,'    STOCKHOLM    ',0,201),(346,'    ESTAMBUL    ',0,216),(347,'    IZMIR    ',0,216),(348,'    MERSIN    ',0,216),(349,'    ADELAIDE        ',0,14),(350,'    ALBANY            ',0,14),(351,'    BRISBANE        ',0,14),(352,'    FREMANTLE        ',0,14),(353,'    JERVIS BAY        ',0,14),(354,'    MELBOURNE        ',0,14),(355,'    PERTH            ',0,14),(356,'    SYDNEY            ',0,14),(357,'    SHINHO            ',0,119),(358,'    PUSAN            ',0,119),(359,'    CHAN CHIANG        ',0,47),(360,'    CHANGCHUN        ',0,47),(361,'    CHIU CHIANG        ',0,47),(362,'    CHIWAN            ',0,47),(363,'    CHUNG CHING        ',0,47),(364,'    DALIAN            ',0,47),(365,'    FUZHOU            ',0,47),(366,'    GUANGZHOU        ',0,47),(367,'    HONG KONG        ',0,47),(368,'    LUNG KOU        ',0,47),(369,'    NINGBO            ',0,47),(370,'    PEKING            ',0,47),(371,'    QINGDAO            ',0,47),(372,'    SHANGHAI        ',0,47),(373,'    TIANJIN            ',0,47),(374,'    WENZHOU            ',0,47),(375,'    XIAMEN            ',0,47),(376,'    YANTAI            ',0,47),(377,'    MANILA            ',0,163),(378,'    BOMBAY            ',0,103),(379,'    CALCUTTA        ',0,103),(380,'    INCHON            ',0,103),(381,'    MADRAS            ',0,103),(382,'    MANGALORE        ',0,103),(383,'    NEW DELHI        ',0,103),(384,'    SURAT            ',0,103),(385,'    JAKARTA            ',0,102),(386,'    SOERABAJA        ',0,102),(387,'    HIROSHIMA        ',0,114),(388,'    KAGOSHIMA        ',0,114),(389,'    KOBE            ',0,114),(390,'    MOJI            ',0,114),(391,'    NAGASAKI        ',0,114),(392,'    NAGOYA            ',0,114),(393,'    NAHA            ',0,114),(394,'    OKINAWA            ',0,114),(395,'    OSAKA            ',0,114),(396,'    TOKYO            ',0,114),(397,'    YOKOHAMA        ',0,114),(398,'    AL FUHAYHIL        ',0,121),(399,'    AL KUWAYT        ',0,121),(400,'    BRUNEI TOWN        ',0,134),(401,'    GEORGE TOWN        ',0,134),(402,'    PANGKOR            ',0,134),(403,'    AUCKLAND        ',0,158),(404,'    CHRISTCHURCH    ',0,158),(405,'    WELLINGTON        ',0,158),(406,'    SINGAPUR        ',0,187),(407,'    AO PHUKET        ',0,209),(408,'    BANGKOK            ',0,209),(409,'    BASS HARBOUR    ',0,209),(410,'    KAOSHSIUNG        ',0,235),(411,'    KEELUNG=CHILUNG    ',0,235),(412,'    TAI CHUNG        ',0,235),(413,'    TAIWAN            ',0,235),(414,'    HAIPHONG        ',0,227),(415,'    HANOI            ',0,227),(416,'    HO CHI MINH (SAIGON)        ',0,227);
/*!40000 ALTER TABLE `puertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutas-maestras`
--

DROP TABLE IF EXISTS `rutas-maestras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutas-maestras` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idorigen/destino` int(11) DEFAULT NULL,
  `tiempoestimado` varchar(45) DEFAULT NULL,
  `costodelaruta` double DEFAULT NULL,
  `puertoorigen` int(11) DEFAULT NULL,
  `puertodestino` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutas-maestras`
--

LOCK TABLES `rutas-maestras` WRITE;
/*!40000 ALTER TABLE `rutas-maestras` DISABLE KEYS */;
INSERT INTO `rutas-maestras` VALUES (1,1,'0',10000,1,2),(2,2,'0',10000,3,4);
/*!40000 ALTER TABLE `rutas-maestras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rutasintermedias`
--

DROP TABLE IF EXISTS `rutasintermedias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rutasintermedias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idruta` int(11) DEFAULT NULL,
  `idpaisintermedio` int(11) DEFAULT NULL,
  `puertointermedio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rutasintermedias`
--

LOCK TABLES `rutasintermedias` WRITE;
/*!40000 ALTER TABLE `rutasintermedias` DISABLE KEYS */;
INSERT INTO `rutasintermedias` VALUES (1,1,47,'Hong Kong'),(2,1,47,'Shekou'),(3,1,47,'Xiamen'),(4,1,47,'Ningbo'),(5,1,47,'Shanghái'),(6,1,119,'Busan'),(7,1,1,'Manzanillo'),(8,1,138,'Lázaro Cárdenas'),(9,1,33,'Callao'),(10,1,46,'Iquique'),(11,1,46,'Puerto Angamos'),(13,2,91,'Puerto Quetzal'),(14,2,138,'Lázaro Cárdenas'),(15,2,1,'Manzanillo'),(16,2,223,'Oakland');
/*!40000 ALTER TABLE `rutasintermedias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sedes`
--

DROP TABLE IF EXISTS `sedes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sedes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sede` varchar(45) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sedes`
--

LOCK TABLES `sedes` WRITE;
/*!40000 ALTER TABLE `sedes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sedes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servicio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'SERVICIO DE TRANSPORTE TERRESTRE'),(2,'SERVICIO DE TRANSPORTE MARITIMO'),(3,'SERVICIO ADUANAL'),(4,'SERVICIO DE ALMACENAJE'),(5,'SERVICIO DE SEGURO DE CARGA');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `servicios_view`
--

DROP TABLE IF EXISTS `servicios_view`;
/*!50001 DROP VIEW IF EXISTS `servicios_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `servicios_view` AS SELECT 
 1 AS `Identificador`,
 1 AS `proveedor`,
 1 AS `costo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `serviciosxcot`
--

DROP TABLE IF EXISTS `serviciosxcot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviciosxcot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idservicios` int(11) DEFAULT NULL,
  `idcotizacion` int(11) DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `idruta` int(11) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviciosxcot`
--

LOCK TABLES `serviciosxcot` WRITE;
/*!40000 ALTER TABLE `serviciosxcot` DISABLE KEYS */;
INSERT INTO `serviciosxcot` VALUES (3,NULL,8,1,NULL,60),(4,NULL,8,2,NULL,4000),(5,NULL,8,3,NULL,200),(6,NULL,9,1,NULL,60),(7,NULL,9,7,NULL,5750),(8,NULL,9,3,NULL,128),(9,NULL,10,1,NULL,60),(10,NULL,10,6,NULL,11250),(11,NULL,10,3,NULL,279.2),(12,NULL,11,1,NULL,60),(13,NULL,11,2,NULL,875),(14,NULL,11,4,NULL,15),(15,NULL,11,3,NULL,480),(16,NULL,12,3,NULL,0),(17,NULL,12,4,NULL,15),(18,NULL,12,7,NULL,0),(19,NULL,12,6,NULL,0),(20,NULL,13,6,NULL,750),(21,NULL,13,4,NULL,15),(22,NULL,13,3,NULL,360),(23,NULL,14,1,NULL,60),(24,NULL,14,4,NULL,15),(25,NULL,14,3,NULL,400),(26,NULL,14,7,NULL,1000);
/*!40000 ALTER TABLE `serviciosxcot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idfactura` int(11) DEFAULT NULL,
  `idtipostatus` int(11) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocontenedor`
--

DROP TABLE IF EXISTS `tipocontenedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocontenedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipocarga` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocontenedor`
--

LOCK TABLES `tipocontenedor` WRITE;
/*!40000 ALTER TABLE `tipocontenedor` DISABLE KEYS */;
INSERT INTO `tipocontenedor` VALUES (1,'Contenedor Cerrado'),(2,'Contendedor Abiero'),(3,'Contenedor Refrigerado');
/*!40000 ALTER TABLE `tipocontenedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(90) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `ap_postal` varchar(10) DEFAULT NULL,
  `tipoUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'7c4a8d09ca3762af61e59520943dc26494f8941b','admin@admin','Admin','Admin','admin','1990-12-24','66773390','',1,'45858',3000),(2,'7c4a8d09ca3762af61e59520943dc26494f8941b','acacosta@gmail.com','Alicia','Castillo','4-132-2601','1990-12-24','68479655','null',1,'null',1000),(3,'dd5fef9c1c1da1394d6d34b248c51be2ad740840','castilloharry@gmail.com','Jose','Castillo','8-458-451','1990-12-24','null','68479655',1,'null',1000),(9,'7c4a8d09ca3762af61e59520943dc26494f8941b','jaja@jaja.comjaja','Jhon ','Lopez','4-632-965','0000-00-00','','',1,'',2000),(13,'afe0c5e0950e171d55e98e1f8313c2f78759214d','silvana.errigo@gmail.com','Silvana','Errigo','9-148-943','0000-00-00','','',1,'',2000),(14,'7c4a8d09ca3762af61e59520943dc26494f8941b','jaimej1224@hotmail.com','Jaime','Palacios','4-760-3','0000-00-00','','',1,'',2000),(15,'7c4a8d09ca3762af61e59520943dc26494f8941b','frobles1539@gmail.com','Fulvia','De Robles','8-94-944','1950-07-15','null','6525-7890',1,'01',1000),(16,'7c4a8d09ca3762af61e59520943dc26494f8941b','j.g@admin','Alejandra ','Gonzales','1-234-56','2016-07-24','5555-55555','6666-6666',1,'12',1000),(17,'7c4a8d09ca3762af61e59520943dc26494f8941b','s.g@admin','Sandra','Gutierrez','4-56-7','2016-11-02','5555-55555','6666-6666',1,'123',1000);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userempresa`
--

DROP TABLE IF EXISTS `userempresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userempresa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `idempresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_idx` (`iduser`),
  KEY `fk_empresa_idx` (`idempresa`),
  CONSTRAINT `fk_empresa` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userempresa`
--

LOCK TABLES `userempresa` WRITE;
/*!40000 ALTER TABLE `userempresa` DISABLE KEYS */;
INSERT INTO `userempresa` VALUES (1,2,3),(2,3,1),(3,15,6),(4,16,3),(5,17,7);
/*!40000 ALTER TABLE `userempresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'rapicarga'
--

--
-- Final view structure for view `cotizaciones_p`
--

/*!50001 DROP VIEW IF EXISTS `cotizaciones_p`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cotizaciones_p` AS select `cotizaciones`.`id` AS `id`,concat(`user`.`nombre`,' ',`user`.`apellido`) AS `nombre`,`user`.`cedula` AS `cedula`,`empresas`.`nombrecomercial` AS `nombrecomercial`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`valorRealCarga` AS `valorRealCarga` from (((`userempresa` join `user` on((`userempresa`.`iduser` = `user`.`id`))) join `empresas` on((`userempresa`.`idempresa` = `empresas`.`id`))) join `cotizaciones` on((`cotizaciones`.`idcliente` = `user`.`id`))) where (`cotizaciones`.`codigocotizacion` = '1') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `cotizaciones_view`
--

/*!50001 DROP VIEW IF EXISTS `cotizaciones_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cotizaciones_view` AS select `cotizaciones`.`id` AS `Identificador`,concat(`user`.`nombre`,' ',`user`.`apellido`) AS `Cliente`,`user`.`cedula` AS `cedula`,`empresas`.`nombrecomercial` AS `nombrecomercial`,`empresas`.`nombrelegal` AS `nombrelegal`,`empresas`.`ruc` AS `ruc`,`cotizaciones`.`fecha` AS `fecha`,`tipocontenedor`.`tipocarga` AS `tipocarga`,`cotizaciones`.`peso` AS `peso`,`cotizaciones`.`dimensiones` AS `dimensiones`,`cotizaciones`.`tarifarapicarga` AS `tarifarapicarga`,`cotizaciones`.`valorRealCarga` AS `valorRealCarga`,`cotizaciones`.`cantidad` AS `cantidad`,`cotizaciones`.`fechasalida` AS `fechasalida`,`cotizaciones`.`comcarga` AS `comcarga` from ((((`cotizaciones` join `user` on((`cotizaciones`.`idcliente` = `user`.`id`))) join `tipocontenedor` on((`cotizaciones`.`idtipocarga` = `tipocontenedor`.`id`))) join `userempresa` on((`userempresa`.`iduser` = `user`.`id`))) join `empresas` on((`userempresa`.`idempresa` = `empresas`.`id`))) where (`cotizaciones`.`codigocotizacion` = '1') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `facturas_p`
--

/*!50001 DROP VIEW IF EXISTS `facturas_p`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `facturas_p` AS select `cotizaciones`.`id` AS `id`,concat(`user`.`nombre`,' ',`user`.`apellido`) AS `nombre`,`user`.`cedula` AS `cedula`,`empresas`.`nombrecomercial` AS `nombrecomercial`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`hora` AS `monto`,`cotizaciones`.`codigocotizacion` AS `codigo` from (((`userempresa` join `user` on((`userempresa`.`iduser` = `user`.`id`))) join `empresas` on((`userempresa`.`idempresa` = `empresas`.`id`))) join `cotizaciones` on((`cotizaciones`.`idcliente` = `user`.`id`))) where (`cotizaciones`.`codigocotizacion` = '2') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `paises_puertos_view`
--

/*!50001 DROP VIEW IF EXISTS `paises_puertos_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `paises_puertos_view` AS select `cotizaciones`.`id` AS `Identificador`,`paises`.`pais` AS `PaisO`,`paises_1`.`pais` AS `PaisD`,`puertos`.`nombre` AS `PuertoO`,`puertos_1`.`nombre` AS `PuertoD` from ((((`cotizaciones` join `puertos` on((`cotizaciones`.`idpuertoO` = `puertos`.`idpuertos`))) join `paises` on((`cotizaciones`.`idpaisorigen` = `paises`.`id`))) join `paises` `paises_1` on((`cotizaciones`.`idpaisdestino` = `paises_1`.`id`))) join `puertos` `puertos_1` on((`cotizaciones`.`idpuertoD` = `puertos_1`.`idpuertos`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `servicios_view`
--

/*!50001 DROP VIEW IF EXISTS `servicios_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `servicios_view` AS select `cotizaciones`.`id` AS `Identificador`,`proveedores`.`proveedor` AS `proveedor`,`serviciosxcot`.`costo` AS `costo` from ((`serviciosxcot` join `cotizaciones` on((`serviciosxcot`.`idcotizacion` = `cotizaciones`.`id`))) join `proveedores` on((`proveedores`.`id` = `serviciosxcot`.`idproveedor`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-19 20:20:47
