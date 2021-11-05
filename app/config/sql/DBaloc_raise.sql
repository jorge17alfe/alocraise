-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2020 a las 00:50:12
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aloc_raise`
--
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE `usuarios_pass` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `usuarios` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `id_usuario` varchar(50)  NOT NULL,
  `recuperar_password` varchar(50) NOT NULL,
  `email` varchar(50)  NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_conexion` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_pass`
--
INSERT INTO `usuarios_pass` (`id`, `usuarios`, `password`, `id_usuario`, `recuperar_password`, `email`, `fecha_registro`, `ultima_conexion`) VALUES
(1, 'jorge', '$2y$12$0ETg03pqVguE6Lj8M8Cbi.JE5ghqEgL1tEgG6fjad4kloVxZ6QXeu', 'jorge', '', 'jorgeordonezmorales@gmail.com', '2021-02-19 12:30:06', '2021-06-01 11:20:39')


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(10) PRIMARY KEY NOT NULL,
  `id_usuario` varchar(50) NOT NULL,
  `plantilla` enum('aaron','liam','magui','magdy') NOT NULL,
  `color_web1` varchar(50) NOT NULL,
  `color_web2` varchar(50) NOT NULL,
  `color_font` varchar(50) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `nombre_web` varchar(150) NOT NULL,
  `social_network` text NOT NULL,
  `sw_elements` text NOT NULL,
  `titulo_sobre_nosotros` varchar(100) NOT NULL,
  `sobre_nosotros` text NOT NULL,
  `moneda` enum('1','2','3')  NOT NULL,
  `logo` varchar(100) NOT NULL,
  `portada` text NOT NULL,
  `carta` text NOT NULL,
  `carta_text` text NOT NULL,
  `bebida` text NOT NULL,
  `bebida_text` text NOT NULL,
  `wifi_name` varchar(50) NOT NULL,
  `wifi_pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `horario` text NOT NULL,
  `ubicacion_google` varchar(300) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `codigo_postal` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `aceptar_tarjetas` varchar(20) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `id_usuario`, `plantilla`,  `color_web1`, `color_web2`, `color_font`, `nombre_empresa`, `nombre_web`,`social_network`, `titulo_sobre_nosotros`, `sobre_nosotros`, `moneda`, `logo`, `portada`, `carta`, `carta_text`, `bebida`, `bebida_text`, `wifi_name`, `wifi_pass`, `swwifi`, `email`, `telefono`, `horario`, `ubicacion_google`, `direccion`, `codigo_postal`, `ciudad`, `estado`, `pais`, `aceptar_tarjetas`) VALUES
(1, 'jorge', 'aaron', '1', 'rgb(96, 113, 190, 0.5)', 'rgb(39, 51, 165, 0.835)', 'rgb(255,255,255)', 'Aloc_raise Restaurante-bar', 'aloc_raise-restaurante-bar-d67326a22642a324aa1b0745f2f17abb','', 'https://www.twitter.com', '1', 'https://www.instagram.comddddd', '1', 'https://www.facebook.com', '1', 'https://www.linkedin.com', '1', 'El mejor restaurante de Loja', 'a:4:{i:0;s:99:\"Te invito a mi restaurante\r\npasa, te voy a mostrar\r\nlos pinchitos y raciones\r\nque te voy a preparar\";i:1;s:161:\"En esta casa somos reales, decimos lo siento, comentemos errores, damos segundas oportunidades. Nos divertimos, abrazamos, perdonamos, amamos. Somos una familia.\";i:2;s:102:\"Habr&aacute; paella de risas\r\nternera a la luz de luna\r\nrellenos de amor eterno\r\ny gambas a la dulzura\";i:3;s:161:\"En esta casa somos reales, decimos lo siento, comentemos errores, damos segundas oportunidades. Nos divertimos, abrazamos, perdonamos, amamos. Somos una familia.\";}', '1', 'a:1:{i:0;s:36:\"eedb0f0e36d116dee105d025583a0586.jpg\";}', 'a:6:{i:0;s:36:\"be3b26fe15b2dbf196868b69e0456543.jpg\";i:1;s:36:\"cc17d9cb1c3c1dc7fe27fe15f44d3133.jpg\";i:2;s:36:\"8ea7d70b45ce97b41dca114c56f0d404.jpg\";i:3;s:36:\"3dd3c8cb3838886c3a85a19406b1ab34.jpg\";i:4;s:36:\"feec2ca47133d51335c46b9b11b569d3.jpg\";i:5;s:36:\"98df12d2feb56af4977171bc7f75cdf4.jpg\";}', 'a:6:{i:0;s:36:\"5a7cd1bc987aa1bba962ee1700a2e810.jpg\";i:1;s:36:\"e3f463efb53bf31750b38a1489991ecd.jpg\";i:2;s:36:\"ad876f20cc0adf02b444bcfb76509480.jpg\";i:3;s:36:\"65fb324eee6cc62b0bea16d6f3cd5cd5.jpg\";i:4;s:36:\"d5910798bf435419dba3c5a4f903794c.jpg\";i:5;s:36:\"688f147add6ff06d8ba6cf62b2b228b6.jpg\";}', 'a:7:{i:0;a:10:{i:0;s:14:\"PARA COMPARTIR\";i:1;a:14:{i:0;s:40:\"CROQUETAS DE JAM&Oacute;N IB&Eacute;RICO\";i:1;s:0:\"\";i:2;s:5:\"12,90\";i:3;s:10:\"cacahuetes\";i:4;s:10:\"crustaceos\";i:5;s:13:\"frutoscascara\";i:6;s:6:\"gluten\";i:7;s:6:\"huevos\";i:8;s:7:\"lacteos\";i:9;s:8:\"moluscos\";i:10;s:7:\"mostaza\";i:11;s:7:\"pescado\";i:12;s:6:\"sesamo\";i:13;s:4:\"soya\";}i:2;a:17:{i:0;s:20:\"PARRILLA DE VERDURAS\";i:1;s:103:\"Con tomate, pimientos rojos, pimientos verdes, calabacines, esp&aacute;rragos verdes, setas,y cebolleta\";i:2;s:5:\"12,00\";i:3;s:10:\"altramuces\";i:4;s:4:\"apio\";i:5;s:14:\"azufresulfitos\";i:6;s:10:\"cacahuetes\";i:7;s:10:\"crustaceos\";i:8;s:13:\"frutoscascara\";i:9;s:6:\"gluten\";i:10;s:6:\"huevos\";i:11;s:7:\"lacteos\";i:12;s:8:\"moluscos\";i:13;s:7:\"mostaza\";i:14;s:7:\"pescado\";i:15;s:6:\"sesamo\";i:16;s:4:\"soya\";}i:3;a:6:{i:0;s:23:\"CALAMARES A LA ANDALUZA\";i:1;s:22:\"Aros de calamar fritos\";i:2;s:5:\"10,50\";i:3;s:10:\"crustaceos\";i:4;s:6:\"gluten\";i:5;s:8:\"moluscos\";}i:4;a:6:{i:0;s:25:\"GAMBAS ROJAS A LA PLANCHA\";i:1;s:24:\"Con panecillos de tumaca\";i:2;s:5:\"12,00\";i:3;s:10:\"crustaceos\";i:4;s:6:\"gluten\";i:5;s:8:\"moluscos\";}i:5;a:3:{i:0;s:27:\"JAM&Oacute;N IB&Eacute;RICO\";i:1;s:0:\"\";i:2;s:5:\"19,50\";}i:6;a:3:{i:0;s:24:\"TABLA DE IB&Eacute;RICOS\";i:1;s:54:\"Lomo, chorizo, salchich&oacute;n, jam&oacute;n y queso\";i:2;s:5:\"16,50\";}i:7;a:5:{i:0;s:16:\"PULPO A LA BRASA\";i:1;s:19:\"Con patatas cocidas\";i:2;s:5:\"24,90\";i:3;s:10:\"crustaceos\";i:4;s:8:\"moluscos\";}i:8;a:5:{i:0;s:17:\"FOIE GRAS DE PATO\";i:1;s:42:\"Con tostas de pan integral, pasas y nueces\";i:2;s:5:\"12,00\";i:3;s:13:\"frutoscascara\";i:4;s:6:\"sesamo\";}i:9;a:3:{i:0;s:20:\"HUMMUS V DFGDFGDFGFD\";i:1;s:40:\"Garbanzos, aceite y piment&oacute;n rojo\";i:2;s:4:\"7,50\";}}i:1;a:8:{i:0;s:9:\"ENSALADAS\";i:1;a:8:{i:0;s:12:\"C&Eacute;SAR\";i:1;s:91:\"Pollo, lechuga mezclun, langostinos, queso parmes&aacute;no, salsa c&eacute;sar y pan frito\";i:2;s:4:\"6,90\";i:3;s:10:\"crustaceos\";i:4;s:6:\"gluten\";i:5;s:6:\"huevos\";i:6;s:7:\"lacteos\";i:7;s:7:\"pescado\";}i:2;a:5:{i:0;s:5:\"MIXTA\";i:1;s:96:\"Mezclun, at&uacute;n, tomate, aceitunas, huevos cocidos, ma&iacute;z y esp&aacute;rragos blancos\";i:2;s:4:\"6,50\";i:3;s:6:\"huevos\";i:4;s:7:\"lacteos\";}i:3;a:6:{i:0;s:23:\"ENSALADA DE TOMATE RAFF\";i:1;s:24:\"Con panecillos de tumaca\";i:2;s:4:\"7,90\";i:3;s:10:\"cacahuetes\";i:4;s:6:\"gluten\";i:5;s:7:\"mostaza\";}i:4;a:9:{i:0;s:35:\"ENSALADA DE QUESO DE CABRA Y NUECES\";i:1;s:62:\"Mezclun, tomates cherry, nueces, queso de cabra y jam&oacute;n\";i:2;s:5:\"10,90\";i:3;s:10:\"altramuces\";i:4;s:14:\"azufresulfitos\";i:5;s:10:\"cacahuetes\";i:6;s:13:\"frutoscascara\";i:7;s:6:\"huevos\";i:8;s:7:\"lacteos\";}i:5;a:6:{i:0;s:29:\"ENSALADA DE QUINOA Y AGUACATE\";i:1;s:66:\"Mezclun, tomate, tiras de pollo, aguacate, quinoa, chipotle y miel\";i:2;s:5:\"10,90\";i:3;s:10:\"cacahuetes\";i:4;s:10:\"crustaceos\";i:5;s:7:\"mostaza\";}i:6;a:5:{i:0;s:25:\"ENSALADA DE SALM&Oacute;M\";i:1;s:95:\"Brotes tiernos con dados de salm&oacute;n a la plancha, aguacate, tomates cherry y cebolla roja\";i:2;s:5:\"10,90\";i:3;s:6:\"gluten\";i:4;s:7:\"pescado\";}i:7;a:7:{i:0;s:17:\"BURRATA CON PESTO\";i:1;s:65:\"Burrata de b&uacute;fala , pesto, brotes tiernos y tomates cherry\";i:2;s:4:\"8,50\";i:3;s:6:\"gluten\";i:4;s:6:\"huevos\";i:5;s:7:\"lacteos\";i:6;s:4:\"soya\";}}i:2;a:7:{i:0;s:25:\"SANDWICHES Y HAMBURGUESAS\";i:1;a:5:{i:0;s:30:\"HAMBURGUESA CON QUESO DE CABRA\";i:1;s:83:\"Pan artesanal, carne de ternera 100%, queso de cabra, tomate y cebolla caramelizada\";i:2;s:5:\"11,90\";i:3;s:6:\"gluten\";i:4;s:6:\"huevos\";}i:2;a:7:{i:0;s:29:\"HAMBURGUESA CON BACON Y QUESO\";i:1;s:88:\"Pan artesanal, carne de ternera 100%, queso chedar, bacon, huevo frito, lechuga y tomate\";i:2;s:5:\"11,90\";i:3;s:6:\"gluten\";i:4;s:6:\"huevos\";i:5;s:7:\"lacteos\";i:6;s:7:\"mostaza\";}i:3;a:4:{i:0;s:24:\"HAMBURGUESA DE SOLOMILLO\";i:1;s:58:\"Pan artesanal, solomillo de ternera 100%, verduras frescas\";i:2;s:5:\"12,90\";i:3;s:6:\"gluten\";}i:4;a:7:{i:0;s:28:\"HAMBURGUESA DE SALM&Oacute;N\";i:1;s:131:\"Pan artesanal, filete de salm&oacute;n a la plancha, r&uacute;cula, tomate, salsa t&aacute;rtara, pepinillos y cebolla caramelizada\";i:2;s:4:\"9,90\";i:3;s:6:\"huevos\";i:4;s:7:\"lacteos\";i:5;s:7:\"mostaza\";i:6;s:7:\"pescado\";}i:5;a:8:{i:0;s:34:\"SANDWICH CLUB &quot;EL PUNTO&quot;\";i:1;s:97:\"Rebanadas de pan gallego, r&uacute;cula, huevo cocido, pollo, queso, tomate, salsa t&aacute;rtara\";i:2;s:4:\"8,00\";i:3;s:6:\"gluten\";i:4;s:6:\"huevos\";i:5;s:7:\"lacteos\";i:6;s:7:\"mostaza\";i:7;s:6:\"sesamo\";}i:6;a:3:{i:0;s:51:\"Estos platos se acompa&ntilde;a con patatas caseras\";i:1;s:0:\"\";i:2;s:0:\"\";}}i:3;a:6:{i:0;s:6:\"CARNES\";i:1;a:3:{i:0;s:22:\"SOLOMILLO A LA PLANCHA\";i:1;s:44:\"Con patatas fritas y pimientos padr&oacute;n\";i:2;s:5:\"19,00\";}i:2;a:3:{i:0;s:8:\"ENTRECOT\";i:1;s:44:\"Con patatas fritas y pimientos padr&oacute;n\";i:2;s:5:\"14,00\";}i:3;a:3:{i:0;s:23:\"CHULET&Oacute;N (2 pax)\";i:1;s:44:\"Con patatas fritas y pimientos padr&oacute;n\";i:2;s:5:\"39,00\";}i:4;a:3:{i:0;s:21:\"PICA&Ntilde;A (2 pax)\";i:1;s:44:\"Con patatas fritas y pimientos padr&oacute;n\";i:2;s:5:\"36,00\";}i:5;a:3:{i:0;s:16:\"TOMAHAWK (2 pax)\";i:1;s:44:\"Con patatas fritas y pimientos padr&oacute;n\";i:2;s:5:\"44,00\";}}i:4;a:5:{i:0;s:21:\"ESPECIAL NI&Ntilde;OS\";i:1;a:4:{i:0;s:21:\"ESPECIAL NI&Ntilde;OS\";i:1;s:0:\"\";i:2;s:2:\"12\";i:3;s:6:\"gluten\";}i:2;a:6:{i:0;s:21:\"ESPECIAL NI&Ntilde;OS\";i:1;s:0:\"\";i:2;s:2:\"23\";i:3;s:10:\"crustaceos\";i:4;s:13:\"frutoscascara\";i:5;s:6:\"gluten\";}i:3;a:5:{i:0;s:21:\"ESPECIAL NI&Ntilde;OS\";i:1;s:0:\"\";i:2;s:2:\"32\";i:3;s:6:\"gluten\";i:4;s:6:\"huevos\";}i:4;a:4:{i:0;s:21:\"ESPECIAL NI&Ntilde;OS\";i:1;s:0:\"\";i:2;s:2:\"44\";i:3;s:6:\"gluten\";}}i:5;a:4:{i:0;s:8:\"PESCADOS\";i:1;a:4:{i:0;s:8:\"PESCADOS\";i:1;s:0:\"\";i:2;s:2:\"12\";i:3;s:7:\"pescado\";}i:2;a:4:{i:0;s:8:\"PESCADOS\";i:1;s:0:\"\";i:2;s:2:\"23\";i:3;s:7:\"pescado\";}i:3;a:4:{i:0;s:8:\"PESCADOS\";i:1;s:0:\"\";i:2;s:2:\"21\";i:3;s:7:\"pescado\";}}i:6;a:2:{i:0;s:7:\"POSTRES\";i:1;a:8:{i:0;s:7:\"Helados\";i:1;s:42:\"Chocolate, Vainilla, Yogurt,  Lim&oacute;n\";i:2;s:4:\"6,00\";i:3;s:13:\"frutoscascara\";i:4;s:6:\"gluten\";i:5;s:6:\"huevos\";i:6;s:7:\"lacteos\";i:7;s:4:\"soya\";}}}', 'a:3:{i:0;s:36:\"ea9135a877f4b48948c37f0f26990192.jpg\";i:1;s:36:\"ea9135a877f4b48948c37f0f26990192.jpg\";i:2;s:36:\"16318c6b9cf0d8cf5ebff04f1d5c0130.jpg\";}', 'a:4:{i:0;a:9:{i:0;s:7:\"CERVEZA\";i:1;a:7:{i:0;s:11:\"CA&Ntilde;A\";i:1;s:0:\"\";i:2;s:4:\"1,50\";i:3;s:10:\"altramuces\";i:4;s:4:\"apio\";i:5;s:14:\"azufresulfitos\";i:6;s:10:\"cacahuetes\";}i:2;a:3:{i:0;s:23:\"CA&Ntilde;A SIN ALCOHOL\";i:1;s:0:\"\";i:2;s:4:\"1,50\";}i:3;a:3:{i:0;s:11:\"COPA (33cl)\";i:1;s:0:\"\";i:2;s:4:\"2,20\";}i:4;a:3:{i:0;s:23:\"COPA SIN ALCOHOL (33cl)\";i:1;s:0:\"\";i:2;s:4:\"2,20\";}i:5;a:3:{i:0;s:13:\"TERCIO 5*****\";i:1;s:0:\"\";i:2;s:4:\"2,20\";}i:6;a:3:{i:0;s:27:\"TERCIO ALAMBRA RESERVA 1925\";i:1;s:0:\"\";i:2;s:4:\"2,50\";}i:7;a:3:{i:0;s:26:\"TERCIO ESTRELLA DE GALICIA\";i:1;s:0:\"\";i:2;s:4:\"2,20\";}i:8;a:3:{i:0;s:28:\"BOTELL&Iacute;N MAHOU 5*****\";i:1;s:0:\"\";i:2;s:4:\"1,50\";}}i:1;a:9:{i:0;s:9:\"REFRESCOS\";i:1;a:3:{i:0;s:16:\"REFRESCOS VARIOS\";i:1;s:77:\"Coca cola, coca cola light, coca cola zero, fanta lim&oacute;n, fanta naranja\";i:2;s:4:\"2,20\";}i:2;a:3:{i:0;s:6:\"NESTEA\";i:1;s:16:\"Nestea, aquarius\";i:2;s:4:\"2,60\";}i:3;a:3:{i:0;s:5:\"ZUMOS\";i:1;s:38:\"Naranja, pi&ntilde;a, melocot&oacute;n\";i:2;s:4:\"2,50\";}i:4;a:3:{i:0;s:23:\"SOLAN DE CABRAS (500cl)\";i:1;s:0:\"\";i:2;s:4:\"1,80\";}i:5;a:3:{i:0;s:20:\"SOLAN DE CABRAS (1L)\";i:1;s:0:\"\";i:2;s:4:\"2,80\";}i:6;a:3:{i:0;s:20:\"VICHY CATAL&Aacute;N\";i:1;s:0:\"\";i:2;s:4:\"2,20\";}i:7;a:3:{i:0;s:13:\"SAN PELEGRINO\";i:1;s:0:\"\";i:2;s:4:\"2,50\";}i:8;a:3:{i:0;s:7:\"PERRIER\";i:1;s:0:\"\";i:2;s:4:\"2,50\";}}i:2;a:6:{i:0;s:13:\"VINOS BLANCOS\";i:1;a:3:{i:0;s:15:\"RUEDA (Botella)\";i:1;s:15:\"Copa 4,00&euro;\";i:2;s:5:\"15,00\";}i:2;a:3:{i:0;s:25:\"ALBARI&Ntilde;O (Botella)\";i:1;s:15:\"Copa 5,00&euro;\";i:2;s:5:\"19,00\";}i:3;a:3:{i:0;s:11:\"RIAS BAIXAS\";i:1;s:0:\"\";i:2;s:5:\"20,00\";}i:4;a:3:{i:0;s:5:\"RIOJA\";i:1;s:0:\"\";i:2;s:5:\"18,00\";}i:5;a:3:{i:0;s:18:\"RIBERA DE GUADIANA\";i:1;s:0:\"\";i:2;s:5:\"35,00\";}}i:3;a:10:{i:0;s:12:\"VINOS TINTOS\";i:1;a:3:{i:0;s:5:\"RIOJA\";i:1;s:15:\"Copa 4,00&euro;\";i:2;s:5:\"15,00\";}i:2;a:3:{i:0;s:16:\"RIBERA DEL DUERO\";i:1;s:15:\"Copa 5,00&euro;\";i:2;s:5:\"15,00\";}i:3;a:3:{i:0;s:4:\"TORO\";i:1;s:0:\"\";i:2;s:5:\"20,00\";}i:4;a:3:{i:0;s:17:\"VINO DE LA TIERRA\";i:1;s:0:\"\";i:2;s:5:\"25,00\";}i:5;a:3:{i:0;s:6:\"BIERZO\";i:1;s:0:\"\";i:2;s:5:\"22,00\";}i:6;a:3:{i:0;s:15:\"VINOS DE MADRID\";i:1;s:0:\"\";i:2;s:5:\"18,00\";}i:7;a:3:{i:0;s:7:\"JUMILLA\";i:1;s:0:\"\";i:2;s:5:\"23,00\";}i:8;a:3:{i:0;s:5:\"YECLA\";i:1;s:0:\"\";i:2;s:5:\"25,00\";}i:9;a:8:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:10:\"altramuces\";i:4;s:4:\"apio\";i:5;s:14:\"azufresulfitos\";i:6;s:10:\"cacahuetes\";i:7;s:13:\"frutoscascara\";}}}', 'aloc_raise', '2545RUwffg', '1', 'alocraise@gmail.com', 'a:1:{i:0;s:13:\"+593985646545\";}', 'a:6:{i:0;s:17:\"Lunes 9:00 a 0:00\";i:1;s:18:\"Martes 9:00 a 0:00\";i:2;s:28:\"Mi&eacute;rcoles 9:00 a 0:00\";i:3;s:18:\"Jueves 9:00 a 0:00\";i:4;s:19:\"Viernes 9:00 a 0:00\";i:5;s:31:\"S&aacute;bado y Domingo cerrado\";}', 'https://goo.gl/maps/5pTQRGfn8XtE4N8a7', 'Calle Riofr&iacute;o 45 local2B', '2598766', 'Loja', 'Loja', 'Ecuador', '', '1')

--
-- Estructura de tabla para la tabla `menu_dia`
--

CREATE TABLE `menu_dia` (
  `id` int(10) PRIMARY KEY NOT NULL ,
  `id_usuario` varchar(50)  NOT NULL,
  `primero` text  NOT NULL,
  `segundo` text  NOT NULL,
  `incluye` text NOT NULL,
  `precio` float NOT NULL,
  `sw_menu` enum('1','')  NOT NULL,
  `img_menu` varchar(100)  NOT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu_dia`
--

INSERT INTO `menu_dia` (`id`, `id_usuario`, `primero`, `segundo`, `incluye`, `precio`,`sw_menu`, `img_menu`) VALUES
(1, 'jorge', 'a:5:{i:0;s:30:\"Ensalada de tomate y ventresca\";i:1;s:19:\"Cazuela de Judiones\";i:2;s:16:\"Gazpacho Andaluz\";i:3;s:17:\"Paella valenciana\";i:4;s:25:\"Tallarines a la Carbonara\";}', 'a:5:{i:0;s:20:\"Pollo a la pepitoria\";i:1;s:39:\"Lomo de vaca asado con patatas al horno\";i:2;s:37:\"Dorada a la sal con patatas panaderas\";i:3;s:24:\"Confit de Pato agridulce\";i:4;s:22:\"Merluza en salsa verde\";}', 'Incluye pan bebida y postre', 25, '', 'a:1:{i:0;s:36:\"29938cae6727790a47491882e556fce7.jpg\";}')

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE `datos_personales` (
  `id` int(10) NOT NULL PRIMARY KEY ,
  `id_usuario` varchar(50)  NOT NULL,
  `recuperar_password` varchar(50) NOT NULL,
  `email` varchar(50)  NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni_nif` varchar(15) NOT NULL,
  `fecha_nacimiento` varchar(50)  NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `numero_direccion` int(10) NOT NULL,
  `planta` varchar(30) NOT NULL,
  `codigo_postal` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `estado_provincia` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `telefono` varchar(30)  NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_conexion` datetime NOT NULL,
  `plan` varchar(70) NOT NULL,
  `precio_plan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id`, `id_usuario`, `recuperar_password`, `email`, `nombre`, `apellidos`, `dni_nif`, `fecha_nacimiento`, `direccion`, `numero_direccion`, `planta`, `codigo_postal`, `ciudad`, `estado_provincia`, `pais`, `telefono`, `fecha_registro`, `ultima_conexion`, `plan`, `precio_plan`) VALUES
(1, 'jorge', '', 'jorgeordonezmorales@gmail.com', '', '', '', '', '', 0, '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0)

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `comments`
--
CREATE TABLE `comments` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(50)  NOT NULL,
   `email` varchar(70)  NOT NULL,
  `content` varchar(255) NOT NULL,
  `reply` text NOT NULL,
  `status` enum('1','2') NOT NULL,
  `registration_date` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--
--
-- Volcado de datos para la tabla `usuarios_pass`
--
-- ----------------------------------------------------
--
-- Estructura de tabla para la tabla `menssages`
--
CREATE TABLE `messages` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(70)  NOT NULL,
  `name` varchar(50) NOT NULL,
  `affair` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `numero_contrato` int(50)  NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id` int(10) NOT NULL  ,
  `id_usuario` varchar(50)  NOT NULL,
  `servicio` varchar(100)  NOT NULL,
  `fecha_creado_contrato` datetime NOT NULL,
  `fecha_final_contrato` date NOT NULL,
  `comentario` varchar(255)  NOT NULL,
  `estado` enum('generado','activo', 'anulado', 'vencido','otro') NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
 AUTO_INCREMENT = 1000
;

--
-- Volcado de datos para la tabla `usuarios_pass`
--


-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `numero_factura` int(50)  NOT NULL PRIMARY KEY  AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `id_usuario` varchar(50)  NOT NULL,
  `fecha_creada` datetime NOT NULL,
  `servicio` varchar(100)  NOT NULL,
  `importe` float  NOT NULL,
  `comentario` varchar(255)  NOT NULL,
  `estado` enum('generada','enviada', 'cobrada', 'rechazada', 'devuelta','otro' ) NOT NULL

 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
 AUTO_INCREMENT = 1000
;

--
-- Volcado de datos para la tabla `usuarios_pass`
--


-- --------------------------------------------------------


--
-- Índices para tablas volcadas
--

