CREATE DATABASE  IF NOT EXISTS `bach_hoa_xanh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bach_hoa_xanh`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: bach_hoa_xanh
-- ------------------------------------------------------
-- Server version	8.0.28

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
  `id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'THỊT, CÁ, HẢI SẢN','uc-ga-tuoi-phi-le-khay-500g-1-3-mieng-202111261940447776_300x300.jpg_1646192508041'),(2,'RAU, CỦ, TRÁI CÂY','banh-quy-lua-mi-misura-goi-120g-202104261444280460_300x300.jpg_1646192516197'),(3,'SẢN PHẨM ĐÔNG LẠNH','ba-roi-heo-meat-master-khay-400g-202112021400015158_300x300.jpg_1646192525425'),(4,'SẢN PHẨM HÀNG MÁT','cot-let-heo-co-xuong-khay-300g-3-5-mieng-202111262116597007_300x300.jpg_1646192539091'),(81,'ĐỒ UỐNG CÁC LOẠI','combo-2-chai-nuoc-ngot-mirinda-huong-xa-xi-15l-202111201122035758_300x300.jpg_1646192548956'),(82,'SỮA UỐNG CÁC LOẠI','thung-48-hop-sua-dinh-duong-vinamilk-flex-khong-lactoza-180ml-202105151150024146_300x300.jpg_1646192569326'),(83,'BÁNH KẸO CÁC LOẠI','thung-24-ly-mi-koreno-vi-kim-chi-65g-202111032055126011_300x300.jpg_1646192585000');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` int NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKf4facxgsxb21nhe3c9y2nk0aw` (`product_id`),
  CONSTRAINT `FKf4facxgsxb21nhe3c9y2nk0aw` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (20,'#333333',19),(21,'#FF0000',19),(34,'#00FF00',33),(37,'#0000FF',36),(40,'#FFFF00',39),(56,'#3333',55),(60,'dsa',59),(63,'#ffe6e6',62),(64,'#ff8080',62),(76,'b',75),(79,'12',78);
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK6uv0qku8gsu6x1r2jkrtqwjtn` (`product_id`),
  KEY `FK8omq0tc18jd43bu5tjh6jvraq` (`user_id`),
  CONSTRAINT `FK6uv0qku8gsu6x1r2jkrtqwjtn` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FK8omq0tc18jd43bu5tjh6jvraq` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hibernate_sequence`
--

DROP TABLE IF EXISTS `hibernate_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hibernate_sequence` (
  `next_val` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hibernate_sequence`
--

LOCK TABLES `hibernate_sequence` WRITE;
/*!40000 ALTER TABLE `hibernate_sequence` DISABLE KEYS */;
INSERT INTO `hibernate_sequence` VALUES (124);
/*!40000 ALTER TABLE `hibernate_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (50,'<p>dsaadsad</p>\r\n','blog_small_img4-1.jpg_1639725057798','tesst ','adsadsa'),(54,'<p>Omicron l&acirc;y lan nhanh c&oacute; thể khiến Covid-19 trở th&agrave;nh bệnh đặc hữu, nhưng cũng c&oacute; nguy cơ virus tiến h&oacute;a th&ecirc;m v&agrave; nguy hiểm hơn với con người.</p>\r\n\r\n<p>Trong gần nửa năm qua, biến chủng Delta của nCoV ho&agrave;nh h&agrave;nh khắp thế giới, dường như c&oacute; khả năng đ&aacute;nh bại tất cả c&aacute;c biến thể kh&aacute;c, đến mức một số nh&agrave; khoa học tin rằng khả năng l&acirc;y nhiễm sang người của virus n&agrave;y đ&atilde; đạt đến cực hạn.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, sự trỗi dậy của&nbsp;<a href=\"https://vnexpress.net/chu-de/omicron-3842\">Omicron</a>&nbsp;v&agrave;o cuối th&aacute;ng 11 đ&atilde; khiến giới khoa học phải suy nghĩ lại. Sau khi được ghi nhận ở ph&iacute;a nam ch&acirc;u Phi, biến chủng mới dường như nhanh ch&oacute;ng lan tới h&agrave;ng chục quốc gia tr&ecirc;n to&agrave;n cầu chỉ trong thời gian rất ngắn, khiến Tổ chức Y tế Thế giới nhanh ch&oacute;ng liệt n&oacute; v&agrave;o nh&oacute;m biến chủng đ&aacute;ng lo ngại.</p>\r\n\r\n<p>Hiện chưa c&oacute; dữ liệu đầy đủ về mức độ l&acirc;y lan cũng như độc lực của Omicron, nhưng c&aacute;c nghi&ecirc;n cứu sơ bộ ở Nam Phi v&agrave; một số ph&ograve;ng th&iacute; nghiệm tr&ecirc;n thế giới cho thấy biến chủng n&agrave;y c&oacute; nguy cơ l&acirc;y nhiễm cao hơn với những người từng mắc Covid-19 trước đ&acirc;y.</p>\r\n\r\n<p>N&oacute; cũng được cho l&agrave; c&oacute; khả năng n&eacute; tr&aacute;nh vaccine tốt hơn chủng gốc.&nbsp;<a href=\"https://vnexpress.net/vaccine-pfizer-ngan-70-nguy-co-nhap-vien-vi-omicron-4403110.html\">Nghi&ecirc;n cứu sơ bộ</a>&nbsp;tại Nam Phi cho thấy hai mũi ti&ecirc;m vaccine Pfizer cung cấp khả năng bảo vệ tr&ecirc;n 90% trước chủng nCoV gốc, nhưng hiệu lực ngăn l&acirc;y nhiễm biến chủng Omicron chỉ c&ograve;n 33%. D&ugrave; vậy, hai liều vaccine Pfizer vẫn gi&uacute;p ngăn 70% nguy cơ người nhiễm chủng Omicron phải nhập viện.</p>\r\n\r\n<p>Khi c&aacute;c nghi&ecirc;n cứu dần được c&ocirc;ng bố, c&aacute;c nh&agrave; khoa học đang tự hỏi liệu Omicron c&oacute; thể đạt khả năng l&acirc;y nhiễm tới mức n&agrave;o. Kh&ocirc;ng dễ để t&igrave;m ra c&acirc;u trả lời v&agrave;o thời điểm n&agrave;y, nhưng giới nghi&ecirc;n cứu đ&atilde; vạch ra ba kịch bản về tương lai Covid-19, đại dịch đ&atilde; khiến hơn 272 triệu người nhiễm v&agrave; hơn 5,3 triệu người chết trong&nbsp;<a href=\"https://vnexpress.net/longform/hai-nam-covid-19-hoanh-hanh-the-gioi-4399610.html\">hai năm qua</a>.</p>\r\n\r\n<p>Kịch bản đầu ti&ecirc;n m&agrave; c&aacute;c nh&agrave; khoa học nghĩ tới l&agrave;&nbsp;<strong>Covid-19 sẽ trở th&agrave;nh bệnh theo m&ugrave;a</strong>&nbsp;dưới t&aacute;c động của biến chủng Omicron l&acirc;y lan nhanh nhưng c&oacute; dấu hiệu g&acirc;y triệu chứng nhẹ hơn so với c&aacute;c biến chủng kh&aacute;c.</p>\r\n\r\n<p>Virus l&agrave; dạng sống đơn giản c&oacute; một mục ti&ecirc;u ch&iacute;nh l&agrave; tồn tại. Hầu hết giới khoa học đồng t&igrave;nh rằng c&aacute;ch tốt nhất để nCoV tồn tại l&acirc;u d&agrave;i l&agrave; trở th&agrave;nh bệnh đặc hữu, tương tự như c&uacute;m hoặc c&aacute;c loại virus corona kh&aacute;c đ&atilde; l&agrave;m.</p>\r\n\r\n<p>&quot;Virus dường như kh&ocirc;ng thể l&agrave;m g&igrave; tồi tệ hơn những g&igrave; ch&uacute;ng ta đang đối ph&oacute;&quot;, Vaughn Cooper, gi&aacute;m đốc Trung t&acirc;m Y học v&agrave; Sinh học tiến h&oacute;a thuộc Đại học Pittsburgh, Mỹ, n&oacute;i.</p>\r\n\r\n<p>Nếu virus trở n&ecirc;n nguy hiểm v&agrave; g&acirc;y tỷ lệ tử vong cao hơn ở người nhiễm, n&oacute; c&oacute; thể gặp t&igrave;nh cảnh &quot;gậy &ocirc;ng đập lưng &ocirc;ng&quot;, bởi vật chủ cần phải sống để c&oacute; thể tiếp tục l&acirc;y truyền mầm bệnh cho người kh&aacute;c. Một khi virus đ&atilde; đạt tới giới hạn về khả năng l&acirc;y truyền, c&aacute;c biến thể trong tương lai c&oacute; thể kh&ocirc;ng cần phải thay đổi nhiều c&aacute;ch thức hoạt động.</p>\r\n\r\n<p>&quot;Liệu ch&uacute;ng ta c&oacute; phải chơi tr&ograve; đuổi bắt m&atilde;i m&atilde;i với nCoV hay kh&ocirc;ng? C&acirc;u trả lời l&agrave; kh&ocirc;ng. N&oacute; sẽ trở th&agrave;nh bệnh đặc hữu theo m&ugrave;a. Điều đ&oacute; c&oacute; thể xảy ra trước khi kết th&uacute;c thập kỷ n&agrave;y&quot;, Cooper n&oacute;i.</p>\r\n\r\n<p>D&ugrave; cho rằng sẽ c&oacute; những thời điểm virus b&ugrave;ng ph&aacute;t mạnh hơn b&igrave;nh thường, chuy&ecirc;n gia n&agrave;y nhận định vaccine sẽ tiếp tục l&agrave; c&ocirc;ng cụ gi&uacute;p con người tr&aacute;nh nguy cơ mắc bệnh nặng.</p>\r\n\r\n<p>Theo &ocirc;ng, kh&aacute;ng thể do vaccine cung cấp kh&ocirc;ng phải l&agrave; h&igrave;nh thức bảo vệ duy nhất của cơ thể con người. C&aacute;c tế b&agrave;o bạch cầu, thường được gọi l&agrave; tế b&agrave;o T v&agrave; tế b&agrave;o B, cũng c&oacute; khả năng ghi nhớ những kẻ tấn c&ocirc;</p>\r\n','blog_small_img1.jpg_1639728868979','dsadsadsa','sdadsadsadsad');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK32ql8ubntj5uh44ph9659tiih` (`user_id`),
  CONSTRAINT `FK32ql8ubntj5uh44ph9659tiih` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (91,'gfdgdfgfdg','2022-03-03 09:32:50','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'fdsa',3),(93,'gfdgdfgfdg','2022-03-03 09:40:15','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'hfghfgh',3),(95,'gfdgdfgfdg','2022-03-03 09:46:29','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'dsadsa',1),(97,'gfdgdfgfdg','2022-03-03 09:49:54','dsads@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'kjhk',3),(100,'210 Trần Quang Khải , Hà Nội','2022-03-04 06:52:07','aund@lienvietpostbank.com.vn','au222 dsffds','0377524660',42,'dsadsads',3),(102,'gfdgdfgfdg','2022-03-04 07:04:53','fghfghfghfgh@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'sdgfdsfsd',3),(105,'gfdgdfgfdg','2022-03-07 01:40:46','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'dsadsa',2),(107,'210 Trần Quang Khải , Hà Nội','2022-03-07 01:40:59','aund@lienvietpostbank.com.vn','au222 dsffds','0377524660',42,'dsafsdg',0),(109,'gfdgdfgfdg','2022-03-07 01:47:25','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'dsadsadsadsa',3),(121,'gfdgdfgfdg','2022-03-09 14:09:40','mr.au1992@gmail.com','ÂU NGUYỄN ĐỨC','+84377524660',42,'adasd',0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_detail`
--

DROP TABLE IF EXISTS `orders_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_detail` (
  `id` int NOT NULL,
  `amount` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKgic892mhh720sx9wmoq4cjtgp` (`order_id`),
  KEY `FKg9ar77rwmbwbablvscd6qt8hh` (`product_id`),
  CONSTRAINT `FKg9ar77rwmbwbablvscd6qt8hh` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `FKgic892mhh720sx9wmoq4cjtgp` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_detail`
--

LOCK TABLES `orders_detail` WRITE;
/*!40000 ALTER TABLE `orders_detail` DISABLE KEYS */;
INSERT INTO `orders_detail` VALUES (92,100000,100000,1,91,78),(94,250000,250000,1,93,75),(96,250000,250000,1,95,75),(98,500000,500000,1,97,62),(101,2000000,500000,4,100,62),(103,417718,208859,2,102,33),(106,15733332,5244444,3,105,19),(108,100000,100000,1,107,84),(110,667730766,667730766,1,109,104),(111,250000,250000,1,109,75),(112,100000,100000,1,109,78),(113,150000,30000,5,109,55),(122,667730766,667730766,1,121,104);
/*!40000 ALTER TABLE `orders_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pin` bit(1) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` int NOT NULL,
  `supply_id` int NOT NULL,
  `price` decimal(19,2) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `discount_percent` int DEFAULT NULL,
  `origin_price` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKog2rp4qthbtt2lfyhfo32lsw9` (`category_id`),
  KEY `FKqqhaggsk4bjmq4py6ksr01pse` (`supply_id`),
  CONSTRAINT `FKog2rp4qthbtt2lfyhfo32lsw9` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FKqqhaggsk4bjmq4py6ksr01pse` FOREIGN KEY (`supply_id`) REFERENCES `supplys` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (19,'2022-03-04 07:48:39','<p>sadsa</p>\r\n','banh-quy-lua-mi-misura-goi-120g-202104261444280460_300x300.jpg_1646184169581',_binary '\0',NULL,3,16,6555555.00,'Nước mắm nhỉ cá cơm 584 Nha Trang chai 500ml',99,20,100000.00),(33,'2022-03-04 07:50:44','<p>dsadsa</p>\r\n','ba-roi-heo-meat-master-khay-400g-202112021400015158_300x300.jpg_1646184175758',_binary '\0',NULL,2,16,321321.00,'6 chai trà Fuze Tea đào hạt chia 450ml',319,35,50000.00),(36,'2022-03-04 07:50:38','<p>321321</p>\r\n','bap-cai-trang-tui-500g-202103031518091031_300x300.jpg_1646184182129',_binary '\0',NULL,3,18,200000.00,'Đuôi heo Meat Master khay 400g',3213,5,10000.00),(39,'2022-03-04 07:50:49','<p>321321</p>\r\n','ba-roi-heo-khay-500g-202111262046493617_300x300.jpg_1646184282914',_binary '\0',NULL,1,16,120000.00,'Đuôi heo Meat Master khay 400g',11,10,5000.00),(55,'2022-03-02 05:56:00','<p>dsadsa</p>\r\n','rau-muong-hat-tui-500g-202103031701460557_300x300.jpg_1646184193775',_binary '\0',NULL,2,15,30000.00,'Dưa hấu không hạt túi 1 trái (từ 2kg trở lên)',208,NULL,15000.00),(59,'2022-03-04 07:51:07','<p>dsad</p>\r\n','loc-5-goi-mi-rong-bien-vi-ngao-koreno-102g-202103040212438029_300x300.jpg_1646208133159',_binary '\0',NULL,1,18,300000.00,'Thùng 48 chai sữa chua Fristi nho 80ml',321,NULL,150000.00),(62,'2022-03-02 05:54:44','<p>fadsadsadsadsad</p>\r\n\r\n<p>dgfdgfdgfdgfdg</p>\r\n','banh-quy-lua-mi-misura-goi-120g-202104261444280460_300x300.jpg_1646184267072',_binary '\0',NULL,1,15,500000.00,'Bánh gạo nướng hương cốm mật ong Tê Tê gạo lứt huyết rồng gói 140g',45,NULL,25000.00),(75,'2022-03-02 08:32:11','<p>dsdsad</p>\r\n','-tach-beo-khong-duong-vinamilk-100-sua-tuoi-180ml-202105151201030198_300x300.jpg_1646184217293',_binary '',NULL,82,15,250000.00,'Snack khoai tây vị bơ mật ong Funmore lon 130g',11,NULL,150000.00),(78,'2022-03-02 05:55:25','<p>213</p>\r\n','thung-48-chai-sua-chua-uong-nho-fristi-80ml-202111021927049687_300x300.jpg_1646184309524',_binary '\0',NULL,1,15,100000.00,'Lốc 6 gói mì xào Pancit Caton Lucky Me truyền thống 60g',121,NULL,20000.00),(84,'2022-03-02 08:33:34','<p>dsadsa</p>\r\n','duoi-heo-meat-master-khay-400g-6-8-mieng-202112021428431426_300x300.jpg_1646208114259',_binary '\0',NULL,1,15,200000.00,'Kẹo hương dưa hấu Lolli hũ 23g',100,50,20000.00),(104,'2022-03-04 07:23:03','<p>sadadsdsa</p>\r\n','1646378582749_khoai-tay-tui-500g-202103031516003940_300x300.jpg',_binary '',NULL,1,15,664353454.00,'aaaaa',549,90,55555555.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sizes` (
  `id` int NOT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKhs86kbnk4imwcyupgxp1g5dd2` (`product_id`),
  CONSTRAINT `FKhs86kbnk4imwcyupgxp1g5dd2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (22,'XS',19),(23,'M',19),(24,'L',19),(25,'S',19),(35,'S',33),(38,'M',36),(41,'L',39),(57,'X',55),(58,'M',55),(61,'dsa',59),(65,'XS',62),(66,'X',62),(67,'M',62),(68,'XL',62),(69,'L',62),(77,'a',75),(80,'321',78);
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplys`
--

DROP TABLE IF EXISTS `supplys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplys` (
  `id` int NOT NULL,
  `supply_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplys`
--

LOCK TABLES `supplys` WRITE;
/*!40000 ALTER TABLE `supplys` DISABLE KEYS */;
INSERT INTO `supplys` VALUES (15,'Hà Nội','210 Trần Quang Khải , Hà Nội','aund@lienvietpostbank.com.vn','0377524660'),(16,'Sài gòn','210 Trần Quang Khải , Hà Nội','aund@lienvietpostbank.com.vn','0377524660'),(18,'Bắc Ninh','210 Trần Quang Khải , Hà Nội','aund@lienvietpostbank.com.vn','0377524660');
/*!40000 ALTER TABLE `supplys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `active` int DEFAULT NULL,
  `verification_code` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2a$12$ImoMz9moOjl5EuddnR8Voe1SldrTgDJm.8lnA8fl9DcfIruqpLjS6','ADMIN','admin',1,NULL),(42,'$2a$12$.lcs1cuyN.RXoNq.wGFt1OWTLi4nYOCiXwXXf96t5tBWTJ8He/J6S','USER','user02@gmail.com',1,NULL),(70,'$2a$12$a1eCQ7.AAGEZzYLYjI0f8.MqrXkbagXPmOUhbL9LWipcbi9h/41PO','USER','user03@gmail.com',1,NULL),(120,'$2a$12$XwWbMzZkH3Upq4Gt12qdZufw6arPaFC8J7DvZsFMO0X727ZEexk9q','USER','mr.au1992@gmail.com',1,NULL),(123,'$2a$12$psnMIw85E1cGag59WmC/CeNAFRXBRGiCcucnVBQkXOAuELeElCO0e','QUAN_LY','quanly',1,NULL);
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

-- Dump completed on 2022-03-26 10:38:47
