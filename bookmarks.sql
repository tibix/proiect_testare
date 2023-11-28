-- MariaDB dump 10.19  Distrib 10.9.3-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bookmarks
-- ------------------------------------------------------
-- Server version	10.9.3-MariaDB

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
-- Table structure for table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `URL` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT NULL,
  `owner_id` int(11) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookmarks_users` (`owner_id`),
  KEY `fk_bookmarks_categories` (`category_id`) USING BTREE,
  CONSTRAINT `FK_bookmarks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_bookmarks_users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmarks`
--

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;
INSERT INTO `bookmarks` VALUES
(1,'Google','https://www.google.com','Google','2023-11-18 13:49:47',NULL,3,1),
(2,'Facebook','https://facebook.com','The largest social platform ever','2023-11-22 12:47:37','2023-11-23 16:37:28',1,5),
(3,'Twitter','https://twitter.com','Twitter','2023-11-18 13:49:47',NULL,2,1),
(4,'GitHub','https://github.com','GitHub','2023-11-18 13:49:47',NULL,3,1),
(5,'LinkedIn','https://www.linkedin.com','LinkedIn','2023-11-18 13:49:47',NULL,2,1),
(6,'Reddit','https://www.reddit.com','Reddit','2023-11-18 13:49:47',NULL,5,1),
(7,'YouTube','https://www.youtube.com','YouTube','2023-11-18 13:49:47',NULL,5,1),
(8,'Stack Overflow','https://stackoverflow.com','Stack Overflow','2023-11-18 13:49:47',NULL,3,1),
(9,'Wikipedia','https://www.wikipedia.org','Wikipedia','2023-11-18 13:49:47',NULL,4,1),
(10,'Medium','https://medium.com','Medium','2023-11-18 13:49:47',NULL,3,1),
(11,'Netflix','https://www.netflix.com','Netflix','2023-11-18 13:49:47',NULL,5,1),
(12,'Amazon','https://www.amazon.com','Amazon','2023-11-18 13:49:47',NULL,3,1),
(13,'Etsy','https://www.etsy.com','Etsy','2023-11-18 13:49:47',NULL,3,1),
(14,'Instagram','https://www.instagram.com','Instagram','2023-11-18 13:49:47',NULL,2,1),
(15,'Pinterest','https://www.pinterest.com','Pinterest','2023-11-18 13:49:47',NULL,2,1),
(16,'Snapchat','https://www.snapchat.com','Snapchat','2023-11-18 13:49:47',NULL,3,1),
(17,'Tumblr','https://www.tumblr.com','Tumblr','2023-11-18 13:49:47',NULL,4,1),
(18,'Spotify','https://www.spotify.com','Spotify','2023-11-18 13:49:47',NULL,4,1),
(19,'Adobe','https://www.adobe.com','Adobe','2023-11-18 13:49:47',NULL,2,1),
(20,'Microsoft','https://www.microsoft.com','Microsoft','2023-11-18 13:49:47',NULL,3,1),
(21,'Apple','https://www.apple.com','Apple','2023-11-18 13:49:47',NULL,5,1),
(22,'CNN','https://www.cnn.com','CNN','2023-11-18 13:49:47',NULL,5,1),
(23,'BBC','https://www.bbc.com','BBC','2023-11-18 13:49:47','2023-11-23 15:28:39',1,3),
(24,'National Geographic','https://www.nationalgeographic.com','National Geographic','2023-11-18 13:49:47',NULL,1,3),
(25,'The New York Times','https://www.nytimes.com','The New York Times','2023-11-18 13:49:47',NULL,2,1),
(26,'The Guardian','https://www.theguardian.com','The Guardian','2023-11-18 13:49:47',NULL,5,1),
(27,'Forbes','https://www.forbes.com','Forbes','2023-11-18 13:49:47',NULL,4,1),
(28,'TechCrunch','https://techcrunch.com','TechCrunch','2023-11-18 13:49:47',NULL,3,1),
(29,'Ars Technica','https://arstechnica.com','Ars Technica','2023-11-18 13:49:47',NULL,2,1),
(30,'The Verge','https://www.theverge.com','The Verge','2023-11-18 13:49:47',NULL,1,5),
(31,'Hacker News','https://news.ycombinator.com','Hacker News','2023-11-18 13:49:47',NULL,4,1),
(32,'Product Hunt','https://www.producthunt.com','Product Hunt','2023-11-18 13:49:47',NULL,1,2),
(33,'Awwwards','https://www.awwwards.com','Awwwards','2023-11-18 13:49:47',NULL,2,1),
(34,'Dribbble','https://dribbble.com','Dribbble','2023-11-18 13:49:47',NULL,3,1),
(35,'Behance','https://www.behance.net','Behance','2023-11-18 13:49:47',NULL,3,1),
(36,'Smashing Magazine','https://www.smashingmagazine.com','Smashing Magazine','2023-11-18 13:49:47',NULL,3,1),
(37,'CodePen','https://codepen.io','CodePen','2023-11-18 13:49:47',NULL,2,1),
(38,'Mozilla Developer Network','https://developer.mozilla.org','Mozilla Developer Network','2023-11-18 13:49:47',NULL,3,1),
(39,'Google Developers','https://developers.google.com','Google Developers','2023-11-18 13:49:47',NULL,5,1),
(40,'CSS-Tricks','https://css-tricks.com','CSS-Tricks','2023-11-18 13:49:47',NULL,5,1),
(41,'W3Schools','https://www.w3schools.com','W3Schools','2023-11-18 13:49:47',NULL,2,1),
(42,'Dev.to','https://dev.to','Dev.to','2023-11-18 13:49:47',NULL,5,1),
(43,'FreeCodeCamp','https://www.freecodecamp.org','FreeCodeCamp','2023-11-18 13:49:47',NULL,3,1),
(44,'Coursera','https://www.coursera.org','Coursera','2023-11-18 13:49:47',NULL,1,3),
(45,'edX','https://www.edx.org','edX','2023-11-18 13:49:47',NULL,4,1),
(46,'Khan Academy','https://www.khanacademy.org','Khan Academy','2023-11-18 13:49:47',NULL,1,3),
(47,'Duolingo','https://www.duolingo.com','Duolingo','2023-11-18 13:49:47',NULL,4,1),
(48,'TED','https://www.ted.com','TED','2023-11-18 13:49:47',NULL,2,1),
(49,'Wolfram Alpha','https://www.wolframalpha.com','Wolfram Alpha','2023-11-18 13:49:47',NULL,1,3),
(50,'SpaceX','https://www.spacex.com','SpaceX','2023-11-18 13:49:47',NULL,3,1),
(51,'NASA','https://www.nasa.gov','NASA','2023-11-18 13:49:47',NULL,2,1),
(52,'Tesla','https://www.tesla.com','Tesla','2023-11-18 13:49:47',NULL,4,1),
(53,'Wired','https://www.wired.com','Wired','2023-11-18 13:49:47',NULL,5,1),
(57,'Mozilla','https://www.mozilla.org','Mozilla','2023-11-18 13:53:26',NULL,4,1),
(58,'Unsplash','https://unsplash.com','Unsplash','2023-11-18 13:53:26',NULL,5,1),
(59,'Pexels','https://www.pexels.com','Pexels','2023-11-18 13:53:26',NULL,1,5),
(60,'Pixabay','https://pixabay.com','Pixabay','2023-11-18 13:53:26',NULL,4,1),
(61,'DuckDuckGo','https://duckduckgo.com','DuckDuckGo','2023-11-18 13:53:26',NULL,1,7),
(62,'The Onion','https://www.theonion.com','The Onion','2023-11-18 13:53:26',NULL,3,1),
(63,'Craigslist','https://www.craigslist.org','Craigslist','2023-11-18 13:53:26',NULL,4,1),
(64,'IMDb','https://www.imdb.com','IMDb','2023-11-18 13:53:26',NULL,1,6),
(65,'Rotten Tomatoes','https://www.rottentomatoes.com','Rotten Tomatoes','2023-11-18 13:53:26','2023-11-23 17:28:31',1,2),
(66,'Metacritic','https://www.metacritic.com','Metacritic','2023-11-18 13:53:26',NULL,2,1),
(67,'Goodreads','https://www.goodreads.com','Goodreads','2023-11-18 13:53:26',NULL,5,1),
(68,'Last.fm','https://www.last.fm','Last.fm','2023-11-18 13:53:26',NULL,3,1),
(69,'Splice','https://splice.com','Splice','2023-11-18 13:53:26',NULL,1,1),
(70,'Figma','https://www.figma.com','Figma','2023-11-18 13:53:26',NULL,1,7),
(71,'Adobe Stock','https://stock.adobe.com','Adobe Stock','2023-11-18 13:53:26',NULL,5,1),
(72,'Sketch','https://www.sketch.com','Sketch','2023-11-18 13:53:26',NULL,3,1),
(73,'Trello','https://trello.com','Trello','2023-11-18 13:53:26',NULL,2,1),
(74,'Asana','https://asana.com','Asana','2023-11-18 13:53:26',NULL,2,1),
(75,'Slack','https://slack.com','Slack','2023-11-18 13:53:26',NULL,3,1),
(76,'Zoom','https://zoom.us','Zoom','2023-11-18 13:53:26',NULL,4,1),
(77,'Google Drive','https://drive.google.com','Google Drive','2023-11-18 13:53:26',NULL,2,1),
(78,'Dropbox','https://www.dropbox.com','Dropbox','2023-11-18 13:53:26',NULL,2,1),
(79,'Evernote','https://evernote.com','Evernote','2023-11-18 13:53:26',NULL,2,1),
(80,'Todoist','https://todoist.com','Todoist','2023-11-18 13:53:26','2023-11-23 15:28:58',1,5),
(81,'Notion','https://www.notion.so','Notion','2023-11-18 13:53:26',NULL,4,1),
(82,'Pocket','https://getpocket.com','Pocket','2023-11-18 13:53:26',NULL,2,1),
(83,'Feedly','https://feedly.com','Feedly','2023-11-18 13:53:26',NULL,3,1),
(85,'Hacker Noon','https://hackernoon.com','Hacker Noon','2023-11-18 13:53:47',NULL,1,1),
(86,'The Next Web','https://thenextweb.com','The Next Web','2023-11-18 13:53:47',NULL,5,1),
(87,'Techmeme','https://www.techmeme.com','Techmeme','2023-11-18 13:53:47',NULL,1,1),
(89,'Designer News','https://www.designernews.co','Designer News','2023-11-18 13:54:00',NULL,4,1),
(91,'A List Apart','https://alistapart.com','A List Apart','2023-11-18 13:54:21',NULL,5,1),
(93,'Web Designer Depot','https://www.webdesignerdepot.com','Web Designer Depot','2023-11-18 13:54:37',NULL,2,1),
(94,'Codrops','https://tympanus.net/codrops','Codrops','2023-11-18 13:54:37',NULL,5,1),
(95,'Google Fonts','https://fonts.google.com','Google Fonts','2023-11-18 13:54:37',NULL,4,1),
(96,'Font Awesome','https://fontawesome.com','Font Awesome','2023-11-18 13:54:37',NULL,3,1),
(100,'Shutterstock','https://www.shutterstock.com','Shutterstock','2023-11-18 13:55:05',NULL,4,1),
(101,'Getty Images','https://www.gettyimages.com','Getty Images','2023-11-18 13:55:05',NULL,4,1),
(113,'test bookmark','https://unique.com','short description','2023-11-22 11:19:20',NULL,1,1),
(114,'ITDEV','https://itdev.ro','My Domain','2023-11-22 11:01:47',NULL,1,1),
(116,'Test2','https://test2.com','Test 2 or whatever','2023-11-22 11:11:55',NULL,1,1),
(117,'No redirect','https://no.redirect','test no redirect','2023-11-22 11:14:35',NULL,1,1),
(118,'No redirect2','https://no.redirect2','test no redirect2','2023-11-22 11:15:06',NULL,1,1),
(123,'Valid string','http://invalid','someting','2023-11-27 11:35:30',NULL,1,1);
/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categ_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Miscellaneous',NULL,'Basically my life ...'),
(2,'Shopping',NULL,'Money wasting ...'),
(3,'Learning',NULL,'Getting smarter by the minute ...'),
(4,'Finance',NULL,'Where my money at ...'),
(5,'Social & Life Style',NULL,'All my friends ... @Paris Fashion Week'),
(6,'Entertainment',NULL,'Time wasting ...'),
(7,'Tech & Science',NULL,'Let me get my geek on ... The Earth is not flat and I can prove it');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `bookmark_id` int(10) unsigned NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_fav_users` (`owner_id`),
  KEY `fk_fav_bookmarks` (`bookmark_id`),
  CONSTRAINT `fk_fav_bookmarks` FOREIGN KEY (`bookmark_id`) REFERENCES `bookmarks` (`id`),
  CONSTRAINT `fk_fav_users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES
(2,1,23,'2023-11-27 10:18:53'),
(3,1,24,'2023-11-27 10:18:54'),
(7,1,2,'2023-11-27 11:13:32');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_u_name_unique` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'tdascal','Tiberiu','Dascal','tdascal@email.com',NULL,'2d18742fe4852899a04941acd83f132c','en','2023-11-13 22:29:22',NULL),
(2,'dan','Dan','Mierlut','dan@email.com',NULL,'81dc9bdb52d04dc20036dbd8313ed055','en','2023-11-17 10:49:01',NULL),
(3,'bea','Beatrice','Movila','bea@email.com',NULL,'81dc9bdb52d04dc20036dbd8313ed055','en','2023-11-17 10:51:29',NULL),
(4,'gogu','Gogu','Gogulescu','gogu@email.com','78e5e2d377461b2de99f95c79a6c419f0ed9b29b91f1e3e4e98d1681bf85ac9a76b4b223b3616a77978289ca0ac1bc6c439aa19b3084ef0f9661e6cda88b3ff5','658e7dc2068c12966d36147dc0888366','en','2023-11-17 14:07:46',NULL),
(5,'tibi','Tiberiu','Dascal','tibi@email.com',NULL,'877abcd994b734381a6194acd26241c4','en','2023-11-17 14:13:38',NULL),
(6,'tb','Tiberiu','TB','tb@email.com',NULL,'e44d967f3e8a44f6a7fee562af4d82f4','en','2023-11-20 08:40:21',NULL);
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

-- Dump completed on 2023-11-28 12:10:28
