-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-11-2016 a las 14:02:06
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aldo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `source_url` varchar(250) NOT NULL,
  `video_embed` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `image_thumb` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `name`, `body`, `source_url`, `video_embed`, `image`, `image_thumb`, `created`, `active`) VALUES
(4, 'Filtran el precio del NES Mini en México', '<p><strong>Será bastante más caro de lo que esperabamos.</strong></p>\r\n\r\n<p>Nintendo ha intentado por todos los medios regresar por sus fueros en este año, ya sea co-produciendo <a href="https://codigoespagueti.com/noticias/pokemon-go-batalla-entre-ra-y-rv/" target="_blank"><em>Pokémon G</em></a><em>o</em>, presentando<a href="https://codigoespagueti.com/noticias/mario-llega-a-ios/" target="_blank"><em> Super Mario Run</em> en una keynote de Apple</a>, anunciando <a href="https://codigoespagueti.com/noticias/nintendo-switch/" target="_blank">Nintendo Switch</a> (su nueva consola híbrida) y, apuntando a los nostálgicos, reviviendo el NES con la curiosa<a href="https://codigoespagueti.com/noticias/nes-mini/" target="_blank"> NES Mini</a>.</p>\r\n\r\n<p>Lamentablemente, gracias a una filtración realizada por el usuario de Twitter <a href="https://twitter.com/Carraman/status/794207442309550080" target="_blank">José Carranza</a>, ahora sabemos que <strong>el precio de la consola en México rondará los 2,000 pesos</strong>.</p>\r\n\r\n<p>Si bien el precio no es alto, es casi el doble de lo que costará en Estados Unidos, donde se venderá por 60 dólares (1,147 pesos al tipo de cambio de hoy). A pesar de el aumento de precio, es casi seguro que la consola será un éxito y se agotará en poco tiempo, debido a que está enfocada a los treintones y cuarentones, que no tendrán problemas en pagar los 2,000 pesos con tal de revivir su juventud gamer.</p>\r\n\r\n<p>Con este precio tal vez sea mejor idea darle una oportunidad al PolyStation:</p>\r\n\r\n<p><img alt="" src="https://codigoespagueti.com/wp-content/uploads/2016/11/poly.jpg" xss=removed></p>', 'https://codigoespagueti.com/noticias/filtra-precio-nes-mini-mexico/', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/e_sX-9DjLog" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;', 'resources/uploads/blog/image_581cc09841fb0.jpg', 'resources/uploads/blog/image_581cc09841fb0_thumb.jpg', '2016-11-04 17:08:40', 1),
(5, 'El 12 de enero conoceremos los juegos, fecha de lanzamiento y precio de Nintendo Switch', '<p><strong>Será un regalo de reyes un poco retrasado.</strong></p>\r\n\r\n<p>Nintendo lanzó un comunicado de prensa en el que anuncia que <strong>en lo que resta del año no dará más información sobre Nintendo Switch</strong>, la nueva consola híbrida de la compañía. Afortunadamente tampoco tenderemos que esperar tanto para saber detalles de Switch.</p>\r\n\r\n<p>La compañía también indicó que <strong>el próximo 12 de enero realizará un gran evento en Tokio</strong>, destinado a periodistas e invitados especiales, que será transmitido en vivo a todo el mundo, donde revelará la fecha exacta de lanzamiento y el precio de la Nintendo Switch. Además también dará a conocer los primeros juegos que acompañarán a la consola. Con esto, sólo resta esperar para enterarnos de todos los detalles de Switch.</p>\r\n\r\n<p> </p>', 'https://codigoespagueti.com/wp-content/uploads/2016/10/Nintendo-Switch-640x360.jpg', '', 'resources/uploads/blog/image_581cc0e4b4dfa.jpg', 'resources/uploads/blog/image_581cc0e4b4dfa_thumb.jpg', '2016-11-04 17:09:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `image_thumb` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `image_thumb`, `url`, `active`, `created`) VALUES
(1, 'Azteca Movil', '<p>Portal que ofrece información relevante sobre clubes de suscripción mediante telefonia celular, ademas de contenido exclusivo para usuarios telcel.</p>\r\n\r\n<p>El sitio fue desarrollado para dar a conocer los diferentes canales y medios con los que Tv Azteca podia llegar al publico en general, este sitio fue dirigido para toda el area de Azteca Movil</p>\r\n\r\n<p>Lo particular en la creación de est portal fue el hecho de trabajar directamente con los programadores de la televisora y mediante el uso de plantillas, frameworks y estándares de codificación logramos sacar este sitio</p>\r\n\r\n<p>Desgraciadamente ya no se encuentra disponible en internet dado que realizaron cambios directivos en la televisora y quitaron todos los sitios que tenia la antigua administración</p>\r\n', 'resources/uploads/image_5817cafa8eca3.png', 'resources/uploads/image_5817cafa8eca3_thumb.png', '', 1, '2016-10-31 19:21:18'),
(2, 'Alkaseltzer-boost party heroes', '<p>Página promocional y de concurso para dar a concer el producto, este sitio fue desarrollado en un lapso de 3 semanas y cuenta con un cms para la administración del mismo, lo llamativo de este sitio es que los "hroes" tenian una animación vastante peculiar realizada con jquery</p>\r\n\r\n<p>Dinamica:</p>\r\n\r\n<p>Subir una imagen reprecentativa de uno de los "Party heroes" y la más votada por los usuarios (Solo logueados con facebook) ganaba un premio al final de la promoción, solo se podía votar 3 veces al día y esto se lograba mediante bloque de IP y mediante el api de facebook</p>\r\n', 'resources/uploads/image_581cc473cedd4.png', 'resources/uploads/image_581cc473cedd4_thumb.png', '', 1, '2016-11-01 19:58:04'),
(3, 'Azteca Cefat', '<p>Portal para la escuela de actores en Tv Azteca, CEFAT (Centro de Formación Actoral de Azteca)</p>\r\n\r\n<p>Este sitio fue creado para que los aspirantes pudieran ver la forma en que los alumnos toman sus clases, todo esto mediante galeria de imagenes, videos y testimonios de los mismo alumnos.</p>\r\n\r\n<p>Tambien hay una sección de solicitud para entrar a ala escuela, esto mediante un formulario que llega directamente a los directivos de la escuela donde revisan los videos e imagenes que manda el solicitante</p>\r\n', 'resources/uploads/image_581cc7acaf170.png', 'resources/uploads/image_581cc7acaf170_thumb.png', 'http://www.cefat.mx/', 1, '2016-11-04 17:38:52'),
(4, 'Azteca Señales', '<p>Este portal desarrollado para la televisora TV Azteca esta dedicado a otorgar información acerca de sus diferentes señales que ofrece, ademas de incentivar las ventas de tiempo en comerciales mediante un calendario y horarios de cada uno de los programas para cada señas (Canal)</p>\r\n\r\n<p>Tambien tiene un portal dedicado a proveedores mediante un acceso restringido para solicitar información sobre ventas y anuncios de sus productos en la televisora, así tambien para subir material para la realización de sus comerciales.</p>\r\n', 'resources/uploads/image_581ccf1858b97.png', 'resources/uploads/image_581ccf1858b97_thumb.png', '', 1, '2016-11-04 18:10:32'),
(5, 'Colgate Luminous White', '<p>Pagina web para concurso promocional de la marca Colgate Luminous White</p>\r\n\r\n<p>El concurso consistia en un compra registra y gana, primeramente se teninan que registrar mediante un formulario muy sencillo, despues registrar el ticket de compra y automaticamente eran acreedores a premios instantaneos como pases de cine, tarjetas Itunes, etc</p>\r\n\r\n<p>Al final de la prooción todos los tickets participaban en una viaje a NY, Paris o Roma</p>\r\n\r\n<p>Este portal contaba on un cms para la administración de premios y registro de tickets en punto de venta</p>\r\n', 'resources/uploads/image_581cd1694a2a4.png', 'resources/uploads/image_581cd1694a2a4_thumb.png', '', 1, '2016-11-04 18:20:25'),
(6, 'Office Depot', '<p>Landing page promocional y de concurso para la marca Office Depot durante el mundial</p>\r\n\r\n<p>La dinamica es muy simple solo comprar, registrar para participar por viejes dobles al mundial.</p>\r\n\r\n<p>El landing tambien contaba con un CMS para la administración de los usuarios registrados y el sorteo del ganador</p>\r\n', 'resources/uploads/image_581ce88e45079.png', 'resources/uploads/image_581ce88e45079_thumb.png', '', 1, '2016-11-04 19:59:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `porcent` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`id`, `name`, `porcent`, `created`) VALUES
(1, 'PHP', 85, '2016-11-01 18:02:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`) VALUES
(1, 'Aldo Marañon Andrade', 'isc.aldo@gmail.com', '45941d71657655bced8015745e14e18b8ff1e8addea897c01868b117e268fe92bd19c1c096e178d31ddd37035628683c9213be2e5459f3d91c81485e566fd398jsiwjMz98qaZMmtf8kvWR8/Cd+jG/8EwX4uTbHg6RSI=', '2016-10-31 16:26:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
