-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2019 a las 16:12:58
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
  `idCliente` int(5) NOT NULL AUTO_INCREMENT,
  `dniCliente` int(10) DEFAULT NULL,
  `nombreCliente` varchar(80) DEFAULT NULL,
  `apellidoCliente` varchar(80) DEFAULT NULL,
  `mailCliente` varchar(120) DEFAULT NULL,
  `telefono1Cliente` int(40) DEFAULT NULL,
  `telefono2Cliente` int(40) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dniCliente`, `nombreCliente`, `apellidoCliente`, `mailCliente`, `telefono1Cliente`, `telefono2Cliente`) VALUES
(1, 34113017, 'Alberto David Oscar', 'Pereyra', '', 0, 0),
(2, 1, '', '', NULL, NULL, NULL),
(3, 12, '', '', NULL, NULL, NULL),
(4, 1, 'nombre1', 'ape1', 'mail1@algo', 2147483647, 4482540),
(5, 34113017, 'Alberto David Oscar', 'Pereyra', '', 0, 0),
(6, 34113017, 'Hernan', 'Noli', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoturno`
--

CREATE TABLE IF NOT EXISTS `estadoturno` (
  `idEstadoTurno` int(5) NOT NULL AUTO_INCREMENT,
  `nombreEstadoTurno` varchar(80) NOT NULL,
  PRIMARY KEY (`idEstadoTurno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estadoturno`
--

INSERT INTO `estadoturno` (`idEstadoTurno`, `nombreEstadoTurno`) VALUES
(1, 'Creado'),
(2, 'Llamado'),
(3, 'Atendiendo'),
(4, 'No Atendido'),
(5, 'Atendido');

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
(5, 5, 8, 'Adm -> Reintegro'),
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
  `idCliente` int(5) NOT NULL,
  `nombreTurno` varchar(10) DEFAULT NULL,
  `box` int(5) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `comentarioTurno` varchar(120) DEFAULT NULL,
  `rellamado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTurno`),
  KEY `idOperacion` (`idOperacion`),
  KEY `idSector` (`idSector`),
  KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `idOperacion`, `idSector`, `idCliente`, `nombreTurno`, `box`, `prioridad`, `comentarioTurno`, `rellamado`) VALUES
(166, 1, 1, 2, '0', 3, NULL, NULL, 0),
(167, 1, 1, 3, '3', 3, NULL, NULL, 0),
(168, 2, 1, 4, '6', 3, NULL, NULL, 0),
(170, 2, 1, 5, '9', 3, NULL, NULL, 0),
(171, 3, 1, 6, '12', 3, NULL, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=275 ;

--
-- Volcado de datos para la tabla `turnohistorial`
--

INSERT INTO `turnohistorial` (`idTurnoHistorial`, `idTurno`, `idEstadoTurno`, `fechaAlta`, `fechaBaja`) VALUES
(260, 166, 1, '2019-10-30 11:41:24', '2019-10-30 11:59:30'),
(261, 166, 2, '2019-10-30 11:58:00', '2019-10-30 11:59:30'),
(262, 166, 3, '2019-10-30 11:59:30', NULL),
(263, 167, 1, '2019-10-30 12:03:38', '2019-10-30 12:09:17'),
(264, 167, 2, '2019-10-30 12:07:11', '2019-10-30 12:09:17'),
(265, 167, 3, '2019-10-30 12:08:52', '2019-10-30 12:09:17'),
(266, 168, 1, '2019-10-30 12:09:52', '2019-10-30 12:10:18'),
(267, 168, 2, '2019-10-30 12:10:06', '2019-10-30 12:10:18'),
(268, 168, 3, '2019-10-30 12:10:18', NULL),
(269, 170, 1, '2019-10-30 13:00:35', '2019-10-30 13:01:04'),
(270, 170, 2, '2019-10-30 13:00:53', '2019-10-30 13:01:04'),
(271, 170, 3, '2019-10-30 13:01:04', NULL),
(272, 171, 1, '2019-10-30 13:06:52', '2019-10-30 13:09:01'),
(273, 171, 2, '2019-10-30 13:07:11', '2019-10-30 13:09:01'),
(274, 171, 3, '2019-10-30 13:07:59', '2019-10-30 13:09:01');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idPerfil`, `nombreUsuario`, `passUsuario`, `nombreReal`, `apellidoReal`, `dniUsuario`, `correoUsuario`, `telefonoUsuario`) VALUES
(1, 1, 'venta', 'pass', 'David', 'Pereyra', 34113017, 'dpereyra@cocucci.com.ar', 155),
(2, 2, 'contrato', 'pass', '', '', 0, '', NULL),
(3, 3, 'renovacion', 'pass', '', '', 0, '', NULL),
(4, 4, 'resicion', 'pass', '', '', 0, '', NULL),
(5, 5, 'reclamo', 'pass', '', '', 0, '', NULL),
(6, 6, 'presentar', 'pass', '', '', 0, '', NULL),
(7, 7, 'ofrecer', 'pass', '', '', 0, '', NULL),
(8, 8, 'buscar', 'pass', '', '', 0, '', NULL),
(9, 9, 'rrhh', 'pass', '', '', 0, '', NULL),
(10, 10, 'caja', 'pass', '', '', 0, '', NULL);

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
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
