<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 11:39 am
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Files extends Base_Model {

    
             /**
                * The value for the id_file field.
                *
                * @var        int
                */             
             public $id_file;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the path field.
                *
                * @var        string
                */             
             public $path;
        
             /**
                * The value for the type field.
                *
                * @var        string
                */             
             public $type;
        
             /**
                * The value for the size field.
                *
                * @var        int
                */             
             public $size;
        
             /**
                * The value for the width field.
                *
                * @var        int
                */             
             public $width;
        
             /**
                * The value for the height field.
                *
                * @var        int
                */             
             public $height;
        
             /**
                * The value for the id_file_parent field.
                *
                * @var        int
                */             
             public $id_file_parent;
        
             /**
                * The value for the num_thumbs field.
                *
                * @var        int
                */             
             public $num_thumbs;
        
             /**
                * The value for the thumbnail_tag field.
                *
                * @var        int
                */             
             public $thumbnail_tag;
        
             /**
                * The value for the estado field.
                *
                * @var        string
                */             
             public $estado;
        
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
                * @var        int
                */             
             public $date_modified;
        
             /**
                * The value for the date_created field.
                *
                * @var        int
                */             
             public $date_created;
        

    protected $_table_name = "ci_files";
    protected $_order_by = "id_fil desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_fil";

    public $rules = array (
  'id_file' => 
  array (
    'field' => 'id_file',
    'label' => 'Id_file',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required|',
  ),
  'path' => 
  array (
    'field' => 'path',
    'label' => 'Path',
    'rules' => 'trim|required|',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[256]|required|',
  ),
  'size' => 
  array (
    'field' => 'size',
    'label' => 'Size',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'width' => 
  array (
    'field' => 'width',
    'label' => 'Width',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'id_file_parent' => 
  array (
    'field' => 'id_file_parent',
    'label' => 'Archivo padre',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'num_thumbs' => 
  array (
    'field' => 'num_thumbs',
    'label' => 'Numero de thumbs',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'thumbnail_tag' => 
  array (
    'field' => 'thumbnail_tag',
    'label' => 'Etiqueta del thumb',
    'rules' => 'trim|max_length[11]|required|',
  ),
);
    public $rules_edit = array (
  'id_file' => 
  array (
    'field' => 'id_file',
    'label' => 'Id_file',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required|',
  ),
  'path' => 
  array (
    'field' => 'path',
    'label' => 'Path',
    'rules' => 'trim|required|',
  ),
  'type' => 
  array (
    'field' => 'type',
    'label' => 'Type',
    'rules' => 'trim|max_length[256]|required|',
  ),
  'size' => 
  array (
    'field' => 'size',
    'label' => 'Size',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'width' => 
  array (
    'field' => 'width',
    'label' => 'Width',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'height' => 
  array (
    'field' => 'height',
    'label' => 'Height',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'id_file_parent' => 
  array (
    'field' => 'id_file_parent',
    'label' => 'Archivo padre',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'num_thumbs' => 
  array (
    'field' => 'num_thumbs',
    'label' => 'Numero de thumbs',
    'rules' => 'trim|max_length[11]|required|',
  ),
  'thumbnail_tag' => 
  array (
    'field' => 'thumbnail_tag',
    'label' => 'Etiqueta del thumb',
    'rules' => 'trim|max_length[11]|required|',
  ),
);

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $fil = new stdClass();

        $fil->id_file = '';
            $fil->nombre = '';
            $fil->path = '';
            $fil->type = '';
            $fil->size = '';
            $fil->width = '';
            $fil->height = '';
            $fil->id_file_parent = '';
            $fil->num_thumbs = '';
            $fil->thumbnail_tag = '';
            $fil->estado = '';
            $fil->change_count = '';
            $fil->id_user_modified = '';
            $fil->id_user_created = '';
            $fil->date_modified = '';
            $fil->date_created = '';
            

        return $fil;
    }
}