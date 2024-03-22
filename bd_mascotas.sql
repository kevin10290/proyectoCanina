-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:4400
-- Tiempo de generación: 21-03-2024 a las 17:25:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'limpieza'),
(2, 'herramienta'),
(3, 'juguete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `resgistroMascota_idMascota` int(11) NOT NULL,
  `registroCliente_idClientes` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` time DEFAULT NULL,
  `estadoServicio` varchar(50) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `resgistroMascota_idMascota`, `registroCliente_idClientes`, `fechaCita`, `horaCita`, `estadoServicio`) VALUES
(1, 1, 2, '2024-02-29', '11:07:49', 'pendiente'),
(3, 3, 3, '2024-03-07', '10:35:00', 'pendiente'),
(6, 6, 6, '2024-03-12', '10:54:00', 'pendiente'),
(7, 7, 6, '2024-03-09', '10:55:00', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprodcuto`
--

CREATE TABLE `detalleprodcuto` (
  `iddetalleproducto` int(11) NOT NULL,
  `inventarioProductos_idinventarioProducto` int(11) NOT NULL,
  `idfactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalleprodcuto`
--

INSERT INTO `detalleprodcuto` (`iddetalleproducto`, `inventarioProductos_idinventarioProducto`, `idfactura`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 4),
(6, 1, 4),
(7, 1, 4),
(8, 1, 4),
(9, 1, 4),
(10, 1, 4),
(11, 1, 4),
(12, 1, 4),
(13, 1, 4),
(14, 1, 4),
(15, 1, 4),
(16, 1, 4),
(17, 1, 4),
(18, 1, 5),
(19, 1, 5),
(20, 1, 5),
(21, 1, 5),
(22, 1, 5),
(23, 1, 5),
(24, 1, 5),
(25, 1, 5),
(26, 1, 5),
(27, 1, 5),
(28, 1, 6),
(29, 1, 6),
(30, 1, 6),
(31, 1, 6),
(32, 1, 6),
(33, 1, 6),
(34, 1, 6),
(35, 1, 6),
(36, 1, 6),
(37, 1, 6),
(38, 1, 7),
(39, 1, 7),
(40, 1, 7),
(41, 1, 7),
(42, 1, 7),
(43, 1, 7),
(44, 1, 7),
(45, 1, 7),
(46, 1, 7),
(47, 1, 7),
(48, 1, 8),
(49, 1, 8),
(50, 1, 8),
(51, 1, 8),
(52, 1, 8),
(53, 1, 8),
(54, 1, 8),
(55, 1, 8),
(56, 1, 8),
(57, 1, 8),
(58, 1, 9),
(59, 1, 9),
(60, 1, 9),
(61, 1, 9),
(62, 1, 9),
(63, 1, 9),
(64, 1, 9),
(65, 1, 9),
(66, 1, 9),
(67, 1, 9),
(68, 1, 10),
(69, 1, 10),
(70, 1, 10),
(71, 1, 10),
(72, 1, 10),
(73, 1, 10),
(74, 1, 10),
(75, 1, 10),
(76, 1, 10),
(77, 1, 10),
(78, 1, 11),
(79, 1, 11),
(80, 1, 12),
(81, 1, 12),
(82, 1, 12),
(83, 1, 12),
(84, 1, 12),
(85, 1, 12),
(86, 1, 12),
(87, 1, 12),
(88, 1, 12),
(89, 1, 12),
(90, 1, 12),
(91, 1, 12),
(92, 1, 12),
(93, 1, 12),
(94, 1, 12),
(95, 1, 12),
(96, 1, 12),
(97, 1, 12),
(98, 1, 12),
(99, 1, 12),
(100, 1, 12),
(101, 1, 12),
(102, 1, 12),
(103, 1, 12),
(104, 1, 12),
(105, 1, 12),
(106, 1, 12),
(107, 1, 12),
(108, 1, 12),
(109, 1, 12),
(110, 1, 12),
(111, 1, 12),
(112, 1, 12),
(113, 1, 12),
(114, 1, 12),
(115, 1, 12),
(116, 1, 12),
(117, 1, 12),
(118, 1, 12),
(119, 1, 12),
(120, 1, 12),
(121, 1, 12),
(122, 1, 12),
(123, 1, 12),
(124, 1, 12),
(125, 1, 12),
(126, 1, 12),
(127, 1, 12),
(128, 1, 12),
(129, 1, 12),
(130, 1, 12),
(131, 1, 12),
(132, 1, 12),
(133, 1, 12),
(134, 1, 12),
(135, 1, 12),
(136, 1, 12),
(137, 1, 12),
(138, 1, 12),
(139, 1, 12),
(140, 1, 12),
(141, 1, 12),
(142, 1, 12),
(143, 1, 12),
(144, 1, 12),
(145, 1, 12),
(146, 1, 12),
(147, 1, 12),
(148, 1, 12),
(149, 1, 12),
(150, 1, 12),
(151, 1, 12),
(152, 1, 12),
(153, 1, 12),
(154, 1, 12),
(155, 1, 12),
(156, 1, 12),
(157, 1, 12),
(158, 1, 12),
(159, 1, 12),
(160, 1, 12),
(161, 1, 12),
(162, 1, 12),
(163, 1, 12),
(164, 1, 12),
(165, 1, 12),
(166, 1, 12),
(167, 1, 12),
(168, 1, 12),
(169, 1, 12),
(170, 1, 12),
(171, 1, 12),
(172, 1, 12),
(173, 1, 12),
(174, 1, 12),
(175, 1, 12),
(176, 1, 12),
(177, 1, 12),
(178, 1, 12),
(179, 1, 12),
(180, 2, 13),
(181, 2, 13),
(182, 2, 14),
(183, 2, 15),
(184, 2, 16),
(185, 1, 16),
(186, 5, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleservicio`
--

CREATE TABLE `detalleservicio` (
  `idservicioCita` int(11) NOT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  `cita_idCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalleservicio`
--

INSERT INTO `detalleservicio` (`idservicioCita`, `servicio_idservicio`, `cita_idCita`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(100) NOT NULL,
  `apellidoEmpleado` varchar(100) NOT NULL,
  `cedulaEmpelado` varchar(100) NOT NULL,
  `emailEmpleado` varchar(200) NOT NULL,
  `passEmpleado` varchar(1000) NOT NULL,
  `rol_idRol` int(11) NOT NULL,
  `estadoEmpleado` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `cedulaEmpelado`, `emailEmpleado`, `passEmpleado`, `rol_idRol`, `estadoEmpleado`) VALUES
(1, 'gsdgserg', 'dfsgsdfger', '32453245', 'asdas@gmail.com', 'fghjkhk', 1, 1),
(2, 'fererhtbvnvnvbn', 'cvxcvx', '313123', 'dfggdf34@gmail.com', 'fs32f32f', 1, 1),
(3, 'fwefsdfds', 'yryrty', '456456', 'was@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1),
(5, 'asfa', 'asd', '213', 'as@gmail.com', '123', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproducto`
--

CREATE TABLE `facturaproducto` (
  `idfacturaProducto` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `modoPago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facturaproducto`
--

INSERT INTO `facturaproducto` (`idfacturaProducto`, `total`, `fechaVenta`, `idEmpleado`, `idCliente`, `modoPago`) VALUES
(1, 23342, '2024-02-29', 1, 1, 'Débito'),
(2, 34343, '2024-02-06', 2, 1, 'Efectivo'),
(3, 119, '2024-03-12', NULL, 3, 'Crédito'),
(4, 1666, '2024-03-12', NULL, 3, 'Crédito'),
(5, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(6, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(7, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(8, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(9, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(10, 1190, '2024-03-12', NULL, 3, 'Crédito'),
(11, 238, '2024-03-12', NULL, 3, 'Crédito'),
(12, 11900, '2024-03-12', NULL, 3, 'Crédito'),
(13, 238, '2024-03-21', NULL, 6, 'Crédito'),
(14, 119, '2024-03-21', NULL, 6, 'Crédito'),
(15, 119, '2024-03-21', NULL, 6, 'Crédito'),
(16, 527, '2024-03-21', NULL, 6, 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaservicio`
--

CREATE TABLE `facturaservicio` (
  `idServicio` int(11) NOT NULL,
  `cita_idCita` int(11) NOT NULL,
  `totalServicio` float NOT NULL,
  `modoPago` varchar(45) NOT NULL,
  `notaFactura` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facturaservicio`
--

INSERT INTO `facturaservicio` (`idServicio`, `cita_idCita`, `totalServicio`, `modoPago`, `notaFactura`) VALUES
(1, 1, 42342, 'Efectivo', 'fsdfsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioproductos`
--

CREATE TABLE `inventarioproductos` (
  `idinventarioProducto` int(11) NOT NULL,
  `nombreProducto` varchar(100) DEFAULT NULL,
  `precioProducto` int(11) DEFAULT NULL,
  `strockProducto` int(11) DEFAULT NULL,
  `categoriaProducto` int(11) NOT NULL DEFAULT 1,
  `dirProducto` varchar(8000) NOT NULL DEFAULT './Controlador//images/nod.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inventarioproductos`
--

INSERT INTO `inventarioproductos` (`idinventarioProducto`, `nombreProducto`, `precioProducto`, `strockProducto`, `categoriaProducto`, `dirProducto`) VALUES
(1, 'Jabon', 100, 11, 1, 'https://ahousewifewrites.com/wp-content/uploads/2018/07/blogsoap-435x435.jpg'),
(2, 'Cepillo', 100, 7, 2, '../../Controlador//images/nod.png'),
(3, 'asd', 432, 23, 1, 'https://th.bing.com/th/id/OIP.4uQ5LGiubfSR11i_RImFyQHaE7?rs=1&pid=ImgDetMain'),
(4, 'gfssf', 322, 212, 2, '../../Controlador//images/tel.jpg'),
(5, 'dasfsdgdsd', 243, 11, 3, '../../Controlador//images/decorac.jpg'),
(6, 'dfgdg', 323, 12, 3, 'https://th.bing.com/th/id/OIP.2UMhyddroYEM0uSIO1suIAHaF6?rs=1&pid=ImgDetMain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocliente`
--

CREATE TABLE `registrocliente` (
  `idClientes` int(11) NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `apellidoCliente` varchar(100) DEFAULT NULL,
  `telefonoCliente` varchar(20) DEFAULT NULL,
  `emailCliente` varchar(200) DEFAULT NULL,
  `cedulaCliente` varchar(45) DEFAULT NULL,
  `passCliente` varchar(1000) DEFAULT NULL,
  `estadoCliente` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `registrocliente`
--

INSERT INTO `registrocliente` (`idClientes`, `nombreCliente`, `apellidoCliente`, `telefonoCliente`, `emailCliente`, `cedulaCliente`, `passCliente`, `estadoCliente`) VALUES
(1, '4te5yr5uy', 'r5ye5etye', '3453453', 'ead@gmail.com', '14234', '2323423', 0),
(2, 'fwerfer', 'htrytutyu', '2555445', 'qwerbe@gmail.com', '44436654', 'fwefw424234', 0),
(3, 'Javier', 'asdasd', '142312', 'ffdsfs@gmail.com', '24124124', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa', 1),
(4, 'Javier', 'asdasd', '142312', 'hola@gmail.com', '24124124', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa', 1),
(6, 'Larz', 'asdasd', '123', 'wa@gmail.com', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resgistromascota`
--

CREATE TABLE `resgistromascota` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` varchar(45) NOT NULL,
  `edadMascota` varchar(45) DEFAULT NULL,
  `razaMascota` varchar(45) DEFAULT NULL,
  `tipoMascota` varchar(45) NOT NULL,
  `IdCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `resgistromascota`
--

INSERT INTO `resgistromascota` (`idMascota`, `nombreMascota`, `edadMascota`, `razaMascota`, `tipoMascota`, `IdCliente`) VALUES
(1, 'fdgdfg', '5', 'grtgtrg', 'tertert', 2),
(2, 'dsd', '23', 'dsad', 'dasd', 3),
(3, 'dsdds', '23', 'dsad', 'dasd', 3),
(4, 'dsdds', '23', 'dsadda', 'dasddsd', 3),
(5, 'dsddsdsd', '23', 'dsadda', 'dasddsd', 3),
(6, 'asdaf', '23', 'sadasf', 'sadasd', 6),
(7, 'dasd', '433', 'sada', 'fgsdgfd', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'ROOT'),
(2, 'admin'),
(3, 'cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombreServicio` varchar(45) DEFAULT NULL,
  `precioServicio` float DEFAULT NULL,
  `descripcionServicio` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `nombreServicio`, `precioServicio`, `descripcionServicio`) VALUES
(1, 'dasdasd', 232, 'fsdfsdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_cita_resgistroMascota1_idx` (`resgistroMascota_idMascota`),
  ADD KEY `fk_cita_registroCliente1_idx` (`registroCliente_idClientes`);

--
-- Indices de la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  ADD PRIMARY KEY (`iddetalleproducto`),
  ADD KEY `inventarioProductos_idinventarioProducto` (`inventarioProductos_idinventarioProducto`),
  ADD KEY `idfactura` (`idfactura`);

--
-- Indices de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD PRIMARY KEY (`idservicioCita`),
  ADD KEY `cita_idCita` (`cita_idCita`),
  ADD KEY `servicio_idservicio` (`servicio_idservicio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_empleado_rol1_idx` (`rol_idRol`);

--
-- Indices de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD PRIMARY KEY (`idfacturaProducto`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `cita_idCita` (`cita_idCita`);

--
-- Indices de la tabla `inventarioproductos`
--
ALTER TABLE `inventarioproductos`
  ADD PRIMARY KEY (`idinventarioProducto`),
  ADD KEY `categoriaProdcuto` (`categoriaProducto`);

--
-- Indices de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  MODIFY `iddetalleproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `idservicioCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  MODIFY `idfacturaProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventarioproductos`
--
ALTER TABLE `inventarioproductos`
  MODIFY `idinventarioProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_registroCliente1` FOREIGN KEY (`registroCliente_idClientes`) REFERENCES `registrocliente` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cita_resgistroMascota1` FOREIGN KEY (`resgistroMascota_idMascota`) REFERENCES `resgistromascota` (`idMascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  ADD CONSTRAINT `detalleprodcuto_ibfk_1` FOREIGN KEY (`inventarioProductos_idinventarioProducto`) REFERENCES `inventarioproductos` (`idinventarioProducto`),
  ADD CONSTRAINT `detalleprodcuto_ibfk_2` FOREIGN KEY (`idfactura`) REFERENCES `facturaproducto` (`idfacturaProducto`);

--
-- Filtros para la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD CONSTRAINT `detalleservicio_ibfk_1` FOREIGN KEY (`cita_idCita`) REFERENCES `cita` (`idCita`),
  ADD CONSTRAINT `detalleservicio_ibfk_2` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_rol1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD CONSTRAINT `facturaproducto_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `registrocliente` (`idClientes`),
  ADD CONSTRAINT `facturaproducto_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  ADD CONSTRAINT `facturaservicio_ibfk_1` FOREIGN KEY (`cita_idCita`) REFERENCES `cita` (`idCita`);

--
-- Filtros para la tabla `inventarioproductos`
--
ALTER TABLE `inventarioproductos`
  ADD CONSTRAINT `inventarioproductos_ibfk_1` FOREIGN KEY (`categoriaProducto`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  ADD CONSTRAINT `resgistromascota_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `registrocliente` (`idClientes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
