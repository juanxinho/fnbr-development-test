-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2022 a las 20:41:59
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.1.6



--
-- Base de datos: `funiber`
--
CREATE DATABASE IF NOT EXISTS funiber;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `area` varchar(250) NOT NULL,
  `program` varchar(150) NOT NULL,
  `names` varchar(100) NOT NULL,
  `last_names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `area`, `program`, `names`, `last_names`, `email`, `phone`, `country`, `state`, `city`, `comment`) VALUES
(1, 'prueba', 'program 1', 'critopher', 'Solis', 'Cristopher@hotmail.com', '0955291042', 'ecuador', 'Guayas', 'Guayaquil', 'nada'),
(2, 'prueba 2', 'program 1', 'critopher', 'Solis', 'Cristopher@hotmail.com', '0955291042', 'ecuador', 'Guayas', 'Guayaquil', 'nada'),
(3, 'prueba 3', 'program 1', 'critopher', 'Solis', 'Cristopher@hotmail.com', '0955291042', 'ecuador', 'Guayas', 'Guayaquil', 'nada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

ALTER USER 'root' IDENTIFIED WITH mysql_native_password BY 'password'; 
flush privileges;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
