-- MySQL dump 10.13  Distrib 8.0.36, for macos14 (arm64)
--
-- Host: 127.0.0.1    Database: craftopia
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Jewellery','2024-07-12 02:47:34'),(2,'Kitchen','2024-07-12 02:47:34'),(3,'Bedroom','2024-07-12 02:47:34'),(4,'Outdoor','2024-07-12 02:47:34'),(5,'Gifts','2024-07-12 02:47:34');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_products`
--

DROP TABLE IF EXISTS `collection_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collection_products` (
  `collection_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`collection_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `collection_products_ibfk_1` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`),
  CONSTRAINT `collection_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collection_products`
--

LOCK TABLES `collection_products` WRITE;
/*!40000 ALTER TABLE `collection_products` DISABLE KEYS */;
INSERT INTO `collection_products` VALUES (1,1),(1,2),(5,5),(8,5),(3,6),(4,6),(5,6),(8,6),(7,8),(6,9),(2,10),(6,11),(7,12),(3,14),(4,14),(2,15);
/*!40000 ALTER TABLE `collection_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'Holiday Specials','Special products for the holiday season.','2024-07-15 02:21:09'),(2,'Winter Collection','Products ideal for the winter season.','2024-07-15 02:21:09'),(3,'Summer Collection','Products perfect for the summer season.','2024-07-15 02:21:09'),(4,'Bath','A selection of bath-related products.','2024-07-15 02:21:09'),(5,'Laundry','Products for laundry needs.','2024-07-15 02:21:09'),(6,'Best Sellers','Our top-selling products.','2024-07-15 02:21:09'),(7,'Customer Favorites','Products with the best customer reviews.','2024-07-15 02:21:09'),(8,'Discounted Items','Products currently on sale or with discounts.','2024-07-15 02:21:09');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `additional_notes` text,
  PRIMARY KEY (`order_id`),
  KEY `id` (`id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'2024-08-02 07:57:48',20.10,'pending','credit_card','dscdsaf','dfdsf','dfdsf'),(2,1,'2024-08-02 08:00:24',20.10,'pending','credit_card','dsfds','dfdsaf','dsda'),(3,1,'2024-08-02 08:03:13',20.10,'pending','credit_card','dsfds','dfdsaf','dsda'),(4,1,'2024-08-02 08:09:25',20.10,'pending','paypal','dsfdf','dsfdf','dsf'),(5,1,'2024-08-02 08:12:53',0.00,'pending','paypal','efdf','dfdf','adfdff'),(6,1,'2024-08-02 08:15:44',0.00,'pending','credit_card','dassd','dsaf','dsaf'),(7,1,'2024-08-02 08:16:46',49.99,'pending','credit_card','45 Slobodian Avenue, EIGHT MILE PLAINS QLD 4113','test address','dasfds'),(8,1,'2024-08-02 08:20:59',90.10,'pending','credit_card','test','tetts','tets'),(9,1,'2024-08-02 15:38:38',199.98,'pending','credit_card','uygyjg','jkghkg','jkgj'),(10,14,'2024-08-02 21:30:10',169.98,'pending','credit_card','zvdvdfv','dafvc','czxvcx'),(11,14,'2024-08-03 15:57:04',149.99,'pending','credit_card','test','test','test'),(12,14,'2024-08-03 16:01:12',70.00,'pending','bank_transfer','lydia','lydioa','lydia'),(13,15,'2024-08-03 16:14:15',20.10,'pending','credit_card','testing demo','testing demo','testing demo');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` enum('available','outOfStock') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Silver Fish Necklace','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',50.00,'product_images/Silver_Fish_Necklace.jpg',1,'2024-07-12 02:47:34','available'),(2,'Precious Earrings and Necklace','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',70.00,'product_images/pexels-vannery-15280860.jpg',1,'2024-07-12 02:47:34','available'),(5,'Webp.net-resizeimage1.jpg','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',49.99,'product_images/Webp.net-resizeimage.jpg',2,'2024-07-15 01:03:52','available'),(6,'Knitted hat','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',20.10,'product_images/Webp.net-resizeimage2.jpg',4,'2024-07-15 01:24:45','available'),(7,'Wooden bar stool','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',60.20,'product_images/Webp.net-resizeimage3.jpg',2,'2024-07-15 03:01:45','available'),(8,'Cooking pots','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',70.20,'product_images/Webp.net-resizeimage4.jpg',2,'2024-07-15 03:07:17','available'),(9,'Glass jars','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',20.20,'product_images/Webp.net-resizeimage5.jpg',2,'2024-07-15 03:10:22','available'),(10,'Ceramic bottles','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',40.20,'product_images/Webp.net-resizeimage6.jpg',2,'2024-07-15 03:12:54','available'),(11,'Wooden dresser','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage8.jpg',3,'2024-07-15 05:34:44','available'),(12,'Ceramic mug','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage9.jpg',3,'2024-07-15 05:45:49','available'),(13,'Padded chair','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage10.jpg',3,'2024-07-15 05:45:49','available'),(14,'Ceramic mug2','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage9.jpg',3,'2024-07-15 05:46:35','available'),(15,'Padded chair2','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage10.jpg',3,'2024-07-15 05:46:35','available'),(16,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage9.jpg',3,'2024-07-15 05:47:00','available'),(17,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage10.jpg',3,'2024-07-15 05:47:00','available'),(18,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage9.jpg',3,'2024-07-15 05:47:02','available'),(19,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage10.jpg',3,'2024-07-15 05:47:02','available'),(20,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage2.jpg',2,'2024-07-15 05:50:44','available'),(21,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage3.jpg',2,'2024-07-15 05:50:44','available'),(22,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage6.jpg',2,'2024-07-15 05:51:45','available'),(23,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage5.jpg',2,'2024-07-15 05:51:45','available'),(24,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage11.jpg',4,'2024-07-15 05:55:53','available'),(25,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage12.jpg',4,'2024-07-15 05:55:53','available'),(26,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage13.jpg',4,'2024-07-15 05:59:54','available'),(27,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage14.jpg',4,'2024-07-15 05:59:54','available'),(28,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Webp.net-resizeimage13.jpg',1,'2024-07-15 06:00:59','available'),(29,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/Webp.net-resizeimage14.jpg',1,'2024-07-15 06:00:59','available'),(30,'Ceramic mug4','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',120.20,'product_images/Silver_Fish_Necklace.jpg',1,'2024-07-15 06:02:12','available'),(31,'Padded chair5','\n<h3>About this item</h3>\n<ul>\n    <li>Soft and stretchable, suitable for most women or girls.</li>\n    <li>Double lining, knit cotton outside layer, inside layer full of soft plush fleece, perfect for cold and windy winters.</li>\n    <li>The knit hat design with visor, which is stylish and sunblocking, helps keeping the glare out of your eyes.</li>\n    <li>The skull cap completely covers your ears to protect against cold winds, without having to yank it down all of the time.</li>\n    <li>Perfect for an outdoor stadium event where there were cold winds blowing. Also It would be great Winter Gift for anybody.</li>\n</ul>',1200.20,'product_images/pexels-vannery-15280860.jpg',1,'2024-07-15 06:02:12','available');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reviewer_name` varchar(255) NOT NULL,
  `rating` int NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `reviews_chk_1` CHECK ((`rating` between 1 and 5))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Lydia karungi',5,'I recently purchased a beautiful handmade necklace from Craftopia, and I\'m absolutely in love with it! The craftsmanship is exceptional, and the design is unique. It arrived quickly and was beautifully packaged. Highly recommend this shop for anyone looking for quality, handcrafted items!\"','2024-08-02 07:51:12'),(2,'Brenda',3,'The handcrafted pottery I ordered was stunning and well-made. The attention to detail is impressive. My only gripe is that the shipping took a bit longer than expected, but it was worth the wait','2024-08-02 07:58:46'),(3,'Sasi',4,'I purchased a set of hand-painted mugs. While the artwork is beautiful, one of the mugs had a small chip upon arrival. Customer service was responsive and offered a partial refund. Overall, a decent experience.','2024-08-02 07:59:03'),(4,'Glenys',4,'I purchased a set of hand-painted mugs. While the artwork is beautiful, one of the mugs had a small chip upon arrival. Customer service was responsive and offered a partial refund. Overall, a decent experience.','2024-08-02 07:59:20'),(5,'Chyndee',2,'Ordered a handmade scarf, but the color was quite different from the picture on the website. The quality is good, but the color mismatch was disappointing. The return process was smooth, though.','2024-08-02 07:59:41'),(6,'John Doe',4,'I bought a handmade vase from Craftopia and it looks amazing in my living room. The craftsmanship is top-notch, and the colors are vibrant. It arrived well-packaged and on time. I\'m very happy with my purchase and will definitely shop here again!','2024-08-02 08:19:09'),(7,'Alice Smith',5,'Craftopia has such a unique collection of handmade items. I purchased a beautiful necklace for my friend\'s birthday, and she absolutely loved it. The quality is outstanding, and the customer service was excellent. Highly recommend!','2024-08-02 08:19:09'),(8,'Michael Brown',3,'I ordered a set of coasters. While they are beautiful and well-crafted, they arrived a bit later than expected. However, the quality is good, and they are a nice addition to my home. I might shop again in the future.','2024-08-02 08:19:09'),(9,'Emily Johnson',5,'I am thrilled with the custom-made jewelry box I ordered from Craftopia. It is exquisitely crafted and arrived faster than I anticipated. The customer service was very responsive and helpful throughout the process. Highly satisfied with my purchase!','2024-08-02 08:19:09'),(10,'David Wilson',4,'The wooden cutting board I purchased is of excellent quality. It\'s sturdy, well-designed, and perfect for my kitchen. The only minor issue was a slight delay in shipping, but the product itself is fantastic. Would recommend!','2024-08-02 08:19:09'),(11,'Lydia karungi',4,'testing demo','2024-08-03 05:55:08'),(12,'Lydia karungi',4,'test','2024-08-03 06:11:58');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (1,'Lydia Karungi','lydiakarungi43@gmail.com','testing','2024-08-02 04:51:34'),(2,'Lydia Karungi','karungilydia92@gmail.com','testing 4','2024-08-02 05:37:37'),(3,'Lydia karungi','karungilydia92@gmail.com','testing','2024-08-03 05:50:58'),(4,'Lydia karungi','sasikumarh24@gmail.com','testing demo','2024-08-03 06:15:58');
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'karungilydia92@gmail.com','123','2024-07-15 00:37:43'),(2,'cpetrus@uspf.edu.ph','Chyndee123','2024-07-15 07:25:04'),(3,'sasikumarh24@gmail.com','123456','2024-07-22 05:35:09'),(4,'lydiakarungi43@gmail.com','$2y$10$GAu8Rg/4VzMkn.K.LLBt3utdBC8p5U0uuDyno9YLWO3w.rUuPWbXS','2024-07-28 08:49:50'),(5,'lydiakarungi42@gmail.com','$2y$10$S.Oze2XYmuzMUxrCtlekjObAGfhr71cnXXbeZtsURxV2.zqQY885.','2024-07-28 11:39:19'),(6,'lydiakarungi45@gmail.com','$2y$10$Tv5S4BEgjwVg94Q0VJ7hU.hRcv4VpyXehFfFHqtutox4nQWR30oAW','2024-07-28 11:39:54'),(7,'lydiakarungi44@gmail.com','$2y$10$Nk2My5haiwwR5oioelqHQuXckfghySabuuEICWyg.NZS2SaTzKjly','2024-07-28 11:42:43'),(8,'lydiakarungi40@gmail.com','$2y$10$BvyzTzyk262T4FM4sinerOa1a/YGxZPeY6k/gl66J38bY3aq4nicS','2024-07-28 11:43:41'),(9,'lydiakarungi4@gmail.com','$2y$10$iAYjOPSkaqB6kchCUciYJ.SYTN2F8tgqRzutsVdmOj2bofwoftrUW','2024-07-28 11:44:39'),(10,'lydiakarungi3@gmail.com','$2y$10$1S.hqpxfKClpgG5QQf6qEe09vQVR70kDNBjCEYUo0qTti5Pwk8DLK','2024-07-28 11:44:58'),(11,'lydiakarungi+testing43@gmail.com','$2y$10$tdYTOSAPGBDJX2el7nlZiORlS67P5jUiytA7zC/lY1M6cCoYAje8q','2024-08-02 05:13:18'),(12,'lydiakarungi434243@gmail.com','$2y$10$Ty1ccPeQ1zhfPMqmsT9Au.daCgXJu4jbErED6rg5vEznsT2U4KEFi','2024-08-02 05:16:48'),(13,'karungilydia923434@gmail.com','testing','2024-08-02 05:19:25'),(14,'lydia+testhash@gmail.com','$2y$10$WYSZN3JMrv/DQKqSpplOdOSSAymJlw4mqzCAiOsf9tw7qIwQ7oLIq','2024-08-02 06:01:53'),(15,'lydia+testdemo@gmail.com','$2y$10$yBImBfDi22FIkq5GW4e6GOEn3GZorzzccTs7Bv1e44fvZu1wCUhdS','2024-08-03 06:12:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-03 17:05:16
