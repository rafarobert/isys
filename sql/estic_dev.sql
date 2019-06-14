-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2019 a las 01:51:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estic_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_cities`
--

CREATE TABLE `es_cities` (
  `id_city` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `abbreviation` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `id_capital` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":"name","filterBy":{"tipo":"capital"}}',
  `id_region` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":"name","filterBy":{"tipo":"region"}}',
  `lat` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `lng` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `area` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `nro_municipios` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `surface` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `ids_files` varchar(490) DEFAULT NULL COMMENT '{"validate":0,"input":"file"}',
  `id_cover_picture` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"input":"hidden"}',
  `height` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `tipo` varchar(490) DEFAULT NULL COMMENT '{"validate":0,"input":"radios","options":["region","ciudad","capital"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_cities`
--

INSERT INTO `es_cities` (`id_city`, `name`, `description`, `abbreviation`, `id_capital`, `id_region`, `lat`, `lng`, `area`, `nro_municipios`, `surface`, `ids_files`, `id_cover_picture`, `height`, `tipo`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'La Paz', '', '', NULL, NULL, '-16.502030', '-68.135440', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(2, 'El Alto', '', '', 1, 1, '-16.502001', '-68.167885', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(3, 'Caranavi', '', '', 1, 1, '-15.833792', '-67.566800', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(4, 'Cochabamba', '', '', NULL, NULL, '-17.385080', '-66.152936', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(5, 'Villa Tunari', '', '', 4, 4, '-16.974408', '-65.422817', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(6, 'Santa Cruz', '', '', NULL, NULL, '-17.781730', '-63.168031', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(7, 'Puerto Suarez', '', '', 6, 6, '-18.965916', '-57.799305', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(8, 'Potosi', '', '', NULL, NULL, '-19.582703', '-65.756872', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(9, 'Llallagua', '', '', 8, 8, '-18.421985', '-66.584639', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(10, 'Chuquisaca', '', '', NULL, NULL, '-19.053640', '-65.263682', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(11, 'Monteagudo', '', '', 10, 10, '-19.807883', '-63.958317', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(12, 'Beni', '', '', NULL, NULL, '-14.829896', '-64.905096', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(13, 'Riberalta', '', '', 12, 12, '-10.999493', '-66.068168', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(14, 'Tarija', '', '', NULL, NULL, '-21.531417', '-64.739233', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(15, 'Yacuiba', '', '', 14, 14, '-22.018384', '-63.680627', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(16, 'Pando', '', '', NULL, NULL, '-11.017662', '-68.752586', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(17, 'Oruro', '', '', NULL, NULL, '-17.970334', '-67.114256', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_domains`
--

CREATE TABLE `es_domains` (
  `id_domain` int(11) NOT NULL,
  `host` varchar(450) DEFAULT NULL,
  `hostname` varchar(450) DEFAULT NULL,
  `protocol` varchar(10) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `origin` varchar(450) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_files`
--

CREATE TABLE `es_files` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL COMMENT '{"validate":0}',
  `url` varchar(450) DEFAULT NULL COMMENT '{"validate":0}',
  `ext` varchar(100) DEFAULT NULL COMMENT '{"validate":0}',
  `raw_name` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `full_path` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `path` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `width` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `height` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `size` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `library` varchar(20) DEFAULT NULL COMMENT '{"validate":0}',
  `nro_thumbs` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `id_parent` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":["name"],"filterBy":{"type":"origin"}}',
  `thumb_marker` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `type` varchar(100) DEFAULT NULL COMMENT '{"validate":0,"options":["origin","thumb"]}',
  `x` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `y` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `fix_width` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `fix_height` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `id_file_setting` int(11) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":"name"}',
  `ids_tags` int(11) DEFAULT NULL COMMENT '{"validate":0,"input":"checkboxes","selectBy":"name","table":"es_files_tags","idForeign":"id_file_tag"}',
  `ids_folders` int(11) DEFAULT NULL COMMENT '{"validate":0,"input":"checkboxes","selectBy":"name","table":"es_files_folders","idForeign":"id_file_folder"}',
  `title` varchar(300) DEFAULT NULL COMMENT '{"validate":0}',
  `id_table` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `status` varchar(15) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_files`
--

INSERT INTO `es_files` (`id_file`, `name`, `url`, `ext`, `raw_name`, `full_path`, `path`, `width`, `height`, `size`, `library`, `nro_thumbs`, `id_parent`, `thumb_marker`, `type`, `x`, `y`, `fix_width`, `fix_height`, `id_file_setting`, `ids_tags`, `ids_folders`, `title`, `id_table`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, '1560554798_13765700102019628102279701647510958796308226o.jpg', '/assets/files/person/1560554798_13765700102019628102279701647510958796308226o.jpg', '.jpg', '13765700102019628102279701647510958796308226o', 'assets/files/person/13765700102019628102279701647510958796308226o.jpg', 'assets/files/person/', 1152, 2048, '135', '', 3, NULL, '', 'origin', '0.0000000000', '0.0000000000', '0.0000000000', '0.0000000000', 10, NULL, NULL, 'person', 111, 'ENABLED', 0, 1, 1, '2019-06-14 19:26:38', '2019-06-14 19:26:38'),
(2, '1560554798_13765700102019628102279701647510958796308226o-thumb_50.jpg', '/assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_50.jpg', '.jpg', '1560554798_13765700102019628102279701647510958796308226o-thumb_50.jpg', 'assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_50.jpg', 'assets/files/person/thumbs/', 29, 50, '135', 'gd2', NULL, 1, '-thumb_50', 'thumb', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'person', 111, 'ENABLED', 0, 1, 1, '2019-06-14 19:26:38', '2019-06-14 19:26:38'),
(3, '1560554798_13765700102019628102279701647510958796308226o-thumb_450.jpg', '/assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_450.jpg', '.jpg', '1560554798_13765700102019628102279701647510958796308226o-thumb_450.jpg', 'assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_450.jpg', 'assets/files/person/thumbs/', 254, 450, '135', 'gd2', NULL, 1, '-thumb_450', 'thumb', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'person', 111, 'ENABLED', 0, 1, 1, '2019-06-14 19:26:38', '2019-06-14 19:26:38'),
(4, '1560554798_13765700102019628102279701647510958796308226o-thumb_850.jpg', '/assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_850.jpg', '.jpg', '1560554798_13765700102019628102279701647510958796308226o-thumb_850.jpg', 'assets/files/person/thumbs/1560554798_13765700102019628102279701647510958796308226o-thumb_850.jpg', 'assets/files/person/thumbs/', 479, 850, '135', 'gd2', NULL, 1, '-thumb_850', 'thumb', NULL, NULL, NULL, NULL, 10, NULL, NULL, 'person', 111, 'ENABLED', 0, 1, 1, '2019-06-14 19:26:38', '2019-06-14 19:26:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_files_folders`
--

CREATE TABLE `es_files_folders` (
  `id_file_folder` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_files_settings`
--

CREATE TABLE `es_files_settings` (
  `id_file_setting` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `type` varchar(200) DEFAULT NULL COMMENT '{"validate":0,"input":"radios","options":["imagenes","documentos","comprimidos","videos","audios"]}',
  `max_width` int(11) DEFAULT NULL,
  `max_height` int(11) DEFAULT NULL,
  `max_size` int(11) DEFAULT NULL,
  `nro_thumbs` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_files_settings`
--

INSERT INTO `es_files_settings` (`id_file_setting`, `name`, `description`, `type`, `max_width`, `max_height`, `max_size`, `nro_thumbs`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'gif', 'Archivo gif', 'fotos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(2, 'jpg', 'Archivo jpg', 'fotos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(3, 'png', 'Archivo png', 'fotos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(4, 'pdf', 'Archivo pdf', 'documentos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(5, 'docx', 'Archivo docx', 'documentos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(6, 'xlsx', 'Archivo xlsx', 'documentos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(7, 'zip', 'Archivo zip', 'comprimidos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(8, 'mp4', 'Archivo mp4', 'videos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(9, 'mp3', 'Archivo mp3', 'audios', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46'),
(10, 'jpeg', 'Archivo jpeg', 'fotos', NULL, NULL, NULL, NULL, 'enabled', 0, 1, 1, '2019-05-31 20:06:44', '2019-05-31 20:06:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_files_tags`
--

CREATE TABLE `es_files_tags` (
  `id_file_tag` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_logs`
--

CREATE TABLE `es_logs` (
  `id_log` int(11) NOT NULL,
  `heading` varchar(499) DEFAULT NULL,
  `message` text,
  `action` varchar(499) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '{"options":{1:"Error",2:"Warning",4:"Parsing Error",8:"Notice",16:"Core Error",32:"Core Warning",64:"Compile Error",128:"Compile Warnig",256:"User Error",512:"User Warning",1024:"User Notice",2048:"Runtime Error"}}',
  `file` varchar(1000) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `trace` text,
  `previous` varchar(499) DEFAULT NULL,
  `xdebug_message` text,
  `type` int(11) DEFAULT NULL,
  `post` varchar(1000) DEFAULT NULL,
  `severity` varchar(400) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `es_modules`
--

CREATE TABLE `es_modules` (
  `id_module` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_modules`
--

INSERT INTO `es_modules` (`id_module`, `name`, `uri`, `description`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Administrador del sistema Core', NULL, 'Modulo para la administracion del nucleo del sistema', 'ENABLED', 0, 1, 1, '2018-09-06 13:00:58', '2018-09-06 12:47:30'),
(2, 'Administrador del sistema Ibolsa Sociedad de Titularizacion S.A.', NULL, 'Modulo para la administracion del sistema iBolsa Sociedad de Titularizacion S.A.', 'ENABLED', 0, 1, 1, '2018-09-06 12:48:32', '2018-09-06 12:48:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_numbers`
--

CREATE TABLE `es_numbers` (
  `id_number` int(11) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL COMMENT '{"validate":0,"input":"radios","options":["cellphone","phone"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_persons`
--

CREATE TABLE `es_persons` (
  `id_person` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL COMMENT '{"validate":0}',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '{"validate":["email"]}',
  `address` varchar(500) DEFAULT NULL COMMENT '{"label":"Domicilio","validate":0}',
  `birthdate` date DEFAULT NULL COMMENT '{"validate":0,"input":"date"}',
  `age` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `carnet` varchar(30) DEFAULT NULL COMMENT '{"label":"Carnet de Identidad","validate":0}',
  `sexo` varchar(15) DEFAULT NULL COMMENT '{"input":"radios","options":["Masculino","Femenino"],"validate":0}',
  `ids_files` varchar(450) DEFAULT NULL COMMENT '{"label":"Foto de perfil","input":"file","validate":0}',
  `id_cover_picture` int(10) UNSIGNED DEFAULT NULL COMMENT '{"input":"hidden","validate":0}',
  `id_city` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `id_provincia` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `country_code` varchar(50) DEFAULT NULL COMMENT '{"validate":0}',
  `lat` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `lng` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `id_main_number` int(11) UNSIGNED DEFAULT NULL COMMENT '{"selectBy":"number","validate":0}',
  `ids_numbers` int(11) DEFAULT NULL COMMENT '{"validate":0,"input":"checkboxes","selectBy":["code","number"],"table":"es_numbers","idForeign":"id_number"}',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"indexFields":["name","lastname","email","address"],"numListed":5}';

--
-- Volcado de datos para la tabla `es_persons`
--

INSERT INTO `es_persons` (`id_person`, `name`, `lastname`, `email`, `address`, `birthdate`, `age`, `carnet`, `sexo`, `ids_files`, `id_cover_picture`, `id_city`, `id_provincia`, `country_code`, `lat`, `lng`, `id_main_number`, `ids_numbers`, `change_count`, `status`, `date_modified`, `date_created`, `id_user_modified`, `id_user_created`) VALUES
(1, 'Rafael', 'Gutierrez', 'rafael@estic.com.bo', '', '1991-06-26', 0, '', 'masculino', '|1|', 1, NULL, NULL, 'BO', '0.000000', '0.000000', NULL, NULL, 30, 'ENABLED', '2019-06-14 19:26:45', '2018-08-29 09:45:30', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_provincias`
--

CREATE TABLE `es_provincias` (
  `id_provincia` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `area` varchar(900) DEFAULT NULL COMMENT '{"validate":0}',
  `lat` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `lng` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `id_municipio` int(11) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `id_ciudad` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_roles`
--

CREATE TABLE `es_roles` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `write` varchar(10) DEFAULT NULL COMMENT '{"input":"radios","options":["on","off"]}',
  `read` varchar(10) DEFAULT NULL COMMENT '{"input":"radios","options":["on","off"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED DEFAULT NULL,
  `id_user_created` int(11) UNSIGNED DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_roles`
--

INSERT INTO `es_roles` (`id_role`, `name`, `description`, `write`, `read`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Administrador nivel desarrollador ', 'Administrador con todos los privilegios', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-08-29 09:45:30', '2018-08-29 09:45:30'),
(2, 'Administrador del area de sistemas', '<p>Administrador del Sistema</p>', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41'),
(3, 'Administrador para las configuraciones del sistema', 'Funcionarios encargados de la administracion de las denuncias que presentan las personas', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:01:10', '2018-11-08 00:01:14'),
(4, 'Defensor del pueblo', 'Rol para el defensor del pueblo', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:06:37', '2018-11-08 00:06:41'),
(5, 'Delegado Adjunto', 'Rol para delegados adjuntos', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:07:42', '2018-11-08 00:07:44'),
(6, 'Jefe de unidad', 'Rol para jefes de unidad', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:10:08', '2018-11-08 00:10:09'),
(7, 'Jefe de area', 'Rol para los jefes de area', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:11:27', '2018-11-08 00:11:28'),
(8, 'Jefe de delegacion estic departamental', 'Rol para los jefes de delegaciones departamentales', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:11:27', '2018-11-08 00:11:28'),
(9, 'Funcionario de estic', 'Rol para funcionarios', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41'),
(100, 'Persona natural', 'Rol para la poblacion en general', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_sessions`
--

CREATE TABLE `es_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL COMMENT '{"label":"Datos en sesion","input":"textarea"}',
  `last_activity` datetime DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Nombre del Usuario","selectBy":["name","lastname"]}',
  `lng` int(11) DEFAULT NULL,
  `lat` int(11) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL COMMENT '{"input":"radios","options":["active","inactive"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"title":"Sesiones del Sistema","indexFields":["ip_address","timestamp","last_activity","id_user"],"numListed":4}';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_tables`
--

CREATE TABLE `es_tables` (
  `id_table` int(11) UNSIGNED NOT NULL,
  `id_module` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Modulo","input":"select","selectBy":["name"]}',
  `id_role` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Roles Admitidos","input":"radios"}',
  `title` varchar(100) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL COMMENT '{"label":"Tablas","input":"select","options":"db_tabs"}',
  `listed` varchar(15) NOT NULL DEFAULT 'ENABLED' COMMENT '{"input":"radios","options":{"ENABLED":"enabled","DISABLED":"disabled"}}',
  `description` text COMMENT '{"validate":0}',
  `icon` varchar(200) NOT NULL COMMENT '{"validate":0}',
  `url` varchar(400) NOT NULL,
  `url_edit` varchar(450) DEFAULT NULL,
  `url_index` varchar(450) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_tables_roles`
--

CREATE TABLE `es_tables_roles` (
  `id_table_role` int(11) NOT NULL,
  `id_table` int(10) UNSIGNED DEFAULT NULL,
  `id_role` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_users`
--

CREATE TABLE `es_users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL COMMENT '{"validate":["password"],"input":"password"}',
  `id_role` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Role","input":"radios","selectBy":["name"]}',
  `signin_method` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `uid` varchar(499) DEFAULT NULL COMMENT '{"validate":0}',
  `id_person` int(11) UNSIGNED DEFAULT NULL COMMENT '{"selectBy":["name","lastname"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{"indexFields":["username","id_person","id_role","signin_method"],"numListed":5}';

--
-- Volcado de datos para la tabla `es_users`
--

INSERT INTO `es_users` (`id_user`, `username`, `password`, `id_role`, `signin_method`, `uid`, `id_person`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'rafael@estic.com.bo', '35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4', 1, NULL, NULL, 1, 'ENABLED', 0, 1, 1, '2019-06-02 06:16:23', '2019-06-02 06:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_users_roles`
--

CREATE TABLE `es_users_roles` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_role` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_users_roles`
--

INSERT INTO `es_users_roles` (`id_user_role`, `id_user`, `id_role`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 1, 1, 'ENABLED', 34, 1, 1, '2019-05-30 11:01:04', '2018-11-28 21:46:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(116);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `es_cities`
--
ALTER TABLE `es_cities`
  ADD PRIMARY KEY (`id_city`),
  ADD UNIQUE KEY `es_cities_id_city_uindex` (`id_city`),
  ADD KEY `es_cities_ibfk_1` (`id_user_created`),
  ADD KEY `es_cities_ibfk_2` (`id_user_modified`),
  ADD KEY `es_cities_ibfk_3` (`id_capital`),
  ADD KEY `es_cities_ibfk_4` (`id_region`),
  ADD KEY `es_cities_ibfk_5` (`id_cover_picture`);

--
-- Indices de la tabla `es_domains`
--
ALTER TABLE `es_domains`
  ADD PRIMARY KEY (`id_domain`),
  ADD UNIQUE KEY `es_domains_id_domain_uindex` (`id_domain`),
  ADD KEY `es_domains_ibfk_1` (`id_user_created`),
  ADD KEY `es_domains_ibfk_2` (`id_user_modified`);

--
-- Indices de la tabla `es_files`
--
ALTER TABLE `es_files`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `es_files_id_file_uindex` (`id_file`),
  ADD KEY `es_files_ibfk_1` (`id_user_created`),
  ADD KEY `es_files_ibfk_2` (`id_user_modified`),
  ADD KEY `es_files_ibfk_3` (`id_parent`),
  ADD KEY `es_files_ibfk_4` (`id_file_setting`),
  ADD KEY `es_files_ibfk_5` (`id_table`);

--
-- Indices de la tabla `es_files_folders`
--
ALTER TABLE `es_files_folders`
  ADD PRIMARY KEY (`id_file_folder`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_files_settings`
--
ALTER TABLE `es_files_settings`
  ADD PRIMARY KEY (`id_file_setting`),
  ADD UNIQUE KEY `es_types_files_id_type_file_uindex` (`id_file_setting`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_files_tags`
--
ALTER TABLE `es_files_tags`
  ADD PRIMARY KEY (`id_file_tag`),
  ADD UNIQUE KEY `es_tags_files_id_tag_file_uindex` (`id_file_tag`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_logs`
--
ALTER TABLE `es_logs`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `es_logs_id_log_uindex` (`id_log`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_modules`
--
ALTER TABLE `es_modules`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `es_modules_id_module_uindex` (`id_module`),
  ADD KEY `es_modules_ibfk_1` (`id_user_modified`),
  ADD KEY `es_modules_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `es_numbers`
--
ALTER TABLE `es_numbers`
  ADD PRIMARY KEY (`id_number`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_persons`
--
ALTER TABLE `es_persons`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `es_users_id_user_uindex` (`id_person`),
  ADD KEY `es_users_ibfk_2` (`id_provincia`),
  ADD KEY `es_users_ibfk_3` (`id_cover_picture`),
  ADD KEY `es_users_ibfk_4` (`id_city`),
  ADD KEY `id_main_number` (`id_main_number`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD UNIQUE KEY `es_provincias_id_provincia_uindex` (`id_provincia`),
  ADD KEY `es_provincias_ibfk_1` (`id_user_created`),
  ADD KEY `es_provincias_ibfk_2` (`id_user_modified`),
  ADD KEY `es_provincias_ibfk_3` (`id_ciudad`),
  ADD KEY `es_provincias_ibfk_4` (`id_municipio`);

--
-- Indices de la tabla `es_roles`
--
ALTER TABLE `es_roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `es_roles_id_role_uindex` (`id_role`),
  ADD KEY `es_roles_ibfk_1` (`id_user_created`),
  ADD KEY `es_roles_ibfk_2` (`id_user_modified`);

--
-- Indices de la tabla `es_sessions`
--
ALTER TABLE `es_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `es_sessions_ibfk_1` (`id_user`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_tables`
--
ALTER TABLE `es_tables`
  ADD PRIMARY KEY (`id_table`),
  ADD UNIQUE KEY `es_tables_id_table_uindex` (`id_table`),
  ADD KEY `es_tables_ibfk_4` (`id_module`),
  ADD KEY `id_user_created` (`id_user_created`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `es_tables_ibfk_3` (`id_role`);

--
-- Indices de la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  ADD PRIMARY KEY (`id_table_role`),
  ADD UNIQUE KEY `es_tables_roles_id_table_role_uindex` (`id_table_role`),
  ADD KEY `es_tables_roles_ibfk_1` (`id_user_created`),
  ADD KEY `es_tables_roles_ibfk_2` (`id_user_modified`),
  ADD KEY `es_tables_roles_ibfk_3` (`id_table`),
  ADD KEY `es_tables_roles_ibfk_4` (`id_role`);

--
-- Indices de la tabla `es_users`
--
ALTER TABLE `es_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_person` (`id_person`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  ADD PRIMARY KEY (`id_user_role`),
  ADD UNIQUE KEY `dfa_usuarios_roles_id_usuario_role_uindex` (`id_user_role`),
  ADD KEY `dfa_usuarios_roles_ibfk_1` (`id_user_created`),
  ADD KEY `dfa_usuarios_roles_ibfk_2` (`id_user_modified`),
  ADD KEY `dfa_usuarios_roles_ibfk_3` (`id_user`),
  ADD KEY `dfa_usuarios_roles_ibfk_4` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `es_cities`
--
ALTER TABLE `es_cities`
  MODIFY `id_city` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `es_domains`
--
ALTER TABLE `es_domains`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_files`
--
ALTER TABLE `es_files`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `es_files_folders`
--
ALTER TABLE `es_files_folders`
  MODIFY `id_file_folder` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_files_settings`
--
ALTER TABLE `es_files_settings`
  MODIFY `id_file_setting` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `es_files_tags`
--
ALTER TABLE `es_files_tags`
  MODIFY `id_file_tag` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_logs`
--
ALTER TABLE `es_logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1909;

--
-- AUTO_INCREMENT de la tabla `es_modules`
--
ALTER TABLE `es_modules`
  MODIFY `id_module` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `es_numbers`
--
ALTER TABLE `es_numbers`
  MODIFY `id_number` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_persons`
--
ALTER TABLE `es_persons`
  MODIFY `id_person` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  MODIFY `id_provincia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_roles`
--
ALTER TABLE `es_roles`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  MODIFY `id_table_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de la tabla `es_users`
--
ALTER TABLE `es_users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `es_cities`
--
ALTER TABLE `es_cities`
  ADD CONSTRAINT `es_cities_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_cities_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_cities_ibfk_3` FOREIGN KEY (`id_capital`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_cities_ibfk_4` FOREIGN KEY (`id_region`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_cities_ibfk_5` FOREIGN KEY (`id_cover_picture`) REFERENCES `es_files` (`id_file`);

--
-- Filtros para la tabla `es_domains`
--
ALTER TABLE `es_domains`
  ADD CONSTRAINT `es_domains_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_domains_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`);

--
-- Filtros para la tabla `es_files`
--
ALTER TABLE `es_files`
  ADD CONSTRAINT `es_files_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_files_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_files_ibfk_3` FOREIGN KEY (`id_parent`) REFERENCES `es_files` (`id_file`),
  ADD CONSTRAINT `es_files_ibfk_4` FOREIGN KEY (`id_file_setting`) REFERENCES `es_files_settings` (`id_file_setting`),
  ADD CONSTRAINT `es_files_ibfk_5` FOREIGN KEY (`id_table`) REFERENCES `es_tables` (`id_table`);

--
-- Filtros para la tabla `es_files_folders`
--
ALTER TABLE `es_files_folders`
  ADD CONSTRAINT `es_files_folders_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_files_folders_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_files_settings`
--
ALTER TABLE `es_files_settings`
  ADD CONSTRAINT `es_files_settings_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_files_settings_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`);

--
-- Filtros para la tabla `es_files_tags`
--
ALTER TABLE `es_files_tags`
  ADD CONSTRAINT `es_files_tags_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_files_tags_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`);

--
-- Filtros para la tabla `es_logs`
--
ALTER TABLE `es_logs`
  ADD CONSTRAINT `es_logs_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_logs_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_modules`
--
ALTER TABLE `es_modules`
  ADD CONSTRAINT `es_modules_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_modules_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`);

--
-- Filtros para la tabla `es_numbers`
--
ALTER TABLE `es_numbers`
  ADD CONSTRAINT `es_numbers_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_numbers_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_persons`
--
ALTER TABLE `es_persons`
  ADD CONSTRAINT `es_persons_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `es_provincias` (`id_provincia`),
  ADD CONSTRAINT `es_persons_ibfk_3` FOREIGN KEY (`id_cover_picture`) REFERENCES `es_files` (`id_file`),
  ADD CONSTRAINT `es_persons_ibfk_4` FOREIGN KEY (`id_city`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_persons_ibfk_5` FOREIGN KEY (`id_main_number`) REFERENCES `es_numbers` (`id_number`),
  ADD CONSTRAINT `es_persons_ibfk_6` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_persons_ibfk_7` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  ADD CONSTRAINT `es_provincias_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_provincias_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_provincias_ibfk_3` FOREIGN KEY (`id_ciudad`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_provincias_ibfk_4` FOREIGN KEY (`id_municipio`) REFERENCES `es_provincias` (`id_provincia`);

--
-- Filtros para la tabla `es_roles`
--
ALTER TABLE `es_roles`
  ADD CONSTRAINT `es_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`);

--
-- Filtros para la tabla `es_sessions`
--
ALTER TABLE `es_sessions`
  ADD CONSTRAINT `es_sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_sessions_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_sessions_ibfk_3` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_tables`
--
ALTER TABLE `es_tables`
  ADD CONSTRAINT `es_tables_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_tables_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_tables_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`),
  ADD CONSTRAINT `es_tables_ibfk_4` FOREIGN KEY (`id_module`) REFERENCES `es_modules` (`id_module`);

--
-- Filtros para la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  ADD CONSTRAINT `es_tables_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_tables_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_tables_roles_ibfk_3` FOREIGN KEY (`id_table`) REFERENCES `es_tables` (`id_table`),
  ADD CONSTRAINT `es_tables_roles_ibfk_4` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`);

--
-- Filtros para la tabla `es_users`
--
ALTER TABLE `es_users`
  ADD CONSTRAINT `es_users_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`),
  ADD CONSTRAINT `es_users_ibfk_3` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_users_ibfk_4` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  ADD CONSTRAINT `es_users_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_users_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_users_roles_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `es_users_roles_ibfk_4` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
