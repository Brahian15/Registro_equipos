-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2017 a las 17:16:30
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

--
-- Volcado de datos para la tabla `access`
--

INSERT INTO `access` (`acc_token`, `user_id`, `acc_pass`, `acc_failed_att`, `acc_status`) VALUES
('3SPBj58gMZzsZaosyjXxaJ1dHlp8w4BbwIv2tIAeYH9wkpTMJf', 'USU-20170926-100930', '$2y$10$YXQelcwlOZRuKAhAECEvVergEBy.mlKRjOoVeFJJDOn2jvm8cnev.', 0, 'Inactivo'),
('EG28PtPzxWdhNCCeWETMaBxgONfyd7NK1YcQxdvwBASsLqVAuE', 'USU-20170926-040955', '$2y$10$kPQecCVV37nW8l1uKldHtur/hksxFvCd.sqOaGgywLjmJ5.S/cCYS', 0, 'Inactivo'),
('MPz7n2TcpZuB4RI7iozQp9cCIwA9Hrx7gP0xLUbHeHpbRWAyWo', 'USU-20170927-090904', '$2y$10$VhGHXuMe0iOb13JOiFkdj..ioV0HckjUZQpioUonSPL23RWHf648O', 0, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `no_asig` int(11) NOT NULL,
  `fec_asig` date NOT NULL,
  `tipo_asig` varchar(30) NOT NULL,
  `ser` varchar(100) NOT NULL,
  `ced` int(11) NOT NULL,
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
  `no_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`no_dev`, `fec_asig`, `fec_dev`, `ser`, `ced`, `no_asig`) VALUES
(42, '2017-09-01', '2017-09-01', '5986', 71763169, 2),
(44, '2017-09-05', '2017-09-01', '1308', 1234989649, 4),
(45, '2017-09-12', '2017-09-12', '1309', 1234989649, 7),
(46, '2017-09-14', '2017-09-14', '1308', 1234989649, 2),
(47, '2017-09-20', '2017-09-20', '2123', 43731786, 2),
(48, '2017-09-20', '2017-09-26', '2123', 43731786, 3),
(49, '2017-09-28', '2017-09-28', '2123', 43731786, 2),
(50, '2017-09-18', '2017-09-28', '1308', 1234989649, 1);

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

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`ser`, `no_tipo`, `no_marca`, `model`, `memo`, `disc_duro`, `procesador`, `sis_operativo`, `type`, `cons_inventario`, `hostname`, `adicional`, `estado`) VALUES
('1308', 1, 1, 'nkj', 'njk', 'njkn', 'jkn', 'jkn', 'jkn', '4t5amhrs', '2155', '', 'Sin asignacion'),
('2123', 1, 1, 'hjbhj', 'bhjb', 'hjbhjb', 'hjb', 'hbhj', 'bh', 'hb', 'hj', 'hj', 'Sin asignacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_marca`
--

CREATE TABLE `equi_marca` (
  `no_marca` int(11) NOT NULL,
  `nom_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equi_marca`
--

INSERT INTO `equi_marca` (`no_marca`, `nom_marca`) VALUES
(1, 'Lenovo'),
(5, 'ThinkVision');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equi_tipo`
--

CREATE TABLE `equi_tipo` (
  `no_tipo` int(11) NOT NULL,
  `nom_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equi_tipo`
--

INSERT INTO `equi_tipo` (`no_tipo`, `nom_tipo`) VALUES
(1, 'Portatil'),
(2, 'Desktop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_lastname` varchar(40) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_email`) VALUES
('USU-20170926-040955', 'Brahian', 'Grajales', 'brahian.verde@hotmail.com'),
('USU-20170926-100930', 'sdafa', 'sadf', 'begrajales@gmail.com'),
('USU-20170927-090904', 'brahian', 'grajales', 'brahian@prueba.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ced` int(11) NOT NULL,
  `no_site` int(11) NOT NULL,
  `no_area` int(11) NOT NULL,
  `no_cargo` int(11) NOT NULL,
  `vhur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `tel` bigint(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ced`, `no_site`, `no_area`, `no_cargo`, `vhur`, `nom`, `tel`, `estado`) VALUES
(43731786, 20, 5, 5, 5487, 'Carlitos', 5644458, 'Sin asignacion'),
(1234989649, 20, 5, 5, 3780, 'Lorenzo', 3137634842, 'Sin asignacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_area`
--

CREATE TABLE `usu_area` (
  `no_area` int(11) NOT NULL,
  `nom_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usu_area`
--

INSERT INTO `usu_area` (`no_area`, `nom_area`) VALUES
(5, 'IT'),
(8, 'Command Center');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_cargo`
--

CREATE TABLE `usu_cargo` (
  `no_cargo` int(11) NOT NULL,
  `nom_cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usu_cargo`
--

INSERT INTO `usu_cargo` (`no_cargo`, `nom_cargo`) VALUES
(5, 'Jefe'),
(8, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_site`
--

CREATE TABLE `usu_site` (
  `no_site` int(11) NOT NULL,
  `nom_site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usu_site`
--

INSERT INTO `usu_site` (`no_site`, `nom_site`) VALUES
(20, 'Niquia'),
(21, 'Aventura');

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `no_dev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `equi_marca`
--
ALTER TABLE `equi_marca`
  MODIFY `no_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `equi_tipo`
--
ALTER TABLE `equi_tipo`
  MODIFY `no_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usu_area`
--
ALTER TABLE `usu_area`
  MODIFY `no_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usu_cargo`
--
ALTER TABLE `usu_cargo`
  MODIFY `no_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usu_site`
--
ALTER TABLE `usu_site`
  MODIFY `no_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
