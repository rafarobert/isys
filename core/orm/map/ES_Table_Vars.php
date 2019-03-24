<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 19/02/2019
 * Time: 1:35 pm
 */

if (!function_exists('initStaticTableVars')) {

    function initStaticTableVars($obj)
    {
        
        $obj->table_ci_cities = class_exists('Migration_Create_ci_cities') ? Migration_Create_ci_cities::$tableFields : null;
        
        $obj->table_ci_domains = class_exists('Migration_Create_ci_domains') ? Migration_Create_ci_domains::$tableFields : null;
        
        $obj->table_ci_files = class_exists('Migration_Create_ci_files') ? Migration_Create_ci_files::$tableFields : null;
        
        $obj->table_ci_logs = class_exists('Migration_Create_ci_logs') ? Migration_Create_ci_logs::$tableFields : null;
        
        $obj->table_ci_modules = class_exists('Migration_Create_ci_modules') ? Migration_Create_ci_modules::$tableFields : null;
        
        $obj->table_ci_provincias = class_exists('Migration_Create_ci_provincias') ? Migration_Create_ci_provincias::$tableFields : null;
        
        $obj->table_ci_roles = class_exists('Migration_Create_ci_roles') ? Migration_Create_ci_roles::$tableFields : null;
        
        $obj->table_ci_sessions = class_exists('Migration_Create_ci_sessions') ? Migration_Create_ci_sessions::$tableFields : null;
        
        $obj->table_ci_tables = class_exists('Migration_Create_ci_tables') ? Migration_Create_ci_tables::$tableFields : null;
        
        $obj->table_ci_tables_roles = class_exists('Migration_Create_ci_tables_roles') ? Migration_Create_ci_tables_roles::$tableFields : null;
        
        $obj->table_ci_users = class_exists('Migration_Create_ci_users') ? Migration_Create_ci_users::$tableFields : null;
        
        $obj->table_ci_users_roles = class_exists('Migration_Create_ci_users_roles') ? Migration_Create_ci_users_roles::$tableFields : null;
        
        $obj->table_dfa_archivos = class_exists('Migration_Create_dfa_archivos') ? Migration_Create_dfa_archivos::$tableFields : null;
        
        $obj->table_dfa_categorias_publicaciones = class_exists('Migration_Create_dfa_categorias_publicaciones') ? Migration_Create_dfa_categorias_publicaciones::$tableFields : null;
        
        $obj->table_dfa_conceptos = class_exists('Migration_Create_dfa_conceptos') ? Migration_Create_dfa_conceptos::$tableFields : null;
        
        $obj->table_dfa_convocatorias = class_exists('Migration_Create_dfa_convocatorias') ? Migration_Create_dfa_convocatorias::$tableFields : null;
        
        $obj->table_dfa_cursos = class_exists('Migration_Create_dfa_cursos') ? Migration_Create_dfa_cursos::$tableFields : null;
        
        $obj->table_dfa_denuncias = class_exists('Migration_Create_dfa_denuncias') ? Migration_Create_dfa_denuncias::$tableFields : null;
        
        $obj->table_dfa_empleados = class_exists('Migration_Create_dfa_empleados') ? Migration_Create_dfa_empleados::$tableFields : null;
        
        $obj->table_dfa_entidades = class_exists('Migration_Create_dfa_entidades') ? Migration_Create_dfa_entidades::$tableFields : null;
        
        $obj->table_dfa_entidades_tables = class_exists('Migration_Create_dfa_entidades_tables') ? Migration_Create_dfa_entidades_tables::$tableFields : null;
        
        $obj->table_dfa_estadisticas = class_exists('Migration_Create_dfa_estadisticas') ? Migration_Create_dfa_estadisticas::$tableFields : null;
        
        $obj->table_dfa_estudiantes = class_exists('Migration_Create_dfa_estudiantes') ? Migration_Create_dfa_estudiantes::$tableFields : null;
        
        $obj->table_dfa_etiquetas = class_exists('Migration_Create_dfa_etiquetas') ? Migration_Create_dfa_etiquetas::$tableFields : null;
        
        $obj->table_dfa_layouts = class_exists('Migration_Create_dfa_layouts') ? Migration_Create_dfa_layouts::$tableFields : null;
        
        $obj->table_dfa_oficinas = class_exists('Migration_Create_dfa_oficinas') ? Migration_Create_dfa_oficinas::$tableFields : null;
        
        $obj->table_dfa_organismos_financiadores = class_exists('Migration_Create_dfa_organismos_financiadores') ? Migration_Create_dfa_organismos_financiadores::$tableFields : null;
        
        $obj->table_dfa_personas = class_exists('Migration_Create_dfa_personas') ? Migration_Create_dfa_personas::$tableFields : null;
        
        $obj->table_dfa_proveedores = class_exists('Migration_Create_dfa_proveedores') ? Migration_Create_dfa_proveedores::$tableFields : null;
        
        $obj->table_dfa_publicaciones = class_exists('Migration_Create_dfa_publicaciones') ? Migration_Create_dfa_publicaciones::$tableFields : null;
        
        $obj->table_dfa_rangos_edades = class_exists('Migration_Create_dfa_rangos_edades') ? Migration_Create_dfa_rangos_edades::$tableFields : null;
        
        $obj->table_dfa_secciones_publicaciones = class_exists('Migration_Create_dfa_secciones_publicaciones') ? Migration_Create_dfa_secciones_publicaciones::$tableFields : null;
        
        $obj->table_dfa_tipos_conceptos = class_exists('Migration_Create_dfa_tipos_conceptos') ? Migration_Create_dfa_tipos_conceptos::$tableFields : null;
        
        $obj->table_dfa_tipos_contratos = class_exists('Migration_Create_dfa_tipos_contratos') ? Migration_Create_dfa_tipos_contratos::$tableFields : null;
        
        $obj->table_dfa_tipos_procedimientos = class_exists('Migration_Create_dfa_tipos_procedimientos') ? Migration_Create_dfa_tipos_procedimientos::$tableFields : null;
        
        $obj->table_dfa_tipos_puestos = class_exists('Migration_Create_dfa_tipos_puestos') ? Migration_Create_dfa_tipos_puestos::$tableFields : null;
        
        $obj->table_dfa_tipos_relaciones = class_exists('Migration_Create_dfa_tipos_relaciones') ? Migration_Create_dfa_tipos_relaciones::$tableFields : null;
        
        $obj->table_dfa_tipos_residencias = class_exists('Migration_Create_dfa_tipos_residencias') ? Migration_Create_dfa_tipos_residencias::$tableFields : null;
        
        $obj->table_dfa_tipos_servicios = class_exists('Migration_Create_dfa_tipos_servicios') ? Migration_Create_dfa_tipos_servicios::$tableFields : null;
        
    }
}