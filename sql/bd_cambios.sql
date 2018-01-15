-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2018 a las 00:27:37
-- Versión del servidor: 5.5.55-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_cambios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE IF NOT EXISTS `agencias` (
`id` int(11) NOT NULL,
  `agencia` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `id_agente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`id`, `agencia`, `id_pais`, `direccion`, `telefono`, `id_agente`) VALUES
(3, 'Transferencias D''Una (Cucuta)', 1, 'cucuta', '32323232', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias_metodos`
--

CREATE TABLE IF NOT EXISTS `agencias_metodos` (
  `id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agencias_metodos`
--

INSERT INTO `agencias_metodos` (`id`, `id_agencia`, `id_metodo`, `activo`) VALUES
(0, 3, 1, 1),
(0, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias_monedas`
--

CREATE TABLE IF NOT EXISTS `agencias_monedas` (
`id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_moneda` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agencias_monedas`
--

INSERT INTO `agencias_monedas` (`id`, `id_agencia`, `id_moneda`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agentes`
--

CREATE TABLE IF NOT EXISTS `agentes` (
`id` int(11) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `n_doc` varchar(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agentes`
--

INSERT INTO `agentes` (`id`, `tipo_doc`, `n_doc`, `nombres`, `apellidos`, `telefono`, `correo`, `clave`) VALUES
(1, 1, '21182164', 'alejandro', 'rangel', '21212121', 'ale.ran92@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
`id` int(11) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `banco`, `id_pais`) VALUES
(1, 'Colpatria', 1),
(2, 'Banesco', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos_agencias`
--

CREATE TABLE IF NOT EXISTS `bancos_agencias` (
`id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `tipo_doc` int(1) NOT NULL,
  `n_doc` varchar(12) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `tipo_cuenta` int(1) NOT NULL,
  `n_cuenta` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
`id` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE IF NOT EXISTS `metodos_pago` (
`id` int(11) NOT NULL,
  `metodo_pago` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id`, `metodo_pago`, `activo`) VALUES
(1, 'efecty', 1),
(2, 'Transferencia bancaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
`id` int(11) NOT NULL,
  `monedas_cambio` varchar(100) NOT NULL,
  `pais1` int(11) NOT NULL,
  `pais2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id`, `monedas_cambio`, `pais1`, `pais2`) VALUES
(1, 'Pesos (CO) a Bolivares (VE)', 1, 2),
(2, 'Bolivares a (VE) a Pesos (CO)', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
`id` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'Colombia'),
(2, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas`
--

CREATE TABLE IF NOT EXISTS `tasas` (
`id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `moneda_cambio` int(11) NOT NULL,
  `tasa` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasas`
--

INSERT INTO `tasas` (`id`, `id_agencia`, `moneda_cambio`, `tasa`) VALUES
(1, 3, 1, 0.02),
(2, 3, 2, 0.016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
`id` int(11) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `moneda1` int(11) NOT NULL,
  `cantidad1` float NOT NULL,
  `moneda2` int(11) NOT NULL,
  `cantidad2` float NOT NULL,
  `tasa` float NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `banco_origen` int(11) NOT NULL,
  `cuenta_ht` int(11) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `n_doc_destino` varchar(12) NOT NULL,
  `nombres_destino` varchar(100) NOT NULL,
  `apellido_destino` varchar(100) NOT NULL,
  `correo_destino` varchar(100) NOT NULL,
  `banco_destino` int(11) NOT NULL,
  `tipo_cuenta_destino` int(11) NOT NULL,
  `nro_cuenta_destino` varchar(100) NOT NULL,
  `comentarios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trans_estados`
--

CREATE TABLE IF NOT EXISTS `trans_estados` (
  `id` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `id_estado` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `n_doc` varchar(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_naci` date NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(15) NOT NULL,
  `id_agencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pais` (`id_pais`), ADD KEY `agente` (`id_agente`);

--
-- Indices de la tabla `agencias_monedas`
--
ALTER TABLE `agencias_monedas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_agencia` (`id_agencia`), ADD KEY `id_moneda` (`id_moneda`);

--
-- Indices de la tabla `agentes`
--
ALTER TABLE `agentes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `bancos_agencias`
--
ALTER TABLE `bancos_agencias`
 ADD PRIMARY KEY (`id`), ADD KEY `id_agencia` (`id_agencia`), ADD KEY `id_banco` (`id_banco`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pais` (`pais1`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tasas`
--
ALTER TABLE `tasas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_agencia` (`id_agencia`), ADD KEY `moneda1` (`moneda_cambio`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
 ADD PRIMARY KEY (`id`), ADD KEY `id_agencia` (`id_agencia`), ADD KEY `id_usuario` (`id_usuario`), ADD KEY `moneda1` (`moneda1`), ADD KEY `moneda2` (`moneda2`), ADD KEY `id_metodo` (`id_metodo`), ADD KEY `banco_destino` (`banco_destino`), ADD KEY `banco_destino_2` (`banco_destino`);

--
-- Indices de la tabla `trans_estados`
--
ALTER TABLE `trans_estados`
 ADD KEY `id_trans` (`id_trans`), ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pais` (`id_pais`), ADD KEY `id_agencia` (`id_agencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `agencias_monedas`
--
ALTER TABLE `agencias_monedas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `agentes`
--
ALTER TABLE `agentes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bancos_agencias`
--
ALTER TABLE `bancos_agencias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tasas`
--
ALTER TABLE `tasas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasas`
--
ALTER TABLE `tasas`
ADD CONSTRAINT `tasas_ibfk_1` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
ADD CONSTRAINT `transacciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
