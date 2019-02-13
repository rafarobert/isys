<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_proveedores extends CI_Migration
{
    static $tableId = 'id_proveedor';
    static $tableName = 'dfa_proveedores';
    static $tableFields = array (
  'id_proveedor' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'id_proveedor',
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
    'pk' => 'id_proveedor',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_proveedor',
  ),
  'id_servicio' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'id_servicio',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_servicio',
    'table' => 'dfa_tipos_servicios',
    'pk' => 'id_proveedor',
  ),
  'id_ciudad' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'id_ciudad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_proveedor',
  ),
  'id_provincia' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'id_provincia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_provincia',
    'table' => 'ci_provincias',
    'pk' => 'id_proveedor',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_proveedores',
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
    'pk' => 'id_proveedor',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_proveedor',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_proveedores',
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
    'pk' => 'id_proveedor',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_proveedores',
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
    'pk' => 'id_proveedor',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_proveedor',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_proveedor',
  ),
  'column_12' => 
  array (
    'tabName' => 'dfa_proveedores',
    'field' => 'column_12',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_proveedor',
  ),
);
    static $tableForeignKeys = array (
  'dfa_proveedores_id_proveedor_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_proveedor',
    'idForeign' => NULL,
  ),
  'dfa_proveedores_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_proveedores_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_proveedores_ibfk_3' => 
  array (
    'table' => 'dfa_tipos_servicios',
    'idLocal' => 'id_servicio',
    'idForeign' => 'id_servicio',
  ),
  'dfa_proveedores_ibfk_4' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_ciudad',
    'idForeign' => 'id_city',
  ),
  'dfa_proveedores_ibfk_5' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_provincia',
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
        //$this->dbforge->drop_table('dfa_proveedores');
    }
}