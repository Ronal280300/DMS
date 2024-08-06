-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2024 a las 06:14:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_archivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `elimina` datetime DEFAULT NULL,
  `id_carpeta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas`
--

CREATE TABLE `carpetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carpetas`
--

INSERT INTO `carpetas` (`id`, `nombre`, `fecha_create`, `estado`, `id_usuario`) VALUES
(1, 'default', '2024-08-02 06:12:23', 1, 1),
(2, 'blog', '2024-08-02 06:12:35', 1, 1),
(3, 'Tempisque', '2024-08-03 17:08:39', 1, 1),
(4, 'Colorado', '2024-08-03 17:08:47', 1, 20),
(5, 'Prueba1', '2024-08-05 01:41:05', 1, 1),
(6, 'Prueba 2', '2024-08-05 01:41:12', 1, 1),
(7, 'Prueba 3', '2024-08-05 01:41:19', 1, 1),
(8, 'Prueba 4', '2024-08-05 01:41:25', 1, 1),
(9, 'Prueba 5', '2024-08-05 01:41:32', 1, 1),
(10, 'Prueba 6', '2024-08-05 01:41:37', 1, 1),
(11, 'Prueba 7', '2024-08-05 01:41:43', 1, 1),
(12, 'Prueba 8', '2024-08-05 01:41:49', 1, 1),
(13, 'Prueba 9', '2024-08-05 01:41:55', 1, 1),
(14, 'Prueba 10', '2024-08-05 01:42:05', 1, 1),
(15, 'Prueba 11', '2024-08-05 01:58:04', 1, 1),
(16, 'Prueba 12', '2024-08-05 01:58:10', 1, 1),
(17, 'Prueba 13', '2024-08-05 01:58:16', 1, 1),
(18, 'Prueba 14', '2024-08-05 01:58:25', 1, 1),
(19, 'Prueba 15', '2024-08-05 01:58:31', 1, 1),
(20, 'Prueba 16', '2024-08-05 02:10:51', 1, 1),
(21, 'Prueba 17', '2024-08-05 02:10:58', 1, 1),
(22, 'Proyecto 01 Sabanilla río grande', '2024-08-05 03:39:16', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_archivos`
--

CREATE TABLE `detalle_archivos` (
  `id` int(11) NOT NULL,
  `fecha_add` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `correo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `elimina` datetime DEFAULT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_archivos`
--

INSERT INTO `detalle_archivos` (`id`, `fecha_add`, `correo`, `estado`, `elimina`, `id_archivo`, `id_usuario`) VALUES
(1, '2024-08-02 06:37:11', 'Ale@gmail.com', 0, '2024-09-01 00:37:11', 3, 1),
(2, '2024-08-03 17:10:29', 'rosepa2803@gmail.com', 2, NULL, 6, 20),
(3, '2024-08-03 17:11:51', 'prileiva@gmail.com', 0, '2024-09-02 11:11:51', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `perfil` varchar(100) DEFAULT NULL,
  `clave` varchar(200) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `perfil`, `clave`, `token`, `fecha`, `estado`, `rol`) VALUES
(1, 'Ronaldo', 'Segura Modificado', 'rosepa2803@gmail.com', '23123123123123', 'Grecia', NULL, '$2y$10$ni.YWAkGAaEp2DwclXQxE.ZpfyTfMroVYCKkFL3U5PKkiHxk9/VNa', '4a475046dd245f9443191bbca8102192', '2024-08-05 00:59:33', 1, 0),
(19, 'awd', 'awd', 'rosepa28@hotmail.com', '23', 'AWD', NULL, '12345', NULL, '2024-06-08 07:11:38', 0, 1),
(20, 'Pri', 'Leiva', 'prileiva@gmail.com', '123456789', 'Palmares', NULL, '$2y$10$qkiJuWPSnP8s/I7MO4riv.uEdsQLVPRKR88LClaem/E1h16Q0N5HG', NULL, '2024-07-25 14:36:08', 1, 1),
(21, 'awd', 'awd', 'rosepa@gmail.com', '23', 'awd', NULL, '$2y$10$0vkq9/HXhXMBVTfR.DP0IOKILWDbgrdxHT7dopA0w.ogAWSCgw2j2', NULL, '2024-07-19 19:00:58', 0, 1),
(22, 'ADW', 'AWD', 'XC@HOTMAIL.COM', '23121', 'ASD', NULL, '$2y$10$Y7S.DtJmr5iJoDmNOq7PNOu1tsrE5jDjzvCrz1hLmx7dAR0wfi5xG', NULL, '2024-07-05 06:26:01', 0, 1),
(23, 'vbnbn', 'cczx', 'zxcv@gmail.com', '23423', 'sdf', NULL, '$2y$10$jQHJ6WoLSKbLJjZE4lw0Au/DlEEOdhLoNp4xnlm6GmsjofPFEjgOO', NULL, '2024-07-19 19:00:56', 0, 1),
(24, 'awe', 'awd', 'asddfvs@gmail.com', '23123', 'wewe', NULL, '$2y$10$RWeLlidbXJ.uRajQ2hWYze/Va.6nLnVFqRv4EEeVBYz9veSbWfhtO', NULL, '2024-07-05 00:42:42', 0, 1),
(25, 'Alejandra', 'Ale', 'Ale@gmail.com', '8888888', 'Grecia', NULL, '$2y$10$bwKBXylE/EyUq9TDvTGb6.yMxFWwEgJwTuc5PKRf3tfKL2lxGJ00a', NULL, '2024-08-02 04:52:21', 1, 1),
(26, 'a', 'a', 'a@GMAIL.COM', '12', 'a', NULL, '$2y$10$826oM3Orgn4leQCD4gZcEeXa0R3vLVJlPqLfq1C9vkEYzDWAGs3Te', NULL, '2024-07-19 19:05:32', 0, 1),
(27, 'PRUEBA', 'PRUEBA', 'PRUEBA@GMAIL.COM', '51', 'QASD', NULL, '$2y$10$Ix1mVlEnLKSBpD2dBelBQu3kcXAqheIds76ykSBSRohIqcqaA.K7C', NULL, '2024-07-02 00:28:35', 0, 1),
(28, 'Ronaldo', 'Segura', 'rosepa28@hotmail.com', '123456790', 'Grecia', NULL, '$2y$10$oSKiTo54gtBd9IIf/djRoeetst5ntf/9OQ6e.I08HzCa9/CP/7jsy', NULL, '2024-08-02 04:52:32', 1, 2),
(29, 'Xinia', 'Paniagua', 'xinia@gmail.com', '24943578', 'San Juan', NULL, '$2y$10$DW99kuX6BOB0.53CI2Ej5emHyEp.g/lGtBcXSVylWgMjh8nBEL3L6', NULL, '2024-07-25 16:43:37', 0, 2),
(30, 'Alex', 'Perez', 'alexperez@gmail.com', '85858585', 'Grecia', NULL, '$2y$10$nup2DP8hfIoei7u7mBOdpO4Qjw4kwq4Vp46nR1g120vlozPQSF.tC', NULL, '2024-07-30 02:44:10', 1, 1),
(31, 'Pablo', 'Morales', 'rosepa2803@gmail.com', '85484110', 'Grecia', NULL, '$2y$10$ni.YWAkGAaEp2DwclXQxE.ZpfyTfMroVYCKkFL3U5PKkiHxk9/VNa', '4a475046dd245f9443191bbca8102192', '2024-08-05 00:59:33', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carpeta` (`id_carpeta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_archivo` (`id_archivo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_carpeta`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD CONSTRAINT `carpetas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  ADD CONSTRAINT `detalle_archivos_ibfk_1` FOREIGN KEY (`id_archivo`) REFERENCES `archivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_archivos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
