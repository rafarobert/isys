<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 19/02/2019
 * Time: 1:35 pm
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

/**
 * @property CI_DB_query_builder $db                     This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system without hacking.
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property Request $request
 *
 * 
 * @property Model_Cities $model_cities
 * @property Ctrl_Cities $ctrl_cities
 * 
 * @property Model_Domains $model_domains
 * @property Ctrl_Domains $ctrl_domains
 * 
 * @property Model_Files $model_files
 * @property Ctrl_Files $ctrl_files
 * 
 * @property Model_Logs $model_logs
 * @property Ctrl_Logs $ctrl_logs
 * 
 * @property Model_Modules $model_modules
 * @property Ctrl_Modules $ctrl_modules
 * 
 * @property Model_Provincias $model_provincias
 * @property Ctrl_Provincias $ctrl_provincias
 * 
 * @property Model_Roles $model_roles
 * @property Ctrl_Roles $ctrl_roles
 * 
 * @property Model_Sessions $model_sessions
 * @property Ctrl_Sessions $ctrl_sessions
 * 
 * @property Model_Tables $model_tables
 * @property Ctrl_Tables $ctrl_tables
 * 
 * @property Model_Tables_roles $model_tables_roles
 * @property Ctrl_Tables_roles $ctrl_tables_roles
 * 
 * @property Model_Users $model_users
 * @property Ctrl_Users $ctrl_users
 * 
 * @property Model_Users_roles $model_users_roles
 * @property Ctrl_Users_roles $ctrl_users_roles
 * 
 * @property Model_Archivos $model_archivos
 * @property Ctrl_Archivos $ctrl_archivos
 * 
 * @property Model_Categorias_publicaciones $model_categorias_publicaciones
 * @property Ctrl_Categorias_publicaciones $ctrl_categorias_publicaciones
 * 
 * @property Model_Conceptos $model_conceptos
 * @property Ctrl_Conceptos $ctrl_conceptos
 * 
 * @property Model_Convocatorias $model_convocatorias
 * @property Ctrl_Convocatorias $ctrl_convocatorias
 * 
 * @property Model_Cursos $model_cursos
 * @property Ctrl_Cursos $ctrl_cursos
 * 
 * @property Model_Denuncias $model_denuncias
 * @property Ctrl_Denuncias $ctrl_denuncias
 * 
 * @property Model_Empleados $model_empleados
 * @property Ctrl_Empleados $ctrl_empleados
 * 
 * @property Model_Entidades $model_entidades
 * @property Ctrl_Entidades $ctrl_entidades
 * 
 * @property Model_Entidades_tables $model_entidades_tables
 * @property Ctrl_Entidades_tables $ctrl_entidades_tables
 * 
 * @property Model_Estadisticas $model_estadisticas
 * @property Ctrl_Estadisticas $ctrl_estadisticas
 * 
 * @property Model_Estudiantes $model_estudiantes
 * @property Ctrl_Estudiantes $ctrl_estudiantes
 * 
 * @property Model_Etiquetas $model_etiquetas
 * @property Ctrl_Etiquetas $ctrl_etiquetas
 * 
 * @property Model_Layouts $model_layouts
 * @property Ctrl_Layouts $ctrl_layouts
 * 
 * @property Model_Oficinas $model_oficinas
 * @property Ctrl_Oficinas $ctrl_oficinas
 * 
 * @property Model_Organismos_financiadores $model_organismos_financiadores
 * @property Ctrl_Organismos_financiadores $ctrl_organismos_financiadores
 * 
 * @property Model_Personas $model_personas
 * @property Ctrl_Personas $ctrl_personas
 * 
 * @property Model_Proveedores $model_proveedores
 * @property Ctrl_Proveedores $ctrl_proveedores
 * 
 * @property Model_Publicaciones $model_publicaciones
 * @property Ctrl_Publicaciones $ctrl_publicaciones
 * 
 * @property Model_Rangos_edades $model_rangos_edades
 * @property Ctrl_Rangos_edades $ctrl_rangos_edades
 * 
 * @property Model_Secciones_publicaciones $model_secciones_publicaciones
 * @property Ctrl_Secciones_publicaciones $ctrl_secciones_publicaciones
 * 
 * @property Model_Tipos_conceptos $model_tipos_conceptos
 * @property Ctrl_Tipos_conceptos $ctrl_tipos_conceptos
 * 
 * @property Model_Tipos_contratos $model_tipos_contratos
 * @property Ctrl_Tipos_contratos $ctrl_tipos_contratos
 * 
 * @property Model_Tipos_procedimientos $model_tipos_procedimientos
 * @property Ctrl_Tipos_procedimientos $ctrl_tipos_procedimientos
 * 
 * @property Model_Tipos_puestos $model_tipos_puestos
 * @property Ctrl_Tipos_puestos $ctrl_tipos_puestos
 * 
 * @property Model_Tipos_relaciones $model_tipos_relaciones
 * @property Ctrl_Tipos_relaciones $ctrl_tipos_relaciones
 * 
 * @property Model_Tipos_residencias $model_tipos_residencias
 * @property Ctrl_Tipos_residencias $ctrl_tipos_residencias
 * 
 * @property Model_Tipos_servicios $model_tipos_servicios
 * @property Ctrl_Tipos_servicios $ctrl_tipos_servicios
 * 
 *
 */
class ES_Model_Vars extends CI_Model
{
    use ES_Table_Trait;
    // **************** tables Charged ****************
    
    public $table_ci_cities;
    
    public $table_ci_domains;
    
    public $table_ci_files;
    
    public $table_ci_logs;
    
    public $table_ci_modules;
    
    public $table_ci_provincias;
    
    public $table_ci_roles;
    
    public $table_ci_sessions;
    
    public $table_ci_tables;
    
    public $table_ci_tables_roles;
    
    public $table_ci_users;
    
    public $table_ci_users_roles;
    
    public $table_dfa_archivos;
    
    public $table_dfa_categorias_publicaciones;
    
    public $table_dfa_conceptos;
    
    public $table_dfa_convocatorias;
    
    public $table_dfa_cursos;
    
    public $table_dfa_denuncias;
    
    public $table_dfa_empleados;
    
    public $table_dfa_entidades;
    
    public $table_dfa_entidades_tables;
    
    public $table_dfa_estadisticas;
    
    public $table_dfa_estudiantes;
    
    public $table_dfa_etiquetas;
    
    public $table_dfa_layouts;
    
    public $table_dfa_oficinas;
    
    public $table_dfa_organismos_financiadores;
    
    public $table_dfa_personas;
    
    public $table_dfa_proveedores;
    
    public $table_dfa_publicaciones;
    
    public $table_dfa_rangos_edades;
    
    public $table_dfa_secciones_publicaciones;
    
    public $table_dfa_tipos_conceptos;
    
    public $table_dfa_tipos_contratos;
    
    public $table_dfa_tipos_procedimientos;
    
    public $table_dfa_tipos_puestos;
    
    public $table_dfa_tipos_relaciones;
    
    public $table_dfa_tipos_residencias;
    
    public $table_dfa_tipos_servicios;
    
    // ************************************************

    public function __construct()
    {
        parent::__construct();
    }
}