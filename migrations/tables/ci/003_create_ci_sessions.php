<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 01/03/2018
 * Time: 12:22 am
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
    'key' => 'PRI',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'ip_address' => 
  array (
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'timestamp' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'key' => '',
    'default' => '0',
    'auto_increment' => false,
    'extra' => '',
  ),
  'data' => 
  array (
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'last_activity' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_user' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'label' => 'Nombre del Usuario',
  ),
  'id_hbf_sesion' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'label' => 'Sesion de',
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
        $this->set_settings($settings);
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}