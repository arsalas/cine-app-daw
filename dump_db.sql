-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cine_app
CREATE DATABASE IF NOT EXISTS `cine_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cine_app`;

-- Volcando estructura para tabla cine_app.favorites
CREATE TABLE IF NOT EXISTS `favorites` (
  `userId` int(11) NOT NULL,
  `movieId` int(11) NOT NULL,
  `cretedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userId`,`movieId`),
  CONSTRAINT `fk_favorites_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cine_app.favorites: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
REPLACE INTO `favorites` (`userId`, `movieId`, `cretedAt`, `updatedAt`) VALUES
	(1, 647, '2022-10-23 23:48:53', '2022-10-23 23:48:53'),
	(1, 9461, '2022-10-23 23:17:28', '2022-10-23 23:17:28'),
	(1, 13274, '2022-10-23 23:49:37', '2022-10-23 23:49:37'),
	(1, 36557, '2022-10-24 01:08:13', '2022-10-24 01:08:13'),
	(1, 503314, '2022-10-23 23:15:41', '2022-10-23 23:15:41'),
	(1, 610150, '2022-10-23 23:15:34', '2022-10-23 23:15:34'),
	(1, 718930, '2022-10-23 22:49:14', '2022-10-23 22:49:14');
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;

-- Volcando estructura para tabla cine_app.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `userId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `avatar` varchar(45) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`userId`),
  CONSTRAINT `fk_profile_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cine_app.profile: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
REPLACE INTO `profile` (`userId`, `name`, `avatar`, `createdAt`, `updatedAt`) VALUES
	(1, 'Alberto', '1669848995_cloud_avatar1.jpg', '2022-10-17 00:11:04', '2022-11-30 23:56:35'),
	(9, 'Alberto', '1666046380_Hildegarn.png', '2022-10-17 00:07:53', '2022-10-17 00:07:53'),
	(10, 'Usuario2', '1666474899_Gogeta_Gotrunks.png', '2022-10-22 19:11:19', '2022-10-22 23:41:39');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Volcando estructura para tabla cine_app.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `movieId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`movieId`,`userId`),
  KEY `fk_reviews_user_idx` (`userId`),
  CONSTRAINT `fk_reviews_user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cine_app.reviews: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
REPLACE INTO `reviews` (`movieId`, `userId`, `content`, `score`, `createdAt`, `updatedAt`) VALUES
	(235, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 8, '2022-10-22 15:53:56', '2022-10-22 17:18:28'),
	(647, 1, 'Peliculon', 10, '2022-10-23 23:49:03', '2022-10-23 23:49:03'),
	(36557, 1, 'Peliculon de 007', 10, '2022-10-24 01:08:22', '2022-10-24 01:08:22'),
	(38575, 1, 'Pelicula muy mala', 1, '2022-10-23 14:12:48', '2022-10-23 14:12:48'),
	(436270, 1, 'Probando las reseans ede blacjk adam', 2, '2022-10-22 23:15:49', '2022-10-22 23:15:49'),
	(503314, 1, 'Peliculon de dragon ball\nMuy buena animacion', 10, '2022-10-23 14:10:47', '2022-10-23 14:10:47'),
	(610150, 1, 'Pelucula genial de dragon ball super', 10, '2022-10-22 23:26:36', '2022-10-22 23:26:36'),
	(616820, 1, 'Probando las resenas desde los comentarios', 3, '2022-10-22 23:13:52', '2022-10-22 23:13:52'),
	(717728, 1, 'Tremenda saga de terror', 6, '2022-10-24 01:07:16', '2022-10-24 01:07:16'),
	(718930, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 7, '2022-10-22 19:12:16', '2022-10-22 19:12:16'),
	(718930, 9, 'Mas resenas de otro usuario', 4, '2022-10-22 23:43:08', '2022-10-22 23:43:08'),
	(718930, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 10, '2022-10-22 19:11:41', '2022-10-22 19:11:41');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Volcando estructura para tabla cine_app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cine_app.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `email`, `password`, `createdAt`, `updatedAt`) VALUES
	(1, 'aramirsa@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-10-15 20:13:25', '2022-10-15 20:13:25'),
	(9, 'aramirsa1@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-10-16 22:08:40', '2022-10-16 22:08:40'),
	(10, 'aramirsa2@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-10-22 19:09:25', '2022-10-22 19:09:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
