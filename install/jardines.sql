DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `idTarea` int(11) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `e-mail` varchar(45) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Poblacion` varchar(50) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `tbl_provincias_cod` char(2) NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Fecha_creacion` date DEFAULT NULL,
  `idOperario` varchar(45) DEFAULT NULL,
  `Fecha_realizacion` date DEFAULT NULL,
  `Anotaciones_anteriores` varchar(500) DEFAULT NULL,
  `Anotaciones_posteriores` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


INSERT INTO `tarea` (`idTarea`, `Descripcion`, `Nombre`, `Apellidos`, `DNI`, `Telefono`, `e-mail`, `Direccion`, `Poblacion`, `CP`, `tbl_provincias_cod`, `Estado`, `Fecha_creacion`, `idOperario`, `Fecha_realizacion`, `Anotaciones_anteriores`, `Anotaciones_posteriores`) VALUES
(1, 'Poda de arbustos', 'Pedro', 'García Márquez', '12345678J', 987456321, 'pedro@hotmail.com', 'Coquina 12', 'Punta Umbría', 21100, '21', 'Pendiente', '2015-11-27', '', '2016-01-15', '', ''),
(2, 'Detección de plagas', 'Isabel María', 'Calvo Mateos', '12345678A', 698745632, 'isa@gmail.com', 'Cabrero 8', 'Logroño', 25132, '26', 'Pendiente', '2015-11-27', '', '2016-01-04', '', ''),
(3, 'Abonado', 'Sara', 'Fernández Pérez', '85236478B', 623456789, 'sara@gmail.com', 'Carrer de Murillo 46', 'Palma de Mallorca', 7006, '07', 'Pendiente', '2015-11-27', '', '2015-12-22', '', ''),
(4, 'Siega de césped', 'Diego', 'Duarte Vázquez', '78945321K', 698745632, 'diego@hotmail.es', 'Jerez 18', 'Fuenlabrada', 28941, '28', 'Pendiente', '2015-11-27', '', '2015-12-30', '', ''),
(5, 'Poda de árboles y palmeras', 'Manuel', 'Sáncha López', '98745612K', 987456321, 'manuel@gmail.com', 'Plaza de la Constitución 1', 'Oviedo', 33120, '33', 'Pendiente', '2015-11-27', '', '2016-01-02', '', ''),
(6, 'Siega de césped', 'Adán', 'Candeas Mozo', '44236598L', 959140201, 'adan@gmail.com', 'Puerta de Sevilla 56', 'Aroche', 21240, '21', 'Pendiente', '2015-11-27', '', '2015-12-26', '', ''),
(7, 'Eliminación de malas hierbas', 'María', 'Domínguez Carrasco', '12345678G', 987452127, 'mari@gmail.com', 'Marquesa 23', 'Valencia', 46019, '46', 'Pendiente', '2015-11-27', '', '2016-01-12', '', ''),
(8, 'Control y programación de riego automático', 'Álvaro', 'Vázquez Tovar', '65451232J', 652147896, 'alvaro@alvaro.com', 'Av. Italia 54', 'Huelva', 21006, '21', 'Pendiente', '2015-11-27', '', '2016-01-30', '', ''),
(9, 'Poda de plantas, arbustos', 'Felisa', 'Zarza Maestre', '45127865V', 987465312, 'felisa@gmail.com', 'Rábida 3', 'El Viso', 14470, '14', 'Pendiente', '2015-11-27', '', '2016-01-12', '', ''),
(10, 'Supervisión, reparación e instalación de césped artificial', 'Antonio', 'Muñiz Carrasco', '78451233G', 959879541, 'antonio@gmail.com', 'Av. Castilla 13', 'Guadalajara', 19070, '19', 'Pendiente', '2015-11-27', '', '2015-12-23', '', ''),
(11, 'Siega de césped', 'Carmen', 'Díaz Márquez', '78954135T', 654789413, 'carmen@outlook.com', 'Camino Viejo 1', 'Atalaya', 6010, '06', 'Pendiente', '2015-11-27', '', '2016-01-21', '', ''),
(12, 'Tratamiento fitosanitario', 'Eva', 'Sánchez Bravo', '23456789H', 632147896, 'eva@gmail.com', 'Málaga 93', 'Rosal de la Frontera', 21250, '21', 'Pendiente', '2015-11-27', '', '2016-01-04', '', '');


DROP TABLE IF EXISTS `tbl_provincias`;
CREATE TABLE IF NOT EXISTS `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

INSERT INTO `tbl_provincias` (`cod`, `nombre`, `comunidad_id`) VALUES
('01', 'Alava', 16),
('02', 'Albacete', 7),
('03', 'Alicante', 10),
('04', 'Almera', 1),
('05', 'Avila', 8),
('06', 'Badajoz', 11),
('07', 'Balears (Illes)', 4),
('08', 'Barcelona', 9),
('09', 'Burgos', 8),
('10', 'Cáceres', 11),
('11', 'Cádiz', 1),
('12', 'Castellón', 10),
('13', 'Ciudad Real', 7),
('14', 'Córdoba', 1),
('15', 'Coruña (A)', 12),
('16', 'Cuenca', 7),
('17', 'Girona', 9),
('18', 'Granada', 1),
('19', 'Guadalajara', 7),
('20', 'Guipzcoa', 16),
('21', 'Huelva', 1),
('22', 'Huesca', 2),
('23', 'Jaén', 1),
('24', 'León', 8),
('25', 'Lleida', 9),
('26', 'Rioja (La)', 17),
('27', 'Lugo', 12),
('28', 'Madrid', 13),
('29', 'Málaga', 1),
('30', 'Murcia', 14),
('31', 'Navarra', 15),
('32', 'Ourense', 12),
('33', 'Asturias', 3),
('34', 'Palencia', 8),
('35', 'Palmas (Las)', 5),
('36', 'Pontevedra', 12),
('37', 'Salamanca', 8),
('38', 'Santa Cruz de Tenerife', 5),
('39', 'Cantabria', 6),
('40', 'Segovia', 8),
('41', 'Sevilla', 1),
('42', 'Soria', 8),
('43', 'Tarragona', 9),
('44', 'Teruel', 2),
('45', 'Toledo', 7),
('46', 'Valencia', 10),
('47', 'Valladolid', 8),
('48', 'Vizcaya', 16),
('49', 'Zamora', 8),
('50', 'Zaragoza', 2),
('51', 'Ceuta', 18),
('52', 'Melilla', 19);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL,
  `nombre` varchar(16) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `tipo` varchar(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO `users` (`idusers`, `nombre`, `password`, `tipo`) VALUES
(1, 'superadmin', '8451ba8a14d79753', 'Administrador'),
(2, 'Pepe', '265392dc27827786', 'Operario'),
(3, 'Juan', 'b49a5780a99ea812', 'Operario'),
(4, 'Luis', 'faea5242a00c52da', 'Operario'),
(5, 'Antonio', 'a08f08bac39aeae6', 'Administrador');

ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `fk_tarea_tbl_provincias_idx` (`tbl_provincias_cod`);


ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

ALTER TABLE `tarea`
  MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;

ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_tbl_provincias` FOREIGN KEY (`tbl_provincias_cod`) REFERENCES `tbl_provincias` (`cod`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TRIGGER `insertar_fecha` BEFORE INSERT ON `tarea`
 FOR EACH ROW SET NEW.Fecha_creacion=CURRENT_DATE();
