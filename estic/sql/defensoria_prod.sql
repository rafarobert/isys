
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- ci_cities
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_cities`;

CREATE TABLE `ci_cities`
(
    `id_city` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(300),
    `description` VARCHAR(500),
    `abbreviation` VARCHAR(200),
    `id_capital` int(10) unsigned,
    `id_region` int(10) unsigned,
    `lat` INTEGER,
    `lng` INTEGER,
    `area` INTEGER,
    `nro_municipios` INTEGER,
    `surface` DECIMAL,
    `height` DECIMAL,
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_city`),
    UNIQUE INDEX `ci_cities_id_city_uindex` (`id_city`),
    INDEX `ci_cities_ibfk_1` (`id_user_created`),
    INDEX `ci_cities_ibfk_2` (`id_user_modified`),
    INDEX `ci_cities_ibfk_3` (`id_capital`),
    INDEX `ci_cities_ibfk_4` (`id_region`),
    CONSTRAINT `ci_cities_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_cities_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_cities_ibfk_3`
        FOREIGN KEY (`id_capital`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `ci_cities_ibfk_4`
        FOREIGN KEY (`id_region`)
        REFERENCES `ci_cities` (`id_city`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_files
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_files`;

CREATE TABLE `ci_files`
(
    `id_file` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `url` VARCHAR(450),
    `ext` VARCHAR(100),
    `raw_name` VARCHAR(400),
    `full_path` VARCHAR(400),
    `path` VARCHAR(400),
    `width` INTEGER,
    `height` INTEGER,
    `size` DECIMAL,
    `library` VARCHAR(20),
    `nro_thumbs` INTEGER,
    `id_parent` int(10) unsigned,
    `thumb_marker` VARCHAR(200),
    `type` VARCHAR(100),
    `status` VARCHAR(15) DEFAULT 'ENABLED',
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_file`),
    UNIQUE INDEX `ci_files_id_file_uindex` (`id_file`),
    INDEX `ci_files_ibfk_1` (`id_user_created`),
    INDEX `ci_files_ibfk_2` (`id_user_modified`),
    INDEX `ci_files_ibfk_3` (`id_parent`),
    CONSTRAINT `ci_files_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_files_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_files_ibfk_3`
        FOREIGN KEY (`id_parent`)
        REFERENCES `ci_files` (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_modules
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_modules`;

CREATE TABLE `ci_modules`
(
    `id_module` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `description` VARCHAR(500),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_module`),
    UNIQUE INDEX `ci_modules_id_module_uindex` (`id_module`),
    INDEX `ci_modules_ibfk_1` (`id_user_modified`),
    INDEX `ci_modules_ibfk_2` (`id_user_created`),
    CONSTRAINT `ci_modules_ibfk_1`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_modules_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_provincias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_provincias`;

CREATE TABLE `ci_provincias`
(
    `id_provincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(300),
    `area` VARCHAR(900),
    `lat` INTEGER,
    `lng` INTEGER,
    `id_municipio` int(11) unsigned,
    `id_ciudad` int(10) unsigned,
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_provincia`),
    UNIQUE INDEX `ci_provincias_id_provincia_uindex` (`id_provincia`),
    INDEX `ci_provincias_ibfk_1` (`id_user_created`),
    INDEX `ci_provincias_ibfk_2` (`id_user_modified`),
    INDEX `ci_provincias_ibfk_3` (`id_ciudad`),
    INDEX `ci_provincias_ibfk_4` (`id_municipio`),
    CONSTRAINT `ci_provincias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_provincias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_provincias_ibfk_3`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `ci_provincias_ibfk_4`
        FOREIGN KEY (`id_municipio`)
        REFERENCES `ci_provincias` (`id_provincia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_roles`;

CREATE TABLE `ci_roles`
(
    `id_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `description` VARCHAR(500),
    `write` VARCHAR(10),
    `read` VARCHAR(10),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned,
    `id_user_created` int(11) unsigned,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_role`),
    UNIQUE INDEX `ci_roles_id_role_uindex` (`id_role`),
    INDEX `ci_roles_ibfk_1` (`id_user_created`),
    INDEX `ci_roles_ibfk_2` (`id_user_modified`),
    CONSTRAINT `ci_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_sessions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions`
(
    `id` VARCHAR(128) NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` BLOB NOT NULL,
    `last_activity` DATETIME NOT NULL,
    `id_user` int(11) unsigned,
    `id_role` int(11) unsigned,
    PRIMARY KEY (`id`),
    INDEX `ci_sessions_ibfk_1` (`id_user`),
    CONSTRAINT `ci_sessions_ibfk_1`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_tables
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_tables`;

CREATE TABLE `ci_tables`
(
    `id_table` int(11) unsigned NOT NULL,
    `id_module` int(10) unsigned,
    `id_nivel_role` int(10) unsigned,
    `title` VARCHAR(100) NOT NULL,
    `table_name` VARCHAR(255),
    `listed` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `description` TEXT,
    `icon` VARCHAR(200) NOT NULL,
    `url` VARCHAR(400) NOT NULL,
    `status` VARCHAR(255) DEFAULT 'ENABLED',
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_table`),
    UNIQUE INDEX `ci_tables_id_table_uindex` (`id_table`),
    INDEX `ci_tables_ibfk_4` (`id_module`),
    INDEX `id_user_created` (`id_user_created`),
    INDEX `id_user_modified` (`id_user_modified`),
    INDEX `ci_tables_ibfk_3` (`id_nivel_role`),
    CONSTRAINT `ci_tables_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_ibfk_3`
        FOREIGN KEY (`id_nivel_role`)
        REFERENCES `ci_roles` (`id_role`),
    CONSTRAINT `ci_tables_ibfk_4`
        FOREIGN KEY (`id_module`)
        REFERENCES `ci_modules` (`id_module`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_users`;

CREATE TABLE `ci_users`
(
    `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `lastname` VARCHAR(256),
    `username` VARCHAR(250),
    `email` VARCHAR(100) DEFAULT '' NOT NULL,
    `address` VARCHAR(500),
    `password` VARCHAR(128) DEFAULT '' NOT NULL,
    `birthdate` DATE,
    `age` INTEGER,
    `carnet` VARCHAR(30),
    `sexo` VARCHAR(15),
    `phone_number_1` VARCHAR(20),
    `phone_number_2` VARCHAR(20),
    `cellphone_number_1` VARCHAR(20),
    `cellphone_number_2` VARCHAR(20),
    `picture` int(11) unsigned,
    `id_provincia` int(10) unsigned,
    `id_role` int(10) unsigned,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `signin_method` VARCHAR(100),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_user`),
    UNIQUE INDEX `ci_users_id_user_uindex` (`id_user`),
    INDEX `ci_users_ibfk_1` (`id_role`),
    INDEX `ci_users_ibfk_2` (`id_provincia`),
    CONSTRAINT `ci_users_ibfk_1`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`),
    CONSTRAINT `ci_users_ibfk_2`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_archivos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_archivos`;

CREATE TABLE `dfa_archivos`
(
    `id_archivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_file` int(10) unsigned,
    `id_portada` int(10) unsigned,
    `id_concepto` int(10) unsigned,
    `id_historia` int(10) unsigned,
    `id_delegacion` int(10) unsigned,
    `id_publicacion` int(10) unsigned,
    `detalle` VARCHAR(300),
    `descripcion` VARCHAR(300),
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_archivo`),
    UNIQUE INDEX `dfa_archivos_id_archivo_uindex` (`id_archivo`),
    INDEX `dfa_archivos_ibfk_1` (`id_user_created`),
    INDEX `dfa_archivos_ibfk_2` (`id_user_modified`),
    INDEX `dfa_archivos_ibfk_3` (`id_file`),
    INDEX `dfa_archivos_ibfk_4` (`id_portada`),
    INDEX `dfa_archivos_ibfk_5` (`id_concepto`),
    INDEX `dfa_archivos_ibfk_6` (`id_historia`),
    INDEX `dfa_archivos_ibfk_7` (`id_delegacion`),
    INDEX `dfa_archivos_ibfk_8` (`id_publicacion`),
    CONSTRAINT `dfa_archivos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_archivos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_archivos_ibfk_3`
        FOREIGN KEY (`id_file`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `dfa_archivos_ibfk_4`
        FOREIGN KEY (`id_portada`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `dfa_archivos_ibfk_5`
        FOREIGN KEY (`id_concepto`)
        REFERENCES `dfa_conceptos` (`id_concepto`),
    CONSTRAINT `dfa_archivos_ibfk_6`
        FOREIGN KEY (`id_historia`)
        REFERENCES `dfa_conceptos` (`id_concepto`),
    CONSTRAINT `dfa_archivos_ibfk_7`
        FOREIGN KEY (`id_delegacion`)
        REFERENCES `dfa_delegaciones` (`id_delegacion`),
    CONSTRAINT `dfa_archivos_ibfk_8`
        FOREIGN KEY (`id_publicacion`)
        REFERENCES `dfa_publicaciones` (`id_publicacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_conceptos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_conceptos`;

CREATE TABLE `dfa_conceptos`
(
    `id_concepto` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(300),
    `titulo` VARCHAR(300),
    `titular` VARCHAR(500),
    `descripcion` TEXT,
    `id_historia` int(10) unsigned,
    `ids_archivos` VARCHAR(400),
    `id_tipo_concepto` int(10) unsigned,
    `id_unidad` int(10) unsigned,
    `tipo` VARCHAR(300),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_concepto`),
    INDEX `dfa_conceptos_ibfk_2` (`id_user_created`),
    INDEX `dfa_conceptos_ibfk_3` (`id_user_modified`),
    INDEX `dfa_conceptos_ibfk_4` (`id_tipo_concepto`),
    INDEX `dfa_conceptos_ibfk_5` (`id_unidad`),
    INDEX `dfa_conceptos_ibfk_1` (`id_historia`),
    CONSTRAINT `dfa_conceptos_ibfk_1`
        FOREIGN KEY (`id_historia`)
        REFERENCES `dfa_conceptos` (`id_concepto`),
    CONSTRAINT `dfa_conceptos_ibfk_2`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_conceptos_ibfk_3`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_conceptos_ibfk_4`
        FOREIGN KEY (`id_tipo_concepto`)
        REFERENCES `dfa_tipos_conceptos` (`id_tipo_concepto`),
    CONSTRAINT `dfa_conceptos_ibfk_5`
        FOREIGN KEY (`id_unidad`)
        REFERENCES `dfa_unidades` (`id_unidad`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_convocatorias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_convocatorias`;

CREATE TABLE `dfa_convocatorias`
(
    `id_convocatoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_tipo_contrato` int(10) unsigned,
    `id_forma_contrato` int(10) unsigned,
    `fecha_requerida` DATE,
    `justificacion` VARCHAR(500),
    `nro` VARCHAR(100),
    `precio_referencial` DECIMAL,
    `fecha_publicacion` DATE,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `id_concepto` int(10) unsigned,
    PRIMARY KEY (`id_convocatoria`),
    UNIQUE INDEX `dfa_convocatorias_id_convocatoria_uindex` (`id_convocatoria`),
    INDEX `dfa_convocatorias_ibfk_1` (`id_user_created`),
    INDEX `dfa_convocatorias_ibfk_2` (`id_user_modified`),
    INDEX `dfa_convocatorias_ibfk_3` (`id_tipo_contrato`),
    INDEX `dfa_convocatorias_ibfk_4` (`id_forma_contrato`),
    CONSTRAINT `dfa_convocatorias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_convocatorias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_convocatorias_ibfk_3`
        FOREIGN KEY (`id_tipo_contrato`)
        REFERENCES `dfa_tipos_contratos` (`id_tipo_contrato`),
    CONSTRAINT `dfa_convocatorias_ibfk_4`
        FOREIGN KEY (`id_forma_contrato`)
        REFERENCES `dfa_tipos_contratos` (`id_tipo_contrato`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_delegaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_delegaciones`;

CREATE TABLE `dfa_delegaciones`
(
    `id_delegacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `direccion` VARCHAR(200),
    `id_contacto` int(10) unsigned,
    `telefono` VARCHAR(20),
    `id_ciudad` int(10) unsigned,
    `id_provincia` int(10) unsigned,
    `id_coordinacion` int(10) unsigned,
    `lat` DECIMAL,
    `lng` DECIMAL,
    `tipo` VARCHAR(100),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `id_convocatoria` int(10) unsigned,
    PRIMARY KEY (`id_delegacion`),
    UNIQUE INDEX `dfa_delegaciones_id_delegacion_uindex` (`id_delegacion`),
    INDEX `dfa_delegaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_delegaciones_ibfk_2` (`id_user_modified`),
    INDEX `dfa_delegaciones_ibfk_3` (`id_contacto`),
    INDEX `dfa_delegaciones_ibfk_4` (`id_ciudad`),
    INDEX `dfa_delegaciones_ibfk_5` (`id_provincia`),
    INDEX `dfa_delegaciones_ibfk_6` (`id_coordinacion`),
    CONSTRAINT `dfa_delegaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_delegaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_delegaciones_ibfk_3`
        FOREIGN KEY (`id_contacto`)
        REFERENCES `dfa_empleados` (`id_empleado`),
    CONSTRAINT `dfa_delegaciones_ibfk_4`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_delegaciones_ibfk_5`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`),
    CONSTRAINT `dfa_delegaciones_ibfk_6`
        FOREIGN KEY (`id_coordinacion`)
        REFERENCES `dfa_delegaciones` (`id_delegacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_denuncias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_denuncias`;

CREATE TABLE `dfa_denuncias`
(
    `id_denuncia` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_victima` int(10) unsigned,
    `descripcion` TEXT,
    `lugar_riesgo` VARCHAR(500),
    `id_relacion` int(10) unsigned,
    `desc_lugar` TEXT,
    `desc_denunciado` TEXT,
    `desc_mal_servicio` TEXT,
    `id_delegacion` int(10) unsigned,
    `id_rango_edad` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_denuncia`),
    UNIQUE INDEX `dfa_denuncias_id_denuncia_uindex` (`id_denuncia`),
    INDEX `dfa_denuncias_ibfk_1` (`id_user_created`),
    INDEX `dfa_denuncias_ibfk_2` (`id_user_modified`),
    INDEX `dfa_denuncias_ibfk_4` (`id_victima`),
    INDEX `dfa_denuncias_ibfk_5` (`id_relacion`),
    CONSTRAINT `dfa_denuncias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_denuncias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_denuncias_ibfk_4`
        FOREIGN KEY (`id_victima`)
        REFERENCES `dfa_personas` (`id_persona`),
    CONSTRAINT `dfa_denuncias_ibfk_5`
        FOREIGN KEY (`id_relacion`)
        REFERENCES `dfa_tipos_relaciones` (`id_tipo_relacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_empleados
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_empleados`;

CREATE TABLE `dfa_empleados`
(
    `id_empleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_usuario` int(10) unsigned,
    `id_oficina` int(10) unsigned,
    `id_puesto` int(10) unsigned,
    `id_unidad` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_empleado`),
    UNIQUE INDEX `dfa_empleados_id_empleado_uindex` (`id_empleado`),
    INDEX `dfa_empleados_ibfk_1` (`id_user_created`),
    INDEX `dfa_empleados_ibfk_2` (`id_user_modified`),
    INDEX `dfa_empleados_ibfk_3` (`id_usuario`),
    INDEX `dfa_empleados_ibfk_4` (`id_puesto`),
    INDEX `dfa_empleados_ibfk_5` (`id_unidad`),
    INDEX `dfa_empleados_ibfk_6` (`id_oficina`),
    CONSTRAINT `dfa_empleados_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_3`
        FOREIGN KEY (`id_usuario`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_4`
        FOREIGN KEY (`id_puesto`)
        REFERENCES `dfa_tipos_puestos` (`id_puesto`),
    CONSTRAINT `dfa_empleados_ibfk_5`
        FOREIGN KEY (`id_unidad`)
        REFERENCES `dfa_unidades` (`id_unidad`),
    CONSTRAINT `dfa_empleados_ibfk_6`
        FOREIGN KEY (`id_oficina`)
        REFERENCES `dfa_oficinas` (`id_oficina`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_estadisticas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_estadisticas`;

CREATE TABLE `dfa_estadisticas`
(
    `id_estadistica` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_ciudad` int(10) unsigned,
    `id_provincia` int(10) unsigned,
    `total_denuncias` INTEGER,
    `porcentaje` VARCHAR(100),
    `id_procedimiento` int(10) unsigned,
    `id_residencia` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_estadistica`),
    UNIQUE INDEX `dfa_estadisticas_id_estadistica_uindex` (`id_estadistica`),
    INDEX `dfa_estadisticas_ibfk_1` (`id_user_created`),
    INDEX `dfa_estadisticas_ibfk_2` (`id_user_modified`),
    INDEX `dfa_estadisticas_ibfk_3` (`id_ciudad`),
    INDEX `dfa_estadisticas_ibfk_4` (`id_provincia`),
    INDEX `dfa_estadisticas_ibfk_5` (`id_procedimiento`),
    INDEX `dfa_estadisticas_ibfk_6` (`id_residencia`),
    CONSTRAINT `dfa_estadisticas_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_estadisticas_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_estadisticas_ibfk_3`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_estadisticas_ibfk_4`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`),
    CONSTRAINT `dfa_estadisticas_ibfk_5`
        FOREIGN KEY (`id_procedimiento`)
        REFERENCES dfa_tipos_procedimientos (id_tipo_procedimiento),
    CONSTRAINT `dfa_estadisticas_ibfk_6`
        FOREIGN KEY (`id_residencia`)
        REFERENCES `dfa_tipos_residencias` (`id_residencia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_oficinas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_oficinas`;

CREATE TABLE `dfa_oficinas`
(
    `id_oficina` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_provincia` int(10) unsigned,
    `id_ciudad` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_oficina`),
    UNIQUE INDEX `dfa_oficinas_id_oficina_uindex` (`id_oficina`),
    INDEX `dfa_oficinas_ibfk_1` (`id_user_created`),
    INDEX `dfa_oficinas_ibfk_2` (`id_user_modified`),
    INDEX `dfa_oficinas_ibfk_3` (`id_provincia`),
    INDEX `dfa_oficinas_ibfk_4` (`id_ciudad`),
    CONSTRAINT `dfa_oficinas_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_oficinas_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_oficinas_ibfk_3`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`),
    CONSTRAINT `dfa_oficinas_ibfk_4`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_organismos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_organismos`;

CREATE TABLE `dfa_organismos`
(
    `id_organismo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_organismo`),
    UNIQUE INDEX `dfa_organismos_id_organismo_uindex` (`id_organismo`),
    INDEX `dfa_organismos_ibfk_1` (`id_user_created`),
    INDEX `dfa_organismos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_organismos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_organismos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_personas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_personas`;

CREATE TABLE `dfa_personas`
(
    `id_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_usuario` int(10) unsigned,
    `id_residencia` int(10) unsigned,
    `id_rango_edad` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_persona`),
    UNIQUE INDEX `dfa_personas_id_persona_uindex` (`id_persona`),
    INDEX `dfa_personas_ibfk_1` (`id_user_created`),
    INDEX `dfa_personas_ibfk_2` (`id_user_modified`),
    INDEX `dfa_personas_ibfk_3` (`id_usuario`),
    INDEX `dfa_personas_ibfk_4` (`id_residencia`),
    INDEX `dfa_personas_ibfk_5` (`id_rango_edad`),
    CONSTRAINT `dfa_personas_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_3`
        FOREIGN KEY (`id_usuario`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_4`
        FOREIGN KEY (`id_residencia`)
        REFERENCES `dfa_tipos_residencias` (`id_residencia`),
    CONSTRAINT `dfa_personas_ibfk_5`
        FOREIGN KEY (`id_rango_edad`)
        REFERENCES `dfa_rangos_edades` (`id_rango_edad`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_procedimientos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_procedimientos`;

CREATE TABLE `dfa_procedimientos`
(
    `id_procedimiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_procedimiento`),
    UNIQUE INDEX `dfa_procedimientos_id_procedimiento_uindex` (`id_procedimiento`),
    INDEX `dfa_procedimientos_ibfk_1` (`id_user_created`),
    INDEX `dfa_procedimientos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_procedimientos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_procedimientos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_proveedores
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_proveedores`;

CREATE TABLE `dfa_proveedores`
(
    `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `id_servicio` int(10) unsigned,
    `id_ciudad` int(10) unsigned,
    `id_provincia` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `column_12` INTEGER,
    PRIMARY KEY (`id_proveedor`),
    UNIQUE INDEX `dfa_proveedores_id_proveedor_uindex` (`id_proveedor`),
    INDEX `dfa_proveedores_ibfk_1` (`id_user_created`),
    INDEX `dfa_proveedores_ibfk_2` (`id_user_modified`),
    INDEX `dfa_proveedores_ibfk_3` (`id_servicio`),
    INDEX `dfa_proveedores_ibfk_4` (`id_ciudad`),
    INDEX `dfa_proveedores_ibfk_5` (`id_provincia`),
    CONSTRAINT `dfa_proveedores_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_proveedores_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_proveedores_ibfk_3`
        FOREIGN KEY (`id_servicio`)
        REFERENCES `dfa_tipos_servicios` (`id_servicio`),
    CONSTRAINT `dfa_proveedores_ibfk_4`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_proveedores_ibfk_5`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_publicaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_publicaciones`;

CREATE TABLE `dfa_publicaciones`
(
    `id_publicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(200),
    `titular` VARCHAR(500),
    `descripcion` VARCHAR(500),
    `fecha_publicacion` DATETIME,
    `id_delegacion` int(10) unsigned,
    `id_unidad` int(10) unsigned,
    `id_categoria_publicacion` int(10) unsigned,
    `etiquetas` VARCHAR(250),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_publicacion`),
    UNIQUE INDEX `dfa_publicaciones_id_publicacion_uindex` (`id_publicacion`),
    INDEX `dfa_publicaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_publicaciones_ibfk_2` (`id_user_modified`),
    INDEX `dfa_publicaciones_ibfk_3` (`id_delegacion`),
    INDEX `dfa_publicaciones_ibfk_4` (`id_unidad`),
    INDEX `dfa_publicaciones_ibfk_5` (`id_categoria_publicacion`),
    CONSTRAINT `dfa_publicaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_publicaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_publicaciones_ibfk_3`
        FOREIGN KEY (`id_delegacion`)
        REFERENCES `dfa_delegaciones` (`id_delegacion`),
    CONSTRAINT `dfa_publicaciones_ibfk_4`
        FOREIGN KEY (`id_unidad`)
        REFERENCES `dfa_unidades` (`id_unidad`),
    CONSTRAINT `dfa_publicaciones_ibfk_5`
        FOREIGN KEY (`id_categoria_publicacion`)
        REFERENCES dfa_categorias_publicaciones (`id_tipos_publicacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_rangos_edades
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_rangos_edades`;

CREATE TABLE `dfa_rangos_edades`
(
    `id_rango_edad` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_rango_edad`),
    UNIQUE INDEX `dfa_rangos_edades_id_rango_edad_uindex` (`id_rango_edad`),
    INDEX `dfa_rangos_edades_ibfk_1` (`id_user_created`),
    INDEX `dfa_rangos_edades_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_rangos_edades_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_rangos_edades_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_conceptos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_conceptos`;

CREATE TABLE `dfa_tipos_conceptos`
(
    `id_tipo_concepto` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(300),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_tipo_concepto`),
    UNIQUE INDEX `dfa_tipos_conceptos_id_tipo_concepto_uindex` (`id_tipo_concepto`),
    INDEX `dfa_tipos_conceptos_ibfk_1` (`id_user_created`),
    INDEX `dfa_tipos_conceptos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_conceptos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_conceptos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_contratos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_contratos`;

CREATE TABLE `dfa_tipos_contratos`
(
    `id_tipo_contrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    `tipo` VARCHAR(300),
    PRIMARY KEY (`id_tipo_contrato`),
    UNIQUE INDEX `dfa_tipos_contratos_id_tipo_contrato_uindex` (`id_tipo_contrato`),
    INDEX `dfa_tipos_contratos_ibfk_1` (`id_user_created`),
    INDEX `dfa_tipos_contratos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_contratos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_contratos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_publicaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_publicaciones`;

CREATE TABLE `dfa_tipos_publicaciones`
(
    `id_tipos_publicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_tipos_publicacion`),
    UNIQUE INDEX `dfa_categorias_publicaciones_id_categoria_publicacion_uindex` (`id_tipos_publicacion`),
    INDEX `dfa_categorias_publicaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_categorias_publicaciones_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_publicaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_publicaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_puestos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_puestos`;

CREATE TABLE `dfa_tipos_puestos`
(
    `id_puesto` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_puesto`),
    UNIQUE INDEX `dfa_puestos_id_puesto_uindex` (`id_puesto`),
    INDEX `dfa_puestos_ibfk_1` (`id_user_created`),
    INDEX `dfa_puestos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_puestos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_puestos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_relaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_relaciones`;

CREATE TABLE `dfa_tipos_relaciones`
(
    `id_tipo_relacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_tipo_relacion`),
    UNIQUE INDEX `dfa_relaciones_id_relacion_uindex` (`id_tipo_relacion`),
    INDEX `dfa_relaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_relaciones_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_relaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_relaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_residencias
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_residencias`;

CREATE TABLE `dfa_tipos_residencias`
(
    `id_residencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_residencia`),
    UNIQUE INDEX `dfa_residencias_id_residencia_uindex` (`id_residencia`),
    INDEX `dfa_residencias_ibfk_1` (`id_user_created`),
    INDEX `dfa_residencias_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_residencias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_residencias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_tipos_servicios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_servicios`;

CREATE TABLE `dfa_tipos_servicios`
(
    `id_servicio` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_servicio`),
    UNIQUE INDEX `dfa_servicios_id_servicio_uindex` (`id_servicio`),
    INDEX `dfa_servicios_ibfk_1` (`id_user_created`),
    INDEX `dfa_servicios_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_servicios_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_servicios_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_unidades
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_unidades`;

CREATE TABLE `dfa_unidades`
(
    `id_unidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `id_adjuntoria` int(10) unsigned,
    `id_direccion` int(10) unsigned,
    `mapa` VARCHAR(900),
    `tipo` VARCHAR(200),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_unidad`),
    INDEX `dfa_unidades_ibfk_1` (`id_user_created`),
    INDEX `dfa_unidades_ibfk_2` (`id_user_modified`),
    INDEX `dfa_unidades_ibfk_3` (`id_adjuntoria`),
    INDEX `dfa_unidades_ibfk_4` (`id_direccion`),
    CONSTRAINT `dfa_unidades_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_unidades_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_unidades_ibfk_3`
        FOREIGN KEY (`id_adjuntoria`)
        REFERENCES `dfa_unidades` (`id_unidad`),
    CONSTRAINT `dfa_unidades_ibfk_4`
        FOREIGN KEY (`id_direccion`)
        REFERENCES `dfa_unidades` (`id_unidad`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations`
(
    `version` BIGINT NOT NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
