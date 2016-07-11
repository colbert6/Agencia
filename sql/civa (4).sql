-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 11:33:14
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `civa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE IF NOT EXISTS `asiento` (
`asi_id` int(11) NOT NULL,
  `asi_viaje` int(11) NOT NULL,
  `asi_num` int(11) NOT NULL,
  `asi_estado` int(11) NOT NULL,
  `pas_tipo_documento` int(8) NOT NULL,
  `pas_dni` varchar(20) NOT NULL,
  `pas_nombre` varchar(100) NOT NULL,
  `pas_apellidos` varchar(200) NOT NULL,
  `pas_edad` int(11) DEFAULT NULL,
  `pas_sexo` varchar(20) NOT NULL,
  `pas_email` varchar(100) DEFAULT NULL,
  `pas_telefono` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`asi_id`, `asi_viaje`, `asi_num`, `asi_estado`, `pas_tipo_documento`, `pas_dni`, `pas_nombre`, `pas_apellidos`, `pas_edad`, `pas_sexo`, `pas_email`, `pas_telefono`) VALUES
(1, 3, 1, 1, 1, '73031934', 'Colbert', 'Calampa', 18, '', 'email', '12345'),
(2, 3, 5, 1, 1, '77805042', 'tUNO', 'aNGELES', 18, '', 'email', '12345'),
(3, 5, 49, 1, 1, '73949944', 'Colbert', 'Tantachuco', NULL, 'm', NULL, '973949944'),
(4, 3, 48, 1, 1, '45678899', 'ian', 'ruiz', NULL, 'm', NULL, '7657895');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`car_id` int(11) NOT NULL,
  `car_descripcion` varchar(50) NOT NULL,
  `car_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`car_id`, `car_descripcion`, `car_estado`) VALUES
(1, 'Conductor', 1),
(2, 'Vigilante', 1),
(3, 'Terramoza', 1),
(4, 'Supervisor', 1),
(5, 'Mecanico', 1),
(6, 'Auxiliar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
`ciu_id` int(11) NOT NULL,
  `ciu_codigo_postal` varchar(20) NOT NULL,
  `ciu_nombre` varchar(100) NOT NULL,
  `ciu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_codigo_postal`, `ciu_nombre`, `ciu_estado`) VALUES
(1, '001', 'Tarapoto', 1),
(2, '002', 'Moyobamba', 1),
(3, '003', 'Juajui', 1),
(4, '004', 'Cuzco', 1),
(5, '005', 'Arequipa', 1),
(6, '006', 'Lima', 1),
(7, '007', 'Chiclayo', 0),
(8, '12', '12s', 0),
(9, '12', '12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
`pas_id` int(11) NOT NULL,
  `pas_tipo_documento` varchar(20) NOT NULL,
  `pas_num_documento` varchar(20) NOT NULL,
  `pas_nombres` varchar(100) NOT NULL,
  `pas_apellidos` varchar(100) NOT NULL,
  `pas_edad` int(11) NOT NULL,
  `pas_sexo` char(1) NOT NULL,
  `pas_email` varchar(100) NOT NULL,
  `pas_telefono` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`pas_id`, `pas_tipo_documento`, `pas_num_documento`, `pas_nombres`, `pas_apellidos`, `pas_edad`, `pas_sexo`, `pas_email`, `pas_telefono`) VALUES
(1, 'dni', '73031934', 'colbert', 'calampa', 19, 'm', '', ''),
(2, 'dni', '48294437', 'willy', 'lopez', 20, 'm', '', ''),
(3, 'dni', '71576573', 'jose', 'villanueva', 19, 'm', '', ''),
(4, 'dni', '75849396', 'sergio', 'santos', 20, 'm', '', ''),
(5, 'dni', '70236129', 'Diego Armando', 'Contreras Ishuiza', 21, 'm', '@mail.com', '999001122'),
(6, 'pasaporte', '1011223344', 'Gamowik ', 'Vasloky', 32, 'm', '', ''),
(7, 'dni', '12131213', 'Fabiola', 'Santos de Gilomo', 28, 'f', 'fabi@mail.com', ''),
(8, 'dni', '08899000', 'Fabiana', 'Gomez', 33, 'f', '', '999999999'),
(9, 'dni', '01839212', 'Manuel', 'Asluicus', 19, 'm', '', ''),
(10, 'pasaporte', '0201138732', 'Junell', 'Olbos', 25, 'f', '', '005391991232112'),
(11, 'pasaporte', '0329303476', 'Hull', 'Weseyly', 32, 'm', '', ''),
(12, 'dni', '09878900', 'julian', 'blanco', 22, 'm', '', '042523452');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`per_id` int(11) NOT NULL,
  `per_dni` varchar(8) NOT NULL,
  `per_nombres` varchar(100) NOT NULL,
  `per_fecha_nac` date NOT NULL,
  `per_fecha_reg` date NOT NULL,
  `per_cargo` int(11) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_dni`, `per_nombres`, `per_fecha_nac`, `per_fecha_reg`, `per_cargo`, `per_estado`) VALUES
(1, '12345678', 'Andy Vazques', '1990-06-08', '2010-06-08', 2, 1),
(2, '12345679', 'Jorge Delgado', '1980-08-08', '2016-06-11', 1, 1),
(3, '12345670', 'Cristhian Valera', '1979-06-07', '2016-06-11', 5, 1),
(4, '12345671', 'Pedro Manrique', '1960-04-05', '2016-06-11', 6, 1),
(5, '12345672', 'Manuel Torres', '1978-09-05', '2016-06-11', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
`rut_id` int(11) NOT NULL,
  `rut_origen` int(11) NOT NULL,
  `rut_destino` int(11) NOT NULL,
  `rut_precio_base` decimal(18,4) NOT NULL,
  `rut_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminal`
--

CREATE TABLE IF NOT EXISTS `terminal` (
`ter_id` int(11) NOT NULL,
  `ter_descripcion` varchar(50) NOT NULL,
  `ter_direccion` varchar(100) NOT NULL,
  `ter_ciudad` int(11) NOT NULL,
  `ter_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terminal`
--

INSERT INTO `terminal` (`ter_id`, `ter_descripcion`, `ter_direccion`, `ter_ciudad`, `ter_estado`) VALUES
(1, 'Terminal de Tarapoto', 'Jr. Tarapoto #453', 1, 1),
(3, 'Terminal de Arequipa', 'Jr. Arequipa 132', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usu_id` int(11) NOT NULL,
  `usu_name` varchar(50) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_name`, `usu_password`, `usu_estado`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
`veh_id` int(11) NOT NULL,
  `veh_tipo` varchar(20) NOT NULL,
  `veh_descripcion` varchar(50) NOT NULL,
  `veh_matricula` varchar(20) NOT NULL,
  `veh_fecha_compra` date NOT NULL,
  `veh_num_asientos` int(11) NOT NULL,
  `veh_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`veh_id`, `veh_tipo`, `veh_descripcion`, `veh_matricula`, `veh_fecha_compra`, `veh_num_asientos`, `veh_estado`) VALUES
(1, 'bus_simple', 'Optimus', 'OPT-001', '2001-04-01', 50, 1),
(2, 'bus_simple', 'Megatron', 'MEG-002', '2001-04-01', 50, 1),
(3, 'bus_simple', 'futbrok', 'FB003', '2016-06-08', 80, 1),
(4, 'bus_simple', 'People2b', 'p2b', '2016-06-09', 82, 1),
(5, 'bus_exclusivo', 'Herbie', 'Her-123', '2006-06-07', 50, 1),
(6, 'bus_doble', 'superciva', 'XL-9869', '0000-00-00', 53, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_pasaje`
--

CREATE TABLE IF NOT EXISTS `venta_pasaje` (
`venpas_id` int(11) NOT NULL,
  `venpas_asiento` int(11) NOT NULL,
  `venpas_pasajero` int(11) NOT NULL,
  `venpas_precio` decimal(18,4) NOT NULL,
  `venpas_descuento` decimal(18,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
`via_id` int(11) NOT NULL,
  `via_origen` int(11) NOT NULL,
  `via_destino` int(11) NOT NULL,
  `via_vehiculo` int(11) NOT NULL,
  `via_precio` decimal(18,4) NOT NULL,
  `via_fecha_salida` date NOT NULL,
  `via_fecha_llegada` date NOT NULL,
  `via_hora_salida` varchar(10) NOT NULL,
  `via_hora_llegada` varchar(10) NOT NULL,
  `via_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`via_id`, `via_origen`, `via_destino`, `via_vehiculo`, `via_precio`, `via_fecha_salida`, `via_fecha_llegada`, `via_hora_salida`, `via_hora_llegada`, `via_estado`) VALUES
(3, 1, 2, 1, '134.0000', '2016-06-15', '0000-00-00', '15:00', '10:00', 1),
(4, 1, 4, 1, '150.0000', '2016-06-28', '0000-00-00', '00:00', '23:59', 1),
(5, 1, 2, 1, '156.0000', '2016-06-28', '2016-06-29', '00:00', '00:00', 1),
(6, 6, 1, 2, '150.0000', '2016-07-11', '2016-07-12', '05:00', '05:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_personal`
--

CREATE TABLE IF NOT EXISTS `viaje_personal` (
  `via_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje_personal`
--

INSERT INTO `viaje_personal` (`via_id`, `per_id`, `observacion`) VALUES
(3, 1, NULL),
(3, 2, NULL),
(3, 5, NULL),
(4, 1, NULL),
(4, 2, NULL),
(4, 3, NULL),
(5, 2, NULL),
(6, 1, NULL),
(6, 2, NULL),
(6, 5, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
 ADD PRIMARY KEY (`asi_id`), ADD KEY `asi_viaje` (`asi_viaje`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`ciu_id`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
 ADD PRIMARY KEY (`pas_id`), ADD UNIQUE KEY `pas_num_documento` (`pas_num_documento`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`per_id`), ADD UNIQUE KEY `per_dni` (`per_dni`), ADD KEY `per_cargo` (`per_cargo`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
 ADD PRIMARY KEY (`rut_id`), ADD KEY `rut_origen` (`rut_origen`,`rut_destino`), ADD KEY `rut_destino` (`rut_destino`);

--
-- Indices de la tabla `terminal`
--
ALTER TABLE `terminal`
 ADD PRIMARY KEY (`ter_id`), ADD KEY `ter_ciudad` (`ter_ciudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
 ADD PRIMARY KEY (`veh_id`);

--
-- Indices de la tabla `venta_pasaje`
--
ALTER TABLE `venta_pasaje`
 ADD PRIMARY KEY (`venpas_id`), ADD KEY `venpas_asiento` (`venpas_asiento`,`venpas_pasajero`), ADD KEY `venpas_pasajero` (`venpas_pasajero`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
 ADD PRIMARY KEY (`via_id`), ADD KEY `via_origen` (`via_origen`), ADD KEY `via_destino` (`via_destino`), ADD KEY `via_vehiculo` (`via_vehiculo`);

--
-- Indices de la tabla `viaje_personal`
--
ALTER TABLE `viaje_personal`
 ADD PRIMARY KEY (`via_id`,`per_id`), ADD KEY `via_id` (`via_id`), ADD KEY `per_id` (`per_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
MODIFY `asi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
MODIFY `ciu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
MODIFY `pas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
MODIFY `rut_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `terminal`
--
ALTER TABLE `terminal`
MODIFY `ter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
MODIFY `veh_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `venta_pasaje`
--
ALTER TABLE `venta_pasaje`
MODIFY `venpas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
MODIFY `via_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`per_cargo`) REFERENCES `cargo` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`rut_origen`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`rut_destino`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `terminal`
--
ALTER TABLE `terminal`
ADD CONSTRAINT `terminal_ibfk_1` FOREIGN KEY (`ter_ciudad`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje_personal`
--
ALTER TABLE `viaje_personal`
ADD CONSTRAINT `viaje_personal_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
