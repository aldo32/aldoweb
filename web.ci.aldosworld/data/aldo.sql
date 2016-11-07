-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-11-2016 a las 09:50:27
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `name`, `body`, `source_url`, `video_embed`, `image`, `image_thumb`, `created`, `active`) VALUES
(4, 'Filtran el precio del NES Mini en México', '<p><strong>Será bastante más caro de lo que esperabamos.</strong></p>\r\n\r\n<p>Nintendo ha intentado por todos los medios regresar por sus fueros en este año, ya sea co-produciendo <a href="https://codigoespagueti.com/noticias/pokemon-go-batalla-entre-ra-y-rv/" target="_blank"><em>Pokémon G</em></a><em>o</em>, presentando<a href="https://codigoespagueti.com/noticias/mario-llega-a-ios/" target="_blank"><em> Super Mario Run</em> en una keynote de Apple</a>, anunciando <a href="https://codigoespagueti.com/noticias/nintendo-switch/" target="_blank">Nintendo Switch</a> (su nueva consola híbrida) y, apuntando a los nostálgicos, reviviendo el NES con la curiosa<a href="https://codigoespagueti.com/noticias/nes-mini/" target="_blank"> NES Mini</a>.</p>\r\n\r\n<p>Lamentablemente, gracias a una filtración realizada por el usuario de Twitter <a href="https://twitter.com/Carraman/status/794207442309550080" target="_blank">José Carranza</a>, ahora sabemos que <strong>el precio de la consola en México rondará los 2,000 pesos</strong>.</p>\r\n\r\n<p>Si bien el precio no es alto, es casi el doble de lo que costará en Estados Unidos, donde se venderá por 60 dólares (1,147 pesos al tipo de cambio de hoy). A pesar de el aumento de precio, es casi seguro que la consola será un éxito y se agotará en poco tiempo, debido a que está enfocada a los treintones y cuarentones, que no tendrán problemas en pagar los 2,000 pesos con tal de revivir su juventud gamer.</p>\r\n\r\n<p>Con este precio tal vez sea mejor idea darle una oportunidad al PolyStation:</p>\r\n\r\n<p><img alt="" src="https://codigoespagueti.com/wp-content/uploads/2016/11/poly.jpg" xss=removed></p>', 'https://codigoespagueti.com/noticias/filtra-precio-nes-mini-mexico/', '&lt;iframe width="560" height="315" src="https://www.youtube.com/embed/e_sX-9DjLog" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;', 'resources/uploads/blog/image_581cc09841fb0.jpg', 'resources/uploads/blog/image_581cc09841fb0_thumb.jpg', '2016-11-04 17:08:40', 1),
(5, 'El 12 de enero conoceremos los juegos, fecha de lanzamiento y precio de Nintendo Switch', '<p><strong>Será un regalo de reyes un poco retrasado.</strong></p>\r\n\r\n<p>Nintendo lanzó un comunicado de prensa en el que anuncia que <strong>en lo que resta del año no dará más información sobre Nintendo Switch</strong>, la nueva consola híbrida de la compañía. Afortunadamente tampoco tenderemos que esperar tanto para saber detalles de Switch.</p>\r\n\r\n<p>La compañía también indicó que <strong>el próximo 12 de enero realizará un gran evento en Tokio</strong>, destinado a periodistas e invitados especiales, que será transmitido en vivo a todo el mundo, donde revelará la fecha exacta de lanzamiento y el precio de la Nintendo Switch. Además también dará a conocer los primeros juegos que acompañarán a la consola. Con esto, sólo resta esperar para enterarnos de todos los detalles de Switch.</p>\r\n\r\n<p> </p>', 'https://codigoespagueti.com/wp-content/uploads/2016/10/Nintendo-Switch-640x360.jpg', '', 'resources/uploads/blog/image_581cc0e4b4dfa.jpg', 'resources/uploads/blog/image_581cc0e4b4dfa_thumb.jpg', '2016-11-04 17:09:56', 1),
(6, 'Adobe está trabajando en una app que será el equivalente de Photoshop para audio', '<p><strong>La app te permitirá añadir palabras que nunca se dijeron.</strong></p>\r\n\r\n<p>Si ya las cosas que dices durante el día te quitan el sueño, ahora todo se complica. Zeyu Jin, el desarrollador de Adobe, comentó el día de ayer durante una conferencia en San Francisco que se encuentra trabajando en una nueva aplicación: Project VoCo. Aunque no dijo cuándo saldrá a la venta, sí aseguró que <strong>su función será añadir palabras que no se encontraban originalmente en un archivo de audio</strong>.</p>\r\n\r\n<p>Como el Photoshop, Project VoCo está diseñado para ser lo más avanzado en cuanto a aplicaciones dedicadas a la edición de audio. Más allá de la edición estándar y la eliminación de ruido,<strong> esta nueva <em>app</em> permitirá también generar nuevas palabras</strong>.</p>\r\n\r\n<p>El software es capaz de asimilar las características de la voz de una persona y replicarla casi a la perfección, para lo cual sólo necesita una grabación de 20 minutos con la voz que quiera simularse.</p>\r\n\r\n<p>“Cuando se graba audio: <em>voiceovers</em>, diálogos y narraciones, la gente a menudo quisiera cambiar o insertar una o varias palabras ya sea para corregir un error o porque se busca cambiar alguna parte de la narrativa”, explicó Jin durante su evento MAX de creatividad y diseño. “Hemos desarrollado una tecnología llamada Project VoCo a través de la cual podrás simplemente teclear la palabra o palabras que deseas cambiar e insertarlas en la grabación. El algoritmo hace el resto, creando una grabación que suena como el hablante original diciendo esas palabras.”</p>\r\n\r\n<p>Esta aplicación puede transformar la manera en que los ingenieros de audio trabajan; sin embargo, habrá seguramente en el futuro un debate acerca de las implicaciones éticas de transformar lo que dice una persona. Con todo, así como Photoshop nos ha enseñado cómo detectar imágenes sospechosas, <strong>no es improbable que Project VoCo nos permita determinar si una grabación ha sido alterada o no.</strong></p>', '', '', 'resources/uploads/blog/image_581d6d49397f7.jpg', 'resources/uploads/blog/image_581d6d49397f7_thumb.jpg', '2016-11-05 05:25:29', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `image_thumb`, `url`, `active`, `created`) VALUES
(1, 'Azteca Movil', '<p>Portal que ofrece información relevante sobre clubes de suscripción mediante telefonia celular, ademas de contenido exclusivo para usuarios telcel.</p>\r\n\r\n<p>El sitio fue desarrollado para dar a conocer los diferentes canales y medios con los que Tv Azteca podia llegar al publico en general, este sitio fue dirigido para toda el area de Azteca Movil</p>\r\n\r\n<p>Lo particular en la creación de est portal fue el hecho de trabajar directamente con los programadores de la televisora y mediante el uso de plantillas, frameworks y estándares de codificación logramos sacar este sitio</p>\r\n\r\n<p>Desgraciadamente ya no se encuentra disponible en internet dado que realizaron cambios directivos en la televisora y quitaron todos los sitios que tenia la antigua administración</p>\r\n', 'resources/uploads/image_5817cafa8eca3.png', 'resources/uploads/image_5817cafa8eca3_thumb.png', '', 1, '2016-10-31 19:21:18'),
(2, 'Alkaseltzer-boost party heroes', '<p>Página promocional y de concurso para dar a concer el producto, este sitio fue desarrollado en un lapso de 3 semanas y cuenta con un cms para la administración del mismo, lo llamativo de este sitio es que los "hroes" tenian una animación vastante peculiar realizada con jquery</p>\r\n\r\n<p>Dinamica:</p>\r\n\r\n<p>Subir una imagen reprecentativa de uno de los "Party heroes" y la más votada por los usuarios (Solo logueados con facebook) ganaba un premio al final de la promoción, solo se podía votar 3 veces al día y esto se lograba mediante bloque de IP y mediante el api de facebook</p>\r\n', 'resources/uploads/image_581cc473cedd4.png', 'resources/uploads/image_581cc473cedd4_thumb.png', '', 1, '2016-11-01 19:58:04'),
(3, 'Azteca Cefat', '<p>Portal para la escuela de actores en Tv Azteca, CEFAT (Centro de Formación Actoral de Azteca)</p>\r\n\r\n<p>Este sitio fue creado para que los aspirantes pudieran ver la forma en que los alumnos toman sus clases, todo esto mediante galeria de imagenes, videos y testimonios de los mismo alumnos.</p>\r\n\r\n<p>Tambien hay una sección de solicitud para entrar a ala escuela, esto mediante un formulario que llega directamente a los directivos de la escuela donde revisan los videos e imagenes que manda el solicitante</p>\r\n', 'resources/uploads/image_581cc7acaf170.png', 'resources/uploads/image_581cc7acaf170_thumb.png', 'http://www.cefat.mx/', 1, '2016-11-04 17:38:52'),
(4, 'Azteca Señales', '<p>Este portal desarrollado para la televisora TV Azteca esta dedicado a otorgar información acerca de sus diferentes señales que ofrece, ademas de incentivar las ventas de tiempo en comerciales mediante un calendario y horarios de cada uno de los programas para cada señas (Canal)</p>\r\n\r\n<p>Tambien tiene un portal dedicado a proveedores mediante un acceso restringido para solicitar información sobre ventas y anuncios de sus productos en la televisora, así tambien para subir material para la realización de sus comerciales.</p>\r\n', 'resources/uploads/image_581ccf1858b97.png', 'resources/uploads/image_581ccf1858b97_thumb.png', '', 1, '2016-11-04 18:10:32'),
(5, 'Colgate Luminous White', '<p>Pagina web para concurso promocional de la marca Colgate Luminous White</p>\r\n\r\n<p>El concurso consistia en un compra registra y gana, primeramente se teninan que registrar mediante un formulario muy sencillo, despues registrar el ticket de compra y automaticamente eran acreedores a premios instantaneos como pases de cine, tarjetas Itunes, etc</p>\r\n\r\n<p>Al final de la prooción todos los tickets participaban en una viaje a NY, Paris o Roma</p>\r\n\r\n<p>Este portal contaba on un cms para la administración de premios y registro de tickets en punto de venta</p>\r\n', 'resources/uploads/image_581cd1694a2a4.png', 'resources/uploads/image_581cd1694a2a4_thumb.png', '', 1, '2016-11-04 18:20:25'),
(6, 'Office Depot', '<p>Landing page promocional y de concurso para la marca Office Depot durante el mundial</p>\r\n\r\n<p>La dinamica es muy simple solo comprar, registrar para participar por viejes dobles al mundial.</p>\r\n\r\n<p>El landing tambien contaba con un CMS para la administración de los usuarios registrados y el sorteo del ganador</p>\r\n', 'resources/uploads/image_581ce88e45079.png', 'resources/uploads/image_581ce88e45079_thumb.png', '', 1, '2016-11-04 19:59:10'),
(7, 'Saastah', '<p>Portal que ofrece servicios sobre eventos turisticos, rutas y servicio de banquetes para todo tipo de fiestas, este sitio fue desarrollado para un particular para atraer clientes y ofrecer sus diferentes servicios para organizar y diseñar eventos</p>\r\n\r\n<p> </p>\r\n\r\n<p>Cuenta con un sistema CMS para la adminitración de los eventos, blogs, calendarios de rutas, galerias, etc.</p>\r\n', 'resources/uploads/image_581d4d422575f.png', 'resources/uploads/image_581d4d422575f_thumb.png', '', 1, '2016-11-05 03:08:50'),
(8, 'Sistema contable AVON', '<p>Sistema para la administración de activos fijos para la empresa AVON, este sistema se encarga de controlar y administrar los activos muebles e inmuebles de la empresa, asi como gastos por los mismos</p>\r\n\r\n<p>El sistema esta desarrollado en Visual Estudio 2005 con el lenguaje de programación C#</p>\r\n\r\n<p>Este sistema esta actualmente funcionando en dicha empresa.</p>\r\n', 'resources/uploads/image_581d4de463353.png', 'resources/uploads/image_581d4de463353_thumb.png', '', 1, '2016-11-05 03:11:32'),
(9, 'Sistema para control de acceso biometrico', '<p>Este sistema se desarrollo para una universisdad privada del estado de Veracruz llamada Universidad del valle de Orizaba (UNIVO), este sistema estaba dirigido a los maestros para realizar su checkeo antes y despues de cada clase, para logras esto se realizo un sistema en PHP ara la administración de horarios para cada maestro</p>\r\n\r\n<p>Este sistema actualmente sigue funcionando en dicha universidad</p>\r\n', 'resources/uploads/image_581d4e8242ec8.jpg', 'resources/uploads/image_581d4e8242ec8_thumb.jpg', '', 1, '2016-11-05 03:14:10'),
(10, 'Contorno - Centro de Prospectiva y Debate', '<p>Este sitio fue desarrollado para un particular que se dedica a asuntos políticos y de debate, el objetivo de este es proporcionar información de calidad para los amantes de la política</p>\r\n\r\n<p>Este portal es un espacio de diálogo y discusión pública. Un mapa del actual entorno socio político. Una brújula que permite orientarnos en relación a nuestro contexto presente y los retos futuros que como país enfrentaremos.</p>\r\n\r\n<p>Cuenta con un administrador CMS bastante completo, ya que se pueden crear nuevas secciones de manera dinamica así como administrar toda la biblioteca de medios y archivos descargables.</p>\r\n\r\n<p> </p>\r\n', 'resources/uploads/image_581d4fe50f4b5.png', 'resources/uploads/image_581d4fe50f4b5_thumb.png', 'http://www.contorno.org.mx/', 1, '2016-11-05 03:20:05'),
(11, 'GBmobile', '<p>Sitio para la empresa denominada GBmobile, un sitio desarrollado enteramente con jquery ya que solo es informativos y con un sinfin de animaciones simulando que una idea puede ser transformada en un producto y que este puede ser el mejor del mundo.</p>\r\n', 'resources/uploads/image_581d51ab5379b.png', 'resources/uploads/image_581d51ab5379b_thumb.png', '', 1, '2016-11-05 03:27:39'),
(12, 'Grisi 150 Razones', '<p>Sition web de promoción compra registra y gana para la marca Grisi, la mecánica consiste en registrar un ticket de compra y registrar una razon de por que deben ser los ganadores de 1 año de gym gratis.</p>\r\n\r\n<p>Este promoción duro poco tiempo pero registro más de 10000 usuarios</p>\r\n\r\n<p>Cuanta con administrador CMS para el sorteo y administración de usuarios y textos dentro del landing</p>\r\n', 'resources/uploads/image_581d53009b817.png', 'resources/uploads/image_581d53009b817_thumb.png', '', 1, '2016-11-05 03:33:20'),
(13, 'Sistema Integral de Servicios Escolares (SISE)', '<p>Desarrollo de modulos para la plataforma de administración SISE en la Universidad del Valle de Orizaba</p>\r\n\r\n<p>Los modulos desarrollados tenian  la función de administrar varios aspectos del plantel, como los son horarios, pagos, Alumnos, Boletas, etc.</p>\r\n\r\n<p>Este sistema fue desarrollado en un principio par el nivel de licenciatura, despues se expandio para los niveles de secundario y preparatoria</p>\r\n', 'resources/uploads/image_581d53f31bcaa.png', 'resources/uploads/image_581d53f31bcaa_thumb.png', '', 1, '2016-11-05 03:37:23'),
(14, 'Taco Gallo', '<p>Portal web para un particular donde se anuncia e informa acerca de su restaurante de tacos y bar, esta pagina fue desarrollada mediante un diseño responsivo para que sea visible en mobiles</p>\r\n\r\n<p>Al igual que otros sitios cuanta con un administrador CMS para la colocación de imagenes, carruseles, secciones y videos dentro del sitio</p>\r\n', 'resources/uploads/image_581d550ed1a90.png', 'resources/uploads/image_581d550ed1a90_thumb.png', '', 1, '2016-11-05 03:42:07'),
(15, 'Caminos de la libertad', '<p>Este portal web fue desarrollado a petición de Tv Azteca, contiene información política y de concursos, ademas de ofrecer una amplia gama de contenido literario</p>\r\n\r\n<p>Este sitio se ha mantenido en linea gracias a su importancia entre los lectores e interezados en temas políticos, literarios y sociales</p>\r\n', 'resources/uploads/image_581d566050087.png', 'resources/uploads/image_581d566050087_thumb.png', 'http://www.caminosdelalibertad.com/', 1, '2016-11-05 03:47:44'),
(16, 'Big Cola', '<p>Landing page para promocionar la marca BigCola mediante una promoción de compra registra y gana, la mecánica es muy simple solo seregistraban las taparoscas y al final de la promoción se sorteaban miles de premios entre los participantes.</p>\r\n\r\n<p>Al igual este sitio cuenta con un sistema de administración CMS para los sorteos y administración de ciertas secciones de la página.</p>\r\n', 'resources/uploads/image_581d57203a837.png', 'resources/uploads/image_581d57203a837_thumb.png', '', 1, '2016-11-05 03:50:56'),
(17, 'Carrera Azteca', '<p>Sitio desarrollado para patrocinar la carrera azteca, aunque fue solo para el año 2012 este sitio fue creado en tan solo 2 semanas, aunque ausente de CMS las ilustraciones, animaciones y navegación de este eran únicas</p>\r\n', 'resources/uploads/image_581d57b38fb63.png', 'resources/uploads/image_581d57b38fb63_thumb.png', '', 1, '2016-11-05 03:53:23'),
(18, 'Sharpie Hazte Notar', '<p>Este sitio para la marca Sharpie, wfue diseñado para fomentar el uso de estos plumones al invitar a los usuarios a subir sus creaciones mediente este sitio, ademas proporcionaba información para realizar diversas manualidades y llevar tu imaginación al limite</p>\r\n\r\n<p>Contaba con un robusto CMS para la administración del sitio entre los modulos más importantes era la administración de secciones, videos, blog, manualidades y galerias</p>\r\n', 'resources/uploads/image_581d58e0a0821.png', 'resources/uploads/image_581d58e0a0821_thumb.png', '', 1, '2016-11-05 03:58:24'),
(19, 'Sealy, un ratito más', '<p>Este sitio esta dirigido a las personas interezadas en el buen dormir, ya que ofrece información y consejos para dormir bien, contiene un blog, foro de discuciones, videos y articulos relacionados con el sueño.</p>\r\n\r\n<p>Una de las más importantes secciones de este portal es el canal en vico que transmitia tv azteca durante ciertos dias dedicado a este portal</p>\r\n', 'resources/uploads/image_581d5a5775d08.png', 'resources/uploads/image_581d5a5775d08_thumb.png', '', 1, '2016-11-05 04:04:39'),
(20, 'Dove Men+Care', '<p>Este sitio promocional esta dedicado a los amantes de la NFL mediante un simple concurso de compra registra y gana para poder ganar viajes directos al probowl y superbowl</p>\r\n\r\n<p>Contiene un administrador de contenido para actualizar videos y lista de ganadores</p>\r\n', 'resources/uploads/image_581d5aef6efac.png', 'resources/uploads/image_581d5aef6efac_thumb.png', '', 1, '2016-11-05 04:07:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `porcent` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`id`, `name`, `porcent`, `created`) VALUES
(1, 'PHP', 85, '2016-11-01 18:02:31'),
(2, 'MYSQL', 90, '2016-11-05 04:21:11'),
(3, 'POSTGRES', 80, '2016-11-05 04:21:19'),
(4, 'AJAX', 100, '2016-11-05 04:21:34'),
(5, 'HTML', 100, '2016-11-05 04:21:46'),
(6, 'HTML5', 85, '2016-11-05 04:21:59'),
(7, 'CSS', 80, '2016-11-05 04:22:11'),
(8, 'CSS 3', 75, '2016-11-05 04:22:19'),
(9, 'JAVA SCRIPT', 75, '2016-11-05 04:22:37'),
(10, 'JQUERY', 80, '2016-11-05 04:22:47'),
(11, 'BOOTSTRAP', 85, '2016-11-05 04:23:12'),
(12, 'CODEIGNITER', 100, '2016-11-05 04:23:23'),
(13, 'ZEND FRAMEWORK', 50, '2016-11-05 04:23:48'),
(14, 'CAKE PHP', 50, '2016-11-05 04:24:06'),
(15, 'C#', 25, '2016-11-05 04:24:22'),
(16, 'SQL AVANSADO', 85, '2016-11-05 04:24:31'),
(17, 'POO', 90, '2016-11-05 04:24:43'),
(18, 'APACHE', 90, '2016-11-05 04:24:54'),
(19, 'MICROSOFT OFFICE', 90, '2016-11-05 04:25:21'),
(20, 'CONEXIONES REMOTAS', 75, '2016-11-05 04:25:37'),
(21, 'API WEB SERVICES', 85, '2016-11-05 04:25:59'),
(22, 'ADMINISTRACIÓN DE SERVIDORES LINUX', 80, '2016-11-05 04:26:36'),
(23, 'API, SDK FACEBOOK', 75, '2016-11-05 04:27:02'),
(24, 'API, SDK TWITTER', 80, '2016-11-05 04:27:21'),
(25, 'API, SDK GOOGLE MAPS', 75, '2016-11-05 04:27:39'),
(26, 'LARAVEL', 75, '2016-11-05 04:27:52'),
(27, 'DISEÑO WEB CSS', 85, '2016-11-05 04:28:05'),
(28, 'METODOLOGIAS AGILES PARA DESARROLLO', 75, '2016-11-05 04:28:32'),
(29, 'GIT HUB', 85, '2016-11-05 04:28:45'),
(30, 'PFSENSE', 50, '2016-11-05 04:29:07'),
(31, 'REDES', 80, '2016-11-05 04:29:17'),
(32, 'SISTEMAS OPERATIVOS', 90, '2016-11-05 04:29:45'),
(33, 'PHOTO SHOP', 50, '2016-11-05 04:29:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
