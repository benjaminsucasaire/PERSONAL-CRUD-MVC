-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 03:03:49
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_producto`
--

CREATE TABLE `tm_producto` (
  `prod_id` int(11) NOT NULL,
  `prod_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `prod_desc` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_producto`
--

INSERT INTO `tm_producto` (`prod_id`, `prod_nom`, `prod_desc`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 'Auriculares', 'ninguna', '2021-06-11 23:53:20', NULL, NULL, 1),
(2, 'Mouse', 'ninguna', '2021-06-11 23:54:50', NULL, NULL, 1),
(3, 'Teclado XC', 'Nuva descripcon de teclado', '2021-06-11 23:55:30', '2021-06-13 03:01:16', NULL, 1),
(4, 'Monitor', 'ninguna', '2021-06-12 12:17:55', NULL, NULL, 1),
(5, 'laptop', 'ninguna', '2021-06-10 00:18:34', NULL, NULL, 1),
(10, 'Fuente', 'ninguna', '2021-06-13 01:30:13', NULL, NULL, 1),
(11, 'Case', 'ninguna', '2021-06-13 01:35:43', NULL, '2021-06-13 02:02:56', 0),
(12, 'cooler', 'ninguna', '2021-06-13 01:36:08', NULL, '2021-06-13 02:09:12', 0),
(13, 'Disco SSD', 'ninguna', '2021-06-13 01:36:35', NULL, '2021-06-13 02:00:17', 0),
(14, 'arraz', 'ninguna', '2021-06-13 02:27:15', NULL, '2021-06-13 02:42:40', 0),
(15, 'mango', 'ninguna', '2021-06-13 02:27:44', NULL, NULL, 1),
(16, 'arez', 'ninguna', '2021-06-13 02:27:55', NULL, '2021-06-13 02:42:35', 0),
(17, 'wwwqqq', 'ninguna', '2021-06-13 02:29:48', '2021-06-13 02:42:13', '2021-06-13 02:42:48', 0),
(18, 'http', 'ninguna', '2021-06-13 02:42:20', NULL, '2021-06-13 02:42:43', 0),
(19, '2222', 'ninguna', '2021-06-13 02:43:11', '2021-06-13 02:43:19', '2021-06-13 02:43:41', 0),
(20, '4444', 'ninguna', '2021-06-13 02:43:23', '2021-06-13 02:43:30', '2021-06-13 02:43:43', 0),
(21, '5555', 'ninguna', '2021-06-13 02:43:36', NULL, '2021-06-13 02:43:46', 0),
(22, 'test2', 'mi descripcion del test2', '2021-06-13 03:00:35', '2021-06-13 03:00:54', '2021-06-13 03:01:29', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tm_producto`
--
ALTER TABLE `tm_producto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
