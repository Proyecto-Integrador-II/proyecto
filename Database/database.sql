-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 06-10-2022 a las 02:07:33
-- Versión del servidor: 10.6.7-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`) VALUES
(2, 'Delacuesta'),
(3, 'Parque caracoli'),
(1, 'UPB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codproducto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `lugar` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `habilitado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `nombre`, `precio`, `lugar`, `descripcion`, `foto`, `proveedor`, `habilitado`) VALUES
(14, 'empanada', 2500, 1, 'son feas', 'img_d970a0e55bcacc5007662de3743eb845.png', 15, 0),
(15, 'empanada2', 3000, 1, 'son feas', 'img_916dd508a591fd958b43c0eb2d8d00f7.png', 15, 1),
(16, 'empanada', 2500, 1, 'queso', 'img_27be0de4cef5dd9a6c5c5da9e9445188.png', 15, 1);

-- --------------------------------------------------------

-- Reportes compradores

--
-- Estructura de tabla para la tabla `razones_reporte del comprador`
--

CREATE TABLE `razones_reporte` (
  `id` int(11) NOT NULL,
  `tipo_reporte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `razones_reporte del comprador`
--

INSERT INTO `razones_reporte` (`id`, `tipo_reporte`) VALUES
(1, 'Irrespeto con el vendedor'),
(2, 'No pagó'),
(3, 'No se encontraba en el lugar de pedido'),
(4, 'Canceló el servicio despues de haberse comenzado el proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte` del comprador
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `id_razon` int(11) NOT NULL,
  `id_reportado` int(11) NOT NULL,
  `reporte` varchar(1000) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reporte del comprador`
--

INSERT INTO `reporte` (`id`, `id_razon`, `id_reportado`, `reporte`, `foto`) VALUES
(24, 1, 16, 'Me insulto', 'img_bb66cedd661f592b6a9bbe7c3630a7b3.png');

-- --------------------------------------------------------


-- Reportes vendedores

--
-- Estructura de tabla para la tabla `razones_reporte del vendedor`
--

CREATE TABLE `razones_reporte_vendedor` (
  `id` int(11) NOT NULL,
  `tipo_reporte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Inserción de datos para la tabla `razones_reporte del vendedor`
--

INSERT INTO `razones_reporte_vendedor` (`id`, `tipo_reporte`) VALUES
(1, 'Irrespeto con el vendedor'),
(2, 'No pagó'),
(3, 'No se encontraba en el lugar de pedido'),
(4, 'Canceló el servicio despues de haberse comenzado el proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte` del vendedor
--

CREATE TABLE `reporte_vendedor` (
  `id` int(11) NOT NULL,
  `id_razon` int(11) NOT NULL,
  `id_reportado` int(11) NOT NULL,
  `reporte` varchar(1000) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Inserción de datos para la tabla `reporte del vendedor`
--

INSERT INTO `reporte_vendedor` (`id`, `id_razon`, `id_reportado`, `reporte`, `foto`) VALUES
(24, 1, 16, 'Me insulto', 'img_bb66cedd661f592b6a9bbe7c3630a7b3.png');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administradores'),
(2, 'Vendedores'),
(3, 'Compradores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `calificacion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `clave`, `rol`, `habilitado`, `calificacion`) VALUES
(1, 'Jean', 'Parra', 'Jean@vendedor.com', '1234', 2, 1, NULL),
(2, 'Jean', 'Parra', 'Jean@comprador.com', '1234', 3, 1, NULL),
(3, 'Jean', 'Parra', 'Jean@administrador.com', '1234', 1, 1, NULL),
(4, 'Miguel', 'Mateo', 'Miguel@vendedor.com', '1234', 2, 1, NULL),
(5, 'Miguel', 'Mateo', 'Miguel@comprador.com', '1234', 3, 1, NULL),
(6, 'Miguel', 'Mateo', 'Miguel@administrador.com', '1234', 1, 1, NULL),
(7, 'Armando', 'Cortes', 'Armando@vendedor.com', '1234', 2, 1, NULL),
(8, 'Armando', 'Cortes', 'Armando@comprador.com', '1234', 3, 1, NULL),
(9, 'Armando', 'Cortes', 'Armando@administrador.com', '1234', 1, 1, NULL),
(10, 'Diego', 'Vivas', 'Diego@vendedor.com', '1234', 2, 1, NULL),
(11, 'Diego', 'Vivas', 'Diego@comprador.com', '1234', 3, 1, NULL),
(12, 'Diego', 'Vivas', 'Diego@administrador.com', '1234', 1, 1, NULL),
(13, 'Nicolas', 'Muñoz', 'Nicolas@vendedor.com', '1234', 2, 1, NULL),
(14, 'Nicolas', 'Muñoz', 'Nicolas@comprador.com', '1234', 3, 1, NULL),
(15, 'Nicolas', 'Muñoz', 'Nicolas@administrador.com', '1234', 1, 1, NULL),
(16, 'Daniel', 'Cadena', 'Daniel@vendedor.com', '1234', 2, 1, NULL),
(17, 'Daniel', 'Cadena', 'Daniel@comprador.com', '1234', 3, 1, NULL),
(18, 'Daniel', 'Cadena', 'Daniel@administrador.com', '1234', 1, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_unique` (`nombre`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codproducto`),
  ADD KEY `proveedor` (`proveedor`),
  ADD KEY `lugar` (`lugar`);

--
-- Indices de la tabla `razones_reporte del comprador`
--
ALTER TABLE `razones_reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte del comprador`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_razon` (`id_razon`),
  ADD KEY `id_reportado` (`id_reportado`);
--
-- Indices de la tabla `razones_reporte del vendedor`
--
ALTER TABLE `razones_reporte_vendedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte del vendedor`
--
ALTER TABLE `reporte_vendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_razon` (`id_razon`),
  ADD KEY `id_reportado` (`id_reportado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razones_reporte del comprador`
--
ALTER TABLE `razones_reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte del comprador`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `razones_reporte del vendedor`
--
ALTER TABLE `razones_reporte_vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte del vendedor`
--
ALTER TABLE `reporte_vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_producto_lugares` FOREIGN KEY (`lugar`) REFERENCES `lugares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte del comprador`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_reporte_razones_reporte` FOREIGN KEY (`id_razon`) REFERENCES `razones_reporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reporte_usuario` FOREIGN KEY (`id_reportado`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte del vendedor`
--
ALTER TABLE `reporte_vendedor`
  ADD CONSTRAINT `FK_reporte_razones_reporte_vendedor` FOREIGN KEY (`id_razon`) REFERENCES `razones_reporte_vendedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reporte_usuario_vendedor` FOREIGN KEY (`id_reportado`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
