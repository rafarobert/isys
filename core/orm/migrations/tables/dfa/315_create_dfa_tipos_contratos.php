<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_tipos_contratos extends CI_Migration
{
    static $tableId = 'id_tipo_contrato';
    static $tableName = 'dfa_tipos_contratos';
    static $tableFields = array (
  'id_tipo_contrato' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'id_tipo_contrato',
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
    'pk' => 'id_tipo_contrato',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_tipo_contrato',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_tipo_contrato',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
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
    'pk' => 'id_tipo_contrato',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_tipo_contrato',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
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
    'pk' => 'id_tipo_contrato',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
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
    'pk' => 'id_tipo_contrato',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_tipo_contrato',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_tipo_contrato',
  ),
  'tipo' => 
  array (
    'tabName' => 'dfa_tipos_contratos',
    'field' => 'tipo',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'opciones para contratacion',
    'input' => 'radios',
    'options' => 
    array (
      'tipo contratacion' => 'tipo contratacion',
      'forma contratacion' => 'forma contratacion',
    ),
    'validate' => 'required',
    'pk' => 'id_tipo_contrato',
  ),
);
    static $tableForeignKeys = array (
  'dfa_tipos_contratos_id_tipo_contrato_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_tipo_contrato',
    'idForeign' => NULL,
  ),
  'dfa_tipos_contratos_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_tipos_contratos_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
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
        //$this->dbforge->drop_table('dfa_tipos_contratos');
    }
}