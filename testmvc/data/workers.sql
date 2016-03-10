-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2016 a las 02:30:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `workers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`) VALUES
(1, 'Deapartment 1', 'Deapartment 1'),
(2, 'Deapartment 2', 'Deapartment 2'),
(3, 'Deapartment 3', 'Deapartment 3'),
(4, 'Deapartment 4', 'Deapartment 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `jobName` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `vacations` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departmentId` (`departmentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `worker_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `departments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
