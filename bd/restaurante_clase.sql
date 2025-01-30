-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2025 a las 03:55:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante_clase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `plato_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Pizza Margarita', 'Pizza con tomate, queso y albahaca', 12.99, 'pizza_margarita.png'),
(2, 'Hamburguesa Clásica', 'Hamburguesa con carne, queso, lechuga y tomate', 9.50, 'hamburguesa_clasica.png'),
(3, 'Ensalada César', 'Ensalada con pollo, lechuga, croutones y aderezo César', 8.00, 'ensalada_cesar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'Marcelo', 'kevin.torres85@outlook.es', '$2y$10$Q6aRF0Y9nUuUBfRu8Fo7JOcz/.58zrsKr2d0HHxjpP2Pholp1hJTu'),
(3, 'Marcelo Torres', 'prueba1@gmail.com', '$2y$10$hiu.ObYz5K5G.KS3khRKOuePIJ83U8gvMsBWZy8klueulRnde7Tka'),
(4, 'Katherine', 'kathereinoso26@hotmail.com', '$2y$10$QI1x75ryzxULMiiWUSYvgeC6vwbtcDFoYWlyH7AtbKtAXjK.7ZDL.'),
(5, 'Pablo', 'pablo@gmail.com', '$2y$10$pn9xK0DrDyXuBALOgAQfkeOYFC1/OnWehWKWs3vkvFzjd9o4/cULm'),
(7, 'Pablo2', 'pablo2@gmail.com', '$2y$10$sjij5z/En1PPW.fdDH09juab7Oe./L4UhsKsceCC4NeddvoDRzqEa'),
(9, 'Pablo3', 'pablo3@gmail.com', '$2y$10$fHyatDitz9QO81xLrVS4d..IP8Th3y8huQZkY1AX.SKA1CY18ylzC'),
(11, 'Pablo4', 'pablo4@gmail.com', '$2y$10$b8fC8UsI1tpkkLdsrGZ0D.JzhkjE7qnhDqEDVGUWK/0ugXFWgEegC'),
(14, 'Pablo4', 'pablo5@gmail.com', '$2y$10$9e2EBfL.qIbtgtr8M.iwX..4AZPt3YbdEBm8YZ6.YXVH/iMAmrtVi'),
(19, 'Pablo5', 'pablo6@gmail.com', '$2y$10$7u1PItbxkdDUDMMdi7e2SeOIvDS9/0LUBkxxSBzSo.mllUnZTHBPW'),
(20, 'Marcelo Torres', 'prueb@gmail.com', '$2y$10$8r8sHqV8P4IWZqpRhdAnEO3nfY30NjBO9w0tD2YWhWpq1rsFUpx3q');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_id` (`orden_id`),
  ADD KEY `plato_id` (`plato_id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `detalle_orden_ibfk_1` FOREIGN KEY (`orden_id`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `detalle_orden_ibfk_2` FOREIGN KEY (`plato_id`) REFERENCES `platos` (`id`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
