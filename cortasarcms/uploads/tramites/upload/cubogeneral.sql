-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2015 a las 21:24:42
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cubogeneral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivoscargados`
--

CREATE TABLE IF NOT EXISTS `archivoscargados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProyecto` int(50) DEFAULT NULL,
  `idCadena` int(50) DEFAULT NULL,
  `archivo` varchar(350) DEFAULT NULL,
  `fechaArchivo` datetime DEFAULT NULL,
  `fechaCarga` datetime DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `tamano` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProyecto` (`idProyecto`),
  KEY `idCadena` (`idCadena`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `archivoscargados`
--

INSERT INTO `archivoscargados` (`id`, `idProyecto`, `idCadena`, `archivo`, `fechaArchivo`, `fechaCarga`, `descripcion`, `tamano`) VALUES
(1, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_11-03-2015.csv', '2015-11-03 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6504557'),
(2, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_11-02-2015.csv', '2015-11-02 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6505409'),
(3, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_11-01-2015.csv', '2015-11-01 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6504821'),
(4, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_10-31-2015.csv', '2015-10-31 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6443405'),
(5, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_10-30-2015.csv', '2015-10-30 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6526239'),
(6, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_10-29-2015.csv', '2015-10-29 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6525673'),
(7, 1, 1, 'C:UsersAldoDocumentsProyectosJavaFilesDatacesarferwalmartwalmart_10-28-2015.csv', '2015-10-28 00:00:00', '2015-11-04 00:00:00', 'walmart-cesarfer', '6525696');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadenas`
--

CREATE TABLE IF NOT EXISTS `cadenas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Activo    0:Inactivo',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cadenas`
--

INSERT INTO `cadenas` (`id`, `nombre`, `estatus`, `creado`) VALUES
(1, 'Walmart', 1, '2015-11-02 19:15:00'),
(2, 'Liverpool', 1, '2015-11-02 19:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProyectoEmetrix` int(11) NOT NULL,
  `nombrebd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Activo    0:Inactivo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla que contiene los diferentes proyectos del cubi de información' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `idProyectoEmetrix`, `nombrebd`, `nombre`, `creado`, `estatus`) VALUES
(1, 193, 'cubocesarfer', 'Cesarfer', '2015-11-02 19:14:02', 1),
(2, 207, 'cubospinmaster', 'SpinMaster', '2015-11-02 19:14:02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_cadenas`
--

CREATE TABLE IF NOT EXISTS `proyectos_cadenas` (
  `idProyecto` int(11) NOT NULL,
  `idCadena` int(11) NOT NULL,
  `nombreProyecto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombreCadena` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idProyecto`,`idCadena`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos_cadenas`
--

INSERT INTO `proyectos_cadenas` (`idProyecto`, `idCadena`, `nombreProyecto`, `nombreCadena`, `usuario`, `password`, `creado`, `actualizado`, `activo`) VALUES
(1, 1, 'Cesarfer', 'Walmart', 'CES4001', 'Cesar102', '2015-11-02 19:43:20', '0000-00-00 00:00:00', 1),
(1, 2, 'Cesarfer', 'Liverpool', 'P00008812', 'A1234567', '2015-11-02 19:43:20', '0000-00-00 00:00:00', 1),
(2, 1, 'SpinMaster', 'Walmart', 'Spi2020', 'Spin2034', '2015-11-02 19:43:20', '0000-00-00 00:00:00', 1),
(2, 2, 'SpinMaster', 'Liverpool', 'P00124459', 'Aventas03', '2015-11-02 19:43:20', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`) VALUES
(1, 'Aldo Marañon Andrade', 'aldo', 'aldoma');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
