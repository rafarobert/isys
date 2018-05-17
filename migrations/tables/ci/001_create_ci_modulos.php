<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $22/03/2018
 * Time: $1:03 pm
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
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
  ),
  'titulo' => 
  array (
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'url' => 
  array (
    'type' => 'varchar',
    'constraint' => '600',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'descripcion' => 
  array (
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'icon' => 
  array (
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'listed' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
    'validate' => 'required',
  ),
  'change_count' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
  ),
  'id_user_modified' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'label' => 'Nombre del usuario que modifico el registro',
    'fieldRef' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'disabled',
  ),
  'id_user_created' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'label' => 'Nombre del usuario que creo el registro',
    'fieldRef' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'input' => 'disabled',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
  ),
  'date_created' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
  ),
  'status' => 
  array (
    'type' => 'varchar',
    'constraint' => '255',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'validate' => 'required',
  ),
  'id_file' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
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
        $this->create_or_alter_table('ci_modulos');
        $settings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings,'ci_modulos');
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_modulos');
    }
}