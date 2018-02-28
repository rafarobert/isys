<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 28/02/2018
 * Time: 6:29 pm
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_modulos extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id_modulo' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'key' => 'PRI',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'titulo' => 
  array (
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'url' => 
  array (
    'type' => 'varchar',
    'constraint' => '600',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'descripcion' => 
  array (
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'icon' => 
  array (
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'listed' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => 'ENABLED',
    'auto_increment' => false,
    'extra' => '',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
  ),
  'change_count' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => '0',
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_user_modified' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_user_created' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'date_modified' => 
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
  'date_created' => 
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
  'status' => 
  array (
    'type' => 'varchar',
    'constraint' => '255',
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => 'ENABLED',
    'auto_increment' => false,
    'extra' => '',
  ),
);
        $fk_keys = array (
  'ci_modulos_ibfk_1' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'ci_modulos_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_modulo', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('ci_modulos', '$settings');
        $settings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings);
    }
}