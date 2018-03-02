<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $02/03/2018
 * Time: $11:48 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_sessions extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id' => 
  array (
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
  ),
  'ip_address' => 
  array (
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'timestamp' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'validate' => 'required',
  ),
  'data' => 
  array (
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'last_activity' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'id_user' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del Usuario',
    'fieldRef' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
  ),
  'id_hbf_sesion' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion de',
    'fieldRef' => 'id_encargado',
    'validate' => 'required',
    'idForeign' => 'id_sesion',
    'table' => 'hbf_sesiones',
  ),
);
        $fk_keys = array (
  'ci_sessions_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user',
    'idForeign' => 'id_usuario',
  ),
  'ci_sessions_ibfk_2' => 
  array (
    'table' => 'hbf_sesiones',
    'idLocal' => 'id_hbf_sesion',
    'idForeign' => 'id_sesion',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('ci_sessions');
        $settings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings,'ci_sessions');
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_sessions');
    }
}