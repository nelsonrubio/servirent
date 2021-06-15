-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 03:56:14
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servirent`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idArticulo` int(11) NOT NULL,
  `nombreHerramienta` varchar(500) NOT NULL,
  `marca` varchar(500) NOT NULL,
  `modelo` varchar(500) NOT NULL,
  `nroSerie` int(11) NOT NULL,
  `PrecioDia` decimal(10,0) NOT NULL,
  `PrecioHora` decimal(10,0) NOT NULL,
  `PrecioSemana` decimal(10,0) NOT NULL,
  `PrecioMes` decimal(10,0) NOT NULL,
  `fechaCompra` date NOT NULL,
  `NroFactura` int(11) NOT NULL,
  `Proveedor` varchar(500) NOT NULL,
  `CodigoEquipo` varchar(500) NOT NULL,
  `nota` varchar(2000) NOT NULL,
  `directorioImagen` varchar(500) NOT NULL,
  `idBodega` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `nombreHerramienta`, `marca`, `modelo`, `nroSerie`, `PrecioDia`, `PrecioHora`, `PrecioSemana`, `PrecioMes`, `fechaCompra`, `NroFactura`, `Proveedor`, `CodigoEquipo`, `nota`, `directorioImagen`, `idBodega`, `cantidad`) VALUES
(30, 'Martillo 1', 'stanly', '343j4kjfr', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu34', 'Herramienta nueva', '', 1, 165),
(31, 'Martillo 1', 'stanly', '343j4kjfr', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu345', 'Herramienta nueva', '', 1, 144),
(32, 'Martillo 2', 'stanly', '343j4kjfw', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu346', 'Herramienta nueva', '', 1, 36),
(33, 'Martillo 6', 'stanly', '343j4kjfdd', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu340', 'Herramienta nueva', '', 3, 2),
(34, 'Martillo 5', 'stanly', '343j4kj12', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu349', 'Herramienta nueva', '', 3, 1),
(35, 'Martillo 4', 'stanly', '343j4kjfv', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu348', 'Herramienta nueva', '', 2, 30),
(36, 'Martillo 3', 'stanly', '343j4kjfc', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu347', 'Herramienta nueva', '', 2, 2),
(37, 'Martillo 7', 'stanly', '343j4kj656', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu341', 'Herramienta nueva', '', 4, 30),
(38, 'Martillo 8', 'stanly', '343j4kjfr000', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu3422', 'Herramienta nueva', '', 4, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idBodega` int(11) NOT NULL,
  `nombreBodega` varchar(500) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `tipoBodega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`idBodega`, `nombreBodega`, `fechaCreacion`, `tipoBodega`) VALUES
(1, 'Bodega de prueba ', '2021-04-14', 1),
(2, 'Bodega de prueba 1', '2021-04-14', 1),
(3, 'Bodega de prueba 2', '2021-04-14', 1),
(4, 'Bodega de prueba 3', '2021-04-14', 2),
(5, 'Bodega respuesto', '2021-05-04', 2),
(6, 'Obra civil metropolitana', '2021-05-07', 1),
(7, '', '2021-05-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabeceranota`
--

CREATE TABLE `cabeceranota` (
  `idcabeceranota` int(11) NOT NULL,
  `nombreAlquilino` varchar(500) NOT NULL,
  `rut` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(500) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `nombreObra` int(11) NOT NULL,
  `responsableObra` varchar(500) NOT NULL,
  `estatusNota` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `idChofer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabeceranota`
--

INSERT INTO `cabeceranota` (`idcabeceranota`, `nombreAlquilino`, `rut`, `direccion`, `telefono`, `fechaInicio`, `fechaFin`, `nombreObra`, `responsableObra`, `estatusNota`, `email`, `idChofer`) VALUES
(9, 'Nelson Rubio', '123456789o', 'Cuatricentenario', '04246142358', '2021-05-07', '2021-05-31', 1, 'Francisco', 1, 'nelsonrubio20@gmail.com', 36),
(10, '', '', '', '', '0000-00-00', '0000-00-00', 1, '', 1, '', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constructora`
--

CREATE TABLE `constructora` (
  `idConstructoras` int(11) NOT NULL,
  `nombreConstructora` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(500) NOT NULL,
  `responsable` varchar(500) NOT NULL,
  `correo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `constructora`
--

INSERT INTO `constructora` (`idConstructoras`, `nombreConstructora`, `direccion`, `telefono`, `responsable`, `correo`) VALUES
(1, 'creativa & asociados', 'Santiago de chiles', '042461423580', 'Nelson Rubio', 'nelsonrubio20@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenota`
--

CREATE TABLE `detallenota` (
  `iddetallenota` int(11) NOT NULL,
  `idcabeceranota` int(11) NOT NULL,
  `modeloarticulo` varchar(500) NOT NULL,
  `alquiler` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `statusherramienta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallenota`
--

INSERT INTO `detallenota` (`iddetallenota`, `idcabeceranota`, `modeloarticulo`, `alquiler`, `cantidad`, `statusherramienta`) VALUES
(9, 9, '34', 'mes', 1, 1),
(10, 10, '30', 'hora', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idEstatus` int(11) NOT NULL,
  `estatus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idEstatus`, `estatus`) VALUES
(1, 'Alquilada'),
(2, 'En Reparacion'),
(3, 'Entregada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusobra`
--

CREATE TABLE `estatusobra` (
  `idEstatus` int(11) NOT NULL,
  `estatus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatusobra`
--

INSERT INTO `estatusobra` (`idEstatus`, `estatus`) VALUES
(1, 'En proceso'),
(2, 'Finalizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `idObra` int(11) NOT NULL,
  `nombreObra` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(500) NOT NULL,
  `responsable` varchar(500) NOT NULL,
  `telefonoResponsable` varchar(500) NOT NULL,
  `correo` varchar(500) NOT NULL,
  `fechaInicio` date NOT NULL,
  `FechaFinalizacion` date NOT NULL,
  `idConstructora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`idObra`, `nombreObra`, `direccion`, `telefono`, `responsable`, `telefonoResponsable`, `correo`, `fechaInicio`, `FechaFinalizacion`, `idConstructora`) VALUES
(5, 'Nelson Rubio', 'Venezuela', '04246142358', 'Nelson Rubio', '04246142358', 'nelsonrubio20@gmail.com', '2021-05-07', '2021-06-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `idBodega` int(11) NOT NULL,
  `idRepuesto` int(11) NOT NULL,
  `codOrigen` varchar(500) NOT NULL,
  `CodInterno` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `proveedor` varchar(500) NOT NULL,
  `nroFactura` varchar(500) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `precioVenta` float NOT NULL,
  `nombreRepuesto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`idBodega`, `idRepuesto`, `codOrigen`, `CodInterno`, `cantidad`, `proveedor`, `nroFactura`, `stock`, `precio`, `precioVenta`, `nombreRepuesto`) VALUES
(5, 2, '258GLO', '1234568M', 10, 'stanly', '1245785', 10, 500, 1000, 'Martillo'),
(5, 3, '344352', '343j4k687', 90, 'draco', '30', 50, 100, 44335, 'Mecha de concreto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'Administrador'),
(4, 'Chofer'),
(5, 'Servicio Tecnico'),
(6, 'Vendedor'),
(7, 'Recepcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobodega`
--

CREATE TABLE `tipobodega` (
  `idTipo` int(11) NOT NULL,
  `tipoBodega` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipobodega`
--

INSERT INTO `tipobodega` (`idTipo`, `tipoBodega`) VALUES
(1, 'Bodega de inventario'),
(2, 'Bodega de respuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rut` varchar(200) NOT NULL,
  `idBodega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `clave`, `tipoUsuario`, `email`, `rut`, `idBodega`) VALUES
(32, ' nelsonrubio20', '12345678', 1, 'nelsonrubio20@gmail.com', '', 0),
(36, 'Francisco', '123456789', 4, 'francisco@gmail.com', '', 4),
(37, 'Francia', '123456789', 1, 'francia@gmail.com', '', 0),
(39, 'Isaac', '12345678', 4, 'isaac@gmail.com', '', 0),
(40, 'prueba', '12345678', 4, 'prueba@gmail.com', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idBodega`);

--
-- Indices de la tabla `cabeceranota`
--
ALTER TABLE `cabeceranota`
  ADD PRIMARY KEY (`idcabeceranota`);

--
-- Indices de la tabla `constructora`
--
ALTER TABLE `constructora`
  ADD PRIMARY KEY (`idConstructoras`);

--
-- Indices de la tabla `detallenota`
--
ALTER TABLE `detallenota`
  ADD PRIMARY KEY (`iddetallenota`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idEstatus`);

--
-- Indices de la tabla `estatusobra`
--
ALTER TABLE `estatusobra`
  ADD PRIMARY KEY (`idEstatus`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`idObra`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`idRepuesto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cabeceranota`
--
ALTER TABLE `cabeceranota`
  MODIFY `idcabeceranota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `constructora`
--
ALTER TABLE `constructora`
  MODIFY `idConstructoras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallenota`
--
ALTER TABLE `detallenota`
  MODIFY `iddetallenota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estatusobra`
--
ALTER TABLE `estatusobra`
  MODIFY `idEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `idObra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `idRepuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
