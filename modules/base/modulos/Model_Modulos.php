<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 19/02/2018
         * Time: 6:19 pm
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_Modulos extends Base_Model {

        // *** estic - tables - inicio - 1 ***

            /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_modulo;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $titulo;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $url;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $descripcion;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $icon;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $opt_estado;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $opt_listado;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $status;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $change_count;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_user_modified;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_user_created;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $settings;
                /**
                         * The value for the title field.
                         *
                         * @var        datetime
                         */
                         
                public $date_modified;
                /**
                         * The value for the title field.
                         *
                         * @var        datetime
                         */
                         
                public $date_created;
                
            
            // *** estic - tables - fin - 1 ***
            
            protected $_table_name = "ci_modulos";
            protected $_order_by = "id_modulo desc";
            protected $_timestaps = true;
            protected $_primary_key = "id_modulo";
        
            public $rules = array(
            // *** estic - tables - inicio - 2 ***
            
            
                "titulo" => array(
                    "field" => "titulo",
                    "label" => "Titulo",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "url" => array(
                    "field" => "url",
                    "label" => "Url",
                    "rules" => "trim|required|max_length[600]|valid_url"
                ),
                
                "descripcion" => array(
                    "field" => "descripcion",
                    "label" => "Descripcion",
                    "rules" => "trim|required"
                ),
                
                "icon" => array(
                    "field" => "icon",
                    "label" => "Icon",
                    "rules" => "trim|required|max_length[200]"
                ),
                
                "opt_estado" => array(
                    "field" => "opt_estado",
                    "label" => "Opt_estado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "opt_listado" => array(
                    "field" => "opt_listado",
                    "label" => "Opt_listado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "status" => array(
                    "field" => "status",
                    "label" => "Status",
                    "rules" => "trim|required|max_length[255]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required"
                ),
                
                "settings" => array(
                    "field" => "settings",
                    "label" => "Settings",
                    "rules" => "trim|required|max_length[500]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            public $rules_edit = array(    
            
            
            
            
            
            // *** estic - tables - inicio - 2 ***
            
            
                "titulo" => array(
                    "field" => "titulo",
                    "label" => "Titulo",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "url" => array(
                    "field" => "url",
                    "label" => "Url",
                    "rules" => "trim|required|max_length[600]|valid_url"
                ),
                
                "descripcion" => array(
                    "field" => "descripcion",
                    "label" => "Descripcion",
                    "rules" => "trim|required"
                ),
                
                "icon" => array(
                    "field" => "icon",
                    "label" => "Icon",
                    "rules" => "trim|required|max_length[200]"
                ),
                
                "opt_estado" => array(
                    "field" => "opt_estado",
                    "label" => "Opt_estado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "opt_listado" => array(
                    "field" => "opt_listado",
                    "label" => "Opt_listado",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "status" => array(
                    "field" => "status",
                    "label" => "Status",
                    "rules" => "trim|required|max_length[255]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required"
                ),
                
                "settings" => array(
                    "field" => "settings",
                    "label" => "Settings",
                    "rules" => "trim|required|max_length[500]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            function __construct(){
                parent::__construct();
            }

            public function get_new(){
                $modulo = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $modulo->titulo = "";
                    $modulo->url = "";
                    $modulo->descripcion = "";
                    $modulo->icon = "";
                    $modulo->opt_estado = "";
                    $modulo->opt_listado = "";
                    $modulo->status = "";
                    $modulo->change_count = "";
                    $modulo->settings = "";
                    $modulo->date_modified = date("Y-m-d");
                    $modulo->date_created = date("Y-m-d");
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $modulo;
            }
        }

        // *** estic - model_file - end ***
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            