-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-01-2017 a las 16:50:23
-- Versión del servidor: 5.6.27-log
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE IF NOT EXISTS `asiento` (
  `id` int(11) NOT NULL,
  `nro_asiento` int(11) DEFAULT NULL,
  `glosa` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cambio_tipo` decimal(6,2) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_gestion` int(11) DEFAULT NULL,
  `id_moneda` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`id`, `nro_asiento`, `glosa`, `fecha`, `cambio_tipo`, `estado`, `id_categoria`, `id_gestion`, `id_moneda`, `id_usuario`) VALUES
(31, 1, 'apertura de gestion 2-2016', '2016-03-04', '6.92', 1, 1, 2, 1, 3),
(32, 2, 'Registro por pago de varios gastos de organización s/g. factura nro 120', '2016-03-05', '6.92', 1, 2, 2, 1, 3),
(33, 3, 'Registro por compra de mercaderia s/ factura nro 1310', '2016-03-07', '6.92', 1, 2, 2, 1, 3),
(34, 4, 'Registro por venta de mercadería s/g Factura Nro. 1001', '2016-03-08', '6.92', 1, 2, 2, 1, 3),
(35, 5, 'Registro por apertura de cuenta Corriente Bancaria', '2016-03-09', '6.92', 1, 2, 2, 1, 3),
(36, 6, 'Registro por cobro L/C al Sr. A. Paz', '2016-03-12', '6.92', 1, 2, 2, 1, 3),
(37, 7, 'Registro por adquisicion de una poliza de seuros S/g factura Nro. 319', '2016-03-15', '6.92', 1, 2, 2, 1, 3),
(38, 8, 'Registro or compra de muebles S/g Fractura Nro. 7091', '2016-03-18', '6.92', 1, 2, 2, 1, 3),
(39, 9, 'Registro de la apertura del fondo fijo ccon cheque Nro XX', '2016-03-20', '6.92', 1, 2, 2, 1, 3),
(40, 10, 'Registro por pago de luz y agua S/g Facturas', '2016-12-25', '6.92', 1, 2, 2, 1, 3),
(41, 11, 'Registro por ventas de mercaderia S/g Factura Nro. 1002', '2016-12-25', '6.92', 1, 2, 2, 1, 3),
(42, 12, 'Registro por devolucion de mercaderias', '2016-12-25', '6.92', 1, 2, 2, 1, 3),
(43, 13, 'Registro, Nota de Cargo Bancaria por chequeras', '2016-12-25', '6.92', 1, 2, 2, 1, 3),
(44, 14, 'Registro por pago de sueldos a nuestros empleados por el mes de marzo', '2016-12-25', '6.92', 1, 2, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `deleted_at`) VALUES
(1, 'Asiento de Apertura de Gestion', '0000-00-00'),
(2, 'Asiento Diario', '0000-00-00'),
(3, 'Ajuste de Cuentas', '0000-00-00'),
(4, 'Asiento de cierre de gestion', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `codigo` varchar(25) NOT NULL,
  `id_padre` int(11) NOT NULL,
  `hijo` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `utilizable` tinyint(4) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `id_empresa`, `codigo`, `id_padre`, `hijo`, `nombre`, `estado`, `utilizable`, `deleted_at`) VALUES
(15, 1, '1.', 0, 1, 'ACTIVO', 1, 0, NULL),
(16, 1, '2.', 0, 1, 'PASIVO', 1, 0, NULL),
(17, 1, '1.1.', 15, 1, 'Corriente o Circulante', 1, 0, NULL),
(18, 1, '1.1.1. ', 17, 1, 'Disponible', 1, 0, NULL),
(19, 1, '1.1.1.1.', 18, 0, 'Caja', 1, 1, NULL),
(20, 1, '1.1.1.2. ', 18, 0, 'Caja Moneda extranjera', 1, 1, NULL),
(21, 1, '2.1', 16, 1, 'Corriente o Circulante', 1, 1, NULL),
(22, 1, '2.1.1.', 21, 1, 'Exigible a corto plazo', 1, 0, NULL),
(23, 2, '1', 0, 1, 'Activo', 1, 0, NULL),
(24, 1, '1.1.1.3.', 18, 0, 'Caja chica', 1, 1, NULL),
(25, 1, '1.1.1.4.', 18, 0, 'Bancos', 1, 1, NULL),
(26, 1, '1.1.1.5.', 18, 0, 'Caja de Ahorro', 1, 1, NULL),
(27, 1, '1.1.2.', 17, 1, 'Exigible', 1, 1, NULL),
(28, 1, '1.1.2.1.', 27, 0, 'Cuentas por cobrar', 1, 1, NULL),
(29, 1, '1.1.2.2.', 27, 0, 'Documentos por cobrar', 1, 1, NULL),
(30, 1, '1.1.2.3.', 27, 0, 'Alquileres por cobrar', 1, 1, NULL),
(31, 1, '1.1.2.4.', 27, 0, 'IVA-Credito Fiscal', 1, 1, NULL),
(32, 1, '1.1.2.5.', 27, 0, 'Intereses por cobrar', 1, 1, NULL),
(33, 1, '1.1.2.6.', 27, 0, 'Comision por cobrar', 1, 1, NULL),
(34, 1, '1.2.', 15, 1, 'ACTIVO NO CORRIENTE', 1, 0, NULL),
(35, 1, '1.1.3. ', 17, 1, 'Realizable', 1, 0, NULL),
(36, 1, '1.1.3.1.', 35, 0, 'Inventario de mercaderías', 1, 1, NULL),
(37, 1, '1.2.1.', 34, 1, 'Bienes muebles e inmueble', 1, 0, NULL),
(38, 1, '1.2.1.1.', 37, 0, 'Terrenos', 1, 1, NULL),
(39, 1, '1.2.1.2.', 37, 0, 'Edificio', 1, 1, NULL),
(40, 1, '1.2.1.3.', 37, 0, 'Muebles y enseres', 1, 1, NULL),
(41, 1, '1.2.1.4.', 37, 0, 'Equipo de computacion', 1, 1, NULL),
(42, 1, '1.2.1.5.', 37, 0, 'Vehiculos', 1, 1, NULL),
(43, 1, '1.2.2.', 34, 1, 'Otros Activos', 1, 0, NULL),
(44, 1, '1.2.2.1.', 43, 1, 'Gastos Diferidos', 1, 0, NULL),
(45, 1, '1.2.2.1.1.', 44, 0, 'Gastos de Organizacion', 1, 1, NULL),
(46, 1, '1.2.2.1.2.', 44, 0, 'Seguros pagados por anticipado', 1, 1, NULL),
(47, 1, '1.2.2.1.3.', 44, 0, 'Alquiler pagados por anticipado', 1, 1, NULL),
(48, 1, '1.2.2.1.4.', 44, 0, 'Comisiones pagados por anticipado', 1, 1, NULL),
(49, 1, '1.2.2.1.5.', 44, 0, 'Intereses pagados por ant', 1, 1, NULL),
(50, 1, '2.1.1.1.', 22, 0, 'cuentas por pagar', 1, 1, NULL),
(51, 1, '2.1.1.2.', 22, 0, 'Documentos  por pagar', 1, 1, NULL),
(52, 1, '2.1.1.3.', 22, 0, 'IVA -Debito fiscal', 1, 1, NULL),
(53, 1, '2.1.1.4.', 22, 0, 'Impuesto a la transacciones por pagar', 1, 1, NULL),
(54, 1, '2.1.1.5.', 22, 0, 'Sueldos y salarios por pa', 1, 1, NULL),
(55, 1, '2.1.1.6.', 22, 0, 'Alquileres por pagar', 1, 1, NULL),
(56, 1, '2.1.1.7.', 22, 0, 'Comisiones por pagar', 1, 1, NULL),
(57, 1, '2.1.1.8.', 22, 0, 'intereses por pagar', 1, 1, NULL),
(58, 1, '2.1.1.9.', 22, 0, 'Facturas por pagar', 1, 1, NULL),
(59, 1, '2.1.1.10.', 22, 0, 'Retenciones y aportes por pagar', 1, 1, NULL),
(60, 1, '2.1.1.11.', 22, 0, 'Anticipo de clientes ', 1, 1, NULL),
(61, 1, '2.1.1.12.', 22, 0, 'Imp. a las utilidades de ', 1, 1, NULL),
(62, 1, '2.1.1.13.', 22, 0, 'Provision para aguinaldos', 1, 1, NULL),
(63, 1, '2.2.', 16, 1, 'No Corriente', 1, 0, NULL),
(64, 1, '2.2.1.', 63, 1, 'Exigible a largo plazo', 1, 0, NULL),
(65, 1, '2.2.1.1.', 64, 0, 'Préstamo bancario por pagar', 1, 1, NULL),
(66, 1, '2.2.1.2.', 64, 0, 'Hipotecas por pagar', 1, 1, NULL),
(67, 1, '2.2.1.3.', 64, 0, 'Previsión para indetermin', 1, 1, NULL),
(68, 1, '2.2.2.', 63, 1, 'Otro Pasivos', 1, 0, NULL),
(69, 1, '2.2.2.1.', 68, 0, 'Alquileres cobrados por a', 1, 1, NULL),
(70, 1, '2.2.2.2.', 68, 0, 'Comisiones cobrados por adelantado', 1, 1, NULL),
(71, 1, '2.2.2.3.', 68, 0, 'Intereses cobrados por adelantado', 1, 1, NULL),
(72, 1, '3.', 0, 1, 'Patrimonio', 1, 0, NULL),
(73, 1, '3.1.', 72, 1, 'Capital contable', 1, 0, NULL),
(74, 1, '3.1.1.', 73, 0, 'Capital social', 1, 1, NULL),
(75, 1, '3.1.2.', 73, 0, 'Reserva legal', 1, 1, NULL),
(76, 1, '3.1.3.', 73, 0, 'Ajuste global al patrimon', 1, 1, NULL),
(77, 1, '3.1.4.', 73, 0, 'Resultado acumulados', 1, 1, NULL),
(78, 1, '3.1.5.', 73, 0, 'Perdidas a la gestión ', 1, 1, NULL),
(79, 1, '3.1.6.', 73, 0, 'Utilidad de la  gestión ', 1, 1, NULL),
(80, 1, '4.', 0, 1, 'GASTOS', 1, 0, NULL),
(81, 1, '4.1.', 80, 1, 'Costo delo vendido', 1, 0, NULL),
(82, 1, '4.1.1.', 81, 0, 'Compras', 1, 1, NULL),
(83, 1, '4.1.2.', 81, 0, 'Recargo en compras', 1, 1, NULL),
(84, 1, '4.2.', 80, 1, 'Gastos de operacion', 1, 0, NULL),
(85, 1, '4.2.1.', 84, 0, 'Gastos generales', 1, 1, NULL),
(86, 1, '4.2.2.', 84, 0, 'Sueldos y Salarios', 1, 1, NULL),
(87, 1, '4.2.3.', 84, 0, 'Seguros', 1, 1, NULL),
(88, 1, '4.2.4.', 84, 0, 'Alquileres', 1, 1, NULL),
(89, 1, '5.', 0, 1, 'INGRESOS', 1, 0, NULL),
(90, 1, '5.1.', 89, 1, 'Ingesos ordinarios', 1, 0, NULL),
(91, 1, '5.1.1.', 90, 0, 'Ventas', 1, 1, NULL),
(92, 1, '5.1.2.', 90, 0, 'Recagos en ventas', 1, 1, NULL),
(93, 1, '4.2.5.', 84, 0, 'Intereses', 1, 1, NULL),
(94, 1, '4.2.6.', 84, 0, 'Comisiones', 1, 1, NULL),
(95, 1, '4.2.7.', 84, 0, 'Intereses y gastos bancar', 1, 1, NULL),
(96, 1, '4.2.8.', 84, 0, 'Suministro de oficina con', 1, 1, NULL),
(97, 1, '4.2.9.', 84, 0, 'Castigo cuentas incobrabl', 1, 1, NULL),
(98, 1, '4.2.10.', 84, 0, 'Depreciación edificios', 1, 1, NULL),
(99, 1, '4.2.11.', 84, 0, 'Depreciación Muebles y en', 1, 1, NULL),
(100, 1, '4.2.12.', 84, 0, 'Depreciacion Equipo de co', 1, 1, NULL),
(101, 1, '4.2.13.', 84, 0, 'Depreciación Vehiculos', 1, 1, NULL),
(102, 1, '4.2.14.', 84, 0, 'Depreciacion Herramientas', 1, 1, NULL),
(103, 1, '4.2.15.', 84, 0, 'Impuesto a las transaccion', 1, 1, NULL),
(104, 1, '4.1.3.', 81, 0, 'Fletes en compras', 1, 1, NULL),
(105, 1, '4.1.4.', 81, 0, 'Devolución en ventas', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depreciacion`
--

CREATE TABLE IF NOT EXISTS `depreciacion` (
  `id` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `vida_util` int(11) NOT NULL,
  `depreciacion_anual` decimal(6,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `depreciacion`
--

INSERT INTO `depreciacion` (`id`, `id_cuenta`, `vida_util`, `depreciacion_anual`, `deleted_at`) VALUES
(1, 15, 5, '2.00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `id` int(11) NOT NULL,
  `id_cuenta` int(11) DEFAULT NULL,
  `id_asiento` int(11) DEFAULT NULL,
  `debe` decimal(10,2) DEFAULT NULL,
  `haber` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id`, `id_cuenta`, `id_asiento`, `debe`, `haber`) VALUES
(37, 19, 31, '15000.00', '0.00'),
(38, 29, 31, '1000.00', '0.00'),
(39, 36, 31, '5500.00', '0.00'),
(40, 38, 31, '24000.00', '0.00'),
(41, 39, 31, '40000.00', '0.00'),
(42, 40, 31, '2000.00', '0.00'),
(43, 51, 31, '0.00', '12000.00'),
(44, 74, 31, '0.00', '75500.00'),
(45, 45, 32, '435.00', '0.00'),
(46, 31, 32, '65.00', '0.00'),
(47, 19, 32, '0.00', '500.00'),
(48, 82, 33, '870.00', '0.00'),
(49, 31, 33, '130.00', '0.00'),
(50, 19, 33, '0.00', '600.00'),
(51, 51, 33, '0.00', '400.00'),
(52, 19, 34, '1400.00', '0.00'),
(53, 28, 34, '600.00', '0.00'),
(54, 103, 34, '60.00', '0.00'),
(55, 91, 34, '0.00', '1740.00'),
(56, 52, 34, '0.00', '260.00'),
(57, 53, 34, '0.00', '60.00'),
(58, 25, 35, '1400.00', '0.00'),
(59, 19, 35, '0.00', '1400.00'),
(60, 19, 36, '1000.00', '0.00'),
(61, 29, 36, '0.00', '1000.00'),
(62, 87, 37, '783.00', '0.00'),
(63, 31, 37, '117.00', '0.00'),
(64, 19, 37, '0.00', '900.00'),
(65, 40, 38, '1392.00', '0.00'),
(66, 31, 38, '208.00', '0.00'),
(67, 25, 38, '0.00', '1120.00'),
(68, 50, 38, '0.00', '480.00'),
(69, 24, 39, '150.00', '0.00'),
(70, 25, 39, '0.00', '150.00'),
(71, 85, 40, '174.00', '0.00'),
(72, 31, 40, '26.00', '0.00'),
(73, 19, 40, '0.00', '200.00'),
(74, 19, 41, '580.00', '0.00'),
(75, 29, 41, '1450.00', '0.00'),
(76, 28, 41, '870.00', '0.00'),
(77, 103, 41, '87.00', '0.00'),
(78, 91, 41, '0.00', '2523.00'),
(79, 52, 41, '0.00', '377.00'),
(80, 53, 41, '0.00', '87.00'),
(81, 105, 42, '174.00', '0.00'),
(82, 31, 42, '26.00', '0.00'),
(83, 53, 42, '6.00', '0.00'),
(84, 28, 42, '0.00', '200.00'),
(85, 103, 42, '0.00', '6.00'),
(86, 95, 43, '87.00', '0.00'),
(87, 31, 43, '13.00', '0.00'),
(88, 25, 43, '0.00', '100.00'),
(89, 86, 44, '2000.00', '0.00'),
(90, 19, 44, '0.00', '1750.00'),
(91, 59, 44, '0.00', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `logo` longtext,
  `direccion` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `logo`, `direccion`, `telefono`, `correo`, `deleted_at`) VALUES
(1, 'gray hat', NULL, 'barrio santa rosita', 7269111, 'grayhatcorp@hotmail.com', '0000-00-00'),
(2, 'coca cola', NULL, 'barrio la cuchilla', 72696811, 'titoelpropio77@hotmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE IF NOT EXISTS `gestion` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `nombre_gestion` varchar(25) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`id`, `fecha_inicio`, `fecha_fin`, `estado`, `nombre_gestion`, `deleted_at`) VALUES
(2, '2016-11-22', '0000-00-00', 1, '2-2016', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE IF NOT EXISTS `moneda` (
  `id` int(11) NOT NULL,
  `tipo_cambio` decimal(6,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `tipo_cambio`, `fecha`, `deleted_at`) VALUES
(1, '6.92', '2016-12-22 18:35:11', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ufv`
--

CREATE TABLE IF NOT EXISTS `ufv` (
  `id` int(11) NOT NULL,
  `valor` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `privilegio` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `privilegio`, `estado`, `id_empresa`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'MODESTO SALDAÑA MICHALEC', 'admin', '$2y$10$ULs/Pf6qDLzm2z7xmQkNJ.XMGdA4Wbsf3/KvhAr0yGKcKke.cC2aa', 1, 1, 1, 'EQxIcJqWYP9BVHyhOMT94S3DIJCywCsLz3o8NJRu3KxQRbDadT0TV4o9KB2v', '2017-01-01 04:28:33', '0000-00-00 00:00:00', NULL),
(6, 'LLANKE CUICO', 'admin3', '$2y$10$M76O7EsDXy9GXZxrXlfBj.r.1ggBa8ES8VR//T97QKeB9KeuCVYQi', 2, 1, 2, 'HkRsfQQrmWtUrgB5TGkNiOCAJUK9tHWwiQOcEKxSrkmsuKfvwC8czDTeRTQX', '2016-12-31 16:26:07', '0000-00-00 00:00:00', NULL),
(10, 'rocha', 'admin1', '$2y$10$KNRZOk2J3K64aO3Znr9XweLq/u0txdAhfYiLpQOhrD1P9ciUv2PnW', 1, 1, 1, NULL, '2016-12-29 14:49:01', '0000-00-00 00:00:00', '2016-12-29'),
(11, 'lemuel', 'lemuel', '21232f297a57a5a743894a0e4a801fc3', 3, 1, 1, NULL, '2016-12-31 13:32:01', '0000-00-00 00:00:00', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_gestion` (`id_gestion`),
  ADD KEY `id_moneda` (`id_moneda`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cuenta` (`id_cuenta`),
  ADD KEY `id_asiento` (`id_asiento`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ufv`
--
ALTER TABLE `ufv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ufv`
--
ALTER TABLE `ufv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `asiento_ibfk_2` FOREIGN KEY (`id_gestion`) REFERENCES `gestion` (`id`),
  ADD CONSTRAINT `asiento_ibfk_3` FOREIGN KEY (`id_moneda`) REFERENCES `moneda` (`id`),
  ADD CONSTRAINT `asiento_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `depreciacion`
--
ALTER TABLE `depreciacion`
  ADD CONSTRAINT `depreciacion_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_asiento`) REFERENCES `asiento` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
