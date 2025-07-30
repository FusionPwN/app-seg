-- MariaDB dump 10.19  Distrib 10.10.2-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: dev_tangente
-- ------------------------------------------------------
-- Server version	10.10.2-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nid` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_nid_unique` (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES
(1,'24.C1000','teste','teste','123123123',NULL,NULL,NULL),
(3,'24.C1001','Hugo Pires','asdasd@gmail.com','910743504',NULL,'2024-06-11 22:24:52','2024-06-11 22:24:52');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `nid` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'open',
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leads_nid_unique` (`nid`),
  KEY `leads_client_id_foreign` (`client_id`),
  CONSTRAINT `leads_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES
(1,1,'24.L1000','open','teste','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ante ut neque vehicula, sit amet hendrerit augue pharetra. Nullam ipsum mi, volutpat id ipsum sed, auctor bibendum magna. Nulla malesuada nibh in gravida fringilla. Praesent id nunc a purus faucibus cursus. Integer purus lectus, elementum a fermentum id, dignissim eu turpis. Etiam placerat tortor a nisl pretium, tempus pellentesque velit ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam at lorem finibus, tincidunt erat eu, efficitur purus. Quisque quis semper magna. Vestibulum sollicitudin nisi arcu, eu sagittis ipsum egestas quis. Aliquam placerat sapien arcu, eu iaculis purus pulvinar id. In pulvinar neque erat, vitae cursus purus euismod in. Pellentesque dapibus justo in dui aliquam condimentum. Aenean ac laoreet enim. Aliquam nec quam ac enim tincidunt bibendum nec a massa.  In scelerisque fringilla leo ac semper. Nunc venenatis mi eu nulla tempor, in imperdiet est egestas. Nullam fermentum metus et arcu laoreet, vitae rutrum erat cursus. Ut placerat velit semper, auctor ligula sit amet, vestibulum ex. Fusce sit amet posuere purus. Proin consectetur laoreet urna vel semper. Nulla sed laoreet nulla.  Sed imperdiet magna at est euismod, a rutrum est bibendum. Ut egestas consequat urna et lobortis. Morbi blandit, augue sit amet eleifend maximus, metus felis efficitur erat, sit amet molestie tortor nisl vel justo. In nunc metus, vestibulum ac volutpat sed, tristique ac urna. Duis venenatis turpis nec venenatis posuere. Aliquam finibus sapien leo, eu placerat erat pharetra ac. In dignissim ultricies felis sit amet sagittis. Duis in metus ante. Etiam tincidunt ac justo eu ultrices. Curabitur volutpat arcu sit amet lacinia egestas. Duis aliquam enim maximus, consequat mi eu, aliquet nisl. Donec ac dui non nibh varius posuere in nec dolor. Donec euismod ut odio a bibendum. Quisque et auctor purus, et sagittis purus. Vestibulum id tellus non magna pellentesque blandit. Aliquam viverra sodales massa convallis cursus.  Quisque id facilisis mi, nec viverra lorem. Etiam a accumsan massa. Nullam varius leo vitae neque faucibus, eget tempus neque posuere. Phasellus consequat nulla id ante vehicula vehicula vel non tortor. Maecenas ut dignissim leo. Curabitur at pellentesque lectus, in venenatis sapien. Integer sit amet mi dolor.  Suspendisse tincidunt tristique euismod. Ut sollicitudin rhoncus justo, at commodo nunc tempor eget. Praesent in magna nec mauris iaculis dapibus. Nunc varius sodales gravida. In accumsan eget tellus eget bibendum. Duis eget interdum orci. Sed mattis malesuada pharetra. Pellentesque viverra vel lectus eget posuere. Nulla mattis arcu non mauris tempor malesuada. Maecenas ac viverra enim, quis placerat enim. Nam ac est nec diam bibendum vestibulum tempus in erat. Sed mollis libero eu enim sodales porttitor. Donec vitae risus nec sapien pulvinar rhoncus in quis ante.  Sed fermentum vestibulum massa, feugiat egestas nisl pharetra non. Maecenas risus urna, aliquet sed turpis eu, fringilla posuere nunc. Ut sed erat sed elit maximus pulvinar vitae a massa. Quisque varius orci urna, sed cursus lectus faucibus in. Praesent nec velit ultricies, laoreet purus quis, iaculis leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut cursus, lectus quis rhoncus commodo, velit libero sagittis ex, eu dapibus quam massa non ante. Mauris viverra ultricies leo ut efficitur.  Nullam ut dolor in tellus dapibus sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus ac tempor erat. Vivamus viverra enim sed libero porttitor, eget porttitor eros cursus. Integer ac tortor velit. Quisque sed turpis sagittis, faucibus nisi a, iaculis massa. Etiam sed mi vel dui tristique sodales. Duis et tincidunt libero.  Nunc malesuada velit diam, quis malesuada nulla lacinia semper. Curabitur nibh arcu, lobortis et leo sit amet, sollicitudin volutpat dui. In scelerisque, tortor nec euismod ultricies, sapien arcu vehicula nisl, eget posuere nulla felis eu odio. Nulla lacinia nunc eu mauris tempus molestie. Sed sagittis elit augue, vitae malesuada purus porttitor in. Phasellus non imperdiet leo. Etiam ante metus, consequat in est ac, finibus cursus ipsum. Mauris quis blandit diam, et fringilla felis. Duis arcu nulla, egestas ac justo a, rhoncus sagittis mauris. In egestas facilisis diam, eu facilisis lectus vestibulum quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent elementum at enim ut aliquet. Ut lectus leo, mollis vitae neque ut, tempus ultrices nulla.  Curabitur eu rutrum massa, eget tristique dolor. Pellentesque sagittis leo diam. Sed et eleifend justo. In egestas tellus ut dui cursus egestas. Proin posuere ultricies augue sagittis placerat. Nullam auctor urna erat, a ornare nulla fermentum vel. Aliquam vulputate erat ac ante imperdiet, a molestie dolor tempus. Phasellus vitae magna ligula. Duis gravida id nunc eu pretium. Praesent pulvinar purus in lacus vehicula commodo. Sed leo tortor, fermentum a pretium sed, gravida nec turpis. Aenean semper massa sed mollis mollis. Integer vel turpis id nulla faucibus auctor posuere a elit. Integer molestie lectus at nisi auctor tristique. Pellentesque quis mauris nec lacus tempus dictum in ac mauris.  Pellentesque bibendum nisl arcu. Pellentesque tempus vitae ipsum ut suscipit. Etiam semper congue ipsum sit amet tincidunt. Integer leo urna, ornare sit amet maximus vel, placerat ac erat. Integer at feugiat est. Fusce dignissim ullamcorper nisi eget tincidunt. Aenean ornare nibh quis nisi porttitor posuere. Duis euismod luctus nulla, at euismod ex congue quis. Ut vel consequat nibh. Curabitur eget blandit lorem. Donec eget dictum justo. Phasellus non porta arcu. Curabitur feugiat pharetra arcu at convallis. Nulla tempor tortor ut nisi vulputate gravida. Duis non dolor ac sapien ultrices mattis et et ligula. Mauris orci turpis, malesuada at consectetur vel, sodales quis ex.  Integer non lectus turpis. Nam commodo arcu convallis sem euismod porttitor. In suscipit fermentum elit sit amet elementum. Vestibulum et maximus odio, sit amet auctor tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at aliquet risus. Aenean at augue consectetur, semper augue sed, finibus arcu. Proin viverra gravida magna a facilisis. Curabitur tellus tortor, fringilla vitae justo ac, porta vestibulum tortor. Cras ut suscipit augue, sit amet suscipit nibh. Sed ut nibh nec nunc facilisis ultricies. Fusce sodales risus vel mauris molestie, sit amet rutrum magna tempus. Sed tempus, orci in porttitor tincidunt, quam ex venenatis felis, quis sagittis mi ligula ac sem. Integer congue lectus id fermentum tincidunt. Phasellus et nibh vitae massa dapibus bibendum et sit amet tellus. Aliquam facilisis eros elit, non tempus augue mattis vel.  Cras venenatis ultricies ante sed accumsan. Nam vehicula eget nulla sed finibus. Nunc pellentesque urna in luctus elementum. Aenean vel iaculis sem. Fusce et faucibus leo, vitae sollicitudin nunc. Curabitur tincidunt, ex sed mattis facilisis, sem massa vestibulum libero, vel laoreet sapien ex quis justo. Praesent rhoncus ultricies convallis. Proin sit amet lobortis turpis. In hac habitasse platea dictumst. Etiam vel leo elementum, ullamcorper elit lobortis, bibendum ipsum.  Duis malesuada semper elit, non fringilla leo fermentum et. Morbi eu aliquet massa. Aliquam non ante diam. Phasellus dui purus, egestas at laoreet non, viverra a libero. Nullam ut facilisis felis, ac interdum lorem. Nullam vitae ipsum et augue ultricies mattis. Vivamus arcu nisi, semper quis nibh a, finibus eleifend lectus. Morbi mauris neque, consequat at ante consequat, ultrices auctor nibh. Nam commodo mollis tincidunt. Integer in sollicitudin mauris.  Nam eget lacus vestibulum, scelerisque nisi eu, dignissim risus. Aliquam erat volutpat. Donec a facilisis metus. Morbi elementum tincidunt mauris, ut porttitor ex dapibus vel. Curabitur in gravida diam. Etiam velit tellus, suscipit ac leo ac, sagittis iaculis ipsum. Nullam tellus ex, placerat ac feugiat eget, pretium vitae est. In ac volutpat diam. Phasellus fermentum scelerisque porta. Nunc ullamcorper faucibus dictum. Maecenas quam nisi, pharetra et porttitor eu, dignissim eu dui. Etiam dapibus ligula sapien, sed vehicula turpis lacinia nec. Nam semper euismod massa, et facilisis libero dignissim id. Phasellus elit mauris, varius eu placerat eget, faucibus cursus libero. Morbi pretium ultricies blandit. Nam laoreet erat sit amet velit feugiat cursus.  Praesent commodo lacus sed ante feugiat, in dignissim erat maximus. Maecenas facilisis dui ex, facilisis imperdiet lorem finibus eu. Mauris venenatis velit vel odio tempor sagittis. Quisque et dui neque. Phasellus vitae mi sit amet ex placerat sagittis eu sit amet orci. Vestibulum cursus lorem semper ligula eleifend sodales. Maecenas at bibendum ante. Aenean neque nisl, egestas a purus ut, efficitur semper neque. Donec id pretium velit. In tempus euismod tristique. Etiam vitae sapien nisi. Sed sed malesuada odio. Donec vitae ex nec nisl mollis molestie at eu lectus.  Curabitur consectetur vel leo quis tincidunt. Nam ut turpis lectus. Duis et dolor dignissim enim sagittis bibendum. Aenean interdum ante enim, et pharetra mauris pellentesque vitae. Nunc et blandit orci. Vivamus lacinia mattis rutrum. Quisque vitae felis nec est imperdiet tincidunt vitae at leo. Vivamus auctor leo vitae diam interdum, ut dignissim felis luctus. Vivamus tempor ultricies eleifend. Sed dignissim nibh quis vestibulum bibendum. Vivamus porttitor lectus a est maximus, et varius arcu pretium. Suspendisse libero sem, tempus placerat nisi in, sagittis ultricies urna. Sed eget leo et magna malesuada rutrum quis nec elit. Pellentesque sit amet mi nec velit vehicula posuere. Sed ornare, lacus eu faucibus vestibulum, arcu erat facilisis magna, nec eleifend magna augue et augue.','2024-05-05 23:00:00','2024-05-05 23:00:00'),
(2,1,'24.L1001','open','teste 3333gggg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt ante ut neque vehicula, sit amet hendrerit augue pharetra. Nullam ipsum mi, volutpat id ipsum sed, auctor bibendum magna. Nulla malesuada nibh in gravida fringilla. Praesent id nunc a purus faucibus cursus. Integer purus lectus, elementum a fermentum id, dignissim eu turpis. Etiam placerat tortor a nisl pretium, tempus pellentesque velit ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam at lorem finibus, tincidunt erat eu, efficitur purus. Quisque quis semper magna. Vestibulum sollicitudin nisi arcu, eu sagittis ipsum egestas quis. Aliquam placerat sapien arcu, eu iaculis purus pulvinar id. In pulvinar neque erat, vitae cursus purus euismod in. Pellentesque dapibus justo in dui aliquam condimentum. Aenean ac laoreet enim. Aliquam nec quam ac enim tincidunt bibendum nec a massa.  In scelerisque fringilla leo ac semper. Nunc venenatis mi eu nulla tempor, in imperdiet est egestas. Nullam fermentum metus et arcu laoreet, vitae rutrum erat cursus. Ut placerat velit semper, auctor ligula sit amet, vestibulum ex. Fusce sit amet posuere purus. Proin consectetur laoreet urna vel semper. Nulla sed laoreet nulla.  Sed imperdiet magna at est euismod, a rutrum est bibendum. Ut egestas consequat urna et lobortis. Morbi blandit, augue sit amet eleifend maximus, metus felis efficitur erat, sit amet molestie tortor nisl vel justo. In nunc metus, vestibulum ac volutpat sed, tristique ac urna. Duis venenatis turpis nec venenatis posuere. Aliquam finibus sapien leo, eu placerat erat pharetra ac. In dignissim ultricies felis sit amet sagittis. Duis in metus ante. Etiam tincidunt ac justo eu ultrices. Curabitur volutpat arcu sit amet lacinia egestas. Duis aliquam enim maximus, consequat mi eu, aliquet nisl. Donec ac dui non nibh varius posuere in nec dolor. Donec euismod ut odio a bibendum. Quisque et auctor purus, et sagittis purus. Vestibulum id tellus non magna pellentesque blandit. Aliquam viverra sodales massa convallis cursus.','2024-05-06 00:00:00','2024-06-07 17:19:42'),
(3,3,'24.L1002','open','teste 123a',NULL,'2024-06-11 22:44:18','2024-06-11 22:44:18'),
(4,3,'L24.1003','open','fsdfgsdfgsdfg',NULL,'2024-06-13 18:29:19','2024-06-13 18:29:19'),
(5,3,'L24.1004','open','ghgdghhhhh',NULL,'2024-06-21 10:08:00','2024-06-21 10:08:00'),
(6,3,'L24.1005','open','te3st',NULL,'2024-07-30 09:39:27','2024-07-30 09:39:27'),
(7,3,'L24.1006','open','teste','asdfasdf','2024-09-16 17:48:16','2024-09-16 18:00:47'),
(8,3,'L24.1007','open','adadadad','adadad','2024-09-16 18:29:48','2024-09-16 18:29:48'),
(9,3,'SLP2024.0009','open','afafaafafaf',NULL,'2024-10-17 18:34:46','2024-10-17 18:34:46'),
(10,3,'SLP2024.0010','open','ttttttttttttttttaa',NULL,'2024-10-17 18:35:37','2024-10-17 18:35:58'),
(11,3,'SLP2024.3333011','open','afdasdfasdfasdf',NULL,'2024-10-17 18:37:14','2024-10-17 18:37:14'),
(12,3,'SLP2024.33012','open','asdfasfd',NULL,'2024-10-17 18:38:14','2024-10-17 18:38:14');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;

--
-- Table structure for table `linkables`
--

DROP TABLE IF EXISTS `linkables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linkables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint(20) unsigned NOT NULL,
  `linkable_type` varchar(255) NOT NULL,
  `linkable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `linkables_section_id_foreign` (`section_id`),
  KEY `linkables_linkable_type_linkable_id_index` (`linkable_type`,`linkable_id`),
  CONSTRAINT `linkables_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linkables`
--

/*!40000 ALTER TABLE `linkables` DISABLE KEYS */;
INSERT INTO `linkables` VALUES
(1,31,'service',5,NULL,NULL),
(5,35,'service',5,NULL,NULL),
(6,36,'service',5,NULL,NULL),
(7,37,'service',5,NULL,NULL),
(9,39,'service',5,NULL,NULL),
(10,40,'service',5,NULL,NULL),
(11,41,'service',5,NULL,NULL),
(12,42,'service',5,NULL,NULL),
(17,43,'service',7,NULL,NULL),
(22,44,'service',7,NULL,NULL),
(24,46,'service',10,NULL,NULL),
(27,47,'section',46,NULL,NULL),
(28,48,'section',47,NULL,NULL),
(31,50,'section',49,NULL,NULL),
(34,49,'section',48,NULL,NULL),
(35,51,'section',50,NULL,NULL),
(36,52,'section',51,NULL,NULL),
(37,53,'service',11,NULL,NULL),
(38,54,'service',11,NULL,NULL),
(39,55,'service',11,NULL,NULL),
(43,56,'section',55,NULL,NULL),
(44,57,'section',56,NULL,NULL),
(45,58,'section',57,NULL,NULL),
(46,59,'service',12,NULL,NULL),
(47,60,'service',12,NULL,NULL),
(48,61,'section',60,NULL,NULL),
(49,62,'section',61,NULL,NULL),
(50,63,'service',13,NULL,NULL),
(51,64,'section',63,NULL,NULL),
(52,65,'section',63,NULL,NULL),
(53,66,'service',14,NULL,NULL),
(193,69,'service',20,NULL,NULL),
(230,67,'service',20,NULL,NULL),
(232,68,'service',20,NULL,NULL),
(234,70,'service',20,NULL,NULL),
(235,71,'service',20,NULL,NULL),
(236,72,'service',20,NULL,NULL),
(239,74,'service',20,NULL,NULL),
(244,75,'section',72,NULL,NULL),
(245,73,'section',75,NULL,NULL),
(246,76,'service',21,NULL,NULL),
(247,77,'service',21,NULL,NULL);
/*!40000 ALTER TABLE `linkables` ENABLE KEYS */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(52,'0001_01_01_000000_create_users_table',1),
(53,'0001_01_01_000001_create_cache_table',1),
(54,'0001_01_01_000002_create_jobs_table',1),
(55,'2024_05_28_190939_create_clients_table',1),
(56,'2024_05_28_190940_create_leads_table',1),
(57,'2024_05_28_193238_create_services_table',1),
(58,'2024_05_28_193943_create_section_types_table',1),
(59,'2024_05_28_200918_create_sections_table',1),
(60,'2024_05_28_214359_create_links_table',1),
(62,'2024_05_28_213718_add_nid_field_to_services_table',2),
(63,'2024_06_19_003024_add_order_field_to_sections_table',3),
(65,'2024_06_25_191605_remove_type_id_field_from_sections_table',4),
(66,'2024_06_25_191910_add_name_field_to_sections_table',5),
(67,'2024_06_26_155455_drop_can_be_parent_field_on_section_types_table',6),
(68,'2024_06_26_160701_add_level_field_to_section_types_table',6),
(72,'2024_08_08_202917_create_uploads_table',7),
(73,'2024_08_08_203130_create_model_uploads_table',7),
(74,'2024_08_08_203311_create_thumbnails_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `model_uploads`
--

DROP TABLE IF EXISTS `model_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `upload_id` bigint(20) unsigned NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_uploads_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `model_uploads_upload_id_foreign` (`upload_id`),
  CONSTRAINT `model_uploads_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `uploads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_uploads`
--

/*!40000 ALTER TABLE `model_uploads` DISABLE KEYS */;
INSERT INTO `model_uploads` VALUES
(56,'lead',4,59,1,'2024-08-21 10:35:36','2024-08-21 10:35:36'),
(57,'lead',4,60,0,'2024-08-21 10:35:36','2024-08-21 10:35:36'),
(58,'lead',4,61,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(59,'lead',4,62,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(60,'lead',4,63,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(61,'lead',4,64,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(62,'lead',4,65,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(63,'lead',4,66,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(64,'lead',4,67,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(65,'lead',4,68,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(66,'lead',4,69,0,'2024-08-22 15:57:25','2024-08-22 15:57:25'),
(67,'service',14,70,1,'2024-09-20 12:20:57','2024-09-20 12:20:57'),
(68,'service',14,71,0,'2024-09-20 12:20:57','2024-09-20 12:20:57');
/*!40000 ALTER TABLE `model_uploads` ENABLE KEYS */;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Table structure for table `section_types`
--

DROP TABLE IF EXISTS `section_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section_types`
--

/*!40000 ALTER TABLE `section_types` DISABLE KEYS */;
INSERT INTO `section_types` VALUES
(1,'Exterior',1,NULL,NULL,0),
(2,'Interior',1,NULL,NULL,0),
(3,'Rés do chão',1,NULL,NULL,0),
(4,'1º Andar',1,NULL,NULL,0),
(5,'Cave',1,NULL,NULL,0),
(6,'Divisões',1,NULL,NULL,0),
(7,'Muro',1,NULL,NULL,1),
(8,'Garagem',1,NULL,NULL,1),
(9,'Sala',1,NULL,NULL,1),
(10,'Cozinha',1,NULL,NULL,1),
(11,'Canto',1,NULL,NULL,2),
(12,'Sofá',1,NULL,NULL,2),
(13,'WC',1,NULL,NULL,2);
/*!40000 ALTER TABLE `section_types` ENABLE KEYS */;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nid` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES
(31,'L24.1003.F0.S1','teste 0',NULL,0,'2024-06-26 21:08:38','2024-06-26 21:23:30'),
(35,'L24.1003.F0.S5','teste 4',NULL,1,'2024-06-26 21:11:30','2024-06-26 21:23:41'),
(36,'L24.1003.F0.S6','teste 5',NULL,2,'2024-06-26 21:11:38','2024-06-26 21:23:41'),
(37,'L24.1003.F0.S7','teste 6',NULL,3,'2024-06-26 21:16:21','2024-06-26 21:23:41'),
(39,'L24.1003.F0.S9','teste 8',NULL,4,'2024-06-26 21:20:51','2024-06-26 21:23:47'),
(40,'L24.1003.F0.S10','teste 9',NULL,5,'2024-06-26 21:21:13','2024-06-26 21:23:47'),
(41,'L24.1003.F0.S11','teste 10',NULL,6,'2024-06-26 21:22:06','2024-06-26 21:23:47'),
(42,'L24.1003.F0.S12','teste 11',NULL,7,'2024-06-26 21:22:22','2024-06-26 21:23:47'),
(43,'L24.1005.F1.S1','aseasdttrfytr',NULL,0,'2024-07-30 09:40:50','2024-08-08 14:21:57'),
(44,'L24.1005.F1.S2','aseasd',NULL,2,'2024-07-30 09:40:53','2024-08-08 14:22:00'),
(46,'L24.1003.F1.S1','asd',NULL,0,'2024-08-09 23:37:55','2024-08-09 23:37:55'),
(47,'L24.1003.F1.S2','bbb',NULL,0,'2024-08-10 10:15:15','2024-08-10 10:15:44'),
(48,'L24.1003.F1.S3','ddd',NULL,0,'2024-08-10 10:15:36','2024-08-10 10:15:53'),
(49,'L24.1003.F1.S2','eee',NULL,0,'2024-08-10 10:16:09','2024-08-10 10:39:00'),
(50,'L24.1003.F1.S3','ccc',NULL,0,'2024-08-10 10:16:29','2024-08-10 10:16:37'),
(51,'L24.1003.F1.S3','fff',NULL,0,'2024-08-10 10:18:33','2024-08-10 10:39:06'),
(52,'L24.1003.F1.S4','ggg',NULL,0,'2024-08-10 10:18:38','2024-08-10 10:39:08'),
(53,'L24.1003.F2.S1','111',NULL,0,'2024-08-10 10:46:30','2024-08-10 10:46:30'),
(54,'L24.1003.F2.S2','222',NULL,1,'2024-08-10 10:46:34','2024-08-10 10:46:34'),
(55,'L24.1003.F2.S3','333',NULL,2,'2024-08-10 10:46:40','2024-08-10 10:46:40'),
(56,'L24.1003.F2.S4','3333',NULL,0,'2024-08-10 10:46:49','2024-08-10 10:47:15'),
(57,'L24.1003.F2.S5','33333',NULL,0,'2024-08-10 10:46:55','2024-08-10 10:47:17'),
(58,'L24.1003.F2.S6','333333',NULL,0,'2024-08-10 10:47:01','2024-08-10 10:47:18'),
(59,'L24.1006.F1.S1','t1','asdfasdf',0,'2024-09-16 18:10:10','2024-09-16 18:10:10'),
(60,'L24.1006.F1.S2','t2','aaaa',1,'2024-09-16 18:10:23','2024-09-16 18:10:23'),
(61,'L24.1006.F1.S2.S1','ttt',NULL,0,'2024-09-16 18:28:32','2024-09-16 18:28:32'),
(62,'L24.1006.F1.S2.S1.S1','ttttt',NULL,0,'2024-09-16 18:28:41','2024-09-16 18:28:41'),
(63,'L24.1006.F2.S1','adadadadad',NULL,0,'2024-09-16 18:29:21','2024-09-16 18:29:21'),
(64,'L24.1006.F2.S1.S1','adadadad',NULL,0,'2024-09-16 18:29:30','2024-09-16 18:29:30'),
(65,'L24.1006.F2.S1.S2','adadadadaaaaa',NULL,1,'2024-09-16 18:29:35','2024-09-16 18:29:35'),
(66,'L24.1007.F1.S1','asdasdasd',NULL,0,'2024-09-20 12:30:28','2024-09-20 12:30:28'),
(67,'SLP2024.33012.E.S1','Interior',NULL,2,'2024-10-17 19:07:53','2024-12-15 02:05:35'),
(68,'SLP2024.33012.E.S2','Exterior',NULL,4,'2024-10-17 19:07:53','2024-12-15 02:05:35'),
(69,'SLP2024.33012.E.S3','dsgdfg',NULL,3,'2024-10-17 19:08:13','2024-12-15 02:05:35'),
(70,'SLP2024.33012.E.S4','teste',NULL,5,'2024-12-15 01:48:00','2024-12-15 02:05:35'),
(71,'SLP2024.33012.E.S5','teste1',NULL,6,'2024-12-15 01:50:55','2024-12-15 02:05:35'),
(72,'SLP2024.33012.E.S6','teste2',NULL,7,'2024-12-15 01:51:19','2024-12-15 02:05:35'),
(73,'SLP2024.33012.E.S7','teste3',NULL,0,'2024-12-15 01:52:57','2024-12-15 02:12:28'),
(74,'SLP2024.33012.E.S8','teste4',NULL,1,'2024-12-15 02:05:19','2024-12-15 02:05:35'),
(75,'SLP2024.33012.E.S6.S2','teste55',NULL,0,'2024-12-15 02:11:46','2024-12-15 02:12:28'),
(76,'SLP2024.33012.F.S1','Interior',NULL,0,'2025-04-10 17:23:59','2025-04-10 17:23:59'),
(77,'SLP2024.33012.F.S2','Exterior',NULL,0,'2025-04-10 17:23:59','2025-04-10 17:23:59');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nid` varchar(30) NOT NULL,
  `lead_id` bigint(20) unsigned NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `floor` varchar(30) DEFAULT NULL,
  `door` varchar(30) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_contact` varchar(100) DEFAULT NULL,
  `receiver_relation` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_nid_unique` (`nid`),
  KEY `services_lead_id_foreign` (`lead_id`),
  CONSTRAINT `services_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,'24.L1000.F1',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'24.L1002.F0',3,NULL,NULL,NULL,'4505-139',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-13 17:45:12','2024-06-13 17:45:12'),
(3,'24.L1002.F1',3,'Rua da Torre 217 R/c',NULL,NULL,'3700-682',NULL,'Fajões',NULL,'910743504',NULL,'HugoPires','HugoPires','HugoPires','2024-06-13 17:49:55','2024-06-13 17:49:55'),
(4,'24.L1002.F2',3,'Rua da Torre 217 R/c',NULL,NULL,'3700-682',NULL,'Oliveira de Azemeus','Aveiro',NULL,NULL,NULL,NULL,NULL,'2024-06-13 18:04:56','2024-06-13 18:04:56'),
(6,'24.L1001.F1',2,'Rua da Torre 217 R/c',NULL,NULL,'3700-682',NULL,'Oliveira de Azemeus','Aveiro','910743504',NULL,'HugoPires','HugoPires','HugoPires','2024-06-26 16:21:28','2024-06-26 16:21:28'),
(7,'L24.1005.F1',6,'Rua do sitio asdasdasdsa',NULL,NULL,'4505-139',NULL,'SÃO JOÃO DA MADEIRA',NULL,'910743504','dfsdfgsdfg','Hugo Pires','Hugo Pires','Hugo Pires','2024-07-30 09:39:46','2024-09-16 17:47:53'),
(10,'L24.1003.F1',4,'Rua do sitio',NULL,NULL,'4505-139',NULL,'SÃO JOÃO DA MADEIRA',NULL,'910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-08-09 23:30:35','2024-08-09 23:30:35'),
(11,'L24.1003.F2',4,'Rua do sitio',NULL,NULL,'4505-139',NULL,'SÃO JOÃO DA MADEIRA',NULL,'910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-08-10 10:46:20','2024-08-10 10:46:20'),
(12,'L24.1006.F1',7,'Rua do sitio','1','2','4505-139','asdasd','SÃO JOÃO DA MADEIRA','Aveiro','910743504','asdadsasdadsa','Hugo Pires','Hugo Pires','Hugo Pires','2024-09-16 17:48:37','2024-09-16 17:59:53'),
(13,'L24.1006.F2',7,'Rua do sitio','aaa','aaa','4505-139','aaa','SÃO JOÃO DA MADEIRA','aaaa','910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-09-16 18:29:07','2024-09-16 18:29:07'),
(14,'L24.1007.F1',8,'aaaa','1','2','4505-139',NULL,'SÃO JOÃO DA MADEIRA',NULL,'910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-09-16 18:30:00','2024-09-16 18:30:00'),
(15,'SLP2024.33012.A',12,'Rua do sitio','1','1','4505-139','sadf','SÃO JOÃO DA MADEIRA','asdf','910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-10-17 18:46:33','2024-10-17 18:46:33'),
(16,'SLP2024.33012.B',12,'Rua do sitio','1','2','4505-139','asdasd','SÃO JOÃO DA MADEIRA','Aveiro','910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-10-17 19:03:07','2024-10-17 19:03:07'),
(18,'SLP2024.33012.C',12,'Rua do sitio','1','2','4505-139','asdasd','SÃO JOÃO DA MADEIRA','Aveiro','910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-10-17 19:03:41','2024-10-17 19:03:41'),
(19,'SLP2024.33012.D',12,'Rua do sitio','aaa','aaa','4505-139','asdasd','SÃO JOÃO DA MADEIRA','Aveiro','910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-10-17 19:05:39','2024-10-17 19:05:39'),
(20,'SLP2024.33012.E',12,'Rua do sitio',NULL,NULL,'4505-139',NULL,'SÃO JOÃO DA MADEIRA',NULL,'910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2024-10-17 19:07:53','2024-10-17 19:07:53'),
(21,'SLP2024.33012.F',12,'Rua do sitio aaa','1','2','4505-139','aaa','SÃO JOÃO DA MADEIRA',NULL,'910743504',NULL,'Hugo Pires','Hugo Pires','Hugo Pires','2025-04-10 17:23:59','2025-04-10 17:23:59');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('AcjAkfNlwVIOC9V84JZKO4UR2uUiYRPZxu2FF6Wr',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQ2V3cmJ1eElrbUNBZzRPeVIySHhkQWFGb3kxbTk5VnlPWVNHMDJIRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU0OiJodHRwOi8vbG9jYWwudmlzdG9icmEudGVzdC9zZWN0aW9ucy9TTFAyMDI0LjMzMDEyLkYuUzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NDMwOTA1Mjt9fQ==',1744313283),
('UZCJYdcEHj5WJPvUj3vm6BhYXkR6bvlCX59g6sWT',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicklLMFZmN2V1dXkxd2NEM1Z5Ym5IeHJZaDNEdVZ0V2dQUUZJYkk2dSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MDoiaHR0cDovL2xvY2FsLnZpc3RvYnJhLnRlc3Qvc2VjdGlvbnMvTDI0LjEwMDMuRjIuUzUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1737455551);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Table structure for table `thumbnails`
--

DROP TABLE IF EXISTS `thumbnails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thumbnails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `upload_id` bigint(20) unsigned NOT NULL,
  `size` varchar(50) NOT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thumbnails_upload_id_foreign` (`upload_id`),
  CONSTRAINT `thumbnails_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `uploads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thumbnails`
--

/*!40000 ALTER TABLE `thumbnails` DISABLE KEYS */;
INSERT INTO `thumbnails` VALUES
(62,59,'160x160','media/leads/L24.1003/photos/160x160/5YtkfCJUEcASqqYCwFeJzRVdL2p95e0tJoFlT4OJ_160x160.png','2024-08-21 10:35:37','2024-08-21 10:35:37'),
(63,60,'160x160','media/leads/L24.1003/photos/160x160/EC5VTcA9wkcXQUyFJc272nwSm0brzKFZsBcb9zq3_160x160.png','2024-08-21 10:35:37','2024-08-21 10:35:37'),
(64,59,'130x98','media/leads/L24.1003/photos/130x98/5YtkfCJUEcASqqYCwFeJzRVdL2p95e0tJoFlT4OJ_130x98.png','2024-08-21 10:35:38','2024-08-21 10:35:38'),
(65,61,'160x160','media/leads/L24.1003/photos/160x160/1OAmA0ZXqbnof33o1UAwkQ98wGmYOnVxl8jFfuHc_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(66,62,'160x160','media/leads/L24.1003/photos/160x160/MZQuZkcv0ZRVxU6W54VgGiaKZktsi3PqvuGXPbdw_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(67,63,'160x160','media/leads/L24.1003/photos/160x160/zNpjA0WOIQxlvDJNxOGQFPkYp4Xzd1Ldp8X1fMHK_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(68,64,'160x160','media/leads/L24.1003/photos/160x160/ruL8AiYLW7elkDcsvN4qLMejAFGeXAnvNFn2CBq0_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(69,65,'160x160','media/leads/L24.1003/photos/160x160/9UKoXu7lQuXQAczPMgHROn4h8azbbdvCiz626UIt_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(70,66,'160x160','media/leads/L24.1003/photos/160x160/0CA9rastxX0pwyOEHBSfUpSCWeqeutSGm5DtucKi_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(71,67,'160x160','media/leads/L24.1003/photos/160x160/Eva54qarVFye4kkIxKp7s8iPxTYQYYUS3VSOXX82_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(72,68,'160x160','media/leads/L24.1003/photos/160x160/oXE4IqdsiHllfXOeph6SzGUvLkLQGVLc4QkbZZaj_160x160.png','2024-08-22 15:57:26','2024-08-22 15:57:26'),
(73,69,'160x160','media/leads/L24.1003/photos/160x160/KmLgtbtrCIRBar88LbXExsGtIst44PGLTdmtaFbs_160x160.png','2024-08-22 15:57:27','2024-08-22 15:57:27'),
(74,70,'160x160','media/services/L24.1007.F1/photos/160x160/iTisEIlsMpzKqlLEecjvWmTUkbHLJ9MwFsIqXi7x_160x160.png','2024-09-20 12:20:59','2024-09-20 12:20:59'),
(75,71,'160x160','media/services/L24.1007.F1/photos/160x160/CCgoc5KZlNLIch3AsLE3ExCZtzyYYP3xsU34FPg2_160x160.jpg','2024-09-20 12:20:59','2024-09-20 12:20:59');
/*!40000 ALTER TABLE `thumbnails` ENABLE KEYS */;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `format` varchar(20) NOT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` VALUES
(59,'5YtkfCJUEcASqqYCwFeJzRVdL2p95e0tJoFlT4OJ.png','image/png','media/leads/L24.1003/photos/originals/5YtkfCJUEcASqqYCwFeJzRVdL2p95e0tJoFlT4OJ.png','2024-08-21 10:35:36','2024-08-21 10:35:36'),
(60,'EC5VTcA9wkcXQUyFJc272nwSm0brzKFZsBcb9zq3.png','image/png','media/leads/L24.1003/photos/originals/EC5VTcA9wkcXQUyFJc272nwSm0brzKFZsBcb9zq3.png','2024-08-21 10:35:36','2024-08-21 10:35:36'),
(61,'1OAmA0ZXqbnof33o1UAwkQ98wGmYOnVxl8jFfuHc.png','image/png','media/leads/L24.1003/photos/originals/1OAmA0ZXqbnof33o1UAwkQ98wGmYOnVxl8jFfuHc.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(62,'MZQuZkcv0ZRVxU6W54VgGiaKZktsi3PqvuGXPbdw.png','image/png','media/leads/L24.1003/photos/originals/MZQuZkcv0ZRVxU6W54VgGiaKZktsi3PqvuGXPbdw.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(63,'zNpjA0WOIQxlvDJNxOGQFPkYp4Xzd1Ldp8X1fMHK.png','image/png','media/leads/L24.1003/photos/originals/zNpjA0WOIQxlvDJNxOGQFPkYp4Xzd1Ldp8X1fMHK.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(64,'ruL8AiYLW7elkDcsvN4qLMejAFGeXAnvNFn2CBq0.png','image/png','media/leads/L24.1003/photos/originals/ruL8AiYLW7elkDcsvN4qLMejAFGeXAnvNFn2CBq0.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(65,'9UKoXu7lQuXQAczPMgHROn4h8azbbdvCiz626UIt.png','image/png','media/leads/L24.1003/photos/originals/9UKoXu7lQuXQAczPMgHROn4h8azbbdvCiz626UIt.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(66,'0CA9rastxX0pwyOEHBSfUpSCWeqeutSGm5DtucKi.png','image/png','media/leads/L24.1003/photos/originals/0CA9rastxX0pwyOEHBSfUpSCWeqeutSGm5DtucKi.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(67,'Eva54qarVFye4kkIxKp7s8iPxTYQYYUS3VSOXX82.png','image/png','media/leads/L24.1003/photos/originals/Eva54qarVFye4kkIxKp7s8iPxTYQYYUS3VSOXX82.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(68,'oXE4IqdsiHllfXOeph6SzGUvLkLQGVLc4QkbZZaj.png','image/png','media/leads/L24.1003/photos/originals/oXE4IqdsiHllfXOeph6SzGUvLkLQGVLc4QkbZZaj.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(69,'KmLgtbtrCIRBar88LbXExsGtIst44PGLTdmtaFbs.png','image/png','media/leads/L24.1003/photos/originals/KmLgtbtrCIRBar88LbXExsGtIst44PGLTdmtaFbs.png','2024-08-22 15:57:25','2024-08-22 15:57:25'),
(70,'iTisEIlsMpzKqlLEecjvWmTUkbHLJ9MwFsIqXi7x.png','image/png','media/services/L24.1007.F1/photos/originals/iTisEIlsMpzKqlLEecjvWmTUkbHLJ9MwFsIqXi7x.png','2024-09-20 12:20:57','2024-09-20 12:20:57'),
(71,'CCgoc5KZlNLIch3AsLE3ExCZtzyYYP3xsU34FPg2.jpg','image/jpeg','media/services/L24.1007.F1/photos/originals/CCgoc5KZlNLIch3AsLE3ExCZtzyYYP3xsU34FPg2.jpg','2024-09-20 12:20:57','2024-09-20 12:20:57');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Admin','admin@example.org',NULL,'$2y$12$4nx0vjmaKRJXhrbj4J6C6OsZEQJXrHeepVGuZKUnPENyHcAype4zm','p9LCTBrSeC4pPjKUPEwRYdNWiCJ8gGY0iVyu82owxoI40NtjyxNu890iA9WW','2024-05-28 22:16:25','2024-05-28 22:16:25'),
(2,'test','hugo.pires@email',NULL,'$2y$12$sBaq22/yX.n5P6sVsawI6.RM0MxOFKFYpQvexH8EtANkWC0f0eRoi',NULL,'2024-07-25 23:11:07','2024-07-25 23:11:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'dev_tangente'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-28 13:38:14
