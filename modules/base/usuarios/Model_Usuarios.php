<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 28/04/2018
 * Time: 1:05 am
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Usuarios extends base_Model {

    
             /**
                * The value for the id_usuario field.
                *
                * @var        int
                */             
             public $id_usuario;
        
             /**
                * The value for the nombre field.
                *
                * @var        string
                */             
             public $nombre;
        
             /**
                * The value for the apellido field.
                *
                * @var        string
                */             
             public $apellido;
        
             /**
                * The value for the username field.
                *
                * @var        string
                */             
             public $username;
        
             /**
                * The value for the email field.
                *
                * @var        string
                */             
             public $email;
        
             /**
                * The value for the password field.
                *
                * @var        string
                */             
             public $password;
        
             /**
                * The value for the fec_nacimiento field.
                *
                * @var        string
                */             
             public $fec_nacimiento;
        
             /**
                * The value for the sexo field.
                *
                * @var        string
                */             
             public $sexo;
        
             /**
                * The value for the invitado_por field.
                *
                * @var        int
                */             
             public $invitado_por;
        
             /**
                * The value for the phone_number_1 field.
                *
                * @var        string
                */             
             public $phone_number_1;
        
             /**
                * The value for the phone_number_2 field.
                *
                * @var        string
                */             
             public $phone_number_2;
        
             /**
                * The value for the cellphone_number_1 field.
                *
                * @var        string
                */             
             public $cellphone_number_1;
        
             /**
                * The value for the cellphone_number_2 field.
                *
                * @var        string
                */             
             public $cellphone_number_2;
        
             /**
                * The value for the cod_acceso field.
                *
                * @var        string
                */             
             public $cod_acceso;
        
             /**
                * The value for the id_option_tipo_asociado field.
                *
                * @var        int
                */             
             public $id_option_tipo_asociado;
        
             /**
                * The value for the id_option_nivel_asociado field.
                *
                * @var        int
                */             
             public $id_option_nivel_asociado;
        
             /**
                * The value for the id_turno field.
                *
                * @var        int
                */             
             public $id_turno;
        
             /**
                * The value for the id_role field.
                *
                * @var        int
                */             
             public $id_role;
        
             /**
                * The value for the foto_perfil field.
                *
                * @var        int
                */             
             public $foto_perfil;
        
             /**
                * The value for the app_monitor field.
                *
                * @var        string
                */             
             public $app_monitor;
        
             /**
                * The value for the app_orders field.
                *
                * @var        string
                */             
             public $app_orders;
        
             /**
                * The value for the app_admin field.
                *
                * @var        string
                */             
             public $app_admin;
        
             /**
                * The value for the herbalife_key field.
                *
                * @var        string
                */             
             public $herbalife_key;
        
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
                * The value for the date_created field.
                *
                * @var        string
                */             
             public $date_created;
        
             /**
                * The value for the date_modified field.
                *
                * @var        string
                */             
             public $date_modified;
        

    protected $_table_name = "ci_usuarios";
    protected $_order_by = "id_usuario desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_usuario";

    public $rules = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'password' => 
  array (
    'password' => 
    array (
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'trim|max_length[128]|matches[password_confirm]',
    ),
    'password_confirm' => 
    array (
      'field' => 'password_confirm',
      'label' => 'password confirm',
      'rules' => 'trim|matches[password]',
    ),
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'label' => 'Fec_nacimiento',
    'rules' => 'trim|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'label' => 'Invitado por',
    'rules' => 'trim|max_length[10]',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'label' => 'Phone_number_2',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'label' => 'Codigo de acceso',
    'rules' => 'trim|max_length[50]|required',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'label' => 'Tipo de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'label' => 'Nivel de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_role' => 
  array (
    'field' => 'id_role',
    'label' => 'Role del usuario',
    'rules' => 'trim|max_length[10]|required',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'label' => 'Permitir app monitoreo',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'label' => 'Permitir app ordenes',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'label' => 'Permitir app administrador',
    'rules' => 'trim|max_length[50]|required',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'label' => 'Herbalife_key',
    'rules' => 'trim|max_length[256]|required',
  ),
);
    public $rules_edit = array (
  'nombre' => 
  array (
    'field' => 'nombre',
    'label' => 'Nombre',
    'rules' => 'trim|max_length[256]|required',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'label' => 'Apellido',
    'rules' => 'trim|max_length[256]|required',
  ),
  'username' => 
  array (
    'field' => 'username',
    'label' => 'Username',
    'rules' => 'trim|max_length[250]|required',
  ),
  'email' => 
  array (
    'field' => 'email',
    'label' => 'Email',
    'rules' => 'trim|max_length[100]',
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'label' => 'Fec_nacimiento',
    'rules' => 'trim|required',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'label' => 'Sexo',
    'rules' => 'trim|max_length[15]|required',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'label' => 'Invitado por',
    'rules' => 'trim|max_length[10]',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'label' => 'Telefono 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'label' => 'Phone_number_2',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'label' => 'Celular 1',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'label' => 'Celular 2',
    'rules' => 'trim|max_length[20]|required',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'label' => 'Codigo de acceso',
    'rules' => 'trim|max_length[50]|required',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'label' => 'Tipo de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'label' => 'Nivel de asociado',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'label' => 'Turno de',
    'rules' => 'trim|max_length[10]|required',
  ),
  'id_role' => 
  array (
    'field' => 'id_role',
    'label' => 'Role del usuario',
    'rules' => 'trim|max_length[10]|required',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'label' => 'Permitir app monitoreo',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'label' => 'Permitir app ordenes',
    'rules' => 'trim|max_length[50]|required',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'label' => 'Permitir app administrador',
    'rules' => 'trim|max_length[50]|required',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'label' => 'Herbalife_key',
    'rules' => 'trim|max_length[256]|required',
  ),
);

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $usuario = new stdClass();

        $usuario->id_usuario = '';
            $usuario->nombre = '';
            $usuario->apellido = '';
            $usuario->username = '';
            $usuario->email = '';
            $usuario->password = '';
            $usuario->fec_nacimiento = '';
            $usuario->sexo = '';
            $usuario->invitado_por = '';
            $usuario->phone_number_1 = '';
            $usuario->phone_number_2 = '';
            $usuario->cellphone_number_1 = '';
            $usuario->cellphone_number_2 = '';
            $usuario->cod_acceso = '';
            $usuario->id_option_tipo_asociado = '';
            $usuario->id_option_nivel_asociado = '';
            $usuario->id_turno = '';
            $usuario->id_role = '';
            $usuario->foto_perfil = '';
            $usuario->app_monitor = '';
            $usuario->app_orders = '';
            $usuario->app_admin = '';
            $usuario->herbalife_key = '';
            $usuario->estado = '';
            $usuario->change_count = '';
            $usuario->date_created = '';
            $usuario->date_modified = '';
            

        return $usuario;
    }
}