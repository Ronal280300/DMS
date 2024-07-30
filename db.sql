-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2024 a las 07:31:27
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
  `id_carpeta` int(11) NOT NULL
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
(1, 'Default', '2024-07-18 03:23:18', 1, 1),
(35, 'Prueba Carpeta', '2024-07-19 20:13:34', 1, 1),
(36, 'car', '2024-07-19 20:23:29', 1, 1),
(37, 'Prueba', '2024-07-20 00:11:27', 1, 1),
(40, 'Carpeta', '2024-07-27 00:39:42', 1, 1),
(41, 'Prueba', '2024-07-30 02:46:55', 1, 20);

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
(1, 'Ronaldo', 'Segura', 'rosepa2803@gmail.com', '23123123123123', 'ASDASD', NULL, '$2y$10$qkiJuWPSnP8s/I7MO4riv.uEdsQLVPRKR88LClaem/E1h16Q0N5HG', NULL, '2024-06-08 07:34:31', 1, 0),
(19, 'awd', 'awd', 'rosepa28@hotmail.com', '23', 'AWD', NULL, '12345', NULL, '2024-06-08 07:11:38', 0, 1),
(20, 'Pri', 'Leiva', 'prileiva@gmail.com', '123456789', 'Palmares', NULL, '$2y$10$qkiJuWPSnP8s/I7MO4riv.uEdsQLVPRKR88LClaem/E1h16Q0N5HG', NULL, '2024-07-25 14:36:08', 1, 1),
(21, 'awd', 'awd', 'rosepa@gmail.com', '23', 'awd', NULL, '$2y$10$0vkq9/HXhXMBVTfR.DP0IOKILWDbgrdxHT7dopA0w.ogAWSCgw2j2', NULL, '2024-07-19 19:00:58', 0, 1),
(22, 'ADW', 'AWD', 'XC@HOTMAIL.COM', '23121', 'ASD', NULL, '$2y$10$Y7S.DtJmr5iJoDmNOq7PNOu1tsrE5jDjzvCrz1hLmx7dAR0wfi5xG', NULL, '2024-07-05 06:26:01', 0, 1),
(23, 'vbnbn', 'cczx', 'zxcv@gmail.com', '23423', 'sdf', NULL, '$2y$10$jQHJ6WoLSKbLJjZE4lw0Au/DlEEOdhLoNp4xnlm6GmsjofPFEjgOO', NULL, '2024-07-19 19:00:56', 0, 1),
(24, 'awe', 'awd', 'asddfvs@gmail.com', '23123', 'wewe', NULL, '$2y$10$RWeLlidbXJ.uRajQ2hWYze/Va.6nLnVFqRv4EEeVBYz9veSbWfhtO', NULL, '2024-07-05 00:42:42', 0, 1),
(25, 'Alejandra', 'Ale', 'Aleeee@gmail.com', '1', 'aad', NULL, '$2y$10$bwKBXylE/EyUq9TDvTGb6.yMxFWwEgJwTuc5PKRf3tfKL2lxGJ00a', NULL, '2024-07-20 04:25:12', 1, 1),
(26, 'a', 'a', 'a@GMAIL.COM', '12', 'a', NULL, '$2y$10$826oM3Orgn4leQCD4gZcEeXa0R3vLVJlPqLfq1C9vkEYzDWAGs3Te', NULL, '2024-07-19 19:05:32', 0, 1),
(27, 'PRUEBA', 'PRUEBA', 'PRUEBA@GMAIL.COM', '51', 'QASD', NULL, '$2y$10$Ix1mVlEnLKSBpD2dBelBQu3kcXAqheIds76ykSBSRohIqcqaA.K7C', NULL, '2024-07-02 00:28:35', 0, 1),
(28, 'Ronaldo', 'Segura', 'rosepa28@hotmail.com', '123456789', 'Alajuela. Grecia', NULL, '$2y$10$oSKiTo54gtBd9IIf/djRoeetst5ntf/9OQ6e.I08HzCa9/CP/7jsy', NULL, '2024-07-19 19:04:47', 1, 2),
(29, 'Xinia', 'Paniagua', 'xinia@gmail.com', '24943578', 'San Juan', NULL, '$2y$10$DW99kuX6BOB0.53CI2Ej5emHyEp.g/lGtBcXSVylWgMjh8nBEL3L6', NULL, '2024-07-25 16:43:37', 0, 2),
(30, 'Alex', 'Perez', 'alexperez@gmail.com', '85858585', 'Grecia', NULL, '$2y$10$nup2DP8hfIoei7u7mBOdpO4Qjw4kwq4Vp46nR1g120vlozPQSF.tC', NULL, '2024-07-30 02:44:10', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carpeta` (`id_carpeta`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_carpeta`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
