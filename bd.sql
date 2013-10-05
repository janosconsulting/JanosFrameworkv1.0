-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2013 a las 08:05:04
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `jfprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Aceite Friol', 'Aceite Friol', 31),
(2, 'Jabon Bolivar', 'Jabon Bolivar', 10),
(3, 'Agua San Carlos', 'Agua San Carlos', 2),
(4, 'Fideos Don Camilo', 'Fideos Don Camilo', 5),
(10, 'Mi Producto', 'Mi Producto de Prueba', 10),
(14, '', 'Producto de Prueba', 0),
(16, '', 'Nuevo Producto', 0);