<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 28/02/2018
 * Time: 4:02 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_personas extends CI_Migration {

    public function up()
    {
        $fields = array (
  'id_file' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => true,
    'null' => true,
    'key' => 'PRI',
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
  ),
  'path' => 
  array (
    'type' => 
    array (
      0 => 'text',
    ),
    'constraint' => 
    array (
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'type' => 
  array (
    'type' => 
    array (
      0 => 'varchar',
    ),
    'constraint' => 
    array (
      0 => '256',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'size' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'width' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'height' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_file_parent' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'label' => 'Archivo padre',
  ),
  'num_thumbs' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'label' => 'Numero de thumbs',
  ),
  'thumbnail_tag' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'label' => 'Etiqueta del thumb',
  ),
  'estado' => 
  array (
    'type' => 
    array (
      0 => 'varchar',
    ),
    'constraint' => 
    array (
      0 => '15',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => 'ENABLED',
    'auto_increment' => false,
    'extra' => '',
  ),
  'change_count' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => '0',
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_user_modified' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'id_user_created' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => true,
    'null' => true,
    'key' => 'MUL',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'date_modified' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
  'date_created' => 
  array (
    'type' => 
    array (
      0 => 'int',
    ),
    'constraint' => 
    array (
      0 => '11',
    ),
    'unsigned' => false,
    'null' => true,
    'key' => '',
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key(id_file, TRUE);
        $this->create_or_alter_table(ci_files, '$settings');
        $settings = array (
  'listed' => 'ENABLED',
  'status' => 'ENABLED',
  'icon' => 'fa fa-files',
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings);
    }
}