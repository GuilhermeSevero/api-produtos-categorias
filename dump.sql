-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: produtos-categorias
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Current Database: `produtos-categorias`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `produtos-categorias` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `produtos-categorias`;

--
-- Table structure for table `tb_categoria_produto`
--

DROP TABLE IF EXISTS `tb_categoria_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_categoria_produto` (
  `id_categoria_produto_planejamento` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria_produto_planejamento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria_produto`
--

LOCK TABLES `tb_categoria_produto` WRITE;
/*!40000 ALTER TABLE `tb_categoria_produto` DISABLE KEYS */;
INSERT INTO `tb_categoria_produto` VALUES (1,'Açougue'),(2,'Bazar'),(3,'Futeira');
/*!40000 ALTER TABLE `tb_categoria_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_produto` (
  `id_produto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_categoria_produto` bigint(20) unsigned NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nome_produto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_produto` float(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id_produto`),
  KEY `IXFK_tb_produto_tb_categoria_produto` (`id_categoria_produto`),
  CONSTRAINT `IXFK_tb_produto_tb_categoria_produto` FOREIGN KEY (`id_categoria_produto`) REFERENCES `tb_categoria_produto` (`id_categoria_produto_planejamento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela de Produtos	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (9,2,'2020-04-06 04:56:38','Brinquedo',90.90),(10,1,'2020-04-06 04:56:59','Carne de Primeira',45.50),(11,3,'2020-04-06 04:57:19','Banana',2.50),(12,2,'2020-04-06 04:57:41','Thor',79.90);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-06  5:00:10
