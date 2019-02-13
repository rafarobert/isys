<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_publicaciones extends CI_Migration
{
    static $tableId = 'id_publicacion';
    static $tableName = 'dfa_publicaciones';
    static $tableFields = array (
  'id_publicacion' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'id_publicacion',
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
    'pk' => 'id_publicacion',
  ),
  'titulo' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'titulo',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_publicacion',
  ),
  'titular' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'titular',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_publicacion',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'descripcion',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_publicacion',
  ),
  'fecha_publicacion' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'fecha_publicacion',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_publicacion',
  ),
  'id_entidad' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'id_categoria_publicacion' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'id_categoria_publicacion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_categoria_publicacion',
    'table' => 'dfa_categorias_publicaciones',
    'pk' => 'id_publicacion',
  ),
  'id_etiquetas' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'id_etiquetas',
    'type' => 'varchar',
    'constraint' => '450',
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
    'table' => 'dfa_etiquetas',
    'idForeign' => 'id_etiqueta',
    'pk' => 'id_publicacion',
  ),
  'id_seccion_publicacion' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'estado_publicacion' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '1000',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_publicacion',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'id_city' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'id_city',
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
    'pk' => 'id_publicacion',
  ),
  'revisado' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'revisado',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'validate' => 0,
    'options' => 
    array (
      'aprobado' => 'aprobado',
      'consultar' => 'consultar',
      'riesgoso' => 'riesgoso',
      'no aprobado' => 'no aprobado',
    ),
    'pk' => 'id_publicacion',
  ),
  'comentarios' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'comentarios',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_publicacion',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_publicacion',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_publicaciones',
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
    'pk' => 'id_publicacion',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_publicacion',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_publicaciones',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_publicacion',
  ),
);
    static $tableForeignKeys = array (
  'dfa_publicaciones_id_publicacion_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_publicacion',
    'idForeign' => NULL,
  ),
  'dfa_publicaciones_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_publicaciones_ibfk_11' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_city',
    'idForeign' => 'id_city',
  ),
  'dfa_publicaciones_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_publicaciones_ibfk_3' => 
  array (
    'table' => 'dfa_entidades',
    'idLocal' => 'id_entidad',
    'idForeign' => 'id_entidad',
  ),
  'dfa_publicaciones_ibfk_4' => 
  array (
    'table' => 'dfa_secciones_publicaciones',
    'idLocal' => 'id_seccion_publicacion',
    'idForeign' => 'id_seccion_publicacion',
  ),
  'dfa_publicaciones_ibfk_5' => 
  array (
    'table' => 'dfa_categorias_publicaciones',
    'idLocal' => 'id_categoria_publicacion',
    'idForeign' => 'id_categoria_publicacion',
  ),
  'dfa_publicaciones_ibfk_6' => 
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
        //$this->dbforge->drop_table('dfa_publicaciones');
    }
}