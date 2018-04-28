<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $28/04/2018
 * Time: $1:10 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_sessions extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id' => 
  array (
    'field' => 'id',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'ip_address' => 
  array (
    'field' => 'ip_address',
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'timestamp' => 
  array (
    'field' => 'timestamp',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'data' => 
  array (
    'field' => 'data',
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'last_activity' => 
  array (
    'field' => 'last_activity',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'id_user' => 
  array (
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del Usuario',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id',
  ),
  'id_hbf_sesion' => 
  array (
    'field' => 'id_hbf_sesion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Sesion de',
    'selectBy' => 'id_encargado',
    'validate' => 'required',
    'idForeign' => 'id_sesion',
    'table' => 'hbf_sesiones',
    'pk' => 'id',
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