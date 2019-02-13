<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_convocatorias extends CI_Migration
{
    static $tableId = 'id_convocatoria';
    static $tableName = 'dfa_convocatorias';
    static $tableFields = array (
  'id_convocatoria' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'id_convocatoria',
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
    'pk' => 'id_convocatoria',
  ),
  'id_tipo_contrato' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'id_tipo_contrato',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_tipo_contrato',
    'table' => 'dfa_tipos_contratos',
    'pk' => 'id_convocatoria',
  ),
  'id_forma_contrato' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'id_forma_contrato',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_tipo_contrato',
    'table' => 'dfa_tipos_contratos',
    'pk' => 'id_convocatoria',
  ),
  'fecha_requerida' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'fecha_requerida',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_convocatoria',
  ),
  'justificacion' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'justificacion',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_convocatoria',
  ),
  'nro' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'nro',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_convocatoria',
  ),
  'precio_referencial' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'precio_referencial',
    'type' => 'decimal',
    'constraint' => '10',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_convocatoria',
  ),
  'fecha_publicacion' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'fecha_publicacion',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_convocatoria',
  ),
  'id_concepto' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'id_concepto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'titulo',
    'validate' => 'required',
    'idForeign' => 'id_concepto',
    'table' => 'dfa_conceptos',
    'pk' => 'id_convocatoria',
  ),
  'id_entidad' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'id_entidad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'filterBy' => 
    array (
      'tipo' => 'unidad',
    ),
    'validate' => 'required',
    'idForeign' => 'id_entidad',
    'table' => 'dfa_entidades',
    'pk' => 'id_convocatoria',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_convocatoria',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_convocatorias',
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
    'pk' => 'id_convocatoria',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_convocatorias',
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
    'pk' => 'id_convocatoria',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_convocatoria',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_convocatorias',
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
    'pk' => 'id_convocatoria',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_convocatorias',
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
    'pk' => 'id_convocatoria',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_convocatoria',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_convocatorias',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_convocatoria',
  ),
);
    static $tableForeignKeys = array (
  'dfa_convocatorias_id_convocatoria_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_convocatoria',
    'idForeign' => NULL,
  ),
  'dfa_convocatorias_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_convocatorias_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_convocatorias_ibfk_3' => 
  array (
    'table' => 'dfa_tipos_contratos',
    'idLocal' => 'id_tipo_contrato',
    'idForeign' => 'id_tipo_contrato',
  ),
  'dfa_convocatorias_ibfk_4' => 
  array (
    'table' => 'dfa_tipos_contratos',
    'idLocal' => 'id_forma_contrato',
    'idForeign' => 'id_tipo_contrato',
  ),
  'dfa_convocatorias_ibfk_5' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_entidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_convocatorias_ibfk_6' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_cover_picture',
    'idForeign' => 'id_file',
  ),
  'dfa_convocatorias_ibfk_7' => 
  array (
    'table' => 'dfa_conceptos',
    'idLocal' => 'id_concepto',
    'idForeign' => 'id_concepto',
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
        //$this->dbforge->drop_table('dfa_convocatorias');
    }
}