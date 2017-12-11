-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2017 a las 03:28:45
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medisud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendarcontrol`
--

CREATE TABLE `agendarcontrol` (
  `nombrePac` varchar(30) NOT NULL,
  `rutPac` int(8) NOT NULL,
  `nombreMed` varchar(80) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `Registro` int(6) NOT NULL,
  `Rut` int(8) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `diagnostico` varchar(50) NOT NULL,
  `complemento` text NOT NULL,
  `procedimiento` text NOT NULL,
  `indicacion` text NOT NULL,
  `egreso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`Registro`, `Rut`, `motivo`, `fecha`, `diagnostico`, `complemento`, `procedimiento`, `indicacion`, `egreso`) VALUES
(1, 17819253, 'Dolor intenso en la parte superior del abdomen', '20-11-2017 13:30:00', 'Colico Biliar', 'Problema en la vesicula biliar.', 'Extirpar la vesicula biliar. Tecnica laparoscopica.\r\n', 'Evite el consumo de bebidas alcoholicas. El alcohol podria danar la vesicula biliar y empeorar sus sintomas. Mantenga un peso saludable. ', 'Hospitalizacion'),
(2, 17819253, 'Dificultad al Respirar', '21-11-2017 14:30:00', 'Bronquitis', 'Inflamacion de los conductos que llevan aire a los pulmones. ', 'Examenes de diagnostico uso de espirometro.', 'Descansar, tomar liquidos y aspirina (para adultos) y acetaminofen (paracetamol) para bajar la fiebre.', 'Alta Medica'),
(3, 17819253, 'Intoxicacion Etilica ', '22-11-2017 14:00:00', 'Arritmia Grave', 'Intoxicacion etilica provoco arritmia grave.', 'Se usan betabloqueantes (Metoprolol y atenolol) para disminuir las frecuencias cardiacas rapidas.', 'Mantener al paciente hospitalizado y realizar valoracion de la frecuencia cardiaca, tension arterial, perfusion, estado de conciencia y diaforesis cada 8 horas.', 'Hospitalizacion'),
(4, 18852886, 'Dolor de Estomago', '23-11-2017 16:30:00', 'Diarrea', 'Alteracion intestinal.', 'Informacion otorgada por el paciente.', 'Beber agua, jugos de frutas, bebidas deportivas, bebidas gaseosas sin cafeina y caldos salados para reponer los fluidos y electrolitos perdidos. A medida que los sintomas mejoran, se pueden comer alimentos suaves y blandos.\r\nTomar loperamida 2mg cada 12 horas.', 'Alta Medica'),
(5, 19268796, 'Dificultad al Respirar', '24-11-2017 13:00:00', 'Crisis Obstructiva', 'Obstruccion bronquial aguda con sibilancias', 'Verificacion de obstruccion de las vias respiratorias.', 'Uso de salbutamol cada 4 horas.', 'Alta Medica'),
(6, 19581730, 'Dificultad repentina para caminar, mareos, perdida de equilibrio.', '24-11-2017 15:30:05', 'Accidente Vascular', 'Obstruccion de un vaso sanguineo que interrumpe repentinamente el suministro de sangre a una parte del cerebro.', 'Se realiza Tomografia Computada y resonancia magnetica', 'Terapia aguda para el accidente vascular para detener la progresion del ataque, disolviendo el coagulo que bloquea el riego sanguineo o deteniendo la hemorragia segun sea el origen del ataque. ', 'Hospitalizacion'),
(7, 18852886, 'Dolor intenso en la parte superior del abdomen', '25-11-2017 12:30:00', 'Colico Biliar', 'Problema en la vesicula biliar.', 'Extirpar la vesicula biliar. Tecnica laparoscopica.\n', 'Evite el consumo de bebidas alcoholicas. El alcohol podria danar la vesicula biliar y empeorar sus sintomas. Mantenga un peso saludable. ', 'Hospitalizacion'),
(8, 19581730, 'Dolor de Estomago', '25-11-2017 13:30:00', 'Diarrea', 'Alteracion intestinal.', 'Informacion otorgada por el paciente.\n', 'Beber agua, jugos de frutas, bebidas deportivas, bebidas gaseosas sin cafeina y caldos salados para reponer los fluidos y electrolitos perdidos. A medida que los sintomas mejoran, se pueden comer alimentos suaves y blandos.\nTomar loperamida 2mg cada 12 horas.', 'Alta Medica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad`
--

CREATE TABLE `enfermedad` (
  `Rut` int(11) NOT NULL,
  `NomEnfermedad` varchar(150) NOT NULL,
  `NomMedicamento` varchar(150) NOT NULL,
  `DosisMg` decimal(10,0) NOT NULL,
  `PeriodoHr` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `enfermedad`
--

INSERT INTO `enfermedad` (`Rut`, `NomEnfermedad`, `NomMedicamento`, `DosisMg`, `PeriodoHr`) VALUES
(17819253, 'Diabetes Mellitus', 'Metformina', '500', 12),
(17819253, 'Hemofilia', 'Ibuprofeno', '120', 12),
(17819253, 'VIH/SIDA', 'Atazanavir', '150', 12),
(18852886, 'Hipertension', 'Betaplex', '6', 24),
(18852886, 'Hipotiroidismo', 'Livotiroxina', '100', 24),
(19268796, 'Diabetes Mellitus', 'Metformina', '500', 12),
(19581730, 'Epilepsia', 'Fenitoina', '100', 12),
(19581730, 'Fibrosis Quistica', 'Cetraxal', '250', 12),
(19581853, 'Artritis Reumatoidea', 'Acetaminofen', '350', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `Rut` int(8) NOT NULL,
  `Dv` varchar(1) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `FechaNac` varchar(10) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Domicilio` varchar(80) NOT NULL,
  `Comuna` varchar(30) NOT NULL,
  `Localidad` varchar(20) NOT NULL,
  `Fono` int(9) NOT NULL,
  `Prevision` varchar(15) NOT NULL,
  `Altura` decimal(3,2) NOT NULL,
  `Peso` decimal(5,2) NOT NULL,
  `TipoSangre` char(2) NOT NULL,
  `FactorRH` char(8) NOT NULL,
  `alergias` varchar(100) NOT NULL,
  `NombreFamiliar` varchar(80) NOT NULL,
  `TelefonoFamiliar` int(9) NOT NULL,
  `NombreFamiliar2` varchar(80) NOT NULL,
  `TelefonoFamiliar2` int(9) NOT NULL,
  `NombreFamiliar3` varchar(80) NOT NULL,
  `TelefonoFamiliar3` int(9) NOT NULL,
  `CodRFID` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`Rut`, `Dv`, `Nombre`, `FechaNac`, `Sexo`, `Domicilio`, `Comuna`, `Localidad`, `Fono`, `Prevision`, `Altura`, `Peso`, `TipoSangre`, `FactorRH`, `alergias`, `NombreFamiliar`, `TelefonoFamiliar`, `NombreFamiliar2`, `TelefonoFamiliar2`, `NombreFamiliar3`, `TelefonoFamiliar3`, `CodRFID`) VALUES
(17819253, '1', 'Mario Andres Tapia Contreras', '19-09-1991', 'M', 'Bicentenario Jorge Llanos 188', 'Los Andes', 'Los Andes', 967091213, 'FONASA A', '1.85', '95.00', 'B', 'POSITIVO', 'Sin Alergias', 'Julia Rosa Contreras Delgado', 950998225, '', 0, '', 0, 'C06DC3A'),
(18852886, '4', 'Oliver Osvaldo Consterla Araya', '10-07-1994', 'M', 'Villa Departamental block 1501 dpto 13', 'San Felipe', 'San Felipe', 987612427, 'FONASA C', '1.70', '82.00', 'AB', 'NEGATIVO', 'Amoxicilina', 'Valentino Andres Consterla Araya', 993034643, '', 0, '', 0, '36C69EBB'),
(19268796, '9', 'Javiera Alejandra Cortes Celedon', '21-09-1996', 'F', 'Galicia 127 Villa Espana ', 'Rinconada', 'Los Andes', 996122709, 'FONASA C', '1.61', '82.00', 'O', 'POSITIVO', 'Sin Alergias', 'Mitzi Andrea Sanchez Pereira', 974718521, 'Pamela Alejandra Celedon Saavedra', 971064753, 'Mauricio Eufemio Cortes Ahumada', 976162225, '30FCDC3A'),
(19581730, '8', 'Diego Ignacio Ramirez Machuca', '17-03-1997', 'M', 'San Franciso s/n Curimon', 'San Felipe', 'San Felipe', 989606805, 'FONASA C', '1.65', '61.00', 'O', 'POSITIVO', 'Sulfamidas', 'Jose Miguel Ramirez Nehemias ', 957454581, '', 0, '', 0, '20B2CF3A'),
(19581853, '3', 'Mitzi Andrea Sanchez Pereira', '23-04-1997', 'F', 'Los Claveles 108 Villa El Castillo ', 'Calle Larga', 'Los Andes', 974718521, 'FONASA C', '1.55', '72.00', 'O', 'POSITIVO', 'Sin Alergias', 'Fanny Andrea Pereira Contreras', 997419778, '', 0, '', 0, 'CFA4949');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urgencia`
--

CREATE TABLE `urgencia` (
  `codUrgencia` int(5) NOT NULL,
  `run` int(8) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `temperatura` decimal(3,1) DEFAULT NULL,
  `pulso` int(3) DEFAULT NULL,
  `frespiratorio` int(3) DEFAULT NULL,
  `presion` varchar(6) DEFAULT NULL,
  `saturacion` int(3) DEFAULT NULL,
  `acciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `urgencia`
--

INSERT INTO `urgencia` (`codUrgencia`, `run`, `fecha`, `direccion`, `latitud`, `longitud`, `temperatura`, `pulso`, `frespiratorio`, `presion`, `saturacion`, `acciones`) VALUES
(1, 18852886, '27-10-2017 13:21:25', 'Manso de Velasco 2009, San Felipe, RegiÃ³n de ValparaÃ­so', '-32.7566908', '-70.7349533', '37.0', 120, 16, '119/79', 97, 'Controlar ritmo cardiaco'),
(2, 19581730, '30-10-2017 00:39:35', 'Arturo Prat 682, Los Andes, RegiÃ³n de ValparaÃ­so', '-32.8455055', '-70.6059225', '39.7', 90, 16, '119/79', 95, 'Se aplican compresas frias, medicamento paracetamol.'),
(3, 19268796, '01-11-2017 12:17:01', 'Autopista Los Libertadores 421-299, Rinconada, RegiÃ³n de ValparaÃ­so', '-32.8286581', '-70.6885831', '37.0', 80, 16, '119/79', 80, 'Uso de hidrocorticoides.'),
(4, 18852886, '19-11-2017 00:37:19', 'Salinas 201 San Felipe RegiÃ³n de ValparaÃ­so', '-32.7383613', '-70.7211567', '39.7', 80, 16, '119/79', 91, 'Se aplican compresas frias, medicamento tylenol.'),
(5, 19581853, '20-11-2017 15:30:11', 'Arturo Prat 460-304, San Felipe, RegiÃ³n de ValparaÃ­so', '-32.7506372', '-70.7228585', '39.5', 82, 16, '119/79', 96, 'Uso de ibupirac.'),
(6, 19581730, '22-11-2017 18:33:09', 'Arturo Prat 255-643 San Felipe RegiÃ³n de ValparaÃ­so', '-32.7496551', '-70.7268584', '39.5', 90, 17, '119/79', 80, 'Uso de oxigeno. Medicamento Paracetamol.'),
(7, 17819253, '26-11-2017 23:45:49', 'Tres Carrera 430, Los Andes, RegiÃ³n de ValparaÃ­so', '-32.8309535', '-70.598115', '37.0', 70, 20, '140/90', 98, 'Buscar signos de descompensacion cardiaca.\r\nSe comparan presiones y pulsos en MIs y MSs.'),
(8, 19581730, '27-11-2017 20:35:30', 'Navarro 157-211 San Felipe RegiÃ³n de ValparaÃ­so', '-32.7482225', '-70.7277836', '37.0', 70, 18, '119/79', 79, 'Uso de Oxigeno e hidrocorticoides.'),
(9, 17819253, '27-11-2017 00:08:57', 'Gral Freire 99-1, Los Andes, RegiÃ³n de ValparaÃ­so', '-32.8372173', '-70.5961565', '39.5', 70, 16, '119/79', 97, 'Medicamento usado Tylenol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` int(8) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `tipoUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `pass`, `nombre`, `tipoUsuario`) VALUES
(12578795, 'd67326a22642a324aa1b0745f2f17abb', 'Jorge Mauricio Sanchez Liberon', 'Doctor'),
(12718687, '669ffc150d1f875819183addfc842cab', 'Pamela Alejandra Celedon Saavedra', 'Admin'),
(17819253, 'de2f15d014d40b93578d255e6221fd60', 'Mario Andres Tapia Contreras', 'Paciente'),
(18852886, 'acae273a5a5c88b46b36d65a25f5f435', 'Oliver Osvaldo Consterla Araya', 'Paciente'),
(19268796, 'f1ceaa098b571dba1218c315bd1cca6c', 'Javiera Alenjandra Cortes Celedon', 'Paciente'),
(19581730, '078c007bd92ddec308ae2f5115c1775d', 'Diego Ignacio Ramirez Machuca', 'Paciente'),
(19581853, 'b34b236ac474c2ba18fc5922e36e0e34', 'Mitzi Andrea Sanchez Pereira', 'Paciente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendarcontrol`
--
ALTER TABLE `agendarcontrol`
  ADD PRIMARY KEY (`fecha`,`hora`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`Registro`,`Rut`),
  ADD KEY `FK_paciente_control` (`Rut`);

--
-- Indices de la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD PRIMARY KEY (`Rut`,`NomEnfermedad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `urgencia`
--
ALTER TABLE `urgencia`
  ADD PRIMARY KEY (`codUrgencia`,`run`),
  ADD KEY `FK_paciente_urgencia` (`run`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `Registro` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `urgencia`
--
ALTER TABLE `urgencia`
  MODIFY `codUrgencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `FK_paciente_control` FOREIGN KEY (`Rut`) REFERENCES `paciente` (`Rut`);

--
-- Filtros para la tabla `enfermedad`
--
ALTER TABLE `enfermedad`
  ADD CONSTRAINT `FK_PACIENTE_ENFERMEDAD` FOREIGN KEY (`Rut`) REFERENCES `paciente` (`Rut`);

--
-- Filtros para la tabla `urgencia`
--
ALTER TABLE `urgencia`
  ADD CONSTRAINT `FK_paciente_urgencia` FOREIGN KEY (`run`) REFERENCES `paciente` (`Rut`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
