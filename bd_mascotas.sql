-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2024 a las 14:26:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `resgistroMascota_idMascota` int(11) NOT NULL,
  `registroCliente_idClientes` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` time DEFAULT NULL,
  `detalleServicio_idservicioCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprodcuto`
--

CREATE TABLE `detalleprodcuto` (
  `idproductoCita` int(11) NOT NULL,
  `inventarioProductos_idinventarioProducto` int(11) NOT NULL,
  `registroCliente_idClientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleservicio`
--

CREATE TABLE `detalleservicio` (
  `idservicioCita` int(11) NOT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  `cita_idCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `passEmpleado` varchar(45) NOT NULL,
  `rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproducto`
--

CREATE TABLE `facturaproducto` (
  `idfacturaProducto` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `detalleProdcuto_idproductoCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioproductos`
--

CREATE TABLE `inventarioproductos` (
  `idinventarioProducto` int(11) NOT NULL,
  `nombreProducto` varchar(100) DEFAULT NULL,
  `precioProducto` int(11) DEFAULT NULL,
  `strockProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `passCliente` varchar(45) DEFAULT NULL,
  `rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resgistromascota`
--

CREATE TABLE `resgistromascota` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` varchar(45) NOT NULL,
  `edadMascota` varchar(45) DEFAULT NULL,
  `razaMascota` varchar(45) DEFAULT NULL,
  `tipoMascota` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombreServicio` varchar(45) DEFAULT NULL,
  `precioServicio` float DEFAULT NULL,
  `descripcionServicio` varchar(5000) DEFAULT NULL,
  `fechaServicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_cita_resgistroMascota1_idx` (`resgistroMascota_idMascota`),
  ADD KEY `fk_cita_registroCliente1_idx` (`registroCliente_idClientes`),
  ADD KEY `fk_cita_detalleServicio1_idx` (`detalleServicio_idservicioCita`);

--
-- Indices de la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  ADD PRIMARY KEY (`idproductoCita`),
  ADD KEY `fk_detalleProdcuto_inventarioProductos1_idx` (`inventarioProductos_idinventarioProducto`),
  ADD KEY `fk_detalleProdcuto_registroCliente1_idx` (`registroCliente_idClientes`);

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
  ADD KEY `fk_empleado_rol1_idx` (`rol_idRol`);

--
-- Indices de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD PRIMARY KEY (`idfacturaProducto`),
  ADD KEY `fk_facturaProducto_detalleProdcuto1_idx` (`detalleProdcuto_idproductoCita`);

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
  ADD PRIMARY KEY (`idinventarioProducto`);

--
-- Indices de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD PRIMARY KEY (`idClientes`),
  ADD KEY `fk_registroCliente_rol1_idx` (`rol_idRol`);

--
-- Indices de la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  ADD PRIMARY KEY (`idMascota`);

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_detalleServicio1` FOREIGN KEY (`detalleServicio_idservicioCita`) REFERENCES `detalleservicio` (`idservicioCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cita_registroCliente1` FOREIGN KEY (`registroCliente_idClientes`) REFERENCES `registrocliente` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cita_resgistroMascota1` FOREIGN KEY (`resgistroMascota_idMascota`) REFERENCES `resgistromascota` (`idMascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  ADD CONSTRAINT `fk_detalleProdcuto_inventarioProductos1` FOREIGN KEY (`inventarioProductos_idinventarioProducto`) REFERENCES `inventarioproductos` (`idinventarioProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleProdcuto_registroCliente1` FOREIGN KEY (`registroCliente_idClientes`) REFERENCES `registrocliente` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_empleado_rol1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  ADD CONSTRAINT `fk_facturaProducto_detalleProdcuto1` FOREIGN KEY (`detalleProdcuto_idproductoCita`) REFERENCES `detalleprodcuto` (`idproductoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  ADD CONSTRAINT `fk_facturaServicio_cita1` FOREIGN KEY (`cita_idCita`) REFERENCES `cita` (`idCita`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD CONSTRAINT `fk_registroCliente_rol1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
