-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 00:10:21
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
  `artist_name` varchar(255) NOT NULL,
  `artist_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_img`) VALUES
(2, 'Elvis Presleyyyyyy', 'https://images.photowall.com/products/79541/jailhouse-rock-elvis-presley-2.jpg?h=699&q=85'),
(3, 'Michael Jackson', ''),
(4, 'Madonna', ''),
(5, 'Queen', ''),
(6, 'Led Zeppelin', ''),
(7, 'Whitney Houston', ''),
(8, 'Eminem', ''),
(9, 'Beyoncé', ''),
(10, 'Taylor Swift', ''),
(11, 'Bob Dylan', ''),
(12, 'The Rolling Stones', ''),
(13, 'Adele', ''),
(14, 'Prince', ''),
(15, 'David Bowie', ''),
(17, 'Roosevelt', ''),
(23, 'djdjdj', 'https://cdns-images.dzcdn.net/images/artist/935d35a45e061e7640a0becfa42cef6e/1900x1900-000000-80-0-0.jpg'),
(24, 'Los Palmeras', 'https://www.eldiariodelcentrodelpais.com/wp-content/uploads/2017/09/P13-f2-los-palmeras.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `song_genre` varchar(255) NOT NULL,
  `song_year` int(10) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `song`
--

INSERT INTO `song` (`song_id`, `song_name`, `song_genre`, `song_year`, `artist_id`) VALUES
(2, 'Hound Dog', 'Rock & Roll', 1956, 2),
(3, 'Billie Jean', 'Pop', 1982, 3),
(4, 'Like a Prayer', 'Pop', 1989, 4),
(5, 'Bohemian Rhapsody', 'Rock', 1975, 5),
(6, 'Stairway to Heaven', 'Rock', 1971, 6),
(7, 'I Will Always Love You', 'Pop', 1992, 7),
(8, 'Lose Yourself', 'Hip Hop', 2002, 8),
(9, 'Single Ladies', 'R&B', 2008, 9),
(10, 'Shake It Off', 'Pop', 2014, 10),
(11, 'Like a Rolling Stone', 'Folk Rock', 1965, 11),
(12, 'Paint It Black', 'Rock', 1966, 12),
(13, 'Rolling in the Deep', 'Soul', 2010, 13),
(14, 'Purple Rain', 'Rock', 1984, 14),
(15, 'Heroes', 'Rock', 1977, 15),
(16, 'Return to Sender', 'Rock', 1962, 2),
(17, 'Bombon Asesino', 'Cumbia', 1998, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `fk_artist_song` (`artist_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `fk_artist_song` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
