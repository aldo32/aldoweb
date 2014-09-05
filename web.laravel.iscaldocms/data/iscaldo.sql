-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 06-09-2014 a las 00:58:59
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `iscaldo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blogid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`infoid`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lo que me gusta hacer', 'Siempre me ha gustado el desarrollo de software en todos los aspectos, pero realmente mi especialidad es el desarrollo web, desde que estaba en la universidad aprendi varios lenguajes, todos muy interesantes, pero cuando llegue a ver todo lo que se podia hacer en el mundo web practicamente fue amor a primera vista.\r\n\r\n<br><br>Durante todos estos años de programación web he realizado sitios de todos sabores y colores, me encanta saber cuando hay un nuevo proyecto y todos los retos que este implica, por que un sitio o portal nunca lo vas a hacer de la misma manera ya que siempre se busca inovar y mejorar el desarrollo, ademas de que los requerimientos nunca son los mismos y siempre hay que estar adivinando que es lo que quiere el cliente.<br><br>Desarrollar no es solo escribir lineas de código y luego ver quien ha escrito más, muchas veces esto es lo que se usa para medir quien es un buen desarollador y quien no, yo opino que un buen programador es quien no cuenta lineas, si no quien puede hacer un buen trabajo sin contar estas ademas de ser campas de compartir sus ideas y ahun más importante de compartir su conocimiento', '2014-09-04 05:00:00', '2014-09-04 21:28:02', NULL),
(2, 'Deportes', '- Bascket ball\r\n<br>- Futbol\r\n<br>- Natación\r\n<br>- Todo lo que canse :)', '2014-09-04 05:00:00', '2014-09-04 21:28:22', NULL),
(3, 'Hobbies', 'Mi mejor pasatiempo es la música, la mayor parte de mi juventud me la pasaba en fiestas y eventos como DJ, estos fueron los mejores años de mi vida.\r\n<br><br>Esto va a sonar raro, pero mia interes por el desarollo tambien empeso como un pasatiempo, a diferencia de ser DJ este lo fui creciendo hasta hacerme un profesional.', '2014-09-04 05:00:00', '2014-09-04 21:28:39', NULL),
(4, 'Mi experiencia', 'Me considero una persona profesional que sabe manejar la presión laboral y canalizarla hacia el aumento de la experiencia, además de ser autodidacta e ir aprendiendo las nuevas tecnologías que surgen el ambiente de las tecnologías de la información y el web 2.0. Ademas de buscar las metodologias y tecnicas para un desarrollo eficiente y agil.\r\n\r\n<br><br>Tengpo más de 6 años y contando de experiencia en desarrllo de aplicaciones web, software y de escritorio, estas son las tecnologias que he manejado y que domino ampliamente:\r\n\r\n<br><br><b>PHP, MYSQL, POSTGRES, AJAX, HTML, HTML5, CSS,, CSS3, JAVA SCRIPT, JQUERY, CODEIGNITER, ZEND, CAKE PHP, C#, SQL AVANZADO, POO, IBM DB2, APACHE, MICROSOFT OFFICE, CONEXIONES REMOTAS A BD, WEBSERVICES, ADMINISTRACIÓN DE SERVIDEORES WEB, LINUX, API FACEBOOK, SDK FACEBOOK, API TWITTER, API GOOGLE MAPS, LARAVEL, MAQUETADO HTML, SCRUM, GIT HUB, TITANIUM APPCELERATOR ETC.\r\n\r\n</b><br><br>- Framework JavaScript: Ultimas versiones de dequery y Motools\r\n<br>- Framework PHP: CodeIgniter 2, Zend, Cake php 2, Laravel 4\r\n<br>- Sistemas Operativos Windows, Linux, Mac OS X\r\n<br>- Herramientas de diseño web: Adobe Photo Shop CS4\r\n<br>- Diseño y maquetado responsivo\r\n<br>- Administración de proyectos\r\n<br>- Lider de proyecto\r\n<br>- Lider de area', '2014-09-04 05:00:00', '2014-09-04 21:30:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyects`
--

CREATE TABLE `proyects` (
  `proyectid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '	',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proyectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `proyects`
--

INSERT INTO `proyects` (`proyectid`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alkaseltzer Boost', 'Tipo de sitio: Micrositio para promoción<br><br>Micrositio para promocionar el nuevo producto Alkaseltzer Boost, la idea es subir una imagen describiendo a uno de los personajes "PartyHeroes" y la más votada gana.<br><br>Tambien consta de un CMS para administrar ganadores, reportes, premios, etc.<br><br>Framework php: CakePHP<br><br>Tecnologias:<br>- Jquery<br>- SDK Facebook<br>- HTML<br>- CSS<br>- Mysql<br><br>Demo: <a href="http://www.iscaldo.com/boost" rel="nofollow" target="_blank">http://www.iscaldo.com/boost</a><br>', 'uploads/proyects/file_5409ff7a4db9d.jpg', '2014-09-05 18:17:27', '2014-09-05 18:25:50', NULL),
(2, 'Azteca Movil', 'Tipo de sitio: Portal<br><br>Portal que ofrece información relevante sobre clubes de suscripcion mediante telefonia celular, ademas de contenido exclusivo para usuarios telcel.<br><br>Tambien consta de un CMS para administrar todos los contenidos del sitio<br><br>Framework php: CakePHP<br><br>Tecnologias:<br>- Jquery<br>- SDK Facebook<br>- HTML<br>- CSS<br>- Mysql<br><br>Demo: <a href="http://www.iscaldo.com/amovil" rel="nofollow" target="_blank">http://www.iscaldo.com/amovil</a><br>', 'uploads/proyects/file_540a05173aad3.jpg', '2014-09-05 18:46:47', '2014-09-05 18:46:47', NULL),
(3, 'Azteca Señales', 'Portal de información de todas las señales existentes en tv azteca como son programas y horarios de cada uno de los canales que imparte esta televisora<br><br>Tiene un apartado de acceso restringido para clientes que desan descargar información relevante.<br><br>Framework: Codeigniter<br><br>Tecnologias:<br>- Jquery<br>- Html<br>- Css<br>- Mysql<br>', 'uploads/proyects/file_540a05f6d054c.jpg', '2014-09-05 18:50:30', '2014-09-05 18:50:30', NULL),
(4, 'BigCola', 'Pendiente<br>', 'uploads/proyects/file_540a0665e9ce1.jpg', '2014-09-05 18:52:21', '2014-09-05 18:52:21', NULL),
(5, 'GBMobile', 'Pendiente<br>', 'uploads/proyects/file_540a0675906e0.jpg', '2014-09-05 18:52:37', '2014-09-05 18:52:37', NULL),
(6, 'OfficeDepot', 'Pendiente<br>', 'uploads/proyects/file_540a068e8e785.jpg', '2014-09-05 18:53:02', '2014-09-05 18:53:02', NULL),
(7, 'Caminos de la libertad', 'Pendiente<br>', 'uploads/proyects/file_540a069e12262.jpg', '2014-09-05 18:53:18', '2014-09-05 18:53:18', NULL),
(8, 'Carrera Azteca', 'Pendiente<br>', 'uploads/proyects/file_540a06b7ac206.jpg', '2014-09-05 18:53:43', '2014-09-05 18:53:43', NULL),
(9, 'Azteca Cefat', 'Pendiente<br>', 'uploads/proyects/file_540a06c8a1a9d.jpg', '2014-09-05 18:54:00', '2014-09-05 18:54:00', NULL),
(10, 'Colgate Luminos White', 'Pendiente<br>', 'uploads/proyects/file_540a070ff22e3.jpg', '2014-09-05 18:55:11', '2014-09-05 18:55:11', NULL),
(11, 'Contorno', 'Pendiente<br>', 'uploads/proyects/file_540a071fc89f3.jpg', '2014-09-05 18:55:27', '2014-09-05 18:55:27', NULL),
(12, 'Dovemen NFL', 'Pendiente<br>', 'uploads/proyects/file_540a07307eacb.jpg', '2014-09-05 18:55:44', '2014-09-05 18:55:44', NULL),
(13, 'Grisi', 'Pendiente<br>', 'uploads/proyects/file_540a0746346f3.jpg', '2014-09-05 18:56:06', '2014-09-05 18:56:06', NULL),
(14, 'Saastah', 'Pendiente<br>', 'uploads/proyects/file_540a075ad27f6.jpg', '2014-09-05 18:56:26', '2014-09-05 18:56:26', NULL),
(15, 'Pinol', 'Pendiente<br>', 'uploads/proyects/file_540a076f05341.jpg', '2014-09-05 18:56:47', '2014-09-05 18:56:47', NULL),
(16, 'Sharpie Hazte Notar', 'Pendiente<br>', 'uploads/proyects/file_540a07845eb13.jpg', '2014-09-05 18:57:08', '2014-09-05 18:57:08', NULL),
(17, 'Unratito más', 'Pendiente<br>', 'uploads/proyects/file_540a0796f082f.jpg', '2014-09-05 18:57:26', '2014-09-05 18:57:26', NULL),
(18, 'Viva', 'Pendiente<br>', 'uploads/proyects/file_540a07a845d1c.jpg', '2014-09-05 18:57:44', '2014-09-05 18:57:44', NULL),
(19, 'TacoGallo', 'Pendiente<br>', 'uploads/proyects/file_540a07b8719a9.jpg', '2014-09-05 18:58:00', '2014-09-05 18:58:00', NULL),
(20, 'Yamaha', 'Pendiente<br>', 'uploads/proyects/file_540a07c84e30e.jpg', '2014-09-05 18:58:16', '2014-09-05 18:58:16', NULL),
(21, 'SISE UNIVO', 'Pendiente<br>', 'uploads/proyects/file_540a086c32152.jpg', '2014-09-05 19:01:00', '2014-09-05 19:03:17', NULL),
(22, 'Checador biometrico', 'Pendiente<br>', 'uploads/proyects/file_540a088b24cec.jpg', '2014-09-05 19:01:31', '2014-09-05 19:01:31', NULL),
(23, 'Sistema Contable', 'Pendiente<br>', 'uploads/proyects/file_540a08ae63faf.jpg', '2014-09-05 19:02:06', '2014-09-05 19:02:06', NULL),
(24, 'SISE CESCO', 'Pendiente<br>', 'uploads/proyects/file_540a08e13ad0f.jpg', '2014-09-05 19:02:57', '2014-09-05 19:02:57', NULL);

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
(1, 'Aldo', 'Maranon', '5531224198', 'aldo@root.com', '$2y$10$eg/5PTrM74SZwVIdNq.9ausftKWZEnjqswAleFSlZeFTgVV9EVY7C', '2014-07-31 15:00:00', '2014-09-04 19:03:22', NULL, '9f8427fNENt3HeMGUZAOmEvw5z642pa6vzvnaCHvYUkozx3iK5LdDVqfaoV4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
