-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 23:44:12
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
(4, 'dfdfdf', 'fdfdfd', 'dfdfdf', 4343434, '343434', '3443434', '43434343', '5454545', '2021-03-02', 34343434, 'cvcvcvcv', '34343434', 'fdsfdsfds', 'articulos/IMG_20200427_125451_203.jpg');

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
(36, 'Francisco', '123456789', 3, 'francisco@gmail.com', '', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

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
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
