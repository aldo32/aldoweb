-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2015 a las 23:28:42
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `creado`) VALUES
(1, 'Categoria 1 x', '2015-09-23 23:47:34'),
(2, 'aldo', '2015-11-20 21:54:02'),
(3, 'Bares', '2015-11-21 17:34:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio`
--

CREATE TABLE IF NOT EXISTS `directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `puesto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `directorio`
--

INSERT INTO `directorio` (`id`, `nombre`, `apellidos`, `direccion`, `telefono`, `correo`, `puesto`, `horario`, `foto`, `activo`, `creado`) VALUES
(1, 'dsfsfxx', 'fsdfsdxx', 'fsdfsdxx', 'fsdfsxx', 'isc.aldo@hotmail.com', 'fsdfxx', 'fsdfdxx', 'uploads/directorio/fotos/gears_wall.jpg', 1, '2015-11-27 18:46:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `formato` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `nota`, `descripcion`, `autor`, `formato`, `activo`, `creado`) VALUES
(1, 'Noticia 1 xxx', '<p></p><p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p>dasd<p></p><p> asd as dasd asd asdasdas xxxx<br></p>', 'd asd as dasdxxx', 'dasd asd asdas das xxx', 1, 1, '2015-11-27 20:20:25'),
(2, 'Noticia 2', '<p></p><p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br><p></p>', 'sad a dasd as', 'Aldo', 1, 1, '2015-11-27 20:20:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_archivos`
--

CREATE TABLE IF NOT EXISTS `noticias_archivos` (
  `id` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  `archivo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idNoticia` (`idNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `idCategoria`, `nombre`, `creado`) VALUES
(1, 1, 'Subcategoria 1', '2015-09-23 23:53:04'),
(2, 1, 'Subcategoria 1 x', '2015-09-23 23:54:27'),
(3, 1, 'aldo', '2015-09-23 23:55:17'),
(4, 3, 'Antro', '2015-11-21 17:34:14'),
(5, 3, 'Restaurante Bar', '2015-11-21 17:34:28'),
(6, 3, 'Cantina', '2015-11-21 17:34:42');

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
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0: Iniciado, 1: Revición, 2: Proceso, 3:Finalizado, 4: cancelado',
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`,`idSubCategoria`),
  KEY `idSubCategoria` (`idSubCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `idCategoria`, `idSubCategoria`, `creado`, `estatus`) VALUES
(1, 'Tramite de prueba', 'Descripcion de prueba', 1, 1, '2015-11-07 23:36:28', 0),
(2, 'Tramite de prueba 2', 'ninguna', 1, 3, '2015-11-16 17:19:22', 0),
(3, 'Construcción de bar', 'Proceso legal para la licencia del tramite de contrucción de un bar', 3, 5, '2015-11-21 17:35:05', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_correos`
--

CREATE TABLE IF NOT EXISTS `tramites_correos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tramites_correos`
--

INSERT INTO `tramites_correos` (`id`, `idTramite`, `titulo`, `mensaje`, `creado`, `modificado`) VALUES
(2, 2, 'titulo de prueba xx', '                                    sdfsfds fsd fsd fsd                                ', '2015-11-20 18:57:51', '0000-00-00 00:00:00'),
(3, 1, 'dasdasd a', 'd asd asd asdas das asasd a', '2015-11-20 20:18:11', '0000-00-00 00:00:00'),
(4, 3, 'Servicio de tramites  - Cortasar', '<p>Servicio de administracion de tramites <b>CORTASAR</b><br></p>Por este medio se da inicio el proceso de tramites para el siguiente tramite: <b>Construcción de bar<br><br></b>se requiere que envie los siguientes documentos<br><br><ol><li>doc1</li><li>doc2</li><li>doc3</li></ol><p>Sin mas por el momento esperamo el envio de los archivos antes mencionados<br></p><br><br>', '2015-11-21 18:14:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_correos_archivos`
--

CREATE TABLE IF NOT EXISTS `tramites_correos_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `idCorreo` int(11) NOT NULL,
  `archivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`,`idCorreo`),
  KEY `idCorreo` (`idCorreo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `tramites_correos_archivos`
--

INSERT INTO `tramites_correos_archivos` (`id`, `idTramite`, `idCorreo`, `archivo`, `descripcion`, `creado`) VALUES
(40, 2, 2, 'uploads/tramites/correos/MaquetaXalym.docx', '', '2015-11-20 20:00:33'),
(41, 2, 2, 'uploads/tramites/correos/HorarioXalym.docx', '', '2015-11-20 20:00:33'),
(42, 2, 2, 'uploads/tramites/correos/mrprintables-fruit-templates-apple-pear-03.pdf', '', '2015-11-20 20:01:03'),
(43, 1, 3, 'uploads/tramites/correos/Tablas.docx', '', '2015-11-20 20:18:40'),
(44, 1, 3, 'uploads/tramites/correos/Mapas.docx', '', '2015-11-20 20:19:41'),
(45, 3, 4, 'uploads/tramites/correos/doc1.docx', '', '2015-11-21 18:21:54'),
(46, 3, 4, 'uploads/tramites/correos/doc2.docx', '', '2015-11-21 18:21:54'),
(47, 3, 4, 'uploads/tramites/correos/doc3.docx', '', '2015-11-21 18:21:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_documentos`
--

CREATE TABLE IF NOT EXISTS `tramites_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `archivo` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NOT NULL,
  `url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `tramites_documentos`
--

INSERT INTO `tramites_documentos` (`id`, `idTramite`, `archivo`, `descripcion`, `creado`, `modificado`, `url`) VALUES
(7, 1, 'gdfgsdf sdfs', 'gdfgsdf sdfs', '2015-11-19 00:33:32', '0000-00-00 00:00:00', ''),
(9, 2, 'dasdasd', 'dasdasd', '2015-11-19 17:25:02', '0000-00-00 00:00:00', ''),
(11, 1, 'gfdgdfgds', 'gfdgdfgds', '2015-11-19 23:59:32', '0000-00-00 00:00:00', ''),
(12, 2, 'dfasf asdf asdf asdf', 'dfasf asdf asdf asdf', '2015-11-20 16:21:59', '0000-00-00 00:00:00', ''),
(13, 3, 'Acta de nacimiento', 'Acta de nacimiento', '2015-11-21 17:37:43', '0000-00-00 00:00:00', ''),
(14, 3, 'Credencial de elector', 'Credencial de elector', '2015-11-21 17:37:59', '0000-00-00 00:00:00', ''),
(15, 3, 'Titulo de la tierr', 'Titulo de la tierr', '2015-11-21 17:38:07', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_documentos_archivos`
--

CREATE TABLE IF NOT EXISTS `tramites_documentos_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `archivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tramites_documentos_archivos`
--

INSERT INTO `tramites_documentos_archivos` (`id`, `idTramite`, `archivo`, `creado`) VALUES
(1, 3, 'uploads/tramites/documentos/doc1.docx', '2015-11-22 19:24:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_iniciados`
--

CREATE TABLE IF NOT EXISTS `tramites_iniciados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `documentosTramite` int(11) NOT NULL,
  `documentosSubidos` int(11) NOT NULL,
  `emailUsuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tramites_iniciados`
--

INSERT INTO `tramites_iniciados` (`id`, `idTramite`, `documentosTramite`, `documentosSubidos`, `emailUsuario`, `estatus`, `creado`, `actualizado`) VALUES
(1, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:11:11', '0000-00-00 00:00:00'),
(2, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:11', '0000-00-00 00:00:00'),
(3, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:27', '0000-00-00 00:00:00'),
(4, 3, 3, 1, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:50', '0000-00-00 00:00:00'),
(5, 3, 3, 1, 'isc.aldo@gmail.com', 0, '2015-11-23 17:14:07', '0000-00-00 00:00:00'),
(6, 3, 3, 1, 'isc.aldo@gmail.com', 4, '2015-11-23 17:15:09', '0000-00-00 00:00:00'),
(7, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 18:06:05', '0000-00-00 00:00:00'),
(8, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 18:10:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_reglas`
--

CREATE TABLE IF NOT EXISTS `tramites_reglas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `regla` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tramites_reglas`
--

INSERT INTO `tramites_reglas` (`id`, `idTramite`, `regla`, `creado`) VALUES
(1, 1, 'sadasdasdasdsa', '2015-11-16 22:34:08'),
(2, 1, 'dasdasdasdas', '2015-11-16 22:34:29'),
(6, 1, 'dfas dfasd fasdf ds', '2015-11-19 00:25:40'),
(7, 2, 'Regla de prueba', '2015-11-19 17:16:32'),
(8, 2, 'sdfsdf sd fsdfsd', '2015-11-20 16:20:24'),
(9, 2, 'f asdf asdf sadf asdf asd', '2015-11-20 16:21:31'),
(10, 3, 'Debe estar a mas de 100 metros de cualquier escuela', '2015-11-21 17:36:10'),
(11, 3, 'Debe cumplir con todo el reglamento por parte del gobierno del estado', '2015-11-21 17:36:47'),
(12, 3, 'El numero de pisos no debe sobrepasar a 3', '2015-11-21 17:37:19');

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
(1, 'aldo2', 'marañon andradé2', '15531224198', '1isc.aldo@hotmail.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-20 00:53:19', 2, 0),
(2, 'Usuario 1', 'apellidos de prueba 1', '654651324165', 'isc.aldo@hotmail.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-22 22:58:04', 1, 1),
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
-- Filtros para la tabla `noticias_archivos`
--
ALTER TABLE `noticias_archivos`
  ADD CONSTRAINT `noticias_archivos_ibfk_1` FOREIGN KEY (`idNoticia`) REFERENCES `noticias` (`id`);

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
-- Filtros para la tabla `tramites_correos`
--
ALTER TABLE `tramites_correos`
  ADD CONSTRAINT `tramites_correos_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `tramites_correos_archivos`
--
ALTER TABLE `tramites_correos_archivos`
  ADD CONSTRAINT `tramites_correos_archivos_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`),
  ADD CONSTRAINT `tramites_correos_archivos_ibfk_2` FOREIGN KEY (`idCorreo`) REFERENCES `tramites_correos` (`id`);

--
-- Filtros para la tabla `tramites_documentos`
--
ALTER TABLE `tramites_documentos`
  ADD CONSTRAINT `tramites_documentos_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `tramites_iniciados`
--
ALTER TABLE `tramites_iniciados`
  ADD CONSTRAINT `tramites_iniciados_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `tramites_reglas`
--
ALTER TABLE `tramites_reglas`
  ADD CONSTRAINT `tramites_reglas_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
