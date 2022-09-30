-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-09-2022 a las 23:40:00
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

INSERT INTO `tbl_usuario` (`usuario_id`, `usuario_name`, `usuario_ap`, `usuario_am`, `usuario_curp`, `usuario_rfc`, `usuario_genero`, `usuario_email`, `usuario_npersonal`, `usuario_pwd`, `usuario_nivel`, `usuario_region`, `usuario_delegacion`, `usuario_folio`, `usuario_fecha`, `usuario_tituloConstancia`, `usuario_observacion`, `usuario_fechaCracion`, `usuario_status`) VALUES
(1, 'VICENTE', 'JUAREZ', 'ALARCON', 'JUAV830719', 'JUAV830719', 'H', 'juarez.vic@gmail.com', '123456', '123456', 'NORMALES', 'REGION V - XALAPA', 'D-II-27', 'SNT-5620220625CCS-0000002426', '2022-09-30', 'AGENDA 2030 Y LOS DERECHOS HUMANOS', 'NINGUNA OBSERVACION', '2022-09-30', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
