<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 19/02/2019
 * Time: 1:35 pm
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait ES_Table_Trait
{
    
    public function initCities($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','cities')){

            if ($both) {
                $this->ctrl_cities = Ctrl_Cities::create($bWithInit);
            }
            $this->model_cities = Model_Cities::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initDomains($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','domains')){

            if ($both) {
                $this->ctrl_domains = Ctrl_Domains::create($bWithInit);
            }
            $this->model_domains = Model_Domains::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initFiles($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','files')){

            if ($both) {
                $this->ctrl_files = Ctrl_Files::create($bWithInit);
            }
            $this->model_files = Model_Files::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initLogs($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','logs')){

            if ($both) {
                $this->ctrl_logs = Ctrl_Logs::create($bWithInit);
            }
            $this->model_logs = Model_Logs::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initModules($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','modules')){

            if ($both) {
                $this->ctrl_modules = Ctrl_Modules::create($bWithInit);
            }
            $this->model_modules = Model_Modules::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initProvincias($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','provincias')){

            if ($both) {
                $this->ctrl_provincias = Ctrl_Provincias::create($bWithInit);
            }
            $this->model_provincias = Model_Provincias::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','roles')){

            if ($both) {
                $this->ctrl_roles = Ctrl_Roles::create($bWithInit);
            }
            $this->model_roles = Model_Roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initSessions($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','sessions')){

            if ($both) {
                $this->ctrl_sessions = Ctrl_Sessions::create($bWithInit);
            }
            $this->model_sessions = Model_Sessions::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTables($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','tables')){

            if ($both) {
                $this->ctrl_tables = Ctrl_Tables::create($bWithInit);
            }
            $this->model_tables = Model_Tables::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTablesRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','tables_roles')){

            if ($both) {
                $this->ctrl_tables_roles = Ctrl_Tables_roles::create($bWithInit);
            }
            $this->model_tables_roles = Model_Tables_roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initUsers($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','users')){

            if ($both) {
                $this->ctrl_users = Ctrl_Users::create($bWithInit);
            }
            $this->model_users = Model_Users::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initUsersRoles($both = false, $bWithInit = false)
    {
        if(validate_modulo('base','users_roles')){

            if ($both) {
                $this->ctrl_users_roles = Ctrl_Users_roles::create($bWithInit);
            }
            $this->model_users_roles = Model_Users_roles::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initArchivos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','archivos')){

            if ($both) {
                $this->ctrl_archivos = Ctrl_Archivos::create($bWithInit);
            }
            $this->model_archivos = Model_Archivos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initCategoriasPublicaciones($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','categorias_publicaciones')){

            if ($both) {
                $this->ctrl_categorias_publicaciones = Ctrl_Categorias_publicaciones::create($bWithInit);
            }
            $this->model_categorias_publicaciones = Model_Categorias_publicaciones::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initConceptos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','conceptos')){

            if ($both) {
                $this->ctrl_conceptos = Ctrl_Conceptos::create($bWithInit);
            }
            $this->model_conceptos = Model_Conceptos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initConvocatorias($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','convocatorias')){

            if ($both) {
                $this->ctrl_convocatorias = Ctrl_Convocatorias::create($bWithInit);
            }
            $this->model_convocatorias = Model_Convocatorias::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initCursos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','cursos')){

            if ($both) {
                $this->ctrl_cursos = Ctrl_Cursos::create($bWithInit);
            }
            $this->model_cursos = Model_Cursos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initDenuncias($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','denuncias')){

            if ($both) {
                $this->ctrl_denuncias = Ctrl_Denuncias::create($bWithInit);
            }
            $this->model_denuncias = Model_Denuncias::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEmpleados($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','empleados')){

            if ($both) {
                $this->ctrl_empleados = Ctrl_Empleados::create($bWithInit);
            }
            $this->model_empleados = Model_Empleados::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEntidades($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','entidades')){

            if ($both) {
                $this->ctrl_entidades = Ctrl_Entidades::create($bWithInit);
            }
            $this->model_entidades = Model_Entidades::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEntidadesTables($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','entidades_tables')){

            if ($both) {
                $this->ctrl_entidades_tables = Ctrl_Entidades_tables::create($bWithInit);
            }
            $this->model_entidades_tables = Model_Entidades_tables::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEstadisticas($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','estadisticas')){

            if ($both) {
                $this->ctrl_estadisticas = Ctrl_Estadisticas::create($bWithInit);
            }
            $this->model_estadisticas = Model_Estadisticas::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEstudiantes($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','estudiantes')){

            if ($both) {
                $this->ctrl_estudiantes = Ctrl_Estudiantes::create($bWithInit);
            }
            $this->model_estudiantes = Model_Estudiantes::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initEtiquetas($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','etiquetas')){

            if ($both) {
                $this->ctrl_etiquetas = Ctrl_Etiquetas::create($bWithInit);
            }
            $this->model_etiquetas = Model_Etiquetas::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initLayouts($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','layouts')){

            if ($both) {
                $this->ctrl_layouts = Ctrl_Layouts::create($bWithInit);
            }
            $this->model_layouts = Model_Layouts::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initOficinas($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','oficinas')){

            if ($both) {
                $this->ctrl_oficinas = Ctrl_Oficinas::create($bWithInit);
            }
            $this->model_oficinas = Model_Oficinas::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initOrganismosFinanciadores($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','organismos_financiadores')){

            if ($both) {
                $this->ctrl_organismos_financiadores = Ctrl_Organismos_financiadores::create($bWithInit);
            }
            $this->model_organismos_financiadores = Model_Organismos_financiadores::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initPersonas($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','personas')){

            if ($both) {
                $this->ctrl_personas = Ctrl_Personas::create($bWithInit);
            }
            $this->model_personas = Model_Personas::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initProveedores($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','proveedores')){

            if ($both) {
                $this->ctrl_proveedores = Ctrl_Proveedores::create($bWithInit);
            }
            $this->model_proveedores = Model_Proveedores::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initPublicaciones($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','publicaciones')){

            if ($both) {
                $this->ctrl_publicaciones = Ctrl_Publicaciones::create($bWithInit);
            }
            $this->model_publicaciones = Model_Publicaciones::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initRangosEdades($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','rangos_edades')){

            if ($both) {
                $this->ctrl_rangos_edades = Ctrl_Rangos_edades::create($bWithInit);
            }
            $this->model_rangos_edades = Model_Rangos_edades::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initSeccionesPublicaciones($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','secciones_publicaciones')){

            if ($both) {
                $this->ctrl_secciones_publicaciones = Ctrl_Secciones_publicaciones::create($bWithInit);
            }
            $this->model_secciones_publicaciones = Model_Secciones_publicaciones::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposConceptos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_conceptos')){

            if ($both) {
                $this->ctrl_tipos_conceptos = Ctrl_Tipos_conceptos::create($bWithInit);
            }
            $this->model_tipos_conceptos = Model_Tipos_conceptos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposContratos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_contratos')){

            if ($both) {
                $this->ctrl_tipos_contratos = Ctrl_Tipos_contratos::create($bWithInit);
            }
            $this->model_tipos_contratos = Model_Tipos_contratos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposProcedimientos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_procedimientos')){

            if ($both) {
                $this->ctrl_tipos_procedimientos = Ctrl_Tipos_procedimientos::create($bWithInit);
            }
            $this->model_tipos_procedimientos = Model_Tipos_procedimientos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposPuestos($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_puestos')){

            if ($both) {
                $this->ctrl_tipos_puestos = Ctrl_Tipos_puestos::create($bWithInit);
            }
            $this->model_tipos_puestos = Model_Tipos_puestos::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposRelaciones($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_relaciones')){

            if ($both) {
                $this->ctrl_tipos_relaciones = Ctrl_Tipos_relaciones::create($bWithInit);
            }
            $this->model_tipos_relaciones = Model_Tipos_relaciones::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposResidencias($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_residencias')){

            if ($both) {
                $this->ctrl_tipos_residencias = Ctrl_Tipos_residencias::create($bWithInit);
            }
            $this->model_tipos_residencias = Model_Tipos_residencias::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
    public function initTiposServicios($both = false, $bWithInit = false)
    {
        if(validate_modulo('admin','tipos_servicios')){

            if ($both) {
                $this->ctrl_tipos_servicios = Ctrl_Tipos_servicios::create($bWithInit);
            }
            $this->model_tipos_servicios = Model_Tipos_servicios::create($bWithInit);

            return true;

        } else {

            return false;
        }
    }
    
}