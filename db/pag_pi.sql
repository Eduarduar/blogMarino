-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 23:49:11
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
  `tNameCategorias` varchar(100) DEFAULT NULL,
  `bStatusCategorias` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`eCodeCategorias`, `tNameCategorias`, `bStatusCategorias`) VALUES
(1, 'NEWS', 1),
(2, 'KNOW', 1),
(3, 'INVESTIGATION', 1),
(4, 'LIFE', 1),
(5, 'POLLUTION', 1),
(6, 'NEW', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codes`
--

CREATE TABLE `codes` (
  `eCodeCodes` int(11) NOT NULL,
  `tCodeCodes` varchar(100) NOT NULL,
  `eUserCodes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`eCodeCodes`, `tCodeCodes`, `eUserCodes`) VALUES
(5, 'FW75CehvgKNtZAVm96Xs0focqydb2wpknUrzx4EBQMuLTia31JRjDGPlISOYH8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `eCodeConfig` int(11) NOT NULL,
  `tNameConfig` varchar(100) NOT NULL,
  `tContentConfig` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`eCodeConfig`, `tNameConfig`, `tContentConfig`) VALUES
(1, 'visits', '9');

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
(3, './source/public/img/lnrksgwmnh.jpg', 2, 3),
(4, './source/public/img/l64hmwf9j6f.jpg', 2, 4),
(5, './source/public/img/dzs73pcu49c.jpg', 4, 4),
(6, './source/public/img/jfo1busrmu.jpg', 2, 5),
(7, './source/public/img/0ey70dvpm1j7.jpg', 2, 6),
(8, './source/public/img/zt8kuee3oj.jpg', 2, 7),
(9, './source/public/img/ve89jdedh8m.jpg', 2, 8),
(10, './source/public/img/f9o2owpyyxu.jpg', 4, 8);

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
  `eCategoriaPublicaciones` int(11) NOT NULL,
  `bStatusPublicaciones` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`eCodePublicaciones`, `eUserPublicaciones`, `tTitlePublicaciones`, `fCreationPublicaciones`, `fUpdatePublicaciones`, `eUpdatePublicaciones`, `eCategoriaPublicaciones`, `bStatusPublicaciones`) VALUES
(3, 1, 'What is the importance of marine life?', '2024-03-20 12:16:34', NULL, NULL, 2, 1),
(4, 1, 'Marine life researcher', '2024-03-20 12:17:54', NULL, NULL, 3, 1),
(5, 1, 'Biodiversity and marine ecosystems', '2024-03-20 12:18:50', NULL, NULL, 4, 1),
(6, 1, 'Evolution', '2024-03-20 12:21:07', NULL, NULL, 2, 1),
(7, 1, 'WHY IS MARINE LIFE IMPORTANT?', '2024-03-20 12:22:44', NULL, NULL, 2, 1),
(8, 1, 'WHAT IS MARINE LIFE?', '2024-03-20 12:24:44', NULL, NULL, 2, 1);

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
(4, 'Earth\'s oceans are home to millions of animal and plant species, as well as potentially millions more that have not yet been discovered. They are delicately balanced ecosystems and their healthy functioning is key to the balance of all life on Earth. Many people see marine life as completely separate from life on land, but the two are much more connected than we might think. People\'s behavior and decisions have a great impact on the well-being of our aquatic friends.', 1, 3),
(5, 'Marine mammals are, in general, larger marine creatures that live underwater, but also need to breathe air. Around the world, these marine mammals continue to lose their lives unnecessarily due to habitat loss, capture and killing by fishing fleets (\"bycatch\"), hunting and noise pollution.', 3, 3),
(6, 'Oceanography is the science that studies all the physical, chemical and biological processes that occur in the oceans, as well as the spectacular and complex relationships that these processes have with the rest of the planet.', 1, 4),
(7, 'Los llamados oceanólogos son los que se encargan de realizar investigaciones en torno a los océanos. Sus actividades diarias pueden variar, pero de manera general, se encargan de recopilar datos y obtener resultados para posteriormente, compartir sus hallazgos con el mundo. Parte de su trabajo la realizan en un laboratorio, pero para descubrir, experimentar y estudiar a profundidad el océano deben pasar tiempo en contacto con la vida marina.', 3, 4),
(10, 'Cada vez hay más evidencias que demuestran el papel esencial que desempeña la biodiversidad marina para la salud del planeta y el bienestar social. Los sectores de la pesca y la acuicultura son una fuente de ingresos para cientos de millones de personas, especialmente para las familias de bajos ingresos, y contribuyen directa e indirectamente a su seguridad alimentaria. Los ecosistemas marinos proporcionan innumerables servicios a las comunidades costeras de todo el mundo. Por ejemplo, los ecosistemas de los manglares son una importante fuente de alimento para más de 210 millones de personas4, pero también prestan otros muchos servicios como medios de subsistencia, agua limpia, productos forestales y protección contra la erosión y los fenómenos meteorológicos extremos.', 1, 5),
(11, 'No es sorprendente que, dados los recursos que el océano proporciona, se hayan desarrollado asentamientos humanos cerca de la costa: el 38% de la población mundial vive a menos de 100 km de la costa, el 44% a menos de 150 km, el 50% a menos de 200 km y el 67% a menos de 400 km5. Aproximadamente el 61% del total del producto interno bruto del mundo proviene del océano y de las zonas costeras situadas a menos de 100 km del litoral6. Estas zonas, donde la densidad de población es 2,6 veces más elevada que en las zonas del interior, se benefician directa e indirectamente de los bienes y servicios de los ecosistemas costeros y marinos, que contribuyen a la erradicación de la pobreza, el crecimiento económico sostenido, la seguridad alimentaria y la creación de medios de subsistencia sostenibles y de empleo inclusivo, al tiempo que albergan una rica biodiversidad y mitigan los efectos del cambio climático7.', 3, 5),
(12, 'Current species are a stage in the process of evolution, their diversity is the product of a long series of specialization and extinction events.30 The common descent of organisms was initially deduced from four simple truths about organisms: First , they have geographical distributions that cannot be explained by local adaptation processes. Second, the diversity of life is not a set of completely disjoint organisms, but rather organisms that share morphological similarities. Third, vestigial traits without a clear purpose resemble functional ancestral traits, and eventually organisms can be classified using these similarities in a hierarchy of nested groups, similar to a family tree.31 However, modern research has suggested that, due to horizontal gene transfer, this \"tree of life\" may be more complicated than a simple branching tree since some genes have spread independently between distantly related species.32​33​Species of the past have also left records of its evolutionary history', 1, 6),
(13, 'Fossils, along with the comparative anatomy of current organisms, constitute the morphological or anatomical record.34​ By comparing the anatomies of modern and extinct species, paleontologists can infer the lineages of those species. However, this approach is most successful for organisms that have hard body parts, such as shells, bones, or teeth. Furthermore, because prokaryotes, such as bacteria and archaea, share a limited set of common morphologies, their fossils do not provide information about their ancestors.', 3, 6),
(14, 'The Convention also serves as a focal point on biodiversity for the entire United Nations system and the basis for other international instruments and processes to integrate biodiversity issues into their work; It is therefore a central element of the global framework for sustainable development. The Strategic Plan for Biodiversity 2011-2020 and its 20 Biodiversity Targets that States Parties to the Convention adopted in Nagoya, Aichi Prefecture, Japan in 2010 provide an effective framework for cooperation to achieve a future in which the global community can benefit sustainably and equitably from biodiversity, without affecting the ability of future generations to do so as well.', 1, 7),
(15, 'Earth\'s oceans are home to millions of animal and plant species, as well as potentially millions more that have not yet been discovered. They are delicately balanced ecosystems and their healthy functioning is key to the balance of all life on Earth. Many people see marine life as completely separate from life on land, but the two are much more connected than we might think. People\'s behavior and decisions have a great impact on the well-being of our aquatic friends.', 1, 8),
(16, 'Unfortunately, they are also very vulnerable to changing ocean temperatures, a direct result of climate degradation. In 2016, Australia\'s Great Barrier Reef experienced a 30% loss of coral reef due to a nine-month marine heatwave, the largest reef loss ever recorded. Reef fishing has also led to species loss, as food chains are disrupted and predators cannot survive.', 3, 8);

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
(1, 'Prueba', 'Prueba', 'Prueba@gmail.com', '$2y$10$h1hcC63aG3aAIWhutI3dwueWRu7hTMDW9GEyk3.9AxvLKAtQMgsdO', 'Admin', '2024-02-08 03:50:11', '2024-02-08 03:50:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`eCodeCategorias`);

--
-- Indices de la tabla `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`eCodeCodes`),
  ADD KEY `eUserCodes` (`eUserCodes`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`eCodeConfig`);

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
  MODIFY `eCodeCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `codes`
--
ALTER TABLE `codes`
  MODIFY `eCodeCodes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `eCodeConfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `eCodeImages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `eCodePublicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `texts`
--
ALTER TABLE `texts`
  MODIFY `eCodeTexts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `eCodeUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`eUserCodes`) REFERENCES `usuarios` (`eCodeUsuarios`) ON UPDATE CASCADE;

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
