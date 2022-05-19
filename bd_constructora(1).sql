-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2021 a las 20:58:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_constructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `idBitacora` int(11) NOT NULL,
  `fechaModificacion` date DEFAULT NULL,
  `idProyecto` int(11) NOT NULL,
  `detalleDeCambios` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_bitacora`
--

INSERT INTO `tbl_bitacora` (`idBitacora`, `fechaModificacion`, `idProyecto`, `detalleDeCambios`) VALUES
(1, '2020-11-02', 2, 'hola mundo'),
(2, '2020-11-06', 2, 'nnnnnnnnnn'),
(3, '2020-11-18', 2, 'hoa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientejuri`
--

CREATE TABLE `tbl_clientejuri` (
  `cedulaJuridica` varchar(15) NOT NULL,
  `nombreOrganizacion` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_clientejuri`
--

INSERT INTO `tbl_clientejuri` (`cedulaJuridica`, `nombreOrganizacion`, `cedula`) VALUES
('1', 'panaderia', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `idContacto` int(11) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `celular` varchar(25) NOT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`idContacto`, `telefono`, `celular`, `correo`) VALUES
(1, '5555', '77778', 'jjj@gmail'),
(2, '4444', '7777', 'pana@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `cedula` int(11) NOT NULL,
  `nombrePersona` varchar(45) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `idContacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`cedula`, `nombrePersona`, `apellido`, `apellido2`, `idContacto`) VALUES
(3456789, 'juan', 'fran', '', 2),
(12345678, 'heiner', 'Alvarez', 'Pimentel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proyecto`
--

CREATE TABLE `tbl_proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(45) NOT NULL,
  `descriProyecto` varchar(45) NOT NULL,
  `costoTotal` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `avanFinanciero` varchar(45) NOT NULL,
  `compePlazo` varchar(45) NOT NULL,
  `fechaEntregaActual` date NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_proyecto`
--

INSERT INTO `tbl_proyecto` (`idProyecto`, `nombreProyecto`, `descriProyecto`, `costoTotal`, `fechaInicio`, `fechaFinal`, `avanFinanciero`, `compePlazo`, `fechaEntregaActual`, `cedula`) VALUES
(1, 'Plano', 'Hola mundo', '12', '2020-11-03', '2020-11-05', 'dasd', 'dadds', '2020-11-25', 12345678),
(2, 'hola', 'fff', '222', '2020-11-17', '2020-11-18', 'ddd', 'aaec', '2020-11-23', 3456789),
(3, 'Prueba', 'jdj', 'jj', '2020-11-19', '2020-11-20', 'ad', 'd', '2020-11-18', 3456789),
(4, 'Prueba', 'jdj', 'jj', '2020-11-19', '2020-11-20', 'ad', 'd', '2020-11-18', 3456789),
(5, 'a', 'a', '1', '2020-11-19', '2020-11-20', '1', '', '2020-11-20', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `cedula` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`cedula`, `password`, `tipo`) VALUES
(3456789, 'pana', 'usuario'),
(12345678, 'cd1234', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`idBitacora`),
  ADD KEY `Bitacora_idProyecto` (`idProyecto`);

--
-- Indices de la tabla `tbl_clientejuri`
--
ALTER TABLE `tbl_clientejuri`
  ADD PRIMARY KEY (`cedulaJuridica`),
  ADD KEY `Cliente_Persona` (`cedula`);

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `Persona_Contacto` (`idContacto`);

--
-- Indices de la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `Proyecto_Personas` (`cedula`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_proyecto`
--
ALTER TABLE `tbl_proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
