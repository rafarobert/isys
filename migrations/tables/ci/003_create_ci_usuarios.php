<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $28/04/2018
 * Time: $1:10 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_usuarios extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id_usuario' => 
  array (
    'field' => 'id_usuario',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'nombre' => 
  array (
    'field' => 'nombre',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'apellido' => 
  array (
    'field' => 'apellido',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'username' => 
  array (
    'field' => 'username',
    'type' => 'varchar',
    'constraint' => '250',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'email' => 
  array (
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
    'pk' => 'id_usuario',
  ),
  'password' => 
  array (
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
    'pk' => 'id_usuario',
  ),
  'fec_nacimiento' => 
  array (
    'field' => 'fec_nacimiento',
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'sexo' => 
  array (
    'field' => 'sexo',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'select',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'invitado_por' => 
  array (
    'field' => 'invitado_por',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Invitado por',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'apellido',
    ),
    'validate' => 0,
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
    'pk' => 'id_usuario',
  ),
  'phone_number_1' => 
  array (
    'field' => 'phone_number_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Telefono 1',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'phone_number_2' => 
  array (
    'field' => 'phone_number_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'labe' => 'Telefono 2',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cellphone_number_1' => 
  array (
    'field' => 'cellphone_number_1',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 1',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cellphone_number_2' => 
  array (
    'field' => 'cellphone_number_2',
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 2',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'cod_acceso' => 
  array (
    'field' => 'cod_acceso',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Codigo de acceso',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'id_option_tipo_asociado' => 
  array (
    'field' => 'id_option_tipo_asociado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de asociado',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'descripcion',
    ),
    'filterBy' => 
    array (
      'tipo' => 'tipo_asociado',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'hbf_options',
    'pk' => 'id_usuario',
  ),
  'id_option_nivel_asociado' => 
  array (
    'field' => 'id_option_nivel_asociado',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nivel de asociado',
    'input' => 'dropdown',
    'selectBy' => 
    array (
      0 => 'nombre',
      1 => 'descripcion',
    ),
    'filterBy' => 
    array (
      'tipo' => 'nivel_asociado',
    ),
    'validate' => 'required',
    'idForeign' => 'id_option',
    'table' => 'hbf_options',
    'pk' => 'id_usuario',
  ),
  'id_turno' => 
  array (
    'field' => 'id_turno',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Turno de',
    'input' => 'dropdown',
    'selectBy' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
    'pk' => 'id_usuario',
  ),
  'id_role' => 
  array (
    'field' => 'id_role',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Role del usuario',
    'input' => 'radios',
    'selectBy' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'hbf_roles',
    'pk' => 'id_usuario',
  ),
  'foto_perfil' => 
  array (
    'field' => 'foto_perfil',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Foto de perfil',
    'input' => 'image',
    'validate' => 0,
    'pk' => 'id_usuario',
  ),
  'app_monitor' => 
  array (
    'field' => 'app_monitor',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app monitoreo',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'app_orders' => 
  array (
    'field' => 'app_orders',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app ordenes',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'app_admin' => 
  array (
    'field' => 'app_admin',
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app administrador',
    'input' => 'radios',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'herbalife_key' => 
  array (
    'field' => 'herbalife_key',
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'pk' => 'id_usuario',
  ),
  'estado' => 
  array (
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
    'pk' => 'id_usuario',
  ),
  'change_count' => 
  array (
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_usuario',
  ),
  'date_created' => 
  array (
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_usuario',
  ),
  'date_modified' => 
  array (
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_usuario',
  ),
);
        $fk_keys = array (
  'ci_usuarios_ibfk_1' => 
  array (
    'table' => 'hbf_options',
    'idLocal' => 'id_option_tipo_asociado',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_2' => 
  array (
    'table' => 'hbf_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
  ),
  'ci_usuarios_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'invitado_por',
    'idForeign' => 'id_usuario',
  ),
  'ci_usuarios_ibfk_4' => 
  array (
    'table' => 'hbf_options',
    'idLocal' => 'id_option_nivel_asociado',
    'idForeign' => 'id_option',
  ),
  'ci_usuarios_ibfk_5' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_usuario', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('ci_usuarios');
        $settings = array (
  'aListedFields' => 
  array (
    0 => 'nombre',
    1 => 'apellido',
    2 => 'sexo',
    3 => 'cellphone_number_1',
  ),
  'numListed' => 5,
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings,'ci_usuarios');
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_usuarios');
    }
}