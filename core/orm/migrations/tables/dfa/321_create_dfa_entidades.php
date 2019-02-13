<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_entidades extends CI_Migration
{
    static $tableId = 'id_entidad';
    static $tableName = 'dfa_entidades';
    static $tableFields = array (
  'id_entidad' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'id_entidad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'id_parent' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'id_parent',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'nombre de la adjuntoria',
    'input' => 'select',
    'selectBy' => 'nombre',
    'validate' => 0,
    'idForeign' => 'id_entidad',
    'table' => 'dfa_entidades',
    'pk' => 'id_entidad',
  ),
  'mapa' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'mapa',
    'type' => 'varchar',
    'constraint' => '900',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_entidad',
  ),
  'tipo' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'tipo',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'unidad' => 'unidad',
      'adjuntoria' => 'adjuntoria',
      'direccion' => 'direccion',
      'delegacion' => 'delegacion',
      'coordinacion' => 'coordinacion',
    ),
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'lng' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'lng',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'lat' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'lat',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'id_provincia' => 
  array (
    'tabName' => 'dfa_entidades',
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
    'pk' => 'id_entidad',
  ),
  'id_ciudad' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'id_ciudad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'name',
    'validate' => 'required',
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_entidad',
  ),
  'telefono' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'telefono',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'id_delegado' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'id_delegado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 
    array (
      0 => 'id_user',
    ),
    'validate' => 'required',
    'idForeign' => 'id_empleado',
    'table' => 'dfa_empleados',
    'pk' => 'id_entidad',
  ),
  'direccion' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'direccion',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_entidad',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_entidad',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_entidades',
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
    'pk' => 'id_entidad',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_entidades',
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
    'pk' => 'id_entidad',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_entidad',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_entidades',
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
    'pk' => 'id_entidad',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_entidades',
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
    'pk' => 'id_entidad',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_entidad',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_entidades',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_entidad',
  ),
);
    static $tableForeignKeys = array (
  'dfa_entidades_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_entidades_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_entidades_ibfk_3' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_parent',
    'idForeign' => 'id_entidad',
  ),
  'dfa_entidades_ibfk_4' => 
  array (
    'table' => 'dfa_empleados',
    'idLocal' => 'id_delegado',
    'idForeign' => 'id_empleado',
  ),
  'dfa_entidades_ibfk_5' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_ciudad',
    'idForeign' => 'id_city',
  ),
  'dfa_entidades_ibfk_6' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_provincia',
    'idForeign' => 'id_provincia',
  ),
  'dfa_entidades_ibfk_7' => 
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
        //$this->dbforge->drop_table('dfa_entidades');
    }
}