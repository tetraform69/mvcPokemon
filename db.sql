-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para pokemon33
CREATE DATABASE IF NOT EXISTS `pokemon33` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pokemon33`;

-- Volcando estructura para tabla pokemon33.comprad
CREATE TABLE IF NOT EXISTS `comprad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idCom` int NOT NULL DEFAULT '0',
  `idPro` int NOT NULL DEFAULT '0',
  `cantidad` int NOT NULL DEFAULT '0',
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comprod_compras` (`idCom`),
  KEY `FK_comprod_productos` (`idPro`),
  KEY `FK_comprod_usuarios` (`usuarioCreacion`),
  KEY `FK_comprod_usuarios_2` (`usuarioModificacion`),
  CONSTRAINT `FK_comprod_compras` FOREIGN KEY (`idCom`) REFERENCES `compras` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_comprod_productos` FOREIGN KEY (`idPro`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_comprod_usuarios` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_comprod_usuarios_2` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.comprad: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigoCom` (`codigo`) USING BTREE,
  KEY `FK_compras_usuarios` (`usuarioCreacion`),
  KEY `FK_compras_usuarios_2` (`usuarioModificacion`),
  CONSTRAINT `FK_compras_usuarios` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_compras_usuarios_2` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.compras: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.impuestos
CREATE TABLE IF NOT EXISTS `impuestos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `porcentaje` int NOT NULL DEFAULT '0',
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int NOT NULL DEFAULT '0',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int NOT NULL DEFAULT '0',
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.impuestos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `idUser` int NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `total` int NOT NULL,
  `formaPago` enum('Transferencia','ContraEntrega','Consignacion') DEFAULT NULL,
  `fechaEnvPedido` date NOT NULL,
  `estadoPedido` enum('Pendiente','Enviado','Cancelado','Recibido') DEFAULT NULL,
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigoPed` (`codigo`) USING BTREE,
  KEY `usuarioCreacion` (`usuarioCreacion`),
  KEY `usuarioModificacion` (`usuarioModificacion`),
  KEY `idUsu` (`idUser`) USING BTREE,
  CONSTRAINT `FK_pedidos_usuarios` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedidos_usuarios_2` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedidos_usuarios_3` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.pedidos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.pedprod
CREATE TABLE IF NOT EXISTS `pedprod` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idPed` int DEFAULT NULL,
  `idPro` int DEFAULT NULL,
  `cantidadPro` int DEFAULT NULL,
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int NOT NULL DEFAULT '0',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int NOT NULL DEFAULT '0',
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idPed` (`idPed`),
  KEY `idPro` (`idPro`),
  KEY `usuarioCreacion` (`usuarioCreacion`),
  KEY `usuarioModificacion` (`usuarioModificacion`),
  CONSTRAINT `FK_pedprod_pedidos` FOREIGN KEY (`idPed`) REFERENCES `pedidos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedprod_productos` FOREIGN KEY (`idPro`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedprod_usuarios` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_pedprod_usuarios_2` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.pedprod: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombrePro` varchar(30) NOT NULL DEFAULT '0',
  `precioPro` int NOT NULL DEFAULT '0',
  `cantidadPro` int NOT NULL DEFAULT '0',
  `descripPro` varchar(50) NOT NULL DEFAULT '0',
  `estado` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT NULL,
  `categoria` int DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_productos_usuarios` (`usuarioCreacion`),
  KEY `FK_productos_usuarios_2` (`usuarioModificacion`),
  CONSTRAINT `FK_productos_usuarios` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_productos_usuarios_2` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.productos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla pokemon33.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(30) NOT NULL DEFAULT '0',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT NULL,
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuarioCreacion` (`usuarioCreacion`),
  KEY `usuarioModificacion` (`usuarioModificacion`),
  CONSTRAINT `FK_roles_usuarios` FOREIGN KEY (`usuarioCreacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_roles_usuarios_2` FOREIGN KEY (`usuarioModificacion`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`id`, `nombreRol`, `estado`, `usuarioCreacion`, `fechaCreacion`, `usuarioModificacion`, `fechaModificacion`) VALUES
	(2, 'Admin', 'A', NULL, '2023-05-09 20:40:57', NULL, '2023-05-09 20:40:57'),
	(3, 'user', 'A', NULL, '2023-05-09 20:41:07', NULL, '2023-05-09 20:41:07'),
	(4, 'panadero', 'A', NULL, '2023-05-10 20:53:35', NULL, '2023-05-10 20:53:35'),
	(5, 'sacerdote', 'A', NULL, '2023-05-24 19:40:10', NULL, '2023-05-24 19:40:10');

-- Volcando estructura para tabla pokemon33.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipoDoc` varchar(50) NOT NULL DEFAULT '',
  `identificacion` int NOT NULL,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `apellido` varchar(30) NOT NULL DEFAULT '',
  `correo` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(50) NOT NULL DEFAULT '',
  `genero` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idRol` int NOT NULL DEFAULT '0',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `usuarioCreacion` int DEFAULT '0',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarioModificacion` int DEFAULT '0',
  `fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificacion` (`identificacion`),
  KEY `idRol` (`idRol`),
  KEY `usuarioCreacion` (`usuarioCreacion`),
  KEY `usuarioModificacion` (`usuarioModificacion`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla pokemon33.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `tipoDoc`, `identificacion`, `nombre`, `apellido`, `correo`, `password`, `direccion`, `telefono`, `genero`, `idRol`, `estado`, `usuarioCreacion`, `fechaCreacion`, `usuarioModificacion`, `fechaModificacion`) VALUES
	(3, 'cc', 1, 'oscar', 'corredor', 'oyco@mail.co', '1234', '1234', '317', 'M', 2, 'A', 3, '2023-06-22 13:23:48', 3, '2023-06-22 13:23:48');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
