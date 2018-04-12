<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 11/04/2018
 * Time: 12:42 am
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Options extends base_Model {

    
             /**
                * The value for the id_option field.
                *
                * @var        int
                */             
             public $id_option;
        
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
        

    protected $_table_name = "ci_options";
    protected $_order_by = "id_option desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_option";

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
        $option = new stdClass();

        $option->id_option = '';
            $option->tabla = '';
            $option->tipo = '';
            $option->nombre = '';
            $option->descripcion = '';
            $option->estado = '';
            $option->id_user_modified = '';
            $option->id_user_created = '';
            $option->date_modified = '';
            $option->date_created = '';
            

        return $option;
    }
}