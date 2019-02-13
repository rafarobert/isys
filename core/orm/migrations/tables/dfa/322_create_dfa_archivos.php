<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_archivos extends CI_Migration
{
    static $tableId = 'id_archivo';
    static $tableName = 'dfa_archivos';
    static $tableFields = array (
  'id_archivo' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'id_archivo',
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
    'pk' => 'id_archivo',
  ),
  'titulo' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'titulo',
    'type' => 'varchar',
    'constraint' => '400',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validated' => 0,
    'validate' => 'required',
    'pk' => 'id_archivo',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_archivo',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_archivos',
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
    'pk' => 'id_archivo',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '499',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_archivo',
  ),
  'estado_publicacion' => 
  array (
    'tabName' => 'dfa_archivos',
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
      'desabilitado' => 'desabilitado',
    ),
    'validate' => 'required',
    'pk' => 'id_archivo',
  ),
  'id_etiquetas' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'id_etiquetas',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'checkboxes',
    'selectBy' => 'nombre',
    'table' => 'dfa_etiquetas',
    'idForeign' => 'id_etiqueta',
    'pk' => 'id_archivo',
  ),
  'id_entidad' => 
  array (
    'tabName' => 'dfa_archivos',
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
    'pk' => 'id_archivo',
  ),
  'id_categoria_publicacion' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'id_categoria_publicacion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_categoria_publicacion',
    'table' => 'dfa_categorias_publicaciones',
    'pk' => 'id_archivo',
  ),
  'revisado' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'revisado',
    'type' => 'varchar',
    'constraint' => '300',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'aprobado' => 'aprobado',
      'consultar' => 'consultar',
      'no aprobado' => 'no aprobado',
    ),
    'validate' => 'required',
    'pk' => 'id_archivo',
  ),
  'comentarios' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'comentarios',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_archivo',
  ),
  'id_seccion_publicacion' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'id_seccion_publicacion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_seccion_publicacion',
    'table' => 'dfa_secciones_publicaciones',
    'pk' => 'id_archivo',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_archivo',
  ),
  'tipo' => 
  array (
    'tabName' => 'dfa_archivos',
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
      'normativas' => 'normativas',
      'informes' => 'informes',
      'estadisticas' => 'estadisticas',
      'declaraciones' => 'declaraciones',
      'reglamentos' => 'reglamentos',
    ),
    'validate' => 'required',
    'pk' => 'id_archivo',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_archivos',
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
    'pk' => 'id_archivo',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_archivos',
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
    'pk' => 'id_archivo',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_archivos',
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
    'pk' => 'id_archivo',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_archivo',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_archivos',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_archivo',
  ),
);
    static $tableForeignKeys = array (
  'dfa_archivos_id_archivo_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_archivo',
    'idForeign' => NULL,
  ),
  'dfa_archivos_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_archivos_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_archivos_ibfk_3' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_cover_picture',
    'idForeign' => 'id_file',
  ),
  'dfa_archivos_ibfk_4' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_entidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_archivos_ibfk_5' => 
  array (
    'table' => 'dfa_categorias_publicaciones',
    'idLocal' => 'id_categoria_publicacion',
    'idForeign' => 'id_categoria_publicacion',
  ),
  'dfa_archivos_ibfk_6' => 
  array (
    'table' => 'dfa_secciones_publicaciones',
    'idLocal' => 'id_seccion_publicacion',
    'idForeign' => 'id_seccion_publicacion',
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
        //$this->dbforge->drop_table('dfa_archivos');
    }
}