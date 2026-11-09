-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2025 a las 17:29:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdconducir`
--
CREATE DATABASE IF NOT EXISTS `bdconducir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdconducir`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `puntos` int(11) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `multas` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(30) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp(),
  `modificado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`id`, `nombre`, `puntos`, `ciudad`, `multas`, `estado`, `creado`, `modificado`) VALUES
(2, 'Juan', 15, 'Ciudad Real', 2, 'activo', '2025-02-13 17:57:22', '2025-03-10 17:27:14'),
(3, 'Pepe', -2, 'Madrid1', 20, 'suspendido', '2025-02-13 17:57:22', '2025-03-10 17:27:39'),
(4, 'Ana', 12, 'Albacete', 0, 'activo', '2025-02-13 17:57:22', '2025-02-13 17:58:52'),
(5, 'Carmen', 12, 'Ciudad Real', 5, 'activo', '2025-02-13 17:57:22', '2025-03-10 17:28:02'),
(6, 'Carlos', -1, 'Cuenca', 16, 'suspendido', '2025-02-13 17:57:22', '2025-03-10 17:28:22'),
(7, 'Rocío', 14, 'Albacete', 7, 'activo', '2025-02-13 17:57:22', '2025-03-10 17:28:48'),
(9, 'Amparo', 7, 'Valencia', 9, 'activo', '2025-03-10 17:24:38', '2025-03-10 17:29:05');

--
-- Disparadores `conductores`
--
DELIMITER $$
CREATE TRIGGER `addContador` AFTER INSERT ON `conductores` FOR EACH ROW UPDATE contador SET total= total + 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `restaContador` AFTER DELETE ON `conductores` FOR EACH ROW UPDATE contador SET total= total - 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_actualizar_estado` BEFORE UPDATE ON `conductores` FOR EACH ROW BEGIN
     IF NEW.puntos <> OLD.puntos THEN
        IF NEW.puntos<= 0 THEN
	     SET NEW.estado= 'suspendido';
         END IF;
      END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_actualizar_midificado` BEFORE UPDATE ON `conductores` FOR EACH ROW BEGIN
	SET NEW.modificado = NOW();
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
