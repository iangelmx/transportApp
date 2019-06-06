-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.0.0.5460
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para transportapp
CREATE DATABASE IF NOT EXISTS `transportapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `transportapp`;

-- Volcando estructura para tabla transportapp.ingresos_unidades
CREATE TABLE IF NOT EXISTS `ingresos_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUnidad` int(11) DEFAULT NULL,
  `idDuenio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `ingreso` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ingresos_unidades_unidades` (`idUnidad`),
  CONSTRAINT `FK_ingresos_unidades_unidades` FOREIGN KEY (`idUnidad`) REFERENCES `unidades` (`idUnidad`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.ingresos_unidades: ~8 rows (aproximadamente)
DELETE FROM `ingresos_unidades`;
/*!40000 ALTER TABLE `ingresos_unidades` DISABLE KEYS */;
INSERT INTO `ingresos_unidades` (`id`, `idUnidad`, `idDuenio`, `mes`, `anio`, `ingreso`) VALUES
	(1, 1, 1, 3, 2019, 11203.00),
	(2, 1, 1, 4, 2019, 12490.00),
	(3, 1, 1, 5, 2019, 10039.00),
	(4, 1, 1, 6, 2019, 1230.00),
	(5, 3, 1, 3, 2019, 10203.00),
	(6, 3, 1, 4, 2019, 9023.00),
	(7, 3, 1, 5, 2019, 13034.00),
	(8, 3, 1, 6, 2019, 1040.00);
/*!40000 ALTER TABLE `ingresos_unidades` ENABLE KEYS */;

-- Volcando estructura para tabla transportapp.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` text,
  `personas` int(11) DEFAULT NULL,
  `status` text,
  `unidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTicket`),
  KEY `FK_tickets_unidades` (`unidad`),
  CONSTRAINT `FK_tickets_unidades` FOREIGN KEY (`unidad`) REFERENCES `unidades` (`idUnidad`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.tickets: ~10 rows (aproximadamente)
DELETE FROM `tickets`;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`idTicket`, `codigo`, `personas`, `status`, `unidad`) VALUES
	(1, 'i4TP', 4, 'pendiente', 2),
	(2, 'I4BD', 4, 'pendiente', 2),
	(3, 'I4EP', 4, 'pendiente', 2),
	(4, 'I4PQ', 4, 'pendiente', 2),
	(5, 'I4UF', 4, 'pendiente', 2),
	(6, 'I4QJ', 4, 'pendiente', 2),
	(7, 'I4DV', 4, 'pendiente', 2),
	(8, 'I4KI', 4, 'pendiente', 2),
	(9, 'I4RG', 4, 'pendiente', 2),
	(10, 'I4DS', 4, 'pendiente', 2),
	(11, 'I4KV', 4, 'pendiente', 2),
	(12, 'I2WN', 2, 'pendiente', 2),
	(13, 'I1NG', 1, 'pendiente', 1),
	(14, '4IN', 4, 'pendiente', 2),
	(15, 'I3QR', 3, 'pendiente', 2),
	(16, 'I3IG', 3, 'pendiente', 2),
	(17, 'I2TL', 2, 'pendiente', 2);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Volcando estructura para tabla transportapp.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `idUnidad` int(11) NOT NULL AUTO_INCREMENT,
  `placa` text,
  `ganancias` text,
  `chofer` text,
  `distancia` int(11) DEFAULT NULL,
  `capacidad` int(11) DEFAULT '0',
  PRIMARY KEY (`idUnidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.unidades: ~3 rows (aproximadamente)
DELETE FROM `unidades`;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` (`idUnidad`, `placa`, `ganancias`, `chofer`, `distancia`, `capacidad`) VALUES
	(1, 'ABC', '5000', 'Angel', 26, 14),
	(2, 'MHY-32-18', '3590', 'Jesus', 5, 17),
	(3, 'GHI', '6305', 'Noe', 30, 12);
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;

-- Volcando estructura para tabla transportapp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `password` text,
  `rol` text,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `rol`) VALUES
	(1, 'iangelmx@hotmail.com', '123456', 'Usuario'),
	(2, 'david@ejemplo.com', 'adbc', 'Chofer'),
	(3, 'chofer@example.com', 'abdfe4', 'Duenio');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla transportapp.viaje
CREATE TABLE IF NOT EXISTS `viaje` (
  `idViaje` int(11) NOT NULL,
  `idUnidad` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `ocupabilidad` int(11) DEFAULT NULL,
  `chofer` text,
  `status` text NOT NULL,
  PRIMARY KEY (`idViaje`,`idUnidad`,`idUsuario`),
  KEY `FK_viaje_unidades` (`idUnidad`),
  CONSTRAINT `FK_viaje_unidades` FOREIGN KEY (`idUnidad`) REFERENCES `unidades` (`idUnidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.viaje: ~3 rows (aproximadamente)
DELETE FROM `viaje`;
/*!40000 ALTER TABLE `viaje` DISABLE KEYS */;
INSERT INTO `viaje` (`idViaje`, `idUnidad`, `idUsuario`, `ocupabilidad`, `chofer`, `status`) VALUES
	(1, 1, 1, 13, NULL, 'en_curso'),
	(2, 2, 0, 3, NULL, 'en_curso'),
	(3, 3, 6, 5, NULL, 'en_curso');
/*!40000 ALTER TABLE `viaje` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
