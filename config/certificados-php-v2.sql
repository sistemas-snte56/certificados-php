-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-10-2022 a las 22:14:53
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `certificados-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(255) NOT NULL,
  `categoria_fecha` datetime DEFAULT NULL,
  `categoria_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`categoria_id`, `categoria_nombre`, `categoria_fecha`, `categoria_status`) VALUES
(1, 'PROGRAMACION', '2022-10-02 15:30:10', 1),
(2, 'MARKETING', '2022-10-04 15:30:10', 1),
(3, 'CNDH', '2022-10-13 15:31:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `curso_id` int(11) NOT NULL,
  `curso_categoria_id` int(11) NOT NULL,
  `curso_name` varchar(255) NOT NULL,
  `curso_descripcion` text NOT NULL,
  `curso_fecha_inicial` date NOT NULL,
  `curso_fecha_final` date NOT NULL,
  `curso_instructor_id` int(11) NOT NULL,
  `curso_fecha_cracion` datetime DEFAULT NULL,
  `curso_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_curso`
--

INSERT INTO `tbl_curso` (`curso_id`, `curso_categoria_id`, `curso_name`, `curso_descripcion`, `curso_fecha_inicial`, `curso_fecha_final`, `curso_instructor_id`, `curso_fecha_cracion`, `curso_status`) VALUES
(1, 1, 'CURSO DE HTML5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-17', '2022-10-21', 1, '2022-10-17 16:59:31', 1),
(2, 1, 'INTRODUCCION A LOS NEGOCIOS', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2022-10-24', '2022-10-27', 2, '2022-10-24 17:00:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_curso_usuario`
--

CREATE TABLE `tbl_curso_usuario` (
  `curso_usuario_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `curso_usuario_fecha_creacion` datetime NOT NULL,
  `curso_usuario_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_curso_usuario`
--

INSERT INTO `tbl_curso_usuario` (`curso_usuario_id`, `curso_id`, `usuario_id`, `curso_usuario_fecha_creacion`, `curso_usuario_status`) VALUES
(1, 1, 1, '2022-10-03 22:12:05', 1),
(2, 2, 1, '2022-10-03 22:12:05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instructor`
--

CREATE TABLE `tbl_instructor` (
  `instructor_id` int(50) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `instructor_ap` varchar(255) NOT NULL,
  `instructor_am` varchar(255) NOT NULL,
  `instructor_email` varchar(150) NOT NULL,
  `instructor_genero` varchar(50) NOT NULL,
  `instructor_telefono` varchar(155) NOT NULL,
  `instructor_creacion` datetime NOT NULL,
  `instructor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_instructor`
--

INSERT INTO `tbl_instructor` (`instructor_id`, `instructor_name`, `instructor_ap`, `instructor_am`, `instructor_email`, `instructor_genero`, `instructor_telefono`, `instructor_creacion`, `instructor_status`) VALUES
(1, 'LUIS ERNESTO', 'MEDINA', 'MEGIA', 'luis@example.com', 'H', '1234567890', '2022-10-03 15:02:52', 1),
(2, 'ADRIANA', 'MEDINA', 'ALVARADO', 'adriana@example.com', 'M', '9876543215', '2022-10-04 15:02:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_name` varchar(255) NOT NULL,
  `usuario_ap` varchar(255) NOT NULL,
  `usuario_am` varchar(255) NOT NULL,
  `usuario_curp` varchar(255) NOT NULL,
  `usuario_rfc` varchar(255) NOT NULL,
  `usuario_genero` varchar(100) NOT NULL,
  `usuario_telefono` varchar(50) NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `usuario_npersonal` varchar(255) NOT NULL,
  `usuario_pwd` varchar(50) NOT NULL,
  `usuario_nivel` varchar(255) NOT NULL,
  `usuario_region` varchar(255) NOT NULL,
  `usuario_delegacion` varchar(255) NOT NULL,
  `usuario_folio` varchar(255) NOT NULL,
  `usuario_fecha` date NOT NULL,
  `usuario_tituloConstancia` varchar(255) NOT NULL,
  `usuario_observacion` text NOT NULL,
  `usuario_fechaCracion` date NOT NULL,
  `usuario_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usuario_id`, `usuario_name`, `usuario_ap`, `usuario_am`, `usuario_curp`, `usuario_rfc`, `usuario_genero`, `usuario_telefono`, `usuario_email`, `usuario_npersonal`, `usuario_pwd`, `usuario_nivel`, `usuario_region`, `usuario_delegacion`, `usuario_folio`, `usuario_fecha`, `usuario_tituloConstancia`, `usuario_observacion`, `usuario_fechaCracion`, `usuario_status`) VALUES
(1, 'VICENTE', 'JUAREZ', 'ALARCON', 'JUAV830719', 'JUAV830719', 'H', '1234567890', 'juarez.vic@gmail.com', '123456', '123456', 'NORMALES', 'REGION V - XALAPA', 'D-II-27', 'SNT-5620220625CCS-0000002426', '2022-09-30', 'AGENDA 2030 Y LOS DERECHOS HUMANOS', 'NINGUNA OBSERVACION', '2022-09-30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD PRIMARY KEY (`curso_id`);

--
-- Indices de la tabla `tbl_curso_usuario`
--
ALTER TABLE `tbl_curso_usuario`
  ADD PRIMARY KEY (`curso_usuario_id`);

--
-- Indices de la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_curso_usuario`
--
ALTER TABLE `tbl_curso_usuario`
  MODIFY `curso_usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  MODIFY `instructor_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
