<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 21/02/2018
         * Time: 3:52 am
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
                         * @var        datetime
                         */
                         
                public $last_activity;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_user;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_hbf_sesion;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $settings;
                
            
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
                
                "last_activity" => array(
                    "field" => "last_activity",
                    "label" => "Last_activity",
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
                
                "last_activity" => array(
                    "field" => "last_activity",
                    "label" => "Last_activity",
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
                $session = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $session->ip_address = "";
                    $session->timestamp = "";
                    $session->data = "";
                    $session->last_activity = "";
                    $session->settings = "";
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $session;
            }
        }

        // *** estic - model_file - end ***
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            