-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2024 a las 07:00:51
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
(1, 'Soda La 33.png', 'image/png', '2024-08-08 05:59:04', 1, NULL, 1, 1),
(2, 'Soda La 33 (1).png', 'image/png', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(3, 'Soda La 33.png', 'image/png', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(4, 'db.sql', 'application/octet-stream', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(5, 'music_ai_2024-8-4.wav', 'audio/wav', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(6, 'gestion_archivos (2) (1).sql', 'application/octet-stream', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(7, '66281ae83b9cf51122177fb9_sinpe.png', 'image/png', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(8, 'Almuerzos Suscripción Quincenal - 10 Comidas.png', 'image/png', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(9, 'plato-arroz-pollo-receta-facil-economica-almuerzo.jpg', 'image/jpeg', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(10, 'classic-cheese-pizza-FT-RECIPE0422-31a2c938fc2546c9a07b7011658cfd05.jpg', 'image/jpeg', '2024-08-06 14:17:26', 1, NULL, 1, 20),
(11, 'Anexos_Ejemplo.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-08-06 15:27:15', 1, NULL, 1, 20),
(12, 'Almuerzos Suscripción Quincenal - 10 Comidas.png', 'image/png', '2024-08-06 14:28:38', 0, '2024-09-06 09:28:38', 4, 20),
(13, 'Soda La 33 (1).png', 'image/png', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(14, 'Soda La 33.png', 'image/png', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(15, 'db.sql', 'application/octet-stream', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(16, 'music_ai_2024-8-4.wav', 'audio/wav', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(17, 'gestion_archivos (2) (1).sql', 'application/octet-stream', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(18, '66281ae83b9cf51122177fb9_sinpe.png', 'image/png', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(19, 'Almuerzos Suscripción Quincenal - 10 Comidas.png', 'image/png', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(20, 'plato-arroz-pollo-receta-facil-economica-almuerzo.jpg', 'image/jpeg', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(21, 'classic-cheese-pizza-FT-RECIPE0422-31a2c938fc2546c9a07b7011658cfd05.jpg', 'image/jpeg', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(22, 'Anexos_Ejemplo.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-08-06 15:50:13', 1, NULL, 4, 20),
(23, 'Soda La 33 (3).png', 'image/png', '2024-08-06 15:52:42', 1, NULL, 21, 1),
(24, 'Kick off_RonaldoSegura (1).pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2024-08-08 00:23:10', 1, NULL, 1, 1),
(25, '12699172_Office workers organizing data storage.svg', 'image/svg+xml', '2024-08-08 05:51:10', 1, NULL, 1, 30),
(26, 'digital-personal-files-concept-illustration.zip', 'application/x-zip-compressed', '2024-08-08 05:51:10', 1, NULL, 1, 30),
(27, '12977774_5130167.svg', 'image/svg+xml', '2024-08-08 05:51:10', 1, NULL, 1, 30),
(28, 'gestion_archivos (3).sql', 'application/octet-stream', '2024-08-08 05:51:10', 1, NULL, 1, 30),
(29, 'DMS-main (3).zip', 'application/x-zip-compressed', '2024-08-08 05:51:10', 1, NULL, 1, 30),
(30, 'Kick off_RonaldoSegura (1).pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(31, 'Kick off_RonaldoSegura.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(32, 'Niveles de lectura-módulo 2- 2024.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(33, 'PLANTILLA MINUTAS DE TRABAJO.pdf', 'application/pdf', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(34, 'Rúbrica De Evaluación - Niveles De Lectura.pdf', 'application/pdf', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(35, 'Safewor-removebg-preview.png', 'image/png', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(36, 'Safewor.png', 'image/png', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(37, 'PROJECT CHARTER.pdf', 'application/pdf', '2024-08-08 05:51:40', 1, NULL, 23, 30),
(38, '2024-05-21 Presentacion PMO SISAP DIA 2.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '2024-08-08 06:02:29', 0, '2024-09-08 01:02:29', 23, 30);

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
(22, 'Proyecto 01 Sabanilla río grande', '2024-08-05 03:39:16', 1, 1),
(23, 'Proyecto 1004 Barranca', '2024-08-08 05:51:27', 1, 30);

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
(2, '2024-08-06 15:27:05', 'rosepa2803@gmail.com', 0, NULL, 6, 20),
(3, '2024-08-03 17:11:51', 'prileiva@gmail.com', 0, '2024-09-02 11:11:51', 7, 1),
(4, '2024-08-06 15:31:56', 'prileiva@gmail.com', 2, NULL, 1, 1),
(5, '2024-08-06 15:33:09', 'rosepa2803@gmail.com', 2, NULL, 11, 20),
(6, '2024-08-06 15:52:24', 'rosepa2803@gmail.com', 2, NULL, 12, 20),
(7, '2024-08-06 15:52:24', 'rosepa2803@gmail.com', 2, NULL, 13, 20),
(8, '2024-08-06 15:51:49', 'rosepa2803@gmail.com', 0, '2024-09-06 10:51:49', 14, 20),
(9, '2024-08-06 15:52:23', 'rosepa2803@gmail.com', 2, NULL, 15, 20),
(10, '2024-08-06 15:52:23', 'rosepa2803@gmail.com', 2, NULL, 16, 20),
(11, '2024-08-06 15:51:53', 'rosepa2803@gmail.com', 2, NULL, 17, 20),
(12, '2024-08-06 15:51:46', 'rosepa2803@gmail.com', 0, '2024-09-06 10:51:46', 18, 20),
(13, '2024-08-06 15:51:43', 'rosepa2803@gmail.com', 0, '2024-09-06 10:51:43', 19, 20),
(14, '2024-08-06 15:51:24', 'rosepa2803@gmail.com', 0, '2024-09-06 10:51:24', 20, 20),
(15, '2024-08-06 15:51:39', 'rosepa2803@gmail.com', 0, '2024-09-06 10:51:39', 21, 20),
(16, '2024-08-06 15:51:11', 'rosepa2803@gmail.com', 2, NULL, 22, 20),
(17, '2024-08-08 05:52:12', 'rosepa2803@gmail.com', 2, NULL, 38, 30),
(18, '2024-08-08 05:52:41', 'rosepa2803@gmail.com', 2, NULL, 30, 30),
(19, '2024-08-08 05:52:47', 'rosepa2803@gmail.com', 2, NULL, 31, 30),
(20, '2024-08-08 05:52:39', 'rosepa2803@gmail.com', 2, NULL, 32, 30),
(21, '2024-08-08 05:52:39', 'rosepa2803@gmail.com', 2, NULL, 33, 30),
(22, '2024-08-08 05:52:40', 'rosepa2803@gmail.com', 2, NULL, 34, 30),
(23, '2024-08-08 05:58:41', 'rosepa2803@gmail.com', 0, NULL, 36, 30);

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
(1, 'Ronaldo', 'Segura', 'rosepa2803@gmail.com', '85307943', 'San Juan, Grecia, Alajuela', NULL, '$2y$10$4cuMA7C.Yt5kiYfNEDJtZOvsOAuyCP1buvJ0vv0PrNCj9R89oCthC', NULL, '2024-08-08 06:32:11', 1, 1),
(20, 'Priscilla', 'Leiva Ramírez', 'prileiva@gmail.com', '85471457', 'San Miguel, Palmares, Alajuela', NULL, '$2y$10$qkiJuWPSnP8s/I7MO4riv.uEdsQLVPRKR88LClaem/E1h16Q0N5HG', NULL, '2024-08-08 06:18:46', 1, 1),
(25, 'Alejandra', 'Segura Paniagua', 'alejandra@gmail.com', '88017576', 'San Juan, Grecia, Alajuela', NULL, '$2y$10$bwKBXylE/EyUq9TDvTGb6.yMxFWwEgJwTuc5PKRf3tfKL2lxGJ00a', NULL, '2024-08-08 06:18:19', 1, 1),
(28, 'Ronaldo', 'Segura Paniagua', 'rosepa28@hotmail.com', '85307942', 'San Juan, Grecia, Alajuela', NULL, '$2y$10$oSKiTo54gtBd9IIf/djRoeetst5ntf/9OQ6e.I08HzCa9/CP/7jsy', NULL, '2024-08-08 06:31:01', 1, 1),
(30, 'Alex', 'Perez Campos', 'alexperez@gmail.com', '85858585', 'Los Ángeles, Grecia, Alajuela', NULL, '$2y$10$jX3T3e.UaMe15kcHVPVKXeEOOuXf6ho/CxtFz9LSHFhbEJccEIobG', NULL, '2024-08-09 18:05:36', 1, 1),
(31, 'Pablo', 'Morales Hidalgo', 'pablo@gmail.com', '85478457', 'Barrio Latino, Grecia, Alajuela', NULL, '$2y$10$1V.0kZFrzBZ3e.6LWT/NnOjYV3EaKHnRiPlqtvvaSueHx8l2olX4i', NULL, '2024-08-08 06:18:56', 1, 1),
(33, 'Rolando', 'Segura Soto', 'rolando@gmail.com', '88129065', 'San Juan, Grecia, Alajuela', NULL, '$2y$10$0R44TYUXzuQpT2I7nYSDNOlUcbEbgNVXAE4HqIR2SQyOGogEMuu72', NULL, '2024-08-08 06:16:16', 1, 1),
(34, 'Andrea', 'Segura Paniagua', 'andrea@gmail.com', '24943578', 'Rincón de Arias, Grecia, Alajuela', NULL, '$2y$10$7ovMn/2BgKoSw5CdBpHEk.A/DwSS0fCxUeL8ltKtL63CuGFAC96yu', NULL, '2024-08-08 06:21:18', 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detalle_archivos`
--
ALTER TABLE `detalle_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
