-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: redsocial
-- ------------------------------------------------------
-- Server version	9.6.0
--
-- Table structure for table `gallery`
--
SET FOREIGN_KEY_CHECKS = 0;


DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `content` text,
  `posted_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publication_user` (`user_id`),
  CONSTRAINT `fk_publication_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
INSERT INTO `publication` VALUES (1,1,'¡Hola a todos! Esta es mi primera publicación.','2026-04-30 02:37:48',NULL),(2,2,'Probando el funcionamiento del panel!','2026-04-30 02:37:48',NULL),(4,NULL,'¡Les comparto mi trabajo más reciente!','2026-05-16 03:27:46',NULL),(5,NULL,'daedaed','2026-05-16 03:36:33',NULL),(6,NULL,'deded','2026-05-16 03:36:41',NULL),(7,NULL,'edede','2026-05-16 03:36:46',NULL),(8,1,'ssss','2026-05-16 03:42:13',NULL),(10,1,'Mapa conceptual','2026-05-16 03:42:49','1778902969_37c56accb6903caadc9d.png'),(11,4,'Publicacion de prueba del administrador','2026-05-23 10:51:10',NULL);
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Oswaldo Dominguez','oswaldo_d','pass12345','user'),(2,'Usuario Prueba','test_user','67890','user'),(3,'Maria Perez','maria','12345','user'),(4,'Administrador del Sistema','admin','admin123','admin'),(5,'Jose Perez','oswaldo_admin','oswaldo','user'),(6,'luis mendoza','luismendoza','luismendoza','user'),(7,'Pepe pecas','pepe.pecas','pepepecas','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

ALTER TABLE publication ADD visibility ENUM('public', 'private') DEFAULT 'public';
--
SET FOREIGN_KEY_CHECKS = 1;
--

-- Dump completed on 2026-05-23  5:45:44
