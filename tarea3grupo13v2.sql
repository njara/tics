-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2016 a las 01:56:33
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea3grupo13`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_responde_pregunta`
--

CREATE TABLE `alumno_responde_pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno_responde_pregunta`
--

INSERT INTO `alumno_responde_pregunta` (`id_pregunta`, `id_alumno`, `respuesta`) VALUES
(1, 18076523, 'A'),
(2, 18076523, 'B'),
(2, 18143272, 'C'),
(1, 18143272, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'SANTIAGO'),
(2, 'TALCA'),
(3, 'SERENA'),
(4, 'RANCAGUA'),
(5, 'VALDIVIA'),
(6, 'OSORNO'),
(7, 'SAN ANTONIO'),
(8, 'CALAMA'),
(9, 'LAMPA'),
(10, 'BUIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `nombre`, `id_ciudad`) VALUES
(1, 'SANTIAGO', 1),
(2, 'CANELA', 2),
(3, 'LOS VILOS', 3),
(4, 'OVALLE', 4),
(5, 'CONCON', 5),
(6, 'QUINTERO', 6),
(7, 'CARTAGENA', 7),
(8, 'CATEMU', 8),
(9, 'PUTAENDO', 9),
(10, 'LIMACHE', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `direccion_ejecuccion` varchar(200) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `id_asistente` int(11) NOT NULL,
  `valor_curso` int(11) NOT NULL,
  `numero_horas_diarias` int(11) NOT NULL,
  `numero_oc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `fecha_inicio`, `fecha_termino`, `direccion_ejecuccion`, `id_comuna`, `id_horario`, `id_instructor`, `id_asistente`, `valor_curso`, `numero_horas_diarias`, `numero_oc`) VALUES
(1, 'OPERACIONES CON MATERIALES PELIGROSOS', '2016-11-13', '2016-11-15', 'CALLE MORANDE 651', 4, 1, 7019131, 8180158, 200000, 8, 1),
(2, 'ROTATIVO DE EXTINTORES', '2016-11-15', '2016-11-17', 'TOESCA 1929', 1, 2, 7019131, 8180158, 150000, 6, 2),
(3, 'EVALUACION Y EMERGENCIAS', '2016-11-17', '2016-11-19', 'CLUB HIPICO 475', 3, 6, 7019131, 8180158, 350000, 6, 3),
(4, 'COMBATE DE INCENDIOS INCIPIENTES', '2016-11-22', '2016-11-23', 'MONEDA 200', 7, 7, 7019131, 8180158, 300000, 8, 4),
(5, 'RESCATE EN ALTURA', '2016-11-24', '2016-11-26', 'AVENIDA PRESIDENTE FREI MONTALVA 3092', 1, 9, 7019131, 8180158, 550000, 6, 5),
(6, 'RESCATE TECNICO CON CUERDAS', '2016-12-01', '2016-12-02', 'SAN MARTIN 721', 9, 10, 7019131, 8180158, 550000, 4, 6),
(7, 'ALMACENAMIENTO DE MAT-PEL DC 78', '2016-11-21', '2016-11-22', 'TOBALABA', 3, 5, 7019131, 8180158, 190000, 2, 7),
(8, 'CERO DAÑO EN MINERIA', '2016-11-16', '2016-11-18', 'AVENIDA OSA 1200', 4, 6, 7019131, 8180158, 1500000, 2, 8),
(9, 'CONSCIENCIA AMBIENTAL', '2016-11-24', '2016-11-26', 'VERGARA 111', 1, 8, 7019131, 8180158, 350000, 4, 9),
(10, 'OPERACIONES EN CAMION PLUMA', '2016-11-28', '2016-11-30', 'FRANCISCO DE VILLAGRA 127', 5, 6, 7019131, 8180158, 690000, 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_tiene_alumnos`
--

CREATE TABLE `curso_tiene_alumnos` (
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso_tiene_alumnos`
--

INSERT INTO `curso_tiene_alumnos` (`id_curso`, `id_alumno`) VALUES
(1, 18076523),
(2, 18143272);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rut` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `direccion_comercial` varchar(200) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `id_giro_comercial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`rut`, `nombre`, `id_contacto`, `direccion_comercial`, `id_comuna`, `telefono`, `id_giro_comercial`) VALUES
(766436111, 'SAMSUNG', 11556695, 'EXPLOSION EN 123', 8, '123123123', 8),
(766436123, 'DCC', 19217203, 'BEAUCHEF 851', 5, '123987654', 5),
(766436222, 'HUAWEI', 19217203, 'CHINATOWN 132', 9, '987987987', 9),
(766436333, 'APPLE', 12412975, 'AVENIDA AMERICO VESPUCIO SUR 221', 7, '56945930057', 7),
(766436456, 'MICROSOFT', 19217203, 'SILICON VALLEY 987', 6, '999999999', 6),
(766436645, 'ESKIP', 12412975, 'VALLE HERMOSO 222', 2, '987654321', 2),
(766436781, 'NINJUP', 19217203, 'MARCHANT PEREIRA 150', 3, '945844715', 3),
(766436783, 'UNIVERSIDAD DE CHILE', 12412975, 'BEAUCHEF 850', 4, '987123654', 4),
(766436888, 'BLIZZARD', 12412975, 'CUPERTINO 6969', 10, '69696969', 10),
(766436985, 'SODIMAC', 19217203, 'AVENIDA FREI MONTALVA 9999', 1, '123456789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `nombre`, `duracion`, `fecha`, `id_curso`) VALUES
(1, 'EVALUACION 1', 60, '2016-11-13', 1),
(2, 'EVALUACION 2', 60, '2016-11-14', 2),
(3, 'EVALUACION 3', 60, '2016-11-15', 3),
(4, 'EVALUACION 4', 60, '2016-11-16', 4),
(5, 'EVALUACION 5', 60, '2016-11-17', 5),
(6, 'EVALUACION 6', 60, '2016-11-18', 6),
(7, 'EVALUACION 7', 60, '2016-11-19', 7),
(8, 'EVALUACION 8', 60, '2016-11-20', 8),
(9, 'EVALUACION 9', 60, '2016-11-21', 9),
(10, 'EVALUACION 10', 60, '2016-11-22', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_tiene_pregunta`
--

CREATE TABLE `evaluacion_tiene_pregunta` (
  `id_evaluacion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion_tiene_pregunta`
--

INSERT INTO `evaluacion_tiene_pregunta` (`id_evaluacion`, `id_pregunta`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro_comercial`
--

CREATE TABLE `giro_comercial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `giro_comercial`
--

INSERT INTO `giro_comercial` (`id`, `nombre`) VALUES
(1, 'SERVICIOS INTEGRALES DE SEGURIDAD'),
(2, 'TRANSPORTE DE VALORES'),
(3, 'ACTIVIDADES DE FOTOGRAFÍA PUBLICITARIA'),
(4, 'DISENADORES DE INTERIORES'),
(5, 'ACTIVIDADES DE CLÍNICAS VETERINARIAS'),
(6, 'SERVICIOS PERSONALES DE EDUCACIÓN'),
(7, 'FERIAS DE EXPOSICIONES CON FINES EMPRESARIALES'),
(8, 'EVALUACIÓN Y CALIFICACIÓN DEL GRADO DE SOLVENCIA'),
(9, 'SERVICIOS PROFESIONALES DE TOPOGRAFÍA Y AGRIMENSUR'),
(10, 'ARBITRAJES, SÍNDICOS, PERITOS Y OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `hora_inicio` varchar(50) NOT NULL,
  `hora_final` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `hora_inicio`, `hora_final`) VALUES
(1, '09:00', '09:30'),
(2, '10:00', '10:30'),
(3, '11:00', '11:30'),
(4, '12:00', '12:30'),
(5, '13:00', '13:30'),
(6, '14:00', '14:30'),
(7, '15:00', '15:30'),
(8, '16:00', '16:30'),
(9, '17:00', '17:30'),
(10, '18:00', '18:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_compra`
--

CREATE TABLE `orden_de_compra` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_ejecutivo` int(11) NOT NULL,
  `id_gestor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_de_compra`
--

INSERT INTO `orden_de_compra` (`id`, `id_curso`, `id_empresa`, `id_ejecutivo`, `id_gestor`) VALUES
(1, 1, 766436111, 10656404, 17731556),
(2, 2, 766436111, 10656404, 17731556);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'PUEDE CREAR CURSO'),
(2, 'PUEDE MODIFICAR CURSO'),
(3, 'PUEDE ELIMINAR CURSO'),
(4, 'PUEDE CREAR EMPRESA'),
(5, 'PUEDE MODIFICAR EMPRESA'),
(6, 'PUEDE ELIMINAR EMPRESA'),
(7, 'PUEDE CREAR EVALUACION'),
(8, 'PUEDE MODIFICAR EVALUACION'),
(9, 'PUEDE ELIMINAR EVALUACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `rut` int(11) NOT NULL,
  `dv` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `sexo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `ultima_sesion` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`rut`, `dv`, `nickname`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo`, `sexo`, `fecha_registro`, `ultima_sesion`, `status`, `avatar`) VALUES
(7019131, 8, 'nickname', 'MARIA', 'MARTINEZ', 'DEL CANTO', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(8180158, 4, 'nickname', 'NELSON', 'ESPINOZA', 'COFRE', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(10656404, 3, 'nickname', 'VERONICA', 'QUITRAL', 'OLIVOS', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(11111111, 1, '', 'PERSONA', 'RANDOM', 'RANDOM', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(11556695, 4, 'Daniel1989', 'DANIEL', 'JARA', 'VALENZUELA', 'daniel@tics.cl', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(12412975, 3, '', 'ALEJANDRA', 'ROJAS', 'LIRA', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(17731556, 7, '', 'BRAULIO', 'LOPEZ', 'PINO', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(18001481, 0, 'nickname', 'CONY', 'ESPINOZA', 'QUITRAL', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(18076523, 9, 'Nico1992', 'Nicolas', 'Jara', 'Rojas', 'nicolas@tics.cl', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(18143272, 1, '', 'PABLO', 'GOMEZ', 'MARTINEZ', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(19217203, 9, '', 'KARINA', 'ESPINOZA', 'QUITRAL', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(180765239, 0, 'nick', 'nombre', 'paterno', 'materno', 'correo@tics.cl', 1, '2016-12-11 22:36:42', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_es_alumno`
--

CREATE TABLE `persona_es_alumno` (
  `id_rut` int(11) NOT NULL,
  `numero_credencial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_es_alumno`
--

INSERT INTO `persona_es_alumno` (`id_rut`, `numero_credencial`) VALUES
(18143272, 2147483647),
(18076523, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_es_contacto`
--

CREATE TABLE `persona_es_contacto` (
  `id_rut` int(11) NOT NULL,
  `cargo_en_la_empresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_es_contacto`
--

INSERT INTO `persona_es_contacto` (`id_rut`, `cargo_en_la_empresa`) VALUES
(11556695, 'CEO'),
(12412975, 'CFO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_tiene_rol`
--

CREATE TABLE `persona_tiene_rol` (
  `id_rut` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_tiene_rol`
--

INSERT INTO `persona_tiene_rol` (`id_rut`, `id_rol`) VALUES
(7019131, 1),
(8180158, 2),
(10656404, 3),
(11111111, 1),
(17731556, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `alternativa_a` varchar(200) NOT NULL,
  `alternativa_b` varchar(200) NOT NULL,
  `alternativa_c` varchar(200) NOT NULL,
  `alternativa_d` varchar(200) NOT NULL,
  `alternativa_e` varchar(200) NOT NULL,
  `alternativa_correcta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `alternativa_e`, `alternativa_correcta`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut suscipit metus ac sagittis aliquam. Nunc ullamcorper tempus ipsum, porttitor luctus leo luctus sed. Donec euismod neque ut odio hendrerit bi', 'A', 'B', 'C', 'D', 'E', 'A'),
(2, 'Phasellus eget nisi vitae magna cursus condimentum sed sit amet felis. Sed consectetur sagittis nibh, nec dictum libero efficitur a. Etiam vulputate massa purus, non condimentum dolor dignissim in. Na', 'A', 'B', 'C', 'D', 'E', 'C'),
(3, 'Quisque a aliquam ipsum. Donec eleifend, dolor vel gravida porttitor, magna lorem tincidunt sapien, quis tempor massa mauris quis justo. Maecenas rutrum neque at fermentum posuere. Vivamus condimentum', 'A', 'B', 'C', 'D', 'E', 'D'),
(4, 'Quisque placerat sem sit amet turpis tincidunt interdum congue eu mi. Sed sed enim luctus ex imperdiet vehicula eget vitae quam. Fusce condimentum, est quis dapibus aliquet, ipsum tortor auctor nisi, ', 'A', 'B', 'C', 'D', 'E', 'A'),
(5, 'Donec ac blandit dolor, aliquam finibus justo. Nam commodo dolor nec metus iaculis interdum. Sed ipsum lacus, suscipit sit amet eleifend et, viverra nec odio. Mauris viverra sodales ex ac efficitur. M', 'A', 'B', 'C', 'D', 'E', 'C'),
(6, 'Vestibulum et iaculis tortor, quis varius neque. Ut at congue enim. Integer id eros massa. Sed quis nibh orci. Vestibulum ultricies diam sit amet dui auctor luctus.', 'A', 'B', 'C', 'D', 'E', 'A'),
(7, 'Suspendisse in est ac nulla commodo faucibus. Duis non diam quam. Nam eget orci tortor. Ut hendrerit, turpis ac mollis pretium, leo libero placerat erat, et dignissim ligula justo sit amet felis. Susp', 'A', 'B', 'C', 'D', 'E', 'BATMAN. LA RESPUESTA ES SIEMPRE BATMAN'),
(8, 'Duis sed mattis nisi. Sed nec commodo urna, id accumsan orci. Maecenas eu pretium orci, sit amet mollis lorem. Suspendisse aliquet condimentum convallis. Curabitur a sollicitudin urna. In finibus dui ', 'A', 'B', 'C', 'D', 'E', 'A'),
(9, 'Sed sed mi dignissim, porta quam eget, euismod nibh. Nulla tincidunt, massa non volutpat volutpat, nunc dui pulvinar enim, interdum mattis nisi orci vel dolor. Praesent euismod ex at efficitur gravida', 'A', 'B', 'C', 'D', 'E', 'B'),
(10, 'Nunc a lorem vehicula sem semper dignissim a in risus. Integer convallis scelerisque enim mollis convallis. Nunc sit amet elit interdum, cursus leo non, pretium turpis. Suspendisse potenti. Nunc turpi', 'A', 'B', 'C', 'D', 'E', 'LA RESPUESTA ESTA EN TU CORAZON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'INSTRUCTOR'),
(2, 'ASISTENTE'),
(3, 'EJECUTIVO COMERCIAL'),
(4, 'GESTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`) VALUES
(1, 'Usuario Activo'),
(2, 'Usuario Baneado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VERIFICADOR'),
(3, 'DIGITADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario_tiene_permisos`
--

CREATE TABLE `tipo_usuario_tiene_permisos` (
  `id_tipo_usuario` int(11) NOT NULL,
  `id_permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario_tiene_permisos`
--

INSERT INTO `tipo_usuario_tiene_permisos` (`id_tipo_usuario`, `id_permisos`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `dv` varchar(1) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `dv`, `password`) VALUES
(1, 18001481, '0', '123456'),
(2, 18076523, '9', '1234'),
(3, 11556695, '4', '1234'),
(8, 180765239, '1', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_es_tipo_usuario`
--

CREATE TABLE `usuario_es_tipo_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_es_tipo_usuario`
--

INSERT INTO `usuario_es_tipo_usuario` (`id_usuario`, `id_tipo_usuario`) VALUES
(1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno_responde_pregunta`
--
ALTER TABLE `alumno_responde_pregunta`
  ADD KEY `id_pregunta` (`id_pregunta`,`id_alumno`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comuna` (`id_comuna`,`id_horario`,`id_instructor`,`id_asistente`),
  ADD KEY `id_instructor` (`id_instructor`),
  ADD KEY `id_asistente` (`id_asistente`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `curso_tiene_alumnos`
--
ALTER TABLE `curso_tiene_alumnos`
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `id_contacto` (`id_contacto`,`id_comuna`,`id_giro_comercial`),
  ADD KEY `id_giro_comercial` (`id_giro_comercial`),
  ADD KEY `id_comuna` (`id_comuna`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `evaluacion_tiene_pregunta`
--
ALTER TABLE `evaluacion_tiene_pregunta`
  ADD KEY `id_evaluacion` (`id_evaluacion`,`id_pregunta`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `giro_comercial`
--
ALTER TABLE `giro_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`,`id_empresa`,`id_ejecutivo`,`id_gestor`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_ejecutivo` (`id_ejecutivo`),
  ADD KEY `id_gestor` (`id_gestor`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `sexo` (`sexo`),
  ADD KEY `status` (`status`);

--
-- Indices de la tabla `persona_es_alumno`
--
ALTER TABLE `persona_es_alumno`
  ADD KEY `id_rut` (`id_rut`);

--
-- Indices de la tabla `persona_es_contacto`
--
ALTER TABLE `persona_es_contacto`
  ADD KEY `id_rut` (`id_rut`);

--
-- Indices de la tabla `persona_tiene_rol`
--
ALTER TABLE `persona_tiene_rol`
  ADD KEY `id_rut` (`id_rut`,`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario_tiene_permisos`
--
ALTER TABLE `tipo_usuario_tiene_permisos`
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`,`id_permisos`),
  ADD KEY `id_permisos` (`id_permisos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `usuario_es_tipo_usuario`
--
ALTER TABLE `usuario_es_tipo_usuario`
  ADD KEY `id_usuario` (`id_usuario`,`id_tipo_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `giro_comercial`
--
ALTER TABLE `giro_comercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_responde_pregunta`
--
ALTER TABLE `alumno_responde_pregunta`
  ADD CONSTRAINT `alumno_responde_pregunta_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_responde_pregunta_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`id_instructor`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_4` FOREIGN KEY (`id_asistente`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_5` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id`);

--
-- Filtros para la tabla `curso_tiene_alumnos`
--
ALTER TABLE `curso_tiene_alumnos`
  ADD CONSTRAINT `curso_tiene_alumnos_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_tiene_alumnos_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_contacto`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empresa_ibfk_4` FOREIGN KEY (`id_giro_comercial`) REFERENCES `giro_comercial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion_tiene_pregunta`
--
ALTER TABLE `evaluacion_tiene_pregunta`
  ADD CONSTRAINT `evaluacion_tiene_pregunta_ibfk_1` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_tiene_pregunta_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_de_compra`
--
ALTER TABLE `orden_de_compra`
  ADD CONSTRAINT `orden_de_compra_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_de_compra_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_de_compra_ibfk_3` FOREIGN KEY (`id_ejecutivo`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_de_compra_ibfk_4` FOREIGN KEY (`id_gestor`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_es_alumno`
--
ALTER TABLE `persona_es_alumno`
  ADD CONSTRAINT `persona_es_alumno_ibfk_1` FOREIGN KEY (`id_rut`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_es_contacto`
--
ALTER TABLE `persona_es_contacto`
  ADD CONSTRAINT `persona_es_contacto_ibfk_1` FOREIGN KEY (`id_rut`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_tiene_rol`
--
ALTER TABLE `persona_tiene_rol`
  ADD CONSTRAINT `persona_tiene_rol_ibfk_1` FOREIGN KEY (`id_rut`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_tiene_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_usuario_tiene_permisos`
--
ALTER TABLE `tipo_usuario_tiene_permisos`
  ADD CONSTRAINT `tipo_usuario_tiene_permisos_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_usuario_tiene_permisos_ibfk_2` FOREIGN KEY (`id_permisos`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_es_tipo_usuario`
--
ALTER TABLE `usuario_es_tipo_usuario`
  ADD CONSTRAINT `usuario_es_tipo_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_es_tipo_usuario_ibfk_2` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
