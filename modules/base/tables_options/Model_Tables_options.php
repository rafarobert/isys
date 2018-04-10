<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 08/04/2018
 * Time: 4:29 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Tables_options extends base_Model {

    
             /**
                * The value for the id_opcion field.
                *
                * @var        int
                */             
             public $id_opcion;
        
             /**
                * The value for the tabla field.
                *
                * @var        string
                */             
             public $tabla;
        
             /**
                * The value for the tipo field.
                *
                * @var        string
                */             
             public $tipo;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the estado field.
                *
                * @var        string
                */             
             public $estado;
        
             /**
                * The value for the id_user_modified field.
                *
                * @var        int
                */             
             public $id_user_modified;
        
             /**
                * The value for the id_user_created field.
                *
                * @var        int
                */             
             public $id_user_created;
        
             /**
                * The value for the date_modified field.
                *
                * @var        string
                */             
             public $date_modified;
        
             /**
                * The value for the date_created field.
                *
                * @var        string
                */             
             public $date_created;
        

    protected $_table_name = "ci_tables_options";
    protected $_order_by = "id_opcion desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_opcion";

    public $rules = array (
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[500]|required',
  ),
  'tipo' => 
  array (
    'field' => 'tipo',
    'label' => 'Tipo',
    'rules' => 'trim|max_length[250]|required',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[500]|required',
  ),
);
    public $rules_edit = array (
  'tabla' => 
  array (
    'field' => 'tabla',
    'label' => 'Tabla',
    'rules' => 'trim|max_length[500]|required',
  ),
  'tipo' => 
  array (
    'field' => 'tipo',
    'label' => 'Tipo',
    'rules' => 'trim|max_length[250]|required',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[250]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|max_length[500]|required',
  ),
);

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $tabl_option = new stdClass();

        $tabl_option->id_opcion = '';
            $tabl_option->tabla = '';
            $tabl_option->tipo = '';
            $tabl_option->nombre = '';
            $tabl_option->descripcion = '';
            $tabl_option->estado = '';
            $tabl_option->id_user_modified = '';
            $tabl_option->id_user_created = '';
            $tabl_option->date_modified = '';
            $tabl_option->date_created = '';
            

        return $tabl_option;
    }
}