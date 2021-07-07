-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2021 a las 20:48:10
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
(30, 'Pala de mezcla', 'stanly', '3Hmkp-L', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '123456', 'Herramienta nueva', '', 1, 75),
(31, 'Podadora', 'stanly', '3498R', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '987654', 'Herramienta nueva', '', 1, 144),
(32, 'Martillo', 'stanly', '23457BÑ', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '000000', 'Herramienta nueva', '', 1, 36),
(33, 'tijeras', 'stanly', '782736DKCI', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '333333', 'Herramienta nueva', '', 3, 2),
(34, 'MEzcladora', 'stanly', 'FOER34', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '252525', 'Herramienta nueva', '', 3, 1),
(35, 'Pico', 'stanly', '38748347G', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '262626', 'Herramienta nueva', '', 2, 30),
(36, 'Nivel', 'stanly', '3459VBLGO', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '96986', 'Herramienta nueva', '', 2, 2),
(37, 'Taladro', 'stanly', '12348X', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '784125', 'Herramienta nueva', '', 4, 30),
(38, 'Esmeril', 'stanly', '3874834L', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', '965487', 'Herramienta nueva', '', 4, 60);

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
(7, 'Bodega de partillos', '2021-05-07', 1);

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
  `idChofer` int(11) NOT NULL,
  `idConstructora` int(11) NOT NULL,
  `tipoOperacion` int(11) NOT NULL,
  `idBodega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabeceranota`
--

INSERT INTO `cabeceranota` (`idcabeceranota`, `nombreAlquilino`, `rut`, `direccion`, `telefono`, `fechaInicio`, `fechaFin`, `nombreObra`, `responsableObra`, `estatusNota`, `email`, `idChofer`, `idConstructora`, `tipoOperacion`, `idBodega`) VALUES
(9, 'Nelson Rubio', '123456789o', 'Cuatricentenario', '04246142358', '2021-05-07', '2021-05-31', 1, 'Francisco', 1, 'nelsonrubio20@gmail.com', 36, 0, 0, 1),
(11, 'Francisco', '123456789K', 'Santiago de chile ', '123456789', '0000-00-00', '0000-00-00', 5, '', 1, 'francisco@gmail.com', 36, 1, 1, 1),
(12, 'Nelson Rubio', '20944666', 'Cuatricentenario', '04246142358', '0000-00-00', '0000-00-00', 5, '', 1, 'nelsonrubio20@gmail.com', 36, 1, 1, 1),
(13, 'Francisco Ruiz', '123456789', 'Caracas', '1234567890', '0000-00-00', '0000-00-00', 5, '', 3, 'francisco@gmail.com', 36, 1, 2, 1),
(14, 'nelson Prueba bodega', '3434343434', 'maracaibo', '4454545454545', '0000-00-00', '0000-00-00', 5, '', 3, 'nelsonrubio20@gmail.com', 36, 1, 2, 1);

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
(1, 'creativa & asociados', 'Santiago de chiles', '042461423580', 'Nelson Rubio', 'nelsonrubio20@gmail.com'),
(2, 'Construye con nosotros', 'Los altos', '123456789', 'Nelson Rubio', 'nelsonrubio20@gmail.com');

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
  `statusherramienta` int(11) NOT NULL,
  `devolucion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallenota`
--

INSERT INTO `detallenota` (`iddetallenota`, `idcabeceranota`, `modeloarticulo`, `alquiler`, `cantidad`, `statusherramienta`, `devolucion`) VALUES
(9, 9, '34', 'mes', 1, 1, 0),
(11, 11, '30', 'hora', 30, 1, 1),
(12, 12, '34', 'dia', 30, 1, 0),
(13, 13, '30', 'mes', 30, 1, 1),
(14, 14, '30', 'dia', 67, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `idcabeceranota` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `nota` varchar(1000) NOT NULL,
  `fechaDevolucion` date NOT NULL,
  `fechaFinalizar` date DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `statusDevolucion` int(11) NOT NULL DEFAULT 1,
  `notaTecnico` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`idDevolucion`, `idcabeceranota`, `idarticulo`, `nota`, `fechaDevolucion`, `fechaFinalizar`, `iduser`, `statusDevolucion`, `notaTecnico`) VALUES
(1, 13, 30, 'Prueba', '2021-07-07', NULL, NULL, 1, NULL),
(4, 14, 30, ' Se devuelve porque no prende', '2021-07-07', NULL, NULL, 1, NULL),
(6, 11, 30, ' Se rompio el mango', '2021-07-07', NULL, NULL, 1, NULL);

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
(1, 'En proceso'),
(2, 'En Reparacion'),
(3, 'Entregada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusdevolucion`
--

CREATE TABLE `estatusdevolucion` (
  `idEstatus` int(11) NOT NULL,
  `estatus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatusdevolucion`
--

INSERT INTO `estatusdevolucion` (`idEstatus`, `estatus`) VALUES
(1, 'Enviado'),
(2, 'En proceso'),
(3, 'Finalizado');

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
(36, 'francisco', '123456789', 4, 'francisco@gmail.com', '', 0),
(42, 'Victor', '12345678', 5, 'victor@gmail.com', '', 0);

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
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`idDevolucion`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idEstatus`);

--
-- Indices de la tabla `estatusdevolucion`
--
ALTER TABLE `estatusdevolucion`
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
  MODIFY `idcabeceranota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `constructora`
--
ALTER TABLE `constructora`
  MODIFY `idConstructoras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallenota`
--
ALTER TABLE `detallenota`
  MODIFY `iddetallenota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idEstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estatusdevolucion`
--
ALTER TABLE `estatusdevolucion`
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
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
