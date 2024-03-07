-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:4400
-- Tiempo de generación: 07-03-2024 a las 20:33:27
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
  `horaCita` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `resgistroMascota_idMascota`, `registroCliente_idClientes`, `fechaCita`, `horaCita`) VALUES
(1, 1, 1, '2024-02-01', '09:31:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprodcuto`
--

CREATE TABLE `detalleprodcuto` (
  `idproductoCita` int(11) NOT NULL,
  `inventarioProductos_idinventarioProducto` int(11) NOT NULL,
  `idfacturaproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalleprodcuto`
--

INSERT INTO `detalleprodcuto` (`idproductoCita`, `inventarioProductos_idinventarioProducto`, `idfacturaproducto`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 2, 6),
(4, 3, 6),
(5, 4, 6),
(6, 4, 7),
(7, 4, 8),
(8, 4, 9),
(9, 4, 10),
(10, 4, 11),
(11, 4, 12),
(12, 4, 13),
(13, 4, 14),
(14, 3, 15),
(15, 3, 15),
(16, 3, 15),
(17, 3, 15),
(18, 3, 15),
(19, 2, 15),
(20, 1, 15),
(21, 3, 15),
(22, 3, 15);

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
  `rolEmpleado` int(11) NOT NULL,
  `estadoEmpleado` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `cedulaEmpelado`, `emailEmpleado`, `passEmpleado`, `rolEmpleado`, `estadoEmpleado`) VALUES
(1, 'ea', 'asdada', '13123213', 'wawa@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproducto`
--

CREATE TABLE `facturaproducto` (
  `idfacturaProducto` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `Id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facturaproducto`
--

INSERT INTO `facturaproducto` (`idfacturaProducto`, `total`, `fechaVenta`, `Id_cliente`) VALUES
(1, 123123, '2024-02-13', 3),
(2, 100, '2024-01-01', 3),
(3, 5950, '2024-03-07', 3),
(4, 5950, '2024-03-07', 3),
(5, 5950, '2024-03-07', 3),
(6, 53550, '2024-03-07', 3),
(7, 5950, '2024-03-07', 3),
(8, 5950, '2024-03-07', 3),
(9, 5950, '2024-03-07', 3),
(10, 5950, '2024-03-07', 3),
(11, 5950, '2024-03-07', 3),
(12, 5950, '2024-03-07', 3),
(13, 5950, '2024-03-07', 3),
(14, 5950, '2024-03-07', 3),
(15, 190400, '2024-03-07', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaservicio`
--

CREATE TABLE `facturaservicio` (
  `idServicio` int(11) NOT NULL,
  `cita_idCita` int(11) NOT NULL,
  `totalServicio` float NOT NULL,
  `estadoServicio` varchar(45) NOT NULL,
  `modoPago` varchar(45) NOT NULL,
  `notaFactura` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facturaservicio`
--

INSERT INTO `facturaservicio` (`idServicio`, `cita_idCita`, `totalServicio`, `estadoServicio`, `modoPago`, `notaFactura`) VALUES
(1, 1, 21900, 'pago', 'efectivo', 'si pagó');

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
(1, 'Asuntol', 11000, 1, 1, './Controlador//images/nod.png'),
(2, 'Pelota de tenis', 9000, 21, 3, './Controlador//images/nod.png'),
(3, 'Cortauñas canino', 20000, 14, 2, './Controlador//images/nod.png'),
(4, 'asdasd', 5000, 0, 1, './Controlador//images/nod.png');

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
(1, 'Javier', 'Serna', '12312412', 'sdasd@gmail.com', '31287956', '123', 1),
(3, 'asd', 'qwe', '123', 'wa@gmail.com', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1),
(4, 'fsdf', 'sdgdb', '123', 'was@gmail.com', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

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
(1, 'Tobi', '1', 'Piche', 'Perro', 1);

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
(1, 'Admin'),
(2, 'Cliente');

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
(1, 'peluqueria', 20000, 'lavado de pelos');

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
  ADD PRIMARY KEY (`idproductoCita`),
  ADD KEY `fk_detalleProdcuto_inventarioProductos1_idx` (`inventarioProductos_idinventarioProducto`),
  ADD KEY `fk_detalleProdcuto_registroCliente1_idx` (`idfacturaproducto`);

--
-- Indices de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD PRIMARY KEY (`idservicioCita`),
  ADD KEY `fk_servicioCita_servicio1_idx` (`servicio_idservicio`),
  ADD KEY `fk_detalleServicio_cita1_idx` (`cita_idCita`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_empleado_rol1_idx` (`rolEmpleado`);

--
-- Indices de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD PRIMARY KEY (`idfacturaProducto`),
  ADD KEY `Id_cliente` (`Id_cliente`);

--
-- Indices de la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `fk_facturaServicio_cita1_idx` (`cita_idCita`);

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
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  MODIFY `idproductoCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `idservicioCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  MODIFY `idfacturaProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventarioproductos`
--
ALTER TABLE `inventarioproductos`
  MODIFY `idinventarioProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `detalleprodcuto_ibfk_1` FOREIGN KEY (`idfacturaproducto`) REFERENCES `facturaproducto` (`idfacturaProducto`),
  ADD CONSTRAINT `fk_detalleProdcuto_inventarioProductos1` FOREIGN KEY (`inventarioProductos_idinventarioProducto`) REFERENCES `inventarioproductos` (`idinventarioProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  ADD CONSTRAINT `fk_detalleServicio_cita1` FOREIGN KEY (`cita_idCita`) REFERENCES `cita` (`idCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicioCita_servicio1` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_rol1` FOREIGN KEY (`rolEmpleado`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD CONSTRAINT `facturaproducto_ibfk_1` FOREIGN KEY (`Id_cliente`) REFERENCES `registrocliente` (`idClientes`);

--
-- Filtros para la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  ADD CONSTRAINT `fk_facturaServicio_cita1` FOREIGN KEY (`cita_idCita`) REFERENCES `cita` (`idCita`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
