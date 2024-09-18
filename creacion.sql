CREATE TABLE `db_canciones`.`cancion` (`id_cancion` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(100) NOT NULL , `genero` VARCHAR(100) NOT NULL , `anio` DATE NOT NULL , PRIMARY KEY (`id_cancion`)); -- Se crea la tabla cancion

CREATE TABLE `db_canciones`.`artista` (`id_artista` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(100) NOT NULL , PRIMARY KEY (`id_cancion`)); -- Se crea la tabla artista

INSERT INTO `cancion` (`id_cancion`, `nombre`, `genero`, `anio`) VALUES (NULL, 'Despacio', 'Indie Rock/Pop', '2018-11-29'); -- Se agregaron datos a cancion

INSERT INTO `cancion` (`id_cancion`, `nombre`, `genero`, `anio`) VALUES (NULL, 'Shadows', 'Indie Pop', '2019-09-14'); -- Se agregaron datos a cancion

INSERT INTO `artista` (`id_artista`, `nombre`) VALUES (NULL, 'Roosevelt'), (NULL, 'Isla de Caras') -- Se agregaron datos a artista

ALTER TABLE `cancion` ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista`(`id_artista`) ON DELETE CASCADE ON UPDATE CASCADE; -- Se crea la foreign key
