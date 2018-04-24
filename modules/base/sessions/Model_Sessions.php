<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 24/04/2018
 * Time: 1:01 am
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_Sessions extends base_Model {

    
             /**
                * The value for the id field.
                *
                * @var        string
                */             
             public $id;
        
             /**
                * The value for the ip_address field.
                *
                * @var        string
                */             
             public $ip_address;
        
             /**
                * The value for the timestamp field.
                *
                * @var        int
                */             
             public $timestamp;
        
             /**
                * The value for the data field.
                *
                * @var        
                */             
             public $data;
        
             /**
                * The value for the last_activity field.
                *
                * @var        string
                */             
             public $last_activity;
        
             /**
                * The value for the id_user field.
                *
                * @var        int
                */             
             public $id_user;
        
             /**
                * The value for the id_hbf_sesion field.
                *
                * @var        int
                */             
             public $id_hbf_sesion;
        

    protected $_table_name = "ci_sessions";
    protected $_order_by = "id desc";
    protected $_timestaps = true;
    protected $_primary_key = "id";

    public $rules = array (
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'label' => 'Ip_address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Data',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'label' => 'Last_activity',
    'rules' => 'trim|required',
  ),
  'id_user' => 
  array (
    'field' => 'id_user',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
);
    public $rules_edit = array (
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'label' => 'Ip_address',
    'rules' => 'trim|max_length[45]|required',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'label' => 'Timestamp',
    'rules' => 'trim|max_length[10]|required',
  ),
  'data' => 
  array (
    'field' => 'data',
    'label' => 'Data',
    'rules' => 'trim|required',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'label' => 'Last_activity',
    'rules' => 'trim|required',
  ),
  'id_user' => 
  array (
    'field' => 'id_user',
    'label' => 'Nombre del Usuario',
    'rules' => 'trim|max_length[11]|required',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'label' => 'Sesion de',
    'rules' => 'trim|max_length[10]|required',
  ),
);

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $session = new stdClass();

        $session->id = '';
            $session->ip_address = '';
            $session->timestamp = '';
            $session->data = '';
            $session->last_activity = '';
            $session->id_user = '';
            $session->id_hbf_sesion = '';
            

        return $session;
    }
}