-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2024 a las 09:17:02
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_marca` int(11) NOT NULL,
  `nombre_marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_marca`, `nombre_marca`) VALUES
(1, 'audi'),
(2, 'bmw'),
(3, 'mercedes'),
(4, 'volkswagen'),
(5, 'seat'),
(13, 'toyota'),
(14, 'skoda'),
(16, 'peugeot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `ID_modelo` int(11) NOT NULL,
  `ID_marca` int(11) NOT NULL,
  `nombre_modelo` varchar(100) NOT NULL,
  `num_puertas` varchar(100) NOT NULL,
  `combustible` varchar(50) NOT NULL,
  `cv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`ID_modelo`, `ID_marca`, `nombre_modelo`, `num_puertas`, `combustible`, `cv`) VALUES
(1, 1, 'A4', '5', 'Diesel', '150'),
(2, 2, '320d', '5', 'Gasolina', '180'),
(3, 3, 'S450', '5', 'Gasolina', '290'),
(4, 4, 'Golf', '3', 'Diesel', '90'),
(5, 5, 'leon', '5', 'Gasolina', '115'),
(6, 1, 'Q8', '5', 'Híbrido', '280'),
(11, 1, 'A7', '4', 'Gasolina', '260'),
(13, 1, 'Q4', '5', 'Eléctrico', '180'),
(14, 1, 'Q3', '5', 'diesel', '150');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `ID_transaccion` int(11) NOT NULL,
  `bastidor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_comprador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`ID_transaccion`, `bastidor`, `fecha`, `id_comprador`) VALUES
(16, 928374, '2024-04-15', 34),
(18, 2147483647, '2024-04-17', 34),
(20, 46789132, '2024-04-17', 33),
(22, 5675878, '2024-04-17', 33),
(38, 66666666, '2024-04-18', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usu` int(11) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `dni` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usu`, `Rol`, `Nombre`, `fecha_nac`, `contraseña`, `dni`) VALUES
(32, 1, 'antonio', '2002-02-02', '12345', '87654321B'),
(33, 0, 'pepe', '0200-01-01', '12345', '12345678A'),
(34, 0, 'daniel', '2003-10-25', '12345', '3456782E'),
(39, 0, 'juan', '2003-07-04', '12345', '324676658P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `bastidor` int(11) NOT NULL,
  `ID_marca` int(11) NOT NULL,
  `ID_modelo` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `paquete` varchar(50) NOT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`bastidor`, `ID_marca`, `ID_modelo`, `color`, `paquete`, `precio`) VALUES
(45678, 3, 3, 'Blanco', 'AMG', 235000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`ID_modelo`),
  ADD KEY `ID_marca` (`ID_marca`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`ID_transaccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usu`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`bastidor`),
  ADD KEY `ID_modelo` (`ID_modelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `ID_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `ID_transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `ID_marca` FOREIGN KEY (`ID_marca`) REFERENCES `marca` (`ID_marca`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `ID_modelo` FOREIGN KEY (`ID_modelo`) REFERENCES `modelo` (`ID_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
