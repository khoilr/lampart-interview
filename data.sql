-- MySQL dump 10.13  Distrib 8.0.28, for macos12.2 (arm64)
--
-- Host: localhost    Database: lampart
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Apple'),(2,'Asus'),(3,'Google'),(4,'Honor'),(5,'Huawei'),(6,'LG'),(7,'Motorola'),(8,'OnePlus'),(9,'Oppo'),(10,'Realme'),(11,'Samsung'),(12,'Sony'),(13,'TCL'),(14,'Vivo'),(15,'Xiaomi'),(16,'ZTE');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `category` bigint NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` decimal(5,1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Huawei P50 Pro',5,'0.jpeg',907.0),(2,'Xiaomi Mi 11 Ultra',15,'1.jpeg',1200.0),(3,'Huawei Mate 40 Pro+',5,'2.jpeg',1363.0),(4,'Apple iPhone 13 Pro Max',1,'3.jpeg',1099.0),(5,'Apple iPhone 13 Pro',1,'4.jpeg',999.0),(6,'Huawei Mate 40 Pro',5,'5.jpeg',1199.0),(7,'Google Pixel 6 Pro',3,'6.jpeg',899.0),(8,'Vivo X70 Pro+',14,'7.jpeg',833.0),(9,'Asus Smartphone for Snapdragon Insiders',2,'8.jpeg',1499.0),(10,'Xiaomi Mi 10 Ultra',15,'9.jpeg',803.0),(11,'Google Pixel 6',3,'10.jpeg',599.0),(12,'Huawei P40 Pro',5,'11.jpeg',1099.0),(13,'Oppo Find X3 Pro',9,'12.jpeg',1149.0),(14,'Vivo X70 Pro (MediaTek)',14,'13.jpeg',651.0),(15,'Vivo X50 Pro+',14,'14.jpeg',757.0),(16,'Apple iPhone 13',1,'15.jpeg',799.0),(17,'Apple iPhone 13 mini',1,'16.jpeg',699.0),(18,'Apple iPhone 12 Pro Max',1,'17.jpeg',1099.0),(19,'Apple iPhone 12 Pro',1,'18.jpeg',999.0),(20,'Vivo X60 Pro+',14,'19.jpeg',757.0),(21,'Xiaomi Mi 10 Pro',15,'20.jpeg',999.0),(22,'Oppo Find X2 Pro',9,'21.jpeg',1199.0),(23,'Samsung Galaxy S20 Ultra 5G (Exynos)',11,'22.jpeg',1359.0),(24,'Honor 30 Pro+',4,'23.jpeg',757.0),(25,'Apple iPhone 11 Pro Max',1,'24.jpeg',1099.0),(26,'OnePlus 9 Pro',8,'25.jpeg',969.0),(27,'Samsung Galaxy Z Fold3 5G',11,'26.jpeg',1799.0),(28,'Huawei Mate 30 Pro 5G',5,'27.jpeg',1045.0),(29,'Samsung Galaxy S21 Ultra 5G (Snapdragon)',11,'28.jpeg',1199.0),(30,'Apple iPhone 12 mini',1,'29.jpeg',699.0),(31,'Apple iPhone 12',1,'30.jpeg',799.0),(32,'Honor V30 Pro',4,'31.jpeg',590.0),(33,'Huawei Mate 30 Pro',5,'32.jpeg',1099.0),(34,'Oppo Reno6 Pro 5G',9,'33.jpeg',799.0),(35,'Oppo Reno6 Pro+',9,'34.jpeg',606.0),(36,'Samsung Galaxy S21 Ultra 5G (Exynos)',11,'35.jpeg',1259.0),(37,'Xiaomi Mi CC9 Pro Premium Edition',15,'36.jpeg',530.0),(38,'Asus Zenfone 8',2,'37.jpeg',629.0),(39,'Google Pixel 5',3,'38.jpeg',699.0),(40,'Samsung Galaxy S21 FE 5G (Snapdragon)',11,'39.jpeg',699.0),(41,'Samsung Galaxy Note20 (Exynos)',11,'40.jpeg',959.0),(42,'Samsung Galaxy Note20 Ultra 5G (Exynos)',11,'41.jpeg',1309.0),(43,'Vivo X60 Pro 5G (Snapdragon)',14,'42.jpeg',799.0),(44,'Xiaomi Mi 11',15,'43.jpeg',799.0),(45,'Xiaomi Redmi K30 Pro Zoom Edition',15,'44.jpeg',575.0),(46,'Apple iPhone 11',1,'45.jpeg',699.0),(47,'Samsung Galaxy S21+ 5G (Snapdragon)',11,'46.jpeg',999.0),(48,'Samsung Galaxy S21 5G (Snapdragon)',11,'47.jpeg',799.0),(49,'Asus Zenfone 8 Flip',2,'48.jpeg',799.0),(50,'OnePlus 8 Pro',8,'49.jpeg',899.0),(51,'Samsung Galaxy S20+ (Exynos)',11,'50.jpeg',1009.0),(52,'Vivo X60 Pro 5G (Exynos)',14,'51.jpeg',799.0),(53,'Xiaomi Mi 10T Pro 5G',15,'52.jpeg',599.0),(54,'Motorola Edge+',7,'53.jpeg',999.0),(55,'Samsung Galaxy Note20 Ultra 5G (Snapdragon)',11,'54.jpeg',1299.0),(56,'Samsung Galaxy Note 10+ (Exynos)',11,'55.jpeg',1109.0),(57,'TCL 20 Pro 5G',13,'56.jpeg',549.0),(58,'Xiaomi 11T Pro',15,'57.jpeg',699.0),(59,'Huawei P30 Pro',5,'58.jpeg',999.0),(60,'OnePlus Nord 2 5G',8,'59.jpeg',399.0),(61,'Samsung Galaxy S21 5G (Exynos)',11,'60.jpeg',859.0),(62,'Samsung Galaxy S21+ 5G (Exynos)',11,'61.jpeg',1059.0),(63,'Samsung Galaxy Note 10+ 5G (Exynos)',11,'62.jpeg',1199.0),(64,'Samsung Galaxy S10 5G (Exynos)',11,'63.jpeg',1199.0),(65,'Asus ZenFone 7 Pro',2,'64.jpeg',799.0),(66,'OnePlus 9',8,'65.jpeg',729.0),(67,'Oppo Find X3 Neo',9,'66.jpeg',799.0),(68,'Oppo Reno 10x Zoom',9,'67.jpeg',799.0),(69,'Samsung Galaxy S20 FE (Exynos)',11,'68.jpeg',659.0),(70,'Sony Xperia 1 III',12,'69.jpeg',1299.0),(71,'OnePlus 7T Pro',8,'70.jpeg',759.0),(72,'OnePlus 7 Pro',8,'71.jpeg',669.0),(73,'Vivo X51 5G',14,'72.jpeg',799.0),(74,'Google Pixel 4',3,'73.jpeg',799.0),(75,'Honor 20 Pro',4,'74.jpeg',599.0),(76,'Samsung Galaxy S10+ (Exynos)',11,'75.jpeg',1009.0),(77,'Huawei P40',5,'76.jpeg',799.0),(78,'Huawei Mate 20 Pro',5,'77.jpeg',999.0),(79,'Oppo Reno5 Pro+ 5G',9,'78.jpeg',605.0),(80,'Samsung Galaxy Note20 (Snapdragon)',11,'79.jpeg',999.0),(81,'Sony Xperia 1 II',12,'80.jpeg',1199.0),(82,'Google Pixel 4a',3,'81.jpeg',349.0),(83,'Huawei Mate 20 X',5,'82.jpeg',899.0),(84,'OnePlus 8T',8,'83.jpeg',599.0),(85,'Sony Xperia 5 II',12,'84.jpeg',949.0),(86,'Xiaomi Mi 11i',15,'85.jpeg',699.0),(87,'Xiaomi Mi 11 Lite 5G',15,'86.jpeg',399.0),(88,'LG Wing',6,'87.jpeg',999.0),(89,'Xiaomi Mi 9',15,'88.jpeg',469.0),(90,'Huawei P20 Pro',5,'89.jpeg',899.0),(91,'Samsung Galaxy Z Fold2 5G',11,'90.jpeg',1999.0),(92,'OnePlus Nord',8,'91.jpeg',399.0),(93,'Oppo A94 5G',9,'92.jpeg',359.0),(94,'Oppo Reno4 Pro 5G',9,'93.jpeg',799.0),(95,'Xiaomi 11T',15,'94.jpeg',499.0),(96,'Xiaomi Redmi K40 Pro+',15,'95.jpeg',560.0),(97,'Oppo Reno6 5G',9,'96.jpeg',499.0),(98,'ZTE Axon 30 Ultra',16,'97.jpeg',749.0),(99,'Apple iPhone XS Max',1,'98.jpeg',1099.0),(100,'Realme GT Neo 2 5G',10,'99.jpeg',469.0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-17 14:35:33
