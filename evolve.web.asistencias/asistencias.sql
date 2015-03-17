-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2015 a las 19:11:49
-- Versión del servidor: 5.5.41-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `asistencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE IF NOT EXISTS `entrada` (
  `Id` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE IF NOT EXISTS `etapas` (
  `id` int(10) unsigned NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `premio` varchar(150) NOT NULL,
  `fotoPremio` varchar(250) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id`, `fechaInicio`, `fechaFin`, `nombre`, `premio`, `fotoPremio`) VALUES
(1, '2014-09-01 00:00:00', '2014-09-30 23:59:59', 'Boliche Septiembre 2014', 'Una ida al boliche todo pagado.', ''),
(2, '2014-09-01 00:00:00', '2014-12-31 23:59:59', 'General Dic 2014', 'Viaje a la playa 4 dias y 3 noches.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(10) unsigned NOT NULL,
  `idEtapa` int(10) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `idEtapa`, `nombre`) VALUES
(1, 1, 'Grupo 1'),
(2, 1, 'Grupo 2'),
(3, 1, 'Grupo 3'),
(4, 1, 'Grupo 4'),
(5, 1, 'Grupo 5'),
(6, 1, 'Grupo 6'),
(7, 2, 'INDIVIDUAL 6100'),
(8, 2, 'INDIVIDUAL 6101'),
(9, 2, 'INDIVIDUAL 6102'),
(10, 2, 'INDIVIDUAL 6103'),
(11, 2, 'INDIVIDUAL 6104'),
(12, 2, 'INDIVIDUAL 6105'),
(13, 2, 'INDIVIDUAL 6106'),
(14, 2, 'INDIVIDUAL 6108'),
(15, 2, 'INDIVIDUAL 6109'),
(16, 2, 'INDIVIDUAL 6110'),
(17, 2, 'INDIVIDUAL 6111'),
(18, 2, 'INDIVIDUAL 6112'),
(19, 2, 'INDIVIDUAL 6113'),
(20, 2, 'INDIVIDUAL 6115'),
(21, 2, 'INDIVIDUAL 6116'),
(22, 2, 'INDIVIDUAL 6117'),
(23, 2, 'INDIVIDUAL 6118'),
(24, 2, 'INDIVIDUAL 6119'),
(25, 2, 'INDIVIDUAL 6120'),
(26, 2, 'INDIVIDUAL 6121'),
(27, 2, 'INDIVIDUAL 6122'),
(28, 2, 'INDIVIDUAL 6123'),
(29, 2, 'INDIVIDUAL 6124');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposetapasusuarios`
--

CREATE TABLE IF NOT EXISTS `gruposetapasusuarios` (
  `id` int(10) unsigned NOT NULL,
  `idEtapa` int(10) unsigned NOT NULL,
  `idGrupo` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gruposetapasusuarios`
--

INSERT INTO `gruposetapasusuarios` (`id`, `idEtapa`, `idGrupo`, `idUsuario`) VALUES
(1, 1, 1, 6100),
(2, 1, 2, 6101),
(3, 1, 3, 6102),
(4, 1, 4, 6103),
(5, 1, 5, 6104),
(6, 1, 6, 6105),
(7, 1, 1, 6106),
(8, 1, 2, 6108),
(9, 1, 3, 6109),
(10, 1, 4, 6110),
(11, 1, 5, 6111),
(12, 1, 6, 6112),
(13, 1, 1, 6113),
(14, 1, 2, 6115),
(15, 1, 3, 6116),
(16, 1, 4, 6117),
(17, 1, 5, 6118),
(18, 1, 6, 6119),
(19, 1, 1, 6120),
(20, 1, 2, 6121),
(21, 1, 3, 6122),
(22, 1, 4, 6123),
(23, 1, 5, 6124),
(24, 2, 7, 6100),
(25, 2, 8, 6101),
(26, 2, 9, 6102),
(27, 2, 10, 6103),
(28, 2, 11, 6104),
(29, 2, 12, 6105),
(30, 2, 13, 6106),
(31, 2, 14, 6108),
(32, 2, 15, 6109),
(33, 2, 16, 6110),
(34, 2, 17, 6111),
(35, 2, 18, 6112),
(36, 2, 19, 6113),
(37, 2, 20, 6115),
(38, 2, 21, 6116),
(39, 2, 22, 6117),
(40, 2, 23, 6118),
(41, 2, 24, 6119),
(42, 2, 25, 6120),
(43, 2, 26, 6121),
(44, 2, 27, 6122),
(45, 2, 28, 6123),
(46, 2, 29, 6124);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `nombre`) VALUES
(1, 'ENTRA 9:30 AM'),
(2, 'ENTRA 10:30 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariosreglas`
--

CREATE TABLE IF NOT EXISTS `horariosreglas` (
  `id` int(10) unsigned NOT NULL,
  `idHorario` int(10) unsigned NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `multa` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horariosreglas`
--

INSERT INTO `horariosreglas` (`id`, `idHorario`, `horaInicio`, `horaFin`, `multa`) VALUES
(1, 1, '00:00:00', '09:30:00', 0),
(2, 1, '09:30:00', '09:45:00', 1),
(3, 1, '09:45:00', '10:00:00', 1.5),
(4, 1, '10:00:00', '10:30:00', 2),
(5, 1, '10:30:00', '11:00:00', 2.5),
(6, 1, '11:00:00', '23:59:59', 3),
(7, 2, '00:00:00', '10:30:00', 0),
(8, 2, '10:30:00', '10:45:00', 1),
(9, 2, '10:45:00', '11:00:00', 1.5),
(10, 2, '11:00:00', '11:30:00', 2),
(11, 2, '11:30:00', '12:00:00', 2.5),
(12, 2, '12:00:00', '23:59:59', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llegadas`
--

CREATE TABLE IF NOT EXISTS `llegadas` (
  `id` int(10) unsigned NOT NULL,
  `idEtapa` int(10) unsigned NOT NULL,
  `idGrupo` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `idHorario` int(10) unsigned NOT NULL,
  `hrLlegada` time NOT NULL,
  `permiso` tinyint(3) unsigned NOT NULL,
  `multa` double NOT NULL,
  `diferenciaMin` time NOT NULL,
  `acumuladoTiempo` time NOT NULL,
  `ultActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `rutaFoto` varchar(250) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `complexion` varchar(50) NOT NULL,
  `idHorario` int(10) unsigned NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6126 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `puesto`, `clasificacion`, `rutaFoto`, `sexo`, `complexion`, `idHorario`, `activo`, `admin`, `usuario`, `password`) VALUES
(6100, 'Leticia Flores', 'Misc', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6101, 'Benjamin Gonzalez', 'Sistemas', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6102, 'Hector Perez', 'Operaciones', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6103, 'Lizbeth Rojas', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6104, 'Carlos Martinez', 'KAM', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6105, 'Alvaar Andraka', 'KAM', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6106, 'Tania Flores', 'Recursos Humanos', '', '', 'M', 'Gordo', 2, 1, 0, '', ''),
(6108, 'Jimena Izquierdo', 'Ventas', '', '', 'M', 'Delgado', 1, 0, 0, '', ''),
(6109, 'Juan Cardenas', 'Sistemas Android', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6110, 'Eduardo Irigoyen', 'Abogado', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6111, 'Aldo Alcantara', 'Sistemas Soporte', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6112, 'Gustavo Bastida', 'Misiones Especiales', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6113, 'Aldo Marañon Andrade', 'Sistemas PHP', '', '', 'H', 'Delgado', 1, 1, 0, 'aldo', 'aldoma'),
(6115, 'Abril Rodriguez', 'KAM', '', '', 'M', 'Delgado', 1, 0, 0, '', ''),
(6116, 'Mayra Cardenas', 'Apoyos', '', '', 'M', 'Delgado', 1, 0, 0, '', ''),
(6117, 'Angelica Melchor', 'Recursos Humanos', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6118, 'Marco Gutierrez', 'Sistemas JAVA', '', '', 'H', 'Delgado', 2, 1, 0, '', ''),
(6119, 'Patricia Blanco', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6120, 'Omar Jaimes', 'Sistemas Soporte', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6121, 'Carolina Acipreste', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6122, 'Fernando Delgadillo', 'KAM', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6124, 'Rene Leon', 'Misiones Especiales', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6123, 'John Collins', 'KAM', '', '', 'H', 'Delgado', 1, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosgifs`
--

CREATE TABLE IF NOT EXISTS `usuariosgifs` (
  `id` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `rutaGif` varchar(250) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosgifs`
--

INSERT INTO `usuariosgifs` (`id`, `idUsuario`, `rutaGif`, `categoria`) VALUES
(1, 6100, '', ''),
(2, 6101, '', ''),
(3, 6102, '', ''),
(4, 6103, '', ''),
(5, 6104, '', ''),
(6, 6105, '', ''),
(7, 6106, '', ''),
(8, 6108, '', ''),
(9, 6109, '', ''),
(10, 6110, '', ''),
(11, 6111, '', ''),
(12, 6112, '', ''),
(13, 6113, '', ''),
(14, 6115, '', ''),
(15, 6116, '', ''),
(16, 6117, '', ''),
(17, 6118, '', ''),
(18, 6119, '', ''),
(19, 6120, '', ''),
(20, 6121, '', ''),
(21, 6122, '', ''),
(22, 6123, '', ''),
(23, 6124, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`Id`), ADD KEY `No` (`No`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`), ADD KEY `idEtapa` (`idEtapa`);

--
-- Indices de la tabla `gruposetapasusuarios`
--
ALTER TABLE `gruposetapasusuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `idEtapa` (`idEtapa`), ADD KEY `idGrupo` (`idGrupo`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `etapa_gpo` (`idEtapa`,`idGrupo`), ADD KEY `etapa_usu` (`idEtapa`,`idUsuario`), ADD KEY `gpo_usu` (`idGrupo`,`idUsuario`), ADD KEY `etapa_gpo_usu` (`idEtapa`,`idGrupo`,`idUsuario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horariosreglas`
--
ALTER TABLE `horariosreglas`
  ADD PRIMARY KEY (`id`), ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `llegadas`
--
ALTER TABLE `llegadas`
  ADD PRIMARY KEY (`id`), ADD KEY `idEtapa` (`idEtapa`), ADD KEY `idGrupo` (`idGrupo`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idHorario` (`idHorario`), ADD KEY `etapa_gpo` (`idEtapa`,`idGrupo`), ADD KEY `etapa_usu` (`idEtapa`,`idUsuario`), ADD KEY `usu_horario` (`idUsuario`,`idHorario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `idHorario` (`idHorario`);

--
-- Indices de la tabla `usuariosgifs`
--
ALTER TABLE `usuariosgifs`
  ADD PRIMARY KEY (`id`), ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `gruposetapasusuarios`
--
ALTER TABLE `gruposetapasusuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `horariosreglas`
--
ALTER TABLE `horariosreglas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `llegadas`
--
ALTER TABLE `llegadas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6126;
--
-- AUTO_INCREMENT de la tabla `usuariosgifs`
--
ALTER TABLE `usuariosgifs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
