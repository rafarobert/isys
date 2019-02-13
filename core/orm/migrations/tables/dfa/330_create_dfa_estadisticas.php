<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_estadisticas extends CI_Migration
{
    static $tableId = 'id_estadistica';
    static $tableName = 'dfa_estadisticas';
    static $tableFields = array (
  'id_estadistica' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_estadistica',
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
    'pk' => 'id_estadistica',
  ),
  'id_ciudad' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_ciudad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_estadistica',
  ),
  'id_provincia' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_provincia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_provincia',
    'table' => 'ci_provincias',
    'pk' => 'id_estadistica',
  ),
  'total_denuncias' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'total_denuncias',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_estadistica',
  ),
  'porcentaje' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'porcentaje',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_estadistica',
  ),
  'id_procedimiento' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_procedimiento',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_tipo_procedimiento',
    'table' => 'dfa_tipos_procedimientos',
    'pk' => 'id_estadistica',
  ),
  'id_residencia' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_residencia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_residencia',
    'table' => 'dfa_tipos_residencias',
    'pk' => 'id_estadistica',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_estadistica',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'hidden',
    'pk' => 'id_estadistica',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'estado',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'label' => 'Estado',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
    'pk' => 'id_estadistica',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_estadistica',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_estadisticas',
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
    'pk' => 'id_estadistica',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_estadisticas',
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
    'pk' => 'id_estadistica',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_estadistica',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_estadisticas',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_estadistica',
  ),
);
    static $tableForeignKeys = array (
  'dfa_estadisticas_id_estadistica_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_estadistica',
    'idForeign' => NULL,
  ),
  'dfa_estadisticas_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_estadisticas_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_estadisticas_ibfk_3' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_ciudad',
    'idForeign' => 'id_city',
  ),
  'dfa_estadisticas_ibfk_4' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_provincia',
    'idForeign' => 'id_provincia',
  ),
  'dfa_estadisticas_ibfk_5' => 
  array (
    'table' => 'dfa_tipos_procedimientos',
    'idLocal' => 'id_procedimiento',
    'idForeign' => 'id_tipo_procedimiento',
  ),
  'dfa_estadisticas_ibfk_6' => 
  array (
    'table' => 'dfa_tipos_residencias',
    'idLocal' => 'id_residencia',
    'idForeign' => 'id_residencia',
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
        //$this->dbforge->drop_table('dfa_estadisticas');
    }
}