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
-- Base de datos: `ahorcado_1_0`
--
CREATE DATABASE IF NOT EXISTS ahorcado_1_0;
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ahorcado_1_0`
--
USE ahorcado_1_0;
CREATE TABLE IF NOT EXISTS `user_ahorcado` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `status` enum('on', 'off') NOT NULL,
  `id_user` varchar(50)  NOT NULL,
  `email` varchar(50)  NOT NULL,
  `register_date` datetime NOT NULL,
  `conection_last` datetime NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--