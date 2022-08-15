-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla funiber.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` char(100) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla funiber.areas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`, `description`, `estado`) VALUES
	(1, 'Department of Environment and Sustainability', 'A'),
	(2, 'Department of Innovation, Business and New Technologies', 'A'),
	(3, 'Department of Language, Education and Communications Sciences', 'A'),
	(4, 'Department of Health Sciences', 'A'),
	(5, 'Department of Projects', 'A');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Volcando estructura para tabla funiber.formulario
CREATE TABLE IF NOT EXISTS `formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `last_name` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `phone` char(13) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `area_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `country` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `state` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `city` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `comments` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `policy_acceptance_check` bit(1) NOT NULL,
  `register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla funiber.formulario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
INSERT INTO `formulario` (`id`, `name`, `last_name`, `email`, `phone`, `area_id`, `program_id`, `country`, `state`, `city`, `comments`, `policy_acceptance_check`, `register`) VALUES
	(1, 'Andrés', 'Astudillo', 'mosuah@protonmail.com', '+593969460102', NULL, NULL, '64', '2914', '31511', 'Prueba', b'0', '2022-08-11 00:47:55'),
	(2, 'Christian', 'Sánchez', 'christianabrahamsanchez@gmail.com', '+593963787611', NULL, NULL, '64', '2914', '31511', 'Prueba 2', b'1', '2022-08-11 00:47:55'),
	(3, 'Keren', 'Astudillo', 'keren@gmail.com', '+593963787612', NULL, NULL, '64', '2905', '31552', 'Prueba 3', b'1', '2022-08-11 00:48:34'),
	(4, 'Gloria', 'Viteri', 'gviteri@gmail.com', '+59396874512', 2, 4, '64', '2914', '31511', 'Prueba', b'1', '2022-08-11 02:29:11'),
	(5, 'Gloria', 'Viteri', 'gviteri@gmail.com', '+59396874512', 2, 4, '64', '2914', '31511', 'Prueba', b'1', '2022-08-11 02:40:26'),
	(6, 'Andres', 'MuÃ±iz', 'andresmoisesastudillo@gmail.com', '+59396874512', 2, 3, '64', '2914', '31511', 'Prueba 4', b'1', '2022-08-11 02:41:20'),
	(7, 'Andres', 'MuÃ±iz', 'andresmoisesastudillo@gmail.com', '+59396874512', 2, 3, '64', '2914', '31511', 'Prueba 4', b'1', '2022-08-11 02:44:58');
/*!40000 ALTER TABLE `formulario` ENABLE KEYS */;

-- Volcando estructura para tabla funiber.programas
CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `description` char(150) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla funiber.programas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `programas` DISABLE KEYS */;
INSERT INTO `programas` (`id`, `area_id`, `description`, `estado`) VALUES
	(1, 1, 'Master\'s Degree in Environmental Management and Audits', 'A'),
	(2, 2, 'Master\'s Degree in Strategic Management with a Specialization in Management', 'A'),
	(3, 2, 'Master\'s Degree in Strategic Management with a Specialization in Information Technologies', 'A'),
	(4, 2, 'Master\'s Degree in Strategic Management with a specialization in Telecommunications', 'A'),
	(5, 3, 'Master\'s Degree in Training of Teachers of Spanish as a Foreign Language', 'A'),
	(6, 3, 'Master\'s Degree in Education with a specialization in Higher Education', 'A'),
	(7, 3, 'Master\'s Degree in Education with a specialization in Organization and Management of Educational Centers', 'A'),
	(8, 4, 'Master\'s Degree in Physical Activity: Training and Sports Management', 'A'),
	(9, 4, 'Master\'s Degree in Naturopathic Sciences', 'A'),
	(10, 5, 'Master\'s Degree in Project Design, Management and Direction', 'A'),
	(11, 5, 'Master\'s Degree in Design, Management and Project Management with specialization in Innovation and Products', 'A'),
	(12, 5, 'Master\'s Degree in Design, Management and Project Management with a specialization in Architecture and Urban Planning', 'A');
/*!40000 ALTER TABLE `programas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
