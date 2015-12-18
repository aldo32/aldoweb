-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2015 a las 00:26:18
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
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE IF NOT EXISTS `antecedentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `descripcion`, `creado`) VALUES
(1, '<p>df asdf asdf sdf asdfasdf   xxxxx<br></p>', '2015-12-10 22:53:29'),
(2, '<p>f asdf asdf asdf asdf asdf asdf asdf asd<br></p>', '2015-12-10 22:53:50'),
(3, '<p>dd fgf sdfsfsd<br></p>', '2015-12-16 17:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1' COMMENT '1: Tramite, 2: Reglas, 3: Correos',
  `archivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `descripcion`, `tipo`, `archivo`, `creado`) VALUES
(1, 'IFE', 'Identificacion oficial', 1, '', '2015-12-15 18:50:18'),
(3, 'Croquis del terreno', 'Imagen donde se muestre la superficie del terreno', 2, '', '2015-12-15 18:56:32'),
(4, 'Adjunto para correo 1', 'correo 1', 3, 'uploads/archivos/gears_logo.png', '2015-12-15 18:57:08'),
(5, 'Acta de nacimiento', 'Indentificacion oficial', 1, '', '2015-12-15 18:57:57'),
(6, 'Recivo de luz', 'luz', 1, '', '2015-12-15 18:58:12'),
(7, 'Recibo de agua', 'agua', 1, '', '2015-12-15 18:58:20'),
(8, 'Escrituras del terreno', 'terreno', 1, '', '2015-12-15 18:58:48'),
(9, 'Permiso de gobierno', 'gobierno', 2, '', '2015-12-15 18:59:13'),
(10, 'Permiso vecinal', 'vecinal', 2, '', '2015-12-15 18:59:48'),
(11, 'Adjunto para correo 2', 'correo 2', 3, 'uploads/archivos/frontera1.png', '2015-12-15 19:00:15'),
(12, 'Adjunto para correo 3', 'correo 3', 3, 'uploads/archivos/Litorales.png', '2015-12-15 19:00:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `archivo`, `tipo`, `creado`) VALUES
(1, 'dadasdas', 'uploads/banners/gears_logo.png', 'fiestas', '2015-12-10 23:58:30'),
(2, 'fsdfsd fsdf sfsd', 'uploads/banners/gears_logo.png', 'fiestas', '2015-12-16 17:55:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `creado`) VALUES
(3, 'Bares', '', '2015-11-21 17:34:02'),
(4, 'Hoteles', 'Ninguna', '2015-12-16 18:18:24');

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
  `banner` tinyint(1) NOT NULL DEFAULT '0',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `nota`, `descripcion`, `autor`, `formato`, `activo`, `banner`, `creado`) VALUES
(1, 'Noticia 1 xxx', '<p></p><p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p>dasd<p></p><p> asd as dasd asd asdasdas xxxx<br></p>', '<p>df asdf asdf sdf asdfasdf xxx<br></p>', 'dasd asd asdas das xxx', 1, 1, 0, '2015-11-27 20:20:25'),
(2, 'Noticia 2', '<p></p><p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br><p></p>', 'sad a dasd as', 'Aldo', 1, 1, 0, '2015-11-27 20:20:57'),
(3, 'fsdfsfsdf', '<p>fsdfsdfsdfsd<br></p>', 'fsdfsdfsd', 'fsdfsdfsdfds', 1, 1, 0, '2015-12-11 00:22:02');

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
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `titulo`, `descripcion`, `creado`, `activo`) VALUES
(2, 1, 'fsdfsdfsd', '<p>dasadsdas dad as dasd as<br></p>', '2015-12-16 19:50:12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `idCategoria`, `nombre`, `descripcion`, `creado`) VALUES
(4, 3, 'Antro', '', '2015-11-21 17:34:14'),
(5, 3, 'Restaurante Bar', '', '2015-11-21 17:34:28'),
(6, 3, 'Cantina', '', '2015-11-21 17:34:42'),
(8, 4, 'Auto Hotel', 'Ninguna', '2015-12-16 18:18:52');

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
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`,`idSubCategoria`),
  KEY `idSubCategoria` (`idSubCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `nombre`, `descripcion`, `idCategoria`, `idSubCategoria`, `creado`) VALUES
(3, 'Construcción de bar', 'Proceso legal para la licencia del tramite de contrucción de un bar', 3, 5, '2015-11-21 17:35:05'),
(5, 'Tramite Bar general', 'General', 3, 6, '2015-12-16 16:22:44');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tramites_correos`
--

INSERT INTO `tramites_correos` (`id`, `idTramite`, `titulo`, `mensaje`, `creado`, `modificado`) VALUES
(4, 3, 'Servicio de tramites  - Cortasar', '<p>Servicio de administracion de tramites <b>CORTASAR</b><br></p>Por este medio se da inicio el proceso de tramites para el siguiente tramite: <b>Construcción de bar<br><br></b>se requiere que envie los siguientes documentos<br><br><ol><li>doc1</li><li>doc2</li><li>doc3</li></ol><p>Sin mas por el momento esperamo el envio de los archivos antes mencionados<br></p><br><br>', '2015-11-21 18:14:50', '0000-00-00 00:00:00'),
(6, 5, 'Tramite bar general', '<p>Estimado señor</p><p><div><p>Lorem ipsum  of British \r\nsociety, a tiny bikini as young adults in hospital. From the time, \r\nclaims scientist. Faith and patronised. So now we know it from the \r\nneighbours. Food shops in ANOTHER mini-dress as pylons, billboards and \r\ntired of Britons.</p><p>Break with but not to deport them to receive \r\nthousands of England accuses Brown of illegal meat trade. Lying illegal \r\nmeat trade. Lying illegal meat trade. Lying illegal immigrant who are \r\nthe worst teenage binge drinkers in a new dress code to blame for Spring\r\n Breakers.</p></div>Gracias<br></p>', '2015-12-16 17:53:55', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `tramites_correos_archivos`
--

INSERT INTO `tramites_correos_archivos` (`id`, `idTramite`, `idCorreo`, `archivo`, `descripcion`, `creado`) VALUES
(45, 3, 4, 'uploads/tramites/correos/doc1.docx', '', '2015-11-21 18:21:54'),
(46, 3, 4, 'uploads/tramites/correos/doc2.docx', '', '2015-11-21 18:21:54'),
(49, 5, 6, 'uploads/tramites/correos/gears_logo.png', '', '2015-12-16 17:53:55'),
(50, 5, 6, 'uploads/tramites/correos/gears_wall2.jpg', '', '2015-12-16 17:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_documentos`
--

CREATE TABLE IF NOT EXISTS `tramites_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`),
  KEY `idArchivo` (`idArchivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tramites_documentos`
--

INSERT INTO `tramites_documentos` (`id`, `idTramite`, `idArchivo`, `creado`) VALUES
(1, 5, 1, '2015-12-16 16:22:44'),
(2, 5, 6, '2015-12-16 16:22:44'),
(3, 5, 8, '2015-12-16 16:22:44');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tramites_documentos_archivos`
--

INSERT INTO `tramites_documentos_archivos` (`id`, `idTramite`, `archivo`, `creado`) VALUES
(1, 3, 'uploads/tramites/documentos/doc1.docx', '2015-11-22 19:24:21'),
(2, 3, 'uploads/tramites/documentos/doc2.docx', '2015-12-07 18:20:16'),
(3, 3, 'uploads/tramites/documentos/doc3.docx', '2015-12-07 18:20:16'),
(4, 4, 'uploads/tramites/documentos/doc1.docx', '2015-12-07 18:23:20'),
(5, 4, 'uploads/tramites/documentos/doc2.docx', '2015-12-07 18:23:20'),
(6, 4, 'uploads/tramites/documentos/doc3.docx', '2015-12-07 18:23:20');

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
  `estatus` int(11) NOT NULL COMMENT '0: Revisión, 1: Aceptado, 2: Rechazado',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tramites_iniciados`
--

INSERT INTO `tramites_iniciados` (`id`, `idTramite`, `documentosTramite`, `documentosSubidos`, `emailUsuario`, `estatus`, `creado`, `actualizado`) VALUES
(1, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:11:11', '0000-00-00 00:00:00'),
(2, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:11', '0000-00-00 00:00:00'),
(3, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:27', '0000-00-00 00:00:00'),
(4, 3, 3, 1, 'isc.aldo@gmail.com', 0, '2015-11-23 17:12:50', '0000-00-00 00:00:00'),
(5, 3, 3, 1, 'isc.aldo@gmail.com', 0, '2015-11-23 17:14:07', '0000-00-00 00:00:00'),
(6, 3, 3, 1, 'isc.aldo@gmail.com', 2, '2015-11-23 17:15:09', '0000-00-00 00:00:00'),
(7, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 18:06:05', '0000-00-00 00:00:00'),
(8, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-11-23 18:10:14', '0000-00-00 00:00:00'),
(9, 3, 3, 3, 'isc.aldo@gmail.com', 0, '2015-12-07 18:20:16', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `tramites_reglas`
--

INSERT INTO `tramites_reglas` (`id`, `idTramite`, `regla`, `creado`) VALUES
(10, 3, 'Debe estar a mas de 100 metros de cualquier escuela', '2015-11-21 17:36:10'),
(11, 3, 'Debe cumplir con todo el reglamento por parte del gobierno del estado', '2015-11-21 17:36:47'),
(12, 3, 'El numero de pisos no debe sobrepasar a 3', '2015-11-21 17:37:19'),
(24, 5, 'Regla de prueba 2', '2015-12-16 17:02:50'),
(29, 5, 'Regla de preba 1', '2015-12-16 17:33:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_reglas_documentos`
--

CREATE TABLE IF NOT EXISTS `tramites_reglas_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTramite` int(11) NOT NULL,
  `idRegla` int(11) NOT NULL,
  `idArchivo` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idTramite` (`idTramite`),
  KEY `idRegla` (`idRegla`),
  KEY `idArchivo` (`idArchivo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tramites_reglas_documentos`
--

INSERT INTO `tramites_reglas_documentos` (`id`, `idTramite`, `idRegla`, `idArchivo`, `creado`) VALUES
(6, 5, 24, 3, '2015-12-16 17:02:50'),
(7, 5, 24, 9, '2015-12-16 17:02:50'),
(8, 5, 24, 10, '2015-12-16 17:02:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de usuarios' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `creado`, `idPerfil`, `activo`) VALUES
(2, 'Aldo', 'Marañon Andrade', '654651324165', 'isc.aldo@hotmail.com', 'abc670835d93413f158e695bf9148eb4eb672425', '2015-09-22 22:58:04', 1, 1);

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
  ADD CONSTRAINT `tramites_documentos_ibfk_1` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`),
  ADD CONSTRAINT `tramites_documentos_ibfk_2` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`id`);

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
