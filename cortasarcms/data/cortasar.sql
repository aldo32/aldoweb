-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2015 a las 01:50:30
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cortasar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `creado`) VALUES
(1, 'Categoria 1 x', '2015-09-23 23:47:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `descripcion`, `creado`) VALUES
(1, 'Administrador', 'Usuario con todos los permisos dentro del CMS', '2015-09-21 21:13:02'),
(2, 'Capturista y administrador de tramites', 'Usaurios para capturar solo cierta información sobre los diferentes tramites', '2015-09-21 21:13:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `idCategoria`, `nombre`, `creado`) VALUES
(1, 1, 'Subcategoria 1', '2015-09-23 23:53:04'),
(2, 1, 'Subcategoria 1 x', '2015-09-23 23:54:27'),
(3, 1, 'aldo', '2015-09-23 23:55:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE IF NOT EXISTS `tramites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubCategoria` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reglas` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`,`idSubCategoria`),
  KEY `idSubCategoria` (`idSubCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `idCategoria`, `idSubCategoria`, `creado`, `reglas`) VALUES
(1, 'Tramite de prueba', 'Descripcion de prueba', 1, 1, '2015-11-07 23:36:28', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de las \r\nimprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno \r\nestándar de las industrias desde el año 1500, cuando un impresor (N. del\r\n T. persona que se dedica a la imprenta) desconocido usó una galería de \r\ntextos y los mezcló de tal manera que logró hacer un libro de textos \r\nespecimen. No sólo sobrevivió 500 años, sino que tambien ingresó como \r\ntexto de relleno en documentos xxx<br></p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_archivos`
--

CREATE TABLE IF NOT EXISTS `tramites_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `archivo` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'upload, download',
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idPerfil` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `idPerfil` (`idPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de usuarios' AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `creado`, `idPerfil`, `activo`) VALUES
(1, 'Aldo', 'Marañon Andrade', '5531224198', 'isc.aldo@gmail.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-20 00:53:19', 1, 1),
(2, 'Usuario 1', 'apellidos de prueba 1', '654651324165', 'isc.aldo@hotmail.com', '1be45c6297a880d125fbdcca65282a0dacca0113', '2015-09-22 22:58:04', 1, 1),
(30, 'Usuario 2', 'apellidos de prueba 2', '646546546546', 'root@root.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-23 16:11:59', 1, 1),
(31, 'Usuario 3', 'apellidos de prueba 3', '74546543546', 'root1@root.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-23 16:46:10', 2, 1),
(32, 'Usuario 4', 'apellidos de prueba 4', '4654214654654', 'root3@root.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-23 16:55:24', 2, 1),
(33, 'fsdf', 'fsdfsd', 'fsdfs', 'fsdfsdfs', 'ffsdfsd', '2015-09-23 18:30:03', 2, 1),
(34, 'fsd', 'hfghf', '', 'hjgmjjhmh', 'ghfghfg', '2015-09-23 18:31:06', 1, 1),
(35, 'fdfg', 'gdfg', 'gdfgd', 'adasd', 'fsdfsd', '2015-09-23 18:31:28', 1, 1),
(36, 'sdfs', 'sdfd', 'fsdf', 'jklkds', 'fsdfs', '2015-09-23 18:31:28', 1, 1),
(39, 'vcbcvb', 'bcvbc', 'bcvb', 'sdfghjhjgfdsadsfg', 'fsdfsd', '2015-09-23 18:32:18', 1, 1),
(41, 'ffgdfgdfggdfg', 'gdfgdfgfd', '54654654', 'root4@root.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2015-09-23 18:55:59', 2, 1),
(42, 'ffgdfgdfggdfg', 'gdfgdfgfd', '54654654', 'root5@root.com', '0937afa17f4dc08f3c0e5dc908158370ce64df86', '2015-09-23 18:58:01', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `tramites_ibfk_2` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
