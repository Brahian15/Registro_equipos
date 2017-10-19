-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2017 a las 22:39:49
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestamo_pc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `access`
--

CREATE TABLE `access` (
  `acc_token` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `acc_pass` varchar(255) NOT NULL,
  `acc_failed_att` int(11) NOT NULL,
  `acc_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `no_asig` int(11) NOT NULL,
  `fec_asig` date NOT NULL,
  `ser` varchar(100) NOT NULL,
  `ced` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_dev`
--

CREATE TABLE `asig_dev` (
  `no_asig` int(11) NOT NULL,
  `no_dev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `no_dev` int(11) NOT NULL,
  `fec_asig` date NOT NULL,
  `fec_dev` date NOT NULL,
  `ser` varchar(100) NOT NULL,
  `ced` int(11) NOT NULL,
  `no_asig` int(11) NOT NULL,
  `coment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `ser` varchar(100) NOT NULL,
  `no_tipo` int(11) NOT NULL,
  `no_marca` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `memo` varchar(30) NOT NULL,
  `disc_duro` varchar(30) NOT NULL,
  `procesador` varchar(100) NOT NULL,
  `sis_operativo` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `cons_inventario` varchar(100) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `adicional` varchar(100) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_marca`
--

CREATE TABLE `equi_marca` (
  `no_marca` int(11) NOT NULL,
  `nom_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_tipo`
--

CREATE TABLE `equi_tipo` (
  `no_tipo` int(11) NOT NULL,
  `nom_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `no_per` int(11) NOT NULL,
  `nom_per` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `no_per` int(11) NOT NULL,
  `no_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `no_rol` int(11) NOT NULL,
  `nom_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`no_rol`, `nom_rol`) VALUES
(1, 'Administrador'),
(2, 'Soporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_lastname` varchar(40) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `no_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ced` bigint(11) NOT NULL,
  `no_site` int(11) NOT NULL,
  `no_area` int(11) NOT NULL,
  `no_cargo` int(11) NOT NULL,
  `vhur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `tel` bigint(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_area`
--

CREATE TABLE `usu_area` (
  `no_area` int(11) NOT NULL,
  `nom_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_cargo`
--

CREATE TABLE `usu_cargo` (
  `no_cargo` int(11) NOT NULL,
  `nom_cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_site`
--

CREATE TABLE `usu_site` (
  `no_site` int(11) NOT NULL,
  `nom_site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`acc_token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`no_asig`),
  ADD KEY `ser` (`ser`),
  ADD KEY `ced` (`ced`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `asig_dev`
--
ALTER TABLE `asig_dev`
  ADD PRIMARY KEY (`no_asig`,`no_dev`),
  ADD KEY `no_dev` (`no_dev`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`no_dev`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`ser`),
  ADD KEY `no_tipo` (`no_tipo`),
  ADD KEY `no_marca` (`no_marca`);

--
-- Indices de la tabla `equi_marca`
--
ALTER TABLE `equi_marca`
  ADD PRIMARY KEY (`no_marca`);

--
-- Indices de la tabla `equi_tipo`
--
ALTER TABLE `equi_tipo`
  ADD PRIMARY KEY (`no_tipo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`no_per`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`no_per`,`no_rol`),
  ADD KEY `no_rol` (`no_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`no_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `no_rol` (`no_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ced`),
  ADD KEY `no_site` (`no_site`),
  ADD KEY `no_area` (`no_area`),
  ADD KEY `no_cargo` (`no_cargo`);

--
-- Indices de la tabla `usu_area`
--
ALTER TABLE `usu_area`
  ADD PRIMARY KEY (`no_area`);

--
-- Indices de la tabla `usu_cargo`
--
ALTER TABLE `usu_cargo`
  ADD PRIMARY KEY (`no_cargo`);

--
-- Indices de la tabla `usu_site`
--
ALTER TABLE `usu_site`
  ADD PRIMARY KEY (`no_site`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `no_asig` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `no_dev` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equi_marca`
--
ALTER TABLE `equi_marca`
  MODIFY `no_marca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equi_tipo`
--
ALTER TABLE `equi_tipo`
  MODIFY `no_tipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usu_area`
--
ALTER TABLE `usu_area`
  MODIFY `no_area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usu_cargo`
--
ALTER TABLE `usu_cargo`
  MODIFY `no_cargo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usu_site`
--
ALTER TABLE `usu_site`
  MODIFY `no_site` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`ser`) REFERENCES `equipo` (`ser`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`ced`) REFERENCES `usuario` (`ced`),
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `asig_dev`
--
ALTER TABLE `asig_dev`
  ADD CONSTRAINT `asig_dev_ibfk_1` FOREIGN KEY (`no_asig`) REFERENCES `asignacion` (`no_asig`),
  ADD CONSTRAINT `asig_dev_ibfk_2` FOREIGN KEY (`no_dev`) REFERENCES `devolucion` (`no_dev`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`no_tipo`) REFERENCES `equi_tipo` (`no_tipo`),
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`no_marca`) REFERENCES `equi_marca` (`no_marca`);

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`no_per`) REFERENCES `permiso` (`no_per`),
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`no_rol`) REFERENCES `rol` (`no_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`no_rol`) REFERENCES `rol` (`no_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`no_site`) REFERENCES `usu_site` (`no_site`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`no_area`) REFERENCES `usu_area` (`no_area`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`no_cargo`) REFERENCES `usu_cargo` (`no_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
