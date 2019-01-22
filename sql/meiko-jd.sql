-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2019 a las 14:59:12
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `meiko-jd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`jdiaz`@`%` PROCEDURE `SPCiudadGet` (IN `PDepartamento` INT(11))  NO SQL
select * from ciudad where IdDepartamento=PDepartamento$$

CREATE DEFINER=`jdiaz`@`%` PROCEDURE `SPDepartamentoGet` ()  NO SQL
SELECT * FROM departamento$$

CREATE DEFINER=`jdiaz`@`%` PROCEDURE `SPDocumentoGet` ()  NO SQL
select documento.IdDocumento,documento.Fecha,ciudad.Nombre as 'Ciudad',departamento.Nombre as 'Departamento',documento.Etiqueta from documento INNER JOIN ciudad on documento.IdCiudad=ciudad.IdCiudad INNER JOIN departamento on documento.IdDepartamento=departamento.IdDepartamento where activo=true$$

CREATE DEFINER=`jdiaz`@`%` PROCEDURE `SPDocumentoNew` (IN `pIdDepartamento` INT, IN `PIdCiudad` INT, IN `pFecha` VARCHAR(100), IN `pEtiqueta` VARCHAR(500))  NO SQL
INSERT INTO documento (IdDepartamento,IdCiudad,Fecha,Etiqueta) VALUES (pIdDepartamento,pIdCiudad,pFecha,pEtiqueta)$$

CREATE DEFINER=`jdiaz`@`%` PROCEDURE `SPDocumentoUpdate` (IN `PIdDocumento` VARCHAR(10))  NO SQL
update documento set activo=false where IdDocumento=PIdDocumento$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `IdCiudad` int(11) NOT NULL,
  `IdDepartamento` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Esta tabla contiene los tipos de documento del sistema';

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`IdCiudad`, `IdDepartamento`, `Nombre`) VALUES
(1, 1, 'bogota'),
(2, 3, 'Poblado'),
(3, 3, 'San Luis'),
(4, 2, 'yumbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Esta tabla contiene los tipos de documento del sistema';

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `Nombre`) VALUES
(1, 'Cundinmarca'),
(2, 'Cali'),
(3, 'Medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `IdDocumento` int(11) NOT NULL,
  `IdDepartamento` int(11) NOT NULL,
  `IdCiudad` int(11) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Etiqueta` varchar(500) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Esta tabla contiene los documentos del sistema';

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`IdDocumento`, `IdDepartamento`, `IdCiudad`, `Fecha`, `Etiqueta`, `activo`) VALUES
(1, 2, 4, '2000-01-01', 'cosa dos', 0),
(2, 1, 1, '2000-01-01', 'cosa uno', 0),
(3, 1, 1, '2000-01-01', 'etiqueta uno,cosa uno', 1),
(4, 1, 1, '2000-01-01', 'etiqueta uno,etiqueta dos,cosa uno', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`IdCiudad`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`IdDocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `IdDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
