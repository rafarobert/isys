<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_categorias_publicaciones extends CI_Migration
{
    static $tableId = 'id_categoria_publicacion';
    static $tableName = 'dfa_categorias_publicaciones';
    static $tableFields = array (
  'id_categoria_publicacion' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'id_categoria_publicacion',
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
    'pk' => 'id_categoria_publicacion',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '200',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_categoria_publicacion',
  ),
  'titulo' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'titulo',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_categoria_publicacion',
  ),
  'id_seccion_publicacion' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
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
    'pk' => 'id_categoria_publicacion',
  ),
  'icons' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'icons',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'button',
    'onclick' => 'oModal.open(this,\'icons\')',
    'pk' => 'id_categoria_publicacion',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'hidden',
    'validate' => 0,
    'pk' => 'id_categoria_publicacion',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_categoria_publicacion',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_categoria_publicacion',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
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
    'pk' => 'id_categoria_publicacion',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_categoria_publicacion',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
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
    'pk' => 'id_categoria_publicacion',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
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
    'pk' => 'id_categoria_publicacion',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_categoria_publicacion',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_categorias_publicaciones',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_categoria_publicacion',
  ),
);
    static $tableForeignKeys = array (
  'dfa_categorias_publicaciones_id_categoria_publicacion_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_categoria_publicacion',
    'idForeign' => NULL,
  ),
  'dfa_categorias_publicaciones_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_categorias_publicaciones_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_categorias_publicaciones_ibfk_3' => 
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
        //$this->dbforge->drop_table('dfa_categorias_publicaciones');
    }
}