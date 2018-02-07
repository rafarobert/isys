<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 07/02/2018
         * Time: 2:42 am
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_Sessions extends Base_Model {

        // *** estic - tables - inicio - 1 ***

            /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $id;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $ip_address;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $timestamp;
                /**
                         * The value for the title field.
                         *
                         * @var        blob
                         */
                         
                public $data;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $ci_usuarios_id_usuario;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $hbf_usuarios_id_usuario;
                
            
            // *** estic - tables - fin - 1 ***
            
            protected $_table_name = "ci_sessions";
            protected $_order_by = "id desc";
            protected $_timestaps = true;
            protected $_primary_key = "id";
        
            public $rules = array(
            // *** estic - tables - inicio - 2 ***
            
            
                "ip_address" => array(
                    "field" => "ip_address",
                    "label" => "Ip_address",
                    "rules" => "trim|required|max_length[45]|valid_ip"
                ),
                
                "timestamp" => array(
                    "field" => "timestamp",
                    "label" => "Timestamp",
                    "rules" => "trim|required|max_length[10]"
                ),
                
                "data" => array(
                    "field" => "data",
                    "label" => "Data",
                    "rules" => "trim|required"
                ),
                
                "ci_usuarios_id_usuario" => array(
                    "field" => "ci_usuarios_id_usuario",
                    "label" => "Ci_usuarios_id_usuario",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "hbf_usuarios_id_usuario" => array(
                    "field" => "hbf_usuarios_id_usuario",
                    "label" => "Hbf_usuarios_id_usuario",
                    "rules" => "trim|required|max_length[11]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            public $rules_edit = array(    
            // *** estic - tables - inicio - 2 ***
            
            
                "ip_address" => array(
                    "field" => "ip_address",
                    "label" => "Ip_address",
                    "rules" => "trim|required|max_length[45]|valid_ip"
                ),
                
                "timestamp" => array(
                    "field" => "timestamp",
                    "label" => "Timestamp",
                    "rules" => "trim|required|max_length[10]"
                ),
                
                "data" => array(
                    "field" => "data",
                    "label" => "Data",
                    "rules" => "trim|required"
                ),
                
                "ci_usuarios_id_usuario" => array(
                    "field" => "ci_usuarios_id_usuario",
                    "label" => "Ci_usuarios_id_usuario",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "hbf_usuarios_id_usuario" => array(
                    "field" => "hbf_usuarios_id_usuario",
                    "label" => "Hbf_usuarios_id_usuario",
                    "rules" => "trim|required|max_length[11]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            function __construct(){
                parent::__construct();
            }

            public function get_new(){
                $session = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $session->ip_address = "";
                    $session->timestamp = "";
                    $session->data = "";
                    $session->ci_usuarios_id_usuario = "";
                    $session->hbf_usuarios_id_usuario = "";
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $session;
            }
        }

        // *** estic - model_file - end ***