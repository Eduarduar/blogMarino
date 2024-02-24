-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2024 a las 00:44:42
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
-- Base de datos: `pag_pi`
--
CREATE DATABASE IF NOT EXISTS `pag_pi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pag_pi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `eCodeCategorias` int(11) NOT NULL,
  `tNameCategorias` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`eCodeCategorias`, `tNameCategorias`) VALUES
(2, 'POLLUTION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `eCodeImages` int(11) NOT NULL,
  `tLugarImages` varchar(100) NOT NULL,
  `ePosicionImages` int(11) NOT NULL,
  `ePublicacionImages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`eCodeImages`, `tLugarImages`, `ePosicionImages`, `ePublicacionImages`) VALUES
(1, './source/img/oceanoplastico.jpg', 2, 3),
(2, './source/img/oceanoplastico.jpg', 2, 4),
(3, './source/img/oceanoplastico.jpg', 2, 5),
(4, './source/img/oceanoplastico.jpg', 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `eCodePublicaciones` int(11) NOT NULL,
  `eUserPublicaciones` int(11) NOT NULL,
  `tTitlePublicaciones` varchar(100) NOT NULL,
  `fCreationPublicaciones` datetime NOT NULL,
  `fUpdatePublicaciones` datetime DEFAULT NULL,
  `eUpdatePublicaciones` int(11) DEFAULT NULL,
  `eCategoriaPublicaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`eCodePublicaciones`, `eUserPublicaciones`, `tTitlePublicaciones`, `fCreationPublicaciones`, `fUpdatePublicaciones`, `eUpdatePublicaciones`, `eCategoriaPublicaciones`) VALUES
(3, 1, 'PLASTIC OCEAN', '2024-02-16 21:32:05', NULL, NULL, 2),
(4, 1, 'skibiritoiloet', '2024-02-16 21:32:05', NULL, NULL, 2),
(5, 1, 'etesetch', '2024-02-16 21:32:05', NULL, NULL, 2),
(6, 1, 'PLASTIC OCEAN', '2024-02-16 21:32:05', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texts`
--

CREATE TABLE `texts` (
  `eCodeTexts` int(11) NOT NULL,
  `tContenidoTexts` varchar(1000) NOT NULL,
  `ePosicionTexts` int(11) NOT NULL,
  `epublicacionTexts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `texts`
--

INSERT INTO `texts` (`eCodeTexts`, `tContenidoTexts`, `ePosicionTexts`, `epublicacionTexts`) VALUES
(1, 'Plastic floats throughout the world\'s seas. In fact, according to data from the United Nations (UN) from 2018, the ocean receives a whopping eight million tons of plastic every year. But what until now we did not even imagine was that plastic would also reach the deep sea. A clear example: at the deepest point on the planet, the one known as the Challenger Deep —located at 10,928 meters deep—, American billionaire Victor Vescovo\'s expedition discovered candy wrappers and a plastic bag this year. How did they get there? Can we do something to avoid it? Questions abound in this environmental drama.', 1, 3),
(2, 'Plastic floats throughout the world\'s seas. In fact, according to data from the United Nations (UN) from 2018, the ocean receives a whopping eight million tons of plastic every year. But what until now we did not even imagine was that plastic would also reach the deep sea. A clear example: at the deepest point on the planet, the one known as the Challenger Deep —located at 10,928 meters deep—, American billionaire Victor Vescovo\'s expedition discovered candy wrappers and a plastic bag this year. How did they get there? Can we do something to avoid it? Questions abound in this environmental drama.', 1, 4),
(3, 'Plastic floats throughout the world\'s seas. In fact, according to data from the United Nations (UN) from 2018, the ocean receives a whopping eight million tons of plastic every year. But what until now we did not even imagine was that plastic would also reach the deep sea. A clear example: at the deepest point on the planet, the one known as the Challenger Deep —located at 10,928 meters deep—, American billionaire Victor Vescovo\'s expedition discovered candy wrappers and a plastic bag this year. How did they get there? Can we do something to avoid it? Questions abound in this environmental drama.', 1, 5),
(4, 'Plastic floats throughout the world\'s seas. In fact, according to data from the United Nations (UN) from 2018, the ocean receives a whopping eight million tons of plastic every year. But what until now we did not even imagine was that plastic would also reach the deep sea. A clear example: at the deepest point on the planet, the one known as the Challenger Deep —located at 10,928 meters deep—, American billionaire Victor Vescovo\'s expedition discovered candy wrappers and a plastic bag this year. How did they get there? Can we do something to avoid it? Questions abound in this environmental drama.', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `eCodeUsuarios` int(11) NOT NULL,
  `tNameUsuarios` varchar(100) NOT NULL,
  `tLastNameUsuarios` varchar(100) NOT NULL,
  `tMailUsuarios` varchar(100) NOT NULL,
  `tPasswordUsuarios` varchar(100) NOT NULL,
  `tUserNameUsuarios` varchar(50) NOT NULL,
  `fCreationUsuarios` datetime NOT NULL,
  `fUpdateUsuarios` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`eCodeUsuarios`, `tNameUsuarios`, `tLastNameUsuarios`, `tMailUsuarios`, `tPasswordUsuarios`, `tUserNameUsuarios`, `fCreationUsuarios`, `fUpdateUsuarios`) VALUES
(1, 'Prueba', 'Prueba', 'Prueba@Prueba.com', '$2y$10$ClatdMwfZGS1zijoECgyPeOyNxhAEqR23XAPTsi/D3VTL8hn2jmVC', 'Admin', '2024-02-08 03:50:11', '2024-02-08 03:50:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`eCodeCategorias`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`eCodeImages`),
  ADD KEY `idCodePost` (`ePublicacionImages`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`eCodePublicaciones`),
  ADD KEY `edit_user` (`eUpdatePublicaciones`),
  ADD KEY `id_user` (`eUserPublicaciones`),
  ADD KEY `id_categoria` (`eCategoriaPublicaciones`);

--
-- Indices de la tabla `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`eCodeTexts`),
  ADD KEY `idCodePost` (`epublicacionTexts`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`eCodeUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `eCodeCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `eCodeImages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `eCodePublicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `texts`
--
ALTER TABLE `texts`
  MODIFY `eCodeTexts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `eCodeUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`ePublicacionImages`) REFERENCES `publicaciones` (`eCodePublicaciones`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`eCategoriaPublicaciones`) REFERENCES `categorias` (`eCodeCategorias`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`eUserPublicaciones`) REFERENCES `usuarios` (`eCodeUsuarios`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_3` FOREIGN KEY (`eUpdatePublicaciones`) REFERENCES `usuarios` (`eCodeUsuarios`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `texts`
--
ALTER TABLE `texts`
  ADD CONSTRAINT `texts_ibfk_1` FOREIGN KEY (`epublicacionTexts`) REFERENCES `publicaciones` (`eCodePublicaciones`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
