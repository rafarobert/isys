<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 16/01/2018
         * Time: 2:45 am
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_Users extends Estic_Model {

        // *** estic - tables - inicio - 1 ***

            /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_user;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $name;
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
                         
                public $lastname;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $mobile_number_1;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $mobile_number_2;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $ci;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $img;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $password;
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
            
            protected $_table_name = "tic_users";
            protected $_order_by = "id_user desc";
            protected $_timestaps = true;
            protected $_primary_key = "id_user";

            public $rules_login = array(
                // *** estic - tables - inicio - 2 ***

                "email" => array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "trim|required|max_length[100]|valid_email"
                ),
                "password" => array(
                    "field" => "password",
                    "label" => "Password",
                    "rules" => "trim|required|max_length[128]|matches[password_confirm]"
                )
                // *** estic - tables - fin - 2 ***
            );

            public $rules = array(
            // *** estic - tables - inicio - 2 ***
            
            
                "name" => array(
                    "field" => "name",
                    "label" => "Name",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "email" => array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "trim|required|max_length[100]|valid_email"
                ),
                
                "lastname" => array(
                    "field" => "lastname",
                    "label" => "Lastname",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "mobile_number_1" => array(
                    "field" => "mobile_number_1",
                    "label" => "Mobile_number_1",
                    "rules" => "trim|required|max_length[12]|numeric"
                ),
                
                "mobile_number_2" => array(
                    "field" => "mobile_number_2",
                    "label" => "Mobile_number_2",
                    "rules" => "trim|required|max_length[12]|numeric"
                ),
                
                "ci" => array(
                    "field" => "ci",
                    "label" => "Ci",
                    "rules" => "trim|required|max_length[30]"
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
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            public $rules_edit = array(    
            // *** estic - tables - inicio - 2 ***
            
            
                "id_user" => array(
                    "field" => "id_user",
                    "label" => "Id_user",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "name" => array(
                    "field" => "name",
                    "label" => "Name",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "email" => array(
                    "field" => "email",
                    "label" => "Email",
                    "rules" => "trim|required|max_length[100]|valid_email"
                ),
                
                "lastname" => array(
                    "field" => "lastname",
                    "label" => "Lastname",
                    "rules" => "trim|required|max_length[100]"
                ),
                
                "mobile_number_1" => array(
                    "field" => "mobile_number_1",
                    "label" => "Mobile_number_1",
                    "rules" => "trim|required|max_length[12]|numeric"
                ),
                
                "mobile_number_2" => array(
                    "field" => "mobile_number_2",
                    "label" => "Mobile_number_2",
                    "rules" => "trim|required|max_length[12]|numeric"
                ),
                
                "ci" => array(
                    "field" => "ci",
                    "label" => "Ci",
                    "rules" => "trim|required|max_length[30]"
                ),
                
                "img" => array(
                    "field" => "img",
                    "label" => "Img",
                    "rules" => "trim|required|max_length[500]"
                ),
                
            
            // *** estic - tables - fin - 2 ***
            
            );
            
            function __construct(){
                parent::__construct();
            }

            public function get_new(){
                $user = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $user->name = "";
                    $user->email = "";
                    $user->lastname = "";
                    $user->mobile_number_1 = "";
                    $user->mobile_number_2 = "";
                    $user->ci = "";
                    $user->img = "";
                    $user->password = "";
                    $user->date_created = date("Y-m-d");
                    $user->date_modified = date("Y-m-d");
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $user;
            }
        }

        // *** estic - model_file - end ***