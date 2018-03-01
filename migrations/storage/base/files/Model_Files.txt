<?php // *** estic - model_file - start ***
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_Files extends Base_Model {

        // *** estic - tables - inicio - 1 ***

            /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_file;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $path;
                /**
                         * The value for the title field.
                         *
                         * @var        string
                         */
                         
                public $type;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $size;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $width;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $height;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $id_file_parent;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $num_thumbs;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $thumbnail_tag;
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
                         * @var        int
                         */
                         
                public $date_modified;
                /**
                         * The value for the title field.
                         *
                         * @var        int
                         */
                         
                public $date_created;
                
            
            // *** estic - tables - fin - 1 ***
            
            protected $_table_name = "ci_files";
            protected $_order_by = "id_file desc";
            protected $_timestaps = true;
            protected $_primary_key = "id_file";
        
            public $rules = array(
            // *** estic - tables - inicio - 2 ***
            
            
                "path" => array(
                    "field" => "path",
                    "label" => "Path",
                    "rules" => "trim|required|max_length[]"
                ),
                
                "type" => array(
                    "field" => "type",
                    "label" => "Type",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "size" => array(
                    "field" => "size",
                    "label" => "Size",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "width" => array(
                    "field" => "width",
                    "label" => "Width",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "height" => array(
                    "field" => "height",
                    "label" => "Height",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "num_thumbs" => array(
                    "field" => "num_thumbs",
                    "label" => "Num_thumbs",
                    "rules" => "trim|required|max_length[11]|numeric"
                ),
                
                "thumbnail_tag" => array(
                    "field" => "thumbnail_tag",
                    "label" => "Thumbnail_tag",
                    "rules" => "trim|required|max_length[11]"
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
            
            
                "path" => array(
                    "field" => "path",
                    "label" => "Path",
                    "rules" => "trim|required|max_length[]"
                ),
                
                "type" => array(
                    "field" => "type",
                    "label" => "Type",
                    "rules" => "trim|required|max_length[256]"
                ),
                
                "size" => array(
                    "field" => "size",
                    "label" => "Size",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "width" => array(
                    "field" => "width",
                    "label" => "Width",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "height" => array(
                    "field" => "height",
                    "label" => "Height",
                    "rules" => "trim|required|max_length[11]"
                ),
                
                "num_thumbs" => array(
                    "field" => "num_thumbs",
                    "label" => "Num_thumbs",
                    "rules" => "trim|required|max_length[11]|numeric"
                ),
                
                "thumbnail_tag" => array(
                    "field" => "thumbnail_tag",
                    "label" => "Thumbnail_tag",
                    "rules" => "trim|required|max_length[11]"
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
                $fil = new stdClass();
                
                // *** estic - tables - inicio - 3 ***
            
            $fil->path = "";
                    $fil->type = "";
                    $fil->size = "";
                    $fil->width = "";
                    $fil->height = "";
                    $fil->num_thumbs = "";
                    $fil->thumbnail_tag = "";
                    $fil->estado = "";
                    $fil->change_count = "";
                    $fil->date_modified = date("Y-m-d");
                    $fil->date_created = date("Y-m-d");
                    
            
            // *** estic - tables - fin - 3 ***
            
                return $fil;
            }
        }

        // *** estic - model_file - end ***