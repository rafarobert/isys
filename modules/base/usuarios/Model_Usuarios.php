<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_Usuarios extends Base_Model {

        // *** estic - tables - inicio - 1 ***

            /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_usuario;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $nombre;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $apellido;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $username;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $email;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $password;
                /**
                         * The value for the title field.
                         *
                         * @var        date
                         */
                         
                public $fec_nacimiento;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $sexo;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $invitado_por;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $phone_number_1;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $phone_number_2;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $cellphone_number_1;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $cellphone_number_2;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $cod_acceso;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_tipo_asociado;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_nivel_asociado;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_turno;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_role;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_picture;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $app_monitor;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $app_orders;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $app_admin;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $herbalife_key;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $estado;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $change_count;
                /**
                         * The value for the title field.
                         *
                         * @var        datetime
                         */
                         
                public $date_created;
                /**
                         * The value for the title field.
                         *
                         * @var        datetime
                         */
                         
                public $date_modified;
                
            
            // *** estic - tables - fin - 1 ***
            
            protected $_table_name = "ci_usuarios";
            protected $_order_by = "id_usuario desc";
            protected $_timestaps = true;
            protected $_primary_key = "id_usuario";
        
            public $rules = array(
            // *** estic - tables - inicio - 2 ***
            
            
                "nombre" => array(
                    "field" => "nombre",
                    "label" => "Nombre",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "apellido" => array(
                    "field" => "apellido",
                    "label" => "Apellido",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "username" => array(
                    "field" => "username",
                    "label" => "Username",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "email" => array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "trim|required|max_length[100]|valid_email"
                ),
                
                "password" => array(
                    "field" => "password",
                    "label" => "Password",
                    "rules" => "trim|required|max_length[128]|matches[password_confirm]"),
        "password_confirm" => array(
            "field" => "password_confirm",
            "label" => "Confirm password",
            "rules" => "trim|matches[password]"
                ),
                
                "fec_nacimiento" => array(
                    "field" => "fec_nacimiento",
                    "label" => "Fec_nacimiento",
                    "rules" => "trim|required|max_length[]"
                ),
                
                "sexo" => array(
                    "field" => "sexo",
                    "label" => "Sexo",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "invitado_por" => array(
                    "field" => "invitado_por",
                    "label" => "Invitado_por",
                    "rules" => "trim|required|max_length[10]"
                ),
                
                "phone_number_1" => array(
                    "field" => "phone_number_1",
                    "label" => "Phone_number_1",
                    "rules" => "trim|required|max_length[20]|numeric"
                ),
                
                "phone_number_2" => array(
                    "field" => "phone_number_2",
                    "label" => "Phone_number_2",
                    "rules" => "trim|required|max_length[20]|numeric"
                ),
                
                "cellphone_number_1" => array(
                    "field" => "cellphone_number_1",
                    "label" => "Cellphone_number_1",
                    "rules" => "trim|required|max_length[20]"
                ),
                
                "cellphone_number_2" => array(
                    "field" => "cellphone_number_2",
                    "label" => "Cellphone_number_2",
                    "rules" => "trim|required|max_length[20]"
                ),
                
                "cod_acceso" => array(
                    "field" => "cod_acceso",
                    "label" => "Cod_acceso",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_monitor" => array(
                    "field" => "app_monitor",
                    "label" => "App_monitor",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_orders" => array(
                    "field" => "app_orders",
                    "label" => "App_orders",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_admin" => array(
                    "field" => "app_admin",
                    "label" => "App_admin",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "herbalife_key" => array(
                    "field" => "herbalife_key",
                    "label" => "Herbalife_key",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "estado" => array(
                    "field" => "estado",
                    "label" => "Estado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required|max_length[11]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            public $rules_edit = array(    
            // *** estic - tables - inicio - 2 ***
            
            
                "nombre" => array(
                    "field" => "nombre",
                    "label" => "Nombre",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "apellido" => array(
                    "field" => "apellido",
                    "label" => "Apellido",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "username" => array(
                    "field" => "username",
                    "label" => "Username",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "email" => array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "trim|required|max_length[100]|valid_email"
                ),
                
                "fec_nacimiento" => array(
                    "field" => "fec_nacimiento",
                    "label" => "Fec_nacimiento",
                    "rules" => "trim|required|max_length[]"
                ),
                
                "sexo" => array(
                    "field" => "sexo",
                    "label" => "Sexo",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "invitado_por" => array(
                    "field" => "invitado_por",
                    "label" => "Invitado_por",
                    "rules" => "trim|required|max_length[10]"
                ),
                
                "phone_number_1" => array(
                    "field" => "phone_number_1",
                    "label" => "Phone_number_1",
                    "rules" => "trim|required|max_length[20]|numeric"
                ),
                
                "phone_number_2" => array(
                    "field" => "phone_number_2",
                    "label" => "Phone_number_2",
                    "rules" => "trim|required|max_length[20]|numeric"
                ),
                
                "cellphone_number_1" => array(
                    "field" => "cellphone_number_1",
                    "label" => "Cellphone_number_1",
                    "rules" => "trim|required|max_length[20]"
                ),
                
                "cellphone_number_2" => array(
                    "field" => "cellphone_number_2",
                    "label" => "Cellphone_number_2",
                    "rules" => "trim|required|max_length[20]"
                ),
                
                "cod_acceso" => array(
                    "field" => "cod_acceso",
                    "label" => "Cod_acceso",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_monitor" => array(
                    "field" => "app_monitor",
                    "label" => "App_monitor",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_orders" => array(
                    "field" => "app_orders",
                    "label" => "App_orders",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "app_admin" => array(
                    "field" => "app_admin",
                    "label" => "App_admin",
                    "rules" => "trim|required|max_length[50]"
                ),
                
                "herbalife_key" => array(
                    "field" => "herbalife_key",
                    "label" => "Herbalife_key",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "estado" => array(
                    "field" => "estado",
                    "label" => "Estado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required|max_length[11]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            function __construct(){
                parent::__construct();
            }

            public function get_new(){
                $usuario = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $usuario->nombre = "";
                    $usuario->apellido = "";
                    $usuario->username = "";
                    $usuario->email = "";
                    $usuario->password = "";
                    $usuario->fec_nacimiento = "";
                    $usuario->sexo = "";
                    $usuario->invitado_por = "";
                    $usuario->phone_number_1 = "";
                    $usuario->phone_number_2 = "";
                    $usuario->cellphone_number_1 = "";
                    $usuario->cellphone_number_2 = "";
                    $usuario->cod_acceso = "";
                    $usuario->app_monitor = "";
                    $usuario->app_orders = "";
                    $usuario->app_admin = "";
                    $usuario->herbalife_key = "";
                    $usuario->estado = "";
                    $usuario->change_count = "";
                    $usuario->date_created = date("Y-m-d");
                    $usuario->date_modified = date("Y-m-d");
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $usuario;
            }
        }

        // *** estic - model_file - end ***