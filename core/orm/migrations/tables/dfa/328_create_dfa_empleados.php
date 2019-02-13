<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_empleados extends CI_Migration
{
    static $tableId = 'id_empleado';
    static $tableName = 'dfa_empleados';
    static $tableFields = array (
  'id_empleado' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_empleado',
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
    'pk' => 'id_empleado',
  ),
  'id_user' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 
    array (
      0 => 'apellido',
      1 => 'nombre',
    ),
    'validate' => 'required',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'pk' => 'id_empleado',
  ),
  'id_role' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'ci_roles',
    'pk' => 'id_empleado',
  ),
  'id_oficina' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_oficina',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'id_provincia',
    'validate' => 'required',
    'idForeign' => 'id_oficina',
    'table' => 'dfa_oficinas',
    'pk' => 'id_empleado',
  ),
  'id_puesto' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_puesto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_puesto',
    'table' => 'dfa_tipos_puestos',
    'pk' => 'id_empleado',
  ),
  'id_unidad' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'id_unidad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_entidad',
    'table' => 'dfa_entidades',
    'pk' => 'id_empleado',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_empleados',
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
    'pk' => 'id_empleado',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_empleado',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_empleados',
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
    'pk' => 'id_empleado',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_empleados',
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
    'pk' => 'id_empleado',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_empleado',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_empleados',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_empleado',
  ),
);
    static $tableForeignKeys = array (
  'dfa_empleados_id_empleado_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_empleado',
    'idForeign' => NULL,
  ),
  'dfa_empleados_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_empleados_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_empleados_ibfk_3' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user',
    'idForeign' => 'id_user',
  ),
  'dfa_empleados_ibfk_4' => 
  array (
    'table' => 'dfa_tipos_puestos',
    'idLocal' => 'id_puesto',
    'idForeign' => 'id_puesto',
  ),
  'dfa_empleados_ibfk_5' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_unidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_empleados_ibfk_6' => 
  array (
    'table' => 'dfa_oficinas',
    'idLocal' => 'id_oficina',
    'idForeign' => 'id_oficina',
  ),
  'dfa_empleados_ibfk_7' => 
  array (
    'table' => 'ci_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
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
        //$this->dbforge->drop_table('dfa_empleados');
    }
}