-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2018 a las 12:41:08
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbventascgv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(512) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `estado`) VALUES
(1, 1, 'cat5', 'utp', 1114, 'cobre', NULL, 'Activo'),
(2, 3, '12121212121212', 'kingston', 1254, 'pequeña', NULL, 'Activo'),
(3, 2, '21221212121212', 'dell', 126, 'negra 1 tb', NULL, 'Activo'),
(4, 1, '12345', 'babbabababba', 1, 'n', NULL, 'Activo'),
(5, 3, '1111', 'parlante', 0, '8w', NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas_servicio`
--

CREATE TABLE `caracteristicas_servicio` (
  `idcaracteristicas` int(11) NOT NULL,
  `nombre_crarcteristica` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `cargador` varchar(10) NOT NULL,
  `bateria` varchar(10) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'redes', 'cables', 1),
(2, 'laptop', 'ninguna', 1),
(3, 'usb', '36gb', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `num_serie` varchar(255) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `num_serie`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 1, '', '10.00', '20.00'),
(2, 1, 1, 2, '', '10.00', '20.00'),
(3, 2, 1, 1, '', '10.00', '20.00'),
(4, 3, 2, 1, '', '20.00', '25.00'),
(5, 4, 2, 1, '', '10.00', '20.00'),
(6, 5, 3, 12, '', '15.00', '20.00'),
(7, 6, 3, 20, '', '10.00', '20.00'),
(8, 7, 3, 80, '', '10.00', '50.00'),
(9, 8, 1, 1, '', '1.00', '2.00'),
(10, 9, 2, 1, '', '10.00', '11.00'),
(11, 9, 1, 1111, '', '10.00', '11.00'),
(12, 9, 1, 1, '', '10.00', '11.00'),
(13, 10, 2, 1233, '', '12.00', '12.00'),
(14, 10, 2, 1, '', '12.00', '12.00'),
(15, 11, 2, 1, '', '12.00', '13.00'),
(16, 12, 3, 1, '11111', '12.00', '14.00'),
(17, 13, 2, 1, '111111', '12.00', '12.00'),
(18, 13, 2, 1, '22222', '12.00', '12.00'),
(19, 14, 2, 5, '111', '1.00', '2.00'),
(20, 15, 5, 1, '11111', '12.00', '14.00');

--
-- Disparadores `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
	UPDATE articulo SET stock = stock + NEW.cantidad
 WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proforma`
--

CREATE TABLE `detalle_proforma` (
  `iddetalle_proforma` int(11) NOT NULL,
  `idproforma` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,0) NOT NULL,
  `descuento` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_proforma`
--

INSERT INTO `detalle_proforma` (`iddetalle_proforma`, `idproforma`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 1, 1, 1, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicio`
--

CREATE TABLE `detalle_servicio` (
  `iddetalle_servicio` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `respaldo` varchar(255) NOT NULL,
  `idcaracteristicas` int(11) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `costo_chequeo` decimal(11,2) NOT NULL,
  `abono` decimal(11,2) NOT NULL,
  `saldo` decimal(11,2) NOT NULL,
  `total_servicio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
(1, 1, 3, 1, '10.00', '2.00'),
(2, 2, 3, 2, '44.00', '14.00'),
(3, 3, 3, 1, '10.00', '1.00'),
(4, 5, 3, 1, '21.33', '1.00'),
(5, 6, 3, 1, '21.33', '2.00'),
(6, 7, 3, 1, '21.33', '1.00'),
(7, 7, 3, 0, '21.33', '1.00'),
(8, 7, 3, 1, '21.33', '3.00'),
(9, 8, 3, 1, '21.33', '1.00'),
(10, 9, 3, 1, '21.33', '1.00'),
(11, 10, 3, 1, '21.33', '1.00'),
(12, 11, 3, 1, '21.33', '0.00'),
(13, 12, 1, 1, '14.00', '1.00'),
(14, 13, 3, 2, '26.00', '0.00'),
(15, 14, 3, 1, '26.00', '1.00'),
(16, 15, 5, 1, '14.00', '1.00');

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
	UPDATE articulo SET stock = stock - NEW.cantidad
 WHERE articulo.idarticulo = NEW.idarticulo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `iva` decimal(4,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `tipo_comprobante`, `num_comprobante`, `fecha`, `iva`, `estado`) VALUES
(1, 2, 'fac', '122', '2018-04-12 00:00:00', '12.00', 'Cancelada'),
(2, 2, 'Factura', '001', '2018-04-19 06:37:44', '12.00', 'Activo'),
(3, 3, 'Nota de Venta', '0002', '2018-04-19 06:38:26', '12.00', 'Cancelada'),
(4, 3, 'Factura', '001', '2018-04-20 03:44:13', '12.00', 'Activo'),
(5, 3, 'Factura', '1111111', '2018-04-20 05:18:24', '12.00', 'Cancelada'),
(6, 3, 'Factura', '0002', '2018-04-23 03:16:59', '12.00', 'Activo'),
(7, 2, 'Factura', '0003', '2018-04-23 03:17:58', '12.00', 'Activo'),
(8, 2, 'Factura', '111', '2018-04-25 08:00:27', '12.00', 'Activo'),
(9, 3, 'Nota de Venta', '1111', '2018-04-25 08:16:45', '12.00', 'Activo'),
(10, 3, 'Factura', '1234', '2018-04-26 06:41:02', '12.00', 'Activo'),
(11, 2, 'Factura', '111111', '2018-04-27 04:17:05', '12.00', 'Activo'),
(12, 3, 'Factura', '123456', '2018-05-03 04:28:22', '12.00', 'Activo'),
(13, 2, 'Factura', '1111', '2018-05-03 05:56:04', '12.00', 'Activo'),
(14, 2, 'Factura', '111', '2018-05-04 04:46:54', '12.00', 'Activo'),
(15, 2, 'Factura', '3333', '2018-05-08 05:31:17', '12.00', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(25) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Cliente', 'gabo', 'CI', '12548', 'lll', '1588', ''),
(2, 'Proveedor', 'hp', 'RUC', '0015787', 'wwww', '777777', ''),
(3, 'Proveedor', 'GAbo', 'RUC', '2100198981001', 'sur', '098790952', 'gabicho.edu@gmail.com'),
(4, 'Cliente', 'aaa', 'CI', '1212', 'qqqq', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `idproforma` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) DEFAULT NULL,
  `num_comprobante` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `iva` decimal(4,0) NOT NULL,
  `total_venta` decimal(11,0) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proforma`
--

INSERT INTO `proforma` (`idproforma`, `idcliente`, `tipo_comprobante`, `num_comprobante`, `fecha`, `iva`, `total_venta`, `estado`) VALUES
(1, 1, '', 1111, '2018-05-07 00:00:00', '12', '50', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `num_comprobante` varchar(255) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@gmail.com', '$2y$10$GDnrrzpeeS0ssY4dCjtvGOLzo4Z6P9SsQrzQtU0AeVWwlzkVo4JQS', 'lgMZacrf15ZexaUH5L41UXocwmFbH545NMSy49jdwARmmygh3yLYSlXJBcqY', '2018-05-03 01:47:40', '2018-05-04 03:47:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `iva` decimal(4,2) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idcliente`, `tipo_comprobante`, `num_comprobante`, `fecha`, `iva`, `total_venta`, `estado`) VALUES
(1, 1, '001', '002', '2018-04-12 00:00:00', '10.00', '20.00', 'Cancelada'),
(2, 4, '23', '44', '2018-04-24 00:00:00', '0.12', '124.00', 'Cancelada'),
(3, 1, '7777', '002', '2018-04-25 00:00:00', '12.00', '20.00', 'Activo'),
(4, 4, '666', '666', '2018-04-25 00:00:00', '12.00', '20.00', 'activo'),
(5, 1, 'Factura', '1111', '2018-04-27 04:04:30', '0.12', '20.33', 'Activo'),
(6, 1, 'Factura', '22222', '2018-04-27 04:10:38', '0.12', '19.33', 'Activo'),
(7, 1, 'Factura', '3333', '2018-04-27 04:16:05', '0.12', '59.00', 'Activo'),
(8, 1, 'Factura', '11111', '2018-04-27 05:07:36', '0.12', '20.33', 'Activo'),
(9, 1, 'Factura', '11111112', '2018-04-27 05:14:42', '0.12', '20.33', 'Activo'),
(10, 1, 'Factura', '1234567890', '2018-05-03 03:48:14', '0.12', '20.33', 'Activo'),
(11, 1, 'Factura', '111', '2018-05-03 05:31:22', '0.12', '21.33', 'Activo'),
(12, 1, 'Factura', '1111', '2018-05-04 05:32:38', '0.12', '13.00', 'Activo'),
(13, 1, 'Factura', '11111', '2018-05-07 04:26:48', '0.12', '52.00', 'Activo'),
(14, 1, 'Factura', '2222222', '2018-05-07 04:27:15', '0.12', '25.00', 'Activo'),
(15, 1, 'Factura', '11111', '2018-05-08 05:36:35', '0.12', '13.00', 'Cancelada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`);

--
-- Indices de la tabla `caracteristicas_servicio`
--
ALTER TABLE `caracteristicas_servicio`
  ADD PRIMARY KEY (`idcaracteristicas`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_idx` (`idingreso`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `detalle_proforma`
--
ALTER TABLE `detalle_proforma`
  ADD PRIMARY KEY (`iddetalle_proforma`),
  ADD KEY `fk_detalle_proforma_idx` (`idproforma`),
  ADD KEY `fk_detalle_proforma_articulo_idx` (`idarticulo`);

--
-- Indices de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  ADD PRIMARY KEY (`iddetalle_servicio`),
  ADD KEY `fk_detalle_servicio_caracteristicas_idx` (`idcaracteristicas`),
  ADD KEY `fk_detalle_servicio_servicio_idx` (`idservicio`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`),
  ADD KEY `fk_detalle_venta_idx` (`idventa`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`idproforma`),
  ADD KEY `fk_proforma_cliente_idx` (`idcliente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_cliente_idx` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `caracteristicas_servicio`
--
ALTER TABLE `caracteristicas_servicio`
  MODIFY `idcaracteristicas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detalle_proforma`
--
ALTER TABLE `detalle_proforma`
  MODIFY `iddetalle_proforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
  MODIFY `iddetalle_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `idproforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `fk_detalle_ingreso` FOREIGN KEY (`idingreso`) REFERENCES `ingreso` (`idingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_ingreso_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_proforma`
--
ALTER TABLE `detalle_proforma`
  ADD CONSTRAINT `detalle_proforma_ibfk_1` FOREIGN KEY (`idproforma`) REFERENCES `proforma` (`idproforma`),
  ADD CONSTRAINT `detalle_proforma_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detalle_venta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_venta_articulo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `fk_ingreso_persona` FOREIGN KEY (`idproveedor`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD CONSTRAINT `proforma_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`idcliente`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
