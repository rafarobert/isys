<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_oficinas extends CI_Migration
{
    static $tableId = 'id_oficina';
    static $tableName = 'dfa_oficinas';
    static $tableFields = array (
  'id_oficina' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_oficina',
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
    'pk' => 'id_oficina',
  ),
  'direccion' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'direccion',
    'type' => 'varchar',
    'constraint' => '800',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'id_contacto' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_contacto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'id_user',
    'validate' => 'required',
    'idForeign' => 'id_empleado',
    'table' => 'dfa_empleados',
    'pk' => 'id_oficina',
  ),
  'telefono_1' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'telefono_1',
    'type' => 'varchar',
    'constraint' => '30',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'telefono_2' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'telefono_2',
    'type' => 'varchar',
    'constraint' => '30',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'celular_1' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'celular_1',
    'type' => 'varchar',
    'constraint' => '30',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'celular_2' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'celular_2',
    'type' => 'varchar',
    'constraint' => '30',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'id_provincia' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_provincia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'name',
    'validate' => 'required',
    'idForeign' => 'id_provincia',
    'table' => 'ci_provincias',
    'pk' => 'id_oficina',
  ),
  'id_ciudad' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_ciudad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'name',
    'filterBy' => 
    array (
      'tipo' => 'ciudad',
    ),
    'validate' => 'required',
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_oficina',
  ),
  'id_region' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_region',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'name',
    'filterBy' => 
    array (
      'tipo' => 'region',
    ),
    'validate' => 'required',
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_oficina',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_oficina',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'hidden',
    'validate' => 0,
    'pk' => 'id_oficina',
  ),
  'lat' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'lat',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'lng' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'lng',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_oficina',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_oficinas',
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
    'pk' => 'id_oficina',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_oficina',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_oficinas',
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
    'pk' => 'id_oficina',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_oficinas',
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
    'pk' => 'id_oficina',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_oficina',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_oficinas',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_oficina',
  ),
);
    static $tableForeignKeys = array (
  'dfa_oficinas_id_oficina_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_oficina',
    'idForeign' => NULL,
  ),
  'dfa_oficinas_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_oficinas_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_oficinas_ibfk_3' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_provincia',
    'idForeign' => 'id_provincia',
  ),
  'dfa_oficinas_ibfk_4' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_ciudad',
    'idForeign' => 'id_city',
  ),
  'dfa_oficinas_ibfk_5' => 
  array (
    'table' => 'dfa_empleados',
    'idLocal' => 'id_contacto',
    'idForeign' => 'id_empleado',
  ),
  'dfa_oficinas_ibfk_6' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_region',
    'idForeign' => 'id_city',
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
        //$this->dbforge->drop_table('dfa_oficinas');
    }
}