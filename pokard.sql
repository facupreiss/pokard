-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3463
-- Tiempo de generación: 14-06-2023 a las 15:18:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `id_energia` int(11) DEFAULT NULL,
  `poder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `nombre`, `precio`, `imagen`, `descripcion`, `id_energia`, `poder`) VALUES
(27, 'Charmander', 2000, 'charmander.png', '', 1, 70),
(28, 'Celebi', 4000, 'celebi.png', '', 2, 180),
(29, 'Lucario', 10000, 'lucario.png', '', 7, 210),
(30, 'Luxray', 10000, 'luxray.png', '', 5, 210),
(31, 'Squirtle', 1000, 'squirtle.png', '', 3, 60),
(32, 'Totodile', 1500, 'totodile.png', '', 3, 70),
(33, 'Typhlosion', 5000, 'typhlosion.png', '', 1, 160),
(34, 'Umbreon', 9000, 'umbreon.png', '', 8, 200),
(35, 'Venusaur', 15000, 'venusaur.png', '', 2, 230),
(36, 'Blastoise y Piplup', 12000, 'blastoisePiplup.png', '', 3, 270),
(38, 'Charmander', 1500, 'charmander.png', '', 1, 70),
(39, 'Croagunk', 500, 'croagunk.png', '', 6, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `energia`
--

CREATE TABLE `energia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `energia`
--

INSERT INTO `energia` (`id`, `nombre`, `imagen`) VALUES
(1, 'Fuego', 'fuego.svg'),
(2, 'Planta', 'planta.svg'),
(3, 'Agua', 'agua.svg'),
(5, 'Rayo', 'rayo.svg'),
(6, 'Psiquico', 'psiquico.svg'),
(7, 'Lucha', 'lucha.svg'),
(8, 'Oscura', 'oscura.svg'),
(9, 'Metálica', 'metalica.svg'),
(10, 'Incolora', 'incolora.svg'),
(11, 'Hada', 'hada.svg'),
(12, 'Dragón', 'dragon.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(8) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nivel` varchar(10) NOT NULL DEFAULT 'usuario',
  `estado` enum('activo','banneado') NOT NULL DEFAULT 'activo',
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `clave`, `nivel`, `estado`, `usuario`) VALUES
(43, 'asdasdasdassda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'activo', 'lpemens'),
(44, 'adrianemens@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', 'activo', 'preiss'),
(45, 'facu@facu.com', 'f8e0920f29985ad1a2724161e86faa65', 'Admin', 'activo', 'facu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_energia` (`id_energia`);

--
-- Indices de la tabla `energia`
--
ALTER TABLE `energia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sdfsdfsdfdsfdsf` (`usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `energia`
--
ALTER TABLE `energia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `fk_energia` FOREIGN KEY (`id_energia`) REFERENCES `energia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
