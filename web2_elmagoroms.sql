-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 00:16:45
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
-- Base de datos: `web2_elmagoroms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorías`
--

CREATE TABLE `categorías` (
  `ID_cat` int(11) NOT NULL,
  `categoría` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorías`
--

INSERT INTO `categorías` (`ID_cat`, `categoría`) VALUES
(2, 'Acción'),
(1, 'Aventura'),
(4, 'Lucha'),
(3, 'Rompecabezas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `ID_juego` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `descripción` varchar(10000) DEFAULT NULL,
  `ID_usuario` int(11) NOT NULL,
  `ID_plat` int(11) NOT NULL,
  `ID_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`ID_juego`, `nombre`, `imagen`, `descripción`, `ID_usuario`, `ID_plat`, `ID_cat`) VALUES
(1, 'The Legend of Zelda Twilight Princess', 'https://bdjogos.com.br/capas/3778-the-legend-of-zelda-twilight-princess-wii-capa-1.jpg', 'The Legend of Zelda: Twilight Princess es un juego de aventura y acción, parte de la famosa franquicia The Legend of Zelda, desarrollado por Nintendo y lanzado en 2006 para GameCube y Wii. Es conocido por su estilo más oscuro y realista, y por el uso de mecánicas de transformación de Link en un lobo, así como por la introducción de un mundo crepuscular paralelo que contrasta con el reino de Hyrule. El juego sigue a Link, un joven granjero de la pacífica aldea de Ordon. Un día, Hyrule cae bajo la influencia de una dimensión oscura llamada \"Crepúsculo\", que cubre el reino en sombras. Al ser arrastrado a esta dimensión, Link se transforma en un lobo, lo que le permite interactuar de una manera especial con el mundo del Crepúsculo. Pronto conoce a Midna, una misteriosa criatura que lo guía en su viaje para restaurar el equilibrio en el reino. Juntos, Link y Midna deben encontrar las piezas de la \"Fused Shadow\" y liberar a los espíritus guardianes de Hyrule, quienes han sido derrotados por la invasión del Crepúsculo. Midna, que pertenece al Reino Crepuscular, tiene sus propios motivos para detener al villano Zant, un tirano que se ha apoderado del trono en su mundo y está utilizando el poder del Crepúsculo para esclavizar a Hyrule. A medida que la historia avanza, Link y Midna descubren que Zant es solo un peón de un mal aún mayor: Ganondorf, el archienemigo clásico de la serie, quien busca dominar tanto Hyrule como el Reino Crepuscular.', 1, 2, 1),
(2, 'God of War ', 'https://i.3djuegos.com/juegos/3569/god_of_war/fotos/ficha/god_of_war-2736533.jpg', '\"God of War\" para PS2 sigue la historia de Kratos, un guerrero espartano que busca venganza contra Ares, el dios de la guerra, tras ser traicionado. Atraviesa mitologías griegas, enfrentando criaturas y resolviendo acertijos, mientras busca redención. Con una jugabilidad fluida y combates intensos, ', 1, 1, 2),
(3, 'Monster Hunter ', 'https://i.redd.it/ax8r7ziupb8c1.jpeg', '\"Monster Hunter\" para PS2 es un juego de acción y rol donde los jugadores asumen el rol de cazadores en un mundo lleno de criaturas gigantes. Los jugadores deben rastrear, cazar y recolectar materiales de monstruos para crear armas y armaduras. La cooperación en línea y la estrategia son clave para ', 1, 1, 1),
(6, 'Dragon Ball Z Budokai Tenkaichi 3', 'https://i5.walmartimages.com/seo/Dragon-Ball-Z-Budokai-Tenkaichi-3-Nintendo-Wii_d5dbc7c0-aece-4ede-9d6b-e615150d82c1.03f3011a2eca9f558068d02bc82ee5ca.jpeg', '\"Dragon Ball Z: Budokai Tenkaichi 3\" para Wii es un juego de lucha que ofrece un extenso elenco de personajes de la franquicia. Con combates 3D, los jugadores pueden realizar ataques especiales y transformaciones icónicas. El modo historia recorre las sagas de la serie, mientras que el multijugador ', 2, 2, 4),
(10, 'Super Mario Galaxy', 'https://m.media-amazon.com/images/I/71gnh672D1L.jpg', '\"Super Mario Galaxy\" para Wii es un juego de plataformas en 3D donde Mario viaja por distintos planetas para rescatar a la Princesa Peach de Bowser. Con mecánicas innovadoras de gravedad, los jugadores saltan entre mundos únicos, resuelven acertijos y recolectan estrellas. La jugabilidad, el diseño visual y la música crean una experiencia mágica.', 3, 2, 1),
(13, 'Dragon Ball Z Budokai Tenkaichi 4', 'https://i5.walmartimages.com/seo/Dragon-Ball-Z-Budokai-Tenkaichi-3-Nintendo-Wii_d5dbc7c0-aece-4ede-9d6b-e615150d82c1.03f3011a2eca9f558068d02bc82ee5ca.jpeg', '\"Dragon Ball Z: Budokai Tenkaichi 3\" para Wii es un juego de lucha que ofrece un extenso elenco de personajes de la franquicia. Con combates 3D, los jugadores pueden realizar ataques especiales y transformaciones icónicas. El modo historia recorre las sagas de la serie, mientras que el multijugador ', 2, 2, 4),
(14, 'God of War 2', 'https://i.3djuegos.com/juegos/3569/god_of_war/fotos/ficha/god_of_war-2736533.jpg', '\"God of War\" para PS2 sigue la historia de Kratos, un guerrero espartano que busca venganza contra Ares, el dios de la guerra, tras ser traicionado. Atraviesa mitologías griegas, enfrentando criaturas y resolviendo acertijos, mientras busca redención. Con una jugabilidad fluida y combates intensos, ', 1, 1, 2),
(15, 'Monster Hunter Dos', 'https://i.redd.it/ax8r7ziupb8c1.jpeg', '\"Monster Hunter\" para PS2 es un juego de acción y rol donde los jugadores asumen el rol de cazadores en un mundo lleno de criaturas gigantes. Los jugadores deben rastrear, cazar y recolectar materiales de monstruos para crear armas y armaduras. La cooperación en línea y la estrategia son clave para ', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `ID_plat` int(11) NOT NULL,
  `consola` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`ID_plat`, `consola`) VALUES
(2, 'Nintendo Wii'),
(1, 'PlayStation2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `permisos` int(11) NOT NULL DEFAULT 1 COMMENT 'niveles de acceso a elementos de desarrollador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `usuario`, `password`, `permisos`) VALUES
(1, 'Matías', 'matiasmorcillo128@gmail.com', '123', 2),
(2, 'Iago', 'iagomduran@gmail.com', '456', 2),
(3, 'Benjamín', 'benjapro777@gmail.com', '123', 1),
(4, 'Lucas', 'lucasretro27@yahoo.com', '456', 1),
(6, 'Tester', 'webadmin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorías`
--
ALTER TABLE `categorías`
  ADD PRIMARY KEY (`ID_cat`),
  ADD UNIQUE KEY `categoría` (`categoría`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`ID_juego`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `ID_plat` (`ID_plat`),
  ADD KEY `ID_cat` (`ID_cat`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`ID_plat`),
  ADD UNIQUE KEY `consola` (`consola`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorías`
--
ALTER TABLE `categorías`
  MODIFY `ID_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `ID_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `ID_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_2` FOREIGN KEY (`ID_cat`) REFERENCES `categorías` (`ID_cat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `juegos_ibfk_3` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `juegos_ibfk_4` FOREIGN KEY (`ID_plat`) REFERENCES `plataformas` (`ID_plat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
