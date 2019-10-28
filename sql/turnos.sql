-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2019 a las 17:20:19
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
  `nombreCliente` varchar(80) NOT NULL,
  `apellidoCliente` varchar(80) NOT NULL,
  `mailCliente` varchar(120) DEFAULT NULL,
  `telefono1Cliente` int(40) DEFAULT NULL,
  `telefono2Cliente` int(40) DEFAULT NULL,
  PRIMARY KEY (`dniCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`dniCliente`, `nombreCliente`, `apellidoCliente`, `mailCliente`, `telefono1Cliente`, `telefono2Cliente`) VALUES
(1, 'nombrecliente1', 'apellidocliente1', 'mailcliente1', 0, 0),
(3, '', '', NULL, NULL, NULL),
(7, '', '', NULL, NULL, NULL),
(11, '', '', NULL, NULL, NULL),
(12, '', '', NULL, NULL, NULL),
(44, '', '', NULL, NULL, NULL),
(111, 'nombre del 111', 'apellido del 111', 'Mail cliente 111', 0, 0),
(123, '', '', NULL, NULL, NULL),
(333, '', '', NULL, NULL, NULL),
(666, '', '', NULL, NULL, NULL),
(1111, '', '', NULL, NULL, NULL),
(7458, '', '', NULL, NULL, NULL),
(11111, '', '', NULL, NULL, NULL),
(2345678, '', '', NULL, NULL, NULL),
(13123123, '', '', NULL, NULL, NULL),
(123123123, '', '', NULL, NULL, NULL);

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
  `dniCliente` int(10) NOT NULL,
  `nombreTurno` varchar(10) DEFAULT NULL,
  `box` int(5) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `comentarioTurno` varchar(120) DEFAULT NULL,
  `rellamado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTurno`),
  KEY `idOperacion` (`idOperacion`),
  KEY `idSector` (`idSector`),
  KEY `dniCliente` (`dniCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `idOperacion`, `idSector`, `dniCliente`, `nombreTurno`, `box`, `prioridad`, `comentarioTurno`, `rellamado`) VALUES
(102, 2, 1, 7, '0', NULL, NULL, NULL, NULL),
(103, 11, 2, 11, '0', NULL, NULL, NULL, NULL),
(104, 2, 1, 11, '0', NULL, NULL, NULL, NULL),
(109, 1, 1, 11, '1', NULL, NULL, NULL, NULL),
(114, 1, 1, 11, '2', NULL, NULL, NULL, NULL),
(120, 1, 1, 1, '3', NULL, NULL, NULL, NULL),
(121, 14, 4, 1, '0', NULL, NULL, NULL, NULL),
(122, 1, 1, 44, '0', NULL, NULL, NULL, NULL),
(123, 11, 2, 1, '0', NULL, NULL, NULL, 1),
(124, 12, 3, 11, '0', NULL, NULL, NULL, NULL),
(125, 4, 2, 111, '1', NULL, NULL, NULL, NULL),
(126, 14, 4, 7458, '1', NULL, NULL, NULL, NULL),
(127, 3, 1, 1111, '6', NULL, NULL, NULL, NULL),
(128, 8, 2, 11111, '3', NULL, NULL, NULL, NULL),
(129, 2, 1, 1, '0', 40, NULL, NULL, NULL),
(130, 2, 1, 111, '0', 11, NULL, 'Comentario 130', NULL),
(131, 1, 1, 123, '1', 11, NULL, NULL, NULL),
(132, 3, 1, 3, '4', 11, NULL, NULL, NULL),
(133, 3, 1, 666, '6', 11, NULL, NULL, NULL),
(134, 1, 1, 333, '8', 11, NULL, NULL, 1),
(135, 3, 1, 13123123, '11', 11, NULL, NULL, 1),
(136, 1, 1, 2345678, '13', 11, NULL, NULL, 1),
(137, 1, 1, 123123123, '15', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Volcado de datos para la tabla `turnohistorial`
--

INSERT INTO `turnohistorial` (`idTurnoHistorial`, `idTurno`, `idEstadoTurno`, `fechaAlta`, `fechaBaja`) VALUES
(100, 103, 1, '2019-10-25 10:28:38', NULL),
(101, 104, 1, '2019-10-25 11:12:48', NULL),
(102, 109, 1, '2019-10-25 14:10:53', NULL),
(103, 114, 1, '2019-10-25 14:19:44', NULL),
(104, 120, 1, '2019-10-25 14:54:50', '2019-10-25 00:00:00'),
(106, 122, 1, '2019-10-25 12:00:50', NULL),
(107, 123, 1, '2019-10-25 12:01:08', NULL),
(108, 124, 1, '2019-10-25 12:01:37', NULL),
(109, 125, 1, '2019-10-25 12:12:21', NULL),
(110, 120, 2, '2019-10-25 15:14:36', NULL),
(111, 126, 1, '2019-10-25 16:34:48', '2019-10-25 00:00:00'),
(112, 121, 2, '2019-10-25 16:36:49', NULL),
(113, 126, 2, '2019-10-25 16:37:27', NULL),
(114, 127, 1, '2019-10-25 16:39:40', NULL),
(115, 128, 1, '2019-10-25 16:40:47', NULL),
(116, 129, 1, '2019-10-27 00:06:23', '2019-10-28 00:00:00'),
(117, 129, 2, '2019-10-27 00:06:33', NULL),
(118, 130, 1, '2019-10-28 09:12:10', '2019-10-28 00:00:00'),
(123, 131, 1, '2019-10-28 09:58:23', '2019-10-28 00:00:00'),
(124, 130, 2, '2019-10-28 10:44:48', NULL),
(125, 131, 2, '2019-10-28 11:29:43', NULL),
(126, 132, 1, '2019-10-28 11:31:16', '2019-10-28 00:00:00'),
(127, 132, 2, '2019-10-28 11:34:19', NULL),
(128, 133, 1, '2019-10-28 11:54:54', '2019-10-28 00:00:00'),
(129, 133, 2, '2019-10-28 12:07:58', NULL),
(130, 134, 1, '2019-10-28 12:09:34', '2019-10-28 00:00:00'),
(149, 134, 2, '2019-10-28 13:01:57', '2019-10-28 00:00:00'),
(150, 134, 3, '2019-10-28 13:02:14', NULL),
(151, 135, 1, '2019-10-28 13:03:10', '2019-10-28 00:00:00'),
(152, 135, 2, '2019-10-28 13:03:41', NULL),
(153, 136, 1, '2019-10-28 14:16:54', '2019-10-28 00:00:00'),
(154, 136, 2, '2019-10-28 14:17:49', NULL),
(155, 137, 1, '2019-10-28 14:19:05', NULL);

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
  ADD CONSTRAINT `dniCliente` FOREIGN KEY (`dniCliente`) REFERENCES `cliente` (`dniCliente`),
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
