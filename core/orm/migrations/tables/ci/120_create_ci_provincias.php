<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_ci_provincias extends CI_Migration
{
    static $tableId = 'id_provincia';
    static $tableName = 'ci_provincias';
    static $tableFields = array (
  'id_provincia' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'id_provincia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_provincia',
  ),
  'name' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'name',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_provincia',
  ),
  'area' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'area',
    'type' => 'varchar',
    'constraint' => '900',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_provincia',
  ),
  'lat' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'lat',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_provincia',
  ),
  'lng' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'lng',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_provincia',
  ),
  'id_municipio' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'id_municipio',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_provincia',
    'table' => 'ci_provincias',
    'pk' => 'id_provincia',
  ),
  'id_ciudad' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'id_ciudad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_provincia',
  ),
  'status' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_provincia',
  ),
  'change_count' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_provincia',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'label' => 'Nombre del usuario que modifico el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_provincia',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'label' => 'Nombre del usuario que creo el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_provincia',
  ),
  'date_modified' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_provincia',
  ),
  'date_created' => 
  array (
    'tabName' => 'ci_provincias',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_provincia',
  ),
);
    static $tableForeignKeys = array (
  'ci_provincias_id_provincia_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_provincia',
    'idForeign' => NULL,
  ),
  'ci_provincias_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'ci_provincias_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'ci_provincias_ibfk_3' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_ciudad',
    'idForeign' => 'id_city',
  ),
  'ci_provincias_ibfk_4' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_municipio',
    'idForeign' => 'id_provincia',
  ),
);
    static $tableSettings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);

    public function up()
    {
        $this->dbforge->add_field(self::$tableFields);
        $this->dbforge->add_key(self::$tableId, TRUE);
        $this->dbforge->add_key(self::$tableForeignKeys);
        $this->create_or_alter_table(self::$tableName);
        $settings = self::$tableSettings;
        $this->set_settings($settings, self::$tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_provincias');
    }
}