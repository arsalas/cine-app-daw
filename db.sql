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

-- Volcando datos para la tabla cine_app.favorites: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
REPLACE INTO `favorites` (`userId`, `movieId`, `cretedAt`, `updatedAt`) VALUES
	(19, 436270, '2022-12-04 20:36:42', '2022-12-04 20:36:42'),
	(21, 11, '2022-12-04 21:00:44', '2022-12-04 21:00:44'),
	(21, 436270, '2022-12-04 20:59:06', '2022-12-04 20:59:06');
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

-- Volcando datos para la tabla cine_app.profile: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
REPLACE INTO `profile` (`userId`, `name`, `avatar`, `createdAt`, `updatedAt`) VALUES
	(1, 'Alberto', '1670179364_descarga.png', '2022-10-17 00:11:04', '2022-12-04 19:42:45'),
	(9, 'Alberto', '1666046380_Hildegarn.png', '2022-10-17 00:07:53', '2022-10-17 00:07:53'),
	(19, 'Alberto', '1670182629_descarga (1).png', '2022-12-04 20:36:00', '2022-12-04 20:37:09'),
	(20, 'Pruena', '1670182677_descarga (2).png', '2022-12-04 20:37:28', '2022-12-04 20:37:57'),
	(21, 'Usuario', '1670183930_descarga.png', '2022-12-04 20:58:12', '2022-12-04 20:58:50');
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

-- Volcando datos para la tabla cine_app.reviews: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
REPLACE INTO `reviews` (`movieId`, `userId`, `content`, `score`, `createdAt`, `updatedAt`) VALUES
	(11, 21, 'Pelicula muy buena', 10, '2022-12-04 21:00:54', '2022-12-04 21:00:54'),
	(436270, 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 9, '2022-12-04 20:36:59', '2022-12-04 20:36:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla cine_app.users: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `email`, `password`, `createdAt`, `updatedAt`) VALUES
	(1, 'aramirsa@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-10-15 20:13:25', '2022-10-15 20:13:25'),
	(9, 'aramirsa1@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-10-16 22:08:40', '2022-10-16 22:08:40'),
	(19, 'alberto@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-12-04 20:36:00', '2022-12-04 20:36:00'),
	(20, 'alberto2@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-12-04 20:37:28', '2022-12-04 20:37:28'),
	(21, 'usuario@gmail.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', '2022-12-04 20:58:12', '2022-12-04 20:58:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
