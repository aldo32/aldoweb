-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2014 a las 02:40:32
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `admin_facturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
`idbill` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `idcompany` int(11) NOT NULL,
  `urlpdf` varchar(150) DEFAULT NULL,
  `urlxml` varchar(150) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '		',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bills`
--

INSERT INTO `bills` (`idbill`, `iduser`, `idrol`, `idcompany`, `urlpdf`, `urlxml`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 3, 'uploads/pdf/file_5484fd90c88ff.pdf', 'uploads/xml/file_5484fd90c88ff.xml', NULL, '2014-12-08 07:23:28', '2014-12-08 07:23:28', NULL),
(2, 3, 2, 3, 'uploads/pdf/file_5484fde8c4e87.pdf', 'uploads/xml/file_5484fde8c4e87.xml', NULL, '2014-12-08 07:24:56', '2014-12-08 07:24:56', NULL),
(3, 3, 2, 3, 'uploads/pdf/file_5484fe6a6f8f7.pdf', 'uploads/xml/file_5484fe6a6f8f7.xml', NULL, '2014-12-08 07:27:06', '2014-12-08 07:27:06', NULL),
(4, 3, 2, 3, 'uploads/pdf/file_5484fec1c6b7b.pdf', 'uploads/xml/file_5484fec1c6b7b.xml', NULL, '2014-12-08 07:28:33', '2014-12-08 07:28:33', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`idcompany` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '	',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`idcompany`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', 'ninguno', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Empresa Falsa 1', 'Ninguna por que es falsa', '2014-12-07 23:06:34', '2014-12-07 23:06:34', NULL),
(3, 'Empresa Falsa 2', 'Ninguna', '2014-12-07 23:06:51', '2014-12-07 23:06:51', NULL),
(4, 'Empresa Falsa 3', 'Ninguna', '2014-12-07 23:07:10', '2014-12-07 23:07:26', NULL),
(5, 'sdfsadas d', 'sa dASD as dAS D', '2014-12-07 23:10:28', '2014-12-07 23:10:38', '2014-12-07 23:10:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`idrol` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Proveedor', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`iduser` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `idcompany` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`iduser`, `idrol`, `idcompany`, `name`, `lastname`, `address`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 1, 1, 'Aldo', 'Marañon Andrade', 'Conocido', 'isc.aldo@gmail.com', '$2y$10$1kTjh3MCc0ApBW5WYwA8ZO/RjW.I6VUwMFtwQ3FhOMOsQ15QCJnnq', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(2, 1, 1, 'Administrador', '-', '-', 'root@root.com', '$2y$10$QzrVxZfTvhrHsQXdWL7MnuiWKusV/u03d7mp.lw/iyu/pR.n0uedq', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, ''),
(3, 2, 3, 'Aldo', 'Marañon Andrade', 'Ninguna', 'isc.aldo@hotmail.com', '$2y$10$n2.S1lCjh5Z4SC/t/G.h7.Pwft0bGCDs3/FIiX22AAi91sy85.qGu', '2014-12-07 23:11:24', '2014-12-07 23:13:59', NULL, ''),
(4, 2, 2, 'Yadidia', 'Diaz Aguilar', 'Ninguna', 'is.aldo@gmail1.com', '$2y$10$O0Lsd0X6YVJMnbYa30X0uOG.WSOhLKGSOBv3.7SA77O9CUa.zmCgy', '2014-12-07 23:14:50', '2014-12-07 23:14:50', NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
 ADD PRIMARY KEY (`idbill`,`iduser`,`idrol`,`idcompany`), ADD KEY `fk_bills_users1_idx` (`iduser`,`idrol`,`idcompany`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`idcompany`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`iduser`,`idrol`,`idcompany`), ADD KEY `fk_clients_company_idx` (`idcompany`), ADD KEY `fk_users_roles1_idx` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
MODIFY `idbill` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bills`
--
ALTER TABLE `bills`
ADD CONSTRAINT `fk_bills_users1` FOREIGN KEY (`iduser`, `idrol`, `idcompany`) REFERENCES `users` (`iduser`, `idrol`, `idcompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_clients_company` FOREIGN KEY (`idcompany`) REFERENCES `company` (`idcompany`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
