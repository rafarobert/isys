<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_ci_sessions extends CI_Migration
{
    static $tableId = 'id';
    static $tableName = 'ci_sessions';
    static $tableFields = array (
  'id' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'id',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'auto_increment' => false,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'ip_address' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'ip_address',
    'type' => 'varchar',
    'constraint' => '45',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'timestamp' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'timestamp',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'data' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'data',
    'type' => 'blob',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Datos en sesion',
    'input' => 'textarea',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'last_activity' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'last_activity',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => '0000-00-00 00:00:00',
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'id_user' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'id_user',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nombre del Usuario',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'validate' => 'required',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'pk' => 'id',
  ),
  'lng' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'lng',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
  'lat' => 
  array (
    'tabName' => 'ci_sessions',
    'field' => 'lat',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id',
  ),
);
    static $tableForeignKeys = array (
  'ci_sessions_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user',
    'idForeign' => 'id_user',
  ),
);
    static $tableSettings = array (
  'title' => 'Sesiones del Sistema',
  'indexFields' => 
  array (
    0 => 'ip_address',
    1 => 'timestamp',
    2 => 'last_activity',
    3 => 'id_user',
  ),
  'numListed' => 4,
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
        //$this->dbforge->drop_table('ci_sessions');
    }
}