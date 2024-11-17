-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2024 a las 00:09:49
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
-- Base de datos: `db_songs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(200) NOT NULL,
  `artist_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_img`) VALUES
(10, 'NAFTA', 'https://123.news/files/image/218/218450/665901b0c7235_800_450!.jpg?s=128a5c6166bf9e3561d4bef3ba04391c&d=1719960732'),
(11, 'Daft Punk', 'https://media.pitchfork.com/photos/6033c6098b8835d37316a598/2:1/w_2560%2Cc_limit/Daft-Punk.jpg'),
(12, 'Andres Calamaro', 'https://media.airedesantafe.com.ar/p/10dd2cad2dcec2b9176d59306f68e8cd/adjuntos/268/imagenes/003/861/0003861995/1200x0/smart/andres-calamarojpg.jpg'),
(13, 'Sonic Youth', 'https://beat.com.au/wp-content/uploads/2019/07/Sonic.png'),
(14, 'Roosevelt', 'https://indiehoy.com/wp-content/uploads/2021/04/polydans.jpg'),
(15, 'Luis Alberto Spinetta', 'https://static.nationalgeographicla.com/files/styles/image_3200/public/biosspinetta_fb1.jpg?w=1900&h=1197'),
(16, 'Charly García', 'https://www.notaalpie.com.ar/wp-content/uploads/2021/10/2-2.jpg'),
(17, 'Sumo', 'https://jazzrocksoul.com/wp-content/uploads/2018/01/Sumo.jpg'),
(18, 'Los Piojos', 'https://infonegocios.info/content/images/2024/08/30/484498/los-piojos-1600x900.jpg'),
(19, 'Oasis', 'https://surgfm.com/wp-content/uploads/2023/04/noel-and-liam-gallagher-scaled.jpg'),
(20, 'Radiohead', 'https://bunny-wp-pullzone-cfq8jqyfsb.b-cdn.net/wp-content/uploads/2023/09/radiohead-band-members-1-1.jpeg'),
(21, 'Conociendo Rusia', 'https://tupermitidodesiempre.com.ar/download/multimedia.normal.9c1fa00c136dfc43.RFNDMDgzMTRfbm9ybWFsLndlYnA%3D.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `song_name` varchar(250) NOT NULL,
  `song_genre` varchar(200) NOT NULL,
  `song_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `song`
--

INSERT INTO `song` (`song_id`, `artist_id`, `song_name`, `song_genre`, `song_year`) VALUES
(15, 13, 'Kool Thing', 'Alternative Rock', 1990),
(17, 11, 'Instant Crush (feat. Julian Casablancas)', 'Electronic', 2013),
(18, 11, 'Something About Us', 'Electronic', 2001),
(26, 10, 'La Carta', 'Soul', 2019),
(30, 14, 'Shadows', 'New Wave', 2018),
(31, 21, 'Heridas Dulces', 'Indie Rock', 2024),
(32, 11, 'Giorgio by Moroder', 'Electronic', 2013),
(33, 13, 'Sunday', 'Alternative Rock', 1998);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'webadmin', '$2y$10$kQqfeP5/j7VqcZeQ03kNdOCvRcV1iMMeu3XgM5kEHL6OLB/bjlFba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indices de la tabla `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `artist_id` (`artist_id`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `song`
--
ALTER TABLE `song`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk_artist` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
