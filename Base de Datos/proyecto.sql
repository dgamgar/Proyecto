-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 11:10:07
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
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes'),
(4, 'Volkswagen'),
(5, 'Seat'),
(13, 'Toyota'),
(14, 'skoda'),
(16, 'Peugeot');

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
(13, 1, 'Q4', '5', 'Eléctrico', '180'),
(18, 13, 'yaris', '5', 'Híbrido', '95'),
(19, 14, 'Superb', '4', 'Diesel', '150'),
(26, 5, 'Ibiza', '5', 'Diesel', '95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `ID_transaccion` int(11) NOT NULL,
  `bastidor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_comprador` int(11) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`ID_transaccion`, `bastidor`, `fecha`, `id_comprador`, `id_modelo`, `precio`) VALUES
(43, 123456789, '2024-05-24', 44, 19, 12700),
(49, 1111111, '2024-05-24', 45, 13, 37500),
(50, 9999999, '2024-05-24', 45, 1, 14000),
(51, 123987456, '2024-05-24', 44, 3, 94850),
(56, 1111122222, '2024-06-05', 47, 26, 10000),
(57, 2147483647, '2024-06-05', 47, 26, 10000);

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
(43, 1, 'jesus', '2003-10-25', '$2y$10$VgdIwNNh6D1aanJvnb8REev4B439Upto37QzRugiYtTQptOKYKlp2', '12345678A'),
(44, 0, 'daniel', '2002-06-25', '$2y$10$X64G9PpYoFhy6ii7g5BFOOkOirkF.NhBBUIJtgjuCxrfGt/wEY536', '65478912L'),
(45, 0, 'jose luis', '1911-11-11', '$2y$10$JqqKhQaIDU12nAby02cT6.QbGSlKT1u3uWBXt6AQz9ci2FIu18w3u', '64598257J'),
(46, 0, 'juanito', '2024-06-21', '$2y$10$pFTT7KCsbqWu.6w.6aT62.WoHVLUJs07fWdf8OHDTlBBB8Wvj7.E2', '3456782E'),
(47, 0, 'Miriam', '2003-07-22', '$2y$10$XCuFo66yrpXpoiGOcYOLvOAF4UZpbs/Y3k5.yc4.l6GcoxXySXepC', '26032022D');

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
  MODIFY `ID_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `ID_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `ID_transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
