-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2019 a las 17:09:04
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `turnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `dniCliente` int(10) NOT NULL,
  `idTurno` int(5) DEFAULT NULL,
  `nombreCliente` varchar(80) NOT NULL,
  `apellidoCliente` varchar(80) NOT NULL,
  `mailCliente` varchar(120) DEFAULT NULL,
  `telefono1Cliente` int(40) DEFAULT NULL,
  `telefono2Cliente` int(40) DEFAULT NULL,
  PRIMARY KEY (`dniCliente`),
  KEY `idTurno` (`idTurno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dniCliente`, `idTurno`, `nombreCliente`, `apellidoCliente`, `mailCliente`, `telefono1Cliente`, `telefono2Cliente`) VALUES
(1, 58, '', '', NULL, NULL, NULL),
(2, 59, '', '', NULL, NULL, NULL),
(3, 60, '', '', NULL, NULL, NULL),
(4, 61, '', '', NULL, NULL, NULL),
(5, 62, '', '', NULL, NULL, NULL),
(6, 63, '', '', NULL, NULL, NULL),
(7, 64, '', '', NULL, NULL, NULL),
(8, 65, '', '', NULL, NULL, NULL),
(9, 66, '', '', NULL, NULL, NULL),
(10, 68, '', '', NULL, NULL, NULL),
(11, 69, '', '', NULL, NULL, NULL),
(12, 70, '', '', NULL, NULL, NULL),
(13, 71, '', '', NULL, NULL, NULL),
(14, 72, '', '', NULL, NULL, NULL),
(15, 73, '', '', NULL, NULL, NULL),
(16, 74, '', '', NULL, NULL, NULL),
(17, 75, '', '', NULL, NULL, NULL),
(18, 76, '', '', NULL, NULL, NULL),
(19, 77, '', '', NULL, NULL, NULL),
(20, 78, '', '', NULL, NULL, NULL),
(21, 79, '', '', NULL, NULL, NULL),
(22, 80, '', '', NULL, NULL, NULL),
(23, 81, '', '', NULL, NULL, NULL),
(24, 82, '', '', NULL, NULL, NULL),
(25, 83, '', '', NULL, NULL, NULL),
(26, 84, '', '', NULL, NULL, NULL),
(27, 85, '', '', NULL, NULL, NULL),
(28, 86, '', '', NULL, NULL, NULL),
(29, 87, '', '', NULL, NULL, NULL),
(30, 88, '', '', NULL, NULL, NULL),
(31, 89, '', '', NULL, NULL, NULL),
(32, 90, '', '', NULL, NULL, NULL),
(33, 91, '', '', NULL, NULL, NULL),
(34, 92, '', '', NULL, NULL, NULL),
(35, 93, '', '', NULL, NULL, NULL),
(36, 96, '', '', NULL, NULL, NULL),
(37, 97, '', '', NULL, NULL, NULL),
(39, 98, '', '', NULL, NULL, NULL),
(40, 99, '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoturno`
--

CREATE TABLE IF NOT EXISTS `estadoturno` (
  `idEstadoTurno` int(5) NOT NULL AUTO_INCREMENT,
  `nombreEstadoTurno` varchar(80) NOT NULL,
  PRIMARY KEY (`idEstadoTurno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estadoturno`
--

INSERT INTO `estadoturno` (`idEstadoTurno`, `nombreEstadoTurno`) VALUES
(1, 'Creado'),
(2, 'Llamado'),
(3, 'Atendido'),
(4, 'No Atendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE IF NOT EXISTS `operacion` (
  `idOperacion` int(5) NOT NULL AUTO_INCREMENT,
  `idSector` int(5) NOT NULL,
  `nombreOperacion` varchar(80) NOT NULL,
  `nomenclaturaOperacion` varchar(2) NOT NULL,
  PRIMARY KEY (`idOperacion`),
  KEY `idSector` (`idSector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`idOperacion`, `idSector`, `nombreOperacion`, `nomenclaturaOperacion`) VALUES
(1, 1, 'Comprar', 'Co'),
(2, 1, 'Vender', 'Ve'),
(3, 1, 'Tasacion', 'Ta'),
(4, 2, 'Contratos', 'Co'),
(5, 2, 'Renovaciones', 'Rn'),
(6, 3, 'Resiciones', 'Rs'),
(7, 2, 'Reclamos', 'Re'),
(8, 2, 'Reintegro de Servicios', 'Re'),
(9, 2, 'Presentar Documentacion', 'Do'),
(10, 2, 'Ofrecer Alquiler', 'Of'),
(11, 2, 'Buscar Alquiler', 'Bu'),
(12, 3, 'Pagar Alquiler', 'Pa'),
(13, 3, 'Cobrar Alquiler', 'Co'),
(14, 4, 'RRHH', 'Rh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacionperfil`
--

CREATE TABLE IF NOT EXISTS `operacionperfil` (
  `idOpPerfil` int(5) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(5) NOT NULL,
  `idOperacion` int(5) NOT NULL,
  `comentario` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`idOpPerfil`,`idPerfil`,`idOperacion`),
  KEY `idPerfil` (`idPerfil`),
  KEY `idOperacion` (`idOperacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `operacionperfil`
--

INSERT INTO `operacionperfil` (`idOpPerfil`, `idPerfil`, `idOperacion`, `comentario`) VALUES
(1, 1, 1, 'Comercial -> Comprar'),
(2, 1, 2, 'Comercial -> Vender'),
(3, 1, 3, 'Comercial -> Tasar'),
(4, 2, 4, 'Adm -> Contratos'),
(5, 2, 8, 'Adm -> Reintegro'),
(6, 3, 5, 'Adm -> Renovacion'),
(7, 4, 6, 'Adm -> Resicion'),
(8, 5, 7, 'Adm -> Reclamos'),
(9, 6, 9, 'Comercial -> Presentar Documentacion'),
(10, 7, 10, 'Comercial -> Ofrecer Alquiler'),
(11, 8, 11, 'Comercial -> Buscar Alquiler'),
(12, 9, 14, 'RRHH'),
(13, 10, 12, 'Caja -> Pagar Alquiler'),
(14, 10, 13, 'Caja -> Cobrar Alquiler');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(5) NOT NULL AUTO_INCREMENT,
  `nombrePerfil` varchar(50) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nombrePerfil`) VALUES
(1, 'VentaPerfil'),
(2, 'ContratosPerfil'),
(3, 'RenovacionPerfil'),
(4, 'ResicionPerfil'),
(5, 'ReclamosPerfil'),
(6, 'PresentarDocumentacionPerfil'),
(7, 'OfrecerAlquiler'),
(8, 'BuscarAlquiler'),
(9, 'RRHHPerfil'),
(10, 'CajaPerfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `idSector` int(5) NOT NULL AUTO_INCREMENT,
  `nombreSector` varchar(80) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `nomenclaturaSector` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idSector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`idSector`, `nombreSector`, `visible`, `nomenclaturaSector`) VALUES
(1, 'Venta', 1, 'V'),
(2, 'Alquiler', 1, 'A'),
(3, 'Caja', 1, 'C'),
(4, 'Otros', 1, 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idTurno` int(20) NOT NULL AUTO_INCREMENT,
  `idOperacion` int(5) NOT NULL,
  `idSector` int(5) NOT NULL,
  `nombreTurno` varchar(10) DEFAULT NULL,
  `box` int(5) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `comentario` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idTurno`),
  KEY `idOperacion` (`idOperacion`),
  KEY `idSector` (`idSector`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `idOperacion`, `idSector`, `nombreTurno`, `box`, `prioridad`, `comentario`) VALUES
(58, 14, 4, NULL, NULL, NULL, NULL),
(59, 14, 4, NULL, NULL, NULL, NULL),
(60, 14, 4, NULL, NULL, NULL, NULL),
(61, 1, 1, NULL, NULL, NULL, NULL),
(62, 2, 1, NULL, NULL, NULL, NULL),
(63, 3, 1, NULL, NULL, NULL, NULL),
(64, 11, 2, NULL, NULL, NULL, NULL),
(65, 12, 3, '1', NULL, NULL, NULL),
(66, 14, 4, '1', NULL, NULL, NULL),
(67, 14, 4, '1', NULL, NULL, NULL),
(68, 14, 4, '1', NULL, NULL, NULL),
(69, 14, 4, '1', NULL, NULL, NULL),
(70, 14, 4, 'ho', NULL, NULL, NULL),
(71, 14, 4, '1', NULL, NULL, NULL),
(72, 14, 4, '0', NULL, NULL, NULL),
(73, 14, 4, '0', NULL, NULL, NULL),
(74, 14, 4, '0', NULL, NULL, NULL),
(75, 14, 4, '0', NULL, NULL, NULL),
(76, 14, 4, NULL, NULL, NULL, NULL),
(77, 14, 4, NULL, NULL, NULL, NULL),
(78, 14, 4, NULL, NULL, NULL, NULL),
(79, 14, 4, 'Array', NULL, NULL, NULL),
(80, 14, 4, '1', NULL, NULL, NULL),
(81, 14, 4, '17', NULL, NULL, NULL),
(82, 14, 4, '18', NULL, NULL, NULL),
(83, 14, 4, '0', NULL, NULL, NULL),
(84, 14, 4, '1', NULL, NULL, NULL),
(85, 14, 4, '2', NULL, NULL, NULL),
(86, 1, 1, '0', NULL, NULL, NULL),
(87, 2, 1, '1', NULL, NULL, NULL),
(88, 3, 1, '2', NULL, NULL, NULL),
(89, 11, 2, '0', NULL, NULL, NULL),
(90, 10, 2, '1', NULL, NULL, NULL),
(91, 1, 1, '0', NULL, NULL, NULL),
(92, 2, 1, '1', NULL, NULL, NULL),
(93, 3, 1, '2', NULL, NULL, NULL),
(94, 11, 2, '0', NULL, NULL, NULL),
(95, 11, 2, '1', NULL, NULL, NULL),
(96, 5, 2, '2', NULL, NULL, NULL),
(97, 11, 2, '3', NULL, NULL, NULL),
(98, 12, 3, '0', NULL, NULL, NULL),
(99, 14, 4, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnohistorial`
--

CREATE TABLE IF NOT EXISTS `turnohistorial` (
  `idTurnoHistorial` int(5) NOT NULL AUTO_INCREMENT,
  `idTurno` int(20) NOT NULL,
  `idEstadoTurno` int(5) NOT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  PRIMARY KEY (`idTurnoHistorial`),
  KEY `idTurno` (`idTurno`),
  KEY `idEstadoTurno` (`idEstadoTurno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Volcado de datos para la tabla `turnohistorial`
--

INSERT INTO `turnohistorial` (`idTurnoHistorial`, `idTurno`, `idEstadoTurno`, `fechaAlta`, `fechaBaja`) VALUES
(56, 58, 2, '2019-10-17 13:10:59', NULL),
(57, 59, 1, '2019-10-17 13:18:21', NULL),
(58, 60, 1, '2019-10-16 13:18:37', NULL),
(59, 61, 1, '2019-10-17 13:18:53', NULL),
(60, 62, 1, '2019-10-16 13:19:14', NULL),
(61, 63, 1, '2019-10-17 13:19:41', NULL),
(62, 64, 1, '2019-10-17 13:20:00', NULL),
(63, 65, 1, '2019-10-17 14:40:43', NULL),
(64, 66, 1, '2019-10-17 14:42:00', NULL),
(65, 67, 1, '2019-10-17 14:44:15', NULL),
(66, 68, 1, '2019-10-17 14:46:16', NULL),
(67, 69, 1, '2019-10-17 14:47:08', NULL),
(68, 70, 1, '2019-10-17 14:48:11', NULL),
(69, 71, 1, '2019-10-17 14:49:15', NULL),
(70, 72, 1, '2019-10-17 14:50:47', NULL),
(71, 73, 1, '2019-10-17 14:57:04', NULL),
(72, 74, 1, '2019-10-17 14:59:00', NULL),
(73, 75, 1, '2019-10-17 15:00:05', NULL),
(74, 76, 1, '2019-10-17 15:00:53', NULL),
(75, 77, 1, '2019-10-17 15:01:48', NULL),
(76, 78, 1, '2019-10-17 15:04:40', NULL),
(77, 79, 1, '2019-10-17 15:06:48', NULL),
(78, 80, 1, '2019-10-17 15:10:31', NULL),
(79, 81, 1, '2019-10-17 15:14:02', NULL),
(80, 82, 1, '2019-10-17 16:25:47', NULL),
(81, 83, 1, '2019-10-18 09:34:17', NULL),
(82, 84, 1, '2019-10-18 09:35:05', NULL),
(83, 85, 1, '2019-10-18 09:37:45', NULL),
(84, 86, 1, '2019-10-18 09:39:03', NULL),
(85, 87, 1, '2019-10-18 09:39:24', NULL),
(86, 88, 1, '2019-10-18 09:39:42', NULL),
(87, 89, 1, '2019-10-18 09:40:05', NULL),
(88, 90, 1, '2019-10-18 09:40:22', NULL),
(89, 91, 1, '2019-10-21 11:40:53', NULL),
(90, 92, 1, '2019-10-21 11:41:07', NULL),
(91, 93, 1, '2019-10-21 11:41:20', NULL),
(92, 94, 1, '2019-10-21 11:46:02', NULL),
(93, 95, 1, '2019-10-21 11:46:22', NULL),
(94, 96, 1, '2019-10-21 11:46:43', NULL),
(95, 97, 1, '2019-10-21 11:46:58', NULL),
(96, 98, 1, '2019-10-21 11:47:15', NULL),
(97, 99, 2, '2019-10-21 11:47:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(5) NOT NULL AUTO_INCREMENT,
  `idPerfil` int(5) NOT NULL,
  `nombreUsuario` varchar(80) NOT NULL,
  `passUsuario` varchar(80) NOT NULL,
  `nombreReal` varchar(80) NOT NULL,
  `apellidoReal` varchar(80) NOT NULL,
  `dniUsuario` int(20) NOT NULL,
  `correoUsuario` varchar(80) NOT NULL,
  `telefonoUsuario` int(40) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idPerfil` (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idPerfil`, `nombreUsuario`, `passUsuario`, `nombreReal`, `apellidoReal`, `dniUsuario`, `correoUsuario`, `telefonoUsuario`) VALUES
(1, 2, 'user', 'pass', 'David', 'Pereyra', 34113017, 'dpereyra@cocucci.com.ar', 155),
(2, 1, 'user2', 'pass', '', '', 0, '', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`idTurno`);

--
-- Filtros para la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD CONSTRAINT `operacion_ibfk_1` FOREIGN KEY (`idSector`) REFERENCES `sector` (`idSector`);

--
-- Filtros para la tabla `operacionperfil`
--
ALTER TABLE `operacionperfil`
  ADD CONSTRAINT `operacionperfil_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`),
  ADD CONSTRAINT `operacionperfil_ibfk_2` FOREIGN KEY (`idOperacion`) REFERENCES `operacion` (`idOperacion`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `idOperacion` FOREIGN KEY (`idOperacion`) REFERENCES `operacion` (`idOperacion`),
  ADD CONSTRAINT `idSector` FOREIGN KEY (`idSector`) REFERENCES `sector` (`idSector`);

--
-- Filtros para la tabla `turnohistorial`
--
ALTER TABLE `turnohistorial`
  ADD CONSTRAINT `turnohistorial_ibfk_1` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`idTurno`),
  ADD CONSTRAINT `turnohistorial_ibfk_2` FOREIGN KEY (`idEstadoTurno`) REFERENCES `estadoturno` (`idEstadoTurno`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
