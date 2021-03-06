CREATE DATABASE  IF NOT EXISTS `booking_tour` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `booking_tour`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: booking_tour
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
  `type` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Hà Nội','ivivu-da-nang-bia1-360x225.gif_1646629148419',1),(2,'Đà nẵng','ivivu-hon-may-rut-bia-360x225.gif_1646629156934',1),(3,'Sài gòn','ivivu-mieu-ba-chua-xu-120x120.gif_1646629166441',1),(4,'Thái Bình','ivivu-ngam-hoang-hon-ho-tuyen-lam-bia-360x225.gif_1646629179917',2),(81,'Đà lạt','ivivu-ho-ta-dung-tn-360x225.gif_1646629189245',2),(82,'Hà Nội 222','ivivu-thac-ban-gioc-bia-360x225.gif_1646629206599',1),(83,'Cù lao chàm','phuquoc-360x225.jpg_1646629219270',2);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destination_place`
--

DROP TABLE IF EXISTS `destination_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `destination_place` (
  `id` int NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destination_place`
--

LOCK TABLES `destination_place` WRITE;
/*!40000 ALTER TABLE `destination_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `destination_place` ENABLE KEYS */;
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
INSERT INTO `hibernate_sequence` VALUES (141);
/*!40000 ALTER TABLE `hibernate_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL,
  `adults_number` int DEFAULT NULL,
  `child_number` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `tour_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKpeo9qed87g58smji2403gly7f` (`tour_id`),
  KEY `FK32ql8ubntj5uh44ph9659tiih` (`user_id`),
  CONSTRAINT `FK32ql8ubntj5uh44ph9659tiih` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FKpeo9qed87g58smji2403gly7f` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (129,2,3,'2022-03-07 09:42:18','aund@lienvietpostbank.com.vn','2022-03-06 17:00:00','au222 dsffds','0377524660',1,'2022-03-20 17:00:00',964590389.00,121,42,'PAYID-MITLXBA1ML36758DV778361L'),(130,1,1,'2022-03-07 10:04:09','mr.au1992@gmail.com','2022-03-07 17:00:00','Nguyễn Đức Âu','0377524660',1,'2022-03-07 17:00:00',-1882988962.00,122,42,NULL),(131,2,1,'2022-03-07 10:06:18','aund@lienvietpostbank.com.vn','2022-02-28 17:00:00','au222 dsffds','0377524660',1,'2022-03-01 17:00:00',321947747.00,121,42,NULL),(132,2,1,'2022-03-08 00:47:52','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',1,'2022-03-07 17:00:00',6459658.00,117,42,NULL),(133,2,1,'2022-03-08 01:42:50','aund@lienvietpostbank.com.vn','2022-03-06 17:00:00','au222 dsffds','0377524660',1,'2022-03-07 17:00:00',66789789.00,120,42,NULL),(134,2,1,'2022-03-08 01:49:37','mr.au1992@gmail.com','2022-03-07 17:00:00','Nguyễn Đức Âu','0377524660',1,'2022-03-16 17:00:00',3500000.00,118,42,NULL),(135,2,1,'2022-03-08 01:52:07','aund@lienvietpostbank.com.vn','2022-02-28 17:00:00','au222 dsffds','0377524660',1,'2022-03-07 17:00:00',6459658.00,117,42,NULL),(136,2,1,'2022-03-08 01:53:54','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',1,'2022-03-07 17:00:00',1610743455.00,122,42,NULL),(137,2,1,'2022-03-08 02:00:08','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',2,'2022-03-07 17:00:00',776426.00,121,42,'PAYID-MITLY3I4CD787799E083444Y'),(138,2,1,'2022-03-08 02:34:08','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',2,'2022-03-07 17:00:00',6459658.00,117,42,'PAYID-MITMBHY6R0992163S872601P'),(139,2,2,'2022-03-08 02:49:11','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',2,'2022-03-08 17:00:00',926426.00,121,42,'PAYID-MITMI5Y79749677RS083621S'),(140,2,1,'2022-03-10 20:39:36','mr.au1992@gmail.com','2022-02-28 17:00:00','ÂU NGUYỄN ĐỨC','+84377524660',0,'2022-03-07 17:00:00',6459658.00,117,42,'PAYID-MIVGEBY9P67019758138502W');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `start_place`
--

DROP TABLE IF EXISTS `start_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `start_place` (
  `id` int NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `start_place`
--

LOCK TABLES `start_place` WRITE;
/*!40000 ALTER TABLE `start_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `start_place` ENABLE KEYS */;
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
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `id` int NOT NULL,
  `adults_price` decimal(19,2) DEFAULT NULL,
  `child_price` decimal(19,2) DEFAULT NULL,
  `content` text,
  `duration` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` text,
  `title` varchar(255) DEFAULT NULL,
  `vehicle` varchar(255) DEFAULT NULL,
  `destination_place_id` int NOT NULL,
  `start_place_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKnrkvsj2b6r38ohw897d9piaq1` (`destination_place_id`),
  KEY `FK7qp4ytp1sfervuyk6qmb4jq59` (`start_place_id`),
  CONSTRAINT `FK7qp4ytp1sfervuyk6qmb4jq59` FOREIGN KEY (`start_place_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FKnrkvsj2b6r38ohw897d9piaq1` FOREIGN KEY (`destination_place_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (117,3213213.00,33232.00,'<h3>Th&aacute;i Lan - Đất Nước Của Những Nụ Cười</h3>\r\n\r\n<p>Du lịch Th&aacute;i Lan, đất nước thu h&uacute;t du kh&aacute;ch khắp thế giới kh&ocirc;ng chỉ bởi sự hiếu kh&aacute;ch, những nụ cười th&acirc;n thiện; m&agrave; c&ograve;n rất nhiều phong cảnh thi&ecirc;n nhi&ecirc;n tuyệt đẹp, hoang sơ. Du kh&aacute;ch kh&ocirc;ng thể bỏ qua th&agrave;nh phố n&aacute;o nhiệt, trung t&acirc;m mua sắm sầm uất Bangkok hay Th&agrave;nh phố Pattaya với c&aacute;ch hoạt động vui chơi giải tr&iacute; như ch&egrave;o thuyền, bơi lặn, xem box Th&aacute;i. H&atilde;y c&ugrave;ng iVIVU kh&aacute;m ph&aacute; v&ugrave;ng đất tuyệt vời n&agrave;y!</p>\r\n\r\n<h3>Những trải nghiệm th&uacute; vị trong chương tr&igrave;nh</h3>\r\n\r\n<p>Điểm nổi bật:</p>\r\n\r\n<p>- &ldquo;Dạo thuyền tr&ecirc;n d&ograve;ng s&ocirc;ng&nbsp;<strong>Chaophraya&nbsp;Huyền thoại</strong>&rdquo; Xem thuyền Rồng của nh&agrave; vua, xem hiện tượng c&aacute; nổi tr&ecirc;n s&ocirc;ng.</p>\r\n\r\n<p>- Tham quan &ldquo;<strong>C&ocirc;ng vi&ecirc;n khủng long NongNooch</strong>&rdquo; - NongNooch Dinosaur Valley Pattaya. Kh&aacute;m ph&aacute; vườn lan, c&ocirc;ng vi&ecirc;n Khủng long, c&ocirc;ng vi&ecirc;n Xương rồng. Xem show biểu diễn của c&aacute;c ch&uacute; Voi vui nhộn v.v&hellip;</p>\r\n\r\n<p>- Kh&aacute;m ph&aacute; &ldquo;<strong>Đảo San H&ocirc;</strong>&rdquo; - Đảo Coral bằng cano. Tự do tắm biển, thưởng thức hải sản v&agrave; tham gia c&aacute;c tr&ograve; chơi thể thao tr&ecirc;n biển như: lặn biển, lướt v&aacute;n, d&ugrave; bay&hellip;</p>\r\n\r\n<p>- Thưởng thức &ldquo;Buffet tại t&ograve;a nh&agrave; 86 tầng BaiYoke Sky&rdquo; Q&uacute;y kh&aacute;ch chụp ảnh checkin, ngắm nh&igrave;n to&agrave;n cảnh thủ đ&ocirc; Bangkok.</p>\r\n\r\n<p>- Lễ phật c&aacute;c ch&ugrave;a như &ldquo;<strong>Wat Traimit&rdquo;</strong>&nbsp;- Ch&ugrave;a Phật V&agrave;ng lớn nhất thế giới: cao 3 m&eacute;t v&agrave; nặng 5,5 tấn &amp; &ldquo;Wat Phra Yai&rdquo; - Ch&ugrave;a Phật lớn. Tr&ecirc;n đỉnh của Đồi Pratumnak, giữa Pattaya v&agrave; B&atilde;i biển Jomtien v&agrave; &ldquo;Tr&acirc;n Bảo Phật Sơn&rdquo; hay c&ograve;n gọi l&agrave; Khao Chee Chan - N&uacute;i phật khắc v&agrave;ng.</p>\r\n\r\n<h3>Chương tr&igrave;nh tour</h3>\r\n\r\n<p><strong>LƯU &Yacute;</strong>:</p>\r\n\r\n<p>- (Hộ chiếu) Phải c&ograve;n thời hạn sử dụng tr&ecirc;n 6 th&aacute;ng (T&iacute;nh từ ng&agrave;y khởi h&agrave;nh).</p>\r\n\r\n<p>- Kết quả x&eacute;t nghiệm &acirc;m t&iacute;nh với Covid-19 bằng h&igrave;nh thức RT-PCR&nbsp;c&oacute; m&atilde; QR code được cấp trong v&ograve;ng 72h trước khi khởi h&agrave;nh Việt Nam.</p>\r\n\r\n<p>- X&aacute;c nhận ti&ecirc;m ngừa Vaccine Covid-19 đ&atilde; ti&ecirc;m đủ 2 mũi trở l&ecirc;n.</p>\r\n\r\n<p>- Tour kh&ocirc;ng nhận trẻ em từ 5 tuổi trở xuống, nếu nhận b&eacute; phải đủ điều kiện ti&ecirc;m đủ vaccine 2 mũi mới cho tham gia tour.&nbsp;</p>\r\n\r\n<p><strong>Chuyến bay dự kiến</strong>:</p>\r\n\r\n<p>VZ3791 SGN-BKK 13:50 - 15:20<br />\r\nVZ3970 BKK-SGN 10:50 - 12:20</p>\r\n\r\n<h3>NG&Agrave;Y 1: TP.HCM - BANGKOK ( ĂN TỐI)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</h3>\r\n\r\n<p>Trưởng đo&agrave;n đ&oacute;n kh&aacute;ch tại s&acirc;n bay T&acirc;n Sơn Nhất để l&agrave;m thủ tục checkin đ&aacute;p chuyến bay đi Th&aacute;i Lan (Bangkok), Đến vương quốc Th&aacute;i Lan xe v&agrave; HDV đ&oacute;n đo&agrave;n đưa kh&aacute;ch về kh&aacute;ch sạn nhận ph&ograve;ng v&agrave; nghỉ ngơi v&agrave; ăn tối. (TEST COVID TẠI KH&Aacute;CH SẠN LẦN 1).</p>\r\n\r\n<h3>NG&Agrave;Y 2: BANGKOK - DẠO THUYỀN S&Ocirc;NG - KHU VUI CHƠI CANDY - PATTAYA ( ĂN S&Aacute;NG, TRƯA, TỐI)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h3>\r\n\r\n<p>Đo&agrave;n d&ugrave;ng buffet s&aacute;ng tại kh&aacute;ch sạn, L&agrave;m thủ tục trả ph&ograve;ng. Đo&agrave;n khởi h&agrave;nh tham quan &ldquo;<strong>Dạo thuyền tr&ecirc;n d&ograve;ng s&ocirc;ng Chao phraya&nbsp;Huyền thoại</strong>&rdquo; Xem thuyền Rồng của nh&agrave; vua, xem hiện tượng c&aacute; nổi tr&ecirc;n s&ocirc;ng.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2016/08/29/14/ivivu-tour-thai-lan-5n4d-daothuyenchaophraya.jpg\" /></p>\r\n\r\n<p><em>Dạo Thuyền Tr&ecirc;n S&ocirc;ng Chao.</em></p>\r\n\r\n<p>- Tiếp tục tham quan &ldquo;<strong>C&ocirc;ng vi&ecirc;n khủng long NongNooch</strong>&rdquo; Nong Nooch Dinosaur Valley Pattaya, Tại đ&acirc;y Qu&yacute; kh&aacute;ch c&oacute; dịp xem show biểu diễn của c&aacute;c ch&uacute; Voi vui nhộn. (Trường hợp kh&ocirc;ng tr&ugrave;ng giờ show sẽ b&ugrave; qua cho Qu&yacute; kh&aacute;ch ngồi xe điện dạo C&ocirc;ng vi&ecirc;n). Tham quan khu&ocirc;n vi&ecirc;n c&ocirc;ng vi&ecirc;n khủng long, Vườn lan, Xương rồng v.v&hellip;. cảnh đẹp như lạc v&agrave;o thế giới rừng xanh.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2022/02/14/17/ivivu-cong-vien-khung-long.gif\" /></p>\r\n\r\n<p><em>C&ocirc;ng Vi&ecirc;n Khủng Long.</em></p>\r\n\r\n<p>Đo&agrave;n d&ugrave;ng bữa trưa trong c&ocirc;ng vi&ecirc;n.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch tiếp tục viếng&nbsp;<strong>&ldquo;Wat Phra Yai&rdquo; - Ch&ugrave;a Phật lớn</strong>. Nằm tr&ecirc;n đỉnh của Đồi Pratumnak, giữa Pattaya v&agrave; B&atilde;i biển Jomtien, bạn kh&ocirc;ng thể kh&ocirc;ng nhận thấy một bức tượng Phật khổng lồ cao 18 m&eacute;t hiện ra qua những t&aacute;n c&acirc;y, Tượng Phật Lớn n&agrave;y - lớn nhất trong v&ugrave;ng - l&agrave; điểm nổi bật của Wat Phra Yai, một ng&ocirc;i ch&ugrave;a được x&acirc;y dựng v&agrave;o những năm 1940 khi Pattaya chỉ l&agrave; một l&agrave;ng ch&agrave;i, Tượng Phật Lớn cực kỳ nổi tiếng n&oacute; cũng được người d&acirc;n địa phương đến cầu nguyện tại đ&acirc;y.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/11/28/10/ivivu-watprayai.jpg\" /></p>\r\n\r\n<p><em>Ch&ugrave;a Phật Lớn.</em></p>\r\n\r\n<p>- Tiếp tục tham quan &quot;Khu vui chơi Candy&quot; -&nbsp;<strong>Candy Land</strong>, nằm ở Pattaya, c&aacute;ch th&agrave;nh phố Bangkok khoảng một tiếng rưỡi. Khi đến đ&acirc;y, bạn h&atilde;y tưởng tượng như m&igrave;nh đang lạc v&agrave;o xứ sở thần ti&ecirc;n đầy kẹo ngọt, như trong c&aacute;c bộ phim hoạt h&igrave;nh cổ t&iacute;ch của Walt Disney. Kh&ocirc;ng c&ograve;n l&agrave; giấc mơ để ch&uacute;ng ta c&oacute; thể lạc v&agrave;o khu vườn cổ t&iacute;ch đầy kẹo ngọt nữa. Bạn sẽ được v&acirc;y quanh bởi những m&oacute;n ăn đầy ngọt ng&agrave;o v&agrave; cực kỳ dễ thương...&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2022/03/02/14/ivivu-candy-land.gif\" /></p>\r\n\r\n<p><em>Candy Land.</em></p>\r\n\r\n<p>Đo&agrave;n d&ugrave;ng bữa tối, nhận ph&ograve;ng v&agrave; nghỉ ngơi tại Pattaya.</p>\r\n\r\n<p>Buổi tối Qu&yacute; kh&aacute;ch c&oacute; thể tự do kh&aacute;m ph&aacute; c&aacute;c Show biểu diễn nổi tiếng của Th&aacute;i hoặc Tham gia C&acirc;u Mực đ&ecirc;m tr&ecirc;n t&agrave;u C&ocirc;ng Ch&uacute;a Đ&ocirc;ng Phương (chi ph&iacute; tự t&uacute;c).</p>\r\n\r\n<h3>NG&Agrave;Y 3: PATTAYA - ĐẢO CORAL - TR&Acirc;N BẢO PHẬT SƠN ( ĂN S&Aacute;NG, TRƯA, TỐI)</h3>\r\n\r\n<p>Đo&agrave;n d&ugrave;ng bữa s&aacute;ng tại kh&aacute;ch sạn, sau đ&oacute; khởi h&agrave;nh đi &ldquo;<strong>Đảo San H&ocirc;</strong>&rdquo; Đảo Coral bằng cano, Đến đảo đo&agrave;n tự do tắm biển hoặc tham gia c&aacute;c tr&ograve; chơi tự t&uacute;c tr&ecirc;n biển như: Tự l&aacute;i Can&ocirc;, lặn biển, lướt v&aacute;n, d&ugrave; bay vv&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2016/08/25/17/ivivu-tour-thai-lan-5n4d-coralisland.jpg\" /></p>\r\n\r\n<p><em>Đảo Coral.</em></p>\r\n\r\n<p>Sau đ&oacute; đo&agrave;n d&ugrave;ng bữa trưa.</p>\r\n\r\n<p>Tiếp tục tham quan&nbsp;<strong>&ldquo;Tr&acirc;n Bảo Phật Sơn&rdquo;</strong>&nbsp;hay c&ograve;n gọi l&agrave; Khao Chee Chan, nơi được tạo n&ecirc;n nh&acirc;n dịp kỷ niệm 50 năm đăng cơ của nh&agrave; vua Th&aacute;i Lan. L&agrave; một ngọn n&uacute;i đẹp nổi tiếng nằm ở tỉnh Chon Buri, c&aacute;ch Pattaya - thi&ecirc;n đường biển đảo Th&aacute;i Lan chỉ khoảng 15 km, Nổi bật giữa thi&ecirc;n nhi&ecirc;n h&ugrave;ng vĩ v&agrave; vẻ đẹp hoang sơ của thi&ecirc;n nhi&ecirc;n l&agrave; bức tượng nổi Th&iacute;ch Ca M&acirc;u Ni Phật đang ngồi tọa thiền được tạc tr&ecirc;n v&aacute;ch n&uacute;i cao, Bức tượng cao đến hơn 100 m&eacute;t, rộng khoảng 70 m&eacute;t, được đ&uacute;c nổi ho&agrave;n to&agrave;n bằng v&agrave;ng r&ograve;ng 24 cara, được tiến h&agrave;nh x&acirc;y dựng v&agrave;o năm 1996 nh&acirc;n dịp Quốc vương Rama IX trị v&igrave; vương quốc Th&aacute;i Lan được 50 năm.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/10/03/11/ivivu-tran-bao-phat-son1.jpg\" /></p>\r\n\r\n<p><em>Tr&acirc;n Bảo Phật Sơn.</em></p>\r\n\r\n<p>Buổi chiều, Qu&yacute; kh&aacute;ch c&oacute; thể Đăng k&yacute; Option mua &ldquo;Massage Th&aacute;i cổ truyền&rdquo;&nbsp;gi&uacute;p lưu th&ocirc;ng kh&iacute; huyết (Chi ph&iacute; tự t&uacute;c).</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch d&ugrave;ng Bữa Tối. Nghỉ đ&ecirc;m tại tại Pattaya.</p>\r\n\r\n<h3>NG&Agrave;Y 4: PATTAYA - BANGKOK ( ĂN S&Aacute;NG, ĂN TRƯA)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h3>\r\n\r\n<p>Đo&agrave;n d&ugrave;ng điểm t&acirc;m s&aacute;ng tại kh&aacute;ch sạn. L&agrave;m thủ tục trả ph&ograve;ng, sau đ&oacute; khởi h&agrave;nh về&nbsp;<strong>Bangkok</strong></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch tiếp tục viếng&nbsp;<strong>&ldquo;Wat Traimit&rdquo;</strong>&nbsp;- Ch&ugrave;a Phật V&agrave;ng lớn nhất thế giới: cao 3 m&eacute;t v&agrave; nặng 5,5 tấn. Tượng được đ&uacute;c theo phong c&aacute;ch Sukhothai tĩnh lặng v&agrave; được kh&aacute;m ph&aacute; một c&aacute;ch t&igrave;nh cờ v&agrave;o thập ni&ecirc;n 1950.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2020/06/11/14/ivivu-chua-phat-vang-wat.gif\" /></p>\r\n\r\n<p><em>Ch&ugrave;a Phật V&agrave;ng.</em></p>\r\n\r\n<p>Đo&agrave;n ăn trưa &ldquo;<strong>Buffet tại t&ograve;a nh&agrave; 86 tầng BaiYoke Sky&rdquo;</strong>&nbsp;Q&uacute;y kh&aacute;ch chụp ảnh, ngắm nh&igrave;n to&agrave;n cảnh thủ đ&ocirc; Bangkok.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/08/21/11/ivivu-baiyoke-sky.jpg\" /></p>\r\n\r\n<p><em>BaiYoke Sky.</em></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch viếng&nbsp;<strong>&ldquo;Phật Bốn mặt&rdquo;</strong>&nbsp;- Tứ Diện Thần ngay trung t&acirc;m Bangkok. Sau đ&oacute; Qu&yacute; kh&aacute;ch tự do mua sắm tại si&ecirc;u thị Big C hoặc tự do kh&aacute;m ph&aacute; c&aacute;c khu mua sắm sầm uất kh&aacute;c ngay trung t&acirc;m Partunam như: MBK, Central World, v.v....</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/12/18/14/ivivu-phat-bon-mat.gif\" /></p>\r\n\r\n<p><em>Phật Bốn Mặt.</em></p>\r\n\r\n<p>Tự t&uacute;c kh&aacute;m ph&aacute; c&aacute;c m&oacute;n địa phương tại Trung t&acirc;m Bangkok.</p>\r\n\r\n<h3>NG&Agrave;Y 5: BANGKOK - FREE DAY - TỰ DO MUA SẮM ( ĂN S&Aacute;NG)</h3>\r\n\r\n<p>Sau khi ăn s&aacute;ng, Qu&yacute; kh&aacute;ch tự do mua sắm tại c&aacute;c si&ecirc;u thị lớn như World Trade Centre, Maboonkrong, MBK, Big C, khu chợ sỉ Pratunam Market, Rachada Sago&hellip;. (Ăn trưa v&agrave; tối tự t&uacute;c)</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/12/18/14/ivivu-chua-binh-minh-thai.gif\" /></p>\r\n\r\n<p><em>Tự Do Kh&aacute;m Ph&aacute; Đất Th&aacute;i.</em></p>\r\n\r\n<p>Nghỉ đ&ecirc;m tại Bangkok. (TEST COVID TẠI KH&Aacute;CH SẠN LẦN 2).</p>\r\n\r\n<h3>NG&Agrave;Y 6: BANGKOK - TP.HCM ( ĂN S&Aacute;NG)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</h3>\r\n\r\n<p>Sau khi ăn s&aacute;ng, Qu&yacute; kh&aacute;ch tự do, đến giờ hẹn Đo&agrave;n l&agrave;m thủ tục trả ph&ograve;ng.</p>\r\n\r\n<p>Xe đưa Qu&yacute; Kh&aacute;ch ra s&acirc;n bay đ&aacute;p chuyến bay về TP.HCM.</p>\r\n\r\n<p><em>Thứ tự tham quan c&oacute; thể thay đổi nhưng vẫn đảm bảo đầy đủ điểm trong chương tr&igrave;nh.</em></p>\r\n',2,'destination-4.jpg_1646638391335','adsadsadsa','Tour Thái Lan 6N5D: Bangkok - Pattaya','oto',83,82),(118,1500000.00,500000.00,'<h3>H&agrave;nh Tr&igrave;nh Li&ecirc;n Tuyến T&acirc;y Nguy&ecirc;n - Th&agrave;nh Phố Biển Kỳ Th&uacute;</h3>\r\n\r\n<p>Bạn sẽ bị chinh phục ngay từ &aacute;nh nh&igrave;n đầu ti&ecirc;n khi đặt ch&acirc;n đến nơi được gọi l&agrave; Đ&agrave; Lạt thứ 2 &ndash; Măng Đen, bạn sẽ sững sờ trước vẻ đẹp của Th&aacute;c Ba Sỹ, của Hồ Đắk Ke, v&agrave; thưởng thức được n&eacute;t duy&ecirc;n ngầm của c&aacute;c lo&agrave;i hoa đẹp nơi đại ng&agrave;n bao la.</p>\r\n\r\n<p>Sau đ&oacute; h&agrave;nh tr&igrave;nh sẽ đưa bạn đến v&ugrave;ng đất v&otilde; B&igrave;nh Định, với l&agrave;ng ch&agrave;i Nhơn L&yacute;, với nơi đ&oacute;n &aacute;nh b&igrave;nh minh v&agrave; ho&agrave;ng h&ocirc;n đẹp nhất Việt Nam &ndash; Eo Gi&oacute;, với tượng Phật ch&ugrave;a &Ocirc;ng N&uacute;i, với bảo t&agrave;ng Quang Trung, với Th&aacute;p Đ&ocirc;i, với KDL Ghềnh R&aacute;ng v&agrave; một ch&uacute;t b&ugrave;i ng&ugrave;i khi gh&eacute; thăm mộ Thi Sĩ H&agrave;n Mạc Tử. C&ugrave;ng iVIVU kh&aacute;m ph&aacute; ngay h&ocirc;m nay1&nbsp;</p>\r\n\r\n<h3>Những trải nghiệm th&uacute; vị trong chương tr&igrave;nh</h3>\r\n\r\n<p>H&agrave;nh tr&igrave;nh li&ecirc;n tuyến&nbsp;<strong>Măng Đen - Quy Nhơn</strong>&nbsp;k&yacute; th&uacute;:&nbsp;</p>\r\n\r\n<p>- Kh&aacute;m Ph&aacute;&nbsp;<strong>Eo Gi&oacute; - Đảo Kỳ Co</strong></p>\r\n\r\n<p>-&nbsp;<strong>Ghềnh R&aacute;ng - B&atilde;i Tắm Ho&agrave;ng Hậu</strong>, Ch&ugrave;a &Ocirc;ng N&uacute;i</p>\r\n\r\n<p>-&nbsp;<strong>Đức Mẹ Măng Đen</strong></p>\r\n\r\n<p>-&nbsp;<strong>Th&aacute;c Pa Sỹ, Hồ Đak Ke</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Chương tr&igrave;nh tour</h3>\r\n\r\n<p><strong>ĐIỂM Đ&Oacute;N KH&Aacute;CH</strong>:</p>\r\n\r\n<p>18h00: Đ&oacute;n kh&aacute;ch tại 367 T&acirc;n Sơn, Phường 15, Quận T&acirc;n B&igrave;nh</p>\r\n\r\n<p>18h30: Đ&oacute;n kh&aacute;ch tại Trường Đại Học Hồng B&agrave;ng, 03 Ho&agrave;ng Việt, Phường 4, Quận T&acirc;n B&igrave;nh (C&oacute; chỗ gửi xe qua đ&ecirc;m: b&atilde;i xe nh&agrave; h&agrave;ng Hoa Sứ của kh&aacute;ch sạn Đệ Nhất)</p>\r\n\r\n<p>19h00: Đ&oacute;n kh&aacute;ch tại Nh&agrave; Văn H&oacute;a Thanh Ni&ecirc;n, 04 Phạm Ngọc Thạch, Phường Bến Ngh&eacute;, Quận 1.</p>\r\n\r\n<p>19h15: Đ&oacute;n kh&aacute;ch tại C&acirc;y xăng Comeco, Ng&atilde; 4 H&agrave;nh Xanh, Phường 21, Quận B&igrave;nh Thạnh.</p>\r\n\r\n<p>20h00: Đ&oacute;n kh&aacute;ch tại ng&atilde; 3 Sở Sao, Th&agrave;nh phố Thủ Dầu Một, B&igrave;nh Dương.</p>\r\n\r\n<h3>Đ&Ecirc;M 01: TP HỒ CH&Iacute; MINH - MĂNG ĐEN&nbsp;</h3>\r\n\r\n<p>Buổi tối: 17h00: Xe v&agrave; hướng dẫn vi&ecirc;n c&ocirc;ng ty đ&oacute;n đo&agrave;n, rời&nbsp;<strong>TP Hồ Ch&iacute; Minh</strong>&nbsp;theo QL14 đi&nbsp;<strong>Măng Đen</strong>&nbsp;qua S<strong>&oacute;c Bombo, B&ugrave; Đăng, đường m&ograve;n Hồ Ch&iacute; Minh,</strong>&nbsp;qu&yacute; kh&aacute;ch nghỉ đ&ecirc;m tr&ecirc;n xe.</p>\r\n\r\n<h3>NG&Agrave;Y 1: KH&Aacute;M PH&Aacute; MĂNG ĐEN ( ĂN S&Aacute;NG, TRƯA, TỐI)</h3>\r\n\r\n<p>Buổi s&aacute;ng: 07h30: Đo&agrave;n d&ugrave;ng điểm t&acirc;m tại&nbsp;<strong>Gia Lai</strong>, sau đ&oacute; tiếp tục h&agrave;nh tr&igrave;nh đến với&nbsp;<strong>Măng Đen.</strong></p>\r\n\r\n<p>09h30: Đo&agrave;n tham quan&nbsp;<strong>Nh&agrave; Thờ Gỗ Kom Tum</strong>&nbsp;tr&ecirc;n 100 tuổi - l&agrave; biểu tượng của v&ugrave;ng đất&nbsp;<strong>T&acirc;y Nguy&ecirc;n</strong>, l&agrave; niềm tự h&agrave;o của người d&acirc;n th&agrave;nh phố<strong>&nbsp;Kon Tum</strong>&nbsp;v&agrave; lu&ocirc;n c&oacute; sức h&uacute;t m&atilde;nh liệt cho những du kh&aacute;ch đến với v&ugrave;ng cao nguy&ecirc;n bạt ng&agrave;n.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2018/03/22/17/ivivu-nha-tho-go-kom-tum.jpg\" /></p>\r\n\r\n<p><em>Nh&agrave; Thờ Gỗ Kon Tum.</em></p>\r\n\r\n<p>11h30: Đo&agrave;n đến với&nbsp;<strong>Măng Đen</strong>&nbsp;- nơi được mệnh danh l&agrave; &ldquo;Đ&agrave; Lạt thứ 2&rdquo; của&nbsp;<strong>Việt Nam</strong>. Điểm đến n&agrave;y rất đ&aacute;ng để đi bởi kh&ocirc;ng kh&iacute; rất dễ chịu m&aacute;t mẻ quanh năm, điểm t&ocirc; v&agrave;o đ&oacute; l&agrave; n&eacute;t đẹp c&ograve;n nguy&ecirc;n sơ của cao nguy&ecirc;n đại ng&agrave;n, của rừng th&ocirc;ng đầy quyến rũ v&agrave; nơi xứ sở của hồ của th&aacute;c,&nbsp;<strong>Măng Đen</strong>&nbsp;c&oacute; đến 7 hồ v&agrave; 3 th&aacute;c đẹp tuyệt vời. Ngo&agrave;i ra đ&acirc;y c&ograve;n l&agrave; nơi vẫn c&ograve;n lưu giữ n&eacute;t văn h&oacute;a bản địa mộc mạc khiến cho du kh&aacute;ch kh&ocirc;ng khỏi bở ngỡ v&agrave; t&ograve; m&ograve;. Đo&agrave;n d&ugrave;ng cơm trưa v&agrave; nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2019/10/07/09/ivivu-mang-den1.jpg\" /></p>\r\n\r\n<p><em>Măng Đen.</em></p>\r\n\r\n<p>Buổi chiều:</p>\r\n\r\n<p>14h00: Xe đưa qu&yacute; kh&aacute;ch tham quan&nbsp;Khu du lịch&nbsp;<strong>th&aacute;c Pa Sĩ</strong>,&nbsp;cầu treo d&acirc;y văng&nbsp;lệch nhịp duy nhất Miền Trung - T&acirc;y Nguy&ecirc;n; tham quan&nbsp;th&aacute;c&nbsp;<strong>Đăk Ke</strong>&nbsp;v&agrave;<strong>&nbsp;hồ Đăk Ke.&nbsp;</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://cdn2.ivivu.com/2018/11/29/11/ivivu-khu-du-lich-thac-pa-si.jpg\" /></strong></p>\r\n\r\n<p><em>KDL Th&aacute;c Pa Sĩ.</em></p>\r\n\r\n<p>15h30: Qu&yacute; kh&aacute;ch tham quan ch&ugrave;a&nbsp;<strong>Kh&aacute;nh L&acirc;m</strong>&nbsp;- nơi thiền định giữa rừng thi&ecirc;ng, sau đ&oacute; tham quan&nbsp;<strong>Đức mẹ Măng Đen.&nbsp;</strong></p>\r\n\r\n<p>&nbsp;<img alt=\"\" src=\"https://cdn2.ivivu.com/2020/12/17/14/ivivu-chua-khanh-lam.gif\" /></p>\r\n\r\n<p><em>Ch&ugrave;a Kh&aacute;nh L&acirc;m.</em></p>\r\n\r\n<p>18h00: Đo&agrave;n d&ugrave;ng cơm tối tại nh&agrave; h&agrave;ng với c&aacute;c m&oacute;n đặc sản n&uacute;i rừng, nghỉ đ&ecirc;m tại&nbsp;<strong>Măng Đen.</strong></p>\r\n\r\n<h3>NG&Agrave;Y 2: MĂNG ĐEN - QUY NHƠN ( ĂN S&Aacute;NG, TRƯA, TỐI)</h3>\r\n\r\n<p>Buổi s&aacute;ng: 06h00: Qu&yacute; kh&aacute;ch d&ugrave;ng điểm t&acirc;m tại nh&agrave; h&agrave;ng, sau đ&oacute; l&agrave;m thủ tục trả ph&ograve;ng kh&aacute;ch sạn.</p>\r\n\r\n<p>09h30: Đến với&nbsp;<strong>Gia Lai</strong>, đo&agrave;n tham quan thủy điện Yaly,&nbsp;<strong>Biển Hồ</strong>&nbsp;- một địa danh nổi tiếng của Pleiku nơi m&agrave; được nhạc sĩ&nbsp;<strong>Nguyễn Cường</strong>&nbsp;đưa v&agrave;o b&agrave;i h&aacute;t rất nổi tiếng &ldquo;Đ&ocirc;i mắt Pleiku Biển Hồ Đầy&rdquo;.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2020/12/17/14/ivivu-thuy-dien-yaly.gif\" />&nbsp;</p>\r\n\r\n<p><em>Thủy Điện Yaly.</em></p>\r\n\r\n<p>11h30: Đo&agrave;n d&ugrave;ng buổi trưa tai nh&agrave; h&agrave;ng.</p>\r\n\r\n<p>Buổi chiều:</p>\r\n\r\n<p>12h30: Qu&yacute; kh&aacute;ch khởi h&agrave;nh xuống&nbsp;<strong>Quy Nhơn.</strong></p>\r\n\r\n<p>16h30: Qu&yacute; kh&aacute;ch nhận ph&ograve;ng kh&aacute;ch sạn nghỉ ngơi, d&ugrave;ng buổi tối nơi phố biển.</p>\r\n\r\n<h3>NG&Agrave;Y 3: QUY NHƠN - KỲ CO - EO GI&Oacute; - CH&Ugrave;A &Ocirc;NG N&Uacute;I ( ĂN S&Aacute;NG, TRƯA)</h3>\r\n\r\n<p>08h00: Q&uacute;y kh&aacute;ch d&ugrave;ng điểm t&acirc;m, sau đ&oacute; xe đưa đo&agrave;n tham quan kh&aacute;m ph&aacute; điểm mới&nbsp;<strong>Quy Nhơn.</strong></p>\r\n\r\n<p>Đo&agrave;n đến với Nhơn L&yacute; nh&igrave;n ngắm l&agrave;ng ch&agrave;i v&agrave; cuộc sống của ngư d&acirc;n miền biển.</p>\r\n\r\n<p>09h00: Đo&agrave;n tham quan&nbsp;<strong>Eo Gi&oacute;</strong>&nbsp;&ndash; Thắng cảnh nổi tiếng tại&nbsp;<strong>Quy Nhơn</strong>, được mệnh danh l&agrave; nơi đ&oacute;n b&igrave;nh minh v&agrave;&nbsp;ho&agrave;ng h&ocirc;n&nbsp;đẹp nhất Việt Nam, khung cảnh l&agrave; l&yacute; giải cho t&ecirc;n gọi của khu vực n&agrave;y. Những rặng n&uacute;i đ&aacute; cao mang nhiều h&igrave;nh th&ugrave; lạ mắt &ocirc;m trọn biển xanh trong v&ograve;ng tay tạo th&agrave;nh một eo biển h&uacute;t gi&oacute; tuyệt đẹp. Đứng từ tr&ecirc;n c&aacute;c mỏm đ&aacute; xung quanh nh&igrave;n xuống bạn sẽ thu v&agrave;o mắt một khung cảnh như tranh vẽ. Nơi đ&acirc;y l&agrave; chốn l&yacute; tưởng để săn những bức ảnh đặc sắc ấn tượng. Kh&ocirc;ng kh&iacute; ở đ&acirc;y v&ocirc; c&ugrave;ng y&ecirc;n tĩnh tạo cảm gi&aacute;c thong dong, thư thả trước đất trời bao la.</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2020/11/25/14/ivivu-eo-gio.gif\" /></p>\r\n\r\n<p><em>Eo Gi&oacute;.</em></p>\r\n\r\n<p>10h00: Tượng Phật ch&ugrave;a&nbsp;<strong>&Ocirc;ng N&uacute;i Quy Nhơn B&igrave;nh Định</strong>&nbsp;&nbsp;&ndash; Dự &aacute;n Đại Phật Tượng &ndash; Trung t&acirc;m Phật ph&aacute;p.</p>\r\n\r\n<p><strong>Linh Phong B&igrave;nh Định (huy&ecirc;̣n Phù Cát)</strong>&nbsp;đ&atilde; cơ bản ho&agrave;n th&agrave;nh phần tượng Phật, được kỳ vọng sẽ l&agrave; một điểm đến mới của du lịch Quy Nhơn, B&igrave;nh Định trong năm 2018. Với chiều cao 69 m, đường k&iacute;nh ch&acirc;n tượng 52 m, tọa lạc tr&ecirc;n N&uacute;i B&agrave; ở độ cao 120 m, đ&acirc;y là tượng Phật Th&iacute;ch Ca tạo dáng ở tư th&ecirc;́ ngồi cao nhất Đ&ocirc;ng Nam &Aacute; hiện nay.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn2.ivivu.com/2020/12/17/14/ivivu-chua-ong-nui-quy-nhon.jpg\" /></p>\r\n\r\n<p><em>Ch&ugrave;a &Ocirc;ng N&uacute;i.</em></p>\r\n\r\n<p>10h30: Qu&yacute; kh&aacute;ch&nbsp;l&ecirc;n Cano qua&nbsp;<strong>Biển Kỳ Co</strong>&nbsp;nằm dưới ch&acirc;n d&atilde;y n&uacute;i Phương Mai sừng sững thuộc x&atilde; b&aacute;n đảo&nbsp;<strong>Nhơn L&yacute;, TP Quy Nhơn</strong>, b&atilde;i tắm hoang sơ&nbsp;<strong>Kỳ Co</strong>&nbsp;đẹp tựa một bức tranh vừa n&ecirc;n thơ vừa h&ugrave;ng vĩ. Nơi đ&acirc;y hấp dẫn du kh&aacute;ch, đặc biệt l&agrave; những người ưa du lịch kh&aacute;m ph&aacute;, bởi kh&ocirc;ng chỉ c&oacute; cảnh đẹp l&agrave;m say l&ograve;ng người m&agrave; c&ograve;n biết bao điều th&uacute; vị.&nbsp;Một h&ograve;n đảo rất hoang sơ, c&oacute; b&atilde;i biển c&aacute;t trắng mịn, nước biển trong xanh như pha l&ecirc;.&nbsp;Qu&yacute; kh&aacute;ch sẽ th&iacute;ch th&uacute; trước vẻ đẹp thi&ecirc;n nhi&ecirc;n hoang sơ v&agrave;&nbsp;kỳ vỹ nơi đ&acirc;y.&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;<img alt=\"\" src=\"https://cdn2.ivivu.com/2020/11/25/15/ivivu-bai-tam-ky-co.gif\" /></p>\r\n\r\n<p><em>Biển Kỳ Co.</em></p>\r\n\r\n<p>12h00: Qu&yacute; kh&aacute;ch l&ecirc;n cano về lại nh&agrave; h&agrave;ng, tắm nước ngọt, thưởng thức bữa trưa với những m&oacute;n hải sản tươi sống độc đ&aacute;o, hương vị được chế biến nguy&ecirc;n chất của d&acirc;n ch&agrave;i địa phương như: t&ocirc;m, c&aacute;, mực, ốc, b&agrave;o ngư, s&uacute;p rong biển&hellip; Thực đơn c&oacute; một số m&oacute;n c&oacute; thể thay đổi theo m&ugrave;a, mong qu&yacute; kh&aacute;ch th&ocirc;ng cảm</p>\r\n\r\n<p>Buổi chiều: 15h00 Qu&yacute; kh&aacute;ch trở về kh&aacute;ch sạn, nghỉ ngơi.</p>\r\n\r\n<p>16h30: Xe chở đo&agrave;n đi tham quan, mua sắm tại chợ&nbsp;<strong>Quy Nhơn</strong>, kh&aacute;m ph&aacute; ẩm thực tại chợ: B&aacute;nh x&egrave;o, B&aacute;nh hỏi l&ograve;ng heo, ch&egrave; nhớ, b&uacute;n sứa, b&aacute;nh căn &hellip;&hellip;&hellip;&hellip; ( Buổi tối đo&agrave;n tự t&uacute;c)</p>\r\n\r\n<h3>NG&Agrave;Y 4: QUY NHƠN &ndash; TP HCM ( ĂN S&Aacute;NG, TRƯA)</h3>\r\n\r\n<p>06h00: Qu&yacute; kh&aacute;ch trả ph&ograve;ng kh&aacute;ch sạn, d&ugrave;ng điểm t&acirc;m s&aacute;ng.</p>\r\n\r\n<p>07h00: Xe khởi h&agrave;nh đưa qu&yacute; kh&aacute;ch trở về TP HCM.</p>\r\n\r\n<p>12h30: D&ugrave;ng buối trưa tại&nbsp;<strong>C&agrave; N&aacute;</strong>. Sau đ&oacute; đo&agrave;n khởi h&agrave;nh về lại&nbsp;<strong>TP HCM</strong>, tạm biệt v&agrave; hẹn gặp lại qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p><em>C&aacute;c điểm tham quan trong chương tr&igrave;nh c&oacute; thể thay đổi để ph&ugrave; hợp với t&igrave;nh h&igrave;nh thực tế, nhưng vẫn đảm bảo đầy đủ c&aacute;c điểm tham quan.</em></p>\r\n',4,'destination-5.jpg_1646638399327','gfdgfd','Tour Liên Tuyến 4N4D: Măng Đen','oto',81,3),(120,3333333.00,123123.00,'<p>sdadsadsadsa</p>\r\n',4,'destination-6.jpg_1646638409171','dsa','dsadsa','3213',83,82),(121,313213.00,150000.00,'<p>3213dsadsa</p>\r\n',123,'destination-2.jpg_1646638435364','fsdfsd','hgfdgd','21321',83,82),(122,500000.00,200000.00,'<p>sfdfsd</p>\r\n',3210,'destination-4.jpg_1646638428714','fgdgfdgd','gfdgfd','321',83,82);
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'$2a$12$ImoMz9moOjl5EuddnR8Voe1SldrTgDJm.8lnA8fl9DcfIruqpLjS6','ADMIN','admin',1,NULL),(42,'$2a$12$.lcs1cuyN.RXoNq.wGFt1OWTLi4nYOCiXwXXf96t5tBWTJ8He/J6S','USER','user02@gmail.com',1,NULL),(70,'$2a$12$a1eCQ7.AAGEZzYLYjI0f8.MqrXkbagXPmOUhbL9LWipcbi9h/41PO','USER','user03@gmail.com',1,NULL),(99,'$2a$12$2C6MRjuKySiQIGNv0eTpZ.AP81Cv.Di1Gxl2EZTccXH9UK25V6g0e','USER','mr.au1992@gmail.com',0,'78YicjpeNxu8ipOfh9GtWoCxAlILzdR6f8oBxLWSwFGgppgHNdRBp1gNZD039Wbw');
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

-- Dump completed on 2022-03-18 20:11:30
