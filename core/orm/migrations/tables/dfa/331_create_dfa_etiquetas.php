<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_etiquetas extends CI_Migration
{
    static $tableId = 'id_etiqueta';
    static $tableName = 'dfa_etiquetas';
    static $tableFields = array (
  'id_etiqueta' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'id_etiqueta',
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
    'pk' => 'id_etiqueta',
  ),
  'nombre' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_etiqueta',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'descripcion',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_etiqueta',
  ),
  'icons' => 
  array (
    'tabName' => 'dfa_etiquetas',
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
    'pk' => 'id_etiqueta',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_etiquetas',
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
    'pk' => 'id_etiqueta',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_etiqueta',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_etiquetas',
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
    'pk' => 'id_etiqueta',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_etiquetas',
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
    'pk' => 'id_etiqueta',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_etiqueta',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_etiquetas',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_etiqueta',
  ),
);
    static $tableForeignKeys = array (
  'dfa_etiquetas_id_etiqueta_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_etiqueta',
    'idForeign' => NULL,
  ),
  'dfa_etiquetas_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_etiquetas_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
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
        //$this->dbforge->drop_table('dfa_etiquetas');
    }
}