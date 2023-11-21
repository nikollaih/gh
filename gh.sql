-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-11-2023 a las 21:53:27
-- Versión del servidor: 5.6.38
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE `balance` (
  `id_balance` int(11) NOT NULL,
  `price` double NOT NULL,
  `type` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `id_movement` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` double NOT NULL,
  `notes` longtext COLLATE utf8mb4_spanish_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`id_movement`, `id_user`, `date`, `price`, `notes`, `type`, `created_at`) VALUES
(3, 5, '2023-11-20', 12000, 'Accesorios 2', 0, '2023-11-20 15:01:57'),
(5, 5, '2023-11-20', 110000, '3 piezas', 0, '2023-11-20 15:08:33'),
(7, 4, '2023-11-20', 50000, 'Al día', 1, '2023-11-20 15:18:02'),
(10, 5, '2023-11-21', 22000, 'Abono del dia', 1, '2023-11-21 16:26:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id_permissions` int(11) NOT NULL,
  `permission` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_user_type` int(11) NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `notes` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `profile_image` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `id_user_type`, `fullname`, `phone_number`, `notes`, `username`, `password`, `profile_image`, `balance`, `is_active`, `created_at`) VALUES
(1, 1, 'GH Moda Femenina', 3218335089, '', 'admin', '15f5c8993a086826cca792a2a7a19450', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 0, 1, '2023-11-18 10:14:33'),
(2, 2, 'Yuliana Andrea Gomez Ramirez', 3147805343, '', 'yuliana', '12345', '', 0, 1, '2023-11-18 10:14:33'),
(4, 2, 'Nikollai Hernandez', 3218335089, '', '', '', '', 0, 1, '2023-11-18 11:40:29'),
(5, 2, 'Martha Elena Gamus', 3144167999, 'Mamá Niko 2', '', '', '', -100000, 1, '2023-11-18 11:44:56'),
(6, 2, 'Cliente Prueba', 0, 'f', '', '', '', 10000, 0, '2023-11-18 11:51:16'),
(7, 2, 'Cliente Prueba', 0, 'f', '', '', '', 10000, 0, '2023-11-18 11:52:22'),
(8, 2, 'Cliente Prueba', 0, 'Notas', '', '', 'c9f0f895fb98ab9159f51fd0297e236d.jpg', 10000, 0, '2023-11-18 11:53:25'),
(9, 2, 'Cliente Prueba 2', 0, 'f', '', '', '45c48cce2e2d7fbdea1afc51c7c6ad26.jpg', 10000, 0, '2023-11-18 12:00:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id_user_types` int(11) NOT NULL,
  `user_type` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user_type_name` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id_user_types`, `user_type`, `user_type_name`) VALUES
(1, 'admin', 'Administrador'),
(2, 'client', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type_permission`
--

CREATE TABLE `user_type_permission` (
  `id_user_type_permission` int(11) NOT NULL,
  `id_user_type` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  `has_permission` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id_balance`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id_movement`),
  ADD KEY `movement_user_idx` (`id_user`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permissions`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_type_idx` (`id_user_type`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id_user_types`);

--
-- Indices de la tabla `user_type_permission`
--
ALTER TABLE `user_type_permission`
  ADD PRIMARY KEY (`id_user_type_permission`),
  ADD KEY `user_permission_permission_idx` (`id_permission`),
  ADD KEY `user_permission_user_type_idx` (`id_user_type`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
  MODIFY `id_balance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id_movement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permissions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id_user_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_type_permission`
--
ALTER TABLE `user_type_permission`
  MODIFY `id_user_type_permission` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `movement_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_types`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_type_permission`
--
ALTER TABLE `user_type_permission`
  ADD CONSTRAINT `user_permission_permission` FOREIGN KEY (`id_permission`) REFERENCES `permissions` (`id_permissions`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_permission_user_type` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_types`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
