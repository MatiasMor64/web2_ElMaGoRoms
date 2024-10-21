-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 03:15:25
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
(2, 'Accion'),
(5, 'Aventura'),
(8, 'Carreras'),
(7, 'Casual'),
(9, 'Lucha'),
(6, 'Rompecabezas'),
(10, 'Shooter'),
(18, 'test 1'),
(16, 'test 2'),
(17, 'test 3');

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
(19, 'Call of Duty Black Ops', 'https://m.media-amazon.com/images/I/81LRQ0NqKXL.jpg', 'Call of Duty: Black Ops para la Wii es un juego de disparos en primera persona ambientado en la Guerra Fría, desarrollado por Treyarch. El jugador asume el rol de agentes encubiertos en misiones que abarcan lugares como Cuba, Vietnam y la Unión Soviética. La versión para Wii incluye controles adaptados al Wii Remote y gráficos reducidos en comparación con otras plataformas, pero mantiene la jugabilidad central, el modo campaña y multijugador online. También incluye el popular modo ', 1, 2, 10),
(29, 'Mario Kart Wii', 'https://m.media-amazon.com/images/I/81nWR8OwryL.jpg', 'Mario Kart Wii es un videojuego de carreras lanzado por Nintendo en 2008 para la consola Wii. Es la sexta entrega de la serie Mario Kart y continúa con la fórmula característica de carreras arcade protagonizadas por personajes del universo de Mario.  En Mario Kart Wii, los jugadores compiten en carreras utilizando vehículos como karts y motocicletas, cada uno con diferentes características de velocidad, manejo y peso. Hay 32 pistas en total, divididas en 16 nuevas y 16 retro, las cuales son versiones actualizadas de pistas de entregas anteriores de la saga.  El juego ofrece varios modos de juego, tanto para un solo jugador como multijugador, con soporte para hasta cuatro jugadores en pantalla dividida y hasta 12 jugadores en línea. Los modos principales incluyen el Grand Prix (competiciones de varias carreras), Contrarreloj, Versus y Batalla, donde los jugadores pueden competir en batallas de globos o de monedas.  Una característica destacada es el uso del volante de Wii, que permite a los jugadores usar los controles de movimiento para dirigir los vehículos. También se puede jugar con otros tipos de controladores, como el Wii Remote y Nunchuk, el mando clásico o el mando de GameCube.', 8, 2, 8),
(37, 'Metal Gear Solid 4: Sons of the Patriots', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3992LIEqoziacohfZzZs-Mr5ZkSRhCPR9n7F-AjVbMDRlG3L1rdhYON-XQj-rgaseQFs&usqp=CAU', 'CINE ABSOLUTO', 8, 5, 2),
(38, 'GoW Collection Ps3', 'https://acdn.mitiendanube.com/stores/001/609/427/products/god-of-war-collection-ps31-b3652bf40edc29407816182390179701-640-0.jpg', 'un juego muy pero que muy bueno, tan bueno que son 2', 8, 5, 2),
(39, 'Welcome to Animal Crossing', 'https://d.furaffinity.net/art/hatchlingbyheart/1611376270/1611376267.hatchlingbyheart_ac_cd.png', 'Juego relajante de pasar el dia a dia', 8, 3, 7),
(40, 'Animal Crossing: Turning Over a New Leaf', 'https://m.media-amazon.com/images/I/91InrW8-r-L._SL1500_.jpg', 'Juego relajante de pasar el dia a dia, ahora Portatil!', 8, 6, 7),
(41, 'Monster Hunter', 'https://www.retroplace.com/pics/ps2/packshots/78640--monster-hunter-g.png', 'Monster Hunter es un videojuego de acción y rol lanzado por Capcom en 2004 para la PlayStation 2. Es el primer título de la exitosa serie Monster Hunter y presenta una experiencia centrada en la caza de grandes criaturas en un entorno de fantasía prehistórica.  En el juego, los jugadores asumen el papel de un cazador, cuya misión principal es completar encargos que generalmente involucran cazar monstruos gigantes en diversos ecosistemas. El jugador puede usar una variedad de armas y herramientas, como espadas, lanzas, ballestas y trampas, cada una con sus propias ventajas y estilos de combate. No hay una progresión típica de nivel, sino que la mejora del cazador depende de los recursos obtenidos al cazar monstruos, que permiten fabricar nuevas armas y armaduras.  El combate es un aspecto central del juego, siendo más táctico y metódico que los juegos de acción convencionales. Los monstruos tienen patrones de ataque y comportamientos únicos, por lo que observar sus movimientos y planificar estrategias es clave para el éxito.', 8, 1, 5),
(42, 'Dragon Ball Z Budokai Tenkaichi 3 (wii)', 'https://i5.walmartimages.com/seo/Dragon-Ball-Z-Budokai-Tenkaichi-3-Nintendo-Wii_d5dbc7c0-aece-4ede-9d6b-e615150d82c1.03f3011a2eca9f558068d02bc82ee5ca.jpeg', 'un juegazo de peleas', 8, 2, 9),
(43, 'The Legend of Zelda Twilight Princess', 'https://bdjogos.com.br/capas/3778-the-legend-of-zelda-twilight-princess-wii-capa-1.jpg', 'The Legend of Zelda: Twilight Princess es uno de los juegos más aclamados de la legendaria franquicia \"The Legend of Zelda\", desarrollado por Nintendo y lanzado originalmente en 2006 para las consolas GameCube y Wii. Este título se destaca por su atmósfera oscura y madura, presentando una historia más sombría en comparación con sus predecesores, así como una jugabilidad que mezcla mecánicas clásicas de la serie con innovaciones frescas que profundizan la inmersión y la narrativa.  Historia La trama de Twilight Princess comienza en una tranquila aldea llamada Ordon, donde el protagonista, Link, vive una vida pacífica como un humilde granjero. Sin embargo, su destino cambia drásticamente cuando fuerzas oscuras invaden el Reino de Hyrule. Una misteriosa neblina oscura conocida como \"Crepúsculo\" comienza a extenderse por la tierra, convirtiendo a sus habitantes en espíritus y alterando el equilibrio entre la luz y la oscuridad', 8, 2, 5),
(46, 'El Profesor Layton y la Villa Misteriosa', 'https://media.vandal.net/m/6212/professor-layton-y-la-villa-misteriosa-201423203214_1.jpg', 'El Profesor Layton y la Villa Misteriosa es un videojuego de aventura y rompecabezas desarrollado por Level-5 y lanzado para la consola Nintendo DS en 2007 (2008 en Europa y América). Es el primer juego de la serie Profesor Layton, protagonizada por el brillante profesor de arqueología Hershel Layton y su joven aprendiz, Luke Triton.  La historia sigue a Layton y Luke mientras investigan el enigma de la \"Manzana Dorada\" en la peculiar Villa St. Mystere, un lugar lleno de misterios y personajes excéntricos. Mientras exploran la villa, el profesor y Luke se encuentran con una serie de rompecabezas que deben resolver para avanzar en la trama.  El juego combina una narrativa intrigante con más de 130 rompecabezas que abarcan desde problemas lógicos, acertijos visuales, matemáticos y rompecabezas de ingenio. Los jugadores deben usar la pantalla táctil de la DS para interactuar con los acertijos y explorar la villa. También hay \"picarats\", una especie de puntos que se obtienen al resolver los rompecabezas y que sirven para medir el desempeño del jugador.', 13, 12, 6),
(49, 'Gran Turismo 4', 'https://www.gran-turismo.com/images/c/i1UkJZak4T1rSEc.jpg', 'Clasicazo de carreras', 8, 1, 8);

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
(6, 'Nintendo 3ds'),
(12, 'Nintendo Ds'),
(3, 'Nintendo Gamecube'),
(8, 'Nintendo Switch'),
(2, 'Nintendo Wii'),
(5, 'Playstation 3'),
(1, 'PlayStation2'),
(14, 'test 1'),
(11, 'test 2'),
(13, 'test 3');

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
(7, '', 'dada', '$2y$10$zxB025TXzLgC5IXHGf9ZMeHFtNSv4VIFkp7gQLG8fAz/e6Lvufun6', 1),
(8, '', 'webadmin', '$2y$10$n.qitqXRLytMnpS0WstSCu1EP5dw1FzeTE3Pj8NDCCQjOTfUBC.yu', 1),
(13, '', 'noa', '$2y$10$tgW48PQTzho./M1NaYb/yO3gejMv2xERJZ9CZHDh.X8A9sCqsLcma', 1);

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
  MODIFY `ID_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `ID_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `ID_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_2` FOREIGN KEY (`ID_cat`) REFERENCES `categorías` (`ID_cat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `juegos_ibfk_3` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
