-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 20:22:30
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
(30, 'Martillo 1', 'stanly', '343j4kjfr', 1212122, '20', '30', '50', '100', '0000-00-00', 125454, 'nelson', 'jhfjdhfu34', 'Herramienta nueva', '', 1, 165);

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
(5, 'Bodega respuesto', '2021-05-04', 2);

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
  `nombreObra` varchar(500) NOT NULL,
  `responsableObra` varchar(500) NOT NULL,
  `estatusNota` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `idChofer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabeceranota`
--

INSERT INTO `cabeceranota` (`idcabeceranota`, `nombreAlquilino`, `rut`, `direccion`, `telefono`, `fechaInicio`, `fechaFin`, `nombreObra`, `responsableObra`, `estatusNota`, `email`, `idChofer`) VALUES
(3, 'Nelson Rubio', '3809898T', 'Los altos', '04246142358', '2021-03-01', '2021-03-25', 'Urbanizacion', 'Francisco', 1, '', 0),
(4, 'Prueba', '2234566', 'Los altos', '434343434', '2021-04-02', '2021-04-30', 'Urbanizacion', 'Francisco', 1, '', 0),
(5, 'Prueba', '2234566', 'Los altos', '434343434', '2021-04-02', '2021-04-30', 'Urbanizacion', 'Francisco', 1, '', 0),
(6, 'prueba e email', '2343jhr', 'chile', '45345435', '2021-05-07', '2021-05-31', 'prueba de obra', 'nelson rubio', 1, 'prueba@gmail.com', 0),
(7, 'errer', 'ererer', 'dfsdfsdfsdf', '43543543543', '2021-05-07', '2021-05-31', 'gsdgfdgfdg', 'gfgffgdgfdfgd', 1, 'nelsonrubio20@gmail.com', 39);

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
(1, 3, '2', 'mes', 7, 1),
(2, 4, '2', 'dia', 4, 1),
(3, 4, '3', 'mes', 8, 1),
(4, 4, '4', 'dia', 2, 1),
(5, 5, '4', 'dia', 4, 1),
(6, 6, '30', 'dia', 4, 1),
(7, 7, '30', 'dia', 5, 1);

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
(5, 2, '258GLO', '1234568M', 50, 'stanly', '1245785', 10, 500, 1000, 'Martillo');

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
(1, 'Supervisor'),
(4, 'Chofer');

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
(39, 'Isaac', '12345678', 4, 'isaac@gmail.com', '', 0);

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
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cabeceranota`
--
ALTER TABLE `cabeceranota`
  MODIFY `idcabeceranota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detallenota`
--
ALTER TABLE `detallenota`
  MODIFY `iddetallenota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `idRepuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
