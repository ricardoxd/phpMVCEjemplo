-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2014 at 01:57 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `almacen`
--

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`id_compra`, `cantidad`, `id_producto`, `fecha`, `observacion`) VALUES
(16, 1, 3, '2014-07-04 01:30:11', ''),
(17, 10, 3, '2014-07-04 01:30:24', ''),
(18, 7, 6, '2014-07-04 01:30:44', ''),
(19, 4, 6, '2014-07-04 02:33:58', ''),
(20, 4, 3, '2014-07-04 02:34:23', ''),
(21, 4, 6, '2014-07-04 02:34:29', ''),
(22, 4, 3, '2014-07-04 22:15:54', ''),
(23, 5, 3, '2014-07-05 00:27:49', ''),
(25, 55, 3, '2014-07-05 03:20:42', ''),
(26, 5, 6, '2014-07-05 03:21:04', ''),
(27, 5, 3, '2014-07-15 22:15:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `unidad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `cantidad`, `observacion`, `codigo`, `unidad`) VALUES
(3, 'Bolsas Aseticas', 'de color negro\r\n  ', 31, '  ', '10005', 'UN'),
(6, 'Pulpas', 'bolsas   ', 2, '   ', '1005', 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`) VALUES
(13, 'admin', '12345'),
(19, 'root', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `cantidad`, `id_producto`, `fecha`, `observacion`) VALUES
(2, 1, 3, '2013-10-03 01:38:35', ''),
(3, 2, 3, '2014-07-02 01:39:56', ''),
(4, 2, 3, '2014-07-04 01:40:18', ''),
(5, 1, 3, '2014-07-04 01:40:27', ''),
(6, 2, 3, '2014-07-04 01:40:52', ''),
(7, 4, 6, '2014-07-04 02:34:58', ''),
(8, 8, 6, '2014-07-04 22:16:03', ''),
(9, 8, 6, '2014-07-04 22:16:16', ''),
(10, 8, 6, '2014-07-04 22:16:27', ''),
(11, 5, 3, '2014-07-04 22:23:37', ''),
(12, 14, 3, '2014-07-04 22:25:03', ''),
(14, 30, 3, '2014-07-05 03:21:25', ''),
(15, 20, 6, '2014-07-05 03:21:31', ''),
(16, 5, 3, '2014-07-15 22:20:28', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
