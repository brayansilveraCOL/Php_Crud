-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2020 a las 02:11:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `nombre`, `fecha_registro`) VALUES
(1, 'BARRANQUILLA', NULL),
(2, 'CARTAGENA', NULL),
(3, 'CUCUTA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identi`
--

CREATE TABLE `tipo_identi` (
  `id` int(11) NOT NULL,
  `tipo_id` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_identi`
--

INSERT INTO `tipo_identi` (`id`, `tipo_id`, `fecha_registro`) VALUES
(1, 'CEDULA', '2020-05-23 00:00:00'),
(2, 'TARJETA DE IDENTIDAD', '2020-05-23 00:00:00'),
(3, 'PASAPORTE', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `identificacion` varchar(20) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `id_ciudad` varchar(250) DEFAULT NULL,
  `id_tipoidenti` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `correo`, `estado`, `identificacion`, `contrasena`, `fecha_registro`, `id_ciudad`, `id_tipoidenti`) VALUES
(108, 'Prueba id', 'asdasdf', 'asfasfsafa', 0, '1143154102', 'dasdfsdfadfa', NULL, 'CUCUTA', 'PASAPORTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tipo_identi`
--
ALTER TABLE `tipo_identi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_tipoidenti` (`id_tipoidenti`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_identi`
--
ALTER TABLE `tipo_identi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`nombre`),
  ADD CONSTRAINT `tipo_id` FOREIGN KEY (`id_tipoidenti`) REFERENCES `tipo_identi` (`tipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
