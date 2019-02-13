<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_cursos extends CI_Migration
{
    static $tableId = 'id_curso';
    static $tableName = 'dfa_cursos';
    static $tableFields = array (
  'id_curso' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'id_curso',
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
    'pk' => 'id_curso',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_curso',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'descripcion',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'resumen' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'resumen',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'num_modulos' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'num_modulos',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'fecha_inicio' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'fecha_inicio',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'datetime',
    'pk' => 'id_curso',
  ),
  'fecha_final' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'fecha_final',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'datetime',
    'pk' => 'id_curso',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_curso',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'hidden',
    'validate' => 0,
    'idForeign' => 'id_file',
    'table' => 'ci_files',
    'pk' => 'id_curso',
  ),
  'id_entidad' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'id_entidad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'filterBy' => 
    array (
      'tipo' => 'unidad',
    ),
    'idForeign' => 'id_entidad',
    'table' => 'dfa_entidades',
    'pk' => 'id_curso',
  ),
  'modalidad' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'modalidad',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'checkboxes',
    'options' => 
    array (
      'virtual' => 'virtual',
      'presencial' => 'presencial',
    ),
    'validate' => 'required',
    'pk' => 'id_curso',
  ),
  'duracion' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'duracion',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'carga_horaria' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'carga_horaria',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'dedicacion_semanal' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'dedicacion_semanal',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'id_parent' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'id_parent',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'filterBy' => 
    array (
      'tipo' => 'curso',
    ),
    'idForeign' => 'id_curso',
    'table' => 'dfa_cursos',
    'pk' => 'id_curso',
  ),
  'num_modulo' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'num_modulo',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'tipo' => 
  array (
    'tabName' => 'dfa_cursos',
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
      'curso' => 'curso',
      'modulo' => 'modulo',
    ),
    'validate' => 'required',
    'pk' => 'id_curso',
  ),
  'id_city' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'id_city',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_city',
    'table' => 'ci_cities',
    'pk' => 'id_curso',
  ),
  'estado_publicacion' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'estado_publicacion',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'habilitado' => 'habilitado',
      'deshabilitado' => 'deshabilitado',
    ),
    'validate' => 'required',
    'pk' => 'id_curso',
  ),
  'revisado' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'revisado',
    'type' => 'varchar',
    'constraint' => '300',
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
      'no aprobado' => 'no aprobado',
    ),
    'pk' => 'id_curso',
  ),
  'comentarios' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'comentarios',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_curso',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_cursos',
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
    'pk' => 'id_curso',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_curso',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_cursos',
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
    'pk' => 'id_curso',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_cursos',
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
    'pk' => 'id_curso',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_curso',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_cursos',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_curso',
  ),
);
    static $tableForeignKeys = array (
  'dfa_cursos_id_curso_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_curso',
    'idForeign' => NULL,
  ),
  'dfa_cursos_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_cursos_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_cursos_ibfk_3' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_cover_picture',
    'idForeign' => 'id_file',
  ),
  'dfa_cursos_ibfk_4' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_entidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_cursos_ibfk_5' => 
  array (
    'table' => 'dfa_cursos',
    'idLocal' => 'id_parent',
    'idForeign' => 'id_curso',
  ),
  'dfa_cursos_ibfk_6' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_city',
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
        //$this->dbforge->drop_table('dfa_cursos');
    }
}