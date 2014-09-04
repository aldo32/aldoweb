-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 26-08-2014 a las 19:23:50
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `saastah`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `bannerid` int(11) NOT NULL AUTO_INCREMENT,
  `imagename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`bannerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`bannerid`, `imagename`, `location`, `position`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'file_53f639cf515f6.jpg', 'uploads/banners', 0, 'http://www.google.com', '2014-08-21 18:26:23', '2014-08-21 18:30:43', '2014-08-21 18:30:43'),
(2, 'file_53f639de76920.jpg', 'uploads/banners', 0, 'http://www.google.com', '2014-08-21 18:26:38', '2014-08-25 23:47:43', '2014-08-25 23:47:43'),
(3, 'file_53f639ec6613a.jpg', 'uploads/banners', 0, 'http://www.google.com', '2014-08-21 18:26:52', '2014-08-25 23:45:51', '2014-08-25 23:45:51'),
(4, 'file_53f639f93330d.jpg', 'uploads/banners', 0, 'http://www.google.com', '2014-08-21 18:27:05', '2014-08-25 23:45:43', '2014-08-25 23:45:43'),
(5, 'file_53fbc419ad89d.jpg', 'uploads/banners', 0, '', '2014-08-25 23:17:45', '2014-08-25 23:17:45', NULL),
(6, 'file_53fbcabd9c130.jpg', 'uploads/banners', 0, '', '2014-08-25 23:46:05', '2014-08-25 23:46:05', NULL),
(7, 'file_53fbcb286c528.jpg', 'uploads/banners', 0, '', '2014-08-25 23:47:52', '2014-08-25 23:47:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE `galleries` (
  `galleryid` int(11) NOT NULL AUTO_INCREMENT,
  `imagename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`galleryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`galleryid`, `imagename`, `location`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'file_53ee76f616257.jpg', 'uploads/gallery', '', '2014-08-15 21:09:10', '2014-08-15 21:09:10', NULL),
(2, 'file_53ee7701a3ff8.jpg', 'uploads/gallery', '', '2014-08-15 21:09:21', '2014-08-15 21:09:21', NULL),
(3, 'file_53ee77108a8a3.jpg', 'uploads/gallery', '', '2014-08-15 21:09:36', '2014-08-15 21:09:36', NULL),
(4, 'file_53ee771cb20e8.jpg', 'uploads/gallery', '', '2014-08-15 21:09:48', '2014-08-15 21:09:48', NULL),
(5, 'file_53ee77267c942.jpg', 'uploads/gallery', '', '2014-08-15 21:09:58', '2014-08-15 21:09:58', NULL),
(6, 'file_53ee7731cfecf.jpg', 'uploads/gallery', '', '2014-08-15 21:10:09', '2014-08-15 21:10:09', NULL),
(7, 'file_53ee773a9128f.jpg', 'uploads/gallery', '', '2014-08-15 21:10:18', '2014-08-15 21:10:18', NULL),
(8, 'file_53ee774437a96.jpg', 'uploads/gallery', '', '2014-08-15 21:10:28', '2014-08-15 21:10:28', NULL),
(9, 'file_53ee7751dad1a.jpg', 'uploads/gallery', '', '2014-08-15 21:10:41', '2014-08-15 21:10:41', NULL),
(10, 'file_53ee775aa690a.jpg', 'uploads/gallery', '', '2014-08-15 21:10:50', '2014-08-15 21:10:50', NULL),
(11, 'file_53ee7763e2b59.jpg', 'uploads/gallery', '', '2014-08-15 21:10:59', '2014-08-15 21:10:59', NULL),
(12, 'file_53ee776ca2b47.jpg', 'uploads/gallery', '', '2014-08-15 21:11:08', '2014-08-15 21:11:08', NULL),
(13, 'file_53ee7775a80dc.jpg', 'uploads/gallery', '', '2014-08-15 21:11:17', '2014-08-15 21:11:17', NULL),
(14, 'file_53ee7780ccea9.jpg', 'uploads/gallery', '', '2014-08-15 21:11:28', '2014-08-15 21:11:28', NULL),
(15, 'file_53ee778a2e056.jpg', 'uploads/gallery', '', '2014-08-15 21:11:38', '2014-08-15 21:11:38', NULL),
(16, 'file_53ee779693a19.jpg', 'uploads/gallery', '', '2014-08-15 21:11:50', '2014-08-15 21:11:50', NULL),
(17, 'file_53ee77a3ea4e4.jpg', 'uploads/gallery', '', '2014-08-15 21:12:03', '2014-08-15 21:12:03', NULL),
(18, 'file_53ee7827774a9.jpg', 'uploads/gallery', '', '2014-08-15 21:14:15', '2014-08-15 21:14:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `imageid` int(11) NOT NULL AUTO_INCREMENT,
  `width` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `height` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagename` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagelocation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumblocation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`imageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

CREATE TABLE `info` (
  `infoid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`infoid`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nosotros', 'La agencia&nbsp;<strong>Sáastah</strong>&nbsp;nace \r\ndel entusiasmo de jóvenes con ideas y perspectivas alejadas de lo común,\r\n mostrando siempre un compromiso y calidad con cada uno de nuestros \r\nclientes. La palabra<strong> “</strong><em>evento”&nbsp;</em>es muy extensa y eso <strong>Sáastah </strong>&nbsp;lo entiende perfectamente, por lo que nos atrevimos a crear algo diferente y a complementar de manera extraordinaria <em>la organización de eventos con el diseño de viajes y rutas.</em><br>', '0000-00-00 00:00:00', '2014-08-25 21:57:19', NULL),
(2, 'Misión', 'Colaborar en la organización, logística y diseño de eventos sociales así\r\n como comprometernos a crear viajes y rutas con una curaduría especial. \r\nSiempre con un trabajo <strong>comprometido,&nbsp;innovador&nbsp;y entusiasta</strong> para así poder trabajar de una manera segura en el cumplimiento de cada uno de los compromisos con nuestros clientes, haciendo<strong> inolvidable</strong> la experiencia de su evento.<br><br><br>', '0000-00-00 00:00:00', '2014-08-15 19:08:59', NULL),
(3, 'Visión', 'Ser una empresa <strong>comprometida, líder e innovadora</strong> en la organización de eventos, logrando así el reconocimiento de cada uno de nuestros clientes.<br>', '0000-00-00 00:00:00', '2014-08-15 19:09:23', NULL),
(4, 'Valores', '<div><strong>Honestidad.</strong> El valor honestidad significa&nbsp;&nbsp;ser \r\nsincero con uno mismo y con el trabajo, es reconocer&nbsp;&nbsp;o admitir \r\nequivocaciones, y poner todo lo posible de nuestra parte para corregir \r\nel daño, es ser transparente y vivir congruentemente entre lo que se \r\npiensa y se hace.<strong><br><br>Compromiso. &nbsp;</strong>Es orientar nuestro máximo esfuerzo en\r\n la realización de&nbsp;&nbsp;nuestras actividades, apostando todas nuestras \r\ncapacidades&nbsp;&nbsp;para sacar&nbsp;adelante&nbsp;&nbsp;todo aquello que se nos ha \r\nencomendado.<strong><br><br>Integración. </strong>Es la unificación de empresa, \r\nproveedores y compañeros para llegar a cumplir con un objetivo, es \r\ntambién adaptarnos a los cambios y crecer junto a estos.<strong><br><br>Respeto.</strong> Es reconocer y aceptar toda aquella \r\ndistinta forma de pensar a la nuestra ya sea de índole religiosa, moral,\r\n legal, etc. También es aceptar las normas y reglas de trabajo</div><br>', '0000-00-00 00:00:00', '2014-08-15 19:10:48', NULL),
(5, 'Eventos', '<h2>Eventos Sociales</h2><br>Las mejores fiestas suceden cuando nos cuentas tus ideas. Desde \r\neventos hechos en casa, en algún espectacular salón, jardín, etc. Estaremos encantados de tender&nbsp; todos los detalles para que tus sueños se hagan realidad, creamos recuerdos inolvidables. Ayúdanos a diseñar tu evento, contándonos lo que siempre has esperado suceda en el.Primeras Comuniones, Bautizos, presentaciones, entrega de Anillos de Compromisos, bodas, XV años, graduaciones, Titulaciones, Pre-Fiestas, cumpleaños, reuniones Sociales y Mucho Más.<br><br><br><br><h2>Eventos empresariales</h2><br><p>Ya sea que necesites posicionar y conservar el buen nombre de tu \r\nmarca, negocio o quieras reconocer la labor de tus empleados por un \r\ntrabajo bien hecho, te ayudaremos a crear un evento para esa ocasión. Cuéntanos tus ideas y celebremos juntos el éxito tu empresa. Lanzamiento de Productos, Ferias y Stands, Coordinación de Actividades, Reuniones de Trabajo, Capacitaciones Congresos y Convenciones, Viajes de Incentivos, Eventos de Integración, Festejos, Celebraciones y Mucho Más.\r\n					<br></p><br><br>', '0000-00-00 00:00:00', '2014-08-21 15:58:36', NULL),
(6, 'Viajes', '<h2>Viajes</h2><br>Viaja de forma individual, en pareja, en familia o con amigos, nosotros nos encargamos de la <strong>curaduría</strong> de cada viaje. (Por el momento solo realizamos viajes dentro México).<div>\r\n<p>Tú propones los días, y nosotros te enseñamos <strong>la comida,</strong>&nbsp;<strong>la cultura, los sitios y las fiestas</strong> de nuestro hermoso país México.</p>\r\n					</div><br>', '0000-00-00 00:00:00', '2014-08-15 19:27:38', NULL),
(7, 'Galerias', '<h2>Galeria</h2>Aqui encontraras algunas de las experiencias que hemos creado, no esperes más y ponte en contacto con nosotros.<br>', '0000-00-00 00:00:00', '2014-08-19 23:27:01', NULL),
(8, 'Recomendaciones', '<h3>Recomendaciones</h3><strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br>', '0000-00-00 00:00:00', '2014-08-06 22:40:20', NULL),
(9, 'Contacto', '&nbsp;<br>', '0000-00-00 00:00:00', '2014-08-15 19:31:06', NULL),
(10, 'Rutas', 'Son previamente creadas y diseñadas por nosotros, con una fecha específica y con un cupo limitado de participantes.\r\n\r\n¿Cual es el fin de una ruta o taller?\r\nDivertirse, aprender, socializar, difundir y tener momentos de tranquilidad de todo el estrés del día a día.\r\n\r\nEstamos seguros que te encantara formar parte de alguna ruta o taller.', '2014-08-19 05:00:00', '2014-08-19 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `newsletterid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`newsletterid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `newsletters`
--

INSERT INTO `newsletters` (`newsletterid`, `name`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aldo gmail', 'isc.aldo@gmail.com', '2014-08-26 20:58:36', '2014-08-26 20:58:36', NULL),
(2, 'Aldo trabajo', 'aldo.maranon@gbmobile.com', '2014-08-26 20:58:44', '2014-08-26 20:58:44', NULL),
(4, 'Aldo Marañon', 'isc.aldo@hotmail.com', '2014-08-26 20:59:01', '2014-08-26 20:59:01', NULL),
(8, 'Aldo Marañon', 'isc.aldo@hotmail1.com', '2014-08-26 22:16:12', '2014-08-26 17:16:30', '2014-08-26 17:16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routes`
--

CREATE TABLE `routes` (
  `routid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`routid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `routes`
--

INSERT INTO `routes` (`routid`, `name`, `description`, `image`, `date_start`, `date_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruta 1', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f640c73515d.jpg', '2014-08-24 05:00:00', '2014-08-28 05:00:00', '2014-08-19 18:46:02', '2014-08-21 18:56:07', NULL),
(2, 'Ruta 2', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f640dc1eba3.jpg', '2014-08-20 05:00:00', '2014-08-21 05:00:00', '2014-08-19 18:46:36', '2014-08-21 18:56:28', NULL),
(3, 'Ruta 3', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f640f172ab6.jpg', '2014-08-15 05:00:00', '2014-08-18 05:00:00', '2014-08-19 18:47:05', '2014-08-21 18:56:49', NULL),
(4, 'Ruta 4', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f6410969463.jpg', '2014-08-10 05:00:00', '2014-08-12 05:00:00', '2014-08-19 18:47:29', '2014-08-21 18:57:13', NULL),
(5, 'Ruta 5', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f641237c705.jpg', '2014-08-05 05:00:00', '2014-08-08 05:00:00', '2014-08-19 18:48:10', '2014-08-21 18:57:39', NULL),
(6, 'Ruta x', '<p><strong>Lorem Ipsum</strong> es simplemente el texto de relleno de \r\nlas imprentas y archivos de texto. Lorem Ipsum ha sido el texto de \r\nrelleno estándar de las industrias desde el año 1500, cuando un impresor\r\n (N. del T. persona que se dedica a la imprenta) desconocido usó una \r\ngalería de textos y los mezcló de tal manera que logró hacer un libro de\r\n textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó\r\n como texto de relleno en documentos electrónicos, quedando \r\nesencialmente igual al original. Fue popularizado en los 60s con la \r\ncreación de las hojas "Letraset", las cuales contenian pasajes de Lorem \r\nIpsum, y más recientemente con software de autoedición, como por ejemplo\r\n Aldus  PageMaker, el cual incluye versiones de Lorem Ipsum.</p><br>', 'uploads/routes/file_53f6414e44fdb.jpg', '2014-08-31 05:00:00', '2014-08-31 05:00:00', '2014-08-20 15:58:06', '2014-08-21 18:58:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trips`
--

CREATE TABLE `trips` (
  `tripid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tripid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `name`, `lastname`, `phone`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 'Aldo', 'Marañon Andrade', '5531224198', 'root@root.com', '$2y$10$.We8amqR37bjz/mpj0zKxe1c0Xdz.rzf8IsxqSNtMnwdh/qMhONbK', '2014-07-31 05:00:00', '2014-08-05 23:42:32', NULL, 'dTPFnQfws4SR2CQY8welAsYO9rvrFf8GJ3e490Do886Ljz6S9wwyvlC46Yt9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
