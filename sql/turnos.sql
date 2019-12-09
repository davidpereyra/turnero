-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 18:33:54
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(5) NOT NULL,
  `dniCliente` int(8) DEFAULT NULL,
  `cuitCliente` varchar(18) DEFAULT NULL,
  `nombreCliente` varchar(80) DEFAULT NULL,
  `apellidoCliente` varchar(80) DEFAULT NULL,
  `mailCliente` varchar(120) DEFAULT NULL,
  `telefono1Cliente` varchar(40) DEFAULT NULL,
  `telefono2Cliente` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dniCliente`, `cuitCliente`, `nombreCliente`, `apellidoCliente`, `mailCliente`, `telefono1Cliente`, `telefono2Cliente`) VALUES
(1, 34113017, NULL, 'Alberto David', 'Pereyra', 'webdeveloperdavid@gmail.com', '+54 9 2616205958', '261 4482540'),
(2, 20335925, NULL, 'Cristian', 'Cocucci', '', '', ''),
(3, 18446951, NULL, 'Pablo', 'Cocucci', '', '', ''),
(5, 0, '', 'Alejandro', 'Barroso', 'abarroso@cocucci.com.ar', '', ''),
(6, 26792840, '27-26792840-7', 'Andrea', 'Estalles', 'aestalles@cocucci.com.ar', '', ''),
(7, 37267443, '', 'Antonella', 'Herrera', 'aherrera@cocucci.com.ar', '', ''),
(8, 32486407, '', 'Andrea', 'Landa', 'alanda@cocucci.com.ar', '', ''),
(9, 27238766, '20-27238766-5', 'Aldo', 'Noli', 'aldo@cocucci.com.ar', '', ''),
(10, 28757254, '27-28757254-4', 'Andrea', 'Ortega', 'aortega@cocucci.com.ar', '', ''),
(11, 25782695, '', 'Adrian', 'Ramirez', 'aramirez@cocucci.com.ar', '', ''),
(13, 31645068, '', 'Andrea', 'Algañaraz', 'avalls@cocucci.com.ar', '', ''),
(15, 21863615, '', 'Carlos', 'Cocucci', 'carlos@cocucci.com.ar', '', ''),
(17, 20335925, '20-20335925-0', 'Cristian', 'Cocucci', 'cristian@cocucci.com.ar', '', ''),
(18, 22059658, '27-22059658-9', 'Cristina', 'Velasco', 'cvelasco@cocucci.com.ar', '', ''),
(19, 23574866, '', 'Diego', 'Aguinaga', 'daguinaga@cocucci.com.ar', '', ''),
(20, 38756298, '', 'Daniel', 'Herrera', 'dherrera@cocucci.com.ar', '', ''),
(21, 34113017, '20-34113017-5', 'David', 'Pereyra', 'dpereyra@cocucci.com.ar', '', ''),
(22, 0, '', 'Emiliano', 'Di Cesare', 'edicesare@cocucci.com.ar', '', ''),
(23, 34627802, '27-34627802-7', 'Erica', 'Fernandez', 'efernandez@cocucci.com.ar', '', ''),
(24, 14978161, '20-14978161-8', 'Eduardo', 'Vazquez', 'evazquez@cocucci.com.ar', '', ''),
(25, 36766970, '', 'Franco', 'Gresta', 'fgresta@cocucci.com.ar', '', ''),
(26, 32571722, '27-32571722-5', 'Fernanda', 'Monchon', 'fmanchon@cocucci.com.ar', '', ''),
(27, 33445977, '20-33445977-3', 'Hernan', 'Noli', 'hernan@cocucci.com.ar', '', ''),
(28, 22903614, '', 'Hector', 'Vietti', 'hvietti@cocucci.com.ar', '', ''),
(29, 34917882, '', 'Ignacio', 'Cocucci', 'ignacio@cocucci.com.ar', '', ''),
(30, 31645390, '', 'Matias', 'Cocucci', 'matias@cocucci.com.ar', '', ''),
(31, 26495529, '', 'Maximiliano', 'Firmapaz', 'mfirmapaz@cocucci.com.ar', '', ''),
(32, 5126770, '27-05126770-8', 'Mirta', 'Fernandez', 'mirta@cocucci.com.ar', '', ''),
(33, 22621348, '27-22621348-7', 'Mirta', 'Cocucci', 'mirta.andrea@cocucci.com.ar', '', ''),
(34, 22009422, '27-22009422-2', 'Marisa', 'Manuele', 'mmanuele@cocucci.com.ar', '', ''),
(35, 18446951, '20-18446951-1', 'Pablo', 'Cocucci', 'pablo@cocucci.com.ar', '', ''),
(36, 26960411, '', 'Paola', 'Cocucci', 'paola@cocucci.com.ar', '', ''),
(37, 37271405, '', 'Pablo', 'Dominguez', 'pdominguez@cocucci.com.ar', '', ''),
(38, 22625482, '20-22625482-0', 'Pablo', 'Furlan', 'pfurlan@cocucci.com.ar', '', ''),
(39, 0, '', 'Ricardo', 'Fiorenza', 'rfiorenza@cocucci.com.ar', '', ''),
(40, 12609027, '', 'Rodolfo', 'Romero', 'rodolfo@cocucci.com.ar', '', ''),
(41, 12931468, '20-12931468-1', 'Ruben', 'Ortega', 'rortega@cocucci.com.ar', '', ''),
(42, 33376908, '20-33376908-6', 'Sebastian', 'Dominguez', 'sdominguez@cocucci.com.ar', '', ''),
(43, 32751472, '', 'Silvana', 'Pacheco', 'silvana@cocucci.com.ar', '', ''),
(44, 0, '', 'Silvina', 'Manuele', 'smanuele@cocucci.com.ar', '', ''),
(45, 24486589, '', 'Soledad', 'Caballero', 'soledad@cocucci.com.ar', '', ''),
(46, 16632827, '23-16632827-4', 'Stella', 'Rodriguez', 'srodriguez@cocucci.com.ar', '', ''),
(47, 36277640, '', 'Victor', 'Biazzo', 'vbiazzo@cocucci.com.ar', '', ''),
(48, 20949196, '20-20949196-7', 'Victor', 'Bocci', 'vbocci@cocucci.com.ar', '', ''),
(49, 13812986, '', 'Viviana', 'Garcia', 'vgarcia@cocucci.com.ar', '', ''),
(50, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoturno`
--

CREATE TABLE `estadoturno` (
  `idEstadoTurno` int(5) NOT NULL,
  `nombreEstadoTurno` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `operacion` (
  `idOperacion` int(5) NOT NULL,
  `idSector` int(5) NOT NULL,
  `nombreOperacion` varchar(80) NOT NULL,
  `nomenclaturaOperacion` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`idOperacion`, `idSector`, `nombreOperacion`, `nomenclaturaOperacion`) VALUES
(1, 1, 'Comprar', 'A-'),
(2, 1, 'Vender', 'B-'),
(3, 1, 'Tasacion', 'C-'),
(4, 2, 'Contratos', 'D-'),
(5, 2, 'Renovaciones', 'E-'),
(6, 3, 'Resiciones', 'F-'),
(7, 2, 'Reclamos', 'G-'),
(8, 2, 'Reintegro de Servicios', 'H-'),
(9, 2, 'Presentar Documentacion', 'I-'),
(10, 2, 'Ofrecer Alquiler', 'J-'),
(11, 2, 'Buscar Alquiler', 'K-'),
(12, 3, 'Pagar Alquiler', 'L-'),
(13, 3, 'Cobrar Alquiler', 'M-'),
(14, 4, 'RRHH', 'N-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacionperfil`
--

CREATE TABLE `operacionperfil` (
  `idOpPerfil` int(5) NOT NULL,
  `idPerfil` int(5) NOT NULL,
  `idOperacion` int(5) NOT NULL,
  `comentario` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `perfil` (
  `idPerfil` int(5) NOT NULL,
  `nombrePerfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sector` (
  `idSector` int(5) NOT NULL,
  `nombreSector` varchar(80) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `nomenclaturaSector` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `turno` (
  `idTurno` int(20) NOT NULL,
  `idOperacion` int(5) NOT NULL,
  `idSector` int(5) NOT NULL,
  `idCliente` int(5) NOT NULL,
  `nombreTurno` varchar(10) DEFAULT NULL,
  `box` int(5) DEFAULT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `comentarioTurno` varchar(120) DEFAULT NULL,
  `rellamado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnohistorial`
--

CREATE TABLE `turnohistorial` (
  `idTurnoHistorial` int(5) NOT NULL,
  `idTurno` int(20) NOT NULL,
  `idEstadoTurno` int(5) NOT NULL,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(5) NOT NULL,
  `idPerfil` int(5) NOT NULL,
  `nombreUsuario` varchar(80) NOT NULL,
  `passUsuario` varchar(80) NOT NULL,
  `nombreReal` varchar(80) NOT NULL,
  `apellidoReal` varchar(80) NOT NULL,
  `dniUsuario` int(20) NOT NULL,
  `correoUsuario` varchar(80) NOT NULL,
  `telefonoUsuario` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idPerfil`, `nombreUsuario`, `passUsuario`, `nombreReal`, `apellidoReal`, `dniUsuario`, `correoUsuario`, `telefonoUsuario`) VALUES
(1, 1, 'venta', 'pass', 'David', 'Pereyra', 34113017, 'dpereyra@cocucci.com.ar', 155),
(2, 2, 'contrato', 'pass', '', '', 0, '', NULL),
(3, 3, 'renovacion', 'pass', '', '', 0, '', NULL),
(4, 4, 'rescicion', 'pass', '', '', 0, '', NULL),
(5, 5, 'reclamos', 'pass', '', '', 0, '', NULL),
(6, 6, 'presentar', 'pass', '', '', 0, '', NULL),
(7, 7, 'ofrecer', 'pass', '', '', 0, '', NULL),
(8, 8, 'buscar', 'pass', '', '', 0, '', NULL),
(9, 9, 'rrhh', 'pass', '', '', 0, '', NULL),
(10, 10, 'caja', 'pass', '', '', 0, '', NULL),
(16, 1, 'soledad', 'soledad', 'Soledad', 'Caballero', 24486589, 'soledad@cocucci.com.ar', NULL),
(17, 1, 'paola', 'paola', 'Paola', 'Cocucci', 26960411, 'paola@cocucci.com.ar', NULL),
(18, 1, 'ignacio', 'ignacio', 'Ignacio', 'Cocucci', 34917882, 'ignacio@cocucci.com.ar', NULL),
(19, 1, 'matias', 'matias', 'Matias', 'Cocucci', 31645390, 'matias@cocucci.com.ar', NULL),
(20, 1, 'abarroso', 'abarroso', 'Alejandro', 'Barroso', 0, 'abarroso@cocucci.com.ar', NULL),
(21, 1, 'cesar', 'cesar', 'Cesar', 'Reccabarrem', 0, '', NULL),
(22, 1, 'edicesare', 'edicesare', 'Emiliano', 'Di Cesare', 0, 'edicesare@cocucci.com.ar', NULL),
(23, 2, 'aestalles', 'aestalles', 'Andrea', 'Estalles', 26792840, 'aestalles@cocucci.com.ar', NULL),
(24, 2, 'srodriguez', 'srodriguez', 'Stella', 'Rodriguez', 0, '', NULL),
(25, 10, 'dherrera', 'dherrera', 'Daniel ', 'Herrera', 0, '', NULL),
(26, 10, 'efernandez', 'efernandez', 'Erica ', 'Fernandez', 0, '', NULL),
(27, 10, 'evazquez', 'evazquez', 'Eduardo ', 'Vazquez', 0, '', NULL),
(28, 10, 'pfurlan', 'pfurlan', 'Pablo', 'Furlan', 0, '', NULL),
(29, 10, 'sdominguez', 'sdominguez', 'Sebastian', 'Dominguez', 0, '', NULL),
(30, 3, 'vbocci', 'vbocci', 'Victor', 'Bocci', 0, '', NULL),
(31, 3, 'mirta.andrea', 'mirta.andrea', 'Mirta', 'Cocucci', 0, '', NULL),
(32, 4, 'pdominguez', 'pdominguez', 'Pablo', 'Dominguez', 0, '', NULL),
(33, 4, 'aramirez', 'aramirez', 'Adrian', 'Ramirez', 0, '', NULL),
(34, 5, 'rfiorenza', 'rfiorenza', 'Ricardo', 'Fiorenza', 0, '', NULL),
(35, 5, 'fgresta', 'fgresta', 'Franco ', 'Gresta', 0, '', NULL),
(36, 6, 'fmanchon', 'fmanchon', 'Fernanda', 'Manchon', 0, '', NULL),
(37, 7, 'cvelasco', 'cvelasco', 'Cristina', 'Velazco', 0, '', NULL),
(38, 8, 'aherrera', 'aherrera', 'Antonella', 'Herrera', 0, '', NULL),
(39, 9, 'rortega', 'rortega', 'Ruben ', 'Ortega', 0, '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `estadoturno`
--
ALTER TABLE `estadoturno`
  ADD PRIMARY KEY (`idEstadoTurno`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`idOperacion`),
  ADD KEY `idSector` (`idSector`);

--
-- Indices de la tabla `operacionperfil`
--
ALTER TABLE `operacionperfil`
  ADD PRIMARY KEY (`idOpPerfil`,`idPerfil`,`idOperacion`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idOperacion` (`idOperacion`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`idSector`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idTurno`),
  ADD KEY `idOperacion` (`idOperacion`),
  ADD KEY `idSector` (`idSector`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `turnohistorial`
--
ALTER TABLE `turnohistorial`
  ADD PRIMARY KEY (`idTurnoHistorial`),
  ADD KEY `idTurno` (`idTurno`),
  ADD KEY `idEstadoTurno` (`idEstadoTurno`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65566;

--
-- AUTO_INCREMENT de la tabla `estadoturno`
--
ALTER TABLE `estadoturno`
  MODIFY `idEstadoTurno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `idOperacion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `operacionperfil`
--
ALTER TABLE `operacionperfil`
  MODIFY `idOpPerfil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `idSector` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `idTurno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT de la tabla `turnohistorial`
--
ALTER TABLE `turnohistorial`
  MODIFY `idTurnoHistorial` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
