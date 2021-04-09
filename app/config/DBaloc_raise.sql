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
-- INSERT INTO `usuarios_pass` (`id`, `id_usuario`,`email`) VALUES
-- (1, 'jorge','jorgeordonezmorales@gmail.com');

-- INSERT INTO `usuarios_pass` (`id`, `usuarios`, `password`, `id_usuario`,  `email`,`fecha_registro`, `ultima_conexion`) VALUES
-- (1, 'jorge', '$2y$12$j5EUlvMyiGPs9TqXWbFQduDa8CY1qanjZ/h1ypOSxYYQ9xRCy8kmy', 'jorge',  'jorgeordonezmorales@gmail.com','2020-09-20 23:31:01', '2020-09-30 00:39:05'),
-- (2, 'magui', '$2y$12$BJtaRAapHyTZNOnbV3E7iOUuhT/VrhSceFP8mDedNiwLB1LJBB0Z2', 'magui',  'alocraise@gmail.com', '2020-09-25 00:08:56', '2020-09-29 03:21:59');
-- --

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(10) PRIMARY KEY NOT NULL,
  `id_usuario` varchar(50) NOT NULL,
  `plantilla` enum('aaron','liam','magui','magdy') NOT NULL,
  `sw_menu_text` enum('1','')  NOT NULL,
  `color_web1` varchar(50) NOT NULL,
  `color_web2` varchar(50) NOT NULL,
  `color_font` varchar(50) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `nombre_web` varchar(150) NOT NULL,
  `social_twitter` varchar(150) NOT NULL,
  `swtwitter` enum('0','1') NOT NULL,
  `social_instagram` varchar(150) NOT NULL,
  `swinstagram` enum('0','1') NOT NULL,
  `social_facebook` varchar(150) NOT NULL,
  `swfacebook` enum('0','1') NOT NULL,
  `social_linkedin` varchar(150) NOT NULL,
  `swlinkedin` enum('0','1') NOT NULL,
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
  `swwifi` enum('0','1') NOT NULL,
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
  `swaceptartarjetas` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

-- INSERT INTO `datos_usuarios` (`id`, `id_usuario`) VALUES
-- (1, 'jorge');

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
-- INSERT INTO `menu_dia` (`id`, `id_usuario`) VALUES
-- (1, 'jorge');




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
  `estado` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `telefono` varchar(30)  NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_conexion` datetime NOT NULL,
  `plan` varchar(70) NOT NULL,
  `precio_plan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE `usuarios_pass` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` varchar(50)  NOT NULL,
  `usuarios` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `recuperar_password` varchar(50) NOT NULL,
  `email` varchar(50)  NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_conexion` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_pass`
--
INSERT INTO `usuarios_pass` (`id`, `id_usuario`,`email`) VALUES
(1, 'jorge','jorgeordonezmorales@gmail.com');

-- INSERT INTO `usuarios_pass` (`id`, `usuarios`, `password`, `id_usuario`,  `email`,`fecha_registro`, `ultima_conexion`) VALUES
-- (1, 'jorge', '$2y$12$j5EUlvMyiGPs9TqXWbFQduDa8CY1qanjZ/h1ypOSxYYQ9xRCy8kmy', 'jorge',  'jorgeordonezmorales@gmail.com','2020-09-20 23:31:01', '2020-09-30 00:39:05'),
-- (2, 'magui', '$2y$12$BJtaRAapHyTZNOnbV3E7iOUuhT/VrhSceFP8mDedNiwLB1LJBB0Z2', 'magui',  'alocraise@gmail.com', '2020-09-25 00:08:56', '2020-09-29 03:21:59');
-- --
