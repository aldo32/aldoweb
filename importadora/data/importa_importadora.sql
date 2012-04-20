-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2012 at 04:30 PM
-- Server version: 4.1.22
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `importa_importadora`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `catalogid` int(11) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`catalogid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalogid`, `name`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `catalogproduct`
--

CREATE TABLE IF NOT EXISTS `catalogproduct` (
  `catalogid` int(11) NOT NULL default '0',
  `productid` int(11) NOT NULL default '0',
  KEY `catalogid` (`catalogid`,`productid`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalogproduct`
--

INSERT INTO `catalogproduct` (`catalogid`, `productid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyid` int(11) NOT NULL auto_increment,
  `catalogid` int(11) NOT NULL default '0',
  `description` text collate utf8_unicode_ci NOT NULL,
  `rfc` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `address` text collate utf8_unicode_ci NOT NULL,
  `colony` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `delegation` varchar(150) collate utf8_unicode_ci NOT NULL default '',
  `cp` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `telephone1` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `telephone2` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `fax` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `web` varchar(200) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `active` int(11) NOT NULL default '0',
  PRIMARY KEY  (`companyid`),
  KEY `catalogid` (`catalogid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyid`, `catalogid`, `description`, `rfc`, `address`, `colony`, `delegation`, `cp`, `telephone1`, `telephone2`, `fax`, `web`, `email`, `active`) VALUES
(1, 1, 'Compania 1', 'xxxxxx', 'xxxxxxx', 'xxxx', 'xxxxx', 'xxxxx', 'xxx', 'xxx', 'xxx', 'xxx.xxx.xx', 'xxxx@xxx.xx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `detailid` int(11) NOT NULL auto_increment,
  `orderid` int(11) NOT NULL default '0',
  `productid` int(11) NOT NULL default '0',
  `amount` int(11) NOT NULL default '0',
  PRIMARY KEY  (`detailid`),
  KEY `orderid` (`orderid`,`productid`),
  KEY `productid` (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`detailid`, `orderid`, `productid`, `amount`) VALUES
(1, 12, 1, 1),
(4, 12, 8, 1),
(5, 12, 10, 1),
(6, 12, 9, 1),
(7, 13, 1, 1),
(8, 13, 2, 1),
(9, 13, 3, 1),
(40, 14, 69, 1),
(41, 14, 68, 1),
(42, 14, 94, 1),
(43, 14, 95, 1),
(44, 14, 96, 1),
(45, 14, 97, 1),
(50, 15, 35, 1),
(51, 15, 30, 1),
(52, 15, 33, 1),
(53, 15, 49, 1),
(54, 15, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `statusid` int(11) NOT NULL default '0',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`orderid`),
  KEY `statusid` (`statusid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `statusid`, `date`) VALUES
(5, 1, 2, '2012-04-04 20:03:52'),
(6, 1, 2, '2012-04-04 20:17:42'),
(8, 1, 2, '2012-04-04 21:24:45'),
(9, 1, 2, '2012-04-06 12:02:56'),
(10, 1, 2, '2012-04-06 12:06:13'),
(11, 1, 3, '2012-04-06 16:11:00'),
(12, 1, 3, '2012-04-06 21:07:43'),
(13, 1, 2, '2012-04-07 18:21:10'),
(14, 1, 2, '2012-04-12 23:05:01'),
(15, 1, 2, '2012-04-16 11:53:13'),
(16, 1, 1, '2012-04-18 10:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL auto_increment,
  `brand` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `code` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `description` text collate utf8_unicode_ci NOT NULL,
  `price` float NOT NULL default '0',
  `feature1` text collate utf8_unicode_ci NOT NULL,
  `feature2` text collate utf8_unicode_ci NOT NULL,
  `feature3` text collate utf8_unicode_ci NOT NULL,
  `feature4` text collate utf8_unicode_ci NOT NULL,
  `feature5` text collate utf8_unicode_ci NOT NULL,
  `feature6` text collate utf8_unicode_ci NOT NULL,
  `imageurl` varchar(150) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of products' AUTO_INCREMENT=98 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `brand`, `code`, `description`, `price`, `feature1`, `feature2`, `feature3`, `feature4`, `feature5`, `feature6`, `imageurl`) VALUES
(1, 'CIEL', 'A1500CNTP', 'AGUA NATURAL  C/12 BOTELLAS DE 1.5 LT.', 142.85, '', '', '', '', '', '', 'imgp/image1.png'),
(2, 'CIEL', 'A0355CNTP', 'AGUA NATURAL  C/12 BOTELLAS DE 355 ml.', 47.85, '', '', '', '', '', '', 'imgp/image2.jpeg'),
(3, 'CIEL', 'AO600CNTP', 'AGUA NATURAL  C/12 BOTELLAS DE 600 ml.', 64.28, '', '', '', '', '', '', 'imgp/image3.jpeg'),
(4, 'SANCIFLEX', 'A0005HRBC', 'AZUCAR EN SOBRE      C/ 2000 SOBRES DE 5 grs.', 328.57, '', '', '', '', '', '', 'imgp/image4.jpeg'),
(5, 'COLON', 'C1000CMLP', 'CAFÉ MOLIDO              BOLSA DE 1 Kg.', 209.5, '', '', '', '', '', '', 'imgp/image5.png'),
(6, 'COLON', 'C10000CDM', 'CAFÉ MOLIDO DESCAFEINADO  BOLSA DE 1kg', 237.85, '', '', '', '', '', '', 'imgp/image5.png'),
(7, 'LA PARROQUIA', 'C0500PM0P', 'CAFE MOLIDO  BOLSA DE 500 g', 140.71, '', '', '', '', '', '', 'imgp/image6.jpeg'),
(8, 'LA PARROQUIA', 'C0500PG', 'CAFÉ GRANO  BOLSA DE  500 grs', 214.28, '', '', '', '', '', '', 'imgp/image6.jpeg'),
(9, 'DECAF', 'C200GDFRC', 'CAFÉ SOLUBLE DESCAFEINADO c/12 DE 200 grs.', 983.57, '', '', '', '', '', '', 'imgp/image7.jpeg'),
(10, 'ALPURA', 'LA0001', 'LECHE LIGHT  C/12  DE 1 Lt.', 228.57, '', '', '', '', '', '', 'imgp/image8.jpeg'),
(11, 'CARLOTA', 'M00C', 'MIEL DE ABEJA C/ 1 DE 500 Grs', 80, '', '', '', '', '', '', 'imgp/image9.jpeg'),
(12, 'COFFE MATE', 'C1000NCRC', 'SUST. DE CREMA P/ CAFÉ c/1200 SOBRES 2 grs.', 643, '', '', '', '', '', '', 'imgp/image10.jpeg'),
(13, 'COFFE MATE', 'C0453NBTP', 'SUST. DE CREMA P/CAFÉ C/12 FRASCOS 453 grs.', 564.28, '', '', '', '', '', '', 'imgp/image11.jpeg'),
(14, 'SPLENDA', 'S005GSSBC', 'SUST.DE AZUCAR SPLENDA C/500SOBRES 0.8grs.', 246, '', '', '', '', '', '', 'imgp/image12.jpeg'),
(15, 'LAGGS', 'T0012LJMC', 'TE DE JAMAICA 12 CAJILLAS C/50 pzs C/U', 371, '', '', '', '', '', '', 'imgp/image13.jpeg'),
(16, 'LAGGS', 'T0012LLMC', 'TE DE LIMON      12 CAJILLAS  C/96 zs C/U', 467.14, '', '', '', '', '', '', 'imgp/image14.jpeg'),
(17, 'LAGGS', 'T00024C', 'TE DE CANELA   18 CAJILLAS C/24 pzs C/U', 278.57, '', '', '', '', '', '', 'imgp/image15.jpeg'),
(18, 'LAGGS', 'T000039LM', 'TE DE MANZANILLA    12 CAJILLAS C/96 pzs C/U', 487, '', '', '', '', '', '', 'imgp/image16.png'),
(19, 'LAGGS', 'T000039LH', 'TE DE HIERBABUENA  12 CAJILLAS  C/956 pzs C/U', 453, '', '', '', '', '', '', 'imgp/image17.jpeg'),
(22, 'CIEL', 'A0355CCLC', 'AGUA MINERAL  C/24 LATAS DE 355 ml.', 155.21, '', '', '', '', '', '', 'imgp/image18.jpeg'),
(23, 'ROXALACE', 'B0008PBCP', 'BLONDA REDONDA  # 8 c/100 pzs', 40.71, '', '', '', '', '', '', 'imgp/image19.jpeg'),
(24, 'ROXALACE', 'B0012PBCP', 'BLONDA REDONDA #12 c/100 pzs', 82.18, '', '', '', '', '', '', 'imgp/image20.jpeg'),
(25, 'ROXALACE', 'B03040PBCP', 'BLONDA RECTANGULAR  30x40  C/100 pzs.', 119.56, '', '', '', '', '', '', 'imgp/image21.jpeg'),
(26, '', 'B2030GNTR', 'BOLSA 20 X 30 NATURAL P/1 KILO', 149.85, '', '', '', '', '', '', 'imgp/image81.jpeg'),
(27, '', 'B6090GNTR', 'BOLSA DE 60 X 90  ROLLO', 431.24, '', '', '', '', '', '', 'imgp/image80.jpeg'),
(28, '', 'BN90X120', 'BOLSA NEGRA DE 90 X 1.2   C/25 Kg', 571.42, '', '', '', '', '', '', 'imgp/image49.jpeg'),
(29, '', 'E0030PPLP', 'ESCOBA  1 PIEZA', 26.42, '', '', '', '', '', '', 'imgp/image50.jpeg'),
(30, '', 'F0P96SVDC', 'FIBRA VERDE  C/12  pzs', 121.42, '', '', '', '', '', '', 'imgp/image22.jpeg'),
(31, '', 'F0000SAZC', 'FIBRA CERO RAYAS  c/6 pzs', 164.28, '', '', '', '', '', '', 'imgp/image76.jpeg'),
(32, 'MELITA', 'F0000CBLP', 'FILTRO PARA CAFÉ  C/ 200 pzs', 140.87, '', '', '', '', '', '', 'imgp/image51.jpeg'),
(33, 'GREAT VALUE', 'F5040GBCP', 'FRANELA BLANCA  40x60  1   PIEZA', 27, '', '', '', '', '', '', 'imgp/image52.jpeg'),
(35, 'GREAT VALUE', 'J5040GBCP', 'JERGA   50X40  1 PIEZA', 17.85, '', '', '', '', '', '', 'imgp/image74.jpeg'),
(36, 'COCACOLA CLASICA', 'R0355C12CC', 'REFRESCO DE COLA  C/12 LATAS DE 355 ml.', 94.82, '', '', '', '', '', '', 'imgp/image32.jpeg'),
(37, 'COCACOLA LIGHT', 'R0355CLCC', 'REFRESCO DE COLA  C/12 LATAS DE 355 ml.', 100.98, '', '', '', '', '', '', 'imgp/image23.jpeg'),
(38, 'COCACOLA ZERO', 'R0355C0ZC', 'REFRESCO DE COLA  C/12 LATAS DE 355 ml.', 100.98, '', '', '', '', '', '', 'imgp/image25.jpeg'),
(39, 'SPRITE', 'R0355S12CC', 'REFRESCO DE LIMON C/12 LATAS DE 355 ml.', 94.82, '', '', '', '', '', '', 'imgp/image26.png'),
(40, 'SPRITE-ZERO', 'R0355S0CC', 'REFRESCO DE LIMON C/12 LATAS DE 355 ml.', 100.98, '', '', '', '', '', '', 'imgp/image27.jpeg'),
(41, 'FANTA', 'R0355F12NC', 'REFRESCO DE NARANJA C/12 LATAS DE355 ml.', 94.82, '', '', '', '', '', '', 'imgp/image28.jpeg'),
(42, 'DELAWARE', 'R0355D12CC', 'REFRESCO DE UVA     C/12 LATAS DE 355 ml.', 94.82, '', '', '', '', '', '', 'imgp/image29.png'),
(43, 'SIDRAL MUNDET', 'R0355SMCC', 'REFRESCO  DE MANZANA C/12  LATAS DE 355 ml.', 131.88, '', '', '', '', '', '', 'imgp/image31.jpeg'),
(44, 'MANZANA LIFT', 'R0355M12CC', 'REFRESCO  DE MANZANA C/12  LATAS DE 355 ml.', 94.82, '', '', '', '', '', '', 'imgp/image32.jpeg'),
(45, '', 'R0015XBCK', 'REMOVEDOR PARA CAFÉ 15 CM  C/12 Kgs.', 438.24, '', '', '', '', '', '', 'imgp/image33.jpeg'),
(46, 'KLEENEX CLASS', 'S0024KBCC', 'SERVILLETA  C/24 PAQ. DE 200 PZS C/U', 954.14, '', '', '', '', '', '', 'imgp/image34.jpeg'),
(47, 'LYS', 'S0012LBCC', 'SERVILLETA  C/12 PAQ. DE 500 PZS C/U', 328.57, '', '', '', '', '', '', 'imgp/image30.png'),
(48, 'KLEENEX', 'S024TKBCC', 'SERVITOALLA C/24 ROLLOS DE 85 Pzs  C/U', 365.71, '', '', '', '', '', '', 'imgp/image35.jpeg'),
(49, 'PÉTALO', 'T000012P', 'TOALLA EN ROLLO  BLANCA 6 ROLLOS 180 MTS.', 426.73, '', '', '', '', '', '', 'imgp/image37.jpeg'),
(50, 'DART', 'V0008DC2C', 'VASO TERMICO 8J8G  C/40 PAQ.  DE 25 pzs C/U', 308.7, '', '', '', '', '', '', 'imgp/image38.jpeg'),
(53, 'Adefoi', 'A0003ABBP', 'Aluminio Bobina de 400 mts 21 micras', 19285, '', '', '', '', '', '', 'imgp/image65.jpeg'),
(54, '', 'B1020GNGK', 'Bolsa de 10x20  por kilo', 43.1, '', '', '', '', '', '', 'imgp/image77.jpeg'),
(55, 'en di', 'B2030GNTR', 'Bolsa de 20x30 natural para 1 kilo c/4 kgs', 166, '', '', '', '', '', '', 'imgp/image78.jpeg'),
(56, '', 'B4060GNTR', 'Bolsa de 40x60 en rollo con 7.5 kilos ', 292.5, '', '', '', '', '', '', 'imgp/image79.jpeg'),
(57, '', 'B6090GNTR', 'Bolsa de 60x90 natural rollo de 10 kg aprox', 431.24, '', '', '', '', '', '', 'imgp/image80.jpeg'),
(58, '', 'BN90X120', 'Bolsa de 90x1.20 negra bulto de 25 kg', 571.42, '', '', '', '', '', '', 'imgp/image49.jpeg'),
(59, '', 'C0072EBC', 'Capacillo del 72 caja con 250 PZS', 11.07, '', '', '', '', '', '', 'imgp/image66.jpeg'),
(60, '', 'C0000XNGP', 'Cofia gorro veneciano caja con 100 pzs', 140.42, '', '', '', '', '', '', 'imgp/image61.png'),
(61, '', 'C2154ITPC', 'Contenedor transparente caja c/250 pzs  2118-54', 708.14, '', '', '', '', '', '', 'imgp/image40.jpeg'),
(62, 'Inix', 'C1414ITPC', 'Contenedor transparente caja c/500 pzs    1414', 539.31, '', '', '', '', '', '', 'imgp/image39.jpeg'),
(63, '', 'C0000XBCP', 'Cubre bocas paquete c/100 pzs', 52.85, '', '', '', '', '', '', 'imgp/image41.jpeg'),
(64, '', 'CPC', 'Cuchara postre pqt c/50 pzs', 5.5, '', '', '', '', '', '', 'imgp/image69.jpeg'),
(65, '', 'CCS', 'Cuchara Sopera pqt c/25 pzs', 7.14, '', '', '', '', '', '', 'imgp/image67.jpeg'),
(66, '', 'CUSC', 'Cuchillo  grande pqt c/25 pzs', 7.85, '', '', '', '', '', '', 'imgp/image70.jpeg'),
(67, 'Wizzer', 'E0600SBBP', 'Egapak Bobina de 600 mts', 98.52, '', '', '', '', '', '', 'imgp/image68.jpeg'),
(68, 'Scotch B', 'F0P76SNGC', 'Fibra negra caja c/12 pzs', 160, '', '', '', '', '', '', 'imgp/image42.png'),
(69, 'Scotch B', 'F0P96SVDC', 'Fibra verde  caja c/12 pzs', 121.42, '', '', '', '', '', '', 'imgp/image22.jpeg'),
(70, '', 'F0025CBCR', 'Franela blanca rollo de 25 mts', 252.85, '', '', '', '', '', '', 'imgp/image53.jpeg'),
(71, 'safety clean', 'G000XMD', 'Guantes  desechables de vinil c/50 pares Grandes', 77.14, '', '', '', '', '', '', 'imgp/image43.png'),
(72, '', 'G0000XPPC', 'Guantes de polipapel c/100  pzs', 12.85, '', '', '', '', '', '', 'imgp/image36.png'),
(73, 'Vitex', 'G0008VRJP', 'Guantes rojos de hule  1 par No. 8', 18.07, '', '', '', '', '', '', 'imgp/image44.jpeg'),
(74, '', 'E0030PPLP', 'Escoba', 36, '', '', '', '', '', '', 'imgp/image50.jpeg'),
(75, 'DART', 'V0008DC2C', 'Vaso termico numero 8J8 G', 308.7, '', '', '', '', '', '', 'imgp/image38.jpeg'),
(76, '', 'J0025CRJR', 'Jerga de 25 mts', 311.42, '', '', '', '', '', '', 'imgp/image46.jpeg'),
(77, '', 'M0000XBCP', 'Mandil de vinil ', 57.14, '', '', '', '', '', '', 'imgp/image45.jpeg'),
(78, '', 'M800GSBCP', 'Mechudo de pabilo de 800 grs', 50, '', '', '', '', '', '', 'imgp/image62.png'),
(79, '', 'P0024REI', 'Palillo  estuchado c/3000', 221.42, '', '', '', '', '', '', 'imgp/image48.jpeg'),
(80, 'prueba', 'S00500SP', 'Servilleta  blanca 12 pqts de 500', 221.42, '', '', '', '', '', '', 'imgp/image71.jpeg'),
(81, '', 'TSC', 'Tenedor sopero pqt c/25pzs', 7.14, '', '', '', '', '', '', 'imgp/image72.jpeg'),
(82, 'Mr. Paper', 'T0180MBCC', 'Toalla  blanca en rollo  180 mts c/6 Rollos', 220, '', '', '', '', '', '', 'imgp/image73.png'),
(83, 'sanitas', 'T2000SBCC', 'Toalla interdoblada c/2000', 150, '', '', '', '', '', '', 'imgp/image55.jpeg'),
(84, '', 'J0001A', 'Jabon zote rosa', 16.82, '', '', '', '', '', '', 'imgp/image54.png'),
(85, '', 'A00001FL', 'Fabuloso  LT.', 19.71, '', '', '', '', '', '', 'imgp/image47.png'),
(86, '', 'G0001TE', 'Tela granite x metro', 53.57, '', '', '', '', '', '', 'imgp/image75.jpeg'),
(87, 'kleenex', '', 'servilleta kleenek lujo 12 c/100', 353.68, '', '', '', '', '', '', 'imgp/image63.jpeg'),
(91, 'AIR WICK', 'A000WCAP', 'AROMATIZANTE LIQUIDO AZUL  1 PIEZA DE 365 ml.', 78.97, '', '', '', '', '', '', 'imgp/image34.jpeg'),
(92, 'DIAL', 'J500MBTP', 'JABÓN LÍQUIDO DESPACHADOR 1 ENVASE DE 221 ml.', 45.7, '', '', '', '', '', '', 'imgp/image56.jpeg'),
(93, 'DIAL', 'J500MDBTC', 'JABÓN REPUESTO 1 BOLSA DE 500 ml.', 67.5, '', '', '', '', '', '', 'imgp/image57.jpeg'),
(94, 'DOVE', 'J1000MDBC', 'JABÓN EN BARRA  1 PIEZA DE 135 grs.', 25.71, '', '', '', '', '', '', 'imgp/image59.jpeg'),
(95, 'DOVE', 'J1000MDLC', 'JABÓN LÍQUIDO CREMOSO 1 ENVASE DE 350 ml.  200 ml', 60.71, '', '', '', '', '', '', 'imgp/image58.jpeg'),
(96, 'SOFT AND WITHE', 'PHI0001SW', 'PAPEL HIGIENICO LINEA AZUL 12 ROLLOS DE 200 mts c/u', 275.87, '', '', '', '', '', '', 'imgp/image60.jpeg'),
(97, 'Petalo', 'T000012P', 'Toalla  blanca en rollo  180 mts c/6 Rollos', 426.73, '', '', '', '', '', '', 'imgp/image37.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `statusid` int(11) NOT NULL auto_increment,
  `description` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`statusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusid`, `description`) VALUES
(1, 'Iniciado'),
(2, 'Validado'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL auto_increment,
  `company` int(11) NOT NULL default '0',
  `usertypeid` int(11) NOT NULL default '0',
  `catalogid` int(11) NOT NULL default '0',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `lastname` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `telephone` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `ext` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `password` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `email` (`email`),
  KEY `company` (`company`),
  KEY `catalogid` (`catalogid`),
  KEY `usertypeid` (`usertypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `company`, `usertypeid`, `catalogid`, `name`, `lastname`, `email`, `telephone`, `ext`, `password`) VALUES
(1, 1, 1, 1, 'Lilia', '', 'lilia@importadorarym.com.mx', '111111111', '123', '9d95cf9759e35a446efe346b202595f8');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE IF NOT EXISTS `usertypes` (
  `usertypeid` int(11) NOT NULL auto_increment,
  `description` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`usertypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`usertypeid`, `description`) VALUES
(1, 'Super usuario'),
(2, 'Usuario basico');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalogproduct`
--
ALTER TABLE `catalogproduct`
  ADD CONSTRAINT `catalogproduct_ibfk_1` FOREIGN KEY (`catalogid`) REFERENCES `catalog` (`catalogid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catalogproduct_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`catalogid`) REFERENCES `catalog` (`catalogid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_4` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`statusid`) REFERENCES `status` (`statusid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`company`) REFERENCES `company` (`companyid`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertypes` (`usertypeid`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`catalogid`) REFERENCES `catalog` (`catalogid`);
