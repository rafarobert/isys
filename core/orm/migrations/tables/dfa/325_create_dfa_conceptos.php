<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_conceptos extends CI_Migration
{
    static $tableId = 'id_concepto';
    static $tableName = 'dfa_conceptos';
    static $tableFields = array (
  'id_concepto' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'id_concepto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_concepto',
  ),
  'titulo' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'titulo',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_concepto',
  ),
  'titular' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'titular',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_concepto',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'descripcion',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_concepto',
  ),
  'id_historia' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'id_historia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'titulo',
    'validate' => 0,
    'filterBy' => 
    array (
      'tipo' => 'historia',
    ),
    'idForeign' => 'id_concepto',
    'table' => 'dfa_conceptos',
    'pk' => 'id_concepto',
  ),
  'id_tipo_concepto' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'id_tipo_concepto',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'categoria de concepto',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_tipo_concepto',
    'table' => 'dfa_tipos_conceptos',
    'pk' => 'id_concepto',
  ),
  'id_unidad' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'id_unidad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 0,
    'idForeign' => 'id_entidad',
    'table' => 'dfa_entidades',
    'pk' => 'id_concepto',
  ),
  'tipo' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'tipo',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'contenido' => 'contenido',
      'historia' => 'historia',
    ),
    'validate' => 'required',
    'pk' => 'id_concepto',
  ),
  'estado_publicacion' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'estado_publicacion',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'habilitado' => 'habilitado',
      'desabilitado' => 'desabilitado',
    ),
    'validate' => 'required',
    'pk' => 'id_concepto',
  ),
  'revisado' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'revisado',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'radios',
    'options' => 
    array (
      'aprobado' => 'aprobado',
      'consultar' => 'consultar',
      'revisar' => 'revisar',
      'no aprobado' => 'no aprobado',
    ),
    'pk' => 'id_concepto',
  ),
  'comentarios' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'comentarios',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_concepto',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_concepto',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_conceptos',
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
    'pk' => 'id_concepto',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_conceptos',
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
    'pk' => 'id_concepto',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_concepto',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_conceptos',
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
    'pk' => 'id_concepto',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_conceptos',
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
    'pk' => 'id_concepto',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_concepto',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_conceptos',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_concepto',
  ),
);
    static $tableForeignKeys = array (
  'dfa_conceptos_ibfk_1' => 
  array (
    'table' => 'dfa_conceptos',
    'idLocal' => 'id_historia',
    'idForeign' => 'id_concepto',
  ),
  'dfa_conceptos_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_conceptos_ibfk_3' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_conceptos_ibfk_4' => 
  array (
    'table' => 'dfa_tipos_conceptos',
    'idLocal' => 'id_tipo_concepto',
    'idForeign' => 'id_tipo_concepto',
  ),
  'dfa_conceptos_ibfk_5' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_unidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_conceptos_ibfk_6' => 
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
        //$this->dbforge->drop_table('dfa_conceptos');
    }
}