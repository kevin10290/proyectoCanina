-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2024 a las 15:35:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
  `estadoServicio` varchar(50) NOT NULL DEFAULT 'pendiente',
  `horaFin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `resgistroMascota_idMascota`, `registroCliente_idClientes`, `fechaCita`, `horaCita`, `estadoServicio`, `horaFin`) VALUES
(6, 13, 7, '2028-05-28', '02:28:00', 'pendiente', NULL),
(7, 14, 7, '2024-03-27', '20:57:00', 'pendiente', NULL),
(10, 17, 7, '2024-03-05', '10:01:00', 'pendiente', NULL),
(14, 23, 7, '2024-03-05', '01:34:00', 'pendiente', '02:04:00'),
(17, 26, 7, '2024-03-05', '02:05:00', 'pendiente', '03:05:00'),
(18, 27, 7, '2024-03-05', '18:16:00', 'pendiente', '19:16:00');

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
(1, 1, 2);

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
(3, 'fwefsdfds', 'yryrty', '456456', 'was@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaproducto`
--

CREATE TABLE `facturaproducto` (
  `idfacturaProducto` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `modoPago` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `facturaproducto`
--

INSERT INTO `facturaproducto` (`idfacturaProducto`, `total`, `fechaVenta`, `idEmpleado`, `idCliente`, `modoPago`) VALUES
(1, 23342, '2024-02-29', 1, 1, 'Débito'),
(2, 34343, '2024-02-06', 2, 1, 'Efectivo');

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
(1, 'Jabon', 100, 16, 1, './Controlador//images/nod.png');

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
(6, 'Larz', 'asdasd', '123', 'wa@gmail.com', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1),
(7, 'Juan ', 'Montoya', '11111', 'Juan@gmail.com', '1113865899', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

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
(13, 'Juanchito Alimañita', '3', 'perro', 'Gatito', 7),
(14, 'Hernando Fernandez', '2', 'Gaturro', 'Gaturrito', 7),
(15, 'Kevi', '2', 'perro', 'Gaturro', 7),
(16, 'Quinchio', '3', 'Pitbull', 'Perro', 7),
(17, 'Fernan', '4', 'Ladrador', 'perro', 7),
(18, 'Pepito', '4', 'pincher', 'Perro', 7),
(19, 'Pepito', '3', 'gata', 'Gaturro', 7),
(20, 'Pepito', '4', 'gata', 'Gaturro', 7),
(21, 'Perri', '33', 'Ladrador', 'pendejo', 7),
(22, 'Perri', '33', 'pincher', 'perro', 7),
(23, 'Perri', '33', 'gata', 'pendejo', 7),
(24, 'oewr', '3', 'Pitbull', 'pendejo', 7),
(25, 'Juanchito', '4', 'perro', 'perro', 7),
(26, 'oewr', '33', 'Pitbull', 'pendejo', 7),
(27, 'Hernando', '4', 'perro', 'Gaturro', 7);

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
(1, 'Admin');

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
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalleprodcuto`
--
ALTER TABLE `detalleprodcuto`
  MODIFY `iddetalleproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleservicio`
--
ALTER TABLE `detalleservicio`
  MODIFY `idservicioCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturaproducto`
--
ALTER TABLE `facturaproducto`
  MODIFY `idfacturaProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturaservicio`
--
ALTER TABLE `facturaservicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventarioproductos`
--
ALTER TABLE `inventarioproductos`
  MODIFY `idinventarioProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `resgistromascota`
--
ALTER TABLE `resgistromascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

