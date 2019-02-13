<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_ci_cities extends CI_Migration
{
    static $tableId = 'id_city';
    static $tableName = 'ci_cities';
    static $tableFields = array (
  'id_city' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'id_city',
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
    'pk' => 'id_city',
  ),
  'name' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'name',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_city',
  ),
  'description' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'description',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'abbreviation' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'abbreviation',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'id_capital' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'id_capital',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'selectBy' => 'name',
    'filterBy' => 
    array (
      'tipo' => 'capital',
    ),
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_city',
  ),
  'id_region' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'id_region',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'selectBy' => 'name',
    'filterBy' => 
    array (
      'tipo' => 'region',
    ),
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_city',
  ),
  'lat' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'lat',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'lng' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'lng',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'area' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'area',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'nro_municipios' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'nro_municipios',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'surface' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'surface',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'ids_files' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_city',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'hidden',
    'idForeign' => 'id_file',
    'table' => 'ci_files',
    'pk' => 'id_city',
  ),
  'height' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'height',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_city',
  ),
  'tipo' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'tipo',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'radios',
    'options' => 
    array (
      'region' => 'region',
      'ciudad' => 'ciudad',
      'capital' => 'capital',
    ),
    'pk' => 'id_city',
  ),
  'status' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_city',
  ),
  'change_count' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_city',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'ci_cities',
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
    'pk' => 'id_city',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'ci_cities',
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
    'pk' => 'id_city',
  ),
  'date_modified' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_city',
  ),
  'date_created' => 
  array (
    'tabName' => 'ci_cities',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_city',
  ),
);
    static $tableForeignKeys = array (
  'ci_cities_id_city_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_city',
    'idForeign' => NULL,
  ),
  'ci_cities_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'ci_cities_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'ci_cities_ibfk_3' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_capital',
    'idForeign' => 'id_city',
  ),
  'ci_cities_ibfk_4' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_region',
    'idForeign' => 'id_city',
  ),
  'ci_cities_ibfk_5' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_cover_picture',
    'idForeign' => 'id_file',
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
        //$this->dbforge->drop_table('ci_cities');
    }
}