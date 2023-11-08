-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: compras_marce
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ajuste_stock`
--

DROP TABLE IF EXISTS `ajuste_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ajuste_stock` (
  `aju_id` int unsigned NOT NULL AUTO_INCREMENT,
  `suc_id` int unsigned NOT NULL,
  `aju_fecha` date NOT NULL,
  `aju_estado` varchar(15) NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`aju_id`,`suc_id`),
  KEY `fk_ajuste_stock_usuario1_idx` (`usu_id`),
  CONSTRAINT `fk_ajuste_stock_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ajuste_stock`
--

LOCK TABLES `ajuste_stock` WRITE;
/*!40000 ALTER TABLE `ajuste_stock` DISABLE KEYS */;
INSERT INTO `ajuste_stock` VALUES (6,1,'2021-12-02','PENDIENTE',1);
/*!40000 ALTER TABLE `ajuste_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aperturaycierre`
--

DROP TABLE IF EXISTS `aperturaycierre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aperturaycierre` (
  `idaperturaycierre` int unsigned NOT NULL AUTO_INCREMENT,
  `aperturaycierre_descripcion` varchar(45) NOT NULL,
  `aperturaycierre_tipo` varchar(45) NOT NULL,
  `aperturaycierre_estado` varchar(45) NOT NULL,
  `aperturaycierre_hora` time NOT NULL,
  `aperturaycierre_monto` int NOT NULL,
  `aperturaycierre_montofinal` int unsigned NOT NULL,
  `id_caja` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`idaperturaycierre`),
  KEY `fk_id_caja_idx` (`id_caja`),
  KEY `fk_id_suc_idx` (`suc_id`),
  KEY `fk_id_usu_idx` (`usu_id`),
  CONSTRAINT `fk_id_caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`idcaja`),
  CONSTRAINT `fk_id_suc` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`),
  CONSTRAINT `fk_id_usu` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aperturaycierre`
--

LOCK TABLES `aperturaycierre` WRITE;
/*!40000 ALTER TABLE `aperturaycierre` DISABLE KEYS */;
INSERT INTO `aperturaycierre` VALUES (1,'apertura caja','apertura','activo','17:21:00',1000000,0,1,1,1),(2,'sasa','Cierre','Actvo','18:49:00',0,1500000,1,1,1),(3,'Apertura caja 1','Apertura','Activo','00:00:00',500000,0,1,1,1),(6,'Apertura caja 1','Apertura','Activo','08:40:19',1234567,0,1,1,1),(7,'Cierre','Cierre','Activo','08:40:48',0,2000000,1,1,1),(8,'Apertura','Apertura','Activo','09:29:48',100000,0,1,1,1),(9,'Apertura caja 1','Apertura','Activo','09:30:27',500000,0,1,1,1);
/*!40000 ALTER TABLE `aperturaycierre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignarff`
--

DROP TABLE IF EXISTS `asignarff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignarff` (
  `idasignarff` int unsigned NOT NULL AUTO_INCREMENT,
  `asignarff_fecha` date NOT NULL,
  `asignarff_monto` int NOT NULL,
  `asignarff_estado` varchar(45) NOT NULL,
  `per_id` int unsigned NOT NULL,
  PRIMARY KEY (`idasignarff`),
  KEY `fk_per_id_idx` (`per_id`),
  CONSTRAINT `per_fk` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignarff`
--

LOCK TABLES `asignarff` WRITE;
/*!40000 ALTER TABLE `asignarff` DISABLE KEYS */;
INSERT INTO `asignarff` VALUES (1,'2023-11-07',2000000,'GENERADO',1),(2,'2023-11-08',1000000,'PENDIENTE',3);
/*!40000 ALTER TABLE `asignarff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco`
--

DROP TABLE IF EXISTS `banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banco` (
  `idbanco` int unsigned NOT NULL,
  `banco_nombre` varchar(45) NOT NULL,
  `banco_telefono` int NOT NULL,
  `banco_direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`idbanco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` VALUES (1,'familiar',984232323,'avda petirossi');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caja` (
  `idcaja` int unsigned NOT NULL,
  `caja_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idcaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` VALUES (1,'caja 1'),(2,'caja 2');
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cheque`
--

DROP TABLE IF EXISTS `cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cheque` (
  `idcheque` int unsigned NOT NULL AUTO_INCREMENT,
  `chequenro` int NOT NULL,
  `cheque_estado` varchar(45) NOT NULL,
  `cheque_vencimiento` date NOT NULL,
  `cheque_monto` int NOT NULL,
  `cheque_observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`idcheque`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque`
--

LOCK TABLES `cheque` WRITE;
/*!40000 ALTER TABLE `cheque` DISABLE KEYS */;
INSERT INTO `cheque` VALUES (1,1,'GENERADO','2024-11-07',100000,'ninguna'),(2,2,'GENERADO','2024-11-07',100000,'ninguna'),(3,3,'GENERADO','2024-11-07',100000,'ninguna');
/*!40000 ALTER TABLE `cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudad` (
  `idciudad` int NOT NULL,
  `ciudad_descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion`
--

DROP TABLE IF EXISTS `clasificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasificacion` (
  `cla_id` int unsigned NOT NULL AUTO_INCREMENT,
  `cla_descri` varchar(45) NOT NULL,
  PRIMARY KEY (`cla_id`),
  UNIQUE KEY `cla_descri_UNIQUE` (`cla_descri`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion`
--

LOCK TABLES `clasificacion` WRITE;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
INSERT INTO `clasificacion` VALUES (1,'CERVEZA'),(29,'DIMINUTAS'),(2,'VINO'),(28,'VODKA');
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `com_id` int unsigned NOT NULL AUTO_INCREMENT,
  `suc_id` int unsigned NOT NULL,
  `com_fecha` date NOT NULL,
  `com_nrofact` varchar(50) NOT NULL,
  `com_tipfact` varchar(10) NOT NULL,
  `com_cuotas` int NOT NULL,
  `com_intervalo` int NOT NULL,
  `com_estado` varchar(15) NOT NULL,
  `com_monto` int NOT NULL,
  `ord_id` int unsigned NOT NULL,
  `prv_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`com_id`,`suc_id`),
  UNIQUE KEY `com_nrofact_UNIQUE` (`com_nrofact`),
  KEY `fk_compra_orden_compra1_idx` (`ord_id`),
  KEY `fk_compra_proveedor1_idx` (`prv_id`),
  KEY `fk_compra_usuario1_idx` (`usu_id`),
  CONSTRAINT `fk_compra_orden_compra1` FOREIGN KEY (`ord_id`) REFERENCES `orden_compra` (`ord_id`),
  CONSTRAINT `fk_compra_proveedor1` FOREIGN KEY (`prv_id`) REFERENCES `proveedor` (`prv_id`),
  CONSTRAINT `fk_compra_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (15,1,'2023-09-21','121212','CONTADO',1,0,'ANULADO',0,6,4,1),(16,1,'2023-09-21','1212','CONTADO',1,0,'ANULADO',0,6,4,1),(17,1,'2023-09-21','121221','CONTADO',1,0,'ANULADO',0,6,4,1),(18,1,'2023-09-21','123141','CONTADO',1,0,'ANULADO',0,6,4,1),(21,1,'2023-09-21','1234','CONTADO',1,0,'ANULADO',0,6,4,1),(22,1,'2023-09-21','1221','CONTADO',1,0,'ANULADO',0,6,4,1),(26,1,'2023-09-21','1233','CONTADO',1,0,'ANULADO',0,6,4,1),(33,1,'2023-09-21','11111111','CONTADO',1,0,'GENERADO',100000,6,4,1),(34,1,'2023-09-21','12121','CONTADO',1,0,'PENDIENTE',-7215000,9,1,1),(35,1,'2002-10-23','001','CONTADO',1,0,'GENERADO',100000,9,4,1),(36,1,'2023-10-26','12345','CONTADO',1,0,'GENERADO',500,9,4,1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conciliacion`
--

DROP TABLE IF EXISTS `conciliacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conciliacion` (
  `idconciliacion` int unsigned NOT NULL AUTO_INCREMENT,
  `conciliacion_estado` varchar(45) NOT NULL,
  `conciliacion_fecha` date NOT NULL,
  `conciliacion_saldo` int NOT NULL,
  `conciliacion_debe` int NOT NULL,
  `conciliacion_haber` int NOT NULL,
  `conciliacion_concepto` varchar(45) NOT NULL,
  PRIMARY KEY (`idconciliacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conciliacion`
--

LOCK TABLES `conciliacion` WRITE;
/*!40000 ALTER TABLE `conciliacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `conciliacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cta_pagar`
--

DROP TABLE IF EXISTS `cta_pagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cta_pagar` (
  `cuo_nro` int unsigned NOT NULL,
  `com_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `cuo_fecha` date NOT NULL,
  `cuo_monto` int NOT NULL,
  `cuo_saldo` int NOT NULL,
  `cuo_estado` varchar(15) NOT NULL,
  PRIMARY KEY (`cuo_nro`,`com_id`,`suc_id`),
  KEY `fk_cta_pagar_compra1_idx` (`com_id`),
  CONSTRAINT `fk_cta_pagar_compra1` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cta_pagar`
--

LOCK TABLES `cta_pagar` WRITE;
/*!40000 ALTER TABLE `cta_pagar` DISABLE KEYS */;
INSERT INTO `cta_pagar` VALUES (1,33,1,'2023-09-21',0,0,'GENERADO'),(1,34,1,'2023-09-21',0,0,'GENERADO');
/*!40000 ALTER TABLE `cta_pagar` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `estado_compras` AFTER UPDATE ON `cta_pagar` FOR EACH ROW BEGIN
declare pendiente int;
select count(*) as cant from cta_pagar where cuo_saldo >0 into pendiente;
if pendiente=0 then
update compra set com_estado="CANCELADO" where com_id=old.com_id;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cuentas_bancarias`
--

DROP TABLE IF EXISTS `cuentas_bancarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas_bancarias` (
  `idcuentas_bancarias` int unsigned NOT NULL,
  `nrocuenta` int NOT NULL,
  `fecha_apertura` date NOT NULL,
  `cuentas_bancarias_estado` varchar(45) NOT NULL,
  `cuentas_bancarias_saldo` int NOT NULL,
  `idbanco` int unsigned NOT NULL,
  PRIMARY KEY (`idcuentas_bancarias`),
  KEY `fk_ban_idx` (`idbanco`),
  CONSTRAINT `fk_ban` FOREIGN KEY (`idbanco`) REFERENCES `banco` (`idbanco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas_bancarias`
--

LOCK TABLES `cuentas_bancarias` WRITE;
/*!40000 ALTER TABLE `cuentas_bancarias` DISABLE KEYS */;
INSERT INTO `cuentas_bancarias` VALUES (1,123,'2023-10-26','ACTIVO',10000000,1);
/*!40000 ALTER TABLE `cuentas_bancarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debitoscreditos`
--

DROP TABLE IF EXISTS `debitoscreditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debitoscreditos` (
  `iddebitoscreditos` int unsigned NOT NULL AUTO_INCREMENT,
  `debitoscreditos_concepto` varchar(45) NOT NULL,
  `debitoscreditos_monto` int NOT NULL,
  `debitoscreditos_transaccion` varchar(45) NOT NULL,
  `debitoscreditos_estado` varchar(45) NOT NULL,
  `idcuentas_bancarias` int unsigned NOT NULL,
  PRIMARY KEY (`iddebitoscreditos`),
  KEY `fk_cuentas_idx` (`idcuentas_bancarias`),
  CONSTRAINT `fk_cuentas` FOREIGN KEY (`idcuentas_bancarias`) REFERENCES `cuentas_bancarias` (`idcuentas_bancarias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debitoscreditos`
--

LOCK TABLES `debitoscreditos` WRITE;
/*!40000 ALTER TABLE `debitoscreditos` DISABLE KEYS */;
/*!40000 ALTER TABLE `debitoscreditos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depositobancario`
--

DROP TABLE IF EXISTS `depositobancario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depositobancario` (
  `iddepositobancario` int NOT NULL AUTO_INCREMENT,
  `depositobancario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddepositobancario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depositobancario`
--

LOCK TABLES `depositobancario` WRITE;
/*!40000 ALTER TABLE `depositobancario` DISABLE KEYS */;
/*!40000 ALTER TABLE `depositobancario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_ajustestock`
--

DROP TABLE IF EXISTS `det_ajustestock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_ajustestock` (
  `aju_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `mot_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  `det_obs` varchar(45) NOT NULL,
  PRIMARY KEY (`aju_id`,`mat_id`,`suc_id`,`mot_id`,`det_cant`),
  KEY `fk_ajuste_stock_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_ajuste_stock_has_materia_prima_ajuste_stock1_idx` (`aju_id`),
  KEY `fk_det_ajustestock_motivo_ajuste1_idx` (`mot_id`),
  CONSTRAINT `fk_ajuste_stock_has_materia_prima_ajuste_stock1` FOREIGN KEY (`aju_id`) REFERENCES `ajuste_stock` (`aju_id`),
  CONSTRAINT `fk_ajuste_stock_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_ajustestock`
--

LOCK TABLES `det_ajustestock` WRITE;
/*!40000 ALTER TABLE `det_ajustestock` DISABLE KEYS */;
INSERT INTO `det_ajustestock` VALUES (6,1,1,9,1,'                                             '),(6,2,1,8,1,'                                             ');
/*!40000 ALTER TABLE `det_ajustestock` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trigger_stock` AFTER INSERT ON `det_ajustestock` FOR EACH ROW BEGIN
UPDATE stock set det_cant=det_cant-new.det_cant where mat_id=new.mat_id and suc_id=new.suc_id; 
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `det_ajustestock_AFTER_DELETE` AFTER DELETE ON `det_ajustestock` FOR EACH ROW BEGIN
UPDATE stock set det_cant=det_cant+old.det_cant where mat_id=old.mat_id and suc_id=old.suc_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `det_compra`
--

DROP TABLE IF EXISTS `det_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_compra` (
  `com_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  `det_precio` int NOT NULL,
  `det_iva5` int NOT NULL DEFAULT '0',
  `det_iva10` int NOT NULL DEFAULT '0',
  `det_exenta` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`com_id`,`mat_id`,`suc_id`),
  KEY `fk_compra_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_compra_has_materia_prima_compra1_idx` (`com_id`),
  CONSTRAINT `fk_compra_has_materia_prima_compra1` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`),
  CONSTRAINT `fk_compra_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_compra`
--

LOCK TABLES `det_compra` WRITE;
/*!40000 ALTER TABLE `det_compra` DISABLE KEYS */;
INSERT INTO `det_compra` VALUES (26,1,1,5,5000,0,2273,0),(33,1,1,10,1500,0,1364,0),(34,1,1,1000,7000,0,636364,0),(34,2,1,5,22000,0,10000,0);
/*!40000 ALTER TABLE `det_compra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `det_compra_AFTER_INSERT` AFTER INSERT ON `det_compra` FOR EACH ROW BEGIN
    DECLARE estado INT;

    -- Check if records with det_cant > 0 exist
    SELECT COUNT(*) INTO estado FROM stock WHERE suc_id = new.suc_id AND mat_id = new.mat_id AND det_cant > 0;

    IF estado > 0 THEN
        -- Update existing record(s) in stock
        UPDATE stock SET det_cant = det_cant + new.det_cant WHERE suc_id = new.suc_id AND mat_id = new.mat_id;
    ELSE
        -- Insert a new record into stock
        INSERT INTO stock (suc_id, mat_id, det_cant) VALUES (new.suc_id, new.mat_id, new.det_cant);
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `det_compra_AFTER_DELETE` AFTER DELETE ON `det_compra` FOR EACH ROW BEGIN
UPDATE stock set det_cant=det_cant-old.det_cant where suc_id=old.suc_id and mat_id=old.mat_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `det_notacredito`
--

DROP TABLE IF EXISTS `det_notacredito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_notacredito` (
  `cre_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  `det_precio` int NOT NULL,
  `det_iva5` int NOT NULL DEFAULT '0',
  `det_iva10` int NOT NULL DEFAULT '0',
  `det_exenta` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`cre_id`,`mat_id`,`suc_id`),
  KEY `fk_nota_credito_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_nota_credito_has_materia_prima_nota_credito1_idx` (`cre_id`),
  CONSTRAINT `fk_nota_credito_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_nota_credito_has_materia_prima_nota_credito1` FOREIGN KEY (`cre_id`) REFERENCES `nota_credito` (`cre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_notacredito`
--

LOCK TABLES `det_notacredito` WRITE;
/*!40000 ALTER TABLE `det_notacredito` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_notacredito` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `det_notacredito_AFTER_INSERT` AFTER INSERT ON `det_notacredito` FOR EACH ROW BEGIN
declare estado varchar(15);
select cre_estado from nota_credito where  cre_id=new.cre_id into estado;
if estado='BONIFICACIONES' then
UPDATE stock set det_cant=det_cant+new.det_cant where mat_id=new.mat_id and suc_id=new.suc_id;
else
UPDATE stock set det_cant=det_cant-new.det_cant where mat_id=new.mat_id and suc_id=new.suc_id;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `det_notaremision`
--

DROP TABLE IF EXISTS `det_notaremision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_notaremision` (
  `rem_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  PRIMARY KEY (`rem_id`,`mat_id`),
  KEY `fk_nota_remision_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_nota_remision_has_materia_prima_nota_remision1_idx` (`rem_id`),
  CONSTRAINT `fk_nota_remision_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_nota_remision_has_materia_prima_nota_remision1` FOREIGN KEY (`rem_id`) REFERENCES `nota_remision` (`rem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_notaremision`
--

LOCK TABLES `det_notaremision` WRITE;
/*!40000 ALTER TABLE `det_notaremision` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_notaremision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_ordencompra`
--

DROP TABLE IF EXISTS `det_ordencompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_ordencompra` (
  `ord_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  `det_precio` int NOT NULL,
  `det_subtotal` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ord_id`,`mat_id`),
  KEY `fk_orden_compra_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_orden_compra_has_materia_prima_orden_compra1_idx` (`ord_id`),
  CONSTRAINT `fk_orden_compra_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_orden_compra_has_materia_prima_orden_compra1` FOREIGN KEY (`ord_id`) REFERENCES `orden_compra` (`ord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_ordencompra`
--

LOCK TABLES `det_ordencompra` WRITE;
/*!40000 ALTER TABLE `det_ordencompra` DISABLE KEYS */;
INSERT INTO `det_ordencompra` VALUES (1,1,3,10000,30000),(1,2,5,15000,75000),(2,1,20,1500,30000),(2,2,10,15000,150000),(2,3,5,10000,50000),(3,1,20,1500,30000),(3,2,10,15000,150000),(3,3,5,10000,50000),(4,1,20,1500,30000),(4,2,10,15000,150000),(4,3,5,10000,50000),(5,1,20,1500,30000),(5,2,10,15000,150000),(6,1,10,1500,15000),(7,1,5,1500,7500),(8,1,5,1500,7500),(9,1,1000,7000,7000000),(9,2,5,22000,110000),(9,3,15,7000,105000);
/*!40000 ALTER TABLE `det_ordencompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_pagofactura`
--

DROP TABLE IF EXISTS `det_pagofactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_pagofactura` (
  `idpagosfactura` int unsigned NOT NULL,
  `cuo_nro` int unsigned NOT NULL,
  `com_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  PRIMARY KEY (`idpagosfactura`,`cuo_nro`,`com_id`,`suc_id`),
  KEY `fk_cuonro_idx` (`cuo_nro`,`com_id`),
  CONSTRAINT `fk_cuonro` FOREIGN KEY (`cuo_nro`, `com_id`) REFERENCES `cta_pagar` (`cuo_nro`, `com_id`),
  CONSTRAINT `fk_pagofactura` FOREIGN KEY (`idpagosfactura`) REFERENCES `pagosfactura` (`idpagosfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_pagofactura`
--

LOCK TABLES `det_pagofactura` WRITE;
/*!40000 ALTER TABLE `det_pagofactura` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_pagofactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_pedido`
--

DROP TABLE IF EXISTS `det_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_pedido` (
  `ped_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `det_cant` int NOT NULL,
  PRIMARY KEY (`ped_id`,`mat_id`),
  KEY `fk_pedido_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_pedido_has_materia_prima_pedido1_idx` (`ped_id`),
  CONSTRAINT `fk_pedido_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_pedido_has_materia_prima_pedido1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_pedido`
--

LOCK TABLES `det_pedido` WRITE;
/*!40000 ALTER TABLE `det_pedido` DISABLE KEYS */;
INSERT INTO `det_pedido` VALUES (6,3,2),(7,3,15),(8,3,2),(10,3,4),(11,3,1),(12,9,10);
/*!40000 ALTER TABLE `det_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_presupuesto`
--

DROP TABLE IF EXISTS `det_presupuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_presupuesto` (
  `pre_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `det_cant` int DEFAULT NULL,
  `det_precio` int DEFAULT NULL,
  `det_iva5` int NOT NULL DEFAULT '0',
  `det_iva10` int NOT NULL DEFAULT '0',
  `det_exenta` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`pre_id`,`mat_id`),
  KEY `fk_presupuesto_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_presupuesto_has_materia_prima_presupuesto1_idx` (`pre_id`),
  CONSTRAINT `fk_presupuesto_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_presupuesto_has_materia_prima_presupuesto1` FOREIGN KEY (`pre_id`) REFERENCES `presupuesto` (`pre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_presupuesto`
--

LOCK TABLES `det_presupuesto` WRITE;
/*!40000 ALTER TABLE `det_presupuesto` DISABLE KEYS */;
INSERT INTO `det_presupuesto` VALUES (1,1,3,10000,0,2727,0),(1,2,5,15000,0,6818,0),(3,2,3,15000,0,6818,0),(4,1,20,1500,0,2727,0),(4,2,10,15000,0,13636,0),(4,3,5,10000,0,4545,0),(5,1,20,1500,0,2727,0),(5,2,10,15000,0,13636,0),(6,1,10,1500,0,1364,0),(7,1,5,1500,0,4545,0),(9,1,1000,7000,0,636364,0),(9,2,5,22000,0,10000,0),(9,3,15,7000,0,9545,0),(10,3,2,7000,0,1273,0);
/*!40000 ALTER TABLE `det_presupuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro_compra`
--

DROP TABLE IF EXISTS `libro_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro_compra` (
  `lib_id` int unsigned NOT NULL AUTO_INCREMENT,
  `com_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `lib_iva5` int DEFAULT NULL,
  `lib_iva10` int DEFAULT NULL,
  `lib_exenta` int DEFAULT NULL,
  `lib_monto` int DEFAULT NULL,
  `lib_estado` varchar(15) NOT NULL,
  PRIMARY KEY (`lib_id`,`com_id`,`suc_id`),
  KEY `fk_libro_compra_compra1_idx` (`com_id`),
  CONSTRAINT `fk_libro_compra_compra1` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro_compra`
--

LOCK TABLES `libro_compra` WRITE;
/*!40000 ALTER TABLE `libro_compra` DISABLE KEYS */;
INSERT INTO `libro_compra` VALUES (55,15,1,0,1364,0,1364,'ANULADO'),(56,15,1,0,1364,0,1364,'ANULADO'),(57,15,1,0,1364,0,1364,'ANULADO'),(58,16,1,0,1364,0,1364,'ANULADO'),(59,17,1,0,1364,0,1364,'ANULADO'),(60,18,1,0,1364,0,1364,'ANULADO'),(61,21,1,0,1364,0,1364,'ANULADO'),(62,22,1,0,1364,0,1364,'ANULADO'),(63,22,1,0,1364,0,1364,'ANULADO'),(64,22,1,0,1364,0,1364,'ANULADO'),(65,22,1,0,1364,0,1364,'ANULADO'),(66,26,1,0,1364,0,1364,'ANULADO'),(67,26,1,0,1364,0,1364,'ANULADO'),(68,33,1,0,1364,0,1364,'GENERADO'),(69,33,1,0,1364,0,1364,'GENERADO'),(70,33,1,0,1364,0,1364,'GENERADO'),(71,34,1,0,682,0,682,'ELIMINADO'),(72,34,1,0,682,0,682,'ELIMINADO'),(73,34,1,0,682,0,682,'ELIMINADO'),(74,34,1,0,636364,0,636364,'ELIMINADO'),(75,34,1,0,10000,0,10000,'ELIMINADO'),(76,34,1,0,9545,0,9545,'ELIMINADO'),(77,34,1,0,636364,0,636364,'ELIMINADO'),(78,34,1,0,636364,0,636364,'ELIMINADO'),(79,34,1,0,9545,0,9545,'GENERADO'),(80,34,1,0,9545,0,9545,'GENERADO'),(81,34,1,0,10000,0,10000,'GENERADO');
/*!40000 ALTER TABLE `libro_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_prima`
--

DROP TABLE IF EXISTS `materia_prima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_prima` (
  `mat_id` int unsigned NOT NULL AUTO_INCREMENT,
  `mat_descri` varchar(60) NOT NULL,
  `mat_precioc` int NOT NULL,
  `mat_unimed` varchar(45) NOT NULL,
  `mat_impuesto` varchar(45) NOT NULL,
  `cla_id` int unsigned NOT NULL,
  PRIMARY KEY (`mat_id`),
  UNIQUE KEY `mat_descri_UNIQUE` (`mat_descri`),
  UNIQUE KEY `mat_unidadm_UNIQUE` (`mat_unimed`),
  KEY `fk_materia_prima_clasificacion1_idx` (`cla_id`),
  CONSTRAINT `fk_materia_prima_clasificacion1` FOREIGN KEY (`cla_id`) REFERENCES `clasificacion` (`cla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_prima`
--

LOCK TABLES `materia_prima` WRITE;
/*!40000 ALTER TABLE `materia_prima` DISABLE KEYS */;
INSERT INTO `materia_prima` VALUES (1,'BRAHMA',7000,'NINGUNA         ','10',1),(2,'SANTA ELENA    ',22000,'ML  ','10',2),(3,'OUROFINO ',7000,'1M  ','10',1),(9,'LAYS',3000,'GRAMOS','10',29);
/*!40000 ALTER TABLE `materia_prima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo_ajuste`
--

DROP TABLE IF EXISTS `motivo_ajuste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motivo_ajuste` (
  `mot_id` int unsigned NOT NULL AUTO_INCREMENT,
  `mot_descri` varchar(45) NOT NULL,
  PRIMARY KEY (`mot_id`),
  UNIQUE KEY `mot_descri_UNIQUE` (`mot_descri`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo_ajuste`
--

LOCK TABLES `motivo_ajuste` WRITE;
/*!40000 ALTER TABLE `motivo_ajuste` DISABLE KEYS */;
INSERT INTO `motivo_ajuste` VALUES (8,'ROBO'),(7,'ROTURA'),(9,'VENCIDO');
/*!40000 ALTER TABLE `motivo_ajuste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_credito`
--

DROP TABLE IF EXISTS `nota_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nota_credito` (
  `cre_id` int unsigned NOT NULL AUTO_INCREMENT,
  `suc_id` int unsigned NOT NULL,
  `cre_fecha` date DEFAULT NULL,
  `cre_estado` varchar(15) NOT NULL,
  `cre_motivo` varchar(45) DEFAULT NULL,
  `cre_monto` int DEFAULT NULL,
  `com_id` int unsigned NOT NULL,
  `prv_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`cre_id`,`suc_id`),
  KEY `fk_nota_credito_compra1_idx` (`com_id`),
  KEY `fk_nota_credito_proveedor1_idx` (`prv_id`),
  KEY `fk_nota_credito_usuario1_idx` (`usu_id`),
  CONSTRAINT `fk_nota_credito_compra1` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`),
  CONSTRAINT `fk_nota_credito_proveedor1` FOREIGN KEY (`prv_id`) REFERENCES `proveedor` (`prv_id`),
  CONSTRAINT `fk_nota_credito_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_credito`
--

LOCK TABLES `nota_credito` WRITE;
/*!40000 ALTER TABLE `nota_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_credito` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `nota_credito_AFTER_INSERT` AFTER INSERT ON `nota_credito` FOR EACH ROW BEGIN
update compra set com_estado='UTILIZADO' where com_id=new.com_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `nota_credito_AFTER_UPDATE` AFTER UPDATE ON `nota_credito` FOR EACH ROW BEGIN
declare estado varchar(15);
select cre_estado from nota_credito where cre_id=old.cre_id into estado;
if estado='ANULADO' then
update compra set com_estado='NO UTILIZADO' where com_id=old.com_id;
end if;
if estado='GENERADO' then
update cta_pagar set cuo_monto=old.cre_monto, cuo_saldo=old.cre_monto where com_id=old.com_id;
end if;


END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `nota_remision`
--

DROP TABLE IF EXISTS `nota_remision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nota_remision` (
  `rem_id` int unsigned NOT NULL AUTO_INCREMENT,
  `rem_fecha` date NOT NULL,
  `rem_fecini` date NOT NULL,
  `rem_fecfin` date DEFAULT NULL,
  `rem_motivo` varchar(45) NOT NULL,
  `rem_estado` varchar(45) NOT NULL,
  `per_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  `veh_id` int unsigned NOT NULL,
  PRIMARY KEY (`rem_id`),
  KEY `fk_nota_remision_usuario1_idx` (`usu_id`),
  KEY `fk_nota_remision_vehiculo1_idx` (`veh_id`),
  KEY `fk_nota_remision_personal1_idx` (`per_id`),
  CONSTRAINT `fk_nota_remision_personal1` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`),
  CONSTRAINT `fk_nota_remision_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`),
  CONSTRAINT `fk_nota_remision_vehiculo1` FOREIGN KEY (`veh_id`) REFERENCES `vehiculo` (`veh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_remision`
--

LOCK TABLES `nota_remision` WRITE;
/*!40000 ALTER TABLE `nota_remision` DISABLE KEYS */;
INSERT INTO `nota_remision` VALUES (11,'2023-09-23','2023-09-05','2023-09-30','TRASLADO','PENDIENTE',7,1,21);
/*!40000 ALTER TABLE `nota_remision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compra`
--

DROP TABLE IF EXISTS `orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_compra` (
  `ord_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ord_fecha` date NOT NULL,
  `ord_estado` varchar(15) NOT NULL,
  `pre_id` int unsigned NOT NULL,
  `prv_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `fk_orden_compra_proveedor1_idx` (`prv_id`),
  KEY `fk_orden_compra_usuario1_idx` (`usu_id`),
  KEY `fk_orden_compra_presupuesto1_idx` (`pre_id`),
  KEY `fk_orden_compra_sucursal1_idx` (`suc_id`),
  CONSTRAINT `fk_orden_compra_presupuesto1` FOREIGN KEY (`pre_id`) REFERENCES `presupuesto` (`pre_id`),
  CONSTRAINT `fk_orden_compra_proveedor1` FOREIGN KEY (`prv_id`) REFERENCES `proveedor` (`prv_id`),
  CONSTRAINT `fk_orden_compra_sucursal1` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`),
  CONSTRAINT `fk_orden_compra_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra`
--

LOCK TABLES `orden_compra` WRITE;
/*!40000 ALTER TABLE `orden_compra` DISABLE KEYS */;
INSERT INTO `orden_compra` VALUES (1,'2020-11-28','UTILIZADO',1,1,1,1),(2,'2020-11-28','UTILIZADO',4,4,1,1),(3,'2020-12-03','UTILIZADO',2,1,1,1),(4,'2020-12-03','UTILIZADO',4,1,1,1),(5,'2020-12-17','UTILIZADO',5,1,1,1),(6,'2021-11-22','UTILIZADO',6,4,1,1),(7,'2022-11-16','ANULADO',7,1,1,1),(8,'2023-09-21','UTILIZADO',7,1,1,1),(9,'2023-09-21','GENERADO',9,5,1,1);
/*!40000 ALTER TABLE `orden_compra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `orden_compra_AFTER_INSERT` AFTER INSERT ON `orden_compra` FOR EACH ROW BEGIN
update presupuesto set pre_estado='UTILIZADO' where pre_id=new.pre_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `orden_compra_AFTER_UPDATE` AFTER UPDATE ON `orden_compra` FOR EACH ROW BEGIN
declare estado varchar(15);
select ord_estado from orden_compra where ord_id=old.ord_id into estado;
if estado='ANULADO' then
update presupuesto set pre_estado='GENERADO' where pre_id=old.pre_id;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ordenpago`
--

DROP TABLE IF EXISTS `ordenpago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenpago` (
  `idordenpago` int unsigned NOT NULL AUTO_INCREMENT,
  `ordenpago_estado` varchar(45) NOT NULL,
  `ordenpago_fecha` date NOT NULL,
  `ordenpago_fechadepago` date NOT NULL,
  `ordenpago_descripcion` varchar(45) NOT NULL,
  `ordenpago_nro` int NOT NULL,
  `ordenpago_importe` int NOT NULL,
  `ordenpago_medio` varchar(45) NOT NULL,
  `prv_id` int unsigned NOT NULL,
  PRIMARY KEY (`idordenpago`),
  KEY `fk_proveedor_idx` (`prv_id`),
  CONSTRAINT `fk_proveedor` FOREIGN KEY (`prv_id`) REFERENCES `proveedor` (`prv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenpago`
--

LOCK TABLES `ordenpago` WRITE;
/*!40000 ALTER TABLE `ordenpago` DISABLE KEYS */;
INSERT INTO `ordenpago` VALUES (1,'GENERADO','2023-11-01','2023-11-04','pago',1,100000,'efectivo',1),(3,'GENERADO','2023-11-07','2023-11-07','pagodefacturas',2,100000,'EFECTIVO',5);
/*!40000 ALTER TABLE `ordenpago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagosfactura`
--

DROP TABLE IF EXISTS `pagosfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagosfactura` (
  `idpagosfactura` int unsigned NOT NULL AUTO_INCREMENT,
  `pagosfactura_fecha` date NOT NULL,
  `pagosfactura_tipo` varchar(45) NOT NULL,
  `pagosfactura_estado` varchar(45) NOT NULL,
  `pagosfactura_fechapago` date DEFAULT NULL,
  `idcuentas_bancarias` int unsigned DEFAULT NULL,
  `com_id` int unsigned NOT NULL,
  PRIMARY KEY (`idpagosfactura`),
  KEY `fk_cuentasbancarias_idx` (`idcuentas_bancarias`),
  KEY `fk_com_idx` (`com_id`),
  CONSTRAINT `fk_com` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cuentasbancarias` FOREIGN KEY (`idcuentas_bancarias`) REFERENCES `cuentas_bancarias` (`idcuentas_bancarias`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagosfactura`
--

LOCK TABLES `pagosfactura` WRITE;
/*!40000 ALTER TABLE `pagosfactura` DISABLE KEYS */;
INSERT INTO `pagosfactura` VALUES (1,'2023-10-20','EFECTIVO','GENERADO',NULL,NULL,35),(2,'2023-10-20','CHEQUE','PENDIENTE',NULL,1,36);
/*!40000 ALTER TABLE `pagosfactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `ped_id` int unsigned NOT NULL AUTO_INCREMENT,
  `ped_fecha` date NOT NULL,
  `ped_estado` varchar(15) NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`ped_id`),
  KEY `fk_pedido_usuario1_idx` (`usu_id`),
  KEY `fk_pedido_sucursal1_idx` (`suc_id`),
  CONSTRAINT `fk_pedido_sucursal1` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`),
  CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'2020-11-20','UTILIZADO',1,1),(2,'2020-11-21','UTILIZADO',1,1),(3,'2020-11-21','UTILIZADO',1,1),(4,'2020-11-21','UTILIZADO',1,1),(5,'2020-11-22','UTILIZADO',1,1),(6,'2020-12-14','UTILIZADO',1,1),(7,'2020-12-17','UTILIZADO',1,1),(8,'2021-12-02','UTILIZADO',1,1),(9,'2022-04-20','GENERADO',1,1),(10,'2022-04-20','GENERADO',1,1),(11,'2022-11-15','GENERADO',1,1),(12,'2022-11-16','GENERADO',1,1),(13,'2023-09-23','PENDIENTE',1,1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `per_id` int unsigned NOT NULL AUTO_INCREMENT,
  `per_nombre` varchar(60) NOT NULL,
  `per_apelli` varchar(80) NOT NULL,
  `per_ci` varchar(60) NOT NULL,
  `per_direc` varchar(100) NOT NULL,
  `per_email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `per_ci_UNIQUE` (`per_ci`),
  UNIQUE KEY `per_email_UNIQUE` (`per_email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Marcelino  ','ROMERO','5043939  ','Avda Gral Garay c/ Cnel Brizuela  ','marcelino@gmail.com  '),(2,'Liliana ','Moreschi ','1923125 ','AVDA GRAL GARAY C/  CNEL BRIZUELA','lili123@gmail.com '),(3,'ALICIA','Romero      ','6125545      ','San Jose      ','marce@gmail.com      '),(7,'ALAN','ROMERO','6942533','LIMPIO','ALAN111@GMAIL.COM');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto`
--

DROP TABLE IF EXISTS `presupuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `presupuesto` (
  `pre_id` int unsigned NOT NULL AUTO_INCREMENT,
  `pre_fecha` date NOT NULL,
  `pre_estado` varchar(15) NOT NULL,
  `pre_monto` int NOT NULL,
  `prv_id` int unsigned NOT NULL,
  `ped_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  `usu_id` int unsigned NOT NULL,
  PRIMARY KEY (`pre_id`),
  KEY `fk_presupuesto_pedido1_idx` (`ped_id`),
  KEY `fk_presupuesto_usuario1_idx` (`usu_id`),
  KEY `fk_presupuesto_proveedor1_idx` (`prv_id`),
  KEY `fk_presupuesto_sucursal1_idx` (`suc_id`),
  CONSTRAINT `fk_presupuesto_pedido1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto`
--

LOCK TABLES `presupuesto` WRITE;
/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` VALUES (1,'2020-11-25','UTILIZADO',4500,1,1,1,1),(2,'2020-11-29','UTILIZADO',0,1,2,1,1),(3,'2020-11-30','UTILIZADO',45000,1,3,1,1),(4,'2020-12-02','UTILIZADO',0,1,2,1,1),(5,'2020-12-17','UTILIZADO',30000,1,2,1,1),(6,'2020-12-17','UTILIZADO',15000,4,4,1,1),(7,'2021-12-02','UTILIZADO',0,1,7,1,1),(8,'2022-11-15','ANULADO',0,1,7,1,1),(9,'2022-11-16','UTILIZADO',0,5,7,1,1),(10,'2023-09-23','PENDIENTE',14000,4,8,1,1);
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `presupuesto_AFTER_INSERT` AFTER INSERT ON `presupuesto` FOR EACH ROW BEGIN
update pedido set ped_estado='UTILIZADO' where ped_id=new.ped_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `presupuesto_AFTER_UPDATE` AFTER UPDATE ON `presupuesto` FOR EACH ROW BEGIN
declare estado varchar(15);
select pre_estado from presupuesto where pre_id=old.pre_id into estado;
if estado='ANULADO' then
update pedido set ped_estado='GENERADO' where ped_id=old.ped_id;
end if;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `prv_id` int unsigned NOT NULL AUTO_INCREMENT,
  `prv_rasocial` varchar(45) NOT NULL,
  `prv_apelli` varchar(45) DEFAULT NULL,
  `prv_ruc` varchar(45) NOT NULL,
  `prv_direc` varchar(100) NOT NULL,
  `prv_telef` varchar(45) NOT NULL,
  `prv_email` varchar(100) NOT NULL,
  PRIMARY KEY (`prv_id`),
  UNIQUE KEY `prv_ruc_UNIQUE` (`prv_ruc`),
  UNIQUE KEY `prv_email_UNIQUE` (`prv_email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'OSCAR','SANCHEZ','123456   ','XXXXX   ','123123   ','ff@gmail.com'),(4,'VINOS ','MARECOS','12345       ','AVDA GRAL AQUINO       ','11333456       ','1@1'),(5,'VICTOR','GONZALES','67676776','SAJONIA','0984123453','VICTOR@GMAIL.COM'),(6,'ZETA','CONSTRUCCIONES','561234','LIMPIO','021345','ZETA@GMAIL.COM'),(7,'ANSOASOIN','NSADNUAI','21213','SAJONIA','09812345','MAT@123');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrocheque`
--

DROP TABLE IF EXISTS `registrocheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrocheque` (
  `idregistrocheque` int unsigned NOT NULL AUTO_INCREMENT,
  `registrocheque_estado` varchar(45) NOT NULL,
  `registrocheque_fecha` date NOT NULL,
  `registrocheque_fechacobro` date NOT NULL,
  `prv_id` int unsigned NOT NULL,
  `idcheque` int unsigned NOT NULL,
  PRIMARY KEY (`idregistrocheque`),
  UNIQUE KEY `idcheque_UNIQUE` (`idcheque`),
  KEY `fk_proveedor_idx` (`prv_id`),
  KEY `pro_idx` (`prv_id`),
  KEY `che_idx` (`idcheque`),
  CONSTRAINT `che` FOREIGN KEY (`idcheque`) REFERENCES `cheque` (`idcheque`),
  CONSTRAINT `pro` FOREIGN KEY (`prv_id`) REFERENCES `proveedor` (`prv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrocheque`
--

LOCK TABLES `registrocheque` WRITE;
/*!40000 ALTER TABLE `registrocheque` DISABLE KEYS */;
INSERT INTO `registrocheque` VALUES (1,'GENERADO','2023-11-07','2023-11-07',1,1),(2,'GENERADO','2023-11-07','2023-11-07',1,2),(3,'PENDIENTE','2023-11-07','2023-11-07',1,3);
/*!40000 ALTER TABLE `registrocheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remi_compra`
--

DROP TABLE IF EXISTS `remi_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remi_compra` (
  `rem_id` int unsigned NOT NULL,
  `com_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  PRIMARY KEY (`rem_id`,`com_id`,`suc_id`),
  KEY `fk_nota_remision_has_compra_compra1_idx` (`com_id`),
  KEY `fk_nota_remision_has_compra_nota_remision1_idx` (`rem_id`),
  CONSTRAINT `fk_nota_remision_has_compra_compra1` FOREIGN KEY (`com_id`) REFERENCES `compra` (`com_id`),
  CONSTRAINT `fk_nota_remision_has_compra_nota_remision1` FOREIGN KEY (`rem_id`) REFERENCES `nota_remision` (`rem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remi_compra`
--

LOCK TABLES `remi_compra` WRITE;
/*!40000 ALTER TABLE `remi_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `remi_compra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `remi_compra_AFTER_UPDATE` AFTER UPDATE ON `remi_compra` FOR EACH ROW BEGIN
declare estado varchar(15);
select rem_estado from nota_remision where rem_id=old.rem_id into estado;
if estado='GENERADO' then
update compra set com_estado='UTILIZADO' where com_id=old.com_id;
end if;
if estado='ANULADO' then
update compra set com_estado='NO UTILIZADO' where com_id=old.com_id;
end if;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `remi_traslado`
--

DROP TABLE IF EXISTS `remi_traslado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remi_traslado` (
  `rem_id` int unsigned NOT NULL,
  `suc_id` int unsigned NOT NULL,
  PRIMARY KEY (`rem_id`,`suc_id`),
  KEY `fk_nota_remision_has_sucursal_sucursal1_idx` (`suc_id`),
  KEY `fk_nota_remision_has_sucursal_nota_remision1_idx` (`rem_id`),
  CONSTRAINT `fk_nota_remision_has_sucursal_nota_remision1` FOREIGN KEY (`rem_id`) REFERENCES `nota_remision` (`rem_id`),
  CONSTRAINT `fk_nota_remision_has_sucursal_sucursal1` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remi_traslado`
--

LOCK TABLES `remi_traslado` WRITE;
/*!40000 ALTER TABLE `remi_traslado` DISABLE KEYS */;
/*!40000 ALTER TABLE `remi_traslado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rendicion`
--

DROP TABLE IF EXISTS `rendicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rendicion` (
  `idrendicion` int unsigned NOT NULL AUTO_INCREMENT,
  `rendicion_estado` varchar(45) NOT NULL,
  `rendicion_fecha` date NOT NULL,
  `rendicion_descripcion` varchar(45) NOT NULL,
  `rendicion_monto` int NOT NULL,
  `idreposicion` int unsigned NOT NULL,
  PRIMARY KEY (`idrendicion`),
  KEY `fk_reposicion_idx` (`idreposicion`),
  CONSTRAINT `fk_reposicion` FOREIGN KEY (`idreposicion`) REFERENCES `reposicion` (`idreposicion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendicion`
--

LOCK TABLES `rendicion` WRITE;
/*!40000 ALTER TABLE `rendicion` DISABLE KEYS */;
INSERT INTO `rendicion` VALUES (1,'GENERADO','2023-11-07','essap',150000,1),(2,'GENERADO','2023-11-07','essap',100000,1),(3,'PENDIENTE','2023-11-08','essap',155550,1),(4,'PENDIENTE','2023-11-08','cfg',100000,1);
/*!40000 ALTER TABLE `rendicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reposicion`
--

DROP TABLE IF EXISTS `reposicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reposicion` (
  `idreposicion` int unsigned NOT NULL AUTO_INCREMENT,
  `reposicion_estado` varchar(45) NOT NULL,
  `reposicion_fecha` date NOT NULL,
  `reposicion_monto` int NOT NULL,
  `idasignarff` int unsigned NOT NULL,
  PRIMARY KEY (`idreposicion`),
  KEY `asignar_idx` (`idasignarff`),
  CONSTRAINT `asignar` FOREIGN KEY (`idasignarff`) REFERENCES `asignarff` (`idasignarff`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reposicion`
--

LOCK TABLES `reposicion` WRITE;
/*!40000 ALTER TABLE `reposicion` DISABLE KEYS */;
INSERT INTO `reposicion` VALUES (1,'GENERADO','2023-11-07',100000,1),(2,'GENERADO','2023-11-07',200000,1);
/*!40000 ALTER TABLE `reposicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `suc_id` int unsigned NOT NULL,
  `mat_id` int unsigned NOT NULL,
  `det_cant` int DEFAULT NULL,
  PRIMARY KEY (`suc_id`,`mat_id`),
  KEY `fk_sucursal_has_materia_prima_materia_prima1_idx` (`mat_id`),
  KEY `fk_sucursal_has_materia_prima_sucursal1_idx` (`suc_id`),
  CONSTRAINT `fk_sucursal_has_materia_prima_materia_prima1` FOREIGN KEY (`mat_id`) REFERENCES `materia_prima` (`mat_id`),
  CONSTRAINT `fk_sucursal_has_materia_prima_sucursal1` FOREIGN KEY (`suc_id`) REFERENCES `sucursal` (`suc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,1,999),(1,2,5),(1,3,0);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sucursal` (
  `suc_id` int unsigned NOT NULL AUTO_INCREMENT,
  `suc_descri` varchar(50) NOT NULL,
  `suc_direc` varchar(100) DEFAULT NULL,
  `suc_telef` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`suc_id`),
  UNIQUE KEY `dep_descri_UNIQUE` (`suc_descri`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'MRA','AVDA GRAL GARAY','021-123-456'),(2,'LIMPIO','San Jose','021-121-121'),(3,'LUQUE','De la Vicotria','021-131-123'),(4,'FERNANDO DE LA MORA','AVDA GRAL ARTIGAS','021-123-223'),(9,'ASUNCION','AVDA ARTIGAS 123','021-111-111');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `usu_login` varchar(80) NOT NULL,
  `usu_pass` varchar(100) NOT NULL,
  `usu_rol` varchar(45) NOT NULL,
  `usu_estado` varchar(15) NOT NULL,
  `usu_nav` varchar(45) DEFAULT NULL,
  `usu_disp` int DEFAULT NULL,
  `usu_intento` int DEFAULT NULL,
  `usu_control` datetime DEFAULT NULL,
  `per_id` int unsigned NOT NULL,
  `suc_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_login_UNIQUE` (`usu_login`),
  KEY `fk_usuario_personal1_idx` (`per_id`),
  KEY `fk_sucursal_idx` (`suc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'MARCE','81dc9bdb52d04dc20036dbd8313ed055','ADMINISTRADOR','ACTIVO','Google Chrome',1,1,NULL,1,1),(2,'Lilis ','81dc9bdb52d04dc20036dbd8313ed055','SUPERVISOR','ACTIVO','',0,0,NULL,2,2),(5,'Alicia','202cb962ac59075b964b07152d234b70','ENCARGADO DE COMPRAS','ACTIVO','',0,0,NULL,3,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehiculo` (
  `veh_id` int unsigned NOT NULL AUTO_INCREMENT,
  `veh_descri` varchar(45) NOT NULL,
  `veh_chapa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`veh_id`),
  UNIQUE KEY `veh_descri_UNIQUE` (`veh_descri`),
  UNIQUE KEY `veh_chapa_UNIQUE` (`veh_chapa`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'TOYOTA  ','SS3   '),(2,'MERCEDES BENZ   ','A4    '),(21,'NIZAN ','123 '),(22,'AX','123AX');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `idventas` int unsigned NOT NULL,
  `ventas_descripcion` varchar(45) NOT NULL,
  `ventas_cuotas` int NOT NULL,
  `ventas_cantidad` int NOT NULL,
  `ventas_precio` int NOT NULL,
  `ventas_preciototal` int NOT NULL,
  PRIMARY KEY (`idventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vs_ajuste`
--

DROP TABLE IF EXISTS `vs_ajuste`;
/*!50001 DROP VIEW IF EXISTS `vs_ajuste`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_ajuste` AS SELECT 
 1 AS `aju_id`,
 1 AS `aju_fecha`,
 1 AS `aju_estado`,
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `usu_id`,
 1 AS `usu_login`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_anularstock`
--

DROP TABLE IF EXISTS `vs_anularstock`;
/*!50001 DROP VIEW IF EXISTS `vs_anularstock`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_anularstock` AS SELECT 
 1 AS `suc_id`,
 1 AS `mat_id`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_aperturaycierre`
--

DROP TABLE IF EXISTS `vs_aperturaycierre`;
/*!50001 DROP VIEW IF EXISTS `vs_aperturaycierre`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_aperturaycierre` AS SELECT 
 1 AS `idaperturaycierre`,
 1 AS `aperturaycierre_descripcion`,
 1 AS `aperturaycierre_tipo`,
 1 AS `aperturaycierre_estado`,
 1 AS `aperturaycierre_hora`,
 1 AS `aperturaycierre_monto`,
 1 AS `aperturaycierre_montofinal`,
 1 AS `id_caja`,
 1 AS `suc_id`,
 1 AS `usu_id`,
 1 AS `idcaja`,
 1 AS `caja_descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_asignarff`
--

DROP TABLE IF EXISTS `vs_asignarff`;
/*!50001 DROP VIEW IF EXISTS `vs_asignarff`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_asignarff` AS SELECT 
 1 AS `idasignarff`,
 1 AS `asignarff_fecha`,
 1 AS `asignarff_monto`,
 1 AS `asignarff_estado`,
 1 AS `per_id`,
 1 AS `per_nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_busqueda`
--

DROP TABLE IF EXISTS `vs_busqueda`;
/*!50001 DROP VIEW IF EXISTS `vs_busqueda`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_busqueda` AS SELECT 
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_compra`
--

DROP TABLE IF EXISTS `vs_compra`;
/*!50001 DROP VIEW IF EXISTS `vs_compra`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_compra` AS SELECT 
 1 AS `com_id`,
 1 AS `com_fecha`,
 1 AS `com_nrofact`,
 1 AS `com_tipfact`,
 1 AS `com_cuotas`,
 1 AS `com_intervalo`,
 1 AS `com_estado`,
 1 AS `com_monto`,
 1 AS `ord_id`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `prv_ruc`,
 1 AS `usu_id`,
 1 AS `usu_login`,
 1 AS `suc_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_ctapagar`
--

DROP TABLE IF EXISTS `vs_ctapagar`;
/*!50001 DROP VIEW IF EXISTS `vs_ctapagar`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_ctapagar` AS SELECT 
 1 AS `cuo_nro`,
 1 AS `com_id`,
 1 AS `com_nrofact`,
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `cuo_fecha`,
 1 AS `cuo_monto`,
 1 AS `cuo_saldo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detajuste`
--

DROP TABLE IF EXISTS `vs_detajuste`;
/*!50001 DROP VIEW IF EXISTS `vs_detajuste`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detajuste` AS SELECT 
 1 AS `aju_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`,
 1 AS `det_obs`,
 1 AS `mot_id`,
 1 AS `mot_descri`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detcompra`
--

DROP TABLE IF EXISTS `vs_detcompra`;
/*!50001 DROP VIEW IF EXISTS `vs_detcompra`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detcompra` AS SELECT 
 1 AS `com_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `suc_id`,
 1 AS `det_cant`,
 1 AS `det_precio`,
 1 AS `det_iva5`,
 1 AS `det_iva10`,
 1 AS `det_exenta`,
 1 AS `subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detnotac`
--

DROP TABLE IF EXISTS `vs_detnotac`;
/*!50001 DROP VIEW IF EXISTS `vs_detnotac`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detnotac` AS SELECT 
 1 AS `cre_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`,
 1 AS `det_precio`,
 1 AS `det_iva5`,
 1 AS `det_iva10`,
 1 AS `det_exenta`,
 1 AS `subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detnotaremi`
--

DROP TABLE IF EXISTS `vs_detnotaremi`;
/*!50001 DROP VIEW IF EXISTS `vs_detnotaremi`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detnotaremi` AS SELECT 
 1 AS `rem_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detorden`
--

DROP TABLE IF EXISTS `vs_detorden`;
/*!50001 DROP VIEW IF EXISTS `vs_detorden`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detorden` AS SELECT 
 1 AS `ord_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`,
 1 AS `det_precio`,
 1 AS `det_subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detpedido`
--

DROP TABLE IF EXISTS `vs_detpedido`;
/*!50001 DROP VIEW IF EXISTS `vs_detpedido`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detpedido` AS SELECT 
 1 AS `ped_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_detpresu`
--

DROP TABLE IF EXISTS `vs_detpresu`;
/*!50001 DROP VIEW IF EXISTS `vs_detpresu`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_detpresu` AS SELECT 
 1 AS `pre_id`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`,
 1 AS `det_precio`,
 1 AS `det_iva5`,
 1 AS `det_iva10`,
 1 AS `det_exenta`,
 1 AS `subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_filtrofact`
--

DROP TABLE IF EXISTS `vs_filtrofact`;
/*!50001 DROP VIEW IF EXISTS `vs_filtrofact`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_filtrofact` AS SELECT 
 1 AS `com_id`,
 1 AS `com_nrofact`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `prv_ruc`,
 1 AS `mat_id`,
 1 AS `mat_descri`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_libroc`
--

DROP TABLE IF EXISTS `vs_libroc`;
/*!50001 DROP VIEW IF EXISTS `vs_libroc`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_libroc` AS SELECT 
 1 AS `lib_id`,
 1 AS `com_id`,
 1 AS `com_nrofact`,
 1 AS `com_fecha`,
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `lib_iva5`,
 1 AS `lib_iva10`,
 1 AS `lib_exenta`,
 1 AS `lib_monto`,
 1 AS `lib_estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_matprima`
--

DROP TABLE IF EXISTS `vs_matprima`;
/*!50001 DROP VIEW IF EXISTS `vs_matprima`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_matprima` AS SELECT 
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `mat_precioc`,
 1 AS `mat_unimed`,
 1 AS `mat_impuesto`,
 1 AS `cla_id`,
 1 AS `cla_descri`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_notacompra`
--

DROP TABLE IF EXISTS `vs_notacompra`;
/*!50001 DROP VIEW IF EXISTS `vs_notacompra`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_notacompra` AS SELECT 
 1 AS `com_id`,
 1 AS `com_nrofact`,
 1 AS `com_fecha`,
 1 AS `cre_monto`,
 1 AS `cre_motivo`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `usu_id`,
 1 AS `usu_login`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_notacredito`
--

DROP TABLE IF EXISTS `vs_notacredito`;
/*!50001 DROP VIEW IF EXISTS `vs_notacredito`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_notacredito` AS SELECT 
 1 AS `cre_id`,
 1 AS `cre_fecha`,
 1 AS `cre_estado`,
 1 AS `cre_motivo`,
 1 AS `cre_monto`,
 1 AS `com_id`,
 1 AS `com_nrofact`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `prv_ruc`,
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `usu_id`,
 1 AS `usu_login`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_notaremi`
--

DROP TABLE IF EXISTS `vs_notaremi`;
/*!50001 DROP VIEW IF EXISTS `vs_notaremi`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_notaremi` AS SELECT 
 1 AS `rem_id`,
 1 AS `rem_fecha`,
 1 AS `rem_fecini`,
 1 AS `rem_fecfin`,
 1 AS `rem_motivo`,
 1 AS `rem_estado`,
 1 AS `per_id`,
 1 AS `nombre`,
 1 AS `usu_id`,
 1 AS `usu_login`,
 1 AS `veh_id`,
 1 AS `veh_descri`,
 1 AS `veh_chapa`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_orden`
--

DROP TABLE IF EXISTS `vs_orden`;
/*!50001 DROP VIEW IF EXISTS `vs_orden`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_orden` AS SELECT 
 1 AS `ord_id`,
 1 AS `ord_fecha`,
 1 AS `ord_estado`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `prv_ruc`,
 1 AS `prv_direc`,
 1 AS `pre_id`,
 1 AS `suc_id`,
 1 AS `usu_id`,
 1 AS `usu_login`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_ordenpago`
--

DROP TABLE IF EXISTS `vs_ordenpago`;
/*!50001 DROP VIEW IF EXISTS `vs_ordenpago`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_ordenpago` AS SELECT 
 1 AS `idordenpago`,
 1 AS `ordenpago_estado`,
 1 AS `ordenpago_fecha`,
 1 AS `ordenpago_fechadepago`,
 1 AS `ordenpago_descripcion`,
 1 AS `ordenpago_nro`,
 1 AS `ordenpago_importe`,
 1 AS `ordenpago_medio`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_pagofactura`
--

DROP TABLE IF EXISTS `vs_pagofactura`;
/*!50001 DROP VIEW IF EXISTS `vs_pagofactura`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_pagofactura` AS SELECT 
 1 AS `idpagosfactura`,
 1 AS `pagosfactura_fecha`,
 1 AS `pagosfactura_tipo`,
 1 AS `pagosfactura_estado`,
 1 AS `pagosfactura_fechapago`,
 1 AS `idcuentas_bancarias`,
 1 AS `com_id`,
 1 AS `saldo`,
 1 AS `com_nrofact`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_pedido`
--

DROP TABLE IF EXISTS `vs_pedido`;
/*!50001 DROP VIEW IF EXISTS `vs_pedido`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_pedido` AS SELECT 
 1 AS `ped_id`,
 1 AS `ped_fecha`,
 1 AS `ped_estado`,
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `usu_id`,
 1 AS `usu_login`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_presu`
--

DROP TABLE IF EXISTS `vs_presu`;
/*!50001 DROP VIEW IF EXISTS `vs_presu`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_presu` AS SELECT 
 1 AS `pre_id`,
 1 AS `pre_fecha`,
 1 AS `pre_estado`,
 1 AS `pre_monto`,
 1 AS `prv_id`,
 1 AS `prv_rasocial`,
 1 AS `prv_ruc`,
 1 AS `prv_direc`,
 1 AS `ped_id`,
 1 AS `suc_id`,
 1 AS `usu_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_registrocheque`
--

DROP TABLE IF EXISTS `vs_registrocheque`;
/*!50001 DROP VIEW IF EXISTS `vs_registrocheque`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_registrocheque` AS SELECT 
 1 AS `idregistrocheque`,
 1 AS `registrocheque_estado`,
 1 AS `registrocheque_fecha`,
 1 AS `registrocheque_fechacobro`,
 1 AS `prv_id`,
 1 AS `idcheque`,
 1 AS `prv_rasocial`,
 1 AS `chequenro`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_rendicion`
--

DROP TABLE IF EXISTS `vs_rendicion`;
/*!50001 DROP VIEW IF EXISTS `vs_rendicion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_rendicion` AS SELECT 
 1 AS `idrendicion`,
 1 AS `rendicion_estado`,
 1 AS `rendicion_fecha`,
 1 AS `rendicion_descripcion`,
 1 AS `rendicion_monto`,
 1 AS `idreposicion`,
 1 AS `reposicion_monto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_reposicion`
--

DROP TABLE IF EXISTS `vs_reposicion`;
/*!50001 DROP VIEW IF EXISTS `vs_reposicion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_reposicion` AS SELECT 
 1 AS `idreposicion`,
 1 AS `reposicion_estado`,
 1 AS `reposicion_fecha`,
 1 AS `reposicion_monto`,
 1 AS `idasignarff`,
 1 AS `asignarff_monto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_stock`
--

DROP TABLE IF EXISTS `vs_stock`;
/*!50001 DROP VIEW IF EXISTS `vs_stock`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_stock` AS SELECT 
 1 AS `suc_id`,
 1 AS `suc_descri`,
 1 AS `mat_id`,
 1 AS `mat_descri`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_traslado`
--

DROP TABLE IF EXISTS `vs_traslado`;
/*!50001 DROP VIEW IF EXISTS `vs_traslado`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_traslado` AS SELECT 
 1 AS `rem_id`,
 1 AS `suc_id`,
 1 AS `mat_id`,
 1 AS `det_cant`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vs_usuario`
--

DROP TABLE IF EXISTS `vs_usuario`;
/*!50001 DROP VIEW IF EXISTS `vs_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vs_usuario` AS SELECT 
 1 AS `usu_id`,
 1 AS `usu_login`,
 1 AS `usu_pass`,
 1 AS `usu_rol`,
 1 AS `usu_estado`,
 1 AS `usu_nav`,
 1 AS `usu_disp`,
 1 AS `usu_intento`,
 1 AS `per_id`,
 1 AS `nombre`,
 1 AS `per_ci`,
 1 AS `suc_id`,
 1 AS `suc_descri`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'compras_marce'
--

--
-- Dumping routines for database 'compras_marce'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_aperturaycierre` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aperturaycierre`(in descri varchar(45), in tipo varchar(45),in estado varchar(45),in hora time, in monto int,in montofinal int,idcajas int,in idsucu int,in idusu int)
BEGIN
INSERT INTO `compras_marce`.`aperturaycierre`
(
`aperturaycierre_descripcion`,
`aperturaycierre_tipo`,
`aperturaycierre_estado`,
`aperturaycierre_hora`,
`aperturaycierre_monto`,
`aperturaycierre_montofinal`,
`id_caja`,
`suc_id`,
`usu_id`)
VALUES
(descri,tipo,estado,hora,monto,montofinal,idcajas,idsucu,idusu);





END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_asignarff` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_asignarff`(in fecha date,in monto int,in estado varchar(45),in personal int)
BEGIN
INSERT INTO `compras_marce`.`asignarff`
(
`asignarff_fecha`,
`asignarff_monto`,
`asignarff_estado`,
`per_id`)
VALUES
(fecha,monto,estado,personal);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_compra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_compra`(in suc int, in fecha date,in fact int,
in tipo VARCHAR(15),in cuotas int,in intervalo int,
in estado varchar(15),in monto int, in ord int,in prv int, in usu int)
BEGIN
INSERT INTO compra
(suc_id,com_fecha,com_nrofact,com_tipfact,com_cuotas,com_intervalo,com_estado,com_monto,ord_id,prv_id,usu_id)
VALUES (suc,fecha,fact,tipo,cuotas,intervalo,estado,monto,ord,prv,usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ctapagar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ctapagar`(in nro int, in suc int, in monto int,
in cancuo int, in intervalo int, in fecha date,in mestado varchar(15))
BEGIN
declare vcto date;
declare cant int;
declare mcuota int;
set vcto=fecha;
set cant=1;
set mcuota=monto/cancuo;
while cant<=cancuo do
if intervalo =30 then
select date_add(vcto, interval 1 month) into vcto;
else 
select date_add(vcto, interval intervalo day) into vcto;
end if;
insert into cta_pagar (com_id,suc_id,cuo_nro,cuo_fecha,cuo_monto,cuo_saldo,cuo_estado) values (nro,suc,cant,vcto,mcuota,mcuota,mestado);
set cant=cant+1;
end while;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detcompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detcompra`(in com int, in mat int,in suc int,in cant int, in precio int,in iva5 int,in iva10 int,in exenta int)
BEGIN
INSERT INTO `compras_marce`.`det_compra` (`com_id`,`mat_id`,`suc_id`,`det_cant`,`det_precio`,`det_iva5`,`det_iva10`,`det_exenta`)
VALUES (com,mat,suc,cant,precio,iva5,iva10,exenta);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detnotacredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detnotacredito`(in cre int,in mat int,in suc int,in cant int,in precio int,
in iva5 int,in iva10 int,in exenta int)
BEGIN
insert into det_notacredito (cre_id,mat_id,suc_id,det_cant,det_precio,det_iva5,det_iva10,det_exenta) 
values (cre,mat,suc,cant,precio,iva5,iva10,exenta);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detnotaremision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detnotaremision`(in rem int,in mat int,in cant int)
BEGIN
INSERT INTO `compras`.`det_notaremision`(`rem_id`,`mat_id`,`det_cant`)
VALUES (rem,mat,cant);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detorden` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detorden`(in vord int, in mat int, in cant int, 
in precio int, in subtotal int)
BEGIN
insert into det_ordencompra(ord_id,mat_id,det_cant,det_precio,det_subtotal) values(vord,mat,cant,precio,subtotal);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detpagofactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detpagofactura`(in pagofac int, in cuonro int,in compra int,in suc int)
BEGIN
INSERT INTO compras_marce.det_pagofactura
(idpagosfactura,cuo_nro,com_id,suc_id)
VALUES (pagofac,cuonro,compra,suc);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detpedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detpedido`(in id1 int, in id2 int, in cant int)
BEGIN
insert into det_pedido (ped_id,mat_id,det_cant) values(id1,id2,cant);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_detpresu` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_detpresu`(in ped int,in mat int,in canti int,in precio int,
in iva5 int,in iva10 int,in exenta int)
BEGIN
insert into det_presupuesto (pre_id,mat_id,det_cant,det_precio,det_iva5,det_iva10,det_exenta) 
values (ped,mat,canti,precio,iva5,iva10,exenta);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_librocompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_librocompra`(in com int,in suc int,in ivacinco int,in ivadiez int,in exenta int,
in monto int,in estado varchar(15))
BEGIN
INSERT INTO libro_compra(com_id,suc_id,lib_iva5,lib_iva10,lib_exenta,lib_monto,lib_estado)
VALUES (com,suc,ivacinco,ivadiez,exenta,monto,estado);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_notacredito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_notacredito`(in suc int, in fecha date, in estado varchar(15),
in motivo varchar(45), in monto int, in com int,in prv int, in usu int)
BEGIN
INSERT INTO nota_credito (suc_id,cre_fecha,cre_estado,cre_motivo,cre_monto,com_id,prv_id,usu_id)
VALUES (suc,fecha,estado,motivo,monto,com,prv,usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_notaremision` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_notaremision`(in fecha date, in fechini date, in fechfin date, 
in motivo varchar(45),in estado varchar(15), in per int,in usu int,in veh int)
BEGIN
INSERT INTO nota_remision (rem_fecha,rem_fecini,rem_fecfin,rem_motivo,rem_estado,per_id,usu_id,veh_id) 
values (fecha,fechini,fechfin,motivo,estado,per,usu,veh);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_orden` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_orden`(in fecha date, in estado varchar(15),in vpre int,
in vprov int, in usu int, in suc int)
BEGIN
insert into orden_compra (ord_fecha, ord_estado,pre_id,prv_id,usu_id,suc_id) values 
(fecha, estado, vpre,vprov,usu,suc);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ordenpago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ordenpago`(in estado varchar(45),in fecha date,in fechapago date,in descri varchar(45),in nro int,in importe int,in medio varchar(45),in proveedor int)
BEGIN
INSERT INTO `compras_marce`.`ordenpago`
(
`ordenpago_estado`,
`ordenpago_fecha`,
`ordenpago_fechadepago`,
`ordenpago_descripcion`,
`ordenpago_nro`,
`ordenpago_importe`,
`ordenpago_medio`,
`prv_id`)
VALUES
(estado,fecha,fechapago,descri,nro,importe,medio,proveedor);


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_pago` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pago`(in pagofecha date, in tipo varchar(45),in estado varchar(45),
in fechadepago date,in cuentas int,in compras int)
BEGIN
INSERT INTO compras_marce.pagosfactura
(pagosfactura_fecha,pagosfactura_tipo,pagosfactura_estado,pagosfactura_fechapago,idcuentas_bancarias,com_id)
VALUES (pagofecha,tipo,estado,fechadepago,cuentas,compras);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_pedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pedido`(in fecha date, in estado varchar(15),in suc int, in usu int)
BEGIN
insert into pedido (ped_fecha,ped_estado,suc_id,usu_id) values (fecha,estado,suc,usu);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_presu` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_presu`(in fecha date, in estado varchar(15), in monto int,
in prov int,in ped int,in suc int,in usu int)
BEGIN
insert into presupuesto(pre_fecha,pre_estado,pre_monto,prv_id,ped_id,suc_id,usu_id) 
values (fecha,estado,monto,prov,ped,suc,usu);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_registrocheque` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrocheque`(in estado varchar(45),in fecha date, in fechacobro date,in proveedor int, in cheque int)
BEGIN
INSERT INTO `compras_marce`.`registrocheque`
(
`registrocheque_estado`,
`registrocheque_fecha`,
`registrocheque_fechacobro`,
`prv_id`,
`idcheque`)
VALUES
(estado,fecha,fechacobro,proveedor,cheque);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_remicompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_remicompra`(in rem int,in com int,in suc int)
BEGIN
INSERT INTO `compras`.`remi_compra`(`rem_id`,`com_id`,`suc_id`)
VALUES(rem,com,suc);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_remitraslado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_remitraslado`(in rem int,in suc int)
BEGIN
INSERT INTO `compras`.`remi_traslado` (`rem_id`,`suc_id`) VALUES (rem,suc);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_rendicion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rendicion`(in estado varchar (45), in fecha date,in descripcion varchar(45),in monto int,in reposicion int)
BEGIN
INSERT INTO `compras_marce`.`rendicion`
(
`rendicion_estado`,
`rendicion_fecha`,
`rendicion_descripcion`,
`rendicion_monto`,
`idreposicion`)
VALUES
(estado,fecha,descripcion,monto,reposicion);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update`(in login varchar(80), in pass varchar(100) ,in rol varchar(45),
in estado varchar(15),in intento int,in idper int, in idsuc int, in idusu int)
BEGIN
update usuario set usu_login=login, usu_pass=md5(pass), usu_rol=rol, usu_estado=estado,usu_intento=intento,
per_id=idper, suc_id=idsuc where usu_id=idusu;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_updatestock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updatestock`(in suc int, in mat int, in cant int)
BEGIN
update stock set det_cant=det_cant+cant where suc_id=suc and mat_id=mat;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_update_stockcompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_stockcompra`(in suc int, in mat int,in cant int)
BEGIN
update stock set det_cant=det_cant-cant where suc_id=suc and mat_id=mat;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario`(in login varchar(80), in pass varchar(100), in rol varchar(45), in estado varchar(15), in nav varchar(45), in disp int, intento int, in vperid int, in vsucid int)
BEGIN
insert into usuario (usu_login,usu_pass, usu_rol, usu_estado, usu_nav, usu_disp, usu_intento, per_id, suc_id) values (login,md5(pass),rol,estado,nav,disp,intento,vperid,vsucid);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_vehiculo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehiculo`( in descri varchar(45), in chapa varchar(45))
BEGIN
insert into vehiculo (veh_descri, veh_chapa) values (descri,chapa);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `stock_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_insert`(in suc int, in mat int, in cant int)
BEGIN
insert into stock (suc_id,mat_id,det_cant) values(suc,mat,cant);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vs_ajuste`
--

/*!50001 DROP VIEW IF EXISTS `vs_ajuste`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_ajuste` AS select `a`.`aju_id` AS `aju_id`,`a`.`aju_fecha` AS `aju_fecha`,`a`.`aju_estado` AS `aju_estado`,`a`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri`,`a`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login` from ((`ajuste_stock` `a` left join `sucursal` `s` on((`a`.`suc_id` = `s`.`suc_id`))) left join `usuario` `u` on((`a`.`usu_id` = `u`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_anularstock`
--

/*!50001 DROP VIEW IF EXISTS `vs_anularstock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_anularstock` AS select `remi_traslado`.`suc_id` AS `suc_id`,`det_notaremision`.`mat_id` AS `mat_id`,`det_notaremision`.`det_cant` AS `det_cant` from (`det_notaremision` join `remi_traslado` on((`det_notaremision`.`rem_id` = `remi_traslado`.`rem_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_aperturaycierre`
--

/*!50001 DROP VIEW IF EXISTS `vs_aperturaycierre`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_aperturaycierre` AS select `aperturaycierre`.`idaperturaycierre` AS `idaperturaycierre`,`aperturaycierre`.`aperturaycierre_descripcion` AS `aperturaycierre_descripcion`,`aperturaycierre`.`aperturaycierre_tipo` AS `aperturaycierre_tipo`,`aperturaycierre`.`aperturaycierre_estado` AS `aperturaycierre_estado`,`aperturaycierre`.`aperturaycierre_hora` AS `aperturaycierre_hora`,`aperturaycierre`.`aperturaycierre_monto` AS `aperturaycierre_monto`,`aperturaycierre`.`aperturaycierre_montofinal` AS `aperturaycierre_montofinal`,`aperturaycierre`.`id_caja` AS `id_caja`,`aperturaycierre`.`suc_id` AS `suc_id`,`aperturaycierre`.`usu_id` AS `usu_id`,`caja`.`idcaja` AS `idcaja`,`caja`.`caja_descripcion` AS `caja_descripcion` from (`aperturaycierre` join `caja` on((`aperturaycierre`.`id_caja` = `caja`.`idcaja`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_asignarff`
--

/*!50001 DROP VIEW IF EXISTS `vs_asignarff`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_asignarff` AS select `asignarff`.`idasignarff` AS `idasignarff`,`asignarff`.`asignarff_fecha` AS `asignarff_fecha`,`asignarff`.`asignarff_monto` AS `asignarff_monto`,`asignarff`.`asignarff_estado` AS `asignarff_estado`,`asignarff`.`per_id` AS `per_id`,`personal`.`per_nombre` AS `per_nombre` from (`asignarff` join `personal` on((`asignarff`.`per_id` = `personal`.`per_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_busqueda`
--

/*!50001 DROP VIEW IF EXISTS `vs_busqueda`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_busqueda` AS select `d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant` from (`stock` `d` left join `materia_prima` `m` on((`m`.`mat_id` = `d`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_compra`
--

/*!50001 DROP VIEW IF EXISTS `vs_compra`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_compra` AS select `c`.`com_id` AS `com_id`,`c`.`com_fecha` AS `com_fecha`,`c`.`com_nrofact` AS `com_nrofact`,`c`.`com_tipfact` AS `com_tipfact`,`c`.`com_cuotas` AS `com_cuotas`,`c`.`com_intervalo` AS `com_intervalo`,`c`.`com_estado` AS `com_estado`,`c`.`com_monto` AS `com_monto`,`c`.`ord_id` AS `ord_id`,`c`.`prv_id` AS `prv_id`,`p`.`prv_rasocial` AS `prv_rasocial`,`p`.`prv_ruc` AS `prv_ruc`,`c`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login`,`c`.`suc_id` AS `suc_id` from ((`compra` `c` left join `proveedor` `p` on((`p`.`prv_id` = `c`.`prv_id`))) left join `usuario` `u` on((`u`.`usu_id` = `c`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_ctapagar`
--

/*!50001 DROP VIEW IF EXISTS `vs_ctapagar`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_ctapagar` AS select `ct`.`cuo_nro` AS `cuo_nro`,`ct`.`com_id` AS `com_id`,`c`.`com_nrofact` AS `com_nrofact`,`ct`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri`,`ct`.`cuo_fecha` AS `cuo_fecha`,`ct`.`cuo_monto` AS `cuo_monto`,`ct`.`cuo_saldo` AS `cuo_saldo` from ((`cta_pagar` `ct` left join `compra` `c` on((`c`.`com_id` = `ct`.`com_id`))) left join `sucursal` `s` on((`s`.`suc_id` = `ct`.`suc_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detajuste`
--

/*!50001 DROP VIEW IF EXISTS `vs_detajuste`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detajuste` AS select `d`.`aju_id` AS `aju_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant`,`d`.`det_obs` AS `det_obs`,`d`.`mot_id` AS `mot_id`,`mt`.`mot_descri` AS `mot_descri` from ((`det_ajustestock` `d` left join `materia_prima` `m` on((`d`.`mat_id` = `m`.`mat_id`))) left join `motivo_ajuste` `mt` on((`d`.`mot_id` = `mt`.`mot_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detcompra`
--

/*!50001 DROP VIEW IF EXISTS `vs_detcompra`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detcompra` AS select `d`.`com_id` AS `com_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`suc_id` AS `suc_id`,`d`.`det_cant` AS `det_cant`,`d`.`det_precio` AS `det_precio`,`d`.`det_iva5` AS `det_iva5`,`d`.`det_iva10` AS `det_iva10`,`d`.`det_exenta` AS `det_exenta`,(`d`.`det_precio` * `d`.`det_cant`) AS `subtotal` from (`det_compra` `d` left join `materia_prima` `m` on((`m`.`mat_id` = `d`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detnotac`
--

/*!50001 DROP VIEW IF EXISTS `vs_detnotac`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detnotac` AS select `d`.`cre_id` AS `cre_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant`,`d`.`det_precio` AS `det_precio`,`d`.`det_iva5` AS `det_iva5`,`d`.`det_iva10` AS `det_iva10`,`d`.`det_exenta` AS `det_exenta`,(`d`.`det_precio` * `d`.`det_cant`) AS `subtotal` from (`det_notacredito` `d` left join `materia_prima` `m` on((`m`.`mat_id` = `d`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detnotaremi`
--

/*!50001 DROP VIEW IF EXISTS `vs_detnotaremi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detnotaremi` AS select `d`.`rem_id` AS `rem_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant` from (`det_notaremision` `d` left join `materia_prima` `m` on((`m`.`mat_id` = `d`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detorden`
--

/*!50001 DROP VIEW IF EXISTS `vs_detorden`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detorden` AS select `d`.`ord_id` AS `ord_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant`,`d`.`det_precio` AS `det_precio`,`d`.`det_subtotal` AS `det_subtotal` from ((`det_ordencompra` `d` left join `materia_prima` `m` on((`d`.`mat_id` = `m`.`mat_id`))) left join `orden_compra` `p` on((`d`.`ord_id` = `p`.`ord_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detpedido`
--

/*!50001 DROP VIEW IF EXISTS `vs_detpedido`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detpedido` AS select `d`.`ped_id` AS `ped_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant` from ((`det_pedido` `d` left join `materia_prima` `m` on((`d`.`mat_id` = `m`.`mat_id`))) left join `pedido` `p` on((`d`.`ped_id` = `p`.`ped_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_detpresu`
--

/*!50001 DROP VIEW IF EXISTS `vs_detpresu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_detpresu` AS select `d`.`pre_id` AS `pre_id`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`d`.`det_cant` AS `det_cant`,`d`.`det_precio` AS `det_precio`,`d`.`det_iva5` AS `det_iva5`,`d`.`det_iva10` AS `det_iva10`,`d`.`det_exenta` AS `det_exenta`,(`d`.`det_precio` * `d`.`det_cant`) AS `subtotal` from ((`det_presupuesto` `d` left join `materia_prima` `m` on((`d`.`mat_id` = `m`.`mat_id`))) left join `presupuesto` `p` on((`d`.`pre_id` = `p`.`pre_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_filtrofact`
--

/*!50001 DROP VIEW IF EXISTS `vs_filtrofact`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_filtrofact` AS select `c`.`com_id` AS `com_id`,`c`.`com_nrofact` AS `com_nrofact`,`c`.`prv_id` AS `prv_id`,`p`.`prv_rasocial` AS `prv_rasocial`,`p`.`prv_ruc` AS `prv_ruc`,`d`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri` from (((`compra` `c` left join `proveedor` `p` on((`p`.`prv_id` = `c`.`prv_id`))) left join `det_compra` `d` on((`c`.`com_id` = `d`.`com_id`))) left join `materia_prima` `m` on((`m`.`mat_id` = `d`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_libroc`
--

/*!50001 DROP VIEW IF EXISTS `vs_libroc`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_libroc` AS select `ct`.`lib_id` AS `lib_id`,`ct`.`com_id` AS `com_id`,`c`.`com_nrofact` AS `com_nrofact`,`c`.`com_fecha` AS `com_fecha`,`ct`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri`,`ct`.`lib_iva5` AS `lib_iva5`,`ct`.`lib_iva10` AS `lib_iva10`,`ct`.`lib_exenta` AS `lib_exenta`,`ct`.`lib_monto` AS `lib_monto`,`ct`.`lib_estado` AS `lib_estado` from ((`libro_compra` `ct` left join `compra` `c` on((`c`.`com_id` = `ct`.`com_id`))) left join `sucursal` `s` on((`s`.`suc_id` = `ct`.`suc_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_matprima`
--

/*!50001 DROP VIEW IF EXISTS `vs_matprima`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_matprima` AS select `materia_prima`.`mat_id` AS `mat_id`,`materia_prima`.`mat_descri` AS `mat_descri`,`materia_prima`.`mat_precioc` AS `mat_precioc`,`materia_prima`.`mat_unimed` AS `mat_unimed`,`materia_prima`.`mat_impuesto` AS `mat_impuesto`,`materia_prima`.`cla_id` AS `cla_id`,`clasificacion`.`cla_descri` AS `cla_descri` from (`materia_prima` join `clasificacion`) where (`materia_prima`.`cla_id` = `clasificacion`.`cla_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_notacompra`
--

/*!50001 DROP VIEW IF EXISTS `vs_notacompra`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_notacompra` AS select `cre`.`com_id` AS `com_id`,`c`.`com_nrofact` AS `com_nrofact`,`c`.`com_fecha` AS `com_fecha`,`cre`.`cre_monto` AS `cre_monto`,`cre`.`cre_motivo` AS `cre_motivo`,`cre`.`prv_id` AS `prv_id`,`p`.`prv_rasocial` AS `prv_rasocial`,`cre`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login` from (((`nota_credito` `cre` left join `compra` `c` on((`c`.`com_id` = `cre`.`com_id`))) left join `proveedor` `p` on((`p`.`prv_id` = `cre`.`prv_id`))) left join `usuario` `u` on((`u`.`usu_id` = `cre`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_notacredito`
--

/*!50001 DROP VIEW IF EXISTS `vs_notacredito`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_notacredito` AS select `n`.`cre_id` AS `cre_id`,`n`.`cre_fecha` AS `cre_fecha`,`n`.`cre_estado` AS `cre_estado`,`n`.`cre_motivo` AS `cre_motivo`,`n`.`cre_monto` AS `cre_monto`,`n`.`com_id` AS `com_id`,`c`.`com_nrofact` AS `com_nrofact`,`n`.`prv_id` AS `prv_id`,`p`.`prv_rasocial` AS `prv_rasocial`,`p`.`prv_ruc` AS `prv_ruc`,`n`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri`,`n`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login` from ((((`nota_credito` `n` left join `compra` `c` on((`c`.`com_id` = `n`.`com_id`))) left join `proveedor` `p` on((`p`.`prv_id` = `n`.`prv_id`))) left join `sucursal` `s` on((`s`.`suc_id` = `n`.`suc_id`))) left join `usuario` `u` on((`u`.`usu_id` = `n`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_notaremi`
--

/*!50001 DROP VIEW IF EXISTS `vs_notaremi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_notaremi` AS select `r`.`rem_id` AS `rem_id`,`r`.`rem_fecha` AS `rem_fecha`,`r`.`rem_fecini` AS `rem_fecini`,`r`.`rem_fecfin` AS `rem_fecfin`,`r`.`rem_motivo` AS `rem_motivo`,`r`.`rem_estado` AS `rem_estado`,`r`.`per_id` AS `per_id`,concat(`p`.`per_nombre`,' ',`p`.`per_apelli`) AS `nombre`,`r`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login`,`r`.`veh_id` AS `veh_id`,`v`.`veh_descri` AS `veh_descri`,`v`.`veh_chapa` AS `veh_chapa` from (((`nota_remision` `r` left join `personal` `p` on((`p`.`per_id` = `r`.`per_id`))) left join `usuario` `u` on((`u`.`usu_id` = `r`.`usu_id`))) left join `vehiculo` `v` on((`v`.`veh_id` = `r`.`veh_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_orden`
--

/*!50001 DROP VIEW IF EXISTS `vs_orden`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_orden` AS select `p`.`ord_id` AS `ord_id`,`p`.`ord_fecha` AS `ord_fecha`,`p`.`ord_estado` AS `ord_estado`,`p`.`prv_id` AS `prv_id`,`pr`.`prv_rasocial` AS `prv_rasocial`,`pr`.`prv_ruc` AS `prv_ruc`,`pr`.`prv_direc` AS `prv_direc`,`p`.`pre_id` AS `pre_id`,`p`.`suc_id` AS `suc_id`,`p`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login` from ((`orden_compra` `p` left join `proveedor` `pr` on((`pr`.`prv_id` = `p`.`prv_id`))) left join `usuario` `u` on((`u`.`usu_id` = `p`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_ordenpago`
--

/*!50001 DROP VIEW IF EXISTS `vs_ordenpago`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_ordenpago` AS select `ordenpago`.`idordenpago` AS `idordenpago`,`ordenpago`.`ordenpago_estado` AS `ordenpago_estado`,`ordenpago`.`ordenpago_fecha` AS `ordenpago_fecha`,`ordenpago`.`ordenpago_fechadepago` AS `ordenpago_fechadepago`,`ordenpago`.`ordenpago_descripcion` AS `ordenpago_descripcion`,`ordenpago`.`ordenpago_nro` AS `ordenpago_nro`,`ordenpago`.`ordenpago_importe` AS `ordenpago_importe`,`ordenpago`.`ordenpago_medio` AS `ordenpago_medio`,`ordenpago`.`prv_id` AS `prv_id`,`proveedor`.`prv_rasocial` AS `prv_rasocial` from (`ordenpago` join `proveedor` on((`ordenpago`.`prv_id` = `proveedor`.`prv_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_pagofactura`
--

/*!50001 DROP VIEW IF EXISTS `vs_pagofactura`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_pagofactura` AS select `pagosfactura`.`idpagosfactura` AS `idpagosfactura`,`pagosfactura`.`pagosfactura_fecha` AS `pagosfactura_fecha`,`pagosfactura`.`pagosfactura_tipo` AS `pagosfactura_tipo`,`pagosfactura`.`pagosfactura_estado` AS `pagosfactura_estado`,`pagosfactura`.`pagosfactura_fechapago` AS `pagosfactura_fechapago`,`pagosfactura`.`idcuentas_bancarias` AS `idcuentas_bancarias`,`pagosfactura`.`com_id` AS `com_id`,`cuentas_bancarias`.`cuentas_bancarias_saldo` AS `saldo`,`compra`.`com_nrofact` AS `com_nrofact` from ((`pagosfactura` left join `cuentas_bancarias` on((`pagosfactura`.`idcuentas_bancarias` = `cuentas_bancarias`.`idcuentas_bancarias`))) join `compra` on((`pagosfactura`.`com_id` = `compra`.`com_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_pedido`
--

/*!50001 DROP VIEW IF EXISTS `vs_pedido`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_pedido` AS select `p`.`ped_id` AS `ped_id`,`p`.`ped_fecha` AS `ped_fecha`,`p`.`ped_estado` AS `ped_estado`,`p`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri`,`p`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login` from ((`pedido` `p` left join `sucursal` `s` on((`p`.`suc_id` = `s`.`suc_id`))) left join `usuario` `u` on((`p`.`usu_id` = `u`.`usu_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_presu`
--

/*!50001 DROP VIEW IF EXISTS `vs_presu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_presu` AS select `p`.`pre_id` AS `pre_id`,`p`.`pre_fecha` AS `pre_fecha`,`p`.`pre_estado` AS `pre_estado`,`p`.`pre_monto` AS `pre_monto`,`p`.`prv_id` AS `prv_id`,`pr`.`prv_rasocial` AS `prv_rasocial`,`pr`.`prv_ruc` AS `prv_ruc`,`pr`.`prv_direc` AS `prv_direc`,`p`.`ped_id` AS `ped_id`,`p`.`suc_id` AS `suc_id`,`p`.`usu_id` AS `usu_id` from (`presupuesto` `p` left join `proveedor` `pr` on((`pr`.`prv_id` = `p`.`prv_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_registrocheque`
--

/*!50001 DROP VIEW IF EXISTS `vs_registrocheque`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_registrocheque` AS select `registrocheque`.`idregistrocheque` AS `idregistrocheque`,`registrocheque`.`registrocheque_estado` AS `registrocheque_estado`,`registrocheque`.`registrocheque_fecha` AS `registrocheque_fecha`,`registrocheque`.`registrocheque_fechacobro` AS `registrocheque_fechacobro`,`registrocheque`.`prv_id` AS `prv_id`,`registrocheque`.`idcheque` AS `idcheque`,`proveedor`.`prv_rasocial` AS `prv_rasocial`,`cheque`.`chequenro` AS `chequenro` from ((`registrocheque` join `proveedor` on((`registrocheque`.`prv_id` = `proveedor`.`prv_id`))) join `cheque` on((`registrocheque`.`idcheque` = `cheque`.`idcheque`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_rendicion`
--

/*!50001 DROP VIEW IF EXISTS `vs_rendicion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_rendicion` AS select `rendicion`.`idrendicion` AS `idrendicion`,`rendicion`.`rendicion_estado` AS `rendicion_estado`,`rendicion`.`rendicion_fecha` AS `rendicion_fecha`,`rendicion`.`rendicion_descripcion` AS `rendicion_descripcion`,`rendicion`.`rendicion_monto` AS `rendicion_monto`,`rendicion`.`idreposicion` AS `idreposicion`,`reposicion`.`reposicion_monto` AS `reposicion_monto` from (`rendicion` join `reposicion` on((`rendicion`.`idreposicion` = `reposicion`.`idreposicion`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_reposicion`
--

/*!50001 DROP VIEW IF EXISTS `vs_reposicion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_reposicion` AS select `reposicion`.`idreposicion` AS `idreposicion`,`reposicion`.`reposicion_estado` AS `reposicion_estado`,`reposicion`.`reposicion_fecha` AS `reposicion_fecha`,`reposicion`.`reposicion_monto` AS `reposicion_monto`,`reposicion`.`idasignarff` AS `idasignarff`,`asignarff`.`asignarff_monto` AS `asignarff_monto` from (`reposicion` join `asignarff` on((`reposicion`.`idasignarff` = `asignarff`.`idasignarff`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_stock`
--

/*!50001 DROP VIEW IF EXISTS `vs_stock`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_stock` AS select `s`.`suc_id` AS `suc_id`,`su`.`suc_descri` AS `suc_descri`,`s`.`mat_id` AS `mat_id`,`m`.`mat_descri` AS `mat_descri`,`s`.`det_cant` AS `det_cant` from ((`stock` `s` left join `sucursal` `su` on((`su`.`suc_id` = `s`.`suc_id`))) left join `materia_prima` `m` on((`m`.`mat_id` = `s`.`mat_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_traslado`
--

/*!50001 DROP VIEW IF EXISTS `vs_traslado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_traslado` AS select `r`.`rem_id` AS `rem_id`,`s`.`suc_id` AS `suc_id`,`r`.`mat_id` AS `mat_id`,`r`.`det_cant` AS `det_cant` from (`det_notaremision` `r` join `remi_traslado` `s` on((`s`.`rem_id` = `r`.`rem_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vs_usuario`
--

/*!50001 DROP VIEW IF EXISTS `vs_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vs_usuario` AS select `u`.`usu_id` AS `usu_id`,`u`.`usu_login` AS `usu_login`,`u`.`usu_pass` AS `usu_pass`,`u`.`usu_rol` AS `usu_rol`,`u`.`usu_estado` AS `usu_estado`,`u`.`usu_nav` AS `usu_nav`,`u`.`usu_disp` AS `usu_disp`,`u`.`usu_intento` AS `usu_intento`,`u`.`per_id` AS `per_id`,concat(`p`.`per_nombre`,' ',`p`.`per_apelli`) AS `nombre`,`p`.`per_ci` AS `per_ci`,`u`.`suc_id` AS `suc_id`,`s`.`suc_descri` AS `suc_descri` from ((`usuario` `u` left join `personal` `p` on((`u`.`per_id` = `p`.`per_id`))) left join `sucursal` `s` on((`u`.`suc_id` = `s`.`suc_id`))) */;
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

-- Dump completed on 2023-11-07 23:40:45
