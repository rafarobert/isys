
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
    `lat` DECIMAL(10,6),
    `lng` DECIMAL(10,6),
    `area` INTEGER,
    `nro_municipios` INTEGER,
    `surface` DECIMAL,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `height` DECIMAL,
    `tipo` VARCHAR(490),
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
    INDEX `ci_cities_ibfk_5` (`id_cover_picture`),
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
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `ci_cities_ibfk_5`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_domains
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_domains`;

CREATE TABLE `ci_domains`
(
    `id_domain` INTEGER NOT NULL AUTO_INCREMENT,
    `host` VARCHAR(450),
    `hostname` VARCHAR(450),
    `protocol` VARCHAR(10),
    `port` INTEGER,
    `origin` VARCHAR(450),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_domain`),
    UNIQUE INDEX `ci_domains_id_domain_uindex` (`id_domain`),
    INDEX `ci_domains_ibfk_1` (`id_user_created`),
    INDEX `ci_domains_ibfk_2` (`id_user_modified`),
    CONSTRAINT `ci_domains_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_domains_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
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
    `x` DECIMAL(20,10),
    `y` DECIMAL(20,10),
    `fix_width` DECIMAL(20,10),
    `fix_height` DECIMAL(20,10),
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
-- ci_logs
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_logs`;

CREATE TABLE `ci_logs`
(
    `id_log` INTEGER NOT NULL AUTO_INCREMENT,
    `heading` VARCHAR(499),
    `message` TEXT,
    `action` VARCHAR(499),
    `code` VARCHAR(200),
    `level` INTEGER,
    `file` VARCHAR(1000),
    `line` INTEGER,
    `trace` TEXT,
    `previous` VARCHAR(499),
    `xdebug_message` TEXT,
    `type` INTEGER,
    `post` VARCHAR(1000),
    `severity` VARCHAR(400),
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_log`),
    UNIQUE INDEX `ci_logs_id_log_uindex` (`id_log`)
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
    `last_activity` DATETIME DEFAULT '0000-00-00 00:00:00',
    `id_user` int(11) unsigned,
    `lng` INTEGER,
    `lat` INTEGER,
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
    `id_role` int(10) unsigned,
    `title` VARCHAR(100) NOT NULL,
    `table_name` VARCHAR(255),
    `listed` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `description` TEXT,
    `icon` VARCHAR(200) NOT NULL,
    `url` VARCHAR(400) NOT NULL,
    `url_edit` VARCHAR(450),
    `url_index` VARCHAR(450),
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
    INDEX `ci_tables_ibfk_3` (`id_role`),
    CONSTRAINT `ci_tables_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_ibfk_3`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`),
    CONSTRAINT `ci_tables_ibfk_4`
        FOREIGN KEY (`id_module`)
        REFERENCES `ci_modules` (`id_module`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_tables_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_tables_roles`;

CREATE TABLE `ci_tables_roles`
(
    `id_table_role` INTEGER NOT NULL AUTO_INCREMENT,
    `id_table` int(10) unsigned,
    `id_role` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_table_role`),
    UNIQUE INDEX `ci_tables_roles_id_table_role_uindex` (`id_table_role`),
    INDEX `ci_tables_roles_ibfk_1` (`id_user_created`),
    INDEX `ci_tables_roles_ibfk_2` (`id_user_modified`),
    INDEX `ci_tables_roles_ibfk_3` (`id_table`),
    INDEX `ci_tables_roles_ibfk_4` (`id_role`),
    CONSTRAINT `ci_tables_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_tables_roles_ibfk_3`
        FOREIGN KEY (`id_table`)
        REFERENCES `ci_tables` (`id_table`),
    CONSTRAINT `ci_tables_roles_ibfk_4`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`)
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
    `phone_1` VARCHAR(20),
    `phone_2` VARCHAR(20),
    `cellphone_1` VARCHAR(20),
    `cellphone_2` VARCHAR(20),
    `ids_files` VARCHAR(450),
    `id_cover_picture` int(10) unsigned,
    `id_city` int(10) unsigned,
    `id_provincia` int(10) unsigned,
    `id_role` int(10) unsigned,
    `signin_method` VARCHAR(100),
    `uid` VARCHAR(499),
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `status` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_user`),
    UNIQUE INDEX `ci_users_id_user_uindex` (`id_user`),
    INDEX `ci_users_ibfk_1` (`id_role`),
    INDEX `ci_users_ibfk_2` (`id_provincia`),
    INDEX `ci_users_ibfk_3` (`id_cover_picture`),
    INDEX `ci_users_ibfk_4` (`id_city`),
    CONSTRAINT `ci_users_ibfk_1`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`),
    CONSTRAINT `ci_users_ibfk_2`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`),
    CONSTRAINT `ci_users_ibfk_3`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `ci_users_ibfk_4`
        FOREIGN KEY (`id_city`)
        REFERENCES `ci_cities` (`id_city`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ci_users_roles
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ci_users_roles`;

CREATE TABLE `ci_users_roles`
(
    `id_user_role` INTEGER NOT NULL AUTO_INCREMENT,
    `id_user` int(10) unsigned,
    `id_role` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_user_role`),
    UNIQUE INDEX `dfa_usuarios_roles_id_usuario_role_uindex` (`id_user_role`),
    INDEX `dfa_usuarios_roles_ibfk_1` (`id_user_created`),
    INDEX `dfa_usuarios_roles_ibfk_2` (`id_user_modified`),
    INDEX `dfa_usuarios_roles_ibfk_3` (`id_user`),
    INDEX `dfa_usuarios_roles_ibfk_4` (`id_role`),
    CONSTRAINT `ci_users_roles_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_users_roles_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_users_roles_ibfk_3`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `ci_users_roles_ibfk_4`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_archivos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_archivos`;

CREATE TABLE `dfa_archivos`
(
    `id_archivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(400),
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `descripcion` VARCHAR(499),
    `estado_publicacion` VARCHAR(300),
    `id_etiquetas` VARCHAR(490),
    `id_entidad` int(10) unsigned,
    `id_categoria_publicacion` int(10) unsigned,
    `revisado` VARCHAR(300),
    `comentarios` TEXT,
    `id_seccion_publicacion` int(10) unsigned,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `tipo` VARCHAR(300),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_created` DATETIME NOT NULL,
    `date_modified` DATETIME NOT NULL,
    PRIMARY KEY (`id_archivo`),
    UNIQUE INDEX `dfa_archivos_id_archivo_uindex` (`id_archivo`),
    INDEX `dfa_archivos_ibfk_3` (`id_cover_picture`),
    INDEX `dfa_archivos_ibfk_1` (`id_user_created`),
    INDEX `dfa_archivos_ibfk_2` (`id_user_modified`),
    INDEX `dfa_archivos_ibfk_4` (`id_entidad`),
    INDEX `dfa_archivos_ibfk_5` (`id_categoria_publicacion`),
    INDEX `dfa_archivos_ibfk_6` (`id_seccion_publicacion`),
    CONSTRAINT `dfa_archivos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_archivos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_archivos_ibfk_3`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `dfa_archivos_ibfk_4`
        FOREIGN KEY (`id_entidad`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_archivos_ibfk_5`
        FOREIGN KEY (`id_categoria_publicacion`)
        REFERENCES `dfa_categorias_publicaciones` (`id_categoria_publicacion`),
    CONSTRAINT `dfa_archivos_ibfk_6`
        FOREIGN KEY (`id_seccion_publicacion`)
        REFERENCES `dfa_secciones_publicaciones` (`id_seccion_publicacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_categorias_publicaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_categorias_publicaciones`;

CREATE TABLE `dfa_categorias_publicaciones`
(
    `id_categoria_publicacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `titulo` VARCHAR(490),
    `id_seccion_publicacion` int(10) unsigned,
    `icons` VARCHAR(450),
    `id_cover_picture` int(10) unsigned,
    `ids_files` VARCHAR(490),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_categoria_publicacion`),
    UNIQUE INDEX `dfa_categorias_publicaciones_id_categoria_publicacion_uindex` (`id_categoria_publicacion`),
    INDEX `dfa_categorias_publicaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_categorias_publicaciones_ibfk_2` (`id_user_modified`),
    INDEX `dfa_categorias_publicaciones_ibfk_3` (`id_seccion_publicacion`),
    CONSTRAINT `dfa_categorias_publicaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_categorias_publicaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_categorias_publicaciones_ibfk_3`
        FOREIGN KEY (`id_seccion_publicacion`)
        REFERENCES `dfa_secciones_publicaciones` (`id_seccion_publicacion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_conceptos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_conceptos`;

CREATE TABLE `dfa_conceptos`
(
    `id_concepto` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `titulo` VARCHAR(300),
    `titular` TEXT,
    `descripcion` TEXT,
    `id_historia` int(10) unsigned,
    `id_tipo_concepto` int(10) unsigned,
    `id_unidad` int(10) unsigned,
    `tipo` VARCHAR(300),
    `estado_publicacion` VARCHAR(250),
    `revisado` VARCHAR(250),
    `comentarios` TEXT,
    `ids_files` VARCHAR(400),
    `id_cover_picture` int(10) unsigned,
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
    INDEX `dfa_conceptos_ibfk_6` (`id_cover_picture`),
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
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_conceptos_ibfk_6`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`)
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
    `id_concepto` int(10) unsigned,
    `id_entidad` int(10) unsigned,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_convocatoria`),
    UNIQUE INDEX `dfa_convocatorias_id_convocatoria_uindex` (`id_convocatoria`),
    INDEX `dfa_convocatorias_ibfk_1` (`id_user_created`),
    INDEX `dfa_convocatorias_ibfk_2` (`id_user_modified`),
    INDEX `dfa_convocatorias_ibfk_3` (`id_tipo_contrato`),
    INDEX `dfa_convocatorias_ibfk_4` (`id_forma_contrato`),
    INDEX `dfa_convocatorias_ibfk_5` (`id_entidad`),
    INDEX `dfa_convocatorias_ibfk_6` (`id_cover_picture`),
    INDEX `dfa_convocatorias_ibfk_7` (`id_concepto`),
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
        REFERENCES `dfa_tipos_contratos` (`id_tipo_contrato`),
    CONSTRAINT `dfa_convocatorias_ibfk_5`
        FOREIGN KEY (`id_entidad`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_convocatorias_ibfk_6`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `dfa_convocatorias_ibfk_7`
        FOREIGN KEY (`id_concepto`)
        REFERENCES `dfa_conceptos` (`id_concepto`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_cursos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_cursos`;

CREATE TABLE `dfa_cursos`
(
    `id_curso` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(400),
    `descripcion` TEXT,
    `resumen` VARCHAR(500),
    `num_modulos` INTEGER,
    `fecha_inicio` DATETIME,
    `fecha_final` DATETIME,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `id_entidad` int(10) unsigned,
    `modalidad` VARCHAR(300),
    `duracion` VARCHAR(300),
    `carga_horaria` VARCHAR(300),
    `dedicacion_semanal` VARCHAR(300),
    `id_parent` int(10) unsigned,
    `num_modulo` INTEGER,
    `tipo` VARCHAR(300),
    `id_city` int(10) unsigned,
    `estado_publicacion` VARCHAR(300),
    `revisado` VARCHAR(300),
    `comentarios` TEXT,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_curso`),
    UNIQUE INDEX `dfa_cursos_id_curso_uindex` (`id_curso`),
    INDEX `dfa_cursos_ibfk_1` (`id_user_created`),
    INDEX `dfa_cursos_ibfk_2` (`id_user_modified`),
    INDEX `dfa_cursos_ibfk_3` (`id_cover_picture`),
    INDEX `dfa_cursos_ibfk_4` (`id_entidad`),
    INDEX `dfa_cursos_ibfk_5` (`id_parent`),
    INDEX `dfa_cursos_ibfk_6` (`id_city`),
    CONSTRAINT `dfa_cursos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_cursos_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_cursos_ibfk_3`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`),
    CONSTRAINT `dfa_cursos_ibfk_4`
        FOREIGN KEY (`id_entidad`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_cursos_ibfk_5`
        FOREIGN KEY (`id_parent`)
        REFERENCES `dfa_cursos` (`id_curso`),
    CONSTRAINT `dfa_cursos_ibfk_6`
        FOREIGN KEY (`id_city`)
        REFERENCES `ci_cities` (`id_city`)
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
    `id_tipo_relacion` int(10) unsigned,
    `desc_lugar` TEXT,
    `desc_denunciado` TEXT,
    `desc_mal_servicio` TEXT,
    `id_oficina` int(10) unsigned,
    `id_rango_edad` int(10) unsigned,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
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
    INDEX `dfa_denuncias_ibfk_5` (`id_tipo_relacion`),
    INDEX `dfa_denuncias_ibfk_3` (`id_oficina`),
    INDEX `dfa_denuncias_ibfk_6` (`id_rango_edad`),
    CONSTRAINT `dfa_denuncias_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_denuncias_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_denuncias_ibfk_3`
        FOREIGN KEY (`id_oficina`)
        REFERENCES `dfa_oficinas` (`id_oficina`),
    CONSTRAINT `dfa_denuncias_ibfk_4`
        FOREIGN KEY (`id_victima`)
        REFERENCES `dfa_personas` (`id_persona`),
    CONSTRAINT `dfa_denuncias_ibfk_5`
        FOREIGN KEY (`id_tipo_relacion`)
        REFERENCES `dfa_tipos_relaciones` (`id_tipo_relacion`),
    CONSTRAINT `dfa_denuncias_ibfk_6`
        FOREIGN KEY (`id_rango_edad`)
        REFERENCES `dfa_rangos_edades` (`id_rango_edad`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_empleados
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_empleados`;

CREATE TABLE `dfa_empleados`
(
    `id_empleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_user` int(10) unsigned,
    `id_role` int(10) unsigned,
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
    INDEX `dfa_empleados_ibfk_3` (`id_user`),
    INDEX `dfa_empleados_ibfk_4` (`id_puesto`),
    INDEX `dfa_empleados_ibfk_5` (`id_unidad`),
    INDEX `dfa_empleados_ibfk_6` (`id_oficina`),
    INDEX `dfa_empleados_ibfk_7` (`id_role`),
    CONSTRAINT `dfa_empleados_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_3`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_empleados_ibfk_4`
        FOREIGN KEY (`id_puesto`)
        REFERENCES `dfa_tipos_puestos` (`id_puesto`),
    CONSTRAINT `dfa_empleados_ibfk_5`
        FOREIGN KEY (`id_unidad`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_empleados_ibfk_6`
        FOREIGN KEY (`id_oficina`)
        REFERENCES `dfa_oficinas` (`id_oficina`),
    CONSTRAINT `dfa_empleados_ibfk_7`
        FOREIGN KEY (`id_role`)
        REFERENCES `ci_roles` (`id_role`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_entidades
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_entidades`;

CREATE TABLE `dfa_entidades`
(
    `id_entidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `id_parent` int(10) unsigned,
    `mapa` VARCHAR(900),
    `tipo` VARCHAR(200),
    `lng` DECIMAL(10,6),
    `lat` DECIMAL(10,6),
    `id_provincia` int(10) unsigned,
    `id_ciudad` int(10) unsigned,
    `telefono` VARCHAR(50),
    `id_delegado` int(10) unsigned,
    `direccion` VARCHAR(450),
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_entidad`),
    INDEX `dfa_unidades_ibfk_1` (`id_user_created`),
    INDEX `dfa_unidades_ibfk_2` (`id_user_modified`),
    INDEX `dfa_unidades_ibfk_3` (`id_parent`),
    INDEX `dfa_entidades_ibfk_4` (`id_delegado`),
    INDEX `dfa_entidades_ibfk_5` (`id_ciudad`),
    INDEX `dfa_entidades_ibfk_6` (`id_provincia`),
    INDEX `dfa_entidades_ibfk_7` (`id_cover_picture`),
    CONSTRAINT `dfa_entidades_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_entidades_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_entidades_ibfk_3`
        FOREIGN KEY (`id_parent`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_entidades_ibfk_4`
        FOREIGN KEY (`id_delegado`)
        REFERENCES `dfa_empleados` (`id_empleado`),
    CONSTRAINT `dfa_entidades_ibfk_5`
        FOREIGN KEY (`id_ciudad`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_entidades_ibfk_6`
        FOREIGN KEY (`id_provincia`)
        REFERENCES `ci_provincias` (`id_provincia`),
    CONSTRAINT `dfa_entidades_ibfk_7`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_entidades_tables
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_entidades_tables`;

CREATE TABLE `dfa_entidades_tables`
(
    `id_unidad_table` INTEGER NOT NULL AUTO_INCREMENT,
    `id_unidad` int(10) unsigned,
    `id_table` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_unidad_table`),
    UNIQUE INDEX `dfa_unidades_tables_id_unidad_table_uindex` (`id_unidad_table`),
    INDEX `dfa_unidades_tables_ibfk_1` (`id_user_created`),
    INDEX `dfa_unidades_tables_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_entidades_tables_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_entidades_tables_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
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
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
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
        REFERENCES `dfa_tipos_procedimientos` (`id_tipo_procedimiento`),
    CONSTRAINT `dfa_estadisticas_ibfk_6`
        FOREIGN KEY (`id_residencia`)
        REFERENCES `dfa_tipos_residencias` (`id_residencia`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_estudiantes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_estudiantes`;

CREATE TABLE `dfa_estudiantes`
(
    `id_estudiante` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `id_user` int(10) unsigned,
    `id_curso` int(10) unsigned,
    `nota` INTEGER,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `ids_cursos` VARCHAR(490),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_estudiante`),
    UNIQUE INDEX `dfa_estudiantes_id_estudiante_uindex` (`id_estudiante`),
    INDEX `dfa_estudiantes_ibfk_1` (`id_user_created`),
    INDEX `dfa_estudiantes_ibfk_2` (`id_user_modified`),
    INDEX `dfa_estudiantes_ibfk_3` (`id_curso`),
    INDEX `dfa_estudiantes_ibfk_5` (`id_user`),
    CONSTRAINT `dfa_estudiantes_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_estudiantes_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_estudiantes_ibfk_3`
        FOREIGN KEY (`id_curso`)
        REFERENCES `dfa_cursos` (`id_curso`),
    CONSTRAINT `dfa_estudiantes_ibfk_5`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_etiquetas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_etiquetas`;

CREATE TABLE `dfa_etiquetas`
(
    `id_etiqueta` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(250),
    `descripcion` VARCHAR(500),
    `icons` VARCHAR(450),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_etiqueta`),
    UNIQUE INDEX `dfa_etiquetas_id_etiqueta_uindex` (`id_etiqueta`),
    INDEX `dfa_etiquetas_ibfk_1` (`id_user_created`),
    INDEX `dfa_etiquetas_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_etiquetas_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_etiquetas_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_layouts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_layouts`;

CREATE TABLE `dfa_layouts`
(
    `id_layout` int(10) unsigned NOT NULL,
    `titulo` VARCHAR(490),
    `content` TEXT,
    `id_entidad` int(10) unsigned,
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_layout`),
    INDEX `dfa_layouts_ibfk_1` (`id_user_created`),
    INDEX `dfa_layouts_ibfk_2` (`id_user_modified`),
    INDEX `dfa_layouts_ibfk_3` (`id_entidad`),
    CONSTRAINT `dfa_layouts_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_layouts_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_layouts_ibfk_3`
        FOREIGN KEY (`id_entidad`)
        REFERENCES `dfa_entidades` (`id_entidad`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_oficinas
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_oficinas`;

CREATE TABLE `dfa_oficinas`
(
    `id_oficina` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `direccion` VARCHAR(800),
    `id_contacto` int(10) unsigned,
    `telefono_1` VARCHAR(30),
    `telefono_2` VARCHAR(30),
    `celular_1` VARCHAR(30),
    `celular_2` VARCHAR(30),
    `id_provincia` int(10) unsigned,
    `id_ciudad` int(10) unsigned,
    `ids_files` VARCHAR(490),
    `id_cover_picture` int(10) unsigned,
    `lat` DECIMAL(10,6),
    `lng` DECIMAL(10,6),
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
    INDEX `dfa_oficinas_ibfk_5` (`id_contacto`),
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
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_oficinas_ibfk_5`
        FOREIGN KEY (`id_contacto`)
        REFERENCES `dfa_empleados` (`id_empleado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- dfa_organismos_financiadores
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_organismos_financiadores`;

CREATE TABLE `dfa_organismos_financiadores`
(
    `id_organismo_financiador` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_organismo_financiador`),
    UNIQUE INDEX `dfa_organismos_id_organismo_uindex` (`id_organismo_financiador`),
    INDEX `dfa_organismos_ibfk_1` (`id_user_created`),
    INDEX `dfa_organismos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_organismos_financiadores_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_organismos_financiadores_ibfk_2`
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
    `id_user` int(10) unsigned,
    `id_residencia` int(10) unsigned,
    `id_rango_edad` int(10) unsigned,
    `direccion` VARCHAR(490),
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
    INDEX `dfa_personas_ibfk_3` (`id_user`),
    INDEX `dfa_personas_ibfk_4` (`id_residencia`),
    INDEX `dfa_personas_ibfk_5` (`id_rango_edad`),
    CONSTRAINT `dfa_personas_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_3`
        FOREIGN KEY (`id_user`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_personas_ibfk_4`
        FOREIGN KEY (`id_residencia`)
        REFERENCES `dfa_tipos_residencias` (`id_residencia`),
    CONSTRAINT `dfa_personas_ibfk_5`
        FOREIGN KEY (`id_rango_edad`)
        REFERENCES `dfa_rangos_edades` (`id_rango_edad`)
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
    `titular` TEXT,
    `descripcion` TEXT,
    `fecha_publicacion` DATETIME,
    `id_entidad` int(10) unsigned,
    `id_categoria_publicacion` int(10) unsigned,
    `id_etiquetas` VARCHAR(450),
    `id_seccion_publicacion` int(10) unsigned,
    `estado_publicacion` VARCHAR(250),
    `ids_files` VARCHAR(1000),
    `id_cover_picture` int(10) unsigned,
    `id_city` int(10) unsigned,
    `revisado` VARCHAR(250),
    `comentarios` TEXT,
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
    INDEX `dfa_publicaciones_ibfk_5` (`id_categoria_publicacion`),
    INDEX `dfa_publicaciones_ibfk` (`id_cover_picture`),
    INDEX `dfa_publicaciones_ibfk_7` (`id_entidad`),
    INDEX `dfa_publicaciones_ibfk_8` (`id_etiquetas`),
    INDEX `dfa_publicaciones_ibfk_4` (`id_seccion_publicacion`),
    INDEX `dfa_publicaciones_ibfk_11` (`id_city`),
    CONSTRAINT `dfa_publicaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_publicaciones_ibfk_11`
        FOREIGN KEY (`id_city`)
        REFERENCES `ci_cities` (`id_city`),
    CONSTRAINT `dfa_publicaciones_ibfk_2`
        FOREIGN KEY (`id_user_modified`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_publicaciones_ibfk_3`
        FOREIGN KEY (`id_entidad`)
        REFERENCES `dfa_entidades` (`id_entidad`),
    CONSTRAINT `dfa_publicaciones_ibfk_4`
        FOREIGN KEY (`id_seccion_publicacion`)
        REFERENCES `dfa_secciones_publicaciones` (`id_seccion_publicacion`),
    CONSTRAINT `dfa_publicaciones_ibfk_5`
        FOREIGN KEY (`id_categoria_publicacion`)
        REFERENCES `dfa_categorias_publicaciones` (`id_categoria_publicacion`),
    CONSTRAINT `dfa_publicaciones_ibfk_6`
        FOREIGN KEY (`id_cover_picture`)
        REFERENCES `ci_files` (`id_file`)
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
-- dfa_secciones_publicaciones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_secciones_publicaciones`;

CREATE TABLE `dfa_secciones_publicaciones`
(
    `id_seccion_publicacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(450),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_seccion_publicacion`),
    UNIQUE INDEX `dfa_secciones_publicaciones_id_seccion_publicacion_uindex` (`id_seccion_publicacion`),
    INDEX `dfa_secciones_publicaciones_ibfk_1` (`id_user_created`),
    INDEX `dfa_secciones_publicaciones_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_secciones_publicaciones_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_secciones_publicaciones_ibfk_2`
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
-- dfa_tipos_procedimientos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `dfa_tipos_procedimientos`;

CREATE TABLE `dfa_tipos_procedimientos`
(
    `id_tipo_procedimiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(200),
    `descripcion` VARCHAR(500),
    `estado` VARCHAR(15) DEFAULT 'ENABLED' NOT NULL,
    `change_count` INTEGER DEFAULT 0 NOT NULL,
    `id_user_modified` int(11) unsigned NOT NULL,
    `id_user_created` int(11) unsigned NOT NULL,
    `date_modified` DATETIME NOT NULL,
    `date_created` DATETIME NOT NULL,
    PRIMARY KEY (`id_tipo_procedimiento`),
    UNIQUE INDEX `dfa_procedimientos_id_procedimiento_uindex` (`id_tipo_procedimiento`),
    INDEX `dfa_procedimientos_ibfk_1` (`id_user_created`),
    INDEX `dfa_procedimientos_ibfk_2` (`id_user_modified`),
    CONSTRAINT `dfa_tipos_procedimientos_ibfk_1`
        FOREIGN KEY (`id_user_created`)
        REFERENCES `ci_users` (`id_user`),
    CONSTRAINT `dfa_tipos_procedimientos_ibfk_2`
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
-- migrations
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations`
(
    `version` BIGINT NOT NULL
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
