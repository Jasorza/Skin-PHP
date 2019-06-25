-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2019 a las 16:39:40
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skincol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `IdCiudad` int(11) NOT NULL,
  `IdDepartamento` int(11) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`IdCiudad`, `IdDepartamento`, `Nombre`) VALUES
(1, 1, 'Tunja'),
(2, 2, 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(11) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `Nombre`) VALUES
(1, 'Boyaca'),
(2, 'Cundinamarca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `IdDispositivo` int(11) NOT NULL,
  `Modelo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `IdEnvio` int(11) NOT NULL,
  `IdUsurio` int(11) NOT NULL,
  `IdFactura` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IdFactura` int(11) NOT NULL,
  `IdSolicitud` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturainsumos`
--

CREATE TABLE `facturainsumos` (
  `IdFacturaInsumos` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `IdMaterial` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Costo` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `facturainsumos`
--

INSERT INTO `facturainsumos` (`IdFacturaInsumos`, `IdProveedor`, `IdMaterial`, `Cantidad`, `Costo`) VALUES
(1, 1, 1, 5, '1500000'),
(2, 2, 2, 5, '200000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `IdMaterial` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`IdMaterial`, `Nombre`, `Descripcion`) VALUES
(1, 'Vinilo', 'Prueba'),
(2, 'Resina', 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `Nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `NIT` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `Nombre`, `NIT`, `Direccion`, `Correo`, `Telefono`) VALUES
(1, 'Empresa 1', '1049652045', 'Calle lola No. 5 ', 'User@mail.com', '1234456'),
(2, 'Empresa 2', '1069724413-8', 'Calle 4 no 4 - 1', 'Mail@user.com', '255 9822');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skin`
--

CREATE TABLE `skin` (
  `IdSkin` int(11) NOT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `Imagen` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Disponible` tinyint(1) DEFAULT NULL,
  `ImgUsuario` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudskin`
--

CREATE TABLE `solicitudskin` (
  `IdSolicitud` int(11) NOT NULL,
  `IdSkin` int(11) NOT NULL,
  `IdDispositivo` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `CostoSkin` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL,
  `IdCiudad` int(11) NOT NULL,
  `Tipo` tinyint(1) NOT NULL,
  `Nombres` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Documento` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `Contrasena` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUser`, `IdCiudad`, `Tipo`, `Nombres`, `Apellidos`, `Documento`, `Telefono`, `Direccion`, `Email`, `Contrasena`, `Fecha`, `Estado`) VALUES
(1, 1, 1, 'Alejandro', 'Sorza', '1049652045', '3232011929', 'Calle 22 - 45', 'alejo@sorza.com', '1234', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`IdCiudad`),
  ADD KEY `IdDepartamento` (`IdDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`IdDispositivo`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`IdEnvio`),
  ADD KEY `IdFactura` (`IdFactura`),
  ADD KEY `IdUsurio` (`IdUsurio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `IdSkin` (`IdSolicitud`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indices de la tabla `facturainsumos`
--
ALTER TABLE `facturainsumos`
  ADD PRIMARY KEY (`IdFacturaInsumos`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdMaterial` (`IdMaterial`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`IdMaterial`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `skin`
--
ALTER TABLE `skin`
  ADD PRIMARY KEY (`IdSkin`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `solicitudskin`
--
ALTER TABLE `solicitudskin`
  ADD PRIMARY KEY (`IdSolicitud`),
  ADD KEY `IdUser` (`IdUser`),
  ADD KEY `User_IdUser` (`IdAdmin`),
  ADD KEY `IdSkin` (`IdSkin`),
  ADD KEY `IdDispositivo` (`IdDispositivo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `IdCiudad` (`IdCiudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `IdDispositivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `IdEnvio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturainsumos`
--
ALTER TABLE `facturainsumos`
  MODIFY `IdFacturaInsumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `IdMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `skin`
--
ALTER TABLE `skin`
  MODIFY `IdSkin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudskin`
--
ALTER TABLE `solicitudskin`
  MODIFY `IdSolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`IdDepartamento`);

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`IdFactura`),
  ADD CONSTRAINT `envio_ibfk_2` FOREIGN KEY (`IdUsurio`) REFERENCES `usuario` (`IdUser`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`IdSolicitud`) REFERENCES `solicitudskin` (`IdSolicitud`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`);

--
-- Filtros para la tabla `facturainsumos`
--
ALTER TABLE `facturainsumos`
  ADD CONSTRAINT `facturainsumos_ibfk_1` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`),
  ADD CONSTRAINT `facturainsumos_ibfk_2` FOREIGN KEY (`IdMaterial`) REFERENCES `material` (`IdMaterial`);

--
-- Filtros para la tabla `skin`
--
ALTER TABLE `skin`
  ADD CONSTRAINT `skin_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `solicitudskin`
--
ALTER TABLE `solicitudskin`
  ADD CONSTRAINT `solicitudskin_ibfk_1` FOREIGN KEY (`IdDispositivo`) REFERENCES `dispositivo` (`IdDispositivo`),
  ADD CONSTRAINT `solicitudskin_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `usuario` (`IdUser`),
  ADD CONSTRAINT `solicitudskin_ibfk_3` FOREIGN KEY (`IdAdmin`) REFERENCES `usuario` (`IdUser`),
  ADD CONSTRAINT `solicitudskin_ibfk_4` FOREIGN KEY (`IdSkin`) REFERENCES `skin` (`IdSkin`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdCiudad`) REFERENCES `ciudad` (`IdCiudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
