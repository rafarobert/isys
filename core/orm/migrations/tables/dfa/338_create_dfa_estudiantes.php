<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_estudiantes extends CI_Migration
{
    static $tableId = 'id_estudiante';
    static $tableName = 'dfa_estudiantes';
    static $tableFields = array (
  'id_estudiante' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'id_estudiante',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_estudiante',
  ),
  'id_user' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'name',
    'validate' => 'required',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'pk' => 'id_estudiante',
  ),
  'id_curso' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'id_curso',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_curso',
    'table' => 'dfa_cursos',
    'pk' => 'id_estudiante',
  ),
  'nota' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'nota',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_estudiante',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_estudiante',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'hidden',
    'pk' => 'id_estudiante',
  ),
  'ids_cursos' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'ids_cursos',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'checkboxes',
    'selectBy' => 
    array (
      0 => 'nombre',
    ),
    'table' => 'dfa_cursos',
    'idForeign' => 'id_curso',
    'pk' => 'id_estudiante',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_estudiantes',
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
    'pk' => 'id_estudiante',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_estudiante',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_estudiantes',
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
    'pk' => 'id_estudiante',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_estudiantes',
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
    'pk' => 'id_estudiante',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_estudiante',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_estudiantes',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_estudiante',
  ),
);
    static $tableForeignKeys = array (
  'dfa_estudiantes_id_estudiante_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_estudiante',
    'idForeign' => NULL,
  ),
  'dfa_estudiantes_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_estudiantes_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_estudiantes_ibfk_3' => 
  array (
    'table' => 'dfa_cursos',
    'idLocal' => 'id_curso',
    'idForeign' => 'id_curso',
  ),
  'dfa_estudiantes_ibfk_5' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user',
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
        //$this->dbforge->drop_table('dfa_estudiantes');
    }
}