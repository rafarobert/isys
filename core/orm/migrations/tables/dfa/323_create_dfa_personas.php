<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_personas extends CI_Migration
{
    static $tableId = 'id_persona';
    static $tableName = 'dfa_personas';
    static $tableFields = array (
  'id_persona' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'id_persona',
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
    'pk' => 'id_persona',
  ),
  'id_user' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'validate' => 'required',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'pk' => 'id_persona',
  ),
  'id_residencia' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'id_residencia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_residencia',
    'table' => 'dfa_tipos_residencias',
    'pk' => 'id_persona',
  ),
  'id_rango_edad' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'id_rango_edad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_rango_edad',
    'table' => 'dfa_rangos_edades',
    'pk' => 'id_persona',
  ),
  'direccion' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'direccion',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_persona',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_personas',
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
    'pk' => 'id_persona',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_persona',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_personas',
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
    'pk' => 'id_persona',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_personas',
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
    'pk' => 'id_persona',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_persona',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_personas',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_persona',
  ),
);
    static $tableForeignKeys = array (
  'dfa_personas_id_persona_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_persona',
    'idForeign' => NULL,
  ),
  'dfa_personas_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_personas_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_personas_ibfk_3' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user',
    'idForeign' => 'id_user',
  ),
  'dfa_personas_ibfk_4' => 
  array (
    'table' => 'dfa_tipos_residencias',
    'idLocal' => 'id_residencia',
    'idForeign' => 'id_residencia',
  ),
  'dfa_personas_ibfk_5' => 
  array (
    'table' => 'dfa_rangos_edades',
    'idLocal' => 'id_rango_edad',
    'idForeign' => 'id_rango_edad',
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
        //$this->dbforge->drop_table('dfa_personas');
    }
}