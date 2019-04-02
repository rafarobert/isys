-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2018 a las 04:51:56
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `defensor_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_cities`
--

CREATE TABLE `ci_cities` (
  `id_city` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `abreviatura` varchar(200) DEFAULT NULL,
  `id_capital` int(10) UNSIGNED DEFAULT NULL,
  `id_region` int(10) UNSIGNED DEFAULT NULL,
  `lat` int(11) DEFAULT NULL,
  `lng` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `nro_municipios` int(11) DEFAULT NULL,
  `superficie` decimal(10,0) DEFAULT NULL,
  `altura` decimal(10,0) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_files`
--

CREATE TABLE `ci_files` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL COMMENT '{"validate":0}',
  `url` varchar(600) DEFAULT NULL,
  `extention` varchar(100) DEFAULT NULL,
  `width` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `height` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `size` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `library` varchar(20) DEFAULT NULL COMMENT '{"validate":0}',
  `nro_thumbs` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `tipo` varchar(100) DEFAULT NULL COMMENT '{"label":"tipo de archivo","input":"radio","options":["imagen","video","audio","pdf","enlace"]}',
  `id_parent` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `thumb_marker` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_published` datetime DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_modules`
--

CREATE TABLE `ci_modules` (
  `id_module` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_provincias`
--

CREATE TABLE `ci_provincias` (
  `id_provincia` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `area` varchar(900) DEFAULT NULL,
  `lat` int(11) DEFAULT NULL,
  `lng` int(11) DEFAULT NULL,
  `id_municipio` int(11) UNSIGNED DEFAULT NULL,
  `id_region` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_roles`
--

CREATE TABLE `ci_roles` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED DEFAULT NULL,
  `id_user_created` int(11) UNSIGNED DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_roles`
--

INSERT INTO `ci_roles` (`id_role`, `name`, `description`, `estado`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Super Admin', 'Administrador con todos los privilegios', 'ENABLED', 0, 1, 1, '2018-08-29 09:45:30', '2018-08-29 09:45:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL COMMENT '{"label":"Datos en sesion","input":"textarea"}',
  `last_activity` datetime NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Nombre del Usuario","selectBy":["name","lastname"]}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"title":"Sesiones del Sistema","indexFields":["ip_address","timestamp","last_activity","id_usuario"],"numListed":4}';

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`, `last_activity`, `id_user`) VALUES
('209r4eok01de9ajmd84ev7e4nl', '127.0.0.1', 1535655853, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635353835333b, '0000-00-00 00:00:00', NULL),
('3mv2ps3rt09go77hnp21r2p3vn', '127.0.0.1', 1535552796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323739363b, '0000-00-00 00:00:00', NULL),
('4p8frjlhdpv5739ntfmtaolc0s', '127.0.0.1', 1535553036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535333033343b, '0000-00-00 00:00:00', NULL),
('6r6bu4cji6ptj42hlmalar443n', '127.0.0.1', 1535654368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635343331363b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('7od5c4bvriqlunvql0cd3rkln5', '127.0.0.1', 1535654996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635343938313b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('bm8mutcc918j9bbicnt4inh2un', '127.0.0.1', 1535552988, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323938383b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('dcgii5bnm6j3svr75frd5nk8i0', '127.0.0.1', 1535654981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635343938313b, '0000-00-00 00:00:00', NULL),
('hivi5pbckrp3mjfbmv955sm171', '127.0.0.1', 1535552269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323236393b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('hu8v9pa7eao3gd26rsaj8meh5m', '127.0.0.1', 1535654173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635343137333b, '0000-00-00 00:00:00', NULL),
('ig2jnm4kinf8borg56p2qbinb4', '127.0.0.1', 1535653471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635363832373b, '0000-00-00 00:00:00', NULL),
('j003eo1ke403u3ul2biaq70o17', '127.0.0.1', 1535553396, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535333339363b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('kpf5kv7c0oj1je1mjgkq0bjgq2', '127.0.0.1', 1535552394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323339343b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('l2j9mt906265rrrgjn1a5a6ugh', '127.0.0.1', 1535551314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323636343b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('lpievn2tg4q7lju3822sluf0av', '127.0.0.1', 1535552606, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323630353b, '0000-00-00 00:00:00', NULL),
('mn01dsdja0if4rc8btvfufdcnb', '127.0.0.1', 1535551943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535313934333b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d, '0000-00-00 00:00:00', NULL),
('mv9flfb3dbuc59ms80snamhlff', '127.0.0.1', 1535550358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535333339363b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('nu0na8hq8p7sg2kkb13bac5kr5', '127.0.0.1', 1535551363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535313235323b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d, '0000-00-00 00:00:00', NULL),
('pp9ns5poi1k2am3nvqtn96ug65', '127.0.0.1', 1535552663, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323636333b, '0000-00-00 00:00:00', NULL),
('s8q0uufvl33g98qv8eouhqpfpv', '127.0.0.1', 1535654229, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635343137343b61646d696e5f6c6f67676564696e7c613a373a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a32343a2272616661656c40646566656e736f7269612e676f622e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a383a226c6f67676564696e223b623a313b7d69645f757365727c733a313a2231223b, '0000-00-00 00:00:00', NULL),
('sua1m25teq2s72pc0r3p9no96q', '127.0.0.1', 1535656826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635363832363b, '0000-00-00 00:00:00', NULL),
('t1v82jofpbgs6jpns3cg2tg6n2', '127.0.0.1', 1535550708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535303730383b, '0000-00-00 00:00:00', NULL),
('tqhq7kmm197hk3p36dc36v6t9v', '127.0.0.1', 1535552628, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353535323434353b, '0000-00-00 00:00:00', NULL),
('uucbq1hq5s6bjk9juo9tctvbco', '127.0.0.1', 1535655852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533353635353835323b, '0000-00-00 00:00:00', NULL),
('vf6aqvcgf7s4t8rjlocvqc2k09', '127.0.0.1', 1536200642, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533363230303634313b, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_tables`
--

CREATE TABLE `ci_tables` (
  `id_table` int(11) UNSIGNED NOT NULL,
  `id_module` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Modulo","input":"select","selectBy":["name"]}',
  `id_roles` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Roles Admitidos","input":"checkboxes","selectBy":["name"]}',
  `titulo` varchar(100) NOT NULL,
  `tabla` varchar(255) DEFAULT NULL COMMENT '{"label":"Tablas","input":"select","options":"db_tabs"}',
  `listed` varchar(15) NOT NULL DEFAULT 'ENABLED' COMMENT '{"input":"radio","options":["ENABLED","DISABLED"]}',
  `descripcion` text COMMENT '{"validate":0}',
  `icon` varchar(200) NOT NULL COMMENT '{"validate":0}',
  `url` varchar(600) NOT NULL,
  `estado` varchar(255) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_tables`
--

INSERT INTO `ci_tables` (`id_table`, `id_module`, `id_roles`, `titulo`, `tabla`, `listed`, `descripcion`, `icon`, `url`, `estado`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(11, NULL, NULL, 'Modules', 'ci_modules', 'enabled', '', '', 'base/modules', '', 0, 1, 1, '2018-08-29 10:10:34', '2018-08-29 09:45:30'),
(12, NULL, NULL, 'Roles', 'ci_roles', 'enabled', '', '', 'base/roles', '', 0, 1, 1, '2018-08-29 10:10:35', '2018-08-29 09:45:31'),
(13, NULL, NULL, 'Sesiones del Sistema', 'ci_sessions', 'enabled', '', '', 'base/sessions', '', 0, 1, 1, '2018-08-29 10:10:36', '2018-08-29 09:45:31'),
(14, NULL, NULL, 'Tables', 'ci_tables', 'enabled', '', '', 'base/tables', '', 0, 1, 1, '2018-08-29 10:10:36', '2018-08-29 09:45:32'),
(15, NULL, NULL, 'Users', 'ci_users', 'enabled', '', '', 'base/users', '', 0, 1, 1, '2018-08-29 10:10:37', '2018-08-29 09:45:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_users`
--

CREATE TABLE `ci_users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '{"validate":["email"]}',
  `direccion` varchar(500) DEFAULT NULL COMMENT '{"label":"Domicilio"}',
  `password` varchar(128) NOT NULL DEFAULT '' COMMENT '{"validate":["password"],"input":"password"}',
  `birthdate` date DEFAULT NULL COMMENT '{"validate":0}',
  `edad` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `carnet` varchar(30) DEFAULT NULL COMMENT '{"label":"Carnet de Identidad","validate":0}',
  `sexo` varchar(15) DEFAULT NULL COMMENT '{"input":"radios","options":["Masculino","Femenino"]}',
  `phone_number_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Telefono 1"}',
  `phone_number_2` varchar(20) DEFAULT NULL COMMENT '{"label":"Telefono 2"}',
  `cellphone_number_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 1"}',
  `cellphone_number_2` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 2"}',
  `picture` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Foto de perfil","input":"image","validate":0}',
  `id_role` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Role","input":"radios","selectBy":"name"}',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"indexFields":["nombre","apellido","sexo","cellphone_number_1"],"numListed":5,\r\n"id_tipo_usuario":{\r\n"edit-draft":["nombre","apellido","sexo","id_option_tipo_usuario"],\r\n"edit-cliente":["nombre","apellido","sexo","cellphone_number_1","id_turno","id_sesion","foto_perfil","id_option_tipo_usuario"],\r\n"edit-ini":["nombre","apellido","sexo","cellphone_number_1","id_option_tipo_usuario"]\r\n}}';

--
-- Volcado de datos para la tabla `ci_users`
--

INSERT INTO `ci_users` (`id_user`, `name`, `lastname`, `username`, `email`, `direccion`, `password`, `birthdate`, `edad`, `carnet`, `sexo`, phone_1, phone_2, cellphone_1, cellphone_2, `picture`, `id_role`, `change_count`, `estado`, `date_modified`, `date_created`) VALUES
(1, 'Rafael', 'Gutierrez', NULL, 'rafael@defensoria.gob.bo', NULL, '35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'ENABLED', '2018-08-29 09:45:30', '2018-08-29 09:45:30');

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_cities`
--
ALTER TABLE `ci_cities`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `ci_cities_ibfk_1` (`id_user_created`),
  ADD KEY `ci_cities_ibfk_2` (`id_user_modified`),
  ADD KEY `ci_cities_ibfk_3` (`id_capital`),
  ADD KEY `ci_cities_ibfk_4` (`id_region`);

--
-- Indices de la tabla `ci_files`
--
ALTER TABLE `ci_files`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `ci_files_ibfk_1` (`id_user_created`),
  ADD KEY `ci_files_ibfk_2` (`id_user_modified`),
  ADD KEY `ci_files_ibfk_3` (`id_parent`);

--
-- Indices de la tabla `ci_modules`
--
ALTER TABLE `ci_modules`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `ci_modules_ibfk_1` (`id_user_modified`),
  ADD KEY `ci_modules_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `ci_provincias`
--
ALTER TABLE `ci_provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD UNIQUE KEY `ci_provincias_id_provincia_uindex` (`id_provincia`),
  ADD KEY `ci_provincias_ibfk_1` (`id_user_created`),
  ADD KEY `ci_provincias_ibfk_2` (`id_user_modified`),
  ADD KEY `ci_provincias_ibfk_3` (`id_region`),
  ADD KEY `ci_provincias_ibfk_4` (`id_municipio`);

--
-- Indices de la tabla `ci_roles`
--
ALTER TABLE `ci_roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `ci_roles_ibfk_1` (`id_user_created`),
  ADD KEY `ci_roles_ibfk_2` (`id_user_modified`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_ibfk_1` (`id_user`);

--
-- Indices de la tabla `ci_tables`
--
ALTER TABLE `ci_tables`
  ADD PRIMARY KEY (`id_table`),
  ADD KEY `ci_tables_ibfk_3` (`id_roles`),
  ADD KEY `ci_tables_ibfk_4` (`id_module`),
  ADD KEY `id_user_created` (`id_user_created`),
  ADD KEY `id_user_modified` (`id_user_modified`);

--
-- Indices de la tabla `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ci_users_ibfk_1` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ci_cities`
--
ALTER TABLE `ci_cities`
  MODIFY `id_city` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ci_files`
--
ALTER TABLE `ci_files`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ci_modules`
--
ALTER TABLE `ci_modules`
  MODIFY `id_module` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ci_provincias`
--
ALTER TABLE `ci_provincias`
  MODIFY `id_provincia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ci_roles`
--
ALTER TABLE `ci_roles`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ci_cities`
--
ALTER TABLE `ci_cities`
  ADD CONSTRAINT `ci_cities_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_cities_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_cities_ibfk_3` FOREIGN KEY (`id_capital`) REFERENCES `ci_cities` (`id_city`),
  ADD CONSTRAINT `ci_cities_ibfk_4` FOREIGN KEY (`id_region`) REFERENCES `ci_cities` (`id_city`);

--
-- Filtros para la tabla `ci_files`
--
ALTER TABLE `ci_files`
  ADD CONSTRAINT `ci_files_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_files_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_files_ibfk_3` FOREIGN KEY (`id_parent`) REFERENCES `ci_users` (`id_user`);

--
-- Filtros para la tabla `ci_modules`
--
ALTER TABLE `ci_modules`
  ADD CONSTRAINT `ci_modules_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_modules_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`);

--
-- Filtros para la tabla `ci_provincias`
--
ALTER TABLE `ci_provincias`
  ADD CONSTRAINT `ci_provincias_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_provincias_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_provincias_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `ci_cities` (`id_city`),
  ADD CONSTRAINT `ci_provincias_ibfk_4` FOREIGN KEY (`id_municipio`) REFERENCES `ci_provincias` (`id_provincia`);

--
-- Filtros para la tabla `ci_roles`
--
ALTER TABLE `ci_roles`
  ADD CONSTRAINT `ci_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`);

--
-- Filtros para la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD CONSTRAINT `ci_sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `ci_users` (`id_user`);

--
-- Filtros para la tabla `ci_tables`
--
ALTER TABLE `ci_tables`
  ADD CONSTRAINT `ci_tables_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_tables_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `ci_users` (`id_user`),
  ADD CONSTRAINT `ci_tables_ibfk_3` FOREIGN KEY (`id_roles`) REFERENCES `ci_roles` (`id_role`),
  ADD CONSTRAINT `ci_tables_ibfk_4` FOREIGN KEY (`id_module`) REFERENCES `ci_modules` (`id_module`);

--
-- Filtros para la tabla `ci_users`
--
ALTER TABLE `ci_users`
  ADD CONSTRAINT `ci_users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `ci_roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
