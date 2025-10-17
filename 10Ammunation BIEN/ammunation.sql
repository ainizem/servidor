-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.2.0 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ammunation
CREATE DATABASE IF NOT EXISTS `ammunation` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ammunation`;

-- Volcando estructura para tabla ammunation.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `permiso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ammunation.permisos: ~0 rows (aproximadamente)
INSERT INTO `permisos` (`id`, `permiso`) VALUES
	(1, 'administrador'),
	(2, 'lector'),
	(3, 'editor');

-- Volcando estructura para tabla ammunation.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ammunation.roles: ~0 rows (aproximadamente)
INSERT INTO `roles` (`id`, `rol`) VALUES
	(0, 'admin'),
	(1, 'usuario'),
	(2, 'invitado');

-- Volcando estructura para tabla ammunation.roles_permisos
CREATE TABLE IF NOT EXISTS `roles_permisos` (
  `rolId` int NOT NULL,
  `permisoId` int NOT NULL,
  PRIMARY KEY (`rolId`,`permisoId`),
  KEY `FK_roles_permisos_permisos` (`permisoId`),
  CONSTRAINT `FK_roles_permisos_permisos` FOREIGN KEY (`permisoId`) REFERENCES `permisos` (`id`),
  CONSTRAINT `FK_roles_permisos_roles` FOREIGN KEY (`rolId`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ammunation.roles_permisos: ~0 rows (aproximadamente)
INSERT INTO `roles_permisos` (`rolId`, `permisoId`) VALUES
	(0, 1),
	(0, 2),
	(0, 3),
	(1, 2),
	(1, 3),
	(2, 2);

-- Volcando estructura para tabla ammunation.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rolId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  KEY `FK_users_roles` (`rolId`) USING BTREE,
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`rolId`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ammunation.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `mail`, `pass`, `rolId`) VALUES
	(0, 'mikel', 'user@example.com', '202cb962ac59075b964b07152d234b70', 0),
	(2, 'amaia', 'a@a.com', '202cb962ac59075b964b07152d234b70', 1),
	(3, 'ju', 'j@gmaill.com', '202cb962ac59075b964b07152d234b70', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
