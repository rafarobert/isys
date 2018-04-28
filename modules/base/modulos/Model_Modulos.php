<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 27/04/2018
 * Time: 8:12 pm
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Modulos extends base_Model {

    
             /**
                * The value for the id_table field.
                *
                * @var        int
                */             
             public $id_table;
        
             /**
                * The value for the id_modulo field.
                *
                * @var        int
                */             
             public $id_modulo;
        
             /**
                * The value for the name_modulo field.
                *
                * @var        string
                */             
             public $name_modulo;
        
             /**
                * The value for the titulo field.
                *
                * @var        string
                */             
             public $titulo;
        
             /**
                * The value for the url field.
                *
                * @var        string
                */             
             public $url;
        
             /**
                * The value for the descripcion field.
                *
                * @var        string
                */             
             public $descripcion;
        
             /**
                * The value for the icon field.
                *
                * @var        string
                */             
             public $icon;
        
             /**
                * The value for the listed field.
                *
                * @var        string
                */             
             public $listed;
        
             /**
                * The value for the change_count field.
                *
                * @var        int
                */             
             public $change_count;
        
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
        
             /**
                * The value for the status field.
                *
                * @var        string
                */             
             public $status;
        

    protected $_table_name = "ci_modulos";
    protected $_order_by = "id_table desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_table";

    public $rules = array (
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'label' => 'Id_modulo',
    'rules' => 'trim|max_length[11]|required',
  ),
  'name_modulo' => 
  array (
    'field' => 'name_modulo',
    'label' => 'Name_modulo',
    'rules' => 'trim|max_length[250]|required',
  ),
  'titulo' => 
  array (
    'field' => 'titulo',
    'label' => 'Titulo',
    'rules' => 'trim|max_length[100]|required',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[600]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|required',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'status' => 
  array (
    'field' => 'status',
    'label' => 'Status',
    'rules' => 'trim|max_length[255]|required',
  ),
);
    public $rules_edit = array (
  'id_modulo' => 
  array (
    'field' => 'id_modulo',
    'label' => 'Id_modulo',
    'rules' => 'trim|max_length[11]|required',
  ),
  'name_modulo' => 
  array (
    'field' => 'name_modulo',
    'label' => 'Name_modulo',
    'rules' => 'trim|max_length[250]|required',
  ),
  'titulo' => 
  array (
    'field' => 'titulo',
    'label' => 'Titulo',
    'rules' => 'trim|max_length[100]|required',
  ),
  'url' => 
  array (
    'field' => 'url',
    'label' => 'Url',
    'rules' => 'trim|max_length[600]|required',
  ),
  'descripcion' => 
  array (
    'field' => 'descripcion',
    'label' => 'Descripcion',
    'rules' => 'trim|required',
  ),
  'icon' => 
  array (
    'field' => 'icon',
    'label' => 'Icon',
    'rules' => 'trim|max_length[200]|required',
  ),
  'listed' => 
  array (
    'field' => 'listed',
    'label' => 'Listed',
    'rules' => 'trim|max_length[15]|required',
  ),
  'status' => 
  array (
    'field' => 'status',
    'label' => 'Status',
    'rules' => 'trim|max_length[255]|required',
  ),
);

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $modulo = new stdClass();

        $modulo->id_table = '';
            $modulo->id_modulo = '';
            $modulo->name_modulo = '';
            $modulo->titulo = '';
            $modulo->url = '';
            $modulo->descripcion = '';
            $modulo->icon = '';
            $modulo->listed = '';
            $modulo->change_count = '';
            $modulo->id_user_modified = '';
            $modulo->id_user_created = '';
            $modulo->date_modified = '';
            $modulo->date_created = '';
            $modulo->status = '';
            

        return $modulo;
    }
}