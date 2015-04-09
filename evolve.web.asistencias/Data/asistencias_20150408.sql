-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 05:56 PM
-- Server version: 5.5.24
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asistencias`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrada`
--

CREATE TABLE IF NOT EXISTS `entrada` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `No` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `entrada`
--

INSERT INTO `entrada` (`Id`, `No`, `Name`, `Time`) VALUES
(1, 6118, '6118', '2015-04-01 03:05:04'),
(2, 6118, '6118', '2015-04-01 03:05:07'),
(3, 6118, '6118', '2015-04-01 03:06:02'),
(4, 6118, '6118', '2015-04-01 03:06:04'),
(5, 6118, '6118', '2015-04-01 04:57:08'),
(6, 6118, '6118', '2015-04-01 04:57:02'),
(7, 6118, '6118', '2015-04-01 04:57:04'),
(8, 6118, '6118', '2015-04-01 04:57:06'),
(9, 6100, '6100', '2015-04-01 05:02:04'),
(10, 6125, '6125', '2015-04-01 08:12:04'),
(11, 6106, '6106', '2015-04-01 08:26:01'),
(12, 6105, '6105', '2015-04-01 00:59:09'),
(13, 6105, '6105', '2015-04-06 07:43:09'),
(14, 6122, '6122', '2015-04-06 07:46:04'),
(15, 6126, '6126', '2015-04-06 08:08:03'),
(16, 6113, '6113', '2015-04-06 08:08:02'),
(17, 6117, '6117', '2015-04-06 08:22:09'),
(18, 6111, '6111', '2015-04-06 08:24:05'),
(19, 6120, '6120', '2015-04-06 08:30:08'),
(20, 6113, '6113', '2015-04-06 08:30:00'),
(21, 6121, '6121', '2015-04-06 09:31:00'),
(22, 6106, '6106', '2015-04-06 00:04:06'),
(23, 6125, '6125', '2015-04-06 00:06:09'),
(24, 6118, '6118', '2015-04-06 00:24:09'),
(25, 6126, '6126', '2015-04-06 05:59:04'),
(26, 6117, '6117', '2015-04-06 07:03:04'),
(27, 6125, '6125', '2015-04-06 07:42:09'),
(28, 6122, '6122', '2015-04-06 07:43:06'),
(29, 6106, '6106', '2015-04-06 07:53:00'),
(30, 6105, '6105', '2015-04-06 09:00:07'),
(31, 6100, '6100', '2015-04-07 08:12:00'),
(32, 6126, '6126', '2015-04-07 09:00:07'),
(33, 6120, '6120', '2015-04-07 09:04:03'),
(34, 6105, '6105', '2015-04-07 09:08:04'),
(35, 6125, '6125', '2015-04-07 09:14:05'),
(36, 6121, '6121', '2015-04-07 09:15:06'),
(37, 6104, '6104', '2015-04-07 09:22:06'),
(38, 6113, '6113', '2015-04-07 09:24:08'),
(39, 6110, '6110', '2015-04-07 09:24:01'),
(40, 6111, '6111', '2015-04-07 09:24:01'),
(41, 6118, '6118', '2015-04-07 00:22:08'),
(42, 6106, '6106', '2015-04-07 01:04:01'),
(43, 6117, '6117', '2015-04-07 01:05:07'),
(44, 6122, '6122', '2015-04-07 01:16:02'),
(45, 6108, '6108', '2015-04-07 02:22:08'),
(46, 6101, '6101', '2015-04-07 03:25:08'),
(47, 6100, '6100', '2015-04-07 04:59:05'),
(48, 6126, '6126', '2015-04-07 06:34:01'),
(49, 6104, '6104', '2015-04-07 06:48:00'),
(50, 6122, '6122', '2015-04-07 07:03:04'),
(51, 6120, '6120', '2015-04-07 07:17:02'),
(52, 6110, '6110', '2015-04-07 07:18:07'),
(53, 6118, '6118', '2015-04-07 07:18:03'),
(54, 6106, '6106', '2015-04-07 07:20:00'),
(55, 6119, '6119', '2015-04-07 07:21:01'),
(56, 6119, '6119', '2015-04-07 07:21:02'),
(57, 6125, '6125', '2015-04-07 07:24:08'),
(58, 6117, '6117', '2015-04-07 07:25:08'),
(59, 6100, '6100', '2015-04-08 08:16:02'),
(60, 6105, '6105', '2015-04-08 08:54:02'),
(61, 6122, '6122', '2015-04-08 08:55:01'),
(62, 6126, '6126', '2015-04-08 09:00:00'),
(63, 6113, '6113', '2015-04-08 09:10:02'),
(64, 6120, '6120', '2015-04-08 09:13:04'),
(65, 6111, '6111', '2015-04-08 09:13:00'),
(66, 6108, '6108', '2015-04-08 09:13:05'),
(67, 1, '1', '2015-04-08 09:18:08'),
(68, 6110, '6110', '2015-04-08 09:18:02'),
(69, 6117, '6117', '2015-04-08 09:26:03'),
(70, 6121, '6121', '2015-04-08 09:28:09'),
(71, 6125, '6125', '2015-04-08 09:31:02'),
(72, 1, '1', '2015-04-08 09:40:06'),
(73, 6106, '6106', '2015-04-08 09:57:03'),
(74, 6119, '6119', '2015-04-08 00:06:02'),
(75, 6124, '6124', '2015-04-08 00:09:00'),
(76, 6118, '6118', '2015-04-08 00:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `etapas`
--

CREATE TABLE IF NOT EXISTS `etapas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `premio` varchar(150) NOT NULL,
  `fotoPremio` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `etapas`
--

INSERT INTO `etapas` (`id`, `fechaInicio`, `fechaFin`, `nombre`, `premio`, `fotoPremio`) VALUES
(1, '2014-09-01 00:00:00', '2014-09-30 23:59:59', 'Boliche Septiembre 2014', 'Una ida al boliche todo pagado.', ''),
(2, '2014-09-01 00:00:00', '2014-12-31 23:59:59', 'General Dic 2014', 'Viaje a la playa 4 dias y 3 noches.', ''),
(3, '2015-03-01 00:00:00', '2015-03-30 00:00:00', 'Etapa de prueba', '10 pesos', '');

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idEtapa` int(10) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEtapa` (`idEtapa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `grupos`
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
(29, 2, 'INDIVIDUAL 6124'),
(30, 3, 'Grupo de prueba 1'),
(31, 3, 'Grupo de prueba 2');

-- --------------------------------------------------------

--
-- Table structure for table `gruposetapasusuarios`
--

CREATE TABLE IF NOT EXISTS `gruposetapasusuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idEtapa` int(10) unsigned NOT NULL,
  `idGrupo` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEtapa` (`idEtapa`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idUsuario` (`idUsuario`),
  KEY `etapa_gpo` (`idEtapa`,`idGrupo`),
  KEY `etapa_usu` (`idEtapa`,`idUsuario`),
  KEY `gpo_usu` (`idGrupo`,`idUsuario`),
  KEY `etapa_gpo_usu` (`idEtapa`,`idGrupo`,`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `gruposetapasusuarios`
--

INSERT INTO `gruposetapasusuarios` (`id`, `idEtapa`, `idGrupo`, `idUsuario`) VALUES
(97, 1, 1, 6120),
(2, 1, 2, 6101),
(3, 1, 3, 6102),
(4, 1, 4, 6103),
(5, 1, 5, 6104),
(6, 1, 6, 6105),
(95, 1, 1, 6113),
(8, 1, 2, 6108),
(9, 1, 3, 6109),
(10, 1, 4, 6110),
(11, 1, 5, 6111),
(12, 1, 6, 6112),
(98, 1, 1, 6106),
(14, 1, 2, 6115),
(15, 1, 3, 6116),
(16, 1, 4, 6117),
(17, 1, 5, 6118),
(18, 1, 6, 6119),
(96, 1, 1, 6100),
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
(103, 2, 19, 6113),
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
-- Table structure for table `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `nombre`, `hora`) VALUES
(1, 'ENTRA 9:30 AM', '09:30:00'),
(2, 'ENTRA 10:30 AM', '10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `horariosreglas`
--

CREATE TABLE IF NOT EXISTS `horariosreglas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idHorario` int(10) unsigned NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `multa` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idHorario` (`idHorario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `horariosreglas`
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
-- Table structure for table `llegadas`
--

CREATE TABLE IF NOT EXISTS `llegadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idEtapa` int(10) unsigned NOT NULL,
  `idGrupo` int(10) unsigned NOT NULL,
  `idUsuario` int(10) unsigned NOT NULL,
  `idHorario` int(10) unsigned NOT NULL,
  `hrLlegada` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `permiso` tinyint(3) unsigned NOT NULL,
  `multa` double NOT NULL,
  `diferenciaMin` time NOT NULL,
  `acumuladoTiempo` time NOT NULL,
  `ultActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idEtapa` (`idEtapa`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idHorario` (`idHorario`),
  KEY `etapa_gpo` (`idEtapa`,`idGrupo`),
  KEY `etapa_usu` (`idEtapa`,`idUsuario`),
  KEY `usu_horario` (`idUsuario`,`idHorario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `llegadas`
--

INSERT INTO `llegadas` (`id`, `idEtapa`, `idGrupo`, `idUsuario`, `idHorario`, `hrLlegada`, `permiso`, `multa`, `diferenciaMin`, `acumuladoTiempo`, `ultActualizacion`) VALUES
(1, 1, 5, 6118, 2, '2015-04-01 09:05:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(2, 2, 23, 6118, 2, '2015-04-01 09:05:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(3, 1, 1, 6100, 1, '2015-04-01 11:02:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(4, 2, 7, 6100, 1, '2015-04-01 11:02:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(5, 1, 1, 6106, 2, '2015-04-01 14:26:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(6, 2, 13, 6106, 2, '2015-04-01 14:26:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(7, 1, 6, 6105, 1, '2015-04-01 06:59:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(8, 2, 12, 6105, 1, '2015-04-01 06:59:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(9, 1, 6, 6105, 1, '2015-04-06 12:43:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(10, 2, 12, 6105, 1, '2015-04-06 12:43:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(11, 1, 3, 6122, 1, '2015-04-06 12:46:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(12, 2, 27, 6122, 1, '2015-04-06 12:46:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(13, 1, 1, 6113, 1, '2015-04-06 13:08:02', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(14, 2, 19, 6113, 1, '2015-04-06 13:08:02', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(15, 1, 4, 6117, 1, '2015-04-06 13:22:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(16, 2, 22, 6117, 1, '2015-04-06 13:22:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(17, 1, 5, 6111, 1, '2015-04-06 13:24:05', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(18, 2, 17, 6111, 1, '2015-04-06 13:24:05', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(19, 1, 1, 6120, 1, '2015-04-06 13:30:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(20, 2, 25, 6120, 1, '2015-04-06 13:30:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(21, 1, 2, 6121, 1, '2015-04-06 14:31:00', 0, 1, '00:01:00', '00:00:00', '2015-04-07 16:40:16'),
(22, 2, 26, 6121, 1, '2015-04-06 14:31:00', 0, 1, '00:01:00', '00:00:00', '2015-04-07 16:40:16'),
(23, 1, 1, 6106, 2, '2015-04-06 05:04:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(24, 2, 13, 6106, 2, '2015-04-06 05:04:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(25, 1, 5, 6118, 2, '2015-04-06 05:24:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(26, 2, 23, 6118, 2, '2015-04-06 05:24:09', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(27, 1, 1, 6100, 1, '2015-04-07 13:12:00', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(28, 2, 7, 6100, 1, '2015-04-07 13:12:00', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(29, 1, 1, 6120, 1, '2015-04-07 14:04:03', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(30, 2, 25, 6120, 1, '2015-04-07 14:04:03', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(31, 1, 6, 6105, 1, '2015-04-07 14:08:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(32, 2, 12, 6105, 1, '2015-04-07 14:08:04', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(33, 1, 2, 6121, 1, '2015-04-07 14:15:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(34, 2, 26, 6121, 1, '2015-04-07 14:15:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(35, 1, 5, 6104, 1, '2015-04-07 14:22:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(36, 2, 11, 6104, 1, '2015-04-07 14:22:06', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(37, 1, 1, 6113, 1, '2015-04-07 14:24:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(38, 2, 19, 6113, 1, '2015-04-07 14:24:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(39, 1, 4, 6110, 1, '2015-04-07 14:24:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(40, 2, 16, 6110, 1, '2015-04-07 14:24:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(41, 1, 5, 6111, 1, '2015-04-07 14:24:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(42, 2, 17, 6111, 1, '2015-04-07 14:24:01', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(43, 1, 5, 6118, 2, '2015-04-07 05:22:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(44, 2, 23, 6118, 2, '2015-04-07 05:22:08', 0, 0, '00:00:00', '00:00:00', '2015-04-07 16:40:16'),
(80, 2, 22, 6117, 1, '2015-04-08 14:26:03', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(79, 1, 4, 6117, 1, '2015-04-08 14:26:03', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(78, 2, 16, 6110, 1, '2015-04-08 14:18:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(77, 1, 4, 6110, 1, '2015-04-08 14:18:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(76, 2, 14, 6108, 1, '2015-04-08 14:13:05', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(75, 1, 2, 6108, 1, '2015-04-08 14:13:05', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(74, 2, 17, 6111, 1, '2015-04-08 14:13:00', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(73, 1, 5, 6111, 1, '2015-04-08 14:13:00', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(72, 2, 25, 6120, 1, '2015-04-08 14:13:04', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(71, 1, 1, 6120, 1, '2015-04-08 14:13:04', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(70, 2, 19, 6113, 1, '2015-04-08 14:10:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(69, 1, 1, 6113, 1, '2015-04-08 14:10:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(68, 2, 27, 6122, 1, '2015-04-08 13:55:01', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(67, 1, 3, 6122, 1, '2015-04-08 13:55:01', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(66, 2, 12, 6105, 1, '2015-04-08 13:54:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(65, 1, 6, 6105, 1, '2015-04-08 13:54:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(64, 2, 7, 6100, 1, '2015-04-08 13:16:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(63, 1, 1, 6100, 1, '2015-04-08 13:16:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(81, 1, 2, 6121, 1, '2015-04-08 14:28:09', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(82, 2, 26, 6121, 1, '2015-04-08 14:28:09', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(83, 1, 1, 6106, 2, '2015-04-08 14:57:03', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(84, 2, 13, 6106, 2, '2015-04-08 14:57:03', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(85, 1, 6, 6119, 1, '2015-04-08 05:06:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(86, 2, 24, 6119, 1, '2015-04-08 05:06:02', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(87, 1, 5, 6124, 1, '2015-04-08 05:09:00', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(88, 2, 29, 6124, 1, '2015-04-08 05:09:00', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(89, 1, 5, 6118, 2, '2015-04-08 05:23:08', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22'),
(90, 2, 23, 6118, 2, '2015-04-08 05:23:08', 0, 0, '00:00:00', '00:00:00', '2015-04-08 17:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `color`) VALUES
(1, 'Junta', ''),
(3, 'Visita Cliente', '');

-- --------------------------------------------------------

--
-- Table structure for table `permisosusuarios`
--

CREATE TABLE IF NOT EXISTS `permisosusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPermiso` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idPermiso` (`idPermiso`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `permisosusuarios`
--

INSERT INTO `permisosusuarios` (`id`, `idPermiso`, `IdUsuario`, `fecha`, `fechaCreacion`) VALUES
(10, 1, 6122, '2015-04-07', '2015-04-07 21:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `clasificacion` varchar(50) NOT NULL,
  `rutaFoto` varchar(250) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `complexion` varchar(50) NOT NULL,
  `idHorario` int(10) unsigned NOT NULL,
  `activo` tinyint(3) unsigned NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idHorario` (`idHorario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6127 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `puesto`, `clasificacion`, `rutaFoto`, `sexo`, `complexion`, `idHorario`, `activo`, `admin`, `usuario`, `password`) VALUES
(6100, 'Leticia Flores', 'Misc', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6101, 'Benjamin Gonzalez', 'Sistemas', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6102, 'Hector Perez', 'Operaciones', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6103, 'Lizbeth Rojas', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6104, 'Carlos Martinez', 'KAM', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6105, 'Alvaar Andraka', 'KAM', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6106, 'Tania Flores', 'Recursos Humanos', '', '', 'M', 'Gordo', 2, 1, 0, '', ''),
(6108, 'Carlos Cejudo', 'Ventas', 'Ninguna', '', 'H', 'Delgado', 1, 0, 0, '', ''),
(6109, 'Juan Cardenas', 'Sistemas Android', 'Ninguna', '', 'H', 'Delgado', 1, 0, 0, '', ''),
(6110, 'Eduardo Irigoyen', 'Abogado', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6111, 'Aldo Alcantara', 'Sistemas Soporte', '', '', 'H', 'Delgado', 1, 1, 0, 'aldo', 'aldo'),
(6112, 'Gustavo Bastida', 'Misiones Especiales', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6113, 'Aldo Marañon Andrade', 'Sistemas PHP', 'xxx', '', 'H', 'Delgado', 1, 1, 1, 'aldo', 'aldoma'),
(6115, 'Abril Rodriguez', 'KAM', '', '', 'M', 'Delgado', 1, 0, 0, '', ''),
(6116, 'Mayra Cardenas', 'Apoyos', '', '', 'M', 'Delgado', 1, 0, 0, '', ''),
(6117, 'Angelica Melchor', 'Recursos Humanos', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6118, 'Marco Gutierrez', 'Sistemas JAVA', '', '', 'H', 'Delgado', 2, 1, 0, 'marco', 'satanicboy'),
(6119, 'Patricia Blanco', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6120, 'Omar Jaimes', 'Sistemas Soporte', '', '', 'H', 'Delgado', 1, 1, 1, 'omar', 'omar'),
(6121, 'Carolina Acipreste', 'KAM', '', '', 'M', 'Delgado', 1, 1, 0, '', ''),
(6122, 'Fernando Delgadillo', 'KAM', '', '', 'H', 'Delgado', 1, 1, 0, '', ''),
(6124, 'Rene Leon', 'Misiones Especiales', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6123, 'John Collins', 'KAM', '', '', 'H', 'Delgado', 1, 0, 0, '', ''),
(6125, 'Erik Sandoval', 'KAM', '', '', 'H', 'Gordo', 1, 1, 0, '', ''),
(6126, 'Brenda Rodríguez', 'KAM', '', '', 'M', 'Delgada', 1, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuariosgifs`
--

CREATE TABLE IF NOT EXISTS `usuariosgifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL,
  `rutaGif` varchar(250) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `usuariosgifs`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;