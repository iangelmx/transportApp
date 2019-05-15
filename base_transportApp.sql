-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.36-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para transportapp
CREATE DATABASE IF NOT EXISTS `transportapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `transportapp`;

-- Volcando estructura para tabla transportapp.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `idTicket` int(11) DEFAULT NULL,
  `codigo` text,
  `personas` int(11) DEFAULT NULL,
  `status` text,
  `unidad` int(11) DEFAULT NULL,
  KEY `FK_tickets_unidades` (`unidad`),
  CONSTRAINT `FK_tickets_unidades` FOREIGN KEY (`unidad`) REFERENCES `unidades` (`idUnidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.tickets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT IGNORE INTO `unidades` (`idUnidad`, `placa`, `ganancias`, `chofer`, `distancia`, `capacidad`) VALUES
	(1, 'ABC', '5000', 'Angel', 26, 14),
	(2, 'DEF', '3590', 'Jesus', 5, 17),
	(3, 'GHI', '6305', 'Noe', 30, 12);
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;

-- Volcando estructura para tabla transportapp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `password` text,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla transportapp.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT IGNORE INTO `usuarios` (`idUsuario`, `email`, `password`) VALUES
	(1, 'iangelmx@hotmail.com', '123456');
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

-- Volcando datos para la tabla transportapp.viaje: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `viaje` DISABLE KEYS */;
INSERT IGNORE INTO `viaje` (`idViaje`, `idUnidad`, `idUsuario`, `ocupabilidad`, `chofer`, `status`) VALUES
	(1, 1, 1, 13, NULL, 'en_curso'),
	(2, 2, 0, 3, NULL, 'en_curso'),
	(3, 3, 6, 5, NULL, 'en_curso');
/*!40000 ALTER TABLE `viaje` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
