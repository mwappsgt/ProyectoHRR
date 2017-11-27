-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2017 a las 04:32:01
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rio_reu_db`
--
CREATE DATABASE IF NOT EXISTS `rio_reu_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rio_reu_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ahc`
--

CREATE TABLE `ahc` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_caracthotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivospagos`
--

CREATE TABLE `archivospagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `id_reservacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivospagos`
--

INSERT INTO `archivospagos` (`id`, `nombre`, `url`, `id_reservacion`) VALUES
(1, '71_carga.csv', '1_71_carga.csv', 1),
(2, '73_informepormes.csv', '2_73_informepormes.csv', 1),
(3, 'carga.csv', '3_carga.csv', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arh`
--

CREATE TABLE `arh` (
  `id` int(11) NOT NULL,
  `en` int(11) NOT NULL,
  `fechain` date NOT NULL,
  `fechaout` date NOT NULL,
  `id_reservacion` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para asignar la reservación con varias habitaciones';

--
-- Volcado de datos para la tabla `arh`
--

INSERT INTO `arh` (`id`, `en`, `fechain`, `fechaout`, `id_reservacion`, `id_habitacion`) VALUES
(1, 1, '2017-08-23', '2017-08-25', 1, 1),
(2, 1, '2017-08-23', '2017-08-25', 1, 2),
(3, 1, '2017-08-23', '2017-08-25', 1, 8),
(4, 1, '2017-08-23', '2017-08-24', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracthabitacion`
--

CREATE TABLE `caracthabitacion` (
  `id` int(11) NOT NULL,
  `campo` varchar(500) NOT NULL COMMENT 'Descripción de la característica',
  `lang` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para describir las características extras de habitaciones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracthotel`
--

CREATE TABLE `caracthotel` (
  `id` int(11) NOT NULL,
  `tipo` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `lang` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `puesto` varchar(500) DEFAULT NULL,
  `telefono` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `ruta` longtext NOT NULL COMMENT 'La ruta de la imagen que pertenece a la habitación',
  `extra` longtext NOT NULL COMMENT 'Información extra de la imagen',
  `id_habitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para describir las imágenes de cada habitación';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL,
  `numero` varchar(500) NOT NULL COMMENT 'Número de habitación',
  `tipo` varchar(500) NOT NULL COMMENT 'Tipo de habitación',
  `extra` longtext NOT NULL COMMENT 'Información extra única de la habitación',
  `camas` longtext NOT NULL COMMENT 'Qué tipo y cuántas de camas tiene la habitación',
  `precio` varchar(500) NOT NULL COMMENT 'El precio de la habitación',
  `tamanio` varchar(500) NOT NULL COMMENT 'El tamaño en m2 de la habitación',
  `id_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que describe las habitaciones';

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `numero`, `tipo`, `extra`, `camas`, `precio`, `tamanio`, `id_hotel`) VALUES
(1, '1', 'doble', 'habitación doble', 'dos camas', '100', 'tamaño', 1),
(2, '2', 'doble', 'vista a la piscina', 'dos camas', '100', 'tamaño', 1),
(3, '3', 'doble', 'habitación dooble 3', 'dos camas', '100', 'tamaño', 1),
(4, '4', 'doble', 'primer nivel', 'dos camas', '100', 'tamaño', 1),
(5, '5', 'triple', 'una triple', 'tres camas', '200', 'tamaño grande', 1),
(6, '6', 'triple', 'habitación triple', 'tres camas', '200', 'tamaño', 1),
(7, '7', 'triple', 'una triple 7', 'tres camas', '200', 'tamaño grande', 1),
(8, '8', 'triple', 'habitación triple', 'tres camas 8', '200', 'tamaño', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hc`
--

CREATE TABLE `hc` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_caracthabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para asignar habitación con una característica';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `ubicacion` varchar(500) DEFAULT NULL,
  `telefono` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `horarioAdmin` varchar(500) DEFAULT NULL,
  `horario` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id`, `nombre`, `ubicacion`, `telefono`, `email`, `horarioAdmin`, `horario`) VALUES
(1, 'Hotel Río Reu', 'Retahuleu', 'telefono', 'email', 'todo el tiempo', 'todo el tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenestours`
--

CREATE TABLE `imagenestours` (
  `id` int(11) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `descripcion` text,
  `id_tours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para asignar habitación con una característica';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lognotificaciones`
--

CREATE TABLE `lognotificaciones` (
  `id` int(11) NOT NULL,
  `notification` text,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logregistro`
--

CREATE TABLE `logregistro` (
  `id` int(11) NOT NULL,
  `cliente` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `fechain` date DEFAULT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `habitacion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajespublicos`
--

CREATE TABLE `mensajespublicos` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `id` int(11) NOT NULL,
  `cliente` varchar(500) NOT NULL COMMENT 'Datos del que reserva',
  `email` varchar(500) NOT NULL COMMENT 'correo para contacto',
  `peticiones` varchar(500) NOT NULL COMMENT 'Peticiones especiales'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para hacer reservaciones';

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `cliente`, `email`, `peticiones`) VALUES
(1, 'Haroldo', 'haroldolopeziron@gmail.com', 'ninguna'),
(2, 'Gabo', 'gabsguateamala@gmail.com', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `tipo` varchar(500) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para asignar habitación con una característica';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int(11) NOT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `comentario` text,
  `id_arh` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ahc`
--
ALTER TABLE `ahc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_caracthotel` (`id_caracthotel`);

--
-- Indices de la tabla `archivospagos`
--
ALTER TABLE `archivospagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reservacion` (`id_reservacion`);

--
-- Indices de la tabla `arh`
--
ALTER TABLE `arh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reservacion` (`id_reservacion`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `caracthabitacion`
--
ALTER TABLE `caracthabitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caracthotel`
--
ALTER TABLE `caracthotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitacion` (`id_habitacion`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `hc`
--
ALTER TABLE `hc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitacion` (`id_habitacion`),
  ADD KEY `id_caracthabitacion` (`id_caracthabitacion`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenestours`
--
ALTER TABLE `imagenestours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tours` (`id_tours`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arh` (`id_arh`),
  ADD KEY `id_empleados` (`id_empleados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ahc`
--
ALTER TABLE `ahc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `archivospagos`
--
ALTER TABLE `archivospagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `arh`
--
ALTER TABLE `arh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `caracthotel`
--
ALTER TABLE `caracthotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `hc`
--
ALTER TABLE `hc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imagenestours`
--
ALTER TABLE `imagenestours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ahc`
--
ALTER TABLE `ahc`
  ADD CONSTRAINT `ahc_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `ahc_ibfk_2` FOREIGN KEY (`id_caracthotel`) REFERENCES `caracthotel` (`id`);

--
-- Filtros para la tabla `archivospagos`
--
ALTER TABLE `archivospagos`
  ADD CONSTRAINT `archivospagos_ibfk_1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservacion` (`id`);

--
-- Filtros para la tabla `arh`
--
ALTER TABLE `arh`
  ADD CONSTRAINT `arh_ibfk_1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservacion` (`id`),
  ADD CONSTRAINT `arh_ibfk_2` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`);

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`);

--
-- Filtros para la tabla `hc`
--
ALTER TABLE `hc`
  ADD CONSTRAINT `hc_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`),
  ADD CONSTRAINT `hc_ibfk_2` FOREIGN KEY (`id_caracthabitacion`) REFERENCES `caracthabitacion` (`id`);

--
-- Filtros para la tabla `imagenestours`
--
ALTER TABLE `imagenestours`
  ADD CONSTRAINT `imagenestours_ibfk_1` FOREIGN KEY (`id_tours`) REFERENCES `tours` (`id`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`id_arh`) REFERENCES `arh` (`id`),
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
