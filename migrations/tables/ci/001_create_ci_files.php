<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $02/03/2018
 * Time: $7:08 pm
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_files extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id_file' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
  ),
  'nombre' => 
  array (
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'path' => 
  array (
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'type' => 
  array (
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'size' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'width' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'height' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'id_file_parent' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Archivo padre',
    'fieldRef' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_file',
    'table' => 'ci_files',
  ),
  'num_thumbs' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Numero de thumbs',
    'validate' => 'required',
  ),
  'thumbnail_tag' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Etiqueta del thumb',
    'validate' => 'required',
  ),
  'estado' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
  ),
  'change_count' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
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
  ),
  'date_modified' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
  ),
  'date_created' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
  ),
);
        $fk_keys = array (
  'ci_files_ibfk_1' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_file_parent',
    'idForeign' => 'id_file',
  ),
  'ci_files_ibfk_2' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_usuario',
  ),
  'ci_files_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_usuario',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_file', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('ci_files');
        $settings = array (
  'listed' => 'ENABLED',
  'status' => 'ENABLED',
  'icon' => 'fa fa-files',
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings,'ci_files');
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_files');
    }
}