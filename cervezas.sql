-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 17:41:46
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
-- Base de datos: `cervezas_blasco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `Identificador` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Graduacion_alcoholica` int(3) NOT NULL,
  `Pais` varchar(60) NOT NULL,
  `Precio` int(2) NOT NULL,
  `Ruta_imagen_asociada_a_la_cerveza` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`Identificador`, `Nombre`, `Tipo`, `Graduacion_alcoholica`, `Pais`, `Precio`, `Ruta_imagen_asociada_a_la_cerveza`) VALUES
(54, 'Roja', 'rubia', 1, 'Rusia', 4, 'fotos/cerveza1.png'),
(55, 'Negra', 'negra', 4, 'Alemania', 6, 'fotos/cerveza2.png'),
(56, 'Azul', 'deTrigo', 4, 'Ecuador', 6, 'fotos/cerveza3.jpg'),
(57, 'Morada', 'tostada', 6, 'China', 4, 'fotos/cerveza4.jpg'),
(58, 'Amarilla', 'rubia', 6, 'Francia', 3, 'fotos/cerveza5.jpg'),
(59, 'Naranja', 'tostada', 5, 'Marruecos', 5, 'fotos/cerveza6.jpg'),
(60, 'Dorada', 'deTrigo', 4, 'Japon', 3, 'fotos/cerveza7.jpg'),
(61, 'Verde.', 'deTrigo', 7, 'Chile', 7, 'fotos/cerveza8.jpg'),
(62, 'Blanca', 'deTrigo', 4, 'Mexico', 9, 'fotos/cerveza9.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`Identificador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `Identificador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
