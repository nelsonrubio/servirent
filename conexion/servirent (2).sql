-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 17:08:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
  `directorioImagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `nombreHerramienta`, `marca`, `modelo`, `nroSerie`, `PrecioDia`, `PrecioHora`, `PrecioSemana`, `PrecioMes`, `fechaCompra`, `NroFactura`, `Proveedor`, `CodigoEquipo`, `nota`, `directorioImagen`) VALUES
(1, 'nombre', '', 'modelo', 1, '2', '3', '4', '5', '0000-00-00', 6, '', '7', '0', ''),
(2, 'Martillo', 'stanly', 'modelo de prueba', 2323, '500', '2323', '2323', '23232', '0000-00-00', 343554641, 'martillos orientee', '40011', 'hola', ''),
(3, 'Taladro de pared', 'mankitar', 'KN67-23R', 123456801, '10000', '500', '50000', '100000', '0000-00-00', 20304050, 'Daka', '1012', 'Este talador es para el acero.', ''),
(4, 'dfdfdf', 't', 'dfdfdf', 4343434, '343434', '3443434', '43434343', '5454545', '0000-00-00', 34343434, 'cvcvcvcv', '34343434', 'fdsfdsfds', 'articulos/IMG_20200427_125451_203.jpg'),
(5, 'Pala', 'stanly', 'KN67-23R', 123456789, '30', '10', '150', '300', '2021-04-02', 123456789, 'palita', '987654321', 'Herramienta nueva', 'articulos/Koala.jpg');

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
(1, '', '2021-04-14', 1),
(2, '', '2021-04-14', 1),
(3, 'Bodega de prueba', '2021-04-14', 1),
(4, 'Bodega de prueba 2', '2021-04-14', 2);

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
  `estatusNota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cabeceranota`
--

INSERT INTO `cabeceranota` (`idcabeceranota`, `nombreAlquilino`, `rut`, `direccion`, `telefono`, `fechaInicio`, `fechaFin`, `nombreObra`, `responsableObra`, `estatusNota`) VALUES
(3, 'Nelson Rubio', '3809898T', 'Los altos', '04246142358', '2021-03-01', '2021-03-25', 'Urbanizacion', 'Francisco', 1),
(4, 'Prueba', '2234566', 'Los altos', '434343434', '2021-04-02', '2021-04-30', 'Urbanizacion', 'Francisco', 1),
(5, 'Prueba', '2234566', 'Los altos', '434343434', '2021-04-02', '2021-04-30', 'Urbanizacion', 'Francisco', 1);

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
(5, 5, '4', 'dia', 4, 1);

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
(1, 'Supervisor');

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
(36, 'Francisco', '123456789', 3, 'francisco@gmail.com', '', 4),
(37, 'Francia', '123456789', 1, 'francia@gmail.com', '', 0);

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
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idBodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cabeceranota`
--
ALTER TABLE `cabeceranota`
  MODIFY `idcabeceranota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallenota`
--
ALTER TABLE `detallenota`
  MODIFY `iddetallenota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
