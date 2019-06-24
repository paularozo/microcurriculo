-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-06-2019 a las 01:31:39
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_micro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `codigo_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `codigo_persona`) VALUES
(1, 9999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `semestre` int(11) NOT NULL,
  `intensidadhoraria` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `nombre_plandeestudios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codigo`, `nombre`, `semestre`, `intensidadhoraria`, `creditos`, `nombre_plandeestudios`) VALUES
(9999, 'dificil', 4, 3, 4, 'ingenieria civil'),
(11111, 'calculo diferencial', 1, 4, 4, 'ingenieria civil'),
(21111, 'calculo integral', 2, 4, 4, 'ingenieria civil'),
(101101, 'calculo integral', 2, 4, 4, 'tecnico profesional en procesamiento de alimentos'),
(102102, 'etica', 3, 4, 4, 'tecnico profesional en fabricacion industrial de p'),
(109109, 'fisica I', 2, 3, 3, 'electromecanica'),
(111111, 'fisica II', 3, 3, 3, 'ingenieria civil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `nombre` varchar(50) NOT NULL,
  `nombre_facultad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`nombre`, `nombre_facultad`) VALUES
('CIENCIAS DEL MEDIO AMBIENTE', 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('CIENCIAS PECUARIAS', 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('BIOLOGIA', 'CIENCIAS BASICAS'),
('FISICA', 'CIENCIAS BASICAS'),
('MATEMATICAS Y ESTADISTICA', 'CIENCIAS BASICAS'),
('QUIMICA', 'CIENCIAS BASICAS'),
('ATENCION CLINICA Y REHABILITACION', 'CIENCIAS DE LA SALUD'),
('PROMOCION, PROTECCION Y GESTION EN SALUD', 'CIENCIAS DE LA SALUD'),
('CIENCIAS ADMINISTRATIVAS', 'CIENCIAS EMPRESARIALES'),
('CIENCIAS CONTABLES Y FINANCIERAS', 'CIENCIAS EMPRESARIALES'),
('ESTUDIOS INTERNACIONALES Y DE FRONTERA', 'CIENCIAS EMPRESARIALES'),
('ANDRAGOGIA COMUNICACIÓN Y MULTIMEDIA', 'EDUCACION, ARTES Y HUMANIDADES'),
('ARQUITECTURA DISEÑO Y URBANISMO', 'EDUCACION, ARTES Y HUMANIDADES'),
('HUMANIDADES, SOCIALES E IDIOMAS', 'EDUCACION, ARTES Y HUMANIDADES'),
('CONSTRUCCIONES CIVILES VÍAS Y TRANSPORTES', 'INGENIERIA'),
('DISEÑO MECANICO, MATERIAL Y PROCESOS', 'INGENIERIA'),
('ELECTRICIDAD Y ELECTRONICA', 'INGENIERIA'),
('GEOTECNIA', 'INGENIERIA'),
('HIDRAULICA', 'INGENIERIA'),
('SISTEMAS E INFORMATICA', 'INGENIERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `codigo_persona` int(11) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `codigo_persona`, `nombre_departamento`) VALUES
(2, 1080, 'SISTEMAS E INFORMATICA'),
(3, 1111, 'SISTEMAS E INFORMATICA'),
(4, 1178, 'SISTEMAS E INFORMATICA'),
(5, 1995, 'SISTEMAS E INFORMATICA'),
(6, 6209, 'MATEMATICAS Y ESTADISTICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `codigo_persona` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `codigo_persona`, `id_matricula`) VALUES
(2, 959, 1),
(3, 1081, 3),
(4, 1130, 4),
(5, 1111, 77),
(6, 1178, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`nombre`) VALUES
('CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('CIENCIAS BASICAS'),
('CIENCIAS DE LA SALUD'),
('CIENCIAS EMPRESARIALES'),
('EDUCACION, ARTES Y HUMANIDADES'),
('INGENIERIA'),
('nueva'),
('nueva2'),
('nueva3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `grupo_numero` int(11) NOT NULL,
  `codigo_asignatura` int(11) NOT NULL,
  `grupo` char(1) NOT NULL DEFAULT 'A',
  `codigo_docente` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`grupo_numero`, `codigo_asignatura`, `grupo`, `codigo_docente`) VALUES
(2, 101101, 'A', 1080),
(3, 102102, 'A', 1111),
(4, 109109, 'A', 1178),
(5, 111111, 'A', 1995),
(6, 111111, 'B', 6209),
(7, 111111, 'C', 0),
(8, 111111, 'D', 0),
(9, 111111, 'E', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupomatricula`
--

CREATE TABLE `grupomatricula` (
  `grupo_numero` int(11) NOT NULL,
  `id_matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupomatricula`
--

INSERT INTO `grupomatricula` (`grupo_numero`, `id_matricula`) VALUES
(2, 3),
(5, 3),
(3, 4),
(6, 4),
(4, 5),
(5, 6),
(5, 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(50) NOT NULL,
  `semestre` int(11) NOT NULL,
  `codigo_programa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id`, `semestre`, `codigo_programa`) VALUES
(2, 2, 115),
(3, 1, 119),
(4, 2, 119),
(5, 1, 111),
(6, 2, 111),
(7, 1, 211),
(8, 2, 211),
(9, 1, 116),
(10, 2, 116),
(11, 1, 109),
(12, 2, 109),
(13, 1, 112),
(14, 2, 112),
(15, 1, 118),
(16, 2, 118),
(17, 1, 192),
(18, 2, 192),
(19, 1, 198),
(20, 2, 198),
(21, 1, 113),
(22, 2, 113),
(23, 1, 114),
(24, 2, 114),
(25, 1, 117),
(26, 2, 117),
(27, 1, 120),
(28, 2, 120),
(29, 1, 102),
(30, 2, 102),
(31, 1, 136),
(32, 2, 136),
(33, 1, 137),
(34, 2, 137),
(35, 1, 150),
(36, 2, 150),
(37, 1, 135),
(38, 2, 135),
(39, 1, 134),
(40, 2, 134),
(41, 1, 234),
(42, 2, 234),
(43, 1, 133),
(44, 2, 133),
(45, 1, 180),
(46, 2, 180),
(47, 1, 181),
(48, 2, 181),
(49, 1, 148),
(50, 2, 148),
(51, 1, 121),
(52, 2, 121),
(53, 1, 125),
(54, 2, 125),
(55, 1, 122),
(56, 2, 122),
(57, 1, 123),
(58, 2, 123),
(59, 1, 126),
(60, 2, 126),
(61, 1, 195),
(62, 2, 195),
(63, 1, 162),
(64, 2, 162),
(65, 1, 164),
(66, 2, 164),
(67, 1, 165),
(68, 2, 165),
(69, 1, 161),
(70, 2, 161),
(71, 1, 163),
(72, 2, 163),
(73, 1, 100),
(74, 2, 100),
(75, 1, 101),
(76, 2, 101),
(77, 2, 119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `microcurriculo`
--

CREATE TABLE `microcurriculo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `formato` varchar(50) NOT NULL,
  `archivo` varchar(50) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `microcurriculo`
--

INSERT INTO `microcurriculo` (`id`, `nombre`, `peso`, `formato`, `archivo`, `id_grupo`) VALUES
(101101101, 'calculo integral', '12kb', 'word', 'curriculo2', 2),
(102102102, 'etica', '12kb', 'word', 'curriculo3', 3),
(109109109, 'fisica I', '12kb', 'word', 'curriculo4', 4),
(111111111, 'fisica II', '12kb', 'word', 'curriculo5', 5),
(111111112, 'fisica II', '20 KB', '.docx', 'microcurriculo.dock', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`codigo`, `nombre`, `apellidos`, `correo`, `contrasena`, `tipo`) VALUES
(959, 'carlos enrique', 'guerrero acosta', 'carlosenriquega@ufps.edu.co', '0000', 2),
(1080, 'oscar alberto', 'gallardo perez', 'oscargallardo@ufps.edu.co', '0000', 3),
(1081, 'paula andrea', 'rozo corredor', 'paulaandrearc@ufps.edu.co', '0000', 2),
(1111, 'carlos eduardo', 'pardo garcia', 'carlospardo@ufps.edu.co', '0000', 3),
(1130, 'jerson andres', 'ortiz calderon', 'jersonandresoc@ufps.edu.co', '0000', 2),
(1178, 'jose martin', 'calixto cely', 'mcalixto@ufps.edu.co', '0000', 3),
(1995, 'judith del pilar', 'rodriguez tenjo', 'judithdelpilarrt@ufps.edu.co', '0000', 3),
(1996, 'jairo alberto', 'fuentes camargo', 'jairoalbertofc@ufps.edu.cov', '0000', 3),
(2049, 'maria del pilar', 'rojas puentes', 'pilarrojas@ufps.edu.co', '0000', 3),
(3556, 'milton jesus', 'vera contreras', 'miltonjesusvc@ufps.edu.co', '0000', 3),
(4412, 'eduard gilberto', 'puerto cuadros', 'eduardpuerto@ufps.edu.co', '0000', 3),
(4608, 'matias', 'herrera caceres', 'matiashc@ufps.edu.co', '0000', 3),
(5096, 'claudia yamile', 'gomez llanez', 'claudiaygomez@ufps.edu.co', '0000', 3),
(6209, 'nelly rosana', 'diaz leal', 'nellyrosanadl@ufps.edu.co', '0000', 3),
(9999, 'admin', 'admin', 'admin@ufps.edu.co', '0000', 1),
(1150099933, 'juan', 'pepea', 'algo@algo.es', '0000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plandeestudios`
--

CREATE TABLE `plandeestudios` (
  `nombre` varchar(50) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plandeestudios`
--

INSERT INTO `plandeestudios` (`nombre`, `codigo`) VALUES
('tecnologia agroindustrial', 100),
('tecnico profesional en procesamiento de alimentos', 101),
('tecnico profesional en fabricacion industrial de p', 102),
('ingenieria civil', 111),
('ingenieria civil(cohorte especial)', 111),
('mecanica', 112),
('tecnologia en gestion y desarrollo de productos ce', 113),
('tecnologia en gestion de procesos de manufactura', 114),
('sistemas', 115),
('electronica', 116),
('minas', 118),
('ingenieria industrial', 119),
('tecnico profesional en produccion de ceramica arte', 120),
('administracion de empresas-diurna', 121),
('contaduria publica-diurna', 122),
('contaduria publica-nocturna', 123),
('administracion de empresas-nocturna', 125),
('comercio internacional', 126),
('comunicacion social', 133),
('trabajo social-diurna', 134),
('derecho', 135),
('licenciatura en matematicas', 136),
('licenciatura en ciencias naturales y educacion amb', 137),
('tecnologia de regencia en farmacia', 148),
('arquitectura', 150),
('ingenieria biotecnologica', 161),
('ingenieria agronomica', 162),
('ingenieria pecuaria', 163),
('ingenieria agroindustrial', 164),
('ingenieria ambiental', 165),
('enfermeria', 180),
('seguridad y salud en el trabajo', 181),
('tecnologia en obras civiles-presencial', 192),
('quimica industrial', 195),
('tecnologia en procesos industriales', 198),
('trabajo social-nocturna', 234),
('algo ', 77777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `nombre` varchar(50) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre_facultad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`nombre`, `codigo`, `nombre_facultad`) VALUES
('TECNICO PROFESIONAL EN PROCESAMIENTO DE ALIMENTOS', 101, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('TÉCNICO PROFESIONAL EN FABRICACIÓN INDUSTRIAL DE P', 102, 'INGENIERIA'),
('INGENIERIA ELECTROMECANICA', 109, 'INGENIERIA'),
('INGENIERIA CIVIL - DIURNA', 111, 'INGENIERIA'),
('INGENIERIA MECANICA', 112, 'INGENIERIA'),
('TECNOLOGIA EN GESTION Y DESARROLLO DE PRODUCTOS CE', 113, 'INGENIERIA'),
('TECNOLOGIA EN GESTION DE PROCESOS DE MANUFACTURA', 114, 'INGENIERIA'),
('INGENIERIA DE SISTEMAS', 115, 'INGENIERIA'),
('INGENIERIA ELECTRONICA', 116, 'INGENIERIA'),
('TÉCNICO PROFESIONAL EN PROCESOS DE MANUFACTURA DE ', 117, 'INGENIERIA'),
('INGENIERIA DE MINAS', 118, 'INGENIERIA'),
('INGENIERIA INDUSTRIAL', 119, 'INGENIERIA'),
('TÉCNICO PROFESIONAL EN PRODUCCIÓN DE CERÁMICA ARTE', 120, 'INGENIERIA'),
('ADMINISTRACION DE EMPRESAS - DIURNA', 121, 'CIENCIAS EMPRESARIALES'),
('CONTADURIA PUBLICA - DIURNA', 122, 'CIENCIAS EMPRESARIALES'),
('CONTADURIA PUBLICA - NOCTURNA', 123, 'CIENCIAS EMPRESARIALES'),
('ADMINISTRACION DE EMPRESAS - NOCTURNA', 125, 'CIENCIAS EMPRESARIALES'),
('COMERCIO INTERNACIONAL', 126, 'CIENCIAS EMPRESARIALES'),
('COMUNICACION SOCIAL', 133, 'EDUCACION, ARTES Y HUMANIDADES'),
('TRABAJO SOCIAL - DIURNA', 134, 'EDUCACION, ARTES Y HUMANIDADES'),
('DERECHO', 135, 'EDUCACION, ARTES Y HUMANIDADES'),
('LICENCIATURA EN MATEMATICAS', 136, 'EDUCACION, ARTES Y HUMANIDADES'),
('LICENCIATURA EN CIENCIAS NATURALES Y EDUCACION AMB', 137, 'EDUCACION, ARTES Y HUMANIDADES'),
('TECNOLOGIA DE REGENCIA EN FARMACIA', 148, 'CIENCIAS DE LA SALUD'),
('ARQUITECTURA', 150, 'EDUCACION, ARTES Y HUMANIDADES'),
('INGENIERIA BIOTECNOLOGICA', 161, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('INGENIERIA ARGONOMICA', 162, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('INGENIERIA PECUARIA', 163, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('INGENIERIA AGROINDUSTRIAL', 164, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('INGENIERIA AMBIENTAL', 165, 'CIENCIAS AGRARIAS Y DEL AMBIENTE'),
('ENFERMERIA', 180, 'CIENCIAS DE LA SALUD'),
('SEGURIDAD Y SALUD EN EL TRABAJO', 181, 'CIENCIAS DE LA SALUD'),
('TECNOLOGIA EN OBRAS CIVILES - PRESENCIAL', 192, 'INGENIERIA'),
('QUIMICA INDUSTRIAL', 195, 'CIENCIAS BASICAS'),
('TECNOLOGIA EN PROCESOS INDUSTRIALES', 198, 'INGENIERIA'),
('INGENIERIA CIVIL(COHORTE ESPECIAL)', 211, 'INGENIERIA'),
('TRABAJO SOCIAL - NOCTURNA', 234, 'EDUCACION, ARTES Y HUMANIDADES'),
('ingenieria algo', 77777, 'nueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `porcentaje` float NOT NULL,
  `id_prueba` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `fecha`, `porcentaje`, `id_prueba`, `id_unidad`, `id_tema`) VALUES
(1022, '0000-00-00', 60, 4, 101101102, 1011011022),
(1033, '0000-00-00', 50, 4, 102102103, 1021021033),
(1044, '0000-00-00', 88, 3, 109109104, 1091091044),
(1155, '0000-00-00', 76, 3, 111111115, 1111111155),
(1156, '2019-06-10', 75, 6, 111111115, 1111111155),
(1157, '2019-06-10', 75, 77, 111111115, 1111111155),
(1158, '2019-06-10', 75, 4, 111111117, 1111111156);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `actividadpresencial` varchar(200) NOT NULL,
  `trabajoindependiente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `id_unidad`, `calificacion`, `nombre`, `actividadpresencial`, `trabajoindependiente`) VALUES
(1011011022, 101101102, 0, 'integrales', '4', '8'),
(1021021033, 102102103, 0, 'valores', '4', '8'),
(1091091044, 109109104, 0, 'fuerza', '3', '6'),
(1111111155, 111111115, 0, 'electrones', '3', '6'),
(1111111156, 111111116, 0, 'electronesss', '3', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`) VALUES
(2, 'ESTUDIANTE'),
(3, 'DOCENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre_contenido` varchar(50) NOT NULL,
  `id_microcurriculo` int(11) NOT NULL,
  `horaspresenciales` int(11) NOT NULL,
  `horasindependientes` int(11) NOT NULL,
  `horatotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre_contenido`, `id_microcurriculo`, `horaspresenciales`, `horasindependientes`, `horatotal`) VALUES
(101101102, 'unidad2', 101101101, 4, 8, 12),
(102102103, 'unidad3', 102102102, 4, 8, 12),
(109109104, 'unidad4', 109109109, 3, 6, 9),
(111111115, 'unidad5', 111111111, 3, 6, 9),
(111111116, 'unidad6', 111111111, 84748, 84750, 84753),
(111111117, 'unidad 1', 111111112, 93700, 93703, 93715);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_persona` (`codigo_persona`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_asignatura_plandeestudios` (`nombre_plandeestudios`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `fk_departamento_facultad` (`nombre_facultad`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_departamento` (`nombre_departamento`),
  ADD KEY `fk_docente_persona` (`codigo_persona`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudiante_matricula` (`id_matricula`),
  ADD KEY `fk_estudiante_persona` (`codigo_persona`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`grupo_numero`),
  ADD KEY `fk_grupo_asignatura` (`codigo_asignatura`);

--
-- Indices de la tabla `grupomatricula`
--
ALTER TABLE `grupomatricula`
  ADD PRIMARY KEY (`grupo_numero`,`id_matricula`),
  ADD KEY `fk_grupomatricula_matricula` (`id_matricula`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matricula_programa` (`codigo_programa`);

--
-- Indices de la tabla `microcurriculo`
--
ALTER TABLE `microcurriculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_microcurriculo` (`id_grupo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_persona_tipo` (`tipo`);

--
-- Indices de la tabla `plandeestudios`
--
ALTER TABLE `plandeestudios`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `fk_plandeestudios_programa` (`codigo`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_programa_facultad` (`nombre_facultad`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prueba_tema` (`id_tema`),
  ADD KEY `fk_prueba_unidad` (`id_unidad`),
  ADD KEY `fk_prueba_matricula` (`id_prueba`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unidad_tema` (`id_unidad`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_unidad_tema` (`id_microcurriculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `grupo_numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `microcurriculo`
--
ALTER TABLE `microcurriculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111113;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111118;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_plandeestudios` FOREIGN KEY (`nombre_plandeestudios`) REFERENCES `plandeestudios` (`nombre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_persona` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_persona` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `microcurriculo`
--
ALTER TABLE `microcurriculo`
  ADD CONSTRAINT `fk_grupo_microcurriculo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`grupo_numero`);

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
