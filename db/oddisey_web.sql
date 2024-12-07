-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2024 a las 09:06:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oddisey web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripción` text NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descuento` tinyint(2) NOT NULL DEFAULT 0,
  `id_categoría` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripción`, `precio`, `descuento`, `id_categoría`, `activo`) VALUES
(1, 'Computadora Dell Cpu Intel I5 8gb 500gb ', 'Computadora Dell Cpu Intel I5 8gb 500gb ', 100, 5, 1, 1),
(2, 'Monitor Touch Screen Tactil 15 Aon Tsm-115ts', 'Monitor Touch Screen Tactil 15 Aon Tsm-115ts', 110, 10, 1, 1),
(3, 'Toyota Hilux Kavak 4x4 2015', 'Toyota Hilux Kavak 4x4 2015', 300, 15, 1, 1),
(4, 'Silla Multifuncional Taburtes Cocinas Meson Barra Altas', 'Silla Multifuncional Taburtes Cocinas Meson Barra Altas', 250, 5, 1, 1),
(5, 'Sofa Cama Sophie Dos Puestos Gris', 'Sofa Cama Sophie Dos Puestos Gris', 310, 20, 1, 1),
(6, 'Cortador De Tubería Capilar Everwell', 'Cortador De Tubería Capilar Everwell', 330, 25, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
