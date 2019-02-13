<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_ci_users extends CI_Migration
{
    static $tableId = 'id_user';
    static $tableName = 'ci_users';
    static $tableFields = array (
  'id_user' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'id_user',
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
    'pk' => 'id_user',
  ),
  'name' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'name',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_user',
  ),
  'lastname' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'lastname',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'username' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'username',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'email' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'email',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 
    array (
      0 => 'email',
    ),
    'pk' => 'id_user',
  ),
  'address' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'address',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Domicilio',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'password' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'password',
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 
    array (
      0 => 'password',
    ),
    'input' => 'password',
    'pk' => 'id_user',
  ),
  'birthdate' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'birthdate',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'date',
    'pk' => 'id_user',
  ),
  'age' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'age',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'carnet' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'carnet',
    'type' => 'varchar',
    'constraint' => '30',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Carnet de Identidad',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'sexo' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'sexo',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radios',
    'options' => 
    array (
      'masculino' => 'Masculino',
      'femenino' => 'Femenino',
    ),
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'phone_1' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'phone_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Telefono 1',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'phone_2' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'phone_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Telefono 2',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'cellphone_1' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'cellphone_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 1',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'cellphone_2' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'cellphone_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 2',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'ids_files' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '450',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Foto de perfil',
    'input' => 'file',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'ci_users',
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
    'pk' => 'id_user',
  ),
  'id_city' => 
  array (
    'tabName' => 'ci_users',
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
    'pk' => 'id_user',
  ),
  'id_provincia' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'id_provincia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_provincia',
    'table' => 'ci_provincias',
    'pk' => 'id_user',
  ),
  'id_role' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'id_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Role',
    'input' => 'radios',
    'selectBy' => 'name',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'ci_roles',
    'pk' => 'id_user',
  ),
  'signin_method' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'signin_method',
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'uid' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'uid',
    'type' => 'varchar',
    'constraint' => '499',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_user',
  ),
  'change_count' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_user',
  ),
  'status' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'status',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'pk' => 'id_user',
  ),
  'date_modified' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_user',
  ),
  'date_created' => 
  array (
    'tabName' => 'ci_users',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_user',
  ),
);
    static $tableForeignKeys = array (
  'ci_users_id_user_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_user',
    'idForeign' => NULL,
  ),
  'ci_users_ibfk_1' => 
  array (
    'table' => 'ci_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
  ),
  'ci_users_ibfk_2' => 
  array (
    'table' => 'ci_provincias',
    'idLocal' => 'id_provincia',
    'idForeign' => 'id_provincia',
  ),
  'ci_users_ibfk_3' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_cover_picture',
    'idForeign' => 'id_file',
  ),
  'ci_users_ibfk_4' => 
  array (
    'table' => 'ci_cities',
    'idLocal' => 'id_city',
    'idForeign' => 'id_city',
  ),
);
    static $tableSettings = array (
  'indexFields' => 
  array (
    0 => 'name',
    1 => 'lastname',
    2 => 'sexo',
    3 => 'cellphone_number_1',
  ),
  'numListed' => 5,
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
        //$this->dbforge->drop_table('ci_users');
    }
}