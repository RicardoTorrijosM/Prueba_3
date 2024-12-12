-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2024 a las 18:09:16
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
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `contraseña2` varchar(20) NOT NULL,
  `fecha_ingreso` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `correo_electronico`, `contraseña`, `contraseña2`, `fecha_ingreso`) VALUES
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', '$2y$10$sqa65Ar1pWzxz', '', '2024-12-11 20:38:57.937115'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', '$2y$10$W3VEDVJkHIgGD', '', '2024-12-11 20:40:04.972825'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', '$2y$10$lmIRV9zCQ8wH8', '', '2024-12-11 20:40:44.971600'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@123', '', '2024-12-11 20:43:20.474906'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@1234', '', '2024-12-11 21:14:37.668576'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@1234', '', '2024-12-11 21:17:17.881731'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@1234', '', '2024-12-11 21:19:44.443282'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@12345', '', '2024-12-11 21:29:23.285185'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@12345', '', '2024-12-11 21:37:37.522887'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@12345', '', '2024-12-11 21:38:26.386017'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Riki@12345', '', '2024-12-11 21:50:46.648569'),
('RICARDO FERNANDO', 'Torrijos', 'Torrijosr2@gmail.com', 'Juancito@123', '', '2024-12-12 16:19:39.413324');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
