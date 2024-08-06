-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2024 a las 07:12:28
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

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `tipo`, `fecha_create`, `estado`, `elimina`, `id_carpeta`, `id_usuario`) VALUES
(1, 'DMS-main (1).zip', 'application/x-zip-compressed', '2024-07-30 21:20:57', 0, '2024-08-29 15:20:57', 1, 0),
(2, 'http___localhost_DMS_Assets_archivos_36_DMS-main.zip', 'application/x-zip-compressed', '2024-07-30 20:21:40', 0, '2024-08-29 14:21:40', 35, 0),
(3, 'DMS-main (1) (2).zip', 'application/x-zip-compressed', '2024-07-30 21:25:29', 0, '2024-08-29 15:25:29', 1, 0),
(4, 'DMS-main (1) (5).zip', 'application/x-zip-compressed', '2024-07-30 21:25:07', 1, NULL, 1, 0),
(5, 'TFG 8.0 RonaldoSeguraPaniagua.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-07-31 02:51:36', 0, '2024-08-29 20:51:36', 1, 0),
(6, 'prueba-removebg-preview (1).png', 'image/png', '2024-07-31 03:44:53', 1, NULL, 1, 0),
(7, 'gestion_archivos Actualizada.sql', 'application/octet-stream', '2024-07-31 03:52:25', 1, NULL, 1, 0),
(8, 'Documento SRS.pdf', 'application/pdf', '2024-07-31 03:53:15', 1, NULL, 1, 0),
(9, 'DMS-main (1) (4).zip', 'application/x-zip-compressed', '2024-07-31 03:53:55', 1, NULL, 1, 0),
(10, 'http___localhost_DMS_Assets_archivos_1_Modulo1_Introducción.pdf', 'application/pdf', '2024-07-31 03:54:07', 1, NULL, 42, 0),
(11, 'PROJECT CHARTER.pdf', 'application/pdf', '2024-07-31 05:09:16', 1, NULL, 1, 2),
(12, 'http___localhost_DMS_Assets_archivos_36_DMS-main.zip', 'application/x-zip-compressed', '2024-07-31 05:09:22', 1, NULL, 1, 2),
(13, 'TFG 8.0 RonaldoSeguraPaniagua.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-07-31 05:09:24', 1, NULL, 1, 2),
(14, 'TFG 8.0 RonaldoSeguraPaniagua.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-07-31 05:08:57', 1, NULL, 1, 1),
(15, 'gestion_archivos Actualizada.sql', 'application/octet-stream', '2024-07-31 05:08:56', 1, NULL, 1, 1),
(16, 'Bitácoras (8).pdf', 'application/pdf', '2024-07-31 05:08:54', 1, NULL, 44, 1),
(17, 'EstructuraDeslose.png', 'image/png', '2024-07-31 05:08:52', 1, NULL, 1, 1);

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
(41, 'Prueba', '2024-07-30 02:46:55', 1, 20),
(42, 'prueba', '2024-07-31 03:54:01', 1, 31),
(43, 'prueba 2', '2024-07-31 03:54:41', 1, 20),
(44, 'PruebaCompartir', '2024-07-31 04:49:35', 1, 31);

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
(1, '2024-07-30 20:26:44', 'rosepa28@hotmail.com', 0, '2024-08-29 14:26:44', 1, 1),
(2, '2024-07-30 20:27:45', 'rosepa2803@gmail.com', 0, '2024-08-29 14:27:45', 1, 1),
(3, '2024-07-31 04:48:52', 'rosepa2803@gmail.com', 2, NULL, 3, 1),
(4, '2024-07-31 04:39:04', 'pablo@gmail.com', 2, NULL, 4, 1),
(5, '2024-07-31 04:39:03', 'pablo@gmail.com', 2, '2024-08-29 21:56:10', 6, 1),
(6, '2024-07-31 04:39:00', 'pablo@gmail.com', 2, NULL, 8, 1),
(7, '2024-07-31 04:38:56', 'pablo@gmail.com', 0, NULL, 11, 1),
(8, '2024-07-31 04:52:12', 'rosepa2803@gmail.com', 2, NULL, 16, 31);

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
(30, 'Alex', 'Perez', 'alexperez@gmail.com', '85858585', 'Grecia', NULL, '$2y$10$nup2DP8hfIoei7u7mBOdpO4Qjw4kwq4Vp46nR1g120vlozPQSF.tC', NULL, '2024-07-30 02:44:10', 1, 1),
(31, 'Pablo', 'Morales', 'pablo@gmail.com', '85484110', 'Grecia', NULL, '$2y$10$zlOMG6oB3H7vJ9X0c12esuHxj/EW0TF9PwsnjqL31DsmXYnYUy2Ta', NULL, '2024-07-31 03:37:43', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
