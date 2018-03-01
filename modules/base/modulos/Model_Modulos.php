<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
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
                         
                public $listed;
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
                         * @var        datetime
                         */
                         
                public $date_modified;
                /**
                         * The value for the title field.
                         *
                         * @var        datetime
                         */
                         
                public $date_created;
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
                         
                public $id_file;
                
            
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
                    "rules" => "trim|required|max_length[]"
                ),
                
                "icon" => array(
                    "field" => "icon",
                    "label" => "Icon",
                    "rules" => "trim|required|max_length[200]"
                ),
                
                "listed" => array(
                    "field" => "listed",
                    "label" => "Listed",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "status" => array(
                    "field" => "status",
                    "label" => "Status",
                    "rules" => "trim|required|max_length[255]"
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
                    "rules" => "trim|required|max_length[]"
                ),
                
                "icon" => array(
                    "field" => "icon",
                    "label" => "Icon",
                    "rules" => "trim|required|max_length[200]"
                ),
                
                "listed" => array(
                    "field" => "listed",
                    "label" => "Listed",
                    "rules" => "trim|required|max_length[15]"
                ),
                
                "change_count" => array(
                    "field" => "change_count",
                    "label" => "Change_count",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "status" => array(
                    "field" => "status",
                    "label" => "Status",
                    "rules" => "trim|required|max_length[255]"
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
                    $modulo->listed = "";
                    $modulo->change_count = "";
                    $modulo->date_modified = date("Y-m-d");
                    $modulo->date_created = date("Y-m-d");
                    $modulo->status = "";
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $modulo;
            }
        }

        // *** estic - model_file - end ***